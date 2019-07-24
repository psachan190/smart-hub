@extends('layout')
@section('title', $title)
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/conect.css') }}"/>
<link rel="stylesheet" href="{{ asset('cdn/css/message.css') }}"/>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
@stop
@section('content')
<section class="products">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 padding_div">
				<div class="tile tile-alt" id="messages-main">
					<div class="ms-menu" id="ms-menu">
						<div class="ms-user clearfix">
							@if (!empty($user->profile_image) && file_exists('storage/'.$user->profile_image))
							<img src="{{ asset('storage/'.$user->profile_image) }}" alt="" class="img-avatar pull-left">
							@else 
							 @if(!empty($user->sex)) 
                                                           @if($user->sex == "M")
                                                            <img src="{{ asset('cdn/images/icon/male.png') }}" alt=""  class="img-avatar pull-left">
					                   @elseif($user->sex == "F")
                                                            <img src="{{ asset('cdn/images/icon/female.png') }}" alt="" class="img-avatar pull-left">
	                                                   @endif
	                                                  @endif
							@endif
							<div>Signed in as <br> {{$user->name. ' ' .$user->lname}}</div>
						</div>
						<div class="scrolldivsocial">
							<div class="list-group lg-alt">
								@foreach ($friends as $row)
								<a class="list-group-item media" href="{{ url('social/message/'.$row->username)}}">
									<div class="lv-avatar pull-left">
										@if (!empty($row->profile_image) && file_exists('storage/'.$row->profile_image))
										<img src="{{ asset('storage/'.$row->profile_image) }}" alt="" class="img-avatar">
										@else 
										 <img src="{{ asset('cdn/images/icon/male.png') }}" alt=""  class="img-avatar">
										@endif
									</div>
									<div class="media-body">
										<div class="list-group-item-heading">{{$row->name.' '.$row->lname}}</div>
										<!--small class="list-group-item-text c-gray">Hallo sir can i help u</small -->
									</div>
								</a>
								@endforeach
							</div>
						</div>
					</div>
					<div class="ms-body">
						<div class="action-header clearfix">
							<div class="visible-xs" id="ms-menu-trigger">
								<i id="show" data-price='1' class="fa fa-bars"></i>
							</div>
							@if (isset($msg_user))
							<div class="pull-left hidden-xs">
								<a href="{{url('social/profile/'.$msg_user->username)}}">
								@if (!empty($msg_user->profile_image) && file_exists('storage/'.$msg_user->profile_image))
								<img src="{{ asset('storage/'.$msg_user->profile_image) }}" alt="" class="img-avatar m-r-10">
								@else 
								 @if(!empty($msg_user->sex)) 
	                                                           @if($msg_user->sex == "M")
	                                                            <img src="{{ asset('cdn/images/icon/male.png') }}" alt=""  class="img-avatar m-r-10">
						                   @elseif($msg_user->sex == "F")
	                                                            <img src="{{ asset('cdn/images/icon/female.png') }}" alt="" class="img-avatar m-r-10">
		                                                   @endif
		                                                  @endif
								@endif
								<div class="lv-avatar pull-left">
								</div>
								<span>{{ $msg_user->name.' '.$msg_user->lname }}</span>
								</a>
							</div>
							@endif
							<ul class="ah-actions actions">
								<li>
									<a href="#">
									<i class="fa fa-trash"></i>
									</a>
								</li>
								<li>
									<a href="#">
									<i class="fa fa-check"></i>
									</a>
								</li>
								<li>
									<a href="#">
									<i class="fa fa-clock-o"></i>
									</a>
								</li>
								
								<li>
									<div class="inline">
										<a href="#" id="drop2" class="dropdown-trigger   btn-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-bars"></i>
										</a>
										<ul class="dropdown msgdrop messaging_dropdown dropdown-menu" aria-labelledby="drop2">
											<li>
												<a href="">Refresh</a>
											</li>
											<li>
												<a href="#">Message Settings</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="dropdown">
									<a href="#" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-bars"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
									</ul>
								</li>
							</ul>
						</div>
						<div class="messagescrollmulti"> 
							@if (isset($msgs)) @foreach ($msgs as $row)
							<div class="message-feed @if($row->sender == $msg_user->id) media @else right @endif" >
								<div class="@if($row->sender == $msg_user->id) pull-left @else pull-right @endif">
									<img src="{{ asset('storage/'.$row->profile_image) }}" alt="" class="img-avatar">
								</div>
								<div class="media-body">
									<div class="mf-content">{{$row->msg}}</div>
									<small class="mf-date"><i class="fa fa-clock-o"></i> {{date_format(date_create($row->created_at), 'd M, Y h:i A')}}</small>
								</div>
							</div>
							@endforeach
							@endif
						</div>
						@if(isset($msg_user))
						<div class="msb-reply">
						<form method="POST" id="send">
								{{csrf_field()}}
								<input type="hidden" name="user" class="msg-with" value="<?php echo $msg_user->id; ?>">
								<textarea placeholder="What's on your mind..." class="msg" name="msg" v-model="msg"></textarea>
								<button type="submit" name="submit" value="submit"><i class="fa fa-paper-plane-o"></i></button>
							</form>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop
@section('footer')
@parent
<script>
window.setInterval(function(){
	$.ajax({
	      	url: "https://www.kanpurize.com/social/action/msgs",	  
	      	type: "get",        
	      	data: 'user=' + $('.msg-with').val(), 
	      	success: function(data) {
	      		$('.messagescrollmulti').append(data);
	      		
		}	
     	});
}, 1000);
$(document).on('submit',"#send",(function(e) {
      	e.preventDefault();
      	 var msg = $('.msg').val();
      	$.ajax({
	      	url: "https://www.kanpurize.com/social/action/send_msg",	  
	      	type: "POST",        
	      	data: new FormData(this),
	      	contentType: false,
	      	cache: false,
	      	processData:false,  
	      	success: function(data){
	      		$('.msg').val('');
			$('.messagescrollmulti').append(data);
			
		}	
     	});
}));
</script>
@stop