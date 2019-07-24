@extends("layout")
@section('content')
<div class="loadLoginPage">
@if($shopDetails != FALSE)
@php 
$bannerImage = $shopDetails->bannerImage;
@endphp
<section>
	<div class="row lib-panel box-shadowbanner" style="margin:0px !important;">
		<div class="col-md-8 padding_divbanner">
			@if(!empty($bannerImage))
			<img src='{{ url("uploadFiles/shopBannerImage/$bannerImage") }}' alt=""  class="lib-img-show img img-responsive"  /> 
			@else
			<img src="<?php echo url("uploadFiles/shopBannerImage/defaultBannerImage.jpg") ?>" alt=""  class="lib-img-show img img-responsive" /> @endif
		</div>
		<div class="col-md-4">
			<div class="lib-header">
				<div class="titlename">
					<h1 style="text-transform:capitalize;"><span class="highlight"><?php if(!empty($shopDetails->vName))echo $shopDetails->vName; ?></span></h1>
				</div>
				<div class="lib-header-seperator"></div>
			</div>
			<ul class="info-contactservices">
				<li>
					<span class="lnr lnr-smartphone info-icon"></span>
					<span class="info"><?php if(!empty($shopDetails->vMobile))echo $shopDetails->vMobile; ?></span>
				</li>
				@if(!empty($shopDetails->vEmail))
                                <li>
					<span class="lnr lnr-envelope info-icon"></span>
					<span class="info">{{ $shopDetails->vEmail  }}</span>
				</li>
                                @endif
				<li>
					<span class="locationicon1 lnr lnr-map-marker info-icon"></span>
					<span class="info"><?php if(!empty($shopDetails->address1))echo $shopDetails->address1; else echo "N/A"; ?><?php if(!empty($shopDetails->address2))echo $shopDetails->address2." , "; ?><?php if(!empty($shopDetails->city))echo $shopDetails->city,"-"; ?><?php if(!empty($shopDetails->pinCode))echo $shopDetails->pinCode.","; ?><?php if(!empty($shopDetails->state))echo $shopDetails->state; ?></span>
				</li>
				<li>
                                <?php 
				    if($rating_result != FALSE){
					  $rate = 0;
					  foreach($rating_result as $result_rate){
						   $rate += $result_rate->rating;  
						}
					  $rating_per = $rate / count($rating_result);	
					   ?>
					   <span class="info"><input id="result_ratingBox" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="<?php if(!empty($rating_per))echo round($rating_per); ?>"></span>
					   <?php
					}
				  ?>
				</li>
			</ul>
		</div>
	</div>
</section>
@endif
<div class="filter-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="filter-bar">
					<div class="filter__option filter--dropdown">
						<a href="#" id="drop1" class="dropdown-trigger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories <span class="lnr lnr-chevron-down"></span></a>
						<ul class="dropdown dropdown-menu" aria-labelledby="drop1">
							<?php
								if($goodsshopcategoryList != FALSE){
								foreach($goodsshopcategoryList as $list){
								?>
							<li><a href="<?php echo url("goods_Shop")."/".base64_encode($shopDetails->username)."/".base64_encode($list->cid); ?>"><?php if(!empty($list->cname)) echo $list->cname; ?></a></li>
							<?php
								}
								 }
								 ?> 
						</ul>
					</div>
					<div class="filter__option filter--dropdown filter--range">
						<a href="#" id="drop3" class="dropdown-trigger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Price Range <span class="lnr lnr-chevron-down"></span></a>
						<div class="dropdown dropdown-menu" aria-labelledby="drop3">
							<div class="range-slider price-range"></div>
							<div class="price-ranges">
								<span class="from rounded">Rs. 30</span>
								<span class="to rounded">Rs. 300</span>
							</div>
						</div>
					</div>
					<div class="filter__option filter--select">
						<div class="select-wrap">
							<select name="filterproductsPrice" id="filterproductsPrice">
								<option hidden>Sort By Price</option>
								<option value="12h">Price : Low to High</option>
								<option value="h21">Price : High to low</option>
							</select>
							<span class="lnr lnr-chevron-down"></span>
						</div>
					</div>
					<div class="filter__option filter--dropdown filter--range">
						 <a href="#" id="ratingreview" class="dropdown-trigger">Review & Rating</a>	
					</div>
					@php 
					$shopID = base64_encode($shopDetails->id);
					$shopName = str_replace(" ","_",$shopDetails->vName);  
					@endphp
					<div class="filter__option filter--dropdown filter--range">
										<a href="#" id="drop2" class="dropdown-trigger   btn-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-share-alt fa-lg"></i>
										</a>
										<ul class="sharedropdown dropdown dropdown-menu" aria-labelledby="drop2">
											<li>
												<div class="btn-group">
												            <a class="btnsocialshare btn btn-md" target="_blank" title="On Facebook" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=<?php if(!empty($share_webshopurl))echo $share_webshopurl; ?>">
												            <i class="fa fa-facebook fa-lg fb"></i>
												            </a>
												            <a class="btnsocialshare btn btn-md" target="_blank" title="On Google Plus" href="https://plus.google.com/share?url=<?php if(!empty($share_webshopurl))echo $share_webshopurl; ?>">
												            <i class="fa fa-google-plus fa-lg google"></i>
												           </a>
												            <a class="btnsocialshare btn btn-sm" target="_blank" title="On LinkedIn" href="https://www.linkedin.com/shareArticle?url=<?php if(!empty($share_webshopurl))echo $share_webshopurl; ?>">
														<i class="fa fa-linkedin fa-lg linkin"></i>
													    </a>
																							           
												            @if($device_type == "D")
											                          <a href="https://web.whatsapp.com/send?text=<?php if(!empty($share_webshopurl))echo $share_webshopurl; ?>" class="btnsocialshare btn btn-md" target="_blank" title="On Whatsapp" href="#">
													           <i class="fa fa-whatsapp fa-lg fb"></i>
													           </a>
											                               @else
											                                 <a href="whatsapp://send?text=<?php if(!empty($share_webshopurl))echo $share_webshopurl; ?>" class="btnsocialshare btn btn-md" target="_blank" title="On Whatsapp" href="#">
													           <i class="fa fa-whatsapp fa-lg fb"></i>
													           </a>
											
											                               @endif
			           
           
    												</div>
											</li>
											
										</ul>
									</div>
					<a href='{{ url("complain/$shopDetails->username") }}' class="btn btn--round btn-sm">Connect to seller</a>
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
					<input type="hidden" name="shopID" id="shopID" class="" readonly value='@if(!empty($shopDetails)) {{ $shopDetails->id }} @endif' />
					<?php 
						if($goodsshopcategoryList != FALSE){
						   foreach($goodsshopcategoryList as $shopCatList){
						    ?>
					<li class="sub-level">
						<input class="accordion-toggle" type="checkbox" name ="group-<?php echo $shopCatList->cid; ?>" id="group-<?php echo $shopCatList->cid; ?>">
						<label class="accordion-title" for="group-<?php echo $shopCatList->cid; ?>"> <i class="fa fa-tags"></i><?php if(!empty($shopCatList->cname)) echo $shopCatList->cname; ?>&nbsp;</label>
						<?php
							if(!empty($shopCatList->cid)){
							$categoryList = $catObj->getValidShopCat($shopCatList->cid,$shopDetails->id);
							if($categoryList != FALSE){
							?>
						<ul>
							<?php
								foreach($categoryList as $catList){
								?>
							<li class="sub-level">
								<input class="accordion-toggle" type="checkbox" name ="sub-group-{{ $catList['id'] }}" id="sub-group-{{ $catList['id'] }}">
								<label class="accordion-title" for="sub-group-{{ $catList['id'] }}"><?php if(!empty($catList['csname'])) echo $catList['csname']; ?></label>  
								<?php
									if(!empty($catList['id'])){
									$subCatList = $subCatObj->getValidShopsubCat($catList['id'],$shopDetails->id);                                         if($subCatList != FALSE){
									?>
								<ul>
									<?php
										foreach($subCatList as $subList){
										?>
									<li><a id="<?php if(!empty($subList['sid']))echo $subList['sid'];  ?>" class="subCatproducts_products"><i class="fa fa-angle-double-right"></i><?php if(!empty($subList['subCatname']))echo $subList['subCatname'];  ?></a></li>
									<?php    
										}
										?>
								</ul>
								<?php
									}
									}
									?>
							</li>
							<?php
								}
								?>       
						</ul>
						<?php
							}
							}
							               ?> 
					</li>
					<?php   
						}
						}
						?>
				</ul>
			</div>
			<div class="col-sm-12 col-md-9">
				<div class="row">
					<?php
						if($offerNewsList != FALSE){
						?>
					<div class="col-md-12 bottomclass">
						<div class="widgetngo__heading">
							<h4 class="widgetngo__title">LATEST <span class="base-color">OFFERS</span></h4>
						</div>
					</div>
					<div class="col-md-12 padding_div">
						<div class="testimonial-slider">
							<?php
								foreach($offerNewsList as $listArr){
								$offerID = base64_encode($listArr->id);
								$offertitle = str_replace(" ","_",$listArr->newsTitle);
								$image = $listArr->image;
								?>
							<div class="testimonial">
								<div class="testimonial__about">
									<a href="<?php echo url("kanpurize_offers_products/$offerID/$offertitle "); ?>"> 
									<img src='{{ url("uploadFiles/offersNews/$image") }}' alt='{{ $offertitle }}' />
									</a >
								</div>
							</div>
							<?php
								}
								?>
						</div>
					</div>
					<?php
						}
						       ?>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="widgetngo__heading">
							<h4 class="widgetngo__title">LATEST <span class="base-color">PRODUCT</span></h4>
						</div>
					</div>
				</div>
				@include('kanpur.getProducts')
			</div>
			<div class="col-sm-12">
				<div class="row">
					<?php if($productsList != FALSE) echo $productsList->render(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
@include('kanpur.review_rating')
 <!--popup rating-->
@stop
@section('footer')
@parent
<script src="{{ url('cdn/js/review&rating.js') }}"></script>
@stop