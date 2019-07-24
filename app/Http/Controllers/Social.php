<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
//use validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\loginModal;
use App\Models\User;
use App\QuizParticanModal;
use App\QuizanswerModal;
use App\VendorRegistration;
use App\VendorCategory;
use App\Knp_vendorbusinesstype;
use App\Shop_categoryModel;
use App\Knp_common;
use App\Otpverify;
use App\KnpPincodeModel;
use Session;
use App\VendorDetails;
use App\VendorPostAds;
use App\Products;
use App\VservicesModel;
use App\CategoryModel;
use App\SubCategory;
use App\KnpShopImage;
use App\ComplainSubject;
use App\ComplainModel;
use App\ComplainDetails;
use App\OfferNewsModel;
use App\Advertisement;
use App\AdsProfession;
use App\Ngo_model;
use App\Matrimonial_model;
use Cart;
use Auth;
use Mail;
use App\KnpProfileModel;
use Image;
use App\Http\Controllers\Social_socket;

class Social extends Controller{
	function __construct() {
        	
    	}
	public function page ($p1 = 'home', $p2 = NULL, $p3 = NULL) {
		Knp_common::ip();
		if (!session()->has('knpuser')) { return redirect('login'); }
		else { $this->lastseen(); $user = session()->get('knpuser'); }
		$data['user'] = User::where(['id' => session()->get('knpuser')])->first();
		$data['title'] = ucfirst($p1);
		if ($p1 == 'home') {
			$data['msgs'] = DB::table('social_msg')->leftjoin('users','users.id' ,'social_msg.sender')->where(['receiver' => $user, 'seen' => 'N'])->groupBy('social_msg.sender')->orderBy('social_msg.id','desc')->get();
			$data['posts'] = DB::table('social_posts')->select('social_like.user as liked', 'social_like.points as points','social_posts.*', 'users.name','users.lname', 'users.profile_image','users.username')->join('users','social_posts.user','=','users.id')->join('social_friend', function ($join) use($user) {
				$join->on('social_friend.user1','=','social_posts.user')->where('social_friend.user2',$user); 
				$join->orOn('social_friend.user2','=','social_posts.user')->where('social_friend.user1',$user); 
			})->leftjoin('social_like', function($join) use($user) { 
					$join->on('social_like.post','=','social_posts.id');
					$join->where('social_like.user', $user);
			})->orderBy('social_posts.cr_date','desc')->where(['social_posts.status' => 'Y'])->paginate(10);
			$i = 0;
			foreach ($data['posts'] as $row) {
				$data['comments'][$row->id] = DB::table('social_comments')->join('users','users.id','=','social_comments.user')->where(['social_comments.post' => $row->id])->orderBy('social_comments.id','desc')->get();
				$i++;
			}
		}
		if ($p1 == 'message') {
			$data['friends'] = DB::table('users')->join('social_friend', function($join){
					                $join->on('social_friend.user1','=','users.id'); 
					                $join->orOn('social_friend.user2','=','users.id');
					            })->where([['social_friend.user1','=',$user],['social_friend.accepted','=','Y'],['users.id','!=',$user]])
					            ->orWhere([['social_friend.user2','=',$user],['social_friend.accepted','=','Y'],['users.id','!=',$user]])
					            ->orderBy('cr_date','DESC')->paginate(10);
			if ($p2 != null) {
				$data['msg_user'] = User::where(['username' => $p2])->first();
				if ($data['msg_user']) {
					$data['msgs'] = DB::table('social_msg')->select("social_msg.*",'users.profile_image' )->join('users', function($join) use ($user, $data) {
						$join->on('social_msg.sender','=', 'users.id')->where(['sender' => $user,'receiver' => $data['msg_user']->id]);
						$join->orOn('social_msg.sender','=', 'users.id')->where(['sender' => $data['msg_user']->id,'receiver' => $user]);
					})->get();
					DB::table('social_msg')->where([['sender','=',$data['msg_user']->id],['receiver','=',$user], ['seen', 'N']])->update(['seen' => 'Y']);
				} else { $p1 = 404;}
			} else {
				if (count($data['friends']) != 0) {
					$data['msg_user'] = User::where(['username' => $data['friends'][0]->username])->first();
					$data['msgs'] = DB::table('social_msg')->select("social_msg.*",'users.profile_image' )->join('users', function($join) use ($user, $data) {
						$join->on('social_msg.sender','=', 'users.id')->where(['sender' => $user,'receiver' => $data['msg_user']->id]);
						$join->orOn('social_msg.sender','=', 'users.id')->where(['sender' => $data['msg_user']->id,'receiver' => $user]);
					})->orderBy('social_msg.id','DESC')->get();
				}
			}
		}
		if ($p1 == 'profile' || $p1 == 'about' || $p1 == 'friends' || $p1 == 'photos') { 
			if (is_null($p2)) $p2 = $data['user']->username;
			$data['profile'] = User::where(['username' => $p2])->first();
			if (!$data['profile']) $p1 = 404;
			$user = $data['profile']->id;
			if ($p1 == 'profile') { 
				$data['posts'] = DB::table('social_posts')->select('social_like.user as liked', 'social_like.points as points', 'social_posts.*', 'users.name', 'users.lname', 'users.profile_image', 'users.username')->rightjoin('users','social_posts.user','=','users.id')->leftjoin('social_like', function($join) use($user) { 
									$join->on('social_like.post','=','social_posts.id');
									$join->where('social_like.user', $user);
								})->where(['social_posts.user' => $user, 'social_posts.status' => 'Y'])->orderBy('social_posts.cr_date','desc')->paginate(10);			
				$i = 0;
				foreach ($data['posts'] as $row) {
					$data['comments'][$row->id] = DB::table('social_comments')->join('users','users.id','=','social_comments.user')->where(['social_comments.post' => $row->id])->orderBy('social_comments.id','desc')->get();
					$i++;
				}
			}
			
			$data['photos'] = DB::table('social_images')->where(['user' => $user])->get();
			$data['addresses'] = DB::table('address')->where(['users_id' => $user])->get();
			$data['friends'] = DB::table('users')->join('social_friend', function($join){
					                $join->on('social_friend.user1','=','users.id'); 
					                $join->orOn('social_friend.user2','=','users.id');
					            })->where([['social_friend.user1','=',$user],['social_friend.accepted','=','Y'],['users.id','!=',$user]])->orWhere([['social_friend.user2','=',$user],['social_friend.accepted','=','Y'],['users.id','!=',$user]])->inRandomOrder()->paginate(10);
		}
		if ($p1 == 'friend') {
			$data['result'] = array();
			if (Input::has('search')) {
				$search = Input::get('search');
				$data['result'] = DB::table('users')->leftjoin('social_friend', function ($join) use ($user) {
							$join->on('users.id','=','social_friend.user1')->where('social_friend.user2', $user);
							$join->orOn('users.id','=','social_friend.user2')->where('social_friend.user1', $user);
						})->where([['users.name','like',"%$search%"],['users.id','!=',"$user"]])->groupBy('users.id')->paginate(10);
			} else if ($p2 == 'request') {
				$data['result'] = DB::table('social_friend')->join('users','users.id','=','social_friend.user1')->where([['social_friend.user2','=',$user],['social_friend.accepted','=','N'],['social_friend.status','=','Y']])->orderBy('cr_date','DESC')->paginate(10);
			} else if ($p2 == 'sent') {
				$data['result'] = DB::table('social_friend')->join('users','users.id','=','social_friend.user2')->where([['social_friend.user1','=',$user],['social_friend.accepted','=','N'],['social_friend.status','=','Y']])->orderBy('cr_date','DESC')->paginate(10);
			} else {
				//Level 0
				$res1= DB::table('social_friend')->select('user1 as user')->where('user2', $user)->where('social_friend.accepted','Y')->get();
				$res2 = DB::table('social_friend')->select('user2 as user')->where('user1', $user)->where('social_friend.accepted','Y')->get();
				$merged = $res2->merge($res1 );
				$query = $merged->all();
				$res = array();
				foreach ($query as $row) array_push($res, $row->user);
				//Level 1
				$res1= DB::table('social_friend')->select('user1 as user')->where('social_friend.accepted','Y')->whereIn('user2', $res)->groupBY('user1')->get();
				$res2 = DB::table('social_friend')->select('user2 as user')->where('social_friend.accepted','Y')->whereIn('user1', $res)->groupBY('user2')->get();
				$merged = $res2->merge($res1 );
				$query = $merged->all();
				$res = array();
				foreach ($query as $row) array_push($res, $row->user);
				//Level 2
				$res1= DB::table('social_friend')->select('user1 as user')->where('social_friend.accepted','Y')->whereIn('user2', $res)->groupBY('user1')->get();
				$res2 = DB::table('social_friend')->select('user2 as user')->where('social_friend.accepted','Y')->whereIn('user1', $res)->groupBY('user2')->get();
				$merged = $res2->merge($res1 );
				$query = $merged->all();
				foreach ($query as $row) array_push($res, $row->user);
				//Level 2
				$res1= DB::table('social_friend')->select('user1 as user')->where('social_friend.accepted','Y')->whereIn('user2', $res)->groupBY('user1')->get();
				$res2 = DB::table('social_friend')->select('user2 as user')->where('social_friend.accepted','Y')->whereIn('user1', $res)->groupBY('user2')->get();
				$merged = $res2->merge($res1 );
				$query = $merged->all();
				foreach ($query as $row) array_push($res, $row->user);
				//Level 3
				$res1= DB::table('social_friend')->select('user1 as user')->where('social_friend.accepted','Y')->whereIn('user2', $res)->groupBY('user1')->get();
				$res2 = DB::table('social_friend')->select('user2 as user')->where('social_friend.accepted','Y')->whereIn('user1', $res)->groupBY('user2')->get();
				$merged = $res2->merge($res1 );
				$query = $merged->all();
				foreach ($query as $row) array_push($res, $row->user);
				
				$data['result']= DB::table('users')->leftjoin('social_friend', function($join) use ($user) {
							$join->on('users.id','=','social_friend.user1')->where('social_friend.user2', $user);
							$join->orOn('users.id','=','social_friend.user2')->where('social_friend.user1', $user);
						})->where('users.id','!=',$user)->whereIn('users.id', $res)->groupBy('users.id')->paginate(100);
			}
		}
		if ($p1 == 'post' && !is_null($p2)) {
			$data['posts'] = DB::table('social_posts')->select('social_like.user as liked', 'social_like.points as points','social_posts.*', 'users.name','users.lname', 'users.profile_image','users.username')->join('users','social_posts.user','=','users.id')->leftjoin('social_like', function($join) use($user) { 
										$join->on('social_like.post','=','social_posts.id');
										$join->where('social_like.user', $user);
								})->where(['social_posts.id' => $p2, 'social_posts.status' => 'Y'])->paginate(10);
			if (count($data['posts']) == 0) $p1 = '404';
			$data['comments'] = DB::table('social_comments')->join('users','users.id','=','social_comments.user')->where(['social_comments.post' => $p2])->orderBy('social_comments.id','desc')->get();
		}
		if (!view()->exists('social.'.$p1)) $p1 = 404;
		return view('social.'.$p1)->with($data);
	}
	
	public function action (Request $req, $a1) {
	   	if (!session()->has('knpuser')) { exit; }
	   	if ($a1 == 'send_msg') {
	   		$this->send_message ($req);
	   	}
	   	if ($a1 == 'cover_image') { 
		     	echo $filename = md5(microtime()).'.'.$req->file('cover_image')->getClientOriginalExtension();
			$path = public_path('storage/'.$filename);
			Image::make($req->file('cover_image')->getRealPath())->resize(1195,361)->save($path);
			DB::table('users')->where(['id' => session()->get('knpuser')])->update(['cover_image' => $filename]);
			$data = ['user' => session()->get('knpuser'), 'image' => $filename, 'status' => 'Y', 'type'=>'cover', 'cr_date' => date('Y-m-d H:i:s')];
			DB::table('social_images')->insert($data);
			$data = [
					'user' => session()->get('knpuser'), 
					'image' => $filename, 'status' => 'Y', 
					'type' => 'has updated his cover photo.', 
					'cr_date' => date('Y-m-d H:i:s')
				];
			DB::table('social_posts')->insert($data);
		}
		if ($a1 == 'profile_image') {
		     	echo $filename = md5(microtime()).'.'.$req->file('profile_image')->getClientOriginalExtension();
			$path = public_path('storage/'.$filename);
			Image::make($req->file('profile_image')->getRealPath())->resize(600,600)->save($path);
			DB::table('users')->where(['id' => session()->get('knpuser')])->update(['profile_image' => $filename]);
			$data = ['user' => session()->get('knpuser'), 'image' => $filename, 'status' => 'Y', 'type'=>'profile', 'cr_date' => date('Y-m-d H:i:s')];
			DB::table('social_images')->insert($data);
			$data = [
					'user' => session()->get('knpuser'), 
					'image' => $filename, 'status' => 'Y', 
					'type' => 'has updated his profile photo.', 
					'cr_date' => date('Y-m-d H:i:s')
				];
			DB::table('social_posts')->insert($data);
		}
		if ($a1 == 'new_post') {
		     	$post_image = '';
		     	if (!is_null($req->file('images')) && count($req->file('images')) != 0) {
			     	$files = $req->file('images');
				foreach ($files as $image) {
					$filename = md5(microtime()).'.'.$image->getClientOriginalExtension();
					$path = public_path('storage/'.$filename);
					Image::make($image->getRealPath())->save($path);
					$data = ['user' => session()->get('knpuser'), 'image' => $filename, 'status' => 'Y', 'type'=>'photos', 'cr_date' => date('Y-m-d H:i:s')];
					DB::table('social_images')->insert($data);
					$post_image .= ",$filename ";
				}
			}
			$post_image = ltrim($post_image , ',');
			if (empty($req->all()['content'])) $content = '';
			else $content = $req->all()['content'];
			if ($content != ''|| $post_image != '') {
				$data = [
						'user' => session()->get('knpuser'), 
						'post' => $content,
						'image' => $post_image,
						'cr_date' => date('Y-m-d H:i:s'),
						'type' => 'has shared.',
						'status' => 'Y'
					];
				$id = DB::table('social_posts')->insertGetId($data);
				echo $id;
			}
		}
		if ($a1 == 'comment') {
			$data = [	'user' => session()->get('knpuser'), 
					'post' => $req->all()['post'],
					'comment' => $req->all()['comment'],
					'cr_date' => date('Y-m-d H:i:s'),
					'status' => 'Y'	];
			DB::table('social_comments')->insert($data);
			DB::table('social_posts')->where(['id' => $req->all()['post']])->increment('comments');
			echo '1';
		}
		exit;
	}
	
	public function get_action ($a1 = NULL, $a2 = NULL) {
	   	if (!session()->has('knpuser')) { exit; }
	   	$user = session()->get('knpuser');
	   	if ($a1 == 'seen-notification') {
	   		DB::table('users_notification')->where('user', $user)->update(['seen' => 'Y']);
	   		exit;
	   	}
	   	if ( $a1 == 'online-users') {
	   		$data['users'] = DB::table('users')->join('social_friend', function($join) use($user) {
	   				$join->on('social_friend.user1','=','users.id')->where('social_friend.user2', $user);
	   				$join->orOn('social_friend.user2','=','users.id')->where('social_friend.user1', $user);
	   		})->where([['social_friend.accepted','Y'],['users.id', '!=', $user]])->groupBy('users.id')->get();
	   		return view('social.component.online-users')->with($data);
	   	}
	   	
	   	if ( $a1 == 'msg-notifications') {
	   		$data['msgs'] = DB::table('social_msg')->leftjoin('users','users.id' ,'social_msg.sender')->where(['receiver' => $user, 'seen' => 'N'])->groupBy('social_msg.sender')->orderBy('social_msg.id','desc')->get();
	   		return view('social.component.msg-notifications')->with($data);
	   	}
	   	if ( $a1 == 'notifications') {
	   		$data['notifications'] = DB::table('users_notification')->leftjoin('users','users.id' ,'users_notification.user')->where(['users_notification.user' => $user])->orderBy('users_notification.id','desc')->paginate(20);
	   		return view('component.notifications')->with($data);
	   	}
	   	if ( $a1 == 'msgs' && Input::has('user')) {
	   		$this->message(Input::get('user'));
	   	}
	   	if ($a1 == 'likes' && !is_null($a2)) {
	   		$data['likes'] = DB::table('social_like')->join('users','users.id','social_like.user')->where('post',$a2)->get();
	   		return view('social.component.likes')->with($data);
	   	}
	   	
	   	if ($a1 == 'comments' && !is_null($a2) && Input::has('comment')) {
	   		$post = Input::get('comment');
	   		$date = date ("Y-m-d-H-i-s");
	   		$od = substr($a2,0,10).' '.substr($a2,11,8);
	   		echo '<input type="hidden" class="comment-date" name="date" value='.$date.'">';
			$comments = DB::table('social_comments')->join('users','users.id','=','social_comments.user')->where([['social_comments.post', '=', $post],['cr_date' , '>=', $od]])->orderBy('social_comments.id','desc')->get();
			foreach ($comments as $row) {
				echo '<div class="box-commentreply">
					<a href="'.url('social/profile/'.$row->username).'"><img class="img-circle img-sm" src="'.asset('storage/'.$row->profile_image).'" alt="'.$row->name.' '. $row->lname.'"></a>
					<div class="comment-text">
						<p style="">
							<span class="namemsg"><strong>'.$row->name.' '. $row->lname.'</strong>&nbsp;'.$row->comment.'
							</span>
						</p>
						<span class="text-mutedr pull-left"><a class="textreply">Reply</a></span>
						<span class="text-mutedr pull-right">'.date_format(date_create($row->cr_date),'d M, Y h:i A').'</span>
					</div>
				</div>
				<div class="box-footer textarearounded box-commentreply">
					<img class="reply_img_size img-circle img-sm" src="'.asset('cdn/images/back/food.jpg').'" alt="User Image">
					<div class="comment-text">
						<input class="form-control border no-shadow" placeholder="Type your message here" />
					</div>
				</div>';
			}
		}
		if ($a1 == 'delete-post' && !is_null($a2)) {
			$status = DB::table('social_posts')->where(['id' => $a2, 'user' => $user])->update(['status' => 'N']);
			if ($status) echo 1;
			else echo 2;
		}
		if ($a1 == 'follow' && Input::has('fuser')) {
			$fuser = Input::get('fuser');
		     	$query = DB::table('social_friend')->where([['user1','=', $fuser], ['user2', '=', $user]])->orWhere([['user1', '=', $user],['user2', '=', $fuser]])->first();
		     	if ($query == NULL) {
		     		DB::table('social_friend')->insert(['user1' => $user, 'user2' => $fuser, 'cr_date' => date("Y-m-d h:;i:s"), 'status' => 'Y', 'accepted' => 'N']);
		     		$date = date("Y-m-d H:i:s");
		     		$query = User::where(['id' => $fuser])->first();
		     		$query1 = User::where(['id' => $user])->first(); 
		     		$data = [
		     			'user' => $fuser,
		     			'image' => $query1->profile_image,
		     			'seen' => 'N',
		     			'content' => '<p><a href="'.url('social/friend/request').'"><span>'.$query1->name.' '.$query1->lname.'</span>&nbsp; send you a request.</a></p>',
		     			'url' => url('social/friend/request'),
		     			'c_status' => 'Y',
		     			'created_at' => $date,
		     			'updated_at' => $date
 		     		];
 		     		DB::table('users_notification')->insert($data);
		     		echo '1';
		     	}
		}
		if ($a1 == 'accept' && Input::has('fuser')) {
			$fuser = Input::get('fuser');
			$date = date("Y-m-d H:i:s");
			$query = User::where(['id' => $user])->first();
	     		$data = [
	     			'user' => $fuser,
	     			'image' => $query->profile_image,
	     			'seen' => 'N',
	     			'content' => '<p><a href="'.url('social/profile/'.$query->username).'"><span>'.$query->name.' '.$query->lname.'</span>&nbsp; has accepted your request. Visit their profile.</a></p>',
	     			'url' => url('social/profile/'.$query->username),
	     			'c_status' => 'Y',
	     			'created_at' => $date,
	     			'updated_at' => $date
	     			];
 		     	DB::table('users_notification')->insert($data);
			return DB::table('social_friend')->where([['user1','=', $fuser], ['user2', '=', $user]])->update(['accepted' => 'Y']);
		}
		if ($a1 == 'like' && Input::has('post')) { 
			if (Input::has('value') && Input::get('value') <= 5) $value = Input::get('value');
			else $value = 3; 
			$like = DB::table('social_like')->where(['post' => Input::get('post'), 'user' => session()->get('knpuser')])->first();
			if (is_null($like)) {
				$data = [	
					'user' => session()->get('knpuser'), 
					'post' => Input::get('post'),
					'points' => $value,
					'cr_date' => date('Y-m-d H:i:s') 	];
				DB::table('social_like')->insert($data);
				DB::table('social_posts')->where(['id' => Input::get('post')])->increment('likes');
				DB::table('social_posts')->where(['id' => Input::get('post')])->increment('point', $value);
			} else {
				DB::table('social_posts')->where(['id' => Input::get('post')])->decrement('point', $like->points);
				DB::table('social_posts')->where(['id' => Input::get('post')])->increment('point', $like->points);
				DB::table('social_like')->where(['post' => Input::get('post'), 'user' => session()->get('knpuser')])->update(['points' => $value]);
			} 
		}
		exit;
	}
	
	public function message ($user1) {
		if (!session()->has('knpuser')) { exit; }
	   	$user2 = session()->get('knpuser');
	   	$result = DB::table('social_msg')->select("social_msg.*",'users.profile_image' )->join('users', 'social_msg.sender','=', 'users.id')->where(['sender' => $user1,'receiver' => $user2, 'seen'=>'N'])->get();
	   	DB::table('social_msg')->where(['sender' => $user1, 'receiver'=>$user2,'seen'=>'N'])->update(['seen' => 'Y']);
	   	foreach ($result as $row) {
	   		if ($row->type == 't') {
				echo '<div class="message-feed  media " >
						<div class=" pull-left ">
							<img src="'.asset('storage/'.$row->profile_image).'" alt="" class="img-avatar">
						</div>
						<div class="media-body">
							<div class="mf-content">'.$row->msg.'</div>
						</div>
						<small class="mf-date"><i class="fa fa-clock-o"></i> '.date_format(date_create($row->created_at), 'd M, Y h:i A').'</small>
					</div>';
			} else if ($row->type == 'i') {
				echo '<div class="message-feed  media " >
					<div class=" pull-left ">
						<img src="'.asset('storage/'.$row->profile_image).'" alt="" class="img-avatar">
					</div>
					<div class="media-body">
						<div class="mf-image">
							<a data-fancybox="gallery" href="'.url('storage/'.$row->msg).'" data-caption="">
							<img class="img img-responsive  pull-left " src="'.asset('storage/'.$row->msg).'" style="width:243px; border-radius: 2%;" >
							</a>
						</div>
					</div>
					<small class="mf-date"><i class="fa fa-clock-o"></i> '.date_format(date_create($row->created_at), 'd M, Y h:i A').'</small>
				</div>';
			}
		}
   		
   	}
   	
   	public function send_message ($req) {
	   	if (!session()->has('knpuser')) { exit; }
	   	$date = date('Y-m-d H:i:s');
	   	$user1 = session()->get('knpuser');
   		if (!is_null($req->file('images')) && count($req->file('images')) != 0) {
		     	$files = $req->file('images');
			foreach ($files as $image) {
				if (is_null($image->getClientOriginalExtension()))  exit;
				$filename = md5(microtime()).'.'.$image->getClientOriginalExtension();
				$path = public_path('storage/'.$filename);
				Image::make($image->getRealPath())->save($path);
				$data = ['sender' => $user1, 'receiver' => $req->user, 'msg' => $filename, 'seen' => 'N', 'type' => 'i', 'created_at' => $date];
				$mes = DB::table('social_msg')->insert($data);
				$res = DB::table('users')->where('id', $user1)->first();
				echo '<div class="message-feed right" >
					<div class=" pull-right ">
						<img src="'.asset('storage/'.$res->profile_image).'" alt="" class="img-avatar">
					</div>
					<div class="media-body">
						<div class="mf-image">
							<a data-fancybox="gallery" href="'.url('storage/'.$filename).'" data-caption="">
							<img class="img img-responsive pull-right" src="'.asset('storage/'.$filename).'" style="width:243px; border-radius: 2%;" >
							</a>
						</div>
					</div>
					<small class="mf-date"><i class="fa fa-clock-o"></i> '.date_format(date_create($date), 'd M, Y h:i A').'</small>
				</div>';
			}
		}
	   	if (!empty($req->msg)) {
	   		$data = [
	   			'sender' => $user1,
	   			'receiver' => $req->user,
	   			'msg' => $req->msg,
	   			'seen' => 'N',
	   			'type' => 't',
	   			'created_at' => $date
	   		];
		   	$mes = DB::table('social_msg')->insert($data);
		   	$res = DB::table('users')->where('id', $user1)->first();
		   	echo '<div class="message-feed  right " >
				<div class=" pull-right ">
					<img src="'.asset('storage/'.$res->profile_image).'" alt="" class="img-avatar">
				</div>
				<div class="media-body">
					<div class="mf-content">'.$req->msg.'</div>
				</div>
				<small class="mf-date"><i class="fa fa-clock-o"></i> '.date_format(date_create($date), 'd M, Y h:i A').'</small>
			</div>';
		}
   	}
   	
   	public function lastseen() {
   		User::where('id', session()->get('knpuser'))->update(['lastseen' => date("Y-m-d H:i:s")]);
   	}
   	
}