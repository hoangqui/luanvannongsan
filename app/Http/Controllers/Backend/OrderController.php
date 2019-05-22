<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\Configs\StatusConfig;

use DB, App, Auth;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class OrderController extends Controller
{
    public function __construct()
	{
		$this->orderModel = new Order();
		$this->orderProductModel = new OrderProduct();
		$this->productModel = new Product();

        $this->middleware('permission:order.read', ['only' => ['index']]);
        $this->middleware('permission:order.read', ['only' => ['list']]);
        $this->middleware('permission:order.read', ['only' => ['detailOrder']]);
        
        $this->middleware('permission:order.update', ['only' => ['updateOrder']]);

	}

    public function index() {
        return view('Backend.Contents.report.order');
    }

    public function list(Request $request) {

        $orderName = $request->input('orderName', 'id');
        $orderBy   = $request->input('orderBy', 'desc');

        $data = $this->orderModel->filterFreeText($request->freetext)
                                ->buildCond()
                                ->orderBy($orderName, $orderBy)
                                ->paginate(10);
                                    
        return response()->json($data);
    }

    public function detailOrder($id, Request $request) {

        $data = $this->orderProductModel->with('product')->where('order_id', $id)->get();
                                    
        return response()->json($data);
    }

    public function updateOrder($id, Request $request) {
	    $data = $this->orderModel->findOrFail($id);
	    DB::beginTransaction();
	    try {
            $data->order_status   = $request->order_status;
            $data->payment_status = $request->payment_status;
	    	$data->save();

	    	DB::commit();
	    	return response()->json(['status' => true], 200);
	    } catch (Exception $e) {
	    	DB::rollback();
	    	return response()->json(['status' => false], 500);
	    }
    }

    public function history () {
        return view('Backend.Contents.report.order_by_provider');
    }

    public function historyProductOrder () {
        $list_product_by_provider = $this->productModel->where('created_by', Auth::user()->id)->get();
        $product_ids = array_column($list_product_by_provider->toArray(), 'id');
        $data = $this->orderProductModel
                    ->whereIn('product_id', $product_ids)
                    ->with('product')
                    ->with('order')
                    ->orderBy('id', 'desc')
                    ->paginate(15);

        return response()->json($data);
    }

}
