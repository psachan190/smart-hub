<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php if(!empty($title))echo $title;  ?> | Kanpurize Market Place</title>
    <link href="{{ url ('kanpurizeTheme/assets/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ url ('kanpurizeTheme/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
     <link href="{{ url ('kanpurizeTheme/assets/css/vendor.css') }}" rel="stylesheet" />
      <script src="{{ url ('kanpurizeTheme/assets/js/tooltip.js') }}" type="text/javascript"></script>
    <script src="{{ url ('kanpurizeTheme/assets/js/sidemenu.js') }}"></script>
    <script src="{{ url ('kanpurizeTheme/assets/js/jquery-1.10.2.js') }}"></script>
    <script src="{{ url ('kanpurizeTheme/assets/js/bootstrap.js') }}"></script>
    <script src="{{ url ('datepicker/bootstrap-datepicker.js') }}"></script>
     <link href="{{ url ('datepicker/datepicker.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/plugins.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/theamcss.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet" />
</head>
<body>
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
                        <a href="#"><img src="{{ asset('images/logo1.png') }}" alt="logo image"></a>
                    </div>
                </div><!-- end /.col-md-3 -->

                <!-- start .col-md-5 -->
                <div class="col-md-8 col-md-offset-1 col-xs-5 col-sm-9 v_middle">
                    <!-- start .author-area -->
                    <div class="author-area">
                        <div class="author__notification_area">
                            <ul>
                                <li class="has_dropdown">
                                    <div class="author__avatar">
                                <img src="{{ asset('images/usr_avatar.png') }}" alt="user avatar">

                            </div>
                            <div class="autor__info">
                                <p class="name">
                               <?php if(!empty(session()->get('knpUser_name')))echo session()->get('knpUser_name'); ?>
                                </p>
                            </div>
                                    <div class="dropdown messaging--dropdown">
                                    @php $shopName = str_replace(" ","_",$vresultData->vName); @endphp
                                        <div class="messages">
                                            <a href="{{ url("vendorProfile/$shopName") }}" class="message recent">
                                                <div class="message__actions_avatar">
                                                    <div class="avatar">
                                                        <img src="{{ asset('images/notification_head4.png') }}" alt="">
                                                    </div>
                                                </div><!-- end /.actions -->

                                                <div class="message_data">
                                                    <div class="name_time">
                                                       
                                                        <p>Profile</p>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a><!-- end /.message -->
                                            <a href="<?php echo url("kanpurize_vendor_logout"); ?>" class="message recent">
                                                <div class="message__actions_avatar">
                                                    <div class="avatar">
                                                        <img src="{{ asset('images/notification_head4.png') }}" alt="">
                                                    </div>
                                                </div><!-- end /.actions -->
                                                <div class="message_data">
                                                    <div class="name_time">
                                                        <p>Log Out</p>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a>  
                                        </div>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="mobile_content ">
                        <span class="lnr lnr-user menu_icon"></span>
                        <div class="offcanvas-menu closed">
                            <span class="lnr lnr-cross close_menu"></span>
                            <div class="author-author__info">
                                <div class="author__avatar v_middle">
                                    <img src="{{ asset('images/usr_avatar.png') }}" alt="user avatar">
                                </div>
                                <div class="autor__info v_middle">
                                    <p class="name">
                               <?php if(!empty(session()->get('knpUser_name')))echo session()->get('knpUser_name'); ?>
                                </p>
                                </div>
                            </div>
                            <div class="dropdown dropdown--author">
                                <ul>
                                    <li><a href="#"><span class="lnr lnr-user"></span>Profile</a></li>
                                    <li><a href="#"><span class="lnr lnr-home"></span> Dashboard</a></li>
                                    <li><a href="#"><span class="lnr lnr-cog"></span> Setting</a></li>
                                    <li><a href="<?php echo url("kanpurize_vendor_logout"); ?>"><span class="lnr lnr-exit"></span>Logout</a></li>
                                </ul>
                            </div>

                            <div class="text-center"> <a href="{{ url('kanpurize_RegisteredShop') }}" class="author-area__seller-btn inline">Sale on Kanpurize</a></div>
                        </div>
                    </div><!-- end /.mobile_content -->
                </div><!-- end /.col-md-5 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </div><!-- end  -->

  </div>
<section class="breadcrumb-area" style="margin-bottom:50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#">Welcome</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Kanpurize the Spirit of Kanpur</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="service">
	<div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 text-center">  
                    <h1>Welcome to Seller Dashboard!</h1>
                    <p>Complete your profile to start selling on Kanpurize</p>
                </div> 
            </div>   
            <div class="service-icon">
				 <div class="col-sm-12 col-md-12">
            <div class="post">
                <div class="post-img-content">
                   
                </div>
                <div class="content">
                    <div>
                    <style>
                    .msg{ font-family:Georgia, "Times New Roman", Times, serif; font-size:22px; text-align:center; }
                    </style>
                      <p class="msg text-info">
                       Thank you for registration on Kanpurize.com . Your Details have been successfully submitted your Account will be Activated after Physical Verification by our team within next 2 working Days.
                      </p>      
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>    
			</div>       
   </div>
</div> 


   <script src=" {{ url('kanpurizeTheme/assets/js/jquery-1.10.2.js') }}"></script>
   <script src="{{ url('kanpurizeTheme/assets/js/bootstrap.js') }}"></script>
@include("vendor.template.vendorFooter")

