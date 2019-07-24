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
                <h5 class="card-title">Blog List </h5>
                <div class="card-tools">
                  <a href="{{ url('admin/add_blog') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>&nbsp;Add Blog
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
               <table class="table table-bordered" id="userTbl">
                <thead>
                <tr class="danger">
                  <td>Sn.</td>
                  <td>Image</td>
                  <td>Title</td>
                  <td>Description</td>
                  <td>date</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                 <?php
                   if($blogListArr != FALSE ){
                      $i=1;
                      foreach($blogListArr as $list){
                           $image = $list->image;
                        ?>
                         <tr>
                            <td><?php echo $i; ?></td>
                            <td><img class="img img-responsive" style="width:50px; height:50px;" src="<?php echo url("uploadFiles/blogImage/blogImagethumb/$image"); ?>" /></td>
                            <td><?php echo $list->title ?></td>
                          <td><?php 
							if(strlen($list->description) > 150){ 
					            $desc = substr($list->description , 0, 150);
				               }
				             else{
					          $desc = $list->description; 
				             }
							
							 echo $desc; ?></td>
                            <td><?php echo $list->created_at; ?></td>
                            <td colspan="3"><a href= "<?php echo url("admin/edit_blog/$list->id");?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;
                            <a href= "#" id="<?php if(!empty($list->id))echo $list->id; ?>" class="deleteBlog"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
@stop 
@section('footer')
@parent
<script>
$(document).ready(function(e) {
  $(document).on('click','.deleteBlog',function(){
	  $("#resultRecord").html(" ");
	  var con = confirm("Are you Sure want to Delete this blog");
	  if(con == true){
	  var id = this.id; //alert(id);
	  $.ajax({
      url: "<?php echo url("adminAgaxget/deleteBlog"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){
       $('#resultRecord').html(data);
	   $('.card-body').load(document.URL + ' .card-body');  
 	   }	
     });
	 }
	}); 
});
</script>
@stop