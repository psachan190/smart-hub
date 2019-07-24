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
                            <li class="active"><a href="#">Uesrs Complain</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Uesrs Complain</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="container-fluid">
 <div class="row normal-padding">
   <div class="col-sm-12 col-md-6 col-lg-3 padding_div">
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
                        <a href='{{ url("vendor/$vendorData->username/uesrsComplain/$complainID") }}'>
                         <p><small><i class="fa fa-calendar" data-original-title="" title=""></i>&nbsp;
					      <?php if(!empty($listArr->created_at))echo date("d/M/y h:i:sA",$listArr->created_at); ?>
                       </small></p>
                        <small style="font-size:14px;"><strong><?php if(!empty($listArr->subject ))echo $listArr->subject; ?></strong></small>
                        <br />
                        <small>
                        <?php if(!empty($listArr->complain_title ))echo $listArr->complain_title; ?>
                        </small>
                       
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
                  No Complain Available
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
   <div class="col-sm-12 col-md-6 col-lg-9 padding_div" style="margin-top:33px;">
     <div class="post">
        <div class="content">
         @if(!empty($show))
          <h2 class="headingMain">Users Complain</h2>
          <hr />
          <div id="commentBox">
         <meta name="csrf-token" content="{{ csrf_token() }}" />
         <form id="commentForm">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="sender_id" id="sender_id" value="<?php if(!empty($complainData->receiverID))echo $complainData->receiverID; ?>">
            <input type="hidden" name="receiver_id" id="receiver_id" value="<?php if(!empty($complainData->senderID))echo $complainData->senderID; ?>">
            <input type="hidden" name="complain_id" id="complain_id" value="<?php if(!empty($complainData->id))echo $complainData->id; ?>">
            <div id="commentResult"></div>
          <textarea name="description" id="myTextarea2"><?php echo old('myTextarea2');  ?></textarea>
            <div class="box-footer box-form">
                              <div id="sendBtn" style="margin-top:10px;">
           <button class="btn btn-md btn--round" type="submit" id="sendComment" name="sendComment">Send</button>
            <button class="btn btn-md btn--round" type="RESET" id="reset" name="reset">Reset</button>
						<ul class="nav nav-pills pull-right">
                       
							<li><label class="newbtn"> <span class="textprsocial"><span class="lnr lnr-camera buttondefault"></span><input name="image" id="pic1" type="file"  /></span></label></li>
						</ul>
					</div>
          </form> 
          </div>
        </div>
          <div class="head" style="margin-top:20px;">
		  <p>Subjet : <?php if(!empty($complainData->subject))echo $complainData->subject; ?></p>
          <p>Title :  <?php if(!empty($complainData->complain_title))echo $complainData->complain_title; ?></p>
           <p>Date : <?php if(!empty($complainData->created_at))echo date("d/M/y h:i:sA",$complainData->created_at); ?></p>
          </div>
        </div>
        <div class="content" id="blogComment">
		 <?php 
		    if($complainDetail != FALSE){
				 $k = 1;
			   foreach($complainDetail as $complain){
				   if($complain->sendorID == $complainData->receiverID){
					   ?>
                       <div class="row margin_div"><button class="buttondefault" style="float:right;"> <span class="lnr lnr-trash"></span></button></div>
				       <div class="well" style="background-color:#CCC;">
                      <div class="media">
      	        <div class="media-body">
                 <p class="text-right"><span class="lnr lnr-clock"></span> <?php if(!empty($complain->created_at))echo date("d/M/Y H:i:s" , $complain->created_at); ?></p>
                 <div class="normal-padding gal-container">
                 <p><?php if(!empty($complain->message))echo $complain->message; ?></p>
                  <?php 
									  if(!empty($complain->image)){
										 ?>
                                         <div class="gal-itemread">
                                            <div class="box">
                                              <a href="#" data-toggle="modal" data-target="#<?php echo $k; ?>">
										 <img style="margin-top:15px; height:250px; width:350px;" src="<?php echo url("uploadFiles/complainFiles/$complain->image"); ?>" class="img img-responsive" /></a>
                                         <div class="modal modalngo fade" id="<?php echo $k; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog mobilengo" role="document">
												<div class="modal-content">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
													<div class="modal-body">
														<img src="<?php echo url("uploadFiles/complainFiles/$complain->image"); ?>">
													</div>
												</div>
											</div>
										</div>
                                             </div>
                                         </div>
                                   </div>
										 <?php
										}
									 ?>
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
                 <p class="text-right"><span class="lnr lnr-clock"></span> <?php if(!empty($complain->created_at))echo date("d/M/Y H:i:s" , $complain->created_at); ?></p>
                 <div class="normal-padding gal-container">
                 <p>
				  <?php if(!empty($complain->message))echo $complain->message; ?>
                  <?php 
									  if(!empty($complain->image)){
										 ?>
                                         <div class="gal-itemread">
                                            <div class="box">
                                              <a href="#" data-toggle="modal" data-target="#<?php echo $k; ?>">
										 <img style="margin-top:15px; height:250px; width:350px;" src="<?php echo url("uploadFiles/complainFiles/$complain->image"); ?>" class="img img-responsive" /></a>
                                         <div class="modal modalngo fade" id="<?php echo $k; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog mobilengo" role="document">
												<div class="modal-content">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
													<div class="modal-body">
														<img src="<?php echo url("uploadFiles/complainFiles/$complain->image"); ?>">
													</div>
												</div>
											</div>
										</div>
                                           </div>
                                         </div>
										 <?php
										}
									 ?>
                  </p>
                  </div>
       </div>
    </div>
                    </div>
				       <?php 
					 }	 
				   $k++;
				 }
			 }
		  ?>
        </div>
         @endif
     </div>
  </div>
 </div></div>
<script>$('.newbtn').bind("click" , function () {        $('#pic1').click();
 });</script>
@stop
@section('footer')
 @parent
<script src="{{ url('editor/tinymce.min.js') }}" type="text/javascript"></script>
<script src='{{ url("editor/editorBox.js") }}'></script>
<script>
$(document).ready(function(e) {
  $(document).on('submit',"#commentForm",(function(e) {
	$('#saveNews').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Sending...').attr('disabled',true);
	e.preventDefault();
      $.ajax({
      url: "<?php echo url("vendorAgax/addCommentVendor"); ?>",
      type: "POST",        
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cach ed
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data){ 
	     if(data == 1){
			 $("#reset").click();
			 $('#blogComment').load(document.URL + ' #blogComment');
			}
		 else{
			  $("#commentResult").html("Unexpected Try again....");
			}
	   }	
     });
  }));
});
</script>
@stop 