@extends('layout')
@section('title', $title)
@section('content')
<section class="bgimage">
	<div class="bg_image_holder">
		<img src="{{ asset('cdn/images/indexback.png') }}" alt="marketplace in kanpur">
	</div>
	<div class="hero-content hero-content1 content_above">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
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
				<form action="{{url('vendor/create_new')}}" method="POST" autocomplete="off">
				{{csrf_field()}}
					<div class="cardify login minummargin">
						<div class="login--header">
							<h3>Create your Shop on Kanpurize</h3>
						</div>
						<div class="login--form">
							<div class="form-group">
								<label for="user_name"> Shop Name </label>
								<input type="text" name="shopname"] value="{{old('shopname')}}" placeholder="Enter your shopname" required autofocus>
							</div>
							<div class="widgetngo__heading">
								<h4 class="widgetngo__title">What you want <span class="base-color">sale?</span></h4>
							</div>
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<img src="{{ asset('cdn/images/icon/goods.png') }}" class="img-responsive caticon">
									<div class="custom-radio radioright">
										<input type="radio" id="opt1" class="type" name="shoptype" value="1" checked="checked">
										<label for="opt1"><span class="circle"></span>Goods</label>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<img src="{{ asset('cdn/images/icon/service.png') }}" class="img-responsive caticon">
									<div class="custom-radio radioright">
										<input type="radio" id="opt2" class="type" name="shoptype" value="2">
										<label for="opt2"><span class="circle"></span>Services</label>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<img src="{{ asset('cdn/images/icon/both.png') }}" class="img-responsive caticon">
									<div class="custom-radio radioright">
										<input type="radio" id="opt3" class="type" name="shoptype" value="3">
										<label for="opt3"><span class="circle"></span>both</label>
									</div>
								</div>
							</div></br>
							<div class="widgetngo__heading">
								<h4 class="widgetngo__title">Select the <span class="base-color">category</span></h4>
							</div>
							<div class="row category">
							<?php $i = 1; ?>
							@foreach($category as $row)
								<div class="custom_checkbox col-md-3">
									<input type="checkbox" id="{{$i}}" name="category[]" value="{{$row->id}}">
									<label for="{{$i}}"><span class="shadow_checkbox"></span><span class="radio_title catnamebox">&nbsp;{{$row->category_name}}</span></label>
								</div>
								<?php $i++; ?>
							@endforeach
							</div>
							<div class="form-group btnmargin">
								<button class="btn btn--md btn--round pull-right" type="submit">Create</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-1">
			</div>
		</div>
	</div>
</section>
@stop
@section('footer')
@parent
<script>
$(document).ready(function(e) {
 $.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
	$(".type").click(function(){
	  	var val = $(this).val();
	      	$.ajax({
	       	url: "{{url('vendor/kanpurize/action/category')}}",
	      	type: "GET",        
	      	data: 'type=' + val + '&_token={{csrf_field()}}',  
	      	success: function(data){
		    	$('.category').html(data);						
		}	
	     });
  });
});
  </script>
@stop