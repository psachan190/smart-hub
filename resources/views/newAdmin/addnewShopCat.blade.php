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
                <h5 class="card-title">Add More Shop Category </h5>
              </div>
              <div class="row">
                 <div class="col-sm-12" style="margin-left:20px;">
                  <ul>
                 <?php 
				  foreach($errors->all() as $error){
					echo "<li style='color:red;'>".$error."</li>";  
				  }
				  ?>
                 </ul> 
                 @if(session()->has('msg'))
                    <?php echo session()->get('msg') ?> 
                 @endif
                 </div>
              </div>
              <div class="card-body">
              <form action="<?php echo url("admin/addShopcat"); ?>" method="post" name="shopcatForm" id="shopcatForm">
            <?php echo csrf_field(); ?> 
            <div class="panel-body">
              <div class="row">
               <div class="col-sm-12">
                  <p><strong>Registered Shop Category</strong></p>
               </div>
              </div>
              <div class="row">
              <input type="hidden" name="shopID" readonly="readonly" value="<?php echo $vendorDetails->id; ?>" />
             <?php 
			 if($resultShop != FALSE){
			   foreach($resultShop as $shop){
				   ?>
				   <div class="col-sm-4">
					 <p><input type="checkbox" name="registeredShop[]" id="registeredShop" checked="checked" value="<?php echo $shop->cid; ?>" class="flat-red" />&nbsp;<?php echo $shop->cname; ?></p>
					 
				   </div>
				   <?php
				 }
			   }      
			  ?>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
               <div class="col-sm-12">
                  <p><strong>Un-registered Shop Category</strong></p>
               </div>
              </div>
              <div class="row">
              <?php 
				if($unRegistered != FALSE){
				   foreach($unRegistered as $shop){
					   ?>
					   <div class="col-sm-4">
						 <p><input type="checkbox" name="registeredShop[]" id="registeredShop" value="<?php echo $shop->cid; ?>" class="flat-red" />&nbsp;<?php echo $shop->cname; ?></p>
						 
					   </div>
					   <?php
					 }
				   }      
			  ?>
              </div>
            </div>
            <div class="col-sm-2">
			  <p><button type="submit" name="submit" class="btn btn-success" id="submit" class="form-control">Add</button></p>
			</div>
          </form>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@stop
