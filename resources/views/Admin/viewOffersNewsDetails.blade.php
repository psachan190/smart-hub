<?php $bTypearr = array("1"=>"Goods","2"=>"Services","3"=>"Goods & Services Both"); ?>
@extends("Admin.template.masterAdmin")
@section('content')
<style>
.user-row { margin-bottom: 14px; }
.user-row:last-child { margin-bottom: 0; }
.dropdown-user { margin: 13px 0; padding: 5px; height: 100%; }
.dropdown-user:hover { cursor: pointer; }
.table-user-information > tbody > tr { border-top: 1px solid rgb(221, 221, 221); }
.table-user-information > tbody > tr:first-child { border-top: 0; }
.table-user-information > tbody > tr > td { border-top: 0; }
.toppad {margin-top:20px; }
</style>
<section class="content-header sty-one">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Quiz List</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
              <a href="<?php echo url("vendorOffersNews"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>
&nbsp; Back</a> 
            </div>
            <div class="row" style="margin-top:30px;">
              <div class="">
                <div class="panel-heading">
              <h3 class="panel-title"><?php if(!empty($offerNewsData->vName))echo $offerNewsData->vName; ?></h3>
            </div>
                <div class="row">
                <div class="col-md-9 col-lg-9 "> 
                  <input type="" name="voffersNews" id="voffersNews" value="<?php if(!empty($offerNewsData->id)) echo $offerNewsData->id; ?>" readonly="readonly" /> 
                   @if(!empty($offerNewsData->image))
                     <img src="<?php $image = $offerNewsData->image; echo url("uploadFiles/offersNews/$image"); ?>" class="img img-responsive">
                   @endif
                    <div style="margin-top:15px;">
                     <p>Start Date :- <?php if(!empty($offerNewsData->startDate)) echo $offerNewsData->startDate; ?> </p>
                      <p>End Date :- <?php if(!empty($offerNewsData->endDate))echo $offerNewsData->endDate; ?> <??></p>
                   </div>
                   <div style="margin-top:15px;">
                     <h4>News Description</h4>
                     <p><?php if(!empty($offerNewsData->newsDescription)) echo $offerNewsData->newsDescription; ?> </p>
                   </div>
                   <div style="margin-top:15px;">
                     <p>Status :-
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
         </div>
     </div>
      <!-- Main row --> 
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(e) {
  <!------block shop image status--start---->
  $(document).on('click',".newsStatus",function(){
      var permission = $(this).val(); 
	  var id = $("#voffersNews").val();
	  $.ajax({
			type:'GET',
			url:'<?php echo url("vVerifyOffersNews"); ?>',
			data:{permission:permission,id:id},
			success:function(res){
			  location.reload();
			}
	   })
  });
 });
</script>

@endsection 