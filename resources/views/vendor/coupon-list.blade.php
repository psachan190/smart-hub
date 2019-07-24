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
							<th colspan="6"><a href="{{ url("vendor/$vendorData->username/coupons") }}"><i class="fa fa-chevron-left"></i> 
 Go Back</a></th>
						</tr>
						<tr>
							<th>Coupon No</th>
							<th>Image</th>
							<th>User Name</th>
							<th>Date</th>
							<th>Used On</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($coupons as $row)
						<tr>
							<td>{{$row->coupon_no}}</td>
							<td><img src="{{asset('storage/'.$row->profile_image)}}" style="height:70px; width:70px;"></td>
							<td width="200px">{{$row->name.' '.$row->lname}}</td>
							<td>{{date_format(date_create($row->alloted_date), "M d, Y")}}</td>
							<td>@if(!($row->used_date == "0000-00-00 00:00:00")){{date_format(date_create($row->used_date), "M d, Y")}}@endif</td>
							<td>
								@if ($row->current_status == 'N')
								<a href="{{ url("vendor/$vendorData->username/coupon-list?q=$row->coupon&r=$row->id") }}" data-toggle="tooltip" title="" class="btn btn-sm btn-info" data-original-title="Mark Used">Mark Used   <span class="lnr lnr-inbox"></span></a>
								@elseif ($row->current_status == 'Y') 
								<a href="#" data-toggle="tooltip" title="" class="btn btn-sm btn-success" data-original-title="Used">Used</a>
								@else 
								<a href="#" data-toggle="tooltip" title="" class="btn btn-sm btn-danger" data-original-title="Expired">Expired</a>
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
@stop
@section('footer')
@parent 
<script src="{{ asset('cdn/js/matrimonial.js')}}"></script>
@stop