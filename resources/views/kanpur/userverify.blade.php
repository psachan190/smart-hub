<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OTP Verify </title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<style>
.notice {
    padding: 15px;
    background-color: #fafafa;
    border-left: 6px solid #7f7f84;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
       -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
            box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
}
.notice-sm {
    padding: 10px;
    font-size: 80%;
}
.notice-lg {
    padding: 35px;
    font-size: large;
}
.notice-success {
    border-color: #80D651;
}
.notice-success>strong {
    color: #80D651;
}
.notice-info {
    border-color: #45ABCD;
}
.notice-info>strong {
    color: #45ABCD;
}
.notice-warning {
    border-color: #FEAF20;
}
.notice-warning>strong {
    color: #FEAF20;
}
.notice-danger {
    border-color: #d73814;
}
.notice-danger>strong {
    color: #d73814;
}
</style>
<!------ Include the above in your HEAD tag ---------->
<div class="container be-detail-container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <br>
            <img src="https://cdn2.iconfinder.com/data/icons/luchesa-part-3/128/SMS-512.png" class="img-responsive" style="width:200px; height:200px;margin:0 auto;"><br>
            
            <h1 class="text-center">Verify Your OTP </h1><br>
            <p class="lead" style="align:center"></p><p> Thanks for giving your details. An OTP has been sent to your Mobile Number. Please enter the 4 digit OTP below for Successful Registration</p>  <p></p>
        <br>
            <form id="otpform" autocomplete="off">
                <div class="row">                    
                <div class="form-group col-sm-8">
                	 <span style="color:red;"></span>                   
                     <input type="hidden" name="otpcopy" id="otpcopy" value="<?php if(!empty($users_details->otp))echo $users_details->otp; ?>" required="required" readonly="readonly" />
                     <input type="hidden" name="otpid" id="otpid" value="<?php if(!empty($users_details->id))echo $users_details->id; ?>" required="required" readonly="readonly" />
                     <input type="hidden" name="otpmob" id="otpmob" value="<?php if(!empty($users_details->mobileNumber))echo $users_details->mobileNumber; ?>" required="required" readonly="readonly" />
                     <div id="otp_response" style="margin-top:5px; margin-bottom:5px;"></div>
                     <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter your OTP " required="required" />
                        <a href="#" class="pull-right col-sm-4" id="resendotp">Resend Otp </a>
                </div>
                <button type="button" class="btn btn-primary  pull-right col-sm-3" id="otpverify">Verify</button>
                  &nbsp;
                </div>
            </form>
        <br><br>
        </div>
    </div>        
</div>
<script>
$(document).ready(function(e) {
 $(document).on('click','#otpverify',function(){
   $("otp_response").html(" ");	 
   var otpcopy = $("#otpcopy").val();
   var otp = $("#otp").val();
   var otpid = $("#otpid").val(); 
   if( otp == otpcopy ){
	    $.ajax({
		  url: "<?php echo url("actionAjaxGet/otpmatch"); ?>",
		  type: "GET",        
		  data: {otpid:otpid , otpcopy:otpcopy ,otp:otp},
		  success: function(data){
			$("#otp_response").html(data);
			if(data == 1){
			    $("#otp_response").html("<div class='notice notice-success'><strong>Wow , </strong> verification successfully . </div>");
			    setTimeout(function(){ window.location.href = "<?php echo url("/kanpurizeMarketplace"); ?>"; }, 2000);
			  }
			 else{
			    $("#otp_response").html("<div class='notice notice-danger'><strong>Un-expected ,</strong> try again . </div>");
			  } 
		   }	
		 });
	 }
   else{
	   $("#otp_response").html("<div class='notice notice-danger'><strong>Oops ,</strong> OTP did not Matched . </div>");
	 }	 
   
 });
 <!--resent otp  start-->
  $(document).on('click','#resendotp',function(){
    var otpid = $("#otpid").val();
	var otpmob = $("#otpmob").val();
	if(otpid != " " || otpmob != " "){
	    $.ajax({
		  url: "<?php echo url("actionAjaxGet/resendOTP"); ?>",
		  type: "GET",        
		  data: {otpid:otpid , otpmob:otpmob},
		  success: function(data){
			$("#otp_response").html("<div class='notice notice-success'><strong>Wow , </strong> OTP Resend Successfully .. </div>");
			setTimeout(function(){ location.reload(); }, 2000);
		   }	
		 });
	  }
	else{ $("#otp_response").html("<div class='notice notice-danger'><strong>Un-expected ,</strong> try again . </div>");  }  
	
  });
 <!--resent otp end-->
});
</script>
</body>
</html>