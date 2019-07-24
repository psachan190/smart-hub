@extends('layout')
@section('title', $title)
@section('content')
<section class=" normal-padding1 breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="page-title">My vision and mission</h1>
			</div>
			<div class="col-md-6">
				<ul class="navtab">
					<li><a href="{{ url('ngo/'.$ngo->user_name.'/home') }}">Home </a> </li>
					<li><a href="{{ url('ngo/'.$ngo->user_name.'/gallery') }}">Gallery </a> </li>
					<li><a href="{{ url('ngo/'.$ngo->user_name.'/events') }}">Event </a> </li>
					<li><a href="{{ url('ngo/'.$ngo->user_name.'/causes') }}">Causes</a> </li>
					 <li><a href="#">Donate</a> </li>
                                        <!-- <li><a href="{{ url('ngo/'.$ngo->user_name.'/donate') }}">Donate</a> </li>  -->
					<?php if (session()->get('knpuser') && $ngo->user == $user->id) { ?> 
			                     	<li><a href="{{ url('ngo/'.$ngo->user_name.'/edit') }}">Edit</a> </li>
			                    <?php } ?>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="term_condition_area">
	<div class="container-fluid">
		<div class="shortcode_modules boximagengo">
			<div class="tab tab3">
				<div class="item-navigation">
					<ul class="nav nav-tabs nav--tabs2">
						<li role="presentation" class="active">
							<a href="#product-details2" aria-controls="product-details2" role="tab" data-toggle="tab" aria-expanded="false" class="ngotext">
							<span class="lnr lnr-picture"></span> NGO Gallery
							</a>
						</li>
						&nbsp;&nbsp;&nbsp;
						<!--li role="presentation" class="">
							<a href="#product-comment3" aria-controls="product-comment3" role="tab" data-toggle="tab" aria-expanded="false" class="ngotext">
							<span class="lnr lnr-camera-video"></span> NGO Video
							</a>
						</li-->
					</ul>
				</div>
				<!-- end /.item-navigation -->
				<div class="tab-content">
					<div class=" tab-pane product-tab active" id="product-details2">
						<div class="row">
							<div class=" gal-container">
								@foreach ($gallery as $row)
								<div class="col-md-4 col-sm-12 co-xs-12 gal-itemread">
									<div class="gallery_btn_image box">
										<a href="#" data-toggle="modal" data-target="#1">
										<img src="{{ asset('storage/'.$row->image) }}">
										</a>
                                                                                <a href="{{url('ngo/'.$ngo->user_name.'/gallery-image-delete?rem='.$row->id)}}" class="gallery_btn btn btn-danger delete"><span class="lnr lnr-trash"></span></a>
										<div class="modal modalngo fade" id="1" tabindex="-1" role="dialog">
											<div class="modal-dialog mobilengo" role="document">
												<div class="modal-content">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
													<div class="modal-body">
														<img src="{{ asset('storage/'.$row->image) }}">
													</div>
													<div class="col-md-12 description">
														<h4>This is the first one on my Gallery</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
					<!-- end /.tab-content -->
					<div class="tab-pane product-tab" id="product-comment3">
						<div class="row">
							<div class="col-md-4 col-sm-6 co-xs-12 gal-item">
								<div class="testimonial_video">
									<figure>
										<img src="{{ asset('cdn/images/icon/kz.png') }}" alt="marketplace in kanpur">
										<figcaption class="video_play">
											<button data-toggle="modal" data-target="#myModal"><img src="{{ asset('cdn/images/vpla.png') }}" alt="online shopping in kanpur"></button>
										</figcaption>
									</figure>
								</div>
								<div class="modal fade testimonial_vid" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<iframe height="600" src="https://www.youtube.com/embed/mkstd-YiKcs" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 co-xs-12 gal-item">
								<div class="testimonial_video">
									<figure>
										<img src="{{ asset('cdn/images/icon/kz.png') }}" alt="marketplace in kanpur">
										<figcaption class="video_play">
											<button data-toggle="modal" data-target="#myModal"><img src="{{ asset('cdn/images/vpla.png') }}" alt="online shopping in kanpur"></button>
										</figcaption>
									</figure>
								</div>
								<div class="modal fade testimonial_vid" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<iframe height="600" src="https://www.youtube.com/embed/mkstd-YiKcs" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 co-xs-12 gal-item">
								<div class="testimonial_video">
									<figure>
										<img src="{{ asset('cdn/images/icon/kz.png') }}" alt="marketplace in kanpur">
										<figcaption class="video_play">
											<button data-toggle="modal" data-target="#myModal"><img src="{{ asset('cdn/images/vpla.png') }}" alt="online shopping in kanpur"></button>
										</figcaption>
									</figure>
								</div>
								<div class="modal fade testimonial_vid" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<iframe height="600" src="https://www.youtube.com/embed/mkstd-YiKcs" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end /.product-comment -->
				</div>
				<!-- end /.tab-content -->
			</div>
		</div>
	</div>
</section>
<style>
.gallery_btn {
    position: absolute;
    top: 8%;
    left: 91%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    font-size: 16px;
    padding: 12px 24px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
}
.gallery_btn_image{ position: relative;
    
    }
</style>
@stop
@section ('footer')
@parent
<script>
$(document).on('click','.delete',function(e) {
	e.preventDefault();
	$(this).parent().parent().remove();
	var hrf = $(this).attr('href');
	$.ajax({
	      	url: hrf,
	  	type:"GET",
	  	data:'',
	  	success: function(data){
	    		
	  	}
	});
});
</script>
@stop