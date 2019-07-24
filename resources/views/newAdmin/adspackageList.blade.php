@extends('newAdmin.template.layout')
@section('content')
<?php
$forPAckageArr = array(3=>"both" , 1=>"Advertisement Package" , 2=>"Image Package");
?>
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
                <h5 class="card-title">Vendor Advertisement</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn.</th>
                  <th>Title</th>
                  <th>No. Of Ads</th>
                  <th>No. Of Pics</th>
                  <th>Amount</th>
                  <th>Duration</th>
                  <th>Description</th>
                  <th>Package for</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @if($packageList != FALSE)
				  @php  $i=1; @endphp
                  @foreach($packageList as $list)
                  <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $list->title; ?></td>
                  <td><?php echo $list->numberOfAds; ?></td>
                  <td><?php echo $list->numberOfPics; ?></td>
                  <td><?php echo $list->packageAmount; ?></td>
                  <td><?php echo $list->duration; ?></td>
                  <td><?php echo $list->description; ?></td>
                  <td><?php if(!empty($list->forPackageTye)) echo $forPAckageArr[$list->forPackageTye]; ?></td>
                  <td><button class="delPackageData btn btn-danger" name="delPackageData" id="<?php if(!empty($list->id))echo $list->id; ?>" class="btn btn-info"><i class="fa fa-trash" aria-hidden="true"></i>
</button>&nbsp;&nbsp;&nbsp;<a href='{{ url("admin/editAdsPackage/$list->id")}}' class="edit btn btn-info" name="edit" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i>
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
            <!-- /.card-body -->
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
    $(document).on('click','.delPackageData',function(){
	  var con = confirm("Are you Sure want to Delete this Package List");
	  if(con == true){
	  var id = this.id; //alert(id);
	  $.ajax({
      url: "<?php echo url("adminAgaxget/delPackageList"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){
		if(data == 1){
		   alert("Record Delete successful .");	
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