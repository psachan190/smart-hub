@include("kanpur.layout.header")
<section>
        <div class="row" id="example1">
        		<div class="container">
				<div class="col-md-6"></div>
                <div class="col-md-6">
                            <div class="information_module activebody">
                                <a class="toggle_title">
                                    <h4>Profile Manage</h4>
                                </a>
                                <?php 
								 if(isset($_GET['failed'])){
								     ?>
									 <p style="color:red; padding-left:15px;"><strong>your Transaction is incomplete</strong></p>
									 <?php
								   }
                                  if(isset($_GET['success'])){
								      ?>
									 <p style="color:green; padding-left:15px;"><strong>your Transaction is complete</strong></p>
									 <?php
								   }								   
								
								?>
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                               <form id="profileManagement" name="profileManagement">
                                 <?php echo csrf_field(); ?>
                                <div class="information__set toggle_module collapse in" id="collapse2" aria-expanded="true" style="">
                                    <div class="information_wrapper form--fields">
                                         <div class="form-group">
                                           <label for="acname">Profile Name<sup>*</sup></label>
                                           <input type="text" id="acname" name="profileName" class="text_field" placeholder="Profile Name" />
                                        </div>
                                         <div class="form-group">
                                            <label for="country">Profile Type<sup>*</sup></label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="profileType" id="profileType" class="text_field">
                                                    <option value="0">Select Profile Type</option>
                                                    <option value="1">Business Owner</option>
                                                    <option value="2">Business Organization</option>
                                                    <option value="3">Social/Political Profile</option>
                                                    <option value="4">Social/Political Organisation</option>
                                <div class="information__set toggle_module collapse in" id="collapse2" aria-expanded="true" style="">
                                    <div class="information_wrapper form--fields">
                                            <label for="country">Profile Type<sup>*</sup></label>
                                            <div class="select-wrap select-wrap2">
                                                    <option value="VIPs">VIPs</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="country">Select Your Category<sup>*</sup></label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="profileCategory" id="profileCategory" class="text_field">
                                                    <option value="0">First You Select Profile Type</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>
                                        <div class="form-group" id="pricePlanTextBox">
                                            
                                        </div>
                                     <div class="row">
                                     	<div class="col-sm-12">
                                        <div class="custom_checkbox form-check">
                                         <input type="checkbox" name="termandcondition" id="Activeprofile" value="ok">
                             <label for="Activeprofile">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp; term and condition</span>&nbsp;&nbsp;
                              <a href="{{ url('Profile_Type') }}" target="_blank"> Policy</a>
                             </label>
                             
                          </div>
                          				</div>
                                     </div>
                                     <div id="result"></div>
                                      <div class="row">
                                     	<div class="col-sm-12">
                                        	<button class="btn btn--icon btn-default btn--round btn-secondary" type="submit" name="submit" id="submit">Save</button>
                                        </div>
                                      </div>
                                    </div><!-- end /.information_wrapper -->
                                </div>
                               </form> 
                                    </div><!-- end /.information_wrapper -->
                                </div><!-- end /.information__set -->
                            </div><!-- end /.information_module -->
                        </div>
                </div>
        </div>
</section>
<form action="<?php echo url("payforCreateProfile"); ?>" method="get" style="display:none;">
 <input type="profileLastID" id="profileLastID" name="profileLastID" readonly="readonly" />
 <button type="submit" id="sendData" name="sendData">Save Data</button>
</form>
@include("kanpur.layout.footer")
<script>
$(document).ready(function(e) {
 $(document).on('submit',"#profileManagement",(function(e) {
 	  $('#result').html(" ");
	 $('#submit').html('<i class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 $("#signupResult").html(" ");
	 e.preventDefault();
      $.ajax({
      url: base_url+"/insertProfileData",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		$('#submit').html('Save').attr('disabled',false); 
		 //$('#result').html(data);
		var parsedJson = jQuery.parseJSON(data);
	    var errorString = '';
		if(parsedJson.vStatus ==400){
		  $.each(parsedJson.error, function(key,value) {
		   errorString += "<p style='color:red;'>" + value + "</p>";
		  });
		  $('#result').html(errorString);
		 }
		 else if(parsedJson.vStatus == 100) {
			 $('#result').html(parsedJson.msg);
		  }
		 else if(parsedJson.vStatus == 700){
		    $("#profileLastID").val(parsedJson.lastProfileID);
			$('#result').html(parsedJson.msg);
			alert("Thank you for creating your Profile . Payment will be completed after initial verification . We will contact you Shortly");
			//$("#sendData").click();
		  } 
	   }	
     });
  }));
});
<!---Kanpurize create Profile script End-->
</script>