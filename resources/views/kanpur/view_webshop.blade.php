@extends("layout")
@section('content')
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="http://127.0.0.1:8000/kanpurizeMarketplace">Home</a></li>
                            <li class="active"><a href="#">Webshop</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Webshop</h1>
                </div><!-- end /.col-md-12 -->
                <div class="col-sm-6">
                	<div class="search__field">
                                <form action="#">
                                    <div class="field-wrapper">
                                        <input class="relative-field rounded" type="text" placeholder="Search your webshop">
                                        <button class="btn btn--round" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                </div>
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
    <section class="normal-padding">
    	<div class="container-fluid">
        	<div class="row">
            		@if(!empty($allShopListData))
					@foreach($allShopListData as $dataArr)
					@php 
					$shopID = base64_encode($dataArr->username); 
					$bType = $dataArr->businesscategoryType;
					$shop = str_replace(" ","_",$dataArr->vName);
					@endphp
            	<div class="col-md-12 padding_div" style="margin-bottom:10px;">
                	<div class="viewshop product product--list">
                        <div class="product__thumbnail">
                        @if(!empty($dataArr->imageLogo))
								@php 
								$shopImage = $dataArr->imageLogo;
								@endphp
                                <img src='{{ asset("uploadFiles/shopProfileImg/$shopImage") }}' alt='{{ asset("uploadFiles/shopProfileImg/$shop") }}'>   
								@else
								<img src="{{ asset('uploadFiles/shopProfileImg/marketPlace.jpg') }}" alt="webshop in kanpur">
								@endif
                            <div class="prod_btn">
                                <div class="prod_btn__wrap">
                                    <a href='{{ url("market_shop/$shopID") }}' class="transparent btn--sm btn--round" title='{{ $shop }}'>More Info</a>
                                </div>
                            </div><!-- end /.prod_btn -->
                        </div><!-- end /.product__thumbnail -->

                        <div class="product__details">
                            <div class="product-desc">
                                <a href='{{ url("market_shop/$shopID") }}' class="product_title"><h4>@if(!empty($dataArr->vName)) {{ $dataArr->vName }} @endif</h4></a>
                                <p class="viewshopdetails">
									@if(!empty($dataArr->aboutBusiness)) @if(strlen($dataArr->aboutBusiness) < 80) {{ $dataArr->aboutBusiness }} @else {{ substr($dataArr->aboutBusiness,0,100) }}  @endif @endif
								</p>
                            </div><!-- end /.product-desc -->
							<!--<span class="borderrightc"></span>-->
                            <div class="product-meta">
                            	@if(!empty($dataArr->ownerName))
                                <div class="author">
                                    <p><span class="fa fa-user"></span> &nbsp;&nbsp;<a href='#'>{{ $dataArr->ownerName }}</a></p>
                                </div>
                                @endif
								@if(!empty($dataArr->address1))
                                <div class="love-comments">
                                    <p><span class="fa fa-mobile"></span> &nbsp;&nbsp;{{ $dataArr->vMobile }}</p>
                                </div>
								@endif
                                <div class="product-tags">
                                	@if(!empty($dataArr->address1))
                                    <span class="fa fa-map-marker"></span>
                                    &nbsp;&nbsp;@if(!empty($dataArr->address1)){{ $dataArr->address1." ".$dataArr->address2 ." , ".$dataArr->city." - ".$dataArr->pinCode }} @endif
                                   @endif
                                </div>

                                <div class="rating product--rating">
                                    <div class="modules__content text-center">
									<div class="social social--color--filled">
										<ul>
											@if(!empty($dataArr->facebookLink))
											<li>
												<a href="{{ $dataArr->facebookLink }}" target="_blank"><span class="fa fa-facebook"></span></a>
												
											</li>
											@endif
											@if(!empty($dataArr->twitterLinks))
											<li><a href="{{ $dataArr->twitterLinks }}" target="_blank"><span class="fa fa-twitter"></span></a>
												
											</li>
											@endif
											@if(!empty($dataArr->googlePlusLinks))
											<li>
												
												<a href="{{ $dataArr->googlePlusLinks }}" target="_blank"><span class="fa fa-google-plus"></span></a>
												
											</li>
											@endif
											@if(!empty($dataArr->linkedInLinks))
											<li>
												<a href="{{ $dataArr->linkedInLinks }}" target="_blank"><span class="fa fa-linkedin"></span></a>
										        </li>
										        @endif
										        @if(!empty($dataArr->instagramLinks))
											<li>
												<a href="{{ $dataArr->instagramLinks }}" target="_blank"><span class="fa fa-instagram"></span></a>
											</li>
											@endif
										</ul>
									</div>
								</div>
                                </div>
                            </div><!-- end product-meta -->

                        </div>
                    </div>
                   
                </div>
                @endforeach
					@else
					<h2>No shop Avavilable....</h2>
					@endif
            </div>
        </div>
    </section>

@stop
