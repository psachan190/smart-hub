@extends("layout")
@section('content')
<?php
//echo "<pre>";
//print_r($blogdata);exit;
?>
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
<section class="blog_area normal-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-sm-9 padding_div">
                    <div class="single_blog blog--card">
                        <figure>
                            <img class="img img-responsive imgblogsingle" src="<?php $image = $blogdata->image; echo url("uploadFiles/blogImage/original_image/$image"); ?>" alt="<?php if(!empty($blogdata->title))echo $blogdata->title;  ?>" title="<?php if(!empty($blogdata->title))echo $blogdata->title;  ?>">
                            <figcaption>
                                <div class="blog__content" style="text-align:justify;">
                                    <a href="#" class="blog__title1 blog__title" title="<?php if(!empty($blogdata->title))echo $blogdata->title;  ?>"><h4><?php if(!empty($blogdata->title))echo $blogdata->title;  ?></h4></a></br>
                                     <?php
                                     if(!empty($blogdata->description)){ 
					                      echo $blogdata->description;
				                         }
									 ?>
                                    	
                                </div>
                                <div class="blog__meta">
                                    <div class="withauto date_time">
                                        <span class="lnr lnr-clock"></span>
                                        <p><?php 
										 if(!empty($blogdata->created_at)){
										   $strDate = strtotime($blogdata->created_at);
										     echo date("d-M-Y", $strDate);
										   }
										 ?></p>
                                    </div>
                                    <div class="withauto1 comment_view">
                                       <!-- <ul>
                                <li>
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=https://kanpurize.com/blog/<?php if(!empty($blogdata->url)) echo $blogdata->url; ?>"><span class="fa fa-facebook"></span></a>
                               </li>
                                <li>
                                <a target="_blank" href="https://plus.google.com/share?url=https://kanpurize.com/blog/<?php if(!empty($blogdata->url)) echo $blogdata->url; ?>"><span class="fa fa-google-plus"></span>&nbsp;</a>
                                </li>
                                <li>
                                <a target="_blank" href="https://twitter.com/share?url=https://kanpurize.com/blog/<?php if(!empty($list->url))echo $list->url; ?>"><span class="fa fa-twitter"></span>&nbsp;</a>
                                </li>
                                 <li>
                                 <a target="_blank" href="https://www.linkedin.com/shareArticle?url=https://kanpurize.com/blog/<?php if(!empty($blogdata->url)) echo $blogdata->url; ?>"><span class="fa fa-linkedin"></span>&nbsp;</a>
                                </li>
                               @if($device_type == "D")
                                <li><a target="_blank" class='wa_btn wa_btn_s' href="https://web.whatsapp.com/send?text=https://kanpurize.com/blog/<?php if(!empty($blogdata->url)) echo $blogdata->url; ?>" ><span class="fa fa-whatsapp"></span>&nbsp;</a></li>
                               @else
                                  <li><a target="_blank" class='wa_btn wa_btn_s' href="whatsapp://send?text=https://kanpurize.com/blog/<?php if(!empty($blogdata->url)) echo $blogdata->url; ?>" data-action="share/whatsapp/share"  ><span class="fa fa-whatsapp"></span>&nbsp;</a></li>
                               @endif
                            
                            </ul>-->
                            				<div class="btn-group">
            <a class="btnsocialshare btn btn-sm" target="_blank" title="On Facebook" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=https://kanpurize.com/blog/<?php if(!empty($blogdata->url)) echo $blogdata->url; ?>">
            <i class="fa fa-facebook fa-lg fb"></i>
            </a>
            <a class="btnsocialshare btn btn-sm" target="_blank" title="On Twitter" href="https://twitter.com/share?url=https://kanpurize.com/blog/<?php if(!empty($list->url))echo $list->url; ?>">
            <i class="fa fa-twitter fa-lg tw"></i>
            </a>
            <a class="btnsocialshare btn btn-sm" target="_blank" title="On Google Plus" href="https://plus.google.com/share?url=https://kanpurize.com/blog/<?php if(!empty($blogdata->url)) echo $blogdata->url; ?>">
            <i class="fa fa-google-plus fa-lg google"></i>
           </a>
           <a class="btnsocialshare btn btn-sm" target="_blank" title="On LinkedIn" href="https://www.linkedin.com/shareArticle?url=https://kanpurize.com/blog/<?php if(!empty($blogdata->url)) echo $blogdata->url; ?>">
           <i class="fa fa-linkedin fa-lg linkin"></i>
           </a>
           @if($device_type == "D")
           <a class="btnsocialshare btn btn-sm" target="_blank" title="On Whatsapp" href="https://web.whatsapp.com/send?text=https://kanpurize.com/blog/<?php if(!empty($blogdata->url)) echo $blogdata->url; ?>">
           <i class="fa fa-whatsapp fa-lg fb"></i>
           </a>
           @else
           <a class="btnsocialshare btn btn-sm" target="_blank" title="On Whatsapp" href="whatsapp://send?text=https://kanpurize.com/blog/<?php if(!empty($blogdata->url)) echo $blogdata->url; ?>" data-action="share/whatsapp/share">
           <i class="fa fa-whatsapp fa-lg fb"></i>
           </a>
           @endif
    </div>
                            		</div>
                                 </div>
                                    <div class="margin_div" style=" padding:10px;">
                                    <div class="fb-like" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
                                    <div class=" fb-share-button" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                                    <div class="fb-save" data-uri="" data-size="large"></div></div>
                                    <div class="fb-comments" data-width="auto" data-numposts="5"></div>
                            </figcaption>
                        </figure>
                    </div><!-- end /.single_blog -->
                </div><!-- end /.col-md-4 -->
                <div class="col-md-3 col-sm-3 padding_div">
                	<div class="widgetngo shopofferstab blogwidgetop">
					            <div class="widgetngo__heading">
						<h4 id="blogwidget" class="widgetngo__title">Recent<span class="base-color"> blog</span></h4>
                       
					</div>
                                 <div class="row margin_div">
                                 <?php 
			   if($blogListArr != FALSE){
				  foreach($blogListArr as $list){
					  $image = $list->image;
					  $blogID = base64_encode($list->id);
					  $blogtitle = str_replace(" ","_",$list->url);
				    ?>
                                             <div class="widgetngo__text-content">
                                    <div class="widgetngo-latest-causes">
                                        <div class="widgetngo-latest-causes__image-wrap">
                                            <a href='{{ url("blog/$list->url") }} '>
                                            <img class="widgetngo-latest-causes__thubnail lazy" alt="<?php if(!empty($list->title))echo $list->title; ?>" src="<?php echo url("uploadFiles/blogImage/blogImagethumb/$image"); ?>" title="<?php if(!empty($list->title))echo $list->title; ?>" style="display: inline;">
                                            </a>
                                        </div>
                                        <div class="widgetngo-latest-causes__text-content">
                                            <h4 class="widgetngo-latest-causes__title"><a href='{{ url("blog/$list->url") }}'><?php if(!empty($list->title))echo $list->title; ?></a></h4>
                                            <div class="widgetngo-latest-causes__admin small-text">
                                                <i class="base-color lnr lnr-clock widgetngo-latest-causes__admin-icon"></i>
                                                <a href="#"><?php 
                                                                             if(!empty($list->created_at)){
                                                                               $strDate = strtotime($list->created_at);
                                                                               echo date("d-M-Y", $strDate);
                                                                               }
                                                                              ?></a>
                                            </div>
                                        </div>
                                    </div>
                                     <hr />
                                </div>
                                 <?php
				  }
				}
			  ?>  
			       <div class="text-center">
                                <?php if($blogListArr->count() > 0 ) echo $blogListArr->render(); ?>
                               </div>
                                </div>
                       </div>
                </div>
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>  
@stop
@section('footer')
 @parent
<script>
$(function(){
    $(".input-group-btn .dropdown-menu li a").click(function(){
        var selText = $(this).html();
       $(this).parents('.input-group-btn').find('.btn-search').html(selText);

   });
});</script>
<script type="text/javascript">
		$(document).ready(function(){
			var arrow =$(".arrow-up1");
			var form =$ (".login-form1");
			var status=false;
			$("#login1").click (function (event)
				{
					event.preventDefault();
					if (status == false)
						{
							arrow.fadeIn();
							form.slideToggle();
							status = true;
						}
						else{
							arrow.fadeOut();
							form.slideToggle();
							status = false;
						     }
				})
		})
	</script>
@stop    
    
    
