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
<link rel="stylesheet" href="<?php echo url('webuAdmindist/dist/css/et-line-font/et-line-font.css'); ?>">
<link rel="stylesheet" href="<?php echo url('webuAdmindist/dist/css/themify-icons/themify-icons.css'); ?>">
<link rel="stylesheet" href="<?php echo url('webuAdmindist/dist/plugins/chartist-js/chartist.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo url('webuAdmindist/dist/plugins/chartist-js/chartist-plugin-tooltip.css'); ?>" />
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <a href="index.html" class="logo blue-bg"> 
    <span class="logo-mini"><img src="<?php echo url("webuAdmin/dist/img/logo-n.png"); ?>" alt=""></span> 
    <span class="logo-lg"><img src="<?php echo url("webuAdmin/dist/img/logo.png"); ?>" alt=""></span> </a> 
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
                    <h4>Alex C. Patton</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="<?php echo url("webuAdmin/dist/img/img3.jpg"); ?>" class="img-circle" alt="User Image"> <span class="profile-status offline pull-right"></span></div>
                    <h4>Nikolaj S. Henriksen</h4>
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
                    <h4>Alex C. Patton</h4>
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
          <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo url("webuAdmin/dist/img/img1.jpg"); ?>" class="user-image" alt="User Image"> <span class="hidden-xs">Alexander Pierce</span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <div class="pull-left user-img"><img src="<?php echo url("webuAdmin/dist/img/img1.jpg"); ?>" class="img-responsive" alt="User"></div>
                <p class="text-left">Florence Douglas <small>florence@gmail.com</small> </p>
                <div class="view-link text-left"><a href="#">View Profile</a> </div>
              </li>
              <li><a href="#"><i class="icon-profile-male"></i> My Profile</a></li>
              <li><a href="#"><i class="icon-wallet"></i> My Balance</a></li>
              <li><a href="#"><i class="icon-envelope"></i> Inbox</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#"><i class="icon-gears"></i> Account Setting</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
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
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-cog"></i></a> <a href="#"><i class="fa fa-envelope-o"></i></a> <a href="#"><i class="fa fa-power-off"></i></a> </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PERSONAL</li>
        <li class="active treeview"> <a href="#"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html">Dashboard 1</a></li>
            <li><a href="index2.html">Dashboard 2</a></li>
            <li><a href="index3.html">Dashboard 3</a></li>
            <li><a href="index4.html">Dashboard 4</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Apps</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="apps-calendar.html">Calendar</a></li>
            <li><a href="apps-support-ticket.html">Support Ticket</a></li>
            <li><a href="apps-contacts.html">Contact / Employee</a></li>
            <li><a href="apps-contact-grid.html">Contact Grid</a></li>
            <li><a href="apps-contact-details.html">Contact Detail</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-envelope-o "></i> <span>Inbox</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="apps-mailbox.html">Mailbox</a></li>
            <li><a href="apps-mailbox-detail.html">Mailbox Detail</a></li>
            <li><a href="apps-compose-mail.html">Compose Mail</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-briefcase"></i> <span>UI Elements</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="ui-cards.html" class="active">Cards</a></li>
            <li><a href="ui-user-card.html">User Cards</a></li>
            <li><a href="ui-tab.html">Tab</a></li>
            <li><a href="ui-grid.html">Grid</a></li>
            <li><a href="ui-buttons.html">Buttons</a></li>
            <li><a href="ui-notification.html">Notification</a></li>
            <li><a href="ui-progressbar.html">Progressbar</a></li>
            <li><a href="ui-range-slider.html">Range slider</a></li>
            <li><a href="ui-timeline.html">Timeline</a></li>
            <li><a href="ui-horizontal-timeline.html">Horizontal Timeline</a></li>
            <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
            <li><a href="ui-typography.html">Typography</a></li>
            <li><a href="ui-bootstrap-switch.html">Bootstrap Switch</a></li>
            <li><a href="ui-tooltip-popover.html">Tooltip &amp; Popover</a></li>
            <li><a href="ui-list-media.html">List Media</a></li>
            <li><a href="ui-carousel.html">Carousel</a></li>
          </ul>
        </li>
        <li class="header">FORMS, TABLE & WIDGETS</li>
        <li class="treeview"> <a href="#"> <i class="fa fa-edit"></i> <span>Forms</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="form-elements.html">Form Elements</a></li>
            <li><a href="form-validation.html">Form Validation</a></li>
            <li><a href="form-wizard.html">Form Wizard</a></li>
            <li><a href="form-layouts.html">Form Layouts</a></li>
            <li><a href="form-uploads.html">Form File Upload</a></li>
            
            <li><a href="form-summernote.html">Summernote</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-table"></i> <span>Tables</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="table-basic.html">Basic Tables</a></li>
            <li><a href="table-layout.html">Table Layouts</a></li>
            <li><a href="table-data-table.html">Data Tables</a></li>
            <li><a href="table-jsgrid.html">Js Grid Table</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-th"></i> <span>Widgets</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="widget-data.html">Data Widgets</a></li>
            <li><a href="widget-apps.html">Apps Widgets</a></li>
          </ul>
        </li>
        <li class="header">EXTRA COMPONENTS</li>
        <li class="treeview"> <a href="#"><i class="fa fa-bar-chart"></i> <span>Charts</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="chart-morris.html">Morris Chart</a></li>
            <li><a href="chart-chartist.html">Chartis Chart</a></li>
            
            <li><a href="chart-knob.html">Knob Chart</a></li>
            <li><a href="chart-chart-js.html">Chartjs</a></li>
            <li><a href="chart-peity.html">Peity Chart</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-files-o"></i> <span>Sample Pages</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="pages-blank.html">Blank page</a></li>
            <li class="treeview"><a href="#">Authentication <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
              <ul class="treeview-menu">
                <li><a href="pages-login.html">Login 1</a></li>
                <li><a href="pages-login-2.html">Login 2</a></li>
                <li><a href="pages-register.html">Register</a></li>
                <li><a href="pages-register2.html">Register 2</a></li>
                <li><a href="pages-lockscreen.html">Lockscreen</a></li>
                <li><a href="pages-recover-password.html">Recover password</a></li>
              </ul>
            </li>
            <li><a href="pages-profile.html">Profile page</a></li>
            <li><a href="pages-invoice.html">Invoice</a></li>
            <li><a href="pages-treeview.html">Treeview</a></li>
            <li><a href="pages-pricing.html">Pricing</a></li>
            <li><a href="pages-gallery.html">Gallery</a></li>
            <li><a href="pages-faq.html">Faqs</a></li>
            <li><a href="pages-404.html">404 Error Page</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-map-marker"></i> <span>Maps</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="map-google.html">Google Maps</a></li>
            <li><a href="map-vector.html" class="active">Vector Maps</a></li>
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
    <section class="content-header sty-one">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content"> 
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-darkblue"> <span class="info-box-icon bg-transparent"><i class="ti-stats-up text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">New Orders</h6>
              <h1 class="text-white">1,150</h1>
              <span class="progress-description text-white"> 70% Increase in 30 Days </span> </div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green text-white"> <span class="info-box-icon bg-transparent"><i class="ti-face-smile"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">New Users</h6>
              <h1 class="text-white">565</h1>
              <span class="progress-description text-white"> 45% Increase in 30 Days </span> </div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua"> <span class="info-box-icon bg-transparent"><i class="ti-bar-chart"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Online Revenue</h6>
              <h1 class="text-white">$5,450</h1>
              <span class="progress-description text-white"> 50% Increase in 30 Days </span> </div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-orange"> <span class="info-box-icon bg-transparent"><i class="ti-money"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Total Profit</h6>
              <h1 class="text-white">$8,188</h1>
              <span class="progress-description text-white"> 35% Increase in 30 Days </span> </div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
      <!-- Main row -->
      <div class="row">
        <div class="col-lg-7 col-xlg-9">
          <div class="info-box">
            <div class="d-flex flex-wrap">
              <div>
                <h4 class="text-black">Analytics Overview</h4>
              </div>
              <div class="ml-auto">
                <ul class="list-inline">
                  <li class="text-info"> <i class="fa fa-circle"></i> Sales</li> <li class="text-blue"> <i class="fa fa-circle"></i> Earning</li>
                </ul>
              </div>
            </div>
            <div>
              <canvas id="line-chart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-xlg-3">
          <div class="info-box">
            <div class="d-flex flex-wrap">
              <div>
                <h4 class="text-black">Our Visitors</h4>
              </div>
            </div>
            <div class="m-t-2">
            	<canvas id="pie-chart" height="210"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="info-box">
            <h4 class="m-b-2 text-black">Recent Activities</h4>
            <div class="sl-item sl-primary">
              <div class="sl-content"><small class="text-muted"><i class="fa fa-user position-left"></i> 5 mins ago</small>
                <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit. Nullam sagittis mattis arcu uspen disse.</p>
              </div>
            </div>
            <div class="sl-item sl-danger">
              <div class="sl-content"><small class="text-muted"><i class="fa fa-user position-left"></i> 8 mins ago</small>
                <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit. Nullam sagittis mattis arcu uspen disse.</p>
              </div>
            </div>
            <div class="sl-item sl-success">
              <div class="sl-content"><small class="text-muted"><i class="fa fa-user position-left"></i> 10 mins ago</small>
                <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit. Nullam sagittis mattis arcu uspen disse.</p>
              </div>
            </div>
            <div class="sl-item sl-warning">
              <div class="sl-content"><small class="text-muted"><i class="fa fa-user position-left"></i> 12 mins ago</small>
                <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit. Nullam sagittis mattis arcu uspen disse.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="info-box">
            <div class="d-flex flex-wrap">
              <div>
                <h4 class="m-b-2 text-black">Line Chart with Area</h4>
              </div>
            </div>
           <div class="ct-line-chart" style="height:350px;"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div> 
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2"> 
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-yellow">
                <div class="widget-user-image"> <img class="img-circle" src="dist/img/img5.jpg" alt="User Avatar"> </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Nick Lampard</h3>
                <h5 class="widget-user-desc">Lead Developer</h5>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                  <li><a href="#">Projects <span class="pull-right badge bg-blue">15</span></a></li>
                  <li><a href="#">Tasks <span class="pull-right badge bg-aqua">25</span></a></li>
                  <li><a href="#">Completed Projects <span class="pull-right badge bg-green">30</span></a></li>
                  <li><a href="#">Followers <span class="pull-right badge bg-red">150</span></a></li>
                  <li><a href="#">Completed Projects <span class="pull-right badge bg-green">30</span></a></li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user --> 
          </div>
          <div class="m-t-3"> 
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user"> 
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-black" style="background: url('dist/img/user-bg.jpg');">
                <h3 class="widget-user-username">Angela Dominic</h3>
                <h5 class="widget-user-desc">Web Designer & Developer</h5>
              </div>
              <div class="widget-user-image"> <img class="img-circle" src="dist/img/img5.jpg" alt="User Avatar"> </div>
              <div class="box-footer">
                <div class="text-center">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing sed cursus ante.</p>
                </div>
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">1,500</h5>
                      <span class="description-text">SALES</span> </div>
                    <!-- /.description-block --> 
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">10,350</h5>
                      <span class="description-text">FOLLOWERS</span> </div>
                    <!-- /.description-block --> 
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span> </div>
                    <!-- /.description-block --> 
                  </div>
                  <!-- /.col --> 
                </div>
                <!-- /.row --> 
              </div>
            </div>
            <!-- /.widget-user --> 
          </div>
        </div>
        <div class="col-lg-8">
          <div class="info-box">
            <div class="card tab-style1"> 
              <!-- Nav tabs -->
              <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">Activity</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">Profile</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/img3.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>Florence Douglas</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                          <div class="row">
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img8.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img9.jpg" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><img src="dist/img/img10.jpg" alt="user" class="img-responsive img-rounded"></div>
                          </div>
                          <div class="like-comm m-t-1"> <a href="#">150 comment</a> <a href="#"><i class="fa fa-heart text-danger"></i> 25 Love</a> </div>
                        </div>
                      </div>
                    </div>
                    <div class="row m-t-3">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="dist/img/img5.jpg" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>Florence Douglas</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum raesent mauris nec.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                          <div class="like-comm m-t-1"> <a href="#">150 comment</a> <a href="#"><i class="fa fa-heart text-danger"></i> 25 Love</a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--second tab-->
                <div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Full Name</strong> <br>
                        <p class="text-muted">Florence Douglas</p>
                      </div>
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Mobile</strong> <br>
                        <p class="text-muted">(123) 456 7890</p>
                      </div>
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Email</strong> <br>
                        <p class="text-muted">florencedouglas@admin.com</p>
                      </div>
                    </div>
                    <hr>
                    <p>Lorem Ipsum is simply dummy text of the printing vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                    <p>Suspen disse potenti. Sed lectus est, commodo eu pre tium eu, pulvinar porttitor feugiat. Aliquam efficitur feugiat accumsan. Nulla hendrerit cursus nisi nec mattis. </p>
                    <h4 class="font-medium m-t-3">Skill Set</h4>
                    <hr>
                    <div>
                      <h6 class="m-t-3">Wordpress <span class="pull-right">80%</span></h6>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                      </div>
                      <h5 class="m-t-3">HTML 5 <span class="pull-right">90%</span></h5>
                      <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                      </div>
                      <h5 class="m-t-3">jQuery <span class="pull-right">50%</span></h5>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                      </div>
                      <h5 class="m-t-3">Photoshop <span class="pull-right">70%</span></h5>
                      <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="settings" role="tabpanel">
                  <div class="card-body">
                    <form class="form-horizontal form-material">
                      <div class="form-group">
                        <label class="col-md-12">Full Name</label>
                        <div class="col-md-12">
                          <input placeholder="Florence Douglas" class="form-control form-control-line" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                          <input placeholder="florencedouglas@admin.com" class="form-control form-control-line" name="example-email" id="example-email" type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Password</label>
                        <div class="col-md-12">
                          <input value="password" class="form-control form-control-line" type="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Phone No</label>
                        <div class="col-md-12">
                          <input placeholder="123 456 7890" class="form-control form-control-line" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Message</label>
                        <div class="col-md-12">
                          <textarea rows="5" class="form-control form-control-line"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-12">Select Country</label>
                        <div class="col-sm-12">
                          <select class="form-control form-control-line">
                            <option>London</option>
                            <option>India</option>
                            <option>Usa</option>
                            <option>Canada</option>
                            <option>Thailand</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                          <button class="btn btn-success">Update Profile</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-lg-4">
        <div class="soci-wid-box bg-twitter m-b-3">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="soci-wid-box bg-facebook m-b-3">
          <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-facebook"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-facebook"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-facebook"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="soci-wid-box bg-google-plus m-b-3">
          <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-google"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-google"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-lg-12 text-center">
                  <div class="sco-icon"><i class="ti-google"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent libero sed cursus ante.</p>
                  <p class="text-italic pt-1">- John Doe -</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
        </div>
      </div>
    </section>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">Version 1.2</div>
    Copyright © 2017 Yourdomian. All rights reserved.</footer>
</div>
<script src="<?php echo url('webuAdmin/dist/js/jquery.min.js'); ?>"></script> 
<script src="<?php echo url('webuAdmin/dist/bootstrap/js/bootstrap.min.js'); ?>"></script> 
<script src="<?php echo url('webuAdmin/dist/js/niche.js'); ?>"></script> 
<script src="<?php echo url('webuAdmin/dist/plugins/chartjs/chart.min.js'); ?>"></script>
<script src="<?php echo url('webuAdmin/dist/plugins/chartjs/chart-int.js'); ?>"></script>
<script src="<?php echo url('webuAdmin/dist/plugins/chartist-js/chartist.min.js'); ?>"></script> 
<script src="<?php echo url('webuAdmin/dist/plugins/chartist-js/chartist-plugin-tooltip.js'); ?>"></script> 
<script src="<?php echo url('webuAdmin/dist/plugins/functions/chartist-init.js'); ?>"></script>
</body>
</html>