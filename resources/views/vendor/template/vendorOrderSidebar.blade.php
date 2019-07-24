<div>
         <ul class="mdn-accordion">
           <li class="subtop"><a href="#"><i class="fa fa-random"></i>Order List &nbsp;</a></li>
		  	<li><a href='{{ url("vendor/$vendorData->username/orderList") }}'><i class="fa fa-angle-double-right"></i>&nbsp;New Order</a></li>
            <li><a href='{{ url("vendor/$vendorData->username/confirmUserOrder") }}'><i class="fa fa-angle-double-right"></i>&nbsp;Confirm Order</a></li>
            <li><a href='{{ url("vendor/$vendorData->username/dispatchedUserOrder") }}'><i class="fa fa-angle-double-right"></i>&nbsp;Dispatched Order</a></li>
            <li><a href='{{ url("vendor/$vendorData->username/completeOrder") }}'><i class="fa fa-angle-double-right"></i>&nbsp;Complete Order</a></li>
            <li><a href='{{ url("vendor/$vendorData->username/cancelUserOrder") }}'><i class="fa fa-angle-double-right"></i>&nbsp;Cancel Order</a></li>
            <li><a href="#"><i class="fa fa-chain"></i>  </a></li>
        </ul>
        </div>