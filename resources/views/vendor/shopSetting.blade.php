@extends("vendor.template.masterVendor")
@section('content')
<?php
$listArr = array("1"=>"Advance for Delivery","2"=>"Advance for Pick Up","3"=>"Pay at Delivery","4"=>"Pay at Pick Up");
?>
<div class="service">
	<div class="container-fluid">
      <div class="row">
   <div class="col-sm-12 col-md-6 col-lg-3">
     @include("vendor.template.vendorProfileSidebar")	
   </div>
   	  <div class="col-sm-12 col-md-6 col-lg-9">
            <div class="post">
             <div class="content">
		  <div class="col-md-12">
           <div id="listGroup"> 
            <ul class="list-group" id="">
              <li class="list-group-item">
                <style>
                #addAdress{ text-decoration:none;}
                </style>
                <a href="#" id="addAuthority"><strong><i style="color:#237E94;" class="fa fa-plus"></i>&nbsp;Add Transaction Authority</strong></a>
              </li>
               <?php
                 if(!empty($transactionAuthority->onlinePaymentMode) && $transactionAuthority->onlinePaymentMode != "no"){
				        $onlineArr = explode("@",$transactionAuthority->onlinePaymentMode);
					    foreach($onlineArr as $first){
						   ?>
                            <li class="list-group-item">
                             <i style="color:#237E94;" class="fa fa-check"></i>&nbsp;
                             <?php echo $listArr[$first]; ?>
                            </li>
                            <?php 
						}
					}
			   ?> 
                <?php
                 if(!empty($transactionAuthority->codPaymentMode) && $transactionAuthority->codPaymentMode != "no"){
				        $codPaymentMode = explode("@",$transactionAuthority->codPaymentMode);
					    foreach($codPaymentMode as $second){
						   ?>
                            <li class="list-group-item">
                             <i style="color:#237E94;" class="fa fa-check"></i>&nbsp;
                             <?php echo $listArr[$second]; ?>
                            </li>
                            <?php 
						}
					}
			   ?>     
            </ul>
           </div>
           <span id="codSetting"></span> 
        </div>
        </div>
          </div>
      </div>
    </div>             
   </div>
</div>
<!------vendor Address -Modal start---->
  <div class="modal" id="venderAddressone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="margin-top:100px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <p class="modal-title" id="myModalLabel"><i style="color:#59b2e5;" class="fa fa-map-marker"></i><strong>&nbsp;Transaction Authority</strong></p>
                  </div>
                  <div class="modal-body">
                    <div> 
                 <meta name="csrf-token" content="{{ csrf_token() }}" />   
                  <form id="settingForm" name="settingForm" style="margin-top:10px;">
            <?php echo csrf_field(); ?>
                <input type="hidden" name="vendordetails_id" id="vendordetails_id" value="@if(!empty($vresultData)){{ $vresultData->id }} @endif" readonly />
                 <div class="form-group">
                  <label>Please Select The Way (S) In Which You Will Like To Receive Payment From The Buyer</label>
                </div>
                <div class="form-group">
                 <label>Online Transaction Option </label>
                   <div class="custom_checkbox form-check">
                                            <input type="checkbox" name="paymentMode[]" id="paymentMode" value="1">
                                            <label for="paymentMode">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title catnamebox">&nbsp;Advance For Delivery  </span>
                                            </label>
                                        </div>
                   <div class="custom_checkbox form-check">
                <input type="checkbox" name="paymentMode[]" id="paymentMode1" value="2">
                <label for="paymentMode1">
                    <span class="shadow_checkbox"></span>
                    <span class="radio_title catnamebox">&nbsp;Advance For Pick Up </span>
                </label>
            </div>
                </div>
                <div class="form-group">
                 <label>Cash On Delivery Option</label>
                 		<div class="custom_checkbox form-check">
                                            <input type="checkbox" name="codpaymentMode[]" id="paymentMode3" value="3">
                                            <label for="paymentMode3">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title catnamebox">&nbsp;Pay At Delivery  </span>
                                            </label>
                                        </div>
                        <div class="custom_checkbox form-check">
                <input type="checkbox" name="codpaymentMode[]" id="paymentMode4" value="4">
                <label for="paymentMode4">
                    <span class="shadow_checkbox"></span>
                    <span class="radio_title catnamebox">&nbsp;Pay At Pick Up </span>
                </label>
            </div>
                </div>
                <div class="form-group">
                  <button type="submit" name="paymentModebtn" id="paymentModebtn" class="btn btn--icon btn-md btn--round btn-info">Save</button> 
                </div>
                 </form>
                 <div id="result"></div>
                </div>
                  </div>
                  <div class="modal-footer">       
                    <div class="text-right pull-right col-md-3">
                    </div> 
                </div>
              </div>
            </div>
            </div>
  <!------vendor Address-Modal End---->

<script>
$(document).ready(function(e) {
var base_url = "{{ url('') }}"; 	
 $.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
  $(document).on('submit',"#settingForm",(function(e) {
	 $('#paymentModebtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 e.preventDefault();
      $.ajax({
      url:base_url+'/setPaymentMode',
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
	     //alert(data);
		 $('#paymentModebtn').html('<i class="glyphicon glyphicon-plus"></i> Save').attr('disabled',false); 
		  $('#result').html(data);
		 $('#listGroup').load(document.URL + ' #listGroup');  
	   }	
     });
  }));
});
</script>
<script>
$(document).ready(function(e) {
<!-----modal script start----->
 $(document).on('click','#addAuthority',function(){
    $('#venderAddressone').modal('show'); 
 });
 $(document).on('click','.close',function(){
   $('#venderAddressone').modal('hide');
 });
});
</script>
@endsection 
