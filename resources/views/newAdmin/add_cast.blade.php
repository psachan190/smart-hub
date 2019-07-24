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
                <h5 class="card-title">Add Cast </h5>
                <div class="card-tools">
                  <a href="{{ url('admin/cast_list') }}" class="btn btn-primary">
                    <i class="fa fa-eye"></i>&nbsp;Cast List
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
               <form name="" id="" class="form-group" action="<?php echo url("admin/add_cast"); ?>" method="post" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                    <div class="form-group">
                       <label>Select Religion</label>
                       <div class="">
                         <select name="religion" id="religion" class="form-control">
                               
	                    </select>
                       </div>
                     </div>
                    <div class="form-group">
                       <label>Add Cast</label>
                       <div class="">
                         <input type="text" id="cast" name="castName" value="<?php echo old("cast"); ?>" class="form-control" placeholder=" Cast" />
                       </div>
                     </div>
                     <div class="form-group">
                      <label>Status</label>
                       <div class="">
                         <select id="status" name="status" class="form-control">
                           <option value="Y">Publish </option>
                           <option value="N">Save in draft</option>
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
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@stop 
