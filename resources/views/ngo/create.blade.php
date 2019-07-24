@extends('layout')

@section('title', $title)
@section('content')
<section class="event_area evetsection">
   <div class="row" id="ngobackcolor">
      <div class="container">
         <div class="col-md-6">
                @if(session()->has('success'))
		    	<div class="modules__contentalert">
                            <div class="alert alert-success" role="alert">
                            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span class="lnr lnr-cross" aria-hidden="true"></span>
                                </button>
                                <span class="alert_icon lnr lnr-checkmark-circle"></span> <strong>Your account has been  created successfully.</strong>
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
         </div>
         <div class="col-md-6">
            <div class="information_module activebody">
               <a class="toggle_title">
                  <h4>NGO Details</h4>
               </a>
               <form id="profileNGO" method="POST" action="<?php echo url('ngo/new_create'); ?>" autocomplete="off">
               <?php echo csrf_field(); ?>
                  <div class="information__set toggle_module collapse in" id="collapse2" aria-expanded="true">
                     <div class="information_wrapper form--fields row">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                           <div class="col-sm-12">
                              <label for="name">Name: <sup>*</sup></label>
                              <input type="text" id="" name="name" class="text_field" placeholder="Organization/Foundation Name" value="{{ old('name')}}" />
                              <small class="text-danger">{{ $errors->first('name') }}</small>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-12">
                              <label for="email">Email: <sup>*</sup></label>
                              <input type="text" id="email" name="email" class="text_field" placeholder="Organization E-mail" value="{{ old('email')}}"/>
                               <small class="text-danger" id="emailErr">{{ $errors->first('email') }}</small>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-6">
                              <label for="contact">Contact No.</label>
                              <input type="text" id="contact" name="contact" class="text_field" placeholder="Organization Contact" value="{{ old('contact')}}"/>
                             <small class="text-danger" id="contactErr">{{ $errors->first('contact') }}</small>
                           </div>
                           <div class="col-sm-6">
                              <label for="username">Username: <sup>*</sup></label>
                              <input type="text" id="username" name="username" class="text_field" placeholder="Username" value="{{ old('username')}}"/>
                             <small class="text-danger" id="usernameErr">{{ $errors->first('username') }}</small>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-6">
                              <button class="btn btn-md btn--round" type="submit" name="submit" id="submitNgo">Create</button>
                           </div>
                           <div class="col-sm-6">
                              <a class="btn btn-md btn--round btn-secondary buttonngoleft" href="{{url('ngos')}}">Go To Back</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         
      </div>
   </div>
</section>
@stop
