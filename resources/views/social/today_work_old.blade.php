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
				<div class="profile-nav">
					<div class="widget" >
						<div class="widget-body timelinebg">
							<div class="user-block userheight">
								@if (!empty($user->profile_image) && file_exists($user->profile_image))
								<img class="img-circle" src="{{ asset('storage/'.$user->profile_image) }}" alt="">
								@else 
								<img src="{{ asset('cdn/images/icon/male.png') }}" alt="">
								@endif
								<img class="img-circle" src="{{ asset('cdn/images/back/food.jpg') }}" alt="User Image">
								<span class="usernamesocial"><a href="#">{{$user->name}}</a></span>
								<i id="showtimelineBtn" data-price="1" class="fa fa-bars visible-xs pull-right marginrights"></i>
							</div>
						</div>
					</div>
					<div class="widget timelineborder">
						<div class="ms-menu1 hidden-xs" id="timelineListMenu">
							<div class="widget-body clearfix">
								<ul class="nav nav-pills nav-stacked" >
									<li class="active socialactive"><a href="#"> <i class="fa fa-user"></i> News feed</a></li>
									<li>
										<a href="#"> 
										<i class="fa fa-envelope"></i> Messages 
										</a>
									</li>
									<li><a href="#"> <i class="fa fa-calendar"></i> Events</a></li>
									<li><a href="#"> <i class="fa fa-image"></i> Photos</a></li>
									<li><a href="#"> <i class="fa fa-share"></i> Browse</a></li>
									<li><a href="#"> <i class="fa fa-floppy-o"></i> Saved</a></li>
									
									<li><a href="#"> <i class="fa fa-globe"></i> Pages</a></li>
									<li><a href="#"> <i class="fa fa-gamepad"></i> Games</a></li>
									<li><a href="#"> <i class="fa fa-puzzle-piece"></i> Ads</a></li>
									<li><a href="#"> <i class="fa fa-home"></i> Markerplace</a></li>
									<li><a href="#"> <i class="fa fa-users"></i> Groups</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 padding_div">
				<div class="box profile-info n-border-top">
					<form>
						<textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?"></textarea>
					</form>
					<div class="box-footer box-form">
						<button type="button" class="btn btn--round btn-md pull-right"><span class="lnr lnr-thumbs-up"></span> Post</button>
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-map-marker"></i></a></li>
							<li><a href="#"><i class="fa fa-camera"></i></a></li>
							<li><a href="#"><i class=" fa fa-film"></i></a></li>
							<li><a href="#"><i class="fa fa-microphone"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="box box-widget">
					<div class="box-header with-border">
                    	<div class="row">
                        	<div class="col-sm-9 col-xs-9">
                            	<div class="user-block">
							<img class="img-circle" src="{{ asset('cdn/images/back/food.jpg') }}" alt="User Image">
							<span class="username"><a href="#">John Breakgrow jr.</a></span>
							<span class="description">03 Sep, 2018 01:33 PM</span>
						</div>
                            </div>
                            <div class="col-sm-3 col-xs-3">
                            <div class="inline posttopside">
                                        <a href="#" id="drop2" class="dropdown-trigger btn  btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <em class="fa fa-ellipsis-h"></em>
                                        </a>
                                                <ul class="postdrop dropdown dropdown--author messaging_dropdown dropdown-menu" aria-labelledby="drop2">
                                                    <li><a href="#"><span class="lnr lnr-plus-circle"></span>Post Edit</a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#deletepost"><span class="lnr lnr-trash"></span> Post Delete</a></li>
                                                    <li><a href="dashboard-setting.html"><span class="lnr lnr-cog"></span> Setting</a></li>
                                                </ul>
                                        
                                    </div>
                            </div>
                        </div>
					</div>
					<div class="box-body" style="display: block;">
                    <div class="imgsizediv">
                    <a data-fancybox="gallery" href="{{ asset('cdn/images/back/food.jpg') }}" data-caption="">
						<img class="img-responsive show-in-modal" src="{{ asset('cdn/images/back/food.jpg') }}" alt="Photo">
                        </a></div>
						<p>I took this photo this morning. What do you guys think?</p>
						<ul>
							<li class="swicss1 like-reaction">
								<!-- container div for reaction system --> 
								<span class="like-btn">
									<!-- Default like button --> 
									<span class="fa like-btn-emo fa-thumbs-o-up"></span> <!-- Default like button emotion--> 
									<span class="like-btn-text">Like</span> <!-- Default like button text,(Like, wow, sad..) default:Like  -->
									<ul class="reactions-box">
										<!-- Reaction buttons container-->
										<li class="reaction reaction-like" data-reaction="Like"></li>
										<li class="reaction reaction-love" data-reaction="Love"></li>
										<li class="reaction reaction-haha" data-reaction="HaHa"></li>
										<li class="reaction reaction-wow" data-reaction="Wow"></li>
										<li class="reaction reaction-sad" data-reaction="Sad"></li>
										<li class="reaction reaction-angry" data-reaction="Angry"></li>
									</ul>
								</span>
							</li>
							<li class="swicss1"><button type="button" class=" sharepost"><i class="fa fa-share"></i> Share</button></li>
						</ul>
					</div>
					<div class="box-footer box-comments" style="display: block;">
						<div class="like-stat">
							<!-- Like statistic container--> 
							<span class="like-emo">
								<!-- like emotions container --> 
								<span class="like-btn-like"></span> <!-- given emotions like, wow, sad (default:Like) --> 
							</span>
							<a href="#" data-toggle="modal" data-target="#likefriendlist"><span class="like-details">arvind and 1k others</span></a>
							<span class="pull-right text-muted">127 likes - 3 comments</span>
						</div>
					</div>
					<div class="box-footer box-comments" style="display: block;">
						<div class="box-comment">
							<img class="img-circle img-sm" src="{{ asset('cdn/images/back/food.jpg') }}" alt="User Image">
							<div class="comment-text">
								<span class="username">
								Luna Stark
								<span class="text-muted pull-right">8:03 PM Today</span>
								</span>
								It is a long established fact that a reader will be distracted
								by the readable content of a page when looking at its layout.
							</div>
						</div>
					</div>
					<div class="box-footer" style="display: block;">
						<form action="#" method="post">
							<img class="img-responsive img-circle img-sm" src="{{ asset('cdn/images/back/food.jpg') }}" alt="Alt Text">
							<div class="img-push">
								<input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
							</div>
						</form>
					</div>
				</div>
                <div class="box box-widget">
					<div class="box-header with-border">
						<div class="user-block">
							<img class="img-circle" src="{{ asset('cdn/images/back/food.jpg') }}" alt="User Image">
							<span class="username"><a href="#">John Breakgrow jr.</a></span>
							<span class="description">Shared publicly - 7:30 PM Today</span>
						</div>
					</div>
					<div class="box-body" style="display: block;">
                    <div class="imgsizediv">
                    <a data-fancybox="gallery" href="https://www.kanpurize.com/storage/6a88e4169cad01dc0885a89d10f51952.jpg " data-caption="">
						<img class="img-responsive show-in-modal" src="https://www.kanpurize.com/storage/6a88e4169cad01dc0885a89d10f51952.jpg " alt="Photo">
                        </a>
                        </div>
						<p>I took this photo this morning. What do you guys think?</p>
						<ul>
							<li class="swicss1 like-reaction">
								<!-- container div for reaction system --> 
								<span class="like-btn">
									<!-- Default like button --> 
									<span class="fa like-btn-emo fa-thumbs-o-like"></span> 
									<span class="like-btn-text">Like</span> <!-- Default like button text,(Like, wow, sad..) default:Like  -->
									<ul class="reactions-box">
										<!-- Reaction buttons container-->
										<li class="reaction reaction-like" data-reaction="Like" data-reactionValue="Like"></li>
                                        <li class="reaction reaction-like" data-reaction="Dislike" data-reactionValue="Dislike"></li>
										<li class="reaction reaction-wow" data-reaction="Wow" data-reactionValue="1"></li>
										<li class="reaction reaction-wow" data-reaction="Wow" data-reactionValue="2"></li>
										<li class="reaction reaction-wow" data-reaction="Wow" data-reactionValue="3"></li>
										<li class="reaction reaction-wow" data-reaction="Wow" data-reactionValue="4"></li>
										<li class="reaction reaction-wow" data-reaction="Wow" data-reactionValue="5"></li>
									</ul>
								</span>
							</li>
							<li class="swicss1"><button type="button" class=" sharepost"><i class="fa fa-share"></i> Share</button></li>
						</ul>
					</div>
					<div class="box-footer box-comments" style="display: block;">
						<div class="like-stat">
							<!-- Like statistic container--> 
							<span class="like-emo">
								<!-- like emotions container --> 
								<span class="like-btn-like"></span> <!-- given emotions like, wow, sad (default:Like) --> 
							</span>
							<a href="#" data-toggle="modal" data-target="#likefriendlist"><span class="like-details">arvind and 1k others</span></a>
							<span class="pull-right text-muted">127 likes - 3 comments</span>
						</div>
					</div>
					<div class="box-footer box-comments" style="display: block;">
						<div class="box-comment">
							<img class="img-circle img-sm" src="{{ asset('cdn/images/back/food.jpg') }}" alt="User Image">
							<div class="comment-text">
								<span class="username">
								Luna Stark
								<span class="text-muted pull-right">8:03 PM Today</span>
								</span>
								It is a long established fact that a reader will be distracted
								by the readable content of a page when looking at its layout.
							</div>
						</div>
					</div>
					<div class="box-footer" style="display: block;">
						<form action="#" method="post">
							<img class="img-responsive img-circle img-sm" src="{{ asset('cdn/images/back/food.jpg') }}" alt="Alt Text">
							<div class="img-push">
								<input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-2 padding_div">
				<div class="widget">
					<div class="widget-header">
						<h3 class="widget-caption">Friends activity</h3>
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
															<img class="img-circle img-sm" src="http://127.0.0.1:8000/cdn/images/back/food.jpg" alt="User Image">
															<div class="comment-text">
																<span class="username"> <b><a href="#">Mohit Verma</a></b> shared a 
																<b><a href="#">publication</a></b>. 
																<span class="timeago" >5 min ago</span>
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
															<img class="img-circle img-sm" src="http://127.0.0.1:8000/cdn/images/back/food.jpg" alt="User Image">
															<div class="comment-text">
																<span class="username"> <b><a href="#">Mohit Verma</a></b> shared a 
																<b><a href="#">publication</a></b>. 
																<span class="timeago" >5 min ago</span>
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
							<div class="content">
								<ul class="list-unstyled team-members">
									<li>
										<div class="row">
											<div class="media user-follower">
												<div class="col-xs-3">
													<div class="avatar">
														<img src="{{ asset('cdn/images/guy-2.jpg') }}" alt="Circle Image" class="img-circle img-responsive">
													</div>
												</div>
												<div class="col-xs-9">
													<div class="row">
														<div class="col-xs-12"><a href="#">Michael</a></div>
														<div class="col-xs-12"><button type="button" class="btn btn-sm btn-toggle-following pull-left">
															<i class="fa fa-checkmark-round fassize"></i> <span>Following</span></button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="row">
											<div class="media user-follower">
												<div class="col-xs-3">
													<div class="avatar">
														<img src="{{ asset('cdn/images/guy-2.jpg') }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
													</div>
												</div>
												<div class="col-xs-9">
													<div class="row">
														<div class="col-xs-12"><a href="#">Michael</a></div>
														<div class="col-xs-12"><button type="button" class="btn btn-sm pull-left">
															<i class="fa fa-user-plus fassize"></i> Follow</button>
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
<!--like friend list detail-->
<div class="gal-container nopadding">
	<div class="col-md-12 col-sm-12 co-xs-12">
		<div class="boximg formseller">
			<div class="modal modalngo fade" id="likefriendlist" tabindex="-1" role="dialog">
				<div class=" mobilengo" role="document">
					<div class="likefriendpopup modal-content modal-sm popupsize1">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<div class="modal-body">
							<div class="boxed-body signin-area">
								<h2><span class="fa fa-thumbs-o-up"></span>&nbsp; Likes list</h2>
								<div class="box box-widget box-widgetfriend">
									<div class="row borderbottom margin_div normal-padding">
										<div class="col-sm-8 col-xs-7 mediafriendlike mediafriend">
											<img class="d-flex align-self-startfriendlist" src="https://www.kanpurize.com/storage/549c92ee18638577943b09f0d2de569d.jpg" alt="Generic placeholder image">
											<div class=" pl-3">
												<div class="stats">
													<span class="usernamesocial"><a href="#">Sohan</a></span>
												</div>
												<div class="">
													<span class="fassize usernamesocial"><a href="#">@</a></span>
												</div>
											</div>
										</div>
										<div class="col-sm-4 col-xs-5">
											<div class="friena12">
												<a href="#" class="btn defalutbtncss  btn-md btn--white">Friend</a>
                                                <a href="#" class="btn defalutbtncss  btn-md btn--white">Message</a>
											</div>
										</div>
									</div>
									<div class="row borderbottom margin_div normal-padding">
										<div class="col-sm-8 col-xs-7 mediafriendlike mediafriend">
											<img class="d-flex align-self-startfriendlist" src="https://www.kanpurize.com/storage/549c92ee18638577943b09f0d2de569d.jpg" alt="Generic placeholder image">
											<div class=" pl-3">
												<div class="stats">
													<span class="usernamesocial"><a href="#">Sohan</a></span>
												</div>
												<div class="">
													<span class="fassize usernamesocial"><a href="#">@</a></span>
												</div>
											</div>
										</div>
										<div class="col-sm-4 col-xs-5">
											<div class="friena12">
												<a href="#" class="btn defalutbtncss  btn-md btn--white">Friend</a>
                                                <a href="#" class="btn defalutbtncss  btn-md btn--white">Message</a>
											</div>
										</div>
									</div>
									<div class="row borderbottom margin_div normal-padding">
										<div class="col-sm-8 col-xs-7 mediafriendlike mediafriend">
											<img class="d-flex align-self-startfriendlist" src="https://www.kanpurize.com/storage/549c92ee18638577943b09f0d2de569d.jpg" alt="Generic placeholder image">
											<div class=" pl-3">
												<div class="stats">
													<span class="usernamesocial"><a href="#">Sohan</a></span>
												</div>
												<div class="">
													<span class="fassize usernamesocial"><a href="#">@</a></span>
												</div>
											</div>
										</div>
										<div class="col-sm-4 col-xs-5">
											<div class="friena12">
												<a href="#" class="btn defalutbtncss  btn-md btn--white">Friend</a>
                                                <a href="#" class="btn defalutbtncss  btn-md btn--white">Message</a>
											</div>
										</div>
									</div>
									<div class="row borderbottom margin_div normal-padding">
										<div class="col-sm-8 col-xs-7 mediafriendlike mediafriend">
											<img class="d-flex align-self-startfriendlist" src="https://www.kanpurize.com/storage/549c92ee18638577943b09f0d2de569d.jpg" alt="Generic placeholder image">
											<div class=" pl-3">
												<div class="stats">
													<span class="usernamesocial"><a href="#">Sohan</a></span>
												</div>
												<div class="">
													<span class="fassize usernamesocial"><a href="#">@</a></span>
												</div>
											</div>
										</div>
										<div class="col-sm-4 col-xs-5">
											<div class="friena12">
												<a href="#" class="btn defalutbtncss  btn-md btn--white">Friend</a>
                                                <a href="#" class="btn defalutbtncss  btn-md btn--white">Message</a>
											</div>
										</div>
									</div>
									<div class="row borderbottom margin_div normal-padding">
										<div class="col-sm-8 col-xs-7 mediafriendlike mediafriend">
											<img class="d-flex align-self-startfriendlist" src="https://www.kanpurize.com/storage/549c92ee18638577943b09f0d2de569d.jpg" alt="Generic placeholder image">
											<div class=" pl-3">
												<div class="stats">
													<span class="usernamesocial"><a href="#">Sohan</a></span>
												</div>
												<div class="">
													<span class="fassize usernamesocial"><a href="#">@</a></span>
												</div>
											</div>
										</div>
										<div class="col-sm-4 col-xs-5">
											<div class="friena12">
												<a href="#" class="btn defalutbtncss  btn-md btn--white">Friend</a>
                                                <a href="#" class="btn defalutbtncss  btn-md btn--white">Message</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--like friend list detail-->
<!--Delete post-->
<div class="gal-container nopadding">
   <div class="col-md-12 col-sm-12 co-xs-12">
      <div class="boximg formseller">
         <div class="modal modalngo fade" id="deletepost" tabindex="-1" role="dialog">
            <div class="modal-dialog mobilengo" role="document">
               <div class="modal-content popupsize1">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="modal-body">
                     <div class="boxed-body signin-area">
                        <h2><span class="lnr lnr-trash"></span>&nbsp; Post Delete</h2>
									<div class="row borderbottom margin_div normal-padding">
                                    	<p>This will be removed from your timeline. You can edit this post if you want to change something.
If you didn`t create this post, we can help you secure your account.</p>
<hr />
										<div align="center";><button class="btn btn-md">Edit</button>
                                        <button class="btn btn-md btn-danger">Delete</button></div>
									</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
<!--Delete post End-->
@stop
@section('footer')
@parent
<script>$(document).ready(function(){
	"use strict";
	  $(".reaction").on("click",function(){   // like click
		var data_reaction = $(this).attr("data-reaction");
		var value_reaction = $(this).attr("data-reactionValue");
		alert(value_reaction);
		//var data_reaction_symbol = 'wow';
		alert(data_reaction);
		$(".like-details").html("You, arvind and 1k others");
		$(".like-btn-emo").removeClass().addClass('like-btn-emo').addClass('like-btn-'+data_reaction.toLowerCase());
		$(".like-btn-text").text(value_reaction).removeClass().addClass('like-btn-text').addClass('like-btn-text-'+data_reaction.toLowerCase()).addClass("active");
	
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
	});</script>
<script src="{{ asset('cdn/js/jquery.fancybox.min.js') }}"></script>
@stop