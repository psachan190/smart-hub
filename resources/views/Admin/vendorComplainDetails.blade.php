@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
         <li><i class="fa fa-angle-right"></i> Vendor Complain Details</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
             <div class="row">      
              <a href="<?php echo url("vendorComplain"); ?>" class="btn btn-info">Back</a>
              <div class="col-sm-12">
                <div class="content">
		         <div id="commentBox">
                   <meta name="csrf-token" content="{{ csrf_token() }}" />
                   <form id="commentForm">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="sendorID" id="sendorID" value="<?php if(!empty($complainData->receiverID))echo $complainData->receiverID; ?>" readonly="readonly" />
            <input type="hidden" name="recieverID" id="recieverID" value="<?php if(!empty($complainData->vendordetails_id))echo $complainData->vendordetails_id; ?>" readonly="readonly" />
            <input type="hidden" name="complain_id" id="complain_id" value="<?php if(!empty($complainData->id))echo $complainData->id; ?>" readonly="readonly" />
            <div id="commentResult">
             
            </div>
          <textarea name="message" id="myTextarea2"><?php echo old('myTextarea2');  ?></textarea>
          <div id="sendBtn" style="margin-top:10px;">
           <button class="btn btn-success" type="submit" id="sendComment" name="sendComment">Send</button>
           <button style="display:none;" class="btn btn-success" type="reset" id="reset" name="sendComment">reset</button>
           
          </form> 
                 </div>
                </div>
                <div class="head" style="margin-top:20px;">
		  <p>Subjet : <?php if(!empty($complainDetails[0]->subject))echo $complainDetails[0]->subject; ?></p>
           <p>Date : <?php if(!empty($complainDetails[0]->complainDate))echo date("d/M/y h:i:sA",$complainDetails[0]->complainDate); ?></p>
          </div>
                </div>
              </div>
              <div class="col-sm-12" id="blogComment">
                <div class="content">
		         <?php 
				if($complainDetails != FALSE){
				   foreach($complainDetails as $complain){
					   if($complain->sendorID == "admin"){
						   ?>
						   <div class="well" style="background-color:#CCC; margin-top:15px; padding:20px;">
					         <div class="media">
      	        <div class="media-body">
                 <p class="text-right"><?php if(!empty($complain->created_at))echo $complain->created_at; ?></p>
                 <p><?php if(!empty($complain->message))echo $complain->message; ?></p>
       </div>
    </div>
                           </div>
						   <?php
						 }
					   else{
						   ?>
						   <div class="well" style="background-color:#ffcccc; margin-top:15px; padding:20px;">
					         <div class="media">
      	        <div class="media-body">
                 <p class="text-right"><?php if(!empty($complain->created_at))echo $complain->created_at; ?></p>
                 <p><?php if(!empty($complain->message))echo $complain->message; ?></p>
       </div>
    </div>
                           </div>
						   <?php 
						 }	 
					 }
				 }
				  ?>
                 <div class="well" style="background-color:#ffcccc; padding:20px;">
             <div id="">
			   <?php 
                 if(!empty($complainData->image)){
                    ?>
                    <img src="<?php echo url("uploadFiles/complainFiles/1Capturecolor.PNG"); ?>" />
                    <?php
                  }
               ?>
             </div>
         </div>
                </div>
              </div>
            </div>
         </div>
     </div>
      <!-- Main row --> 
    </section>
<script src="{{ url('kanpurizeTheme/editor/tinymce.min.js') }}" type="text/javascript"></script>
<script src='{{ url("kanpurizeTheme/editor/editorBox.js") }}'></script>
<script>
$(document).ready(function(e) {
 $.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
  $(document).on('submit',"#commentForm",(function(e) {
	//$('#saveNews').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
	//alert("yes");
	e.preventDefault();
      $.ajax({
      url: "<?php echo url("addVendorComplainComment"); ?>",
      type: "POST",        
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cach ed
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data){ 
	     if(data == 1){
			 $('#blogComment').load(document.URL + ' #blogComment');
			 $("#reset").click();
			}
		 else if(data ==2){
			  $("#commentResult").html("Unexpected Try again....");
			}
		 else{
			  $("#commentResult").html("<p class='alert alert-danger'>" + data + "</p>");
			}		
			
	   }	
     });
  }));
});
</script>   
@endsection 