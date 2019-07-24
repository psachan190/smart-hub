<div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <h4 style="font-size:14px;" class="modal-title" id="myModalLabel"><i class="text-muted fa fa-tag"></i>&nbsp;<strong>Edit Post</strong></h4>
                    <h4 style="font-size:14px;" class="modal-title" id="myModalLabel"><i class="text-muted fa fa-calendar"></i>&nbsp;<strong><small><?php if(!empty($result->created_at)) echo date("M-d-Y H:i:s",strtotime($result->created_at)); ?></small></strong></h4>
                  </div>
                  <div class="modal-body">
                   <div class="row">
            <!-- left posts-->
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                <!-- post state form -->
                 <meta name="csrf-token" content="{{ csrf_token() }}">
                 <form id="editprofilepostForm" name="editprofilepostForm">
                  <?php echo csrf_field(); ?>
                  <div class="social_box  profile-info n-border-top">
                   <div id="editprofilepostBox" class="input" contenteditable="true" placeholder="Whats in your mind today?">
                     <?php if(!empty($result->content))echo $result->content; ?> </div>
                     <input type="hidden" name="profileEditPostID" id="profileEditPostID" class="profileEditPostID" value="<?php if(!empty($result->id))echo $result->id; ?>" readonly="readonly" />
                     <input type="hidden" name="users_id" id="users_id" class="profileEditPostID" value="<?php if(!empty($result->user_id))echo $result->user_id; ?>" readonly="readonly" />
                     <input type="hidden" name="imagePathID" id="imagePathID" class="imagePathID" value="<?php if(!empty($result->imagepathID))echo $result->imagepathID; ?>" readonly="readonly" />
                     <div class="box-footer box-form">
                        <ul class="nav nav-pills">
                         <?php 
						  if(!empty($result->image_path)){
							  ?>
							   <img id="editimagepost" name="editImageSrc" src="<?php echo url("storage/uploads/posts/$result->image_path"); ?>"  />
							  <?php
							}
						  else{
							 ?>
							   <img id="editimagepost"  />
							 <?php
							}	
						 ?>
                            <li>
                                
                           </li>
                           <button type="submit" id="editprofilepostBtn" class="btn btn--icon btn-sm btn-seg btn--round btn-info pull-right imagpost">Save Post</button>
                            <input type="hidden" id="editprofilepostImageCopy" name="editprofilepostImageCopy" value="<?php if(!empty($result->image_path))echo $result->image_path; ?>" />
                        </ul>
                        <div class="form-group">
                          <label class="btn-bs-file imagpost">
                                   <i class="fa fa-camera camraicon"></i>
                                    <input type="file" id="editprofilepostImage" name="editprofilepostImage" onchange="readURL(this);" />
                               </label>
                        </div>
                    </div>
                  </div><!-- end post state form -->
                   </form>
                  <!-- post -->
                </div>
              </div>
            </div><!-- end left posts-->
          </div>
                  </div>
                  <div class="modal-footer">       
                    <div class="col-md-3" id="imgresponse">
                        <span class="h3 text-muted" id=""><strong></strong></span></span> 
                    </div>
                    <div class="text-right pull-right col-md-3">
                        Varejo: <br/> 
                        <span class="h3 text-muted" id="imgresponse"><strong> R$50,00 </strong></span></span> 
                    </div> 
                    <div class="text-right pull-right col-md-3">
                        Atacado: <br/> 
                        <span class="h3 text-muted"><strong>R$35,00</strong></span>
                    </div>
                </div>
              </div>
            </div>
<script>
  function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#editimagepost')
					.attr('src', e.target.result)
					.width(700)
					.height(300);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>          