@extends('newAdmin.template.layout')
@section('content')
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
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
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-google-plus"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41 , 410</span>
              </div>
            </div>
          </div>
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <hr />
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">@if($users != FALSE) {{ count($users) }} @endif </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Active Users</span>
                <span class="info-box-number">@if($activeUsers != FALSE) {{ count($activeUsers) }} @endif</span>
              </div>
            </div>
          </div>
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">VIP Users</span>
                <span class="info-box-number">@if($vipUsers != FALSE) {{ count($vipUsers) }} @endif</span>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <hr />
          <h6 class="text-black m-b-1">Filters</h6>
                <div class="row m-t-4">
                  <div class="col-lg-2 col-sm-3 col-xs-6">
                    <p>First Date: <input type="text" id="datep" name="firstDate" class="form-control firstDate" placeholder="Click Here For Select Date" readonly="readonly" /></p>
                  </div>
                  <div class="col-lg-2 col-sm-3 col-xs-6">
                    <p>Second Date: <input type="text" id="datep2" name="firstDate" class="form-control lastDate" placeholder="Click Here For Select Date" readonly="readonly" /></p>
                  </div>
                  <div class="col-lg-2 col-sm-3 col-xs-6">
                   <button style="margin-top:20px;" type="button" id="fetchUser" name="fetchUser" class="btn btn-success" />Get Users</button>
                  </div>
                </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Users List</h5>
              </div>
              <!-- /.card-header -->
            <div class="card-body loadUserData">
              <table id="example1" class="table table-bordered table-striped">
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
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script> 
 <script>$(function() {
        $( "#datep" ).datepicker({
            dateFormat : 'dd/mm/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d'
        });
    });
</script>
<script>$(function() {
        $( "#datep2" ).datepicker({
            dateFormat : 'dd/mm/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d'
        });
    });
</script>
 
@stop