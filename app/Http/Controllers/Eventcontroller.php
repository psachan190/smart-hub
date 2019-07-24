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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\loginModal;
use App\User;
use App\QuizParticanModal;
use App\QuizanswerModal;
use App\VendorRegistration;
use App\VendorCategory;
use App\Knp_vendorbusinesstype;
use App\Shop_categoryModel;
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
use App\EventCategory;
use App\Knpeventmodel;
use Cart;
use Auth;
use Mail;

class Eventcontroller extends Controller{
        

        public function editEventcategoryAction(Request $request){
	  if(!empty($request->categoryID)){
		   $v = array('categoryID'=>'required',"categoryName"=>"required");
	       $this->validate($request,$v); 
		   $result = EventCategory::editEventCategory($request->all());
		   if($result != FALSE){ 
		     $err =  "<p class='alert alert-success'>&nbsp;Record update successful .</p>";
		    }
		   else{
			   $err =  "<p class='alert alert-danger'>&nbsp;Unexpected try again .</p>";
			}	
			
		  if(isset($err)){
			session()->flash('msg',"$err");
		    return redirect()->back()->with('success', array('your message,here')); 
		  }	
			
		}
	   else{ return redirect()->back(); }	
	}



        public function editEventCategory($categoryID){
	  $data['title'] = "kanpurize Event Category List";
	  if(!empty($categoryID)){
		  //echo "<pre>";
		  $data['result'] = EventCategory::eventcategoryList($categoryID);
		  //print_r($data['result']);exit;
		  return view("Admin.editEventCategory")->with($data);
		}
	   else{ return redirect()->back(); }	
	}
	
	public function deleteEventCategry(Request $request){
       if(!empty($request->delid)){
		   $result = EventCategory::delEventCat($request->delid);
		   if($result != FALSE){
			   echo "<p class='alert alert-success'>Record delete successfully</p>";
			 }
		   else{
			   echo "<p class='alert alert-danger'>Unexpected try again </p>";
			} 	 
		 }
	   else{
		      echo "<p class='alert alert-danger'>Unexpected try again </p>";
		 }	 
       }
	
	
	public function goForLive(){
	   if(!empty($_GET['vendorID'])){
		  if(!empty($_GET['status'])){
			 $details = VendorDetails::find($_GET['vendorID']);
			 $data = array("name"=>$details->vName);
				  Mail::send('emails.goLiveinMarketplace',$data, function ($message) {
				     $message->from('info@kanpurize.com', 'Kanpurize');
				     $message->to("vivek.gupta@kanpurize.com")->subject('Account Verification !');
				  });
			  $result = VendorDetails::socialLinks(array("goLiveRequest"=>1),array("id"=>$_GET['vendorID'])); 
		       if($result != FALSE){
			      echo "Request has been sent successfully.";
			     }
		       else{
		          echo "<span style='color:red;'><strong>Request already  send .</strong></span>";
			    }   
			} 
		 }
	   else{
		   echo "<span style='color:red;'><strong>Pin Code Number is Reqired.</strong></span>";
		 } 
	}
	
	
	
	
	public function checkpinCodeValidation(){
	   if(!empty($_GET['pincodevalue'])){
		   $result = KnpPincodeModel::matchPincode(array("pincode"=>$_GET['pincodevalue'])); 
		   if($result != FALSE){
			    echo 1;
			 }
		    else{
		      echo "<span style='color:red;'><strong>We don't provide service in this Area .</strong></span>";
			 }	  
		 }
	   else{
		   echo "<span style='color:red;'><strong>Pin Code Number is Reqired.</strong></span>";
		 } 	 
	 }
	
   public function Kanpur_event(){
	$data['title'] = "User socialperson";
	if(empty(session()->get('knpUser_id')) || empty(session()->get('knpUser_name')) || empty(session()->get('knpUser_email'))){
		return redirect("Kanpurize_login");
	}
	$data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
	$data['allShopListData'] = VendorDetails::getAllvendorShop();
	$data['allAdsPostData'] = VendorPostAds::getAdsPotsValid();
	return view("kanpur.Event")->with($data);
  }
  
    public function Kanpur_eventpost(){
	$data['title'] = "User socialperson";
	if(empty(session()->get('knpUser_id')) || empty(session()->get('knpUser_name')) || empty(session()->get('knpUser_email'))){
		return redirect("Kanpurize_login");
	}
	$data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
	$data['allShopListData'] = VendorDetails::getAllvendorShop();
	$data['allAdsPostData'] = VendorPostAds::getAdsPotsValid();
	return view("kanpur.kanpur_eventpost")->with($data);
  }
  
 
  
  public function eventcategoryAction(Request $request){
	   //print_r($request->all());exit;
	   $v = array('categoryName'=>'required');
	   $this->validate($request,$v); 
	   $result  = EventCategory::addEventCategory($request->all());
	   if($result != FALSE){
		  $msg = "<span style='color:green;'><strong>Event Category Add Successfully...</strong></span>";
		 }
	   else{
		     $msg = "<span style='color:red;'><strong>unexpected try again .</strong></span>";
		 }	 
	   if(isset($msg)){
			session()->flash('msg',"$msg");
		    return redirect()->back()->with('success', array('your message,here')); 
		  }
   }
  
  
  public function addEvent(){
      $data['title'] = "View Vendor Offers Details";
	  if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){ return redirect('adminlogin');  }
	  $data['eventCategory']  = EventCategory::eventcategoryList();
	  return view("Admin.addEvent")->with($data);
   }
   
  public function EventCategoryList(){
      $data['title'] = "View Event Category List";
	  if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){ return redirect('adminlogin');  }
	  $data['result']  = EventCategory::eventcategoryList();
	  //echo "<pre>";
	  //print_r($data['result']);exit;
	  return view("Admin.eventCategoryList")->with($data);
   } 
  
  
    public function kanpuradmineventList(){
	  $data['title'] = "Kanpur Admin Event List";
	  if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){ return redirect('adminlogin');  }
	  $data['eventList'] = Knpeventmodel::geteventList();
	  return view("Admin.kanpuradmineventList")->with($data);
   }
}
