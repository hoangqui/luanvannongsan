<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Language;
use App\Libs\Configs\StatusConfig;
use Illuminate\Support\Str;
use DB, App, Illuminate\Validation\Rule;
use Datatables;

class CategoryController extends Controller
{
	private $languageModel, $categoryModel;
	public function __construct(Language $language, Category $category, CategoryTranslation $categoryTranslation)
	{
		$this->languageModel = $language;
		$this->categoryModel = $category;

        $this->middleware('permission:category.read', ['only' => ['list']]);
        $this->middleware('permission:category.read', ['only' => ['index']]);
        $this->middleware('permission:category.create', ['only' => ['create']]);
        $this->middleware('permission:category.create', ['only' => ['store']]);
        $this->middleware('permission:category.read', ['only' => ['show']]);
        $this->middleware('permission:category.update', ['only' => ['edit']]);
        $this->middleware('permission:category.update', ['only' => ['update']]);
        $this->middleware('permission:category.delete', ['only' => ['destroy']]);
	}

    public function list(Request $request) {
        $orderName = $request->input('orderName', 'id');
        $orderBy   = $request->input('orderBy', 'desc');

        $categories = $this->categoryModel->filterFreeText($request->freetext)
            ->buildCond()
            ->select('categories.id', 'name', 'parent_id', 'depth', 'status')
            ->join('categories_translation as t', 't.category_id', '=', 'categories.id')
            ->where('locale', App::getLocale())
            ->orderBy('depth','asc')
            ->with('translations')
            ->get();

        return response()->json($categories);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Contents.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = app('Category')->listCategory('vi');

        return view('Backend.Contents.category.add', 
                            array('categories' => $categories) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flash();
        $this->_validateInsert($request);
        DB::beginTransaction();
        $languages = $this->languageModel::where('status', StatusConfig::CONST_AVAILABLE)
        							  ->get(); 
 
        try {
            $this->categoryModel->parent_id = $request->parent_id;
            $this->categoryModel->status    = $request->status;
            $this->categoryModel->save();

			$this->categoryModel->translateOrNew('vi')->name             = $request->name;
			$this->categoryModel->translateOrNew('vi')->description      = $request->description;
			$this->categoryModel->translateOrNew('vi')->slug             = Str::slug($request->name);
			$this->categoryModel->translateOrNew('vi')->meta_title       = $request->meta_title;
			$this->categoryModel->translateOrNew('vi')->meta_description = $request->meta_description;
			$this->categoryModel->translateOrNew('vi')->meta_data        = $request->meta_content;

			$this->categoryModel->save();
            $this->_updateParent($request->parent_id, $this->categoryModel->id);
        	DB::commit();
            return redirect()->route('categories.index')->with('category', 'success');
        } catch (Exception $e) {
        	DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryModel->findOrFail($id);
        $categories = app('Category')->listCategory('vi');
  
        return view('Backend.Contents.category.add', array('category' => $category, 
                                                        'categories' => $categories));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $languages = $this->languageModel::where('status', StatusConfig::CONST_AVAILABLE)
                                            ->get(); 
        $categoryModel = $this->categoryModel->findOrFail($id);

        try {
            $categoryModel->status    = $request->status;
            $categoryModel->parent_id = $request->parent_id;
            $categoryModel->save();

            $categoryModel->translateOrNew('vi')->name             = $request->name;
            $categoryModel->translateOrNew('vi')->description      = $request->description;
            $categoryModel->translateOrNew('vi')->slug             = Str::slug($request->name);
            $categoryModel->translateOrNew('vi')->meta_title       = $request->meta_title;
            $categoryModel->translateOrNew('vi')->meta_description = $request->meta_description;
            $categoryModel->translateOrNew('vi')->meta_data        = $request->meta_content;
            $categoryModel->save();

            $this->_updateParent($request->parent_id, $categoryModel->id);

            DB::commit();
            return redirect()->route('categories.index')->with('category', 'success');
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $categoryModel = $this->categoryModel->findOrFail($id);
            $checkParent   = $this->categoryModel->where('parent_id', $id)
                                                 ->get()->toArray();
            if (empty($checkParent)) {
                $categoryModel->delete();
                $categoryModel->deleteTranslations();
                DB::commit();
                return response()->json(['status' => true], 200);
            }
            return response()->json(['status' => false], 422);
        } catch (Exception $e) {
            DB::rollback();
        }
    }


    public function _updateParent($parent_id = 0, $id) {
        $categoryModel = $this->categoryModel->findOrFail($id);
        $oldDepth      = $categoryModel->depth;
        if ($parent_id == 0) {
            $categoryModel->depth = $id;
        } else {
            $categoryParent       = $this->categoryModel->findOrFail($parent_id);
            $categoryModel->depth = $categoryParent->depth."/".$id;
        }
        $categoryModel->save();

        $categoryChild = $this->categoryModel->where('depth', 'like', $oldDepth."%")
                                            ->get()->toArray();
        if (!empty($categoryChild)) {
            $updateChild = $this->categoryModel->whereIn('id', array_column($categoryChild, 'id'))
                                ->get()
                                ->map(function ($item) use ($oldDepth, $categoryModel) {
                                    $item->depth = str_replace($oldDepth, $categoryModel->depth, $item->depth);
                                    $item->save();
                                });
        }

        echo "<pre>";
        print_r($categoryChild);                                
    }

    public function _validateInsert($request) {
        $rules = array(
                'name'    => 'between:1,255',
                'parent_id' => 'required',
                'status'    => ['required', Rule::in([StatusConfig::CONST_AVAILABLE, StatusConfig::CONST_DISABLE])]
                );
        $messages = array();
        $attribute = array(
            'name'    => trans('backend.category.name'),
            'parent_id' => trans('backend.category.parent'),
            'status'    => trans('backend.status')
        );

        $this->validate($request, $rules, $messages, $attribute);
    }
}
