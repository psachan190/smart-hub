@extends("layout")
@section('content')
 @include('vendor.template.marketPlacenavigation')
  <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href='{{ url("vendorBackup/$vendorData->id/firstDashborad") }}'>Welcome</a></li>
                            <li class="active"><a href="#">Approve Offers and news</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Approve Offers and news</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="container-fluid">
 <div class="row normal-padding">
   <div class="col-sm-12 col-md-6 col-lg-3">
      <div class="widget-sidebar" id="sidebarRef">
        <h2 class="title-widget-sidebar">RECENT POST</h2>
           <div class="content-widget-sidebar back">
            <ul>
              @if($offerNewsList != FALSE)
				   @foreach($offerNewsList as $list)
					  @php
                       $image = $list->image;
					   $editID = base64_encode($list->id); 
                       $urlTitle = str_replace(" ","_",$list->newsTitle);
					  @endphp
					  <li class="recent-post">
                        <div class="post-img">
                          @if($image != "default.jpg")
                           <img src='{{ url("uploadFiles/offersNews/$image") }}' class="img-responsive">
                          @endif
                        </div>
                        <h5><small>@if(!empty($list->newsTitle)) {{ $list->newsTitle }} @endif<small></h5>
                       <p><small><i class="fa fa-calendar" data-original-title="" title=""></i>&nbsp;
					      @php
                             $strDate = strtotime($list->created_at);
                          @endphp
                         {{ date("d-M-Y h:i:sa", $strDate) }}
                       </small></p>
                       
                        <?php
                         if(!empty($list->discountMode)){
						     ?>
							 <p><small>
                         <a href='{{ url("vendor/$vendorData->username/addProductsinOffer/$editID") }}'>Add Products</a>
                       </small>
                       &nbsp;<small>
                         <a href='{{ url("vendor/$vendorData->username/approveOfferNews/$editID") }}'>Products List</a>
                       </small>
                       </p>
							 <?php  
						  }
					    ?>  
                     </li>
                       <hr>
				   @endforeach
			  @else
				<li class="recent-post">
                <div class="post-img">
                  No Ads Post Available
                 </div>
                </li>
                <hr>
           	  @endif
            </ul>
           </div>
        <p><center>
           @if($offerNewsList != FALSE)
           {{ $offerNewsList->render() }}
           @endif
        </center></p> 
      </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9" style="margin-top:33px;">
     <div class="post">
        <div class="content">
          <h2 class="headingMain">Approve Offers and news</h2>
        </div>
       @if($productsList != FALSE) 
        <div class="">
          <table class="table table-bordered table-filter" style="padding:20px !important;" id="productsTableList">
          <thead>
           <tr>
             <th>Image</th>
              <th>Products Name</th>
              <th>List Price</th>
              <th>Sale Price</th>
              <th colspan="2">Action</th>
           </tr>
          </thead>
          <tbody>
               @if($productsList != FALSE)
				  @foreach($productsList as $list)
				     @php $id = base64_encode($list->id);
                        $image=$list->pImage;
					 @endphp
			<tr>
              <td><img src='{{ url("uploadFiles/thumbsImg/$image") }}' style="height:50px; width:50px;"></th>
              <td>@if(!empty($list->pName)){{ $list->pName }} @endif</td>
              <td> @if(!empty($list->price)){{ $list->price }} @endif</td>
              <td>@if(!empty($list->salePrice)){{ $list->salePrice }} @endif</td>
              <td>@if(!empty($list->quantity)){{ $list->quantity }} @endif</td>
              <td>
               <button type="button" class="btn btn-sm btn-danger rowID" id="<?php if(!empty($list->id))echo $list->id; ?>"><i class="lnr lnr-trash"></i></button>
                            </td>
           </tr>
				  @endforeach
			   @else
				 <tr>
               <th class="danger" colspan="6">No Records Founds..</th>
             </tr>
			  @endif	 
          </tbody> 
        </table>
        </div>
       @endif        
     </div>
  </div>
 </div>
</div>
@stop
@section('footer')
  @parent
<script>
$(document).ready(function(e) {
  $(document).on('click',".rowID",(function(e) {
	  var rowID = this.id;
      var con = confirm("Are you sure want to remove this Products in offers .");
	  if(con == true){
		  $.ajax({
		  url: "<?php echo url("vendorAgax/removeProductsinOffer"); ?>",
		  type: "GET",        
		  data: {rowID:rowID}, 
		  success: function(data){ 
			alert(data);
			location.reload();
		   }	
		 });
	  }
  }));
});
</script>
@stop
 