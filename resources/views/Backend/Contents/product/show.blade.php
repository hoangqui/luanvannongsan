@extends('Backend.Layouts.default')
@section ('title', 'ZeLike 澤樣室內設計')
@section('content')
<div id="content-container">
	<div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">{!! trans('backend.product.product') !!}</h1>
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
		        
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-vcenter">
                        <thead>
                            <tr>
                            	<th class="text-center">
                    		        #
                            	</th>
                                <th class="text-center">Content</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            	<td style="width: 150px;" class="text-center"> 
                    		        {{ trans('backend.product.name') }}
                            	</td>
                                <td> {{ @$product->name }} </td>
                            </tr>

                            <tr>
                                <td style="width: 150px;" class="text-center"> 
                                    {{ trans('backend.product.description') }}
                                </td>
                                <td> {!! @$product->description !!} </td>
                            </tr>

                            <tr>
                                <td style="width: 150px;" class="text-center"> 
                                    {{ trans('backend.status.status') }}
                                </td>
                                <td> {{ @$product->status }} </td>
                            </tr>

                            <tr>
                                <td style="width: 150px;" class="text-center"> 
                                    {{ trans('backend.product.created_at') }}
                                </td>
                                <td> {{ @$product->created_at }} </td>
                            </tr>

                            <tr>
                                <td style="width: 150px;" class="text-center"> 
                                    {{ trans('backend.product.content') }}
                                </td>
                                <td> 
                                     {{ @$product->specification }}
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

