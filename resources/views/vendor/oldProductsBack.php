@extends("vendor.template.masterVendor")
@section('content')
<div class="container-fluid" style="margin-bottom:100px;">
 <div class="row">
   <div class="col-sm-12 col-md-6 col-lg-3">
     	<div>
         <ul class="mdn-accordion">
           <li class="subtop"><a href="#"><i class="fa fa-random"></i>Products Category &nbsp;</a></li>
           @if(!empty($goodsshopcategoryList))
			  @foreach($goodsshopcategoryList as $shoplist)
				 @php
                  $catName = str_replace(" ","_",$shoplist->cname); 
				  $catID = $shoplist->cid;
			     @endphp
                <li><a href='{{ url("kanpurize_addProducts_list?shop=$vresultData->id&category=$catID&$catName") }}'><i class="fa fa-angle-double-right"></i>{{ $shoplist->cname }}</a></li>
              @endforeach 
            @endif
			<!-- end accordion panel -->
            <!-- end accordion panel -->
            <li><a href="#"><i class="fa fa-chain"></i>  </a></li>
        </ul>
        </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9">
     <div class="post">
     <style>
          .headingMain{ font-size:20px; color:#F00; font-weight:700; }
          </style>
        <div class="content">
           <h2 class="headingMain">Add <?php if(!empty($shopcatData))echo $shopcatData[0]->cname; ?> Products </h2>
          @foreach($errors->all() as $error)
			<li class='' style='color:red;'>{{ $error }}</li>
		  @endforeach  
          {!! Session::has('msg') ? Session::get("msg") : '' !!}
		  <form class="" name="productsForm" id="productsForm" action="<?php echo url("addProductAction"); ?>"  method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
              <div class="row">
                <input type="hidden" name="vendordetails_id" id="vendordetails_id" value="<?php if(!empty($vresultData))echo $vresultData->id; ?>" readonly />
                <input type="hidden" name="users_id" value="<?php if(!empty($vresultData))echo $vresultData->users_id; ?>" readonly />
                <input type="hidden" name="knp_shopcategory_id" value="<?php if(!empty($shopcatData))echo $shopcatData[0]->cid; ?>" readonly />
                 <input type="hidden" name="shopName" value="<?php if(!empty($shopcatData))echo $shopcatData[0]->cname; ?>" readonly />
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Select Category </label>
                    <select name="category" id="category" class="form-control">
                      <option value="0">--Select--Category--</option>
                        @if($shopcatData != FALSE)
						   @foreach($shopcatData as $list)
						     <option value="{{ $list->id }}">{{ $list->csname }}</option>
						   @endforeach  
						@else
						   <option>--No--Category--Found--</option>
						@endif 
                    </select>
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                <label>Select Sub Category </label>
                <select name="subCategory" id="subCategory" class="form-control">
                  <option value="Category One">First--Select--your-Category--</option>
                </select>
              </div>
                </div>
              </div>


              <div id="attribute">
               <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Select Attribute </label>
                    <select name="attribute" id="attribute" class="form-control">
                      <option value="0">--Select--Category--</option>
                       
                    </select>
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                <label>Attribute Value </label>
              <input type="text" name="value" id="value" >
              </div>
                </div>
              </div>
            </div>


              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                <label>Products Name </label>&nbsp;&nbsp;
                <label style="color:red;"><?php if ($errors->has('productName')){ echo"Products Name Is required..."; } ?></label>
                <input type="text" name="productName" id="productName" class="form-control" placeholder="Enter Products Name" value="{{ old('productName') }}" />
              </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Price </label>&nbsp;&nbsp;
                   <label style="color:red;"><?php if ($errors->has('price')){ echo"Products Price Name Is required..."; } ?></label>
                   <input type="text" name="price" id="price" class="form-control" placeholder="Enter Products Products" value="{{ old('price') }}" />  
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Sale Price </label>&nbsp;&nbsp;
                    <label style="color:red;"><?php if ($errors->has('salePrice')){ echo"Products Sale Price Name Is required..."; } ?></label>
                   <input type="text" name="salePrice" id="salePrice" class="form-control" placeholder="Enter Products Sale Price"  value="{{ old('salePrice') }}" />  
                   </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Quantity </label>&nbsp;&nbsp;
                    <label style="color:red;"><?php if ($errors->has('quantity')){ echo"Products Quantity Is required..."; } ?></label>
                   <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Enter Products Quantity" value="{{ old('quantity') }}" />  
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Stock Warning</label>&nbsp;&nbsp;
                    <label style="color:red;"><?php if ($errors->has('stockWarning')){ echo"Products Stock Warning Is required..."; } ?></label>
                   <input type="text" name="stockWarning" id="stockWarning" class="form-control" placeholder="Enter Products Stock Quantity" value="{{ old('stockWarning') }}" />  
                   </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Products Image </label>
                   <input type="file" name="pImage" id="pImage" class="form-control" value="{{ old('pImage') }}" />  
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Products Status</label>
                     <select name="pStatus" id="pStatus" class="form-control">
                      <option value="Y">Publish</option>
                      <option value="N">Saved In Draft </option>
                    </select>
                   </div>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Products Description</label>
                 &nbsp;&nbsp;
                    <label style="color:red;"><?php if ($errors->has('myTextarea')){ echo"Products Description Warning Is required..."; } ?></label>
                  <textarea name="myTextarea" id="myTextarea">{{ old('myTextarea') }}</textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;" >
                <div class="col-sm-12">
                 <label>Products Long Description</label>
                  <textarea name="myTextarea1" id="myTextarea1">{{ old('myTextarea1') }}</textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Products Detailed Description</label>
                  <textarea name="myTextarea2" id="myTextarea2"><?php echo old('myTextarea2');  ?></textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Products Meta Key Words</label>
                  <textarea name="metaKeywords" class="form-control" cols="5" placeholder="Enter Products Meta Description"><?php echo old('metaKeywords'); ?></textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Products Meta Details</label>
                 <textarea name="metaDetails" class="form-control" cols="5" placeholder="Enter Products Meta Description"><?php echo old('metaDetails'); ?></textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <button type="submit" id="submit" class="btn btn-success">Add Products</button>
                </div>
              </div>
          </form>
        </div>
     </div>
  </div>
 </div>
</div>
<script src="{{ url('public/kanpurizeTheme/editor/tinymce.min.js') }}" type="text/javascript"></script>
<script src='{{ url("public/kanpurizeTheme/editor/editorBox.js") }}'></script>
<script>
$(document).ready(function(e) {
  $(document).on('change',"#category",function(){
    var categoryId = $('#category').val();
	var vendordetails_id = $('#vendordetails_id').val();
	 if(categoryId ==0){
	    alert("please Select valid Category Name...");
	   }
	 else{
		 $.ajax({
                type:'GET',
                url:'{{ url("changeSubcategory") }}',
                data:{categoryId:categoryId,shopID:vendordetails_id},
                success:function(res){
					//console.log(res);
				 $('#subCategory').html(res);
				}
          });

      $.ajax({
                type:'GET',
                url:'{{ url("getAttribue") }}',
                data:{categoryId:categoryId,shopID:vendordetails_id},
                success:function(res){
          //console.log(res);
         $('#attribute').html(res);
        }
          });

	  }   
  })  
});
</script>
@endsection 