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
                <h5 class="card-title">Add Advertisement Package</h5>
                <div class="card-tools">
                  <a href="{{ url('admin/adspackageList') }}" class="btn btn-primary">
                    <i class="fa fa-eye"></i>&nbsp;Advertisement List
                  </a>
                </div>
              </div>
              <div class="row">
                 <div class="col-sm-12" style="margin-left:20px;">
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
            <form class="form-group" action="<?php echo url("admin/postAdvertisement"); ?>" method="post">
				<?php echo csrf_field(); ?>
               <div class="row">
                 <div class="col-sm-12">
                  <div class="form-group">
                       <label>Advertisement Title</label>
                       <div class="">
                         <input type="text" name="title" id="title" class="form-control" placeholder="Title"  value="{{ old('title') }}" />
                       </div>
                     </div> 
                 </div>
              </div>
               <div class="row">
                 <div class="col-sm-6">
                   <div class="form-group">
                       <label>Number of Ads </label>
                       <div class="">
                         <input type="text" name="numberofAds" id="numberofAds" class="form-control" placeholder="Number of Ads"  value="{{ old('numberofAds') }}" />
                       </div>
                     </div>
                 </div>
                 <div class="col-sm-6">
                   <div class="form-group">
                       <label>No. of Pics  </label>
                       <div class="">
                         <input type="text" name="pics" id="pics" class="form-control" placeholder="Number of pics"  value="{{ old('pics') }}" />
                       </div>
                     </div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-sm-6">
                   <div class="form-group">
                       <label>Duration <small>(duration in day)</small> </label>
                       <div class="">
                         <input type="text" name="duration" id="duration" class="form-control" placeholder="Duration "  value="{{ old('duration') }}" />
                       </div>
                     </div>
                 </div>
                 <div class="col-sm-6">
                   <div class="form-group">
                       <label>Package Amount </label>
                       <div class="">
                         <input type="text" name="amount" id="amount" class="form-control" placeholder="Package Amount"  value="{{ old('amount') }}" />
                       </div>
                     </div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-sm-12">
                  <div class="form-group">
                      <label>Advertisement Description</label>
                       <div class="">
                          <textarea cols="5" rows="5" name="description" id="description" class="form-control" placeholder="Advertisement Description"  value="{{ old('description') }}" /></textarea>
                       </div>
                     </div> 
                 </div>
              </div>
              <div class="row">
                 <div class="col-sm-6">
                   <div class="form-group">
                       <label>Package Type </label>
                       <div class="">
                         <select id="packageType" name="packageType" class="form-control">
                          <option value="3">Both</option>
                          <option value="1">Advertisement Package</option>
                          <option value="2">Image Package</option>
                         </select>
                       </div>
                     </div>
                 </div>
                 <div class="col-sm-6">
                   <div class="form-group">
                       <label>Status</label>
                       <div class="">
                         <select id="status" name="status" class="form-control">
                          <option value="Y">Publish</option>
                          <option value="N">Save in Draft</option>
                         </select>
                       </div>
                     </div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-sm-12">
                  <div class="form-group">
                       <div class="">
                         <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add </button>
                       </div>
                     </div> 
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