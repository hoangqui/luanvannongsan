<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ trans('backend.name_website') }}*</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link href="{{ url('Nifty') }}/css/nifty.min.css" rel="stylesheet">
        <!-- Nifty front awesome -->
        <link href="{{ url('Nifty/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- Nifty datepicker -->
        <link href="{{ url('Nifty/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <script type="text/javascript">
            baseUrl = '{{ url("") }}';
            window.Laravel = {!! json_encode([
                'baseUrl' => url('/'),
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <body>
        <div id="container" class="cls-container">
            <div id="bg-overlay"></div>
            <div class="cls-content">
                <div class="cls-content-sm panel">
                    <div class="panel-body" style="background-color: #fff">
                        <div class="mar-ver pad-btm">
                            <h1 class="h3">Đăng kí quản lí</h1>
                            <p>Trang quản lí </p>
                        </div>
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Đăng kí') }}">
                            @csrf
                            <div class="form-group">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Tên của hàng">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="peson" type="text" class="form-control{{ $errors->has('peson') ? ' is-invalid' : '' }}" name="peson" value="{{ old('peson') }}" required autofocus placeholder="Chủ cửa hàng">

                                @if ($errors->has('peson'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('peson') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="tax_code" type="text" class="form-control{{ $errors->has('tax_code') ? ' is-invalid' : '' }}" name="tax_code" value="{{ old('tax_code') }}" required autofocus placeholder="Mã số thuế">

                                @if ($errors->has('tax_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tax_code') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email (Tài khoản đăng nhập)">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Địa chỉ" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="cate_sell" type="text" class="form-control{{ $errors->has('cate_sell') ? ' is-invalid' : '' }}" name="cate_sell" placeholder="Mặt hàng muốn bán" value="{{ old('cate_sell') }}" required>

                                @if ($errors->has('cate_sell'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cate_sell') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="phone" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Số điện thoại" value="{{ old('address') }}" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Mật khẩu" value="{{ old('password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Nhập lại mật khẩu" value="{{ old('password_confirmation') }}" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button class="btn btn-primary btn-lg btn-block" type="submit">{{ __('Đăng kí') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--jQuery [ REQUIRED ]-->
        <script src="{{ url('') }}/Nifty/js/jquery.min.js"></script>

        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="{{ url('') }}/Nifty/js/bootstrap.min.js"></script>
        <script src="{{ url('') }}/Nifty/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="{{ url('') }}/Nifty/plugins/momentjs/moment.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script src="{{ url('Nifty') }}/js/nifty.min.js"></script>
    </body>
</html>