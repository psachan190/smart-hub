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
			<div class="col-md-6">
				<h1 class="page-title">Talent in kanpur @if(!empty($my_participantDetails->title)) / {{ substr($talentDetails->title ." ...", 0 , 50) }} @endif</h1>
			</div>
			<div class="col-md-6">
			</div>
		</div>
	</div>
</section>
<section class="how_it_works">
	<div class="how_it_works_module">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-9">
					<div class="row" style="border-right: 1px #eee solid;">
						<!-- end /.col-md-12 -->
						<div class="col-md-12 col-sm-12">
							<div class="area_content">
								<h3>
						      <?php 
						        if(!empty($talentDetails->title)){
							        echo $talentDetails->title;
								 }
						     ?></h2>
                              <?php
							  if(!empty($talentDetails->image_path)){
								   ?>
								   <img class=" img-responsive img-rounded imgtalent" src="<?php echo $talentDetails->image_path; ?>" alt="">
								   <?php
								 }
							 ?> 
								<p><?php if(!empty($talentDetails->description)) echo $talentDetails->description; ?></p>
								<div class="row">
									<div class="col-sm-5">
										<a href='{{ url("talent/participants/$talentDetails->encrypt_id") }}' class="btn btn-md btn--white">Participants</a>
									</div>
									<div class="col-sm-7">
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
								</div>
							</div>
						</div>
						<!-- end /.col-md-12 -->
					</div>
					<hr style="margin:15px;">
				</div>
				<div class="col-sm-3">
					<aside class="sidebar support--sidebar">
					<a href='@if(!empty($talent_enc_id)){{ url("talent/register/$talent_enc_id") }} @endif' class="login_promot">
                                          <span class="lnr lnr-plus-circle"></span>Register Your Entry</a>
					<div class=" card--forum_categories">
						 <div class="widgetngo__heading">
					       <h4 class="widgetngo__title">All Popular <span class="base-color">Talent</span></h4>
						 </div>
						@if($talentListArr != FALSE)
                          @foreach($talentListArr as $listArr)
                            @php  $image = $listArr->image @endphp
                           <div class="collapsible-content">
							<ul class="card-content">
								<div class="widgetngo__text-content">
									<a href='{{url("talent/talent/$listArr->encrypt_id") }}'>
									<div class="widgetngo-latest-causes">
										<div class="widgetngo-latest-causes__image-wrap">
											<img class="widgetngo-latest-causes__thubnail lazy" alt="<?php if(!empty($listArr->title))echo $listArr->title; ?>" src="<?php echo url("uploadFiles/talent/$image") ?>" title="<?php if(!empty($listArr->title))echo $listArr->title; ?>" style="display: inline;">
										</div>
										<div class="widgetngo-latest-causes__text-content">
											<h4 class="widgetngo-latest-causes__title"><?php if(!empty($listArr->title))echo $listArr->title; ?></h4>
										</div>
									</div>
									</a>
									<hr>
								</div>
							</ul>
						</div> 
                          @endforeach 
                        @endif
						
					</div>
					</aside><!-- end .sidebar -->
				</div>
			</div>
		</div>
	</div>
	<!-- end /.how_it_works_module -->
	<!-- end /.how_it_works_module -->
</section>
<!--profile details-->
@stop
@section('footer')