@extends('Frontend.Layouts.default')
@section ('title', @$post->title)
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <div class="beta-breadcrumb font-large">
                    <a href="{{ route('home.index') }}">Trang chủ</a>
                    / <span> Bài viết</span>  / <span> {{ @$post->title }} </span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">
                    <div class="beta-blog beta-blog-e beta-blog-single">
                        <div class="beta-blog-header">
                            <div class="media">
                                <div class="pull-left">
                                    <span class="beta-blog-type pull-left"><i class="fa fa-picture-o"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="media-body">
                                    <h5 class="beta-blog-title"><a href="single_type_image.html">
                                    {{ @$post->title }}</a></h5>
                                    <p>Người đăng: <a href="#">{{ @$post->user->name }}</a> | Ngày đăng: <a href="blog_fullwidth_2col.html">{{ @$post->created_at }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="beta-blog-content">
                            <div class="mb20"><a href="#"><img src="{{ url('').$post->url_image }}" alt=""></a></div>
                            <div class="beta-blog-excerpt">
                                <p>{!! @$post->description !!}</p>
                                <p>
                                    {!! @$post->content !!}
                                </p>
                            </div>
                        </div>
                    </div> <!-- .beta-blog item -->

                    <hr class="mb40">
                    
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

