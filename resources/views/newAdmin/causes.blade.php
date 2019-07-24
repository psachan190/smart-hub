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
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Causes/h5>
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
									@foreach($causes as $row)
									<tr>
										<td>{{$row->title}}</td>
										<td>{{date_format(date_create($row->created_at), 'd M, Y')}}</td>
										<td> 
										@if($row->status == 'Y') Published
										@else On hold @endif
										</td>
										<td>
										<a target="_blank" href="{{url('cause/'.$row->url)}}" class="btn btn-primary">
											<i class="fa fa-eye" aria-hidden="true"></i>
										</a>&nbsp;
										@if($row->status == 'Y')
										<a onclick="return confirm('Are you sure to block?')" href="{{url('admin/causes?rem='.$row->id)}}" class="btn btn-danger">
											<i class="fa fa-times" aria-hidden="true"></i>
										</a>&nbsp;
										@else 
										<a onclick="return confirm('Are you sure to approve?')" href="{{url('admin/causes?app='.$row->id)}}" class="btn btn-success">
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