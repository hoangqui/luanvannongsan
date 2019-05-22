@extends('Frontend.Layouts.default')
@section ('title', 'Liên hệ với chúng tôi')
@section('content')
	@php
		$contact = app('Setting')->getContact();
	@endphp
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Liên hệ với chúng tôi</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('home.index') }}">Trang chủ</a> / <span>Liên hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="space20">&nbsp;</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX">
			{{ $contact->setting->google_map }}
		</div>
	</div>
	
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Liên hệ với chúng tôi</h2>
					<div class="space20">&nbsp;</div>
					<p>Điền thông tin của bạn và gửi yêu cầu cho chúng tôi</p>
					@if (Session::has('actions') && Session::get('actions') == 'success')
						<p class="text-success">
							Cập nhật mật khẩu thành công
						</p>
					@endif
					<div class="space20">&nbsp;</div>
					<form action="{{ route('contact.post') }}" method="POST" class="contact-form" >	
						@csrf
						<div class="form-block">
							<input name="name" class="" type="text" placeholder="Tên của bạn" value="{{ old('name') }}">
							@if ($errors->has('name'))
	                        	<p class="text-left text-danger">{{ $errors->first('name') }}</p>
	                        @endif
						</div>
						<div class="form-block">
							<input name="email" type="email" placeholder="Email của bạn" value="{{ old('email') }}">
							@if ($errors->has('email'))
	                        	<p class="text-left text-danger">{{ $errors->first('email') }}</p>
	                        @endif
						</div>
						<div class="form-block">
							<input name="phone" class="input-form" type="text" placeholder="Số điện thoại của bạn" value="{{ old('phone') }}">
							@if ($errors->has('phone'))
	                        	<p class="text-left text-danger">{{ $errors->first('phone') }}</p>
	                        @endif
						</div>
						<div class="form-block">
							<textarea name="message" placeholder="Tin nhắn của bạn">{{ old('message') }}</textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin của chúng tôi</h2>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Địa chỉ: </h6>
					<p>
						{{ $contact->setting->address }}
					</p>

					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Email:</h6>
					<p>
						<a href="mailto:{{ $contact->setting->email }}">{{ $contact->setting->email }}</a>
					</p>

					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Điện thoại liên hệ:</h6>
					<p>
						{{ @$contact->setting->phone }}
					</p>

					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Giờ làm việc:</h6>
					<p>
						{{ @$contact->setting->worktime }}
					</p>

					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Facebook:</h6>
					<p>
						{{@ $contact->setting->fb }}
					</p>
					
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Google:</h6>
					<p>
						{{ @$contact->setting->google_plus }}
					</p>

					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Zalo:</h6>
					<p>
						{{ @$contact->setting->zalo }}
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
	
@section ('myJs')
	
@endsection

@section ('myCss')
	
@endsection

@section ('metaData')

@endsection

