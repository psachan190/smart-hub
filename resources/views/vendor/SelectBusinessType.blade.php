@extends('layout')
@section('content')
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
                                            <form action="<?php echo url("vendor/business_category"); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                                <div class="row">
                                                	<div class="col-lg-3 col-md-3 ">
                                                        <div class="custom-radio">
                                                         <input type="hidden" name="shop_username" id="shop_username" value="<?php if(!empty($vendorData->username))echo $vendorData->username; ?>" />
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
                                                <hr />
                                                
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
@stop

