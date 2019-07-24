@if(Session::get('knpuser'))
<style>
.dropdown li a span {
	float: left !important;
}
</style>
<div class="inline">
	<a href="#" id="drop2" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		<div class="icon_wrap">
			<?php $count = 0; foreach ($notifications as $row) { if ($row->seen == 'N') $count++; } ?>
			<span class="lnr lnr-alarm"></span> @if ($count != 0)<span class="notification_count noti"> {{$count }}</span>@endif
		</div>
	</a>
	<ul class="notidropdown normal-padding dropdown dropdown-menu" aria-labelledby="drop2">
		<div class="row margin_div">
			<div class="col-xs-9 padding_div">
				<p> Notifications</p>
			</div>
			<div class="col-xs-3 padding_div">
				<a href="#">View All</a>
			</div>
		</div>
		<hr class="alignbottom">
		@foreach ($notifications as $row)
		<li>
		    <div class="row notification__info">
		        <div class="col-xs-2 padding_div info_avatar">
		        	@if ($row->image == '') 
		        	<?php $image = 'male.png'; ?>
		        	@else 
		        	<?php $image = $row->image; ?>
		        	@endif
		            	<img src="{{ asset('storage/'.$image) }}" alt="">
		        </div>
		        <div class="col-xs-10 padding_div info">
		            <?php echo $row->content; ?>
		        </div>
		    </div>
		</li>
		@endforeach
	</ul>
</div>
@endif