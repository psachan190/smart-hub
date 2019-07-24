@extends("layout")
@section('content')
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
                    <h1 class="page-title">Your Order Details</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
   <!----breadcrum-End---->
    <!----section start----->
    <section class="cart_area normal-padding bgcolor">
        <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
              <div id="resultCart"></div>
              		<div class="modules__content">
                            <div class="withdraw_module withdraw_history">
                                <div class="withdraw_table_header">
                                    <h3>Order Details</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table withdraw__table">
                                        <thead>
                                        <tr>
                                            <th>Sn.</th>
                                            <th>Image</th>
                                            <th>Products Name</th>
                                            <th>Rate(Per Item)</th>
                                            <th>Tax (Per Item)</th>
                                            <th>Quantity</th>
                                            <th>Sub Total</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @if($orderDetails != FALSE)
                                          @php $i=1; @endphp
                                             @foreach($orderDetails as $list)
                                        <tr>
                                            <th class="ordertable">@if(!empty($i)){{ $i }}@endif</th>
											<?php
											  if(!empty($list->pImage)){
													  ?>
												<th><img src="<?php echo url("uploadFiles/thumbsImg/$list->pImage"); ?>" alt="<?php echo $list->pImage; ?>"></th>  
												  <?php
												  } 
											?>
                                            <th class="ordertable">@if(!empty($list->pName)){{ $list->pName }}@endif</th>
                                            <th class="ordertable">@if(!empty($list->salePrice)){{ "Rs.". $list->salePrice }}@endif</th>
                                            <th style="display:none;">@if(!empty($list->gst)){{ $list->gst."%" }} @else {{ "N/A"}} @endif</th>
                                            <th class="ordertable">@if(!empty($list->tax)){{ "Rs.". $list->tax }} @else {{ "N/A"}}@endif</th>
                                            <th class="ordertable">@if(!empty($list->qty)){{ $list->qty }}@endif</th>
                                            <th class="ordertable">@if(!empty($list->subTotProductsAmt)){{ "Rs.". $list->subTotProductsAmt }}@endif</th> 
                                        </tr>
                                        @php $i++; @endphp
                                     @endforeach
                                   @endif
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
              </div>
            </div>
        </div>
    </section>
    <!----section End----->
@stop
