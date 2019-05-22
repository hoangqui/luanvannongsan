<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\Configs\StatusConfig;

use DB, App, Auth;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Customer;
use App\Models\Product;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->orderModel = new Order();
        $this->memberModel = new Customer();
        $this->productModel = new Product();
        $this->orderProductModel = new OrderProduct();
	}

    public function index() {
       if (Auth::user()->can('setting.read')) {
            $countOrder  = $this->orderModel->count();
            $countOrder0 = $this->orderModel->where('order_status', 0)->count();
            $countmember = $this->memberModel->count();
            $countProduct = $this->productModel->count();
            return view('Backend.Contents.index', array(
                                                'countOrder'  => $countOrder,
                                                'countmember' => $countmember,
                                                'countProduct' => $countProduct,
                                                ));
       } else {
            $list_product = $this->productModel->where('created_by', Auth::user()->id)->get();

            $countProduct = $this->orderProductModel->whereIn('product_id', array_column( $list_product->toArray() , 'id'))->count();

            $countmember  = $this->memberModel->count();
            
            return view('Backend.Contents.index', array(
                                                'countOrder'  => $countProduct,
                                                'countmember' => $countmember,
                                                'countProduct' => count($list_product),
                                                ));
       }
    }

     public function list() {
        
        
    }

}
