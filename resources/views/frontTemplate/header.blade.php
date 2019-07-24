<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $title }}| Kanpurize the spirit of Kanpur</title>
    <link href="{{ asset('public/kanpurizeTheme/assets/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/kanpurizeTheme/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ url('public/kanpurizeTheme/assets/css/font-awesome-animation.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/kanpurizeTheme/assets/css/prettyPhoto.css') }}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="{{ asset('public/kanpurizeTheme/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/kanpurizeTheme/assets/css/mycss.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/kanpurizeTheme/assets/css/slider.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/sideNavigation/sidenav.css') }}" rel="stylesheet" />
</head>
<body>
<div class="container-fluid div-social-top1">
	<div class="container">
       <div class="row">
    <div class=" col-sm-12 col-md-6 col-lg-6">
       <div class="sicon">
        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 text-center">
            <div class="icon-circle">
                <a href="#" class="ifacebook" title="Facebook"><i class="fa fa-facebook"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 text-center">
            <div class="icon-circle">
                <a href="#" class="itwittter" title="Twitter"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 text-center">
            <div class="icon-circle">
                <a href="#" class="igoogle" title="Google+"><i class="fa fa-google-plus"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 text-center">
            <div class="icon-circle">
                <a href="#" class="iLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
    </div> 
    </div>
        <div class=" col-sm-12 col-md-4 col-lg-2 " >
            	          
    </div>
        <div class=" col-sm-12 col-md-2 col-lg-4" style="float:right;">
        <img src="<?php echo url("public/kanpurizeTheme/assets/img/mobile-icon.png"); ?>" width="20px" height="20px">
         <span>91-7706040151 </span>&nbsp;&nbsp;
        <img src="<?php echo url("public/kanpurizeTheme/assets/img/google.png"); ?>" width="20px" height="20px">
         <span> info@kanpurize.com</span>	
    </div>
   </div>
</div>
</div>
<section id="navbar">
    <div class=" navbar navbar-default">
        <div class="container">
        	<div class="col-sm-9">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo url("kanpurizeMarketplace"); ?>">
                    <img src="<?php echo url("public/kanpurizeTheme/assets/img/logo2.png"); ?>" class="navbar-brand-logo " alt="" />
                </a>
            </div>
            <div class="navbar-collapse collapse" >
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="<?php echo url("kanpurizeMarketplace"); ?>">HOME PAGE<i class="fa fa-home"></i></a> 
                    </li>
                    <li class="dropdown">
                        <a href="#">Social Web<i class="fa fa-users"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="<?php echo url("kanpurizeMarketplace"); ?>">Market Place<i class=" fa fa-bars"></i></a>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </ul>
            </div>
            </div>
            <div class="col-sm-3">
               <div class="menu1">
           	  <div class="menu-content1">
              		<div>
			<img src='<?php echo url("public/kanpurizeTheme/assets/img/portfolio/1.jpg"); ?>' class='iconDetails img-circle'>
		</div>	
	<div style='margin-left:50px;'>
	<h4><a class="" href="#" id="login1" style="font-size:16px; margin-top:20px;"><?php
                       if(!empty(session()->get('knpUser_name')))echo session()->get('knpUser_name');
					 ?><img src="<?php echo url("public/kanpurizeTheme/assets/gallery/related/click.png"); ?>" width="25"></a></h4>
	</div>
               </div>
               <div class="arrow-up1"></div>
           </div>
               <div class="login-form1 row">
                	 <div class="navbar-login">
                                <ul class="ta1">
                                    	<li class="row">
                                        	<a href="#"><div class="col-xs-3 col-sm-3">
                                        <img src="<?php echo url("public/kanpurizeTheme/assets/img/portfolio/1.jpg"); ?>" class="iconDetails1 img-circle" >
                                        	</div>
                                            <div class=" ta1per col-xs-9 col-sm-9">
                                       &nbsp;&nbsp;Account
                                        	</div></a>
                                        </li>
                                        <div class="borline"></div>
                                        <li class="row">
                                        	<a href="#"><div class="col-xs-3 col-sm-3">
                                        <img src="<?php echo url("public/kanpurizeTheme/assets/img/portfolio/1.jpg"); ?>" class="iconDetails1 img-circle" >
                                        	</div>
                                            <div class="ta1per col-xs-9 col-sm-9">
                                        &nbsp;&nbsp;Edit Profile
                                        	</div></a>
                                        </li>
                                        <div class="borline"></div>
                                        <?php
                                        if($shopList != FALSE){
										     foreach($shopList as $list){
											     $sID = $list->id;
												 $first = rand(1,9999);
												 $sName = $list->vName;
												 $thumbsImg = $list->thumbnailsImg;
												 ?>
												 <li class="row">
                                                <a href="<?php echo url("kanpurize_Vendor_firstdashboard?username=$first.$sName&vendorRefID=$sID"); ?>"> 
                                        	     <div class="col-xs-3 col-sm-3">
                                                   <?php if(empty($thumbsImg)){
													  ?>
													  <img src="<?php echo url("public/uploadFiles/shopProfileImg/thumbImg/shopImage.jpeg"); ?>" class="img-responsive img-circle" alt="kanpurize_shop_thumbnail_<?php echo str_replace(" ","_",$list->vName); ?>" />
													  <?php
													  } 
													 else{ ?>
													 <img src="<?php echo url("public/uploadFiles/shopProfileImg/thumbImg/$thumbsImg"); ?>" class=" iconDetails1 img-circle" >
													 <?php
													} 
												   ?>
                                                 </div>
                                            <div class="ta1per col-xs-9 col-sm-9">
                                              <?php if(strlen($list->vName) < 15){ echo $list->vName; }else{ echo substr($list->vName,0,15)."..."; } ?>
                                        	</div>
                                            </a>
                                        </li><div class="borline"></div>
												 <?php
											   }     
										   }
										?>
                                        <li class="row">
                                        	<div class=" col-xs-9 col-sm-9">
                                             <a href="<?php echo url("knpLogout"); ?>">LogOut</a>
                                        	</div>
                                        </li>
                                    </ul>
                            </div>
               </div>
            </div>
        </div>
</div>
<div class="div-social-top">
	<div class="row">
		<div class="col-sm-12 col-md-5">
        </div>
        <div class=" col-sm-12 col-md-2">
        </div>
        <div class=" col-sm-12 col-md-5">
        	<form class="navbar-form navbar-search" role="search">
                <div class="input-group">
                        <div class="input-group-btn">
                        <button type="button" class=" form-control btn btn-search btn-default dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-search"></span>
                            <span class="label-icon">Search</span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-left" role="menu">
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <span class="label-icon">Search By Product</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                <span class="glyphicon glyphicon-book"></span>
                                <span class="label-icon">Search By Organization</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                        <button class="btn btn-info btn-md" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                     </span>
                </div>  
            </form>  
        </div>
    </div>
    </div>
</section>