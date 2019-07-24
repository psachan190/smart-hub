@extends("layout")
@section('content')
<section class="contact-area webshopback section--padding">
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                            <div class="contact_form cardify opcityform">
                                <div class="contact_form__title">
                                    <h3>Create your Shop on Kanpurize</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="contact_form--wrapper">
                                        	 <ul>
                                                @foreach($errors->all() as $error)
                                                    <li class='' style='color:red;'>{{$error}}</li> 
                                                @endforeach
                                                @if(!empty($someerr))
                                                    <p class="alert alert-danger">{{ $someerr}}</p>
                                                @endif
                                                <?php 
												 if(isset($_GET['notOk'])){
												     ?>
													  <p class="alert alert-danger">Please Accept all term and condition .</p>
													 <?php
												   }
												?>
                                             </ul>
                                            <form action="<?php echo url("vendor/registrationShopAction"); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                                <div class="row">
                                                	<div class="col-lg-12 col-md-12 ">
                            <div class="form-group">
                                <input type="hidden" name="users_id" id="users_id" placeholder="Shop Name" value="@if(!empty($user->id)){{ $user->id }}@endif" readonly="readonly" />
                            </div>
                        </div>
                                                    <div class="col-lg-12 col-md-12 ">
                                                        <div class="form-group">
                                                            <label>Shop Name&nbsp;<span class="prafontanswerstar">*</span></label>
                                                            <input type="text" name="vName" id="vName"  placeholder="Shop Name"  value="{{ old('vName') }}" required="required" style="text-transform:uppercase" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12" style="display:;">
                                                        <div class="form-group">
                                                             <input type="hidden" name="vEmail" id="vEmail" placeholder="Email address" value="@if(!empty($user->email)){{ $user->email }}@endif " readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                           <label>Mobile Number&nbsp;<span class="prafontanswerstar">*</span>&nbsp;<span id="mobileErr"></span></label>
                                                            <input type="text" name="vMobile" id="vMobile"  placeholder="Mobile Number" value="{{ old('vMobile') }}" required="required" style="text-transform:uppercase" maxlength="10" onkeyup="mobileNumberValidate(this.value,'Mobile Number','mobileErr','submit')"   />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="custom_checkbox form-check">
                                                          <input type="checkbox" name="termAndCondition" id="termAndCondition" value="ok" />&nbsp;
                             <label for="termAndCondition">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;I accept all Term and Condition &nbsp;&nbsp;&nbsp;<a href="{{ url('kanpurize_sellerpolicy')}}" target="_blank">Seller Policy</a></span>
                             </label>
                          </div>
                                                    </div>
                                                </div>
                                                <div class="sub_btn">
                                                    <button type="submit" name="submit" id="submit" class="btn btn--round btn--default">Send Request</button>
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
@section('footer')
 @parent
<script src="<?php echo url("validationJS/formFieldValidation.js"); ?>"></script>
@stop
