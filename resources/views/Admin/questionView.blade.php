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
              <div class="col-sm-8">
                <div class="form-group">
                  <label>Select Quiz Title</label>
                  <div>
                   <select class="form-control" name="quizTitle" id="quizTitle">
                    <option>--Select--Quiz--</option>
                      <?php foreach( $quizList as $list ): ?>
                       <option value="<?php echo $list->id; ?>"><?php echo $list->quizTitle; ?></option>
                      <?php endforeach; ?> 
                  </select>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>&nbsp;</label>
                  <div>
                   <button type="button" name="done" id="done" class="btn btn-success">Submit</button>
                  </div>
                </div>
                
              </div>      
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
                  <td colspan="3"><a href="<?php echo url("questionList")."/".$list->id; ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>

View Question List</a>&nbsp;</td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>   
              </div>
         </div>
     </div>
      <!-- Main row --> 
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(e) {
   $(document).on('click','#done',function(){
      //alert("yes");
	  var quiz = $('#quizTitle').val();
	  //alert(quiz);
	  var url = "<?php echo url("addQuestion?quizCode="); ?>"+quiz;
	  window.location.href = url;
   });
});
</script>
@endsection 