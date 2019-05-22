<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use DB, Auth, Illuminate\Support\Str, Illuminate\Validation\Rule;
use App\Libs\Configs\StatusConfig;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->productModel  = new Product();
        $this->categoryModel = new Category();

        $this->middleware('permission:product.read', ['only' => ['list']]);
        $this->middleware('permission:product.read', ['only' => ['index']]);
        $this->middleware('permission:product.create', ['only' => ['create']]);
        $this->middleware('permission:product.create', ['only' => ['store']]);
        $this->middleware('permission:product.read', ['only' => ['show']]);
        $this->middleware('permission:product.update', ['only' => ['edit']]);
        $this->middleware('permission:product.update', ['only' => ['update']]);
        $this->middleware('permission:product.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Contents.product.index');
    }

    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $orderName = $request->input('orderName', 'id');
        $orderBy   = $request->input('orderBy', 'desc');
        if (Auth::check() && Auth::user()->can('product.by_provider')) {
            $posts = $this->productModel->filterFreeText($request->freetext)
                ->buildCond()
                ->orderBy($orderName, $orderBy)
                ->with('category')
                ->paginate(15);
        } else {
            $posts = $this->productModel->filterFreeText($request->freetext)
                ->buildCond()
                ->where('created_by', Auth::user()->id)
                ->orderBy($orderName, $orderBy)
                ->with('category')
                ->paginate(15);
        }


        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryModel->get();

        return view('Backend.Contents.product.add', array('categories' => $categories) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->flash();
        $this->_validateInsert($request);
        DB::beginTransaction();

       try {
            $this->productModel->code             = $request->code;
            $this->productModel->name             = $request->name;
            $this->productModel->old_price        = $request->old_price;
            $this->productModel->user_update      = Auth::user()->id;
            $this->productModel->new_price        = $request->new_price;
            $this->productModel->qty              = $request->qty;
            $this->productModel->description      = $request->description;
            $this->productModel->specification    = $request->content;
            $this->productModel->slug             = Str::slug($request->name);
            $this->productModel->category_id      = $request->category_id;
            $this->productModel->tag              = $request->tag;
            $this->productModel->image            = $request->url_image;
            $this->productModel->created_by       = Auth::user()->id;
            $this->productModel->image_detail     = json_encode($request->image_detail);
            
            $this->productModel->meta_title       = $request->meta_title;
            $this->productModel->meta_description = $request->meta_description;
            $this->productModel->meta_content     = $request->meta_content;
            $this->productModel->meta_keyword     = $request->meta_keyword;

            $this->productModel->save();

           DB::commit();
           return redirect()->route('products.index')->with('product', 'success');
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
        $product    = $this->productModel->findOrFail($id);
        if (Auth::check() && Auth::user()->can('product.by_provider') || $product->created_by == Auth::user()->id) {
            $categories = $this->categoryModel->get();
            return view('Backend.Contents.product.show', array('categories' => $categories, 'product' => $product) );
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product    = $this->productModel->findOrFail($id);
        if (Auth::check() && Auth::user()->can('product.by_provider') || $product->created_by == Auth::user()->id) {
            $categories = $this->categoryModel->get();
            return view('Backend.Contents.product.add', array('categories' => $categories, 'product' => $product) );
        }
        abort(404);
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
        // dd($request);
        $request->flash();
        $this->_validateUpdate($request);
        DB::beginTransaction();
        $productModel = $this->productModel::findOrFail($id);
        if (Auth::check() && Auth::user()->can('product.by_provider') || $productModel->created_by == Auth::user()->id) {
            try {
                $productModel->name = $request->name;
                $productModel->old_price = $request->old_price;
                $productModel->user_update = Auth::user()->id;
                $productModel->new_price = $request->new_price;
                $productModel->qty = $request->qty;
                $productModel->description = $request->description;
                $productModel->specification = $request->content;
                $productModel->slug = Str::slug($request->name);
                $productModel->category_id = $request->category_id;
                $productModel->tag = $request->tag;
                $productModel->image = $request->url_image;
                $productModel->image_detail = json_encode($request->image_detail);

                $productModel->meta_title = $request->meta_title;
                $productModel->meta_description = $request->meta_description;
                $productModel->meta_content = $request->meta_content;
                $productModel->meta_keyword = $request->meta_keyword;

                $productModel->save();

                DB::commit();

                return redirect()->route('products.index')->with('product', 'success');
            } catch (Exception $e) {
                DB::rollback();
            }
        }
        abort(404);
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
            $productModel = $this->productModel->findOrFail($id);
            if (Auth::check() && Auth::user()->can('product.by_provider') || $productModel->created_by == Auth::user()->id) {
                $productModel->delete();
                DB::commit();
                return response()->json(['status' => true], 200);
            }
            abort(403);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => false], 422);
        }
    }

     /**
     * Remove multi the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMulti (Request $request)
    {
        $ids = $request->ids;

        DB::beginTransaction();
        try {
            foreach ($ids as $id) {
                $productModel = $this->productModel::find($id)->delete();
            }
            DB::commit();
            return response()->json(['status' => true], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => false], 422);
        }
    }

    /**
     * Add hot news the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hotNew ($id, Request $request)
    {
        $ids = $request->ids;
        DB::beginTransaction();
        try {
            if (Auth::check() && Auth::user()->can('product.by_provider')) {
                $productModel = $this->productModel::findOrFail($id);
                $hot = $productModel->hot;
                if ($hot == 1) {
                    $productModel->hot = 0;
                } else {
                    $productModel->hot = 1;
                }
                $productModel->save();
                DB::commit();
                return response()->json(['status' => true], 200);
            }
        }
        catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => false], 422);
        }
    }

    public function _validateInsert($request) {
        $rules = array(
                    'name'      => 'between:1,255',
                    'code'      => 'between:1,255 | unique:products',
                    'new_price' => 'between:1,255',
                    'qty'       => 'between:1,255',
                    'url_image' => 'required',
                    'status'    => ['required', Rule::in([StatusConfig::CONST_AVAILABLE, StatusConfig::CONST_DISABLE])]
                    );
        $messages  = array();
        $attribute = array(
            'name'      => trans('backend.product.name'),
            'code'      => trans('backend.product.code'),
            'new_price' => trans('backend.product.new_price'),
            'qty'       => trans('backend.product.qty'),
            'url_image' => trans('backend.product.url_image'),
            'status'    => trans('backend.status.status')
        );

        $this->validate($request, $rules, $messages, $attribute);
    }

    public function _validateUpdate($request) {
        $rules = array(
                    'name'      => 'between:1,255',
                    'new_price' => 'between:1,255',
                    'qty'       => 'between:1,255',
                    'url_image' => 'required',
                    'status'    => ['required', Rule::in([StatusConfig::CONST_AVAILABLE, StatusConfig::CONST_DISABLE])]
                    );
        $messages = array();
        $attribute = array(
            'name'      => trans('backend.product.name'),
            'code'      => trans('backend.product.code'),
            'new_price' => trans('backend.product.new_price'),
            'qty'       => trans('backend.product.qty'),
            'url_image' => trans('backend.product.url_image'),
            'status'    => trans('backend.status.status')
        );

        $this->validate($request, $rules, $messages, $attribute);
    }
}
