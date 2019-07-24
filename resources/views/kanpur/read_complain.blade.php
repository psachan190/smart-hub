@extends("layout")
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li><a href="<?php //echo url($backurl); ?>">Complain</a></li>
                        </ul>
                        <h1 class="page-title">Complain View</h1>
                    </div>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
   <section class="message_area normal-padding">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-1 col-sm-1 padding_div">
            </div>
                <div class="col-md-10 col-sm-10 padding_div">
                    <div class="chat_area cardify">
                        <div class="row chat_area--title margin_div">
                        	<div class="col-sm-6 col-xs-9 padding_div">
                            <h3>Complain <span class="name">Inbox</span></h3>
                            </div>
                            <div class="col-sm-6 col-xs-3 padding_div">
                                </div>
                        
                        </div><!-- end /.chat_area--title -->
                        <!-----textarea box start-->
                        <div class="chat_area--conversation">
                          <div class="">
                              <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <form id="commentForm">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="sender_id" id="sender_id" value="<?php if(!empty($complainData->users_id))echo session()->get('knpUser_id'); ?>">
                                <input type="hidden" name="receiver_id" id="receiver_id" value="<?php if(!empty($complainData->receiverID))echo $complainData->receiverID; ?>">
                                <input type="hidden" name="complain_id" id="complain_id" value="<?php if(!empty($complainData->id))echo $complainData->id; ?>">
                                <div id="commentResult">
                                 
                                </div>
                              <textarea name="description" id="myTextarea4" placeholder="Type Text Here"></textarea>
                              <div id="sendBtn" style="margin-top:10px;">
                               
                               <button style="display:none;" type="reset" name="reset" id="reset">reset</button>
                               <div class="box-footer box-form">
                               <button class="btn btn-md btn--round pull-right" type="submit" id="sendComment" name="sendComment"><span class="lnr lnr-thumbs-up"></span> Send</button>
						<ul class="nav nav-pills">
                       
							<li><label class="newbtn"> <span class="textprsocial"><span class="lnr lnr-camera buttondefault"></span><input name="image" id="pic" type="file"  /></span></label></li>
						</ul>
					</div>
                              </form> 
                            </div>
                        </div>   
                        </div>
                        <!---textarea box End---->
                        <div class="chat_area--conversation">
                            <div class="head">
                                    <div class="chat_avatar">
                                       <p>
                                        Subject : <?php if(!empty($complainData->subject))echo $complainData->subject; ?>   </p>
                                       <p>
                                       <p>Title : <?php if(!empty($complainData->complain_title))echo $complainData->complain_title; ?> </p>
                                        Date : <?php if(!empty($complainData->created_at))echo  date("d/M/y h:i:sA",$complainData->created_at); ?>   </p> 
                                    </div>
                                </div>
                                <div id="blogComment">      
							<?php
                             if($complainDetail != FALSE){
								 $k = 1;
							     foreach($complainDetail as $complain){
								      if($complain->sendorID==$complainData->users_id){
										 ?>
										<div class="row margin_div"><button class="buttondefault" style="float:right;"> <span class="lnr lnr-trash"></span</button></div>
                                         <div class="conversation" style="background-color:#CCC;">
                                  <div class="name_time">
                                     <span style="float:right" class="email"><span class="lnr lnr-clock"></span> <?php if(!empty($complain->created_at))  echo date("d/M/Y H:i:s" , $complain->created_at); ?></span>
                                  </div>
                                <!-- end /.head -->
                                <div class="normal-padding gal-container">
                                    <p>
									 <?php 
									  if(!empty($complain->message)) echo $complain->message;
									 ?>
                                     <?php 
									  if(!empty($complain->image)){
										 ?>
                                         <div class="gal-itemread">
                                         <div class="box">
                                         <a href="#" data-toggle="modal" data-target="#<?php echo $k; ?>">
										 <img style="margin-top: 15px;height: 250px;width: 350px;" src="<?php echo url("uploadFiles/complainFiles/$complain->image"); ?>" class="img img-responsive" /></a>
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
                                </div><!-- end /.body -->

                            </div>
                                         <hr />
									     <?php
										}
									   else{
										  ?>
                                         <div class="conversation" style="background-color:#ffcccc;">
                                 <div class="name_time">
                                     <span style="float:right" class="email"><span class="lnr lnr-clock"></span> <?php if(!empty($complain->created_at)) echo date("d/M/Y H:i:s" , $complain->created_at); ?></span>
                                  </div>
                                <!-- end /.head -->
                                <div class="normal-padding gal-container">
                                    <p>
									 <?php 
									  if(!empty($complain->message)) echo $complain->message;
									 ?>
									  <?php 
									  if(!empty($complain->image)){
										 ?>
                                         <div class="gal-itemread">
                                         <div class="box">
                                         <a href="#" data-toggle="modal" data-target="#<?php echo $k; ?>">
										 <img style="margin-top: 15px;height: 250px;width: 350px;" src="<?php echo url("uploadFiles/complainFiles/$complain->image"); ?>" class="img img-responsive" /></a>
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
                                         <hr />
									     <?php
										}	
								 $k++;
								 }
							  }
							?>
						 </div> 	
                        <!-- end /.message_composer -->
                    </div>
                </div><!-- end /.col-md-7 -->
            </div><!-- end /.row -->
            <div class="col-md-1 col-sm-1 padding_div">
            </div>
        </div>
    </section>
    <script>$('.newbtn').bind("click" , function () {
        $('#pic').click();
 });</script>    
@stop
@section('footer')
@parent
<script>
$(document).ready(function(e) {
  $(document).on('submit',"#commentForm",(function(e) {
	$('#sendComment').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Sending...').attr('disabled',true);
	e.preventDefault();
      $.ajax({
      url: "<?php echo url("actionAjaxPost/complainReply"); ?>",
      type: "POST",        
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cach ed
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data){ 
	      $('#sendComment').html('Send').attr('disabled',false);
	     if(data == 1){
			 $('#blogComment').load(document.URL + ' #blogComment');
			 $('#reset').click();
			}
		 else{
			  $("#commentResult").html("<p class='alert alert-danger'>" + data + "</p>");
			}		
			
	   }	
     });
  }));
});
</script>
@stop

