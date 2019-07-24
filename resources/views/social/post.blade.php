@extends('layout')
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/conect.css') }}"/>
<link rel="stylesheet" href="{{ asset('cdn/css/message.css') }}"/>
<link rel="stylesheet" href="{{ asset('cdn/css/jquery.fancybox.min.css') }}"/>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@stop
@section('content')
<div class="products">
	<div class="container-fluid page-content pagesbottom">
		<div class="row" >
			<div class="col-md-1">
			</div>
			<div class="col-md-2 padding_div" style="position:sticky;">
				
			</div>
			<div class="col-md-6 padding_div">
				@include('social.component.post', array('posts' => $posts))
				@include('social.component.comments', array('comments' => $comments, 'user' => $user, 'post' => $posts[0]->id))
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>
@stop
@section('footer')
@parent
<script src="{{url('cdn/js/social.js')}}"></script>
<script src="{{ asset('cdn/js/jquery.fancybox.min.js') }}"></script>
@stop