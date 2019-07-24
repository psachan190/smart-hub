@extends("layout")
@section('content')
    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="job_hero_area bgimage">
        <div class="bg_image_holder">
            <img src="{{ asset('images/back/carrer.jpg') }}" alt="career in kanpur" title="career in kanpur">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="job_hero_content">
                        <h1>Make your <span class="highlight">Career With Us</span></h1>
                    </div><!-- end /.job_hero_content -->
                </div><!-- end /.col-md-8 -->
            </div><!-- end /.row -->
        </div>
   </section>
   <section class="term_condition_area">
        <div class="container shortcode_modules">
        	<div class="row">
            	<div class="modules__title">
                            <h3>Carrer With Us</h3>
                        </div>
            </div>
            <div class="row">
            	<div class="carrerparagraf">
                   <p>Kanpurize- The Spirit of Kanpur is first of its kind online platform for Kanpurize to do everything they want from socializing to shopping, from Business to Hangout, from advertising to managing accounts, from sharing opinions to offering a helping hand to needy and everything you can think of.</p>       
                 </div>
            </div>
            <div class="row shortcode_modules">
            	<div class="col-sm-8">
                        <div class="modules__content">
                        	<div class="row login--form careerborder">
                        	<form>
                            	<div class="form-group carrerform">
                                 <label>Name</label>
                                 <input type="text" name="name" placeholder="Enter Name" />
                                </div>
                                <div class="form-group carrerform">
                                 <label>Email Id</label>
                                 <input type="text" name="name" placeholder="Email Id" />
                                </div>
                                 <div class="form-group carrerform">
                                 <label>Contact No </label>
                                 <input type="number" name="number" placeholder="Contact No" />
                                </div>
                                 <div class="form-group carrerform">
                                 <label>Upload Your CV</label>
                                <input type="file" name="file"  />
                                </div>
                                <div class="form-group carrerform">
                                <a href="#" class="btn btn--round btn--md ">Submit </a>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                  <div class="col-sm-4">
                  <img src='{{ asset("images/webshop/carrer.png") }} ' class="img-responsive" alt="career in kanpur" title="career in kanpur" />
                  </div>
               </div>
        </div>
    </section>
 @stop