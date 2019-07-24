@extends('layout')
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/conect.css') }}"/>
<link rel="stylesheet" href="{{ asset('cdn/css/message.css') }}"/>
<link rel="stylesheet" href="{{ asset('cdn/css/jquery.fancybox.min.css') }}"/>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>  
@stop
@section('content')
<section class="products">
	<div class="container-fluid page-content">
		<div class="row">
        	<div class="col-md-1 padding_div"></div>
        	<div class="col-md-9 col-xs-12 padding_div">
					<span class="bg-picture-overlay"></span><!-- overlay -->
					<div class="col-md-12">
						<div class="bg-picture">
							<div class="row">
								@if(!empty($profile->cover_image) && file_exists('storage/'.$profile->cover_image))
								<img src="{{ asset('public/storage/'.$profile->cover_image) }}" id="cover_image">
								@else
								<img src="https://www.kanpurize.com/public/storage/aae7b928b8dda9bc541b5d7175437306.jpg" id="cover_image">
								@endif
								<img id='img-upload' class="img-responsive"/>
							</div>
							<span class="bg-picture-overlay"></span><!-- overlay -->
							<!-- meta -->
							<div class="box-layout meta bottom">
								<div class="col-md-6 col-sm-6 col-xs-7 clearfix smallmargin">
									<span class="img-wrapper pull-left m-r-15">
										@if(!empty($profile->profile_image) && file_exists('storage/'.$profile->profile_image) && $profile->profile_image != 'male.png')
										<img src="{{ asset('public/storage/'.$profile->profile_image) }}" id="profile_image" class="br-radius imageprsocial img-responsive">
										@else
										<p data-letters="{{substr($profile->name,0,1)}}"></p>
										@endif
										@if($profile->id == $user->id)
										<div class="middleprofile custom_upload">
											<form class="profile_image_form" id="profileImageForm">
												{{csrf_field() }}
												<label for="profile">
												<span class="textprsocial btn btn-sm btn-sm1"><span class="lnr lnr-camera covercolor"></span><input type="file" id="profile" name="profile_image" class="files"></span>
												</label>
											</form>
										</div>
										@endif
									</span>
									<div class="media-body">
										<h5 class="text-white1">{{$profile->name}}</h5>
										<h4 class="text-white2">{{"@".$profile->username}}</h4>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-5 smallmargin">
									<div class="btnsocialpr custom_upload">
										@if($profile->id == $user->id)
										<form class="cover_image_form" id="coverImageForm">
											{{csrf_field() }}
											<label for="thumbnail">
											<input type="file" name="cover_image" id="thumbnail" class="files">
											<span class="colorbuttoncss btn btn-sm btn-sm1" data-toggle="tooltip" title="Upload Cover Photo"><span class="lnr lnr-camera covercolor"></span></span>
											</label>
											<!--a class="colorbuttoncss btn btn-sm btn-sm1" href="{{url('social/message')}}" data-toggle="tooltip" title="Message"><span class="lnr lnr-bubble covercolor"></span></a>
								                                            <a class="colorbuttoncss btn btn-sm btn-sm1" href="{{url('social/message')}}" data-toggle="tooltip" title="Add Friend"><span class="lnr lnr-users covercolor"></span></a -->
								                                            <!--div class="btn-group" >
								                                                    <a class="btn btn-default shinydrop1  dropdown-toggle shiny" data-toggle="dropdown" href="#" aria-expanded="false"><span class="textpoint">...</span></a>
								                                                    <ul class="dropboxsize-set dropdown-menu  dorpfreadd">
												                            <li>
												                                <a href="#">Send Message</a>
												                            </li>
												                            <li>
												                                <a href="#">Close Friend</a>
												                            </li>
												                            
												                            <li class="divider"></li>
												                            <li>
												                                <a href="#">Get Notification</a>
												                            </li>
												                        </ul>
								                                           	</div-->
										</form>
										@else
										<a class="btn btn-sm btn-sm1" href="{{url('social/message/'.$profile->username)}}"><span class="lnr lnr-bubble"></span> Message</a>
										
										@endif
									</div>
								</div>
							</div>
							<!--/ meta -->
						</div>
					</div>
                </div>
            <div class="col-md-2 padding_div"></div>
            </div>
	</div>
    <div class="container-fluid">
           <div class="row">
            <div class="col-md-1 padding_div"></div>
            <div class="col-md-9 col-xs-12 padding_div">
					<!-- Nav tabs -->
					<ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom profile-tabs">
						<li role="presentation"><a href="{{url('social')}}">News Feed</a></li>
						<li role="presentation"><a class="prof-tab" href="{{url('social/profile/'.$profile->username.' #timeline')}}">Timeline</a></li>
						<li role="presentation"><a class="prof-tab" href="{{url('social/about/'.$profile->username.' #timeline')}}">About</a></li>
						<li role="presentation"><a class="prof-tab" href="{{url('social/friends/'.$profile->username.' #timeline')}}">Friends</a></li>
						<li role="presentation"><a class="prof-tab" href="{{url('social/photos/'.$profile->username.' #timeline')}}">Photos</a></li>
                                                
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<!-- Timeline -->
						<div role="tabpanel" class="tab-pane active" id="timeline">
                        	<div class="">
								<div class="col-md-5 padding_div1">
									<div class="widget">
										<div class="widget-header">
											<h3 class="widget-caption">About</h3>
										</div>
										<div class="widget-body bordered-top bordered-sky">
											<ul class="list-unstyled profile-about margin-none">
												<li class="padding-v-5">
													<div class="row">
														<div class="col-sm-4"><span class="text-muted">Date of Birth</span></div>
														<div class="col-sm-8">{{date_format(date_create($profile->birthday), "d M Y")}}</div>
													</div>
												</li>
												<!--li class="padding-v-5">
													<div class="row">
														<div class="col-sm-4"><span class="text-muted">Job</span></div>
														<div class="col-sm-8">Ninja developer</div>
													</div>
												</li -->
												<li class="padding-v-5">
													<div class="row">
														<div class="col-sm-4"><span class="text-muted">Gender</span></div>
														<div class="col-sm-8">
															@if($profile->sex == 0)
															Male
															@elseif ($profile->sex == 1)
															Female
															@endif
														</div>
													</div>
												</li>
												<li class="padding-v-5">
													<div class="row">
														<div class="col-sm-4"><span class="text-muted">About</span></div>
														<div class="col-sm-8">
															<p style="text-align: justify;">
															{{substr($profile->about, 0, 100)}}
															<a class="prof-tab" href="{{url('social/about/'.$profile->username.' #timeline')}}">Know more</a>
															</p>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="widget widget-friends">
										<div class="widget-header">
											<h3 class="widget-caption">Friends</h3>
										</div>
										<div class="widget-body bordered-top  bordered-sky">
											<div class="row">
												<div class="img-grid">
													<?php $i = 1; ?>
													@foreach ($friends as $row)
													@if ($i >= 9) 
														<?php break; ?>
													@endif
													<div class="col-sm-3 col-xs-3 project-hover">
														<a href="{{url('social/profile/'.$row->username)}}">
															@if(!empty($row->profile_image))
															<img style="width:89px;height:89px;"  src="{{ asset('public/storage/'.$row->profile_image) }}">
															@else
															<p data-letters="{{ucfirst(substr($row->name,0,1))}}"></p>
															@endif
															<div class="text-view transition text-center">
																<h3>{{$row->name}}</h3>
															</div>
														</a>
													</div>
													<?php $i++; ?>
													@endforeach
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-7 padding_div1">
									<div class="box profile-info n-border-top">
										<form class="new-post" method="POST">
											{{ csrf_field() }}
											<textarea class="content-raw form-control input-lg p-text-area" rows="2" placeholder="Share something ..."></textarea>
											<img id="pic1image" alt="your image" style="display: none" />
											<input type="hidden" name="content" class="contentor" value="">
											<div class="box-footer box-form">
                                            							<ul class="nav nav-pills pull-right">
													<li><label><span class="lnr lnr-camera buttondefault"></span><input id="pic1" type="file" name="images[]" multiple></label></li>
												</ul>
												<button type="submit" class="btn btn--round btn-md posthideimage"><span class="lnr lnr-thumbs-up"></span> Post</button>
											</div>
										</form>
									</div>
									<div id="posts">
									@include('social.component.post', array('posts' => $posts))
									</div>
								</div>
						        </div>
						</div>
					</div>
			</div>
			<div class="col-md-2 padding_div"></div>
	    </div>
    </div>
</section>
  
@include('social.common')
@stop
@section('footer')
@parent
<script src="{{ url('cdn/js/jquery.fancybox.min.js') }}"></script>
<script src="{{url('cdn/js/social.js')}}"></script>
@stop