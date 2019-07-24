@extends("layout")
@section('content')
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"  media="screen">
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
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
    <section class="products">
        <!-- start container -->
        <div class="container">
        	<div class="row">
            		<div class="productsGrid row" id="shopProductsList">
                    <?php 
                     if($productsResult != FALSE){
					     foreach($productsResult as $products){
                           $value = 4455454; 
                           $urlpID = base64_encode($products->id + $value);
                           $pName = $products->pName;
                           $urlPname = str_replace(" ","_",$pName);
						   ?>
						   <div class="productsDiv col-md-4 col-sm-6" data-price="<?php if(!empty($products->productsAmount)) echo $products->productsAmount; ?>">
                    <!-- start .single-product -->
                           <div class="product product--card productBox">
                             <div class="product__thumbnail">
                        <input type="hidden" name="productsID" id="productsID" class="productsdetailsId" value="<?php echo $products->id; ?>" readonly="readonly" />
                        <input type="hidden" name="shopID" id="shopID" class="shopID" value="<?php echo $products->vendordetails_id; ?>" readonly="readonly" />
                            <img src='<?php echo url("uploadFiles/productsImg/FrontImg/$products->pImage"); ?>' class="img-responsive" alt="Product Image">
                               <div class="prod_btn" >
                                <span><a href="<?php echo url("productsDetails/$urlpID/$urlPname"); ?>" class="transparent btn--sm btn--round">View Detail</a></span>
                                @php $cartcount=0; @endphp
                                  @if(!empty(Cart::count()))
                                    @foreach(Cart::content() as $row)
                                      @if($row->id == $products->id)
                                        @php $cartcount++; @endphp
                                      @endif
                                    @endforeach
                                  @endif	
                                   @if($cartcount == 0)
                                     <a name="cart" class="addtocart transparent btn--sm btn--round" id="cartbtn<?php echo $products->id; ?>">Add to cart</a>
                                   @else
                                    <a name="cart" class="addtocart transparent btn--sm btn--round" id="cartbtn<?php echo $products->id; ?>">Added in cart</a>
                                   @endif 
                            </div>
                        </div>
                             <div class="product-desc shopproduct">
                            <p><?php if(strlen($pName) < 20) echo $pName; 
                                 else echo substr($pName,0,30)."..."
                                ?>
                            </p>
                            <p><small><?php if($products->vName) echo $products->vName;  ?></small>
                            </p>
                        </div><!-- end /.product-desc -->
                             <div class="product-purchase">
                            <div class="price_love">
                            <span><span style="text-decoration:line-through; font-weight:500px; color:#999;">Rs. <?php if(!empty($products->price)){ echo $products->price; } ?></span>&nbsp;Rs.<span id="pPrize" class="prize"><?php if(!empty($products->productsAmount)){ echo $products->productsAmount; } ?></span></span>
                           @if($wishListProducts != FALSE)
                                     @php $w = 0; @endphp
                                     @foreach($wishListProducts as $wList)
                                       @if($wList->products_id == $products->id)
                                        @php $w++ @endphp
                                       @endif 
                                     @endforeach
                                   @endif	
                                   @if($w == 0)
                                    <span class="addtowishList" id="wishbtn<?php echo $products->id; ?>"><i class="fa fa-heart"></i></span>
                                   @else
                                   <span class="addtowishList" id="wishbtn<?php echo $products->id; ?>"><i style='color:red;' class="fa fa-heart"></i></span>
                                   @endif
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

