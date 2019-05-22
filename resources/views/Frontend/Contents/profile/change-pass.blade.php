@extends('Frontend.Layouts.default')
@section ('title', 'Người dùng')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Người dùng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('home.index') }}">Trang chủ/a> / <span>Đổi mật khẩu</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">Người dùng</h3>
                        <div class="widget-body">
                            <nav class="navigation">
                                <ul class="mainmenu">
                                    <li>
                                        <a class="{{ request()->is('customer/profile') ? 'text-primary' : '' }} " href="{{ route('customer.profile') }}">Thông tin người dùng</a></li>
                                    <li>
                                        <a class="{{ request()->is('customer/profile/change-password') ? 'text-primary text-bold' : '' }} "  href="{{ route('customer.changPass') }}">Đổi mật khẩu</a></li>
                                    <!-- <li><a href="">Contact us</a></li> -->
                                </ul>
                            </nav>
                        </div>
                    </div> 
                </div> 
                <div class="col-sm-8 main-content pull-right">
                        <div class="space50">&nbsp;</div>
                            <div class="form-center">
                                <div>
                                    <h2 class="title-login">{{ trans('frontend.change_password') }}</h2>
                                    @if (Session::has('actions') && Session::get('actions') == 'success')
                                    <p class="text-success">
                                        Đổi mật khẩu thành công      
                                    </p>
                                    @endif
                                    <form action="{{ route('customer.changPass.post') }}" method="POST" class="contact-form login-form">    
                                        @csrf
                                        <div class="form-block">
                                            <input name="old_password" class="input-form" type="password" placeholder="{{ trans('frontend.customer.old_password') }}">
                                        </div>
                                        @if ($errors->has('old_password'))
                                            <p class="text-left text-danger">{{ $errors->first('old_password') }}</p>
                                            <br>
                                        @endif

                                        <div class="form-block">
                                            <input name="password" class="input-form" type="password" placeholder="{{ trans('frontend.customer.password') }}">
                                        </div>
                                        @if ($errors->has('password'))
                                            <p class="text-left text-danger">{{ $errors->first('password') }}</p>
                                            <br>
                                        @endif

                                        <div class="form-block">
                                            <input name="password_confirm" class="input-form" type="password" placeholder="{{ trans('frontend.customer.password_confirm') }}">
                                        </div>
                                         @if ($errors->has('password_confirm'))
                                            <p class="text-left text-danger">{{ $errors->first('password_confirm') }}</p>
                                            <br>
                                        @endif

                                        <div class="form-block">
                                            <button type="submit" class="beta-btn primary">{{ trans('frontend.login.login') }} <i class="fa fa-chevron-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div> 
    </div> 
@endsection
  
@section ('myJs')
  
@endsection

@section ('myCss')
  
@endsection

@section ('metaData')

@endsection