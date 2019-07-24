@extends("layout")
@section('content') 
  @include('vendor.template.marketPlacenavigation')
  <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                           <li><a href='{{ url("vendorBackup/$vendorData->id/firstDashborad") }}'>Welcome</a></li>
                            <li class="active"><a href="#">Gallery Image list</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Gallery Image list</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="container-fluid">
 <div class="row normal-padding">
   <div class="col-sm-12 col-md-6 col-lg-3">
     	<div>
         <ul class="mdn-accordion">
           <li class="subtop"><a href="#"><i class="fa fa-random"></i>Image Category &nbsp;</a></li>
                <li><a href='<?php echo url("vendor/$vendorData->username/gallery"); ?>'><i class="fa fa-angle-double-right"></i>Add Gallery Image</a></li>
                <li><a href='<?php echo url("vendor/$vendorData->username/galleryImageList"); ?>'><i class="fa fa-angle-double-right"></i>Gallery Image List</a></li>
        </ul>
        </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9">
     <div class="post">
     <style>
          .headingMain{ font-size:20px; color:#F00; font-weight:700; }
		  .imageBlog{ margin-top:0px;}
          </style>
        <div class="content">
          <h2 class="headingMain">Gallery Image List </h2>
         <div class="row" style="margin-top:20px;">
          <p id="result"></p>
          <?php 
		   if($imageListArr != FALSE){
		      foreach($imageListArr as $list){
				  ?>
				  <div class="col-sm-3 imageBlog tooltip1">
                   <img src="<?php echo url("uploadFiles/gallery/$list->image"); ?>" class="img img-responsive img-thumbnail" />
                   <span class="tooltiptext">Tooltip textThe tooltip text is placed inside an inline element (like <span>) with class="tooltiptext"</span>
                   <button type="submit" name="deleteImageBtn" id="<?php echo $list->id; ?>" class="colorbuttoncss" style="background: none !important;font-size: 23px !important; border:none !important; color:#F00 !important;"><span class="lnr lnr-trash"></span></button>
                  </div>
				  <?php
				}
		   }
		  ?> 
         </div>
        </div>
     </div>
  </div>
 </div>
</div>
@stop
@section('footer')
 @parent
<script>
$(document).ready(function(e) {
   $(document).on('click','#addGallery',function(){
    $('#addGalleryImage').modal('show'); 
   }); 
});
</script>
<script>
$(document).ready(function(e) {
  $(document).on('click',".deleteImageBtn",(function(e) {
	  $(this).html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
      var id = this.id;
	  //alert(id);
	  $.ajax({
      url: "<?php echo url("deleteImageGallery"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){ 
	    //alert(data);
	     if(data==1){
		    $('#result').html("<span style='color:green;'><strong>Image Delete Successfully.</strong> </span>");
			location.reload(); 
		  }	
		 if(data==2){
		    $('#result').html("<span style='color:red;'><strong>Unexpected , try again.</strong> </span>");
		  } 
	   }	
     });
  }));
});
</script>
 @stop
