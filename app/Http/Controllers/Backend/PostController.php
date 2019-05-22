<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\Configs\StatusConfig;
use DB, App, Auth, Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;
use App\Models\Language;

class PostController extends Controller
{

    public function __construct(Post $post, Category $category, Language $language)
    {
        $this->postModel     = $post;
        $this->categoryModel = $category;

        $this->middleware('permission:post.read', ['only' => ['list']]);
        $this->middleware('permission:post.read', ['only' => ['index']]);
        $this->middleware('permission:post.create', ['only' => ['create']]);
        $this->middleware('permission:post.create', ['only' => ['store']]);
        $this->middleware('permission:post.read', ['only' => ['show']]);
        $this->middleware('permission:post.update', ['only' => ['edit']]);
        $this->middleware('permission:post.update', ['only' => ['update']]);
        $this->middleware('permission:post.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Contents.post.index');
    }

    public function list(Request $request) {
        $orderName = $request->input('orderName', 'id');
        $orderBy   = $request->input('orderBy', 'desc');
        if (Auth::check() && Auth::user()->can('post.by_provider')) {
            $news = $this->postModel
                ->filterFreeText($request->freetext)
                ->buildCond()
                ->orderBy($orderName, $orderBy)
                // ->with(['user_creates'=> function ($query) {
                //     $query->select('id', 'email', 'name');
                // }])
                ->paginate(15);
        } else {
            $news = $this->postModel
                ->filterFreeText($request->freetext)
                ->buildCond()
                ->where('created_by', Auth::user()->id)
                ->orderBy($orderName, $orderBy)
                // ->with(['user_creates'=> function ($query) {
                //     $query->select('id', 'email', 'name');
                // }])
                ->paginate(15);
        }


        return response()->json($news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryModel->get();

        return view('Backend.Contents.post.add', array('categories' => $categories));
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

        try {
            $this->postModel->status           = $request->status;
            $this->postModel->url_image        = $request->url_image;
            $this->postModel->user_create      = Auth::user()->id;
            $this->postModel->title            = $request->title;
            $this->postModel->description      = $request->description;
            $this->postModel->slug             = Str::slug($request->title);
            $this->postModel->content          = $request->content;
            $this->postModel->tag              = $request->tag;
            $this->postModel->created_by       = Auth::user()->id;
            $this->postModel->meta_title       = $request->meta_title;
            $this->postModel->meta_description = $request->meta_description;
            $this->postModel->meta_content     = $request->meta_content;

            $this->postModel->save();

            DB::commit();
            return redirect()->route('posts.index')->with('post', 'success');
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
        $new        = $this->postModel
                                    // ->with('user_creates')
                                    ->findOrFail($id);

        return view('Backend.Contents.post.add', array('post'=>$new));
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
        $request->flash();
        $this->_validateInsert($request);
        DB::beginTransaction();

        $postModel = $this->postModel->findOrFail($id);
        try {
            $postModel->status           = $request->status;
            $postModel->url_image        = $request->url_image;
            
            $postModel->title            = $request->title;
            $postModel->description      = $request->description;
            $postModel->slug             = Str::slug($request->title);
            $postModel->content          = $request->content;
            $postModel->tag              = $request->tag;
            $postModel->meta_title       = $request->meta_title;
            $postModel->meta_description = $request->meta_description;
            $postModel->meta_content     = $request->meta_content;
            $postModel->save();

            DB::commit();
            return redirect()->route('posts.index')->with('post', 'success');
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
            $postModel = $this->postModel->findOrFail($id)->delete();

            DB::commit();
            return response()->json(['status' => true], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => false], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
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
                $postModel = $this->postModel::find($id)->delete();
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
        if (Auth::check() && Auth::user()->can('post.by_provider')) {
            $ids = $request->ids;
            DB::beginTransaction();
            try {
                $postModel = $this->postModel::find($id);

                $hot = $postModel->hot;
                if ($hot == 1) {
                    $postModel->hot = 0;
                } else {
                    $postModel->hot = 1;
                }
                $postModel->save();
                DB::commit();
                return response()->json(['status' => true], 200);
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['status' => false], 422);
            }
        }
        abort(403);
    }

    /**
     * update prioritize new the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function prioritizeNew ($id, Request $request)
    {
        $ids = $request->ids;
        DB::beginTransaction();
        try {
            if (Auth::check() && Auth::user()->can('post.by_provider')) {
                $postModel = $this->postModel::findOrFail($id);
                $prioritize = $postModel->prioritize;
                if ($prioritize == 1) {
                    $postModel->prioritize = 0;
                } else {
                    $postModel->prioritize = 1;
                }
                $postModel->save();
                DB::commit();
                return response()->json(['status' => true], 200);
            }
            abort(403);
        }
        catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => false], 422);
        }
    }


    

    public function _validateInsert($request) {
        $rules = array(
                    'title'    => 'between:1,255',
                    'content'  => 'required',
                    'status'     => ['required', Rule::in([StatusConfig::CONST_AVAILABLE, StatusConfig::CONST_DISABLE])]
                    );
        $messages = array();
        $attribute = array(
            'title'       => trans('backend.post.title'),
            'content'    => trans('backend.post.content'),
            'categories' => trans('backend.post.categories'),
            'status'       => trans('backend.status.status')
        );

        $this->validate($request, $rules, $messages, $attribute);
    }
}
