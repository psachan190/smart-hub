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
                   <form name="" id="" class="form-group" action="<?php echo url("attributeAction"); ?>" method="post">
                      <?php echo csrf_field(); ?>
                     <div class="form-group">
                       <label>Select Shop Category</label>
                       <select class="form-control" name="knp_shopcategory_id" id="knp_shopCat">
                         <option>--select--shop--category--</option>
                         @if(!empty($knp_shopCat))
                            @foreach($knp_shopCat as $shopCat)
                              <option value="{{ $shopCat->cid }}">{{ $shopCat->cname }}</option>
                            @endforeach
                          @endif
                       </select>
                      </div>
                     <div class="form-group">
                       <label>Select category</label>
                       <select class="form-control" name="category_id" id="category_id">
                         <option value="undefined">--select--shop--Category--first--</option>
                       </select>
                      </div>
                     <div class="form-group">
                       <label>Select Sub Category</label>
                       <div class="">
                         <select id="subcategory" name="subcategory" class="form-control">
                            <option value="">--first--select--Subcategory--</option>
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Attribute Name</label>
                       <div class="">
                          <input type="text" id="attributeName" name="attributeName" value="{{ old('attributeName') }}" class="form-control"  required="required" placeholder="Attribute Name "  />
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
  <!----get category--script start--->
  $(document).on('change','#knp_shopCat',function(){
	 var shopCatID = $('#knp_shopCat').val(); 
	   if(shopCatID == 0){
		  alert('Please Select The valid Category Name');
		}
	    else{
		   $.ajax({
                type:'GET',
                url:'<?php echo url("changeCategory"); ?>',
                data:'shopCatID='+shopCatID,
                success:function(res){
				 $('#category_id').html(res);
				}
           });
		}	
	});
  <!----get category--script start--->
});
</script>
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