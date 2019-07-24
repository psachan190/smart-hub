@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard > Add Module</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
         <li><i class="fa fa-angle-right"></i> Add Module</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
               <a href="{{ url('module') }}" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Back</a> 
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
                   <form name="" id="" class="form-group" method="post">
                     {{ csrf_field() }}
                     <div class="form-group">
                       <label>Module Name</label>
                       <div class="">
                         <span><?php if($errors->has('module')){ echo"<span style='color:red;'>Module name is required.</span>"; } ?></span>
                            <input type="text" id="module" name="module" value="{{ @$moduleDetail->module}}" class="form-control" placeholder="Enter Module Name" />
                            <input type="hidden" id="module_id" name="module_id" value="{{ @$moduleDetail->id}}" class="form-control" />
                       </div>
                     </div>
                     
                      <div class="form-group">
                       <label>Module Url</label>
                       <div class="">
                         <span><?php if($errors->has('module_url')){ echo"<span style='color:red;'>Module name is required.</span>"; } ?></span>
                            <input type="text" id="module_url" name="module_url" value="{{ @$moduleDetail->module_url}}" class="form-control" placeholder="Enter Module URL" />
                       </div>
                     </div>

                     <div class="form-group">
                       <div class="">
                         <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;@if(@$moduleDetail->id) {{ 'Edit' }} @else {{ 'Add' }} @endif </button>
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