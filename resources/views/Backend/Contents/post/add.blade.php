@extends('Backend.Layouts.default')
@section ('title', 'ZeLike 澤樣室內設計')
@section('content')
<div id="content-container">
	<div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow"> {!! trans('backend.post.post') !!} </h1>
        </div>
        <ol class="breadcrumb">
			<li><a href="#"><i class="demo-pli-home"></i></a></li>
			<li><a href="#">{{ isset($post) ? trans('backend.actions.update') : trans('backend.actions.create') }}</a></li>
        </ol>
    </div>

	<div id="page-content">
        <div class="panel">
            <div class="panel">
	            <div class="panel-heading">
	               	<div class="panel-heading">
		                <h3 class="panel-title text-main text-bold mar-no">
		                	<i class="ti-pencil"></i> {{ isset($post) ? trans('backend.actions.update') : trans('backend.actions.create') }} 
		                </h3>
		            </div>
	            </div>

                <div class="panel-body">
                	<div class="col-md-12">
                		<div class="tab-base">
                		    <!--Nav Tabs-->
                		    <ul class="nav nav-tabs tabs-border">
                		        <li class="active">
                		            <a data-toggle="tab" href="#demo-lft-tab-1">{!! trans('backend.post.garena') !!}</a>
                		        </li>
                		        <li>
                		            <a data-toggle="tab" href="#demo-lft-tab-2">{!! trans('backend.post.seo') !!}</a>
                		        </li>
                		    </ul>
                			@if (isset($post))
								<form action="{{ route('posts.update', @$post->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
									@method('PUT')
                			@else 
                				<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                					@method('POST')
                			@endif
    		                @csrf
	                		    <!--Tabs Content-->
	                		    <div class="tab-content">
	                		    	<!-- Tab language -->
	                		        <div id="demo-lft-tab-1" class="tab-pane fade active in">
	                		        	<div class="panel-body col-sm-offset-1">
	                		        		<div class="tab-base">
	                		        		    <!--Nav Tabs-->
	                		        		    <div class="tab-content">
													<!-- Title -->
							                        <div class="col-sm-11">
							                            <div class="form-group">
							                                <label class="control-label text-bold">
							                                	{!! trans('backend.post.title') !!}
							                                	<span class="text-danger">*</span>
							                                </label>

							                                <input  type="text" name="title" class="form-control" 
							                                value="{{ @$post->title ? $post->title : old('title') }}">

							                                @if ($errors->has('title'))
								                            	<p class="text-left text-danger">{{ $errors->first('title') }}</p>
								                            @endif
							                            </div>
							                        </div> 
							                        <!-- description -->
							                        <div class="col-sm-11">
					                                    <div class="form-group">
					                                        <label class="control-label text-bold">
					                                        	{!! trans('backend.post.description') !!}
					                                        </label>

					                                        <textarea class="my-ckeditor" name="description" placeholder="{!! trans('backend.post.description') !!}" rows="5" class="form-control">{{ @$post->description ? $post->description : old('description') }}</textarea>
					                                    </div>
					                                </div>
													<!-- content -->
					                                <div class="col-sm-11">
					                                    <div class="form-group">
					                                        <label class="control-label text-bold">
					                                        	{!! trans('backend.post.content') !!}
					                                        </label>

					                                        <textarea class="my-ckeditor" name="content" placeholder="{!! trans('backend.post.content') !!}" rows="5" class="form-control">{{ @$post->content ? $post->content : old('content') }}</textarea>
					                                    </div>
					                                </div>
													<!-- tag -->
													<div class="col-sm-11">
					                                    <div class="form-group">
					                                        <label class="control-label text-bold">
					                                        	{!! trans('backend.post.tag') !!}
					                                        </label>
															<input type="text" class="form-control" placeholder="Type to add a tag" data-role="tagsinput"  value="{{ @$post->tag ? $post->tag : old('tag') }}" name="tag" >
					                                    </div>
					                                </div>
					                                <!-- image -->
	            			                        <div class="col-sm-10">
	        				                            <div class="form-group">
	        				                                <label class="control-label text-bold">
	        				                                	{!! trans('backend.post.image') !!} <span class="text-danger"> (*)</span>
	        				                                </label>
	        				                                 <div class="input-group">
	        													<span class="input-group-btn">
	        														<a data-input="thumbnail" data-preview="holder" class="btn btn-primary my-lfm" type="'image'">
	        															<i class="fa fa-picture-o"></i> Choose
	        														</a>
	        													</span>
	        													<input id="thumbnail" class="form-control" type="text" name="url_image" value="{{ @$post->url_image ? $post->url_image: @old('url_image') }}">
	        												</div>
	        												<img id="holder" 
	        													@if (@$post->url_image || @old('url_image'))
	        	    			                            	 	src="{{ url('') }}/{{ @$post->url_image ? $post->url_image : @old('url_image') }}" 
	        													@endif style="margin-top:15px;max-height:100px;">
	        				                                @if ($errors->has('url_image'))
	        					                            	<p class="text-left text-danger">{{ $errors->first('url_image') }}</p>
	        					                            @endif
	        				                            </div>
	        				                        </div>
	        				                        <!-- status -->
					                                <div class="col-sm-11"  style="margin-bottom: 15px;">
					                                    <div class="form-group has-feedback row">
					        	                            <label class="col-sm-3 control-label text-bold" style="padding-top: 11px;">{!! trans('backend.post.status') !!}
					        	                            </label>
					        	                            <div class="col-sm-7">
					        	                                <div class="radio">
					        	                                    <input id="AVAILABLE" class="magic-radio" type="radio" name="status" value="{{ App\Libs\Configs\StatusConfig::CONST_AVAILABLE }}" 
					        	                                    @if (statusAvailable(old('status')) || statusAvailable(@$post->status) )
																		checked
					        	                                    @endif
					        	                                    checked 
					        	                                    >
					        	                                    <label for="AVAILABLE">{!! trans('backend.status.available') !!}</label>
					        	
					        	                                    <input id="DISABLE" class="magic-radio" type="radio" name="status" value="{{ App\Libs\Configs\StatusConfig::CONST_DISABLE }}"
				            	                                    @if (statusDisable(old('status')) || statusDisable(@$post->status) )
				    													checked
				            	                                    @endif>
					        	                                    <label for="DISABLE"> {!! trans('backend.status.disable') !!}</label>
					        	                                </div>
					        	                        	</div>
					                                	</div>
					                            	</div>
                		                    	</div>
	                		        		</div>
                		                    
                		                </div>
            		                </div>
	                		        <!-- Tab detail -->
	                		        <div id="demo-lft-tab-2" class="tab-pane fade">
	                		            <div class="panel-body col-sm-offset-1">
	                					<!-- data-parsley-validate -->
			    		                    <div class="col-sm-11">
			                                    <div class="form-group">
			                                        <label class="control-label text-bold">
			                                        	{!! trans('backend.seo.meta_title') !!}
			                                        </label>

			                                        <input type="text" name="meta_title" class="form-control" value="{{ @$post->meta_title ? $post->meta_title : old('meta_title') }}">
			                                    </div>
			                                </div>
					                        <div class="col-sm-11">
					                            <div class="form-group">
					                                <label class="control-label text-bold">
					                                	{!! trans('backend.seo.meta_description') !!} 
					                                </label>
					                                <textarea name="meta_description" placeholder="{!! trans('backend.post.meta_description') !!}" rows="5" class="form-control">{{ @$post->meta_description ? $post->meta_description : old('meta_description') }}</textarea>
					                            </div>
					                        </div>
			                                <div class="col-sm-11">
			                                    <div class="form-group">
			                                        <label class="control-label text-bold">
			                                        	{!! trans('backend.seo.meta_content') !!}
			                                        </label>
			                                        <textarea name="meta_content" placeholder="{!! trans('backend.post.meta_content') !!}" rows="5" class="form-control">{{ @$post->meta_content ? @$post->meta_content : old('meta_content')}}</textarea>
			                                    </div>
			                                </div>
						                </div>
	                		        </div>
	                		    </div>
	                		    <button type="submit" class="btn btn-primary btn-block btn-form-submit"><i class="ti-save"></i></button>
	                		</form>
                		</div>
                	</div>
                </div>
	        </div>
        </div>
	</div>
</div>
@endsection

@section ('myJs')
	<script>
		$(document).ready(function() {
		    $('.selected-2').select2();
		});
	</script>
@endsection

@section ('myCss')
	
@endsection

