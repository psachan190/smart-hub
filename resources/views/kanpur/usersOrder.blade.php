@extends("layout")
@section('content')
<?php
function checkStatus($status){
  switch($status){
	  case "C":
	  echo "<p><strong>Cancel</strong></p>";
	  break;
	  case "N":
	  echo "<p><strong>Pending</strong></p>";
	  break;
	  case "D":
	  echo"<p><strong>Confirmed</strong></p>";
	  break;
	  case "F":
	  echo"<p><strong>Complete</strong></p>";
	  break;
	  case "Y":
	  echo"<p><strong>Dispatched</strong></p>";
	  break;
	  case "R":
	  echo"<p><strong>Received</strong></p>";
	  break; 
	}
} 
?>
 <!----breadcrum-start---->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                             <li class="active"><a href="{{ url('usersOrder') }}">Your Order</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Your Order</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
   <!----breadcrum-End---->
    <!----section start----->
    <style>
    .add_info{ font-size:14px !important;}
    </style>
    <section class="cart_area normal-padding bgcolor">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-2"></div>
             <div class="col-sm-5">
               <span id="result"></span>
             </div>
              <div class="col-sm-2"></div>
          </div>
          <div class="row">
          <div class="modules__content">
                            <div class="withdraw_module withdraw_history">
                                <div class="withdraw_table_header">
                                    <h3>Your Order</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table withdraw__table">
                                        <thead>
                                        <tr>
                                            <th>Order Date</th>
                                            <th>Order ID</th>
                                            <th>Transaction ID</th>
                                            <th>No of Products</th>
                                             <th>Order Amount</th>
                                            <th>Status</th>
                                            <th>Delivery timing</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody id="cartListingItem">
                                        @if($allOrderDetails != FALSE)
                                                 @foreach($allOrderDetails as $order)
                                                <tr class="orderuserlist">
                                                	 <input type="hidden" name="orderID" id="orderID" class="orderID" value="@if(!empty($order->id)){{ $order->id }}@endif" readonly="readonly" />
                                                    <td><h4 class="add_info">@php $date = strtotime($order->orderDate) @endphp @if(!empty($order->orderDate)){{ date("d-M-Y h:i:a",$date) }}@endif</h4></td>
                                                    <td><h4 class="add_info">@if(!empty($order->id)){{ "knprzord".$order->id}}@endif</h4></td>
                                                    <td class="bold"> <h4 class="add_info">@if(!empty($order->transactionID)){{ $order->transactionID }}@endif</h4></td>
                                                    <td class=""> <h4 class="add_info">@if(!empty($order->totalProducts)){{ $order->totalProducts }}@endif</h4></td>
                                                    <td> <h4 class="add_info">@if(!empty($order->totalAmount)){{ $order->totalAmount }}@endif</h4></td>
                                                    <td><?php  checkStatus($order->orderStatus); ?></td>
                                                    <td class="bold"> <h4 class="add_info">
                                    @if(!empty($order->deliverDate)){{ date("d-M-Y",$order->deliverDate)  }} @endif @if(!empty($order->deliverTime)){{ $order->deliverTime  }} @endif
                                    </h4></td>
                                                    <td><?php if($order->orderStatus=="Y"){
									  ?><h4 class="add_info">
                                      <button type="button" class="btn btn-sm btn--round receiveOrdrBtn" id="" name="orderDetails">Receive</button>
                                    </h4><?php
									}?>
                                  
                                              <?php if(!empty($order->id)) $o_id = encrypt($order->id); ?>
                                            <a href="<?php echo url("usersorderDetails/$o_id"); ?>" class="btn btn-sm btn--round orderdetailsBnt" id="" name="orderDetails">View Details</a></td>
                                                </tr>
                                               @endforeach
                                         @else
                                         	<tr>
                                                 <td colspan="7"> <p class="alert alert-danger">Your Order is Empty...</p></td>
                                                </tr>
                                         @endif 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
          
               <!-- <div class="col-md-12 padding_div">
                    <div class="product_archive added_to__cart">
                        <div class="title_area">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4 class="add_info">Order Date</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4 class="add_info">Order ID</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">Transaction ID</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4 class="add_info">No of Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">Order Amount</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4 class="add_info">Status</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">Delivery timing</h4>
                                </div>
                                  <div class="col-md-1">
                                    <h4 class="add_info">Action</h4>
                                </div>
                            </div>
                        </div>
                       <div id="cartListingItem">
                          @if($allOrderDetails != FALSE)
                            @foreach($allOrderDetails as $order)
                             <div class="row">
                             	<div class="orderuserlist">
                                <input type="hidden" name="orderID" id="orderID" class="orderID" value="@if(!empty($order->id)){{ $order->id }}@endif" readonly="readonly" />
                                <div class="col-md-2">
                                    <h4 class="add_info">@php $date = strtotime($order->orderDate) @endphp @if(!empty($order->orderDate)){{ date("d-M-Y h:i:a",$date) }}@endif</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4 class="add_info">@if(!empty($order->id)){{ "knprzord".$order->id}}@endif</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">@if(!empty($order->transactionID)){{ $order->transactionID }}@endif</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4 class="add_info">@if(!empty($order->totalProducts)){{ $order->totalProducts }}@endif</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">@if(!empty($order->totalAmount)){{ $order->totalAmount }}@endif</h4>
                                </div>
                                <div class="col-md-1">
                                   <?php  checkStatus($order->orderStatus); ?>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">
                                    @if(!empty($order->deliverDate)){{ date("d-M-Y",$order->deliverDate)  }} @endif @if(!empty($order->deliverTime)){{ $order->deliverTime  }} @endif
                                    </h4>
                                </div>
                                <div class="col-md-1">
                                    <?php if($order->orderStatus=="Y"){
									  ?><h4 class="add_info">
                                      <button type="button" class="btn btn-sm btn--round receiveOrdrBtn" id="" name="orderDetails">Receive</button>
                                    </h4><?php
									}?>
                                    <form action="<?php echo url("usersorderDetails"); ?>" id="orderForm" name="orderForm" method="post">
                                      <?php echo csrf_field(); ?>
                                      <input type="hidden" name="orderID" id="orderID" class="" value="@if(!empty($order->id)){{ $order->id }}@endif">
                                    <button type="submit" class="btn btn-sm btn--round orderdetailsBnt" id="" name="orderDetails">View Details</button>   &nbsp;&nbsp;&nbsp;                                 </form>
                                </div>
                                </div>
                            </div>    
                            @endforeach
                         @else
                          <div class="single_product clearfix">
                            <div class="col-md-5 col-sm-7 v_middle">
                              <p class="alert alert-danger">Your Order is Empty...</p>
                            </div>
                          </div>
                        @endif 
                        </div>
                </div>
            </div>-->
        </div>
        </div>
    </section>
@stop
@section('footer')
@parent
 <!------vendor Address -Modal start---->
  <script>
$(document).ready(function(e) {
 /*--cancel order script start--*/ 
   $(document).on('click','.receiveOrdrBtn',function(){
	 $("#orderResult").html(" "); 
	 var con = confirm("Yes I am sure I can Pick up order ."); 
	var orderID = $(this).parent().parent().parent().find('.orderID').val(); 
	var orderStatus = "R";
	var msg = "Order Recieve successfully";
	if(con != false){
	   $.ajax({
		  url:"{{ url('receiveOrderStatus') }}",
		  type:"GET",
		  data:{orderID:orderID,orderStatus:orderStatus,msg:msg},
		  success: function(data){
		    $("#result").html(data);
			location.reload();
		  }
	   });
	 }
  });
/*--cancel order script End--*/
});
</script>
<!------vendor Address-Modal End---->
@stop