@php
	$contact = app('Setting')->getContact();
@endphp

<div id="footer" class="color-div">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">{{ trans('frontend.soical') }}</h4>
						<div id="beta-instagram-feed"><div></div></div>
						<ul>
							<li><a href="{{ @$contact->setting->fb }}"><i class="fa fa-facebook"></i> Facebook</a></li>
							<li><a href="{{ @$contact->setting->twitter }}"><i class="fa fa-twitter"></i> Twitter</a></li>
							<li><a href="{{ @$contact->setting->instagram }}"><i class="fa fa-instagram"></i> Instagram</a></li>
							<li><a href="{{ @$contact->setting->gg_plus }}"><i class="fa fa-google-plus"></i> Google plus</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="widget">
						<h4 class="widget-title">{{ trans('frontend.info') }}</h4>
						<div>
							<ul>
								<li><a href="{{ route('home.index') }}"><i class="fa fa-chevron-right"></i> Trang chủ</a></li>
								<li><a href="{{ route('home.categories.list') }}"><i class="fa fa-chevron-right"></i> Danh mục sản phẩm</a></li>
								<li><a href="{{ route('home.products.hot') }}"><i class="fa fa-chevron-right"></i> Sản phẩm hot</a></li>
								<li><a href="{{ route('home.products.new') }}"><i class="fa fa-chevron-right"></i> Sản phẩm mới</a></li>
								<li><a href="{{ route('home.new.index') }}"><i class="fa fa-chevron-right"></i> Kiến thức bảo hộ</a></li>
								<li><a href="{{ route('contact.index') }}"><i class="fa fa-chevron-right"></i> Liên hệ chúng tôi</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
				  <div class="col-sm-10">
					<div class="widget">
						<h4 class="widget-title">Địa chỉ</h4>
						<div>
							<div class="contact-info">
								<i class="fa fa-map-marker"></i>
								<p><i class="fa fa-location"></i>{{ $contact->setting->address }}</p>
							</div>
							<div class="contact-info">
								<i class="fa fa-phone"></i>
								<p><i class="fa fa-location"></i>{{ $contact->setting->phone }}</p>
							</div>
							<div class="contact-info">
								<i class="fa fa-map-marker"></i>
								<p><i class="fa fa-location"></i>{{ $contact->setting->email }}</p>
							</div>
							
						</div>
					</div>
				  </div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">Newsletter Subscribe</h4>
						<form action="#" method="post">
							<input type="email" name="your_email">
							<button class="pull-right" type="submit">Đăng kí <i class="fa fa-chevron-right"></i></button>
						</form>
					</div>
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- #footer -->
	<div class="copyright">
		<div class="container">
			<p class="text-center">Privacy policy. (&copy;) 2014</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div>