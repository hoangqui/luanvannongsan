@extends('Frontend.Layouts.default')
@section ('title', 'Giỏ hàng')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Giỏ hàng</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{ route('home.index') }}">Trang chủ</a> / <span>Giỏ hàng</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container" ng-controller="cartCtrl">
	<div id="content">
		<div class="table-responsive">
			<table class="shop_table beta-shopping-cart-table" cellspacing="0">
				<thead>
					<tr>
						<th class="product-name">Sản phẩm</th>
						<th class="product-price">Giá</th>
						<th class="product-quantity">Số lượng.</th>
						<th class="product-subtotal">Tổng giá</th>
						<th class="product-remove">Xóa khỏi giỏ</th>
					</tr>
				</thead>
				<tbody>
					<tr class="cart_item" ng-repeat="(key, cartItem) in listCarts">
						<td class="product-name">
							<div class="media">
								<img style="width: 80px;" class="pull-left" ng-src="{{ url('') }}@{{ cartItem.options.image }}" alt="">
								<div class="media-body">
									<a href=""><p class="font-large table-title">@{{ cartItem.name }}</p></a>
									<a href=""><p class="font-large table-title">Mã sản phẩm: @{{ cartItem.options.code }}</p></a>
								</div>
							</div>
						</td>

						<td class="product-price">
							<span class="amount">@{{ actions.formatMoney(cartItem.price) }} VNĐ</span>
						</td>

						<td class="product-quantity">
							<input type="number" class="input-form" ng-model="cartItem.qty" ng-change="actions.updateCart(cartItem.rowId, cartItem.qty, key)">
						</td>

						<td class="product-subtotal">
							<span class="amount">@{{ actions.formatMoney(cartItem.price*cartItem.qty) }} VNĐ</span>
						</td>

						<td class="product-remove">
							<a ng-click="actions.deleteCart(cartItem.rowId)" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
				</tbody>
			</table>
			<!-- End of Shop Table Products -->
		</div>


		<!-- Cart Collaterals -->
		<div class="cart-collaterals">
			<div class="cart-totals pull-right">
				<div class="cart-totals-row"><h5 class="cart-total-title">Tổng tiền</h5></div>
				<div class="cart-totals-row"><span>Tổng tiền:</span> <span>@{{ totalCart }} VNĐ</span></div>
				<div class="cart-totals-row"><span>Phí vận chuyển:</span> <span>Miễn phí</span></div>
				<div class="cart-totals-row"><span>Tổng đơn:</span> <span>@{{ totalCart }} VNĐ</span></div>

				<div class="cart-totals-row pull-right mar-r-10">
					<a href="{{ route('home.checkout') }}" class="beta-btn primary text-center">Thanh toán<i class="fa fa-chevron-right"></i></a>
				</div>
				
			</div>

			<div class="clearfix"></div>
		</div>
		<!-- End of Cart Collaterals -->
		<div class="clearfix"></div>
	</div> 
</div>

@endsection
	
@section ('myJs')
	
@endsection

@section ('myCss')
	
@endsection

@section ('metaData')

@endsection

