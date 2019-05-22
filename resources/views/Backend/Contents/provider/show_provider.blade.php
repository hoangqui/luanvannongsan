@extends('Backend.Layouts.default')
@section('content')
<div id="content-container">
	<div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Thông tin cửa hàng</h1>
        </div>
        <ol class="breadcrumb">
			<li><a href="#"><i class="demo-pli-home"></i></a></li>
        </ol>
    </div>
	<div id="page-content">
        <div class="panel">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
		        
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-vcenter">
                        <thead>
                            <tr>
                            	<th class="text-center">
                    		        #
                            	</th>
                                <th class="text-center">Thông tin cửa hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            	<td style="width: 150px;" class="text-center"> 
                    		        Tên cửa hàng: 
                            	</td>
                                <td> {{ @$provider->name }} </td>
                            </tr>

                            <tr>
                                <td style="width: 150px;" class="text-center"> 
                                    Mã số thuế: 
                                </td>
                                <td> {{ @$provider->store->tax_code }} </td>
                            </tr>

                            <tr>
                                <td style="width: 150px;" class="text-center"> 
                                    Email: 
                                </td>
                                <td> {{ @$provider->email }} </td>
                            </tr>

                            <tr>
                                <td style="width: 150px;" class="text-center"> 
                                    Số điện thoại
                                </td>
                                <td> {{ @$provider->phone }} </td>
                            </tr>

                            <tr>
                                <td style="width: 150px;" class="text-center"> 
                                    Người đăng kí
                                </td>
                                <td> {{ @$provider->store->peson }} </td>
                            </tr>

                            <tr>
                                <td style="width: 150px;" class="text-center"> 
                                    Loại hình kinh doanh
                                </td>
                                <td> {{ @$provider->store->cate_sell }} </td>
                            </tr>

                            <tr>
                                <td style="width: 150px;" class="text-center"> 
                                </td>
                                <td> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
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

