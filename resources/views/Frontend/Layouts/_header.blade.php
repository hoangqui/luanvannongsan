<div id="header">
	<div class="header-top">
		<div class="container">
			<div class="pull-right auto-width-right">
				<ul class="top-details menu-beta l-inline">
					@if (Auth::guard('customer')->check())
						<li>
							<a href="{{ route('customer.profile') }}"><i class="fa fa-user"></i> {{ Auth::guard('customer')->user()->name }}</a>
						</li>
						<li><a href="{{ route('customer.logout') }}"><i class="fa fa-user"></i> {{ trans('frontend.customer.logout') }}</a></li>
					@else 
						<li><a href="{{ route('customer.login') }}"><i class="fa fa-user"></i> {{ trans('frontend.customer.sign_in') }}</a></li>
						<li><a href="{{ route('customer.register') }}"><i class="fa fa-user"></i> {{ trans('frontend.customer.sign_up') }}</a></li>
					@endif
					<li><a href="{{ route('login') }}"><i class="fa fa-users"></i> Nhà cung cấp</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div> 
	</div> 
	<div class="header-body">
		<div class="container beta-relative">
			<div class="pull-left">
				<a href="{{ route('home.index') }}" id="logo"><img src="{{ url('Frontend') }}/assets/dest/images/logo.png" alt=""></a>
				<span class="slogan">{{ trans('frontend.slogan') }}</span>
			</div>
			<div class="pull-right beta-components space-left ov">
				<div class="space10">&nbsp;</div>
				<div class="beta-comp">
					<form role="search" method="GET" id="searchform" action="{{ route('home.search.list') }}">
				        <input type="text" value="" name="freeText" id="s" placeholder="Search entire store here..." />
				        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</form>
				</div>

				<div class="beta-comp" ng-controller="cartCtrl">
					<div class="cart">
						<div class="beta-select"><i class="fa fa-shopping-cart"></i> <span class="badge">@{{ countCart }}</span></div>
						<div class="beta-dropdown cart-body">
							<div class="cart-item" ng-repeat="(key, itemCart) in listCarts">
								<a class="cart-item-delete" ng-click="actions.deleteCart(key)" style="cursor: pointer;"><i class="fa fa-times"></i></a>
								<div class="media">
									<a class="pull-left" href="#">
										<img ng-src="{{ url('') }}/@{{ itemCart.options.image }}" alt=""></a>
									<div class="media-body">
										<span class="cart-item-title">@{{ itemCart.name+" - "+itemCart.options.code }}</span>
										<!-- <span class="cart-item-options">Size: XS; Colar: Navy</span> -->
										<span class="cart-item-amount">@{{ itemCart.qty }}<span> * @{{ actions.formatMoney(itemCart.price) }} VND</span></span>
									</div>
								</div>
							</div>

							<div class="cart-caption">
								<div class="cart-total text-right">Tổng: <span class="cart-total-value">@{{ totalCart }} VND</span></div>
								<div class="clearfix"></div>

								<div class="center">
									<div class="space10">&nbsp;</div>
									<a href="{{ route('home.cart') }}" class="beta-btn primary text-center">Giỏ <i class="fa fa-chevron-right"></i></a>
									<a href="{{ route('home.checkout') }}" class="beta-btn primary text-center">Thanh toán<i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
					</div> <!-- .cart -->
				</div>
			</div>
			<div class="clearfix"></div>
		</div> 
	</div> 
	<div class="header-bottom">
		<div class="container">
			<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
			<div class="visible-xs clearfix"></div>
			<nav class="main-menu">
				<ul class="l-inline ov">
					<li><a href="{{ route('home.index') }}">Trang chủ</a></li>
					<li><a href="{{ route('home.categories.list') }}">Danh mục sản phẩm</a></li>
					<li><a href="{{ route('home.products.hot') }}">Sản phẩm hot</a></li>
					<li><a href="{{ route('home.products.new') }}">Sản phẩm mới</a></li>
					<li><a href="{{ route('home.new.index') }}">Tin tức nông sản</a></li>
					<li><a href="{{ route('contact.index') }}">Liên hệ chúng tôi</a></li>
				</ul>
				<div class="clearfix"></div>
			</nav>
		</div> 
	</div> 
</div>