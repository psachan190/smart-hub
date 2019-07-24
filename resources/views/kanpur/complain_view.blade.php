@extends("layout")
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li><a href="<?php echo url($backurl); ?>">Complain</a></li>
                        </ul>
                        <h1 class="page-title">Complain View</h1>
                    </div>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
   <section class="message_area normal-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 padding_div">
                    <div class="chat_area cardify">
                        <div class="row chat_area--title margin_div">
                        	<div class="col-sm-6 col-xs-9 padding_div">
                            <h3>Complain <span class="name">Inbox</span></h3>
                            </div>
                            <div class="col-sm-6 col-xs-3 padding_div">
                            <a  style="float:right;" href="<?php 
							    $shopID = base64_encode($shopDetails->id); 
							    $ShopName = str_replace(" ","_",$shopDetails->vName); echo url("kanpurize_Complain/$shopID/$ShopName"); ?>" class="btn btn-md btn--round btn-secondary">Back</a>
                                </div>
                        
                        </div><!-- end /.chat_area--title -->
                        <!-----textarea box start-->
                        <div class="chat_area--conversation">
                          <div class="">
                              <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <form id="commentForm">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="sendorID" id="sendorID" value="<?php if(!empty($complainData->users_id))echo session()->get('knpUser_id'); ?>">
                                <input type="hidden" name="recieverID" id="recieverID" value="<?php if(!empty($complainData->receiverID))echo $complainData->receiverID; ?>">
                                <input type="hidden" name="complain_id" id="complain_id" value="<?php if(!empty($complainData->id))echo $complainData->id; ?>">
                                <div id="commentResult">
                                 
                                </div>
                              <textarea name="message" id="myTextarea4" required="required" placeholder="Type Text Here"></textarea>
                              <div id="sendBtn" style="margin-top:10px;">
                               <button class="btn btn-md btn--round" type="submit" id="sendComment" name="sendComment">Send</button>
                               <button style="display:none;" type="reset" name="reset" id="reset">reset</button>
                              </form> 
                            </div>
                        </div>   
                        </div>
                        <!---textarea box End---->
                        <div class="chat_area--conversation" id="blogComment">
                            <div class="head">
                                    <div class="chat_avatar">
                                       <p>
                                        Subject : <?php if(!empty($complainData->subject))echo $complainData->subject; ?>   </p>
                                       <p>
                                        Date : <?php if(!empty($complainData->created_at))echo  date("d/M/y h:i:sA",$complainData->created_at); ?>   </p> 
                                    </div>
                                </div>
							<?php
                             if($complainDetail != FALSE){
							     foreach($complainDetail as $complain){
								      if($complain->sendorID==$complainData->users_id){
										 ?>
                                         <div class="conversation" style="background-color:#CCC;">
                                  <div class="name_time">
                                     <span style="float:right" class="email"><?php if(!empty($complain->created_at))echo $complain->created_at; ?></span>
                                  </div>
                                <!-- end /.head -->
                                <div class="body">
                                    <p>
									 <?php 
									  if(!empty($complain->message)) echo $complain->message;
									 ?>
                                     <?php 
									  if(!empty($complainData->image)){
										 ?>
										 <img style="margin-top:15px;" src="<?php echo url("uploadFiles/complainFiles/$complainData->image"); ?>" class="img img-responsive" />
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
                                     <span style="float:right" class="email"><?php if(!empty($complain->created_at))echo $complain->created_at; ?></span>
                                  </div>
                                <!-- end /.head -->
                                <div class="body">
                                    <p>
									 <?php 
									  if(!empty($complain->message)) echo $complain->message;
									 ?>
                                    </p>
                                </div>

                            </div>
                                         <hr />
									     <?php
										}	
								 }
							  }
							 else{
							    
							  } 
							?>
                        <!-- end /.message_composer -->
                    </div>
                </div><!-- end /.col-md-7 -->
            </div><!-- end /.row -->
        </div>
    </section>    
@stop
@section('footer')
@parent
<script>
$(document).ready(function(e) {
 $.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
  $(document).on('submit',"#commentForm",(function(e) {
	$('#sendComment').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Wait...').attr('disabled',true);
	e.preventDefault();
      $.ajax({
      url: "<?php echo url("addCommentVendor"); ?>",
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
@stop

