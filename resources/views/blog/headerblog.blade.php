<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/indexheader.css') }}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}"/>
    <title><?php if(!empty($title)) echo $title; ?> </title>
    <meta property="og:url"     content="<?php if(!empty($sharedUrl)) echo $sharedUrl; ?>" />
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="<?php if(!empty($title)) echo $title; ?>" />
    <meta property="og:description"   content="<?php if(!empty($description)) echo $description ?>" />
    <meta property="og:image"  content="<?php if(!empty($imageUrl)) echo $imageUrl; ?>" />
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1821852827861161',
      cookie     : true,
      xfbml      : true,
      version    : '3.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</head>
<body class="home1 mutlti-vendor">
<div class="menu-area">
    <div class="top-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-5 v_middle">
                    <div class="logo">
                        <a href="{{ url('kanpurize_home') }}" title="Online Shop in Kanpur"><img src="{{ asset('images/logo1.png') }}" alt="Online Shopping in Kanpur"></a>
                    </div>
                </div>
                <div class="col-md-9 col-xs-7 col-sm-9 v_middle">
                     <div class="author-area logmobil">
                        <a href="{{ url('kanpurize_signup') }}" title="Marketplace in Kanpur" class="logmobil1 author-area__seller-btn inline"><span class="lnr lnr-user"></span> Sign up</a>
                    </div>
                    <div class="author-area logmobil">
                        <a href="{{ url('login') }}" title="Social Web in kanpur" class="logmobil1 author-area__seller-btn inline"><span class="lnr lnr-enter"></span> Log In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
