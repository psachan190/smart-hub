<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Session;
use App\VendorDetails;
use App\KnpPincodeModel;
use App\Shop_categoryModel;
use App\CategoryModel;
use App\Products;
use App\User;
use App\ProductsImageModel;
use App\VservicesModel;
use App\VendorShopImage;
use App\VendorbusinesDetails;
use App\VendorPostAds;
use App\Address;
use Image;
use App\Models\City;
use App\Models\Country;
use App\Models\Hobby;
use App\Models\UserHobby;
use App\Models\UserLocation;
use App\Models\UserRelationship;
use App\ShopSetting;
use Auth;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Response;
use App\KnpShopImage;

class ProfileController extends Controller{

   private $user;
    private $my_profile = false;
      public function __construct()
    {
        $this->middleware('auth');
    }
   
   /*
   public function setPaymentMode(Request $request){
	   //print_r($request->all()); exit;
		  if(!empty($request->input("vendordetails_id"))){
			   $result = ShopSetting::addPaymentMode($request->all(),$request->input("vendordetails_id"));
			    //print_r($result);exit;
				if($result != FALSE){  echo"<span style='color:green;'>Save Successfully....</span>"; }
                  else{ echo"<span style='color:red;'>Unexpected try again....</span>"; }    	
			 }
		   else{
			  echo"Unexpected try again...";
			 }	
	}  */
   
   public function shopSetting(){
	  $data['title'] = "Shop Setting";
      if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
      $data['vresultData'] = VendorDetails::vendorShopList();
      //$data['shopImageData'] = VendorShopImage::getShopImage(session()->get('lastVendorID'));
	  $data['transactionAuthority'] = ShopSetting::getAuthority(session()->get('lastVendorID'));
	  //print_r($data['transactionAuthority']);exit;
      return view("vendor.shopSetting")->with($data);  
   }
   
   public function editVendorAddress(Request $request){
       $validator = Validator::make($request->all(),array(
         'add1'=>'required',
         'add2'=>'required',        
         'editneighbourhood' => 'required',
         'editpincode'=>'required|numeric',
         'editcity'=>'required',
         'editstate'=>'required',
        ));
          if($validator->fails()){
              return json_encode(
                       array(
                         "error"=> $validator->errors()->getMessages(),
                         "vStatus"=>400
                          ));
             }
        $result = Address::EditAddress($request->all());
        if($result != FALSE){
          return json_encode(
                        array(
                        "success"=>"<span style='color:#1a9970;'>Record edit Successfully...</span>",
                        "vStatus"=>700
                        ));
         }
        else{
            return json_encode(
                        array(
                        "success"=>"<span style='color:#f44b42;'>Unexpected try again...</span>",
                        "vStatus"=>500
                        ));
         }   
    }

   
   public function fetchAddress(){
      if(!empty($_GET['editid'])){
           $addressDetails = Address::getShopAddress(array("type"=>"vendorShop","shopID"=>session()->get('lastVendorID')),$_GET['editid']);
           if($addressDetails != FALSE){
                return json_encode($addressDetails);
             }
           else{
               echo"<span style='color:red;'>Unexpected try again....</span>";
             }   
        }
      else{
          echo"<span style='color:red;'>Unexpected try again...</span>";  
        }   
    }
    
   public function deleteAddress(){
      if(!empty($_GET['id'])){
           $result = Address::deleteAddrss($_GET['id']);
           if($result != FALSE){
               echo"<span style='color:red;'>Record Delete Successfully....</span>";
             }
           else{
               echo"<span style='color:red;'>Unexpected try again....</span>";
             }   
        }
      else{
          echo"<span style='color:red;'>Unexpected try again...</span>";  
        }   
    }
   
   
   public function vendorAddAddress(Request $request){
       $validator = Validator::make($request->all(),array(
         'address1'=>'required',
         'userID'=>'required',        
         'address2' => 'required',
         'pinCode'=>'required|numeric',
         'city'=>'required',
         'state'=>'required',
        ));
          if($validator->fails()){
              return json_encode(
                       array(
                         "error"=> $validator->errors()->getMessages(),
                         "vStatus"=>400
                          ));
             }
		$result = Address::addvendorAddress($request->all());
        if($result != FALSE){
          return json_encode(
                        array(
                        "success"=>"<span style='color:#1a9970;'>Record add Successfully...</span>",
                        "vStatus"=>700
                        ));
         }
        else{
            return json_encode(
                        array(
                        "success"=>"<span style='color:#f44b42;'>Unexpected try again...</span>",
                        "vStatus"=>500
                        ));
         }   
    }
   
   public function bannerImage($shopName){
      $data['title'] = "Vendor Shop Banner Image";
      if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
      $data['vresultData'] = VendorDetails::vendorShopList();
      $data['shopImageData'] = VendorShopImage::getShopImage(session()->get('lastVendorID'));
      return view("vendor.vendorBannerImage")->with($data);
    }
	
	/*
    
    public function shopBannerImage(Request $request){
        if(!empty($request->file('bannerImage'))){
                   $fileName = rand(1,9999).$request->file('bannerImage')->getClientOriginalName();
                   $imageName = str_replace(" ","-",$fileName);
                   $bannerImagePath = public_path('uploadFiles/shopBannerImage');
                   $bannerImage = Image::make($request->file('bannerImage')->getRealPath())->resize(2000, 600);
                   if($bannerImage->save($bannerImagePath.'/'.$imageName,80)){
                      $insertData = VendorShopImage::ShopBannerImage($request->all(),$imageName,$bannerImagePath);
                        if($insertData != FALSE){
                              return json_encode(
                                    array(
                                    "success"=>"<span style='color:green;'>Banner Image Add Successfully...</span>",
                                    "vStatus"=>700
                                    ));
                            }
                         else{
                            return json_encode(
                               array(
                                    "error"=>"Unexpected Try again..",
                                    "vStatus"=>500
                                  ));
                           }    
                    }
          }
    } */
   
   public function vendorAddressAction(Request $request){
        $validator = Validator::make($request->all(),array(
         'address1'=>'required','address2'=>'required','pinCode'=>'required|numeric',
         'city' => 'required','state'=>'required',
        ));
          if($validator->fails()){
              return json_encode(
                       array(
                         "error"=> $validator->errors()->getMessages(),
                         "vStatus"=>400
                          ));
             }
       $result = VendorbusinesDetails::editShopAddress($request->all());
       if($result != FALSE){
            return json_encode(
                       array(
                         "success"=> "<span style='color:green;'>Address Add Successfully...</span>",
                         "vStatus"=>700
                          ));
            }
       else {
              return json_encode(
                       array(
                         "failed"=>"<span style='color:red;'>unexpected try again...</span>",
                         "vStatus"=>500
                          ));
            }
    }
   
   public function pancardNumberFunc(){
      $pancardNumber = $_GET['pancardNumber'];
      $vID = $_GET['vendorsID'];
      $users_id = $_GET['userID'];
      if(!empty($pancardNumber)){
          $updatedata = array("panCardNumber"=>$pancardNumber,"editDate"=>time());
          $where = array("users_id"=>$users_id,"vendordetails_id"=>$vID);
          $updateResult = VendorDetails::vendorProfilesedit($updatedata,$where);
          if($updateResult != FALSE){
            echo "<p style='color:green;'>Pan Card Number save ....</p>";
          }
          else{
            echo "<p style='color:red;'>Unexpected Try again .....</p>";
          }
      }
      else{
          echo "<p style='color:red;'>Please Enter Pan Card Number  ...</p>";
      } 
    }
   
   public function vendorProfile(){
     $data['title'] = "Vendor Profile";
      if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
      $data['vresultData'] = VendorDetails::vendorShopList();
	   $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
      return view("vendor.vendorProfile")->with($data);
   }
  
  public function socialLink(){
     $data['title'] = "Vendor Social Links";
     if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
     $data['vresultData'] = VendorDetails::getSingleShopDetails();
	   $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
     return view("vendor.socialLink")->with($data);
  }
  
  public function vendorAddress(){
     $data['title'] = "Vendor Shop  Address";
        if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
        $data['vresultData'] = VendorDetails::vendorShopList();
        $data['addressList'] = Address::getShopAddress(array("type"=>"vendorShop","shopID"=>session()->get('lastVendorID')));
        $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
      return view("vendor.vendorAddres")->with($data);
   }
   
   public function shopNamefunc(){
      $shopName = $_GET['shopName'];
      $vID = $_GET['vendorsID'];
      $users_id = $_GET['userID'];
      //print_r($users_id);exit;
      if(!empty($shopName)){
          $updatedata = array("vName"=>$shopName,"editDate"=>time());
          $where = array("id"=>$vID,"users_id"=>$users_id);
          $updateResult = VendorDetails::socialLinks($updatedata,$where);
          if($updateResult != FALSE){
            echo "<p style='color:green;'>shop name save ....</p>";
          }
          else{
            echo "<p style='color:red;'>Unexpected Try again .....</p>";
          }
      }
      else{
          echo "<p style='color:red;'>Please Enter the valid Shop Name ...</p>";
      }
   } 
   
   public function ownernameFunc(){
      $ownerName = $_GET['ownerName'];
      $vID = $_GET['vendorsID'];
      $users_id = $_GET['userID'];
      if(!empty($ownerName)){
          $updatedata = array("ownerName"=>$ownerName,"editDate"=>time());
          $where = array("users_id"=>$users_id,"vendordetails_id"=>$vID);
          $updateResult = VendorDetails::vendorProfilesedit($updatedata,$where);
          if($updateResult != FALSE){
            echo "<p style='color:green;'>shop owner name save ....</p>";
          }
          else{
            echo "<p style='color:red;'>Unexpected Try again .....</p>";
          }
      }
      else{
          echo "<p style='color:red;'>Please Enter the valid Shop owner Name ...</p>";
      }
   }
   
   public function aboutBusinessfunc(){
      $aboutBusiness = $_GET['aboutBusiness'];
      if(strlen($_GET['aboutBusiness']) > 100){
          echo "<p style='color:#229DB6;'>About Shop Describe maximum 100 Character ...</p>";exit;
         }
      $vID = $_GET['vendorsID'];
      $users_id = $_GET['userID'];
      if(!empty($aboutBusiness)){
          $updatedata = array("aboutBusiness"=>$aboutBusiness,"editDate"=>time());
          $where = array("users_id"=>$users_id,"vendordetails_id"=>$vID);
          $updateResult = VendorDetails::vendorProfilesedit($updatedata,$where);
          if($updateResult != FALSE){
            echo "<p style='color:green;'>About business save ....</p>";
          }
          else{
            echo "<p style='color:red;'>Unexpected Try again .....</p>";
          }
      }
      else{
          echo "<p style='color:red;'>About business fields Required ...</p>";
      }
   }
   
   
   public function mobilelinksFunc(Request $request){
        $validator = Validator::make($request->all(),array(
          'mobileNumber'=>'required|numeric',
         ));
          if($validator->fails()){
              return json_encode(
                       array(
                         "error"=> $validator->errors()->getMessages(),
                         "vStatus"=>400
                          ));
             }
      $mobileNumber = $_GET['mobileNumber'];
      $vID = $_GET['vendorsID'];
      $users_id = $_GET['userID'];
      if(!empty($mobileNumber)){
          $updatedata = array("vMobile"=>$mobileNumber,"editDate"=>time());
          $where = array("id"=>$vID,"users_id"=>$users_id);
          $updateResult = VendorDetails::socialLinks($updatedata,$where);
          if($updateResult != FALSE){
            return json_encode(
                       array(
                         "msg"=>"<p style='color:red;'>Mobile Number save....</p>",
                         "vStatus"=>700
                          ));
          }
          else{
              return json_encode(
                       array(
                         "msg"=>"<p style='color:red;'>Unexpected Try again .....</p>",
                         "vStatus"=>700
                          ));
          }
      }
      else{
           return json_encode(
                       array(
                         "msg"=>"<p style='color:red;'>Please Enter the valid Mobile Number ...</p>",
                         "vStatus"=>700
                          ));
      }
   } 


    public function secure($username, $is_owner = false){
        $user = User::where('username', $username)->first();

        if ($user){
            $this->user = $user;
            $this->my_profile = (Auth::id() == $this->user->id)?true:false;
            if ($is_owner && !$this->my_profile){
                return false;
            }
            return true;
        }
        return false;
    }

    public function index($username){
        if (!$this->secure($username)) return redirect('/404');
        $user = $this->user;
        $my_profile = $this->my_profile;
        $wall = array('new_post_group_id'=>0);
        $can_see = ($my_profile)?true:$user->canSeeProfile(Auth::id());
        $list = $user->following()->where('allow', 1)->with('following')->get();
        $list2 = $user->follower()->where('allow', 1)->with('follower')->get();
        $hobbies = Hobby::all();
        $relationship = $user->relatives()->with('relative')->where('allow', 1)->get();
        $relationship2 = $user->relatives2()->with('main')->where('allow', 1)->get();
        $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
        $data['allShopListData'] = VendorDetails::getAllvendorShop();
        $data['allAdsPostData'] = VendorPostAds::getAdsPotsValid();


        return view('profile.index', compact('user', 'my_profile', 'wall', 'can_see', 'hobbies', 'relationship', 'relationship2','list','list2'))->with($data);
    }

    public function following(Request $request, $username){

        if (!$this->secure($username)) return redirect('/404');

        $user = $this->user;

        $list = $user->following()->where('allow', 1)->with('following')->get();

        $my_profile = $this->my_profile;

        $can_see = ($my_profile)?true:$user->canSeeProfile(Auth::id());
        $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
        $data['allShopListData'] = VendorDetails::getAllvendorShop();
        $data['allAdsPostData'] = VendorPostAds::getAdsPotsValid();

        return view('profile.following', compact('user', 'list', 'my_profile', 'can_see'))->with($data);
    }


    public function followers(Request $request, $username){

        if (!$this->secure($username)) return redirect('/404');

        $user = $this->user;

        $list = $user->follower()->where('allow', 1)->with('follower')->get();


        $my_profile = $this->my_profile;

        $can_see = ($my_profile)?true:$user->canSeeProfile(Auth::id());
        $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
        $data['allShopListData'] = VendorDetails::getAllvendorShop();
        $data['allAdsPostData'] = VendorPostAds::getAdsPotsValid();


        return view('profile.followers', compact('user', 'list', 'my_profile', 'can_see'))->with($data);
    }


    public function saveInformation(Request $request, $username){
        $response = array();
        $response['code'] = 400;
        if (!$this->secure($username, true)) return Response::json($response);

        $data = json_decode($request->input('information'), true);

        $data['map_info'] = json_decode($data['map_info'], true);

        $validator = Validator::make($data,array(
            'sex' => 'in:0,1',
            'birthday' => 'date',
            'phone' => 'max:20',
            'bio' => 'max:140',
        ));



        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $user = $this->user;
            $user->sex = $data['sex'];
            $user->birthday = $data['birthday'];
            $user->phone = $data['phone'];
            $user->bio = $data['bio'];
            $save = $user->save();
            if ($save){

                $response['code'] = 200;

                if (count($data['map_info']) > 1) {
                    $find_country = Country::where('shortname', $data['map_info']['country']['short_name'])->first();
                    $country_id = 0;
                    if ($find_country) {
                        $country_id = $find_country->id;
                    } else {
                        $country = new Country();
                        $country->name = $data['map_info']['country']['name'];
                        $country->shortname = $data['map_info']['country']['short_name'];
                        if ($country->save()) {
                            $country_id = $country->id;
                        }
                    }

                    $city_id = 0;
                    if ($country_id > 0) {
                        $find_city = City::where('name', $data['map_info']['city']['name'])->where('country_id', $country_id)->first();
                        if ($find_city) {
                            $city_id = $find_city->id;
                        } else {
                            $city = new City();
                            $city->name = $data['map_info']['city']['name'];
                            $city->zip = $data['map_info']['city']['zip'];
                            $city->country_id = $country_id;
                            if ($city->save()) {
                                $city_id = $city->id;
                            }
                        }
                    }


                    if ($country_id > 0 && $city_id > 0) {

                        $find_location = UserLocation::where('user_id', $user->id)->first();


                        if (!$find_location) {


                            $find_location = new UserLocation();
                            $find_location->user_id = $user->id;


                        }


                        $find_location->city_id = $city_id;
                        $find_location->latitud = $data['map_info']['latitude'];
                        $find_location->longitud = $data['map_info']['longitude'];
                        $find_location->address = $data['map_info']['address'];

                        $find_location->save();

                    }
                }

            }

        }


        return Response::json($response);
    }

    public function saveHobbies(Request $request, $username){

        if (!$this->secure($username)) return redirect('/404');


        $my_hobbies = Auth::user()->hobbies()->get();


        $list = [];

        foreach($request->input('hobbies') as $i => $id){
            $list[$id] = 1;
        }



        foreach($my_hobbies as $hobby){
            $hobby_id = $hobby->hobby_id;
            if (!array_key_exists($hobby_id, $list)){
                $deleted = DB::delete('delete from user_hobbies where user_id='.Auth::id().' and hobby_id='.$hobby_id);
            }
            unset($list[$hobby_id]);
        }



        foreach($list as $id => $status){
            $hobby = new UserHobby();
            $hobby->user_id = Auth::id();
            $hobby->hobby_id = $id;
            $hobby->save();
        }

        $request->session()->flash('alert-success', 'Your hobbies have been successfully updated!');

        return redirect('/'.Auth::user()->username);

    }

    public function saveRelationship(Request $request, $username){

        if (!$this->secure($username)) return redirect('/404');


        $relationship = $request->input('relation');
        $person = $request->input('person');


        $relation = new UserRelationship();
        $relation->main_user_id = $person;
        $relation->relation_type = $relationship;
        $relation->related_user_id = Auth::id();

        if ($relation->save()) {

            $request->session()->flash('alert-success', 'Your relationship have been successfully requested! He/She needs to accept relationship with you to publish.');

        }else{
            $request->session()->flash('alert-danger', 'Something wents wrong!');
        }

        return redirect('/'.Auth::user()->username);

    }

    public function uploadProfilePhoto(Request $request, $username){

        $response = array();
        $response['code'] = 400;
        if (!$this->secure($username, true)) return Response::json($response);

        $messages = [
            'image.required' => trans('validation.required'),
            'image.mimes' => trans('validation.mimes'),
            'image.max.file' => trans('validation.max.file'),
        ];
        $validator = Validator::make(array('image' => $request->file('image')), [
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        ], $messages);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $file = $request->file('image');

            $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
            if ($file->storeAs('public/uploads/profile_photos', $file_name)){
                $response['code'] = 200;
                $this->user->profile_path = $file_name;
                $this->user->save();
                $response['image_big'] = $this->user->getPhoto();
                $response['image_thumb'] = $this->user->getPhoto(200, 200);
            }else{
                $response['code'] = 400;
                $response['message'] = "Something went wrong!";
            }
        }
        return Response::json($response);

    }

    public function uploadCover(Request $request, $username){

        $response = array();
        $response['code'] = 400;
        if (!$this->secure($username, true)) return Response::json($response);

        $messages = [
            'image.required' => trans('validation.required'),
            'image.mimes' => trans('validation.mimes'),
            'image.max.file' => trans('validation.max.file'),
        ];
        $validator = Validator::make(array('image' => $request->file('image')), [
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        ], $messages);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $file = $request->file('image');

            $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
            if ($file->storeAs('public/uploads/covers', $file_name)){
                $response['code'] = 200;
                $this->user->cover_path = $file_name;
                $this->user->save();
                $response['image'] = $this->user->getCover();
            }else{
                $response['code'] = 400;
                $response['message'] = "Something went wrong!";
            }
        }
        return Response::json($response);

    }
  
}
