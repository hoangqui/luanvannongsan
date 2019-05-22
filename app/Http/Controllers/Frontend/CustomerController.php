<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use DB, Auth, Hash;


class CustomerController extends Controller
{
	public function __construct()
	{
		$this->customerModel = new Customer();
	}
    public function login() {
    	return view('Frontend.Contents.auth.login');
    }

    public function postLogin(Request $request) {

    	$this->validateLogin($request);
        if(Auth::guard('customer')
                    ->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home.index');
        } 
        else {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email'  => 'Tài khoản không không hợp lệ',
                'password' =>'Mật khẩu không hợp lệ'
            ]);
        }
    }

    public function register() {
    	return view('Frontend.Contents.auth.register');
    }

    public function postRegister(Request $request) {
    	$request->flash();
    	$this->_validateRegister($request);

    	DB::beginTransaction();

    	try {
			$this->customerModel->name     = $request->name;
			$this->customerModel->email    = $request->email;
			$this->customerModel->phone    = $request->phone;
			$this->customerModel->password = Hash::make($request->password);
			$this->customerModel->save();

    		DB::commit();
    		Auth::guard('customer')->login($this->customerModel);
    		return redirect()->route('home.index');
    	} catch (Exception $e) {

    		DB::rollback();
    	}
    }

    public function logout(Request $request) {

    	Auth::guard('customer')->logout();

    	$request->session()->invalidate();

    	return redirect()->route('home.index');
    }

     public function profile () {
        if (Auth::guard('customer')->check()) {
            $customer = $this->customerModel::select('name', 'email', 'phone', 'node', 'address')
                                      ->findOrFail(Auth::guard('customer')->user()->id);

            return view('FrontEnd.Contents.profile.index', ['customer'=>$customer]);
        } else {
            return redirect()->route('home.index');
        }
    }

    public function updateAccount(Request $request) {
        $this->_validateUpdate($request);

        $userId = Auth::guard('customer')->user()->id;

        $customer = $this->customerModel::findOrFail($userId);

        DB::beginTransaction();
        try {
            $customer->name    = $request->name;
            $customer->phone   = $request->phone;
            $customer->node    = $request->node;
            $customer->address = $request->address;

            $customer->save();
            DB::commit();
            return redirect()->route('customer.profile')->with('actions', 'success');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('customer.profile')->with('actions', 'failue');
        }
    }

    public function changPass() {
        return view('FrontEnd.Contents.profile.change-pass');
    }

    public function postChangePass(Request $request) {

        $this->_validatePass($request);

        $userId      = Auth::guard('customer')->user()->id;

        $customer    = $this->customerModel::findOrFail($userId);

        $passwordOld = $customer->password;

        if(Hash::check($request->old_password, $customer->password)) {

            DB::beginTransaction();
            try {

                $customer->password = Hash::make($request->password);
                $customer->save();

                DB::commit();

                return redirect()->route('customer.changPass')->with('actions', 'success');

            } catch (Exception $e) {
                DB::rollback();
                return redirect()->route('customer.changPass')->with('actions', 'failue');
            }
        } else {
            throw ValidationException::withMessages([
                'old_password'  => 'Mật khẩu cũ không đúng',
            ]);
        }
    }

    public function _validateUpdate($request) {
        return $this->validate($request, [
            'phone'            => 'required| max: 15',
            'name'             => 'required'
            ], [
            'name.required'  => 'Họ tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max'      => 'Số điện thoại dài dưới 15 kí tự',
            ]
        );
    }

    public function _validatePass($request) {
        return $this->validate($request, [
            'password_confirm' => 'required',
            'password'         => 'required| min:8| max: 30|same:password_confirm',
            'old_password'     => 'required',
            ], [
            'old_password.required'     => 'Mật khẩu không được để trống',
            'password.required'         => 'Mật khẩu mới không được để trống',
            'password.max'              => 'Mật khẩu dài từ 8 đến 30 kí tự',
            'password.min'              => 'Mật khẩu dài từ 8 đến 30 kí tự',
            'password_confirm.required' => 'Nhập lại mật khẩu không được để trống',
            'password.same'             => 'Mật khẩu nhật lại không chính xác',
            ]
        );
    }

    public function _validateRegister ($request) {
    	$rules = array(
				'name'     => 'between:1,255',
				'email'    => 'between:1,255|email|unique:customers,email',
				'phone'    => 'required',
				'password' => 'between:8,32|same:confirm_password'
    	        );
    	$messages = array();
    	$attribute = array(
			'name'     => trans('backend.customer.name'),
			'email'    => trans('backend.customer.email'),
			'password' => trans('backend.customer.password'),
			'phone'    => trans('backend.customer.phone'),
    	);

    	$this->validate($request, $rules, $messages, $attribute);
    }

    public function validateLogin($request) {
        $this->validate($request, [
            'email'  => 'required|string',
            'password' => 'required|string',
        ], [
            'email.required'  => 'Tài khoản không được bỏ trống',
            'password.required' => 'Mật khẩu không được bỏ trống'
        ]);
    }
}
