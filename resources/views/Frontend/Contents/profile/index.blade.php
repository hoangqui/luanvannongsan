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
                    <a href="{{ route('home.index') }}">Trang chủ</a> / <span>Thông tin khách hàng</span>
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
                                        <a class="{{ request()->is('customer/profile') ? 'text-primary text-bold' : '' }} " href="{{ route('customer.profile') }}">Thông tin người dùng</a></li>
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
                                <h2 class="title-login">{{ trans('frontend.profile.lable') }}</h2>
                                @if (Session::has('actions') && Session::get('actions') == 'success')
                                    <p class="text-success">
                                        Cập nhật mật khẩu thành công
                                    </p>
                                    @endif
                                <form action="{{ route('customer.profile.post') }}" method="POST" class="contact-form login-form">    
                                    @csrf
                                    <div class="form-block">
                                        <input name="name" class="input-form" type="text" placeholder="{{ trans('frontend.customer.name') }}" value="{{ @Auth::guard('customer')->user()->name }}">
                                        @if ($errors->has('name'))
                                            <br>
                                            <p class="text-left text-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-block">
                                        <input name="email" class="input-form" type="email" placeholder="{{ trans('frontend.customer.email') }}" disabled value="{{ @Auth::guard('customer')->user()->email }}">
                                        @if ($errors->has('email'))
                                        <br>
                                            <p class="text-left text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-block">
                                        <input name="phone" class="input-form" type="phone" placeholder="{{ trans('frontend.customer.phone') }}" value="{{ @Auth::guard('customer')->user()->phone }}">
                                        @if ($errors->has('phone'))
                                        <br>
                                            <p class="text-left text-danger">{{ $errors->first('phone') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-block">
                                        <input name="address" class="input-form" type="address" placeholder="{{ trans('frontend.customer.address') }}"  value="{{ @Auth::guard('customer')->user()->address }}">
                                        @if ($errors->has('address'))
                                        <br>
                                            <p class="text-left text-danger">{{ $errors->first('address') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-block">
                                        <textarea name="node" style="width: 100%;" placeholder="Ghi chú của bạn">{{ @Auth::guard('customer')->user()->node }}</textarea>
                                    </div>


                                    <div class="form-block">
                                        <button type="submit" class="beta-btn primary">{{ trans('frontend.profile.send') }} <i class="fa fa-chevron-right"></i></button>
                                    </div>
                                </form>
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

