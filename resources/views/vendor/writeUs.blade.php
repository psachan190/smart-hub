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
          <h2 class="headingMain">Write Us</h2>
          <hr />
          <div id="someDivToDisplayErrors"></div>
          <hr />
          <div id="commentBox">
         <meta name="csrf-token" content="{{ csrf_token() }}" />
          <form id="complainForm">
                                             <?php echo csrf_field(); ?>
                                            <input type="hidden" name="receiverID" id="receiverID" value="admin" readonly="readonly">
                                            <input type="hidden" name="sendorID" id="sendorID" value="<?php if(!empty($vresultData->id))echo $vresultData->id; ?>" readonly="readonly">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                         <label style="color:#F00;"><?php if ($errors->has('complainSubject')){ echo"Subject fields is required..."; } ?></label>
                                                           <select name="complainSubject" id="complainSubject" class="form-control">
                                                              <option>--select--complain--subject--</option>
                                                              @if($subjectList != FALSE)
                                                               @foreach($subjectList as $list)
                                                                <option value="{{ $list->id }}">{{ $list->subject }}</option>
                                                               @endforeach
                                                              @else
                                                              <option>--No--Subject--Available--</option>
                                                              @endif
                                                            </select> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                          <input type="file" name="image" id="image" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                       <label  style="color:#F00;"><?php if ($errors->has('description')){ echo"Description fields is required..."; } ?></label>
                                                          <textarea name="description" id="description" cols="10" rows="5" placeholder="Description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sub_btn">
                                                    <button type="submit" id="sendComplain" class="btn btn--round btn--default">Send Request</button>
                                                </div>
                                            </form> 
          </div>
        </div>
        </div>
        <div class="content" id="blogComment">
		
        </div>
     </div>
  </div>
 </div>
</div>
<script>
$(document).ready(function(e) {
 $.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
  $(document).on('submit',"#complainForm",(function(e) {
	$('#sendComplain').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
	e.preventDefault();
      $.ajax({
      url: "<?php echo url("vendorWriteusAction"); ?>",
      type: "POST",        
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cach ed
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data){ 
	    $('#sendComplain').html(' Send Request').attr('disabled',false);
	    var parsedJson = jQuery.parseJSON(data);
		var errorString = '';
		var successString = "";
		 if(parsedJson.vStatus==400){
			  $.each(parsedJson.error, function( key, value) {
                errorString += "<p style='color:red;'>" + value + "</p>";
               });
			  $('#someDivToDisplayErrors').html(errorString);
		   }
		 if(parsedJson.vStatus==700){
			  $('#someDivToDisplayErrors').html("<span style='color:red;'>" + parsedJson.msg + "</span>");
			   $('#sidebarRef').load(document.URL + ' #sidebarRef');
		   } 
		  if(parsedJson.vStatus==500){
			  $('#someDivToDisplayErrors').html("<span style='color:red;'>" + parsedJson.msg + "</span>");
		   }   
	   }	
     });
  }));
});
</script>
@endsection 