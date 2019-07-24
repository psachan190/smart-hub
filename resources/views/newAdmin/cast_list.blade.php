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
                <h5 class="card-title">Cast List </h5>
                <div class="card-tools">
                  <a href="{{ url('admin/add_cast') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>&nbsp;Add Cast
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
                 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="danger">
                  <th>Sn.</td>
                  <th>Religion</td>
                  <th>Cast</td>
                  <th>Status</td>
                  <td>Action</td>
                </tr>
                </thead>
                <tbody>
                 <?php
                   if($castList != FALSE ){
                      $i=1;
                      foreach($castList as $list){
                        ?>
                         <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $list->religion ?></td>
                            <td><?php echo $list->cast; ?></td>
                             <td><?php echo $list->c_status; ?></td>
                            <td><button type="button" class="btn btn-primary editCast" id="<?php echo $list->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>&nbsp;
                            </td>
                         </tr>
                        <?php 
                         $i++; 
                      }      
                    }
                   else{
                    ?>
                     <tr>
                       <td colspan="6">No blog Post Available</td>
                     </tr>
                    <?php
                   }
                 ?>  
                </tbody>
              </table>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 <!--Modal start-->
 <div class="modal" id="castModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width:1000px;">
                <div class="modal-content">
                  <div class="modal-header">
                    Edit Cast Details
                  </div>
                  <div class="modal-body"> 
                    <div id="loadModal">
                      <form id="editCastForm">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="editID" id="editID" value="" readonly="readonly" />
                        <div class="form-group">
                         <label>Select Religion</label>
                          <div class="">
                         <select name="religion" id="religion" class="form-control">
	                     </select>
                       </div>
                        </div>
                        <div class="form-group">
                         <label>Cast Name</label>
                          <div class="">
                            <input type="text" id="cast_name" name="castName" value="<?php echo old("castName"); ?>" class="form-control" placeholder="Cast Name" />
                       </div>
                        </div>
                        <div class="form-group">
                      <label>Status</label>
                       <div class="">
                         <select id="status" name="status" class="form-control">
                           <option value="Y">Publish </option>
                           <option value="N">Save in draft</option>
                         </select>
                       </div>
                     </div>
                       <div id="editCastResponse"></div>
                        <div class="form-group">
                       <div class="">
                        <button type="submit" name="submit" id="submitCast" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i>&nbsp;Edit </button>
                       </div>
                     </div>
                      </form>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="pull-left editResponse"></div>
                  </div>
              </div>
            </div>
            </div> 
@stop 
@section('footer')
 @parent
 <script>
 $(document).ready(function(e) {
  $(document).on('click','.editCast',function(){
    var edit_id = this.id;
	if(edit_id != ""){
	    $.ajax({
		  url:agax_url +"/adminAgaxget/getCastDetails",
		  type:"GET",
		  data:{edit_id:edit_id},
		  success: function(data){
			 var parseJson = jQuery.parseJSON(data); 
			 if(parseJson.status == 200){
				  $("#cast_name").val(parseJson.result.cast);
				  $("#religion").append("<option value='"+ parseJson.result.rid +"' selected='selected'>"+ parseJson.result.religion +"</option>");
				  $("#editID").val(parseJson.result.id);
				  //alert("function is work");
				  //console.log(parseJson.result);
				  //$("#loadModal").html(parseJson.result);
			   }
		  },
		  error: function (jqXHR, status, err) {
           alert("Something Error .");
          },
         complete: function (jqXHR, status) {
			 $("#castModal").modal('show');
			//alert("Local completion callback.");
          }		  
		});
	  }
  }); 
/*Edit Cast script start*/  
  $(document).on('submit','#editCastForm',(function(e){
     $("#submitCast").attr('disabled',true);
	 $('#editCastResponse').html(" ");
	 e.preventDefault();
	 $.ajax({
	   url:agax_url +"/adminAgaxpost/editCast",
	   type:"POST",
	   data: new FormData(this),
	   contentType: false,
	   cache: false,
       processData:false,  
	   success: function(data){
	    var parseJson = jQuery.parseJSON(data);
		if(parseJson.vstatus == 400){
		    $.each(parsedJson.error, function(key , value) {
             errorString += "<div class='notice notice-success'><strong>" + value + "</strong></div>";
            });
		  }
	    if(parseJson.vstatus == 100){
		     $("#editCastResponse").html(parseJson.msg);
		  }
	   },
	   complete: function(jqXHR, status){
	     $("#submitCast").attr('disabled',false);
	   }
	 });
  }));
/*Edit Cast script start*/   
 });
 </script> 
@stop
