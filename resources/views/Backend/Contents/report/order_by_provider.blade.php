@extends('Backend.Layouts.default')
@section ('title', 'ZeLike 澤樣室內設計')
@section('content')
    <div id="content-container" ng-controller="orderProviderCtrl">
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
                    </div>
                    <div class="table-responsive">
                        <table id="order-table" class="table table-bordered table-hover table-vcenter">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>{!! trans('backend.order.code') !!}</th>

                                <th>{!! trans('backend.product.name') !!}</th>

                                <th>{!! trans('backend.product.qty') !!}</th>


                                <th>{!! trans('backend.order.total') !!}</th>

                                <th>{!! trans('backend.status.status_order') !!}</th>


                                <th>{!! trans('backend.status.status_payment') !!}</th>

                                <th>Ngày đặt hàng</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="(key, order) in data.orders">

                                <td style="width: 50px" class="text-center"> @{{ (data.page.current_page - 1) * data.page.per_page + key + 1 }} </td>

                                <td style="width: 50px" class="text-center"> @{{ order.order.code }} </td>

                                <td >  @{{ order.product.name }} </td>

                                <td >  @{{ order.qty }} </td>

                                <td class="text-center" style="width: 150px"> @{{ actions.formatMoney(order.total_price) }} Vnđ </td>

                                <td style="width: 200px;">
	                                	<span class="label label-warning" ng-if="(order.order.order_status == '0')">
	                                	{!! trans('backend.status.pending_process') !!}</span>
                                    <span class="label label-info" ng-if="(order.order.order_status == '1')">
	                                	{!! trans('backend.status.processing') !!}</span>
                                    <span class="label label-info" ng-if="(order.order.order_status == '2')">
	                                	{!! trans('backend.status.shipping') !!}</span>
                                    <span class="label label-success" ng-if="(order.order.order_status == '3')">
	                                	{!! trans('backend.status.success') !!}</span>
                                    <span class="label label-danger" ng-if="(order.order.order_status == '4')">
	                                	{!! trans('backend.status.cancel') !!}</span>
                                </td>

                                <td style="width: 200px;">
	                                	<span class="label label-danger" ng-if="(order.order.payment_status == '0')">
	                                	{!! trans('backend.status.pending_pay') !!}</span>
                                    <span class="label label-success" ng-if="(order.order.payment_status == '1')">
	                                	{!! trans('backend.status.success_pay') !!}</span>
                                </td>

                                <td style="width: 150px" class="text-center">
                                    @{{ order.order.created_at | formatDate }}
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
    <script src="{{ url('angularJs/uses/factory/services/orderService.js') }}"></script>
    <script src="{{ url('angularJs/uses/ctrls/orderProviderCtrl.js') }}"></script>
@endsection
@section ('myCss')
@endsection

