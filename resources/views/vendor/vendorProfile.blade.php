@extends("layout")
@section('content')
@include('vendor.template.marketPlacenavigation')
<?php
function String2Stars($string='',$first=0,$last=0,$rep='*'){
  $begin  = substr($string,0,$first);
  $middle = str_repeat($rep,strlen(substr($string,$first,$last)));
  $end    = substr($string,$last);
  $stars  = $begin.$middle.$end;
  return $stars;
}
?>
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href='{{ url("vendorBackup/$vendorData->id/firstDashborad") }}'>Welcome</a></li>
                            <li><a href="#">Vendor Profile</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Vendor Profile</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="normal-padding">
	<div class="container-fluid">
      <div class="row normal-padding">
       <div class="col-sm-12 col-md-6 col-lg-3">
     @include("vendor.template.vendorProfileSidebar")	
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9">
   <div class="post">
       <div class="content">
		  <div class="col-md-9">
          <style>
    .list-group span{ float:right; margin-top:-2px;}
	.list-group .socialLink{ text-decoration:none;}
	.modal-title{ font-size:16px; }
    </style>
            <input type="hidden" name="userID" id="userID" value="<?php if(!empty($vendorData->users_id)) echo $vendorData->users_id; ?>" readonly="readonly" />
            <input type="hidden" name="vendorID" id="vendorID" value="<?php if(!empty($vendorData->id)) echo $vendorData->id; ?>" readonly="readonly" />
           <div id="listGroup"> 
            <ul class="list-group" id="">
              <li class="list-group-item">
               <a href="#" id="addDetails"><strong><i style="color:#2f5ba3;" class="fa fa-plus"></i>&nbsp;Add Details</strong></a>
			  </li>
             
              <li class="list-group-item">
              <strong>Shop Name </strong>
                <br />
                <br />
               <?php
                if(!empty($vendorData->vName)){
				   ?>
				     <?php echo $vendorData->vName; ?>
                   <?php
				 }
				else{
				  ?>
                    <a href="#">blank... </a>
                     <span><a href="#" id="shopNameLinks" class="shopNameLinks"><strong>Add Links</strong></a></span> 
				  <?php
				 }   
			   ?> 
              </li>
              <li class="list-group-item">
               <strong>Owner Name </strong>
                <br />
                <br />
               <?php
                if(!empty($vendor_profile->ownerName)){
				    echo $vendor_profile->ownerName;
				 }
				else{
				  ?>
                    <a href="#">blank... </a>
				  <?php
				 }   
			   ?> 
              </li>
              <li class="list-group-item">
               <strong>About Business </strong>
                <br />
                <br />
               <?php
                if(!empty($vendor_profile->aboutBusiness)){
				    echo $vendor_profile->aboutBusiness;
				 }
				else{
				  ?>
                    <a href="#"><strong>N/A</strong></a>
                  <?php
				 }   
			   ?> 
              </li>
              <li class="list-group-item">
             <strong>Mobile Number</strong>
                <br />
                <br />
                @if(!empty($vendorData->vMobile))
				   <?php echo $vendorData->vMobile; ?>  <?php if(!empty($vendorData->sMobileNum)) echo ",". $vendorData->sMobileNum; ?>
                  
				@else
				    <a href="#">blank... </a>
                   <span><a id="mobileNumberLinks" href="#" class="mobileNumberLinks">Add Links</a></span>
		        @endif
			  </li>
              <li class="list-group-item">
                <strong>Pan Card Number</strong>
                <br />
                <br />
                @if(!empty($vendor_profile->panCardNumber))
				  <?php  echo String2Stars($vendor_profile->panCardNumber,2,-2); ?>
				@else
				    <a href="#">blank... </a>
				@endif
              </li>
            </ul>
           </div> 
        </div>
        </div>
        </div>
    </div>
 </div>             
   </div>
</div>
<!------Shop Name-Modal start---->
  <div class="modal" id="addDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="margin-top:100px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button id="emailModalClose" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <p class="modal-title" id="myModalLabel"> <i class="fa fa-info"></i><strong>&nbsp;Shop</strong></p>
                  </div>
                  <div class="modal-body">
                    <form id="addDetailsForm">
                      <div class="form-group">
                        <label>Owner Name</label>
                        <input type="hidden" name="edit_id" id="edit_id" value="<?php if(!empty($vendor_profile->id))echo $vendor_profile->id; ?>" />
                        <input type="text" name="ownername" id="ownername" placeholder="Owner Name" value="<?php if(!empty($vendor_profile->ownerName))echo $vendor_profile->ownerName; ?>" />
                      </div>
                      <div class="form-group">
                        <label>Pancard Number</label>
                        <input type="text" name="panno" id="panno" placeholder="Pan Card Number" value="<?php if(!empty($vendor_profile->panCardNumber))echo $vendor_profile->panCardNumber; ?>" onkeyup="pancardValidate(this.value,'PAN Number','pannumberErr','addDetailsBtn')" />
                        <span id="pannumberErr"></span>
                      </div>
                      <div class="form-group">
                        <label>About Business</label>
                        <textarea cols="10" rows="5" name="aboutb" id="aboutb" placeholder="About Business"/><?php if(!empty($vendor_profile->aboutBusiness))echo $vendor_profile->aboutBusiness; ?></textarea>
                      </div>
                      <div class="form-group">
                        <p id="shopnameResult"></p>
                        <button type="button"  name="addDetailsBtn" id="addDetailsBtn" class="btn btn-md btn--round">Save</button>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">       
                    <div class="text-right pull-right col-md-3">
                    </div> 
                </div>
              </div>
            </div>
            </div>
<!------Shop Name-Modal End---->
<!-------About Business modal -Start---->
<div class="modal" id="aboutBusinessModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="margin-top:100px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button id="emailModalClose" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <p class="modal-title" id="myModalLabel"><i class="fa fa-tag" aria-hidden="true"></i><strong>&nbsp;About Your Business</strong></p>
                  </div>
                  <div class="modal-body">
                    <form id="facebookForm">
                      <div class="form-group">
                        <textarea name="aboutBusiness" id="aboutBusiness" placeholder="About Business" cols="5" rows="4"  maxlength="100" onkeyup="checkCharacterLimit(this.value,'About Us','resultMaxlenght','100')"><?php if(!empty($vendorData->aboutBusiness))echo $vendorData->aboutBusiness; ?></textarea>
                      </div>
                      <p id="resultMaxlenght"></p>
                      <div class="form-group">
                        <p id="aboutBusinessResult"></p>
                        <button type="button"  name="aboutbusinesBtn" id="aboutbusinesBtn" class="btn btn-md btn--round">Save</button>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">       
                    <div class="text-right pull-right col-md-3">
                    </div> 
                </div>
              </div>
            </div>
            </div>
<!-------About Business modal -End---->
<!-------Mobile Number modal -Start---->
<div class="modal" id="mobileNumberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="margin-top:100px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button id="emailModalClose" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <p class="modal-title" id="myModalLabel"><i class="fa fa-mobile"></i><strong>&nbsp;Mobile Number</strong></p>
                  </div>
                  <div class="modal-body">
                    <form id="facebookForm">
                      <div class="form-group">
                        <input type="text" name="mobileNumber" id="mobileNumber" placeholder="Mobile Number" value="<?php if(!empty($vendorData->vMobile))echo $vendorData->vMobile; ?>" onkeyup="mobileValidate(this.value)" maxlength="10" />
                        <span id="mobileError"></span>
                      </div>
                      <div class="form-group">
                        <p id="someDivToDisplayErrors"></p>
                        <button type="button"  name="mobileBtn" id="mobileBtn" class="btn btn-md btn--round">Save</button>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">       
                    <div class="text-right pull-right col-md-3">
                    </div> 
                </div>
              </div>
            </div>
            </div>
<!--------Mobile Number modal -End----> 

<!-------Pan card  Number modal -Start---->
<div class="modal" id="pancardnumberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="margin-top:100px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button id="emailModalClose" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <p class="modal-title" id="myModalLabel"><i class="fa fa-tag" aria-hidden="true"></i><strong>&nbsp;Pan Card Number</strong></p>
                  </div>
                  <div class="modal-body">
                    <form id="facebookForm">
                      <div class="form-group">
                        <input type="text" name="pancardNumber" id="pancardNumber" placeholder="Pan Card Number" value="<?php if(!empty($vendorData->panCardNumber))echo $vendorData->panCardNumber; ?>" onblur="checkPanCardNumber(this.value)" maxlength="10" />
                         <span id="pancardNumberErr"></span>
                         <span id="pannumberErr"></span>
                      </div>
                      <div class="form-group">
                        <p id="pancardnumberResult"></p>
                        <button type="button"  name="pancardBtn" id="pancardBtn" class="btn btn-md btn--round">Save</button>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">       
                    <div class="text-right pull-right col-md-3">
                    </div> 
                </div>
              </div>
            </div>
            </div>
<!--------Mobile Number modal -End----> 
@stop
@section('footer') 
 @parent
<script>
$(document).ready(function(e) {
   $(document).on('click','#addDetails',function(){
      $('#addDetailsModal').modal('show');
   });
   $(document).on('click','.close',function(){
     $('.modal').hide();
   });
});
</script>
<script>
$(document).ready(function(e) {
/*--shop Name links add script start--*/	
  $(document).on('click',"#addDetailsBtn",(function(e) {
	$('#addDetailsBtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i>Please wait...').attr('disabled',true); 
	$("#shopnameResult").html(" ");
	var edit_id = $("#edit_id").val();  
    var ownername =  $('#ownername').val(); //alert(shopName);
	var aboutb = $('#aboutb').val();
	var panno = $("#panno").val();
	   $.ajax({
			type:'GET',
			url:'<?php echo url("vendorAgax/addDetails"); ?>',
			data:{edit_id:edit_id , ownername:ownername , aboutb:aboutb , panno:panno},
			success:function(res){
			 $('#addDetailsBtn').html('Save').attr('disabled',false); 
			 $('#shopnameResult').html(res);
			 $('#listGroup').load(document.URL + ' #listGroup');
			}
            });	  
    }));
/*--shop Name add script start--*/

/*--mobile Number Modal Plus links add script start--*/	
  $(document).on('click',"#mobileBtn",(function(e) {
    var mobileNumber =  $('#mobileNumber').val(); //alert(mobileNumber);
	var usersID = $('#userID').val();
	var vendorID = $('#vendorID').val();
	   $.ajax({
                type:'GET',
                url:'<?php echo url("mobilelinksFunc"); ?>',
                data:{mobileNumber:mobileNumber,userID:usersID,vendorsID:vendorID},
                success:function(res){
					alert(res);
				 var parsedJson = jQuery.parseJSON(res);
				 var errorString = '';
		         var successString = "";
				  if(parsedJson.vStatus==400){
				      $.each(parsedJson.error, function( key, value) {
                        errorString += "<p style='color:red;'>" + value + "</p>";
                       });
			          $('#someDivToDisplayErrors').html(errorString);
					}
				  if(parsedJson.vStatus==700){
					  $('#someDivToDisplayErrors').html(parsedJson.msg);
					}	
				 //$('#linkedinResult').html(res);
				 //$('#listGroup').load(document.URL + ' #listGroup');
				}
            }); 	  
  }));
/*--mobile Number Modal add script start--*/

/*----pan card number details----*/
  $(document).on('click',"#pancardBtn",(function(e) {
    var pancardNumber =  $('#pancardNumber').val(); //alert(facebookLink);
	var usersID = $('#userID').val();
	var vendorID = $('#vendorID').val();
	 $.ajax({
                type:'GET',
                url:'<?php echo url("pancardNumberFunc"); ?>',
                data:{pancardNumber:pancardNumber,userID:usersID,vendorsID:vendorID},
                success:function(res){
					//alert(res);
				   $('#pancardnumberResult').html(res);
				   $('#listGroup').load(document.URL + ' #listGroup');
				}
            }); 	  
  }));
/*pan card number details End---*/
});
</script>
@stop