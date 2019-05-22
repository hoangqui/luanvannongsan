@extends('Frontend.Layouts.default')
@section ('title', 'Đăng kí')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('home.index') }}">Trang chủ</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
	<div id="content" class="space-top-none text-center">
		<div class="space50">&nbsp;</div>
			<div class="form-center">
				<h2 class="title-login">{{ trans('frontend.register.lable') }}</h2>
				<p>Email của bạn là email để đăng nhập!</p>
				<div class="space20">&nbsp;</div>
				<div class="from-login">
					<form action="{{ route('customer.register.post') }}" method="POST" class="contact-form login-form">	
						@csrf
						<div class="form-block">
							<input name="name" class="input-form" type="text" placeholder="{{ trans('frontend.customer.name') }}"
							value="{{ old('name') }}">
	                        @if ($errors->has('name'))
	                        	<p class="text-left text-danger">{{ $errors->first('name') }}</p>
	                        @endif
						</div>
						<div class="form-block">
							<input name="email" class="input-form" type="email" placeholder="{{ trans('frontend.customer.email') }}" value="{{ old('email') }}">
							@if ($errors->has('email'))
		                    	<p class="text-left text-danger">{{ $errors->first('email') }}</p>
		                    @endif
						</div>
						<div class="form-block">
							<input name="phone" class="input-form" type="text" placeholder="{{ trans('frontend.customer.phone') }}" value="{{ old('phone') }}">
							@if ($errors->has('phone'))
		                    	<p class="text-left text-danger">{{ $errors->first('phone') }}</p>
		                    @endif
						</div>
						<div class="form-block">
							<input name="password" class="input-form" type="password" placeholder="{{ trans('frontend.customer.password') }}">
							@if ($errors->has('password'))
		                    	<p class="text-left text-danger">{{ $errors->first('password') }}</p>
		                    @endif
						</div>
						<div class="form-block">
							<input name="confirm_password" class="input-form" type="password" placeholder="{{ trans('frontend.customer.confirm_password') }}">
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">{{ trans('frontend.register.lable') }} <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> <!-- #content -->
</div>
@endsection
	
@section ('myJs')
	
@endsection

@section ('myCss')
	
@endsection

@section ('metaData')

@endsection




