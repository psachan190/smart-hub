<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kanpurize | Admin |login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ url('adminback/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ url('adminback/plugins/iCheck/square/blue.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Kanpurize</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
       <?php 
		  foreach($errors->all() as $error){
			echo "<p class='' style='color:red;'>".$error."</p>";  
		  }
		?>
      @if(session()->has('msg'))
        <?php echo session()->get('msg') ?> 
      @endif
      <form method="post" action="<?php echo url('admin/loginCon'); ?>">
         <?php echo csrf_field(); ?>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Email / Mobile" name="username" required="required" value="{{ old('username') }}" />
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required="required" />
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
      </div>
      <p class="mb-1">
        <a href="<?php echo url("reset/password"); ?>">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="#" class="text-center">Register a new membership</a>
      </p>
    </div>
  </div>
</div>
<script src="{{ url('adminback/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('adminback/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('adminback/plugins/iCheck/icheck.min.js') }}"></script>
</body>
</html>
