@extends('Backend.Layouts.default')
@section ('title', 'ZeLike 澤樣室內設計')
@section('content')
	<div id="content-container" ng-controller="tagCtrl">
		<div id="page-head">
            <div id="page-title">
                <h1 class="page-header text-overflow">{!! trans('backend.tag.tag') !!}</h1>
            </div>
            <ol class="breadcrumb">
				<li><a href="#"><i class="demo-pli-home"></i></a></li>
				<li><a href="#">{!! trans('backend.actions.list') !!}</a></li>
            </ol>
        </div>
		<div id="page-content">
	        <div class="panel">
	            <div class="panel-heading">
	            </div>
	            <div class="panel-body">
	            	<div class="pad-btm form-inline">
			            <div class="row">
			                <div class="col-sm-6 table-toolbar-left">
			                   <a href="{{ route('tags.create') }}" id="demo-btn-addrow" class="btn btn-purple"><i class="ti-plus"></i> {!! trans('backend.actions.create') !!}</a>
			                </div>
			                <div class="col-sm-6 table-toolbar-right">
			                    <div class="form-group col-sm-12">
			                        <input id="demo-input-search2" type="text" placeholder="Tìm kiếm" class="form-control col-sm-
			                        8" autocomplete="off" ng-change="actions.filter()" ng-model="filter.freetext">
			                    </div>
			                </div>
			            </div>
			            
			        </div>
			        <div class="row">
		                <div class="col-sm-6 table-toolbar-left">
		                   <a ng-click="actions.actionCheckAll()" id="demo-btn-addrow" class="btn btn-danger"><i class="ti-minus"></i> {!! trans('backend.actions.delete') !!}</a>
		                </div>
		            </div>
	                <div class="table-responsive">
	                    <table class="table table-bordered table-hover table-vcenter">
	                        <thead>
	                            <tr>
	                            	<th class="text-center">
                        		        <input type="checkbox" ng-model="checker.btnCheckAll" 
                        		        ng-click="actions.checkAll(data.tags)">
	                            	</th>
	                                <th class="text-center">#</th>
	                                <th class="sorting" 
	                                ng-class="scope.filter.orderBy =='name' && filter.reverse ? 'sorting-desc' : 'sorting-asc' " 
	                                ng-click="actions.orderBy('name')">{!! trans('backend.tag.name') !!}</th>
	                                <th class="sorting" 
	                                ng-class="scope.filter.orderBy =='status' && filter.reverse ? 'sorting-desc' : 'sorting-asc' " 
	                                ng-click="actions.orderBy('status')">{!! trans('backend.status.status') !!}</th>
	                                <th>{!! trans('backend.actions.actions') !!}</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <tr ng-repeat="(key, tag) in data.tags">
	                            	<td style="width: 50px" class="text-center"> 
                        		        <input type="checkbox" ng-model="checker.checkedAll[tag.id]" ng-click="actions.checkOrUncheck(checker.checkedAll[tag.id])">
	                            	</td>
	                                <td style="width: 50px"  class="text-center"> @{{ (data.page.current_page - 1) * data.page.per_page + key + 1 }} </td>
	                                <td> @{{ tag.name }} </td>
	                                <td>
	                                	<span class="label label-danger" ng-if="(tag.status == '{{ App\Libs\Configs\StatusConfig::CONST_DISABLE }}')">
	                                	{!! trans('backend.status.disable') !!}</span>

	                                	<span class="label label-success" ng-if="(tag.status == '{{ App\Libs\Configs\StatusConfig::CONST_AVAILABLE }}')">
	                                	{!! trans('backend.status.available') !!}</span>
	                                </td>
	                                <td style="width: 100px">
	                                	<a href="{{ url('admin/tags') }}/@{{ tag.id }}/edit" class="btn btn-info btn-icon btn-sm" title="{!! trans('backend.actions.update') !!}">
	                                		<i class="ti-pencil-alt"></i>
	                                	</a>
	                                	<button class="btn btn-danger btn-sm btn-icon" ng-click="actions.delete(tag.id)" title="{!! trans('backend.actions.delete') !!}">
	                                		<i class="ti-trash"></i> 
	                                	</button>
	                                </td>
	                            </tr>
	                        </tbody>
	                    </table>
	                    <div class="text-center"> 
		                    <div paging
		                      page="data.page.current_page"  
    						  show-first-last="true"
		                      page-size="data.page.per_page" 
		                      total="data.page.total"
		                      paging-action="actions.changePage(page)">
		                    </div> 
	                    </div>
	                </div>
	            </div>
	        </div>
		</div>
	</div>
@endsection

@section ('myJs')
	<script src="{{ url('angularJs/uses/factory/services/tagService.js') }}"></script>
	<script src="{{ url('angularJs/uses/ctrls/tagCtrl.js') }}"></script>

	@if (Session::has('tag') && Session::get('tag') == 'success')
	<script>
		$.toast({
		    heading: '{!! trans("confirm.success") !!}',
		    text: '{!! trans("backend.tag.success_message") !!}',
		    showHideTransition: 'fade',
		    position: 'top-right',
		    icon: 'success'
		})
	</script>
	@endif
@endsection
@section ('myCss')
@endsection

