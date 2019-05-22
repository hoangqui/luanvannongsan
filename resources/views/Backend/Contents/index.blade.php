@extends('Backend.Layouts.default')
@section ('title', '')
@section('content')
	<div id="content-container">
		<div id="page-head">
            <div id="page-title">
                <h1 class="page-header text-overflow">{!! trans('backend.dashboard.lable') !!}</h1>
            </div>
            <ol class="breadcrumb">
				<li><a href="#"><i class="demo-pli-home"></i></a></li>
            </ol>
        </div>
	    <div id="page-content">
		    <div class="row">
		        <div class="col-lg-12">
		            <div class="row">
		                <div class="col-sm-4 col-lg-4">
		
		                    <!--Sparkline Area Chart-->
		                    <div class="panel panel-success panel-colorful">
		                        @if (Auth::user()->can('setting.read') )
		                        	<div class="pad-all">
		                        	    <p class="text-lg text-semibold">
		                        	    	<i class="demo-pli-data-storage icon-fw">
		                        	    		
		                        	    	</i> Đơn hàng</p>
		                        	    <p class="mar-no">
		                        	        <span class="pull-right text-bold"> {{ @$countOrder }}</span> Tổng đơn:
		                        	    </p>
		                        	</div>
		                        @else
									<div class="pad-all">
									    <p class="text-lg text-semibold">
									    	<i class="demo-pli-data-storage icon-fw">
									    		
									    	</i>  Đơn hàng</p>
									    <p class="mar-no">
									        <span class="pull-right text-bold"> {{ @$countOrder }}</span> Tổng đơn có hàng của bạn:
									    </p>
									</div>
		                        @endif

		                    </div>
		                </div>
		                <div class="col-sm-4 col-lg-4">
		
		                    <!--Sparkline Line Chart-->
		                    <div class="panel panel-info panel-colorful">
		                        <div class="pad-all">
		                            <p class="text-lg text-semibold">Khách hàng</p>
		                            <p class="mar-no">
		                                <span class="pull-right text-bold">{{ @$countmember }}</span> Tổng khách hàng
		                            </p>
		                        </div>

		                    </div>
		                </div>

		                <div class="col-sm-4 col-lg-4">
		                
		                    <!--Sparkline bar chart -->
		                    <div class="panel panel-purple panel-colorful">
		                        <div class="pad-all">
		                            <p class="text-lg text-semibold"><i class="demo-pli-basket-coins icon-fw"></i>Hàng hóa</p>
		                            <p class="mar-no">
		                                <span class="pull-right text-bold">{{ @$countProduct }}</span> Tổng số sản phẩm
		                            </p>
		                        </div>

		                    </div>
		                </div>
		            </div>
		            
		
		            <!--Extra Small Weather Widget-->
		            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		          <!--   <div class="panel">
		                <div class="panel-body clearfix">
		                    <div class="col-sm-4 pad-top">
                                <form action="{{ route('backend.home') }}" method="get">
                                	<div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label class="control-label text-bold">
	                                        	Tháng<span class="text-danger"></span>
	                                        </label>
	                                        <input type="text" name="url_link" class="form-control" value="{{ @$slide->url_link ? $slide->url_link: @old('url_link') }}" required>
	                                        @if ($errors->has('url_link'))
	        	                            	<p class="text-left text-danger">{{ $errors->first('url_link') }}</p>
	        	                            @endif
	                                    </div>
	                                </div> 
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label class="control-label text-bold">
	                                        	Năm <span class="text-danger"></span>
	                                        </label>
	                                        <input type="text" name="url_link" class="form-control" value="{{ @$slide->url_link ? $slide->url_link: @old('url_link') }}" required>
	                                        @if ($errors->has('url_link'))
	        	                            	<p class="text-left text-danger">{{ $errors->first('url_link') }}</p>
	        	                            @endif
	                                    </div>
	                                </div> 

	                                <div class="col-sm-12 ">
            	                    	<button class="btn btn-primary pull-right">
            		                    	Tìm kiếm
            		                    </button>
	                                </div>
                                </form>
                               
		                    </div>
		                    <div class="col-sm-8 text-center">
		                        <a class="btn btn-pink mar-ver">Loại hàng bán được nhiều nhất</a>
		                        <p class="text-xs"></p>
		                        <div class="table-responsive">
			                        <table class="table table-striped">
			                            <thead>
			                                <tr>
			                                    <th>Invoice</th>
			                                    <th>User</th>
			                                    <th>Order date</th>
			                                    <th>Amount</th>
			                                    <th class="text-center">Status</th>
			                                    <th class="text-center">Tracking Number</th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                                <tr>
			                                    <td><a href="#" class="btn-link"> Order #53431</a></td>
			                                    <td>Steve N. Horton</td>
			                                    <td><span class="text-muted">Oct 22, 2014</span></td>
			                                    <td>$45.00</td>
			                                    <td class="text-center">
			                                        <div class="label label-table label-success">Paid</div>
			                                    </td>
			                                    <td class="text-center">-</td>
			                                </tr>
			                                <tr>
			                                    <td><a href="#" class="btn-link"> Order #53432</a></td>
			                                    <td>Charles S Boyle</td>
			                                    <td><span class="text-muted">Oct 24, 2014</span></td>
			                                    <td>$245.30</td>
			                                    <td class="text-center">
			                                        <div class="label label-table label-info">Shipped</div>
			                                    </td>
			                                    <td class="text-center">CGX0089734531</td>
			                                </tr>
			                                <tr>
			                                    <td><a href="#" class="btn-link"> Order #53433</a></td>
			                                    <td>Lucy Doe</td>
			                                    <td><span class="text-muted">Oct 24, 2014</span></td>
			                                    <td>$38.00</td>
			                                    <td class="text-center">
			                                        <div class="label label-table label-info">Shipped</div>
			                                    </td>
			                                    <td class="text-center">CGX0089934571</td>
			                                </tr>
			                                <tr>
			                                    <td><a href="#" class="btn-link"> Order #53434</a></td>
			                                    <td>Teresa L. Doe</td>
			                                    <td><span class="text-muted">Oct 15, 2014</span></td>
			                                    <td>$77.99</td>
			                                    <td class="text-center">
			                                        <div class="label label-table label-info">Shipped</div>
			                                    </td>
			                                    <td class="text-center">CGX0089734574</td>
			                                </tr>
			                                <tr>
			                                    <td><a href="#" class="btn-link"> Order #53435</a></td>
			                                    <td>Teresa L. Doe</td>
			                                    <td><span class="text-muted">Oct 12, 2014</span></td>
			                                    <td>$18.00</td>
			                                    <td class="text-center">
			                                        <div class="label label-table label-success">Paid</div>
			                                    </td>
			                                    <td class="text-center">-</td>
			                                </tr>
			                                <tr>
			                                    <td><a href="#" class="btn-link">Order #53437</a></td>
			                                    <td>Charles S Boyle</td>
			                                    <td><span class="text-muted">Oct 17, 2014</span></td>
			                                    <td>$658.00</td>
			                                    <td class="text-center">
			                                        <div class="label label-table label-danger">Refunded</div>
			                                    </td>
			                                    <td class="text-center">-</td>
			                                </tr>
			                                <tr>
			                                    <td><a href="#" class="btn-link">Order #536584</a></td>
			                                    <td>Scott S. Calabrese</td>
			                                    <td><span class="text-muted">Oct 19, 2014</span></td>
			                                    <td>$45.58</td>
			                                    <td class="text-center">
			                                        <div class="label label-table label-warning">Unpaid</div>
			                                    </td>
			                                    <td class="text-center">-</td>
			                                </tr>
			                            </tbody>
			                        </table>
			                    </div>
		                    </div>
		                </div>
		            </div> -->
		        </div>
		    </div>
		</div>
	</div>
@endsection

@section ('myJs')
@endsection
@section ('myCss')
@endsection

