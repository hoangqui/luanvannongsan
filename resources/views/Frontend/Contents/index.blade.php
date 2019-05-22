@extends('Frontend.Layouts.default')
@section ('title', '')
@section('content')
	<div class="container" ng-controller="cartCtrl">
		<div id="content">
			<div class="main-content">
				@includeif ('Frontend.Layouts._slide')
				<div class="space10">&nbsp;</div>
				<div class="dg">
					<div class="col-4 wow fadeInDown">
						<div class="beta-banner">
							<img src="{{ url('Frontend') }}/assets/dest/images/banners/banner6.jpg" alt="">
							<h2 
								class="beta-banner-layer text-right"
								data-animo='{
									"duration" : 1000,
									"delay" : 100,
									"easing" : "easeOutSine",
									"template" : {
										"opacity" : [0, 1],
										"top" : [30, 30, "px"],
										"right" : [-300, 25, "px"]
									}
								}'
							>Sofas</h2>
							<p 
								class="beta-banner-layer text-right"
								data-animo='{
									"duration" : 1000,
									"delay" : 400,
									"easing" : "easeOutSine",
									"template" : {
										"opacity" : [0, 1],
										"top" : [80, 80, "px"],
										"right" : [-300, 25, "px"]
									}
								}'
							>Nemo enim ipsam <br /> voluptatem quia</p>
							<a 
								class="beta-banner-layer beta-btn text-right banner-color" 
								href="product.html"
								data-animo='{
									"duration" : 1000,
									"delay" : 300,
									"easing" : "easeOutSine",
									"template" : {
										"opacity" : [0, 1],
										"bottom" : [25, 25, "px"],
										"right" : [-300, 25, "px"]
									}
								}'
							>Mua ngay</a>
						</div>
					</div>
					<div class="col-4 wow fadeInDown">
						<div class="beta-banner">
							<img src="{{ url('Frontend') }}/assets/dest/images/banners/banner7.jpg" alt="">
							<h2 
								class="beta-banner-layer text-right"
								data-animo='{
									"duration" : 1000,
									"delay" : 100,
									"easing" : "easeOutSine",
									"template" : {
										"opacity" : [0, 1],
										"top" : [30, 30, "px"],
										"right" : [-300, 25, "px"]
									}
								}'
							>Chairs</h2>
							<p 
								class="beta-banner-layer text-right"
								data-animo='{
									"duration" : 1000,
									"delay" : 400,
									"easing" : "easeOutSine",
									"template" : {
										"opacity" : [0, 1],
										"top" : [80, 80, "px"],
										"right" : [-300, 25, "px"]
									}
								}'
							>Nemo enim ipsam <br /> voluptatem quia</p>
							<a 
								class="beta-banner-layer beta-btn text-right banner-color" 
								href="product.html"
								data-animo='{
									"duration" : 1000,
									"delay" : 300,
									"easing" : "easeOutSine",
									"template" : {
										"opacity" : [0, 1],
										"bottom" : [25, 25, "px"],
										"right" : [-300, 25, "px"]
									}
								}'
							>Mua ngay</a>
						</div>
					</div>
					<div class="col-4 wow fadeInDown">
						<div class="beta-banner">
							<img src="{{ url('Frontend') }}/assets/dest/images/banners/banner8.jpg" alt="">
							<h2 
								class="beta-banner-layer text-right"
								data-animo='{
									"duration" : 1000,
									"delay" : 100,
									"easing" : "easeOutSine",
									"template" : {
										"opacity" : [0, 1],
										"top" : [30, 30, "px"],
										"right" : [-300, 25, "px"]
									}
								}'
							>Light</h2>
							<p 
								class="beta-banner-layer text-right"
								data-animo='{
									"duration" : 1000,
									"delay" : 400,
									"easing" : "easeOutSine",
									"template" : {
										"opacity" : [0, 1],
										"top" : [80, 80, "px"],
										"right" : [-300, 25, "px"]
									}
								}'
							>Nemo enim ipsam <br /> voluptatem quia</p>
							<a 
								class="beta-banner-layer beta-btn text-right banner-color" 
								href="product.html"
								data-animo='{
									"duration" : 1000,
									"delay" : 300,
									"easing" : "easeOutSine",
									"template" : {
										"opacity" : [0, 1],
										"bottom" : [25, 25, "px"],
										"right" : [-300, 25, "px"]
									}
								}'
							>Mua ngay</a>
						</div>
					</div>
				</div>

				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4 class="wow fadeInLeft">{{ trans('frontend.new_product') }}</h4>
					<div class="beta-products-details">
						<p class="pull-left"><a href="{{ route('home.products.new') }}">Xem tất cả</a></p>
						<div class="clearfix"></div>
					</div>

					<div class="row">
						@foreach ($new_products as $key => $new_product)
						<div class="col-sm-3">
							<div class="single-item">
								@if (!empty($new_product->old_price))
								<div class="ribbon-wrapper">
									<div class="ribbon">{{ trans('frontend.sale') }}</div>
								</div>
								@endif
								<div class="single-item-header">
									<a href="{{ route('home.product.detail', array($new_product->slug, $new_product->id) ) }}">
										<img src="{{ url('').$new_product->image }}" alt="">
									</a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">{{ @$new_product->name." - ".@$new_product->code }} </p>
									<div class="single-item-price">
										@if (!empty($new_product->old_price))
											<p class="flash-del">{{ number_format(@$new_product->old_price, 0, ".", ",") }}VND</p>
										@endif
										<p class="flash-sale">{{ number_format(@$new_product->new_price,  0, ".", ",") }}VND</p>
									</div>
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" ng-click="actions.addCart({{@$new_product->id}})"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="{{ route('home.product.detail', array($new_product->slug, $new_product->id) ) }}">Details <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div> <!-- .beta-products-list -->

				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>{{ trans('frontend.hot_product') }}</h4>
					<div class="row">
						@foreach ($hot_products as $key => $hot_product)
							<div class="col-sm-3">
								<div class="single-item">
									@if (!empty($hot_product->old_price))
									<div class="ribbon-wrapper">
										<div class="ribbon">{{ trans('frontend.sale') }}</div>
									</div>
									@endif
									<div class="single-item-header">
										<a href="{{ route('home.product.detail', array($hot_product->slug, $hot_product->id) ) }}">
											<img src="{{ url('').$hot_product->image }}" alt="">
										</a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{ @$hot_product->name." - ".@$hot_product->code }} </p>
										<div class="single-item-price">
											@if (!empty($hot_product->old_price))
												<p class="flash-del">{{ number_format(@$hot_product->old_price, 0, ".", ",") }}VND</p>
											@endif
											<p class="flash-sale">{{ number_format(@$hot_product->new_price,  0, ".", ",") }}VND</p>
										</div>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" ng-click="actions.addCart({{@$hot_product->id}})"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('home.product.detail', array($hot_product->slug, $hot_product->id) ) }}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="space50">&nbsp;</div>

				<div class="dg">
					<div class="col-4">
						<div class="beta-banner">
							<a href="custom_callout_box.html"><img class="h164" src="{{ url('Frontend') }}/assets/dest/images/banners/banner9.jpg" alt=""></a>
						</div>
					</div>
					<div class="col-4">
						<div class="beta-banner">
							<a href="custom_callout_box.html"><img class="h164" src="{{ url('Frontend') }}/assets/dest/images/banners/banner10.jpg" alt=""></a>
						</div>
					</div>
					<div class="col-4">
						<div class="beta-banner">
							<a href="custom_callout_box.html"><img class="h164" src="{{ url('Frontend') }}/assets/dest/images/banners/banner11.jpg" alt=""></a>
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

