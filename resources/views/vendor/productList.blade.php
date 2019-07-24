@include("vendor.template.listingPageHeader")
<section class="breadcrumb-area" style="margin-bottom:50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurize_Vendor_dashboard') }}">Welcome</a></li>
                            <li><a href="{{ url('kanpurize_Vendor_dashboard') }}">Dashboard</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title"><?php if(!empty($vresultData->vName))echo $vresultData->vName; ?></h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="container-fluid" style="margin-bottom:100px;">
 <div class="row">
   <div class="col-sm-12 col-md-6 col-lg-3">
     	<div>
         <ul class="mdn-accordion">
           <li class="subtop"><a href="#"><i class="fa fa-random"></i>Products List Category &nbsp;</a></li>
		   @if(!empty($goodsshopcategoryList))
			  @php $i=1; @endphp
		      @foreach($goodsshopcategoryList as $shoplist)
                @php  $catName = str_replace(" ","_",$shoplist->cname); 
				      $catID = $shoplist->cid;
				@endphp 
			    <li><a href='{{ url("productsList?shopID=$vresultData->id&category=$catID&$catName") }}'><i class="fa fa-angle-double-right"></i>{{ $shoplist->cname }}</a></li>
              @php $i++; @endphp
			  @endforeach
		   @endif
             <li><a href='{{ url("trashProductsFolder") }}'><i class="fa fa-angle-double-right"></i>Trash Folder</a></li>
			<!-- end accordion panel -->
            <!-- end accordion panel -->
            <li><a href="#"><i class="fa fa-chain"></i>  </a></li>
        </ul>
        </div>
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
             <th>Shop Category <strong>>></strong>Category</th>
              <th>Image</th>
              <th>Products Name</th>
              <th>Price</th>
              <th>Sale Price</th>
              <th>Quantity</th>
              <th colspan="2">Action</th>
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
              <td>@if(!empty($list->cname)){{ $list->cname }} <strong>>> </strong> {{ $list->csname }} @endif</td>
              <td><img src='{{ url("uploadFiles/thumbsImg/$image") }}' style="height:50px; width:50px;"></th>
              <td>@if(!empty($list->pName)){{ $list->pName }} @endif</td>
              <td> @if(!empty($list->price)){{ $list->price }} @endif</td>
              <td>@if(!empty($list->salePrice)){{ $list->salePrice }} @endif</td>
              <td>@if(!empty($list->quantity)){{ $list->quantity }} @endif</td>
              <td>
               <a href='{{ url("Kanpurize_Vendor_productsDetails?productsid=$id&kanpurizeShop=$shopID") }}'  class="btn btn-sm btn--round btn-success">Products Details</a>
                            <a href='{{ url("Kanpurize_Vendor_productsEdit?productsid=$id&kanpurizeShop=$shopID") }}' class="btn btn-sm btn--round">Edit</a>
                            <a href='{{ url("Kanpurize_Products_moreImage?productsid=$id&kanpurizeShop=$shopID") }}' class="moreimagesadd btn btn-sm btn--round btn-warning">Add MoreImage</a>
                              <button class="btn btn-sm btn--round btn-danger trashProducts" id="{{ $list->id }}">Delete</button>
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
  </div>
 </div>
</div>
<script>
$(document).ready(function(e) {
  $(document).on('click',".trashProducts",(function(e) {
    var con = confirm("Are  you sure want to products goes on trash folder.");
     if(con == true){ 
		var productsID =  this.id; //alert(productsID);
		var trashstatus="Y";
		$(this).html("please Wait..").attr('disabled',true);
		$.ajax({
			type:'GET',
			url:'<?php echo url("kanpurize_deleteProducts"); ?>',
			data:{productsID:productsID,trashstatus:trashstatus},
			success:function(res){
			 location.reload();
			}
		});
		} 	  
  }));  
});
</script>
@include("vendor.template.listingPageFooter")