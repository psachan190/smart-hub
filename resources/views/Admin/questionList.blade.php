<?php
//echo"<pre>";
//print_r($questionList);exit;
?>
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
                <tr class="danger">
                  <td>Question</td>
                  <td>First Answer</td>
                  <td>Second</td>
                  <td>Third</td>
                  <td>Fourth</td>
                  <td>Correct Answer</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach( $questionList as $data ): ?>
                <tr>
                  <td><?php echo $data->quetion; ?></td>
                  <td><?php echo $data->firstAnswer; ?></td>
                  <td><?php echo $data->secondAnswer; ?></td>
                   <td><?php echo $data->thirdnswer; ?></td>
                  <td><?php echo $data->fourthAnswer; ?></td>
                  <td><?php echo $data->correctAnswer; ?></td>
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