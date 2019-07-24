@include("vendor.template.listingPageHeader")
<section class="breadcrumb-area" style="margin-bottom:50px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurize_Vendor_dashboard') }}">Welcome</a></li>
                            <li><a href="{{ url('kanpurize_Vendor_dashboard') }}">Dashboard</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title"><?php if(!empty($vresultData->vName))echo $vresultData->vName; ?></h1>
                </div>
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="container-fluid" style="margin-bottom:100px;">
 <div class="row">
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
                       <p><small>
                         <a href='{{ url("kanpurize_addProductsInoffer/$editID/$urlTitle") }}'>Add Products</a>
                       </small>
                       &nbsp;<small>
                         <a href='{{ url("approveOfferPost/$editID/$urlTitle") }}'>Products List</a>
                       </small>
                       </p>
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
   <div class="col-sm-12 col-md-9 col-lg-9">
     <div class="table-responsive">
      <meta name="csrf-token" content="{{ csrf_token() }}" /> 
       <form id="saveInoffer" name="saveInoffer"> 
        <?php echo csrf_field(); ?> 
        <div class="col-sm-12">
          <div class="form-group pull-left">
            <input type="hidden" name="offerID" name="offerID" value="<?php if(!empty($offerID)) echo $offerID; ?>" readonly="readonly" />
             <button type="submit" style="background-color:#063; color:#FFF;" class="saveProducts form-control col-sm-12"><strong>Save Products</strong></button>
          </div>
          <div class="form-group pull-right">
             <input type="text" class="searchProducts form-control col-sm-12" placeholder="What you looking for?" />
          </div> 
      </div>
        <table class="table table-bordered table-filter" style="padding:20px !important;" id="productsTableList">
          <thead>
           <tr>
             <th>
             <div class="custom_checkbox form-check">
                            <input type="checkbox" name="selectAll" id="selectAll" class="selectAll" />&nbsp;
                             <label for="selectAll">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;Select all</span>
                             </label>
                          </div>
             </th>
              <th>Image</th>
              <th>Products Name</th>
              <th>Price</th>
              <th>Sale Price</th>
           </tr>
          </thead>
          <tbody>
               @if($productList != FALSE)
				  @foreach($productList as $list)
				     @php $id = base64_encode($list->id);
					      $shopID = base64_encode($vresultData->id);
                          $image=$list->pImage;
					 @endphp
			<tr>
            
              <td><div class="custom_checkbox form-check">
                            <input type="checkbox" name="checkedID[]" id="checkedbox{{ $list->id }}" class="allCheckbox" value="<?php if(!empty($list->id))echo $list->id; ?>" />&nbsp;
                             <label for="checkedbox{{ $list->id }}">
                               <span class="shadow_checkbox"></span>
                             </label>
                          </div></td>
              <td><img src='{{ url("uploadFiles/thumbsImg/$image") }}' style="height:50px; width:50px;"></th>
              <td>@if(!empty($list->pName)){{ $list->pName }} @endif</td>
              <td> @if(!empty($list->price)){{ $list->price }} @endif</td>
              <td>@if(!empty($list->salePrice)){{ $list->salePrice }} @endif</td>
           </tr>
           
				  @endforeach
			   @else
				 <tr>
               <th class="danger" colspan="6">No Records Founds..</th>
             </tr>
			  @endif	 
          </tbody> 
        </table>
       </form> 
        <div class="col-sm-12">
          <div class="form-group pull-center">
            @if($productList != FALSE)
              {{ $productList->render() }}
            @endif
          </div> 
      </div>
     </div>
  </div>
 </div>
</div>
<script>
$(document).ready(function(e) {
 $.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
  $(document).on('submit',"#saveInoffer",(function(e) {
	 //$('#submitServices').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 var con = confirm("Are  you sure want to products Save in offer");
      if(con == true){ 
		  e.preventDefault();
		  $.ajax({
		  url: "<?php echo url("productsInoffer"); ?>",
		  type: "POST",        
		  data: new FormData(this),
		  contentType: false,
		  cache: false,
		  processData:false,  
		  success: function(data){
			 //$('#submitServices').html('<i class="glyphicon glyphicon-plus"></i> Add Services').attr('disabled',false); 
			 alert(data);							
		   }	
		 });
	   }
  }));
});
</script>
<script>
$(document).ready(function(e) {
  $(document).on('click','.selectAll:checkbox',function(){
  if($(this).is(':checked')){
	   $(".allCheckbox:checkbox").attr('checked',true);
	 }
  else{
	   $(".allCheckbox:checkbox").removeAttr('checked');
	 }	 
 });  
});
</script>

@include("vendor.template.listingPageFooter")