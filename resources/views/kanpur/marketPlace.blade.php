@extends("layout")
@section('content')
<div class="hero-area mainbackpage">
	<div class="bgimage">
		<div id="jssor_1" class="mainslider">
			<div data-u="slides" class="mainsliderimg">
				@if(!empty($allAdsPostData))
				@foreach($allAdsPostData as $adsData) 
				<div data-p="150.00">
					<img data-u="image" src='@php $bimage = $adsData->image; @endphp {{url("uploadFiles/vendorAdspost/$bimage") }}' alt="@if(!empty($adsData->description)){{ $adsData->description }} @endif" title="@if(!empty($adsData->description)){{ $adsData->description }} @endif"  />
					<img data-u="thumb" src="{{ url("uploadFiles/vthumbsAdspost/$bimage") }} " alt="@if(!empty($adsData->description)){{ $adsData->description }} @endif" title="@if(!empty($adsData->description)){{ $adsData->description }} @endif" />
				</div>
				@endforeach
				@endif
			</div>
			<div data-u="thumbnavigator" class="jssort101 mainthumbslider" data-autocenter="2" data-scale-left="0.75">
				<div data-u="slides">
					<div data-u="prototype" class="p" style="width:200px;height:100px;">
						<div data-u="thumbnailtemplate" class="t"></div>
						<svg viewbox="0 0 16000 16000" class="cv">
							<circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
							<line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
							<line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
						</svg>
					</div>
				</div>
			</div>
			<div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:460px;" data-autocenter="2">
				<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
					<circle class="c" cx="8000" cy="8000" r="5920"></circle>
					<polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920"></polyline>
					<line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
				</svg>
			</div>
			<div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2">
				<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
					<circle class="c" cx="8000" cy="8000" r="5920"></circle>
					<polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
					<line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
				</svg>
			</div>
		</div>
	</div>
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="search_box">
						<form action="#">
							<input type="text" name="searchBox" id="searchBox" class="text_field text_field1" placeholder="Search...">
							<div class="search__select select-wrap">
								<select name="searchcategory" class="select--field searchcategory" id="blah">
									<option value="1">Shop</option>
									<option value="2">Products</option>
									<option value="2">NGO</option>
									<option value="2">Event</option>
								</select>
								<span class="lnr lnr-chevron-down"></span>
							</div>
							<button type="button" name="searchfronBtn" id="searchfronBtn" class="search-btn btn--lg">Search Now</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row" style="margin-top:70px; display:none;" id="loadingRow">
	<div class="col-sm-12" id="loadingContent">
		<img style="display:none; text-align:center;" src="<?php echo url("uploadFiles/loading.gif"); ?>" alt="loading" id="loadingImage" />
	</div>
</div>
<div class="marketshopblog">
	<div class="container-fluid">
		<div class="product-title-area markettitle1">
			<div class="row margin_div">
				<div class="col-md-6 col-sm-6 padding_div">
					<div class="product__title">
						<h2>Offer & News</h2>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 padding_div">
					<div class="">
						<div class="filter__option filter--layout">
							<a href="{{ url('view_offers') }}">
								<div class="svg-icon"><img class="svg" src="images/svg/list.svg" alt=""></div>
								&nbsp; View All
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row margin_divslide">
					<?php
						if($offerNewsList != FALSE){
						?>
					<div class="col-md-12 padding_div1">
						<div id="slideroffers" class="owlCarousel testislider offerfirstpage owl-carousel-metri">
							<?php
								foreach($offerNewsList as $listArr){
								  $shop_user = base64_encode($listArr->username);
								 if($listArr->businesscategoryType == 1){
								     $url = url("goods_Shop/$shop_user"); 
								   }		
								 if($listArr->businesscategoryType == 2){
								     $url = url("services_shop/$shop_user"); 
								   }
								 if($listArr->businesscategoryType == 3){
								     $url = url("goods_services/$shop_user"); 
								  }  
								
								$news_title = str_replace(" ","_",$listArr->newsTitle);
								$image = $listArr->image;
								?>
							<div class="testimonial testmonialbox">
								<div class="testimonial__about testabout">
									<a href="<?php echo $url; ?>"> 
									<img src='{{ url("uploadFiles/offersNews/$image") }}' alt='@if(!empty($listArr->newsTitle)){{ $listArr->newsTitle }} @endif'  title=' @if(!empty($listArr->newsTitle)){{ $listArr->newsTitle }} @endif'/>
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
			</div>
		</div>
	</div>
</div>
<div class="">
	<div class="container-fluid">
				<div class="product-title-area markettitle1">
                	<div class="row margin_div">
                	<div class="col-md-6 col-sm-6 padding_div">
					<div class="product__title">
						<h2>Marketplace</h2>
					</div>
				</div>
                <div class="col-md-6 col-sm-6 padding_div">
					<div class="">
						<div class="filter__option filter--layout">
                            <a href="{{ url('view_webshop') }}">
                                <div class="svg-icon"><img class="svg" src="images/svg/list.svg" alt=""></div>&nbsp; View All
                            </a>
                        </div>
					</div>
				</div>
			</div>
            
            </div>
          <div class="row margin_divslide">
          <div class="col-md-12 padding_div1">
				<div id="webshop" class="owlCarousel owl-carousel-metri testislider offerfirstpage" >
					@if(!empty($allShopListData))
					@foreach($allShopListData as $dataArr)
					@php 
					$shopID = base64_encode($dataArr->username); 
					$bType = $dataArr->businesscategoryType;
					$shop = str_replace(" ","_",$dataArr->vName);
					@endphp
                    					<div class="testimonial testmonialbox">
						<div class="product product--card">
							<div class="product__thumbnail">
								@if(!empty($dataArr->imageLogo))
								@php 
								$shopImage = $dataArr->imageLogo;
								@endphp
								<img src='{{ asset("uploadFiles/shopProfileImg/$shopImage") }}' alt='{{ $shop }}' title='{{ $shop }}'>   
								@else
								<img src="{{ asset('uploadFiles/shopProfileImg/marketPlace.jpg') }}" alt="webshop in kanpur">
								@endif
								<div class="prod_btn">
									<a href='{{ url("market_shop/$shopID") }}' class="transparent btn--sm btn--round" title='{{ $shop }}'>More Info</a>
								</div>
								<!-- end /.prod_btn -->
							</div>
							<!-- end /.product__thumbnail -->
							<div class="product-desc">
								<a href='{{ url("market_shop/$shopID") }}' class="product_title">
									<h4>@if(!empty($dataArr->vName)) {{ $dataArr->vName }} @endif</h4>
								</a>
								<p class="shopweb">
									@if(!empty($dataArr->aboutBusiness)) @if(strlen($dataArr->aboutBusiness) < 80) {{ $dataArr->aboutBusiness }} @else {{ substr($dataArr->aboutBusiness,0,100) }}  @endif @endif
								</p>
								<ul class="titlebtm">
									@if(!empty($dataArr->ownerName))
									<li>
										<p><span class="fa fa-user"></span> &nbsp;&nbsp;<a href='#'>{{ $dataArr->ownerName }}</a></p>
									</li>
									@endif
									@if(!empty($dataArr->address1))
									<li>
										<p class="shopaddress"><span class="fa fa-map-marker"></span> &nbsp;&nbsp;@if(!empty($dataArr->address1)){{ $dataArr->address1." ".$dataArr->address2 ." , ".$dataArr->city." - ".$dataArr->pinCode }} @endif</p>
									</li>
									@endif
									@if(!empty($dataArr->vMobile))
									<li>
										<p><span class="fa fa-mobile"></span> &nbsp;&nbsp;{{ $dataArr->vMobile }}</p>
									</li>
									@endif
								</ul>
							</div>
							<div class="product-purchase">
								<div class="modules__content text-center">
									<div class="social social--color--filled">
										<ul>
											<li>
												@if(!empty($dataArr->facebookLink))
												<a href="{{ $dataArr->facebookLink }}" target="_blank"><span class="fa fa-facebook"></span></a>
												@endif
											</li>
											<li>
                                            @if(!empty($dataArr->twitterLinks))
                                            <a href="{{ $dataArr->twitterLinks }}" target="_blank"><span class="fa fa-twitter"></span></a>
												@endif
											</li>
											<li>
												@if(!empty($dataArr->googlePlusLinks))
												<a href="{{ $dataArr->googlePlusLinks }}" target="_blank"><span class="fa fa-google-plus"></span></a>
												@endif
											</li>
											<li>
												@if(!empty($dataArr->linkedInLinks))
												<a href="{{ $dataArr->linkedInLinks }}" target="_blank"><span class="fa fa-linkedin"></span></a>
												@endif
											</li>
											<li>
												@if(!empty($dataArr->instagramLinks))
												<a href="{{ $dataArr->instagramLinks }}" target="_blank"><span class="fa fa-instagram"></span></a>
												@endif
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- end /.product-purchase -->
						</div></div>
						<!-- end /.single-product -->
					<!-- end /.col-md-4 -->
					@endforeach
					@else
					<h2>No shop Avavilable....</h2>
					@endif
				</div>
			</div>
          </div>
	</div>
</div>
<div class="normal-padding">
	<div class="container-fluid">
		<div class="product-title-area markettitle1">
			<div class="row margin_div">
				<div class="col-md-6 col-sm-6 padding_div">
					<div class="product__title">
						<h2>Coupons</h2>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 padding_div">
					<div class="">
						<div class="filter__option filter--layout">
							<a href="{{url('coupons')}}">
								<div class="svg-icon"><img class="svg" src="images/svg/list.svg" alt=""></div>
								&nbsp; View All
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row margin_divslide">
					<div class="col-md-12 padding_div1">
						<div id="slidercoupon" class="owlCarousel testislider offerfirstpage owl-carousel-metri">
							@foreach ($coupons as $row)
							<div class="testimonial testmonialbox">
								<div class="deal-item-wrapper testabout">
									<div class="card-deal">
										<div class="card-deal-inner">
											<div class="deal-thumb-image">
												<a class="redeam" href="{{url('action/redeam-coupon/'.$row->id)}}">
                                                	<!--div class="discount-ribbon">30%</div -->
													<div class="btn-card-deal"><i class="lnr lnr-cart"></i><span>Grab It Now</span></div>
													<img src="{{ asset('storage/'.$row->image) }}" alt="">
												</a>
											</div>
											<div class="card-deal-info">
												<h2 class="card-deal-title"><a href="http://subsolardesigns.com/couponhut/deal/weight-loss-fitness/"><!--[Print]--> {{$row->coupon_name}}</a></h2>
                                                <div class="card-deal-categories"><a href="">{{$row->vName}}</a></div>
												<div class="deal-prices">
													<div class="deal-save-price">
														<span>Available From:</span>
														{{date_format(date_create($row->started_from), "d M")}}				
													</div>
													<div class="deal-save-price">
														<span>Expires On:</span>
														{{date_format(date_create($row->expiry_date), "d M")}}			
													</div>
												</div>
												<!-- Expiring -->
												<div class="card-deal-meta-expiring">
													<span class="jscountdown-wrap" >
						Grab in next</br> {{date_diff(date_create(date("Y-m-d")),date_create(substr($row->available_upto, 0, 10)))->format("%a days")}} only
													</span>
												</div>
											</div>
										</div>
									</div>	
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--<div class="">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="product-title-area markettitle1">
					<div class="product__title">
						<h2>NGO</h2>
					</div>
				</div>
			</div>
		</div>
	       	<div class="row margin_divslide">
	       	<div class="col-md-12 padding_div1">
				<div id="ngoslid" class="owlCarousel owl-carousel-metri testislider offerfirstpage">
	               			<div class="testimonial testmonialbox">
						<div class="product product--card">
							<div class="product__thumbnail">
								<img src="{{ asset('images/webshop/1.jpg') }}" alt="webshop in kanpur">
								<div class="prod_btn">
									<a href='#' class="transparent btn--sm btn--round" title='#'>More Info</a>
								</div>
							</div>
							<div class="product-desc">
								<a href='#' class="product_title">
									<h4>Mohan singh</h4>
								</a>
								<ul class="titlebtm">
									<li>
										<p class=""><span class="fa fa-map-marker"></span> &nbsp;&nbsp;100/560 Govind Nagar , Kanpur - 208001 </p>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="testimonial testmonialbox">
						<div class="product product--card">
							<div class="product__thumbnail">
								<img src="{{ asset('images/webshop/1.jpg') }}" alt="webshop in kanpur">
								<div class="prod_btn">
									<a href='#' class="transparent btn--sm btn--round" title='#'>More Info</a>
								</div>
							</div>
							<div class="product-desc">
								<a href='#' class="product_title">
									<h4>Mohan singh</h4>
								</a>
								<ul class="titlebtm">
									<li>
										<p class=""><span class="fa fa-map-marker"></span> &nbsp;&nbsp;100/560 Govind Nagar , Kanpur - 208001 </p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
	       </div>
	</div>
	</div-->
@stop
@section('footer')
@parent 
<script>

</script>
<script>jssor_1_slider_init();</script>
<script src="{{ asset('cdn/js/matrimonial.js')}}"></script>
<script>
$(document).on('click','.redeam',function(e) {
	e.preventDefault();
	$(this).find('.btn-card-deal').css("background-color","green");
	$(this).find('.btn-card-deal').children('span').html("Redeamed");
	var url = $(this).attr('href');
	$.ajax({
           	type: "GET",
           	url: url,
           	data: '', // serializes the form's elements.
           	success: function(data) {
           		
           	}
	});
});

	$(document).ready(function(e) {
		var base_url = '{{ url("") }}';
	  $(document).on('click','#searchfronBtn',function(){
	    $("#loadingContent").html(" ");	  
	   $("#loadingRow").show(); 
	   var searchCategory = $(".searchcategory").val();
	   var searchBox = $("#searchBox").val();  
	   if(searchCategory != ""){
		 if(searchCategory==2){
		      window.location.href = base_url +"/products/" +searchBox;
		   }
		 else{
		       if(searchBox != ""){
				 $("#loadingImage").show();  
				 $.ajax({
				   url:"<?php echo url("searchShopAndProducts"); ?>",
				   type:"GET",
				   data:{searchCategory:searchCategory,searchBox:searchBox},
				   success: function(data){
					 $("#loadingRow").hide();  
					 $("#loadingImage").hide();  
					 $("#searchResult").html(data);
					}
				 });
			    }
			  else{
				$("#loadingContent").html("<p style='text-align:center; color:red;'><strong>Please Write some Text in search box .</strong></p>");
			   }  
		   }    
		}
	  });  
	});
</script>
<?php
	if(isset($_GET['success'])){
	   ?>
<script> alert("your order add in your order list"); </script> 
<?php
	}
	if(isset($_GET['failed'])){
	   ?>
<script> alert("Painding your Order payment , please try again ."); </script>
<?php
	} 
	?>
@stop