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
                <h5 class="card-title">Add Shop Category </h5>
                <div class="card-tools">
                  <a href="{{ url('admin/shop_category') }}" class="btn btn-primary">
                    <i class="fa fa-eye"></i>&nbsp;Shop category List
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
               <form name="" id="" class="form-group col-sm-8" action="<?php echo url("admin/addshopcategory"); ?>" method="post" enctype="multipart/form-data">
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
                         <input type="text" id="cname" name="cname" value="{{ old('cname') }}" class="form-control" placeholder="Enter Category Name" />
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
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@stop