@extends("Admin.template.masterAdmin")
@section('content')
<section class="content"> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12">
          <div class="info-box">
            <div class="row">
              <div class="col-lg-12">
                <h4 class="text-black m-b-1">Users List</h4>
                <div class="row m-t-4">
                  <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-darkblue"> <span class="info-box-icon bg-transparent"><i class="ti-stats-up text-white"></i></span>
                      <div class="info-box-content">
                        <h6 class="info-box-text text-white">Total Users</h6>
                        <h1 class="text-white">@if($users != FALSE) {{ count($users) }} @endif</h1>
                        <span class="progress-description text-white"> 70% Increase in 30 Days </span> </div>
                      <!-- /.info-box-content --> 
                    </div>
                    <!-- /.info-box --> 
                  </div>
                  <!-- /.col -->
                  <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green text-white"> <span class="info-box-icon bg-transparent"><i class="ti-face-smile"></i></span>
                      <div class="info-box-content">
                        <h6 class="info-box-text text-white">Active User</h6>
                        <h1 class="text-white">@if($activeUsers != FALSE) {{ count($activeUsers) }} @endif</h1>
                        <span class="progress-description text-white"> 45% Increase in 30 Days </span> </div>
                      <!-- /.info-box-content --> 
                    </div>
                    <!-- /.info-box --> 
                  </div>
                  <!-- /.col -->
                  <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-aqua"> <span class="info-box-icon bg-transparent"><i class="ti-bar-chart"></i></span>
                      <div class="info-box-content">
                        <h6 class="info-box-text text-white">VIP Users</h6>
                        <h1 class="text-white">@if($vipUsers != FALSE) {{ count($vipUsers) }} @endif</h1>
                        <span class="progress-description text-white"> 50% Increase in 30 Days </span> </div>
                      <!-- /.info-box-content --> 
                    </div>
                    <!-- /.info-box --> 
                  </div>
                  <!-- /.col -->
                  <div class="col-lg-3 col-sm-6 col-xs-12" style="display:none;">
                    <div class="info-box bg-orange"> <span class="info-box-icon bg-transparent"><i class="ti-money"></i></span>
                      <div class="info-box-content">
                        <h6 class="info-box-text text-white">Total Profit</h6>
                        <h1 class="text-white">$8,188</h1>
                        <span class="progress-description text-white"> 35% Increase in 30 Days </span> </div>
                      <!-- /.info-box-content --> 
                    </div>
                    <!-- /.info-box --> 
                  </div>
                  <!-- /.col --> 
                </div>
                 <h4 class="text-black m-b-1">Filters</h4>
                <div class="row m-t-4">
                  <div class="col-lg-2 col-sm-3 col-xs-6">
                    <p>First Date: <input type="text" id="datepicker" name="firstDate" class="form-control firstDate" placeholder="Click Here For Select Date" readonly="readonly" /></p>
                  </div>
                  <div class="col-lg-2 col-sm-3 col-xs-6">
                    <p>Second Date: <input type="text" id="datepicker1" name="firstDate" class="form-control lastDate" placeholder="Click Here For Select Date" readonly="readonly" /></p>
                  </div>
                  <div class="col-lg-2 col-sm-3 col-xs-6">
                   <button style="margin-top:20px;" type="button" id="fetchUser" name="fetchUser" class="btn btn-success" />Get Users</button>
                  </div>
                  <div class="col-lg-5 col-sm-6 col-xs-6">
                   <input style="margin-top:15px;" type="text" class="search form-control col-sm-12" placeholder="What you looking for ?">
                  </div>
                </div>
                <div class="box-body">
                <div class="table-responsive" id="loadUserData">
                  <table id="example2" class="userTbl table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID #</th>
                        <th>Name </th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Pin Code</th>
                        <th>Mobile </th>
                        <th>Join Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @if($users != FALSE)
                       @php $i=1; @endphp
                       @foreach($users as $listArr)
                         <tr>
                          <td>@if(!empty($i)){{ $i }} @endif </th>
                          <td>@if(!empty($listArr->name)){{ $listArr->name }} @endif</td>
                          <td>@if(!empty($listArr->email)){{ $listArr->email }} @endif</td>
                          <td>
                          @if($listArr->status==1)<span class="label label-success">verify</span>
                           @else<span class="label label-warning">pending</span>@endif
                         </td>
                          <td>@if(!empty($listArr->pincode)){{ $listArr->pincode }} @endif</td>
                          <td>@if(!empty($listArr->mobileNumber)){{ $listArr->mobileNumber }} @endif </td>
                          <td>@if(!empty($listArr->created_at)){{ date("d-M-Y h:ia",$listArr->created_at) }} @endif</th>
                          <td><a href="#" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a></td>
                      </tr>
                         @php $i++; @endphp
                       @endforeach
                     @endif 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID #</th>
                        <th>Name</th>
                        <th>Email</th>
                          <th>Status</th>
                        <th>Pin Code</th>
                        <th>Mobile</th>
                        <th>Join Date</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Main row --> 
    </section>
<!-- template --> 
<!-- DataTable --> 
<script src="<?php echo url("backu/webuAdmin/dist/plugins/datatables/jquery.dataTables.min.js");?>"></script> 
<script src="<?php echo url("backu/webuAdmin/dist/plugins/datatables/dataTables.bootstrap.min.js");?>"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  $( function() {
    $( "#datepicker1" ).datepicker();
  } );
  </script> 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection 