@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
               <a href="<?php echo url("quizlist"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>

&nbsp; Quiz List</a> 
             </div>
             <div class="row">
               <ul>
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
                              <script>setTimeout("window.location.href='<?php echo url('addQuiz'); ?>'",2000);</script>
                              </div> 
							  <?php   
						   }
						  ?>
                 @if (session('someerr'))
                 <div class="alert alert-danger">
                    {{ session('someerr') }}
                 </div>
                 @endif
             </div>
             <div class="row">      
               <form class="col-sm-12" style="margin-top:30px;" action="<?php echo url('addQuizaction'); ?>" method="post">
               <?php echo csrf_field(); ?>
                 <div class="row">
                 	<div class="col-sm-12 col-md-6">
                    	 <div class="form-group">
                           <label><strong>Quiz Tittle</strong></label>
                            <input type="text" name="quizTitle" id="quizTitle" class="form-control" placeholder="Quiz Title" />
                          </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                    	 <div class="form-group">
                           <label><strong>Duration</strong></label>
<input type="number" placeholder="Quiz Duration " class="form-control" name="duration" id="duration" />
                          </div>
                    </div>
                 </div>
                 <div class="row">
                 	<div class="col-sm-12 col-md-6">
                    	 <div class="form-group">
                           <label><strong>Marks <small style="color:#F00;">&nbsp;(Per Question Marks)</small></strong></label>
                           <input type="text" name="perqmarks" id="perqmarks" placeholder="Per Quiz Marks" class="form-control" required>
                          </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
     						   <label><b>Total Quiz Marks</b></label><br>
                            <input type="number" placeholder="Toal Marks" class="form-control" name="totalMarks" id="totalMarks" required>
                           
                    </div>
                    
                 </div>
                 <div class="row">
                 	<div class="col-sm-12 col-md-6">
                    	 <div class="form-group">
                            <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Submit</button>
                          </div>
                    </div>
                 </div>
               </form>
            </div>
         </div>
     </div>
      <!-- Main row --> 
    </section>
@endsection 