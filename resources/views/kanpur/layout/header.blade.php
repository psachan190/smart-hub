<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The platform called 'Kanpurize' is developed after almost three years of Market Research & finding out the pain areas in the market. Started with the idea of Bridging the Gap between a Buyer's Expectation & a Seller's potential, we identified the pain of both the Buyers & Sellers in the market & started working on a Business">
    <meta name="keywords" content="online kanpur shop, best kanpur webshop, marketplace kanpur">
    <title><?php echo $title; ?> Kanpurize || The Spirit of Kanpur</title>
   <!--Share script start-->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}"/>
     <link rel="stylesheet" href="{{ asset('css/newstyle.css') }}"/>
   <!--  <link rel="stylesheet" href="{{ asset('css/plugins.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/theamcss.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet" />
     <link href="{{ asset('css/vendor.css') }}" rel="stylesheet" /> -->

    <!-- endinject -->
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
</head>
<body class="home1 mutlti-vendor">
<script> 
var base_url = "{{ url('') }}";
$.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
</script>
<!-- ================================
    START MENU AREA
================================= -->
<!-- start menu-area -->
<div class="menu-area">
    <!-- start .top-menu-area -->
    <div class="top-menu-area">
        <!-- start .container -->
        <div class="container">
            <!-- start .row -->
            <div class="row">
                <!-- start .col-md-3 -->
                <div class="col-lg-3 col-md-2 col-sm-2 col-xs-7 v_middle">
                    <div class="logo">
                        <a href="<?php echo url("kanpurizeMarketplace"); ?>"><img src="{{ asset('images/logo1.png') }}" alt="logo image"></a>
                    </div>
                </div><!-- end /.col-md-3 -->

                <!-- start .col-md-5 -->
                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-5  v_middle">
                    <!-- start .author-area -->
                    <div class="author-area">
                        <a href="{{ url('kanpurize_RegisterAds') }}" class="author-area__seller-btn inline">Give Your Ads</a>
                        <a href="{{ url('kanpurize_Register_Shop') }}" class="author-area__seller-btn inline">Sell on Kanpurize</a>
                       
                        <div class="author__notification_area">
                            <ul>
                                <li class="has_dropdown">
                                    <div class="icon_wrap" id="headerCartDiv">
                                        <span class="lnr lnr-cart"></span>
										  <?php if(!empty(Cart::count())){
										    ?>
										     <span class="notification_count purch"><span id="cartCount" class="qtycartCount"><?php  echo Cart::count(); ?></span></span>	
											<?php
										  }
										  ?>
                                        
                                         
                                    </div>
                                   <div id="completeCart"> 
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
                                <li>
                                <div class="inline">
                                        <a href="#" id="drop2" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <div class="author__avatar">
                                <img src="{{ asset('images/icon/share.png') }}" />

                            </div>
                                        </a>
                                        <ul class="dropdown dropshare messaging_dropdown dropdown-menu" aria-labelledby="drop2">
                                                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=https://kanpurize.com/shareProfile/<?php echo session()->get('knpUser_id'); ?>"><span class="fa fa-facebook"></span>&nbsp;Facebook</a></li>
                                                <li><a target="_blank" href="https://plus.google.com/share?url=https://kanpurize.com/shareProfile/<?php echo session()->get('knpUser_id'); ?>"><span class="fa fa-google-plus"></span>&nbsp;Google Plus</a></li>
                                                <li><a target="_blank" class='wa_btn wa_btn_s' href="https://web.whatsapp.com/send?text=https://kanpurize.com/shareProfile/<?php echo session()->get('knpUser_id'); ?>" ><span class="fa fa-whatsapp"></span>&nbsp;Whatsapp</a></li>
                                            </ul>
                                    </div>
                                </li>
                                <li class="has_dropdown">
                                    <div class="author__avatar">
                                     <?php 
									  if(empty(Auth::user()->sex)){
										  ?>
										 <img src="{{ asset('images/icon/male.png') }}" alt="@if(!empty(session()->get('knpUser_name'))){{ session()->get('knpUser_name')@endif">
										  <?php
										}
									  else if(Auth::user()->sex==1){
										  ?>
											<img src="{{ asset('images/icon/female.png') }}" alt="@if(!empty(session()->get('knpUser_name'))){{ session()->get('knpUser_name')@endif">
										  <?php
										} 	  
									  ?>
                                     </div>
                            <div class="autor__info">
                                <p class="name">
                                @if(!empty(session()->get('knpUser_name'))){{ session()->get('knpUser_name') }}@endif
                                </p>
                            </div>
                                    <div class="dropdown messaging--dropdown">
                                        <div class="messages">

                                            <a href="{{ url('/'.Auth::user()->username) }}" class="message recent">
                                                <div class="message__actions_avatar">
                                                    <div class="avatar">
                                                        <img src="{{ asset('images/notification_head4.png') }}" alt="">
                                                    </div>
                                                </div><!-- end /.actions -->

                                                <div class="message_data">
                                                    <div class="name_time">
                                                        <!--<div class="name">
                                                            <p>NukeThemes</p>
                                                            <span class="lnr lnr-envelope"></span>
                                                        </div>

                                                        <span class="time">Just now</span>-->
                                                        <p>Profile</p>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a><!-- end /.message -->
                                         <span id="usersprofileListName"></span> 
                                        @if($shopList != FALSE)
                                             @foreach($shopList as $list)
                                                @php $sID = $list->id;
                                                 $first = rand(1,9999);
                                                 $sName = str_replace(" ","_",$list->vName);
                                                 $thumbsImg = $list->thumbnailsImg;
                                                @endphp
                                            <a href="<?php echo url("kanpurize_Vendor_firstdashboard?username=$first.$sName&vendorRefID=$sID"); ?>" class="message recent">
                                                <div class="message__actions_avatar">
                                                    <div class="avatar">
                                                      @if(empty($thumbsImg))
                                                       <img src="<?php echo url("uploadFiles/shopProfileImg/thumbImg/shopImage.jpeg"); ?>" alt="">
                                                       @else
                                                       <img src="<?php echo url("uploadFiles/shopProfileImg/thumbImg/$thumbsImg"); ?>" class=" iconDetails1 img-circle" >
                                                      @endif
                                                    </div>
                                                </div><!-- end /.actions -->
                                                <div class="message_data">
                                                    <div class="name_time">
                                                        <p><?php if(strlen($list->vName) < 25){ echo $list->vName; }else{ echo substr($list->vName,0,25)."..."; } ?></p>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a><!-- end /.message -->
                                            @endforeach
                                        @endif 
                                            <a href="<?php echo url("usersOrder?s=N"); ?>" class="message recent">
                                                <div class="message__actions_avatar">
                                                    <div class="avatar">
                                                        <img src="{{ asset('images/icon/order.png') }}" alt="">
                                                    </div>
                                                </div><!-- end /.actions -->

                                                <div class="message_data">
                                                    <div class="name_time">
                                                        <p>Your Orders</p>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a>
                                            
                                            <a href="<?php echo url("kanpurize_users_wishList"); ?>" class="message recent">
                                                <div class="message__actions_avatar">
                                                    <div class="avatar">
                                                        <img src="{{ asset('images/icon/wishlist_kanpurize.png') }}" alt="">
                                                    </div>
                                                </div><!-- end /.actions -->
                                                <div class="message_data">
                                                    <div class="name_time">
                                                        <p>Wish List</p>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a>
                                            
                                            
                                            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" class="message recent">

                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                     {{ csrf_field() }}
                                                     </form>
                                               <div class="message__actions_avatar">
                                                   <div class="avatar">
                                                       <img src="{{ asset('images/icon/logout.png') }}" alt="">
                                                   </div>
                                               </div>

                                               <div class="message_data">
                                                   <div class="name_time">
                                                       <p>Logout</p>
                                                   </div>
                                               </div>
                                           </a>
                                            
                                            
                                        </div>
                                    </div>
                                </li>
                                
                            </ul>
                        </div><!--start .author__notification_area -->

                        <!--start .author-author__info-->
                        <!--end /.author-author__info-->
                    </div><!-- end .author-area -->
                    <div class="mobile_content">
                        <span class="lnr lnr-user menu_icon"></span>

                        <!-- offcanvas menu -->
                        <div class="offcanvas-menu closed">
                            <span class="lnr lnr-cross close_menu"></span>
                            <div class="author-author__info">
                                <div class="author__avatar v_middle">
                                    <img src="{{ asset('images/icon/male.png') }}" alt="user avatar">
                                </div>
                                <div class="autor__info v_middle">
                                    <p class="name">
                                       @if(!empty(session()->get('knpUser_name'))){{ session()->get('knpUser_name')                                       }}@endif
                                    </p>
                                </div>
                            </div><!--end /.author-author__info-->

                            <div class="author__notification_area">
                                <ul>
                                   <li>
                                        <a href="{{ url('cartList')}}" title="market shop in kanpur">
                                            <div class="icon_wrap">
                                                <span class="lnr lnr-cart">	</span><span id="cartCount" class="notification_count purch"><?php if(!empty(Cart::count()))echo Cart::count(); else echo "0";  ?></span>
                                            </div>
                                        </a>
                                    </li>
                                   <li>
                                   <a href="whatsapp://send?text=https://kanpurize.com/shareProfile/<?php echo session()->get('knpUser_id'); ?>">
                                   <div class="icon_wrap">
                                   <span class="fa fa-whatsapp" aria-hidden="true"></span>
                                   </div>
                                    </a>
                                   
                                     
                                    </li> 
                                </ul>
                            </div><!--start .author__notification_area -->

                            <div class="dropdown dropdown--author">
                                <ul>
                                    <li><a href="{{ url('/'.Auth::user()->username) }}" class="message recent" title="online shopping in kanpur">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <img src="{{ asset('images/icon/profile.png') }}" alt="market shop in kanpur">
                                                    </div>
                                                    <div class="col-xs-8">
                                                    <div class="name_timeresponsive">
                                                        <p>Profile</p>
                                                        </div>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a></li>
                                    <li>@if($shopList != FALSE)
                                             @foreach($shopList as $list)
                                                @php $sID = $list->id;
                                                 $first = rand(1,9999);
                                                 $sName = $list->vName;
                                                 $thumbsImg = $list->thumbnailsImg;
                                                @endphp
                                            <a href="<?php echo url("kanpurize_Vendor_firstdashboard?username=$first.$sName&vendorRefID=$sID"); ?>" class="message recent" title="social web in kanpur">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                      @if(empty($thumbsImg))
                                                       <img src="<?php echo url("uploadFiles/shopProfileImg/thumbImg/shopImage.jpeg"); ?>" class="img-responsive img-circle" alt="market shop in kanpur">
                                                       @else
                                                       <img src="<?php echo url("uploadFiles/shopProfileImg/thumbImg/$thumbsImg"); ?>" class=" img-responsive iconDetails1 img-circle" alt="web shop in kanpur" >
                                                      @endif
                                                    </div>
                                                    <div class="col-xs-8">
                                                    <div class="name_timeresponsive">
                                                        <p><?php if(strlen($list->vName) < 15){ echo $list->vName; }else{ echo substr($list->vName,0,15)."..."; } ?></p>
                                                    </div>
                                                </div>
                                                </div><!-- end /.message_data -->
                                            </a><!-- end /.message -->
                                            @endforeach
                                        @endif </li>
                                    <li><a href="{{ url('usersOrder') }}" class="message recent" title="online shopping in kanpur">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <img src="{{ asset('images/icon/order.png') }}" alt="market shop in kanpur">
                                                    </div>
                                                    <div class="col-xs-8">
                                                    <div class="name_timeresponsive">
                                                        <p>Your Orders</p>
                                                        </div>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a></li>
                                            <li><a href="{{ url('kanpurize_users_wishList') }}" class="message recent" title="online shopping in kanpur">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <img src="{{ asset('images/icon/wishlist_kanpurize.png') }}" alt="market shop in kanpur">
                                                    </div>
                                                    <div class="col-xs-8">
                                                    <div class="name_timeresponsive">
                                                        <p>Wish List</p>
                                                        </div>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a></li>
                                   <li>
                                    
                                    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" class="message recent">
<div class="row">
                                                    <div class="col-xs-4">
                                                         <img src="{{ asset('images/icon/logout.png') }}" alt="">
                                                    </div>
                                                    <div class="col-xs-8">
                                                    <div class="name_timeresponsive">
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                     {{ csrf_field() }}
                                                     </form>
                                                     	 <p>Logout</p>
                                                        </div>
                                                    </div>
                                                </div>
                                           </a>
                                            
                                            </li>
                                </ul>
                            </div>

                            <div class="text-center"> <a href="{{ url('kanpurize_RegisterAds') }}" class="author-area__seller-btn inline">Give Your Add</a></div><br />
                             <div class="text-center"> <a href="{{ url('kanpurize_Register_Shop') }}" class="author-area__seller-btn inline" title="marketplace in kanpur">Sell on Kanpurize</a></div>
                        </div>
                    </div><!-- end /.mobile_content -->
                </div><!-- end /.col-md-5 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </div><!-- end  -->

    <!-- start .mainmenu_area -->
    <div class="mainmenu">
        <!-- start .container -->
        <div class="container">
            <!-- start .row-->
            <div class="row">
                <!-- start .col-md-12 -->
                <div class="col-md-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="lnr lnr-menu"></span>
                        </button>
                    </div>
                    <nav class="navbar navbar-default mainmenu__menu">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="<?php echo url("kanpurizeMarketplace"); ?>">Market Place</a>
                                </li>
                                <li class="has_dropdown">
                                        <a href="#">Live Kanpur</a>
                                        <div class="dropdown dropdown--menu">
                                            <ul>
                                                <li><a href="<?php echo url("Kanpur_event"); ?>">Event</a></li>
                                            </ul>
                                        </div>
                                    </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->

                        <!-- start mainmenu__search -->
                        <div class="mainmenu__search hidden-xs">
                            <!--
                            <form action="https://www.google.com/search" class="searchform" method="get" name="searchform" >
                                <div class="searc-wrap">
                                   <input name="sitesearch" type="hidden" value="kanpurize.com">
<input autocomplete="on" class="form-control search" name="q" placeholder="Search in here" required="required"  type="text">
                                    <button type="submit" class="search-wrap__btn"><span class="lnr lnr-magnifier"></span></button>
                                </div>
                            </form>
                            -->
                        </div><!-- start mainmenu__search -->
                    </nav>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row-->
        </div><!-- start .container -->
    </div><!-- end /.mainmenu-->
</div><!-- end /.menu-area -->
<!--================================
    END MENU AREA
=================================-->