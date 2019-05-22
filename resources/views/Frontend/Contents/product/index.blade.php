@extends('Frontend.Layouts.default')
@section ('title', @$product->name)
@section('content')
@php
	$related_products = app('Product')->relatedProduct(3);
@endphp
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="index-2.html">Trang chủ</a> / <span>Sản phẩm</span> / <span>{{ @$product->name }}</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container" ng-controller="cartCtrl">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">
				<div class="row">
					<div class="col-sm-4">
						<img src="{{ url('').$product->image }}" alt="">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title">{{ @$product->name }}</p>
							<p class="">{{ trans('frontend.product.code') }}: <span class="text-danger">{{ @$product->code }}</span></p>
							<br>
							<p class="single-item-price">
								<p class="single-item-price">
									@if (!empty($product->old_price))
									<p>{{ trans('frontend.product.old_price') }}: <span class="flash-del">{{ number_format(@$product->old_price, 0, ".", ",") }}VND</span> </p>
									@endif
									<p>{{ trans('frontend.product.new_price') }}: <span class="flash-sale">{{ number_format(@$product->new_price, 0, ".", ",") }}VND</span> </p>
								</p>
							</p>
						</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>

						<div class="single-item-desc">
							<p>{{ trans('frontend.product.intro') }}: </p>
							<p>{!! @$product->specification !!}</p>
						</div>
						<div class="space20">&nbsp;</div>

						<p>{{ trans('frontend.product.option') }}:</p>
						<div class="single-item-options" >
							<!-- <select class="wc-select" name="size">
								<option>Size</option>
								<option value="XS">XS</option>
								<option value="S">S</option>
								<option value="M">M</option>
								<option value="L">L</option>
								<option value="XL">XL</option>
							</select>
							<select class="wc-select" name="color">
								<option>Color</option>
								<option value="Red">Red</option>
								<option value="Green">Green</option>
								<option value="Yellow">Yellow</option>
								<option value="Black">Black</option>
								<option value="White">White</option>
							</select> -->
							<input type="number" class="input-form" ng-model="data.qty" placeholder="{{ trans('frontend.product.qty') }}">
							<a class="add-to-cart" ng-click="actions.addCartProduct({{@$product->id}})">
								<i class="fa fa-shopping-cart"></i>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">{{ trans('frontend.product.description') }}</a></li>
					</ul>

					<div class="panel" id="tab-description">
						{!! @$product->description !!}
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>{{ trans('frontend.related_product') }}</h4>

					<div class="row" ng-controller="cartCtrl">
						@foreach ($related_products as $key => $related_product)
						<div class="col-sm-4">
							<div class="single-item">
								<div class="single-item-header">
									<a href="{{ route('home.product.detail', array($related_product->slug, $related_product->id) ) }}">
										<img src="{{ url('').$related_product->image }}" alt=""></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">{{ $related_product->name." - ".$related_product->code }}</p>
									<p class="single-item-price">
										@if (!empty($product->old_price))
										<p>{{ trans('frontend.product.old_price') }}: <span class="flash-del">{{ number_format(@$product->old_price, 0, ".", ",") }}VND</span> </p>
										@endif
										<p>{{ trans('frontend.product.new_price') }}: <span class="flash-sale">{{ number_format(@$product->new_price, 0, ".", ",") }}VND</span> </p>
									</p>
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" ng-click="actions.addCart({{@$related_product->id}})"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="{{ route('home.product.detail', array($related_product->slug, $related_product->id) ) }}">Detail <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			@includeif ('Frontend.Layouts._sidebar')

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

