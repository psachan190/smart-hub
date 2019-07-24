@extends('newAdmin.template.layout')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <hr />
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Vendor Advertisement</h5>
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
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn</th>
                  <th>User ID</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>sDate</th>
                  <th>eDate</th>
                  <th>Post Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                if($vendorPostAds != FALSE){
					 $i = 1;
				   foreach($vendorPostAds as $listitem ){
				      ?>
                      <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php if(!empty($listitem->users_id))echo "usrs".$listitem->users_id; ?></td>
                  <td><?php if(!empty($listitem->name))echo $listitem->name; ?></td>
                  <td><?php if(!empty($listitem->email))echo $listitem->email; ?></td>
                  <td><?php if(!empty($listitem->startDate))echo $listitem->startDate; ?></td>
                   <td><?php if(!empty($listitem->endDate))echo $listitem->endDate; ?></td>
                  <td><?php if(!empty($listitem->created_at)) echo $listitem->created_at; ?></td>
                  <td><?php if($listitem->adminStatus=="Y")echo "Verify"; else{ echo "unverify"; } ?></td>
                  <td colspan="3"><a href="<?php echo url("admin/adsDetails")."/".base64_encode($listitem->id); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
                </tr>
                	  <?php
					$i++;
					}
				 }
				else{
				   ?>
				   <tr>
                  <td colspan="8">No Record found</td>
                </tr>
				   <?php
				 }  
			   ?> 
                </tbody>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@stop