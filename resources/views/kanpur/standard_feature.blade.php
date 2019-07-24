@include("kanpur.layout.header")
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li class="active"><a href="#">Standard Profile</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Standard Profile</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
   <section class="term_condition_area">
        <div class="container shortcode_modules">
        	<div class="row">
            	<div class="modules__title">
                            <h3>Standard Profile</h3>
                        </div>
            </div>
            <div class="row">
                  <div class="col-md-4">
                   <div class="modules__content1">
                  <img src="{{ asset('images/profiletype.jpg') }}" class="img-rounded img-responsive">
                  </div>
                  </div>
                  <div class="col-md-8">
                   <div class="modules__content1">
                  <ul class="profileultag">
                    	<li><span class="lnr lnr-pointer-right"></span> A social web profile with facilities like adding friend from kanpur, sharing and uploading photos, direct messaging with the friends added etc.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Access to market place and live section.</li>
                        <li><span class="lnr lnr-pointer-right"></span> View order and receive products from market place.</li>
                         <li><span class="lnr lnr-pointer-right"></span> Give rating and reviews about your shopping.</li>
                          <li><span class="lnr lnr-pointer-right"></span> Sharing marketplace link to FB and Whatsapp.</li>
                           <li><span class="lnr lnr-pointer-right"></span> No Advertisement posting policy.</li>
                    </ul>
                     <div class="">
                                    <a href="#" class="btn btn--md btn--round register_btn">submit</a>
                                </div>
                    </div>
                    </div>
               </div>
               
        </div>
    </section>
@include("kanpur.layout.footer")