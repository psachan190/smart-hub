@extends('layout')
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/talent.css') }}"/>
@stop
@section('content')
<section class=" normal-padding1 breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="page-title">Talent in kanpur @if(!empty($talentDetails->title)) / {{ substr($talentDetails->title ." ...", 0 , 50) }} @endif</h1>
                </div>
                <div class="col-md-6">
                
                </div>
            </div>
        </div>
        	</section>
            <section class="contact-area normal-padding">
        <div class="container padding_div">
            <div class="row">
               <div class="col-md-12 padding_div">
                            <div class="contact_form cardify opcityform">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact_form--wrapper">
                                        	<div class="widgetngo__heading">
                              <h4 class="widgetngo__title">Create Your <span class="base-color">Talent</span></h4>
                           </div>
                                  <form class="form-horizontal" id="talent_registerForm">
                                     <?php echo csrf_field(); ?>
                                       <input type="hidden" name="talent_id" value="<?php if(!empty($talentDetails->id))echo $talentDetails->id; ?>" />
                                       <div class="col-sm-8">
                                             	<div class="form-group">
                                	<div class="col-sm-12">
                                         <label> Name <span class="prafontanswerstar">*</span></label>
                            			 <input type="text" id="name" name="name" placeholder="Name" required="required" value="<?php if(!empty($user->name))echo $user->name." ".$user->lname; ?>"  />
                                    </div>
                             </div>
                                                <div class="form-group">
                                	<div class="col-sm-12">
                                         <label> Title <span class="prafontanswerstar">*</span></label>
                            			 <textarea type="text" id="Title" name="title" placeholder="Title" required="required" ></textarea>
                                    </div>
                             </div>
                             	  <div class="form-group">
                                  <div class="col-sm-12">
                                    <label>Description <span id="responseCount"></span> <span class="prafontanswerstar">*</span></label>
                            		  <textarea type="text" name="description"  placeholder="Description" style="height:120px;" class="textCount" required="required"></textarea>
                                    </div>
                                </div>
                                 <span id="someDivToDisplayErrors"></span>
                                             </div>
                                       <div class="col-sm-4 ">
                                              <div class="form-group">
                                              <label>Image Upload <span class="prafontanswerstar">*</span></label>
                                             	<div class="droptalent">
      <label class="droptalent-label">Drag and drop images here</label>
      <input type="file" class="image-upload" id="photo" name="talent_profileImage" accept="image/*" />
    <div id="image-preview12"></div>
     <input type="file" style="display:none;" class="image-upload" id="photoCopy" name="talent_profileImageCopy" accept="image/*" />
     
  </div>
                                             </div>
                                             </div>
                                          <div class="row margin_div">
                                                <div class="col-sm-8">                                                       <div class="form-group pull-right">
                                                <div class="col-sm-12">
                                    <span id="personalResponse"></span>
                                <button name="submit" type="submit" id="save_talent" class="btn btn-sm btn--icon"><span class="lnr lnr-plus-circle"></span> Save</button>
                                <button name="submit" style="display:none;" type="reset" id="reset_talent" class="btn btn-sm btn--icon"><span class="lnr lnr-plus-circle"></span> Save</button>
                               </div>
                               </div>
                                               </div>
                                          </div>
                                        </div>                                                      
                        </form>
                                        </div>
                                    </div><!-- end /.col-md-8 -->
                                </div>
                            </div>
                        </div>
            </div>
        </div>
</section>
@stop
@section('footer')
@parent
<script src="{{ url('validationJS/talent.js') }}" type="text/javascript"></script>
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
			destination: '#image-preview12',

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
<script src="{{ url('cdn/js/jquery.fancybox.min.js') }}"></script>
<script>
$(document).ready(function(){
        $('#photo').imageReader({
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
<script src="{{ url('editor/tinymce.min.js') }}" type="text/javascript"></script>
<script src='{{ url("editor/editorBox.js") }}'></script>


@stop
