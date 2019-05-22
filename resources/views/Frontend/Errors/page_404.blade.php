@extends('Frontend.Layouts.default')
@section ('title', '')
@section('content')
<section class="bg-gray">
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Không tìm thấy trang này</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="#">Pages</a> / <span>Page 404</span>
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
					<h2>Lỗi! Trang bạn cần không tìm thấy</h2>
					<div class="space40">&nbsp;</div>
					<img src="{{ url('Frontend') }}/assets/dest/images/404.jpg" alt="">
					<div class="space30">&nbsp;</div>
					<p>Hãy thử tìm kiếm lại...</p>
					<a href="{{ route('home.index') }}" class="beta-btn beta-btn-3d beta-btn-rosy beta-btn-medium"><i class="shift-left shift-left fa fa-gift"></i> Trở về trang chủ</a>
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






