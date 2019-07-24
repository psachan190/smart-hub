@extends('newAdmin.template.layout')
@section('content')
<?php $bTypearr = array("1"=>"Goods","2"=>"Services","3"=>"Goods & Services Both"); ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile / @if(!empty($vendor_profile->vName)){{ $vendor_profile->vName }} @endif</h1>
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
                  <input type="hidden" name="vendorDetailID" id="vendorDetailID" value="<?php if(!empty($vendor_profile->id)) echo $vendor_profile->id; ?>"> 
                 @if(!empty($vendor_profile->imageLogo))
                   @php  $shopImg = $vendor_profile->imageLogo; @endphp
                   <img src="<?php echo url("public/uploadFiles/shopProfileImg/thumbImg/$shopImg"); ?>" alt="@if(!empty($vendor_profile->vName)){{ $vendor_profile->vName }} @endif" />
                 @else
                   <img src="<?php echo url("public/uploadFiles/shopProfileImg/marketPlace.png"); ?>" alt="@if(!empty($vendor_profile->vName)){{ $vendor_profile->vName }} @endif" />
                 @endif 
                  
                </div>

                <h3 class="profile-username text-center">@if(!empty($vendor_profile->name)){{ $vendor_profile->name }} @endif</h3>

                <p class="text-muted text-center">@if(!empty($vendor_profile->vEmail)){{ $vendor_profile->vEmail }} @endif</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Mobile</b> <a class="float-right">@if(!empty($vendor_profile->vMobile)){{ $vendor_profile->vMobile }} @endif</a>
                  </li>
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
                <?php
                  if($vendor_profile->paymentStatus == "Y"){ ?>
						  <button type="button" class="paymentStatusVerify btn btn-primary btn-block" value="N">Payment Block</button>
						   <?php }
						  else{
							  ?>
							 <button type="button"  class="paymentStatusVerify btn btn-primary btn-block" value="Y">Payment Complete</button> 
							  <?php
						}
						?>
                        
                          <?php if(!empty($vendor_profile->crvStatus)){ if($vendor_profile->crvStatus == "Y"){?>
                          <button type="button"  id="N" class="vDetailsverify btn btn-danger btn-block">Shop Block</button>
                           <?php }else{ ?>
				          <button type="button" id="Y" class="vDetailsverify btn btn-success btn-block">Shop Verify</button>
				   <?php } } ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Business Details</h3>
                 <input type="hidden" name="businessID" id="businessID" value="<?php if(!empty($vendor_profile->businessDetailID)) echo $vendor_profile->businessDetailID; ?>"> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fa fa-book mr-1"></i>Sales Category</strong>
                <p class="text-muted">
                  <?php if(!empty($vendor_profile->categoryType)){
                                         $resultShop = $obj->getShoplist($vendor_profile->categoryType); 
							       $i=1;
								   foreach($resultShop as $shop){
									   $shopCat[$i] = $shop->cname;
									  $i++;
									 }
								   $shopsCategory =  implode(" , ",$shopCat);
								print_r($shopsCategory);
							} ?>
                </p>
                <hr>
                <strong><i class="fa fa-users mr-1"></i> Owner name</strong>
                <p class="text-muted"><?php if(!empty($vendor_profile->ownerName))echo $vendor_profile->ownerName; ?></p>
                <hr>
                <strong><i class="fa fa-map-marker mr-1"></i> Location</strong>
                <p class="text-muted"><?php if(!empty($vendor_profile->address1))echo $vendor_profile->address1; ?>@if(!empty($vendor_profile->address2)){{ " , ".$vendor_profile->address2 }} @endif @if(!empty($vendor_profile->address3)){{ " , ".$vendor_profile->address3 }} @endif  @if(!empty($vendor_profile->pinCode)){{ " , ".$vendor_profile->pinCode }} @endif</p>
                <hr />
                <strong><i class="fa fa-map-marker mr-1"></i> City / State</strong>
                <p class="text-muted"><?php if(!empty($vendor_profile->city))echo $vendor_profile->city; ?> / @if(!empty($vendor_profile->state)){{ $vendor_profile->state }} @endif </p>
                <hr />
                 <strong><i class="fa fa-map-marker mr-1"></i> GST Number</strong>
                <p class="text-muted"><?php if(!empty($vendor_profile->gstNumber))echo $vendor_profile->gstNumber; else echo "N/A"; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!empty($vendor_profile->gstFile)){?><a target="_blank" href="<?php echo url("public/uploadFiles/businessDetails/gstFile")."/".$vendor_profile->gstFile; ?>">View GST File</a><?php } ?></p>
                <hr />
                 <strong><i class="fa fa-map-marker mr-1"></i>PAN Number</strong>
                <p class="text-muted"><?php if(!empty($vendor_profile->panCardNumber))echo $vendor_profile->panCardNumber; ?></p>
                <hr />
                <strong><i class="fa fa-file-text-o mr-1"></i> About Business</strong>
                <p class="text-muted"><?php if(!empty($vendor_profile->aboutBusiness))echo $vendor_profile->aboutBusiness; ?></p>
                <strong><i class="fa fa-pencil mr-1"></i>Status</strong>
                <p class="text-muted"><?php if(!empty($vendor_profile->bussadminStatus)){ if($vendor_profile->bussadminStatus =="Y"){ echo"Verify"; }else { echo"Un Verify"; } } ?></p>
                <hr />
                <p class="text-muted"> <?php if(!empty($vendor_profile->bussadminStatus)){ if($vendor_profile->bussadminStatus =="Y"){ ?> <button type="button"  class="vBusinessDetailsverify btn btn-danger btn-block" id="N">Block</button><?php }else { ?> 
                <button type="button"  class="vBusinessDetailsverify btn btn-success btn-block" id="Y">Verify</button><?php } } ?> </p>

                <hr>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="fa fa-comments-o mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="fa fa-comments-o mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                          <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
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