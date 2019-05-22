@extends('Frontend.Layouts.default')
@section ('title', 'Đặt hàng thành công')
@section('content')
<section class="bg-gray">
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Thanh toán thành công</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="#">Chúc mừng!</a> / <span>Bạn đã đặt hàng thành công.</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content" class="space-top-none space-bottom-none">
			<div class="abs-fullwidth bg-gray">
				<div class="space100">&nbsp;</div>
				<div class="space80">&nbsp;</div>
				<div class="container text-center">
					<h2 class="text-success"> Cảm ơn bạn đã đặt hàng của chúng tôi!!</h2>
					<div class="space40">&nbsp;</div>
					<img src="{{url('Frontend')}}/assets/dest/images/404.jpg" alt="">
					<div class="space30">&nbsp;</div>
					<p>Tiếp tục mua sắm cùng chúng tôi...</p>
					<a href="{{ route('home.index') }}" class="beta-btn beta-btn-3d beta-btn-rosy beta-btn-medium"><i class="shift-left shift-left fa fa-gift"></i> Trở về trang chủ</a>
				</div>
				<div class="space100">&nbsp;</div>
				<div class="space30">&nbsp;</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
</section>
@endsection
	
@section ('myJs')
	
@endsection

@section ('myCss')
	
@endsection

@section ('metaData')

@endsection






