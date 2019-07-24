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
                <h5 class="card-title">Shop Category List</h5>
                <div class="card-tools">
                  <a href="{{ url('admin/addCategory') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>&nbsp;Add category
                  </a>
                </div>
              </div>
              <div class="row">
                 <div class="col-sm-12" style="margin-left:20px;">
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
                <tr>
                  <th>Sn.</th>
                  <th>Shop Category</th>
                  <th>Category Name</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                  $arr = array("1"=>"Goods","2"=>"Services","3"=>"Both");
				?>
                <?php $i=1; foreach($listArr as $list): ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $arr[$list->bType]." <strong>>></strong> ".$list->cname; ?></td>
                  <td><?php echo $list->csname; ?></td>
                  <td><?php echo $list->cDesc; ?></td>
                   <td><?php echo date("d/m/Y",$list->ccrDate); ?></td>
                  <td><?php echo $list->cstatus; ?></td>
                  <td><a href="<?php echo url("admin/editCategory/$list->id")?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>&nbsp;<a id="<?php if(!empty($list->id))echo $list->id; ?>" href="#" class="btn btn-danger deleteCategory"><i class="fa fa-trash" aria-hidden="true"></i>
</a></td>
                </tr>
                <?php $i++; endforeach; ?>
                </tbody>
                </tfoot>
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
    $(document).on('click','.deleteCategory',function(){
	  var con = confirm("Are you Sure want to Delete this Address");
	  if(con == true){
	  var id = this.id; //alert(id);
	  $.ajax({
      url: "<?php echo url("adminAgaxget/delCategory"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){
		  if(data == 1){
			  alert("Record Delete Successful .");
			  location.reload();
			}
		  else{
			  alert(data);
			} 	 
 	   }	
     });
	 }
	});   			
});
</script>
@stop  