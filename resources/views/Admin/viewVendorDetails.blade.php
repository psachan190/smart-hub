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
<?php
//echo "<pre>";
//print_r($vendorDetails);exit;
?>
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
              <a href="<?php echo url("vendorList"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>
&nbsp; Back</a> 
            </div>
            <div class="row" style="margin-top:30px;">
              <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-10 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php if(!empty($vendorDetails->vName))echo $vendorDetails->vName; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9 col-lg-9 "> 
                  <input type="hidden" name="vendorDetailID" id="vendorDetailID" value="<?php if(!empty($vendorDetails->id)) echo $vendorDetails->id; ?>"> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>User Name:</td>
                        <td><?php if(!empty($vendorDetails->name))echo $vendorDetails->name; ?></td>
                      </tr>
                      <tr>
                        <td>Email :</td>
                        <td><?php if(!empty($vendorDetails->email))echo $vendorDetails->email; ?></td>
                      </tr>
                      <tr>
                        <td>Mobile</td>
                        <td><?php if(!empty($vendorDetails->vMobile))echo $vendorDetails->vMobile; ?></td>
                      </tr>
                      <tr>
                        <td>Business Type</td>
                        <td><?php if(!empty($vendorDetails->businesscategoryType))echo $bTypearr[$vendorDetails->businesscategoryType]; ?></td>
                      </tr>
                        <tr>
                        <td>Sales Category</td>
                        <td><?php if(!empty($vendorDetails->categoryType)){
                                         $resultShop = $obj->getShoplist($vendorDetails->categoryType); 
							       $i=1;
								   foreach($resultShop as $shop){
									   $shopCat[$i] = $shop->cname;
									  $i++;
									 }
								   $shopsCategory =  implode(",",$shopCat);
								print_r($shopsCategory);
							} ?></td>
                      </tr>
                        <tr>
                        <td>Payment Status </td>
                        <td><?php if(!empty($vendorDetails->paymentStatus)){ if($vendorDetails->paymentStatus=="Y"){ echo"Complete";  }else { echo "failed"; } } else echo "pending"; ?>&nbsp;&nbsp;
                        <?php
               
                          if($vendorDetails->paymentStatus =="Y"){ ?>
						  <button type="button" name="paymentStatusVerify" class="paymentStatusVerify" value="N">Block</button>
						   <?php }
						  else{
							  ?>
							 <button type="button" name="paymentStatusVerify" class="paymentStatusVerify" value="Y">Complete</button> 
							  <?php
							} 
						?>
                        </td>
                      </tr>
                      <tr>
                        <td>Registred Date</td>
                        <td><?php if(!empty($vendorDetails->crvDate))echo date('d/M/Y H:i:sa', $vendorDetails->crvDate); ?></td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td><?php if(!empty($vendorDetails->crvStatus)){ if($vendorDetails->crvStatus =="Y"){ echo"Verify"; }else echo"Un Verify"; }?></td>
                      </tr>
                      <tr>
                        <td>Request for live</td>
                        <td><?php if(!empty($vendorDetails->goLiveRequest)){ if($vendorDetails->goLiveRequest ==1){ echo"Live"; }else echo"dont Live"; } ?></td>
                      </tr>
                    </tbody>
                  </table>
                   <?php if(!empty($vendorDetails->crvStatus)){ if($vendorDetails->crvStatus =="Y"){?>  <button type="button" name="vDetailsverify" id="BlockvDetailsverify" class="btn btn-danger">Block</button> <?php }else{ ?>
				   <button type="button" name="vDetailsverify" id="vDetailsverify" class="btn btn-success">Verify</button>
				   <?php } } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Business Details</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9 col-lg-9 ">
                 <input type="hidden" name="businessID" id="businessID" value="<?php if(!empty($vendorDetails->businessDetailID)) echo $vendorDetails->businessDetailID; ?>"> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Owner Name:</td>
                        <td><?php if(!empty($vendorDetails->ownerName))echo $vendorDetails->ownerName; ?></td>
                      </tr>
                      <tr>
                        <td>About Business</td>
                        <td><?php if(!empty($vendorDetails->aboutBusiness))echo $vendorDetails->aboutBusiness; ?></td>
                      </tr>
                      <tr>
                        <td>Gst Number</td>
                        <td><?php if(!empty($vendorDetails->gstNumber))echo $vendorDetails->gstNumber; else echo "N/A"; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!empty($vendorDetails->gstFile)){?><a target="_blank" href="<?php echo url("public/uploadFiles/businessDetails/gstFile")."/".$vendorDetails->gstFile; ?>">View GST File</a><?php } ?></td>
                      </tr>
                      <tr>
                        <td>Pan Card Number</td>
                        <td><?php if(!empty($vendorDetails->panCardNumber))echo $vendorDetails->panCardNumber; ?></td>
                      </tr>
                      <tr>
                        <td>Signature</td>
                        <td><?php if(!empty($vendorDetails->signature)){ echo $vendorDetails->signature; } else{ echo "N/A"; } ?>&nbsp;&nbsp;&nbsp;<?php if(!empty($vendorDetails->signature)){ ?><a target="_blank" href="<?php echo url("public/uploadFiles/businessDetails/signature")."/".$vendorDetails->signature; ?>">View Signature</a><?php } ?></td>
                      </tr>
                        <td>Status</td>
                        <td><?php if(!empty($vendorDetails->bussadminStatus)){ if($vendorDetails->bussadminStatus =="Y"){ echo"Verify"; }else { echo"Un Verify"; } } ?></td>
                      </tr>
                    </tbody>
                  </table>
                  <?php if(!empty($vendorDetails->bussadminStatus)){ if($vendorDetails->bussadminStatus =="Y"){ ?> <button type="button" name="blockvBusinessDetailsverify" id="blockvBusinessDetailsverify" class="btn btn-danger">Block</button><?php }else { ?> <button type="button" name="vBusinessDetailsverify" id="vBusinessDetailsverify" class="btn btn-success">Verify</button><?php } } ?>
                 
                
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Modules</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9 col-lg-9 ">
                
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Shop View</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9 col-lg-9 "> 
                   <div class="row">
                     <div class="col-sm-12">
                      <input type="hidden" name="shopImgID" id="shopImgID" value="<?php if(!empty($vendorDetails->shopimgID)) echo $vendorDetails->shopimgID; ?>">
                       <?php
                       if(!empty($vendorDetails->imageLogo)){
					     $shopImg = $vendorDetails->imageLogo;
                         if(empty($vendorDetails->imageLogo)){
							?><img src="<?php echo url("public/uploadFiles/shopProfileImg/marketPlace.png"); ?>" /><?php
							}
						  else{
							  ?><img src="<?php echo url("public/uploadFiles/shopProfileImg/$shopImg"); ?>" /><?php
							 }	
					}   ?>
                     </div>
                     <div class="col-sm-12">
                       <?php if(!empty($vendorDetails->vName))echo $vendorDetails->vName; ?>
                     </div>
                      <div class="col-sm-12">
                     <?php if(!empty($vendorDetails->aboutBusiness))echo $vendorDetails->aboutBusiness; ?>
                     </div>
                   </div>
                  <p id="shopImageverify"></p>   
				  <?php if(!empty($vendorDetails->shopImgadminStatus)){ if($vendorDetails->shopImgadminStatus =="Y"){ ?> <button type="button" name="blockshopImageverify" id="blockshopImageverify" class="btn btn-danger">Block</button><?php }else { ?> <button type="button" name="shopImageverify" id="shopImageverify" class="btn btn-success">Verify</button><?php }} ?>
                 
                
                </div>
              </div>
            </div>
          </div>
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
  $(document).on('click',"#blockshopImageverify",function(){
      var permission = "block"
	  var id = $("#shopImgID").val();
	  $.ajax({
			type:'GET',
			url:'<?php echo url("shopBlockandUnblock"); ?>',
			data:{permission:permission,id:id},
			success:function(res){
			  //alert(res);
			  $('#shopImageverify').html("<span style='color:#43ad81'></span>");
			  location.reload();
			}
	   })
  });
 <!------block shop image status--End---->     
  <!------UNblock shop image status--Start---->
  $(document).on('click',"#shopImageverify",function(){
      var permission = "Unblock"
	   var id = $("#shopImgID").val(); 
	  $.ajax({
			type:'GET',
			url:'<?php echo url("shopBlockandUnblock"); ?>',
			data:{permission:permission,id:id},
			success:function(res){
			   $('#shopImageverify').html("<span style='color:#43ad81'></span>");
			  location.reload();
			}
	   })
  });
  <!------UNblock shop image status--End---->     
});
</script>
<script>
$(document).ready(function(e) {
  <!------block shop image status--start---->
  $(document).on('click',"#blockvBusinessDetailsverify",function(){
      var permission = "block"
	  var id = $("#businessID").val();
	  $.ajax({
			type:'GET',
			url:'<?php echo url("businessDetailsBlockandUnblock"); ?>',
			data:{permission:permission,id:id},
			success:function(res){
			  //alert(res);
			  $('#shopImageverify').html("<span style='color:#43ad81'></span>");
			  location.reload();
			}
	   })
  });
 <!------block shop image status--End---->     
  <!------UNblock shop image status--Start---->
  $(document).on('click',"#vBusinessDetailsverify",function(){
      var permission = "Unblock"
	   var id = $("#businessID").val(); alert(id);
	  $.ajax({
			type:'GET',
			url:'<?php echo url("businessDetailsBlockandUnblock"); ?>',
			data:{permission:permission,id:id},
			success:function(res){
			   $('#shopImageverify').html("<span style='color:#43ad81'></span>");
			  location.reload();
			}
	   })
  });
  <!------UNblock shop image status--End---->     
});
</script>
<script>
$(document).ready(function(e) {
  <!------block shop image status--start---->
  $(document).on('click',"#BlockvDetailsverify",function(){
      var permission = "block"
	  var id = $("#vendorDetailID").val();
	  $.ajax({
			type:'GET',
			url:'<?php echo url("vDetailsBlockorUnblock"); ?>',
			data:{permission:permission,id:id},
			success:function(res){
			  //alert(res);
			  //$('#shopImageverify').html("<span style='color:#43ad81'></span>");
			  location.reload();
			}
	   })
  });
 <!------block shop image status--End---->     
  <!------UNblock shop image status--Start---->
  $(document).on('click',"#vDetailsverify",function(){
	  var permission = "Unblock"
	   var id = $("#vendorDetailID").val(); //alert(id);
	  $.ajax({
			type:'GET',
			url:'<?php echo url("vDetailsBlockorUnblock"); ?>',
			data:{permission:permission,id:id},
			success:function(res){
			   //alert(res);
			   //$('#shopImageverify').html("<span style='color:#43ad81'></span>");
			  location.reload();
			}
	   })
  });
  <!------UNblock shop image status--End----> 
  
  <!------payment status verify status Script start---->
  $(document).on('click',".paymentStatusVerify",function(){
	   var valueStatus = this.value;
	   var id = $("#vendorDetailID").val();
	  $.ajax({
			type:'GET',
			url:'<?php echo url("paumentStaus"); ?>',
			data:{valueStatus:valueStatus,id:id},
			success:function(res){
			  location.reload();
			}
	   })
  });
  <!------payment status verify status Script End----> 
  
      
});
</script>

@endsection 