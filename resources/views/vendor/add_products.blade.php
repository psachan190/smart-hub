@extends("layout")
@section('content')
@include('vendor.template.marketPlacenavigation')
<div class="container-fluid normal-padding">
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
                <li><a href='{{ url("vendor/$vendorData->username/add_products/$catID") }}'><i class="fa fa-angle-double-right"></i>{{ $shoplist->cname }}</a></li>
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
		  <form class="" name="productsForm" id="productsForm" action="<?php echo url("vendor/addProductAction"); ?>"  method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
              <div class="row">
                <input type="hidden" name="vendordetails_id" id="vendordetails_id" value="<?php if(!empty($vendorData))echo $vendorData->id; ?>" readonly />
                <input type="hidden" name="users_id" value="<?php if(!empty($vendorData))echo $vendorData->users_id; ?>" readonly />
                <input type="hidden" name="knp_shopcategory_id" value="<?php if(!empty($shopcatData))echo $shopcatData[0]->cid; ?>" readonly />
                 <input type="hidden" name="shopName" value="<?php if(!empty($shopcatData))echo $shopcatData[0]->cname; ?>" readonly />
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Select Category&nbsp;<span class="prafontanswerstar">*</span></label>
                   <div class="filter__option filter--select">
                   	<div class="select-wrap">
                      <select name="category" id="category" class="" required="required">
                      <option value="0">--Select--Category--</option>
                        @if($shopcatData != FALSE)
						   @foreach($shopcatData as $list)
						     <option value="{{ $list->id }}">{{ $list->csname }}</option>
						   @endforeach  
						@else
						   <option>--No--Category--Found--</option>
						@endif 
                    </select>
                     <span class="lnr lnr-chevron-down"></span>
                    </div>
                    </div>
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                <label>Select Sub Category&nbsp;<span class="prafontanswerstar">*</span> </label>
                <div class="filter__option filter--select">
                   	<div class="select-wrap">
                     <select name="subCategory" id="subCategory" required="required">
                  <option value="0">First--Select--your-Category--</option>
                </select>
                	<span class="lnr lnr-chevron-down"></span>
                	</div>
                </div>
              </div>
                </div>
              </div>
              <div id="attribute">
               <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Select Attribute&nbsp;<span class="prafontanswerstar">*</span></label>
                     <div class="filter__option filter--select">
                   	   <div class="select-wrap">
                         <select name="attribute" id="attribute" class="form-control">
                      <option hidden="hidden">--Select--Category--</option>
                       
                    </select>
                    	 <span class="lnr lnr-chevron-down"></span>
                       </div>
                    </div>
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                <label>Attribute Value&nbsp;<span class="prafontanswerstar">*</span></label>
              <input type="text" name="value" id="value" >
              </div>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                <label>Products Name&nbsp;<span class="prafontanswerstar">*</span></label>&nbsp;&nbsp;
                <label style="color:red;"><?php if ($errors->has('productName')){ echo"Products Name Is required..."; } ?></label>
                <input type="text" name="productName" id="search_text" placeholder="Enter Products Name" value="{{ old('productName') }}" />
              </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>List Price (MRP)&nbsp;<span class="prafontanswerstar">*</span></label>&nbsp;&nbsp;
                   <label style="color:red;" id="listPriceErr"><?php if ($errors->has('listprice')){ echo"Products Price Name Is required..."; } ?></label>
                   <input type="number" name="listprice" id="listprice" placeholder="Enter Products Products" value="{{ old('listprice') }}" onblur="checkPositivenumber(this.value,'list Price','listPriceErr','submit')"  />  
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Sale Price &nbsp;<span class="prafontanswerstar">*</span></label>&nbsp;&nbsp;
                    <label style="color:red;" id="salesPriceErr"><?php if ($errors->has('salePrice')){ echo"Products Sale Price Name Is required..."; } ?></label>
                   <input type="number" name="salePrice" id="salePrice" placeholder="Enter Products Sale Price"  value="{{ old('salePrice') }}"  onblur="checkPositivenumber(this.value,'Sales Price','salesPriceErr','submit')" />  
                   </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                           <label for="withGst"><span class="shadow_checkbox"></span>GST Included in sales Prize</label>&nbsp;&nbsp;<label style="color:red;"><?php if ($errors->has('withGst')){ echo"Products Price Name Is required..."; } ?></label>
                    <div>     
                      <input type="radio" name="withGst" id="withGstyes" checked="checked" value="yes" /> YES
                      <input type="radio" name="withGst" id="withGstNo" value="no" /> NO 
                    </div>
                   <div>
                   </div>  
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>GST Rate( In Percentage )&nbsp;<span class="prafontanswerstar">*</span> </label>&nbsp;&nbsp;
                    <label style="color:red;"><?php if ($errors->has('gstRate')){ echo"Products Sale Price Name Is required..."; } ?></label>
                    <select class="form-control" name="gstRate" id="gstRate">
                      <option value="0">--Select--GST--Price--</option>
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
                   <label>Total Price &nbsp;<span class="prafontanswerstar">*</span></label>&nbsp;&nbsp;
                   <label style="color:red;"><?php if ($errors->has('price')){ echo"Products Price Name Is required..."; } ?></label>
                      <input type="text" name="totalPrice" id="totalPrice" placeholder="Products Total Price" value="{{ old('totalPrice') }}" required="required" />
                   </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Quantity &nbsp;<span class="prafontanswerstar">*</span></label>&nbsp;&nbsp;
                    <label style="color:red;" id="quantityErr"><?php if ($errors->has('quantity')){ echo"Products Quantity Is required..."; } ?></label>
                   <input type="number" name="quantity" id="quantity" placeholder="Enter Products Quantity" value="{{ old('quantity') }}"  />  
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Stock Warning&nbsp;<span class="prafontanswerstar">*</span></label>&nbsp;&nbsp;
                    <label style="color:red;" id="stockwarningErr"><?php if ($errors->has('stockWarning')){ echo"Products Stock Warning Is required..."; } ?></label>
                   <input type="number" name="stockWarning" id="stockWarning" placeholder="Enter Products Stock Quantity" value="{{ old('stockWarning') }}" />  
                   </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Products Image&nbsp;<span class="prafontanswerstar">*</span> </label>
                     <input type="file" name="pImage" id="pImage" value="{{ old('pImage') }}" />  
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
                 <label>Products Description&nbsp;<span class="prafontanswerstar">*</span></label>
                 &nbsp;&nbsp;
                    <label style="color:red;"><?php if ($errors->has('myTextarea')){ echo"Products Description Warning Is required..."; } ?></label>
                  <textarea name="myTextarea" id="myTextarea">{{ old('myTextarea') }}</textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;" >
                <div class="col-sm-12">
                 <label>Products Long Description&nbsp;<span class="prafontanswerstar">*</span></label>
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
                 <span style="float:right;"><a data-toggle="modal" data-target="#hints" class="btn btn--icon btn-sm btn-warning"><span class="lnr lnr-magic-wand"></span>Hints</a></span>
                  <textarea name="metaKeywords" cols="5" placeholder="Enter Products Meta Description"><?php echo old('metaKeywords'); ?></textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Products Meta Details</label>
                 <textarea name="metaDetails" cols="5" placeholder="Enter Products Meta Description"><?php echo old('metaDetails'); ?></textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <button type="submit" id="submit" class="btn btn-md btn--round">Add Products</button>
                </div>
              </div>
          </form>
        </div>
     </div>
  </div>
 </div>
</div>
<!--popup-->
<div class="modal" id="hints" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title1" id="myModalLabel"><i class="text-muted lnr lnr-magic-wand"></i> Products Meta Key Words Hints </h4>
                  </div>
                  <div class="model-body">
                  	<div class="row" style=" padding:20px;">
                    	<div class="col-sm-12">
                        	<p>product in kanpur, top product in kanpur, best webshop kanpur, best clothe in kanpur, top mobile in kanpur, </p>
                        	
                        </div>
                     </div>
                  </div>
                 <div class="modal-footer">       
                </div>
              </div>
            </div>
            </div>
<!--popup end-->
@endsection 
@section('footer')
 @parent
 <script src='{{ asset("validationJS/vendorBackend.js") }}'></script>
 <script src="{{ url('editor/tinymce.min.js') }}" type="text/javascript"></script>
<script src='{{ url("editor/editorBox.js") }}'></script>
@stop