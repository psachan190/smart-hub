@extends('newAdmin.template.layout')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile / @if(!empty($participantDetails->title)){{ $participantDetails->title }} @endif</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                 @if(!empty($participantDetails->imageLogo))
                   @php  $image = $participantDetails->image_path; @endphp
                   <img src="<?php if(!empty($shopImg)) echo $shopImg; ?>" alt="@if(!empty($participantDetails->title)){{ $participantDetails->title }} @endif" />
                 @else
                   <img src="<?php echo url("public/uploadFiles/shopProfileImg/marketPlace.png"); ?>" alt="@if(!empty($participantDetails->title)){{ $participantDetails->title }} @endif" />
                 @endif 
                  
                </div>
                <h3 class="profile-username text-center">@if(!empty($participantDetails->name)){{ $participantDetails->name }} @endif</h3>
<ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Business Type</b> <a class="float-right">@if(!empty($vendor_profile->businesscategoryType)){{ $bTypearr[$vendor_profile->businesscategoryType] }} @endif</a>
                  </li>
                  <li class="list-group-item">
                    <b>Registered Date</b> <a class="float-right"><?php if(!empty($vendor_profile->crvDate))echo date('d/M/Y H:i:sa', $vendor_profile->crvDate); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Status</b> <a class="float-right"><?php if(!empty($vendor_profile->crvStatus)){ if($vendor_profile->crvStatus =="Y"){ echo"Verify"; }else echo"Un Verify"; }?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Request for live	</b> <a class="float-right"><?php if(!empty($vendor_profile->goLiveRequest)){ if($vendor_profile->goLiveRequest ==1){ echo"Live"; }else echo"dont Live"; } else { echo "No"; } ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Payment Status</b> <a class="float-right"><?php if(!empty($vendor_profile->paymentStatus)){ if($vendor_profile->paymentStatus=="Y"){ echo"Payment Complete";  }else { echo "failed"; } } else echo "pending"; ?></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      @if($timeLineData != FALSE)
                        @foreach($timeLineData as $listArr)
                          <li>
                        <i class="fa fa-clock-o bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i><?php if(!empty($listArr->created_at))echo date('d-M-Y H:i:s'); ?></span>
                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                          <div class="timeline-body">
                            <img src="<?php if(!empty($listArr->participant_data))echo $listArr->participant_data; ?>" alt="<?php if(!empty($listArr->about_data))echo $listArr->about_data; ?>" class="img img-responsive" />
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </li>
                        @endforeach
                      @endif
                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                    </ul>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@stop
@section('footer')
  @parent
<script>
$(document).ready(function(e) {
 $(document).on('click',".paymentStatusVerify",function(){
   var valueStatus = $(this).val();
   var id = $("#vendorDetailID").val();
   $.ajax({
		type:'GET',
		url:'<?php echo url("adminAgaxget/paumentStaus"); ?>',
		data:{valueStatus:valueStatus,id:id},
		success:function(res){
		 location.reload();
		}
   })
  });    
  <!--Shop Details verify  start-->
   $(document).on('click',".vDetailsverify",function(){
	  var status = this.id;
	  var id = $("#vendorDetailID").val();
	  $.ajax({
			type:'GET',
			url:'<?php echo url("adminAgaxget/vDetailsBlockorUnblock"); ?>',
			data:{status:status  , id:id},
			success:function(res){
			  location.reload();
			}
	   })
  });
  <!--Shop Details verify End -->
  <!---Vendor Business Details upload-->
    $(document).on('click',".vBusinessDetailsverify",function(){
	  var status = this.id;
	  var id = $("#businessID").val();
	  $.ajax({
			type:'GET',
			url:'<?php echo url("adminAgaxget/businessStatus"); ?>',
			data:{status:status  , id:id},
			success:function(res){
			 //alert(res);
			  location.reload();
			}
	   })
  });
  <!---Vendor Business Details upload-->
});
  </script>
@stop