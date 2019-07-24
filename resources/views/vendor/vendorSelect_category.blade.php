@extends("vendor.template.masterVendor")
@section('content')
<div class="" style="margin-top:50px;">
  <div class="container-fluid">
   <div class="container">
    <div class="row">
        <?php 
		  if($resultData != FALSE){
			  foreach($resultData as $data){
				  $cid = $data->cid;
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
                    <?php $shopID = $vresultData->id; ?>
                        <a href="<?php echo url("kanpurize_addProducts_list?shop=$shopID&category=$cid&$data->cname"); ?>" class="btn btn-warning btn-sm">Add Products</a>
                    </div>
                </div>
            </div>
        </div>  
				  <?php
				}
			}
		  else{
			  ?>
			  <div class="col-sm-4 col-md-4">
            <div class="post">
                <div class="content">
                    <div>
                      <h2>No records Found..</h2>
                    </div>
                    <div>
                        <a href="#" class="btn btn-warning btn-sm">Read more</a>
                    </div>
                </div>
            </div>
        </div>
			  <?php
			}	
		?>
    </div>
 </div>
</div>
</div> 
@endsection 