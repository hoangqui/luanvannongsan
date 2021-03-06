@extends('Backend.Layouts.default')
@section ('title', 'ZeLike 澤樣室內設計')
@section('content')
	<div id="content-container">
	    <div id="page-head">
			<div class="text-center cls-content">
			    <h1 class="error-code text-info">403</h1>
			</div>
		</div>
	    <div id="page-content">
	    	<div class="text-center cls-content">
			    <p class="h4 text-uppercase text-bold">Page Not Found!</p>
			    <div class="pad-btm">
			        Sorry, but the page you are looking for has not been found on our server.
			    </div>
			    <hr class="new-section-sm bord-no">
			    <div class="pad-top"><a class="btn btn-primary" href="{{ route('users.index') }}">Return home</a></div>
			</div>
	    </div>
	</div>
@endsection


