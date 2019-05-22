@extends('Backend.Layouts.default')
@section ('title', 'ZeLike 澤樣室內設計')
@section('content')
	<div id="content-container" ng-controller="postCtrl">
		<div id="page-head">
            <div id="page-title">
                <h1 class="page-header text-overflow">{!! trans('backend.post.post') !!}</h1>
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
			                   <a href="{{ route('posts.create') }}" id="demo-btn-addrow" class="btn btn-purple"><i class="demo-pli-add"></i> {!! trans('backend.actions.create') !!}</a>
			                </div>
			                <div class="col-sm-6 table-toolbar-right">
			                    <div class="form-group col-sm-12">
			                        <input id="demo-input-search2" type="text" placeholder="Tìm kiếm" class="form-control col-sm-
			                        8" autocomplete="off" ng-change="actions.filter()" ng-model="filter.freetext">
			                    </div>
			                </div>
			            </div>
            	        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                               <a ng-click="actions.actionCheckAll()" id="demo-btn-addrow" class="btn btn-danger"><i class="ti-minus"></i> {!! trans('backend.actions.delete') !!}</a>
                            </div>
                        </div>
			        </div>
	                <div class="table-responsive">
	                    <table id="post-table" class="table table-bordered table-hover table-vcenter">
	                        <thead>
	                            <tr>
	                            	<th class="text-center">
                        		        <input type="checkbox" ng-model="checker.btnCheckAll" 
                        		        ng-click="actions.checkAll(data.posts)">
	                            	</th>
	                                <th class="text-center">#</th>
	                                <th 
	                                ng-class="(filter.orderName =='title' && filter.order) ? 'sorting_desc' : (filter.orderName =='title' && !filter.order) ? 'sorting_asc' : 'sorting'" 
	                                ng-click="actions.orderBy('title')">{!! trans('backend.post.title') !!}</th>
	                                <th class="sorting"
	                                ng-class="(filter.orderName =='view' && filter.order) ? 'sorting_desc' : (filter.orderName =='view' && !filter.order) ? 'sorting_asc' : 'sorting'"
	                                ng-click="actions.orderBy('view')">{!! trans('backend.post.view') !!}</th>
	                                <th class="sorting" 
	                                ng-class="(filter.orderName =='status' && filter.order) ? 'sorting_desc' : (filter.orderName =='status' && !filter.order) ? 'sorting_asc' : 'sorting'"
	                                ng-click="actions.orderBy('status')">{!! trans('backend.status.status') !!}</th>
	                                <th>{!! trans('backend.actions.actions') !!}</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <tr ng-repeat="(key, post) in data.posts">
	                            	<td style="width: 50px" class="text-center"> 
                        		        <input type="checkbox" ng-click="actions.checkOrUncheck(checker.checkedAll[post.id])" ng-model="checker.checkedAll[post.id]">
	                            	</td>
	                                <td style="width: 50px"  class="text-center"> @{{ (data.page.current_page - 1) * data.page.per_page + key + 1 }} </td>
	                                <td > @{{ post.title }} </td>
	                                <td class="text-center" style="width: 150px"> @{{ post.view }} </td>
	                                <td style="width: 150px;">
	                                	<span class="label label-danger" ng-if="(post.status == '{{ App\Libs\Configs\StatusConfig::CONST_DISABLE }}')">
	                                	{!! trans('backend.status.disable') !!}</span>

	                                	<span class="label label-success" ng-if="(post.status == '{{ App\Libs\Configs\StatusConfig::CONST_AVAILABLE }}')">
	                                	{!! trans('backend.status.available') !!}</span>
	                                </td>
	                                <td style="width: 180px">
										@if (Auth::check() && Auth::user()->can('post.by_provider'))
											<button class="btn btn-sm btn-icon" ng-class="(post.hot == 1 ? 'btn-danger' : 'btn-default')" ng-click="actions.hotNews(post.id)">
												<i class="fa fa-fire" title="{{ trans('backend.actions.hot') }}"></i>
											</button>
											<button class="btn btn-sm btn-icon" ng-class="(post.prioritize == 1 ? 'btn-success' : 'btn-default')" ng-click="actions.prioritizeNew(post.id)">
												<i class="ti-pin-alt" title="{{ trans('backend.actions.hot') }}"></i>
											</button>
										@endif
	                                	<a href="{{ url('admin/posts') }}/@{{ post.id }}/edit" class="btn btn-info btn-icon btn-sm" >
	                                		<i class="ti-pencil-alt" title="{{ trans('backend.actions.edit') }}"></i> 
	                                	</a>
	                                	<button class="btn btn-danger btn-sm btn-icon" ng-click="actions.delete(post.id)">
	                                		<i class="ti-trash" title="{{ trans('backend.actions.delete') }}"></i> 
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
	<script src="{{ url('angularJs/uses/factory/services/postService.js') }}"></script>
	<script src="{{ url('angularJs/uses/ctrls/postCtrl.js') }}"></script>

	@if (Session::has('post') && Session::get('post') == 'success')
	<script>
		$.toast({
		    heading: '{!! trans("confirm.success") !!}',
		    text: '{!! trans("backend.post.success_message") !!}',
		    showHideTransition: 'fade',
		    position: 'top-right',
		    icon: 'success'
		})
	</script>
	@endif
@endsection
@section ('myCss')
<style type="text/css" media="screen">


</style>
@endsection

