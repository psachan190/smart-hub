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
<div class="container-fluid normal-padding">
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<div class="form-group pull-left">
					<input type="text" class="searchProducts form-control" placeholder="What you looking for?">
				</div>
				<table class="table table-bordered table-filter" style="padding:20px !important;" id="productsTableList">
					<thead>
						<tr>
							<th colspan="7"><a href="{{ url("vendor/$vendorData->username/coupon-create") }}"><i class="fa fa-plus"></i> 
 Generate Coupons</a></th>
						</tr>
						<tr>
							<th>Image</th>
							<th>Coupon Name</th>
							<th>Quantity</th>
							<th>Issued</th>
							<th>Availability</th>
							<th>Expiry</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($coupons as $row)
						<tr>
							<td><img src="{{asset('storage/'.$row->image)}}" style="height:50px; width:50px;"></td>
							<td width="200px">{{$row->coupon_name}}</td>
							<td>{{$row->quantity}}</td>
							<td>{{$row->issued}}</td>
							<td>{{date_format(date_create($row->started_from), "M d, Y")}}</td>
							<td>{{date_format(date_create($row->expiry_date), "M d, Y")}}</td>
							<td>
								<a href="{{ url("vendor/$vendorData->username/coupon-list?q=$row->id") }}" data-toggle="tooltip" title="" class="btn btn-sm btn-success" data-original-title="List of Coupons"><span class="lnr lnr-inbox"></span></a>
								@if ($row->current_status == 'Y')
									<a href="{{ url("vendor/$vendorData->username/coupons?c=$row->id") }}" data-toggle="tooltip" title="" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to close the coupon?')" data-original-title="Close Now"><span class="lnr lnr-trash"></span></a>
								@endif
								<!--a href="#" data-toggle="tooltip" title="" class="btn btn-sm" data-original-title="Edit"><span class="lnr lnr-pencil"></span></a>
								
								<a href="#" data-toggle="tooltip" title="" class="moreimagesadd btn btn-sm btn-warning" data-original-title="Add MoreImage"><span class="lnr lnr-paperclip"></span></a>
								<button class="btn btn-sm btn-danger trashProducts" id="56" data-toggle="tooltip" title="" data-original-title="Add MoreImage"><span class="lnr lnr-trash"></span></button-->
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop
@section('footer')
@parent 
<script src="{{ asset('cdn/js/matrimonial.js')}}"></script>
@stop