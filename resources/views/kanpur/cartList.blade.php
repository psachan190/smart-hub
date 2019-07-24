@extends("layout")
@section('content')
 <!----breadcrum-start---->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="<?php echo url("kanpurizeMarketplace"); ?>">Home</a></li>
                            <li class="active"><a href="#">Shopping Cart List</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Shopping Cart List</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
   <!----breadcrum-End---->
    <!----section start----->
   <section class="cart_area normal-padding bgcolor">
        <div class="container-fluid" id="cartListingItem">
            <div class="row">
              <div class="col-md-12 padding_div">
               <div class="product_archive added_to__cart">
                        <div class="title_area">
                     	<div class="table-responsive">
                                    <table class="table withdraw__table">
                                        <thead>
                                        <tr>
                                            <th>Product Details</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Sub Total</th>
                                            <th>Tax</th>
                                            <th>Total</th>
                                             <th>Remove</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         @if(count(Cart::content()) >0)
											<?php 
                                             $completeOrderAmount=0;
                                             $i=1;
                                             foreach(Cart::content() as $row) :
                                               $value = 4455454; 
                                               $urlpID = base64_encode($row->id + $value);
                                               $pName = $row->name;
                                               $urlPname = str_replace(" ","_",$pName);
                                                if($row->options['withGst']=="yes"){
                                                    $totalPercentage = 100 + $row->options['gst']; 
                                                    $productsTax = ($row->price*$row->options['gst'])/$totalPercentage;
                                                    $productsPrice = $row->price - $productsTax;
                                                     ?>
                                                     <tr>
                                                 <th class="ordertable"> <?php
                                                 if(!empty($row->options['image'])){
                                                   $image =  $row->options['image'];
                                                ?> 
                                                    <img src="<?php echo url("uploadFiles/thumbsImg/$image"); ?>" alt="cart product thumbnail">
                                                 <?php
                                                     }
                                                ?>
                                                <a href="<?php echo url("productsDetails/$urlpID/$urlPname"); ?>"><h4 class="ptexable shorth">@if(!empty($row->name)){{ $row->name }} @endif</h4></a>
                                                </th>
                                                <th class="ordertable">Rs. @if(!empty($productsPrice)){{ number_format($productsPrice,2,'.',',') }} @endif</th>
                                         <th class="ordertable"><div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-sm btn-number" id="min-<?php echo $row->id; ?>"  data-type="minus" data-field="">
                                          <span class="lnr lnr-circle-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantityUpdate<?php echo $row->id; ?>" name="quantity" data-rowid="<?php echo $row->rowId; ?>" class="input-number qtynumber" value="{{ $row->qty }}" onkeyup="updateCartItem(this,'<?php echo $row->rowId; ?>')" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-sm btn-number" data-type="plus" id="plus-<?php echo $row->id; ?>" data-field="">
                                            <span class="lnr lnr-plus-circle"></span>
                                        </button>
                                    </span>
                                </div></th>
                                         <th class="ordertable"><?php $pPrice = $productsPrice*$row->qty; echo "Rs.".number_format($pPrice,2,'.',','); ?></th>
                                         <th class="ordertable"> <?php $totaltax = ($pPrice*$row->options['gst'])/100; echo "Rs.".number_format($totaltax,2,'.',',');  ?></th>
                                         <th class="ordertable"><?php $totalSubAmount =  $pPrice + $totaltax; echo "Rs.".number_format($totalSubAmount,2,'.',','); ?></th>
                                         <th class="ordertable">&nbsp; <button id="<?php echo $row->rowId; ?>" class="btn btn-danger removeCart"><span class="lnr lnr-trash"></span></button></th>
                                        </tr>
                                                     <?php
                                                   }
                                                else{
                                                     ?>
                                                     <tr>
                                         <th class="ordertable"> <?php
									     if(!empty($row->options['image'])){
										   $image =  $row->options['image'];
										?> 
                                            <img src="<?php echo url("uploadFiles/thumbsImg/$image"); ?>" alt="cart product thumbnail">
                                         <?php
											 }
										?>
                                        <div class="short_desc">
                                            <a href="<?php echo url("productsDetails/$urlpID/$urlPname"); ?>"><h4 class="ptexable shorth">@if(!empty($row->name)){{ $row->name }} @endif</h4></a>
                                        </div>
                                        </th>
                                         <th class="ordertable">
                                           Rs. @if(!empty($row->options['salePrice'])){{ $row->options['salePrice'] }} @endif
                                         </th>
                                         <th class="ordertable"><div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-sm btn-number" id="min-<?php echo $row->id; ?>"  data-type="minus" data-field="">
                                          <span class="lnr lnr-circle-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantityUpdate<?php echo $row->id; ?>" data-rowid="<?php echo $row->rowId; ?>" name="quantity" class="input-number qtynumber" onkeyup="updateCartItem(this,'<?php echo $row->rowId; ?>')" value="{{ $row->qty }}" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-sm btn-number" data-type="plus" id="plus-<?php echo $row->id; ?>" data-field="">
                                            <span class="lnr lnr-plus-circle"></span>
                                        </button>
                                    </span>
                                </div></th>
                                         <th class="ordertable"><?php $totalgstnotIncludeAmount = $row->options['salePrice'] * $row->qty; echo "Rs.".$totalgstnotIncludeAmount; ?></th>
                                         <th class="ordertable"><?php $totaltaxgstnotInclude =  ($totalgstnotIncludeAmount*$row->options['gst'])/100; echo "Rs.".$totaltaxgstnotInclude;   ?></th>
                                         <th class="ordertable"><span>
                                              <?php
											    $tatalAmounts = $totalgstnotIncludeAmount + $totaltaxgstnotInclude;
											  echo "Rs."; echo round($tatalAmounts);
											  ?>
                                            </span></th>
                                         <th class="ordertable">&nbsp;<button id="<?php echo $row->rowId; ?>" class="btn btn-danger removeCart"><span class="lnr lnr-trash"></span></button>&nbsp;&nbsp;</th>
                                        </tr>
                                                     <?php
                                                   } 
						                        ?>
                                             <?php $i++; endforeach; ?>
                                          
                                         @else
                                          <tr>
                                            <th colspan="5">No Record Found .</th>
                                          </tr> 
                                         @endif
                                         
                                        </tbody>
                                    </table>
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
                                    <a href='{{ url("kanpurizeMarketplace") }}' class="btn btn--round btn--md checkout_link">Continue Shopping </a>
                                    <a href='{{ url("orderDetails") }}' class="btn btn--round btn--md checkout_link">Proceed To Checkout</a>
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
     </div>
    </section>
    <!----section End----->
@stop
@section('footer')
@parent
<script>
function myFunction() {
 document.getElementById("myNumber").stepUp(5);
}
</script>
@stop
