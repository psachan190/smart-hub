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
                <h5 class="card-title">Talent Event List </h5>
                <div class="card-tools">
                  <a href="{{ url('admin/add_talent') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>&nbsp;Add Talent
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
              <div class="card-body" id="mainSection">
               <table class="table table-bordered table-striped" id="example1">
                <thead>
                <tr class="danger">
                  <td>Sn.</td>
                  <td>Image</td>
                  <td>Title</td>
                  <td>Description</td>
                   <td>Status</td>
                  <td>Start date</td>
                  <td>End date</td>
                  <td>Action</td>
                </tr>
                </thead>
                <tbody>
                 <?php
                   if($talentListArr != FALSE ){
                      $i=1;
                      foreach($talentListArr as $list){
                           $image = $list->image;
                        ?>
                         <tr>
                            <td><?php echo $i; ?></td>
                            <td><img class="img img-responsive" style="width:50px; height:50px;" src="<?php echo url("uploadFiles/talent/$image"); ?>" /></td>
                            <td><?php echo $list->title ?></td>
                            <td><?php 
							if(strlen(strip_tags($list->description)) > 150){ 
					            $desc = substr(strip_tags($list->description) , 0, 150);
				               }
				             else{
					          $desc = strip_tags($list->description); 
				             }
							 echo $desc; ?></td>
                            <td><?php if(!empty($list->c_status)) echo $list->c_status; ?></td>
                            <td><?php if(!empty($list->registerEntrydate)) echo date("d-M-Y" , $list->registerEntrydate); else echo "N\A"; ?></td>
                              <td><?php if(!empty($list->registerEntrydate)) echo date("d-M-Y" , $list->registerExpirydate); else echo "N\A"; ?></td>
                            <td>
                             <input type="hidden" name="talentID" class="talentID" value="<?php if(!empty($list->id))echo $list->id; ?>" />
                            <select name="changeStatus" class="changeStatus">
                             <option hidden="hidden">Change Status</option>
                             <option value="H">Hide</option>
                             <option value="D">Save in draft</option>
                             <option value="Y">Publish</option>
                             <option value="C">Close</option>
                            </select>
                            <a href="<?php echo url("admin/edit_talent/$list->encrypt_id");?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;
                            <a href= "#" id="<?php if(!empty($list->encrypt_id))echo $list->id; ?>" class="deleteTalent"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                         </tr>
                        <?php 
                         $i++; 
                      }      
                    }
                   else{
                    ?>
                     <tr>
                       <td colspan="6">No Talent Available</td>
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
@stop 
@section('footer')
@parent
<div class="gal-container nopadding">
	<div class="col-md-12 col-sm-12 co-xs-12">
		<div class="boximg formseller">
			<div class="modal modalngo fade" id="PopupBox" tabindex="-1" role="dialog">
				<div class="modal-dialog mobilengo" role="document">
					<div class="modal-content popupsize1">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<div class="modal-body">
							<div class="boxed-body signin-area">
								<div class="row borderbottom margin_div normal-padding">
								   <div id="msgLoad"></div>										
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(e) {
  $(document).on('click','.deleteTalent',function(){
	  $("#resultRecord").html(" ");
	  var con = confirm("Are you Sure want to Delete this Talent");
	  if(con == true){
	  var id = this.id; //alert(id);
	  $.ajax({
      url: "<?php echo url("adminAgaxget/deleteTalent"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){
       $('#msgLoad').html(data);
	   $("#PopupBox").modal('show');
	   $('#userTbl').load(document.URL + ' #userTbl');  
 	   }	
     });
	 }
 }); 
 /*change status script start*/
  $(document).on('change','.changeStatus',function(){
    var con = confirm("Are you sure want to change Event Status");
	if(con = true){
		var talentID = $(this).parent().find('.talentID').val();
	    var status = $(this).val();
		 $.ajax({
		  url: "<?php echo url("adminAgaxget/changetalentStatus"); ?>",
		  type: "GET",        
		  data: {talentID:talentID , status:status},
		  success: function(data){
		   $('#msgLoad').html(data);
		   $("#PopupBox").modal('show');
		   $('#mainSection').load(document.URL + ' #mainSection');  
		   }	
       });
	  }	  
  });
 /*change status script End*/ 
});
</script>
@stop