@extends('newAdmin.template.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <hr />
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">View participant List </h5>
              </div>
              <div class="row">
                 <div class="col-sm-8" style="margin-left:20px;">
                  <ul>
                 <?php 
				  foreach($errors->all() as $error){
					echo "<li class='' style='color:red;'>".$error."</li>";  
				  }
				  ?>
                 </ul> 
                 @if(session()->has('msg'))
                    <?php echo session()->get('msg') ?> 
                 @endif
                 </div>
              </div>
              <div class="card-body" style="margin-bottom:200px;">
               <div class="form-group">
                 <label>Select Organize Talent</label>
                 <div>
                    <select id="org_talent" name="org_talent" class="form-control">
                       <option  hidden="hidden">Select Organize Talent </option>
                       @if($talentListArr != FALSE)  
                          @foreach($talentListArr as $list)
                           <option value="<?php if(!empty($list->id))echo $list->id; ?>"><?php if(!empty($list->title))echo substr($list->title , 0, 150); ?></option>
                          @endforeach 
                       @endif    
                      </select>
                 </div>
               </div>
                 <div id="loadParticipateData"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@stop 
@section('footer')
@parent
<script>
$(document).ready(function(e) {
  $(document).on('change','#org_talent',function(){
	  $("#loadParticipateData").html("");
	  var id = $(this).val(); //alert(id);
	  $.ajax({
      url: "<?php echo url("adminAgaxget/getParticipant"); ?>",
      type: "GET",        
      data: {id:id},
	  success: function(data){
	   var parseJson = jQuery.parseJSON(data);
	   if(parseJson.status == 1){
		   var html_code = '';
		       html_code += '<table class="table table-bordered" id="userTbl">'; 
			   html_code += '<thead>';
			   html_code += '<tr>';
			   html_code += '<th>SN.</th>';
			   html_code += '<th>Name</th>';
			   html_code += '<th>Mobile</th>';
			   html_code += '<th>Title</th>';
			   html_code += '<th>Email</th>';
			  
			   html_code += '<th colspan="2">Action</th>';
			   html_code += '</tr>';
			   html_code += '</thead>';
			    $.each(parseJson.getParticipant , function(index , value){
				    var button_code = '';
					if(value.admin_status == "Y"){
					    button_code = '&nbsp;<button id="'+ value.id +'" data-status="'+ value.admin_status +'" class="btn btn-success verifyParticipant"><i class="fa fa-toggle-on" aria-hidden="true"></i>&nbsp;&nbsp;Block</button>';
									}	
				     else{
					    button_code = '&nbsp;<button id="'+ value.id +'" data-status="'+ value.admin_status +'" class="btn btn-danger verifyParticipant"><i class="fa fa-toggle-off" aria-hidden="true"></i>&nbsp;&nbsp;Verify</button> ';
					  }					
			       var index = index + 1 ;
				   html_code += '<tr>';
				   html_code += '<input type="hidden" name="participant_id" id="participant_id" class="participant_id" value="'+ value.id +'" readonly="readonly" />';
				   html_code += '<td>' + index + '</td>';
				   html_code += '<td>' + value.pName + '</td>';
				   html_code += '<td>' + value.mobileNumber +'</td>';
				   html_code += '<td>' + value.title +'</td>';
				   html_code += '<td>' + value.email +'</td>';
				   html_code += '<td><a href="'+ agax_url +'/admin/participantTimeline/'+ value.id +'" class="btn btn-primary">View Timeline</a> ' + button_code  +'</td>';
				   
				   html_code += '</tr>';
				}); 
			   html_code += '</table>';
		   $('#loadParticipateData').html(html_code);
		 }
	   if(parseJson.status == 2){
		   $('#loadParticipateData').html(parseJson.msg);
		 }	 
 	   }	
     });
	}); 
	
<!--Block or unlock code start-->

 <!--Block or unlock code end--> 	
});
</script>
<script>
$(document).ready(function(e) {
  $(document).on('click','.verifyParticipant',function(){
	var participant_id = $(this).parent().parent().find('.participant_id').val();
	var status = $(this).data("status");
	if( participant_id != " " ){
		  $.ajax({
		  url: "<?php echo url("adminAgaxget/verifyBlock"); ?>",
		  type: "GET",        
		  data: {participant_id:participant_id , status:status},
		  success: function(data){
			 if(data == "Y"){
			    $("#"+participant_id).html('<i class="fa fa-toggle-on" aria-hidden="true"></i>&nbsp;&nbsp;Block').removeClass("btn btn-danger").addClass('btn btn-success').data('status' , data);
				   
			  }
			 if(data == "N"){
			    $("#"+participant_id).html('<i class="fa fa-toggle-off" aria-hidden="true"></i>&nbsp;&nbsp;Verify').removeClass("btn btn-success").addClass("btn btn-danger").data('status' , data);;   
			  } 
		   }	
		 });
	 }
	else{
	      alert("Unexpected try again .");
	 } 
 });    
});
</script>
@stop

