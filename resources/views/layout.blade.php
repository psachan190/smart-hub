<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@if(!empty($title)) {{ $title }} - Kanpurize @else Home - Kanpurize @endif</title>
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta property="fb:admins" content="psachan190"/>
		<meta property="og:url"           content="<?php if(!empty($sharedUrl)){ echo $sharedUrl; } ?>" />
                <meta property="og:type"          content="website" />
                <meta property="og:title"         content="<?php if(!empty($sharetitle)){ echo $sharetitle; } ?>" />
                <meta property="og:description"   content="<?php if(!empty($sharedescription)){ echo  $sharedescription; } ?>" class="dhtml-menu" />
                <meta property="og:image"         content="@if(!empty($shareimageUrl)){{$shareimageUrl}}@endif" />
		<meta name="description" content="@if(!empty($mate_description)){{$mate_description}}@endif">
		<meta name="keywords" content="online platform in kanpur, Online Shopping in Kanpur, Online shop in kanpur,in kanpur, Social Web in Kanpur, Marketplace in Kanpur, Event in Kanpur, online Marketplace in Kanpur, Online Market in Kanpur, Live Event in Kanpur, Webshop in Kanpur, best software development company in kanpur, business promotion in kanpur, Advertisement in kanpur, web development in kanpur">
		@section ('head')
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('cdn/images/favicon.png') }}"/>
		<link rel="stylesheet" href="{{ asset('cdn/css/header.css') }}"/>
		<link rel="stylesheet" href="{{ asset('cdn/css/newstyle.css') }}"/>
		<link rel="stylesheet" href="{{ asset('cdn/css/main.css') }}"/>
		<link rel="stylesheet" href="{{ asset('cdn/css/ngo.css') }}"/>
		<link rel="stylesheet" href="{{ asset('cdn/css/vendor.css') }}"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
		
		@show
	</head>
	<body>
		<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0&appId=1821852827861161&autoLogAppEvents=1';
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			var base_url = "{{ url('') }}";
			
			
		</script>
		 <div class="menu-area">
			<div class="top-menu-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-2 col-sm-2 col-xs-6 v_middle">
							<div class="logo">
								<a href="{{url('')}}"><img src="{{ asset('cdn/images/logo1.png') }}" alt="Marketplace in kanpur" title="Marketplace in kanpur"></a>
							</div>
						</div>
						<div class="col-lg-9 col-md-10 col-sm-10 col-xs-6  v_middle">
							<div class="selknpz author-area">
								<a href="{{url('vendor/RegisteredShop')}}" class="author-area__seller-btn inline">Sell on Kanpurize</a>
								<a href="{{ url('postAds') }}" class="author-area__seller-btn inline">Give Your Ads</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mainmenu" id="header_js">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ul>
								<li>
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="lnr lnr-menu"></span>
										</button>
									</div>
								</li>
								<li>
									<nav class="navbar navbar-default mainmenu__menu">
										<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
											<ul class="nav navbar-nav">
												<li class="">
													<a href="{{url('kanpurizeMarketplace')}}">Market Place</a>
												</li>
												<li class="">
													<a href="{{url('social')}}">Social Web</a>
												</li>
												<li class="has_dropdown">
													<a href="#">Live Kanpur</a>
													<div class="dropdown dropdown--menu">
														<ul>
															<li><a href="{{ url('event') }}">Event</a></li>
															<li><a href="{{url('ngos')}}">NGO</a></li>
															<li><a href="{{url('matrimonial')}}">Matrimonial</a></li>
															<li><a href="{{url('talent')}}">Talent</a></li>
														</ul>
													</div>
												</li>
											</ul>
										</div>
									</nav>
								</li>
								<li>
									<div class="navprofile pull-right">
										<div class="author__notification_area">
											<ul>
						                                            	@if (!Session::get('knpuser'))
						                                                <li><a href="{{url('login')}}" class="loginbutton">Sign In </a></li>
						                                                <li><a href="{{ url('kanpurize_signup') }}" class="signbutton">Sign Up</a></li>
						                                                @endif
						                                                @if(Session::get('knpuser'))
						                                               	<li id="notifications"></li>
												<li class="has_dropdown" id="msg-notifications"></li>
												@endif
												@if(Session::get('knpuser'))
												<li class="has_dropdown">
								                                    <div class="icon_wrap" id="headerCartDiv">
								                                        <a href="<?php echo url("cartList"); ?>"><span class="lnr lnr-cart"></span></a>
													  <?php if(!empty(Cart::count())){
													    ?>
													     <span class="notification_count purch"><span id="cartCount" class="qtycartCount"><?php  echo Cart::count(); ?></span></span>	
														<?php
													  }
													  ?>
								                                        
								                                         
								                                    </div>
								                                   <div id="completeCart" class="drophidenav"> 
								                                   <?php 
								                                     if(!empty(Cart::count())){
								                                        ?>
								                                        <div class="dropdown dropdown--cart">
								                                        <div class="cart_area" id="cartRow">
								                                             <?php foreach(Cart::content() as $row) :?>
								                                             <div>
								                                              <div class="cart_product">
								                                                <div class="product__info">
								                                                    <div class="thumbn">
								                                                      <?php 
								                                                         if(!empty($row->options['image'])){
								                                                            $image =  $row->options['image'];
								                                                            ?> 
								                                                             <img class="img img-circle" src="<?php echo url("uploadFiles/thumbsImg/$image"); ?>" alt="cart product thumbnail">
								                                                            <?php
								                                                           }
								                                                       ?>
								                                                        
								                                                    </div>
								                                                    <div class="info">
								                                                         @php 
								                                                           $value = 4455454; 
								                                                           $urlpID = base64_encode($row->id + $value);
								                                                           $pName = $row->name;
								                                                           $urlPname = str_replace(" ","_",$pName);
								                                                          @endphp
								                                                        <a class="title" href="<?php echo url("productsDetails/$urlpID/$urlPname"); ?>">
								                                                         @if(!empty($row->name)){{ $row->name }} @endif </a>
								                                                         <p>Rs. @if(!empty($row->price)){{ $row->price }} @endif</p>
								                                                    </div>
								                                                </div>
								                                                <div class="product__action">
								                                                    <a id="<?php echo $row->rowId; ?>" href="#" class="removeCart"><span class="lnr lnr-trash"></span></a>
								                                                </div>
								                                            </div>
								                                             </div>
								                                            <?php endforeach; ?>
								                                            <div class="cart_action">
								                                                <a class="go_cart" href='{{ url("cartList") }}'>View Cart</a>
								                                                <a class="go_checkout" href="<?php echo url("orderDetails"); ?>">Checkout</a>
								                                            </div>
								                                        </div>
								                                    </div>
								                                        <?php
								                                      }
								                                   ?> 
								                                   </div>
								                                </li>
												@endif
												@if(!Session::get('knpuser')) 		
												<li>
													<div class="author__avatar">
														<img src="{{ asset('cdn/images/icon/male.png') }}" title="profile image" alt="profile image">
													</div>
													<div class="autor__info">
														<p class="name">
															Hello Guest!
														</p>
													</div>
												</li>
												@else
												<li class="has_dropdown">
													<div class="author__avatar">
														@if (!empty($user->profile_image) && file_exists('storage/'.$user->profile_image))
														<img class="img-circle" src="{{ asset('storage/'.$user->profile_image) }}" title="{{ Session::get('knpUser_name') }}" alt="{{ Session::get('knpUser_name') }}">
														@else 
														 @if(!empty($user->sex)) 
                                                                                                                   @if($user->sex == "M")
                                                                                                                    <img src="{{ asset('cdn/images/icon/male.png') }}" alt="">
												                   @elseif($user->sex == "F")
                                                                                                                    <img src="{{ asset('cdn/images/icon/female.png') }}" alt="">
													  
								                                                   @endif
								                                                  @endif
														@endif
													</div>
													<div class="autor__info">
														<p class="name">
														 @if(!empty($user->name)){{ ucfirst($user->name) }}@endif
															
														</p>
													</div>
													<div class="dropdown messaging--dropdown">
														<div class="messages">
															<span id="myShop_list"></span>
                                                                                                                        <span id="myNgo_list"></span>
                                                                                                                        <span id="myMatrimonialProfile_list"></span>
															<a href="<?php echo url("usersOrder?s=N"); ?>" class="message recent">
										                                                <div class="message__actions_avatar">
										                                                    <div class="avatar">
										                                                        <img src="{{ asset('cdn/images/icon/order.png') }}" alt="">
										                                                    </div>
										                                                </div><!-- end /.actions -->
										
										                                                <div class="message_data">
										                                                    <div class="name_time">
										                                                        <p>My Orders</p>
										                                                    </div>
										                                                </div><!-- end /.message_data -->
										                                            </a>
										                                                            <a href="<?php echo url("wishList"); ?>" class="message recent">
										                                                <div class="message__actions_avatar">
										                                                    <div class="avatar">
										                                                        <img src="{{ asset('cdn/images/icon/wishlist_kanpurize.png') }}" alt="">
										                                                    </div>
										                                                </div><!-- end /.actions -->
										                                                <div class="message_data">
										                                                    <div class="name_time">
										                                                          <p>Wish List&nbsp;<span class="badge" id="countWishList"></span></p>
										                                                    </div>
										                                                </div><!-- end /.message_data -->
										                                            </a>
															<a href="{{url('account')}}" class="message recent">
																<div class="message__actions_avatar">
																	<div class="avatar">
																		<img src="{{ asset('cdn/images/icon/male.png') }}" alt="">
																	</div>
																</div>
																<div class="message_data">
																	<div class="name_time">
																		<p>My Account</p>
																	</div>
																</div>
															</a>
															<a href="{{ url('logout') }}" class="message recent">
																<div class="message__actions_avatar">
																	<div class="avatar">
																		<img src="{{ asset('cdn/images/icon/logout.png') }}" alt="">
																	</div>
																</div>
																<div class="message_data">
																	<div class="name_time">
																		<p>Log Out</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</li>
												@endif
											</ul>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content">
			@yield('content')
		</div>
		<div class="footer">
			@section('footer')
			<footer class="footer-area">
				<div class="footer-big footer-bigknprz section--padding">
					<div class="container padding_div0px">
                    	<div class="col-md-12 padding_div0px">
						<div class="row">
							<div class="footer-menu-knprz">
								<ul>
									<li><a href="{{ url('about#about') }}" target="_blank">About Us</a></li>
									<li><a href="{{ url('about#contact') }}" target="_blank">Contact Us</a></li>
									<li><a href="{{ url('blog') }}" target="_blank">Blog</a></li>
									<li><a href="{{ url('about#testimonial') }}" target="_blank">Testimonials</a></li>
									<li><a href="{{ url('about#services') }}" target="_blank">Services</a></li>
									<li><a href="{{ url('about#whychoos') }}" target="_blank">Why Choose Us</a></li>
									<li><a href="{{ url('career') }}">Career</a></li>
									<li><a href="{{ url('seller-policy') }}">Seller Policy</a></li>
									<li><a href="{{ ('faqs') }}">FAQs </a></li>
									@if(Session::get('knpuser'))
									<li><a href="{{ url('recomended') }}">Recomend Seller</a></li>
									@endif
									<li><a href="{{ url('advertisement') }}">Advertisement Policy</a></li>
									<li><a href="{{ url('restricted-products-and-services-for-sell') }}">Restricted products or services for Sell</a></li>
									<li><a href="{{ url('restricted-advertisement') }}">Restricted products for Advertisement</a></li>
									<li><a href="{{url('cdn/pdf/Refund and Cancellation.pdf')}}" target="_blank">Refund and Cancellation policy</a></li>
								</ul>
								<hr class="hr_footer" />
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="copyright-text">
									<h6 class="copyrighttext">&copy; 2018 <a href="{{ url('#') }}">Kanpurize</a>. All rights reserved. Created by <a href="#">Kanpurize</a></h6>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="social socialknprz social--color--filled pull-right-social">
									<ul>
										<li><a href="https://www.facebook.com/kanpurize/" title="Social Web in Kanpur"><span class="fa fa-facebook" title="Share the store location on Facebook"></span></a></li>
										<li><a href="https://twitter.com/kanpurize" title="Online Shopping in Kanpur"><span class="fa fa-twitter" title="Share the store location on twitter"></span></a></li>
										<li><a href="https://plus.google.com/u/0/110561505744471170049" title="Live Event in Kanpur"><span class="fa fa-google-plus" title="Share the store location on google plus"></span></a></li>
										<li><a href="https://www.linkedin.com/in/kanpurize-the-spirit-of-kanpur-938b58155/" title="Business software in kanpur"><span class="fa fa-linkedin" title="Share the store location on linkedin"></span></a></li>
										<li><a href="https://www.youtube.com/channel/UC9rFsHN1ynWZ3bfEAI9JiiQ?view_as=subscriber" title="Online Market in Kanpur"><span class="fa fa-youtube" title="Share the store location on Youtube"></span></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<a id="back-to-top" class="back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left">&nbsp;&nbsp;&nbsp;<span class="lnr lnr-chevron-up"></span></a>
							</div>
						</div>
                        </div>
					</div>
				</div>
			</footer>
			 @if(session()->has('knpuser'))
			 <div class="popup-boxonline chat-popup">
    		  <div class="popup-head-message">
			            <a class="bg_noneonline" id="showfriend"><img src="{{ asset('cdn/images/online2.png') }}" width="30px" height="30px" >&nbsp;&nbsp;Online User </a>
						</div>
				  </div>
			 @endif   
	  @include('component.pop-up')
	
<script src="{{ asset('cdn/js/footer.js') }}"></script>
<script src="{{ asset('validationJS/backendAjax.js') }}"></script>
<script src="{{ asset('cdn/js/tool.js') }}"></script>
<script src="{{ asset('validationJS/route.js') }}"></script>
<script>
function pancardValidate(panVal,elementname,errMsgElement,disableElement){
   var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
   document.getElementById(errMsgElement).innerHTML = " ";
   if(panVal != ''){
	   if(regpan.test(panVal)){
           document.getElementById(disableElement).disabled = false;
       } else {
		 document.getElementById(errMsgElement).innerHTML =  "<span style='color:red;'>Invalid "+ elementname +" , this Format is invalid !!.</span>";
	     document.getElementById(disableElement).disabled = true;
       }
	 }
   else{
	  document.getElementById(errMsgElement).innerHTML =  "<span style='color:red;'>"+ elementname +" is Required .</span>";
	  document.getElementById(disableElement).disabled = true;
	 }	 
  }
</script>
<script>
$(document).ready(function(e) {
  $(document).on('click','.voteAfterlogin',function(){
	$(".loadOtherPage").load("<?php echo url("talentGetAgax/voteAfterlogin #loginSection"); ?>");  
  });  
  $(document).on('click','.firstLogin',function(){
	$(".loadLoginPage").load("<?php echo url("talentGetAgax/voteAfterlogin #loginSection"); ?>"); 
  });
});
</script>
<!--Get all my_shopList Data start-->
<script>
$(document).ready(function(e) {
  $("#myMatrimonialProfile_list").load("<?php echo url("matrimonial/get_matrimonial"); ?>"); 
  $("#myNgo_list").load("<?php echo url("my_ngo/get_myngo"); ?>");
   $("#myShop_list").load("<?php echo url("vendor/getmyShoplist"); ?>");  
});
</script>
<!--get my all ngo script End -->
<script>
$(document).ready(function(e) {
 <!--sub category products By start-->
 $(document).on('click','.subCatproducts_products',function(){
    var id = this.id;
	var shopID = $('#shopID').val();
	if(id !=" "){
	   $.ajax({
	      url: base_url +"/actionAjaxGet/getsubCatWiseProducts",
		  type:"GET",
		  data:{subCatid:id,shopID:shopID},
		  success: function(data){
		    $('#shopProductsList').html(data)
		  }
	   });
	 }
	else{
	   alert("unexpected Try again...")
	 }  
  });
 <!--sub category products By End-->   	
});
</script> 
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118378963-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118378963-1');
</script>
<script>
$(document).ready(function(e) {
  function move_header(){
    var obj_height = $(window).scrollTop(); 
	if( obj_height >= 87 ){
	    $("#header_js").addClass('header_fix_js');
	  }
	else{ 
	   $("#header_js").removeClass('header_fix_js');
	}  
	$("#feedback_header").html(obj_height);
  }
  $(document).on('scroll',function(){
	  move_header();
  });
 });
$('#msg-notifications').load('{{url("social/action/msg-notifications")}}');
$('#notifications').load('{{url("social/action/notifications")}}');
$(document).on('click','#notifications',function() {
	$.ajax({
	      url: base_url +"/social/action/seen-notification",
		  type:"GET",
		  data:'',
		  success: function(data){
		    	$('.noti').css('display', 'none');
		  }
	   });
});
$('#online-users').load('{{url("social/action/online-users")}}')
</script>
<script>
$(document).ready(function(){
	$("#showfriend").click(function(){
        $("#focusfriend").show();
		//alert("#focusfriend");
    });
    $("#hidefriend").click(function(){
        $("#focusfriend").hide();
    });
});
</script>
@show	  
		</div>
	</body>
</html>