@extends('layout')
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/talent.css') }}"/>
@stop
@section('content')
<section class="normal-padding1 breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-title">Talent in kanpur @if(!empty($participantDetails->title)) / {{ substr($participantDetails->title ." ..." , 0 ,50) }} @endif</h1>		</div>
		</div>
	</div>
</section>
<div class="loadOtherPage">
<section class="contact-area normal-padding">
	<div class="container-fluid">
		<?php
			if($participantDetails != FALSE){
			if($participantDetails->user_id == session()->get('knpuser')){
			?>
		<div class="row">
			<div class="col-md-9 padding_div">
				<div class="contact_form cardify opcityform">
					<div class="tab tab3">
						<div class="item-navigation">
							<ul class="nav nav-tabs nav--tabs2">
								<li role="presentation" class="active">
									<a href="#talentimgpreview" aria-controls="talentimgpreview" role="tab" data-toggle="tab" aria-expanded="true">
									<span class="lnr lnr-picture"></span> Upload Image
									</a>
								</li>
								<li role="presentation">
									<a href="#ytvideo" aria-controls="ytvideo" role="tab" data-toggle="tab" aria-expanded="false">
									<span class="lnr lnr-camera-video"></span> Upload Video
									</a>
								</li>
								<li role="presentation">
									<a href="#editimagetab" aria-controls="ytvideo" role="tab" data-toggle="tab" aria-expanded="false">
									<span class="item-count lnr lnr-pencil"></span> Edit
									</a>
								</li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane product-tab active" id="talentimgpreview">
								<div class="row" id="load_talent_page">
									<div class="col-md-12 padding_div">
										<div class="widgetngo__heading">
											<h4 class="widgetngo__title">Upload Your <span class="base-color">Image</span></h4>
										</div>
										<div id="pageLoadSection">
											<form class="form-horizontal" id="upload_work">
												<?php echo csrf_field(); ?>
												<input type="hidden" name="uparticipant_id" value="<?php if(!empty($participant_id))echo $participant_id; ?>" readonly="readonly" />
												<input type="hidden" name="talent_id" value="<?php if(!empty($participantDetails->talent_id))echo $participantDetails->talent_id; ?>" readonly="readonly" />
												<div class="row" id="workUploadSection">
													<div class="mainDivBox col-sm-4 padding_div">
														<div class="bbxshasdow">
															<button type="button" class="crossbutton close" data-dismiss="modal" aria-label="Close"><span class="lnr lnr-cross" aria-hidden="true"></span></button>
															<div class="form-group">
																<div class="col-sm-12">
																	<img class="imgup1" src="http://goo.gl/pB9rpQ"/>                                                                 <input class="form-control fileUploadForm" type="file" name="work_image[]" >
                                                                 <span class="extErrResponse"></span>   
																</div>
															</div>
															<div class="form-group">
																<div class="col-sm-12">
																	<textarea id="photo_title" name="about_photos[]" class="form-control characterCountBox" data-lenght="100" placeholder="Say Some things to about this photo ?"></textarea>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12 padding_div" id="photoResponse"></div>
												</div>
												<div class="row">
													<div class=" btnmrgin col-sm-12 padding_div">
														<button type="submit" id="uploadPhotobtn" class="btn btn-md"><span class="lnr lnr-upload"></span> Upload</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane product-tab" id="ytvideo">
								<div class="row">
									<div class="col-md-12">
										<div class="widgetngo__heading">
											<h4 class="widgetngo__title">Upload Your <span  class="base-color">Video</span></h4>
										</div>
										<form class="form-horizontal" id="youtubeVideoLink">
											<?php echo csrf_field(); ?>
											<input type="hidden" name="participant_id" value="<?php if(!empty($participant_id))echo $participant_id; ?>" id="participant_id" readonly="readonly" />
											<input type="hidden" name="talent_id" value="<?php if(!empty($participantDetails->talent_id))echo $participantDetails->talent_id; ?>" readonly="readonly" />
											<div class="row">
												<div class="col-sm-4 padding_div">
													<div class="bbxshasdow">
														<div class="form-group">
															<div class="col-sm-12">
																<textarea type="text" id="youtube_embeded_code" name="youtube_embeded_code" placeholder="Paste Youtube video Link / Embeded Code " class="form-control" ></textarea>
															</div>
														</div>
														<div class="form-group">
															<div class="col-sm-12">
																<textarea type="text" id="video_title" name="video_tag" placeholder="Say Some things to about this  ?"  class="form-control characterCountBox" data-lenght="100" ></textarea>
															</div>
														</div>
														<div class="form-group">
															<div class="col-sm-12" id="videoResponse"></div>
														</div>
														<div class="form-group">
															<div class="col-sm-12">
																<button type="submit" id="uploadVideoLink" class="btn btn-md"><span class="lnr lnr-upload"></span> Upload</button>
																<button type="reset" style="display:none;" id="youtubeReset" class="btn btn-md"><span class="lnr lnr-upload"></span></button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
									<!-- end /.col-md-8 -->
								</div>
							</div>
							<div class="tab-pane product-tab" id="editimagetab">
								<div class="row">
									<div class="col-md-12 padding_div">
										<div class="widgetngo__heading">
											<h4 class="widgetngo__title">Edit Your <span class="base-color">Gallery</span></h4>
										</div>
										<form class="form-horizontal" id="talent_editregisterForm">
											<?php echo csrf_field(); ?>
                                            <input type="hidden" name="participantID" value="<?php if(!empty($participant_id))echo $participant_id; ?>" id="participant_id" readonly="readonly" />
											<div class="col-sm-8">
												<div class="form-group">
													<div class="col-sm-12">
														<label> Name <span class="prafontanswerstar">*</span></label>
														<input type="text" id="name" name="name" placeholder="Name" value="@if (!empty($participantDetails->name)){{ $participantDetails->name }} @endif" required="required" />
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-12">
														<label> Title <span class="prafontanswerstar">*</span></label>
														<textarea type="text" id="Title" name="title" placeholder="Title">@if (!empty($participantDetails->title)){{ $participantDetails->title }} @endif</textarea>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-12">
														<label>Description <span id="responseCount"></span> <span class="prafontanswerstar">*</span></label>
														<textarea type="text" class="textCount" id="Description" name="description" placeholder="Description" style="height:120px;">@if (!empty($participantDetails->description)){{ $participantDetails->description }} @endif</textarea>
													</div>
												</div>
												<span id="someDivToDisplayErrors"></span>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<div class="imgtlthover main-coupon-preview">														<img class="thumbnail talentimgedit-preview" src="<?php if(!empty($participantDetails->image_path))echo $participantDetails->image_path; ?>" title="<?php if(!empty($participantDetails->title))echo $participantDetails->title; ?>" alt="<?php if(!empty($participantDetails->title))echo $participantDetails->title; ?>" />
													</div>
													<div class="input-group">
														<input type="" id="talentLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
                                                        <input type="hidden" name="talent_profileImageCopy" value="@if(!empty($participantDetails->image)){{  $participantDetails->image }} @endif">
														<div class="input-group-btn">
															<div class="fileUpload_talent btn btn-md fake-shadow">
																<span><span class="lnr lnr-upload"></span> Edit Image</span>
																
                                                                <input type="file" id="talentimg-id" name="talent_profileImage"  class="attachment_upload">
															</div>
														</div>
													</div>
													<p class="help-block">* Upload your Images.</p>
												</div>
											</div>
											<div class="row margin_div">
												<div class="col-sm-8">
													<div class="form-group pull-right">
														<div class="col-sm-10">
															<span id="editResponse"></span>
														</div>
                                                        <div class="col-sm-2">
															<button name="submit" type="submit" id="edit_talent" class="btn btn-sm btn--icon"><span class="lnr lnr-plus-circle"></span> Save</button>
														</div>
													</div>
												</div>
											</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row margin_div">
						<div class="col-md-12 padding_div">
							@if($allParticipantData != FALSE)
							@foreach($allParticipantData as $listArr)
							<div class="row margin_div">
								<input type="hidden" class="deleteParticipantData" value="<?php if(!empty($listArr->id))echo $listArr->id; ?>" />
								<?php ?>
								<button class="buttondefault" style="float:right;"> <span class="lnr lnr-trash"></span></button>
							</div>
							<div class="row bbxshasdow">
								<div class="col-md-6 col-sm-6 v_middle">
									@if($listArr->data_type == 1)
									<div class="area_image">
										<img class="img img-responsive imgtalent" src="<?php if(!empty($listArr->participant_data)){ echo $listArr->participant_data; } ?>" alt="">
									</div>
									@endif
									@if( $listArr->data_type == 2)
									<div class="videofream">
										<?php if(!empty($listArr->participant_data)){ echo $listArr->participant_data; } ?>
									</div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 v_middle">
									<p><?php if(!empty($listArr->about_data))echo $listArr->about_data; ?></p>
								</div>
							</div>
							@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
			<?php
				if($my_participantList != FALSE){
				?>
			<div class="col-md-3 padding_div">
				<aside class="widgetngo shopofferstab blogwidgetop sidebar support--sidebar">
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
								<li><a href='{{ url("talent/upload_talent_work/$listArr->encrypt_id")}}'><span class="lnr lnr-chevron-right"></span>
									<?php 
										if(!empty($listArr->image)){
										  $image = $listArr->image;
										  ?>
									<img style="width:50px; height:50px;" class="img img-circle" src="<?php echo url("uploadFiles/talent/$image"); ?>">
									<?php  
										}
										  ?>
									<?php if(!empty($listArr->title))echo substr($listArr->title , 0 , 30); ?>
									<span class="item-count lnr lnr-pencil"></span></a>
								</li>
								<?php		
									}  
									 }
									 ?>
							</ul>
						</div>
						<!-- end /.collapsible_content -->
					</div>
				</aside>
				<!-- end .sidebar -->
			</div>
			<?php    
				}
				?>
		</div>
		<?php
			}
			}
			?>	
	</div>
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
<script src="{{ url('validationJS/talent.js') }}" type="text/javascript"></script>
<script src="{{ url('cdn/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ url('editor/tinymce.min.js') }}" type="text/javascript"></script>
<script src='{{ url("editor/editorBox.js") }}'></script>
<script>$(document).ready(function() {
	var brand = document.getElementById('talentimg-id');
	brand.className = 'attachment_upload';
	brand.onchange = function() {
	    document.getElementById('talentLogo').value = this.value.substring(12);
	};
	// Source: http://stackoverflow.com/a/4459419/6396981
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        
	        reader.onload = function(e) {
	            $('.talentimgedit-preview').attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$("#talentimg-id").change(function() {
	    readURL(this);
	});
	});
</script>
@stop