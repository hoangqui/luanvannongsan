<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use DB, App;
use Illuminate\Validation\Rule;
use App\Libs\Configs\StatusConfig;


class TagController extends Controller
{
    private $tagModel;

    public function __construct(Tag $tag)
    {
        $this->tagModel = $tag;

        $this->middleware('permission:tag.read', ['only' => ['list']]);
        $this->middleware('permission:tag.read', ['only' => ['index']]);
        $this->middleware('permission:tag.create', ['only' => ['create']]);
        $this->middleware('permission:tag.create', ['only' => ['store']]);
        $this->middleware('permission:tag.read', ['only' => ['show']]);
        $this->middleware('permission:tag.update', ['only' => ['edit']]);
        $this->middleware('permission:tag.update', ['only' => ['update']]);
        $this->middleware('permission:tag.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Contents.tag.index');
    }

    public function list(Request $request) {
        $orderName = $request->input('orderName', 'id');
        $orderBy   = $request->input('orderBy', 'desc');

        $tags = $this->tagModel->filterFreeText($request->freetext)
                               ->buildCond()
                               ->select('name', 'status', 'id')
                               ->get();

        return response()->json($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Contents.tag.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction(); 
        try {
            $this->tagModel->status      = $request->status;
            $this->tagModel->name        = $request->name;
            $this->tagModel->save();

            DB::commit();
            return redirect()->route('tags.index')->with('tag', 'success');
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
        return view('Backend.Contents.tag.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = $this->tagModel::findOrFail($id);
        return view('Backend.Contents.tag.add',
                                     array('tag' => $tag));
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

        $tagModel  = $this->tagModel->findOrFail($id);

        try {
            $tagModel->status  = $request->status;
            $tagModel->name    = $request->name;
            $tagModel->save();

            DB::commit();
            return redirect()->route('tags.index')->with('tag', 'success');
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
            $tagModel = $this->tagModel::findOrFail($id);
            $tagModel->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Remove multi the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMulti(Request $request)
    {
        $ids = $request->ids;
        DB::beginTransaction();
        try {
            // Thực hiện xóa tệp tin
            $this->tagModel::destroy($ids);
            DB::commit();
            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['messages' => 'Xảy ra lỗi hệ thống!'], 422);
        }
    }

    

    public function _validateInsert($request) {
        $rules = array(
                    'name.*'    => 'between:1,255',
                    'status'    => ['required', Rule::in([StatusConfig::CONST_AVAILABLE, StatusConfig::CONST_DISABLE])]
                    );
        $messages = array();
        $attribute = array(
            'name.*'    => trans('backend.tag.name'),
            'status'    => trans('backend.tag.status')
        );

        $this->validate($request, $rules, $messages, $attribute);
    }
}
