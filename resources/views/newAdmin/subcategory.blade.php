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
                <h5 class="card-title">Sub Category List</h5>
                <div class="card-tools">
                  <a href="{{ url('admin/addSubcat') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>&nbsp;Add Sub category
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
                 <td>Sn.</td>
                  <td>Shop Category</td>
                  <td>Category</td>
                  <td>Sub Category</td>
                  <td>Description</td>
                  <td>Date</td>
                  <td>Total Marks</td>
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
                    <td><?php echo $list->subCatname; ?></td>
                  <td><?php echo $list->subDesc; ?></td>
                   <td><?php echo date("d/m/Y",$list->subcrDate); ?></td>
                  <td><?php echo $list->subcstatus; ?></td>
                  <td colspan="3"><a href="<?php echo url("admin/editsubCat/$list->sid")?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>&nbsp;<a id="<?php if(!empty($list->sid))echo $list->sid; ?>" class="btn btn-danger deletSubCategory"><i class="fa fa-trash" aria-hidden="true"></i>
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
    $(document).on('click','.deletSubCategory',function(){
	  var con = confirm("Are you Sure want to Delete this Address");
	  if(con == true){
	  var id = this.id; //alert(id);
	  $.ajax({
      url: "<?php echo url("adminAgaxget/delsubCat"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){
		 if(data == 1){
			 alert(" Record Delete Successful !!! .");
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