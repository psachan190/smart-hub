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
              <input type="hidden" name="voffersNews" id="voffersNews" value="<?php if(!empty($offerNewsData->id)) echo $offerNewsData->id; ?>" readonly="readonly" /> 
                 @if(!empty($offerNewsData->image))
                     <img src="<?php $image = $offerNewsData->image; echo url("uploadFiles/offersNews/$image"); ?>" class="img img-responsive">
                   @endif
                <div style="margin-top:15px;">
                     <p><strong>Ads Start Date :-</strong> <?php if(!empty($offerNewsData->startDate)) echo date("d-M-Y H:i:s" ,$offerNewsData->startDate); ?> </p>
                      <p><strong>Ads End Date :-</strong> <?php if(!empty($offerNewsData->endDate))echo date("d-M-Y H:i:s" ,$offerNewsData->endDate); ?> <??></p>
                   </div>
                   <div style="margin-top:15px;">
                     <h4><strong>Post Description</strong></h4>
                     <p><?php if(!empty($offerNewsData->description)) echo $offerNewsData->description; ?> </p>
                   </div>
                   <div style="margin-top:15px;">
                     <p><strong>Status </strong>:-
                      <?php if($offerNewsData->adminStatus =="Y"){?> Verify <?php }else{ ?>
				     Unverify
				   <?php } ?> </p>
                   </div>
                  <?php if($offerNewsData->adminStatus =="Y"){?> <button type="button" name="blockadsVerify" id="blockadsVerify" class="btn btn-danger newsStatus" value="N">Block</button> <?php }else{ ?>
				   <button type="button" value="Y" name="adsVerify" id="adsVerify" class="btn btn-success newsStatus">Verify</button>
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
  <!------block shop image status--start---->
  $(document).on('click',".newsStatus",function(){
      var permission = $(this).val(); 
	  var id = $("#voffersNews").val();
	  $.ajax({
			type:'GET',
			url:'<?php echo url("adminAgaxget/vVerifyOffersNews"); ?>',
			data:{permission:permission,id:id},
			success:function(res){
			  //alert(res);
			  location.reload();
			}
	   })
  });
 });
</script>
@stop 