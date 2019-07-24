<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Kanpurize | Admin</title>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="{{ url('newAdmin/all.css') }}" />
<!--
	<link rel="stylesheet" href="{{ url('adminback/dist/css/adminlte.min.css') }}" />
	<link rel="stylesheet" href="{{ url('adminback/plugins/datatables/dataTables.bootstrap4.css') }}" />
	<link rel="stylesheet" href="{{ url('adminback/plugins/colorpicker/bootstrap-colorpicker.min.css') }}" />
	<link rel="stylesheet" href="{{ url('adminback/plugins/select2/select2.min.css') }}" /> -->
<script type="text/javascript" src="<?php echo asset("ck/ckeditor/ckeditor.js"); ?>"></script>
<script type="text/javascript" src="<?php echo asset("ck/ckfinder/ckfinder.js"); ?>"></script>
<script>
	var agax_url = "{{ url('') }}";
	$.ajaxSetup({
	      headers:{
	        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
	      }
	    });
</script>
<style>
	.notice {
	padding: 15px;
	background-color: #fafafa;
	border-left: 6px solid #7f7f84;
	margin-bottom: 10px;
	-webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
	-moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
	box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
	}
	.notice-sm {
	padding: 10px;
	font-size: 80%;
	}
	.notice-lg {
	padding: 35px;
	font-size: large;
	}
	.notice-success {
	border-color: #80D651;
	}
	.notice-success>strong {
	color: #80D651;
	}
	.notice-info {
	border-color: #45ABCD;
	}
	.notice-info>strong {
	color: #45ABCD;
	}
	.notice-warning {
	border-color: #FEAF20;
	}
	.notice-warning>strong {
	color: #FEAF20;
	}
	.notice-danger {
	border-color: #d73814;
	}
	.notice-danger>strong {
	color: #d73814;
	}
</style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
	<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="index3.html" class="nav-link">Home</a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="#" class="nav-link">Contact</a>
			</li>
		</ul>
		<!-- SEARCH FORM -->
		<form class="form-inline ml-3">
			<div class="input-group input-group-sm">
				<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-navbar" type="submit">
					<i class="fa fa-search"></i>
					</button>
				</div>
			</div>
		</form>
		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<!-- Messages Dropdown Menu -->
			<li class="nav-item dropdown" id="notification_area">
				<a class="nav-link" data-toggle="dropdown" href="#" id="un_read_notification">
				<i class="fa fa-bell-o"></i>
				<span class="badge badge-danger navbar-badge" id="count_unread_notify"><?php if($un_read_notification != FALSE) echo $un_read_notification->count(); ?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<?php
						if($all_notifcation != FALSE){
						foreach($all_notifcation as $notify){
						?>
					<a href="<?php if(!empty($notify->notification_url))echo $notify->notification_url; else echo "#"; ?>" class="dropdown-item">
						<!-- Message Start -->
						<div class="media">
							<?php 
								if(!empty($notify->image_url)){
								  ?>
							<img src="<?php echo $notify->image_url; ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
							<?php
								}
								?>
							<div class="media-body">
								<p class="text-sm"><?php if(!empty($notify->notification_text))echo $notify->notification_text; ?></p>
								<p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i><?php if(!empty($notify->created_at))echo date('d-M-Y H:i:sa' , $notify->created_at); ?> </p>
							</div>
						</div>
						<!-- Message End -->
					</a>
					<div class="dropdown-divider"></div>
					<?php
						}
						}
						else{
						?>
					<div class="media">
						<div class="media-body">
							<h3>No New Notification .</h3>
						</div>
					</div>
					<?php
						}
						 ?>
					<div class="dropdown-divider"></div>
					<a href="<?php echo url("admin/all_notification"); ?>" class="dropdown-item dropdown-footer">See All Messages</a>
				</div>
			</li>
			<!-- Notifications Dropdown Menu -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="fa fa-comments-o"></i>
				<span class="badge badge-warning navbar-badge">15</span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<span class="dropdown-item dropdown-header">15 Notifications</span>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
					<i class="fa fa-envelope mr-2"></i> 4 new messages
					<span class="float-right text-muted text-sm">3 mins</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
					<i class="fa fa-users mr-2"></i> 8 friend requests
					<span class="float-right text-muted text-sm">12 hours</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
					<i class="fa fa-file mr-2"></i> 3 new reports
					<span class="float-right text-muted text-sm">2 days</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="fa fa-th-large"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<span class="dropdown-item dropdown-header"> Kanpurize </span>
					<div class="dropdown-divider"></div>
					<a href="{{ url('admin/signout') }}" class="dropdown-item">
					<i class="fa fa-sign-out mr-2"></i>Logout
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
					<i class="fa fa-users mr-2"></i> 8 friend requests
					<span class="float-right text-muted text-sm">12 hours</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
					<i class="fa fa-file mr-2"></i> 3 new reports
					<span class="float-right text-muted text-sm">2 days</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
				</div>
			</li>
		</ul>
	</nav>
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="{{ url('admin/adminlogin') }}" class="brand-link">
		<img src="https://www.kanpurize.com/cdn/images/logo1.png" alt="kanpurize Logo" class="brand-image img-circle elevation-3"
			style="opacity: .8">
		<span class="brand-text font-weight-light">Kanpurize</span>
		</a>
		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="{{ url('adminback/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="#" class="d-block">Kanpurize</a>
				</div>
			</div>
			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
						with font-awesome or any other icon font library -->
					<li class="nav-item has-treeview menu-open">
						<a href="{{ url('admin/dashboard') }}" class="nav-link">
							<i class="nav-icon fa fa-dashboard"></i>
							<p>
								Dashboard
								<i class="right fa fa-angle-left"></i>
							</p>
						</a>
					</li>
					<!--
						<li class="nav-item has-treeview">
						  <a href="#" class="nav-link">
						    <i class="nav-icon fa fa-users"></i>
						    <p>
						      Uesrs
						      <i class="right fa fa-angle-left"></i>
						    </p>
						  </a>
						  <ul class="nav nav-treeview">
						    <li class="nav-item">
						      <a href="#" class="nav-link">
						        <i class="fa fa-circle-o nav-icon"></i>
						        <p>Users List</p>
						      </a>
						    </li>
						  </ul>
						</li> -->
					<?php
					if(!empty(Auth::user()->id) || count(Auth::user()) > 0){
					     if(in_array(Auth::user()->roll_id , $admin_allowUrl) ){
						     ?>
							<li class="nav-item">
						<a href="{{ url('admin/users') }}" class="nav-link">
							<i class="nav-icon fa fa-circle-o text-danger"></i>
							<p class="text">Users</p>
						</a>
					</li>
                            <li class="nav-item has-treeview">
                                <a href="{{ url('admin/addShopcategory') }}" class="nav-link">
                                    <i class="nav-icon fa fa-tree"></i>
                                    <p>
                                        Shop Category
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/addShopcategory') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Add Shop Category</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('admin/shop_category') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Shop Category List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ url('admin/addShopcategory') }}" class="nav-link">
                                    <i class="nav-icon fa fa-tree"></i>
                                    <p>
                                        Category
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/addCategory') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Add Category</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('admin/category') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Category List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ url('admin/addSubcat') }}" class="nav-link">
                                    <i class="nav-icon fa fa-tree"></i>
                                    <p>
                                        Sub Category
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/addSubcat') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Add Sub Category</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('admin/subcategory') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Sub Category List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-tree"></i>
                                    <p>
                                        Vendors
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/vendors') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Vendors List</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('admin/vendorAds') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Vendor Ads list</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('admin/vendorOffers') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Vendor Offers and News</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('admin/editSaleShopcat') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Edit Shop Sales Category</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('admin/addNewcat_subcat') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Add New Cat/Sub category</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-envelope-o"></i>
                                    <p>Complain <i class="fa fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/mailbox/mailbox.html" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Add Complain Subject</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-book"></i>
                                    <p>
                                        Single Advertisement
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/examples/invoice.html" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Invoice</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/profile.html" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Profile</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/login.html" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Login</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/register.html" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Register</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/lockscreen.html" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Lockscreen</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-plus-square-o"></i>
                                    <p>
                                        Extras
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/examples/404.html" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Error 404</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/500.html" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Error 500</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/blank.html" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Blank Page</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="starter.html" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Starter Page</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/userAds') }}" class="nav-link">
                                    <i class="nav-icon fa fa-file"></i>
                                    <p>Users Advertisement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/ngos') }}" class="nav-link">
                                    <i class="nav-icon fa fa-file"></i>
                                    <p>NGOs</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/causes') }}" class="nav-link">
                                    <i class="nav-icon fa fa-file"></i>
                                    <p>NGO`s Causes</p>
                                </a>
                            </li>
                            <li class="nav-header">Important</li>
                            <li class="nav-item">
                                <a href="{{ url('admin/adsPackage') }}" class="nav-link">
                                    <i class="nav-icon fa fa-circle-o text-danger"></i>
                                    <p class="text">Advertisement Package</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/recomendShop') }}" class="nav-link">
                                    <i class="nav-icon fa fa-circle-o text-warning"></i>
                                    <p>Recomended Shop</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/complain') }}" class="nav-link">
                                    <i class="nav-icon fa fa-circle-o text-info"></i>
                                    <p>Complain</p>
                                </a>
                            </li>
							 <?php
						   }
						 else{
						    
						  }  
					   }
					if(in_array(Auth::user()->roll_id , $admin_allowUrl) || in_array(Auth::user()->roll_id , $management_allowUrl)){
					  ?>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-tree"></i>
							<p>
								Blog
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ url('admin/add_blog') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Add Blog</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('admin/blog_list') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Blog List</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-tree"></i>
							<p>
								Religion Manage
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ url('admin/add_religion') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Add Religion</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-tree"></i>
							<p>
								Cast Manage
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ url('admin/add_cast') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Add Cast</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('admin/cast_list') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Cast List</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="{{ url('admin/addShopcategory') }}" class="nav-link">
							<i class="nav-icon fa fa-tree"></i>
							<p>
								Organize New Talent
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ url('admin/add_talent') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Add New</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('admin/talent_list') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Talent  List</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('admin/participant_list') }}" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Participant List</p>
								</a>
							</li>
						</ul>
					</li>
					<?php
						}
						?> 
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>
	@yield('content')
</div>
@section('footer')
<script src="{{ url('newAdmin/all.js') }}"></script>
<script src="{{ url('validationJS/adminBAckendJS.js') }}"></script>
<!--
	<script src="{{ url('adminback/plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ url('adminback/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ url('adminback/dist/js/adminlte.js') }}"></script>
	<script src="{{ url('adminback/dist/js/demo.js') }}"></script>
	<script src="{{ url('adminback/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
	<script src="{{ url('adminback/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
	<script src="{{ url('adminback/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ url('adminback/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ url('adminback/dist/js/pages/dashboard2.js') }}"></script>
	<script src="{{ url('adminback/plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ url('adminback/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
	<script src="{{ url('adminback/plugins/fastclick/fastclick.js') }}"></script>
	<script src="{{ url('adminback/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
	<script src="{{ url('adminback/plugins/iCheck/icheck.min.js') }}"></script>
	<script src="{{ url('adminback/plugins/select2/select2.full.min.js') }}"></script>
	-->
<script type="text/javascript">
	var editor = CKEDITOR.replace( 'editor1', {
	    filebrowserBrowseUrl : '<?php echo url("ck/ckfinder/ckfinder.html") ?>',
	    filebrowserImageBrowseUrl :'<?php echo url("ck/ckfinder/ckfinder.html?type=Images"); ?>',
	    filebrowserFlashBrowseUrl : '<?php echo url("ck/ckfinder/ckfinder.html?type=Flash"); ?>',
	    filebrowserUploadUrl : '<?php echo url("ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files"); ?>',
	    filebrowserImageUploadUrl : '<?php echo url("ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images") ?>',
	    filebrowserFlashUploadUrl : '<?php echo url("ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash"); ?>'
	});
	CKFinder.setupCKEditor( editor, '../' );
</script>
<script>
	$(function () {
	  $("#example1").DataTable();
	  $('#example2').DataTable({
	    "paging": true,
	    "lengthChange": false,
	    "searching": false,
	    "ordering": true,
	    "info": true,
	    "autoWidth": false
	  });
	});
</script>
<script>
	$(document).ready(function(e) {
	  $(document).on('click','#un_read_notification',function(){
	    var change_status = 1;
		$.ajax({
				type:'GET',
				url:agax_url +"/adminAgaxget/read_notification",
				data:'change_status='+change_status,
				success:function(res){
				 var parsedJson = jQuery.parseJSON(res);
				 if(parsedJson.status == 1){
				    $("#count_unread_notify").html(parsedJson.unread_msg);
					  //$('#notification_area').load(document.URL + ' #notification_area');
				   }
				}
	           });
	  });  
	});
</script>
<script>
 $(document).ready(function(e) {
  $(document).on('change','#shopCat',function(){
	 var shopCatID = $('#shopCat').val();
	   if(shopCatID == 0){
		  alert('Please Select The valid Category Name');
		}
	    else{
		   $.ajax({
                type:'GET',
                url:'<?php echo url("adminAgaxget/changeCategory"); ?>',
                data:'shopCatID='+shopCatID,
                success:function(res){
                $('#result').html(res);
				}
           })
		}	
	});
});
</script>
@show
</body>
</html>