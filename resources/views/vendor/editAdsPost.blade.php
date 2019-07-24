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
.post-img img {
    width: 100px;
    height: 70px;
    float: left;
    margin-right: 15px;
    border: 5px solid #16A085;
    transition: 0.5s;
}

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
.left-inner-addon i {position: absolute;padding: 10px 20px; pointer-events: none;}
     </style>
      <div class="widget-sidebar" id="refSidebar">
        <h2 class="title-widget-sidebar">RECENT POST</h2>
           <div class="content-widget-sidebar back">
            <ul>
              @if($vAdsPostList != FALSE)
				   @foreach($vAdsPostList as $list)
					  @php
                       $image = $list->image;
					   $editID = base64_encode($list->id); 
					  @endphp
					  <li class="recent-post">
                        <a href='{{ url("EditAdsPost/$editID") }}'>
                        <div class="post-img">
                        <img src='{{ url("uploadFiles/vthumbsAdspost/$image") }}' class="img-responsive" alt="<?php if(!empty($$list->description))echo $list->description; ?>">
                        </div>
                        <h5><small><?php if(strlen($list->description) < 25){ echo $list->description; }else{ echo substr($list->description,0,70)."..."; } ?></small></h5>
                       <p><small><i class="fa fa-calendar" data-original-title=""></i>&nbsp;
					  {{ date('d-M-Y H:i:s A',strtotime($list->created_at)) }}</small></p>
                       </a>
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
         <p><center>
        @if($vAdsPostList != FALSE)
        {{ $vAdsPostList->render() }}
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
          <h2 class="headingMain">Edit Your Post Ads <strong><small>(Post Date :- @php $timestamp = strtotime($resultAdsData->created_at); $dateTime = date('d-M-Y , h:i:s a', $timestamp); @endphp {{ $dateTime }} )</small></strong></h2>
          <meta name="csrf-token" content="{{ csrf_token() }}" />
          <div id="showAdsImg">
             <img id="img-upload1" src="<?php $image = $resultAdsData->image; echo url("uploadFiles/vendorAdspost/$image"); ?>" class="img img-responsive" />
          </div> 
          <form id="editfronShopimageform" name="editfronShopimageform">
            <?php echo csrf_field(); ?>
               <input type="hidden" name="editID" value="<?php if(!empty($resultAdsData->id))echo $resultAdsData->id; ?>" readonly />
                <input type="hidden" name="vendorID" value="<?php if(!empty($resultAdsData))echo $resultAdsData->vendordetails_id; ?>" readonly />
                  <input type="hidden" name="postType" id="postType" value="2" readonly />
                <input type="hidden" name="filtrationCopy" id="filtrationCopy" value="<?php if(!empty($resultAdsData->applyFilteration))echo $resultAdsData->applyFilteration; ?>" readonly="readonly" />
                <input type="hidden" class="" name="imageNameCopy" id="imageNameCopy" value="<?php echo $image; ?>" readonly>
                <input type="hidden" class="" name="genderCopy" id="genderCopy" value="<?php if(!empty($resultAdsData->gender))echo $resultAdsData->gender; ?>" readonly="readonly">
               <div class="form-group">
                                    <label>Upload banner Image <span style="color:red
                                    ;">(dimension must be:- 1800*600 px . )</span></label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                Browse banner Image… <input class="form-control" type="file" id="imgInp1" name="adsImage" />
                                            </span>
                                        </span>
                                        <input type="text" class="uploader1 form-control" name="imageName" id="imageName" value="<?php echo $image; ?>" readonly>
                                    </div>
                             	</div>
               <div class="row" style="margin-top:25px;">
                <div class="col-sm-6 ">
                <label>Start Date&nbsp;<span class="prafontanswerstar">*</span></label>
                <div class="left-inner-addon">
                           <i class="glyphicon glyphicon-calendar"></i>
                        <input type="text" name="startDate" id="datepicker1"  placeholder="Click for select date" value="<?php if(!empty($resultAdsData->startDate))echo $resultAdsData->startDate; ?>" readonly="readonly" />
               </div>
                </div>
                <div class="col-sm-6 ">
                <label>Last Date&nbsp;<span class="prafontanswerstar">*</span></label>
                <div class="left-inner-addon">
                           <i class="glyphicon glyphicon-calendar"></i>
                        <input type="text" name="endDate" id="datepicker2" placeholder="Click for select date" value="<?php if(!empty($resultAdsData->startDate))echo $resultAdsData->startDate; ?>" readonly="readonly" />
               </div>
                </div>
              </div>
               <div class="row" style="margin-top:25px;">
                 <div class="col-md-12">
                                       <div class="custom_checkbox form-check">
                                          <input type="checkbox" name="filtration" id="filtration" value="no" />&nbsp;
                                         <label for="filtration">
                                           <span class="shadow_checkbox"></span>
                                           <span class="radio_title catnamebox">&nbsp;Apply Filteration</span>
                                         </label>
                                      </div>
                                     </div>
               </div> 
               <div id="filtrationBlog" style="display:none;"> 
                 <div class="row" style="margin-top:25px;">
                     <div class="col-md-12"><strong>Select Age</strong></div>
                      <div class="form-group orderform">
                        <div class="col-md-6 col-xs-12">
                            <strong>From&nbsp;</strong>
                            <div class="select-wrap">
                        <select name="ageFrom" id="ageFrom" class="period_selector">
                            <option value="0">--Select--Age--From--</option>
                            <?php 
                                 for($i=1; $i <= 100; $i++){
                                   ?>
                                   <option value="{{ $i }}">{{ $i }}</option>
                                   <?php
                                 }
                               ?>
                        </select>
                        <span class="lnr lnr-chevron-down"></span>
                    </div>
                        </div>
                        <div class="span1"></div>
                        <div class="col-md-6 col-xs-12">
                         <strong>To&nbsp;<span class="prafontanswerstar">*</span>&nbsp;<span id="ageErr"></span></strong>
                            <div class="select-wrap">
                             <select name="ageTo" id="ageTo" class="period_selector">
                              <option value="0">--Select--Age--To--</option>
                               <?php 
                                 for($i=1; $i <= 100; $i++){
                                   ?>
                                   <option value="{{ $i }}">{{ $i }}</option>
                                   <?php
                                 }
                               ?>
                             </select> 
                              <span class="lnr lnr-chevron-down"></span>
                        </div>
                    </div>
                       </div>
                      <div class="form-group orderform">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <strong>Gender&nbsp;</strong>
                            <div class="custom-radio">
                               <input type="radio" id="1" class="addresType" name="gender" value="1" >
                               <label for="1"><span class="circle"></span>Male</label>
                                &nbsp;&nbsp;&nbsp;
                                <input type="radio" id="2" class="addresType" name="gender" value="2" />
                                <label for="2"><span class="circle"></span>Female</label>
                                &nbsp;&nbsp;&nbsp;
                                <input type="radio" id="3" class="addresType" name="gender" value="3" checked="checked" />
                                <label for="3"><span class="circle"></span>Both</label>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-12 col-xs-12">
                      <strong>Profession</strong>
                         <div class="row">
                                          <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="profession[]" id="first" value="1" />&nbsp;
                             <label for="first">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;Profession First</span>
                             </label>
                          </div>
                        </div>
                                          <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="profession[]" id="second" value="3" />&nbsp;
                             <label for="second">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;Profession Second</span>
                             </label>
                          </div>
                        </div>
                                          <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="profession[]" id="third" value="3" />&nbsp;
                             <label for="third">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;Profession third</span>
                             </label>
                          </div>
                        </div>
                                         <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="profession[]" id="fourth" value="4" />&nbsp;
                             <label for="fourth">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;Profession Fourth</span>
                             </label>
                          </div>
                        </div>
                                        </div>
                  </div>
                     </div>
               </div>
               <div class="row" style="margin-top:25px;">
                <div class="col-sm-12">
                 <label>Ads Details&nbsp;<span class="prafontanswerstar">*</span></label>
                 &nbsp;&nbsp;
                  <textarea name="postDescription" id="myTextarea1"><?php if(!empty($resultAdsData->description)) echo $resultAdsData->description; ?></textarea>
                </div>
              </div>
               <div class="row" style="margin-top:25px;">
                <div class="col-sm-12">
                <div class="form-group">
              <button type="submit" name="submit" id="savePost" class="btn btn-success"><i style="color:#FFF;" class="fa fa-edit"></i>&nbsp;Edit Post Ads</button>  
            </div>
                </div>
              </div>                 
         </form>
         <div id="postResult"></div>
         <div id="someDivToDisplayErrors"></div>
        </div>
     </div>
  </div>
 </div>
</div>
<script src="<?php echo url('editor/tinymce.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url("editor/editorBox.js"); ?>"></script>
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
  $(document).on('submit',"#editfronShopimageform",(function(e) {
	 $('#postResult').html(" ");
	 $('#savePost').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
	e.preventDefault();
      $.ajax({
      url: "<?php echo url("editkanpurizevendorAdsPost"); ?>",
      type: "POST",        
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cach ed
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data){ //alert(data);
	    //$('#postResult').html(data);
	   $('#savePost').html('<i style="color:#FFF;" class="fa fa-edit"></i>&nbsp;Edit Post Ads').attr('disabled',false);
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
			  $('#refSidebar').load(document.URL + ' #refSidebar');
			   //refSidebar
			  //location.reload();
		   }
	  }	
     });
  }));
});
</script>
<script>
$(document).ready(function(e) {
 var filterationCopy = $("#filtrationCopy").val();
 if(filterationCopy=="yes"){
     $("#filtration").attr('checked',true);
	 $("#filtrationBlog").show();
   } 
<!--gender checked in edit post data start-->
var filterationCopy = $("#genderCopy").val();
$("#"+ filterationCopy).attr('checked',true);
 <!--gender checked in edit post data End-->
});
<!------>
</script>

@endsection 