<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kanpurize is online platform for Everyone in kanpur it offers comfort of online shopping from local market and has its own Social Web, online shopping in kanpur, marketplace in kanpur, best software development company in kanpur">
    <meta name="keywords" content="online platform in kanpur, Online Shopping in Kanpur, Online shop in kanpur, Social Web in Kanpur, Marketplace in Kanpur, Event in Kanpur, online Marketplace in Kanpur, Online Market in Kanpur, Live Event in Kanpur, Webshop in Kanpur, best software development company in kanpur">
    <title>Kanpurize || Local online Shopping and Socializing in Kanpur </title>
    <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('css/indexheader.css') }}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}"/>
</head>
<body class="home1 mutlti-vendor">
<!-- ================================
    START MENU AREA
================================= -->
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
<!--================================
    END MENU AREA
=================================-->
<script> 
var base_url = "{{ url('') }}";
$.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
</script>
