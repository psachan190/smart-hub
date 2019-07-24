@extends("vendor.template.masterVendor")
@section('content')
<div class="container-fluid" style="margin-bottom:100px;">
 <input type="hidden" name="discountModeCopy" id="discountModeCopy" value="<?php if(!empty($offerNewsDetails->discountMode))echo $offerNewsDetails->discountMode;  ?>" />
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
              @if($offerNewsList != FALSE)
				   @foreach($offerNewsList as $list)
					  @php
                       $image = $list->image;
					   $editID = base64_encode($list->id); 
					  @endphp
					  <li class="recent-post">
                        <a href='{{ url("EditofferNews/$editID") }}'>
                        <div class="post-img">
                          @if($image != "default.jpg")
                           <img src='{{ url("uploadFiles/offersNews/$image") }}' class="img-responsive">
                          @endif
                        </div>
                        <h5><small>@if(!empty($list->newsTitle)) {{ $list->newsTitle }} @endif</small></h5>
                       <p><small><i class="fa fa-calendar" data-original-title="" title=""></i>&nbsp;
					     {{ $list->created_at }}
                       </small></p>
                       </a>
                       <p><small>
                         <a href='{{ url("EditofferNews/$editID") }}'><i class="fa fa-edit" data-original-title="" title=""></i></a>
                       </small></p>
                     </li>
                       <hr>
				   @endforeach
			  @else
				<li class="recent-post">
                <div class="post-img">
                  No Ads Post Available
                 </div>
                </li>
                <hr>
           	  @endif
            </ul>
           </div>
        <p><center>{{ $offerNewsList->render() }}</center></p> 
      </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9" style="margin-top:33px;">
     <div class="post">
        <div class="content">
		    <style>
          .headingMain{ font-size:20px; color:#F00; font-weight:700; }
          </style>
          <h2 class="headingMain">Post Your Offers and News</h2>
          <meta name="csrf-token" content="{{ csrf_token() }}" />
          <div id="showAdsImg" style="">
             @php $image = $offerNewsDetails->image @endphp
             <img id="img-upload1" src="<?php echo url("uploadFiles/offersNews/$image"); ?>" class="img img-responsive" />
          </div> 
          <form id="editofferNewsForm" name="editofferNewsForm">
            <?php echo csrf_field(); ?>
                <input type="hidden" name="vendordetails_id" value="@if(!empty($vresultData)){{ $vresultData->id }} @endif" readonly />
                <input type="hidden" name="users_id" value="@if(!empty(session()->get('knpUser_id'))){{ session()->get('knpUser_id') }} @endif" readonly />
                <input type="hidden" name="editID" value="@if(!empty($offerNewsDetails->id)){{ $offerNewsDetails->id }} @endif" readonly />
                <input type="hidden" name="imageCopy" id="" value="{{ $offerNewsDetails->image }}">
               <div class="form-group">
                                    <label>Select Image <span style="color:red
                                    ;">(dimension must be:- 1800*600 px. ) ( optional )</span></label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                Browse banner Image… <input class="form-control" type="file" id="imgInp1" name="newsofferImage" />
                                            </span>
                                        </span>
                                        <input type="text" class="uploader1 form-control" name="imageName" id="imageName" readonly>
                                    </div>
                             	</div>
               <div class="row" style="margin-top:25px;">
                <div class="col-sm-6 ">
                <label>Start Date&nbsp;<span class="prafontanswerstar">*</span></label>
                <div class="left-inner-addon">
                           <i class="glyphicon glyphicon-calendar"></i>
                        <input type="text" name="startDate" id="example1" class="form-control" placeholder="dd/mm/yyyy"  value="{{ $offerNewsDetails->startDate }}" />
               </div>
                </div>
                <div class="col-sm-6 ">
                <label>End Date&nbsp;<span class="prafontanswerstar">*</span></label>
                <div class="left-inner-addon">
                           <i class="glyphicon glyphicon-calendar"></i>
                        <input type="text" name="endDate" id="example2" class="form-control" placeholder="dd/mm/yyyy"  value="{{ $offerNewsDetails->endDate }}" />
               </div>
                </div>
              </div>
               <div class="row" style="margin-top:25px;">
                <div class="col-sm-12">
                 <label>News &amp; Offers Title&nbsp;<span class="prafontanswerstar">*</span></label>
                 &nbsp;&nbsp;
                  <input type="text" name="newsTitle" id="newsTitle" class="form-control" placeholder="News &amp; Offers Title"  value="{{ $offerNewsDetails->newsTitle }}" />
                </div>
              </div>
               <?php 
			     if(!empty($offerNewsDetails->discountRate)){
				    ?>
					<div class="row" style="margin-top:25px;">
                                        <div class="col-md-6 col-xs-12">
                                            <label> Select Discount&nbsp;<span class="prafontanswerstar">*</span></label>
                                            <div class="select-wrap">
                                            <select class="form-control" name="discountMode" id="discountMode">
                                              <option value="0">Select Discount Mode</option>
                                              <option value="1">In Percentage</option>
                                              <option value="2">In Rate</option>
                                            </select>
                                              <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>
                                        <div class="span1"></div>
                                        <div class="col-md-6 col-xs-12">
                                            <label>Amount&nbsp;<span class="prafontanswerstar">*</span></label>
                                            <div class="select-wrap">
                                            <input type="text" name="discountAmount" id="discountAmount" placeholder="Enter Amount of Discount" value="<?php if(!empty($offerNewsDetails->discountRate))echo $offerNewsDetails->discountRate;  ?>" />
                                            </div>
                                        </div>
                                    </div>
					<?php    
				  }
			   ?>
               <div class="row" style="margin-top:25px;">
                <div class="col-sm-12">
                 <label>News &amp; Offers Description&nbsp;<span class="prafontanswerstar">*</span></label>
                 &nbsp;&nbsp;
                  <textarea cols="4" rows="4"  maxlength="100" name="newsDesc" id="newsDesc" class="form-control" placeholder="News &amp; Offers Description">{{ $offerNewsDetails->newsDescription }}</textarea>
                  <span id="aboutBusinessResult"></span>
                </div>
              </div>
               <div class="row" style="margin-top:25px;">
               <div id="resultSuccess"></div>
               <div id="someDivToDisplayErrors"></div>
                <div class="col-sm-12">
                <div class="form-group">
              <button type="submit" name="submit" id="editNews" class="btn btn-primary"><i style="color:#FFF;" class="fa fa-edit"></i>&nbsp;Edit News</button>  
            </div>
           <span id="uploadResult"></span>
                </div>
              </div>                 
         </form>
         
        </div>
     </div>
  </div>
 </div>
</div>
<script src="{{ url('public/kanpurizeTheme/editor/tinymce.min.js') }}" type="text/javascript"></script>
<script src='{{ url("public/kanpurizeTheme/editor/editorBox.js") }}'></script>
<script>
$(document).ready( function() {
  $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});
		$('.btn-file :file').on('fileselect', function(event, label) {
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		         $("#showAdsImg").show();
				 $('#img-upload1').attr('src', e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$("#imgInp1").change(function(){
		    readURL(this);
		}); 	
	});</script>
<script>
$(document).ready(function(e) {
 $.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
  $(document).on('submit',"#editofferNewsForm",(function(e) {
	$('#editNews').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
	e.preventDefault();
      $.ajax({
      url: "<?php echo url("kanpurizeEditNewsoffer"); ?>",
      type: "POST",        
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cach ed
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data){ 
	  // alert(data);
		$('#editNews').html('<i style="color:#FFF;" class="fa fa-edit"></i> Edit News').attr('disabled',false);
	    var parsedJson = jQuery.parseJSON(data);
		var errorString = '';
		var successString = "";
		 if(parsedJson.vStatus==400){
			  $.each(parsedJson.error, function( key, value) {
                errorString += "<p style='color:red;'>" + value + "</p>";
               });
			  $('#someDivToDisplayErrors').html(errorString);
		   }
		 if(parsedJson.vStatus==500){
			  $('#someDivToDisplayErrors').html("<span style='color:red;'>" + parsedJson.success + "</span>");
			   $('#sidebarRef').load(document.URL + ' #sidebarRef');
		   } 
	   }	
     });
  }));
});
</script>
<script type="text/javascript">
   $(document).ready(function () {
      $('#example1').datepicker({
        format: "dd-mm-yyyy"
      });  
   });
</script>
 <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                $('#example2').datepicker({
                    format: "dd-mm-yyyy"
                });  
            });
        </script>
 <script>
 $(document).ready(function(e) {
     $(document).on('keyup','#newsDesc',function(){
         var maxtextLenght = $('#newsDesc').attr("maxlength"); 
		 var textLenght = $('#newsDesc').val().length;
		    var saveCharcterlenght = maxtextLenght - textLenght;
			if(saveCharcterlenght < 1){
			  $('#aboutBusinessResult').html("<span style='color:#229DB6;'>News Description maximum 100 Character . ");
		    }
			else{
			  $('#aboutBusinessResult').html(saveCharcterlenght + " Character Remaining");
			}
	 });
});
 </script> 
 <script>
  $(document).ready(function(e) {
	 $("#discountMode:nth-child(1)").attr("checked",true);  
    var discountMode = $("#discountModeCopy").val();
	if(discountMode==1){
		$("#discountMode option:eq(1)").attr('selected','selected');
	  } 
	else if(discountMode==2){
	    $("#discountMode option:eq(2)").attr('selected','selected');
	  }  
  });
 </script>      
@endsection 