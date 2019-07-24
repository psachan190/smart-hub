@extends("layout")
@section('content')
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li class="active"><a href="{{ url('offer_news') }}">Offers & News</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Offers & News</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
    
<section class="contact-area webshopback section--padding">
        <div class="container">
        <?php
					if($offerdetails != FALSE){
					  ?>
            <div class="row recompage">
            	
            	<div class="col-sm-5">
                	<img src="<?php echo url("uploadFiles/offersNews/$offerdetails->image"); ?> " class="img-responsive" />
                </div>
                <div class="col-sm-7">
                	<div class="offersnewhaed">
                	<h2><?php if(!empty($offerdetails->newsTitle))echo $offerdetails->newsTitle; ?></h2>
                    </div>
                    <div class="offersnewpre">
                	<p><?php if(!empty($offerdetails->newsDescription))echo $offerdetails->newsDescription; ?></p>
                    </div>
                    <div class="widgetngo-latest-causes__admin small-text">
									<i class="base-color lnr lnr-clock widgetngo-latest-causes__admin-icon"></i>
									<a href="#"><?php if(!empty($offerdetails->created_at))echo $offerdetails->created_at; ?></a>
								</div>
                </div>
            </div>
            <?php
					 }
					    ?>
        </div>
</section>
@stop