@include("kanpur.layout.indexheader")
<style>
.be-detail-header { border-bottom: 1px solid #edeff2; margin-bottom: 50px; }
</style>
<div class="container be-detail-container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <br>
            <img src="https://cdn2.iconfinder.com/data/icons/luchesa-part-3/128/SMS-512.png" class="img-responsive" style="width:200px; height:200px;margin:0 auto;"><br>
            
            <h1 class="text-center">Verify your mobile number</h1><br>
            <p class="lead" style="align:center"></p><p> Thanks for giving your details. An OTP has been sent to your Mobile Number. Please enter the 6 digit OTP below for Successful Registration</p>  <p></p>
        <br>
            <form id="veryfyotp">
             <?php echo csrf_field(); ?>
                <div class="row">                    
                <div class="form-group col-sm-8">
                	 <span style="color:red;"></span>   
                     <input type="hidden" class="form-control" name="otpcopy" id="otpcopy" required="required" value="<?php if(!empty($result->otp))echo $result->otp; ?>"  > 
                     <input type="hidden" class="form-control" name="userID" id="userID" required="required" value="<?php if(!empty($userID))echo $userID; ?>"  >                 
                     <input type="text" class="form-control" name="otp" placeholder="Enter your OTP number" required="">
                     <div id="response"></div>
                </div>
                <button type="submit" id="userotpVerify" name="userotpVerify" class="btn btn-primary  pull-right col-sm-3">Verify</button>
                </div>
            </form>
        <br><br>
        </div>
    </div>        
</div>
@include("kanpur.layout.indexfooter")