@include("kanpur.layout.header")
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li class="active"><a href="#">Social/Political Profile</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Social/Political Profile</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
   <section class="term_condition_area">
        <div class="container shortcode_modules">
        	<div class="row">
            	<div class="modules__title">
                            <h3>Social/Political Profile</h3>
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
                                                <span>Figure (ideal for personalitites having upto 250 followers)</span> <i class="lnr lnr-chevron-down indicator"></i></a>
                                        </h4>
                                    </div>

                                    <div id="collapse1" role="tabpanel" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                           <ul class="profileultag">
                    	<li><span class="lnr lnr-pointer-right"></span> Daily post limit upto 5.</li>
                        <li><span class="lnr lnr-pointer-right"></span> 5 pics per post.</li>
                        <li><span class="lnr lnr-pointer-right"></span> 1 Video Lesser than 15 MB.</li>
                        <li><span class="lnr lnr-pointer-right"></span> Video time limit 24 hour.</li>
                    </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel accordion__single">
                                    <div class="single_acco_title">
                                        <h4>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed" aria-expanded="false">
                                                <span>Icon (ideal for personalitites having upto 500 followers)</span> <i class="lnr lnr-chevron-down indicator"></i></a>
                                        </h4>
                                    </div>

                                    <div id="collapse2" role="tabpanel" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                           <ul class="profileultag">
                    	<li><span class="lnr lnr-pointer-right"></span> Daily post limit upto 10.</li>
                        <li><span class="lnr lnr-pointer-right"></span> 10 pics per post.</li>
                        <li><span class="lnr lnr-pointer-right"></span> 2 Video each Lesser than 15 MB.</li>
                         <li><span class="lnr lnr-pointer-right"></span> Video time limit 24 hour.</li>
                    </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel accordion__single">
                                    <div class="single_acco_title">
                                        <h4>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed" aria-expanded="false">
                                                <span>Leader (ideal for personalitites having 500+ followers)</span> <i class="lnr lnr-chevron-down indicator"></i></a>
                                        </h4>
                                    </div>

                                    <div id="collapse3" role="tabpanel" class="panel-collapse collapse" aria-expanded="false">
                                        <div class="panel-body">
                                           <ul class="profileultag">
                    	<li><span class="lnr lnr-pointer-right"></span> Daily post limit upto 15.</li>
                        <li><span class="lnr lnr-pointer-right"></span> 10 pics per post.</li>
                        <li><span class="lnr lnr-pointer-right"></span> 3 Video each Lesser than 15 MB.</li>
                         <li><span class="lnr lnr-pointer-right"></span> Video time limit 24 hour.</li>
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