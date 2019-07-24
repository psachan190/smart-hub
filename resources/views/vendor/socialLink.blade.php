@extends("layout")
@section('content')
@include('vendor.template.marketPlacenavigation')
<div class="normal-padding">
	<div class="container-fluid">
      <div class="row">
   <div class="col-sm-12 col-md-6 col-lg-3">
      @include("vendor.template.vendorProfileSidebar")
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9">
    <style>
    .list-group span{ float:right; margin-top:-20px;}
	.list-group .socialLink{ text-decoration:none;}
	.modal-title{ font-size:16px; }
    </style>
     <div class="post">
        <div class="content">
		  <div class="col-md-9">
           <div id="listGroup"> 
            <ul class="list-group" id="">
              <li class="list-group-item">
               <a href="#" class="addSocialLinkDetails"><strong><i style="color:#2f5ba3;" class="fa fa-plus"></i>&nbsp;Add Details</strong></a>
			  </li>
              <li class="list-group-item">
               <i style="color:#2f5ba3;" class="fa fa-facebook-square fa-2x social-fb"></i>
               <br />
                @if(!empty($vendorData->facebookLink))
				   <a href="#">{{ $vendorData->facebookLink }}</a>
                @else
				    <a href="#">blank... </a>
                @endif
			  </li>
              <li class="list-group-item">
              <i style="color:#59b2e5;"  class="fa fa-twitter-square fa-2x social-tw"></i>
               <br />
                @if(!empty($vendorData->twitterLinks))
				   <a href="#">{{ $vendorData->twitterLinks }} </a>
                @else
				    <a href="#">blank... </a>
                @endif 
              </li>
              <li class="list-group-item">
               <i style="color:#e57559;" class="fa fa-google-plus-square fa-2x social-gp"></i>
               <br />
                @if(!empty($vendorData->googlePlusLinks))
				   <a href="#">{{ $vendorData->googlePlusLinks }} </a>
				@else
                   <a href="#">blank... </a>
				@endif 
              </li>
              <li class="list-group-item">
                <i style="color:#59b2e5;" class="fa fa-linkedin-square fa-2x social-em"></i>
               <br />
                @if(!empty($vendorData->linkedInLinks))
				   <a href="#">{{ $vendorData->linkedInLinks }}</a>
				@else
				    <a href="#">Linked in Links... </a>
				@endif 
              </li>
              <li class="list-group-item">
                <i style="color:#af1707;" class="fa fa-instagram fa-2x social-em"></i>
               <br />
                @if(!empty($vendorData->instagramLinks))
				   <a href="#">{{ $vendorData->instagramLinks }} </a>
				@else
				    <a href="#">Instagram Link... </a>
				@endif  
              </li>
            </ul>
           </div> 
        </div>
        </div>
     </div>
  </div>
 </div>             
   </div>
</div>
<!---faecbook modal start---->
<div class="modal" id="addSocialLinkDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="margin-top:100px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button id="facebookModalClose" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <p class="modal-title" id="myModalLabel"><i style="color:#2f5ba3;" class="fa  fa-share-square-o"></i><strong>&nbsp;Social Profile Links</strong></p>
                  </div>
                  <div class="modal-body">
                    <form id="socialForm">
                      <div class="form-group">
                      <label>Facebook</label>
                      <div class="form-group">
                       <input type="hidden" name="edit_id" id="edit_id" value="@if(!empty($vendorData->username)) {{ $vendorData->username }} @endif">
                        <input type="text" name="fbLink" id="fbLink" placeholder="Paste Your Facebook Profile link here..." value="@if(!empty($vendorData->facebookLink)){{ $vendorData->facebookLink }} @endif" />
                      </div>
                      </div>
                      <div class="form-group">
                      <label>Twitter</label>
                      <div class="form-group">
                        <input type="text" name="twitterink" id="twitterink" placeholder="Paste Your Twitter Profile link here..."  value="@if(!empty($vendorData->twitterLinks)){{ $vendorData->twitterLinks }} @endif"   />
                      </div>
                      </div>
                      <div class="form-group">
                      <label>Google Plus</label>
                      <div class="form-group">
                       <input type="text" name="googlePlusLink" id="googlePlusLink" placeholder="Paste Your Google Plus Profile link here..." value="@if(!empty($vendorData->googlePlusLinks)){{ $vendorData->googlePlusLinks }} @endif" />
                      </div>
                      </div>
                      <div class="form-group">
                      <label>Linkedin</label>
                      <div class="form-group">
                        <input type="text" name="linbkedLink" id="linbkedLink" placeholder="Paste Your Linked in Profile link here..." value="@if(!empty($vendorData->linkedInLinks)){{ $vendorData->linkedInLinks }} @endif" />
                      </div>
                      </div>
                      <div class="form-group">
                      <label>Instagram</label>
                      <div class="form-group">
                        <input type="text" name="instagramLink" id="instagramLink" placeholder="Paste Your Instagram Profile link here..." value="@if(!empty($vendorData->instagramLinks)){{ $vendorData->instagramLinks }} @endif" />
                      </div>
                      </div>
                      <div class="form-group">
                        <p id="response"></p>
                        <button type="button"  name="submit" id="addSocialLinks" class="btn btn-md btn--round">Save</button>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">       
                    <div class="text-right pull-right col-md-3">
                    </div> 
                </div>
              </div>
            </div>
            </div>
<!--- faecbook modal End----> 
@stop           
<!-------scriipt-End---->    
@section('footer')
 @parent
<script>
$(document).ready(function(e) {
   $(document).on('click','.addSocialLinkDetails',function(){
      $('#addSocialLinkDetails').modal('show');
   });
});
</script>

<script>
$(document).ready(function(e) {
  $(document).on('click',"#addSocialLinks",(function(e) {
	$('#addSocialLinks').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i>Please wait...').attr('disabled',true); 
	$("#response").html(" ");
	var edit_id = $("#edit_id").val();  
    var fbLink =  $('#fbLink').val(); //alert(shopName);
	var instagramLink = $('#instagramLink').val();
	var linbkedLink = $("#linbkedLink").val();
	var googlePlusLink = $("#googlePlusLink").val();
	var fbLink = $("#fbLink").val();
	var twitterink = $("#twitterink").val();
	   $.ajax({
			type:'GET',
			url:'<?php echo url("vendorAgax/socialLinkDetails"); ?>',
			data:{edit_id:edit_id , fbLink:fbLink , instagramLink:instagramLink , linbkedLink:linbkedLink , googlePlusLink:googlePlusLink , twitterink:twitterink },
			success:function(res){
			 $('#addSocialLinks').html('Save').attr('disabled',false); 
			 $('#response').html(res);
			 $('#listGroup').load(document.URL + ' #listGroup');
			}
          });	  
    }));
});
</script>

@stop 
