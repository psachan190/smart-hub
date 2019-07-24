@extends('layout')
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/conect.css') }}"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>  
@stop
@section('content')
<section class="products">
	<div class="container-fluid page-content edit-profile">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul class="nav nav-tabs nav-tabs-custom-colored tabs-iconized">
					<li class="active"><a href="#profile-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-user"></i> Profile</a></li>
					@if ($user->id == session()->get('knpuser'))
					<li class=""><a href="#activity-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-rss"></i> Notification</a></li>
					<li class=""><a href="#coupons-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-money"></i> My Coupons</a></li>
					@endif
					<!--li class=""><a href="#settings-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> Settings</a></li -->
				</ul>
				<div class="tab-content profile-page">
					<div class="tab-pane profile active" id="profile-tab">
						<div class="row boxsizepr">
							<div class="col-md-3 col-sm-3">
								<div class="user-info-left">
									@if(empty($user->profile_image))
									<img src="{{ asset('cdn/images/default-boy.png') }}" alt="Profile Picture">
									@else
									<img src="{{ asset('storage/'.$user->profile_image) }}" alt="Profile Picture">
									@endif 
									<h2>@if(!empty($user->name)){{$user->name. ' '. $user->lname}} @endif</h2>
									<!--div class="contact">
										<p>
											<span class="file-input btn btn--round btn-sm btn-file">
											Upload Image <input type="file" multiple>
											</span>
										</p>
										<p>
											<span class="file-input btn btn--round btn-sm btn-file">
											Upload Cover <input type="file" multiple>
											</span>
										</p>
										</div -->
								</div>
								<div class="contact">
									<ul class="list-inline social">
										<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=https://www.kanpurize.com/shareProfile/<?php if(!empty($user->username))echo $user->username; ?>" title="Facebook"><i class="fa fa-facebook-square"></i></a></li>
										@if(!empty($device_type == "D"))
										<li> <a target="_blank" href="https://web.whatsapp.com/send?text=https://www.kanpurize.com/shareProfile/<?php if(!empty($user->username))echo $user->username; ?>" title="Whatsapp"><i class="fa fa-whatsapp"></i></a></li>
										@else
										<li><a target="_blank" href="whatsapp://send?text=https://www.kanpurize.com/shareProfile/{{$user->username}} " data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a></li>
										@endif
										<li><a target="_blank" href="https://plus.google.com/share?url=https://www.kanpurize.com/shareProfile/<?php if(!empty($user->username))echo $user->username; ?>" title="Google Plus"><i class="fa fa-google-plus-square"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-9 col-sm-9">
								<div class="user-info-right">
									<div class="basic-info">
										<h3><a href="#" data-toggle="modal" data-target="#profileedit"><span class="editcs1 lnr lnr-pencil"></span></a> Basic Information</h3>
										<p class="data-row">
											<span class="data-name">Username</span>
											<span class="data-value">/@if(!empty($user->username)) {{ $user->username }} @endif</span>
										</p>
										<p class="data-row">
											<span class="data-name">Birth Date</span>
											<span class="data-value">
											@if(!empty($user->birthday)){{ date_format(date_create($user->birthday),'M d, Y')  }} @endif
											</span>
										</p>
										<p class="data-row">
											<span class="data-name">Gender</span>
											<span class="data-value">
											<?php
												if(!empty($user->sex)){
												if ($user->sex == 'M') echo 'Male';
												else if ($user->sex == 'F') echo 'Female';
												else echo 'Other';
												  }	
												?>
											</span>
										</p>
									</div>
									<div class="contact_info">
										<!-- data-toggle="modal" data-target="#Contactinfo" -->
										<h3><a href="#" ><span class="editcs1 lnr lnr-list"></span></a> Contact Information</h3>
										<p class="data-row">
											<span class="data-name">Email</span>
											<span class="data-value">@if(!empty($user->email)){{$user->email}} @endif</span>
										</p>
										<p class="data-row">
											<span class="data-name">Contact</span>
											<span class="data-value">@if(!empty($user->mobileNumber)){{$user->mobileNumber}} @endif</span>
										</p>
									</div>
									<div class="about">
										<h3><a href="#" data-toggle="modal" data-target="#profileedit"><span class="editcs1 lnr lnr-pencil"></span></a> About Me</h3>
										<p>@if(!empty($user->about)){{$user->about}} @endif</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane activity" id="activity-tab">
						
					</div>
					<div class="tab-pane settings" id="coupons-tab">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--profile edit-->
<div class="gal-container nopadding">
	<div class="col-md-12 col-sm-12 co-xs-12">
		<div class="boximg formseller">
			<div class="modal modalngo fade" id="profileedit" tabindex="-1" role="dialog">
				<div class="modal-dialog mobilengo" role="document">
					<div class="modal-content popupsize1">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<div class="modal-body pupopzoom">
							<div class="boxed-body signin-area">
								<form class="form-horizontal" id="profile1" method="POST">
									{{csrf_field()}}
									<div class="widgetngo__heading">
										<h4 class="widgetngo__title">Basic <span class="base-color">Information</span></h4>
									</div>
									<div class="form-group">
										<div class="col-sm-6">
											<label>User Name </label>
											<input type="text" name="username" value="@if(!empty($user->username)){{$user->username}}@endif" placeholder="Username" />
										</div>
										<div class="col-sm-6">
											<label>Date of Birth </label>
											<input type="text" id="datep" value="@if(!empty($user->birthday)) {{date_format(date_create($user->birthday),'m/d/Y')}} @endif" placeholder="Date Of Birth" name="dob">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6">
											<div class="custom-radio" align="left">
												Gender&nbsp;
												<input type="radio" id="gender1" class="addressType" name="gender" value="M" <?php if(!empty($user->sex)){ if ($user->sex == 'M') {echo 'checked="checked"'; } } ?>>
												<label for="gender1"><span class="circle"></span>Male</label>&nbsp;&nbsp;
												<input type="radio" id="gender2" class="addressType" name="gender" value="F" <?php if(!empty($user->sex)){ if ($user->sex == 'F') {echo 'checked="checked"'; } } ?>>
												<label for="gender2"><span class="circle"></span>Female</label>
												<small class="text-danger"></small>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<label>About Me </label>
											<textarea cols="30" rows="3" placeholder="Yout text here" name="about">@if(!empty($user->about)){{$user->about}} @endif</textarea>
										</div>
									</div>
									<div class="" align="center">
										<button type="submit" class="author-area__seller-btn inline"> Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--profile edit end-->
<!--contact information-->
<div class="gal-container nopadding">
	<div class="col-md-12 col-sm-12 co-xs-12">
		<div class="boximg formseller">
			<div class="modal modalngo fade" id="Contactinfo" tabindex="-1" role="dialog">
				<div class="modal-dialog mobilengo" role="document">
					<div class="modal-content popupsize1">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<div class="modal-body pupopzoom">
							<div class="boxed-body signin-area">
								<form class="form-horizontal"  method="POST">
									<div class="widgetngo__heading">
										<h4 class="widgetngo__title">Contact <span class="base-color">Information</span></h4>
									</div>
									<div class="form-group">
										<div class="col-sm-6">
											<label>Email Id </label>
											<input type="email" name="email" placeholder="User email" />
										</div>
										<div class="col-sm-6">
											<label>Mobile No. </label>
											<input type="number" value="mobile" name="mobile" placeholder="Mobile No." >
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<label>Address </label>
											<textarea cols="30" rows="3" placeholder="Yout text here" name="About"></textarea>
										</div>
									</div>
									<div class="" align="center">
										<a href="#" data-toggle="modal" data-target="#list_itom" title="sell on kanpurize" class="author-area__seller-btn inline"> Save</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--contact information end-->
@stop
@section('footer') 
@parent
<script>
$(function() {
	$( "#datep" ).datepicker({
	    dateFormat : 'mm/dd/yy',
	    changeMonth : true,
	    changeYear : true,
	    yearRange: '-100y:c+nn',
	    maxDate: '-1d'
	});
});
$('#activity-tab').load('{{url("account/notifications")}}');
$(document).on('click','.pages',function(e) {
	e.preventDefault();
	var href = $(this).attr('href');
	$('#activity-tab').load(href);
});
$('#coupons-tab').load('{{url("account/coupons")}}');
$(document).on('click','.coupon-pages',function(e) {
	e.preventDefault();
	var href = $(this).attr('href');
	$('#coupons-tab').load(href);
});
</script>
<script>
	$(document).ready(function(){
	    $("form#profile1").submit(function(event) {
	        event.preventDefault();
	        $('.lds-ring').css({"display":"block"});
	        $.ajax({
	            type: "POST",
	            url: "{{url('action/profile')}}",
	            data: $("#profile1").serialize() ,
	            success: function(data){
	            	alert(data);
	            	$('.profile-page').load("https://www.kanpurize.com/account #profile-tab");
	            	$('.lds-ring').css({"display":"none"});
	            }
	        });
	    });
	});
</script>
@stop