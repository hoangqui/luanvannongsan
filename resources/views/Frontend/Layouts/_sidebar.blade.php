@php
	$categories   = app('Category')->listCategory();
	$hot_products = app('Product')->getProduct(4);
	$tags         = app('Product')->getTag();
@endphp

<div class="col-sm-3 aside">
	<div class="widget">
		<h3 class="widget-title">{{ trans('frontend.category') }}</h3>
		<div class="widget-body">
			{{ showCategory($categories, 0) }}
		</div>
	</div> <!-- brands widget -->

	<div class="widget">
		<h3 class="widget-title">{{ trans('frontend.hot_product') }}</h3>
		<div class="widget-body">
			<div class="beta-sales beta-lists">
				@foreach ($hot_products as $key => $hot_product)
				<div class="media beta-sales-item">
					<a class="pull-left" href="">
						<img src="{{ url('').@$hot_product->image }}" alt=""></a>
					<div class="media-body">
						{{ @$hot_product->name.' - '.@$hot_product->code }}
						<span class="beta-sales-price">
							<p class="flash-sale">{{ number_format(@$product->new_price,  0, ".", ",") }}VND</p>
						</span>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div> <!-- best sellers widget -->

	<div class="widget">
		<h3 class="widget-title">{{ trans('frontend.tag') }}</h3>
		<div class="widget-body">
			<div class="beta-tags">
				@foreach ($tags as $tag)
				<a href="{{ route('home.search.list', ['freeText'=> @$tag->name]) }}">{{ @$tag->name }}</a>
				@endforeach
			</div>
		</div>
	</div> <!-- tags cloud widget -->
</div> 