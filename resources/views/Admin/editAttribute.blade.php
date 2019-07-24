@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard > Add Products Attribute</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
         <li><i class="fa fa-angle-right"></i> Add Products Attribute</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
               <a href="<?php echo url("attributeList"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>
&nbsp;Attribute List</a> 
             </div>
             <div class="row">
                   <div class="col-sm-3"></div>
                   <div class="col-sm-6">
                     {!! Session::has('msg') ? Session::get("msg") : '' !!}
                      @foreach($errors->all() as $error)
                       <li class='' style='color:red;'>{{ $error }}</li>
                      @endforeach  
                      <ul>
                   </div>
                   <div class="col-sm-3"></div> 
                  
             </div>
             <div class="row">      
                <div class="col-sm-3"></div>
                <div class="col-sm-6" style="">
                   <form name="" id="" class="form-group" action="<?php echo url("editAttributeAction"); ?>" method="post">
                      <?php echo csrf_field(); ?>
                     <div class="form-group">
                      <input type="hidden" name="editID" id="editID" value="<?php echo $attributeID; ?>" readonly="readonly">
                       <label>Select Category</label>
                       <div class="">
                         <select id="category_id" name="category_id" class="form-control">
                          <option value="hidden">--Select--category--</option>
                           <option value="<?php if(!empty($attributeDetails->category_id)){ echo $attributeDetails->category_id; } ?>"><?php if(!empty($attributeDetails->csname)){ echo $attributeDetails->csname; } ?></option> 
                           @if($categoryList != FALSE)
                             @foreach($categoryList as $list)
                               <option value="{{ $list->id }}">{{ $list->csname }}</option>
                             @endforeach
                           @endif
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Select Sub Category</label>
                       <div class="">
                         <select id="subcategory" name="subcategory" class="form-control">
                            <option value="<?php if(!empty($attributeDetails->subcategory_id)){ echo $attributeDetails->subcategory_id; } ?>"><?php if(!empty($attributeDetails->subCatname)){ echo $attributeDetails->subCatname; } ?></option> 
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Attribute Name</label>
                       <div class="">
                          <input type="text" id="attributeName" name="attributeName" value="<?php if(!empty($attributeDetails->name)){ echo $attributeDetails->name; } ?>" class="form-control"  required="required" placeholder="Attribute Name "  />
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Attribute Value</label>
                       <div class="">
                          <input type="text" id="attributeValue" name="attributeValue" value="<?php if(!empty($attributeDetails->value)){ echo $attributeDetails->value; } ?>" class="form-control"  required="required" placeholder="Attribute Value "  />
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Status</label>
                       <div class="">
                         <select id="status" name="status" class="form-control">
                           <option value="Y">Publish</option>
                           <option value="Y">Save In Draft</option>
                         </select> 
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="">
                         <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add </button>
                       </div>
                     </div>
                   </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
         </div>
     </div>
      <!-- Main row --> 
    </section>
<script>
 $(document).ready(function(e) {
  <!----get sub category--script start--->
  $(document).on('change','#category_id',function(){
    var category_id = $('#category_id').val(); //alert(category_id);
	 if(category_id=="hidden"){
	   alert("please Select valid category");
	   }
	 else{
	      $.ajax({
                type:'GET',
                url:'<?php echo url("changeAllSubCategory"); ?>',
                data:'category_id='+category_id,
                success:function(res){
				 $('#subcategory').html(res);
				}
           });
	   }  
  });
  <!----get sub category--script start--->	
});
</script>
@endsection 