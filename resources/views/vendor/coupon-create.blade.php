@extends("layout")
@section('content')
<section class=" normal-padding1 breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="page-title">Coupon</h1>
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
									<h4 class="widgetngo__title">Create Your <span class="base-color">Coupon</span>
									<a style="color:red;" href="{{url('vendor/'.$vendorData->username.'/coupons')}}"> Click here</a> to go back.</h4>
									</h4>
								</div>
								@if (session()->has('success'))
								<div class="alert alert-success">
								  <strong>Success!</strong> {{ session()->get('success') }}
								</div>
								@elseif (session()->has('errors'))
								<div class="alert alert-danger">
								  <strong>Oops!</strong> {{ session()->get('errors') }}
								</div>
								@endif
								<form method="post" class="form-horizontal" action="{{url('vendor/coupon-create')}}" id="talent_registerForm" enctype="multipart/form-data" autocomplete="off">
									{{csrf_field()}}
									<div class="col-sm-8">
										<div class="form-group">
											<div class="col-sm-6">
												<label> Name </label>
												<input type="hidden" name="vendor" value="{{$vendorData->id}}" required="required"/>
												<input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Name" required="required"/>
												{{ $errors->first('name') }}
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-6">
												<label> Quantity </label>
												<input type="number" id="qty" value="{{ old('quantity') }}" name="quantity" placeholder="Quantity" required="required"/>
											</div>
											<div class="col-sm-6">
												<label> Per user (Allowed quantity) </label>
												<input type="number" id="allowed" value="{{ old('allowed') }}" name="allowed" placeholder="Allowed Quantity" required="required"/>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-6">
												<label> Lanching Date </label>
												<input type="text" value="{{ old('available-date') }}" id="datepicker1" name="available-date" placeholder="Launching Date" required="required"/>
											</div>
											<div class="col-sm-6">
												<label> Closed on </label>
												<input type="text" value="{{ old('closedon') }}"  id="datepicker2" name="closedon" placeholder="Closed On" required="required" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-6">
												<label> Available From </label>
												<input type="text" id="datepicker3" value="{{ old('aform') }}"  id="afrom" name="afrom" placeholder="Available From" required="required"/>
											</div>
											<div class="col-sm-6">
												<label> Expiry Date </label>
												<input type="text" value="{{ old('expdate') }}" id="datepicker4" name="expdate" placeholder="Expiry Date" required="required"/>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-12">
												<label>Coupon Description</label>
												<textarea type="text" value="{{ old('description') }}" name="description" placeholder="Coupon Description (Uses terms and Conditions)"></textarea>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<div class="main-coupon-preview">
												<img class="thumbnail coupon-preview" src="{{ asset('cdn/images/icon/coupon.jpg') }}" title="Preview Logo">
											</div>
											<div class="input-group">
												<input id="couponLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
												<div class="input-group-btn">
													<div class="fileUpload_coupon btn btn-md fake-shadow">
														<span><span class="lnr lnr-upload"></span> Upload Coupon</span>
														<input id="Coupon-id" name="image" type="file" class="attachment_upload">
													</div>
												</div>
											</div>
											<p class="help-block">* Upload your Coupon.</p>
										</div>
									</div>
									<div class="row margin_div">
										<div class="col-sm-8">
											<div class="form-group pull-right">
												<div class="col-sm-12">
													<span id="personalResponse"></span>
													<a id="reset_talent" class="btn btn-sm btn--icon"><span class="lnr lnr-plus-circle" href="{{url('vendor/'.$vendorData->username.'/coupon-create')}}"></span> Reset</a>
													<button name="submit" type="submit" id="save_talent" class="btn btn-sm btn--icon"><span class="lnr lnr-plus-circle"></span> Save</button>
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
		</div>
	</div>
	</div>
</section>
@stop
@section('footer')
@parent
<script>$(document).ready(function() {
	var brand = document.getElementById('Coupon-id');
	brand.className = 'attachment_upload';
	brand.onchange = function() {
	    document.getElementById('couponLogo').value = this.value.substring(12);
	};
	
	// Source: http://stackoverflow.com/a/4459419/6396981
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        
	        reader.onload = function(e) {
	            $('.coupon-preview').attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$("#Coupon-id").change(function() {
	    readURL(this);
	});
	});
</script>
<style></style>
@stop