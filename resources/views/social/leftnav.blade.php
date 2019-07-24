<div class="profile-nav">
	<div class="widget" >
		<div class="widget-body timelinebg">
			<div class="user-block userheight">
				@if (!empty($user->profile_image) && file_exists('storage/'.$user->profile_image))
				<img class="img-circle" src="{{ asset('storage/'.$user->profile_image) }}" alt="">
				@else 
				<img src="{{ asset('cdn/images/icon/male.png') }}" alt="{{$user->name. ' ' .$user->lname}}">
				@endif
				<span class="usernamesocialname"><a href="#">{{$user->name}}</a></span>
				<i id="showtimelineBtn" data-price="1" class="fa fa-bars visible-xs pull-right marginrights"></i>
			</div>
		</div>
	</div>
	<div class="widget timelineborder">
		<div class="ms-menu1 hidden-xs" id="timelineListMenu">
			<div class="widget-body clearfix">
				<ul class="nav nav-pills nav-stacked" >
					<li class="active socialactive"><a href="{{url('social')}}"> <i class="fa fa-user"></i> News feed</a></li>
					<!--<li><a class="#"><i class="fa fa-user"></i>Online User</a></li>
					<li> <a href="#" id="addClass"><i class="fa fa-envelope"></i> Open in chat </a></li>-->
					<li><a href="{{url('social/profile')}}"> <i class="fa fa-calendar"></i> Profile</a></li>
					<li><a href="{{url('social/friend')}}"> <i class="fa fa-image"></i> Friends</a></li>
					<li><a href="{{url('social/friend/request')}}"> <i class="fa fa-share"></i> Friend Requests</a></li>
					<li><a href="{{url('social/friend/sent')}}"> <i class="fa fa-globe"></i> Sent Requests</a></li>
					<li><a href="{{url('social/message')}}"> <i class="fa fa-puzzle-piece"></i> Message</a></li>
					
				</ul>
			</div>
		</div>
	</div>
	
</div>