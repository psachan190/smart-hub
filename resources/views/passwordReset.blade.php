@extends("layout")
@section('content')
<section class="bgimage">
	<div class="bg_image_holder">
		<img src="https://www.youseeu.com/wp-content/uploads/2017/03/register-bg.jpg" alt="marketplace in kanpur">
	</div>
	<div class="hero-content hero-content2 content_above">
		<div class="content-wrapper">
	<div class="row">
         <div class="col-md-4 col-md-offset-4">
            <div class="minummargin panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Reset Password?</h2>
                  <p>You can reset your password here.</p>
                   @if(session()->has('msg'))
                    <?php echo session()->get('msg') ?> 
                   @endif
                  <div class="panel-body">
                    <form id="passwordResetForm" role="form" autocomplete="off" >
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input id="sendon" name="email" placeholder="email / Mobile" class=""  type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <button name="recover-submit" id="resetPwdbtn" class="btn btn-lg btn-primary btn-block"  type="button">Reset Password</button>
                      </div>
                       <div id="response"></div>
                    </form>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</div>
</section>
@stop
@section('footer') 
@parent
<script>
$(document).ready(function(e) {
  $(document).on('click','#resetPwdbtn',function(){
	$("#resetPwdbtn").html("Please Wait ...").attr('disabled',true);  
	 $("#response").html(" ");
    var sendOn = $('#sendon').val();
    if(sendOn != ""){
		 $.ajax({
		  url: "<?php echo url("reset/getUserDetails"); ?>",
		  data:{sendOn:sendOn},
		  type:"GET",
		  success:function(response){
			 $("#resetPwdbtn").html("Reset Password").attr('disabled',false);  
			 $("#response").html(response);
		  }
		});
	  }
	else{
		  $("#resetPwdbtn").html("Reset Password").attr('disabled',false);  
	     $("#response").html('<div class="notice notice-danger"><strong>Wrong, </strong> Please Enter the valid Email / Mobile Number   !!! . </div>');
	  }  
  }); 
});
</script>
@stop