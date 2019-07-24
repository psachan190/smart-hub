@extends("layout")
@section('content')
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
              <?php 
			   if($blogListArr != FALSE){
				  foreach($blogListArr as $list){
					  $image = $list->image;
					  $blogID = base64_encode($list->id);
					  $blogtitle = str_replace(" ","_",$list->url);
				    ?>
					<div class="col-lg-4 col-md-6 col-sm-12 padding_div">
					
                    <div class="single_blog blog--card blogcardline">
						                        <figure>
						                        <a target="_blank" href='{{ url("blog/$list->url") }}'>
						                            <img src="<?php echo url("uploadFiles/blogImage/blogImagethumb/$image"); ?>" alt="<?php if(!empty($list->title))echo $list->title; ?>" class="img img-responsive" title="<?php if(!empty($list->title))echo $list->title; ?>"></a>
						                            <figcaption>
						                                <div class="blog__content">
						                                    <a target="_blank" href='{{ url("blog/$list->url") }}' class="blog__title" title="<?php if(!empty($list->title))echo $list->title; ?>"><h4><?php if(!empty($list->title))echo substr($list->title , 0 ,50); ?> ...</h4></a>
						                                    <p>
															<?php
															 if(strlen(strip_tags($list->description)) > 300){
															      echo substr(strip_tags($list->description), 0 ,200);   
															   }
															 else{
															      echo strip_tags($list->description);   
															   } 
															  ?>
                                                              &nbsp;&nbsp; <a target="_blank" href='{{ url("blog/$list->url") }}' title="<?php if(!empty($list->title))echo substr($list->title , 0 , 100); ?>">Read More</a>
                                                              
						                                     </p>
						                                     
						                                </div>
						
						                                <div class="blog__meta">
						                                    <div class="withauto date_time">
						                                        <span class="lnr lnr-clock"></span>
						                                        <p><?php 
																 if(!empty($list->created_at)){
																   $strDate = strtotime($list->created_at);
																   echo date("d-M-Y", $strDate);
																   }
																  ?></p>
						                                    </div>
						                                    <div class="withauto1 comment_view">
                                                                                         <div class="btn-group">
                                                 
											            <a class="btnsocialshare btn btn-sm" target="_blank" title="On Facebook" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=https://kanpurize.com/blog/<?php if(!empty($list->url))echo $list->url; ?>">
											            <i class="fa fa-facebook fa-lg fb"></i>
											            </a>
											            <a class="btnsocialshare btn btn-sm" target="_blank" title="On Twitter" href="https://twitter.com/share?url=https://kanpurize.com/blog/<?php if(!empty($list->url))echo $list->url; ?>">
											            <i class="fa fa-twitter fa-lg tw"></i>
											            </a>
											            <a class="btnsocialshare btn btn-sm" target="_blank" title="On Google Plus" href="https://plus.google.com/share?url=https://kanpurize.com/blog/<?php if(!empty($list->url))echo $list->url; ?>">
											            <i class="fa fa-google-plus fa-lg google"></i>
											           </a>
											           <a class="btnsocialshare btn btn-sm" target="_blank" title="On LinkedIn" href="https://www.linkedin.com/shareArticle?url=https://kanpurize.com/blog/<?php if(!empty($list->url))echo $list->url; ?>">
											           <i class="fa fa-linkedin fa-lg linkin"></i>
											           </a>
											           @if($device_type == "D")
											           <a class="btnsocialshare btn btn-sm" target="_blank" title="On Whatsapp" href="https://web.whatsapp.com/send?text=https://kanpurize.com/blog/<?php if(!empty($list->url))echo $list->url; ?>">
											           <i class="fa fa-whatsapp fa-lg fb"></i>
											           </a>
											           @else
											           <a class="btnsocialshare btn btn-sm" target="_blank" title="On Whatsapp" href="whatsapp://send?text=https://kanpurize.com/blog/<?php if(!empty($list->url))echo $list->url; ?>" data-action="share/whatsapp/share">
											           <i class="fa fa-whatsapp fa-lg fb"></i>
											           </a>
											           @endif
                                                                                          </div>
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

@stop    
    
    
