<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The platform called 'Kanpurize' is developed after almost three years of Market Research & finding out the pain areas in the market. Started with the idea of Bridging the Gap between a Buyer's Expectation & a Seller's potential, we identified the pain of both the Buyers & Sellers in the market & started working on a Business">
    <meta name="keywords" content="online kanpur shop, best kanpur webshop, marketplace kanpur">
    <title>Kanpurize || The Spirit of Kanpur</title>
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/plugins.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/theamcss.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet" />
   
    <!-- endinject -->
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
</head>

<body class="home1 mutlti-vendor">

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
                <div class="col-md-3 col-sm-3 col-xs-7 v_middle">
                    <div class="logo">
                        <a href="<?php echo url("kanpurizeMarketplace"); ?>"><img src="{{ asset('images/logo1.png') }}" alt="logo image"></a>
                    </div>
                </div><!-- end /.col-md-3 -->

                <!-- start .col-md-5 -->
                <div class="col-md-8 col-md-offset-1 col-xs-5 col-sm-9 v_middle">
                    <!-- start .author-area -->
                    <div class="author-area">
                        <a href="{{ url('kanpurize_RegisteredShop') }}" class="author-area__seller-btn inline">Sell on Kanpurize</a>
                       
                        <div class="author__notification_area">
                            
                            <ul>
                               <!---
                                <li class="has_dropdown">
                                    <div class="icon_wrap">
                                        <span class="lnr lnr-alarm"></span> <span class="notification_count noti">2</span>
                                    </div>
                                    <div class="dropdown notification--dropdown">
                                        <div class="dropdown_module_header">
                                            <h4>My Notifications</h4>
                                            <a href="notification.html">View All</a>
                                        </div>
                                        <div class="notifications_module">
                                            <div class="notification">
                                                <div class="notification__info">
                                                    <div class="info_avatar">
                                                        <img src="{{ asset('images/notification_head.png') }}" alt="">
                                                    </div>
                                                    <div class="info">
                                                        <p><span>Mohit Sahu</span> <a href="#">Mccarther Coffee Shop</a></p>
                                                        <p class="time">Just now</p>
                                                    </div>
                                                </div>

                                                <div class="notification__icons ">
                                                    <span class="lnr lnr-heart loved noti_icon"></span>
                                                </div>
                                            </div>
                                            <div class="notification">
                                                <div class="notification__info">
                                                    <div class="info_avatar">
                                                        <img src="{{ asset('images/notification_head.png') }}" alt="">
                                                    </div>
                                                    <div class="info">
                                                        <p><span>Mohit Sahu</span> <a href="#">Mccarther Coffee Shop</a></p>
                                                        <p class="time">Just now</p>
                                                    </div>
                                                </div>

                                                <div class="notification__icons ">
                                                    <span class="lnr lnr-star loved noti_icon"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </li> 
                                <li class="has_dropdown">
                                    <div class="icon_wrap">
                                        <span class="lnr lnr-cart"></span> <span class="notification_count purch"><span id="cartCount"><?php if(!empty(Cart::count()))echo Cart::count(); else echo "0";  ?></span></span>
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
                                <li class="has_dropdown">
                                    <div class="author__avatar">
                                <img src="{{ asset('images/usr_avatar.png') }}" alt="user avatar">

                            </div>
                            <div class="autor__info">
                                <p class="name">
                                @if(!empty(session()->get('knpUser_name'))){{ session()->get('knpUser_name')                                 }}@endif
                                </p>
                            </div>
                                    <div class="dropdown messaging--dropdown">
                                        <div class="messages">
                                            <a href="#" class="message recent">
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
                                        @if($shopList != FALSE)
                                             @foreach($shopList as $list)
                                                @php $sID = $list->id;
                                                 $first = rand(1,9999);
                                                 $sName = $list->vName;
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
                                                        <p><?php if(strlen($list->vName) < 15){ echo $list->vName; }else{ echo substr($list->vName,0,15)."..."; } ?></p>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a><!-- end /.message -->
                                            @endforeach
                                        @endif 
                                            <a href="<?php echo url("usersOrder"); ?>" class="message recent">
                                                <div class="message__actions_avatar">
                                                    <div class="avatar">
                                                        <img src="{{ asset('images/notification_head4.png') }}" alt="">
                                                    </div>
                                                </div><!-- end /.actions -->

                                                <div class="message_data">
                                                    <div class="name_time">
                                                        <p>Your Orders</p>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a>
                                              <a href="{{ url('/'.Auth::user()->username) }}" class="message recent">
                                                <div class="message__actions_avatar">
                                                    <div class="avatar">
                                                        <img src="{{ asset('images/notification_head4.png') }}" alt="">
                                                    </div>
                                                </div><!-- end /.actions -->

                                                <div class="message_data">
                                                    <div class="name_time">
                                                        <p>My Social Profile</p>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a>
                                              <a href="{{ url('/settings') }}" class="message recent">
                                                <div class="message__actions_avatar">
                                                    <div class="avatar">
                                                        <img src="{{ asset('images/notification_head4.png') }}" alt="">
                                                    </div>
                                                </div><!-- end /.actions -->

                                                <div class="message_data">
                                                    <div class="name_time">
                                                        <p>Settings</p>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a>
                                              <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="message recent">
                                                <div class="message__actions_avatar">
                                                    <div class="avatar">
                                                        <img src="{{ asset('images/notification_head4.png') }}" alt="">
                                                    </div>
                                                </div><!-- end /.actions -->

                                                <div class="message_data">
                                                    <div class="name_time">
                                                        <p>Logout</p>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                            <a href="<?php echo url("knpLogout"); ?>" class="message recent">
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
                                                        <p>Log Out</p>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a>
                                              
                                        </div>
                                    </div>
                                </li>
                                
                            </ul>
                        </div><!--start .author__notification_area -->

                        <!--start .author-author__info-->
                        <!--end /.author-author__info-->
                    </div><!-- end .author-area -->

                    <!-- author area restructured for mobile -->
                    <div class="mobile_content ">
                        <span class="lnr lnr-user menu_icon"></span>

                        <!-- offcanvas menu -->
                        <div class="offcanvas-menu closed">
                            <span class="lnr lnr-cross close_menu"></span>
                            <div class="author-author__info">
                                <div class="author__avatar v_middle">
                                    <img src="{{ asset('images/usr_avatar.png') }}" alt="user avatar">
                                </div>
                                <div class="autor__info v_middle">
                                    <p class="name">
                                       @if(!empty(session()->get('knpUser_name'))){{ session()->get('knpUser_name')                                 
                                       }}@endif
                                    </p>
                                </div>
                            </div><!--end /.author-author__info-->

                            <div class="author__notification_area">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <div class="icon_wrap">
                                                <span class="lnr lnr-alarm"></span> <span class="notification_count noti">25</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="icon_wrap">
                                                <span class="lnr lnr-envelope"></span> <span class="notification_count msg">6</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="icon_wrap">
                                                <span class="lnr lnr-cart"></span> <span class="notification_count purch">2</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div><!--start .author__notification_area -->

                            <div class="dropdown dropdown--author">
                                <ul>
                                    <li><a href="#"><span class="lnr lnr-user"></span>Profile</a></li>
                                    <li><a href="#"><span class="lnr lnr-cart"></span>Purchases</a></li>
                                    <li><a href="#"><span class="lnr lnr-heart"></span> Favourite</a></li>
                                    <li><a href="<?php echo url("knpLogout"); ?>"><span class="lnr lnr-exit"></span>Logout</a></li>
                                </ul>
                            </div>

                            <div class="text-center"> <a href="{{ url('kanpurize_RegisteredShop') }}" class="author-area__seller-btn inline">Sell on Kanpurize</a></div>
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

                        <!-- start mainmenu__search -->
                        <div class="mainmenu__search hidden-sm hidden-md hidden-lg">
                            <form id="custom-search-input" method="get" action="{{ url('/search') }}">
                                <div class="searc-wrap">
                                    <input type="text" name="s" placeholder="search...">
                                    <button   type="button" class="search-wrap__btn"><span class="lnr lnr-magnifier"></span></button>
                                </div>
                            </form>
                        </div><!-- start mainmenu__search -->
                    </div>

                    <nav class="navbar navbar-default mainmenu__menu">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="has_dropdown">
                                    <a href="<?php echo url("kanpurizeMarketplace"); ?>">HOME</a>
                                </li>
                                <li class="has_dropdown">
                                    <a href="<?php echo url("kanpurizeMarketplace"); ?>">Market Place</a>
                                </li>
                                <li class="has_dropdown">
                                    <a href="{{ url('/home')}}">Social Web</a>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->

                        <!-- start mainmenu__search -->
                        <div class="mainmenu__search hidden-xs">
                            <form id="custom-search-input" method="get" action="{{ url('/search') }}">
                                <div class="searc-wrap">
                                    <input type="text" name="s" placeholder="search...">
                                    <button   type="button" class="search-wrap__btn"><span class="lnr lnr-magnifier"></span></button>
                                </div>
                            </form>
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