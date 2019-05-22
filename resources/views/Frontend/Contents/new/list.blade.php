@extends('Frontend.Layouts.default')
@section ('title', 'Kiến thức cần biết')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Kiến thức</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('home.index') }}">Trang chủ</a> / <span>Kiến thức</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				@includeif ('Frontend.Layouts._sidebar')
				<div class="col-sm-9">

					@foreach ($posts as $key => $post)
						<div class="beta-blog beta-blog-a">
							<div class="beta-blog-header">
								<div class="media">
									<div class="pull-left">
										<span class="beta-blog-type pull-left"><i class="fa fa-picture-o"></i></span>
										<div class="clearfix"></div>
									</div>
									<div class="media-body">
										<h5 class="beta-blog-title"><a href="{{ route('home.new.detail', array($post->slug, $post->id)) }}">{{ @$post->title }}</a></h5>
										<p>Người đăng: <a href="#">{{ @$post->user->name }}</a> | Ngày đăng: {{ @$post->created_at }}
									</div>
								</div>
							</div>

							<div class="row beta-blog-content">
								<div class="col-sm-6"><a href="{{ route('home.new.detail', array($post->slug, $post->id)) }}"><img src="{{ url('').@$post->url_image }}" alt=""></a></div>
								<div class="col-sm-6">
									{!!@$post->description !!}
									<a href="{{ route('home.new.detail', array($post->slug, $post->id)) }}" class="beta-btn primary">Xem tiếp <i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
						</div> <!-- .beta-blog item -->
					@endforeach
					<div class="text-center">
						{{ $posts->links() }}
					</div>
				</div>
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

