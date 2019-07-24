<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Illuminate\Html\FormFacade;
use validator;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Check;
use App\Account_model;
use App\Models\User_model;
use App\Models\Ngo_model;
use App\VendorDetails;
use App\Knp_common;
use App\Matrimonial_model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Image;

class Ngo extends Controller {
	
	public function ngos($page = 'all_ngo') {
		Knp_common::ip();
		$data['title'] = "NGOs in Kanpur";
		if(session()->get('knpuser')) {
			$data['user'] = User_model::where('id',session()->get('knpuser'))->first();
			$data['my_ngo'] = Ngo_model::where(['user' => session()->get('knpuser'), 'status' => 'Y'])->get();
			$data['my_matrimonialProfile'] = Matrimonial_model::get_matrimonial_profile(['user_id'=>session()->get('knpuser')]);
			$data['my_shopList'] = VendorDetails::vendorShopList("1",session()->get('knpuser'));
		}
		$data['ngos'] = Ngo_model::where(['status' => 'Y'])->paginate(8);
		$data['events'] = DB::table('knp_events')->where(['status' => 'Y'])->limit(6)->get();
		$data['causes'] = DB::table('ngo_causes')->where(['status' => 'Y'])->limit(6)->get();
		return view("ngo.".$page)->with($data);
	}
	
	public function ngo($ngo, $page = 'home') {
		Knp_common::ip();
		if(session()->get('knpuser')) {
			$data['user'] = User_model::where('id',session()->get('knpuser'))->first();
			$data['my_ngo'] = Ngo_model::where(['user' => session()->get('knpuser'), 'status' => 'Y'])->get();
			$data['my_matrimonialProfile'] = Matrimonial_model::get_matrimonial_profile(['user_id'=>session()->get('knpuser')]);
			$data['my_shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
		}
		$data['ngo'] = Ngo_model::where('user_name', $ngo)->first();
		$data['title'] = $data['ngo']->ngo_name;
		$data['causes'] = DB::table('ngo_causes')->where(['status' => 'Y'])->orderBy('id','desc')->limit(6)->get();
		$data['page_content'] = 'ngo';
		if ($page == 'home') $data['page'] = 'single_ngo';
		else if ($page == 'gallery') { 
			$data['gallery'] = Ngo_model::gallery_images(['where' => ['ngo_tbl.user_name' => $ngo]]);
			$data['page'] = 'gallery';
		}
		else if ($page == 'events') {  $data['page'] = 'events'; $data['events'] = DB::table('knp_events')->where(['section_id' => $data['ngo']['id'],'status' => 'Y'])->orderBy('id','desc')->paginate(6); }
		else if ($page == 'single_event') { $data['page'] = 'single_event';}
		else if ($page == 'causes') { $data['page'] = 'causes'; $data['causes'] = DB::table('ngo_causes')->where(['ngo_tbl_id' => $data['ngo']['id'],'status' => 'Y'])->orderBy('id','desc')->paginate(6); }
		else if ($page == 'create') $data['page'] = 'create';
		else if ($page == 'edit') { if ($data['user']->id != $data['ngo']->user) return redirect()->action('Ngo@ngos'); $data['page'] = 'edit'; }
		else if ($page == 'gallery-image-delete' && isset($_GET['rem'])) {
			if ($data['user']->id != $data['ngo']->user) exit;
			$image = DB::table('ngo_gallery')->where(['ngo_id' => $data['ngo']->id, 'id' => $_GET['rem']])->first();
			if (!is_null($image)) {
				unlink(public_path('storage/'.$image->image));
			}
			DB::table('ngo_gallery')->where(['ngo_id' => $data['ngo']->id, 'id' => $_GET['rem']])->delete();
			exit;
		}
		else view("404")->with($data);
		return view("ngo.".$data['page'])->with($data);
	}
	
	public function action(Request $request, $ngo , $action) {
		if (!session()->get('knpuser')) { return redirect("login"); exit;}
		$message= ['required' => 'The :attribute can not be blank.'];
		if ($action == 'about')  {
			if (!is_null($request->file('image'))) {
				$filename = md5(microtime()).'.'.$request->file('image')->getClientOriginalExtension();
				$path = public_path('storage/'.$filename);
				$val = DB::table('ngo_tbl')->where(['user_name' => $ngo])->first();
				if (!empty($val->image) && $val->image != 'N1.jpg') {
					unlink(public_path('storage/'.$val->image));
				}
				Image::make($request->file('image')->getRealPath())->save($path);
				if (Ngo_model::where(['user_name' => $ngo])->update(['image' => $filename])) return redirect()->back()->with('success', 'Your information has been updated!');
			}
			$v = ['type'=>'required', 'content' => 'required'];
			$this->validate($request,$v, $message);
			if (Ngo_model::where(['user_name' => $ngo])->update(['about_us' => $request->all()['content']])) return redirect()->back()->with('success', 'Your information has been updated!');
		}
		if ($action == 'event')  {
			$v = ['title'=>'required', 'description' => 'required'];
			$this->validate($request,$v, $message);
			$val = Ngo_model::where(['user_name' => $ngo])->first();
			$filename = md5(microtime()).'.'.$request->file('image')->getClientOriginalExtension();
			$path = public_path('storage/'.$filename);
			Image::make($request->file('image')->getRealPath())->save($path);
			$date1 = date_create($request->all()['date1']);
			$date2 = date_create($request->all()['date2']);
			$url = $this->slug($request->all()['title']);
			$exist = TRUE; $i = 1;
			while ($exist) {
				$res = DB::table('knp_events')->where(['url' => $url])->first();
				if ($res) {
					$url .= $i;
				} else $exist = FALSE;
				$i++;
			}
			$data = [
				'user' => $val->user,
				'section' => 1,
				'section_id' => $val->id,
				'title' => $request->all()['title'],
				'image' => $filename,
				'url' => $url,
				'description' => $request->all()['description'],
				'status' => 'N',
				'from_date' => date_format($date1,"Y-m-d H:i:s"),
				'upto_date' => date_format($date2,"Y-m-d H:i:s"),
				'created_at' => date('Y-m-d h:i:s'),
				'updated_at' =>date('Y-m-d h:i:s') 
				];
			DB::table('knp_events')->insert($data);
			return redirect()->back()->with(['success' => 'Events has been added and will be published soon after aprovel!']);
			
		}
		if ($action == 'cause')  {
			$v = ['title'=>'required', 'description' => 'required'];
			$this->validate($request,$v, $message);
			$val = Ngo_model::where(['user_name' => $ngo])->first();
			$filename = md5(microtime()).'.'.$request->file('image')->getClientOriginalExtension();
			$path = public_path('storage/'.$filename);
			Image::make($request->file('image')->getRealPath())->resize(300, 250)->save($path);
			$url = $this->slug($request->all()['title']);
			$exist = TRUE; $i = 1;
			while ($exist) {
				$res = DB::table('knp_events')->where(['url' => $url])->first();
				if ($res) {
					$url .= $i;
				} else $exist = FALSE;
				$i++;
			}
			$data = [
				'ngo_tbl_id' => $val->id,
				'title' => $request->all()['title'],
				'image' => $filename,
				'description' => $request->all()['description'],
				'status' => 'N',
				'created_at' => date('Y-m-d h:i:s'),
				'updated_at' =>date('Y-m-d h:i:s'),
				'url' => $url
				];
			DB::table('ngo_causes')->insert($data);
			return redirect()->back()->with(['success' => 'Thanks to initiate social campaign and to help others.!']);
			
		}
		
		if ($action == 'gallery')  {
			$val = Ngo_model::where(['user_name' => $ngo])->first();
			$i = FALSE;
			$files=$request->file('image');
			foreach ($files as $image) {
				$filename = md5(microtime()).'.'.$image->getClientOriginalExtension();
				$path = public_path('storage/'.$filename);
				Image::make($image->getRealPath())->resize(517,350)->save($path);
				$data = ['ngo_id' => $val->id,'image' => $filename];
				$image= DB::table('ngo_gallery')->insert($data);
				$i = TRUE;
			}
			if ($i) return redirect()->back()->with('success' , 'Image(s) has been uploaded successfully!');
			else return redirect()->back()->withErrors(['image' => 'Something went wrong.']);
		}
	}
	
	public function create() { 	   
		Knp_common::ip();
		if(session()->get('knpuser')) {
			$data['user'] = User_model::where('id',session()->get('knpuser'))->first();
			$data['my_ngo'] = Ngo_model::where(['user' => session()->get('knpuser'), 'status' => 'Y'])->get();
			$data['my_matrimonialProfile'] = Matrimonial_model::get_matrimonial_profile(['user_id'=>session()->get('knpuser')]);
			$data['my_shopList'] = VendorDetails::vendorShopList("1",session()->get('knpuser'));
		}
		if (!session()->get('knpuser')) { return redirect("login"); exit;}
		$data['title'] = "NGO";
		$data['page_content'] = 'ngo';
		$data['page'] = 'create';
		return view("ngo.create")->with($data);
	}
	
	public function save(Request $request){
	   
		if (!session()->get('knpuser')) { return redirect("login"); exit;}
		$message= ['required' => 'The :attribute can not be blank.'];
		$v = array('name'=>'required', 'email' => 'required|email','contact' => 'required|integer|digits:10', 'username' => 'required|alpha_num');
	  	$this->validate($request,$v, $message);
	  	//if (Check::email($request->all(['email']))) { return Redirect::back()->withErrors(['E-mail already exist in another account.']); }
	        //if (Check::contact($request->all(['contact']))) { return Redirect::back()->withErrors(['Contact already exist in another account.']); }
	  	if ($this->username($request->all()['username'])) { return Redirect::back()->withErrors(['Username already exist in another account.']); }
          	if (Ngo_model::create()) return redirect()->back()->with('success', 'Your profile for NGO has been created. Please wait for the approvel!');
        }
	
        public function username ($username) {
        	$exist = DB::table('ngo_tbl')->where('user_name', $username)->get(); 
	    	if ($exist->count() == 0) return FALSE;
	    	return TRUE;
        }
        
        
        
        public function my_ngo(){
		  $data['title'] = "My Ngo Page";
		  $data['my_ngo'] = Ngo_model::where(['user' => session()->get('knpuser')])->get();
		  return view("ngo.my_ngo")->with($data);
	}
	
	public function slug($text)
	{
	  	$text = preg_replace('~[^\pL\d]+~u', '-', $text);
	  	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	  	$text = preg_replace('~[^-\w]+~', '', $text);
	  	$text = trim($text, '-');
	  	$text = preg_replace('~-+~', '-', $text);
	  	$text = strtolower($text);
	 	if (empty($text)) {
	    	return 'n-a';
	  	}
		return $text;
	}
}