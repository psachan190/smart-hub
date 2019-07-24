@extends("layout")
@section('content')
<section class="breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumb">
					<ul>
						<li><a href="#">Home</a></li>
						<li class="active"><a href="#">All Coupon</a></li>
					</ul>
				</div>
				<h1 class="page-title">All Coupon</h1>
			</div>
		</div>
		<!-- end /.row -->
	</div>
	<!-- end /.container -->
</section>
<section class="normal-padding">
	<div class="container-fluid">
		@foreach ($coupons as $row)
		<div class="col-md-3">
			<div class="testimonial testmonialbox">
				<div class="deal-item-wrapper testabout">
					<div class="card-deal">
						<div class="card-deal-inner">
							<div class="deal-thumb-image">
								<a class="redeam" href="{{url('action/redeam-coupon/'.$row->id)}}">
                	<!--div class="discount-ribbon">30%</div -->
									<div class="btn-card-deal"><i class="lnr lnr-cart"></i><span>Grab It Now</span></div>
									<img src="{{ asset('storage/'.$row->image) }}" alt="">
								</a>
							</div>
							<div class="card-deal-info">
								<h2 class="card-deal-title"><a href="http://subsolardesigns.com/couponhut/deal/weight-loss-fitness/"><!--[Print]--> {{$row->coupon_name}}</a></h2>
                <div class="card-deal-categories"><a href="">{{$row->vName}}</a></div>
								<div class="deal-prices">
									<div class="deal-save-price">
										<span>Available From:</span>
										{{date_format(date_create($row->started_from), "d M")}}				
									</div>
									<div class="deal-save-price">
										<span>Expires On:</span>
										{{date_format(date_create($row->expiry_date), "d M")}}			
									</div>
								</div>
								<!-- Expiring -->
								<div class="card-deal-meta-expiring">
									<span class="jscountdown-wrap" >
		Grab in next</br> {{date_diff(date_create(date("Y-m-d")),date_create(substr($row->available_upto, 0, 10)))->format("%a days")}} only
									</span>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		@endforeach
	</div>
</section>
@stop
@section('footer')
@parent
<script>
$(document).on('click','.redeam',function(e) {
	e.preventDefault();
	$(this).find('.btn-card-deal').css("background-color","green");
	$(this).find('.btn-card-deal').children('span').html("Redeamed");
	var url = $(this).attr('href');
	$.ajax({
           	type: "GET",
           	url: url,
           	data: '', // serializes the form's elements.
           	success: function(data) {
           		
           	}
	});
});
</script>
@stop