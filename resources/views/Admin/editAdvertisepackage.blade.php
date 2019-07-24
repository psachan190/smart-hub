@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard > Add Category</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
         <li><i class="fa fa-angle-right"></i> Add Advertisement Package</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
               <a href="<?php echo url("advertisement_package_list"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>
&nbsp;Package List</a> 
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
                   <form name="" id="" class="form-group" action="<?php echo url("editpostAdvertisement"); ?>" method="post">
                      <?php echo csrf_field(); ?>
                     <div class="form-group">
                       <label>Advertisement Title</label>
                       <div class="">
                         <input type="hidden" name="editID" id="editID" class="form-control" placeholder="Title"  value="@if(!empty($packageData->id)){{ $packageData->id }}@endif" />
                         <input type="text" name="title" id="title" class="form-control" placeholder="Title"  value="@if(!empty($packageData->title)){{ $packageData->title }}@endif" />
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Number of Ads </label>
                       <div class="">
                         <input type="text" name="numberofAds" id="numberofAds" class="form-control" placeholder="Number of Ads"  value="@if(!empty($packageData->numberOfAds)){{ $packageData->numberOfAds }}@endif" />
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Package Amount </label>
                       <div class="">
                         <input type="text" name="amount" id="amount" class="form-control"  value="@if(!empty($packageData->packageAmount)){{ $packageData->packageAmount }}@endif" />
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Duration <small>(duration in day)</small> </label>
                       <div class="">
                         <input type="text" name="duration" id="duration" class="form-control" placeholder="Duration "  value="@if(!empty($packageData->duration)){{ $packageData->duration }}@endif" />
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Advertisement Description</label>
                       <div class="">
                         <textarea cols="5" rows="5" name="description" id="description" class="form-control" placeholder="Advertisement Description"  value="{{ old('description') }}" />@if(!empty($packageData->description)){{ $packageData->description }}@endif</textarea>
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
                       <label>Status</label>
                       <div class="">
                         <select id="status" name="status" class="form-control">
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