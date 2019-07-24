@extends("layout")
@section('content')
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
            	
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li class="active"><a href="#">All Offers & News</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">All Offers & News</h1>
                </div>
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
    <section class="normal-padding">
    	<div class="container-fluid">
         <?php
			if($offerNewsList != FALSE){
			?>
              <div class="row">
              <?php
				foreach($offerNewsList as $listArr){
				$offerID = base64_encode($listArr->vendordetails_id);
				$offerstitle = str_replace(" ","_",$listArr->newsTitle);
				$image = $listArr->image;
				?>
            	<div class="col-md-6 padding_div" style="margin-bottom:10px;">
                	<div class="viewshop product product--list">
                        <div class="product__thumbnail">
                                <img src='{{ url("uploadFiles/offersNews/$image") }}' alt='{{ $offerstitle }}'>   
                            <div class="prod_btn">
                                <div class="prod_btn__wrap">
                                    <a href='{{ url("kanpurize_Shop_offer/$offerID") }}' class="transparent btn--sm btn--round" title='{{$offerstitle }}'>More Info</a>
                                </div>
                            </div><!-- end /.prod_btn -->
                        </div><!-- end /.product__thumbnail -->

                        <div class="product__details">
                            <div class="product-desc product-desc_offer">
                                <a href='{{ url("kanpurize_Shop_offer/$offerID") }}' class="product_title"><h4><?php if(!empty($listArr->newsTitle))echo $listArr->newsTitle; ?></h4></a>
                                <p class="viewshopdetails">
									<?php if(!empty($listArr->newsTitle))echo $listArr->newsTitle; ?>
								</p>
                            </div><!-- end /.product-desc -->
							<!--<span class="borderrightc"></span>-->
                        </div>
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
    </section>

@stop
