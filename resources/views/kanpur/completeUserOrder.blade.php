@include("kanpur.layout.header")
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
	  //case "F":
	  //echo"<p><strong>Complete</strong></p>";
	  //break;
	  case "Y":
	  echo"<p><strong>Dispatched</strong></p>";
	  break;
	  case "R":
	  echo"<p><strong>Complete</strong></p>";
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
                            <li><a href="#">Home</a></li>
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
    <section class="cart_area section--padding2 bgcolor">
        <div class="container-fluid">
          <div class="row">
                <div class="col-sm-3">
            	<div class="row">
                <div class="col-sm-12">
            	<ul class="mdn-accordion sideeventmenu">
          <li class="subtop"><a href="#" class="catgoryevent"><i class="fa fa-random"></i> Category &nbsp;</a></li>
			 <li class="sub-level"><a href='{{ url("usersOrder?s=N") }}'><i class="fa fa-tags"></i>Recent Order</a></li>
             <li class="sub-level"><a href='{{ url("usersOrder?s=D") }}'><i class="fa fa-tags"></i>Confirmed Order</a></li>
              <li class="sub-level"><a href='{{ url("usersOrder?s=Y") }}'><i class="fa fa-tags"></i>Dispatched Order</a></li>
             <li class="sub-level"><a href='{{ url("completeUserOrder") }}'><i class="fa fa-tags"></i>Complete Order</a></li>
             <li class="sub-level"><a href='{{ url("usersOrder?s=C") }}'><i class="fa fa-tags"></i>Cancel Order &nbsp;</a></li>
        </ul>
        </div>
        		</div>
            </div>
                <div class="col-md-9">
                    <div class="product_archive added_to__cart">
                        <div class="title_area">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4 class="add_info">Order ID</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">Transaction ID</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">No of Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">Order Amount</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">Status</h4>
                                </div>
                                  <div class="col-md-2">
                                    <h4 class="add_info">Action</h4>
                                </div>
                            </div>
                        </div>
                       <div id="cartListingItem">
                          @if($allOrderDetails != FALSE)
                            @foreach($allOrderDetails as $order)
                             <div class="row">
                             	<div class="orderuserlist">
                                <div class="col-md-2">
                                    <h4 class="add_info">@if(!empty($order->id)){{ "knprzord".$order->id}}@endif</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">@if(!empty($order->transactionID)){{ $order->transactionID }}@endif</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">@if(!empty($order->totalProducts)){{ $order->totalProducts }}@endif</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">@if(!empty($order->totalAmount)){{ $order->totalAmount }}@endif</h4>
                                </div>
                                <div class="col-md-2">
                                   <?php  checkStatus($order->userOrderstatus); ?>
                                   <!-- <h4 class="add_info"><?php //if($order->orderStatus=="N")echo "<p style='color:red'><strong>Pending</strong></p>";?></h4> -->
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">
                                    <form action="<?php echo url("usersorderDetails"); ?>" id="orderForm" name="orderForm" method="post">
                                      <?php echo csrf_field(); ?>
                                      <input type="hidden" name="orderID" id="orderID" class="" value="@if(!empty($order->id)){{ $order->id }}@endif">
                                    <button type="submit" class="btn btn-md btn--round orderdetailsBnt" id="" name="orderDetails">View Details</button>                                    </form>
                                    </h4>
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
            </div>
        </div>
        </div>
    </section>
    <!----section End----->
 @include("kanpur.layout.footer")
 <!------vendor Address -Modal start---->
  
<!------vendor Address-Modal End---->