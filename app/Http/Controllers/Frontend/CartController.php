<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

use Cart, DB, Auth;


class CartController  extends Controller
{
	public function __construct()
	{
		$this->orderModel        = new Order();
		$this->orderProductModel = new OrderProduct();
		$this->productModel      = new Product();
	}


    public function index() {
        return view('Frontend.Contents.cart.cart');
    }

    public function getListOrder() {
        $order = Order::where('status', 0)->with('user')->orderBy('id','desc')->get();
        return response()->json($order);
    }

    public function checkoutSuccess() {
        return view('Frontend.Contents.cart.checkout_success');
    }

    public function addCart($id, Request $request) {

        $product = $this->productModel::select('name', 'new_price', 'image', 'slug', 'id', 'code')
                                ->find($id);

        $qty = $request->input('qty', 1);

        if (empty($product)) {
            return response()->json(["status" => true], 422);
        }
        $productCart = array(
							'id'      => $id,
							'name'    => $product->name,
							'qty'     => $qty, 
							'price'   => $product->new_price, 
							'options' => array(
										'image' => $product->image,
										'slug'  => $product->slug,
                                        'code'  => $product->code,
			                    	));

        Cart::add($productCart);

        return response()->json(["status" => true], 200);
    }

    public function getCart() {
        return response()->json(["cartItems"=>Cart::content(),
                                 "cartCount"=>Cart::count(),
                                 "cartTotal"=>Cart::subtotal(0)]);
    }

    public function updateCart($rowId, Request $request){
        Cart::update($rowId, $request->qty);
        return response()->json(["status" => true], 200);
    }

    public function deleteCart($rowId) {
        Cart::remove($rowId);
        return response()->json(["status" => true], 200);
    }

    public function checkout() {
        return view('Frontend.Contents.cart.checkout');
    } 

    public function checkoutPost(Request $request) {
       
        $request->flash();
        $this->_validateCheckout($request);
        if (Cart::count() != 0){

            DB::beginTransaction();
            try {
                $this->orderModel->member_order   = Auth::guard('customer')->check() ? Auth::user()->id : 0;
                $this->orderModel->code           = "DH".substr(uniqid(), 0, 8);
                $this->orderModel->total          = Cart::subtotal(0);
                $this->orderModel->buyer          = $request->name;
                $this->orderModel->buyer_phone    = $request->phone;
                $this->orderModel->buyer_email    = $request->email;
                $this->orderModel->buyer_address  = $request->address;
                $this->orderModel->note           = $request->note;
                $this->orderModel->order_status   = 0;
                $this->orderModel->payment_status = 0;
                $this->orderModel->save();

                foreach (Cart::content() as $key => $itemCart) {
                    $this->orderProductModel = new OrderProduct();
                    $this->orderProductModel->order_id    = $this->orderModel->id;
                    $this->orderProductModel->product_id  = $itemCart->id;
                    $this->orderProductModel->qty         = $itemCart->qty;
                    $this->orderProductModel->total_price = $itemCart->price*$itemCart->qty;
                    $this->orderProductModel->save();
                }

                DB::commit();
                Cart::destroy();
                return redirect()->route('home.checkout.success');
            } catch (Exception $e) {
                DB::rollback();
            }
        } else {
            return redirect()->route('login.frontend');
        }
    }

    public function _validateCheckout($request) {
        return $this->validate($request, [
            'name'    => 'required',
            'address' => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            ], [
            'name.required'    => 'Tên không được để trống',
            'name.max'         => 'Tên dưới 250 kí tự',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max'      => 'Địa chỉ dưới 250 kí tự',
            'phone.required'   => 'Số điện thoại không được để trống',
            'phone.max'        => 'Số điện thoại dài dưới 15 kí tự',
            'email.required'   => 'Email không được để trống',
            'email.max'        => 'Email dưới 250 kí tự',
            'email.email'      => 'Email không đúng định dạng'
            ]
        );
    } 
}
