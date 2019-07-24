@extends("layout")
@section('content')   
<section class="bgimage" id="loginSection">
	<div class="bg_image_holder">
		<img src="{{ asset('images/indexback.png') }}" alt="marketplace in kanpur">
	</div>
	<div class="hero-content hero-content1 content_above">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-7"></div>
				<div class="col-md-4">
					<form method="POST" action="{{ url('action/login') }}">
						{{ csrf_field() }}
						<div class="cardify login minummargin">
							<div class="login--header">
								<h3>Welcome Back</h3>
								<?php
									if(isset($_GET['duplicate'])){
									?>
								<p style="color:red;"><strong>Your Account is already Activated...</strong></p>
								<?php
									}
									?>
									@if(isset($_GET['loginfirst']))
                                                                           <div class='notice notice-warning'><strong>Please login to Continue . </strong> </div>
                                                                        @endif
								<p>Sign-in here</p>
							</div>
							<!-- end login_header -->
							<div class="login--form">
                                @if(session()->has('msg'))
                                   <?php echo session()->get('msg') ?> 
                                @endif
								<div class="form-group">
									<label> Username </label>
									<input id="email" type="text" name="user" value="{{ old('user') }}" class="text_field" placeholder="E-mail / Mobile " required autofocus>
									@if ($errors->has('user'))
									<span class="help-block">
									<strong>{{ $errors->first('user') }}</strong>
									</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<label> Password </label>
									<input id="password" type="password" name="password" required class="text_field" placeholder="Password">
									@if ($errors->has('password'))
									<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
									</span>
									@endif
								</div>
								<div class="form-group">
									<div class="custom_checkbox">
										<input type="checkbox" name="remember" id="ch2" {{ old('remember') ? 'checked' : '' }}>
										<label for="ch2"><span class="shadow_checkbox"></span><span class="label_text">Remember me</span></label>
									</div>
								</div>
								<button class="btn btn--md btn--round" type="submit">Login Now</button>
								<div class="login_assist">
									<p class="recover"><a href="https://www.kanpurize.com/reset/password" title="online shop in kanpur">Forget Password ?</a></p>
									<p class="signup">Don`t have an <a href="{{ url('kanpurize_signup') }}" title="online shopping in kanpur">account</a>?</p>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-1">
				</div>
			</div>
		</div>
	</div>
</section>
@stop