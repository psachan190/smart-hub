@extend("layout")
@section('content')
    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li class="active"><a href="#">Login</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Login</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
    <!--================================
        END BREADCRUMB AREA
    =================================-->

    <!--================================
            START LOGIN AREA
    =================================-->
    <section class="login_area section--padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form method="POST" action="{{ url('action/login') }}">
                     {{ csrf_field() }}
                        <div class="cardify login">
                            <div class="login--header">
                                <h3>Welcome Back</h3>
                                <p>You can sign in with your username</p>
                            </div><!-- end .login_header -->

                            <div class="login--form">
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="user_name">Username</label>
                                    <input id="user" type="text" name="user" value="{{ old('user') }}" class="text_field" placeholder="Enter your username..." required autofocus>
                                     @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="pass">Password</label>
                                    <input id="password" type="password" name="password" required class="text_field" placeholder="Enter your password...">
                                     @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="form-group">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="ch2"><span class="shadow_checkbox"></span><span class="label_text">Remember me</span></label>
                                    </div>
                                </div>

                                <button class="btn btn--md btn--round" type="submit">Login Now</button>

                                <div class="login_assist">
                                    <p class="recover"><a href="{{ route('password.request') }}">Forget Password</a></p>
                                    <p class="signup">Don`t have an <a href="{{ route('kanpurize_signup') }}">account</a>?</p>
                                </div>
                            </div><!-- end .login--form -->
                        </div><!-- end .cardify -->
                    </form>
                </div><!-- end .col-md-6 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section>
    <!--================================
            END LOGIN AREA
    =================================-->

@stop
