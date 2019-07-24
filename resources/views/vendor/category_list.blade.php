@extends('layout')
@section('content')
@include('vendor.template.marketPlacenavigation')
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href='{{ url("vendorBackup/$vendorData->id/firstDashborad") }}'>Welcome</a></li>
                            <li class="active"><a href="#">Category list</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Category list</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="" style="margin-top:50px;">
  <div class="container-fluid">
   <div class="container">
    <div class="row">
        <?php 
		  if($good_shop_category_list != FALSE){
			  echo "<p><strong>Products Category .</strong></p>";
			  foreach($good_shop_category_list as $data){
				  $cid = $data->cid;
				  if($data->bType==1){
					  ?>
				     <div class="col-sm-4 col-md-4" style="margin-top:15px;">
            <div class="post">
                <div class="content">
                    <div>
                     <h3><?php if(!empty($data->cname)) echo $data->cname; ?></h3>
                    </div>
                    <div>
                       <?php if(!empty($data->cDesc))echo $data->cDesc; ?>
                    </div>
                    <div style="margin-top:15px;">
                    <?php $username = $vendorData->username; ?>
                     <a href="<?php echo url("vendor/$username/add_products/$cid"); ?>" class="btn btn-warning btn-sm">Add Products</a>
                    </div>
                </div>
            </div>
        </div>  
				      <?php
					}
				}
			}
		?>
    </div>
    <div class="row" style="margin-top:15px;">
        <?php 
		  if($services_shop_category_list != FALSE){
			  echo "<p><strong>Service Category .</strong></p>";
			  foreach($services_shop_category_list as $data){
				  $cid = $data->cid;
				  if($data->bType==2){
					  ?>
				     <div class="col-sm-4 col-md-4" style="margin-top:15px;">
            <div class="post">
                <div class="content">
                    <div>
                     <h3><?php if(!empty($data->cname)) echo $data->cname; ?></h3>
                    </div>
                    <div>
                       <?php if(!empty($data->cDesc))echo $data->cDesc; ?>
                    </div>
                    <div style="margin-top:15px;">
                    <?php $username = $vendorData->username; ?>
                     <a href="<?php echo url("vendor/$username/add_services_list/$cid"); ?>" class="btn btn-warning btn-sm">Add Services</a>
                    </div>
                </div>
            </div>
        </div>  
				      <?php
					}
				}
			}
		?>
    </div>
 </div>
</div>
</div> 
@endsection 