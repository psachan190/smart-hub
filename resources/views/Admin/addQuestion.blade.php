@extends("Admin.template.masterAdmin")
@section('content')
  <?php 
 if(isset($_GET['quizCode'])){
	  $quizCode = $_GET['quizCode'];
	  if(empty($quizCode)){
		  redirect("questionView");
		}
   }
?>  
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
               <a href="<?php echo url("questionView"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>

&nbsp;Question List</a> 
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
                           if(isset($_GET['success'])){
							  ?>
							  <div style="color:#0C3; margin-top:10px;"><label><strong>Record added Successfully !!!</strong></label>
                              <script>setTimeout("window.location.href='<?php echo url('addQuestion?quizCode=').$quizCode; ?>'",1000);</script>
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
             <?php
               if(isset($_GET['quizCode'])){
				   $quizCode = $_GET['quizCode'];
				 }
			 ?>
               <form class="col-sm-12" style="margin-top:30px;" action="<?php echo url('addQuestionaction?quizCode=').$quizCode; ?>" method="post">
               <?php echo csrf_field(); ?>
                 <div class="row">
                 	<div class="col-sm-12 col-md-12">
                    	 <div class="form-group">
                           <label><strong>Quiz Tittle</strong></label>
                            <input type="hidden" name="quizid"  id="quizid" value="<?php echo $quizData->id; ?>">
                            <input type="text" name="quizTitle" id="quizTitle" class="form-control" placeholder="Quiz Title" value="<?php echo $quizData->quizTitle; ?>" readonly="readonly" />
                          </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                    	 <div class="form-group">
                           <label><strong>Question</strong></label>
                            <textarea name="question" id="question" class="form-control" placeholder="Question" cols="5"></textarea>
                          </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                    	 <div class="form-group">
                           <label><strong>First Answer</strong></label>
                            <input type="text" name="first" id="first" class="form-control" placeholder="Fisrt Answer" value="" />
                          </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                    	 <div class="form-group">
                           <label><strong>Second Answer</strong></label>
                            <input type="text" name="second" id="second" class="form-control" placeholder="Second Answer"  />
                          </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                    	 <div class="form-group">
                           <label><strong>Third Answer</strong></label>
                            <input type="text" name="third" id="third" class="form-control" placeholder="Third Answer" />
                          </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                    	 <div class="form-group">
                           <label><strong>Fourth Answer</strong></label>
                            <input type="text" name="fourth" id="fourth" class="form-control" placeholder="Fourth Answer" />
                          </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                    	 <div class="form-group">
                           <label><strong>Correct Answer</strong></label>
                           <div>
                            <input type="radio" name="correctAnswer" id="a" value="A" checked="checked" />&nbsp;A&nbsp;<input type="radio" name="correctAnswer" id="b" value="B" />&nbsp;B&nbsp;<input type="radio" name="correctAnswer" id="c" value="C" />&nbsp;C&nbsp;<input type="radio" name="correctAnswer" id="d" value="D" />&nbsp;D
                           <div> 
                          </div>
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