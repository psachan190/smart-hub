@extends("vendor.template.masterVendor")
@section('content')
<div class="container-fluid" style="margin-bottom:100px;">
 <div class="row">
   <div class="col-sm-12 col-md-6 col-lg-3">
       @if($serviceShop != FALSE)
       <div>
         <ul class="mdn-accordion">
           <li class="subtop"><a href="#"><i class="fa fa-random"></i>Services &nbsp;</a></li>
          @if(!empty($serviceShop))
			  @php  $i=1; @endphp
		       @foreach($serviceShop as $shoplist)
				 @php
                  $shopName = str_replace(" ","_",$shoplist->cname); 
				  $shopID = base64_encode($shoplist->cid);
			     @endphp
                <li><a href='{{ url("kanpurize_addServicesDetails/$shopName/$shopID") }} '><i class="fa fa-angle-double-right"></i>{{ $shoplist->cname }}</a></li>
              @php $i++; @endphp
			    @endforeach
		   @endif
		    <li><a href="#"><i class="fa fa-chain"></i>  </a></li>
        </ul>
        </div>
		@endif
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9">
     <div class="post1">
        <div class="content">
            @if(count($serviceList) >0)
			       @foreach($serviceList as $list)
                      <div class="col-xs-12 col-sm-6 col-lg-12">
    	    <div class="panel panel-default">
    		    <div class="panel-body">
    					<div class="icerik-bilgi">
    					    <h2><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;<?php if(!empty($list->vName)){ echo $list->vName; } ?></h2><hr />
    						
                            <p class="listHeading"><i class="icongly fa fa-tags"></i>&nbsp;Services&nbsp;(<?php if(!empty($list->cname)){ echo $list->cname; } ?>)</p>
                            <div class="linespace"></div>
                            <p id="shop"></p>
    						<p><?php if(!empty($list->serviceDescription)) { echo $list->serviceDescription; } ?></p>
    						<p class="listHeading"><i class="icongly fa fa-tag"></i>&nbsp;Prime Services</p>
                            <div class="linespace"></div>
                            <p><?php if(!empty($list->primeServices)) { echo $list->primeServices; } ?></p>
    						<p class="listHeading"><i class="icongly fa fa-tag"></i>&nbsp;Our Services</p>
                            <div class="linespace"></div>
                            <p> <?php if(!empty($list->ourServices)) { echo $list->ourServices; } ?>  </p>
    						<p class="listHeading"><i class="icongly fa fa-mobile-phone"></i>&nbsp;Info Mobile</p>
                            <div class="linespace"></div>
                            <p><?php if(!empty($list->infoMobile)) { echo $list->infoMobile; } ?> </p>
					        <p class="listHeading"><i class="icongly fa fa-clock-o"></i>&nbsp;Timming</p>
                            <div class="linespace"></div>
                            <p><?php if(!empty($list->timming)) { echo $list->timming; } ?> </p>
                            <p class="listHeading"><i class="icongly fa fa-tag"></i>&nbsp;Weakly Off</p>
                            <div class="linespace"></div>
                             <p><?php if(!empty($list->weaklyOff)) { echo $list->weaklyOff; } ?> </p>
                             <p class="listHeading"><i class="icongly fa fa-tag"></i>&nbsp;Description</p>
                             <div class="linespace"></div>
                            <p><?php if(!empty($list->metaKeywords)) { echo $list->metaKeywords; } ?></p>
                            <div><hr />
    						  <a class="btn btn-md btn--round" href='{{ url("kanpurize_editServiceDetails")."/".base64_encode($list->id) }} '><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit</a>	
    						</div>
    					</div>
    				
    			</div>
    		</div>
        </div>
                   @endforeach
			 @else
			    <h2>No Services Available.....</h2>
			 @endif   
		</div>
     </div>
  </div>
 </div>
</div>
@endsection 