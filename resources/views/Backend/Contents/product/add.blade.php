@extends('Backend.Layouts.default')
@section ('title', 'ZeLike 澤樣室內設計')
@section('content')
<div id="content-container">
	<div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow"> {!! trans('backend.product.product') !!} </h1>
        </div>
        <ol class="breadcrumb">
			<li><a href="#"><i class="demo-pli-home"></i></a></li>
			<li><a href="#">{{ isset($product) ? trans('backend.actions.update') : trans('backend.actions.create') }}</a></li>
        </ol>
    </div>
    @php
		$languages = app('Language')->getLanguage();
    @endphp
	<div id="page-content">
        <div class="panel">
            <div class="panel">
	            <div class="panel-heading">
	               	<div class="panel-heading">
		                <h3 class="panel-title text-main text-bold mar-no">
		                	<i class="ti-pencil"></i> {{ isset($product) ? trans('backend.actions.update') : trans('backend.actions.create') }} 
		                </h3>
		            </div>
	            </div>

                <div class="panel-body">
                	<div class="col-md-12">
                		<div class="tab-base">
                		    <!--Nav Tabs-->
                		    <ul class="nav nav-tabs tabs-border">
                		        <li class="active">
                		            <a data-toggle="tab" href="#demo-lft-tab-1">{!! trans('backend.product.garena') !!}</a>
                		        </li>
                		        <li>
                		            <a data-toggle="tab" href="#demo-lft-tab-2">{!! trans('backend.product.seo') !!}</a>
                		        </li>
                		    </ul>
                			@if (isset($product))
								<form action="{{ route('products.update', @$product->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
									@method('PUT')
                			@else 
                				<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                					@method('POST')
                			@endif
	    		                @csrf
	                		    <div class="tab-content">
	                		        <div id="demo-lft-tab-1" class="tab-pane fade active in">
	                		        	<div class="panel-body col-sm-offset-1">
	                		        		<div class="tab-base">
	                		        		    <div class="tab-content">
													<!-- Title -->
													<div class="col-sm-11">
							                            <div class="form-group">
							                                <label class="control-label text-bold">
							                                	{!! trans('backend.product.code') !!}
							                                	<span class="text-danger">*</span>
							                                </label>

							                                <input  type="text" name="code" class="form-control" 
							                                value="{{ @$product->code ? $product->code : old('code') }}">

							                                @if ($errors->has('code'))
								                            	<p class="text-left text-danger">{{ $errors->first('code') }}</p>
								                            @endif
							                            </div>
							                        </div> 
							                        <div class="col-sm-11">
							                            <div class="form-group">
							                                <label class="control-label text-bold">
							                                	{!! trans('backend.product.name') !!}
							                                	<span class="text-danger">*</span>
							                                </label>

							                                <input  type="text" name="name" class="form-control" 
							                                value="{{ @$product->name ? $product->name : old('name') }}">

							                                @if ($errors->has('name'))
								                            	<p class="text-left text-danger">{{ $errors->first('name') }}</p>
								                            @endif
							                            </div>
							                        </div> 

	                        						<!-- Old price -->
	                                                <div class="col-sm-11">
	                                                    <div class="form-group">
	                                                        <label class="control-label text-bold">
	                                                        	{!! trans('backend.product.old_price') !!}
	                                                        	<span class="text-danger">*</span>
	                                                        </label>

	                                                        <input  type="text" name="old_price" class="form-control" 
	                                                        value="{{ @$product->old_price ? $product->old_price : old('old_price') }}">
	                                                    </div>
	                                                </div>

                            						<!-- New price -->
                                                    <div class="col-sm-11">
                                                        <div class="form-group">
                                                            <label class="control-label text-bold">
                                                            	{!! trans('backend.product.new_price') !!}
                                                            	<span class="text-danger">*</span>
                                                            </label>

                                                            <input  type="text" name="new_price" class="form-control" 
                                                            value="{{ @$product->new_price ? $product->new_price : old('new_price') }}">

                                                            @if ($errors->has('new_price'))
                            	                            	<p class="text-left text-danger">{{ $errors->first('new_price') }}</p>
                            	                            @endif
                                                        </div>
                                                    </div> 

                                                    <!-- qunlity -->
                                                    <div class="col-sm-11">
                                                        <div class="form-group">
                                                            <label class="control-label text-bold">
                                                            	{!! trans('backend.product.qty') !!}
                                                            	<span class="text-danger">*</span>
                                                            </label>

                                                            <input  type="text" name="qty" class="form-control" 
                                                            value="{{ @$product->qty ? $product->qty : old('qty') }}">

                                                            @if ($errors->has('qty'))
                            	                            	<p class="text-left text-danger">{{ $errors->first('qty') }}</p>
                            	                            @endif
                                                        </div>
                                                    </div>

	        		                                <div class="col-sm-10">
	        	    		                            <div class="form-group">
	        	    		                                <label class="control-label text-bold">
	        	    		                                	{!! trans('backend.product.category') !!}
	        	    		                                	<span class="text-danger">*</span>
	        	    		                                	
	        	    		                                </label>
	        	    		                                <select class="selectpicker" data-live-search="true" data-width="100%"name="category_id">
	        					                                <option value="0">-- {{ trans('backend.product.category') }} --</option>
	        					                                {{ showCategories($categories, 0, "--", @$product->category_id ? $product->category_id : old('category_id'), -1 ) }}
	        					                            </select>
	        	    		                                @if ($errors->has('parent_id'))
	        	    			                            	<p class="text-left text-danger">{{ $errors->first('parent_id') }}</p>
	        	    			                            @endif
	        	    		                            </div>
	            		                       		</div>
	                                                
							                        <!-- description -->
							                        <div class="col-sm-11">
					                                    <div class="form-group">
					                                        <label class="control-label text-bold">
					                                        	{!! trans('backend.product.description') !!}
					                                        </label>

					                                        <textarea id="description" name="description" placeholder="{!! trans('backend.product.description') !!}" rows="5" class="form-control">{{ @$product->description ? $product->description : old('description') }}</textarea>
					                                    </div>
					                                </div>
													<!-- content -->
					                                <div class="col-sm-11">
					                                    <div class="form-group">
					                                        <label class="control-label text-bold">
					                                        	{!! trans('backend.product.content') !!}
					                                        </label>

					                                        <textarea class="my-ckeditor" name="content" placeholder="{!! trans('backend.product.content') !!}" rows="5" class="form-control">{{ @$product->specification ? $product->specification : old('content') }}</textarea>
					                                    </div>
					                                </div>
													<!-- tag -->
													<div class="col-sm-11">
					                                    <div class="form-group">
					                                        <label class="control-label text-bold">
					                                        	{!! trans('backend.product.tag') !!}
					                                        </label>
															<input type="text" class="form-control" placeholder="Type to add a tag" data-role="tagsinput"  value="{{ @$product->tag ? $product->tag : old('tag') }}" name="tag" >
					                                    </div>
					                                </div>

					                                <!-- image -->
	            			                        <div class="col-sm-10">
	        				                            <div class="form-group">
	        				                                <label class="control-label text-bold">
	        				                                	{!! trans('backend.product.image') !!} <span class="text-danger"> (*)</span>
	        				                                </label>
	        				                                 <div class="input-group">
	        													<span class="input-group-btn">
	        														<a data-input="thumbnail" data-preview="holder" class="btn btn-primary my-lfm" type="'image'">
	        															<i class="fa fa-picture-o"></i> Choose
	        														</a>
	        													</span>
	        													<input id="thumbnail" class="form-control" type="text" name="url_image" value="{{ @$product->image ? $product->image: @old('url_image') }}">
	        												</div>
	        												<img id="holder" 
	        													@if (@$product->image || @old('url_image'))
	        	    			                            	 	src="{{ url('') }}/{{ @$product->image ? $product->image : @old('url_image') }}" 
	        													@endif style="margin-top:15px;max-height:100px;">
	        				                                @if ($errors->has('url_image'))
	        					                            	<p class="text-left text-danger">{{ $errors->first('url_image') }}</p>
	        					                            @endif
	        				                            </div>
	        				                        </div>

													{{--<div class="col-md-10">--}}
														{{--<div class="row">--}}
															{{--<div class="col-sm-10">--}}
																{{--<a id="add-image-detail" class="btn btn-purple"><i class="demo-pli-add"></i>--}}
																{{--{{ trans('backend.product.add') }}</a>--}}
															{{--</div>--}}
															{{--@php--}}
																{{--$images = ( isset($product) && json_decode($product->image_detail) ) ? json_decode($product->image_detail) : (old('image_detail') ? old(image_detail) : array() );--}}
															{{--@endphp--}}
			        				                        {{--<div class="col-sm-10" id="image-detail" style="margin-top:10px;">--}}
									                        	{{--@foreach ($images as $key => $value) --}}
																	{{--<div>--}}
																		{{--<div class="col-sm-6" style="padding:0px;">--}}
																			{{--<div class="input-group">--}}
																			   {{--<span class="input-group-btn">--}}
																			    {{--<a data-input="thumbnail{{ $key }}" data-preview="holder{{$key}}" class="lfm btn btn-primary">--}}
																			       {{--<i class="fa fa-picture-o"></i> {{ trans('backend.product.image_detail') }}--}}
																			    {{--</a>--}}
																			    {{--<button type="button" class="btn btn-danger btn-icon delete-imgdetail">--}}
								    		                                		{{--<i class="fa fa-trash icon-lg"></i>--}}
								    		                                	{{--</button>--}}
																			    {{--</span>--}}
																			    {{--<input id="thumbnail{{ $key }}" value="{{ $value }}" class="form-control" type="text" name="image_detail[]" style="display: none">--}}
																			 {{--</div>--}}
																			 {{--<img id="holder{{$key}}" src="{{ url('') }}/{{$value}}" style="margin-top:15px; margin-bottom: 5px;max-height:100px;">--}}
																		{{--</div>--}}
																	{{--</div>--}}
									                            {{--@endforeach--}}
									                        {{--</div>--}}
														{{--</div>--}}
													{{--</div>--}}

	        				                        <!-- status -->
					                                <div class="col-sm-11"  style="margin-bottom: 15px;">
					                                    <div class="form-group has-feedback row">
					        	                            <label class="col-sm-3 control-label text-bold" style="padding-top: 11px;">{!! trans('backend.product.status') !!}
					        	                            </label>
					        	                            <div class="col-sm-7">
					        	                                <div class="radio">
					        	                                    <input id="AVAILABLE" class="magic-radio" type="radio" name="status" value="{{ App\Libs\Configs\StatusConfig::CONST_AVAILABLE }}" 
					        	                                    @if (statusAvailable(old('status')) || statusAvailable(@$product->status) )
																		checked
					        	                                    @endif
					        	                                    checked 
					        	                                    >
					        	                                    <label for="AVAILABLE">{!! trans('backend.category.available') !!}</label>
					        	
					        	                                    <input id="DISABLE" class="magic-radio" type="radio" name="status" value="{{ App\Libs\Configs\StatusConfig::CONST_DISABLE }}"
				            	                                    @if (statusDisable(old('status')) || statusDisable(@$product->status) )
				    													checked
				            	                                    @endif>
					        	                                    <label for="DISABLE"> {!! trans('backend.category.disable') !!}</label>
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

			                                        <input type="text" name="meta_title" class="form-control" value="{{ @$product->meta_title ? $product->meta_title : old('meta_title') }}">
			                                    </div>
			                                </div>
			                                <div class="col-sm-11">
			                                    <div class="form-group">
			                                        <label class="control-label text-bold">
			                                        	{!! trans('backend.seo.meta_keyword') !!}
			                                        </label>

			                                        <input type="text" name="meta_keyword" class="form-control" value="{{ @$product->meta_keyword ? $product->meta_keyword : old('meta_keyword') }}">
			                                    </div>
			                                </div>
					                        <div class="col-sm-11">
					                            <div class="form-group">
					                                <label class="control-label text-bold">
					                                	{!! trans('backend.seo.meta_description') !!} 
					                                </label>
					                                <textarea name="meta_description" placeholder="{!! trans('backend.product.meta_description') !!}" rows="5" class="form-control">{{ @$product->meta_description ? $product->meta_description : old('meta_description') }}</textarea>
					                            </div>
					                        </div>
			                                <div class="col-sm-11">
			                                    <div class="form-group">
			                                        <label class="control-label text-bold">
			                                        	{!! trans('backend.seo.meta_content') !!}
			                                        </label>
			                                        <textarea name="meta_content" placeholder="{!! trans('backend.product.meta_content') !!}" rows="5" class="form-control">{{ @$product->meta_content ? @$product->meta_content : old('meta_content')}}</textarea>
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

    		toolbar = [
               [ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
               [ 'FontSize', 'TextColor', 'BGColor', 'Table' ]
            ];
    		CKEDITOR.replace('description', {toolbar: toolbar});

		    var domain = '{{ url('') }}' + '/admin/laravel-filemanager';
		    	var loadAction = function () {
			    	$('[class*="lfm"]').each(function() {
		    	        $('.lfm').filemanager('image', {prefix: domain});
		    	    });
		    	    $('.delete-imgdetail').click(function () {
			    		$(this).parent().parent().parent().html('');
			    	});
		    	}	
		    	loadAction();
		    	var count = $('.lfm').length + 1;
	    	    $('#add-image-detail').click(function () {
	    	    	count += 1;
	    	    	var html = '<div><div class="col-sm-6" style="padding:0px;"> <div class="input-group"><span class="input-group-btn"><a data-input="thumbnail' + count + '" data-preview="holder' + count + '" class="lfm btn btn-primary"><i class="fa fa-picture-o"></i> {{ trans('backend.product.image_detail') }}</a><button type="button" class="btn btn-danger btn-icon delete-imgdetail"><i class="fa fa-trash icon-lg"></i></button></span><input id="thumbnail' + count + '" class="form-control" type="text" name="image_detail[]" style="display: none"></div><img id="holder'+ count +'" style="margin-top:15px; margin-bottom: 5px;max-height:100px;"></div> </div>'
	    	    	$('#image-detail').append(html);
	    	    	loadAction();
	    	    });
		});

	</script>
@endsection

@section ('myCss')
	
@endsection

