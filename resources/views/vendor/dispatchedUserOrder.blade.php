@extends('layout')
@section('content')
<?php
$listArr = array("1"=>"Advance for Delivery","2"=>"Advance for Pick Up","3"=>"Pay at Delivery","4"=>"Pay at Pick Up");
?>
@include('vendor.template.marketPlacenavigation')
<section class="breadcrumb-area" style="margin-bottom:50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#">Welcome</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Kanpurize the Spirit of Kanpur</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="container-fluid" style="margin-bottom:100px;">
 <div class="row">
   <div class="col-sm-12 col-md-6 col-lg-3">
     @include("vendor.template.vendorOrderSidebar")
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9">
     <div class="table-responsive">
       <?php
	     if(isset($_GET['deleteRow'])){
		    ?>
			<p class="alert alert-danger">Products Transfer on Trash Folder successfully...</p>
			<?php
		  }
	   ?>
       <div class="col-sm-12">
          <div class="form-group pull-right">
             <input type="text" class="searchProducts form-control col-sm-12" placeholder="What you looking for?" />
          </div> 
      </div>
       
        <table class="table table-bordered table-filter" style="padding:20px !important;" id="productsTableList">
          <thead>
           <tr>
              <th>Order Date</th>
              <th>Order ID</th>
              <th>Transaction ID</th>
              <th>No. of Products</th>
              <th>Total Amount</th>
               <th>Delivery Timing</th>
              <th>Payment Mode</th>
              <th colspan="2">Action</th>
           </tr>
          </thead>
          <tbody>
               @if($orderList != FALSE)
				  @foreach($orderList as $list)
				     @php $id = base64_encode($list->id); @endphp
			<tr>
             <input type="hidden" name="orderID" class="orderID" id="orderID" value="@if(!empty($list->id)){{ $list->id }}@endif" />
              <td>@if(!empty($list->orderDate)){{ $list->orderDate }} @endif</td>
               <td>@if(!empty($list->id)){{ "knprzord".$list->id }} @endif</td>
               <td>@if(!empty($list->transactionID)){{ $list->transactionID }} @endif</td>
                <td>@if(!empty($list->totalProducts)){{ $list->totalProducts }} @endif</td>
               <td>@if(!empty($list->totalAmount)){{ "Rs. ".$list->totalAmount }} @endif</td>
                <td>@if(!empty($list->deliverDate)){{ date("d-M-Y",$list->deliverDate)  }} @endif @if(!empty($list->deliverTime)){{ $list->deliverTime  }} @endif</td>
               <td>@if(!empty($list->paymentType)){{ $listArr[$list->paymentType] }} @endif</td>
              <td>
                <a href='#' class="btn btn-warning dispatch" id="dispatch" >Complete</a>
             </td>
           </tr>
				  @endforeach
			   @else
				 <tr>
               <th class="danger" colspan="8">No Records Founds..</th>
             </tr>
			  @endif	 
          </tbody> 
        </table>
     </div>
  </div>
 </div>
</div>
@stop