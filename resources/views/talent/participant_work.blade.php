@extends('layout')
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/talent.css') }}"/>
<link rel="stylesheet" href="{{ asset('cdn/css/jquery.fancybox.min.css') }}"/>
@stop
@section('content')
			<section class=" normal-padding1 breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Talent in kanpur @if(!empty($my_participantDetails->title)) / {{ substr($my_participantDetails->title ." ...", 0 , 50) }} @endif</h1>
                </div>
                
            </div>
        </div>
        	</section>
<div class="loadOtherPage">
<section class="how_it_works normal-padding">
            <div class="container-fluid">
            	<div class="row">
                	<div class="col-sm-9">
					<div class="row" style="border-right: 1px #eee solid;">
                           
                            <div class="col-md-4 col-sm-6 v_middle">
                          <div class="area_image">
                          <a data-fancybox="gallery" href="<?php if(!empty($my_participantDetails->image_path))echo $my_participantDetails->image_path; ?>" data-caption="">
                           <img class="img-responsive imgtalent" src="<?php if(!empty($my_participantDetails->image_path))echo $my_participantDetails->image_path; ?>" alt="">
                           </a>
                        </div>
                            </div>
                            <div class="col-md-8  col-sm-6 v_middle">
                        <div class="area_content">
                            <h2><?php if(!empty($my_participantDetails->title))echo $my_participantDetails->title; ?></h2>
                            <p><?php if(!empty($my_participantDetails->description))echo $my_participantDetails->description; ?></p>

                           <div class="row">
                               	<div class="col-md-5 col-sm-12 col-xs-12">
                                     @if($voteDetails == FALSE)
									   @if($closed_talent == FALSE)
                                       	@if(!empty(session()->get('knpuser')))
                                            <button  id="<?php if(!empty($my_participantDetails->id))echo $my_participantDetails->id; ?>"  class="voteNowBtn btn btn-md btn--white">Vote Now</button>
                                        @else 
                                            <button class="voteAfterlogin btn btn-md btn--white">Vote</button>										
                                        @endif    
                                       @endif 
                                    @else
                                       @if($closed_talent == FALSE)
                                        <button class="voteAfterlogin btn btn-md btn-success" disabled="disabled">Already Voted</button>
                                       @endif 	
                                    @endif
                                </div>
                               @if($closed_talent == FALSE) 
                                <div class="col-md-7 col-sm-12 col-xs-12">
												<div class="btn-group pull-righttalent">
             <button class="btn btn-md disabled">
            <i class="fa fa-share-alt fa-lg sharesocial"></i></button>
            <a class="btnsocialshare btn btn-md" target="_blank" title="On Facebook" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=<?php if(!empty($sharedUrl))echo $sharedUrl; ?>">
											<i class="fa fa-facebook fa-lg fb"></i>
											</a>
            <a class="btnsocialshare btn btn-md" target="_blank" title="On Google Plus" href="https://plus.google.com/share?url=<?php if(!empty($sharedUrl))echo $sharedUrl; ?>">
											<i class="fa fa-google-plus fa-lg google"></i>
											</a>
            <a class="btnsocialshare btn btn-sm" target="_blank" title="On LinkedIn" href="https://www.linkedin.com/shareArticle?url=<?php if(!empty($sharedUrl))echo $sharedUrl; ?>">
											<i class="fa fa-linkedin fa-lg linkin"></i>
											</a>
           @if($device_type == "D")
						                           <a class="btnsocialshare btn btn-md" target="_blank" title="On Whatsapp" href="https://web.whatsapp.com/send?text=<?php if(!empty($sharedUrl))echo $sharedUrl; ?>">
											<i class="fa fa-whatsapp fa-lg fb"></i>
											</a>
                                                    @else
						                           <a class="btnsocialshare btn btn-md" target="_blank" title="On Whatsapp" href="whatsapp://send?text=<?php if(!empty($sharedUrl))echo $sharedUrl; ?>">
											<i class="fa fa-whatsapp fa-lg fb"></i>
											       </a>
                                                       @endif
           
    </div>
                                </div>
                               @endif 
                               </div>
                        </div>
                    </div>
                           <hr style="margin:15px;">
                         </div>
                         <div class="row" style="border-right: 1px #eee solid;">
                         	@if($allParticipantData != FALSE)
                               <div class="widgetngo__heading">
						         <h4 id="blogwidget" class="widgetngo__title">Images<span class="base-color"> Gallery</span></h4>
				            	</div>
                               @foreach($allParticipantData as $imagelistArr)
                                  @if($imagelistArr->data_type == 1)
                                   <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 padding_div">
                            	    <div class="area_image">
                                      <a data-fancybox="gallery" href="<?php if(!empty($imagelistArr->participant_data))echo $imagelistArr->participant_data; ?>" data-caption="">
                                      <div class="hvrbox">
                                       <img class="hvrbox-layer_bottom img-responsive img-rounded" src="<?php if(!empty($imagelistArr->participant_data))echo $imagelistArr->participant_data; ?>" alt="<?php if(!empty($imagelistArr->about_data))echo $imagelistArr->about_data; ?>">
                                            <div class="hvrbox-layer_top">
                                                <div class="hvrbox-text"><?php if(!empty($imagelistArr->about_data))echo $imagelistArr->about_data; ?></div>
                                            </div>
</div>
                                       </a>
                                </div>
                                   </div>
                                  @endif
                               @endforeach 
                            @endif
                         </div>
                         <div class="row" style=" margin-top:10px; border-right: 1px #eee solid;">
                         	@if($allParticipantDatavideo != FALSE)
                               <div class="widgetngo__heading">
						         <h4 id="blogwidget" class="widgetngo__title">Video<span class="base-color"> Gallery</span></h4>
				            	</div>
                               @foreach($allParticipantDatavideo as $imagelistArr)
                                  @if($imagelistArr->data_type == 2)
                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding_div">
                                       <div class="videofream videocon_talent">
                                       				    <h3><span class="lnr lnr-camera-video"></span> <?php if(!empty($imagelistArr->about_data))echo $imagelistArr->about_data; ?> </h3>
							            <?php if(!empty($imagelistArr->participant_data))echo $imagelistArr->participant_data; ?>
                                       </div>
                                   </div>
                                  @endif
                               @endforeach 
                            @endif
                         </div>
                    </div>                                                                           
                    <div class="col-sm-3">
                      <aside class="sidebar support--sidebar">
                      @include('talent.my_talent')
                    </aside><!-- end .sidebar -->
                    </div>
                </div>
            </div>

        <!-- end /.how_it_works_module -->
    </section>
</div>    
<!--profile details-->
<div class="gal-container nopadding">
	<div class="col-md-12 col-sm-12 co-xs-12">
		<div class="boximg formseller">
			<div class="modal modalngo fade" id="vote_talent" tabindex="-1" role="dialog">
				<div class="modal-dialog mobilengo" role="document">
					<div class="modal-content popupsize1">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<div class="modal-body">
							<div class="boxed-body signin-area">
								<div class="row borderbottom margin_div normal-padding">
								   <div id="msgLoad"></div>										
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('footer')
 @parent
 <script src="{{ url('cdn/js/jquery.fancybox.min.js') }}"></script>
 <script src="{{ url('validationJS/talent.js') }}"></script>
@stop
