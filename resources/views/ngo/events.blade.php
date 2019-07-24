@extends('layout')
@section('title', $title)
@section('content')
<section class=" normal-padding1 breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="page-title">{{$ngo->ngo_name}}</h1>
			</div>
			<div class="col-md-6">
				<ul class="navtab">
					<li><a href="{{ url('ngo/'.$ngo->user_name.'/home') }}">Home </a> </li>
					<li><a href="{{ url('ngo/'.$ngo->user_name.'/gallery') }}">Gallery </a> </li>
					<li><a href="{{ url('ngo/'.$ngo->user_name.'/events') }}">Event </a> </li>
					<li><a href="{{ url('ngo/'.$ngo->user_name.'/causes') }}">Causes </a> </li>
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
	<div class="container">
		<div class="row">
			@foreach($events as $row)
			<div class="col-md-4">
				<div class="card_style1">
					<figure class="card_style1__info card_style1__info1">
						<div class="cours2" style="overflow:hidden;">
							<img class="hoverimgevent img-responsive" src="{{asset("storage/$row->image")}}" />
							<div class="cours4 text-center">
								<a href="{{url('event/'.$row->url)}}" target="_blank" class="cou btn btn-md btn--round" >View More</a>
							</div>
						</div>
						<figcaption class="upeventtop">
							<div class="row">
								<div class="col-sm-4 col-xs-4">
									<div class="inline eventpost_dropdown">
										<a href="#" id="drop2" class="btn_padding_none dropdown-trigger btn btn-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<em class="fa fa-ellipsis-v"></em>
										</a>
										<ul class="event_li_drop dropdown messaging_dropdown dropdown-menu" aria-labelledby="drop2">
											<li><a href="#" data-toggle="modal" data-target="#event_edit_popup"><span class="lnr lnr-inbox"></span>Event Edit</a></li>
											<li class="divider"></li>
											<li><a href="#" data-toggle="modal" data-target="#event_delete_popup"><span class="fa fa-star-o"></span>Event Delete</a></li>
											<li class="divider"></li>
										</ul>
									</div>
								</div>
								<div class="col-sm-8 col-xs-8">
									<ul class="date_place">
										<li>
											<span class="lnr lnr-calendar-full"></span>
											<p>{{date_format(date_create($row->from_date), 'M d')}} - {{date_format(date_create($row->upto_date), 'M d')}} {{date_format(date_create($row->from_date), 'Y')}}</p>
										</li>
										<!--li>
											<span class="lnr lnr-map-marker"></span>
											<p>Kanpur</p>
											</li-->
									</ul>
								</div>
							</div>
							<a href="{{url('event/'.$row->url)}}" target="_blank">
								<h3 class="upevent">{{$row->title}}</h3>
							</a>
						</figcaption>
					</figure>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<div class="gal-container nopadding">
	<div class="col-md-12 col-sm-12 co-xs-12">
		<div class="boximg formseller">
			<div class="modal modalngo fade" id="event_edit_popup" tabindex="-1" role="dialog">
				<div class="modal-dialog mobilengo" role="document">
					<div class="modal-content popupsize1">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<div class="modal-body pupopzoom">
							<div class="boxed-body signin-area">
								<form class="form-horizontal" method="POST">
									<div class="widgetngo__heading">
										<h4 class="widgetngo__title">Event <span class="base-color">Edit</span></h4>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<strong>Tittle</strong>
											<input type="text" id="event_title" name="event_title" value="" placeholder="Enter the tittle" />
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6 col-xs-12">
											<strong> Start date&nbsp;</strong>
											<input type="text" id="datepicker1" value="" name="date1" placeholder="Click for select date" />
										</div>
										<div class="span1"></div>
										<div class="col-md-6 col-xs-12">
											<strong> End date&nbsp;</strong>
											<input type="text" id="datepicker2" value="" name="date2" placeholder="Click for select date" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<strong>Event Description  </strong>
											<textarea cols="30" rows="3" placeholder="Yout text here" name="event_des"></textarea>
										</div>
									</div>
									<div class="">
										<button type="submit" class="btn btn-md"><span class="lnr lnr-pencil"></span>&nbsp; Edit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="gal-container nopadding">
	<div class="col-md-12 col-sm-12 co-xs-12">
		<div class="boximg formseller">
			<div class="modal modalngo fade" id="event_delete_popup" tabindex="-1" role="dialog">
				<div class="modal-dialog mobilengo" role="document">
					<div class="modal-content popupsize1">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<div class="modal-body pupopzoom">
							<div class="boxed-body signin-area">
								<form class="form-horizontal" method="POST">
									<div class="widgetngo__heading">
										<h4 class="widgetngo__title">Event <span class="base-color">Delete</span></h4>
									</div>
									<div class="" align="center">
										<button type="submit" class="btn btn-md"><span class="lnr lnr-chevron-left"></span>&nbsp; Back</button>
										<button type="submit" class="btn btn-md"><span class="lnr lnr-trash"></span>&nbsp; Delete</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	.eventpost_dropdown a{background: none;
	color: #0674ec !important;
	box-shadow: none;}
	.eventpost_dropdown a:hover:before{ opacity:0; color:#0674ec;}
	.eventpost_dropdown a:hover{ color:#0674ec;}
	.eventpost_dropdown a em{ font-size:28px;}
	.event_li_drop{ min-width:180px !important; left: 3px;
	margin-top: 7px; padding:10px !important;
	}
	.btn_padding_none{ padding:0px !important;line-height: 19px !important;}
	.date_place li span{ font-size:17px !important;}
	.date_place li p{ font-size:14px !important;}
	.date_place li{ float:right;}
</style>
@stop