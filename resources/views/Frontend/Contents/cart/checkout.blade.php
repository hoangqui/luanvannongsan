@extends('Frontend.Layouts.default')
@section ('title', 'Giỏ hàng')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Thanh toán</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{ route('home.index')  }}">Trang chủ</a> / <span>Thanh toán</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="clearfix"></div>
			<div class="space20">&nbsp;</div>
			
			<form action="{{ route('home.checkout.post') }}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-6">
						<h4>Thông tin thanh toán</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Tên *</label>
							<input type="text" id="name" name="name" required value="{{ old('name') }}">
							@if ($errors->has('name'))
	                        	<p class="text-left text-danger">{{ $errors->first('name') }}</p>
	                        @endif
						</div>

						<div class="form-block">
							<label for="address">Địa chỉ*</label>
							<input type="text" id="address" name="address" required value="{{ old('address') }}">
							@if ($errors->has('address'))
	                        	<p class="text-left text-danger">{{ $errors->first('address') }}</p>
	                        @endif
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required value="{{ old('email') }}">
							@if ($errors->has('email'))
	                        	<p class="text-left text-danger">{{ $errors->first('email') }}</p>
	                        @endif
						</div>

						<div class="form-block">
							<label for="phone">Số điện thoại*</label>
							<input type="text" id="phone" name="phone" required value="{{ old('phone') }}">
							@if ($errors->has('phone'))
	                        	<p class="text-left text-danger">{{ $errors->first('phone') }}</p>
	                        @endif
						</div>
					
						<div class="space30">&nbsp;</div>

						<div class="form-block">
							<label for="notes">Lời nhắn</label>
							<textarea id="notes" name="note"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng</h5></div>
							<div class="your-order-body">
								@foreach (Cart::content() as $cartItem)
									<div class="your-order-item">
										<div class="pull-left">
											<div class="media">
												<img style="width: 80px" src="{{ url('').$cartItem->options->image }}" alt="" class="pull-left">
												<div class="media-body">
													<p class="font-large">{{ $cartItem->name." - ".$cartItem->options->code }} VNĐ</p>
												</div>
											</div>
										</div>
										<div class="pull-right"><h5 class="color-gray">{{ number_format($cartItem->qty*$cartItem->price, 0) }} VNĐ</h5></div>
										<div class="clearfix"></div>
									</div>
								@endforeach

								<div class="your-order-item pbn">
									<div class="pull-left">
										<p class="your-order-f18">Tổng đơn:</p>
										<p class="your-order-f18">Phí vận chuyển</p>
									</div>
									<div class="pull-right">
										<h5 class="color-gray text-right">{{ Cart::subtotal(0) }} VNĐ</h5>
										<p class="your-order-f18 color-gray text-right">Miễn phí</p>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Total:</p></div>
									<div class="pull-right"><h5 class="color-black">{{ Cart::subtotal(0) }} VNĐ</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
						
							<div class="text-center">
								<button class="beta-btn primary" type="submit" href="#">Thanh toán <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div>
@endsection
	
@section ('myJs')
	
@endsection

@section ('myCss')
	
@endsection

@section ('metaData')

@endsection



	
	