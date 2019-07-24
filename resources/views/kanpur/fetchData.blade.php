<?php
  function dateDiff($postDate){
	  $datetime1 = new DateTime($postDate);
	  $cDate = date("Y-m-d H:i:s",time());
      $datetime2 = new DateTime($cDate);
      $difference = $datetime1->diff($datetime2);
if($difference->i < 1 && $difference->h < 1 && $difference->d < 1 && $difference->y < 0){ return "just now"; }
else if($difference->h < 1 && $difference->d < 0 && $difference->y < 0 || $difference->m < 0){ echo   $difference->i.' min. ,'.$difference->s.' sec ago'; }	
else if($difference->d < 1 ){ echo  $difference->h.' hour '.$difference->i.' min ago .'; } 
else if($difference->d ==1 && $difference->d < 2 && $difference->y < 1){ echo "yesterday"; } 
else if($difference->d > 2 && $difference->y < 1){ echo $postDate; }
else if($difference->y > 1){ echo $difference->y."year ".$difference->m." month ago";  }

//echo $difference->y.' years, ' 
  //                .$difference->m.' months, ' 
    //             .$difference->d.' days ,' 
		//		   .$difference->h.' hr ,'
			//   .$difference->i.' min. ,'
				//   .$difference->s.' sec.';
  //$pDate = strtotime($postDate);
	
	//print_r($difference) ;
  }
?>
@if($fetchData != FALSE)
 @foreach($fetchData as $dataArr)
  <div class="social_box  box-widget moreBox">
                    <div class="box-header with-border">
                      <div class=" pull-right gal-container">
	                    <a data-toggle="dropdown" class="dropdown-toggle" type="button"><img src="{{ asset('images/icon/postedit.png') }}" width="20px" height="20px"  />
	                    </a>
	                    <ul class="dropdown-menu postbtnedit">
                         <input type="hidden" name="postID" id="postID" class="editpostID" value="<?php if(!empty($dataArr->id))echo $dataArr->id ?>" />
						 <?php 
						  if($dataArr->user_id == Auth::user()->id){
							  ?>
		                  <li><a href="#" id="edittarget" class="editposttarget">Edit</a></li>
                           <?php
							}
						?>
		                  <li class="divider"></li>
                          <li><a href="#">Delete</a></li>
                          <li class="divider"></li>
		                </ul>
                      </div>
                      <div class="user-block">
                       @if(!empty($dataArr->profileImage))
                       <img class="img-circle" src='{{ url("uploadFiles/createProfileShop/$dataArr->profileImage") }}' alt="User Image">
                      @else
                       <img class="img-circle" src="{{ asset('images/Friends/guy-3.jpg') }}" alt='@if(!empty($dataArr->profileName)){{ $dataArr->profileName .$dataArr->id }} @endif ' />
                      @endif
                        <span class="username"><a href="#">@if(!empty($dataArr->profileName)){{ $dataArr->profileName  }} @endif</a></span>
                        <span class="description">Shared publicly - <?php echo dateDiff($dataArr->created_at); ?> </span>
                      </div>
                    </div>
                    <div class="box-body" style="display: block;">
                      <?php 
					    if(!empty($dataArr->has_image)){
						    $result = $postImageObj->getpostImage($dataArr->id);
							?>
							<img class="img-responsive show-in-modal" src="<?php echo $result; ?>" alt="<?php echo $dataArr->profileName; ?>">
							<?php
						  }
					  ?>
                      <?php
					   if(!empty($dataArr->content)){
						    ?>
							<p><?php echo $dataArr->content; ?></p>
							<?php
						  }
					   ?>
                      <div class="box-footer" style="display:block;">
                       <?php 
					   if(!empty($dataArr->has_image)){
						   ?>
						   <a href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=https://kanpurize.com/shareProfilePost/<?php echo $dataArr->id; ?>/?id=<?php echo $dataArr->id; ?>" class=" btn btn--icon btn-sm btn--round btn-info"><i class="fa fa-share"></i> Share</a>
						   <?php
						 }
					   ?>
                       <button type="button" class="btn btn-sm btn--icon btn--round"><i class="fa fa-thumbs-o-up"></i> Like</button>
                       <span class="pull-right text-muted">127 likes - 3 comments</span>
                       </form>
                     </div>
                    </div>
                    <div class="box-footer box-comments" style="display: block;">
                      <div class="box-comment">
                        <img class="img-circle img-sm" src="{{ asset('images/Friends/guy-3.jpg') }}" alt="User Image">
                        <div class="comment-text">
                          <span class="username">
                          jitu
                          <span class="text-muted pull-right">8:03 PM Today</span>
                          </span>
                          It is a long established fact that a reader will be distracted
                          by the readable content of a page when looking at its layout.
                        </div>
                      </div>
                    </div>
                    <div class="box-footer" style="display: block;">
                      <form action="#" method="post">
                        <img class="img-responsive img-circle img-sm" src="{{ asset('images/Friends/guy-3.jpg') }}" alt="Alt Text">
                        <div class="img-push">
                          <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                        </div>
                      </form>
                    </div>
                  </div>
 @endforeach
@endif    
   <div class="modal" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div id="loadEditPostData"></div>
              
   </div>
<script>
$(document).ready(function(e) {
 $(document).on('click','.editposttarget',function(){
   event.preventDefault();
   var editPostID = $(this).parent().parent().find('.editpostID').val();
   var getdataUrl = base_url+"/getEditpostForm/"+editPostID;
	// alert(getdataUrl);	
	$("#loadEditPostData").load(getdataUrl, function(responseTxt, statusTxt, xhr){
	    if(statusTxt == "success")
            $('#editPostModal').modal('show');
		if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
     });
 }); 
 $(document).on('click','.close',function(){
   event.preventDefault();
   $('#editPostModal').modal('hide');
 }); 
});
</script>            
         
            

               