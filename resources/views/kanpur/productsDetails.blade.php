@extends("layout")
@section('content')
 <script src="<?php echo url("js/modernizr.js")?>" type="text/javascript"></script>
    <script src="<?php echo url("js/jquery.js")?>" type="text/javascript"></script>
    <script src="<?php echo url("js/xzoom.min.js")?>" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo url("css/xzoom.css"); ?>"  media="all" /> 
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li><a href="#">Product</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title"><?php $pName = str_replace("_"," ",$productsName); if(!empty($pName))echo $pName; ?></h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>  
    <section id="default" class="loadLoginPage normal-padding single-product-desc">
    <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-10 col-md-offset-1 padding_div">
        	<div class="product-title-area">
                    <div class="">
                        <p class=" productpages"><?php 
						 if(!empty($productsDetails->pName))echo $productsDetails->pName; 
						  ?></p>
                    </div>
                </div>
                </div>
        </div>
    	<div class="row">
        <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-5 col-md-5 padding_div">
            <div class="xzoomhead flexslider">
            <?php 
			  if(!empty($productsDetails->pImage)){
				 ?>
				 <img class="xzoom img-responsive" id="xzoom-default" src="<?php echo url("uploadFiles/productsImg/$productsDetails->pImage"); ?>" xoriginal="<?php echo url("uploadFiles/productsImg/$productsDetails->pImage"); ?>" />
				 <?php
				}
			?>
          <?php
            if($getproductsImage != FALSE){
			   ?>
			   <div class="xzoom-thumbs slides">
                   <a href="<?php echo url("uploadFiles/productsImg/$productsDetails->pImage"); ?>">
                      <img class="xzoom-gallery " width="80" src="<?php echo url("uploadFiles/thumbsImg/$productsDetails->pImage"); ?>"  xpreview="<?php echo url("uploadFiles/productsImg/$productsDetails->pImage"); ?>"></a>
                 <?php
                   foreach($getproductsImage as $thumbsImage){
					  ?>
					  <a href="<?php echo url("uploadFiles/productsImg/$thumbsImage->thumbImg"); ?>">
                      <img class="xzoom-gallery " width="80" src="<?php echo url("uploadFiles/thumbsImg/$thumbsImage->thumbImg"); ?>"  xpreview="<?php echo url("uploadFiles/productsImg/$thumbsImage->thumbImg"); ?>"></a>
					  <?php
					}
				 ?>
               </div>
			   <?php
			 }
		  ?>
        </div>
        <div class="shortcode_modules productsize">
                            <div class="tab tab3">
                                <div class="item-navigation productnav">
                                    <ul class="nav nav-tabs nav--tabs2">
                                        <li role="presentation" class="active">
                                            <a href="#product-details" aria-controls="product-details" role="tab" data-toggle="tab">
                                                <span class="lnr lnr-home"></span> Product Describtion
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#tc3" aria-controls="tc3" role="tab" data-toggle="tab">
                                                <span class="lnr lnr-envelope"></span> FAQ
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- end /.item-navigation -->

                                <div class="tab-content">
                                    <div class="fade in tab-pane product-tab active" id="product-details">
                                <div class="tab-content-wrapper">
                                    <?php
                                     if(!empty($productsDetails->pDesription))echo $productsDetails->pDesription; 
									?>
                                     <?php
                                     if(!empty($productsDetails->plongDesription))echo $productsDetails->plongDesription; 
									?>
                                    <?php
                                     if(!empty($productsDetails->pdetailDescription))echo $productsDetails->pdetailDescription; 
									?>
                                </div>
                                    </div><!-- end /.tab-content -->

                                    <div class="tab-pane product-tab" id="product-comment3">
                                        <div class="thread">
                                        </div><!-- end /.comments -->
                                    </div><!-- end /.product-comment -->

                                    <div class="tab-pane product-tab" id="tc3">
                                        <div class="panel-group accordion" role="tablist" id="accordion">
                                        <div class="panel accordion__single active">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="collapsed" aria-expanded="false">
                                                        <span>How to write the changelog for theme updates?</span> <i class="lnr lnr-chevron-down indicator"></i></a>
                                                </h4>
                                            </div>

                                            <div id="collapse1" role="tabpanel" class="panel-collapse collapse" aria-expanded="false">
                                                <div class="panel-body">
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris que the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                        Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher.
                                                        Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris que the mattis,
                                                        leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher .</p>
                                                </div>
                                            </div>
                                        </div><!-- end /.accordion__single -->

                                        <div class="panel accordion__single active">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed" aria-expanded="false">
                                                        <span>Do you recommend using a download manager software?</span> <i class="lnr lnr-chevron-down indicator"></i></a>
                                                </h4>
                                            </div>

                                            <div id="collapse2" role="tabpanel" class="panel-collapse collapse" aria-expanded="false">
                                                <div class="panel-body">
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris que the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                        Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher.
                                                        Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris que the mattis,
                                                        leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher .</p>
                                                </div>
                                            </div>
                                        </div><!-- end /.accordion__single -->

                                    </div>
                                    </div><!-- end /.tab-content -->
                                </div><!-- end /.tab-content -->
                            </div>
                        </div>  
      </div>
            <div class="col-md-5 col-lg-5 padding_div">
                    <aside class="sidebar sidebar--single-product">
                        <div class="sidebar-card card-pricing">
                            <div class="productBox" style="line-height:40px;">
                            <?php  if(!empty($productsDetails->price)) { ?><span class="inr">M.R.P.&nbsp;:<span class="currencyINR"> Rs. <?php echo $productsDetails->price; ?> </span></span> <br><?php  } ?>
                            <?php  if(!empty($productsDetails->productsAmount)) { ?>  <span class="inr1">Price:<span class="currencyINR1"> Rs. <?php echo $productsDetails->productsAmount; ?> </span></span><br><?php  } ?>
                            <?php
                              if(!empty($productsAttribute)){
								  ?>
								  <table style="width:20%;">
                                    <?php 
									 foreach($productsAttribute as $attribute){
										  ?>
										  <tr>
                                           <th><?php if(!empty($attribute->name))echo $attribute->name; ?>&nbsp;:</th>
                                           <th><?php if(!empty($attribute->value))echo $attribute->value; ?></th>
                                         </tr>
										  <?php
										} 
									?>
                                  </table>
								  <?php
								}
							?>
							<?php  if(!empty($productsDetails->pDesription)) { ?><span class="inr1"><?php echo $productsDetails->pDesription; ?></span> <br><?php  } ?>
          </div>
                            @if(!empty(session()->has('knpuser')))
                            <input type="hidden" name="productsID" id="productsID" class="productsdetailsId" value="<?php if(!empty($productsDetails->id)) echo $productsDetails->id; ?>" readonly="readonly" />
                            <input type="hidden" name="shopID" id="shopID" class="" readonly value='<?php if(!empty($productsDetails->vendordetails_id)) echo $productsDetails->vendordetails_id; ?>' />
                              @php $cartcount = 0; @endphp
                              @if(!empty(Cart::count()))
                                @foreach(Cart::content() as $row)
                                  @if($row->id == $productsDetails->id)
                                    @php $cartcount++; @endphp
                                  @endif
                                @endforeach
                              @endif	
                               @if($cartcount == 0)
                               <button type="button" class="addtocart btn btn-md" id="cart" ><span class="lnr lnr-cart"></span> Add to Cart</button>
                               @else
                               <button type="button" class="addtocart btn btn-md" id="cart" > Added in cart</button>
                               @endif
                             @else
                              <button type="button" class="firstLogin btn btn-md" id="cart" ><span class="lnr lnr-cart"></span> Add to Cart</button>
                             @endif  
                               @if($wishListProducts != FALSE)
                                     @php $w = 0; @endphp
                                     @foreach($wishListProducts as $wList)
                                       @if($wList->products_id == $productsDetails->id)
                                        @php $w++ @endphp
                                       @endif 
                                     @endforeach
                                   @endif	
                                  @if(!empty(session()->has('knpuser'))) 
                                   @if($w == 0)
                                    <button type="button" class="userwishList btn btn-md btn-danger" id="wishbtn<?php echo $productsDetails->id; ?>"><span class="lnr lnr-heart"></span> Add in Wishlist</button>
                                   @else
                                   <button type="button" class="userwishList btn btn-md btn-danger" id="wishbtn<?php echo $productsDetails->id; ?>" disabled="disabled"><span class="lnr lnr-heart"></span> Added in Wishlist</button>
                                   @endif
                                  @else
                                  <button type="button" class="firstLogin btn btn-md btn-danger"><span class="lnr lnr-heart"></span> Add in Wishlist</button>
                                  @endif
                                   
                                
                               
                            <!-- end /.purchase-button -->
                        </div>
                    </aside><!-- end /.aside -->
                    <!------products ad in slider--start----------->
                    <div class="product-title-area">
                    <div class="product__title">
                        <h2>Similar Product</h2>
                    </div>
                </div>
                    <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
    <div class='carousel-outer'>
        <!-- me art lab slider -->
        <div class='carousel-inner' id="relatedProducts">
           <?php 
		    if($relatedProducts != FALSE){
			   foreach($relatedProducts as $products){
				     $value = 4455454; 
	                 $pID = base64_encode($products->id + $value);
					 $pName = str_replace(" ","_",$products->pName);
				   ?>
				   <div class='item'>
                    <div class="product product--card">

                        <div class="product__thumbnail">
                            <img src="<?php echo url("uploadFiles/productsImg/FrontImg/$products->pImage"); ?>" alt="Product Image" />
                            <div class="prod_btn" >
                                <span><a href="<?php echo url("productsDetails/$pID/$pName"); ?>" class="transparent btn--sm btn--round">View Detail</a></span>
                            </div><!-- end /.prod_btn -->
                        </div><!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <p class="producthieght">@if(strlen($pName) < 20) {{ $pName }}
									@else {{ substr($pName,0,30)."..." }}
									@endif
								</p>
                        </div><!-- end /.product-desc -->

                        <div class="product-purchase">
                           <div class="price_love">
									<span>@if(!empty($products->price))<span style="text-decoration:line-through; font-weight:500px; color:#999;">Rs.{{ $products->price }} </span> @endif&nbsp;Rs.<span id="pPrize" class="prize">@if(!empty($products->productsAmount)){{ $products->productsAmount }}@endif</span></span>
									</div>
                        </div><!-- end /.product-purchase -->
                    </div>
                   </div>
				   <?php
				 }
			 }
		   ?>
            <script>
  $("#zoom_05").elevateZoom({ zoomType    : "inner", cursor: "crosshair" });
</script>
        </div>
        <!-- sag sol -->
        <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
            <span class='lnr lnr-chevron-left singlepror'></span>
        </a>
        <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
            <span class='lnr lnr-chevron-right singlepror'></span>
        </a>
    </div></div>
                    <!------products add in slider--End----------->
                </div>
                <div class="col-lg-1 col-md-1"></div>
         </div>
     </div> 
</section>
    <section class="more_product_area section--padding">
        <div class="container">
            <div class="row">
                <!-- start col-md-12 -->
                <?php 
				  if($getBottomProducts != FALSE){
					  $j =1;
					  ?>
					  <div class="col-md-12">
                    <div class="section-title">
                        <h1>More Items <span class="highlighted">by Web Shop</span></h1>
                    </div>
                </div>
					  <?php
					  foreach($getBottomProducts as $productsList){
					     	$value = 4455454; 
	                        $ppID = base64_encode($productsList->id + $value);
					        $ppName = str_replace(" ","_",$productsList->pName);
							if($j <= 3){
							  // echo $productsList->id;
							    ?>
								<div class="col-md-4 col-sm-6">
                    <!-- start .single-product -->
                    <div class="product product--card">
                              
                        <div class="product__thumbnail">
                            <img src="<?php echo url("uploadFiles/productsImg/FrontImg/$productsList->pImage"); ?>" alt="Product Image" />
                            <div class="prod_btn" >
                                <span><a href="<?php echo url("productsDetails/$ppID/$ppName"); ?>" class="transparent btn--sm btn--round">View Detail</a></span>
                            </div><!-- end /.prod_btn -->
                        </div><!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <p><?php if(!empty($productsList->pName))echo $productsList->pName; ?></p>
                        </div><!-- end /.product-desc -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span><span style="text-decoration:line-through; font-weight:500px; color:#999;">Rs.<?php if(!empty($productsList->price))echo $productsList->price; ?></span>&nbsp;Rs.<?php if(!empty($productsList->productsAmount))echo $productsList->productsAmount; ?></span>
                            </div>
                        </div><!-- end /.product-purchase -->
                    </div><!-- end /.single-product -->
                </div>
								<?php
							 }
							else{
							   break;
							 } 
					    $j++;
					   }  
				   }
				?>
                </div><!-- end /.container -->
            </div><!-- end /.container -->
    </section>
<script src="<?php echo url("js/setup.js")?>"></script>
@stop
@section('footer')
@parent
<script>
$(document).ready(function(e) {
   $('#relatedProducts .item:first-child').addClass("active");   
});
</script>
@stop
