@extends('Backend.Layouts.default')
@section ('title', 'ZeLike 澤樣室內設計')
@section('content')
<div id="content-container">
	<div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow"> {!! trans('backend.tag.tag') !!} </h1>
        </div>
        <ol class="breadcrumb">
			<li><a href="#"><i class="demo-pli-home"></i></a></li>
			<li><a href="#">{{ isset($tag) ? trans('backend.actions.update') : trans('backend.actions.create') }}</a></li>
        </ol>
    </div>
	<div id="page-content">
        <div class="panel">
            <div class="panel">
	            <div class="panel-heading">
	               	<div class="panel-heading">
		                <h3 class="panel-title text-main text-bold mar-no">
		                	<i class="ti-pencil"></i> {{ isset($tag) ? trans('backend.actions.update') : trans('backend.actions.create') }} 
		                </h3>
		            </div>
	            </div>

                <div class="panel-body">
                	<div class="col-md-12">
                		<div class="tab-base">
                		    <!--Nav Tabs-->
                		    <ul class="nav nav-tabs tabs-border">
                		        <li class="active">
                		            <a data-toggle="tab" href="#demo-lft-tab-1">{!! trans('backend.tag.garena') !!}</a>
                		        </li>
                		    </ul>
                			@if (isset($tag))
								<form action="{{ route('tags.update', @$tag->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate >
									@method('PUT')
                			@else 
                				<form action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                					@method('POST')
                			@endif
    		                @csrf
	                		    <!--Tabs Content-->
	                		    <div class="tab-content">
	                		    	<!-- Tab language -->
	                		        <div id="demo-lft-tab-1" class="tab-pane fade active in">
	                		        	<div class="panel-body col-sm-offset-1">
					                        <div class="col-sm-10">
					                            <div class="form-group">
					                                <label class="control-label text-bold">
					                                	{!! trans('backend.tag.name') !!}
					                                	<span class="text-danger">*</span>
					                                </label>

					                                <input required type="text" name="name" class="form-control" 
					                                value="{{ @$tag->name ? $tag->name : old('name') }}">

					                                @if ($errors->has('name'))
						                            	<p class="text-left text-danger">{{ $errors->first('name') }}</p>
						                            @endif
					                            </div>
					                        </div> 
			                                <div class="col-sm-10"  style="margin-bottom: 15px;">
			                                    <div class="form-group has-feedback row">
			        	                            <label class="col-sm-3 control-label text-bold" style="padding-top: 10px;">{!! trans('backend.status.status') !!}
			        	                            </label>
			        	                            <div class="col-sm-7">
			        	                                <div class="radio">
			        	                                    <input id="AVAILABLE" class="magic-radio" type="radio" name="status" value="{{ App\Libs\Configs\StatusConfig::CONST_AVAILABLE }}" 
			        	                                    @if (statusAvailable(old('status')) || statusAvailable(@$tag->status) )
																checked
			        	                                    @endif
			        	                                    checked 
			        	                                    >
			        	                                    <label for="AVAILABLE">{!! trans('backend.status.available') !!}</label>
			        	
			        	                                    <input id="DISABLE" class="magic-radio" type="radio" name="status" value="{{ App\Libs\Configs\StatusConfig::CONST_DISABLE }}"
		            	                                    @if (statusDisable(old('status')) || statusDisable(@$tag->status) )
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
	
@endsection

@section ('myCss')
	
@endsection

