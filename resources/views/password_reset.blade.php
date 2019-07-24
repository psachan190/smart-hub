@extends("layout")
@section('content')
<section class="bgimage">
	<div class="bg_image_holder">
		<img src="https://www.youseeu.com/wp-content/uploads/2017/03/register-bg.jpg" alt="marketplace in kanpur">
	</div>
	<div class="hero-content hero-content2 content_above">
		<div class="content-wrapper">
	<div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-4">
		<div class="minummargin panel panel-default">
                 @if(session()->has('msg'))
                    <?php echo session()->get('msg') ?> 
                 @endif
                 <?php 
		  foreach($errors->all() as $error){
			echo "<li class='' style='color:red;'>".$error."</li>";  
		  }
		  ?>
                    <!--Form with header-->

                    <form action="<?php echo url('users/reset_Password'); ?>" method="post" name="resetPassword">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="token" id="token" value="<?php if(!empty($token))echo $token; ?>" />
                        <div class="panel-body">
                            <div class="normal-padding  text-center">
                                    <h2><i class="fa fa-envelope"></i> Password Reset Form</h3>
                                </div>
                                <div class="form-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="" id="emailMobile" name="emailMobile" placeholder="Email / Mobile" required>
                                </div>
                                <div class="form-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-key text-info"></i></div>
                                        </div>
                                        <input type="password" class="" id="pwd" name="password" placeholder="Password"  required />
                                </div>

                                <div class="form-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-key text-info"></i></div>
                                        </div>
                                        <input type="password" class="" id="conpassword" name="conpassword" placeholder="Confirm Password" required>
                                </div>

                                 <div class="form-group">
                                    <input  type="submit" value="Submit" class="btn btn-primary btn-block">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->
		</div>

                </div>
	</div>
</div>
</div>
</section>
@stop