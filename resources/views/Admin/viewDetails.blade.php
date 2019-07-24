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
              <a href="<?php echo url("quizParticipate"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>
&nbsp; Back</a> 
            </div>
            <div class="row" style="margin-top:30px;">
               <table class="table table-bordered">
                <thead>
                <tr class="danger">
                  <td>Sn</td>
                  <td>name</td>
                  <td>Email</td>
                  <td>Mobile</td>
                  <td>refCode</td>
                  <td>prefCode</td>
                  <td>questionID</td>
                  <td colspan="3">correctAnswer</td>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($list as $listitem ): ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $listitem->name; ?></td>
                  <td><?php echo $listitem->email; ?></td>
                  <td><?php echo $listitem->mobile; ?></td>
                   <td><?php echo $listitem->refCode; ?></td>
                  <td><?php echo $listitem->prefCode; ?></td>
                  <td><?php echo $listitem->questionID; ?></td>
                  <td colspan="3"><?php echo $listitem->correctAnswer; ?></td>
                </tr>
                <?php $i++; endforeach; ?>
                <tr>
                  <td></td>
                </tr>
                </tbody>
               </table>
               <table class="table table-bordered">
                <thead>
                <tr class="danger">
                  
                 </tr>
                </thead>
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