<div class="box-footer box-comments comment-section" style="display: block;">
	<input type="hidden" class="comment-date" name="date" value="{{ date('Y-m-d-H-i-s') }}">
	@foreach ($comments as $row)
	<div class="box-commentreply">
		<a href="{{url('social/profile/'.$row->username)}}"><img class="img-circle img-sm" src="{{asset('storage/'.$row->profile_image)}}" alt="{{$row->name.' '. $row->lname}}"></a>
		<div class="comment-text">
			<p style="">
				<span class="namemsg"><strong>{{$row->name.' '. $row->lname}}</strong>&nbsp;{{$row->comment}}
				</span>
			</p>
			<span class="text-mutedr pull-left"><a class="textreply">Reply</a></span>
			<span class="text-mutedr pull-right">{{date_format(date_create($row->cr_date),'d M, Y h:i A')}}</span>
		</div>
	</div>
	<div class="box-footer textarearounded box-commentreply">
		<div class="comment-text">
			<input class="form-control border no-shadow" placeholder="Type your message here" />
		</div>
	</div>
	@endforeach
</div>
<div class="box-footer" style="display: block;">
	<form method="post" class="comment" autocomplete="off">
		{{ csrf_field() }}
		<input type="hidden" name="post" value="{{ $post }}">
		@if (!empty($user->profile_image))
		<img class="img-responsive img-circle img-sm" src="{{ asset('storage/'.$user->profile_image) }}" alt="Alt Text">
		@else 
		<img class="img-responsive img-circle img-sm" src="{{ asset('cdn/images/back/food.jpg') }}" alt="Alt Text">
		@endif
		<div class="img-push">
			<input type="text" name="comment" class="form-control comment" placeholder="Press enter to post comment">
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
	    $(".textreply").click(function(){
	        $(this).parent().parent().parent().next('.textarearounded').show();
	    });
	});
</script>