<div class="row">
	@foreach ($coupons as $row)
	<div class="testimonial testmonialbox col-md-3">
		<div class="deal-item-wrapper testabout">
			<div class="card-deal">
				<div class="card-deal-inner">
					<div class="deal-thumb-image">
						<a class="redeam" href="{{url('action/redeam-coupon/'.$row->id)}}">
							<img src="{{ asset('storage/'.$row->image) }}" class="img img-responsive">
						</a>
					</div>
					<div class="card-deal-info">
						<h2 class="card-deal-title"><!--[Print]--> {{$row->coupon_name}} <b class="pull-right" style="color:green;">{{$row->coupon_no}}</b></h2>
						<div class="card-deal-categories"><a href="">{{$row->vName}}</a></div>
						<div class="deal-prices">
							<div class="deal-save-price">
								<span>On:</span>
								{{date_format(date_create($row->started_from), "d M")}}				
								</br>
								<span>Upto:</span>
								{{date_format(date_create($row->expiry_date), "d M")}}			
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
	@endforeach
</div>
<center><?php 
	$links = $coupons->links();
	$links = str_replace("<a", "<a class='coupon-pages' ", $links);
	echo $links; 
?></center>