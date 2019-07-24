<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Auth;
//use validator;
use App\Shop_categoryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\CategoryModel;
use App\SubCategory;
use App\VendorDetails;
use App\VendorCatAuthority;
use App\OfferNewsModel;
use App\ComplainSubject;
use App\Attribute;
use App\Newquestion;
use App\Answerserve;
use App\ComplainModel;
use App\ComplainDetails;
use App\AdvertisementPackage;
use Session;

class BackendController extends Controller{
   
    public function __construct() {
       date_default_timezone_set('Asia/Calcutta');  
     }
 
   
    
  
   public function postAdvertisement(Request $request){
	  $v = array('title'=>'required','numberofAds'=>'required','amount'=>'required','duration'=>'required',
				   'description'=>'required'
				  );
	  $this->validate($request,$v);  
	 $result = AdvertisementPackage::addAdvertisementPackage($request->all());
	  if($result != FALSE){ $msg = "Package add successfully .";  }
	   else{ $msg = "Unexpected try again..."; }
	   if(isset($msg)){
		   session()->flash('msg',"<p class='alert alert-info'>$msg</style>");
		   return redirect()->back()->with('success', array('your message,here'));
		 }
   }

  
  /*
   
   public function addShop(Request $request){
	   $data['title'] = "Extra Sales Shop Category";
	   if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){ return redirect('adminlogin');  }
	   $categoryTypeArr = implode("@",$request->input("registeredShop"));
	   $result  = vendorDetails::socialLinks(array("categoryType"=>$categoryTypeArr,"editDate"=>time()),array("id"=>$request->input("shopID")));
       if($result != FALSE){ $msg = "More Shop Registered...";  }
	   else{ $msg = "Unexpected try again..."; }
	   if(isset($msg)){
		   session()->flash('msg',"<p class='alert alert-info'>$msg</style>");
		   return redirect()->back()->with('success', array('your message,here'));
		 }	   	 
   }
   
   */
   
   
     
   public function resendOTP(Request $request){
	  if(!empty($request->input("shopID")));{
		  $otp = rand(111111,999999);
		  $data = VendorDetails::socialLinks(array("otp"=>$otp,"otpTiming"=>time()),array("id"=>$request->input("shopID")));
		  if($data != FALSE){
			  $message = $otp."  is your otp Varification"; 
		     $otpResult = VendorDetails::sendMobileSms($message,$request->input("mobileNumber"));
		   }
		}
	  
   } 
   
    
}
