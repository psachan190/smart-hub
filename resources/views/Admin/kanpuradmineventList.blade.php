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
                 <h4 class="text-black m-b-1">Filters</h4>
                <div class="box-body">
                <div class="table-responsive" id="loadUserData">
                  <table id="example2" class="userTbl table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID #</th>
                        <th>Title </th>
                        <th>Location</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @if($eventList != FALSE)
                       @php $i=1; @endphp
                       @foreach($eventList as $listArr)
                         <tr>
                          <td>@if(!empty($i)){{ $i }} @endif </th>
                          <td>@if(!empty($listArr->evntTitle)){{ $listArr->evntTitle }} @endif</td>
                          <td>@if(!empty($listArr->location)){{ $listArr->location }} @endif</td>
                          <td>@if(!empty($listArr->startdate)){{ date("d-M-Y h:i:sa",$listArr->startdate) }} @endif</td>
                          <td>@if(!empty($listArr->endDate)){{ date("d-M-Y h:i:sa",$listArr->endDate) }} @endif </td>
                          <td>@if(!empty($listArr->created_at)){{ date("d-M-Y h:ia",$listArr->created_at) }} @endif</th>
                          <td><a href="<?php echo url("editEventDetails/$listArr->id"); ?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a></td>
                      </tr>
                         @php $i++; @endphp
                       @endforeach
                     @endif 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID #</th>
                        <th>Title </th>
                        <th>Location</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Created Date</th>
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
    $( "#datepicker" ).datetimepicker();
  } );
  $( function() {
    $( "#datepicker1" ).datetimepicker();
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