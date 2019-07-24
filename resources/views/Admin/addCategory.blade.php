@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard > Add Category</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
         <li><i class="fa fa-angle-right"></i> Add Category</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
               <a href="<?php echo url("categoryList"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>

&nbsp;Shop Category List</a> 
             </div>
             <div class="row">
                  <ul>
                 
				  <?php
                   if(isset($_GET['success']))
                   {
                      ?>
                      <div style="color:#0C3; margin-top:10px;"><label><strong>Record added Successfully !!!</strong></label>
                      <script>setTimeout("window.location.href='<?php echo url('addCategory'); ?>'",2000);</script>
                      </div> 
                      <?php   
                   }
                  ?>
             </div>
             <div class="row">      
                <div class="col-sm-3"></div>
                <div class="col-sm-6" style="">
                   <form name="" id="" class="form-group" action="<?php echo url("categoryAction"); ?>" method="post" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                     <div class="form-group">
                       <label>Business Type</label>
                       <div class="">
                         <select id="businessType" name="businessType" class="form-control">
                           <option value="1">Goods </option>
                           <option value="2">Services </option>
                           <option value="3">Both</option>
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Category Name</label>
                       <div class="">
                         <span><?php if($errors->has('cname')){ echo"<span style='color:red;'>Category name is required. , And Unique..</span>"; } ?></span>
                         <input type="text" id="cname" name="cname" value="" class="form-control" placeholder="Enter Category Name" />
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Priority</label>
                       <div class="">
                         <select id="priority" name="priority" class="form-control">
                           <?php 
						     for($i=1; $i<20; $i++){
							     ?>
						         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>		 
								 <?php
							  }
						   ?>
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Category Description</label>
                       <div class="">
                        <span><?php if($errors->has('cDescription')){ echo"<span style='color:red;'>Category Description  is required....</span>"; } ?></span>
                         <textarea name="cDescription" id="cDescription" placeholder="Category Description" class="form-control" rows="5"></textarea>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Category icon</label>
                       <div class="">
                        <span><?php if($errors->has('categoryIcon')){ echo"<span style='color:red;'>Shop Category Icon  is required....</span>"; } ?></span>
                         <input type="file" name="categoryIcon" id="categoryIcon" class="form-control" required="required" />
                          
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
@endsection 