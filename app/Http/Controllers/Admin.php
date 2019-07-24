<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
//use validator;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\LoginModal;
use App\QuizModal;
use App\QuestionModal;
use App\ResultQuizModal;
use App\QuizParticanModal;
use App\Shop_categoryModel;
use App\CategoryModel;
use App\SubCategory;
use App\Models\User;
use App\VendorPostAds;
use App\VendorDetails;
use App\Module;
use App\products;
use App\UsersModule;
use App\Advertisement;
use App\AdsProfession;
use App\VendorbusinesDetails;
use Session;
use Image; 
use App\AdvertisementPackage;
use App\Recommnedshop;
use App\OfferNewsModel;
use App\ComplainSubject;
use App\VendorCatAuthority;
use App\Blog;
use App\Matrimonial_model;
use App\Notifications\TalentPublish;
use App\Notifications\ResetPassword;
use Notification;
use Illuminate\Notifications\Notifiable;
use Hash;


class Admin extends Controller{
   public $allow_roll = array(8,9);
   
   
   public function layout(){
    return view("newAdmin.template.layout");
   }
   
    
  
   
   public function page($page , $first = NULL){
	 $data['title'] = $page;
	  $data['admin_allowUrl'] = array(8);
	 $data['management_allowUrl'] = array(9);
	 $allow_roll = array(8 , 9);
	 //if(empty(session()->get('adminuser')) || !session()->get('adminuser')){ return redirect("admin/adminlogin"); }
	 if(!empty(Auth::user()->id)){
		 $adminDetails = User::get_users_details(array("id"=>Auth::user()->id));
		 if( ! in_array($adminDetails->roll_id , $this->allow_roll)){
			 return redirect('/');
		   }		 
	   }
	   
	  $data['un_read_notification'] = VendorDetails::get_notification("un_read");
	  $data['all_notifcation'] = VendorDetails::get_notification(); 
	  if($page == "cast_list"){
	     $data['castList'] = Matrimonial_model::getCast();
	   }
	 if($page == "editsubCat"){
	      $data['listArr'] = DB::table("knp_shopcategory")->get();
	      $data['subCategoryDetails'] = SubCategory::getsubCategory($first);
	   }
	 
	  if($page=="blog_list"){
	     $data['blogListArr'] = Blog::getallblog();
	    }
	 if($page == "talent_list"){
		$data['talentListArr'] = Blog::getTalent();
		}
	  if($page == "edit_talent"){
		  $data['talentDetails'] = Blog::getallTalent("Y" , $first);
		  //echo "<pre>";
		  //print_r($data['talentDetails']);exit; 
		}   
	 if($page == "addCategory"){
	       $data['listArr'] = Shop_categoryModel::getShopcat(3);
	   }
	   
	  if($page == "edit_blog"){
		 $data['blogdata'] = Blog::getBlogbyID($first);
	    }
	   if($page == "participant_list"){
		   $data['talentListArr'] = Blog::getallTalent("Y"); 
		 }
	  if($page == "participantTimeline"){
		   if(!empty($first)){
			  $data['participantDetails'] = Blog::getParticipateDetails(array("id"=>$first));
			  if($data['participantDetails'] != FALSE){
				$data['timeLineData'] = Blog::getParticipantData(array('participant_id'=>$data['participantDetails']->id));
			   }
			  //echo "<pre>";
			  //print_r($data['timeLineData']);exit;
			}
		 }	     		
	     	 	 
	 if($page == "shop_category"){
	     $data['listArr'] =  Shop_categoryModel::getShopcat(3);
	   }
	 
	 if($page == "addNewcat_subcat"){
	      $data['knp_shopCat'] = Shop_categoryModel::getShopcat(3);
	      $data['allVendor'] = VendorDetails::allValidVendor();
	      $data['allcatAuthority'] = VendorCatAuthority::getCatAuthority();
		  //echo "<pre>";
		  //print_r($data['allVendor']);exit;
	   }
	 
	 if($page == "addnewShopCat"){
	    //echo "yes welcome";exit;
	     $data['obj'] = new Shop_categoryModel;
	     $data['vendorDetails'] = vendorDetails::getShopDetails(array("id"=>base64_decode($first)));
	     $data['resultShop'] = Shop_categoryModel::getShoplist($data['vendorDetails']->categoryType);
	     $data['unRegistered'] = Shop_categoryModel::unregisteredShop($data['vendorDetails']->categoryType); 
	   }
	   
	 if($page == "editSaleShopcat"){
	       $data['vendorList'] = vendorDetails::allValidVendor();
	       $data['obj'] = new Shop_categoryModel;
	   }
	 
	 if($page == "complain"){
	     $data['subjectlistArr'] = ComplainSubject::addComplainSubject("fetchData");
	   }
	 if($page == "offersDetails"){
	      $data['offerNewsData'] = OfferNewsModel::allVendorOffersNews("1",base64_decode($first));
	   }
	 if($page == "vendorOffers"){
	     $data['allVendorOffersNew'] = OfferNewsModel::allVendorOffersNews(array("status"=>"Y"));
		
	   }
	 if($page == "recomendShop"){
	     $data['recommendshop'] = Recommnedshop::all();
		 
	   }
	   
	 if($page == "editAdsPackage"){
	     $data['packageData'] = AdvertisementPackage::getAdvertisementPackage(array("id"=>$first),$first);
		 //echo "<pre>";
		 //print_r($data['packageData']);exit;
	   }
	   
	 if($page == "dashboard"){	   
            $page = "dashboardBlank"; 
	   }
	 if($page == "users"){
	     $data['users'] = User::userList();
	     $data['vipUsers'] = User::userList(array("roll_id"=>3));
	     $data['activeUsers'] = User::userList(array("status"=>1)); 
		 $page = "dashboard";
	   }
	   
	   
	 if($page == "vendors"){
	 	if (isset($_GET['rem'])) { DB::table('vendordetails')->where('id', $_GET['rem'])->update(['coupon' => 'N']); }
	   	if (isset($_GET['app'])) { DB::table('vendordetails')->where('id', $_GET['app'])->update(['coupon' => 'Y']); }
	   	$data['vendorList'] = vendorDetails::adminGetallVendor();
          	$data['obj'] = new Shop_categoryModel;
	   } 
	   
	    
	 if($page == "vendorsProfile"){
	     if(!empty($first)){
		    $vID = base64_decode($first);		
		    $data['vendor_profile'] = vendorDetails::getAuthorityVendor($vID);
		   }
		 $data['obj'] = new Shop_categoryModel;  
	   }
	  
	 if($page == "vendorAds"){
	     $data['vendorPostAds'] = Advertisement::getAllAdvertisement(array("section_id" => 4));
	   } 
	 if($page =="adsDetails"){
	  	$data['vPostAdsDetails'] = Advertisement::getAdvertisement(array("id"=>base64_decode($first)),base64_decode($first));
	   }
	     
	 if($page == "userAds") {
	     $data['vendorPostAds'] = Advertisement::getAlluserAdvertisement(array("section_id"=>1));
	   }   
	 if($page == "adspackageList"){
	       $data['packageList'] = AdvertisementPackage::getAdvertisementPackage("1");
		   //echo "<pre>";
		   //print_r($data['packageList']);exit;
	   }
	 
	 if($page == "editShopCategory"){
		 $data['shopCategoryDetails'] = Shop_categoryModel::getShopcat("1",$first);
		} 
	 if($page == "category"){
		  $data['listArr'] = CategoryModel::Categorylist();
		}
	 if($page == "editCategory"){
	     $data['CategoryDetails'] = CategoryModel::Categorylist($first);
		 $data['listArr'] = Shop_categoryModel::all();
	   }
	 if($page == "addSubcat"){
		 $data['listArr'] = DB::table("knp_shopcategory")->get();
	   }
	 if($page == "subcategory"){
	    $data['listArr'] =  SubCategory::getsubCategory();
	   } 
	 if($page == "all_notification"){
	      $data['all_notify'] = VendorDetails::get_notification("all_notifi"); 
	   }    
	   if ($page == 'ngos') {
	   		if (isset($_GET['rem'])) { DB::table('ngo_tbl')->where('id', $_GET['rem'])->update(['status' => 'N']); }
	   		if (isset($_GET['app'])) { DB::table('ngo_tbl')->where('id', $_GET['app'])->update(['status' => 'Y']); }
	   	$data['ngos'] = DB::table('ngo_tbl')->select('ngo_tbl.*', 'users.name', 'users.lname', 'users.email', 'users.mobileNumber')->leftjoin('users', 'ngo_tbl.user' , 'users.id')->get();
	   } 
	   
	   if ($page == 'causes') {
	   		if (isset($_GET['rem'])) { DB::table('ngo_causes')->where('id', $_GET['rem'])->update(['status' => 'N']); }
	   		if (isset($_GET['app'])) { DB::table('ngo_causes')->where('id', $_GET['app'])->update(['status' => 'Y']); }
	   		$data['causes'] = DB::table('ngo_tbl')->join('ngo_causes', 'ngo_causes.ngo_tbl_id','ngo_tbl.id')->paginate(20);
	   } 
	   
	   if ($page == 'events') {
	   		if (isset($_GET['rem'])) { DB::table('knp_events')->where('id', $_GET['rem'])->update(['status' => 'N']); }
	   		if (isset($_GET['app'])) { DB::table('knp_events')->where('id', $_GET['app'])->update(['status' => 'Y']); }
	   		$data['events'] = DB::table('knp_events')->get();
	   }	
	   if ($page == 'event-new') {
	   		$data['events'] = DB::table('knp_events')->get();
	   }	
	     
     return view("newAdmin.".$page)->with($data);	 
   }
   
	public function action(Request $request , $action){
	  if(empty(Auth::user()->id)){
	    if(empty(Auth::user()->roll_id) || !in_array(Auth::user()->roll_id  , $this->allow_roll)) return redirect("/");
	   } 
	 
	        if($action == "add_cast"){
		   if(!empty($request->religion)){
			   if(!empty($request->castName)){
				   $result = Matrimonial_model::addCast($request);
				   if($result != FALSE){
					 return  redirect()->back()->with(array('msg' => '<div class="notice notice-success"><strong>Success , </strong>Record save successful . </div>.'));
					 }
				   else{
					 return  redirect()->back()->with(array('msg' => '<div class="notice notice-danger"><strong>Wrong , </strong>Unexpected try again .  </div>.'));
					 }	 
				 }
			   else{
				  return  redirect()->back()->with(array('msg' => '<div class="notice notice-danger"><strong>Wrong , </strong>Cast name is required . </div>.')); 
				 }	 
			 }
		   else{
			  return  redirect()->back()->with(array('msg' => '<div class="notice notice-danger"><strong>Wrong , </strong>Religion must be select . </div>.')); 
			 }	 
		 } 	 
	         
	        if($action == "add_religion"){
		   if(!empty($request->religion)){
			  $result = Matrimonial_model::addReligion($request);
			  if($result != FALSE){
				  return  redirect()->back()->with(array('msg' => '<div class="notice notice-success"><strong>Success , </strong> Record save successful  . </div>.')); 
				}
			  else{
				return  redirect()->back()->with(array('msg' => '<div class="notice notice-danger"><strong>Wrong , </strong>  Unexpected try again . </div>.'));
				}	
			 }
		  else{
			  return  redirect()->back()->with(array('msg' => '<div class="notice notice-danger"><strong>Wrong , </strong> Religion name is required . </div>.'));
			  }	 
		    }  
	
        	if ($action == 'event') {
	   		$message= ['required' => 'The :attribute can not be blank.'];
	   		$v = ['title'=>'required', 'description' => 'required', 'date1' => 'required', 'date2' => 'required'];
			$this->validate($request,$v, $message);
			$filename = md5(microtime()).'.'.$request->file('image')->getClientOriginalExtension();
			$path = public_path('storage/'.$filename);
			Image::make($request->file('image')->getRealPath())->save($path);
			$url = $this->slug($request->get('title'));
			$exist = TRUE; $i = 1;
			while ($exist) {
				$res = DB::table('knp_events')->where(['url' => $url])->first();
				if ($res) {
					$url .= $i;
				} else $exist = FALSE;
				$i++;
			}
			$data = [
				'user' => 1,
				'section' => 0,
				'section_id' => 0,
				'title' => $request->get('title'),
				'image' => $filename,
				'url' => $url,
				'description' => $request->get('description'),
				'status' => 'N',
				'from_date' => date_format(date_create($request->get('date1')),"Y-m-d H:i:s"),
				'upto_date' => date_format(date_create($request->get('date2')),"Y-m-d H:i:s"),
				'created_at' => date('Y-m-d h:i:s'),
				'updated_at' =>date('Y-m-d h:i:s') 
				];
			DB::table('knp_events')->insert($data);
			return redirect()->back()->with(['success' => 'Events has been added and will be published soon after aprovel!']);
		exit;
	   }
	   
	   if($action == "addShopcat"){
	     	 $categoryTypeArr = implode("@",$request->input("registeredShop"));
	      	$result  = vendorDetails::updateVendorData(array("categoryType"=>$categoryTypeArr,"editDate"=>time()),array("id"=>$request->input("shopID")));
		if($result != FALSE){ return  redirect()->back()->with(array('msg' => "<span class='alert alert-success'> <strong>More Category successful .</strong> </span>.")); }
		  else{ return redirect()->back()->with(array('msg' => "<span class='alert alert-danger'><strong>Unexpected try again....</strong></span>")); }
		  
	   }
	   
	    if($action == "add_talent"){
	     $v = array('title'=>'required',"description"=>"required");
	     $this->validate($request,$v);
		 if(!empty($request->file('talent_profileImage'))){
		     $uploadImageResult = $this->talentBannerImage($request->all());
			 if($uploadImageResult != 100){
				 $result = Blog::addNewTalent($request , $uploadImageResult);
				 //$users = User::find(349);
				 //$users = User::all();
				 //$mailData = array("heading"=>"Kanpurize organize a new Talent , Please hurry up and participant in Talent Competition ." , "talent_title"=>$request->title);
				 //$users->notify(new TalentPublish($mailData));
				 //Notification::send($users, new TalentPublish($mailData));
				 if($result != FALSE){
					 return redirect()->back()->with(array("msg"=>'<div class="notice notice-success"><strong>Yes , </strong> Talent Organized successful . </div>'));
				   }
				 else{
					 return redirect()->back()->with(array("msg"=>'<div class="notice notice-danger"><strong>Wrong , </strong> Unexpected try again . </div>'));
				   }  
				}
			 else{
				if($result == 100){
				  return redirect()->back()->with(array("msg"=>'<div class="notice notice-danger"><strong>Oops , </strong> Image must be support , jpg , jpeg , png . </div>')); 
			   }
			 }
		  }
		 else{
		    return redirect()->back()->with(array("msg"=>'<div class="notice notice-danger"><strong>Wrong , </strong> Image must be required . </div>')); 
		  }  
	   }
	   
	  if($action == "edit_talent"){
		 $v = array('title'=>'required',"description"=>"required");
	     $this->validate($request,$v);
		     $uploadImageResult = $this->talentBannerImage($request->all());
			 if($uploadImageResult != 100){
				 $result = Blog::editNewTalent($request , $uploadImageResult);
				 if($result != FALSE){
					 return redirect()->back()->with(array("msg"=>'<div class="notice notice-success"><strong>Yes , </strong> Talent Organized update successful . </div>'));
				   }
				 else{
					 return redirect()->back()->with(array("msg"=>'<div class="notice notice-danger"><strong>Wrong , </strong> Unexpected try again . </div>'));
				   }  
				}
			 else{
				if($result == 100){
				  return redirect()->back()->with(array("msg"=>'<div class="notice notice-danger"><strong>Oops , </strong> Image must be support , jpg , jpeg , png . </div>')); 
			   }
			 }
		} 
	   
	   
	   
	 if($action == "add_cast"){
		 echo "<pre>";
		 print_r($request->all());exit;
	   }
	 if($action=="edit_blog"){
		  //echo "<pre>";
		  //print_r($request->all());exit;
	     $v = array('title'=>'required',"description"=>"required");
	     $this->validate($request,$v);
		 $uploadImageResult = $this->BlogImageUpload($request->all());
		  if($uploadImageResult != 100){
			   $resultedit = Blog::editBlogPost($request->all(),$uploadImageResult);
			   if($resultedit != FALSE){
				 return redirect()->back()->with(array("msg"=> "<p style='color:green'><strong>Blog post Update successfully .</strong></p>."));
				 }
				else{
				  return redirect()->back()->with(array("msg"=> "<p style='color:red'><strong>unexpected try again .</strong></p>."));
				 } 
			}
		  else{
			   return redirect()->back()->with(array("msg"=> "<p style='color:red;'><strong>Invalid image format . image supported only jpeg, png, jpg</strong></p>"));
			}
	   }  
     
	 if($action="addblogPost"){
	      $v = array('title'=>'required',"description"=>"required");
	      $this->validate($request,$v);
	      $uploadImageResult = $this->BlogImageUpload($request->all());
		  if($uploadImageResult != 100){
			  $resultAdd = Blog::addblog($request->all(),$uploadImageResult);
			  //echo "<pre>";
			  //print_r($resultAdd);exit;
			  return redirect()->back()->with(array("msg"=>"<p style='color:green'><strong>Blog post upload successfully .</strong></p>"));
			}
		  else{
			   return redirect()->back()->with(array("msg"=>"<p style='color:red'><strong>Invalid image format . image supported only jpeg, png, jpg</strong></p>"));
			}
	   }	
	   
	   
	   
	   if($action == "editsubcat"){
		   $result = SubCategory::editSubCategory($request->all());
		  if($result != FALSE){ 
		     return  redirect()->back()->with(array('msg' => "<span class='alert alert-success'> <strong>Record Save Successful !!!.</strong> </span>."));
			}
		 else{  return  redirect()->back()->with(array('msg' => "<span class='alert alert-danger'> <strong> Unexpected try again  !!!.</strong> </span>.")); }   
		 
		 }
		 
		if($action == "addsubCate"){
			$v = array('shopCat'=>'required','scatname'=>'required', 'priority'=>'required','subDesc'=>'required','status'=>'required',);
		    $this->validate($request,$v);
			$result = subCategory::addSubcat($request);
			if($result != FALSE){ 
		     return  redirect()->back()->with(array('msg' => "<span class='alert alert-success'> <strong>Record Save Successful !!!.</strong> </span>."));
			}
		 else{  return  redirect()->back()->with(array('msg' => "<span class='alert alert-danger'> <strong> Unexpected try again  !!!.</strong> </span>.")); } 
	      }  
		  
	 if($action == "editcategory"){
	     $succes = CategoryModel::editCategory($request->all());
		 if($succes != FALSE){ 
		     return  redirect()->back()->with(array('msg' => "<span class='alert alert-success'> <strong>Record Update Successful !!!.</strong> </span>."));
			}
		 else{  return  redirect()->back()->with(array('msg' => "<span class='alert alert-danger'> <strong> Unexpected try again  !!!.</strong> </span>.")); } 
	   }
	     
	 if($action == "addcategory"){
	     $v = array('shopCat'=>'required','cname'=>'required','cDesc'=>'required','priority'=>'required',);
	     $this->validate($request,$v);
		 $result = categoryModel::addCategory($request);
		 if($result != FALSE){
		      return  redirect()->back()->with(array('msg' => "<span class='alert alert-success'> <strong>Record Save Successful !!!.</strong> </span>."));
		   }
		 else{
		   return  redirect()->back()->with(array('msg' => "<span class='alert alert-danger'> <strong> Unexpected try again  !!!.</strong> </span>."));
		  }  
	   }  
	   
	 if($action == "editshopCat"){
		 $succes = Shop_categoryModel::editShopCat($request->all() , $this->shopcategoryIcon($request));
		 if($succes){ 
		     return  redirect()->back()->with(array('msg' => "<span class='alert alert-success'> <strong>Record Update Successful !!!.</strong> </span>."));
		 }
		 else{
			return  redirect()->back()->with(array('msg' => "<span class='alert alert-danger'> <strong> Unexpected try again  !!!.</strong> </span>."));
			} 
	   } 
	    
	 if($action == "addshopcategory"){
	     $v = array('cname'=>'required|unique:knp_shopcategory,cname',
	                'cDescription'=>'required',);
	      $this->validate($request,$v);
	     $imageName = $this->shopcategoryIcon($request);
		 $result = shop_categoryModel::addShopcategory($request , $imageName);
		 if($result != FALSE){
		     return  redirect()->back()->with(array('msg' => "<span class='alert alert-success'> <strong>Record Save Successful !!!.</strong> </span>."));
		  }
		 else{
		     return  redirect()->back()->with(array('msg' => "<span class='alert alert-danger'> <strong> Unexpected try again  !!!.</strong> </span>."));
		  } 
		   
	   }  
	   
	   /*
	   
	 if($action == "addShopcat"){
	     echo "function is work";exit;
	      $categoryTypeArr = implode("@",$request->input("registeredShop"));
	      $result  = vendorDetails::updateVendorData(array("categoryType"=>$categoryTypeArr,"editDate"=>time()),array("id"=>$request->input("shopID")));
		  if($result != FALSE){ return  redirect()->back()->with(array('msg' => "<span class='alert alert-success'> <strong>More Category successful .</strong> </span>.")); }
		  else{ return redirect()->back()->with(array('msg' => "<span class='alert alert-danger'><strong>Unexpected try again....</strong></span>")); }
		  
	   } */
	    
	 if($action == "addComplainSubject"){
	      $v = array('complainSubject'=>'required','priority'=>'required','status'=>'required', );
	      $this->validate($request,$v);
	      $result = ComplainSubject::addComplainSubject($request->all());
		   if($result != FALSE){
			    return redirect()->back()->with(array('msg' => "<span class='alert alert-success'><strong>Record Insert Successfully !!! .</strong></span>"));
			 }
		   else{ return redirect()->back()->with(array('msg' => "<span class='alert alert-danger'><strong>Unexpected try again...</strong></span>"));
			 }	 
	   } 
	    
	 if($action == "editAdsPackage"){
	       $editDate = date('Y-m-d H:i:s'); 
	       $v = array('title'=>'required','duration'=>'required', 'description'=>'required');
	       $this->validate($request,$v);  
	       $editArr = array("numberOfAds"=>$request['numberofAds'], "numberOfPics"=>$request['pics'], "packageAmount"=>$request['amount'],"title"=>$request['title'] , "duration"=>$request['duration'] , "description"=>$request['description'] , "forPackageTye"=>$request['packageType'] , "status"=>$request['status']);
	     $result = AdvertisementPackage::editAdvertisementPackage($editArr,$request->editID);
		  if($result != FALSE){ return  redirect()->back()->with(array('msg' => "<span class='alert alert-success'> <strong>Record Update successful .</strong> </span>.")); }
		  else{ return redirect()->back()->with(array('msg' => "<span class='alert alert-danger'><strong>Unexpected try again....</strong></span>")); }
	   }  
	   
	 if($action == "postAdvertisement"){
	     $v = array('title'=>'required','amount'=>'required','duration'=>'required','description'=>'required' );
		 $this->validate($request,$v);  
		 $result = AdvertisementPackage::addAdvertisementPackage($request->all());
		 if($result != FALSE){ return  redirect()->back()->with(array('msg' => "<span class='alert alert-success'> <strong>Package add successfully</strong> ."));  }
		 else{ return redirect()->back()->with(array('msg' => "<span class='alert alert-danger'><strong>Unexpected try again....</strong></span>"));  }
	   }
   }
   
   public function ajaxGetaction(Request $request , $action){
        //if(empty(session()->get('adminuser')) || !session()->get('adminuser')){ return redirect("admin/adminlogin"); }  
        if(empty(Auth::user()->id)){
	     if(empty(Auth::user()->roll_id) || !in_array(Auth::user()->roll_id  , $this->allow_roll)) return redirect("/");
	   }
          if($action == "getWinner"){
		  if(!empty($request->talentID)){
		     $result = Blog::getWinner($request->talentID);  
			 if($result != FALSE){
			      return json_encode(array('status'=>2 , 'winnerList'=>$result));
				}
			 else{
				 return json_encode(array('status'=>1, 'msg'=>'<div class="notice notice-danger"><strong>Oops , </strong>Un-expected try again !!!.  </div>'));exit;  
				}	 
			}
		  else{
			   return json_encode(array('status'=>1, 'msg'=>'<div class="notice notice-danger"><strong>Oops , </strong>Something Wrong . </div>'));exit; 
			}	
		}
		
         
	 if($action == "changetalentStatus"){
		if(!empty($request->talentID) || !empty($request->status)){
		    $result = Blog::updateTalent(array("id"=>$request->talentID) , array("c_status"=>$request->status , "update_at"=>time()));
			if($result != FALSE){
				echo '<div class="notice notice-success"><strong>Success , </strong> Status Change  Successful. </div>';exit;
				}
			else{
			   echo '<div class="notice notice-success"><strong>Wrong , </strong>Unexpected , try again. </div>';exit;
			  }
		  }
	   }
      
         if($action == "deleteTalent"){
	      if(!empty($request->id)){
			  $result = Blog::deleteTalent($request->id);
			  if($result != FALSE){
				   echo '<div class="notice notice-success"><strong>Success , </strong> Delete Successful. </div>';exit;
				}
			  else{
				  echo '<div class="notice notice-success"><strong>Wrong , </strong> Unexpected try again . </div>';exit;
				}	
			}
		}
        
         if($action == "getCastDetails"){
	     if(!empty($request->edit_id)){
		    $result = Matrimonial_model::getCast($request->edit_id);
		    return json_encode(array("status"=>200 , "result"=>$result)); 
		   }
		 else{
		  echo json_encode(array("status"=>100 , "msg"=>'<div class="notice notice-success"><strong>Success , </strong> Edit Successful. </div>'));exit;
		 } 
	   }  
	   
	   if($action == "editReligion"){
	     if(!empty($request->editID) || !empty($request->religionName)){
		     $result = Matrimonial_model::editReligion(array("religion"=>$request->religionName , "c_status"=>$request->status) , array("id"=>$request->editID));
		     if($result != FALSE){
			    echo '<div class="notice notice-success"><strong>Success , </strong> Edit Successful. </div>';exit;
			   }
			 else{
			    echo '<div class="notice notice-warning"><strong>Opps , </strong> Something not edit . </div>';exit;
			   }  
		   }
		 else{
		    echo '<div class="notice notice-danger"><strong>Wrong , </strong> Unexpected try again . </div>';exit;
		   }  
	   }
	   
	    if($action == "getReligion"){
		  $result = Matrimonial_model::getReligion();
		  return json_encode($result); 
	     }   	 
   
   
         if($action=="deleteBlog"){
			  if(!empty($_GET['id'])){
				$result = Blog::deleteBlog($_GET['id']);
				if($result != FALSE){
					echo "<p style='color:green'><strong>Record Delete successfully .</strong></p>.";
				  }
				else{
					echo "<p style='color:red'><strong>unexpected try again .</strong></p>.";
				  }  
			  }
			else{
				echo "<p style='color:red'><strong>unexpected try again .</strong></p>.";
			  }
	  }
      
         if($action == "verifyBlock"){
            if(!empty($request->status) && !empty($request->participant_id)){
			  if($request->status == "Y") { $status = "N"; }
			  if($request->status == "N"){ $status = "Y"; }
			  $result = Blog::edittalentPraticipate(array("admin_status"=>$status , "updated_at"=>time()) , array("id"=>$request->participant_id));
			  if($request->status == "Y"){
				  if($result != FALSE){ echo $status; }else{ echo 2; }
				}
			  else if($request->status == "N"){
				  if($result != FALSE){ echo $status; }else{ echo 2; }
				} 	
			}
		  else{ echo "Unexpected , try again .";exit; } 	
          }
         
         if($action == "getParticipant"){
		  if(!empty($request->id)){
		     $all_participant_list = Blog::get_participate($request->id); 
			 if($all_participant_list != FALSE){
			     return json_encode(array('status'=>1, 'getParticipant'=>$all_participant_list));
			   }
			 else{
				 return json_encode(array('status'=>2, 'msg'=>'<div class="notice notice-danger"><strong>Oops , </strong>No participant available .</div>'));exit;
			  }  
		   }
		  else{
		     return json_encode(array('status'=>2, 'msg'=>'<div class="notice notice-danger"><strong>Oops , </strong>Unexpected try again . </div>'));exit;
		   } 
		}
           
         
         if($action == "read_notification"){
	      $result = VendorDetails::read_update_status(array("admin_receiver"=>1 , "read_status"=>NULL) , array("read_status"=>1));
	      if($result != FALSE){
			  echo json_encode(array("status"=>1 , "unread_msg"=>0));exit;
			}
		  else echo "Unexpected  , try again .";exit;
	   } 
         
	 if($action == "changeSubCategory"){
		   $result = SubCategory::subCategory($request->category_id,"N");
		   if($result != FALSE){
			   foreach($result as $list){
				  ?>
				  <option value="<?php echo $list->sid; ?>"><?php echo $list->subCatname; ?></option>
				  <?php
				}
			 }
		   else{
			   ?>
			   <option value="0">--No--Category--Available--</option>
			   <?php
			}   
	   }
	   
	 if($action == "changeCategory"){
	     if(!empty($request->shopCatID)){
		  $resultshopcat = CategoryModel::category($request->shopCatID);
		   if($resultshopcat != FALSE){
				 ?>
				 <select name="catID" id="catID" class="form-control">
                    <option value="undefined">--Select--category--</option>
				   <?php
                     foreach($resultshopcat as $listCat){
					   ?>
					   <option value="<?php if(!empty($listCat->id )) echo $listCat->id; ?>"><?php if(!empty($listCat->csname )) echo $listCat->csname; ?></option>
					   <?php      
					}
				   ?>           
				 </select>
				 <?php
				}
		     else{  echo"<strong>No Record Found...</strong>";	}		
		  }
	    else{  echo"Please Select valid Shop Category..."; }
	   }
	     
	 if($action == "fetchUserbyDate"){
	     if(!empty($request->firstdate)){
		  if(!empty($request->lastDate)){
			  $result = User::getUsersByDate(strtotime($request->firstdate),strtotime($request->lastDate));
			  if($result != FALSE){
				  ?>
				  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID #</th>
                        <th>Name </th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Pin Code</th>
                        <th>Mobile </th>
                        <th>Join Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
					  if($result != FALSE){
                        $i=1; 
                        foreach($result as $listArr){
                          ?>
						  <tr>
                          <td><?php if(!empty($i)) echo $i;  ?></th>
                          <td><?php if(!empty($listArr->name)) echo $listArr->name; ?></td>
                          <td><?php if(!empty($listArr->email)) echo $listArr->email; ?></td>
                          <td>
                          <?php if($listArr->status==1){?><span class="label label-success">verify</span><?php }
                                else{ ?><strong><span class="label label-warning">pending</span></strong><?php } ?>
                         </td>
                          <td><?php if(!empty($listArr->pincode))echo  $listArr->pincode; ?></td>
                          <td><?php if(!empty($listArr->mobileNumber)) echo  $listArr->mobileNumber; ?> </td>
                          <td><?php if(!empty($listArr->created_at)) echo  date("d-M-Y h:ia",$listArr->created_at); ?></th>
                          <td><a href="#" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a></td>
                         </tr>
						  <?php
                          $i++; 
						}
			           }
					  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID #</th>
                        <th>Name</th>
                        <th>Email</th>
                          <th>Status</th>
                        <th>Pin Code</th>
                        <th>Mobile</th>
                        <th>Join Date</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
				  <?php
				}
			}
		  else{ echo "select Second Date ."; }	
		}
	   else{ echo "select First Date ."; }	 
	   }  
	 if($action == "delsubCat"){
		   if(!empty($request->id)){
			   $result = SubCategory::deleteRecord($request->id);
			   if($result != FALSE){ echo 1; }
			   else{ echo "Unexpected try again !!!. "; }
			}
			else{ echo"Unexpected try again !!!. "; }	
	   }
	     
	 if($action == "delCategory"){
	     if(!empty($request->id)){
		   $result = CategoryModel::deleteRecord($request->id);
		   if($result != FALSE){ echo 1; }
		   else{ echo "<p class='alert alert-danger'>Unexpected try again....</p>"; }
		}
	   else{ echo"Unexpected try again..."; }		
	   }  
	   
	 if($action == "delShopCat"){
	    if(!empty($request->id)){
		   $result = Shop_categoryModel::deleteRecord($request->id);
		   if($result != FALSE){ echo "Record Delete successfully....";exit; }
		   else{ echo "Unexpected try again...."; exit; }
		}
	   else{ echo"Unexpected try again...";exit; }
	  }
	   
	 if($action == "deleteSubject"){
	     $deleteResult = ComplainSubject::addComplainSubject($request->input("id"),"deleteSubjectList");
		 if($deleteResult != FALSE) echo "Record delete successfully..";
		 else echo "Unexpected try again...";
	   }
	   
	 if($action == "vVerifyOffersNews"){
	     $succes = OfferNewsModel::BlockorUnblock($request->all());
		 print_r($succes);exit;
	   }  
	 if($action == "delPackageList"){
	     if(!empty($request->id)){
		    $deleteRecord = AdvertisementPackage::delPackageList($request->id);
			if($deleteRecord != FALSE){ echo 1;exit;  } else{ echo "Unexpected try again .";exit; }
		  }
		 else{ echo "Unexpected try again .";exit;  } 
	   }  
	   
	 if($action == "vVerifyAds"){
	      if(!empty($request->status) || !empty($request->id)){
	         $result = Advertisement::BlockorUnblock(array("adminStatus"=>$request->status , "updated_at"=>date('Y-m-d H:i:s')) , array("id"=>$request->id));
			 if($request->status == "Y"){$status  = "Verify" ;}else{ $status  = "Block" ; }
			 if($result != FALSE){ echo "Advertisement ".$status ." Successful !!!."; }else echo "Unexpected try again !!!.";
		   }
		 else{ echo "Unexpected try again ."; } 
	   }  
	   
     if($action == "paumentStaus"){
	     if(!empty($request->valueStatus) || !empty($request->id)){
	         $result = vendorDetails::updateVendorData(array("paymentStatus"=>$request->valueStatus , "editDate"=>time()) , array("id"=>$request->id));
			 if($result != FALSE){ echo  1; }else echo 2;
		   }
		 else{ echo "Unexpected try again ."; }  
	   }
	   
	  if($action == "vDetailsBlockorUnblock"){
	     if(!empty($request->status) || !empty($request->id)){
			 $result = vendorDetails::updateVendorData(array("crvStatus"=>$request->status , "editDate"=>time() ) , array("id"=>$request->id));
			  if($result != FALSE)echo 1; else echo 2;
		   }
		 else{ echo "Unexpected try again ."; }  
	   }
	   
	  if($action == "businessStatus"){
		  if(!empty($request->status) || !empty($request->id)){
			 $result = VendorbusinesDetails::editBusinessDetails(array("adminStatus"=>$request->status , "editDate"=>time() ) , array("id"=>$request->id));
			  if($result != FALSE)echo 1; else echo 2;
		   }
		 else{ echo "Unexpected try again ."; } 
		}  
	   
   }
   
   public function ajaxPostaction(Request $request , $action){
     if($action == "editCast"){
		$validator = Validator::make($request->all(),array('editID' => 'required',
             'religion' => 'required','castName'=>'required'));
			if($validator->fails()){
			return json_encode(array("error"=> $validator->errors()->getMessages(),"vstatus"=>400)); } 
		if(!empty($request->religion) || $request->religion != 0){
		    $result = Matrimonial_model::editReligion(array("religion"=>$request->religion , "cast"=>$request->castName ,"c_status"=>$request->status, "updated_at"=>time() ) , array("id"=>$request->editID));
			if($result != FALSE){
			    return json_encode(array("msg"=>'<div class="notice notice-success"><strong>Success , </strong> Edit Successful . </div>.' ,"vstatus"=>100));  
			  }
			else{
			   return json_encode(array("msg"=>'<div class="notice notice-warning"><strong>Oops , </strong> Something not update . </div>.' ,"vstatus"=>100));  
			  }  
		  }
		else{ 
		  return json_encode(array("msg"=>'<div class="notice notice-danger"><strong>Wrong , </strong> Religion name is required . </div>.' ,"vstatus"=>100));  
		  }   
	   } 
     
     if($action == "addMorecat_subcat"){
	      $validator = Validator::make($request->all(),array('vendordetails_id' => 'required',
             'knp_shopcategory_id' => 'required','category_id'=>'required', 'subcategory_id'=>'required' ));
				if($validator->fails()){
				return json_encode(array("error"=> $validator->errors()->getMessages(),"vStatus"=>400)); }
	  
			  $duplicate = VendorCatAuthority::checkduplicateAuthority($request->all());
			  if($duplicate== FALSE){
				   $result = VendorCatAuthority::addAuthority($request->all());
				   if($result){
					  return json_encode(array("success"=>"Record add successfully...", "vStatus"=>700 )); 
					 }
			    }
			  else{ return json_encode(array("duplicate"=>"Duplicate entry not allowed...", "vStatus"=>100 ));
			   }	
		 }
   }
   
   
    public function getUserDetails(Request $request){
	  if(is_numeric($request->sendOn)){
		if(User::checkUniqeValue(array("mobileNumber"=>$request->sendOn)) == TRUE) {
                        $enctype = md5(time().$request->sendOn);
			$sendUrl = url("users/password_reset")."/".$enctype;
			$message = "Click here this ".$sendUrl." link for Reset your password ";
			$sendResult = VendorDetails::sendMobileSms($message , $request->sendOn);
			$result = User::editUsersDetails(array("mobileNumber"=>$request->sendOn) , array("reset_token"=>$enctype));
			if($result != FALSE){
				  echo '<div class="notice notice-success"><strong>Success, </strong> Password Reset link Send in your Registered Mobile Number !!! . </div>';exit;
			}else{
		         echo '<div class="notice notice-danger"><strong>Wrong, </strong> Something Wrong  !!! . </div>';exit;
		        }
                  }
	       else{
		       echo '<div class="notice notice-danger"><strong>Wrong, </strong> User crediantial did not match  !!! . </div>';exit;
		  }  
	    } 
	  else{
             $userDetails = User::get_users_details(array("email"=>$request->sendOn) , "find");
             if($userDetails  != FALSE){
                  $enctype = md5(time().$request->sendOn);
                  $sendUrl = url("users/password_reset")."/".$enctype;
                  $mailData = array("linkurl"=>$sendUrl);
                  Notification::send($userDetails  , new ResetPassword($mailData));
                  $result = User::editUsersDetails(array("email"=>$request->sendOn) , array("reset_token"=>$enctype));
                  if($result != FALSE){
					  echo '<div class="notice notice-success"><strong>Success, </strong> Password Reset link Send in your Registered Mail   !!! . </div>';exit;
		           }
		          else{
		              echo '<div class="notice notice-danger"><strong>Wrong, </strong> Something Wrong  !!! . </div>';exit;
		           }                  
                }  
		      else{
				 echo '<div class="notice notice-danger"><strong>Wrong, </strong> User crediantial did not match  !!! . </div>';exit;
				}		                       
	    }	
   }
   
   
   public function resetPassword(Request $request){
    if(!empty($request->token)){
	      if($request->password == $request->conpassword){
			if(empty($request->password) || empty($request->conpassword) || empty($request->emailMobile)){
				 return redirect()->back()->with(array('msg' => '<div class="notice notice-danger"><strong>Wrong , </strong> All Field are required  !!! . </div>')); 
			  }
			else{
			   $v = array('password'=>'required|min:6');
			   $this->validate($request,$v); 	
			   if( is_numeric($request->emailMobile) ){
					 $con = array("mobileNumber"=>$request->emailMobile); 
					}
				 else{
					  $con = array("email"=>$request->emailMobile); 
					}	
				 $result = User::get_users_details($con);
				 if($result->reset_token == $request->token){
					 $con['reset_token'] = $result->reset_token;
					 $result = User::editUsersDetails($con , array("password"=>bcrypt($request->password)));
					 if($result != FALSE)
					 return redirect("/login")->with(array('msg' => '<div class="notice notice-success"><strong>success , </strong>  Password reset successful !!! . </div>'));
					 else 
					 return redirect()->back()->with(array('msg' => '<div class="notice notice-danger"><strong>Unexpected  , </strong>  Try again   !!! . </div>'));
					 
				   }
				 else{
					return redirect('reset/password')->with(array('msg' => '<div class="notice notice-danger"><strong>Wrong , </strong>  your link had been expired , please generate new reset link  !!! . </div>'));
				   }  
			  }  
		   }
		 else{
			 return redirect()->back()->with(array('msg' => '<div class="notice notice-danger"><strong>Wrong , </strong>  Password did not matched  !!! . </div>'));
		   }  
	   }
	else{
	    return redirect()->back()->with(array('msg' => '<div class="notice notice-danger"><strong>Wrong , </strong>  Something Wrong  !!! . </div>'));
	  }    
   }
     
   
   public function loginCon(Request $request){
	 $this->validate($request, array('username'  => 'required', 'password' => 'required',));
	 $result = User::adminLogin($request);
	 if($result != FALSE){
		if(Hash::check($request->password , $result->password)){
		  if($result->status == 1){
			  if(in_array($result->roll_id , $this->allow_roll)){
			     Auth::login($result);
				  //$userData = User::find($result->id);
			      //Auth::login($userData);
			      //session(array('adminuser'=>$result->id , "adminuser_type"=>$result->roll_id));
			      return redirect('admin/dashboard');
			    }
			  else{
				  return redirect()->back()->with(array('msg' =>'<div class="notice notice-danger"><strong>Wrong , </strong>  You have no permission for login !!! . </div>')); 
				}	
			  }
		  else{
			  return redirect()->back()->with(array('msg' => '<div class="notice notice-danger"><strong>Wrong , </strong>  You have no permission for login !!! . </div>'));         
			}
		 }
		else{ return redirect()->back()->with(array('msg' => '<div class="notice notice-danger"> <strong>Wrong , </strong>Password does not match .</div>'));            }  
	   }
	 else{ return redirect()->back()->with(array('msg' => '<div class="notice notice-danger"> <strong>Wrong , </strong> Invalid Usersname !!!. .</div>'));  }  
   }
   
   
    public function adminlogin(){
       //echo "<pre>";
       //print_r(Auth::user());exit;
	  if(!empty(Auth::user()->id)){
		 $adminDetails = User::get_users_details(array("id"=>Auth::user()->id));
		 //print_r($this->allow_roll);exit;
		 if(in_array($adminDetails->roll_id , $this->allow_roll)){
		      return redirect('admin/dashboard');
		    }
		 else{
		     return redirect('/');
		   } 
	   }	
     return view("newAdmin.adminlogin");
   }
   
   public function passwordReset(){
     return view('passwordReset');	  
   }
   
    public function password_reset($token){
      if(!empty($token)){
          $data['token'] = $token;
          return view('password_reset')->with($data) ;
        }
       else return redirect()->back();     
    } 
   
   
   public function signout(){
   Session::flush();
     Auth::logout();
	 return redirect("/");
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
