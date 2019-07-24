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
               <a href="<?php echo url("sCategorylist"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>

&nbsp; Category List</a> 
             </div>
             <div class="row">
                  <?php 
				  foreach($errors->all() as $error){
					echo "<li class='' style='color:red;'>".$error."</li>";  
				  }
				  ?>
                 </ul>
				  <?php
                   if(isset($_GET['success']))
                   {
                      ?>
                      <div style="color:#0C3; margin-top:10px;"><label><strong>Record added Successfully !!!</strong></label>
                      <script>setTimeout("window.location.href='<?php echo url('addsCategory'); ?>'",1000);</script>
                      </div> 
                      <?php   
                   }
                  ?>
             </div>
             <div class="row">      
                <div class="col-sm-3"></div>
                <div class="col-sm-6" style="">
                   <form name="" id="" class="form-group" action="<?php echo url("editscategoryAction"); ?>" method="post">
                      <?php echo csrf_field(); ?>
                     <div class="form-group">
                        <input type="hidden" id="editID" name="editID" value="<?php if(!empty($CategoryDetails->id)) echo $CategoryDetails->id; ?>" class="form-control"/>

                       <label>Select Shop Category</label>
                       <div class="">
                         <select name="shopCat" id="shopCat" class="form-control">
                            <?php
                              if(!empty($CategoryDetails->cname)){
								  ?>
								 <option value="<?php echo $CategoryDetails->cid; ?>"><?php echo $CategoryDetails->cname; ?></option>
								  <?php
								}
							?>
                            <?php foreach($listArr as $list): ?>
                            <option value="<?php echo $list->cid; ?>"><?php echo $list->cname; ?></option>
                            <?php endforeach; ?>
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Category Name</label>
                       <div class="">
                         <input type="text" id="cname" name="cname" value="<?php  if(!empty($CategoryDetails->cname)){ echo $CategoryDetails->cname; } ?>" class="form-control" />
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
                         <textarea name="cDesc" id="cDesc" placeholder="Category Description" class="form-control" rows="5"><?php  if(!empty($CategoryDetails->cDesc)){ echo $CategoryDetails->cDesc; } ?></textarea>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Status</label>
                       <div class="">
                         <select name="status" id="status" class="form-control">
                            <option value="Y">Publish</option>
                            <option value="N">Save in Draft</option>
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
@endsection 