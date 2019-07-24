@include("kanpur.layout.indexheader")
 <style type="text/css">
        body{font-family: Arial; font-size: 10pt; }
        #password_strength , #confirmPwdError , #mobileError ,#nameErr , #emailErr {font-weight: bold; }
    </style>
    <section class="bgimage">
    <div class="bg_image_holder">
        <img src="{{ asset('images/indexback.png') }}" alt="Marketplace in Kanpur" />
    </div>
    <!-- start hero-content -->
    <div class="hero-content hero-content1 content_above">
        <!-- start .contact_wrapper -->
        <div class="content-wrapper">
            <!-- start .container -->
            <div class="container">
                <!-- start row -->
                <div class="row webshopkanpur">
                 <div class="col-md-5">
                   <div class="content_block1  statement_info_card signback">
                     <div class="content_area">
                        <h1 class="content_area--title">Marketplace <span class="highlight kanpkz">in Kanpur</span></h1>
                        <p>Kanpurize- <a class="kanpur_market_place" href="{{ asset('kanpur_market_place') }}" title="Marketplace in Kanpur">The Spirit of Kanpur is first of its kind online platform for Kanpurites</a> to do everything they want from socializing to shopping, from Business to Hangout, from advertising to managing accounts, from sharing opinions to offering a helping hand to needy and everything you can think of.<br />
                        Kanpurize Feature : <a title="Web development in kanpur" class="kanpur_market_place" href=" {{ url('web_development_kanpur') }}" >Web Develoment, Web Design, Live Event, Business Promotion, Online Advertisement, Business Software</a>, Digital Marketing etc.</p>
                    </div>
                    </div>
                 </div>
                 <div class="col-md-7">
                    <form id="usersignUpForm" name="usersignUpForm">
                    {{ csrf_field() }}
                        <div class="cardify signup_form">
                            <div class="login--header">
                                <h3>Create Your Account</h3>
                                <ul>
                      @foreach($errors->all() as $error)
                       <li class='errorsms'>{{ $error }}</li>  
                      @endforeach
                    </ul>
                                  @if(!empty($someerr))
                                 <p class="">{{ $someerr }}</p>
                                 @endif
                                 {!! Session::has('msg') ? Session::get("msg") : '' !!}
                            </div><!-- end .login_header -->

                            <div class="login--form">
                                <div class="form-group">
                                    <label><span class="prafontanswerstar">*</span> Your Name</label>
                                    <input name="name" id="name" type="text" class="text_field textName" value="{{ old('name') }}" placeholder="Enter your Name" onkeyup="checkCharacter(this.value,'Name','nameErr','submit')" required="required" />
                                      <span id="nameErr"></span>
                                </div>
                                <label><span class="prafontanswerstar">*</span> gender</label>
                                <div class="custom-radio">
                                  <input type="radio" id="addresType2" class="addressType" name="gender" value="0" checked="checked">
                                         <label for="addresType2"><span class="circle"></span>Male</label>&nbsp;&nbsp;
                                      <input type="radio" id="addresType3" class="addressType" name="gender" value="1">
                                       <label for="addresType3"><span class="circle"></span>Female</label>
                                </div>
                                <div class="form-group">
                                    <label><span class="prafontanswerstar">*</span> Email Address</label>
                                    <input name="email" id="email" type="email" class="text_field" placeholder="Enter your email address" value="{{ old('email') }}" onkeyup="emailValidate(this.value,'Email id','emailErr','submit')" required="required"  />
                                    <span id="emailErr"></span>
                                </div>
                                <div class="form-group">
                                    <label><span class="prafontanswerstar">*</span> Password</label>
                                    <input name="password" id="password" type="password" class="text_field" placeholder="Enter your password..." value="{{ old('password') }}" onkeyup="CheckPasswordStrength()"  required="required" />
                                     <span id="password_strength"></span>
                                </div>
                                <div class="form-group">
                                    <label><span class="prafontanswerstar">*</span> Confirm Password</label>
                                    <input name="confirmPassword" id="confirmPassword" type="password" class="text_field" placeholder="Confirm password" value="{{ old('confirmPassword') }}" onkeyup="passowrdMatch('Password Does Not match')" required="required"  />
                                    <span id="confirmPwdError"></span>

                                </div>
                                 <div class="form-group">
                                    <label><span class="prafontanswerstar">*</span> Mobile No.</label>
                                    <input name="mobile" id="mobile" type="tel" class="text_field" placeholder="Enter your mobile no" value="{{ old('mobile') }}" maxlength="10" onkeyup="mobileNumberValidate(this.value,'Mobile','mobileError','submit')"  required="required"  />
                                    <span id="mobileError" style="color:#F00;"></span>
                                </div>
                                 <div class="form-group">
                                    <label><span class="prafontanswerstar">*</span> PinCode</label>
                                    <input name="pincode" id="pincode" maxlength="6" onblur="pincodeValidateBackend(this.value,'Pin Code','pincodeErr','submit')" type="number" class="text_field" placeholder="Enter your pincode" value="{{ old('pincode') }}" required="required"  />
                                    <span id="pincodeErr" style="color:#F00;"></span>
                                </div>
                                <span id="signupResult"></span>
                                <button class="btn btn--md btn--round register_btn" type="submit" name="submit" id="submit">Register Now</button>
                                <div class="login_assist">
                                    <p>Already have an account? <a href="{{ url('login') }}" title="best kanpur shop">Login</a></p>
                                </div>
                            </div><!-- end .login--form -->
                        </div><!-- end .cardify -->
                    </form>
                </div>
            </div><!-- end /.row -->
            </div><!-- end /.container -->
        </div><!-- end .contact_wrapper -->
    </div><!-- end hero-content -->

</section>
  <!------section End---->
@include("kanpur.layout.indexfooter")
