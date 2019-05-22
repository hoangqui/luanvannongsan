@extends('Frontend.Layouts.default')
@section ('title', '')
@section('content')
    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9 main-content pull-right">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Người mua</th>
                                <th>Tổng giá</th>
                                <th>Trạng thái đơn</th>
                                <th>Trạng thái thanh toán</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">{{ trans('frontend.category') }}</h3>
                        <div class="widget-body">

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

@section ('metaData')

@endsection