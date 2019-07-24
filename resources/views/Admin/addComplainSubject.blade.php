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
               <a href="<?php echo url("comlainSubjectList"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>

&nbsp;Complain Subject List</a> 
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
                   <form name="" id="" class="form-group" action="<?php echo url("addComplianSubjectAction"); ?>" method="post">
                      <?php echo csrf_field(); ?>
                     <div class="form-group">
                       <label>Complain Subject</label>
                       <div class="">
                         <input type="text" name="complainSubject" id="complainSubject" class="form-control" placeholder="Complain Subject "  value="{{ old('complainSubject') }}" />
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