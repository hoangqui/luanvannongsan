<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Contact;
use App\Libs\Configs\StatusConfig;
use DB;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->productModel = new Product();
        $this->contactModel = new Contact();
	}
    public function index() {
    	$new_products = $this->productModel::select('name', 'new_price', 'old_price', 'created_at', 'id', 'slug', 'image', 'code')
    										->where('status', StatusConfig::CONST_AVAILABLE)
    										->orderBy('created_at', 'desc')
    										->limit(4)
    										->get();

    	$hot_products = $this->productModel::select('name', 'new_price', 'old_price', 'created_at', 'id', 'slug', 'image', 'code')
    										->where(array(
    											array('status', StatusConfig::CONST_AVAILABLE),
    											array('hot', 1)
    										 ))
    										->orderBy('created_at', 'desc')
    										->limit(8)
    										->get(); 


    	return view('Frontend.Contents.index', array(
    												'new_products' => $new_products,
                                                    'hot_products' => $hot_products,
												));
    }

    public function postContact (Request $request) {
        $request->flash();
        $this->_validateContact($request);
        DB::beginTransaction();
        try {
            $this->contactModel->name    = $request->name;
            $this->contactModel->email   = $request->email;
            $this->contactModel->phone   = $request->phone;
            $this->contactModel->message = $request->message;
            $this->contactModel->save();
            DB::commit();
            $request->flush();
            return redirect()->back()->with('actions', 'success');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back();
        }
    }

        public function _validateContact($request) {
            $this->validate($request ,[
                'name'    => 'required | max: 255',
                'email'   => 'required | max: 255',
                'phone'   => 'required | max: 255',
                'message' => 'required',
            ], [

            ]);
        }
}
