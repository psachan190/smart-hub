@include("kanpur.layout.header")
<!--================================
    START HERO AREA
=================================-->
<section class="contact-area webshopback section--padding">
        <div class="container">
            <div class="row" id="pageBlock">
               <div class="col-md-12">
                            <div class="contact_form cardify opcityform">
                                <div class="contact_form__title">
                                    <h3>Verify Your Mobile Number</h3>
                                    <h4>Enter Your 6 Digit OTP Number</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="contact_form--wrapper">
                                         {!! Session::has('msg') ? Session::get("msg") : '' !!}
                                            <form name="categoryForm" action="<?php echo url("selectBusinesstype"); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                                <div class="row">
                                                  <input type="hidden" name="shopID" id="shopID" value="<?php if(!empty($vendorData->id))echo $vendorData->id; ?>" required="required" readonly="readonly" /> 
                                                   <input type="hidden" name="mobileNumber" id="mobileNumber" value="<?php if(!empty($vendorData->vMobile))echo $vendorData->vMobile; ?>" required="required" readonly="readonly" /> 
                                                  <input type="hidden" name="otp" id="otp" value="<?php if(!empty($vendorData->otp))echo $vendorData->otp; ?>"  /> 
                                                   <input type="text" name="otpvalue" id="otpvalue" required="required" placeholder="Enter your 6 digit Code" />
                                                   <button type="button" name="otpMatch" id="otpMatch" class="btn btn-md btn--round otptopmargin">Verify OTP </button>
                                                   <button type="button" name="resendOtp" id="resendOtp" class="btn btn-md btn--round otptopmargin">Resend OTP</button>
                                                   <button style="display:none;" type="submit" name="submit" id="formsubmit" class="btn btn-md btn--round otptopmargin">otp match </button>
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
<script>
$(document).ready(function(e) {
  $(document).on('click','#otpMatch',function(){
    var otpDatabase = $('#otp').val();
	var otpUsers = $("#otpvalue").val();
	if(otpDatabase != otpUsers){
	    alert("OTP is not match");
	  }
	else{
	    $("#formsubmit").click();
	  }  
  });    
});
</script>  
<script>
$(document).ready(function(e) {
  $(document).on('click','#resendOtp',function(){
	$('#resendOtp').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
    var shopID = $("#shopID").val();//alert(shopID);mobileNumber
	 var mobileNumber = $("#mobileNumber").val();//alert(shopID);mobileNumber
    if(shopID !=" "){
         $.ajax({
          url: base_url +"/resendOTP",
          type:"GET",
          data:{shopID:shopID,mobileNumber:mobileNumber},
          success: function(data){
		 $('#resendOtp').html('Resend Otp').attr('disabled',false);
           $('#pageBlock').load(document.URL + ' #pageBlock');
          }
       });
      }  
  });
});
</script>
 
   
