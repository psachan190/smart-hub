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
              <div class="col-sm-6">
                   <div class="form-group pull-right">
                     <input type="text" class="search form-control col-sm-12" placeholder="What you looking for?">
                   </div> 
                 </div>
            </div>
            <div class="row" style="margin-top:30px;">
               <table class="table table-bordered" id="userTbl">
                <thead>
                <tr class="danger">
                  <td>Sn</td>
                  <td>Shop name</td>
                  <td>Email</td>
                  <td>sDate</td>
                  <td>eDate</td>
                  <td>Join Date</td>
                  <td>Status</td>
                  <td colspan="3">correctAnswer</td>
                </tr>
                </thead>
                <tbody>
               <?php
                if($vendorPostAds != FALSE){
					 $i = 1;
				   foreach($vendorPostAds as $listitem ){
				      ?>
                      <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php if(!empty($listitem->vName))echo $listitem->vName; ?></td>
                  <td><?php if(!empty($listitem->vEmail))echo $listitem->vEmail; ?></td>
                  <td><?php if(!empty($listitem->startDate))echo $listitem->startDate; ?></td>
                   <td><?php if(!empty($listitem->endDate))echo $listitem->endDate; ?></td>
                  <td><?php if(!empty($listitem->created_at)) echo $listitem->created_at; ?></td>
                  <td><?php if($listitem->adminStatus=="Y")echo "Verify"; else{ echo "unverify"; } ?></td>
                  <td colspan="3"><a href="<?php echo url("viewAdsPostDetails")."/".base64_encode($listitem->id); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
                </tr>
                	  <?php
					$i++;
					}
				 }
				else{
				   ?>
				   <tr>
                  <td colspan="8">No Record found</td>
                </tr>
				   <?php
				 }  
			   ?> 
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