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
                  <a href="{{ url('admin/addShopcategory') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>&nbsp;Add Shop category
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
                  <td>Shop Category Name</td>
                  <td>Description</td>
                  <td>Date</td>
                  <td>Total Marks</td>
                  <td>Date</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                 @if($listArr != FALSE)
				  @php 
                     $i=1;
                     $arr = array("1"=>"Goods","2"=>"Services","3"=>"Both")
                   @endphp
                  @foreach($listArr as $list )
                   <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $arr[$list->bType]." <strong>>></strong> ".$list->cname; ?></td>
                  <td><?php echo $list->cDesc; ?></td>
                   <td><?php echo date("d/m/Y",$list->crDate); ?></td>
                  <td><?php echo $list->cSataus; ?></td>
                  <td colspan="3"><a href="<?php echo url("admin/editShopCategory/$list->cid")?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>&nbsp;<a href="#" id="<?php if(!empty($list->cid))echo $list->cid; ?>" class="btn btn-danger deleteShopCat"><i class="fa fa-trash" aria-hidden="true"></i>
</a></td>
                </tr>
                 @php  $i++; @endphp
                   @endforeach
                @else
                 <tr>
                  <td>No Records founds...</td>
                </tr> 
                @endif
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
    $(document).on('click','.deleteShopCat',function(){
	  var con = confirm("Are you Sure want to Delete this Address");
	  if(con == true){
	  var id = this.id; //alert(id);
	  $.ajax({
      url: "<?php echo url("adminAgaxget/delShopCat"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){
		 alert(data);
		 location.reload();
 	   }	
     });
	 }
	});   			
});
</script>
@stop  