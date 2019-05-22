@extends('Backend.Layouts.default')
@section ('title', 'ZeLike 澤樣室內設計')
@section('content')
	@if (isset($user) && !empty($user))
	<div id="content-container">
		<div id="page-head">
            <div id="page-title">
                <h1 class="page-header text-overflow">{!! trans('backend.user.user') !!}</h1>
            </div>
            <ol class="breadcrumb">
			<li><a href="#"><i class="demo-pli-home"></i></a></li>
			<li><a href="#">{!! trans('backend.actions.update') !!}</a></li>
            </ol>
        </div>
		<div id="page-content">
		    <div class="panel-body">
		        <div class="panel">
		            <div class="panel">
			            <div class="panel-heading">
			                
			            </div>
			            <form action="{{ route('users.updateProfile') }}" method="POST" enctype="multipart/form-data">
			            	@csrf
			            	@method ('POST')
                                <div class="panel-body col-sm-offset-2">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label class="control-label">{!! trans('backend.user.name') !!}</label>
                                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                                @if ($errors->has('name'))
                	                            	<p class="text-left text-danger">{{ $errors->first('name') }}</p>
                	                            @endif
                                            </div>
                                        </div> 
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label class="control-label">{!! trans('backend.user.phone') !!}</label>
                                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                                                @if ($errors->has('phone'))
                	                            	<p class="text-left text-danger">{{ $errors->first('phone') }}</p>
                	                            @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label class="control-label">{!! trans('backend.user.email') !!}</label>
                                                <input disabled type="text" name="email" class="form-control" value="{{ $user->email }}">
                                                @if ($errors->has('email'))
                	                            	<p class="text-left text-danger">{{ $errors->first('email') }}</p>
                	                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                               	<div>
                                               		<span class="btn btn-primary btn-file">{!! trans('backend.user.chosse_avatar') !!}
                                               			<input class="myRenderImage" type="file" name="avatar">
                                               		</span>
                                               		<div style="margin-top: 15px;">
                                               			<img id="blah" alt="true" src="{{ url('') }}/{{ $user->avatar }}" style="width: 140px; height: 150px;">
                	                               	</div>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-10"  style="margin-bottom: 15px;">
                                            <div class="form-group has-feedback">
                	                            <label class="col-lg-3 control-label" style="padding-top: 10px;">{!! trans('backend.status.status') !!}</label>
                	                            <div class="col-lg-7">
                	                                <div class="radio">
                	                                    <input id="demo-radio-7" class="magic-radio" type="radio" name="status" disabled value="AVAILABLE" data-bv-field="member" @if($user->status == "AVAILABLE") {{ 'checked' }} @endif>
                	                                    <label for="demo-radio-7">{!! trans('backend.status.available') !!}</label>
                	
                	                                    <input id="demo-radio-8" class="magic-radio" type="radio" name="status" disabled value="DISABLE" data-bv-field="member" @if($user->status == "DISABLE") {{ 'checked' }} @endif>
                	                                    <label for="demo-radio-8">{!! trans('backend.status.dissable') !!}</label>
                	                                </div>
                	                           </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                    	<div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary btn-block btn-form-submit"><i class="ti-save"></i></button>
                                        </div>
                                    </div>
                                </div>
					   	</form>
			        </div>
		        </div>
		    </div>
		</div>
	</div>
	@endif 
@endsection

@section ('myJs')
	@if (Session::has('user') && Session::get('user') == 'success')
    <script>
        $.toast({
            heading: 'Success',
            text: 'Created Success',
            showHideTransition: 'fade',
            position: 'top-right',
            icon: 'success'
        })
    </script>
    @endif
@endsection

@section ('myCss')
	
@endsection


