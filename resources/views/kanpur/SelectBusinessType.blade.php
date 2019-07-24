@include("kanpur.layout.header")

<!--================================
    START HERO AREA
=================================-->

<section class="contact-area webshopback section--padding">
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                            <div class="contact_form cardify opcityform">
                                <div class="contact_form__title">
                                    <h3>Select Your Business Type</h3>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="contact_form--wrapper">
                                         {!! Session::has('msg') ? Session::get("msg") : '' !!}
                                          @if(!empty($someerr))
                                               <p class="alert alert-danger">{{ $someerr }}</p>
                                          @endif
                                            <form action="<?php echo url("businessTypeaction"); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                                <div class="row">
                                                	<div class="col-lg-3 col-md-3 ">
                                                        <div class="custom-radio">
                                                                       <input type="hidden" name="id" id="id" value="<?php if(!empty($lastVendorID))echo $lastVendorID; ?>" />
                      <input type="hidden" name="users_id" id="users_id" value="<?php if(!empty(session()->get('knpUser_id')))echo session()->get('knpUser_id'); ?>" />
                      <input type="hidden" name="vendorEmail" id="vendorEmail" value="<?php if(!empty(session()->get('knpUser_email')))echo session()->get('knpUser_email'); ?>" />
                                                                    </div>
                                                    </div>
                                                	<div class="col-lg-3 col-md-3 ">
                                                        <div class="custom-radio">
                                                                        <input type="radio" id="opt1" class="" name="radio1" value="1" checked="checked">
                                                                        <label for="opt1"><span class="circle"></span>Goods</label>
                                                                    </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 ">
                                                        <div class="custom-radio">
                                                                        <input type="radio" id="opt2" class="" name="radio1" value="2">
                                                                        <label for="opt2"><span class="circle"></span>Services</label>
                                                                    </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 ">
                                                        <div class="custom-radio">
                                                                        <input type="radio" id="opt3" class="" name="radio1" value="3">
                                                                        <label for="opt3"><span class="circle"></span>Both</label>
                                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="sub_btn">
                                                    <button type="submit" name="submit" id="submit" class="btn btn--round btn--default">Continue</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- end /.col-md-8 -->
                                </div><!-- end /.row -->
                            </div><!-- end /.contact_form -->
                        </div>
            </div>
        </div>
</section>




<!--================================
    END FOLLOWERS FEED AREA
=================================-->
           @include("kanpur.layout.footer") 