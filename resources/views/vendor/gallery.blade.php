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
                            <li class="active"><a href="#">Gallery</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Gallery</h1>
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
          </style>
        <div class="content">
          <h2 class="headingMain">Upload Gallery Image </h2>
         <div class="row" style="margin-top:10px;">
           <meta name="csrf-token" content="{{ csrf_token() }}" />  
           <form id="uploadImage" name="uploadImage">
            <?php echo csrf_field(); ?>
                <input type="hidden" name="vendordetails_id" value="@if(!empty($vendorData)){{ $vendorData->id }} @endif" readonly />
                <input type="hidden" name="users_id" value="@if(!empty( $vendorData->users_id )){{ $vendorData->users_id }} @endif" readonly />
               <div class="form-group">
                    <label>Browse Image</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-md btn-file">
                                Browse Image<input  type="file" id="imgInp1" name="image" />
                            </span>
                        </span>
                        <input type="text" class="uploader1" name="imageName" id="imageName" readonly>
                    </div>
                </div>
               <div class="row" style="margin-top:25px;">
                <div class="col-sm-12">
                <label>Title</label>
                <div class="left-inner-addon">
                 <input type="text" name="title" id="title" placeholder="Enter Title"/>
               </div>
                </div>
              </div>
               <div class="row" style="margin-top:25px;">
                <div class="col-sm-12">
                <span id="resultDeclare"></span> 
                <div class="form-group">
              <button type="submit" name="submit" id="savePost" class="btn btn-md btn--round"><i style="color:#FFF;" class="fa fa-upload"></i>&nbsp;Upload Image </button>  
            </div>
             <img id="uploadGif" src="<?php echo url("public/kanpurizeTheme/uploading.gif"); ?>" style="display:none;" />
           <span id="uploadResult"></span>
                </div>
              </div>                 
         </form>
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
  $(document).on('submit',"#uploadImage",(function(e) {
	 $("#resultDeclare").html(""); 
	 $('#savePost').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
	e.preventDefault();
      $.ajax({
      url: "<?php echo url("vendorAgax/uploadGalleryImage"); ?>",
      type: "POST",        
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cach ed
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data){ 
	    $('#savePost').html('<i style="color:#FFF;" class="fa fa-upload"></i>&nbsp;Upload Image ').attr('disabled',false);
		 if(data == 1){
			$("#resultDeclare").html("<p style='color:green'><strong>Upload successfully.</strong></p>");
			location.reload();
			}
		 else if(data ==2){
			  $("#resultDeclare").html("<p style='color:red'><strong>Unexpected , try again .</strong></p>");
			}
		 else{
			  $("#resultDeclare").html("<p style='color:red'><strong>Image must be required .</strong></p>");
			}	
			
	   }	
     });
  }));
});
</script>
@stop      