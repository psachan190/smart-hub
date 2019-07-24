<?php
   if(!empty($vendorData->paymentStatus) && $vendorData->paymentStatus == "Y"){
       ?>
	   <div class="vendormenu mainmenu">
        <!-- start .container -->
        <div class="container">
            <!-- start .row-->
            <div class="row">
                <!-- start .col-md-12 -->
                <div class="col-md-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="lnr lnr-menu"></span>
                        </button>

                        <!-- start mainmenu__search -->
                    </div>

                    <nav class="vendormenu navbar navbar-default mainmenu__menu">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                            <ul class="nav navbar-nav">
                                <li class="">
                                	 <?php
									  $shopID = $vendorData->id;
									  $first = rand(1,99999);
									  $username = str_replace(" ","-",$vendorData->vName);
									 ?>
                                    <a href="<?php echo url("vendor/$vendorData->username/vendorDashboard"); ?>">Welcome</a>
                                </li>
                                 <?php
                  if($vendorData->businesscategoryType==1 || $vendorData->businesscategoryType==3){
					 ?>
                                <li class="has_dropdown">
                                <a href="#">product</a>
                                    <div class="dropdown dropdown--menu">
                                            <ul>
                                                <li><a href="<?php $user_name = str_replace(" ","-",session()->get('knpUser_name'));  echo url("vendor/$vendorData->username/category_list"); ?>">Add Product</a></li>
                                                <?php 
												  $pCategory = $vendorData->categoryType;
												  $catArr = explode("@",$pCategory);
												  $pDefaultCat = $catArr[0];
												?>
                                                <li><a href="<?php echo url("vendor/$vendorData->username/product_list/$pDefaultCat"); ?>">Product List</a></li>
                                            </ul>
                                        </div>
                                </li>
                                <?php
					}
				?>
                <?php
                  if($vendorData->businesscategoryType==2 || $vendorData->businesscategoryType==3){
					 ?>
                                <li class="has_dropdown">
                                    <a href="#">Services</a>
                                    <div class="dropdown dropdown--menu">
                                            <ul>
                                                <li><a href="<?php $user_name = str_replace(" ","-",session()->get('knpUser_name'));  echo url("vendor/$vendorData->username/category_list"); ?>">Add Services</a></li>
                                                <li><a href="<?php echo url("vendor/$vendorData->username/services_list"); ?>">Services List</a></li>
                                            </ul>
                                        </div>
                                </li>
                                 <?php
					}
				?>
                               <li class="has_dropdown">
                                    <a href="#">Advertisement</a>
                                    <div class="dropdown dropdown--menu">
                                            <ul>
                                                <li><a href="<?php  echo url("vendor/$vendorData->username/post_Ads"); ?>">Post Ads</a></li>
                                                <li><a href="<?php echo url("vendor/$vendorData->username/approveAdsPost"); ?>">Approved Post Ads</a></li>
                                            </ul>
                                        </div>
                                </li>
                               <li class="has_dropdown">
                                    <a href="#">Offers &amp; News</a>
                                    <div class="dropdown dropdown--menu">
                                            <ul>
                                                <li><a href="<?php  echo url("vendor/$vendorData->username/offersNews"); ?>">Post Offers &amp; News</a></li>
                                                <li><a href="<?php echo url("vendor/$vendorData->username/approveOfferNews"); ?>">Approved Offers News</a></li>
                                            </ul>
                                        </div>
                                </li> 
                               <li><a href="<?php echo url("vendor/$vendorData->username/uesrsComplain"); ?>">Uesrs Enquiry</a></li>
                               @if($vendorData->businesscategoryType != 2)
                                <li><a href="<?php echo url("vendor/$vendorData->username/orderList"); ?>">Order</a></li>
                                @endif
                               <li><a href="<?php echo url("vendor/$vendorData->username/vendorProfile"); ?>">Profile</a></li>  
                              
                               <li class="has_dropdown">
                                    <a href="#">More</a>
                                    <div class="dropdown dropdown--menu">
                                            <ul>
                                            <li><a href="<?php echo url("vendor/$vendorData->username/gallery"); ?>">Gallery</a></li>
                                             <?php 
						    if($vendorData->crvStatus != "Y"){
							   ?>
							 <li><a href="<?php echo url("vendor/$vendorData->username/request_liveshop"); ?>">Request for Go Live</a></li> 
							   <?php 
							 }
						   ?> 
                                            </ul>
                                        </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
	   <?php
     }
 ?>