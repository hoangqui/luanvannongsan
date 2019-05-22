@extends('Backend.Layouts.default')
@section('content')
	<div id="content-container" ng-controller="providerCtrl">
		<div id="page-head">
            <div id="page-title">
                <h1 class="page-header text-overflow">Quản lí nhà cung cấp</h1>
            </div>
            <ol class="breadcrumb">
				<li><a href="#"><i class="demo-pli-home"></i></a></li>
				<li><a href="#">List</a></li>
            </ol>
        </div>
		<div id="page-content">
		    <div class="panel-body">
		        <div class="panel">
		            <div class="panel-heading">
		                
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-bordered table-striped">
		                        <thead>
		                            <tr>
		                                <th class="text-center">#</th>
		                                <th>Mã số thuê</th>
		                                <th>Nhà cung cấp</th>
		                                <th>Email</th>
		                                <th>Số điện thoại</th>
		                                <th>Địa chỉ</th>
		                                <th>Loại hình </th>
		                                <th>Thao tác</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            <tr ng-repeat="(key, member) in data.users">
		                                <td class="text-center"> @{{ (data.page.current_page - 1) * data.page.per_page + key + 1   }} </td>
		                                <td style="width: 150px">@{{ member.store.tax_code }}</td>
		                                <td style="width: 150px">@{{ member.name }}</td>
		                                <td style="width: 150px">@{{ member.email }}</td>
		                                <td class="text-center">@{{ member.phone }}</td>
		                                <td class="text-center">@{{ member.store.address }}</td>
		                                <td class="text-center">@{{ member.store.cate_sell }}</td>
		                                <td>
		                                	<a href="{{ url('admin/providers') }}/@{{ member.id }}/edit" class="btn btn-info btn-icon btn-sm" title="{!! trans('backend.slide.update') !!}">
	                                		    <i class="ti-eye"></i> 
	                                	    </a>
	                                	    <a href="{{ url('admin/providers') }}/@{{ member.id }}" class="btn btn-success btn-icon btn-sm" ng-class="member.status == 'AVAILABLE' ? 'btn-danger' : 'btn-success' " title="{!! trans('backend.slide.update') !!}">
	                                		    <span ng-if="member.status == 'AVAILABLE'">
	                                		    	Hủy kích hoạt
	                                		    </span>
	                                		    <span ng-if="member.status == 'DISABLE'">
	                                		    	Kích hoạt
	                                		    </span>	                                		   
	                                	    </a>
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
	</div>
@endsection

@section ('myJs')
	<script src="{{ url('angularJs/uses/factory/services/userService.js') }}"></script>
	<script src="{{ url('angularJs/uses/ctrls/providerCtrl.js') }}"></script>
	

@endsection

@section ('myCss')
	
@endsection

