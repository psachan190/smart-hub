@include("blog.headerblog")
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li class="active"><a href="#"> Kanpurize Blog</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Kanpurize Blog</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
    
    <section class="blog_area section--padding2">
        <div class="container">
            <div class="row">
              <?php 
			   if($blogListArr != FALSE){
				  foreach($blogListArr as $list){
					  $image = $list->image;
					  $blogID = base64_encode($list->id);
					  $blogtitle = str_replace(" ","_",$list->title);
				    ?>
					<div class="col-md-4 col-sm-6">
                    <div class="single_blog blog--card">
                        <figure>
                            <img src="<?php echo url("uploadFiles/blogImage/$image"); ?>" alt="<?php if(!empty($list->title))echo $list->title; ?>">
                            <figcaption>
                                <div class="blog__content">
                                    <a target="_blank" href='{{ url("singleBlogpage/$blogID/$blogtitle?blog_id=$blogID") }} ' class="blog__title"><h4><?php if(!empty($list->title))echo $list->title; ?></h4></a>
                                    <p>
									<?php
									 if(strlen($list->description) > 300){
									      echo substr($list->description,0,300);   
									   }
									 else{
									      echo $list->description;   
									   }  
									  ?>
                                     </p>
                                </div>

                                <div class="blog__meta">
                                    <div class="date_time">
                                        <span class="lnr lnr-clock"></span>
                                        <p><?php 
										 if(!empty($list->created_at)){
										   $strDate = strtotime($list->created_at);
										   echo date("d-M-Y h:i:s a", $strDate);
										   }
										  ?></p>
                                    </div>
                                    <div class="comment_view">
                                        <ul>
                                <li>
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=https://kanpurize.com/singleBlogpage/<?php echo $blogID."/".$blogtitle; ?>"><span class="fa fa-facebook"></span></a>
                               </li>
                                <li>
                                <a target="_blank" href="https://plus.google.com/share?url=https://kanpurize.com/singleBlogpage/<?php echo $blogID."/".$blogtitle; ?>"><span class="fa fa-google-plus"></span>&nbsp;</a>
                                </li>
                                <li>
                                <a target="_blank" href="https://twitter.com/share?url=https://kanpurize.com/singleBlogpage/<?php echo $blogID."/".$blogtitle; ?>"><span class="fa fa-twitter"></span>&nbsp;</a>
                                </li>
                                <li>
                                <a target="_blank" href="https://www.linkedin.com/shareArticle?url=https://kanpurize.com/singleBlogpage/<?php echo $blogID."/".$blogtitle; ?>"><span class="fa fa-linkedin"></span>&nbsp;</a>
                                </li>
                            <li><a target="_blank" class='wa_btn wa_btn_s' href="https://web.whatsapp.com/send?text=https://kanpurize.com/singleBlogpage/<?php echo $blogID."/".$blogtitle; ?>" ><span class="fa fa-whatsapp"></span>&nbsp;</a></li>
                            </ul>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div><!-- end /.single_blog -->
                </div>
					<?php
				  }
				}
			  ?>             
            </div><!-- end /.row -->
        </div><!-- end /.container -->
        <!--
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="pagination-area">
                        <nav class="navigation pagination" role="navigation">
                            <div class="nav-links">
                                <a class="prev page-numbers" href="#"><span class="lnr lnr-arrow-left"></span></a>
                                <a class="page-numbers current" href="#">1</a>
                                <a class="page-numbers" href="#">2</a>
                                <a class="page-numbers" href="#">3</a>
                                <a class="next page-numbers" href="#"><span class="lnr lnr-arrow-right"></span></a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        -->
        
    </section>


@include("kanpur.layout.indexfooter")