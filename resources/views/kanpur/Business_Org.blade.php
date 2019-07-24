@include("kanpur.layout.header")
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li class="active"><a href="#">Business Organisation</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Business Organisation</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
   <section class="term_condition_area">
        <div class="container shortcode_modules">
        	<div class="row">
            	<div class="modules__title">
                            <h3>Business Organisation</h3>
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
                                                <span>Type 1(ideal for business organisations with employees strength upto 50 )</span> <i class="lnr lnr-chevron-down indicator"></i></a>
                                        </h4>
                                    </div>

                                    <div id="collapse1" role="tabpanel" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                           <ul class="profileultag">
                    	<li><span class="lnr lnr-pointer-right"></span> Standard profile + organisational tree.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Upload upto 30 pics.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Create events after review.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Unlimited Keywords.</li>
                        <li><span class="lnr lnr-pointer-right"></span> 1 Admin With Email.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Single Parenting.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Prices (Rs. Per annum):12000.</li>
                    </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel accordion__single">
                                    <div class="single_acco_title">
                                        <h4>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed" aria-expanded="false">
                                                <span>Type 2(ideal for business organisations with employees strength upto 100 )</span> <i class="lnr lnr-chevron-down indicator"></i></a>
                                        </h4>
                                    </div>

                                    <div id="collapse2" role="tabpanel" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                           <ul class="profileultag">
                    	<li><span class="lnr lnr-pointer-right"></span> Standard profile + organisational tree.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Upload upto 50 pics.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Create events after review.</li>
                         <li><span class="lnr lnr-pointer-right"></span> Unlimited Keywords.</li>
                         <li><span class="lnr lnr-pointer-right"></span> 2 Admin With Email.</li>
                        <li><span class="lnr lnr-pointer-right"></span>  Dual Parenting.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Prices (Rs. Per annum):18000.</li>
                    </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel accordion__single">
                                    <div class="single_acco_title">
                                        <h4>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed" aria-expanded="false">
                                                <span>Type 3(ideal for business organisations with employees strength upto 200 )</span> <i class="lnr lnr-chevron-down indicator"></i></a>
                                        </h4>
                                    </div>

                                    <div id="collapse3" role="tabpanel" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                           <ul class="profileultag">
                    	<li><span class="lnr lnr-pointer-right"></span> Standard profile + organisational tree.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Upload upto 100 pics.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Create events after review.</li>
                         <li><span class="lnr lnr-pointer-right"></span> Unlimited Keywords.</li>
                          <li><span class="lnr lnr-pointer-right"></span> 3 Admin With Email.</li>
                         <li><span class="lnr lnr-pointer-right"></span> Triple Parenting.</li>
                          <li><span class="lnr lnr-pointer-right"></span> Prices (Rs. Per annum):25000.</li>
                    </ul>
                                        </div>
                                    </div>
                                </div>
                    </div>
                  
                     <div class="">
                                    <a href="#" class="btn btn--md btn--round register_btn">submit</a>
                                </div>
                    </div>
                    </div>
               </div>
               
        </div>
    </section>
@include("kanpur.layout.footer")