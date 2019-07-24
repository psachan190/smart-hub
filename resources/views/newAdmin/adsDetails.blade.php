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
          <div class="col-md-12">
            <div class="card" style="padding:15px;">
              <div class="card-header">
                <h5 class="card-title">Advertisement Details / Post Date :  <?php if(!empty($vPostAdsDetails->created_at)) echo $vPostAdsDetails->created_at; ?> </h5>
              </div>
              <input type="hidden" name="vAdsID" id="vAdsID" value="<?php if(!empty($vPostAdsDetails->id)) echo $vPostAdsDetails->id; ?>"> 
                <img src="<?php $image = $vPostAdsDetails->image; echo url("uploadFiles/vendorAdspost/$image"); ?>" class="img img-responsive">
                <div style="margin-top:15px;">
                     <p>Ads Start Date :- <?php if(!empty($vPostAdsDetails->startDate)) echo $vPostAdsDetails->startDate; ?> </p>
                      <p>Ads End Date :- <?php if(!empty($vPostAdsDetails->endDate))echo $vPostAdsDetails->endDate; ?> <??></p>
                   </div>
                   <div style="margin-top:15px;">
                     <h4>Post Description</h4>
                     <p><?php if(!empty($vPostAdsDetails->description)) echo $vPostAdsDetails->description; ?> </p>
                   </div>
                   <div style="margin-top:15px;">
                     <p>Status :-
                      <?php if($vPostAdsDetails->adminStatus =="Y"){?> Verify <?php }else{ ?>
				     Unverify
				   <?php } ?> </p>
                   </div>
                    <?php if($vPostAdsDetails->adminStatus =="Y"){?> 
                    <button type="button" class="adsVerify btn btn-danger" id="N">Block</button>
                     <?php }else{ ?>
				   <button type="button" class="adsVerify btn btn-success" id="Y">Verify</button>
				   <?php } ?>
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
  <!------Advertisement Verify ---->
  $(document).on('click',".adsVerify",function(){
	  var id = $("#vAdsID").val();
	  var status = this.id;
	  $.ajax({
			type:'GET',
			url:'<?php echo url("adminAgaxget/vVerifyAds"); ?>',
			data:{status:status , id:id},
			success:function(res){
			  alert(res)
			  location.reload();
			}
	   })
  });
 <!------block shop image status--End---->     
});
</script>
@stop 