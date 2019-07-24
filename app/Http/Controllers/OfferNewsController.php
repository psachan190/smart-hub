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
use App\loginModal;
use App\CategoryModel;
use App\SubCategory;
use App\User;
use App\VendorPostAds;
use App\VendorDetails;
use App\Module;
use App\UsersModule;
use App\OfferNewsModel;
use App\ComplainModel;
use App\ComplainDetails;
use App\Order;
use App\OrderDetails;
use Session;
use App\Advertisement;
use App\AdsProfession;
use App\Shop_categoryModel;
use App\Products;
use App\ProductSaveOffer;
use Image; 
use Intervention\Image\Exception\NotReadableException;
use App\KnpShopImage;

class OfferNewsController extends Controller{
	
	public function __construct() {
       date_default_timezone_set('Asia/Calcutta');  
     }
	
	public function removeProductsinOffer(Request $request){
	   if(!empty($request->rowID)){
		    $result = ProductSaveOffer::removeRow(array("id"=>$request->rowID));
			if($result != FALSE){
			    echo "products Remove successfully";
			  }
			 else{ echo "Unexpected try again ."; }  
		 }
	 }
	
	public function approveOfferPost($offerID=NULL,$title=NULL){
	   $data['title'] = "Approve Offer and News ";
	    $data['productsList'] = FALSE;
	     if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		  $data['vresultData'] = VendorDetails::getSingleShopDetails();
		  $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
		  if(!empty($offerID)){
			$data['productsList'] = ProductSaveOffer::getproductsInOffer(array("offersandnews_id"=>base64_decode($offerID),"trash"=>"N")); 
			$data['offerTitle'] = $title;
			}
		  $data['offerNewsList'] = OfferNewsModel::getvoffersNews(array("vendordetails_id"=>session()->get('lastVendorID'),"adminStatus"=>"Y"));
		  //echo"<pre>";
		  //print_r($data['offerNewsList']);exit;
		  return view("vendor.approveOfferNews")->with($data);
	 }
	
	public function offersShop($shopID){
	   if(!empty($shopID)){
		   $result = VendorDetails::vendorDetails(base64_decode($shopID),"allSinglevendorDetails");
		   if($result != FALSE){
			    if(!empty($result->vName)){
					$shopName = str_replace(" ","_",$result->vName);
					$encShopID = base64_encode($result->id);
				    return redirect("kanpurize_market_shop/$encShopID/$shopName");
				  }
			 }
		 }
	    else{
		  return redirect()->back();
		 }	 
	}
	
	public function productsInoffer(Request $request){
	   if(!empty($request->input("offerID"))){
		   if(!empty($request->input("checkedID"))){
			   $result = ProductSaveOffer::addProductsinOffer($request->all());
			   print_r($result);exit;
			 }
		   else{
			   echo "Please select any one products .";
			 }	 
		 }
	   else{
		   echo"unexpected try again .";
		 }	 
	 }
	
	public function addProductsInoffer($offerID,$newsTitle){
	   $data['title'] = "Add products in offer and news ".$newsTitle;
	  if(!empty($offerID)){
	     if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		  $data['offerID'] = base64_decode($offerID);
		  $data['vresultData'] = VendorDetails::getSingleShopDetails();
		  $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
		  $data['goodsshopcategoryList'] = Shop_categoryModel::getgoodShoplist($data['vresultData']->categoryType);
		  $data['productList'] = Products::getSimpleProducts(array("vendordetails_id"=>session()->get('lastVendorID')));
		   $data['offerNewsList'] = OfferNewsModel::getvoffersNews(array("vendordetails_id"=>session()->get('lastVendorID'),"adminStatus"=>"Y"));
		  return view("vendor.addProductsinOffer")->with($data);
		 }
	  else{
		   return redirect()->back();
		 }	 
	}
	
	
	
	public function adsPosthome(Request $request){
	  $validator = Validator::make($request->all(),array(
		'startDate'=>'required',
		'endDate'=>'required',
	    ));
	  if($validator->fails()){
        return json_encode(
		               array("error"=> $validator->errors()->getMessages(),
					          "vStatus"=>400));
       }
	  if(!empty($request->input("termandcondition"))){
		   if(!empty($request->file('postImage'))){
		      	   $fileName = rand(1,9999).$request->file('postImage')->getClientOriginalName();
			       $imageName = str_replace(" ","-",$fileName);
			       $vAdspostPath = public_path('uploadFiles/vendorAdspost');
				   $vthumbsAdspostPath = public_path('uploadFiles/vthumbsAdspost');
				   $adsRealSize = Image::make($request->file('postImage')->getRealPath())->resize(2000, 600);
				   $thumbsAdsRealSize = Image::make($request->file('postImage')->getRealPath())->resize(400, 200);
				   $thumbsAdsRealSize->save($vthumbsAdspostPath.'/'.$imageName,80);
				   if($adsRealSize->save($vAdspostPath.'/'.$imageName,80)){
					  $insertData = Advertisement::userPostAdshome($request,$imageName);
				       if($insertData != FALSE){
						    if(!empty($request->input('filtration'))){
							  if(!empty($request->profession)){	
							   $insertProfessionData = AdsProfession::adsProfession($request->input('profession'),$insertData);
							  }
							 }
							if($insertData != FALSE){
							  echo json_encode(
						            array(
									"success"=>"<p style='color:green;'><strong>Your advertisement has been submitted . It will be posted in the market place after review... </strong></p>",
									"vStatus"=>500,
									"lastID"=>$insertData
									));
							   }
						    else{
					           echo json_encode(
							      array(
									"error"=>"<p style='color:green;'><strong>Unexpected Try again..</strong></p>",
									"vStatus"=>700
								     ));
						       }	
						  }
					}
		  }
		 else{
			 echo json_encode(
							   array(
									"error"=>"<p style='color:red;'><strong>Please Select any one image , image Dimension Must be 1800*600 px.</strong></p>",
									"vStatus"=>"imageErr"
								  ));
		  }
		}
	  else{
		   echo json_encode(
							   array(
									"error"=>"<p style='color:red;'><strong>Please accept all term and condition.</strong></p>",
									"vStatus"=>"err"
								  ));
		} 	 
	}
	
    public function kanpurize_RegisterAds(Request $request){
	  $data['title'] = "Kanpur Registered Ads Post";
	  $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
	  $data['allAdsPostData'] = Advertisement::getallAdsPotsValid(array("adminStatus"=>"Y"));
	  $data['getUserAds'] = Advertisement::getuserAdvertisement(array("users_id"=>session()->get('knpUser_id')));
	  return view("kanpur.kanpurize_RegisterAds")->with($data);
	}
	
	
	public function changeOrderStatus(Request $request){
	   if(!empty($request->orderID)){
		     $msg = $request->input("msg");
		     $updateData = array("orderStatus"=>$request->orderStatus,"editDate"=>time());
		     $condition = array("id"=>$request->input("orderID"));
		     $result = Order::editOrder($updateData,$condition); 
			 if($result != FALSE){ echo "<p style='color:green;'><strong>Order $msg SuccessFully.</strong></style>"; }
			 else{ echo "<p style='color:green;'><strong>Unexpected , try again .</strong></style>"; }
		 }
	    else{
		   echo"<p style='color:green;'><strong>Unexpected , try again .</strong></style>";
		 }	 
	}
	
	
	public function vOrderDetails($orderNumber){
	  $data['title'] = "Order Details";
	  if(empty(session()->get('lastVendorID'))){ return redirect("kanpurizeMarketplace"); }	
	   $data['vresultData'] = VendorDetails::vendorShopList();
	   $data['getOrderDescription'] = Order::getOrderDescription(base64_decode($orderNumber));
	   //echo"<pre>";
	   //print_r($data['getOrderDescription']);exit;
	   $data['billingDetails'] = User::find($data['getOrderDescription']->users_id);
	   $data['getOrderDetails'] = OrderDetails::getOrderDetails(base64_decode($orderNumber));
	   //echo"<pre>";
	   //print_r($data['vresultData'] );exit;
	   return view("vendor.orderDetails")->with($data);
	  
	}
	
	public function addComment(Request $request){
	   if(empty($request->input("sendorID")) || empty($request->input("recieverID")) || empty($request->input("message")) || empty($request->input("complain_id"))){
		     echo"unexpected try again...";
		  }
		else{
		   $commentResult = ComplainDetails::addComment($request->all());
		   if($commentResult){
			   echo 1;
			 }
		   else{
			   echo 2;
			 }	 
		 }  
	}
	
	public function uesrsComplain($complainID=NULL){
	   $data['title'] = "Users Complain";
	   if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		$data['vresultData'] = VendorDetails::getSingleShopDetails();
		$data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
		$data['complainList'] = ComplainModel::receiveComplain(session()->get('lastVendorID'));
		if(!empty($data['complainList']) != FALSE){
		    if(!empty($complainID)){ $cID = $complainID; }else{ $cID = base64_encode($data['complainList'][0]->id); }
		    $data['complainData'] = ComplainModel::getComplain("1",$cID);
		    $data['newComplain'] = ComplainDetails::getComplainDetails("1",$cID);
		 }
		else{
	        $data['complainData'] = FALSE;
		    $data['newComplain'] = FALSE;
		 } 
		return view("vendor.uesrsComplain")->with($data);
	 }
	 
    public function offersNews(){
	  $data['title'] = "Offers And News";
	  if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		$data['vresultData'] = VendorDetails::getSingleShopDetails();
		$data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
		$data['offerNewsList'] = OfferNewsModel::getvoffersNews(array("vendordetails_id"=>session()->get('lastVendorID'),"adminStatus"=>"N"));
		return view("vendor.offersNews")->with($data);
    }
	
	public function kanpurizeSaveNews(Request $request){
	    $validator = Validator::make($request->all(),array(
        'startDate' => 'required',
        'endDate' => 'required',
		'newsTitle'=>'required',
		'newsDesc'=>'required',
	    ));
	if($validator->fails()){
        return json_encode(
			   array("error"=> $validator->errors()->getMessages(),
					  "vStatus"=>400));
       }
	   if(!empty($request->file('newsofferImage'))){
	       $fileName = rand(1,9999).$request->file('newsofferImage')->getClientOriginalName();
		   $imageName = str_replace(" ","-",$fileName);
		   $offersNewsPath = public_path('uploadFiles/offersNews');
		   $offersNewsImage = Image::make($request->file('newsofferImage')->getRealPath())->resize(400, 200);
		   $offersNewsImage->save($offersNewsPath.'/'.$imageName,80);
	     }
		else{ $imageName="default.jpg";} 
		 $insertData = OfferNewsModel::vinsertofferNews($request->all(),$imageName);
			 if($insertData != FALSE){
				  return json_encode(
						array(
						"success"=>"Your advertisement has been submitted . It will be posted in the market place after review...",
						"vStatus"=>500
						));
				}
			 else{
				return json_encode(
				   array(
						"error"=>"Unexpected Try again..",
						"vStatus"=>400
					  ));
			   }	 
	 }
	 
	 public function EditofferNews($editID){
	  $data['title'] = "Edit Offers And News";
	  if(empty(session()->get('lastVendorID'))){ return redirect("kanpurizeMarketplace"); }
		$data['vresultData'] = VendorDetails::getSingleShopDetails();
		$data['offerNewsList'] =OfferNewsModel::getvoffersNews(array("vendordetails_id"=>session()->get('lastVendorID'),"adminStatus"=>"N"));
		$data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
		$data['offerNewsDetails'] = OfferNewsModel::getvoffersNews("con",base64_decode($editID));
		//echo "<pre>";
		//print_r($data['offerNewsDetails']);exit;
		return view("vendor.editOffersNews")->with($data);
	  
	 }
	
	public function kanpurizeEditNewsoffer(Request $request){
	    $validator = Validator::make($request->all(),array(
        'startDate' => 'required',
        'endDate' => 'required',
		'newsTitle'=>'required',
		'newsDesc'=>'required',
	  ));
	if($validator->fails()){
        return json_encode(
		               array("error"=> $validator->errors()->getMessages(),
					          "vStatus"=>400));
       }
	   if(!empty($request->file('newsofferImage'))){
	       $fileName = rand(1,9999).$request->file('newsofferImage')->getClientOriginalName();
		   $imageName = str_replace(" ","-",$fileName);
		   $offersNewsPath = public_path('uploadFiles/offersNews');
		   $offersNewsImage = Image::make($request->file('newsofferImage')->getRealPath())->resize(400, 200);
		   $offersNewsImage->save($offersNewsPath.'/'.$imageName,80);
		      $previousFile = $offersNewsPath."/".$request->input("imageCopy");
	         if(file_exists($previousFile)){ unlink($previousFile); }
		 }
		else{ $imageName= $request->input("imageCopy"); } 
		 $editData = OfferNewsModel::vEditofferNews($request->all(),$imageName);
			 if($editData != FALSE){
				  return json_encode(
						array(
						"success"=>"Your News has been submitted . It will be posted in the market place after review... ",
						"vStatus"=>500
						));
				}
			 else{
				return json_encode(
				   array(
						"error"=>"Unexpected Try again..",
						"vStatus"=>400
					  ));
			   }	 
	 }
	
	 
}
