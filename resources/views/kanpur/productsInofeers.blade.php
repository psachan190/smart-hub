@extends("layout")
@section('content')

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"  media="screen">
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<?php
function calculateOfferAmount($discountMode,$percentageAmount,$pAmount){
  if($discountMode==1){
	 $discountAmount =  ($pAmount * $percentageAmount)/100;
	 $productsAmount = $pAmount-$discountAmount;
	 echo $productsAmount; 
	}
   else if($discountMode==2){
	 $productsAmount = $pAmount-$discountAmount;
	  echo $productsAmount;
	}	
}
?>
<!--filter--area---start--->
    <div class="filter-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-bar">
                        <div class="filter__option filter--dropdown filter--range">
                            <a href="#" id="drop3" class="dropdown-trigger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Price Range <span class="lnr lnr-chevron-down"></span></a>
                            <div class="dropdown dropdown-menu" aria-labelledby="drop3">
                                <div class="range-slider price-range"></div>

                                <div class="price-ranges">
                                    <span class="from rounded">Rs. 30</span>
                                    <span class="to rounded">Rs. 300</span>
                                </div>
                            </div>
                        </div><!-- end /.filter__option -->

                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select name="filterproductsPrice" id="filterproductsPrice">
                                 <option hidden>Sort By Price</option>
                                    <option value="12h">Price : Low to High</option>
                                    <option value="h21">Price : High to low</option>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                        </div><!-- end /.filter__option -->
                        <!-- end /.filter__option -->
                    </div><!-- end /.filter-bar -->
                </div><!-- end /.col-md-12 -->
            </div><!-- end filter-bar -->
        </div>
    </div>
    <!--================================
        END FILTER AREA
    =================================-->
    <span id="response"></span>
    <section class="products">
        <!-- start container -->
        <div class="container">
        	<div class="row">
            		<div class="productsGrid row" id="shopProductsList">
                    <input type="hidden" name="offerMode" id="offerMode" value="<?php if(!empty($offerDetails->discountMode))echo $offerDetails->discountMode; ?>" readonly="readonly" />
                    <input type="hidden" name="offerDiscount" id="offerDiscount" value="<?php if(!empty($offerDetails->discountRate))echo $offerDetails->discountRate; ?>" readonly="readonly" />
                    <input type="hidden" name="offerID" id="offerID" value="<?php if(!empty($offerDetails->id))echo $offerDetails->id; ?>" readonly="readonly" />
                    
                    <?php 
                     if($productsResult != FALSE){
					     foreach($productsResult as $products){
                           $value = 4455454; 
                           $urlpID = base64_encode($products->id + $value);
                           $pName = $products->pName;
                           $urlPname = str_replace(" ","_",$pName);
						   ?>
						   <div class="productsDiv col-md-4 col-sm-6 col-lg-3" data-price="<?php if(!empty($products->productsAmount))calculateOfferAmount($offerDetails->discountMode,$offerDetails->discountRate,$products->productsAmount); ?>">
                    <!-- start .single-product -->
                           <div class="product product--card productBox">
                             <div class="product__thumbnail">
                        <input type="hidden" name="productsID" id="productsID" class="productsdetailsId" value="<?php if(!empty($products->productsID)) echo $products->productsID; ?>" readonly="readonly" />
                        <input type="hidden" name="shopID" id="shopID" class="shopID" value="<?php echo $products->vendordetails_id; ?>" readonly="readonly" />
                            <img src='<?php echo url("uploadFiles/productsImg/FrontImg/$products->pImage"); ?>' class="img-responsive" alt="Product Image">
                               <div class="prod_btn" >
                                <span><a href="<?php echo url("productsDetails/$urlpID/$urlPname"); ?>" class="transparent btn--sm btn--round">View Detail</a></span>
                                <a name="cart" class="cart transparent btn--sm btn--round" id="cart">Add to cart</a>
                            </div>
                        </div>
                             <div class="product-desc shopproduct">
                             <p><?php if(strlen($pName) < 20) echo $pName;  else echo substr($pName,0,30)."..."; ?>
                            </p>
                        </div><!-- end /.product-desc -->
                             <div class="product-purchase">
                            <div class="price_love">
                            <span><span style="text-decoration:line-through; font-weight:500px; color:#999;">Rs. <?php if(!empty($products->price)){ echo $products->productsAmount; } ?></span>&nbsp;Rs.<span id="pPrize" class="prize"><?php if(!empty($products->productsAmount)){ calculateOfferAmount($offerDetails->discountMode,$offerDetails->discountRate,$products->productsAmount); } ?></span></span>
                            <span class="wishList"><i class="fa fa-heart"></i></span>
                            </div>
                        </div><!-- end /.product-purchase -->
                           </div>
                    <!-- end /.single-product -->
                          </div>
						   <?php 
						  }
				   }
                  else{
					 ?>
					 <div class="col-md-12 col-sm-12">
                            <img src="<?php echo url("uploadFiles/pageNotFound.jpg"); ?>">
                           </div>
				     <?php 
					}
					?>
                   </div>
                    <div class="row">
                     <div class="col-sm-12">
                        <?php if($productsResult != FALSE) echo $productsResult->render(); ?>
                     </div>
                    </div>
            </div>
        </div>
    </section>
@stop
