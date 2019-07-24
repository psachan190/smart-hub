@extends('layout')
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/talent.css') }}"/>
<link rel="stylesheet" href="{{ asset('cdn/css/jquery.fancybox.min.css') }}"/>
@stop
@section('content')
<section class="normal-padding1 breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Talent in kanpur @if(!empty($talentDetails->title)) / {{ substr($talentDetails->title ."..", 0 , 50) }} @endif</h1>
                </div>
            </div>
        </div>
 </section>
<div class="loadOtherPage">
 <section class="how_it_works">
        <div class="how_it_works_module">
            <div class="container-fluid">
            	<div class="row">
                	<div class="col-md-9 col-sm-12">
                       @if($all_participate != FALSE)
                        @php $i =1; @endphp
                        @foreach($all_participate as $listArr)
                          @php $image =  $listArr->image  @endphp
                          <?php
                           $shareUrl = $listArr->encrypt_id;
                            $sharedUrl = url("talent/participant_work/$shareUrl");
                          ?>
                          @if($i % 2 != 0)
                            <div class="row" style="border-right: 1px #eee solid;">
                          <div class="col-md-4 col-sm-6 v_middle">
                          <div class="area_image">
                          <a data-fancybox="gallery" href="<?php echo url("uploadFiles/talent/original/$listArr->image"); ?>" data-caption="">
                           <img class="img-responsive imgtalent" src="<?php if(!empty($listArr->image_path)){ echo $listArr->image_path; } ?>" alt="">
                           </a>
                        </div>
                          <?php 
						  if(!empty($obj)){
							  $resultData = $obj->getParticipantImage($listArr->id , $listArr->talent_id);
							  if($resultData != FALSE){
								  ?>
								  <div align="center" class="">
                              <ul class="imagetalent">
                            	<?php
                                foreach($resultData as $resultArr){
								   ?>
								   <li>
                                     <a data-fancybox="gallery" href="<?php if(!empty($resultArr->participant_data))echo $resultArr->participant_data; ?>" data-caption=""> <img style="height:70px; width:70px;" class="" src="<?php echo url("uploadFiles/talent/$resultArr->imageName"); ?>" alt="<?php if(!empty($resultArr->about_data))echo $resultArr->about_data; ?>" /></a>
                                   </li>
								   <?php
								 }
								?> 
                              </ul>
                             </div>
								  <?php
								}
							}
						  ?>
                            </div>
                          <div class="col-md-8 col-sm-6 v_middle">
                        <div class="area_content">
                            <h2>@if(!empty($listArr->title)){{ $listArr->title }} @endif </h2>
                             <p><?php if(!empty($listArr->description))echo substr(strip_tags($listArr->description) , 0 ,400); ?> </p>
                               <div class="row">
                               	<div class="col-md-6 col-sm-12 col-xs-12">
                                	<a href='{{ url("talent/participant_work/$listArr->encrypt_id") }}' class="btn btn-md btn--white">More Details</a>
                                    @if($voteDetails == FALSE)
                                       @if($upcoming_talent == FALSE && $closed_talent == FALSE)
                                        @if(!empty(session()->get('knpuser')))
                                            <button  id="<?php if(!empty($listArr->id))echo $listArr->id; ?>"  class="voteNowBtn btn btn-md btn--white">Vote Now</button>
                                        @else
                                            <button class="voteAfterlogin btn btn-md btn--white">Vote</button>										
                                        @endif
                                       @elseif($upcoming_talent == TRUE)
                                       <a>Voting Start : @if(!empty($talentDetails->registerEntrydate)) {{ date('d-M-Y' , $talentDetails->registerEntrydate) }} @endif</a>    	
                                       @endif 
                                    @else
                                       @if($closed_talent == FALSE)
                                       <button class="voteAfterlogin btn btn-md btn-success" disabled="disabled">Already Voted</button>										
                                       @endif
                                    @endif
                                </div>
                                @if($closed_talent == FALSE)
                                <div class="col-md-6 col-sm-12 col-xs-12">
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
                          @else
                            <div class="row" style="border-right: 1px #eee solid;">
                           <div class="col-md-8  col-sm-6 v_middle">
                        <div class="area_content">
                            <h2>@if(!empty($listArr->title)){{ $listArr->title }} @endif</h2>
                            <p><?php if(!empty($listArr->description))echo substr(strip_tags($listArr->description) , 0 ,400); ?> </p>
                           <div class="row">
                               	<div class="col-sm-5">
                                	<a href='{{ url("talent/participant_work/$listArr->encrypt_id") }}' class="btn btn-md btn--white">More Details</a>
                                    @if($voteDetails == FALSE)
                                     @if($upcoming_talent == FALSE && $closed_talent == FALSE) 
                                         @if(!empty(session()->get('knpuser')))
                                            <button  id="<?php if(!empty($listArr->id))echo $listArr->id; ?>"  class="voteNowBtn btn btn-md btn--white">Vote Now</button>
                                         @else
                                            <button class="voteAfterlogin btn btn-md btn--white">Vote</button>										
                                         @endif
                                     @else if($upcoming_talent == TRUE)
                                      <a>Voting Start : @if(!empty($talentDetails->registerEntrydate)) {{ date('d-M-Y' , $talentDetails->registerEntrydate) }} @endif</a>  	
                                     @endif
                                    @else
                                      @if($closed_talent == FALSE)
                                       <button class="voteAfterlogin btn btn-md btn-success" disabled="disabled">Already Voted</button>	
                                      @endif 									
                                    @endif
                                </div>
                                 @if($closed_talent == FALSE)
                                  <div class="col-sm-6">
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
                           <div class="col-md-4 col-sm-6 v_middle">
                          <div class="area_image">
                          <a data-fancybox="gallery" href="<?php echo url("uploadFiles/talent/original/$listArr->image"); ?>" data-caption="">
                           <img class="img-responsive imgtalent" src="<?php if(!empty($listArr->image_path))echo $listArr->image_path; ?>" alt="">
                           </a>
                        </div>
                          <?php 
						  if(!empty($obj)){
							  $resultData = $obj->getParticipantImage($listArr->id , $listArr->talent_id);
							  if($resultData != FALSE){
								  ?>
								  <div align="center" class="">
                              <ul class="imagetalent">
                            	<?php
                                foreach($resultData as $resultArr){
								   ?>
								   <li>
                                     <a data-fancybox="gallery" href="<?php if(!empty($resultArr->participant_data))echo $resultArr->participant_data; ?>" data-caption=""> <img style="height:70px; width:70px;" class="" src="<?php echo url("uploadFiles/talent/$resultArr->imageName"); ?>" alt="<?php if(!empty($resultArr->about_data))echo $resultArr->about_data; ?>" /></a>
                                  </li>
								   <?php
								 }
								?> 
                              </ul>
                             </div>
								  <?php
								}
							}
						  ?>
                            </div>
                           <hr style="margin:15px;">
                         </div>
                          @endif
                         @php $i ++; @endphp
                        @endforeach
                       @endif  
                    </div>
                    <div class="col-md-3 col-sm-12">
                      <aside class="sidebar support--sidebar">
                        @if($closed_talent == TRUE)
                        <button type="button"  class="login_promot" disabled ="disabled">
                        <span class="lnr lnr-plus-circle"></span>Entry Closed</button>
                        @else
                        <a href='@if(!empty($talent_enc_id)){{ url("talent/register/$talent_enc_id") }} @endif' class="login_promot">
                        <span class="lnr lnr-plus-circle"></span>Register Your Entry</a>
                        @endif
                        
                        @include('talent.my_talent')
                    </aside><!-- end .sidebar -->
                    </div>
                    
                </div>
            </div>
        </div><!-- end /.how_it_works_module -->
        <!-- end /.how_it_works_module -->
    </section>
</div>  
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
<script>
$(document).ready(function(){
        $('#phototalent').imageReader({
          renderType: 'canvas',
          onload: function(canvas) {
            var ctx = canvas.getContext('2d');
            ctx.fillStyle = "orange";
            ctx.font = "12px Verdana";
            ctx.fillText("Filename : "+ this.name, 10, 20, canvas.width - 10);
            $(canvas).css({
              width: '100%',
              marginBottom: '-10px'
            });
          }
        });
      });
</script>
<script>
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		define(['jquery'], factory)
	} 
	else if (typeof module === 'object' && module.exports) {
		module.exports = (root, jQuery) => {
			if (jQuery === undefined) {
				if ( typeof window !== 'undefined' ) {
					jQuery = require('jquery')
				}
				else {
					jQuery = require('jquery')(root)
				}
			}
			factory(jQuery)
			return jQuery
		}
	} 
	else {
		factory(jQuery)
	}
}($ => {
	'use strict'

	$.fn.imageReader = function (options) {
		var defaults = {
			// id destination 
			destination: '#image-preview',

			// render type
			// canvas or 
			// image (default)
			renderType: 'image',

			// callback when image has loaded
			onload() {}
		}
		var settings = Object.assign(defaults, options)
		
		if (!('FileReader' in window)) {
			console.error('Your browser does not support FileReader API')
			return
		}

		// allowed image type
		const IMAGE_TYPE = new Set([
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/gif',
			'image/svg+xml',
			'image/bmp',
			'image/x-icon',
			'image/vnd.microsoft.icon'
		])

		let reader = {
			container: $(settings.destination),
			clearContainer () {
				this.container.html('')
			},
			validateMimeType (type) {
				return IMAGE_TYPE.has(type)
			},
			processRead (file) {
				if (!this.validateMimeType(file.type)) {
					console.warn('Invalid file type')
					return
				}

				try {
					let reader = new FileReader()
					reader.onload = e => {
						switch (settings.renderType) {
							case 'canvas':
								this.renderObjectToCanvas(file, e)
								break

							default:
								this.renderObjectToImage(file, e)
								break
						}
					}
					reader.readAsDataURL(file)
				}
				catch (err) {
					throw new Error(err.message) 
				}
			},
			createImage (e, onload) {
				let image = new Image()
				if (typeof onload === 'function') {
					image.onload = function() {
						onload(image)
					}
				}
				image.src = e.target.result
			},
			renderObjectToImage (f, e) {
				this.createImage(e, (img) => {
					this.container.append(img)
					this.callback(f, img)
				})
			},
			renderObjectToCanvas (f, e) {
				let canvas = document.createElement('canvas')
				let ctx = canvas.getContext('2d')

				this.createImage(e, (img) => {
					canvas.width = img.width
				    canvas.height = img.height
				    ctx.drawImage(img, 0, 0)
				    this.container.append(canvas)
				    this.callback(f, canvas)
				})
			},
			callback (_this, obj) {
				settings.onload.call(_this, obj)
			}
		}

		return this.each(function () {
			$(this).on('change', () => {
				reader.clearContainer()
				for(let x = 0, xlen = this.files.length; x < xlen; x++) {
					reader.processRead(this.files[x])
				}
			})
		})
	}
}))</script>
@stop
