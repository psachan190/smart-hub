@foreach ($users as $row)	
<a href="{{url('social/message/'. $row->username)}}" class="list-group-item">
	<i class="fa fa-check-circle connected-status"></i>
	<img src="{{ asset('storage/'.$row->profile_image) }}" class="img-chat img-thumbnail">
	<span class="chat-user-name">{{$row->name. ' '. $row->lname}}</span>
</a>
@endforeach