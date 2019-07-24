@include("kanpur.layout.header")
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li class="active"><a href="#">Business Owner</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Business Owner</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
   <section class="term_condition_area">
        <div class="container shortcode_modules">
        	<div class="row">
            	<div class="modules__title">
                            <h3>Business Owner</h3>
                        </div>
            </div>
            <div class="row">
                  <div class="col-md-4">
                   <div class="modules__content1">
                  <img src="{{ asset('images/profiletype.jpg') }}" class="img-rounded img-responsive">
                  </div>
                  </div>
                  <div class="col-md-8">
                   <div class="modules__content2">
                   <div class="panel-group accordion" role="tablist">
                              <div class="panel accordion__single active">
                                    <div class="single_acco_title">
                                        <h4>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="collapsed" aria-expanded="false">
                                                <span>Type 1 (ideal for business with Revenue upto 25 lakhs)</span> <i class="lnr lnr-chevron-down indicator"></i></a>
                                        </h4>
                                    </div>

                                    <div id="collapse1" role="tabpanel" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                           <ul class="profileultag">
                    	<li><span class="lnr lnr-pointer-right"></span> Standard profile features + Listing as service providers(if).</li>
                        <li><span class="lnr lnr-pointer-right"></span> Prices (Rs. Per annum):5000.</li>
                    </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel accordion__single">
                                    <div class="single_acco_title">
                                        <h4>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed" aria-expanded="false">
                                                <span>Type 2 (ideal for business with revenue between 25 lakhs-1 cr)</span> <i class="lnr lnr-chevron-down indicator"></i></a>
                                        </h4>
                                    </div>

                                    <div id="collapse2" role="tabpanel" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                           <ul class="profileultag">
                    	<li><span class="lnr lnr-pointer-right"></span> Standard profile features + Listing as service providers(if).</li>
                        <li><span class="lnr lnr-pointer-right"></span> Additionally 10 Ads/ Month to be shown in market place.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Upload upto 10 pics relating to business activity to be shown in social web.</li>
                         <li><span class="lnr lnr-pointer-right"></span> Prices (Rs. Per annum):8000.</li>
                    </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel accordion__single">
                                    <div class="single_acco_title">
                                        <h4>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed" aria-expanded="false">
                                                <span>Type 3(ideal for business with revenue morethan 1 cr)</span> <i class="lnr lnr-chevron-down indicator"></i></a>
                                        </h4>
                                    </div>

                                    <div id="collapse3" role="tabpanel" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                           <ul class="profileultag">
                    	<li><span class="lnr lnr-pointer-right"></span> Standard profile features + Listing as service providers(if).</li>
                        <li><span class="lnr lnr-pointer-right"></span> Additionally 20 Ads/ Month to be shown in market place.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Upload upto 20 pics relating to business activity to be shown in social web.</li>
                         <li><span class="lnr lnr-pointer-right"></span> Prices (Rs. Per annum):12000.</li>
                    </ul>
                                        </div>
                                    </div>
                                </div>
                    </div>
                  
                     <div class="">
                                    <a href="{{ url('kanpurizeCreateProfile') }}" class="btn btn--md btn--round register_btn">submit</a>
                                </div>
                    </div>
                    </div>
               </div>
               
        </div>
    </section>
@include("kanpur.layout.footer")