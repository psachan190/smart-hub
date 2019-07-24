@include("blog.headerblog")
<?php 
$blogTitle = str_replace(" ","_",$blogdata->title);
$blogID = base64_encode($blogdata->id);
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
    
    <section class="blog_area section--padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="single_blog blog--card">
                        <figure>
                            <img src="<?php $image = $blogdata->image; echo url("uploadFiles/blogImage/$image"); ?>" alt="<?php if(!empty($blogdata->title))echo $blogdata->title;  ?>">
                            <figcaption>
                                <div class="blog__content">
                                    <a href="#" class="blog__title"><h4><?php if(!empty($blogdata->title))echo $blogdata->title;  ?></h4></a>
                                    <p><?php if(!empty($blogdata->description))echo $blogdata->description;  ?></p>
                                </div>

                                <div class="blog__meta">
                                    <div class="date_time">
                                        <span class="lnr lnr-clock"></span>
                                        <p><?php 
										 if(!empty($blogdata->created_at)){
										   $strDate = strtotime($blogdata->created_at);
										     echo date("d-M-Y h:i:s a", $strDate);
										   }
										 ?></p>
                                    </div>
                                    <div class="comment_view">
                                        <ul>
                                <li>
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=https://kanpurize.com/singleBlogpage/<?php echo $blogID."/".$blogTitle."?blog_id=$blogID"; ?>"><span class="fa fa-facebook"></span></a>
                               </li>
                                <li>
                                <a target="_blank" href="https://plus.google.com/share?url=https://kanpurize.com/singleBlogpage/<?php echo $blogID."/".$blogTitle; ?>"><span class="fa fa-google-plus"></span>&nbsp;</a>
                                </li>
                                <li>
                                <a target="_blank" href="https://www.linkedin.com/shareArticle?url=https://kanpurize.com/singleBlogpage/<?php echo $blogID."/".$blogTitle; ?>"><span class="fa fa-linkedin"></span>&nbsp;</a>
                                </li>
                            <li><a target="_blank" class='wa_btn wa_btn_s' href="https://web.whatsapp.com/send?text=https://kanpurize.com/singleBlogpage/<?php echo $blogID."/".$blogTitle; ?>" ><span class="fa fa-whatsapp"></span>&nbsp;</a></li>
                            </ul>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div><!-- end /.single_blog -->
                </div><!-- end /.col-md-4 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
@include("kanpur.layout.indexfooter")