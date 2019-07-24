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
                <h5 class="card-title">Add Religion </h5>
                <div class="card-tools">
                  <a href="#" id="religionList" class="btn btn-primary">
                    <i class="fa fa-eye"></i>&nbsp;Religion List
                  </a>
                </div>
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
              <div class="card-body">
               <form name="" id="" class="form-group" action="<?php echo url("admin/add_religion"); ?>" method="post">
                      <?php echo csrf_field(); ?>
                    <div class="form-group">
                       <label>Religion Name</label>
                       <div class="">
                         <input type="text" id="religion" name="religion" value="<?php echo old("title"); ?>" class="form-control" placeholder="Religion Name" />
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="">
                         <select  name="status" class="form-control rstatus">
                           <option value="Y">Publish </option>
                           <option value="N">Save in draft</option>
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="">
                         <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add </button>
                       </div>
                     </div>
                   </form>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Modal -->
            <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    View / Edit Religion
                  </div>
                  <div class="modal-body">
                    <div id="loadModal">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="pull-left editResponse"></div>
                  </div>
              </div>
            </div>
            </div>
<!-- fim Modal-->   
@stop 
@section('footer')
  @parent
<script>
$(document).ready(function(e) {
  $(document).on('click','#religionList',function(){
	 var status = "Y";
	 $.ajax({
	  url: agax_url +"/adminAgaxget/getReligion",
	  type:"GET",
	  data:{status:status},
	  dataType:'json',
	  success: function(data){
		$('#myModal').modal('show');
		var html_code = '';
		html_code  += '<table class="table stable-striped  table-responsive">';
        html_code  +=  '<tr>';
        html_code  +=    '<th>Religion Name</th>';
		html_code  +=    '<th>Status</th>';
        html_code  +=    '<th>Action</th>';
        html_code  +=  '</tr>';
		   $.each(data, function (index, value) {
			  var select_status = "";
			  var select_saveinDraft = "";
			  if(value.c_status == "Y"){
			       select_publish = 'selected="selected"';		   
				}
		      if(value.c_status == "N"){
				  select_saveinDraft = 'selected="selected"';		    
				}
			  html_code += '<tr>';
			  html_code += '<td><input type="text" name="religion_name" value="' +value.religion + '" class="form-control religionName"></td>';
			  html_code += '<td>';
			  html_code += '<select class="form-control rstatus">';
			  html_code += '<option value="Y" '+ select_status +'>Publish </option>';
              html_code += '<option value="N" '+ select_saveinDraft +'>Save in draft</option>';
			  html_code	+= '</select>';
			  html_code += '</td>';
			  html_code += '<td><a href="#" id="' + value.id + '" class="btn btn-primary religion_update">Edit</a></td>';
			  html_code += '</tr>';
			});
	    html_code  += '</table>';		
		$("#loadModal").html(html_code); 
	  }
   });
  }); 
  <!--Update Religion code start-->
    $(document).on('click','.religion_update',function(){
	  var editID = this.id;
	  var religionName = $(this).parent().parent().find('.religionName').val();
	  var status = $(this).parent().parent().find('.rstatus').val();
	  if(religionName != " "){
	   $.ajax({
	      url: agax_url +"/adminAgaxget/editReligion",
		  type:"GET",
		  data:{editID:editID,religionName:religionName,status:status},
		  success: function(data){
		   $('.editResponse').html(data)
		  }
	   });
	  }
	else{
	   alert("unexpected Try again...")
	 } 
	   
	}); 
  <!--Update Religion code start--> 
});  
  </script>
@stop