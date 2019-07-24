@extends("vendor.template.masterVendor")
@section('content')
<div class="container-fluid" style="margin-bottom:100px;">
 <div class="row">
   <div class="col-sm-12 col-md-6 col-lg-3">
      <style>
.widget-sidebar { background-color: #fff; }
.title-widget-sidebar { font-size: 14pt; border-bottom: 2px solid #e5ebef; margin-bottom:15px; padding-bottom:10px;margin-top: 0px; }
.title-widget-sidebar:after {
    border-bottom: 2px solid #f1c40f;
    width: 150px;
    display: block;
    position: absolute;
    content: '';
    padding-bottom: 10px;
}
.recent-post{width: 100%;height: 80px;list-style-type: none;}
.post-img img { width: 100px; height: 70px; float: left;  margin-right: 15px;border: 5px solid #16A085;
transition: 0.5s;}
.recent-post a {text-decoration: none;color:#34495E;transition: 0.5s;}
.post-img, .recent-post a:hover{color:#F39C12;}
.post-img img:hover{border: 5px solid #F39C12;}
.right-inner-addon {
    position: relative;
}
.left-inner-addon i, .form-group .left-inner-addon i{display: inline-block;
position:absolute;z-index:3;text-indent: -15px;bottom: -8px;font-size: 1.3em;}
.left-inner-addon { position: relative;}
.left-inner-addon input { padding-left: 30px;}
.left-inner-addon i {position: absolute;padding: 10px 20px; pointer-events:none;}
     </style>
      <div class="widget-sidebar" id="sidebarRef">
        <h2 class="title-widget-sidebar">RECENT POST</h2>
           <div class="content-widget-sidebar back">
            <ul>
              <?php
                if($complainList != FALSE){
				    foreach($complainList as $listArr){
						$complainID = base64_encode($listArr->id);
					   ?>
					   <li class="recent-post">
                        <a href='{{ url("kanpurizeVendorComplain/$complainID") }}'>
                         <p><small><i class="fa fa-calendar" data-original-title="" title=""></i>&nbsp;
					      <?php if(!empty($listArr->created_at))echo date("d/M/y h:i:sA",$listArr->created_at); ?>
                       </small></p>
                        <h6> <?php if(!empty($listArr->subject ))echo $listArr->subject; ?></h6>
                       
                       </a>
                     </li>
                       <hr />
					   <?php  
					 }
				 }
				else{
				    ?>
					<li class="recent-post">
                <div class="post-img">
                  No Ads Post Available
                 </div>
                </li>
					<?php
				 } 
			  ?>
            </ul>
           </div>
        <p><center>
           @if($complainList != FALSE)
           {{ $complainList->render() }}
           @endif
        </center></p> 
      </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9" style="margin-top:33px;">
     <div class="post">
        <div class="content">
          <style>
          .headingMain{ font-size:20px; color:#F00; font-weight:700; }
          </style>
          <h2 class="headingMain"><a href='{{ url("kanpurize_Help_WriteUS") }}'>Send New Ticket</a></h2>
          <hr />
          <div id="commentBox">
         <meta name="csrf-token" content="{{ csrf_token() }}" />
         <form id="commentForm">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="sendorID" id="sendorID" value="<?php if(!empty($complainData->vendordetails_id))echo $complainData->vendordetails_id; ?>" readonly="readonly" />
            <input type="hidden" name="recieverID" id="recieverID" value="<?php if(!empty($complainData->receiverID))echo $complainData->receiverID; ?>" readonly="readonly" />
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
        <div class="content" id="blogComment">
		 <?php 
		    if($complainDetails != FALSE){
			   foreach($complainDetails as $complain){
				   if($complain->sendorID == $complainData->vendordetails_id){
					   ?>
				       <div class="well" style="background-color:#CCC;">
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
				       <div class="well" style="background-color:#ffcccc;">
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
          <div class="well" style="background-color:#CCC;">
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