@extends("vendor.template.masterVendor")
@section('content')
<div class="service">
	<div class="container-fluid">
      <div class="row">
   <div class="col-sm-12 col-md-6 col-lg-3">
     @include("vendor.template.vendorProfileSidebar")	
   </div>
   <div class="post">
        <div class="content">
		  <div class="col-md-12">
           <div id="listGroup"> 
            <ul class="list-group" id="">
              <li class="list-group-item">
                <div style="margin-bottom:15px;">
				<style>
                #addAdress{ text-decoration:none;}
                </style>
                 @if(!empty($shopImageData->bannerImage))
                  <strong><i style="color:#237E94;" class="fa fa-edit"></i>&nbsp;Edit Shop Banner Image</strong>
                 @else
                  <strong><i style="color:#237E94;" class="fa fa-plus"></i>&nbsp;Add Shop Banner Image</strong>
                 @endif
                </div>
                 @if(!empty($shopImageData->bannerImage))
                 <img id="img-upload1" src='{{ url("uploadFiles/shopBannerImage/$shopImageData->bannerImage") }}' class="img img-responsive" />
                 @endif
                
              </li>
            </ul>
           </div>
           <form id="bannerImageForm" name="bannerIm
                ageForm" style="margin-top:10px;">
            <?php echo csrf_field(); ?>
                <input type="hidden" name="vendordetails_id" value="@if(!empty($vresultData)){{ $vresultData->id }} @endif" readonly />
                <input type="hidden" name="users_id" value="@if(!empty(session()->get('knpUser_id'))){{ session()->get('knpUser_id') }} @endif" readonly />
                <input type="hidden" name="editID" id="editID" value="@if(!empty($shopImageData->id)){{ $shopImageData->id }} @endif">
               <div class="form-group">
                                    <label>Upload banner Image <span style="color:red
                                    ;">(dimension must be:- 1800*600 px . )</span></label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-md btn-file">
                                                Browse banner Image… <input type="file" id="imgInp1" name="bannerImage" />
                                            </span>
                                        </span>
                                        <input type="text" class="uploader1" name="imageName" id="imageName" readonly>
                                    </div>
                             	</div>
               <div class="row" style="margin-top:25px;">
                <div class="col-sm-12">
                <div class="form-group">
              <button type="submit" name="submit" id="upload" class="btn btn-md btn--round btn-success"><i style="color:#FFF;" class="fa fa-upload"></i>&nbsp;Upload</button>            </div>
                </div>
              </div>                 
         </form>
           <span id="someDivToDisplayErrors"></span> 
        </div>
        </div>
     </div>
 </div>             
   </div>
</div>
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
<!---address add script start------>
$(document).ready(function(e) {
 $.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
  $(document).on('submit',"#bannerImageForm",(function(e) {
	  $('#someDivToDisplayErrors').html("");
	  $('#upload').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true);
	 e.preventDefault();
      $.ajax({
      url: "<?php echo url("shopBannerImage"); ?>",
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		$('#upload').html('<i style="color:#FFF;" class="fa fa-upload"></i>&nbsp;Upload').attr('disabled',false);
		var errorString = '';
		var successString = "";
		  var parsedJson = jQuery.parseJSON(data);
		  if(parsedJson.vStatus==400){
			  $.each(parsedJson.error, function( key, value) {
                errorString += "<p style='color:red;'>" + value + "</p>";
               });
			  $('#someDivToDisplayErrors').html(errorString);
		   }
		  else if(parsedJson.vStatus==700){
		     $('#someDivToDisplayErrors').html(parsedJson.success);
			 $('#listGroup').load(document.URL + ' #listGroup');
		   } 
		  else if(parsedJson.vStatus==500){
		     $('#someDivToDisplayErrors').html(parsedJson.success);
		   } 
	   }	
     });
  }));
});
<!---address add script start------> 
});
</script>   
@endsection 