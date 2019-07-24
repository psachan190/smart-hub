@include("kanpur.layout.header")
<script src="//platform-api.sharethis.com/js/sharethis.js#property=5b2617bb40932d0012909611&product=inline-share-buttons"></script>
 <link href="{{ asset('css/social.css') }}" rel="stylesheet" />
    <!-- Begin page content -->
    <div class="container page-content">
      <div class="row">
        <!-- left links -->
        <div class="col-md-3">
          <div class="profile-nav">
            <div class="widget">
              <div class="widget-body">
                   <div class="user-heading user_head">
                    <form id="saveimageform">
                     <?php echo csrf_field(); ?>
                	<div class="containimage">
                      @if(!empty($userProfileData->profileImage))
                      <img src='{{ url("uploadFiles/createProfileShop/$userProfileData->profileImage") }}' alt='@if(!empty($userProfileData->profileImage)) {{ $userProfileData->profileImage }} @endif' class="imagecamra" />
                      @else
                      <img src='{{ url("uploadFiles/createProfileShop/images.png") }}' alt="Avatar" class="imagecamra" /> 
                      @endif
                        <?php 
						  if($userProfileData->users_id == Auth::user()->id){
							  ?>
							 <div class="overlayimg">
                              <div class="textcamra">
                         <label class="btn-bs-file ">
                             <i class="fa fa-camera camraicon"></i>
                             <input type="file" name="imageProfile" id="imageProfile" accept="image/*"  />
                             <input type="hidden" name="editID" id="editID" value="<?php if(!empty($userProfileData->id)) echo $userProfileData->id; ?>" />
                         </label></div>
                         </div>
							  <?php
							}
						?>
                      
                    </div>
					 <h3><button style="display:none;" type="submit" class=" btn btn--icon btn-sm btn--round btn-info">save image</button></h3>
                     </form>
			      <h1><small><strong>@if(!empty($userProfileData->profileName)) {{ $userProfileData->profileName }} @endif</strong></small></h1>
                </div>
              
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="#"> <i class="fa fa-user"></i> News feed</a></li>
                  <li>
                    <a href="#"> 
                      <i class="fa fa-envelope"></i> Messages 
                      <span class="label label-info pull-right r-activity">9</span>
                    </a>
                  </li>
                  <li><a href="#"> <i class="fa fa-calendar"></i> Events</a></li>
                  <li><a href="#"> <i class="fa fa-image"></i> Photos</a></li>
                  <li><a href="#"> <i class="fa fa-share"></i> Browse</a></li>
                  <li><a href="#"> <i class="fa fa-floppy-o"></i> Saved</a></li> 
                  <li>
                  </li>
                </ul>
              </div>
            </div>
            <div class="widget">
              <div class="widget-body">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="#"> <i class="fa fa-globe"></i> Pages</a></li>
                  <li><a href="#"> <i class="fa fa-gamepad"></i> Games</a></li>
                  <li><a href="#"> <i class="fa fa-puzzle-piece"></i> Ads</a></li>
                  <li><a href="#"> <i class="fa fa-home"></i> Markerplace</a></li>
                  <li><a href="#"> <i class="fa fa-users"></i></a>
                  <div class="sharethis-inline-share-buttons"></div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- end left links -->
        <!-- center posts -->
         <div class="col-sm-6 col-md-6">
          <div class="row">
            <!-- left posts-->
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                <!-- post state form -->
                 <meta name="csrf-token" content="{{ csrf_token() }}">
                 <form id="profilepostForm" name="profilepostForm">
                  <?php echo csrf_field(); ?>
                  <div class="social_box  profile-info n-border-top">
                   <div id="profilepostBox" class="input" contenteditable="true" placeholder="Whats in your mind today?">
                   </div>
                     <input type="hidden" name="profileID" id="profileID" value="<?php if(!empty($userProfileData->id))echo $userProfileData->id; ?>" readonly="readonly" style="display:none;" />
                     <input type="text" name="users_id" id="users_id" value="<?php if(!empty($userProfileData->users_id))echo $userProfileData->users_id; ?>" readonly="readonly" style="display:none;"  />
                     <div class="box-footer box-form">
                        <ul class="nav nav-pills">
                        <img id="imagepost" class="imagepost"  />
                            <li>
                                <label class="btn-bs-file imagpost">
                                   <i class="fa fa-camera camraicon"></i>
                                    <input type="file" id="profilepostImage" name="profilepostImage" onchange="readURL(this);" />
                               </label>
                           </li>
                           <button type="submit" id="profilepostBtn" class="btn btn--icon btn-sm btn-seg btn--round btn-info pull-right imagpost">Post</button>
                        </ul>
                    </div>
                  </div><!-- end post state form -->
                   </form>
                  <!--   posts -->
                 <div id="postprofileFetchBox">
                   <div class="text-center">
                    <img src="<?php echo url("loadingData.gif"); ?>" id="loadingGif" />  
                   </div> 
                  <div id="postFetchBlog"></div>
                 </div> 
                  <!--  end posts-->
                  <!-- post -->
                </div>
              </div>
            </div><!-- end left posts-->
          </div>
        </div>
        <!-- end  center posts -->
        <!-- right posts -->
        <div class="col-md-3">
          <!-- Friends activity -->
          <div class="widget">
            <div class="widget-header">
              <h3 class="widget-caption">Friends activity</h3>
            </div>
              <div id="response"></div>
            <div class="widget-body bordered-top bordered-sky">
              <div class="card">
                <div class="content">
                   <ul class="list-unstyled team-members">
                    <li>
                      <div class="absolute">
This element is absolutely-positioned. It's positioned relative to its parent.</div>
                    </li>
                    <li>
                      
                    </li>
                  </ul>         
                </div>
              </div>
            </div>
          </div><!-- End Friends activity -->
        </div><!-- end right posts -->
      </div>
    </div>
 @include("kanpur.layout.footer")
<script>
 $(document).ready(function(e) {
   $(document).on('click','#savePostUpload',function(){
     var postComment = $("#commentBoxPost").html();
	 alert(postComment);
   });
 });
</script>
<script>
  function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#imagepost')
					.attr('src', e.target.result)
					.width(700)
					.height(300);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
<script>
$(document).ready(function(e) {
 //$("#postFetchBlog").load("<?php //echo url("getProfilePost/$userProfileData->id"); ?>"); 
 $("#loadingGif").show();
$("#postFetchBlog").load("<?php echo url("getProfilePost/$userProfileData->id"); ?>", function(responseTxt, statusTxt, xhr){
	    if(statusTxt == "success")
           $("#loadingGif").hide();
		if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
});
</script>
<script>
$(document).ready(function(e) {
  $(".moreBox").slice(0,3).show();  
});
</script>

