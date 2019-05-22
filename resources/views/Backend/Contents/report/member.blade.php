@extends('Backend.Layouts.default')
@section('content')
	<div id="content-container" ng-controller="memberCtrl">
		<div id="page-head">
            <div id="page-title">
                <h1 class="page-header text-overflow">Member</h1>
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
		                                <th>Tên</th>
		                                <th>Email</th>
		                                <th>Số điện thoại</th>
		                                <th>Địa chỉ</th>
		                                <th>Ngày đăng kí</th>
		                                <!-- <th>Thao tác</th> -->
		                            </tr>
		                        </thead>
		                        <tbody>
		                            <tr ng-repeat="(key, member) in data.members">
		                                <td class="text-center"> @{{ (data.page.current_page - 1) * data.page.per_page + key + 1   }} </td>
		                                <td style="width: 150px">@{{ member.name }}</td>
		                                <td style="width: 150px">@{{ member.email }}</td>
		                                <td class="text-center">@{{ member.phone }}</td>
		                                <td class="text-center">@{{ member.adddress }}</td>
		                                <td class="text-center">@{{ member.created_at }}</td>
		                                <!-- <td></td> -->
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
	<script src="{{ url('angularJs/uses/factory/services/memberService.js') }}"></script>
	<script src="{{ url('angularJs/uses/ctrls/memberCtrl.js') }}"></script>
	

@endsection

@section ('myCss')
	
@endsection

