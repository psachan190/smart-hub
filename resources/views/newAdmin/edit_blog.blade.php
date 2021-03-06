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
                <h5 class="card-title">Edit Category </h5>
                <div class="card-tools">
                  <a href="{{ url('admin/blog_list') }}" class="btn btn-primary">
                    <i class="fa fa-eye"></i>&nbsp;Blog List
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
               <form name="" id="" class="form-group" action="<?php echo url("admin/edit_blog"); ?>" method="post" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                       <input type="hidden" id="editblogID" name="editblogID" value="<?php if(!empty($blogdata->id))echo $blogdata->id; ?>" class="form-control" readonly="readonly" />
                    <div class="form-group">
                       <label>Blog Title</label>
                       <div class="">
                         <input type="text" id="title" name="title" value="<?php if(!empty($blogdata->title))echo $blogdata->title; ?>" class="form-control" placeholder="Enter Blog Title" />
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Blog  Description</label>
                       <div class="">
                       <textarea name="description" id="editor1" placeholder="blog Description" class="form-control" rows="20" cols='10'><?php if(!empty($blogdata->description))echo $blogdata->description; ?></textarea>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Blog Image</label>
                       <div class="">
                         <input type="file" name="image" id="image" class="form-control" />
                         <input type="hidden" name="imageCopy" id="imageCopy" class="form-control" value="<?php if(!empty($blogdata->image))echo $blogdata->image; ?>" />
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="">
                         <select id="status" name="status" class="form-control">
                           <option value="Y">Publish </option>
                           <option value="N">Save in draft</option>
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
@endsection 