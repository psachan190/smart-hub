@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard > Add User</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
         <li><i class="fa fa-angle-right"></i> Add User</li>
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
                       <label>User Name( Add name With Designation)</label>
                       <div class="">
                         <span><?php if($errors->has('name')){ echo"<span style='color:red;'>Module name is required.</span>"; } ?></span>
                            <input type="text" id="name" name="name" value="{{ @$moduleDetail->name}}" class="form-control" placeholder="Enter Module Name" />
                            <input type="hidden" id="id" name="id" value="{{ @$moduleDetail->id}}" class="form-control" />
                       </div>
                     </div>
                     
                      <div class="form-group">
                       <label>Email</label>
                       <div class="">
                         <span><?php if($errors->has('email')){ echo"<span style='color:red;'>Module name is required.</span>"; } ?></span>
                            <input type="text" id="email" name="email" value="{{ @$moduleDetail->email}}" class="form-control" placeholder="Enter Module URL" />
                       </div>
                     </div>

                      <div class="form-group">
                       <label>Mobile</label>
                       <div class="">
                         <span><?php if($errors->has('mobile')){ echo"<span style='color:red;'>Module name is required.</span>"; } ?></span>
                            <input type="text" id="mobileNumber" name="mobileNumber" value="{{ @$moduleDetail->mobileNumber}}" class="form-control" placeholder="Enter Module URL" />
                       </div>
                     </div>


                      <div class="form-group">
                       <label>Gender</label>
                       <div class="">
                         <span><?php if($errors->has('sex')){ echo"<span style='color:red;'>Module name is required.</span>"; } ?></span>
                            <select id="sex" name="sex" class="form-control">
                              <option value='0' @if(@$moduleDetail->sex == '0') {{ 'selected'}}@endif>Male</option>
                               <option value='1' @if(@$moduleDetail->sex == '1') {{ 'selected'}}@endif>FeMale</option>
                            </select>
                       </div>
                     </div>


                      <div class="form-group">
                       <label>Password * Default Password Kanpur@123</label>
                       <input type="hidden" id="roll_id" name="roll_id" value="3"/>
                       <input type="hidden" id="password" name="password" value="Kanpur@123"/>
                        <input type="hidden" id="status" name="status" value="1"/>
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