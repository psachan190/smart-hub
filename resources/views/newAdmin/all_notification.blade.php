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
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Notification</li>
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
                <h5 class="card-title">All Notification</h5>
              </div>
              <!-- /.card-header -->
              <div class="card">
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <?php
                    if($all_notify != FALSE){
				       foreach($all_notify as $notify){
						   ?>
                           <li class="item">
							<?php
                              if(!empty($notify->image_url)){
							     ?>
								  <div class="product-img">
                                   <img src="<?php echo $notify->image_url; ?>" alt="<?php echo $notify->image_url; ?>" class="img-size-50">
                                  </div>
								 <?php
							   }
                            ?>
                           <div class="product-info">
                      <a href="<?php if(!empty($notify->notification_url))echo $notify->notification_url; else echo "#"; ?>" class="dropdown-item">
                          <p class="text-sm"><?php if(!empty($notify->notification_text))echo $notify->notification_text; ?></p>
                          <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i><?php if(!empty($notify->created_at))echo date('d-M-Y H:i:sa' , $notify->created_at); ?> </p>
                           </div>
                           </li>
                           <?php
						 }
					 }
				  ?>
                  
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@stop