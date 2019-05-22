@extends('Backend.Layouts.default')
@section ('title', 'ZeLike 澤樣室內設計')
@section('content')
	<div id="content-container" ng-controller="orderCtrl">
		<div id="page-head">
            <div id="page-title">
                <h1 class="page-header text-overflow">{!! trans('backend.order.order') !!}</h1>
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
                              
                            </div>
			                <div class="col-sm-6 table-toolbar-right">
			                    <div class="form-group col-sm-12">
			                        <input id="demo-input-search2" type="text" placeholder="Tìm kiếm" class="form-control col-sm-
			                        8" autocomplete="off" ng-change="actions.filter()" ng-model="filter.freetext">
			                    </div>
			                </div>
			            </div>
            	        <div class="row">
                            
                        </div>
			        </div>
	                <div class="table-responsive">
	                    <table id="order-table" class="table table-bordered table-hover table-vcenter">
	                        <thead>
	                            <tr>
	                                <th class="text-center">#</th>
	                                <th class="sorting" ng-class="(filter.orderName =='code' && filter.order) ? 'sorting_desc' : (filter.orderName =='code' && !filter.order) ? 'sorting_asc' : 'sorting'"
	                                ng-click="actions.orderBy('code')">{!! trans('backend.order.code') !!}</th>

	                                <th class="sorting" ng-class="(filter.orderName =='name' && filter.order) ? 'sorting_desc' : (filter.orderName =='name' && !filter.order) ? 'sorting_asc' : 'sorting'"
	                                ng-click="actions.orderBy('name')">{!! trans('backend.order.name') !!}</th>

	                                <th class="sorting" ng-class="(filter.orderName =='total' && filter.order) ? 'sorting_desc' : (filter.orderName =='total' && !filter.order) ? 'sorting_asc' : 'sorting'"
	                                ng-click="actions.orderBy('total')">{!! trans('backend.order.total') !!}</th>

	                                <th class="sorting" ng-class="(filter.orderName =='order_status' && filter.order) ? 'sorting_desc' : (filter.orderName =='order_status' && !filter.order) ? 'sorting_asc' : 'sorting'"
	                                ng-click="actions.orderBy('order_status')">{!! trans('backend.status.status_order') !!}</th>
	                                

	                                <th class="sorting" ng-class="(filter.orderName =='payment_status' && filter.order) ? 'sorting_desc' : (filter.orderName =='payment_status' && !filter.order) ? 'sorting_asc' : 'sorting'"
	                                ng-click="actions.orderBy('payment_status')">{!! trans('backend.status.status_payment') !!}</th>

	                                <th>{!! trans('backend.actions.actions') !!}</th>
	                                
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <tr ng-repeat="(key, order) in data.orders">

	                                <td style="width: 50px" class="text-center"> @{{ (data.page.current_page - 1) * data.page.per_page + key + 1 }} </td>

	                                <td style="width: 50px" class="text-center"> @{{ order.code }} </td>

	                                <td >  @{{ order.buyer }} </td>

	                                <td class="text-center" style="width: 150px"> @{{ order.total }} </td>

	                                <td style="width: 200px;">
	                                	<span class="label label-warning" ng-if="(order.order_status == '0')">
	                                	{!! trans('backend.status.pending_process') !!}</span>
	                                	<span class="label label-info" ng-if="(order.order_status == '1')">
	                                	{!! trans('backend.status.processing') !!}</span>
	                                	<span class="label label-info" ng-if="(order.order_status == '2')">
	                                	{!! trans('backend.status.shipping') !!}</span>
	                                	<span class="label label-success" ng-if="(order.order_status == '3')">
	                                	{!! trans('backend.status.success') !!}</span>
	                                	<span class="label label-danger" ng-if="(order.order_status == '4')">
	                                	{!! trans('backend.status.cancel') !!}</span>
	                                </td>

	                                <td style="width: 200px;">
	                                	<span class="label label-danger" ng-if="(order.payment_status == '0')">
	                                	{!! trans('backend.status.pending_pay') !!}</span>
	                                	<span class="label label-success" ng-if="(order.payment_status == '1')">
	                                	{!! trans('backend.status.success_pay') !!}</span>
	                                </td>

	                                <td style="width: 100px" class="text-center">
	                                	<button class="btn btn-sm btn-icon btn-info" ng-click="actions.detailOrder(order.id)">
	                                		<i class="fa fa-eye" title="{{ trans('backend.actions.read') }}"></i> 
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
		<div id="demo-lg-modal" class="modal fade" tabindex="-1" ng-dom="modalProduct">
	        <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	                <div class="modal-header">
	                    
	                </div>
	                <div class="modal-body">
	                	<table class="table table-bordered">
	                		<caption>Thông tin đơn hàng</caption>
	                		<thead>
	                			<tr>
	                				<th>{{ trans('backend.product.code') }}</th>
	                				<th>{{ trans('backend.product.name') }}</th>
	                				<th>{{ trans('backend.product.image') }}</th>
	                				<th>{{ trans('backend.product.qty') }}</th>
	                				<th>{{ trans('backend.product.total') }}</th>
	                			</tr>
	                		</thead>
	                		<tbody>
	                			<tr ng-repeat="(key, value) in data.detailOrder">
	                				<td>@{{ value.product.code }}</td>
	                				<td>@{{ value.product.name }}</td>
	                				<th><img style="width: 70px;" ng-src="{{ url('') }}@{{ value.product.image }}" alt=""></th>
	                				<td>@{{ value.qty }}</td>
	                				<td>@{{ value.total_price }}</td>
	                			</tr>
	                		</tbody>
	                	</table>
						<div class="status-update">
                            <div class="form-group">
                                <label class="control-label text-bold">
                                	{!! trans('backend.status.status_payment') !!}
                                	<span class="text-danger">*</span>
                                </label>
                                <select class="selectpicker" data-width="100%" name="order_status">
	                                <option value="0" ng-selected="(order.order_status == 0)">{!! trans('backend.status.pending_process') !!}</option>
	                                <option value="1" ng-selected="(order.order_status == 1)">{!! trans('backend.status.processing') !!}</option>
	                                <option value="2" ng-selected="(order.order_status == 2)">{!! trans('backend.status.shipping') !!}</option>
	                                <option value="3" ng-selected="(order.order_status == 3)">{!! trans('backend.status.success') !!}</option>
	                                <option value="4" ng-selected="(order.order_status == 4)">{!! trans('backend.status.cancel') !!}</option>
	                            </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label text-bold">
                                	{!! trans('backend.status.status_payment') !!}
                                	<span class="text-danger">*</span>
                                </label>

                               	<select class="selectpicker" data-width="100%" name="payment_status" >
	                                <option value="0" ng-selected="order.payment_stauts == 0">{!! trans('backend.status.pending_pay') !!}</option>
	                                <option value="1" ng-selected="order.payment_stauts == 1">{!! trans('backend.status.success_pay') !!}</option>
	                            </select>
                            </div>
                        </div>

	                    <div class="cart-sum">
	                        <div class="cs-right">
	                            <p>Tổng tiền: @{{ order.total }} VND
	                            </p>
	                            <p>Phí vận chuyển: Miễn phí</p>
	                            <h3>Tổng tiền:  @{{ order.total }}vnđ</h3>
	                        </div>
	                        <div class="clearfix">
	                        </div>
	                    </div>
	                </div>

	                <div class="modal-footer">
	                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
	                    <button type="button" ng-click="actions.saveStatus()" class="btn btn-primary">Lưu</button>
	                </div>
	            </div>
	        </div>
	    </div>

	</div>
@endsection

@section ('myJs')
	<script src="{{ url('angularJs/uses/factory/services/orderService.js') }}"></script>
	<script src="{{ url('angularJs/uses/ctrls/orderCtrl.js') }}"></script>

	@if (Session::has('order') && Session::get('order') == 'success')
	<script>
		$.toast({
		    heading: '{!! trans("confirm.success") !!}',
		    text: '{!! trans("backend.order.success_message") !!}',
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

