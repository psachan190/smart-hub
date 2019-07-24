@extends("layout")
@section('content')
   @include('vendor.template.marketPlacenavigation')
   <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href='{{ url("vendorBackup/$vendorData->id/firstDashborad") }}'>Welcome</a></li>
                            <li><a href="#">Product Details</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Product Details</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<section>
<div class="container-fluid">
      <?php 
	     if(count($productsDetails) >0){
		   ?>
   <div class="row normal-padding">
   <div class="col-sm-12 col-md-6 col-lg-3">
     <div class="product-image">
								<a href="#"><img src="<?php $image = $productsDetails->pImage; echo url("uploadFiles/productsImg/$image") ?>" alt="Checked Short Dress" class="img img-responsive"></a>
							</div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9">
     <div class="border-back">
          <div class="productback clearfix">
							<div class="product-desc">
                                <?php 
								$shopID = $productsDetails->knp_shopcategory_id;
								$categoryID = $productsDetails->category_id;
								?>
								<div class="product-title"><h3><?php if(!empty($productsDetails->pName))echo $productsDetails->pName;  ?></h3></div>
                                <div class="spaceline1"></div>
                                <span class="subHeading">Price : </span>
								<span><?php if(!empty($productsDetails->price))echo $productsDetails->price;  ?></span><br />
                                 <span  class="subHeading">Sale Price : </span>
								<span><?php if(!empty($productsDetails->salePrice))echo $productsDetails->salePrice;  ?></span></br>
                                 <span  class="subHeading">Quantity : </span>
								<span><?php if(!empty($productsDetails->quantity))echo $productsDetails->quantity;  ?></span><br />
                                <h4  class="subHeading">Products Description</h4>
                                <div class="spaceline2"></div>
                                <div class="productdes">
                                <p><?php if(!empty($productsDetails->pDesription))echo $productsDetails->pDesription;  ?></p>
                                </div>
							    <h4 class="subHeading">Products Long Description</h4>
                                <div class="spaceline2"></div>
                                <div class="productdes">
                                <p><?php if(!empty($productsDetails->plongDesription))echo $productsDetails->plongDesription;  ?></p>
                                </div>
                                <h4 class="subHeading">Products Details Description</h4>
                                <div class="spaceline2"></div>
                                <div class="productdes">
                                <p><?php if(!empty($productsDetails->pdetailDescription))echo $productsDetails->pdetailDescription;  ?></p>
                                </div>
                                <h4 class="subHeading">Products Meta Key words</h4>
                                <div class="spaceline2"></div>
                                <div class="productdes">
                                <p><?php if(!empty($productsDetails->pMetakeyWords))echo $productsDetails->pMetakeyWords;  ?></p>
                                </div>
                                <h4 class="subHeading">Products Meta Details</h4>
                                <div class="spaceline2"></div>
                                <div class="productdes">
                                <p><?php if(!empty($productsDetails->pMetaDetails))echo $productsDetails->pMetaDetails;  ?></p>
                                </div>
                                <h4  class="subHeading">More Products Image</h4>
                                <div class="spaceline2"></div>
                                <ul class="moreImage">
                                 <?php
									  if(!empty($productsImage)){
										   foreach($productsImage as $image){
											  ?>
												 <div class="col-sm-3" style="padding:5px;">
												 <li> <img src='{{ asset("uploadFiles/productsImg/FrontImg/$image->image") }}' class="img img-responsive img-thumbnail" /></li>
												</div>
											 <?php
											}
										}
									?>
                                </ul>
						</div>
                        <div class="col-sm-12">
                         <ul class="formBtn">
                         	 <li><button type="button" name="soldOut" onclick="goBack()" class="btn btn-md btn--round"><i class=""></i>&nbsp;Back</button></li>
                           <li><form id="deleteForm" name="deleteForm">
                              <?php echo csrf_field(); ?>
                         <input type="hidden" name="productsID" id="productsID" value="<?php if(!empty($productsDetails->id))echo $productsDetails->id; ?>" readonly />
                         <input type="hidden" name="vendorID" id="vendorID" value="<?php if(!empty($productsDetails->vendordetails_id))echo $productsDetails->vendordetails_id; ?>" readonly />
                         </form></li>
                         </ul>
                         <div id="result">
                        <img src="<?php echo url("kanpurizeTheme/uploading.gif"); ?>" style="display:none;" id="uploadingImg" />
                        </div>
                        </div>
					</div> 
		         </div>
 </div>
 </div>
   <?php
		 }
		 else{
		   ?>
		   <div class="productback clearfix">
		     <p style="font-size:16px; color:#999;"><strong>Products Store on Trash Folder...</strong></p>				
		   </div>
		   <?php
		 }
	   ?>

</section>
@stop 
