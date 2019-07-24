<div class="productsGrid row" id="shopProductsList">
					@if($productsList != FALSE)
					@foreach($productsList as $products)
					@php
					$value = 4455454; 
					$urlpID = base64_encode($products->id + $value);
					$pName = $products->pName;
					$urlPname = str_replace(" ","_",$pName); 
					@endphp
					<div class="productsDiv col-md-3 col-sm-4 col-xs-6 padding_div" data-price="<?php if(!empty($products->productsAmount)) echo $products->productsAmount; ?>">
						<div class="product product--card productBox">
							<div class="product__thumbnail">
								<input type="hidden" name="productsID" id="productsID" class="productsdetailsId" value="<?php echo $products->id; ?>" />
								<img src='{{ url("uploadFiles/productsImg/FrontImg/$products->pImage") }}' class="img-responsive" alt="Product Image">
								<div class="prod_btn" >
									<span><a href="<?php echo url("productsDetails/$urlpID/$urlPname"); ?>" class="transparent btn--sm btn--round">View Detail</a></span>
									
                                @if(!empty(session()->has('knpuser'))) 
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
                                @else
                                 <a class="firstLogin transparent btn--sm btn--round">Add to cart</a>
                                @endif   
								</div>
							</div>
							<div class="product-desc shopproduct">
								<p class="producthieght">@if(strlen($pName) < 20) {{ $pName }}
									@else {{ substr($pName,0,30)."..." }}
									@endif
								</p>
							</div>
							<div class="product-purchase">
								<div class="price_love">
								  <span>@if(!empty($products->price))<span style="text-decoration:line-through; font-weight:500px; color:#999;">Rs.{{ $products->price }} </span> @endif&nbsp;Rs.<span id="pPrize" class="prize">@if(!empty($products->productsAmount)){{ $products->productsAmount }}@endif</span></span>
								   @if(!empty(session()->has('knpuser')))	
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
                                  @else
                                   <span class="firstLogin"><i class="fa fa-heart"></i></span>
                                  @endif  
                                 </div>
							</div>
						</div>
					</div>
					@endforeach
					@endif 	  
				</div>