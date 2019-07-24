@extends('newAdmin.template.layout')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard v2</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fa fa-plus"></i></span>
						<div class="info-box-content">
							<a href="{{url('admin/event-new')}}">
							<span class="info-box-text">New Events</span>
							<span class="info-box-number">
							Upload
							<small>Events</small>
							</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Add New Events</h5>
							<div class="card-tools">
								<a href="{{url('admin/event-new')}}" class="btn btn-primary" id="addMore">
								<i class="fa fa-plus-circle"></i>&nbsp; New Events
								</a>
							</div>
						</div>
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Title</th>
										<th>Uploaded On</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($events as $row)
									<tr>
										<td>{{$row->title}}</td>
										<td>{{date_format(date_create($row->created_at), 'd M, Y')}}</td>
										<td> 
										@if($row->status == 'Y') Published
										@else On hold @endif
										</td>
										<td>
										@if($row->status == 'Y')
										<a onclick="return confirm('Are you sure to block?')" href="{{url('admin/events?rem='.$row->id)}}" class="btn btn-danger">
											<i class="fa fa-times" aria-hidden="true"></i>
										</a>&nbsp;
										@else 
										<a onclick="return confirm('Are you sure to approve?')" href="{{url('admin/events?app='.$row->id)}}" class="btn btn-success">
											<i class="fa fa-check" aria-hidden="true"></i>
										</a>&nbsp;
										@endif
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@stop