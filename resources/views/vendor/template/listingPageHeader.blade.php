<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php if(!empty($title))echo $title;  ?> | Kanpurize Market Place</title>
    <link href="{{ url ('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ url ('css/font-awesome.min.css') }}" rel="stylesheet" />
     <link href="{{ url ('css/vendor.css') }}" rel="stylesheet" />
      <script src="{{ url ('js/tooltip.js') }}" type="text/javascript"></script>
    <script src="{{ url ('js/sidemenu.js') }}"></script>
    <script src="{{ url ('js/jquery-1.10.2.js') }}"></script>
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
                                <li>
                                <div class="inline">
                                        <a href="#" id="drop2" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <div class="author__avatar">
                                <img src="{{ asset('images/icon/share.png') }}" />

                            </div>
                                        </a>
                                        <ul class="dropdown dropshare messaging_dropdown dropdown-menu" aria-labelledby="drop2">
                                                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=https://kanpurize.com/shareWebshop/<?php echo $vresultData->id;?>?shopRfeid=<?php echo $vresultData->id; ?>"><span class="fa fa-facebook"></span>&nbsp;Facebook</a></li>
                                                <li><a href="https://kanpurize.com/shareWebshop/<?php echo $vresultData->id;?>?shopRfeid=<?php echo $vresultData->id; ?>"><span class="fa fa-google-plus"></span>&nbsp;Google Plus</a></li>
                                                <li><a target="_blank" class='wa_btn wa_btn_s' href="https://web.whatsapp.com/send?text=https://kanpurize.com/shareWebshop/<?php echo $vresultData->id;?>?shopRfeid=<?php echo $vresultData->id; ?>" ><span class="fa fa-whatsapp"></span>&nbsp;Whatsapp</a></li>
                                            </ul>
                                    </div>
                                </li>
                                <li class="has_dropdown">
                                    <div class="author__avatar">
                                 @if($profileImageData != FALSE)   
                                <img src='{{ url("uploadFiles/shopProfileImg/thumbImg/$profileImageData->shoplogoImg") }}' alt="kanpurize_marketPlace_<?php if(!empty($vresultData->vName))echo $vresultData->vName; ?>" style="height:40px; width:40px;" class="img img-circle" />
                                 @else
                                  <img src="{{ asset('images/icon/male.png') }}" alt="kanpurize_marketPlace_<?php if(!empty($vresultData->vName))echo $vresultData->vName; ?>">
                                 @endif

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
                                                        <p>Exit</p>
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
                                    @if(!empty($profileImageData->shoplogoImg))   
                                <img src='{{ url("uploadFiles/shopProfileImg/thumbImg/$profileImageData->shoplogoImg") }}' alt="kanpurize_marketPlace_<?php if(!empty($vresultData->vName))echo $vresultData->vName; ?>" style="height:40px; width:40px;" class="img img-circle" />
                                 @else
                                  <img src="{{ asset('images/icon/male.png') }}" alt="kanpurize_marketPlace_<?php if(!empty($vresultData->vName))echo $vresultData->vName; ?>">
                                 @endif
                                </div>
                                <div class="autor__info v_middle">
                                     <p class="name">
                               <?php if(!empty($vresultData->vName))echo $vresultData->vName; ?>
                                </p>
                                </div>
                            </div>
                             <div class="author__notification_area">
                                    <ul>
                                        <li>
                                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=https://kanpurize.com/shareWebshop/<?php echo $vresultData->id;?>?shopRfeid=<?php echo $vresultData->id; ?>">
                                                <div class="icon_wrap">
                                                    <span class="fa fa-facebook"></span> 
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a target="_blank" href="https://kanpurize.com/shareWebshop/<?php echo $vresultData->id;?>?shopRfeid=<?php echo $vresultData->id; ?>">
                                                <div class="icon_wrap">
                                                    <span class="fa fa-google-plus"></span> 
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a target="_blank" class='wa_btn wa_btn_s' href="https://web.whatsapp.com/send?text=https://kanpurize.com/shareWebshop/<?php echo $vresultData->id;?>?shopRfeid=<?php echo $vresultData->id; ?>">
                                                <div class="icon_wrap">
                                                    <span class="fa fa-whatsapp"></span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                           <div class="dropdown dropdown--author">
                                <ul>
                                    <li> <a href="{{ url('vendorProfile/$shopName') }}" class="message recent">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <img src="{{ asset('images/icon/profile.png') }}" alt="">
                                                    </div>
                                                    <div class="col-xs-8">
                                                    <div class="name_timeresponsive">
                                                        <p>Profile</p>
                                                        </div>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a></li>
                                    <li><a href="{{ url('kanpurize_vendor_logout') }}" class="message recent">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <img src="{{ asset('images/icon/logout.png') }}" alt="">
                                                    </div>
                                                    <div class="col-xs-8">
                                                    <div class="name_timeresponsive">
                                                        <p>Exit</p>
                                                        </div>
                                                    </div>
                                                </div><!-- end /.message_data -->
                                            </a></li>
                                </ul>
                            </div>

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
                    </div>

                    <nav class="navbar navbar-default mainmenu__menu">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="has_dropdown">
                                	 <?php
									  $shopID = $vresultData->id;
									  $first = rand(1,99999);
									  $username = str_replace(" ","-",$vresultData->vName);
									 ?>
                                    <a href="<?php echo url("kanpurize_Vendor_dashboard?username=$username&vendorRefID=$shopID"); ?>">Welcome</a>
                                </li>
                                 <?php
                  if($vresultData->businesscategoryType==1 || $vresultData->businesscategoryType==3){
					 ?>
                                <li class="has_dropdown">
                                <a href="#">all product</a>
                                    <div class="dropdown dropdown--menu">
                                            <ul>
                                                <li><a href="<?php $user_name = str_replace(" ","-",session()->get('knpUser_name'));  echo url("kanpurize_Category_products?user=$username&shops=$shopID"); ?>">Add Product</a></li>
                                                <?php 
												  $pCategory = $vresultData->categoryType;
												  $catArr = explode("@",$pCategory);
												  $pDefaultCat = $catArr[0];
												?>
                                                <li><a href="<?php echo url("productsList?shopID=$shopID&category=$pDefaultCat"); ?>">Product List</a></li>
                                            </ul>
                                        </div>
                                </li>
                                <?php
					}
				?>
                <?php
                  if($vresultData->businesscategoryType==2 || $vresultData->businesscategoryType==3){
					 ?>
                                <li class="has_dropdown">
                                    <a href="all-products-list.html">Services</a>
                                    <div class="dropdown dropdown--menu">
                                            <ul>
                                                <li><a href="<?php $user_name = str_replace(" ","-",session()->get('knpUser_name'));  echo url("kanpurize_List_services?user=$username&shops=$shopID"); ?>">Add Services</a></li>
                                                <li><a href="<?php echo url("kanpurizeService_list"); ?>">Services List</a></li>
                                                
                                            </ul>
                                        </div>
                                </li>
                                 <?php
					}
				?>
                               <li class="has_dropdown">
                                    <a href="#">Advertisement</a>
                                    <div class="dropdown dropdown--menu">
                                            <ul>
                                                <li><a href="<?php  echo url("vendorPostAds"); ?>">Post Ads</a></li>
                                                <li><a href="<?php echo url("approvePost"); ?>">Approve post</a></li>
                                            </ul>
                                        </div>
                                </li>
                               <li class="has_dropdown">
                                    <a href="#">Offers &amp; News</a>
                                    <div class="dropdown dropdown--menu">
                                            <ul>
                                                <li><a href="<?php  echo url("offersNews"); ?>">Post Offers &amp; News</a></li>
                                                <li><a href="<?php echo url("approveOfferPost"); ?>">Approved Offers News</a></li>
                                            </ul>
                                        </div>
                                </li>
                 <li><a href="<?php echo url("uesrsComplain"); ?>">Uesrs Complain</a></li>
                   <li><a href="<?php echo url("orderList"); ?>">Order</a></li>
                <li class="has_dropdown">
                                    <a href="#">More</a>
                                    <div class="dropdown dropdown--menu">
                                            <ul>
                                               @if($vresultData->businesscategoryType==2)
                                                <li><a href="<?php echo url("uploadGallery"); ?>">Gallery</a></li>
                                               @endif 
                                               <?php 
					       if($vresultData->goLiveRequest != 1){
						   ?>
						   <li><a href="<?php echo url("goLiveforwebShop"); ?>">Request for Go Live</a></li>
						   <?php 
						 }
					   ?> 
                                            </ul>
                                        </div>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                        <!-- start mainmenu__search -->
                    </nav>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row-->
        </div><!-- start .container -->
    </div><!-- end /.mainmenu-->
</div>