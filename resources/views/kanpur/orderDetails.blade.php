@extends("layout")
@section('content')
 <!----breadcrum-start---->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li class="active"><a href="{{ url('orderDetails') }}">Order Details</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Shipping Details</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
   <!----breadcrum-End---->
    <!----section start----->
    <section class="cart_area normal-padding bgcolor">
            <div class="container-fluid shortcode_modules">
        	<div class="row">
            	<div class="col-sm-12 padding_div">
            	     <div class="modules__title">
                            <h3>Shipping details</h3>
                     </div>
                </div>
            </div>
            <div class="row shortcode_modules">
            	<div class="col-sm-12 padding_div">
                        <div class="modules__content">
                        	<div class="row login--form careerborder">
                             <meta name="csrf-token" content="{{ csrf_token() }}" />
                        	<form id="orderInform" class="orderInform">
                            <?php echo csrf_field(); ?>
                            	<div class="row">
                                	<div class="col-sm-6 col-xs-12">
                                    	<div class="form-group">
                                        	<strong>First Name:</strong>
                                              <input type="hidden" name="userID" id="userID"  value="<?php if(!empty(session()->get('knpuser')))echo session()->get('knpuser'); ?>"  />
                                            <input type="text" name="firstName" id="firstName" value="{{ old('firstName') }}" placeholder="First Name" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                    	<div class="form-group">
                                        	 <strong>Last Name:</strong>
                                            <input type="text" name="lastName"  value="{{ old('lastName') }}"  placeholder="Last Name"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-12 col-xs-12">
                                        <label>Address Type</label>
                                      <div class="custom-radio">
                                                                                <input type="radio" id="addresType1" class="addresType" name="addressType" value="home" checked="checked">
                                                                                <label for="addresType1"><span class="circle"></span>Home</label>&nbsp; &nbsp;
                                                                                <input type="radio" id="addresType2" class="addressType" name="addressType" value="office">
                                                                                <label for="addresType2"><span class="circle"></span>Office</label>
                                                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-12 col-xs-12">
                                    	<div class="form-group">
                                        	<strong>Select Address&nbsp; <strong>or</strong>&nbsp; <a href="#" id="addAddress" class="addAddress">Add New Address</a></strong>
                                        </div>
                                         <span id="addressdeleteResult"></span>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                	<div class="col-sm-12 col-xs-12">
                                    	<div class="form-group productsize2" id="addressBlog">
                                         @if($allMarketShopAddrs != FALSE)
                                              @php $i=4; @endphp
                                              @foreach($allMarketShopAddrs as $address)
                                               <div class="custom-radio">
                                                <input type="radio" id="addresType{{ $i }}" class="addresType" name="address" value="{{ $address->id }}">
                                                <label for="addresType{{ $i }}"><span class="circle"></span>@if(!empty($address->addressOne)){{ $address->addressOne }} @endif , @if(!empty($address->addressTwo)){{ $address->addressTwo }} @endif @if(!empty($address->addressThree)){{ ",".$address->addressThree }} @endif , @if(!empty($address->neighbourhood)){{ $address->neighbourhood }} @endif , @if(!empty($address->city)){{ $address->city }} @endif , @if(!empty($address->pincode)){{ $address->pincode }} @endif</label>
                                                <input type="hidden" name="addressText" id="addressText" value="<?php if(!empty($address->id))echo $address->id; ?>" class="addressText" />
                                                &nbsp;&nbsp;&nbsp;<button type="button" name="addressBtn" id="" class="btn btn-danger addressBtn"><span class="lnr lnr-trash"></span></button>
                                               </div>
                                               @php $i++; @endphp                             
                                              @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-12 col-xs-12">
                                    	<div class="form-group">
                                        	<strong>Mobile Number:</strong>
                                         <input onkeyup="mobileNumberValidate(this.value,'Mobile Number','mobileError','cartSubmit')" type="text" name="phone_number" id="mobile" value="" maxlength="10" placeholder="Mobile Number" />
                                          <span id="mobileError" style="color:#F00;"></span>
                                        </div>
                                        <div id="resultCart"></div>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-12 col-xs-12">
                                    	<div class="form-group">
                                         <button class="btn btn--md btn--round" type="submit" name="submit" id="cartSubmit">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
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
                                            <span>Rs. @if(!empty($productsPrice)){{ number_format(round($productsPrice),2,'.',',') }} @endif</span>
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
                                            <span>
									<?php $pPrice = $productsPrice*$row->qty; echo "Rs.".number_format(round($pPrice),2,'.',','); ?></span>
                                        </div>
                                        <!-- end /.item_action -->
                                    </div>
                            </div>
                            <div class="col-md-1 col-sm-1">
                            	<div class="product__price_download">
                                        <div class="item_price v_middle">
                                            <span>
                                            <?php $totaltax = ($pPrice*$row->options['gst'])/100; echo "Rs.".number_format(round($totaltax),2,'.',',');  ?>
                                            </span>
                                        </div>
                                        <!-- end /.item_action -->
                                    </div>
                            </div>
                            <div class="col-md-1 col-sm-1">
                            	<div class="product__price_download">
                                        <div class="item_price v_middle">
                                            <span>
                                            <?php $totalSubAmount =  $pPrice + $totaltax; echo "Rs.".number_format(round($totalSubAmount),2,'.',','); ?>
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
                                          <span>Rs. @if(!empty($row->options['salePrice'])){{ $row->options['salePrice'] }} @endif</span>
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
                            <div class="col-md-1 col-sm-1">
                            	<div class="product__additional_info">
                                        <button id="<?php echo $row->rowId; ?>" class="btn btn-danger removeCart"><span class="lnr lnr-trash"></span></button>
                                    </div>
                            </div>
                                <!-- end /.col-md-4 -->
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
<!----Next Url Form Send OrderID bu Post method--start-->
<form action='{{ url("selectPaymentType") }}' name="orderIDform" method="post" style="display:none;">
    <?php echo csrf_field(); ?>
    <input type='text' name='lastOrederID' id='lastOrederID' value="" class="form-control" />
    <input type='submit' name='orderIDsubmit' id="orderIDsubmit" value="orderIDsubmit">
    
</form>
@stop
@section('footer')
@parent
 <!-- address delete script start-->
   <script>
    $(document).ready(function(e) {
       $(document).on('click',".addressBtn",(function(e) {
		 $("#addressdeleteResult").html("");
		 var id = $(this).parent().find('.addressText').val();
		 con = confirm("Are you sure want to delete this address .");
		  if(con ==true){
			 $.ajax({
					type:'GET',
					url:'<?php echo url("deleteAddressmarketShop"); ?>',
					data:{id:id},
					success:function(res){
						//alert(res);
					  if(res=="fail"){
						  $("#addressdeleteResult").html("<p style='color:red'><strong>This Address is already used . So this is not delete .</strong></p>");
						}
					   else if(res=="error"){
						  $("#addressdeleteResult").html("<p style='color:red'><strong>Unexpected try again.</strong></p>");
						}
					   else{
						  $("#addressdeleteResult").html("<p style='color:green'><strong>Address Delete successfully.</strong></p>");
						  $('#addressBlog').load(document.URL + ' #addressBlog');
						}		
					}
				}); 
		  }
	  }));   
    });
   </script>
 <!-- address delete script start-->
 <!------vendor Address -Modal start---->
  <div class="modal" id="userCartAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="margin-top:100px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <p class="modal-title" id="myModalLabel"><i style="color:#59b2e5;" class="fa fa-map-marker"></i><strong>&nbsp;Shipping  Address</strong></p>
                  </div>
                  <div class="modal-body">
                   <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <form id="userCartaddressForm">
                    <?php echo csrf_field(); ?>
                             <input type="hidden" name="user_id" id="user_id" value="<?php echo session()->get('knpuser'); ?>"  readonly="readonly"  />
                            <div class="form-group orderform">
                                <div class="col-md-12"><strong>Address Line 1</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="addressOne" id="addressOne" value="" placeholder="Address One"/>
                                </div>
                            </div>
                            <div class="form-group orderform">
                                <div class="col-md-12"><strong>Address Line 2 </strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="addressTwo" id="addressTwo"  value="" placeholder="Address Two " />
                                </div>
                            </div>
                            <div class="form-group orderform">
                                <div class="col-md-12"><strong>Address Three <small>(optional)</small> </strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="addressthree" id="addressthree"  value="" placeholder="Address Two " />
                                </div>
                            </div>
                            <div class="form-group orderform">
                                <div class="col-md-12"><strong>Land Mark</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="landMark" id="landMark" value="" placeholder="Land Mark" />
                                </div>
                            </div>
                            <div class="form-group orderform">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" id="city" value="kanpur" placeholder="City" />
                                </div>
                            </div>
                            <div class="form-group orderform" style="display:none;">
                                <div class="col-md-12"><strong>State:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="state" id="state" value="UP" placeholder="State" value="Uttar Pradesh" readonly="readonly" />
                                </div>
                            </div>
                            <div class="form-group orderform">
                                <div class="col-md-12"><strong>Pin Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="pinCode" id="pinCode" maxlength="6" placeholder="pincode" onblur="pincodeValidateBackend(this.value,'Pin Code Number','pincodeErr','addressBtn')" />
                                     <span id="pincodeErr" style="color:#F00;"></span>
                                </div>
                            </div>
                      <div class="form-group orderform">
                        <p id="adrsresult"></p>
                        <button type="submit"  name="addressBtn" id="addressBtn" class="btn btn--md btn--round"><i style="color:#FFF;" class="fa fa-plus"></i>&nbsp;Save</button>
                        <div id="addressResult"></div>
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
