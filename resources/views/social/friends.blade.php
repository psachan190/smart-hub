@extends('layout')
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/conect.css') }}"/>
<link rel="stylesheet" href="{{ asset('cdn/css/message.css') }}"/>
<link rel="stylesheet" href="{{ asset('cdn/css/jquery.fancybox.min.css') }}"/>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>  
@stop
@section('content')
<section class="products">
	<div class="container-fluid page-content">
		<div class="row">
        	<div class="col-md-1 padding_div"></div>
        	<div class="col-md-9 col-xs-12 padding_div">
					<span class="bg-picture-overlay"></span><!-- overlay -->
					<div class="col-md-12">
						<div class="bg-picture">
							<div class="row">
								@if(!empty($profile->cover_image) && file_exists('storage/'.$profile->cover_image))
								<img src="{{ asset('public/storage/'.$profile->cover_image) }}" id="cover_image">
								@else
								<img src="https://www.kanpurize.com/public/storage/aae7b928b8dda9bc541b5d7175437306.jpg" id="cover_image">
								@endif
								<img id='img-upload' class="img-responsive"/>
							</div>
							<span class="bg-picture-overlay"></span><!-- overlay -->
							<!-- meta -->
							<div class="box-layout meta bottom">
								<div class="col-md-6 col-sm-6 col-xs-7 clearfix smallmargin">
									<span class="img-wrapper pull-left m-r-15">
										@if(!empty($profile->profile_image) && file_exists('storage/'.$profile->profile_image) && $profile->profile_image != 'male.png')
										<img src="{{ asset('public/storage/'.$profile->profile_image) }}" id="profile_image" class="br-radius imageprsocial img-responsive">
										@else
										<p data-letters="{{substr($profile->name,0,1)}}"></p>
										@endif
										@if($profile->id == $user->id)
										<div class="middleprofile custom_upload">
											<form class="profile_image_form" id="profileImageForm">
												{{csrf_field() }}
												<label for="profile">
												<span class="textprsocial btn btn-sm btn-sm1"><span class="lnr lnr-camera covercolor"></span><input type="file" id="profile" name="profile_image" class="files"></span>
												</label>
											</form>
										</div>
										@endif
									</span>
									<div class="media-body">
										<h5 class="text-white1">{{$profile->name}}</h5>
										<h4 class="text-white2">{{"@".$profile->username}}</h4>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-5 smallmargin">
									<div class="btnsocialpr custom_upload">
										@if($profile->id == $user->id)
										<form class="cover_image_form" id="coverImageForm">
											{{csrf_field() }}
											<label for="thumbnail">
											<input type="file" name="cover_image" id="thumbnail" class="files">
											<span class="colorbuttoncss btn btn-sm btn-sm1" data-toggle="tooltip" title="Upload Cover Photo"><span class="lnr lnr-camera covercolor"></span></span>
											</label>
											<a class="colorbuttoncss btn btn-sm btn-sm1" href="{{url('social/message')}}" data-toggle="tooltip" title="Message"><span class="lnr lnr-bubble covercolor"></span></a>
								                                            <a class="colorbuttoncss btn btn-sm btn-sm1" href="{{url('social/message')}}" data-toggle="tooltip" title="Add Friend"><span class="lnr lnr-users covercolor"></span></a>
								                                            <!--div class="btn-group" >
								                                                    <a class="btn btn-default shinydrop1  dropdown-toggle shiny" data-toggle="dropdown" href="#" aria-expanded="false"><span class="textpoint">...</span></a>
								                                                    <ul class="dropboxsize-set dropdown-menu  dorpfreadd">
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
								                                                    </div -->
										</form>
										@else
										<a class="btn btn-sm btn-sm1" href="{{url('social/message/'.$profile->username)}}"><span class="lnr lnr-bubble"></span> Message</a>
										
										@endif
									</div>
								</div>
							</div>
							<!--/ meta -->
						</div>
					</div>
                </div>
            <div class="col-md-2 padding_div"></div>
            </div>
	</div>
    <div class="container-fluid">
           <div class="row">
            <div class="col-md-1 padding_div"></div>
            <div class="col-md-9 col-xs-12 padding_div">
					<!-- Nav tabs -->
					<ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom profile-tabs">
						<li role="presentation"><a href="{{url('social')}}">News Feed</a></li>
						<li role="presentation"><a class="prof-tab" href="{{url('social/profile/'.$profile->username.' #timeline')}}">Timeline</a></li>
						<li role="presentation"><a class="prof-tab" href="{{url('social/about/'.$profile->username.' #timeline')}}">About</a></li>
						<li role="presentation"><a class="prof-tab" href="{{url('social/friends/'.$profile->username.' #timeline')}}">Friends</a></li>
						<li role="presentation"><a class="prof-tab" href="{{url('social/photos/'.$profile->username.' #timeline')}}">Photos</a></li>
                                                <li><a class="#" id="showfriend">Online User</a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="timeline">
							<div class="row">
								@foreach ($friends as $row)
								<div class="col-md-3 col-sm-6 col-xs-6 padding_div">
									<div class="contact-box center-version">
										<a href="{{url('social/profile/'.$row->username)}}">
											@if(empty($row->profile_image) || $row->profile_image == 'male.png')
											<p data-letters="{{ucfirst(substr($row->name,0,1))}}"></p>
											@else 
											<img class="d-flex align-self-start" src="{{ asset('storage/'.$row->profile_image) }}" >
											<!--<img alt="image" class="img-circle" src="{{ asset('storage/'.$row->profile_image) }}">-->
											@endif
											<h3 class="m-b-xs"><strong>{{$row->name}}</strong></h3>
											<div class="font-bold">{{'@'.$row->username}}</div>
										</a>
										<div class="contact-box-footer">
											<div class="m-t-xs btn-group">
												<a href="{{url('social/message/'.$row->username)}}" class="btn btn--round btn-sm btn-white"><i class="fa fa-envelope"></i> Send Messages</a>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<!-- end friends -->					
					</div>
			</div>
			<div class="col-md-2 padding_div"></div>
	    </div>
    </div>
</section>
<!-- Online users sidebar content-->

<!-- Online users sidebar content-->
<!--script>$(document).ready(function(){
	"use strict";
	  $(".reaction").on("click",function(){   // like click
		var data_reaction = $(this).attr("data-reaction");
		$(".like-details").html("You, arvind and 1k others");
		$(".like-btn-emo").removeClass().addClass('like-btn-emo').addClass('like-btn-'+data_reaction.toLowerCase());
		$(".like-btn-text").text(data_reaction).removeClass().addClass('like-btn-text').addClass('like-btn-text-'+data_reaction.toLowerCase()).addClass("active");
	
		if(data_reaction === "Like"){
		  $(".like-emo").html('<span class="like-btn-like"></span>');
		}
		else{
		  $(".like-emo").html('<span class="like-btn-like"></span><span class="like-btn-'+data_reaction.toLowerCase()+'"></span>');
		}
	  });
	  $(".like-btn-text").on("click",function(){ // undo like click
		  if($(this).hasClass("active")){
			  $(".like-btn-text").text("Like").removeClass().addClass('like-btn-text');
			  $(".like-btn-emo").removeClass().addClass('like-btn-emo').addClass("like-btn-default");
			  $(".like-emo").html('<span class="like-btn-like"></span>');
			  $(".like-details").html("arvind and 1k others");
			  
		  }	  
	  });  
	});
	</script -->
@stop
@section('footer')
@parent
<script src="{{ url('cdn/js/jquery.fancybox.min.js') }}"></script>
<script src="{{url('cdn/js/social.js')}}"></script>
<script>$(window).scroll(function(){
    $(".theFixed").css("top",Math.max(70,162-$(this).scrollTop()));
});</script>
<style>.like-btn-emo-red {
    display: inline-block;
    margin: 0 0px -3px 0;
    color: #FFFFFF;
    width: 22px;
    height: 22px;
    text-align: center;
    border-radius: 50%;
    font-weight: normal;
    line-height: 22px !important;
    background: #c35431;}
	.like-btn-emo-blue {
    display: inline-block;
    margin: 0 0px -3px 0;
    color: #FFFFFF;
    width: 22px;
    height: 22px;
    text-align: center;
    border-radius: 50%;
    font-weight: normal;
    line-height: 22px !important;
    background: #0674ec;
}</style>

<script>

$('.prof-tab').click(function (e) { 
	e.preventDefault();
	$('.lds-ring').css({"display":"block"});
	$('.tab-content').load($(this).attr('href'));
	$('.lds-ring').css({"display":"none"});
});
</script>
@stop