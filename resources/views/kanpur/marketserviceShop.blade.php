@extends("layout")
@section('content')
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
<section class="products">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-md-3 padding_div">
				<ul class="mdn-accordion">
					<li class="subtop"><a href="#"><i class="fa fa-random"></i>Services &nbsp;</a></li>
					@if(!empty($serviceShoplist)) 
					@php 
					$shopID = base64_encode($shopDetails->username);
					$shopName = str_replace(" ","_",$shopDetails->vName);
					@endphp
					@foreach($serviceShoplist as $list)
					@php 
					$catID = base64_encode($list->cid);
					@endphp
					<li><a href="<?php echo url("services_shop/$shopID/$catID"); ?>"><i class="fa fa-angle-double-right"></i>{{ $list->cname }}</a></li>
					@endforeach
					@endif
				</ul>
				<?php
					if($offerNewsList != FALSE){
					  ?>
				<div class="widgetngo shopofferstab">
					<div class="widgetngo__heading">
						<h4 class="widgetngo__title">Offers<span class="base-color"> & News</span></h4>
					</div>
				    <?php
					 foreach($offerNewsList as $listArr){
					   ?> 
					   <div class="widgetngo__text-content">
						<div class="widgetngo-latest-causes">
							<div class="widgetngo-latest-causes__image-wrap">
								<a href="#">
                                <img class="widgetngo-latest-causes__thubnail lazy" alt="" src="<?php echo url("uploadFiles/offersNews/$listArr->image"); ?>" style="display: inline;" />
                                </a>
							</div>
							<div class="widgetngo-latest-causes__text-content">
								<h4 class="widgetngo-latest-causes__title"><a href='{{ url("offer_news/$listArr->id")}}'><?php if(!empty($listArr->newsTitle))echo $listArr->newsTitle; ?></a></h4>
								<div class="widgetngo-latest-causes__admin small-text">
									<i class="base-color lnr lnr-clock widgetngo-latest-causes__admin-icon"></i>
									<a href="#"><?php if(!empty($listArr->created_at))echo date('d-M-Y',$listArr->created_at); ?></a>
								</div>
							</div><hr />
						</div>
					</div>
                     <?php
					 }
					    ?>
				</div>
				<?php
				}
					?>
			</div>
			<div class="col-sm-12 col-md-9 padding_div">
				<div class="shortcode_modules">
					<div class="tab tab3">
						<div class="item-navigation">
							<ul class="nav nav-tabs nav--tabs2">
								<li role="presentation" class="active">
									<a href="#product-details2" aria-controls="product-details2" role="tab" data-toggle="tab">
									<span class="lnr lnr-home"></span> Services
									</a>
								</li>
								<li role="presentation">
									<a href="#product-comment3" aria-controls="product-comment3" role="tab" data-toggle="tab">
									<span class="lnr lnr-user"></span> Images
									</a>
								</li>
								<li role="presentation">
									 <a href="#" id="ratingreview" class="">Review & Rating</a>	
								</li>
								<li role="presentation">
									<a href='{{ url("complain/$shopDetails->username") }}' class="">
									<span class="lnr lnr-apartment"></span> Connect to seller
									</a>
								</li>
								<li role="presentation">
									<div class="filter__option filter--dropdown filter--range">
										<a href="#" id="drop2" class="dropdown-trigger   btn-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-share-alt fa-lg"></i>
										Share</a>
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
								</li>
							</ul>
						</div>
						<div class="tab-content">
							<?php
								if($servicesDetailsList != FALSE){
								?>
							<div class="tab-pane product-tab active" id="product-details2">
								<img src="<?php echo url("public/lodingImage.gif"); ?>" style="display:none;"/>
								<input type="hidden" name="shopID" id="shopID" class="shopID" value="<?php if(!empty($shopDetails->id))echo $shopDetails->id; ?>" readonly="readonly" />
								<input type="hidden" name="shopName" id="shopName" class="shopName" value="<?php if(!empty($shopDetails->vName))echo $shopDetails->vName; ?>" readonly="readonly" />  
								<h3 class="information1 job__title"><i class="lnr lnr-tag" aria-hidden="true"></i>&nbsp;&nbsp;<?php if(!empty($shopDetails))echo $shopDetails->vName; ?></h3>
								<div id="serviceDetails">
									<h3 class=" information1 job__title"><i class="lnr lnr-tag" aria-hidden="true"></i>&nbsp;&nbsp;Service Description</h3>
									<div class="infomation2">
										<p class=""><?php if(!empty($servicesDetailsList->serviceDescription))echo $servicesDetailsList->serviceDescription; ?></p>
									</div>
									<?php if(!empty($servicesDetailsList->primeServices)){
										?>
									<h3 class="information1 job__title"><i class="lnr lnr-tag" aria-hidden="true"></i>&nbsp;&nbsp;Prime Services</h3>
									<div class="infomation2">
										<p class=""><?php echo $servicesDetailsList->primeServices; ?></p>
									</div>
									<?php
										}
										?>
									<?php
										if(!empty($servicesDetailsList->ourServices)){
										   ?>
									<h3 class="information1 job__title"><i class="lnr lnr-tag" aria-hidden="true"></i>&nbsp;&nbsp;Our Services</h3>
									<div class="infomation2">
										<p class=""><?php echo $servicesDetailsList->ourServices; ?></p>
									</div>
									<?php
										}
										?>
									<?php 
										if(!empty($servicesDetailsList->timming)){
										    ?>
									<h3 class="information1 job__title"><i class="lnr lnr-calendar-full" aria-hidden="true"></i>&nbsp;&nbsp;Timming</h3>
									<div class="infomation2">
										<p class=""><?php  echo $servicesDetailsList->timming; ?></p>
									</div>
									<?php     
										}
										?>
									<?php
										if(!empty($servicesDetailsList->infoMobile)){
										    ?>
									<h3 class="information1 job__title"><i class="lnr lnr-phone" aria-hidden="true"></i>&nbsp;&nbsp;Contact Number</h3>
									<div class="infomation2">
										<p class=""><?php  echo $servicesDetailsList->infoMobile; ?></p>
									</div>
									<?php
										}
										?>
									<?php
										if(!empty($servicesDetailsList->infoEmail)){
										    ?>
									<h3 class="information1 job__title"><i class="lnr lnr-envelope" aria-hidden="true"></i>&nbsp;&nbsp;Email Id</h3>
									<div class="infomation2">
										<p class=""><?php  echo $servicesDetailsList->infoEmail; ?></p>
									</div>
									<?php
										}
										?>
									<?php
										if(!empty($servicesDetailsList->address)){
										    ?>
									<h3 class="information1 job__title"><i class="lnr lnr-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;Contact Address</h3>
									<div class="infomation2">
										<p class=""><?php  echo $servicesDetailsList->address; ?></p>
									</div>
									<?php
										}
										?>
								</div>
							</div>
							<?php
								}
								else{
								  ?>
							<div class="tab-pane product-tab active" id="product-details2">
								<p class="alert alert-danger">No service Available.</p>
							</div>
							<?php
								} 
								 ?>
							<div class="tab-pane product-tab" id="product-comment3">
								<div class="row">
									<?php 
										if($imageListArr != FALSE){
										foreach($imageListArr as $list){
										 ?>
									<div class='col-sm-4 col-xs-6 col-md-4 col-lg-4'>
										<a class="thumbnail fancybox" rel="ligthbox" href="<?php echo url("uploadFiles/gallery/$list->image"); ?>">
										<img class="img-responsive" alt="" src="<?php echo url("uploadFiles/gallery/$list->image"); ?>" />
										</a>
									</div>
									<?php
										}
										 }
										?> 
								</div>
							</div>
							<div class="tab-pane product-tab" id="tc3">
			                            	<h3 class="normal-padding">Give a rating for Skill:</h3>
				                                <div class="row">
					                            	<form>
					    								<div class="form-group">
					                                        <div class="col-sm-12">
					    								    <textarea name="rating" cols="2" rows="2"></textarea> 
					                                        </div>
					                                     </div>
					                                     <div class="form-group">
					                                     		<div class="col-sm-6">
					                                     	  <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="2">
					                                          	</div>
					                                            <div class="col-sm-6">
					                                     	 		<button class="btn btn--icon btn-md btn--round btn-secondary btnratingright" type="submit" name="submit" id="submit">Submit</button>
					                                          	</div>
					                                     </div>
				    				      </form>
				                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@include('kanpur.review_rating')
@stop
@section('footer')
@parent
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="{{ url('cdn/js/review&rating.js') }}"></script>
<script>
	$(document).ready(function(){
	    $(".fancybox").fancybox({
	        openEffect: "none",
	        closeEffect: "none"
	    });
	});
</script>
@stop