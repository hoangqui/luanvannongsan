<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\User, Hash;
use App\Models\Store;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $credentials =  $request->only($this->username(), 'password');
        $credentials = array_add($credentials,'status','AVAILABLE');
        return $credentials;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->invalidate();

        return redirect()->route('login');
    }

    public function register () {
        return view('auth.register');
    }

    public function postRegister (Request $request) {
        $this->_validateInsert($request);

        $userModel  = new User();
        $storeModel = new Store();
        $userModel->name  = $request->name;
        $userModel->email = $request->email;
        $userModel->phone = $request->phone;
        $userModel->is_admin  = 0;
        $userModel->avatar = '/1.png';
        $userModel->password = Hash::make($request->password);
        $userModel->status = "DISABLE";
        $userModel->save();

        $storeModel->peson = $request->peson;
        $storeModel->tax_code  = $request->tax_code;
        $storeModel->address = $request->address;
        $storeModel->cate_sell  = $request->cate_sell;
        $storeModel->user_id  = $userModel->id;
        $storeModel->save();

        return redirect()->route('login')->with('success', "Đã đăng kí thành công. Hãy đợi quản trị duyệt.");
    }

    
    public function _validateInsert($request){
        $attribute = array(
            'name'  => trans('backend.user.name'),
            'email' => trans('backend.user.email'),
            'phone' => trans('backend.user.phone')
        );
        $rules  = array(
            'name'    => 'required|max:255',
            'email'   => 'required|max:255|email',
            'phone'   => 'required|max:15',
            'password'    => 'required|max:255',
            'peson'   => 'required|max:255',
            'tax_code'   => 'required|max:15',
            'address'   => 'required|max:255',
            'cate_sell'   => 'required|max:15',
        );
        $messages = array();
        return $this->validate($request, $rules, $messages, $attribute);
    }

    public function redirectPath() {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/admin';
    }


}
