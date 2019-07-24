@extends("layout")
@section('content')
@include('vendor.template.marketPlacenavigation')
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href='{{ url("vendorBackup/$vendorData->id/firstDashborad") }}'>Welcome</a></li>
                            <li><a href="#">Vendor Address</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Vendor Address</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="service">
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
           <div id="resultRecord"></div>
           <div id="listGroup"> 
            <ul class="list-group" id="">
              <li class="list-group-item">
                <style>
                #addAdress{ text-decoration:none;}
                </style>
                <a href="#" id="addAdress"><strong><i style="color:#237E94;" class="fa fa-plus"></i>&nbsp;Add Adderess</strong></a>
              </li>
              @if($addressList != FALSE)
                @php $i=1; @endphp
               @foreach($addressList as $list)
                 <li class="list-group-item">
                  <input type="hidden" name="addresID" id="addresID" class="addresID" value="{{ $list->id }}">
                <strong>{{ $i }}.</strong>
                <br />
                <br />
                @if(!empty($list->addressOne))
				  {{ $list->addressOne." , ".$list->addressTwo." ,".$list->neighbourhood."  , ".$list->city."-".$list->pincode." , ".$list->state }}
                  <span><button id="editAddress" class="editAddress label label-primary"><strong><i style="color:#FFF;" class="fa fa-edit"></i></strong></button>&nbsp;<button id="{{ $list->id }}" class="deleteAddress label label-danger"><strong><i style="color:#FFF;" class="fa fa-remove"></i></strong></button></span>
                @else
				   <a href="#">blank... </a>
                @endif
               </li>  
                @php $i++; @endphp
               @endforeach
              @endif
            </ul>
           </div> 
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
                    <p class="modal-title tagHeading" id="myModalLabel"><i style="color:#59b2e5;" class="fa fa-plus"></i><strong>&nbsp;Shop Address</strong></p>
                  </div>
                  <div class="modal-body">
                   <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <form id="addressForm">
                    <?php echo csrf_field(); ?>
                     <input type="hidden" name="userID" id="userID" value="@if(!empty($vendorData->users_id)) {{ $vendorData->users_id }} @endif" readonly="readonly" />
                     <input type="hidden" name="vendorID" id="vendorID" value="@if(!empty($vendorData->id)){{ $vendorData->id }} @endif" readonly="readonly" />
                     <input type="hidden" name="addresedit_id" id="addresedit_id" value="" readonly="readonly" />
                      <div class="form-group">
                        <label>Address one</label>
                        <input type="text" name="address1" id="address1" placeholder="Address One" />
                      </div>
                      <div class="form-group">
                        <label>Address two</label>
                        <input type="text" name="address2" id="address2" placeholder="Address two" />
                      </div>
                      <div class="form-group">
                        <label>Address Three</label>
                        <input type="text" name="address3" id="address3" placeholder="Address Three" />
                      </div>
                      <div class="form-group">
                        <label>Neighbourhood</label>
                        <input type="text" name="neighbourhood" id="neighbourhood" placeholder="Neighbourhood" />
                      </div>
                      <div class="form-group">
                        <label>PinCode</label>
                        <input type="text" name="pinCode" id="pinCode" placeholder="Pin Code" />
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" id="city" placeholder="City" />
                      </div>
                      <div class="form-group">
                        <label>State</label>
                        <input type="text" name="state" id="state" placeholder="State" />
                      </div>
                      <div class="form-group">
                        <p id="adrsresult"></p>
                        <button type="submit"  name="addressBtn" id="addressBtn" class="btn btn-md btn--round"><i style="color:#FFF;" class="fa fa-plus"></i>&nbsp;<strong>Save Address</strong></button>
                        &nbsp; <button type="reset"  name="reset" id="reset" class="btn btn-md btn--round"><i style="color:#FFF;" class="fa fa-refresh"></i>&nbsp;<strong>Reset</strong></button>
                        <div id="someDivToDisplayErrors"></div>
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
<!------vendor Address-Modal End---->
@stop
@section('footer')
  @parent
<script>
$(document).ready(function(e) {
  $(document).on('click','.editAddress',function(){
	 $("#reset").click(); 
     var editid = $(this).parent().parent().find('.addresID').val();
	 $.ajax({
      url: "<?php echo url("vendorAgax/fetchAddress"); ?>",
      type: "GET",        
      data: {editid:editid},
      success: function(data){
		  $("#venderAddressone").modal('show')
		  $(".tagHeading").html('<i style="color:#59b2e5;" class="fa fa-edit"></i><strong>&nbsp;Shop Address ');
		  $("#addressBtn").html('<i style="color:#59b2e5;" class="fa fa-edit"></i><strong>&nbsp;Edit Address');
		  $("#addresedit_id").val(editid);
		  //$('#editVenderAddress').modal('show');
		  var parsedJson = jQuery.parseJSON(data);
		  $('#editAddressID').val(parsedJson.id);
		  $('#address1').val(parsedJson.addressOne);
		  $('#address2').val(parsedJson.addressTwo);
		  $('#address3').val(parsedJson.addressThree);
		  $('#neighbourhood').val(parsedJson.neighbourhood);
		  $('#city').val(parsedJson.city);
		  $('#pinCode').val(parsedJson.pincode);
		  $('#state').val(parsedJson.state);
 	   }	
     });
  });  
});
</script>  
  
<script>
$(document).ready(function(e) {
<!-----modal script start----->
 $(document).on('click','#addAdress',function(){
     $("#reset").click();
	$('#venderAddressone').modal('show');  
 });
 $(document).on('click','.close',function(){
   $('#venderAddressone').modal('hide');
 });
<!-----modal script start----->

<!---address add script start------>
$(document).ready(function(e) {
  $(document).on('submit',"#addressForm",(function(e) {
	  $('#someDivToDisplayErrors').html("");
	  $('#addressBtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true);
	 $('#someDivToDisplayErrors').html("");
	 e.preventDefault();
      $.ajax({
      url: "<?php echo url("vendorAgax/vendorAddAddress"); ?>",
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
       $("#addressBtn").html('<i style="color:#59b2e5;" class="fa fa-edit"></i><strong>&nbsp;Edit Address').attr('disabled',false);
		var parsedJson = jQuery.parseJSON(data);
		 var errorString = '';
		 var successString = "";
		 if(parsedJson.status==400){
		      $.each(parsedJson.error, function(key,value) {
                errorString += "<p style='color:red;'>" + value + "</p>";
               });
			  $('#someDivToDisplayErrors').html(errorString);
		   }
		 if(parsedJson.status == 2){
		     $("#adrsresult").html(parsedJson.msg);
		   }    
		 if(parsedJson.status == 1){
		     if(parsedJson.msg == "edit"){
				$("#adrsresult").html("<span style='color:green;'><strong>Record Save Successfully !!! .</strong></span>"); 
			       
				 $('#listGroup').load(document.URL + ' #listGroup');  
			   }
			 if(parsedJson.msg == "add"){
				$("#adrsresult").html("<span style='color:red;'><strong>Record Save Successfully !!! .</strong></span>");  
			     
				 $('#listGroup').load(document.URL + ' #listGroup');  
			   }  
		   }    
 	   }	
     });
  }));
});
<!---address add script start------>
});
</script>
<script>
$(document).ready(function(e) {
    $(document).on('click','.deleteAddress',function(){
	  var con = confirm("Are you Sure want to Delete this Address");
	  if(con == true){
	  var id = this.id;
	  $.ajax({
      url: "<?php echo url("deleteAddress"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){
          $('#resultRecord').html(data);
		  $('#listGroup').load(document.URL + ' #listGroup');  
 	   }	
     });
	 }
	});   			
});
</script>
   
@stop 