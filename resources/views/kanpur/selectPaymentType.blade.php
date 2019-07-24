@extends("layout")
@section('content')
<?php
$listArr = array("1"=>"Advance for Delivery","2"=>"Advance for Pick Up","3"=>"Pay at Delivery","4"=>"Pay at Pick Up");
$dayArr = array(1=>"Sunday",2=>"Monday",3=>"Tuesday",4=>"Wednesday",5=>"Thursday",6=>"Friday",7=>"Saturday");
$timeArr = array(1=>"08::00 AM - 10:00 AM",2=>"10::00 AM - 12:00 AM",3=>"12::00 AM - 02:00 PM",4=>"02::00 PM - 04:00 PM",5=>"04::00 PM - 06:00 PM",6=>"06::00 PM - 08:00 PM",7=>"08::00 PM - 10:00 PM");
?>
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li class="active"><a href="#">Payment Type</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Payment Type</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="cart_area normal-padding bgcolor">
           <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 padding_div">
                        <!--SHIPPING METHOD-->
                        <div class="cardify login">
                            <div class="login--header ordertoppage">
                                <h3>Select Payment Type</h3></div>
                            <div>
                                @foreach($errors->all() as $error)
                                <li class='' style='color:red;'>{{ $error }}</li>
                                @endforeach {!! Session::has('msg') ? Session::get("msg") : '' !!}
                            </div>
                            <div id="resultCart"></div>
                            <div class="panel-body">
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <form id="paymentMode" action="<?php echo url("payment"); ?>" method="GET" class="paymentMode">
                                <?php echo csrf_field(); ?>
                                 <input type="hidden" name="orderID" value="<?php if(!empty($lastOrderID))echo $lastOrderID; ?>" readonly="readonly" required="required" />
                                 <input type="hidden" name="buyerName" id="buyerName" value="<?php if(!empty($userData['name']))echo $userData['name']; ?>" readonly="readonly" required="required" />
                                 <input type="hidden" name="vendorID" id="vendorID" value="<?php if(!empty($orderDetails['vendordetails_id']))echo $orderDetails['vendordetails_id']; ?>" readonly="readonly" required="required" />
                                 <input type="hidden" name="totalAmount" id="totalAmount" value="<?php if(!empty($orderDetails['totalAmount']))echo $orderDetails['totalAmount']; ?>" readonly="readonly" required="required" />
                                            <input type="hidden" name="totalAmount" id="totalAmount" value="<?php if(!empty($orderDetails['totalAmount']))echo $orderDetails['totalAmount']; ?>" readonly="readonly" required="required" />
                                            <input type="hidden" name="productInformation" id="productInformation" value="Products Purchase on Kanpurize Market Place" readonly="readonly" required="required" />
                                            <input type="hidden" name="mobileNumber" id="mobileNumber" value="<?php if(!empty($userData['mobileNumber']))echo $userData['mobileNumber']; ?>" readonly="readonly" required="required" />
                                            <input type="hidden" name="emailID" id="emailID" value="<?php if(!empty($userData['email']))echo $userData['email']; ?>" readonly="readonly" required="required" />
                                            <div class="col-md-12 col-xs-12">
                                                <strong style="text-transform:capitalize;"><?php echo $userData['name']; ?></strong>
                                                <br />
                                                <strong>Total Products : </strong>&nbsp;
                                                <?php if(!empty($orderDetails['totalProducts']))echo $orderDetails['totalProducts']; ?>
                                                    <br />
                                                    <strong>Total Amount : </strong>&nbsp;
                                                    <?php if(!empty($orderDetails['totalAmount']))echo "Rs. " . $orderDetails['totalAmount']; ?>

                                                        <br />
                                            </div>
                                <div class="row normal-padding">
                                	<div class="col-sm-12 col-xs-12">
                                        <strong>Select Payment Type</strong>
                                    </div>
                                </div>
                                <div class="row normal-padding">
                                	@if(!empty($transactionAuthority->advanceforDelivery) && !empty($transactionAuthority->advancedforPickup) )
                                            <div class="col-md-12 col-xs-12" style="margin-top:20px;">
                                                <strong>Online Transaction Option</strong> @if(!empty($transactionAuthority->advanceforDelivery))
                                                    <div class="custom-radio">
                                                        <input type="radio" id="paymentType1" class="addresType" name="paymentType" value="<?php if(!empty($transactionAuthority->advanceforDelivery))echo $transactionAuthority->advanceforDelivery; ?>" />
                                                        <label for="paymentType1"><span class="circle"></span>&nbsp; Advance for Delivery</label>
                                                    </div>
                                                @endif 
                                                @if(!empty($transactionAuthority->advancedforPickup))
                                                    <div class="custom-radio">
                                                        <input type="radio" id="paymentType2" class="addresType" name="paymentType" value="<?php if(!empty($transactionAuthority->advancedforPickup))echo $transactionAuthority->advancedforPickup; ?>" />
                                                        <label for="paymentType2"><span class="circle"></span>&nbsp; Advance for Pick Up</label>
                                                    </div>
                                                @endif
                                            </div>
                                            @endif
                                </div>
                                <div class="row normal-padding">
                                 @if(!empty($transactionAuthority->payatDelivery) && !empty($transactionAuthority->payatPickup))
                                   <div class="col-md-12 col-xs-12" style="margin-top:20px;">
                                            <strong>Cash Online Delivery</strong> @if(!empty($transactionAuthority->payatDelivery))
                                                <div class="custom-radio">
                                                    <input type="radio" id="paymentType3" class="addresType" name="paymentType" value="<?php if(!empty($transactionAuthority->payatDelivery))echo $transactionAuthority->payatDelivery; ?>" />
                                                    <label for="paymentType3"><span class="circle"></span>&nbsp; Pay at Pick Up</label>
                                                </div>
                                            @endif @if(!empty($transactionAuthority->payatPickup))
                                                <div class="custom-radio">
                                                    <input type="radio" id="paymentType4" class="addresType" name="paymentType" value="<?php if(!empty($transactionAuthority->payatPickup))echo $transactionAuthority->payatPickup; ?>" />
                                                    <label for="paymentType4"><span class="circle"></span>&nbsp; Pay at Delivery</label>
                                                </div>
                                            @endif
                                        </div>
                                 @endif
                                </div>
                                 <div class="row">
                                	<div class="col-sm-12 col-xs-12">
                                    	<div class="form-group">
                                         <strong>Select  Delivery Date&nbsp;<span class="prafontanswerstar">*</span>&nbsp;<span id="dateErr"></span></strong>
                                        <input type="text" name="deliverDate" id="datepicker" class="deliverDate" placeholder="Click for select date" readonly="readonly" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-12 col-xs-12">
                                    	<div class="form-group">
                                        <strong>Select  Delivery Time</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-12 col-xs-12">
                                    	<div class="form-group">
                                         <div id="deliveryTime"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-12 col-xs-12">
                                    	<div class="form-group">
                                          <button class="btn btn--md btn--round" type="submit" name="submit" id="confirmOrderBtn">Confirm Order</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <!--SHIPPING METHOD END-->
                    </div>
                </div>
            </div>
            <div class="container-fluid shortcode_modules roworder2">
            <div class="row">
                <div class="col-md-12 padding_div">
                    <div class=" added_to__cart">
                        <div class="modules__title">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Product Details</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">Quantity</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="add_info">Sub Total</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4 class="add_info">Tax</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4 class="add_info">Total</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                         <div id="cartListingItem">
                        @if(count(Cart::content()) >0)
                         <?php 
						 $completeOrderAmount=0;
						 $i=1;
						 foreach(Cart::content() as $row) :
						    if($row->options['withGst']=="yes"){
								$totalPercentage = 100 + $row->options['gst']; 
								$productsTax = ($row->price*$row->options['gst'])/$totalPercentage;
								$productsPrice = $row->price - $productsTax;
							     ?>
								 <div class="single_product clearfix">
                           	<div class="col-md-3 col-sm-3">
                            	<div class="product__description">
                                       <?php
									     if(!empty($row->options['image'])){
										   $image =  $row->options['image'];
										?> 
                                            <img src="<?php echo url("uploadFiles/thumbsImg/$image"); ?>" alt="cart product thumbnail">
                                         <?php
											 }
										?>
                                    </div>
                                    <div class="short_desc">
                                            <a href="#"><h4 class="ptexable shorth">@if(!empty($row->name)){{ $row->name }} @endif</h4></a>
                                        </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                            	<div class="product__price_download">
                                        <div class="item_price v_middle">
                                            <span>Rs. @if(!empty($productsPrice)){{ number_format($productsPrice,2,'.',',') }} @endif</span>
                                        </div>
                                        <!-- end /.item_action -->
                                    </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                            	<div class="item_action v_middle">
                                           {{ $row->qty }} 
                                        </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                            	<div class="product__price_download">
                                        <div class="item_price v_middle">
                                            <span><?php $pPrice = $productsPrice*$row->qty; echo "Rs.".number_format($pPrice,2,'.',','); ?></span>
                                        </div>
                                        <!-- end /.item_action -->
                                    </div>
                            </div>
                            <div class="col-md-1 col-sm-1">
                            	<div class="product__price_download">
                                        <div class="item_price v_middle">
                                            <span>
                                            <?php $totaltax = ($pPrice*$row->options['gst'])/100; echo "Rs.".number_format($totaltax,2,'.',',');  ?>
                                            </span>
                                        </div>
                                        <!-- end /.item_action -->
                                    </div>
                            </div>
                            <div class="col-md-1 col-sm-1">
                            	<div class="product__price_download">
                                        <div class="item_price v_middle">
                                            <span>
                                             <?php $totalSubAmount =  $pPrice + $totaltax; echo "Rs.".number_format($totalSubAmount,2,'.',','); ?>
                                            </span>
                                        </div>
                                    </div>
                            </div>
                                <!-- end /.col-md-4 -->
                            </div>
								 <?php
							   }
							else{
								 ?>
								 <div class="single_product clearfix">
                           	<div class="col-md-3 col-sm-3">
                            	<div class="product__description">
                                       <?php
									     if(!empty($row->options['image'])){
										   $image =  $row->options['image'];
										?> 
                                            <img src="<?php echo url("uploadFiles/thumbsImg/$image"); ?>" alt="cart product thumbnail">
                                         <?php
											 }
										?>
                                    </div>
                                      <div class="short_desc">
                                            <a href="#"><h4 class="ptexable shorth">@if(!empty($row->name)){{ $row->name }} @endif</h4></a>
                                        </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                            	<div class="product__price_download">
                                        <div class="item_price v_middle">
                                          <span>Rs. @if(!empty($row->options['salePrice'])){{ number_format($row->options['salePrice'] ,2,'.',',') }} @endif</span>
                                        </div>
                                        <!-- end /.item_action -->
                                    </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                            	<div class="item_action v_middle">
                                          {{ $row->qty }}
                                        </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                            	<div class="product__price_download">
                                        <div class="item_price v_middle">
                                            <span> <?php $totalgstnotIncludeAmount = $row->options['salePrice'] * $row->qty; echo "Rs.".number_format($totalgstnotIncludeAmount ,2,'.',',') ; ?></span>
                                        </div>
                                        <!-- end /.item_action -->
                                    </div>
                            </div>
                            <div class="col-md-1 col-sm-1">
                            	<div class="product__price_download">
                                        <div class="item_price v_middle">
                                            <span>
                                            <?php $totaltaxgstnotInclude =  ($totalgstnotIncludeAmount*$row->options['gst'])/100; echo "Rs.".number_format($totaltaxgstnotInclude ,2,'.',',');   ?>
                                            </span>
                                        </div>
                                        <!-- end /.item_action -->
                                    </div>
                            </div>
                            <div class="col-md-1 col-sm-1">
                            	<div class="product__price_download">
                                        <div class="item_price v_middle">
                                            <span>
                                              <?php
											    $tatalAmounts = $totalgstnotIncludeAmount + $totaltaxgstnotInclude;
											  echo "Rs."; echo number_format(round($tatalAmounts) ,2,'.',',');
											  ?>
                                            </span>
                                        </div>
                                    </div>
                            </div>
                            </div>
								 <?php
							   } 
							     
						     //$tax = ($row->subtotal * $row->options['gst'])/100;
						   ?>
                         <?php $i++; endforeach; ?>
                            </div>  
                        @else
                          <div class="single_product clearfix">
                            <div class="col-md-5 col-sm-7 v_middle">
                              <p class="alert alert-danger">Your Cart is Empty...</p>
                            </div>
                          </div>
                        @endif 
                        </div>
                        <?php
                          if(count(Cart::content()) >0){
						     ?>
							 <div class="row">
                            <div class="col-sm-12">
                                <div class="cart_calculation">
                                </div>
                            </div>
                            <div class="col-sm-6 col-sm-offset-6">
                                <div class="cart_calculation">
                                    <div class="cart--total"><p><span>Total</span>Rs . <?php print_r(Cart::subtotal());?></p></div>
                                </div>
                            </div>
                        </div>
							 <?php     
						  }
						?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop 
    @section('footer') 
    @parent
<script>
	$(document).ready(function(e) {
$(document).on('change', '.deliverDate', function() {
	$("#dateErr").html(" ");
	$("#confirmOrderBtn").attr('disabled', false);
	var selectedDate = $('#datepicker').val();
	var vendorID = $("#vendorID").val();
	/*----carrent date--start-*/
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth() + 1;
	var yyyy = today.getFullYear();
	var todayDate = mm + '/' + dd + '/' + yyyy;
	/*----carrent date-end --*/
	if (new Date(selectedDate) >= new Date(todayDate)) {
		if (vendorID != "") {
			$.ajax({
				url:base_url+"/actionAjaxGet/gettiming_basedonday",
				type: "GET",
				data: {selectedDate: selectedDate,vendorID: vendorID},
				success: function(data) {
					//alert(data);
					$("#deliveryTime").html(data);
				}
			});
		} else {
			alert("Unexpected , try again .");
		}
	} else {
		$("#dateErr").html("<span style='color:red;'>Please Select Correct Date  .</span>");
		$("#confirmOrderBtn").attr('disabled', true);
		$("#deliveryTime").html(" ");
	}
});
	});
</script>
    @stop