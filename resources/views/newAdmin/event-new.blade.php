@extends('newAdmin.template.layout')
@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard v2</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<hr />
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Add New Events</h5>
							<div class="card-tools">
								<a href="{{url('admin/events')}}" class="btn btn-primary" id="addMore">
								<i class="fa fa-reply"></i>&nbsp; Go back
								</a>
							</div>
						</div>
						@if ($errors->any())
			         			<div class="alert alert-danger" role="alert">
			         				@foreach ($errors->all() as $error)
			                            			<strong>{{ $error }}</strong><br>
					            		@endforeach
					            	</div>
						@endif
						@if (session()->has('success'))
			         			<div class="alert alert-success" role="alert">
			                            		<strong>{{ session()->get('success') }}</strong><br>
					            	</div>
						@endif
						<div class="modal-body">
							<meta name="csrf-token" content="{{ csrf_token() }}" />
							<form method="post" action="{{url('admin/event')}}" enctype="multipart/form-data" name="authorityform">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<div class="form-group">
								<label>Enter Title</label>
								<input type="text" value="{{ old('title') }}" class="form-control" name="title">
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea type="text" name="description" value="{{ old('description') }}" placeholder="Enter the Description"></textarea>
							</div>
							<div class="form-group">
								<label>Select Image</label>
								<input type="file"class="form-control" value="{{ old('image') }}" name="image" required="">
							</div>
							<div class="form-group">
								<label>Select Start  date</label>
								<input type="text" class="form-control hasDatepicker" value="{{ old('date1') }}" id="datepicker1" name="date1" placeholder="Click for select date">
							</div>
							<div class="form-group">
								<label>Select End Date</label>
								<input type="text" class="form-control hasDatepicker" value="{{ old('date2') }}" id="datepicker2" name="date2" placeholder="Click for select date">
							</div>
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-check-circle"></i>&nbsp; Save
							</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@stop
@section('footer')
@parent
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=7bunbd8bkb0u5e2n0wnl5vo6jdhlltrwz5gihwpgj70x1tb4"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@stop