@extends('layout')
@section('title', $title)
@section('content')
<section class=" normal-padding1 breadcrumb-area">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <h1 class="page-title">{{$ngo->ngo_user}}</h1>
         </div>
         <div class="col-md-6">
         </div>
      </div>
   </div>
</section>
<section class="term_condition_area1">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="ngo_edit_background shortcode_modules">
               <div class="tab tab4 row">
                  <div class="item-navigation col-xs-12 col-sm-3">
                     <div class="navbar-header">
                        <button type="button" class="navbar-toggle navbar-toggle1 collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                        <span> -------- Menu -------- </span>
                        </button>
                     </div>
                     <div class="collapse navbar-collapse hiddennavline" id="bs-example-navbar-collapse-2">
                        <ul class="nav nav-tabs nav-tabs1 nav--tabs2">
                           <li role="presentation" class="active">
                              <a href="#tc5" aria-controls="tc5" role="tab" data-toggle="tab">
                              <span class="lnr lnr-home"></span> NGO Home
                              </a>
                           </li></br>
                           <li role="presentation">
                              <a href="#tc6" aria-controls="tc6" role="tab" data-toggle="tab">
                              <span class="lnr lnr-user"></span> Gallery
                              </a>
                           </li></br>
                           <li role="presentation">
                              <a href="#tc7" aria-controls="tc7" role="tab" data-toggle="tab">
                              <span class="lnr lnr-envelope"></span> Event
                              </a>
                           </li></br>
                           <li role="presentation">
                              <a href="#tc8" aria-controls="tc8" role="tab" data-toggle="tab">
                              <span class="lnr lnr-cog"></span> Cause
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="tab-content col-xs-12 col-sm-9">
                  	 @if(session()->has('success'))
			    	<div class="modules__contentalert">
	                            <div class="alert alert-success" role="alert">
	                            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                                    <span class="lnr lnr-cross" aria-hidden="true"></span>
	                                </button>
	                                <span class="alert_icon lnr lnr-checkmark-circle"></span> <strong>{{session()->get('success')}}</strong>
	                            </div>
	                        </div>
			@endif
	         	@if ($errors->any())
	         		<br><br><div class="modules__contentalert">
	         			<div class="alert alert-danger" role="alert">
	         				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                                    <span class="lnr lnr-cross" aria-hidden="true"></span>
		                                </button>
	                            		@foreach ($errors->all() as $error)
	                            			<span class="alert_icon lnr lnr-warning"></span><strong>{{ $error }}</strong><br>
			            		@endforeach
			            	</div>
			        </div>
			@endif
                     <div class="tab-pane fade in product-tab active" id="tc5">
                        <div class="thread">
                           <div class="widgetngo__heading">
                              <h4 class="widgetngo__title">NGO <span class="base-color">About</span></h4>
                           </div>
                           <form method="POST" action="{{url('ngo/'.$ngo->user_name.'/action/about')}}" enctype="multipart/form-data">
                           {{csrf_field()}}
                           	<div class="form-group">
                                 <label for="acname">Profile Image</label>
                                 <input name="image" type="file" placeholder="Update profile pic">
                              </div>
                              <div class="form-group">
                                 <label for="acname">About Us</label>
                                 <input type="hidden" name="type" value="about_us">
                                 <textarea type="text" name="content" placeholder="Enter the About us">{{$ngo->about_us}}</textarea>
                              </div>
                              <div class="form-group">
                                 <button class="btn btn-md btn--round" type="submit" name="submit" id="submit">Save</button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="tab-pane fade product-tab" id="tc6">
                        <div class="thread">
                           <div class="widgetngo__heading">
                              <h4 class="widgetngo__title">GALLERY <span class="base-color">MANAGEMENT</span></h4>
                           </div>
                           <form method="POST" action="{{url('ngo/'.$ngo->user_name.'/action/gallery')}}" enctype="multipart/form-data">
                           {{csrf_field()}}
                              <div class="col-md-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="file" name="image[]" multiple>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <div class="form-group">
                                    <button class="btn btn-md btn--round" type="submit" name="submit" id="submit">Save</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="tab-pane fade product-tab" id="tc7">
                        <div class="thread">
                           <div class="widgetngo__heading">
                              <h4 class="widgetngo__title">Event <span class="base-color">MANAGEMENT</span></h4>
                           </div>
                           <form method="POST" action="{{url('ngo/'.$ngo->user_name.'/action/event')}}" enctype="multipart/form-data">
                           {{csrf_field()}}
                              <div class="form-group">
                                 <strong>Tittle<span class="prafontanswerstar">*</span></strong>
                                 <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Enter the tittle" />
                              </div>
                              <div class="form-group">
                                 <strong>Description<span class="prafontanswerstar">*</span></strong>
                                 <textarea type="text" name="description" value="{{ old('description') }}" placeholder="Enter the Description"></textarea>
                              </div>
                              <div class="row">
                                    <div class="form-group">
                                    	<div class="col-md-6 col-xs-12">
                                           <input type="file" name="image" required>
                                       </div>
                                    </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-md-6 col-xs-12">
                                 	<div class="control-group">
                			<label class="control-label">Start Date Time </label>
				                <div class="controls input-append date form_datetime" data-date="2018-09-26T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
				                    <input size="16" type="text" value="" readonly>
				                    <span class="add-on"><i class="icon-remove"></i></span>
					            <span class="add-on"><i class="icon-th"></i></span>
				                </div>
						   <input type="hidden" id="dtp_input1" value="{{ old('date1') }}" name="date1" /><br/>
				        </div>
                                 </div>
                                  <div class="col-md-6 col-xs-12">
                                  	<div class="control-group">
                			<label class="control-label">End Date Time </label>
				                <div class="controls input-append date form_datetime" data-date="2018-09-26T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
				                    <input size="16" type="text" value="" readonly>
				                    <span class="add-on"><i class="icon-remove"></i></span>
					            <span class="add-on"><i class="icon-th"></i></span>
				                </div>
						   <input type="hidden" id="dtp_input1" value="{{ old('date2') }}" name="date2" /><br/>
				        </div>
                                 </div>
                               </div>
                              <div class="form-group">
                                 <button class="btn btn-md btn--round" type="submit" name="submit" id="submit">Save</button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="tab-pane fade product-tab" id="tc8">
                        <div class="thread">
                           <div class="widgetngo__heading">
                              <h4 class="widgetngo__title">CAUSES <span class="base-color">MANAGEMENT</span></h4>
                           </div>
                           <form method="POST" action="{{url('ngo/'.$ngo->user_name.'/action/cause')}}" enctype="multipart/form-data">
                           {{csrf_field()}}
                              <div class="form-group">
                                 <strong>Tittle<span class="prafontanswerstar">*</span></strong>
                                 <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Enter the tittle" />
                              </div>
                              <div class="form-group">
                                 <strong>Description<span class="prafontanswerstar">*</span></strong>
                                 <textarea type="text" name="description" value="{{ old('description') }}" placeholder="Enter the Description"></textarea>
                              </div>
                              <div class="row">
                                    <div class="form-group">
                                       <input type="file" name="image" required>
                                    </div>
                              </div>
                              <div class="form-group">
                                 <button class="btn btn-md btn--round" type="submit" name="submit" id="submit">Save</button>
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
</section>
@stop
@section('footer')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/datetimepicker.css') }}"/>
<script type="text/javascript" src="{{ asset('cdn/js/datetimepicker.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ asset('cdn/js/dateTime2.js')}}" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	
</script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=7bunbd8bkb0u5e2n0wnl5vo6jdhlltrwz5gihwpgj70x1tb4"></script>
<script>tinymce.init({ selector:'textarea' });</script>

@stop