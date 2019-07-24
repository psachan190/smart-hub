<?php 
//echo "<pre>";
//print_r($vendorDetails);
$bTypearr = array("1"=>"Goods","2"=>"Services","3"=>"Goods & Services Both"); ?>
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
              <a href="<?php echo url("extraSaleShopcat"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>
&nbsp; Back</a> 
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
               {!! Session::has('msg') ? Session::get("msg") : '' !!}
            </div>
            <div class="col-sm-2"></div>
            </div>
            <div class="row" style="margin-top:30px;">
              <div class="container">
               <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-10 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php if(!empty($vendorDetails->vName))echo $vendorDetails->vName; ?></h3>
            </div>
           <form action="<?php echo url("addShop"); ?>" method="post" name="shopcatForm" id="shopcatForm">
            <?php echo csrf_field(); ?> 
            <div class="panel-body">
              <div class="row">
               <div class="col-sm-12">
                  <p>Registered Shop Category</p>
               </div>
              </div>
              <div class="row">
              <input type="hidden" name="shopID" readonly="readonly" value="<?php echo $vendorDetails->id; ?>" />
             <?php 
			 if($resultShop != FALSE){
			   foreach($resultShop as $shop){
				   ?>
				   <div class="col-sm-4">
					 <p><input type="checkbox" name="registeredShop[]" id="registeredShop" checked="checked" value="<?php echo $shop->cid; ?>" />&nbsp;<?php echo $shop->cname; ?></p>
					 
				   </div>
				   <?php
				 }
			   }      
			  ?>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
               <div class="col-sm-12">
                  <p>UnRegistered Shop Category</p>
               </div>
              </div>
              <div class="row">
              <?php 
				if($unRegistered != FALSE){
				   foreach($unRegistered as $shop){
					   ?>
					   <div class="col-sm-4">
						 <p><input type="checkbox" name="registeredShop[]" id="registeredShop" value="<?php echo $shop->cid; ?>" />&nbsp;<?php echo $shop->cname; ?></p>
						 
					   </div>
					   <?php
					 }
				   }      
			  ?>
              </div>
            </div>
            <div class="col-sm-2">
			  <p><button type="submit" name="submit" class="btn btn-success" id="submit" class="form-control">Add</button></p>
			</div>
          </form> 
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
});
</script>

@endsection 