@extends("layout")
@section('content') 
<style>
body{font-family: Arial; }#password_strength , #confirmPwdError , #mobileError ,#nameErr , #emailErr {font-weight: bold;}#name {text-transform: capitalize;}#lname {text-transform: capitalize;}</style>
<section class="bgimage">
	<div class="bg_image_holder">
		<img src="{{ asset('cdn/images/indexback.png') }}" alt="Marketplace in Kanpur" />
	</div>
	<!-- start hero-content -->
	<div class="hero-content hero-content1 content_above">
		<!-- start .contact_wrapper -->
		<div class="content-wrapper">
			<!-- start .container -->
			<!-- start row -->
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-4">
					<div class="content_block1  statement_info_card signback minummargin">
						<div class="content_area">
							<h1 class="content_area--title">Marketplace <span class="highlight kanpkz">in Kanpur</span></h1>
							<p class="startquiz3">Kanpurize- <a class="kanpur_market_place" href="{{ url('Marketplace-in-kanpur') }}" title="Marketplace in Kanpur">The Spirit of Kanpur is first of its kind online platform for Kanpurites</a> to do everything they want from socializing to shopping, from Business to Hangout, from advertising to managing accounts, from sharing opinions to offering a helping hand to needy and everything you can think of.<br />
								Kanpurize Feature : <a title="Web development in kanpur" class="kanpur_market_place" href=" {{ url('web-development-in-kanpur') }}" >Web Develoment, Web Design, Live Event, Business Promotion, Online Advertisement, Business Software</a>, Digital Marketing etc.
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<form id="users_signUpForm" name="users_signUpForm">
						{{ csrf_field() }}
						<div class="cardify signup_form minummargin">
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
							</div>
							<div class="login--form">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label><span class="prafontanswerstar">*</span> First Name</label>
											<input name="name" id="name" type="text" class="text_field textName" value="{{ old('name') }}" placeholder="First Name" onkeyup="checkCharacter(this.value,'Name','nameErr','submit')" required="required" />
											<span id="nameErr"></span>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label><span class="prafontanswerstar">*</span> Last Name</label>
											<input name="lname" id="lname" type="text" class="text_field textName" value="{{ old('lname') }}" placeholder="Last Name" onkeyup="checkCharacter(this.value,'Last Name','nameErr','submit')" required="required" />
											<span id="nameErr"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label><span class="prafontanswerstar">*</span> Mobile No.</label>
											<input name="mobile" id="mobile" type="tel" class="text_field" placeholder="Enter your mobile no" value="{{ old('mobile') }}" maxlength="10" onkeyup="mobileNumberValidate(this.value,'Mobile','mobileError','submit')"  required="required"  />
											<span id="mobileError" style="color:#F00;"></span>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label><span class="prafontanswerstar">*</span> Email Address</label>
											<input name="email" id="email" type="email" class="text_field" placeholder="Enter your email address" value="{{ old('email') }}" onkeyup="emailValidate(this.value,'Email id','emailErr','submit')" required="required"  />
											<span id="emailErr"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label><span class="prafontanswerstar">*</span> gender</label>
											<div class="custom-radio">
												<input type="radio" id="addresType2" class="addressType" name="gender" value="M" checked="checked">
												<label for="addresType2"><span class="circle"></span>Male</label>&nbsp;&nbsp;
												<input type="radio" id="addresType3" class="addressType" name="gender" value="F">
												<label for="addresType3"><span class="circle"></span>Female</label>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label><span class="prafontanswerstar">*</span> PinCode</label>
											<input name="pincode" id="pincode" maxlength="6"  min="200000" max="299999" type="number" onblur="pincodeValidateBackend(this.value,'Pin Code','pincodevalidateErr','submit')" class="text_field" placeholder="Enter your pincode" value="{{ old('pincode') }}" required="required"  />	
											<span id="pincodevalidateErr" style="color:#F00;"></span>                                                                             
										
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label><span class="prafontanswerstar">*</span> Password</label>
											<input name="password" id="password" type="password" class="text_field" placeholder="Enter your password..." value="{{ old('password') }}" onkeyup="CheckPasswordStrength()"  required="required" />
											<span id="password_strength"></span>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label><span class="prafontanswerstar">*</span> Confirm Password</label>
											<input name="confirmPassword" id="confirmPassword" type="password" class="text_field" placeholder="Confirm password" value="{{ old('confirmPassword') }}" onkeyup="passowrdMatch('Password Does Not match')" required="required"  />
											<span id="confirmPwdError"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
									<div class="custom_checkbox">
										<input type="checkbox" name="terms" id="terms" value="1" >
										<label for="terms"><span class="shadow_checkbox"></span><span class="text_term label_text">I accept all <a href="{{url('cdn/pdf/Terms and Conditions.pdf')}}" target="_blank">term and condition</a> & <a href="{{url('cdn/pdf/Privacy Policy.pdf')}}" target="_blank">Privacy Policy</a></span></label>
									</div>
								</div>
									</div>
								</div>
								<span id="signupResultResponse"></span>
								<button class="btn btn--md btn--round register_btn" type="submit" name="submit" id="submit">Register Now</button>
								<div class="login_assist">
									<p>Already have an account? <a href="{{ url('login') }}" title="best kanpur shop">Login</a></p>
								</div>
							</div>
						</div>
					</form>
					<span id="signupResultResponse"></span>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</div>
</section>
@stop
@section('footer')
  @parent
  
  <script>$('#name').keyup(function() {
    $('b').text($(this).val());
});
$('#lname').keyup(function() {
    $('b').text($(this).val());
});
</script>
@stop