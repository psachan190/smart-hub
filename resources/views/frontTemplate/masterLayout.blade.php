@section('headerSection')
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
        <img src="<?php echo url("kanpurizeTheme/assets/img/mobile-icon.png"); ?>" width="20px" height="20px">
         <span>91-7706040151 </span>&nbsp;&nbsp;
        <img src="<?php echo url("kanpurizeTheme/assets/img/google.png"); ?>" width="20px" height="20px">
         <span> info@kanpurize.com</span>	
    </div>
   </div>
</div>
</div>
<div id="navbar">
<div class=" navbar navbar-default  menu-back">
        <div class="container">
        	<div class="col-sm-9">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo url("kanpurizeMarketplace"); ?>">
                    <img src="<?php echo url("kanpurizeTheme/assets/img/logo2.png"); ?>" class="navbar-brand-logo " alt="" />
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
                    <li class="dropdown">
                        <a href="#">Contact<i class="fa fa-users	
"></i>
                        </a>
                    </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </ul>
            </div>
            </div>
            <div class="col-sm-3">
<style>
#login1{ color:#000;
}
.menu1{ margin-top:20px;
color:#000;}
.menu1>.menu-content1{ width:300px; height:40px; float:right; font-size:20px; letter-spacing:-0.05em; position:relative;}
.menu1>.menu-content1>a{ color:#fff; text-decoration:none;}
.arrow-up1{ width:0; height:0; position:absolute; border-left:20px transparent solid; border-right:20px transparent solid; border-bottom: 20px solid #FB9351; right:141px; top:60px; display:none;}
.login-form1{ position:absolute; background-color:#fff; right:0px; top:70px;
border-radius:2px; border-bottom:5px solid #FB9351; z-index:1000; display:none; border:#FB9351 1px solid;
}
.login-form1>form{ margin:25px auto; font-size:20px; font-family:sans-serif, Arial, Helvetica, sans-serif; color:#000; letter-spacing:-0.05em;}
.navbar-login
{

padding: 10px;
padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}
#login2{ color:#fff;
	  }
	 .menu2{ margin:0px; float:right;
	 color:#000;}
	 .menu2>.menu-content1{ width:300px; height:40px; float:right; font-size:20px; letter-spacing:-0.05em; position:relative;}
	 .menu2>.menu-content1>a{ color:#fff; text-decoration:none;}
	 .arrow-up2{ width:0; height:0; position:absolute; border-left:15px transparent solid; border-right:15px transparent solid; border-bottom: 15px solid #Fff; right:20px; top:40px; display:none;}
	 .login-form2{ position:absolute; width:250px; background-color:#fff; right:-150px; top:50px;
	 border-radius:2px; border-bottom:5px solid #FB9351; z-index:1000; display:none; margin:0px;
	 }
	 .login-form2>form{ width:250px; margin:25px auto; font-size:20px; font-family:sans-serif, Arial, Helvetica, sans-serif; color:#000; letter-spacing:-0.05em;}
	 .navbar-login
{
   
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}
.ta1{ list-style-type:none;
}
.ta1 li{ display:inline-block; border-bottom:1px #eee solid; margin-right:20px; padding:5px;
}
	</style>
               <div class="menu1">
           	  <div class="menu-content1">
                <ul class="drd2">
           		  <!-- <li><a class="drd"><img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/1.jpg"); ?>" class=" img-responsive img-circle" style="width:30px; height:30px;"></a></li>-->
                    <li style="margin-top:-80px;"><a class="drd drd3" href="#" id="login1"><?php
                       if(!empty($sessionData['knpUsername']))echo $sessionData['knpUsername'];
					 ?><img src="<?php echo url("kanpurizeTheme/assets/gallery/related/click.png"); ?>"></a></li>
                </ul>
               </div>
               <div class="arrow-up1"></div>
           </div>
               <div class="login-form1 row">
                	 <div class="navbar-login">
                                <div class="row">
                                    <ul class="ta1">
                                    	<li class="row">
                                        	<div class="col-xs-4 col-sm-4">
                                        <img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/1.jpg"); ?>" class=" img-responsive img-circle" >
                                        	</div>
                                            <div class="col-xs-8 col-sm-8">
                                       Account
                                        	</div>
                                        </li>
                                        <li class="row">
                                        	<div class="col-xs-4 col-sm-4">
                                        <img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/1.jpg"); ?>" class=" img-responsive img-circle" >
                                        	</div>
                                            <div class="col-xs-8 col-sm-8">
                                        Edit Profile
                                        	</div>
                                        </li>
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
                                        	     <div class="col-xs-4 col-sm-4">
                                                   <?php if(empty($thumbsImg)){
													  ?>
													  <img src="<?php echo url("public/uploadFiles/shopProfileImg/thumbImg/shopImage.jpeg"); ?>" class="img-responsive img-circle" alt="kanpurize_shop_thumbnail_<?php echo str_replace(" ","_",$list->vName); ?>" />
													  <?php
													  } 
													 else{ ?>
													 <img src="<?php echo url("public/uploadFiles/shopProfileImg/thumbImg/$thumbsImg"); ?>" class=" img-responsive img-circle" >
													 <?php
													} 
												   ?>
                                                 </div>
                                            <div class="col-xs-8 col-sm-8">
                                              <?php if(strlen($list->vName) < 15){ echo $list->vName; }else{ echo substr($list->vName,0,15)."..."; } ?>
                                        	</div>
                                            </a>
                                        </li>
												 <?php
											   }     
										   }
										?>
                                        <li class="row">
                                        	<div class="col-xs-8 col-sm-8">
                                             <a href="<?php echo url("knpLogout"); ?>">LogOut</a>
                                        	</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
               </div>
            </div>
        </div>
    </div>
<div class=" row div-social-top">
		<div class=" col-sm-12 col-md-6 col-lg-4">
        </div>
        <div class=" col-sm-12 col-md-2 col-lg-2">
          <!--<div class="menu2">
           	  <div class="menu-content2">
                <ul class="drd2">
                    <li style="margin-top:-80px;"><a class="drd drd3" href="#" id="login2"><img src="<?php echo url("kanpurizeTheme/assets/gallery/related/click.png"); ?>"></a></li>
                </ul>
               </div>
               <div class="arrow-up2"></div>
               <div class="login-form2">
                	 <div class="navbar-login">
                                <div class="row">
                                    <ul class="ta1">
                                    	<li>
                                        	<div class="col-sm-4">
                                        <img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/1.jpg"); ?>" class=" img-responsive img-circle" >
                                        	</div>
                                            <div class="col-sm-8">
                                        Navigation
                                        	</div>
                                        </li>
                                         <li class="divider" style="border-bottom: 1px solid #8c8b8b;"></li>
                                        <li>
                                        	<div class="col-sm-4">
                                        <img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/1.jpg"); ?>" class=" img-responsive img-circle" >
                                        	</div>
                                            <div class="col-sm-8">
                                        Navigation
                                        	</div>
                                        </li>
                                         <li class="divider" style="border-bottom: 1px solid #8c8b8b;"></li>
                                        <li>
                                        	<div class="col-sm-4">
                                        <img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/1.jpg"); ?>" class=" img-responsive img-circle" >
                                        	</div>
                                            <div class="col-sm-8">
                                        Navigation
                                        	</div>
                                        </li>
                                         <li class="divider" style="border-bottom: 1px solid #8c8b8b;"></li>
                                        <li>
                                        	<div class="col-sm-4">
                                        <img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/1.jpg"); ?>" class=" img-responsive img-circle" >
                                        	</div>
                                            <div class="col-sm-8">
                                        Navigation
                                        	</div>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
               </div>
           </div>-->	
        </div>
        <div class=" col-sm-12 col-md-4 col-lg-6">
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
 <!--./ Social Div End -->
<!--slider--advertizment- start-->
   <section class="sli1"> 
    <style>
	.drd3{ margin-top:-40px;
	}
	.drd2{ list-style-type:none; margin-top:10PX !important;}
	.drd2 li{ display:inline-block; top:20px;}
	.drd{ border-right:none !important; font-size:18px; background:none !important;
	}
	.navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }
        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        /*jssor slider arrow skin 093 css*/
        .jssora093 {display:block;position:absolute;cursor:pointer;}
        .jssora093 .c {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
        .jssora093 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
        .jssora093:hover {opacity:.8;}
        .jssora093.jssora093dn {opacity:.6;}
        .jssora093.jssora093ds {opacity:.3;pointer-events:none;}

        /*jssor slider thumbnail skin 101 css*/
        .jssort101 .p {position: absolute;top:0;left:0;box-sizing:border-box;background:#000;}
        .jssort101 .p .cv {position:relative;top:0;left:0;width:100%;height:100%;border:2px solid #000;box-sizing:border-box;z-index:1;}
        .jssort101 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;visibility:hidden;}
        .jssort101 .p:hover .cv, .jssort101 .p.pdn .cv {border:none;border-color:transparent;}
        .jssort101 .p:hover{padding:2px;}
        .jssort101 .p:hover .cv {background-color:rgba(0,0,0,6);opacity:.35;}
        .jssort101 .p:hover.pdn{padding:0;}
        .jssort101 .p:hover.pdn .cv {border:2px solid #fff;background:none;opacity:.35;}
        .jssort101 .pav .cv {border-color:#fff;opacity:.35;}
        .jssort101 .pav .a, .jssort101 .p:hover .a {visibility:visible;}
        .jssort101 .t {position:absolute;top:0;left:0;width:100%;height:100%;border:none;opacity:.6;}
        .jssort101 .pav .t, .jssort101 .p:hover .t{opacity:1;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:2000px;height:500px;overflow:hidden;visibility:hidden;background-color:#24262e;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:100px;height:100px;" src="img/spin.svg" />
        </div>       

        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:440px;width:2000px;height:500px;overflow:hidden;">
            <div data-p="150.00">
              <img data-u="image" src="<?php echo url("public/sliderFiles/img/1.jpg"); ?>" />
              <img data-u="thumb" src="<?php echo url("public/sliderFiles/img/1.jpg"); ?>" />
            </div>
            <div data-p="150.00">
              <img data-u="image" src="<?php echo url("public/sliderFiles/img/2.jpg"); ?>" />
              <img data-u="thumb" src="<?php echo url("public/sliderFiles/img/2.jpg"); ?>" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="<?php echo url("public/sliderFiles/img/3.jpg"); ?>" />
                <img data-u="thumb" src="<?php echo url("public/sliderFiles/img/3.jpg"); ?>" />
            </div>
            <div data-p="150.00">
               <img data-u="image" src="<?php echo url("public/sliderFiles/img/4.jpg"); ?>" />
               <img data-u="thumb" src="<?php echo url("public/sliderFiles/img/4.jpg"); ?>" />
            </div>
            <div data-p="150.00">
              <img data-u="image" src="<?php echo url("public/sliderFiles/img/5.jpg"); ?>" />
              <img data-u="thumb" src="<?php echo url("public/sliderFiles/img/5.jpg"); ?>" />
            </div>
            <div data-p="150.00">
              <img data-u="image" src="<?php echo url("public/sliderFiles/img/6.jpg"); ?>" />
              <img data-u="thumb" src="<?php echo url("public/sliderFiles/img/6.jpg"); ?>" />
            </div>
            <div data-p="150.00">
              <img data-u="image" src="<?php echo url("public/sliderFiles/img/7.jpg"); ?>" />
              <img data-u="thumb" src="<?php echo url("public/sliderFiles/img/7.jpg"); ?>" />
            </div>
            <div data-p="150.00">
              <img data-u="image" src="<?php echo url("public/sliderFiles/img/4.jpg"); ?>" />
              <img data-u="thumb" src="<?php echo url("public/sliderFiles/img/4.jpg"); ?>" />
            </div>
            <div data-p="150.00">
              <img data-u="image" src="<?php echo url("public/sliderFiles/img/5.jpg"); ?>" />
              <img data-u="thumb" src="<?php echo url("public/sliderFiles/img/5.jpg"); ?>" />
            </div>
            <div data-p="150.00">
              <img data-u="image" src="<?php echo url("public/sliderFiles/img/4.jpg"); ?>" />
              <img data-u="thumb" src="<?php echo url("public/sliderFiles/img/4.jpg"); ?>" />
            </div>
            <div data-p="150.00">
              <img data-u="image" src="<?php echo url("public/sliderFiles/img/3.jpg"); ?>" />
              <img data-u="thumb" src="<?php echo url("public/sliderFiles/img/3.jpg"); ?>" />
            </div>
            <div data-p="150.00">
              <img data-u="image" src="<?php echo url("public/sliderFiles/img/2.jpg"); ?>" />
              <img data-u="thumb" src="<?php echo url("public/sliderFiles/img/2.jpg"); ?>" />
            </div>
            <div data-p="150.00">
              <img data-u="image" src="<?php echo url("public/sliderFiles/img/1.jpg"); ?>" />
              <img data-u="thumb" src="<?php echo url("public/sliderFiles/img/1.jpg"); ?>" />
            </div>
        </div> <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;top:0px;width:440px;height:480px;background-color:#000;" data-autocenter="2" data-scale-left="0.75">
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:200px;height:100px;">
                    <div data-u="thumbnailtemplate" class="t"></div>
                    <svg viewbox="0 0 16000 16000" class="cv">
                        <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                        <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                        <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                    </svg>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:460px;" data-autocenter="2">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
            </svg>
        </div>
    </div>
</section> 
<!--slider --Section End-->
 <section class="sli2">
 <div class="container-fluid"> 
 	 <div class="row">
        <div class="btn-group btn-breadcrumb breadcrumb-default">
            <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-default visible-lg-block visible-md-block">Market Place</a>
            <a href="<?php echo url("kanpurize_RegisteredShop"); ?>" class="btn btn-default visible-lg-block visible-md-block">Sale on Kanpurize</a>
            
        </div>
     </div>  
     <div class=" row carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
<div class="carousel-inner">
<div class="item active">
<div class="col-md-3 col-sm-6 col-xs-12 "><a href="#"><img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/1.jpg"); ?>" class=" itm img-responsive"></a>
<h3 class="shopweb">Coming Soon Shop</h3></div>
</div>
<div class="item">
<div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/2.jpg"); ?>" class=" itm img-responsive"></a>
<h3 class="shopweb">Coming Soon Shop</h3></div>
</div>
<div class="item">
<div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/2.jpg"); ?>" class=" itm img-responsive"></a>
<h3 class="shopweb">Coming Soon Shop</h3></div>
</div>
<div class="item">
<div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/2.jpg"); ?>" class="itm img-responsive"></a>
<h3 class="shopweb">Coming Soon Shop</h3></div>
</div>
<div class="item">
<div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/2.jpg"); ?>" class=" itm img-responsive"></a>
<h3 class="shopweb">Coming Soon Shop</h3></div>
</div>
<div class="item">
<div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/2.jpg"); ?>" class="itm img-responsive"></a>
<h3 class="shopweb">Coming Soon Shop</h3></div>
</div>
<div class="item">
<div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/2.jpg"); ?>" class="itm img-responsive"></a>
<h3 class="shopweb">Coming Soon Shop</h3></div>
</div>
<div class="item">
<div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="<?php echo url("kanpurizeTheme/assets/img/portfolio/2.jpg"); ?>" class="itm img-responsive"></a>
<h3 class="shopweb">Coming Soon Shop</h3></div>
</div>
</div>
<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
<a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
</div>
</div>
</section>

<!-----content body start---->

<!---content body close----> 
@endsection 