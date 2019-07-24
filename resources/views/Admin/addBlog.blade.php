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
               <a href="<?php echo url("kanpurizeblogList"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>

&nbsp;Blog List</a> 
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
               <div class="col-sm-4">
               <ul>
                 <?php 
				  foreach($errors->all() as $error){
					echo "<li class='' style='color:red;'>".$error."</li>";  
				  }
				  ?>
                 </ul>
                  @if (session('msg'))
                 <div class="">
                    <?php echo session('msg'); ?>
                 </div>
                 @endif
                </div>
                 <div class="col-sm-3"></div> 
             </div>
             <div class="row">      
                <div class="col-sm-3"></div>
                <div class="col-sm-6" style="">
                   <form name="" id="" class="form-group" action="<?php echo url("addblogPost"); ?>" method="post" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                    <div class="form-group">
                       <label>Blog Title</label>
                       <div class="">
                         <input type="text" id="title" name="title" value="<?php echo old("title"); ?>" class="form-control" placeholder="Enter Blog Title" />
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Blog  Description</label>
                       <div class="">
                       <textarea name="description" id="description" placeholder="Enter blog Description" class="form-control" rows="20" cols='10'>
                        <?php echo old("description"); ?></textarea>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Blog Image</label>
                       <div class="">
                         <input type="file" name="image" id="image" class="form-control" required="required" />
                         <input type="text" name="imageCopy" id="imageCopy" class="form-control" value="" />
                       </div>
                     </div>
                     <select id="status" name="status" class="form-control">
                           <option value="Y">Publish </option>
                           <option value="N">Save in draft</option>
                         </select>
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