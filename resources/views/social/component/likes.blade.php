<div class=" mobilengo" role="document">
	<div class="likefriendpopup modal-content modal-sm popupsize1">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		<div class="modal-body">
			<div class="boxed-body signin-area">
				<h2><span class="fa fa-thumbs-o-up"></span>&nbsp; Likes list</h2>
				<div class="box box-widget box-widgetfriend">
					@foreach($likes as $row)
					<div class="row borderbottom margin_div normal-padding">
						<div class="col-sm-8 col-xs-7 mediafriendlike mediafriend">
							<a href="{{url('social/profile/'.$row->username)}}"><img class="d-flex align-self-startfriendlist" src="{{url('storage/'.$row->profile_image)}}" alt="{{$row->name.' '.$row->lname}}"></a>
							<div class=" pl-3">
								<div class="stats">
									<a href="{{url('social/profile/'.$row->username)}}"><span class="usernamesocial">{{$row->name.' '.$row->lname}}</span></a>
								</div>
								<a href="{{url('social/profile/'.$row->username)}}"><span class="fassize usernamesocial">{{$row->username}}</a></span></a>
							</div>
						</div>
						<div class="col-sm-4 col-xs-5">
							<div class="friena12">
								<!--a href="#" class="btn defalutbtncss  btn-md btn--white">Friend</a -->
								<a href="{{url('social/message/'.$row->username)}}" class="btn defalutbtncss  btn-md btn--white">Message</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
					