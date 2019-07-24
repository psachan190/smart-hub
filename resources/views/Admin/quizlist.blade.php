@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Quiz List</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
              <a href="<?php echo url("addQuiz"); ?>" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>
&nbsp; Add Quiz</a> 
            </div>
            <div class="row" style="margin-top:30px;">
               <table class="table table-bordered">
                <thead>
                <tr>
                  <td>Quiz Title</td>
                  <td>Quiz Duration</td>
                  <td>Each Marks</td>
                  <td>Total Marks</td>
                  <td>Date</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach( $quizList as $list ): ?>
                <tr>
                  <td><?php echo $list->quizTitle; ?></td>
                  <td><?php echo $list->duration; ?></td>
                  <td><?php echo $list->eachMarks; ?></td>
                   <td><?php echo $list->totalMars; ?></td>
                  <td><?php echo $list->crDate; ?></td>
                  <td colspan="3"><a href="#" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>&nbsp;<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
</a></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>   
              </div>
         </div>
     </div>
      <!-- Main row --> 
    </section>
<style>
.signupbtn{
	background-color:#06F; padding:7px; font-size:18px; border:none !important; color:#FFF !important;
	}
	.form-control{
	border-radius:0px !important;
}
input{
	color:#000 !important;
}
</style>
@endsection 