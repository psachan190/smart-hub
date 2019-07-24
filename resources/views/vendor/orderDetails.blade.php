<?php
//echo"<pre>";
//print_r($getOrderDetails);
?>
@extends("vendor.template.masterVendor")
@section('content')
<div class="container-fluid" style="margin-bottom:100px;">
 <div class="row">
   <div class="col-sm-12 col-md-6 col-lg-3">
     	@include("vendor.template.vendorOrderSidebar")
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9">
     <div class="post">
     <style>
          .headingMain{ font-size:20px; color:#F00; font-weight:700; }
          </style>
        <div class="content">
          <h2 class="headingMain">Order Details</h2>
         <div class="row">
           <div style="font-size:14px; border:#CCC 2px solid; padding:15px; width:1000px;">
             <div style="height:170px;">
               <p style="font-size:14px; text-transform:capitalize;"><strong>Shop Name</strong> - <?php if(!empty($vresultData->vName))echo $vresultData->vName; ?></p>
               <p style="font-size:14px; margin-top:-10px; text-transform:capitalize;"><strong>Address </strong> - <?php if(!empty($vresultData->address2))echo $vresultData->address2; echo" , "; if(!empty($vresultData->address1))echo $vresultData->address1; echo " , "; if(!empty($vresultData->city))echo $vresultData->city; echo" - "; if(!empty($vresultData->pinCode))echo $vresultData->pinCode; echo " , "; if(!empty($vresultData->state))echo $vresultData->state;  ?> </p>
               <p style="font-size:14px; margin-top:-10px;"><strong>Contact Number</strong> - <?php if(!empty($vresultData->vMobile))echo $vresultData->vMobile; ?></p>
               <p style="font-size:14px; margin-top:-10px; text-transform:capitalize;"><strong>Email</strong> - <?php if(!empty($vresultData->vEmail))echo $vresultData->vEmail; ?></p>
             </div>
            <hr style="margin-top:-50px;" />
              <div style="border:#000 2px solid; width:300px; height:180px; padding:10px;">
                 <p style="font-size:14px; margin-top:0px;"><strong>Order ID</strong> - <?php if(!empty($getOrderDescription->id))echo "ORD-".$getOrderDescription->id; ?></p>
                 <p style="font-size:14px; margin-top:-10px;"><strong>Order Date</strong> - <?php if(!empty($getOrderDescription->orderDate))$date = strtotime($getOrderDescription->orderDate); echo date("d-M-Y h:ia",$date); ?></p>
                 <p style="font-size:14px; margin-top:-10px;"><strong>Txn ID </strong> -<?php if(!empty($getOrderDescription->transactionID))echo $getOrderDescription->transactionID; ?> </p>
                 <?php
				   if(!empty($vresultData->gstNumber)){
				      ?>
					 <p style="font-size:14px; margin-top:-10px;"><strong>GST No.</strong> - <?php if(!empty($vresultData->gstNumber))echo $vresultData->gstNumber; ?></p>
					  <?php
				   }
				 ?>
                 <?php
				   if(!empty($vresultData->panCardNumber)){
				      ?>
					 <p style="font-size:14px; margin-top:-10px;"><strong>Pan No.</strong> - <?php if(!empty($vresultData->panCardNumber))echo $vresultData->panCardNumber; ?></p> 
					  <?php
				   }
				 ?>
              </div>
              <div style="border:#000 2px solid; width:300px; height:180px; margin-left:310px; margin-top:-180px;  padding:10px;">
                <p style="font-size:14px;"><strong>Billing Details</strong></p>
               <p style="font-size:14px; text-transform:capitalize;"><strong><?php if(!empty($billingDetails->name))echo $billingDetails->name; ?></strong></p>
               <p style="font-size:14px; margin-top:-10px; text-transform:capitalize;"><strong>Plot No. </strong> <?php if(!empty($getOrderDescription->addressOne))echo $getOrderDescription->addressOne; ?>&nbsp;<br /><?php if(!empty($getOrderDescription->addressTwo))echo $getOrderDescription->addressTwo; ?>&nbsp;&nbsp;<?php if(!empty($getOrderDescription->neighbourhood))echo $getOrderDescription->neighbourhood; ?>&nbsp;<?php if(!empty($getOrderDescription->city))echo $getOrderDescription->city." - ".$getOrderDescription->pincode; ?></p>
              </div>
              <div style="border:#000 2px solid; width:300px; height:180px; margin-left:620px; margin-top:-180px; padding:10px;">
               <p style="font-size:14px;"><strong>Shipping Address</strong></p>
               <p style="font-size:14px; text-transform:capitalize;"><strong><?php if(!empty($getOrderDescription->firstName))echo $getOrderDescription->firstName." ".$getOrderDescription->lastName; ?></strong></p>
               <p style="font-size:14px; margin-top:-10px; text-transform:capitalize;"><strong>Plot No. </strong> <?php if(!empty($getOrderDescription->addressOne))echo $getOrderDescription->addressOne; ?><br /><?php if(!empty($getOrderDescription->addressTwo))echo $getOrderDescription->addressTwo; ?>&nbsp;&nbsp;<?php if(!empty($getOrderDescription->neighbourhood))echo $getOrderDescription->neighbourhood; ?>&nbsp;&nbsp;<?php if(!empty($getOrderDescription->city))echo $getOrderDescription->city." - ".$getOrderDescription->pincode; ?></p>
              </div>
             <div>
              <hr /> 
             </div>
             <div>
               <center>
               <table width="95%" border="1">
               <tr>
                 <th>Sn.</th>
                 <th>Products Name</th>
                 <th>Price</th>
                 <th>Quantity</th>
                 <th>GST (%)</th>
                 <th>Tax</th>
                 <th>Sub Total</th>
               </tr>
               @if($getOrderDetails != FALSE)
                 @php $i=1; @endphp
                 @foreach($getOrderDetails as $list)
                   <tr>
                     <th>@if(!empty($i)){{ $i }}@endif</th>
                     <th>@if(!empty($list->pName)){{ $list->pName }}@endif</th>
                     <th>Rs.@if(!empty($list->salePrice)){{ $list->salePrice }}@endif</th>
                     <th>@if(!empty($list->qty)){{ $list->qty }}@endif</th>
                      <th>@if(!empty($list->gst)){{ $list->gst }} @else {{ "N/A"}} @endif</th>
                        <th>Rs.@if(!empty($list->tax)){{ $list->tax }} @else {{ "N/A"}}@endif</th>
                     <th>Rs.@if(!empty($list->subTotProductsAmt)){{ $list->subTotProductsAmt }}@endif</th> 
                  </tr>
                  @php $i++; @endphp
                 @endforeach
               @endif
             </table>
               </center> 
             </div>
             <hr />
             <div id="" style="width:100%; border:#000 1px solid; padding:15px;">
                <p style="font-size:14px;"><strong>Sub Total : </strong>Rs.&nbsp;<?php if(!empty($getOrderDescription->subTotal))echo $getOrderDescription->subTotal; ?></p>
                <p style="font-size:14px; margin-top:-10px;"><strong>Total Tax : </strong>Rs.&nbsp;<?php if(!empty($getOrderDescription->totalTax))echo $getOrderDescription->totalTax; ?></p>
                 <p style="font-size:14px; margin-top:-10px;"><strong>Grand Amount : </strong>Rs.&nbsp;<?php if(!empty($getOrderDescription->totalAmount))echo $getOrderDescription->totalAmount; ?></p>
             </div>
           </div>
         </div>
         <div class="row">
          <div class="col-sm-12" style="margin-top:12px;">
            <div id="orderResult"></div>
            <input type="hidden" name="orderID" id="orderID" class="orderID" value="<?php if(!empty($getOrderDescription->id))echo $getOrderDescription->id; ?>" readonly="readonly" />
            <button type="button" class="btn btn-danger" name="cancelOrder" id="cancelOrder">Cancel Order</button>&nbsp;<button type="button" name="conformOrder" id="conformOrder" class="btn btn-success" >Confirm Order</button>
          </div>
         </div>
        </div>
     </div>
  </div>
 </div>
</div>
<script>
$(document).ready(function(e) {
 /*--cancel order script start--*/ 
   $(document).on('click','#cancelOrder',function(){
	 $("#orderResult").html(" "); 
	 var con = confirm("Are you sure  to cancel this order ? ."); 
    var orderID = $('#orderID').val();// alert(orderID);
	var orderStatus = "C";
	var msg = "Cancel";
	if(con != false){
	   $.ajax({
	      //url:"{{ url('cancelOrder') }}",
		  url:"{{ url('changeOrderStatus') }}",
		  type:"GET",
		  data:{orderID:orderID,orderStatus:orderStatus,msg:msg},
		  success: function(data){
			  alert(data);
		    $("#orderResult").html(data);
			//$('#shopProductsList').html(data)
		  }
	   });
	 }
  });
/*--cancel order script End--*/
/*--Confirm order script start--*/
 $(document).on('click','#conformOrder',function(){
	$("#orderResult").html(" "); 
    var orderID = $('#orderID').val(); //alert(orderID);
	var orderStatus = "D";
	 var con = confirm("Are you sure to Confirm this order ? ."); 
	 var msg = "Confirmed";
	if(con != false){
	   $.ajax({
		  //url:"{{ url('ConfirmOrder') }}",
	      url:"{{ url('changeOrderStatus') }}",
		  type:"GET",
		  data:{orderID:orderID,orderStatus:orderStatus,msg:msg},
		  success: function(data){
		    $("#orderResult").html(data);
		  }
	   });
	 }
  });
/*--Confirm order script End--*/
});
</script>
@endsection 

