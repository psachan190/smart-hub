@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard > Add Event Category</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
         <li><i class="fa fa-angle-right"></i> Add Event Category</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
               <a href="<?php echo url("EventCategoryList"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>

&nbsp;Event Category List</a> 
             </div>
             <div class="row" style="margin-bottom:20px;">
                  <div class="col-sm-3"></div>
                   <div class="col-sm-6" style="">
                     {!! Session::has('msg') ? Session::get("msg") : '' !!}
                   </div>
                  <div class="col-sm-3"></div>
             </div>
             <div class="row">      
                <div class="col-sm-3"></div>
                <div class="col-sm-6" style="">
                   <form name="" id="" class="form-group" action="<?php echo url("editEventcategoryAction"); ?>" method="post" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                     <div class="form-group">
                       <label>Category Name</label>
                       <div class="">
                         <span><?php if($errors->has('categoryName')){ echo"<span style='color:red;'>Category name is required. , And Unique..</span>"; } ?></span>
                          <input type="hidden" id="categoryID" name="categoryID" class="form-control" placeholder="Enter Category Name" value="<?php if(!empty($result->id))echo $result->id; ?>" readonly="readonly" />
                         <input type="text" id="categoryName" name="categoryName" class="form-control" placeholder="Enter Category Name" value="<?php if(!empty($result->categoryName))echo $result->categoryName; ?>" />
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Category Description</label>
                       <div class="">
                        <span><?php if($errors->has('eventDescription')){ echo"<span style='color:red;'>Category Description  is required....</span>"; } ?></span>
                         <textarea name="eventDescription" id="eventDescription" placeholder="Category Description" class="form-control" rows="5"><?php if(!empty($result->categoryDescription))echo $result->categoryDescription; ?></textarea>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Priority</label>
                       <div class="">
                         <select id="priority" name="priority" class="form-control">
                           <?php 
						     for($i=1; $i<50; $i++){
							     ?>
						         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>		 
								 <?php
							  }
						   ?>
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="">
                         <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i>&nbsp;Edit </button>
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
@endsection 