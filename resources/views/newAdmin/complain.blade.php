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
                <h5 class="card-title">Add Complain Subject</h5>
                <div class="card-tools">
                  <a href="{{ url('admin/adspackageList') }}" class="btn btn-primary">
                    <i class="fa fa-eye"></i>&nbsp;Advertisement List
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
              <form class="form-group" action="<?php echo url("admin/addComplainSubject"); ?>" method="post">
				<?php echo csrf_field(); ?>
               <div class="row">
                 <div class="col-sm-12">
                  <div class="form-group">
                     <label>Complain Subject</label>
                      <div class="">
                        <input type="text" name="complainSubject" id="complainSubject" class="form-control" placeholder="Complain Subject "  value="{{ old('complainSubject') }}" />
                       </div>
                     </div> 
                 </div>
              </div>
               <div class="row">
                 <div class="col-sm-6">
                   <div class="form-group">
                     <label>Priority</label>
                       <div class="">
                         <select id="priority" name="priority" class="form-control">
                           <?php 
						     for($i=1; $i<20; $i++){
							     ?>
						         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>		 
								 <?php
							  }
						   ?>
                         </select>
                       </div>
                     </div>
                 </div>
                 <div class="col-sm-6">
                   <div class="form-group">
                       <label>Status</label>
                       <div class="">
                         <select id="status" name="status" class="form-control">
                          <option value="Y">Publish</option>
                          <option value="N">Save in Draft</option>
                         </select>
                       </div>
                     </div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-sm-12">
                  <div class="form-group">
                       <div class="">
                         <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add </button>
                       </div>
                     </div> 
                 </div>
              </div>
            </form>  
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-12" style="margin-left:20px;">
                 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn.</th>
                  <th>Complain Subject</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @if($subjectlistArr != FALSE)
                    @php $i=1; @endphp
                    @foreach($subjectlistArr as $data)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>@if(!empty($data->subject)){{ $data->subject }} @endif</td>
                      <td><a href="#" class="btn btn-info"><i class="fa fa-edit"></i></a>&nbsp;<a href="#" id="{{ $data->id }}" class="btn btn-danger deletebtn"><i class="fa fa-trash"></i></a></td> 
                    </tr>
                      @php $i++; @endphp
                    @endforeach
                  @else
                    <tr>
                      <td colspan="5" class="danger">No record Available...</td>
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
      </div>
    </section>
  </div>
@stop
@section('footer')
  @parent
<script>
$(document).ready(function(e) {
  $(document).on('click','.deletebtn',function(){
    var con =  confirm("are you sure want to delete ..");
     if(con==true){
	     var id = this.id; //alert(id);
		  $.ajax({
		  url: "<?php echo url("adminAgaxget/deleteSubject"); ?>",
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