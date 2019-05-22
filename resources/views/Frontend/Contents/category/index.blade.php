@extends('Frontend.Layouts.default')
@section ('title', trans('frontend.product.product'))
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{ route('home.index') }}">Trang chủ</a> / <span>Sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9 main-content pull-right">
				<div class="beta-products-list">
					<h4>{{trans('frontend.product.product')}}</h4>
					<div class="beta-products-details">
						<p class="pull-right">
							<span class="sort-by">Xếp</span>
							<select name="sortproducts" id="sortproducts" class="beta-select-primary">
								<option  @if(request()->get('order') == 'desc') selected  @endif  value="desc">Mới nhât</option>
								<option @if(request()->get('order') == 'price_asc') selected  @endif  value="price_asc">Giá thấp - cao</option>
								<option @if(request()->get('order') == 'price_desc') selected  @endif  value="price_desc">Giá cao - thấp</option>
							</select>
						</p>
						<div class="clearfix"></div>
					</div>

					<div class="row" ng-controller="cartCtrl">
						@foreach ($products as $key => $product)
							<div id="product" class="col-sm-4 product">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{ route('home.product.detail', array($product->slug, $product->id) ) }}">
											<img src="{{url('')}}/{{ @$product->image }}" alt="">
										</a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{ $product->name.' - '.$product->code }}</p>
										<p class="single-item-price">
											@if (!empty($product->old_price))
											<p class="flash-del">{{ number_format(@$product->old_price, 0, ".", ",") }}VND</p>
											@endif
											<p class="flash-sale">{{ number_format(@$product->new_price,  0, ".", ",") }}VND</p>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" ng-click="actions.addCart({{@$product->id}})"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('home.product.detail', array($product->slug, $product->id) ) }}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					{{ $products->appends(request()->except('page'))->links() }}
				</div> <!-- .beta-products-list -->
				<div class="space50">&nbsp;</div>
			</div> <!-- .main-content -->
			@includeif ('Frontend.Layouts._sidebar')
		</div>
	</div> <!-- #content -->
</div> 
@endsection
	
@section ('myJs')
	<script>
		jQuery(document).ready(function($) {
            $('#sortproducts').change(function () {
                window.location = '{{ url("") }}' + "/categories?order=" + $(this).val();
            });
        })
	</script>
@endsection

@section ('myCss')
	
@endsection

@section ('metaData')

@endsection

