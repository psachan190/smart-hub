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
			<div class="col-md-2 padding_div theFixed2 profileDetailsBox" id="profileDiv">
				@include('social.leftnav')
                <div class="widget msg_box_size">
					<div class="widget-header">
						<h3 class="widget-caption">Message </h3>
					</div>
					<div class="widget-body bordered-top bordered-sky">
						<div class="card">
							<div class="content">
								<ul class="list-unstyled team-members">
								@foreach($msgs as $row)
									<li>
										<div class="row">
											<div class="col-lg-12 col-xs-12">
												<div class="row margin_div">
													<div class="bgactivesocial box-comments" style="display: block;">
														<div class="box-comment">
															<a href="{{url('social/message/'.$row->username)}}">
							                                                                  	<img class="img-circle img-sm" src="{{ asset('storage/'.$row->profile_image) }}" alt="User Image">
																						<div class="comment-text">
																							<span class="textleft username">                                                                  <b>
							                                                                    <div class="name">
							                                                                       <p class="msg_show">{{$row->name.' '.$row->lname}} <span class="lnr lnr-envelope"></span></p>
							                                                                    </div>
							                                                                 </b>
							                                                                 {{substr($row->msg, 0, 50)}}
							                                                            		</span>
															</div>
							                                                            </a>
							                                                           
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									@endforeach
									 @if(count($msgs)==0)
							                                                            <a href="{{url('social/message')}}">
							                                                                  	<div class="normal-padding">
																<p>No New Message</p>
															</div>
							                                                            </a>
							                                                            @endif
								</ul>
							</div>
						</div>
					</div>
					</div>
			</div>
			<div class="col-md-4 padding_div postDiv" id="postDiv">
				<!--div class="box profile-info n-border-top">
					<form class="new-post" method="POST">
						{{ csrf_field() }}
						<textarea class="content-raw form-control input-lg p-text-area" rows="2" placeholder="Share something ..."></textarea>
						<img id="pic1image" alt="your image" style="display: none" />
						<input type="hidden" name="content" class="contentor" value="">
						<div class="box-footer box-form">
    							<ul class="nav nav-pills pull-right">
								<li><label><span class="lnr lnr-camera buttondefault"></span><input id="pic1" type="file" name="images[]" multiple></label></li>
							</ul>
							<button type="submit" class="btn btn--round btn-md posthideimage"><span class="lnr lnr-thumbs-up"></span> Post</button>
						</div>
					</form>
				</div -->
				<div class="box profile-info n-border-top">
					<form class="new-post" method="POST">
						{{ csrf_field() }}
						<textarea class="content-raw form-control input-lg p-text-area" rows="2" placeholder="Share something ..."></textarea>
						<img id="pic1image" alt="your image" style="display: none" />
						<input type="hidden" name="content" class="contentor" value="">
						<div class="box-footer box-form">
    							<ul class="nav nav-pills pull-right">
								<li><label><span class="lnr lnr-camera buttondefault"></span><input id="pic1" type="file" name="images[]" multiple></label></li>
							</ul>
							<button type="submit" class="btn btn--round btn-md posthideimage"><span class="lnr lnr-thumbs-up"></span> Post</button>
						</div>
					</form>
				</div>
				@include('social.component.post', array('posts' => $posts))
			</div>
			<div class="col-md-3 padding_div sidesrg theFixed1" id="talentAcvity">
				<div class="widget">
					<div class="widget-header">
						<h3 class="widget-caption">Talent activity</h3>
					</div>
					<div class="widget-body bordered-top bordered-sky">
						<div class="card">
							<div class="content">
								<ul class="list-unstyled team-members">
									<li>
										<div class="row">
											<div class="col-lg-12 col-xs-12">
												<div class="row margin_div">
													<div class="bgactivesocial box-comments" style="display: block;">
														<div class="box-comment">
															<img class="user-block-sm1 img-circle img-sm" src="https://www.kanpurize.com/uploadFiles/talent/original/444010aca0cc170ec02c9d753188a63c.jpeg" alt="User Image">
															<div class="comment-text">
																<span class="textleft username"> <b><a href="#">Shree Vighna Harta Mitra Mandal </a></b>
																<br>बम्बा रोड का राजा।. 
																<span class="timeago" >6 days ago</span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="row">
											<div class="col-lg-12 col-xs-12">
												<div class="row margin_div">
													<div class="bgactivesocial box-comments" style="display: block;">
														<div class="box-comment">
															<img class="user-block-sm1 img-circle img-sm" src="https://www.kanpurize.com/uploadFiles/talent/original/5b69005ad43cc858bf66ad6776e2c466.jpg" alt="User Image">
															<div class="comment-text">
																<span class="textleft username"> <b><a href="#">Shree Mahamandelswar Mahadev Mandeer</a></b>
																<br> Ganpati, Eldeco Garden Estate 
																<span class="timeago" >6 days ago</span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li>
									</li>
								</ul>
							</div>
						</div>
					</div>
					</div>
				<div class="widget">
					<div class="widget-header">
						<h3 class="widget-caption">People You May Know</h3>
					</div>
					<div class="widget-body bordered-top bordered-sky">
						<div class="card">
								<ul class="list-unstyled team-members">
									<li>
										<div class="row">
											<div class="media user-follower">
												<div class="col-xs-12">
													<div class="widgetngo__text-content" style="margin:20px;">
		                                <div id="testimonialsmobile">
		                            <div class="testimonialsmobile-list">
		                            
		                                 <!-- Single Testimonial -->  
		                                <div class="single-testimonial">
		                                    <div class="testimonial-holder">
		                                        <div class="testimonial-content"><iframe width="290" height="150" src="https://www.youtube.com/embed/ueztdyJmdYE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		                                        </div>
		                                        <div class="row">
		                                            <div class="testimonial-user clearfix">
		                                                <div class="testimonial-user-name"><p>Beti Bachao !! you will cry after watching this heart touching video !!</p> </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <!-- End of Single Testimonial -->  
		                                
		                                <!-- Single Testimonial -->  
		                                <div class="single-testimonial">
		                                    <div class="testimonial-holder">
		                                        <div class="testimonial-content"><img src=" https://www.kanpurize.com/cdn/images/talent/slider4.png" alt="Testimonial Avatar">
		                                        </div>
		                                        <div class="row">
		                                            <div class="testimonial-user clearfix">
		                                                <div class="testimonial-user-name"><p>Vote For Your Favourite Ganpati Pandal</p> </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                 <!-- End of Single Testimonial -->  
		                                 
		                                <!-- Single Testimonial -->  
		                                <div class="single-testimonial">
		                                    <div class="testimonial-holder">
		                                        <div class="testimonial-content"><iframe width="290" height="150" src="https://www.youtube.com/embed/NkqGxJ3x0qY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		                                        </div>
		                                        <div class="row">
		                                            <div class="testimonial-user clearfix">
		                                                <div class="testimonial-user-name"><p>Swatantra Kanpur Campaign !! Kanpurize`s first presence</p> </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="single-testimonial">
		                                    <div class="testimonial-holder">
		                                        <div class="testimonial-content"><img src="https://www.kanpurize.com/cdn/images/ngo/3.jpg" alt="Testimonial Avatar">
		                                        </div>
		                                        <div class="row">
		                                            <div class="testimonial-user clearfix">
		                                                <div class="testimonial-user-name"><p>NGO in Kanpur</p> </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <!-- End of Single Testimonial -->  
		                                
		                            </div>
		                        </div>
		                            </div>
											</div>
										</div>
									</li>
									
								</ul>
						</div>
					</div>
					</div>
			</div>
            </div>
			<div class="col-md-3">
			</div>
		</div>
	</div>
</div>
@include('social.common')
@stop
@section('footer')
@parent
<script src="{{url('cdn/js/social.js')}}"></script>
<script src="{{ asset('cdn/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('cdn/js/socialmobileslider.js')}}"></script>
<script>
$(document).ready(function(e) {
	function talentActivityBoxFixed(){
	  var p = $("#talentAcvity");
	  var profileDivPosition = $("#profileDiv").position();;
	  var postDivPosition = $("#postDiv").position();
      var position = p.position();	
	  /*var navoffset = jQuery(".sidesrg").offset().top;*/
	  var scrollPos = jQuery(window).scrollTop();
	    if(scrollPos >= 90) {
		  var windowSize = $(window).width();
		   if(windowSize <= 768){
			      $(".sidesrg").css({"position":"relative"});
			      $(".postDiv").css({"position":"relative"});
			      $(".profileDetailsBox").css({"position":"relative"});
			  }
		   else{
			    var profileDivOuter = $("#profileDiv").innerWidth();
				var com = profileDivOuter + profileDivPosition.left;
				$('.status').html(com);
				jQuery(".sidesrg").addClass("sidesrg_fixed");
				$(".postDiv").css({"position":"relative","top":"90px" ,"left":" "+ profileDivOuter +"px" , "margin":"0 0 0px 0" , });
				$(".profileDetailsBox").css({"position":"fixed","top":"90px" ,"left":" "+ profileDivPosition.left +"px" , "margin":"0 0 0px 0" , }); 
				$(".sidesrg").css({"position":"fixed","top":"90px" ,"left":" "+ position.left +"px" , "margin":"0 0 0px 0" , }); 
			 }	  
		 }
		 else{
			$(".sidesrg").removeAttr('style');
			$(".postDiv").removeAttr('style');
			$('.profileDetailsBox').removeAttr('style');
		 }
	}
	
	talentActivityBoxFixed();
	$(window).scroll(function(){
	   talentActivityBoxFixed();
	}).resize(function(){
	    talentActivityBoxFixed();
	}); 
});
</script>
@stop