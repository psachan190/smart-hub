<?php
                         if($my_participantList != FALSE){
						     ?>
                             <div class=" card--forum_categories">
                           <div class="widgetngo__heading">
													<h4 class="widgetngo__title">Your <span class="base-color">Talent</span></h4>
												</div>
                            <style>
                            .my_participant li{ padding:10px; }
                            </style>
                            <div class="collapsible-content">
                                <ul class="card-content my_participant">
                                   <?php
                                   foreach($my_participantList as $listArr){
									  if($listArr->user_id == session()->get('knpuser')){
								          ?>
										  <li><a href='{{ url("talent/upload_talent_work/$listArr->encrypt_id")}}'>
                                        <?php 
										  if(!empty($listArr->image)){
											   $image = $listArr->image;
											   ?>
											   <img style="width:50px; height:50px;" class="img img-circle" src="<?php echo url("uploadFiles/talent/$image"); ?>">
											   <?php  
											}
									    ?>
                                        <?php if(!empty($listArr->title))echo substr($listArr->title , 0 , 50); ?>
                                        <span class="item-count lnr lnr-pencil"></span></a></li>
										  <?php		
										}  
									  }
								   ?>
                                </ul>
                            </div><!-- end /.collapsible_content -->
                        </div>
							 <?php    
						  }
						?>