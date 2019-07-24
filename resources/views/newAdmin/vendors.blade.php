@extends('newAdmin.template.layout')
@section('content')
<?php
	$bTypearr = array("1"=>"Goods","2"=>"Services","3"=>"Goods & Services Both");
	?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard v2</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">CPU Traffic</span>
							<span class="info-box-number">
							10
							<small>%</small>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-google-plus"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Likes</span>
							<span class="info-box-number">41 , 410</span>
						</div>
					</div>
				</div>
				<div class="clearfix hidden-md-up"></div>
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Sales</span>
							<span class="info-box-number">760</span>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">New Members</span>
							<span class="info-box-number">2,000</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<hr />
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Vendors Details</h5>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-widget="collapse">
								<i class="fa fa-minus"></i>
								</button>
								<div class="btn-group">
									<button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right" role="menu">
										<a href="#" class="dropdown-item">Action</a>
										<a href="#" class="dropdown-item">Another action</a>
										<a href="#" class="dropdown-item">Something else here</a>
										<a class="dropdown-divider"></a>
										<a href="#" class="dropdown-item">Separated link</a>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card">
							<!-- /.card-header -->
							<table id="example1" class="table table-bordered table-striped table-responsive">
								<thead>
									<tr>
										<th>Shop ID</th>
										<th>Shop Name</th>
										<th>uName</th>
										<th>uEmail</th>
										<th>bType</th>
										<th>Sale Category</th>
										<th>Mobile</th>
										<th>Join Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										if($vendorList != FALSE){
										$i=1;
										foreach($vendorList as $vendorArr){
										  ?>
									<tr>
										<td><?php if(!empty($vendorArr->id))echo "knprVendot100".$vendorArr->id; ?></td>
										<td><?php if(!empty($vendorArr->vName))echo $vendorArr->vName; ?></td>
										<td><?php if(!empty($vendorArr->name))echo $vendorArr->name; ?></td>
										<td><?php if(!empty($vendorArr->email))echo $vendorArr->email; ?></td>
										<td><?php if(!empty($vendorArr->businesscategoryType)) print_r($bTypearr[$vendorArr->businesscategoryType]); ?></td>
										<td><?php 
											if(!empty($vendorArr->categoryType)){
											$resultShop = $obj->getShoplist($vendorArr->categoryType); 
											if($resultShop != FALSE){
											   $cate  = array();
											   $n = 1;
											  foreach($resultShop as $listArr){
											$cate[$n] = $listArr->cname;
											 $n++;
											}
											 print_r(implode(" , " , $cate));
											}
											                
											}
											?></td>
										<td><?php if(!empty($vendorArr->vMobile))echo $vendorArr->vMobile; ?></td>
										<td><?php if(!empty($vendorArr->crvDate))echo date("d-M-y h:s:a",$vendorArr->crvDate); ?></td>
										<td><a href="<?php $id = base64_encode($vendorArr->id); echo url("admin/vendorsProfile/$id"); ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>
											</a>&nbsp;
										</td>
										<td>
											@if ($vendorArr->coupon == 'Y')
											<a href="{{url('admin/vendors?rem='.$vendorArr->id)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
											@else 
											<a href="{{url('admin/vendors?app='.$vendorArr->id)}}" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i</a>
											@endif
										</td>
									</tr>
									<?php
										$i++;
										}
										}
										?> 
								</tbody>
								</tfoot>
							</table>
							<!-- /.card-body -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@stop