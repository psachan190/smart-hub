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
                            <li class="active"><a href="#">Edit product</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Edit product</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="container-fluid">
 <div class="row normal-padding">
   <div class="col-sm-12 col-md-6 col-lg-3">
     	<div>
         <ul class="mdn-accordion">
           <li class="subtop"><a href="#"><i class="fa fa-random"></i>Add Products Category &nbsp;</a></li>
         <?php
		   if(!empty($goodsshopcategoryList)){
			   $i=1;
		      foreach($goodsshopcategoryList as $shoplist){
				  $catName = str_replace(" ","_",$shoplist->cname); 
				  $catID = $shoplist->cid;
				  
			   ?>
			    <li><a href="<?php echo url("vendor/$vendorData->username/add_products/$catID"); ?>"><i class="fa fa-angle-double-right"></i><?php echo $shoplist->cname; ?></a></li>
               <?php
			  $i++;
			 }
		   }
			 ?> 
            <li><a href="#"><i class="fa fa-chain"></i>  </a></li>
        </ul>
        </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9">
     <div class="post">
        <div class="content">
          {!! Session::has('msg') ? Session::get("msg") : '' !!}
          <?php 
				  foreach($errors->all() as $error){
					echo "<li class='' style='color:red;'>".$error."</li>";  
				  }
			?>	
		<?php
          if(!empty($success)){
			  ?>
			  <p class="alert alert-info"><?php echo $success;exit; ?></p>
			  <?php
			}
		?>
          <form class="" name="productsForm" id="productsForm" action="<?php echo url("vendor/editProductAction"); ?>"  method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
              <div class="row">
                <input type="hidden" name="user_id" value="<?php if(!empty($productsData->users_id))echo $productsData->users_id; ?>" readonly />
                <input type="hidden" name="productsID" value="<?php if(!empty($productsData->id))echo $productsData->id; ?>" readonly />
                 <input type="hidden" name="shopCategory" value="<?php if(!empty($productsData))echo $productsData->knp_shopcategory_id; ?>" readonly />
                 <input type="hidden" name="vendorID" value="<?php if(!empty($productsData))echo $productsData->vendordetails_id; ?>" id="vendordetails_id" readonly />
                 
              
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Select Category </label>
                   		<div class="filter__option filter--select">
                   	   <div class="select-wrap">
                            <select name="category" id="category">
                              <option value="<?php if(!empty($productsData->category_id))echo $productsData->category_id; ?>" ><?php if(!empty($productsData->csname))echo $productsData->csname; ?></option>
                              <option value="0">--Select--Category--</option>
                              <?php
                                if(count($shopcatData) > 0 ){
                                   foreach($shopcatData as $list){
                                       ?>
                                     <option value="<?php echo $list->id; ?>"><?php echo $list->csname; ?></option>
                                       <?php
                                     }
                                 }
                                else{
                                   ?>
                                   <option>--No--Category--Found--</option>
                                   <?php
                                 } 
                              ?>
                            </select>
                             <span class="lnr lnr-chevron-down"></span>
                            </div>
                        </div>
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                <label>Select Sub Category </label>
                <div class="filter__option filter--select">
                   	   <div class="select-wrap">
                        <select name="subCategory" id="subCategory" class="form-control">
                            <option value="<?php if(!empty($productsData->subcategory_id))echo $productsData->subcategory_id; ?>" ><?php if(!empty($productsData->subCatname))echo $productsData->subCatname; ?></option>
                        </select>
                        <span class="lnr lnr-chevron-down"></span>
                </div>
                        </div>
              </div>
                </div>
              </div>
              <div id="attribute">
                <?php
                if($productsAttribute != FALSE){
				   foreach($productsAttribute as $attribute){
					   ?>
				    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                       <label>Attribute </label>
                       <div class="filter__option filter--select">
                   	           <div class="select-wrap">
                                    <select name="productattribute[]" id="productattribute" class="form-control">
                                      <option value="<?php if(!empty($attribute->productsattribute_id))echo $attribute->productsattribute_id; ?>"><?php if(!empty($attribute->name)) echo $attribute->name; ?></option>
                                    </select>
                                    <span class="lnr lnr-chevron-down"></span>
                                 </div>
                             </div>
                       </div>
                    </div>
                    <div class="col-sm-6">
                     <div class="form-group">
                       <label>Attribute Value </label>
                       <input type="text" name="value[]" id="value" value="<?php if(!empty($attribute->value))echo $attribute->value; ?>" />
                     </div>
                    </div>
                   </div>
					   <?php
					 }    
				 }
				?>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                <label>Products Name </label>&nbsp;&nbsp;
                <label style="color:red;"><?php if ($errors->has('productName')){ echo"Products Name Is required..."; } ?></label>
                <input type="text" name="productName" id="search_text" placeholder="Enter Products Name" value="<?php if(!empty($productsData->pName)) echo $productsData->pName; ?>" />
              </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>List Price </label>&nbsp;&nbsp;
                   <label style="color:red;"><?php if ($errors->has('price')){ echo"Products List Price Name Is required..."; } ?></label>
                   <input type="text" name="listprice" id="listprice" placeholder="Enter Products Products" value="<?php if(!empty($productsData->price)) echo $productsData->price; ?>" />  
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Sale Price </label>&nbsp;&nbsp;
                    <label style="color:red;"><?php if ($errors->has('salePrice')){ echo"Products Sale Price Name Is required..."; } ?></label>
                   <input type="text" name="salePrice" id="salePrice" placeholder="Enter Products Sale Price"  value="<?php if(!empty($productsData->salePrice)) echo $productsData->salePrice; ?>" />  
                   </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                           <label for="withGst"><span class="shadow_checkbox"></span>GST Included in sales Prize</label>&nbsp;&nbsp;<label style="color:red;"><?php if ($errors->has('withGst')){ echo"Products Price Name Is required..."; } ?></label>
                    <div> 
                      <input type="hidden" name="gstResultCopy" id="gstResultCopy" value="<?php if(!empty($productsData->withGst))echo $productsData->withGst; ?>">     
                      <input type="radio" name="withGst" id="withGstyes" value="yes" /> YES
                      <input type="radio" name="withGst" id="withGstNo" value="no" /> NO 
                    </div>
                   <div>
                   </div>  
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>GST Rate( In Percentage ) </label>&nbsp;&nbsp;
                    <label style="color:red;"><?php if ($errors->has('gstRate')){ echo"Products Sale Price Name Is required..."; } ?></label>
                    <select class="form-control" name="gstRate" id="gstRate">
                       <option value="<?php if(!empty($productsData->gstRate))echo $productsData->gstRate; ?>"><?php if(!empty($productsData->gstRate))echo $productsData->gstRate; else echo "0"; ?> %</option>
                      <option value="hidden">--Select--GST--Price--</option>
                      <option value="0">0 %</option>
                      <option value="5">5 %</option>
                      <option value="12">12 %</option>
                      <option value="18">18 %</option>
                      <option value="28">28 %</option>
                    </select>
                   </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                   <label>Total Price </label>&nbsp;&nbsp;
                   <label style="color:red;"><?php if ($errors->has('totalPrice')){ echo"Products Price Name Is required..."; } ?></label>
                      <input type="text" name="totalPrice" id="totalPrice" placeholder="Products Total Price" value="<?php if(!empty($productsData->productsAmount)) echo $productsData->productsAmount; ?>" />
                   </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Quantity </label>&nbsp;&nbsp;
                    <label style="color:red;"><?php if ($errors->has('quantity')){ echo"Products Quantity Is required..."; } ?></label>
                   <input type="text" name="quantity" id="quantity" placeholder="Enter Products Quantity" value="<?php if(!empty($productsData->quantity)) echo $productsData->quantity; ?>" />  
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Stock Warning</label>&nbsp;&nbsp;
                    <label style="color:red;"><?php if ($errors->has('stockWarning')){ echo"Products Stock Warning Is required..."; } ?></label>
                   <input type="text" name="stockWarning" id="stockWarning" placeholder="Enter Products Stock Quantity" value="<?php if(!empty($productsData->stockQuantity)) echo $productsData->stockQuantity; ?>" />  
                   </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Products Image </label>
                   <input type="file" name="pImage" id="pImage" />
                   <input type="hidden" id="fileCopy" name="fileCopy" value="<?php if(!empty($productsData->pImage)) echo $productsData->pImage; ?>" />  
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Products Status</label>
                   		<div class="filter__option filter--select">
                   	           <div class="select-wrap">
                                     <select name="pStatus" id="pStatus">
                                      <option value="Y">Publish</option>
                                      <option value="N">Saved In Draft </option>
                                    </select>
                                    <span class="lnr lnr-chevron-down"></span>
                               </div>
                        </div>
                   </div>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Products Description</label>
                 &nbsp;&nbsp;
                    <label style="color:red;"><?php if ($errors->has('myTextarea')){ echo"Products Description Warning Is required..."; } ?></label>
                  <textarea name="myTextarea" id="myTextarea"><?php if(!empty($productsData->pDesription)) echo $productsData->pDesription; ?></textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;" >
                <div class="col-sm-12">
                 <label>Products Long Description</label>
                  <textarea name="myTextarea1" id="myTextarea1"><?php if(!empty($productsData->plongDesription)) echo $productsData->plongDesription; ?></textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Products Detailed Description</label>
                  <textarea name="myTextarea2" id="myTextarea2"><?php if(!empty($productsData->pdetailDescription)) echo $productsData->pdetailDescription; ?></textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Products Meta Key Words</label>
                  <textarea name="metaKeywords" cols="5" placeholder="Enter Products Meta Key Words"><?php if(!empty($productsData->pMetakeyWords)) echo $productsData->pMetakeyWords; ?></textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Products Meta Details</label>
                 <textarea name="metaDetails" cols="5" placeholder="Enter Products Meta Description"><?php if(!empty($productsData->pMetaDetails)) echo $productsData->pMetaDetails; ?></textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <button type="submit" id="submit" class="btn btn-md btn--round">Edit Products</button>
                </div>
              </div>
          </form>
        </div>
     </div>
  </div>
 </div>
</div>
<section class="vendorfooter">
	<div class="container-fluid">
	   <div class="row">
    	<h4 align="center" style="color:#FFF;">2018 All Rights Reserved | by: www.Kanpurize.com</h4>
    </div>
    </div>
</section>
@stop
@section('footer')
  @parent
<script src="<?php echo url('editor/tinymce.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url("editor/editorBox.js"); ?>"></script>
<script>
$(document).ready(function(e) {
  $(document).on('change',"#category",function(){
    var categoryId = $('#category').val();
	var vendordetails_id = $('#vendordetails_id').val();
	 if(categoryId ==0){
	    alert("please Select valid Category Name...");
		 $('#subCategory').html("");
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
<script>
$(document).ready(function(e) {
 var gstResultCopy =  $("#gstResultCopy").val();
 if(gstResultCopy =="yes"){
     $('#withGstyes').attr("checked",true);
   }
 else if(gstResultCopy =="no"){
     $('#withGstNo').attr("checked",true);
   } 
});
</script>
<script>
$(document).ready(function(e) {
  $(document).on('change','#gstRate',function(){
	  var salePrize = $('#salePrice').val(); 
      if($('#withGstyes').is(':checked')){
	     $('#totalPrice').val(salePrize);
	  }
	  else{
	    var gstRate = $('#gstRate').val(); //alert(gstRate);
		var percentageValue = (salePrize*gstRate)/100;
		//alert(percentageValue); 
		 var totalProductsPrice = parseFloat(salePrize) + parseFloat(percentageValue); //alert(totalProductsPrice);
		 if(totalProductsPrice > $('#listprice').val()){
			   alert("producxts total price is not greater than products MRP. rate");
			   $('#totalPrice').attr("readonly",true).val("");
			 }
		    else{
			    $('#totalPrice').val(totalProductsPrice);
		       $('#totalPrice').attr("readonly",true);
			}	 
		
	  }
  });  
});
</script>
<script>
   $(document).ready(function() {
    src = "{{ url('searchajax') }}";
     $("#search_text").autocomplete({
        source: function(request, response) {
		    $.ajax({
                url: src,
                dataType:"json",
                data: { term:request.term },
                success: function(data) {
                   response(data);
                }
            });
        },
        minLength: 3,
    });
});
</script>
@stop 