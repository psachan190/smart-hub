<div class="icon_wrap">
	<span class="lnr lnr-bubble"></span>@if(count($msgs))<span class="notification_count msg">{{count($msgs)}}</span>@endif
</div>
<div class="dropdown messaging--dropdown">
	<div class="dropdown_module_header">
		<h4>My Messages</h4>
		<a href="{{url('social/message')}}">View All</a>
	</div>
	<div class="messages">
		@foreach($msgs as $row)
		<a href="{{url('social/message/'.$row->username)}}" class="message recent">
			<div class="message__actions_avatar">
				<div class="avatar">
					<img src="{{ asset('storage/'.$row->profile_image) }}" alt="">
				</div>
			</div>
			<!-- end /.actions -->
			<div class="message_data">
				<div class="name_time">
					<div class="name">
						<p>{{$row->name.' '.$row->lname}}</p>
						<span class="lnr lnr-envelope"></span>
					</div>
					<p>
						@if ($row->type == 't') 
							{{substr($row->msg, 0, 50)}}
						@else if ($row->type == 'i')
							Sent an image to you.
						@endif
					</p>
				</div>
			</div>
			<!-- end /.message_data -->
		</a>
		@endforeach
	</div>
</div>