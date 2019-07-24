@extends('newAdmin.template.layout')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <hr />
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Edit Sub Category </h5>
                <div class="card-tools">
                  <a href="{{ url('admin/subcategory') }}" class="btn btn-primary">
                    <i class="fa fa-eye"></i>&nbsp;Sub Category List
                  </a>
                </div>
              </div>
              <div class="row">
                 <div class="col-sm-8" style="margin-left:20px;">
                  <ul>
                 <?php 
				  foreach($errors->all() as $error){
					echo "<li class='' style='color:red;'>".$error."</li>";  
				  }
				  ?>
                 </ul> 
                 @if(session()->has('msg'))
                    <?php echo session()->get('msg') ?> 
                 @endif
                 </div>
              </div>
              <div class="card-body">
               <form name="" id="" class="form-group" action="<?php echo url("admin/editsubcat"); ?>" method="post">
                      <?php echo csrf_field(); ?>
                     <div class="form-group">
                     <input type="hidden" id="editID" name="editID" value="<?php if(!empty($subCategoryDetails->sid)) echo $subCategoryDetails->sid; ?>" class="form-control"/>
                       <label>Select Shop Category</label>
                       <div class="">
                         <select name="shopCat" id="shopCat" class="form-control">
                            <?php
                              if(!empty($subCategoryDetails->cname)){
								  ?>
								 <option value="<?php echo $subCategoryDetails->shopCatid; ?>"><?php echo $subCategoryDetails->cname; ?></option>
								  <?php
								}
							?>
                            <option value="0">--Select--Shop--Category---</option>
							<?php foreach($listArr as $list): ?>
                            <option value="<?php echo $list->cid; ?>"><?php echo $list->cname; ?></option>
                            <?php endforeach; ?>
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Select Category</label>
                       <div class="" id="result">
                         <select name="catID" id="catID" class="form-control">
                            <?php
                              if(!empty($subCategoryDetails->csname)){
								  ?>
								 <option value="<?php echo $subCategoryDetails->catID; ?>"><?php echo $subCategoryDetails->csname; ?></option>
								  <?php
								}
							?>
					     </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Sub Category Name</label>
                       <div class="">
                         <input type="text" id="scatname" name="scatname" value="<?php if(!empty($subCategoryDetails->subCatname)) echo $subCategoryDetails->subCatname; ?>" class="form-control" placeholder="Enter Sub Category Name" />
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
                       <label>Sub Category Description</label>
                       <div class="">
                         <textarea name="subDesc" id="subDesc" placeholder="Sub Category Description" class="form-control" rows="5"><?php if(!empty($subCategoryDetails->subDesc)) echo $subCategoryDetails->subDesc; ?></textarea>
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
                         <button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i>&nbsp;Edit </button>
                       </div>
                     </div>
                   </form>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@stop
