@foreach ($posts as $row)
<div class="box box-widget">
	<div class="box-header with-border">
		<div class="row">
			<div class="col-sm-9 col-xs-9">
				<div class="user-block">
					<a href="{{url('social/profile/'.$row->username)}}"><img class="img-circle" src="{{ asset('storage/'.$row->profile_image) }}" alt="User Image"><span class="username"></a>&nbsp;<a href="{{url('social/profile/'.$row->username)}}"> {{$row->name.' '.$row->lname}}</a> {{$row->type}} </span><span class="description">{{date_format(date_create($row->cr_date),'d M, Y h:i A')}}</span>
				</div>
			</div>
			<div class="col-sm-3 col-xs-3">
				<div class="inline posttopside">
					@if ($row->username == $user->username)
					<a href="#" id="drop2" class="dropdown-trigger btn  btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<em class="fa fa-ellipsis-h"></em>
					</a>
					<ul class="postdrop dropdown dropdown--author messaging_dropdown dropdown-menu" aria-labelledby="drop2">
						<!--li><a href="#"><span class="lnr lnr-plus-circle"></span>Post Edit</a></li -->
						<li><a href="#" data-delete="{{url('social/action/delete-post/'.$row->id)}}" class="delete-post" data-toggle="modal" data-target="#deletepost"><span class="lnr lnr-trash"></span> Post Delete</a></li>
						<!--li><a href="dashboard-setting.html"><span class="lnr lnr-cog"></span> Setting</a></li -->
					</ul>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="box-body" style="display: block;">
		<p><?php echo $row->post; ?></p>
		@if (!empty($row->image))
		@php $i = 1; $images = explode(',', $row->image); @endphp
		@foreach ($images as $key => $val)
		<a href="{{url('social/post/'.$row->id)}}"><img class="img-responsive" src="{{ asset('storage/'.$val) }}" alt="Photo"></a>
		<?php if ($i == 1) break; ?>
		@endforeach
		@endif
		<input type="hidden" class="post-id" value="{{$row->id}}">
		<ul>
			<li class="swicss1 like-reaction">
				<span class="like-btn">
					<!-- Default like button --> 
					<?php 
					if (is_null($row->points)) $points = 0;
					else $points = $row->points;
					?>
					@if (is_null($row->liked))
					<span class="fa like-btn-emo fa fa-star"></span> 
					@else 
						@if ($row->points == 1)
						<span class="like-btn-emo like-btn-angry"></span>
						@elseif($row->points == 2)
						<span class="like-btn-emo like-btn-sad"></span>
						@elseif($row->points == 3)
						<span class="like-btn-emo like-btn-haha"></span>
						@elseif($row->points == 4)
						<span class="like-btn-emo like-btn-love"></span>
						@elseif($row->points == 5)
						<span class="like-btn-emo like-btn-wow"></span>
						@endif
					@endif
					<span class="like-btn-text like-btn-text-wow active">{{$row->point}}</span>
					<ul class="reactions-box">
						<!-- Reaction buttons container-->
						<li class="reaction reaction-angry" data-reaction="Angry" data-points="{{$row->point}}" old-val="{{$points}}" data-post="{{$row->id}}" data-reactionValue="1"></li>
						<li class="reaction reaction-sad" data-reaction="Sad" data-points="{{$row->point}}" old-val="{{$points}}" data-post="{{$row->id}}" data-reactionValue="2"></li>
						<li class="reaction reaction-haha" data-reaction="Haha" data-points="{{$row->point}}" old-val="{{$points}}" data-post="{{$row->id}}" data-reactionValue="3"></li>
						<li class="reaction reaction-love" data-reaction="Love" data-points="{{$row->point}}" old-val="{{$points}}" data-post="{{$row->id}}" data-reactionValue="4"></li>
						<li class="reaction reaction-wow" data-reaction="Wow" data-points="{{$row->point}}" old-val="{{$points}}" data-post="{{$row->id}}" data-reactionValue="5"></li>
					</ul>
				</span>
			</li>
			<li class="swicss1"><button type="button" class=" sharepost"><i class="fa fa-share"></i> Share</button></li>
			<li class="swicss1 pull-right"><span class="text-muted"><a class="likes" href="{{url('social/post/'.$row->id)}}" >{{$row->likes}}</a> People reacted. &nbsp;&nbsp;<a href="{{url('social/post/'.$row->id)}}" >{{$row->comments}} comments</a><a href="{{url('social/post/'.$row->id)}}" > Show</a></span></li>
		</ul>
	</div>
</div>
@endforeach
{{$posts->links()}}