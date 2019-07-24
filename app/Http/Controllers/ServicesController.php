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
use App\Shop_categoryModel;
use Session;
use App\VendorDetails;
use App\VservicesModel;
use Auth;
use Mail;
use App\OfferNewsModel;
use App\KnpShopImage;
use App\WishList;
use App\GalleryModel;

//use App\mail\newMail;
//use Illuminate\support\facades\Mail;

class ServicesController extends Controller{
   
   public function removetoWishList(){
		if(!empty($_GET['removeID'])){
			 $removeWishList = WishList::deleteRecord(array("id"=>$_GET['removeID']));
			 if($removeWishList != FALSE){
			      echo"Products Remove From Wish List";
			   }  
		}
     }
	 
     public function wishList(){
		$data['title'] = "Wish List";
		$data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
		$data['wishListProducts'] = WishList::getWishListProducts(array("users_id"=>session()->get('knpUser_id')));
		//echo"<pre>";
		//print_r($data['wishListProducts']);
		return view("kanpur.userWishList")->with($data);
     }
	 
	 public function addtoWishList(){
	    if(!empty($_GET['productId'])){
			 $knpUserID = session()->get('knpUser_id');
			 $duplicate = WishList::getWishList(array("users_id"=>$knpUserID,"products_id"=>$_GET['productId']));
			 if($duplicate == FALSE){
			       $result =  WishList::addtowishList(array("users_id"=>$knpUserID,"products_id"=>$_GET['productId'],"status"=>"Y"));
			      echo"Products Add in WishList";
			   }
			 else{
			     echo" This Products already Added in Wish List";
			   }  
		}
		else{
		  echo"unexpected , try again..";
		}
     }
   
   
   
   public function sendEmailAgain(){
	      	   $data = array("name"=>"jitendra sahu","body"=>"test email");
   	          Mail::send('emails.mails', $data, function ($message) {
				     $message->from('jitendrasahu17996@gmail.com', 'Laravel');
                     $message->to('jitendrasahu17996@gmail.com')->cc('jitendrasahu17996@gmail.com');
			
			 });
   }


   public function userVerify(){
	    $data = array("name"=>"jitendra sahu","body"=>"test email");
		Mail::send('emails.mails', $data , function($message){
		  $message->to("jitendrasahu17996@gmail.com","welcome")
		          ->subject("welcome in our company");
		  $message->from("jitendrasahu17996@gmail.com",'jitendra sahu');		  
		});
		  //$message->to("jitendrasahu17996@gmail.com",'jitendra sahu')->from("support@kanpurize.com")->subject("welcome ");
		echo"check your email inbox"; 
		//});
   }
   
   
  
 
   public function serviveShopDetails($shopID,$shopName,$shopCatID=NULL){
	   $shopID = base64_decode($shopID);
	   $data['title'] = "Services Shop List";
	   $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
	   if(!empty($shopID)){
		   $data['imageListArr'] = GalleryModel::GalleryList(array("vendordetails_id"=>$shopID));
		   //print_r($data['imageListArr']);exit;
		   $data['shopDetails'] = VendorDetails::vendorDetails($shopID);
		   $data['serviceShoplist'] = Shop_categoryModel::getserviceShoplist($data['shopDetails']->categoryType);
		     $data['shopbannerImage'] = KnpShopImage::getShopImage($shopID);
		   	   if(!empty($shopCatID)){ $catID = base64_decode($shopCatID);  }
			   else{ $catID = $data['serviceShoplist'][0]->cid; }
		   $data['servicesDetailsList'] = VservicesModel::getServicesbyCategory($shopID,$catID);
		     $data['offerNewsList'] = OfferNewsModel::getVendoroffersNews(array("vendordetails_id"=>$shopID,"adminStatus"=>"Y"));
		   return view("kanpur.marketserviceShop")->with($data);
		}
	  else{ return redirect()->back(); }	
   }
    
}
