@extends("layout")
@section('content')
@include('vendor.template.marketPlacenavigation')
<div class="normal-padding" style="margin-top:30px; margin-bottom:30px;">
	<div class="container">
      <div class="row">
       <div class="col-sm-12 col-md-12 col-lg-12">
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

    </style>
<div class="container">
    <div class="notice notice-success">
        <span id="alertbox">Request for Live Shop</span>
    </div>    
</div>
          <input type="hidden" name="vendorID" id="vendorID" value="<?php if(!empty($vendorData->id)) echo $vendorData->id; ?>" readonly="readonly" />
          <input type="hidden" name="vendor_name" id="vendor_name" value="<?php if(!empty($vendorData->vName)) echo $vendorData->vName; ?>" readonly="readonly" />
          <input type="hidden" name="status" id="status" value="<?php if(!empty($vendorData->goLiveRequest)) echo $vendorData->goLiveRequest; ?>" />
         <button type="button" name="goforLive" id="goforLive" class="btn btn-success"><?php if(!empty($vendorData->goLiveRequest)) echo "Remind Go For live"; else echo "Go For live"; ?></button>
       </div>   
      </div>             
   </div>
</div>
@stop
@section('footer')
 @parent
<script>
$(document).ready(function(e) {
/*--shop Name links add script start--*/	
  $(document).on('click',"#goforLive",(function(e) {
    var vendorID =  $('#vendorID').val();
	var vendor_name = $("#vendor_name").val();
	$('#goforLive').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	var status = $("#status").val();	
	 $.ajax({
                type:'GET',
                url:'<?php echo url("vendorAgax/goForLive"); ?>',
                data:{vendorID:vendorID,status:status,vendor_name:vendor_name},
                success:function(res){
				 
				 $('#goforLive').html('Go For live').attr('disabled',false); 
				 $('#alertbox').html(res);
				}
            }); 	  
  }));
/*--shop Name add script start--*/
});
</script>
@stop 