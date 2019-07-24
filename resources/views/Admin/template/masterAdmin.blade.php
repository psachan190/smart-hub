<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Kanpurize.com | Home</title>
<link rel="stylesheet" href="<?php echo url('webuAdmin/dist/bootstrap/css/bootstrap.min.css'); ?>" />
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" href="<?php echo url('webuAdmin/dist/css/style.css'); ?>" />
<link rel="stylesheet" href="<?php echo url("webuAdmin/dist/css/font-awesome/css/font-awesome.min.css"); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo url('webuAdmin/dist/css/et-line-font/et-line-font.css'); ?>">
<link rel="stylesheet" href="<?php echo url('webuAdmin/dist/css/themify-icons/themify-icons.css'); ?>">
<link rel="stylesheet" href="<?php echo url('webuAdmin/dist/plugins/chartist-js/chartist.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo url('webuAdmin/dist/plugins/chartist-js/chartist-plugin-tooltip.css'); ?>" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <a href="<?php echo url("adminDashboard"); ?>" class="logo blue-bg"> 
    <span class="logo-mini"><strong style="color:#FFF; font-size:28px; font-weight:900px;">Kanpurize</strong></span> 
    <span class="logo-lg"><strong style="color:#FFF; font-size:28px; font-weight:900px;">Kanpurize</strong></span> </a> 
    <nav class="navbar blue-bg navbar-static-top"> 
      <ul class="nav navbar-nav pull-left">
        <li><a class="sidebar-toggle" data-toggle="push-menu" href="#"></a> </li>
      </ul>
      <div class="pull-left search-box">
        <form action="#" method="get" class="search-form">
          <div class="input-group">
            <input name="search" class="form-control" placeholder="Search..." type="text">
            <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
            </span></div>
        </form>
        <!-- search form --> </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i>
            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 new messages</li>
              <li>
                <ul class="menu">
                  <li><a href="#">
                    <div class="pull-left"><img src="<?php echo url("webuAdmin/dist/img/img1.jpg"); ?>" class="img-circle" alt="User Image"> <span class="profile-status online pull-right"></span></div>
                    <h4>{{ session('name') }} </h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="<?php echo url("webuAdmin/dist/img/img3.jpg"); ?>" class="img-circle" alt="User Image"> <span class="profile-status offline pull-right"></span></div>
                    <h4>{{ session('name') }}</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">10:15 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="<?php echo url("webuAdmin/dist/img/img2.jpg"); ?>" class="img-circle" alt="User Image"> <span class="profile-status away pull-right"></span></div>
                    <h4>Kasper S. Jessen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">8:45 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="<?php echo url("webuAdmin/dist/img/img4.jpg"); ?>" class="img-circle" alt="User Image"> <span class="profile-status busy pull-right"></span></div>
                    <h4>Florence S. Kasper</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">12:15 AM</span></p>
                    </a></li>
                </ul>
              </li>
              <li class="footer"><a href="#">View All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i>
            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notifications</li>
              <li>
                <ul class="menu">
                  <li><a href="#">
                    <div class="pull-left icon-circle red"><i class="icon-lightbulb"></i></div>
                    <h4>{{ session('name') }}</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle blue"><i class="fa fa-coffee"></i></div>
                    <h4>Nikolaj S. Henriksen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">1:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle green"><i class="fa fa-paperclip"></i></div>
                    <h4>Kasper S. Jessen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle yellow"><i class="fa  fa-plane"></i></div>
                    <h4>Florence S. Kasper</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">11:10 AM</span></p>
                    </a></li>
                </ul>
              </li>
              <li class="footer"><a href="#">Check all Notifications</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo url("webuAdmin/dist/img/img1.jpg"); ?>" class="user-image" alt="User Image"> <span class="hidden-xs">{{ session('name') }}</span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <div class="pull-left user-img"><img src="<?php echo url("webuAdmin/dist/img/img1.jpg"); ?>" class="img-responsive" alt="User"></div>
                <p class="text-left">{{ session('name') }} <small>{{ session('email') }}</small> </p>
                <div class="view-link text-left"><a href="#">View Profile</a> </div>
              </li>
              <li><a href="#"><i class="icon-profile-male"></i> My Profile</a></li>
              <li><a href="#"><i class="icon-wallet"></i> My Balance</a></li>
              <li><a href="#"><i class="icon-envelope"></i> Inbox</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#"><i class="icon-gears"></i> Account Setting</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo url("logout"); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"> 
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center"><img src="<?php echo url("webuAdmin/dist/img/img1.jpg"); ?>" class="img-circle" alt="User Image"> </div>
        <div class="info">
          <p>{{ session('name') }}</p>
          <a href="#"><i class="fa fa-cog"></i></a> <a href="#"><i class="fa fa-envelope-o"></i></a> <a href="<?php echo url("logout"); ?>"><i class="fa fa-power-off"></i></a> </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PERSONAL</li>
        <li class="active treeview"> <a href="#"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Quiz</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo url("quizlist"); ?>"><i class="fa fa-tag"></i>&nbsp;Quiz</a></li>
            <li><a href="<?php echo url("questionView"); ?>"><i class="fa fa-tag"></i>&nbsp;Add Question</a></li>
            <li><a href="<?php echo url("quizParticipate"); ?>"><i class="fa fa-tag"></i>&nbsp;Quiz Participate list</a></li>
            <li><a href="<?php echo url("quizlist"); ?>"><i class="fa fa-tag"></i>&nbsp;Quiz</a></li>
            <li><a href="apps-contact-details.html">Contact Detail</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Shop Category</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo url("categoryList"); ?>"><i class="fa fa-tag"></i>&nbsp;Shop Category List</a></li>
            <li><a href="<?php echo url("addCategory"); ?>"><i class="fa fa-tag"></i>&nbsp;Add Shop Category</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Category</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo url("sCategorylist"); ?>"><i class="fa fa-tag"></i>&nbsp;Category List</a></li>
            <li><a href="<?php echo url("addsCategory"); ?>"><i class="fa fa-tag"></i>&nbsp;Add Category</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Sub Category</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo url("subcategoryList"); ?>"><i class="fa fa-tag"></i>&nbsp;Sub Category List</a></li>
            <li><a href="<?php echo url("addsubCategory"); ?>"><i class="fa fa-tag"></i>&nbsp;Add Sub Category</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="{{ url('module')}}"> <i class="fa fa-briefcase"></i> <span>Products Attribute</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('productsAttribute')}}" class="active">Products Attribute</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="{{ url('module')}}"> <i class="fa fa-briefcase"></i> <span>Module</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('module') }}" class="active">Module View</a></li>
          </ul>
        </li>

         <li class="treeview"> <a href="{{ url('uservip')}}"> <i class="fa fa-briefcase"></i> <span>VIP User</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('uservip') }}" class="active">VIP User View</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="{{ url('admin_marketserve')}}"> <i class="fa fa-briefcase"></i> <span>Question</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin_marketserve') }}" class="active">Add Question</a></li>
            <li><a href="{{ url('newquestionList') }}" class="active">Question List</a></li>
          </ul>
        </li>
         <li class="treeview"> <a href="{{ url('addAnswer')}}"> <i class="fa fa-briefcase"></i> <span>Answer</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('addAnswer') }}" class="active">Add Answer</a></li>
            <li><a href="{{ url('newAnswerlist') }}" class="active">Answer List</a></li>
          </ul>
        </li>
        <li class="header">Uesrs Details</li>
        <li class="treeview"> <a href="#"> <i class="fa fa-users"></i> <span>Users</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo url("usersList"); ?>">Users List</a></li>
          </ul>
          
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-table"></i> <span>Vendors</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo url("vendorList"); ?>">Vendors List</a></li>
            <li><a href="<?php echo url("vendorPostAdsList"); ?>">Vendors Ads List</a></li>
            <li><a href="<?php echo url("extraSaleShopcat"); ?>">Add Extra shop Category</a></li>
            <li><a href='<?php echo url("vendorExtraSalesCat"); ?>'>Vendor extra Sales category</a></li>
            <li><a href="<?php echo url("vendorOffersNews"); ?>">Vendor Offers And News</a></li>
            <li><a href="<?php echo url("vendorComplain"); ?>">Vendor Complain</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-th"></i> <span>Complain</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href='{{ url("addComplianSubject") }}'>Add Complain Subject</a></li>
            <li><a href="widget-apps.html">Apps Widgets</a></li>
          </ul>
        </li>
         <li class="treeview"> <a href="#"> <i class="fa fa-th"></i> <span>Recommend Shops</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href='{{ url("recommedShopView") }}'>Recommend Shops View</a></li>
          
          </ul>
        </li>
         <li> <a href='{{ url("kanpurize_advertisement") }}'> <i class="fa fa-th"></i> <span>single Advertisement</span></a>
        </li>
        <li class="header">EXTRA COMPONENTS</li>
        <li class="treeview"> <a href="#"><i class="fa fa-bar-chart"></i> <span>Event Management</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href='{{ url("addEventCategory") }}'>Add Event Category</a></li>
            <li><a href='{{ url("addEvent") }}'>Add Events</a></li>
            
            <li><a href="chart-knob.html">Knob Chart</a></li>
            <li><a href="chart-chart-js.html">Chartjs</a></li>
            <li><a href="chart-peity.html">Peity Chart</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-files-o"></i> <span>Advertisement Package</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href='{{ url("addPackage") }}'>Add Package</a></li>
            <li><a href='{{ url("advertisement_package_list") }}'>View Package</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-blog"></i> <span>Kanpurize Blog</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo url("addkanpurizeblog");  ?>">Add Blog</a></li>
            <li><a href="<?php echo url("kanpurizeblogList");  ?>" class="active">View Blog</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-paint-brush"></i> <span>Icons</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
            <li><a href="icon-themify.html">Themify Icons</a></li>
            <li><a href="icon-linea.html">Linea Icons</a></li>
            <li><a href="icon-weather.html">Weather Icons</a></li>
            <li><a href="icon-simple-lineicon.html">Simple Lineicons</a></li>
            <li><a href="icon-flag.html">Flag Icons</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-share"></i> <span>Multilevel</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="#">Level One</a></li>
            <li class="treeview"> <a href="#">Level One <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
              <ul class="treeview-menu">
                <li><a href="#"> Level Two</a></li>
                <li class="treeview"> <a href="#">Level Two <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                  <ul class="treeview-menu">
                    <li><a href="#">Level Three</a></li>
                    <li><a href="#">Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Level One</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar --> 
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    @yield('content')
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
<script> 
var base_url = "{{ url('') }}";
$.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
</script>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">Version 1.2</div>
    Copyright © 2017 Yourdomian. All rights reserved.</footer>
</div>
<script src="<?php echo url('webuAdmin/dist/bootstrap/js/bootstrap.min.js'); ?>"></script> 
<script src="<?php echo url('webuAdmin/dist/js/niche.js'); ?>"></script> 
<script src="<?php echo url("validationJS/adminBAckendJS.js") ?>"></script>
<script>
$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('.userTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});
</script>
<!-- v4.0.0-alpha.6 --> 
</body>
</html>
