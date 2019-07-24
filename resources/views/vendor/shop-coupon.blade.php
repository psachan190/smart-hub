@extends("layout")
@section('content')
<div class="content">
<section>
	<div class="row lib-panel box-shadowbanner" style="margin:0px !important;">
		<div class="col-md-8 padding_divbanner">
			<img src="https://www.kanpurize.com/uploadFiles/shopBannerImage/defaultBannerImage.jpg" alt="" class="lib-img-show img img-responsive"> 		
		</div>
		<div class="col-md-4">
			<div class="lib-header">
				<div class="titlename">
					<h1 style="text-transform:capitalize;"><span class="highlight">Jaiswal Provision store</span></h1>
				</div>
				<div class="lib-header-seperator"></div>
			</div>
			<ul class="info-contactservices">
				<li>
					<span class="lnr lnr-smartphone info-icon"></span>
					<span class="info">9305570123</span>
				</li>
				<li>
					<span class="lnr lnr-envelope info-icon"></span>
					<span class="info">gupta2.adhip@gmail.com</span>
				</li>
				<li>
					<span class="locationicon1 lnr lnr-map-marker info-icon"></span>
					<span class="info">119/98 Bamba RoadGumti No.5 , Kanpur-208012,U.P.</span>
				</li>
				<li>
					<span class="info">
						<div class="rating-container rating-md rating-animate">
							<div class="clear-rating clear-rating-active" title="Clear"></div>
							<div class="rating-stars"><span class="empty-stars"><span class="star"><i class="lnr lnr-star-empty"></i></span><span class="star"><i class="lnr lnr-star-empty"></i></span><span class="star"><i class="lnr lnr-star-empty"></i></span><span class="star"><i class="lnr lnr-star-empty"></i></span><span class="star"><i class="lnr lnr-star-empty"></i></span></span><span class="filled-stars" style="width: 100%;"><span class="star"><i class="lnr lnr-star"></i></span><span class="star"><i class="lnr lnr-star"></i></span><span class="star"><i class="lnr lnr-star"></i></span><span class="star"><i class="lnr lnr-star"></i></span><span class="star"><i class="lnr lnr-star"></i></span></span><input id="result_ratingBox" name="input-1" class="rating rating-input" data-min="0" data-max="5" data-step="0.1" value="5"></div>
							<div class="caption"><span class="label label-success">Five Stars</span></div>
						</div>
					</span>
				</li>
			</ul>
		</div>
	</div>
</section>
<div class="filter-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="filter-bar">
					<div class="filter__option filter--dropdown">
						<a href="#" id="drop1" class="dropdown-trigger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories <span class="lnr lnr-chevron-down"></span></a>
						<ul class="dropdown dropdown-menu" aria-labelledby="drop1">
							<li><a href="#">DAILY NEED</a></li>
							<li><a href="#">HOME ESSENTIALS</a></li>
						</ul>
					</div>
					<div class="filter__option filter--dropdown filter--range">
						<a href="#" id="drop3" class="dropdown-trigger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Price Range <span class="lnr lnr-chevron-down"></span></a>
						<div class="dropdown dropdown-menu" aria-labelledby="drop3">
							<div class="range-slider price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
								<div class="ui-slider-range ui-corner-all ui-widget-header" style="width: 8.46667%; left: 1%;"></div>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 1%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 9.46667%;"></span>
							</div>
							<div class="price-ranges">
								<span class="from rounded">Rs. 30</span>
								<span class="to rounded">Rs. 284</span>
							</div>
						</div>
					</div>
					<div class="filter__option filter--select">
						<div class="select-wrap">
							<select name="filterproductsPrice" id="filterproductsPrice">
								<option hidden="">Sort By Price</option>
								<option value="12h">Price : Low to High</option>
								<option value="h21">Price : High to low</option>
							</select>
							<span class="lnr lnr-chevron-down"></span>
						</div>
					</div>
					<div class="filter__option filter--dropdown filter--range">
						<a href="#" id="ratingreview" class="dropdown-trigger">Review &amp; Rating</a>	
					</div>
					<div class="filter__option filter--dropdown filter--range">
						<a href="#" id="drop2" class="dropdown-trigger   btn-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt fa-lg"></i>
						</a>
						<ul class="sharedropdown dropdown dropdown-menu" aria-labelledby="drop2">
							<li>
								<div class="btn-group">
									<a class="btnsocialshare btn btn-md" target="_blank" title="On Facebook" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&amp;sdk=joey&amp;u=https://www.kanpurize.com/goods_Shop/MzE2ZGJkYmUyZWIyMGVhYzkwNjQ3MjU3MTIyYmMwOGM=">
									<i class="fa fa-facebook fa-lg fb"></i>
									</a>
									<a class="btnsocialshare btn btn-md" target="_blank" title="On Google Plus" href="https://plus.google.com/share?url=https://www.kanpurize.com/goods_Shop/MzE2ZGJkYmUyZWIyMGVhYzkwNjQ3MjU3MTIyYmMwOGM=">
									<i class="fa fa-google-plus fa-lg google"></i>
									</a>
									<a class="btnsocialshare btn btn-sm" target="_blank" title="On LinkedIn" href="https://www.linkedin.com/shareArticle?url=https://www.kanpurize.com/goods_Shop/MzE2ZGJkYmUyZWIyMGVhYzkwNjQ3MjU3MTIyYmMwOGM=">
									<i class="fa fa-linkedin fa-lg linkin"></i>
									</a>
									<a href="https://web.whatsapp.com/send?text=https://www.kanpurize.com/goods_Shop/MzE2ZGJkYmUyZWIyMGVhYzkwNjQ3MjU3MTIyYmMwOGM=" class="btnsocialshare btn btn-md" target="_blank" title="On Whatsapp">
									<i class="fa fa-whatsapp fa-lg fb"></i>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<a href="https://www.kanpurize.com/complain/316dbdbe2eb20eac90647257122bc08c" class="btn btn--round btn-sm">Connect to seller</a>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="products">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-md-3 padding_div">
				<ul class="mdn-accordion">
					<li class="subtop"><a href="#"><i class="fa fa-random"></i>Products Category &nbsp;</a></li>
					<li class="sub-level">
						<input class="accordion-toggle" type="checkbox" name="group-9" id="group-9">
						<label class="accordion-title" for="group-9"> <i class="fa fa-tags"></i>TOOLS&nbsp;</label>
					</li>
					<li class="sub-level">
						<input class="accordion-toggle" type="checkbox" name="group-10" id="group-10">
						<label class="accordion-title" for="group-10"> <i class="fa fa-tags"></i>MOBILES&nbsp;</label>
					</li>
					<li class="sub-level">
						<input class="accordion-toggle" type="checkbox" name="group-18" id="group-18">
						<label class="accordion-title" for="group-18"> <i class="fa fa-tags"></i>DAILY NEED&nbsp;</label>
						<ul>
							<li class="sub-level">
								<input class="accordion-toggle" type="checkbox" name="sub-group-173" id="sub-group-173">
								<label class="accordion-title" for="sub-group-173">DISPOSABLES</label>  
								<ul>
									<li><a href="#" class="subCatproducts_products"><i class="fa fa-angle-double-right"></i>plastic</a></li>
								</ul>
							</li>
							<li class="sub-level">
								<input class="accordion-toggle" type="checkbox" name="sub-group-174" id="sub-group-174">
								<label class="accordion-title" for="sub-group-174">CLEANING LIQUIDS AND TOOLS</label>  
								<ul>
									<li><a href="#" class="subCatproducts_products"><i class="fa fa-angle-double-right"></i>HOME CLEANING</a></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="col-sm-12 col-md-9">
				<div class="row">
				</div>
                <div class="row">
					<div class="col-md-12 bottomclass">
						<div class="widgetngo__heading">
							<h4 class="widgetngo__title">OFFER <span class="base-color">COUPON</span></h4>
						</div>
					</div>
				</div>
                <div class="col-md-12 padding_div">
						<div class="testimonial-slider">
							<div class="padding_none testimonial">
								<div class="testimonial__about">
                                <div class="deal-item-wrapper testabout">
			


<div class="card-deal">	
	
	<div class="card-deal-inner">

		
		<div class="deal-thumb-image">
						<a href="#">	
						
									<div class="discount-ribbon">30%</div>
				
									<div class="btn-card-deal"><i class="lnr lnr-cart"></i><span>View Coupon</span></div>
				
									<img src="{{ asset('cdn/images/pizza.png') }}" alt="">
							</a>
		</div>
		<div class="card-deal-info">
						<h2 class="card-deal-title"><a href="http://subsolardesigns.com/couponhut/deal/weight-loss-fitness/">[Print] Weight Loss Fitness</a></h2>
			<div class="card-deal-categories"><a href="http://subsolardesigns.com/couponhut/deal_category/beauty/">Beauty</a></div>
			<div class="deal-prices">
								<div class="deal-old-price">
					$240				</div>
												<div class="deal-new-price">
					$168				</div>
												<div class="deal-save-price">
					<span>You save:</span>
					30%				</div>
							</div>

			
			<!-- Expiring -->
							<div class="card-deal-meta-expiring">
					<div class="card-deal-meta-title">Expires in</div>
					<span class="jscountdown-wrap" data-time="2018/10/01" data-short="true">20 days</span>
				</div>
			
		</div><!-- end card-deal-info -->

	</div><!-- end card-deal-inner -->

</div><!-- end card-deal -->		</div>
								</div>
							</div>
                            <div class="padding_none testimonial">
								<div class="testimonial__about">
                                <div class="deal-item-wrapper testabout">
			


<div class="card-deal">	
	
	<div class="card-deal-inner">

		
		<div class="deal-thumb-image">
						<a href="#">	
						
									<div class="discount-ribbon">30%</div>
				
									<div class="btn-card-deal"><i class="lnr lnr-cart"></i><span>View Coupon</span></div>
				
									<img src="{{ asset('cdn/images/pizza.png') }}" alt="">
							</a>
		</div>
		<div class="card-deal-info">
						<h2 class="card-deal-title"><a href="http://subsolardesigns.com/couponhut/deal/weight-loss-fitness/">[Print] Weight Loss Fitness</a></h2>
			<div class="card-deal-categories"><a href="http://subsolardesigns.com/couponhut/deal_category/beauty/">Beauty</a></div>
			<div class="deal-prices">
								<div class="deal-old-price">
					$240				</div>
												<div class="deal-new-price">
					$168				</div>
												<div class="deal-save-price">
					<span>You save:</span>
					30%				</div>
							</div>

			
			<!-- Expiring -->
							<div class="card-deal-meta-expiring">
					<div class="card-deal-meta-title">Expires in</div>
					<span class="jscountdown-wrap" data-time="2018/10/01" data-short="true">20 days</span>
				</div>
			
		</div><!-- end card-deal-info -->

	</div><!-- end card-deal-inner -->

</div><!-- end card-deal -->		</div>
								</div>
							</div>
                            <div class="padding_none testimonial">
								<div class="testimonial__about">
                                <div class="deal-item-wrapper testabout">
			


<div class="card-deal">	
	
	<div class="card-deal-inner">

		
		<div class="deal-thumb-image">
						<a href="#">	
						
									<div class="discount-ribbon">30%</div>
				
									<div class="btn-card-deal"><i class="lnr lnr-cart"></i><span>View Coupon</span></div>
				
									<img src="{{ asset('cdn/images/pizza.png') }}" alt="">
							</a>
		</div>
		<div class="card-deal-info">
						<h2 class="card-deal-title"><a href="http://subsolardesigns.com/couponhut/deal/weight-loss-fitness/">[Print] Weight Loss Fitness</a></h2>
			<div class="card-deal-categories"><a href="http://subsolardesigns.com/couponhut/deal_category/beauty/">Beauty</a></div>
			<div class="deal-prices">
								<div class="deal-old-price">
					$240				</div>
												<div class="deal-new-price">
					$168				</div>
												<div class="deal-save-price">
					<span>You save:</span>
					30%				</div>
							</div>

			
			<!-- Expiring -->
							<div class="card-deal-meta-expiring">
					<div class="card-deal-meta-title">Expires in</div>
					<span class="jscountdown-wrap" data-time="2018/10/01" data-short="true">20 days</span>
				</div>
			
		</div><!-- end card-deal-info -->

	</div><!-- end card-deal-inner -->

</div><!-- end card-deal -->		</div>
								</div>
							</div>
                            <div class="padding_none testimonial">
								<div class="testimonial__about">
                                <div class="deal-item-wrapper testabout">
			


<div class="card-deal">	
	
	<div class="card-deal-inner">

		
		<div class="deal-thumb-image">
						<a href="#">	
						
									<div class="discount-ribbon">30%</div>
				
									<div class="btn-card-deal"><i class="lnr lnr-cart"></i><span>View Coupon</span></div>
				
									<img src="{{ asset('cdn/images/pizza.png') }}" alt="">
							</a>
		</div>
		<div class="card-deal-info">
						<h2 class="card-deal-title"><a href="http://subsolardesigns.com/couponhut/deal/weight-loss-fitness/">[Print] Weight Loss Fitness</a></h2>
			<div class="card-deal-categories"><a href="http://subsolardesigns.com/couponhut/deal_category/beauty/">Beauty</a></div>
			<div class="deal-prices">
								<div class="deal-old-price">
					$240				</div>
												<div class="deal-new-price">
					$168				</div>
												<div class="deal-save-price">
					<span>You save:</span>
					30%				</div>
							</div>

			
			<!-- Expiring -->
							<div class="card-deal-meta-expiring">
					<div class="card-deal-meta-title">Expires in</div>
					<span class="jscountdown-wrap" data-time="2018/10/01" data-short="true">20 days</span>
				</div>
			
		</div><!-- end card-deal-info -->

	</div><!-- end card-deal-inner -->

</div><!-- end card-deal -->		</div>
								</div>
							</div>
                            <div class="padding_none testimonial">
								<div class="testimonial__about">
                                <div class="deal-item-wrapper testabout">
			


<div class="card-deal">	
	
	<div class="card-deal-inner">

		
		<div class="deal-thumb-image">
						<a href="#">	
						
									<div class="discount-ribbon">30%</div>
				
									<div class="btn-card-deal"><i class="lnr lnr-cart"></i><span>View Coupon</span></div>
				
									<img src="{{ asset('cdn/images/pizza.png') }}" alt="">
							</a>
		</div>
		<div class="card-deal-info">
						<h2 class="card-deal-title"><a href="http://subsolardesigns.com/couponhut/deal/weight-loss-fitness/">[Print] Weight Loss Fitness</a></h2>
			<div class="card-deal-categories"><a href="http://subsolardesigns.com/couponhut/deal_category/beauty/">Beauty</a></div>
			<div class="deal-prices">
								<div class="deal-old-price">
					$240				</div>
												<div class="deal-new-price">
					$168				</div>
												<div class="deal-save-price">
					<span>You save:</span>
					30%				</div>
							</div>

			
			<!-- Expiring -->
							<div class="card-deal-meta-expiring">
					<div class="card-deal-meta-title">Expires in</div>
					<span class="jscountdown-wrap" data-time="2018/10/01" data-short="true">20 days</span>
				</div>
			
		</div><!-- end card-deal-info -->

	</div><!-- end card-deal-inner -->

</div><!-- end card-deal -->		</div>
								</div>
							</div>
						</div>
					</div>
				<div class="row">
					<div class="col-md-12">
						<div class="widgetngo__heading">
							<h4 class="widgetngo__title">LATEST <span class="base-color">PRODUCT</span></h4>
						</div>
					</div>
				</div>
				<div class="productsGrid row" id="shopProductsList">

					<div class="productsDiv col-md-3 col-sm-4 col-xs-6 padding_div" data-price="230">
						<div class="product product--card productBox">
							<div class="product__thumbnail">
								<img src="https://www.kanpurize.com/uploadFiles/productsImg/FrontImg/5591a.jpeg" class="img-responsive" alt="Product Image">
								<div class="prod_btn">
									<span><a href="#" class="transparent btn--sm btn--round">View Detail</a></span>
									<a name="cart" class="addtocart transparent btn--sm btn--round">Add to cart</a>
								</div>
							</div>
							<div class="product-desc shopproduct">
								<p class="producthieght"> Pin to Pen Disposable Steel Fi...
								</p>
							</div>
							<div class="product-purchase">
								<div class="price_love">
									<span><span style="text-decoration:line-through; font-weight:500px; color:#999;">Rs.460 </span> &nbsp;Rs.<span id="pPrize" class="prize">230</span></span>
									<span class="addtowishList" id="wishbtn46"><i class="fa fa-heart"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="productsDiv col-md-3 col-sm-4 col-xs-6 padding_div" data-price="300">
						<div class="product product--card productBox">
							<div class="product__thumbnail">
								<img src="https://www.kanpurize.com/uploadFiles/productsImg/FrontImg/5591a.jpeg" class="img-responsive" alt="Product Image">
								<div class="prod_btn">
									<span><a href="#" class="transparent btn--sm btn--round">View Detail</a></span>
									<a name="cart" class="addtocart transparent btn--sm btn--round">Add to cart</a>
								</div>
							</div>
							<div class="product-desc shopproduct">
								<p class="producthieght"> Pin to Pen Disposable Steel Fi...
								</p>
							</div>
							<div class="product-purchase">
								<div class="price_love">
									<span><span style="text-decoration:line-through; font-weight:500px; color:#999;">Rs.460 </span> &nbsp;Rs.<span id="pPrize" class="prize">230</span></span>
									<span class="addtowishList" id="wishbtn46"><i class="fa fa-heart"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="productsDiv col-md-3 col-sm-4 col-xs-6 padding_div" data-price="300">
						<div class="product product--card productBox">
							<div class="product__thumbnail">
								<img src="https://www.kanpurize.com/uploadFiles/productsImg/FrontImg/5591a.jpeg" class="img-responsive" alt="Product Image">
								<div class="prod_btn">
									<span><a href="#" class="transparent btn--sm btn--round">View Detail</a></span>
									<a name="cart" class="addtocart transparent btn--sm btn--round">Add to cart</a>
								</div>
							</div>
							<div class="product-desc shopproduct">
								<p class="producthieght"> Pin to Pen Disposable Steel Fi...
								</p>
							</div>
							<div class="product-purchase">
								<div class="price_love">
									<span><span style="text-decoration:line-through; font-weight:500px; color:#999;">Rs.460 </span> &nbsp;Rs.<span id="pPrize" class="prize">230</span></span>
									<span class="addtowishList" id="wishbtn46"><i class="fa fa-heart"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="productsDiv col-md-3 col-sm-4 col-xs-6 padding_div" data-price="300">
						<div class="product product--card productBox">
							<div class="product__thumbnail">
								<img src="https://www.kanpurize.com/uploadFiles/productsImg/FrontImg/5591a.jpeg" class="img-responsive" alt="Product Image">
								<div class="prod_btn">
									<span><a href="#" class="transparent btn--sm btn--round">View Detail</a></span>
									<a name="cart" class="addtocart transparent btn--sm btn--round">Add to cart</a>
								</div>
							</div>
							<div class="product-desc shopproduct">
								<p class="producthieght"> Pin to Pen Disposable Steel Fi...
								</p>
							</div>
							<div class="product-purchase">
								<div class="price_love">
									<span><span style="text-decoration:line-through; font-weight:500px; color:#999;">Rs.460 </span> &nbsp;Rs.<span id="pPrize" class="prize">230</span></span>
									<span class="addtowishList" id="wishbtn46"><i class="fa fa-heart"></i></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop
@section('footer')
@parent 
<script>jssor_1_slider_init();</script>
<script src="{{ asset('cdn/js/matrimonial.js')}}"></script>
@stop