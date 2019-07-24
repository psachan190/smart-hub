@extends('layout')
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/conect.css') }}"/>
<link rel="stylesheet" href="{{ asset('cdn/css/message.css') }}"/>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@stop
@section('content')
<div class="products">
	<div class=" page-content pagesbottom">
		<div class="row margin_div">
			<div class="col-md-1">
			</div>
			<!-- left links -->
			<div class="col-md-2 padding_div" style="position:sticky;">
				@include('social.leftnav')
			</div>
			<!-- end left links -->
			<!-- center posts -->
			<div class="col-md-5 padding_div">
				<div class="box profile-info n-border-top">
					<form>
						<div class="input-group custom-search-form">
							<input type="text" name="search" class="form-control searborder" placeholder="Search...">
							<span class="input-group-btn">
							<button class="btn btn-md serbtn" type="submit">
							<i>search</i>
							</button>
							</span>
						</div>
					</form>
				</div>
				@foreach ($result as $row)
				<div class="box box-widget">
					<div class="mediafriend">
						@if(empty($row->profile_image))
						<p class="textimagemargin" data-letters="{{ucfirst(substr($row->name,0,1))}}"></p>
						@else 
						<img class="d-flex align-self-start" src="{{ asset('storage/'.$row->profile_image) }}" alt="Generic placeholder image">
						@endif
						<div class="mediafriend-body pl-3">
							<div class="stats">
								<span class="usernamesocial"><a href="{{url('social/profile/'.$row->username)}}">{{$row->name.' '.$row->lname}}</a></span>
							</div>
							<div class="stats">
								<span class="fassize usernamesocial"><a href="{{url('social/profile/'.$row->username)}}">{{'@'.$row->username}}</a></span>
							</div>
							<!--div class="address">811 U block govind nagar kanpur</div -->
							<div class="address">
								<div class="btn-group" >
									@if($row->user1 == Session()->get('knpuser') || $row->user2 == Session()->get('knpuser'))
										
										@if ($row->accepted == 'Y')
										<a class="btn defalutbtncss shiny btn-default" href="#">Friend</a>
										@elseif ($row->user2 == Session()->get('knpuser'))
										<form method="POST" class="accept">
											<input type="hidden" name="fuser" class="fuser" value="{{$row->id}}">
											<button type="submit" class="btn defalutbtncss shiny btn-default accept_btn accept{{$row->id}}"><i class="fa fa-user-plus"></i> Confirm</button> 
										</form>
										@else
										<a class="btn defalutbtncss shiny btn-default" href="#"> Requested</a>
										@endif
									@else
									<form method="POST" class="follow">
										<input type="hidden" name="fuser" class="fuser" value="{{$row->id}}">
										<div class="btn-group" >
											<button type="submit" class="btn defalutbtncss shiny btn-default follow_btn user{{$row->id}}"><i class="fa fa-user-plus socfricon"></i> Send request</button>
											<a class="btn btn-default defalutbtncss1  dropdown-toggle shiny" data-toggle="dropdown" href="#" aria-expanded="false"><i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu dorpfreadd">
												<li>
													<a href="#">Send Message</a>
												</li>
												<li>
													<a href="#">Close Friend</a>
												</li>
												<li class="divider"></li>
												<li>
													<a href="#">Get Notification</a>
												</li>
											</ul>
										</div>
									</form>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@if (isset($_GET['search']))
				<?php $search = $_GET['search']; ?>
				{{$result->appends(['search' => $search])->links() }}
				@else 
				{{$result->links() }}
				@endif
				
			</div>
			<!-- end  center posts -->
			<!-- right posts -->
			<div class="col-md-2 padding_div">
			</div>
			<!-- end right posts -->
			<div class="col-md-3">
			</div>
		</div>
	</div>
</div>
@stop
@section('footer')
@parent
<script src="{{url('cdn/js/social.js')}}"></script>
<script>
	$(document).on('submit','.follow',function(e){
		e.preventDefault();
		var user = $(this).children('.fuser').val();
	  	$.ajax({
	     	url: "{{ url('social/action/follow')}}",
	type:"GET",
	data: $( this ).serialize(),
	success: function(data){
	    if(data == '1') {
	    	$('.user'+user).html('Requested');
	    }
	}
	});
	});
	$(document).on('submit','.accept',function(e){
		e.preventDefault();
		var user = $(this).children('.fuser').val();
	  	$.ajax({
	     	url: "{{ url('social/action/accept')}}",
	type:"GET",
	data: $( this ).serialize(),
	success: function(data){
	    if(data == '1') {
	    	$('.accept'+user).html('Accepted');
	    }
	}
	});
	});
</script>
@stop