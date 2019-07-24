<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\VendorDetails;
use App\KnpPincodeModel;
use App\Shop_categoryModel;
use App\CategoryModel;
use App\Products;
use App\User;
use App\ProductsImageModel;
use App\VservicesModel;
use App\VendorShopImage;
use App\vendorbusinesDetails;
use App\VendorPostAds;
use Image; 
use App\ComplainSubject;
use App\ComplainModel;
use App\ComplainDetails;
use App\Advertisement;
use App\AdsProfession;
use App\AdvertisementRecord;
use App\Purchaseadspackagerecord;
use Intervention\Image\Exception\NotReadableException;
use Tzsk\Payu\Facade\Payment;
use App\AdvertisementPackage;
use App\KnpShopImage;



class AdsPostController extends Controller{
   
   public function __construct() {
       date_default_timezone_set('Asia/Calcutta');  
     }
   
   
   public function editkanpurizeUserAdsPost(Request $request){
	   $date = date('Y-m-d H:i:s',time());
	  $validator = Validator::make($request->all(),array(
        //'AdsImage' => 'required|dimensions:min_width=1600,max_width=2000|dimensions:min_height=500,max_height=620',
        'startDate' => 'required',
		'endDate'=>'required',
	  ));
	      if($validator->fails()){
              return json_encode(
		               array(
					     "error"=> $validator->errors()->getMessages(),
					     "vStatus"=>400
						  ));
             }
		 $formData = $request->all();
		 $vAdspostPath = public_path('uploadFiles/vendorAdspost');
		 $vthumbsAdspostPath = public_path('uploadFiles/vthumbsAdspost');
	   if(empty($request->file('adsImage'))){
		   $imageName = $formData['imageNameCopy'];
		 }
	   else{
		   $image = rand(1,9999).$request->file('adsImage')->getClientOriginalName();
		   $existsImage = $formData['imageNameCopy'];
		     $firstFile = $vAdspostPath."/".$existsImage;
			 $secondFile = $vthumbsAdspostPath."/".$existsImage;
			 if(file_exists($firstFile)){ unlink($firstFile); }
			 if(file_exists($secondFile)){ unlink($secondFile); }
		         $imageName = str_replace(" ","-",$image);
				 $adsRealSize = Image::make($request->file('adsImage')->getRealPath())->resize(2000, 600);
				 $thumbsAdsRealSize = Image::make($request->file('adsImage')->getRealPath())->resize(400, 200);
				 $thumbsAdsRealSize->save($vthumbsAdspostPath.'/'.$imageName,80);
				 $adsRealSize->save($vAdspostPath.'/'.$imageName,80);
			}
			
			if($formData['filtrationCopy']=="yes"){
			   $adsProfessionresult = AdsProfession::getprofession(array("advertisement_id"=>$formData['editID']));
			   if($adsProfessionresult != FALSE){
				   $deleteResult = AdsProfession::deleteProfession($adsProfessionresult);
				 }
			 }
			
			if(!empty($formData['filtration'])){ $filtration = "yes";  } 
		    else{ $filtration = "no"; } 
			$editDataArr = array("startDate"=>$formData['startDate'],"endDate"=>$formData['endDate'],"ageFrom"=>$formData['ageFrom'],"ageTo"=>$formData['ageTo'],"gender"=>$formData['gender'],"description"=>$formData['postDescription'],"image"=>$imageName,"postType"=>$formData['postType'],"status"=>"Y","adminStatus"=>"N","updated_at"=>$date,"applyFilteration"=>$filtration);
			$updateResult = Advertisement::editPostAds($editDataArr,$formData['editID']);
			if(!empty($formData['filtration'])){
			  if(!empty($request->profession)){	 
			     $insertProfessionData = AdsProfession::adsProfession($request->input('profession'),$formData['editID']);
			    }
			   }
			 if($updateResult != FALSE){
				  return json_encode(
						array(
						"success"=>"Your advertisement has been submitted . It will be posted in the market place after review... ",
						"vStatus"=>500
						));
				}

	}
   
   public function kanpurize_user_AdsDetails($adsID){
	 $data['title'] = "Edit User Post Ads";
		 $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
		if(!empty($adsID)){
			 $data['resultAdsData'] = Advertisement::getAdvertisement(array("id"=>base64_decode($adsID)),base64_decode($adsID));
			  if($data['resultAdsData']->applyFilteration=="yes"){
				   $data['filtarationAdsData'] = AdsProfession::getAdvertisementprofession(array("advertisement_id"=>base64_decode($adsID)));
				}
			  return view("kanpur.editUserAdspost")->with($data);
		   }
		  else{ return redirect()->back(); } 
	}
   
   public function paymentFormsingleadvertisement(Request $request){
	   $v = array("lastuserID"=>"required"); 
	   $this->validate($request,$v);
	   $result = Advertisement::getAdvertisement(array("id"=>$request->input("lastuserID")),$request->input("lastuserID"));
	   if($result != FALSE){
		  $userDetails = User::find($result->users_id);
		  //echo"<pre>";
		  //print_r($userDetails);exit;
		   $txnID = strtoupper(str_random(8))."/".$request->input("lastuserID");
		    $data = array('txnid'=>$txnID,'amount'=>1,
 'productinfo' =>"pay for single Advertisement",'firstname'=>$userDetails->name,'email'=>$userDetails->email,
 'phone'=>$userDetails->mobileNumber,array("adsID"=>$request->input("lastuserID")));
		    return Payment::make($data,function($then) {
               $then->redirectTo("payment/payforsingleAdsStatus"); # Your Status page endpoint.
              }); 
		 }
	   //print_r($request->all());exit;
	}
	
	public function payforsingleAdsStatus(Request $request){
	   $payment = Payment::capture();
		if($payment->status=="Completed"){
		   $transactioIdArr = explode("/",$payment->txnid);
	       $dataArr = json_decode($payment->data);
	        if($dataArr->status=="success"){
				  $updateData = array("paidStatus"=>"paid");
				  $result = Advertisement::editPostAds($updateData,$transactioIdArr[1]);
				  session()->flash('paysuccess',"<p style='color:green'><strong>Payment Advertisement package Complete Complete</strong></style>");
				  return redirect("kanpurize_RegisterAds?paysuccess")->with('paysuccess',array('your message,here'));  		
	          }
       else{
           return redirect("kanpurize_RegisterAds?failed");
	     }
	   }
	   else{
           return redirect("kanpurize_RegisterAds?failed");
	     } 
	}
	
   
   
   public function vpurchaseAdsPack(Request $request){
	   $v = array("adsPackage"=>"required","vendorDetailsID"=>"required"); 
	   $this->validate($request,$v);
	   $resultAds = AdvertisementPackage::getAdvertisementPackage(array("id"=>$request->input("adsPackage")),$request->input("adsPackage"));
	   if($resultAds != FALSE){
		   $amount = $resultAds->packageAmount;
		   /*---get valid all Ads package function ---*/
		   //$getValidaAdsPackage = Purchaseadspackagerecord::getValidAdsPackage(array("vendordetails_id"=>$request->vendorDetailsID,"cStatus"=>1));
		   /*---get valid all Ads package function ---*/
		   $addPackageLastID = Purchaseadspackagerecord::addAdsPackageList($request->all(),$resultAds);
		   	   if($addPackageLastID != FALSE){
					$txnID = strtoupper(str_random(8))."/".$addPackageLastID;
					//$amount
					$data = array('txnid'=>$txnID,'amount'=>$amount,
		 'productinfo' =>"pay for Advertisement",'firstname'=>$request->input("vendorName"),'email'=>$request->input("vendoremail"),
		 'phone'=>$request->input("vendorMobile"),array("AdspackageID"=>$request->input("adsPackage")));
					return Payment::make($data,function($then) {
					   $then->redirectTo("payment/payforAdsStatus"); # Your Status page endpoint.
					  });  
				 }
		 }
	}
	
	 public function payforAdsStatus(){
	    $payment = Payment::capture();
		 if($payment->status=="Completed"){
		   $transactioIdArr = explode("/",$payment->txnid);
	       $dataArr = json_decode($payment->data);
	        if($dataArr->status=="success"){
				  $updateData = array("cStatus"=>1,"payStatus"=>"Y","transactionID"=>$payment->txnid);
				  $condition = array("id"=>$transactioIdArr[1]);
				  $result = Purchaseadspackagerecord::updateRecord($updateData,$condition);
				  $getData = Purchaseadspackagerecord::find($transactioIdArr[1]);
				  $updateDataResult = AdvertisementRecord::updateAdsResult($getData);
				  session()->flash('paysuccess',"<p style='color:green'><strong>Payment Advertisement package Complete Complete</strong></style>");
				  return redirect("vendorPostAds?paysuccess")->with('paysuccess',array('your message,here'));  		
	          }
         else{
           return redirect("vendorPostAds?failed");
	      }
	    }
	   else{
          return redirect("vendorPostAds?failed");
	     } 
	 }
	
	
	
   public function adsPostVendor(Request $request){
	  $validator = Validator::make($request->all(),array(
		'startDate'=>'required',
		'endDate'=>'required',
	    ));
	  if($validator->fails()){
        return json_encode(
		          array("error"=>$validator->errors()->getMessages(),
					  "vStatus"=>400));
       }
	   //$getMonthlyAdsResult = Advertisement::getMonthlyAdvertisement($request->all());
	   //print_r($getMonthlyAdsResult);exit;
	   //if()
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
						   $getLastEndPackage = Purchaseadspackagerecord::getlastEndAdsPackage(session()->get('lastVendorID')); 
							$updatePackagetotalPackageAds = Purchaseadspackagerecord::updateTotalAdsPackage($getLastEndPackage);
							if($updatePackagetotalPackageAds != FALSE){
							     $updateAdsRecord = AdvertisementRecord::updateAdvertisementRecord($request->all());    
							  }
							if(!empty($request->input('filtration'))){
							  if(!empty($request->profession)){	
							   $insertProfessionData = AdsProfession::adsProfession($request->input('profession'),$insertData);
							  }
							 }
							if($insertData != FALSE){
							  echo json_encode(
						            array(
									"success"=>"<p style='color:green;'><strong>Your advertisement has been submitted . It will be posted in the market place after review... </strong></p>",
									"vStatus"=>500
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
	
   
   
   
   
   
   public function addVendorComplainComment(Request $request){
	   if(empty($request->input("sendorID")) || empty($request->input("recieverID")) || empty($request->input("message")) || empty($request->input("complain_id"))){
		     echo"unexpected try again...";
		  }
		else{
		   $commentResult = ComplainDetails::addComment($request->all());
		   $complainResult = ComplainModel::editComplain($request->all());
		   if($commentResult){
			   echo 1;
			 }
		   else{
			   echo 2;
			 }	 
		 }  
	}
   
    public function vendorComplainDetails($complainID){
	   $data['title'] = "Vendor Complain Details";
	   if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		$data['vresultData'] = VendorDetails::getSingleShopDetails();
	    $data['complainList'] = ComplainModel::getComplain(array("vendordetails_id"=>session()->get('lastVendorID'),"type"=>"adminComplain"));
		if(!empty($complainID)){ $cID = $complainID; }else{ $cID = base64_encode($data['complainList'][0]->id); }
		$data['complainData'] = ComplainModel::getComplain("1",$cID);
		$data['complainDetails'] = ComplainDetails::getComplainDetails("1",$cID);
		//echo base64_decode($cID);exit;
		//echo"<pre>";
		//print_r($data['complainData']);exit;
		return view("vendor.vendorComplain")->with($data);
	}
   
   public function vendorWriteusAction(Request $request){
	 $validator = Validator::make($request->all(),array("receiverID"=>"required","sendorID"=>"required","complainSubject"=>"required","description"=>"required",));
	if($validator->fails()){
        return json_encode(
		               array("error"=> $validator->errors()->getMessages(),
					          "vStatus"=>400));
       }
	   if($request->hasFile($request->input('image'))){
		    $complainImgPath = public_path('uploadFiles/complainFiles');
		    $fileName = rand(1,9999).$request->file('image')->getClientOriginalName();
			$image = str_replace(" ","-",$fileName);
			$request->file('image')->move($complainImgPath,$image);
		 }
	   else{$image="blank"; }	 
	     $resultLastID = ComplainModel::addvendorComplain($request->all(),$image);
		 $complainResult = ComplainDetails::addvendorComplainDetails($request->all(),$resultLastID);
		 if($complainResult != FALSE){
			   echo json_encode(
		               array("msg"=>"your complain Accept successfully . We will reply shortly...",
					          "vStatus"=>700));
		  }
		 else{
			 echo json_encode(
		               array("msg"=>"your complain Accept successfully . We will reply shortly...",
					          "vStatus"=>500));
		  }
	}
   
   
   public function vendorHelpAndQuotes(){
	    $data['title'] = "Help and Quotes";
		if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		 $data['subjectList'] = ComplainSubject::addComplainSubject("fetchData");
		 $data['vresultData'] = VendorDetails::vendorShopList();
		 $data['complainList'] = ComplainModel::getComplain(array("vendordetails_id"=>session()->get('lastVendorID'),"type"=>"adminComplain"));
		 //echo"<pre>";
		 //print_r($data['complainList']);exit;
		return view("vendor.writeUs")->with($data);
   }
   
   public function vendorPostAds(){
	    $data['title'] = "Vendor Ads Post";
		if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		 $data['vresultData'] = VendorDetails::getSingleShopDetails();
		 $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
		 $data['vAdsRecord'] = AdvertisementRecord::getAdvertisementRecord(array("vendordetails_id"=>session()->get('lastVendorID')));
		 /*--get--Advertisement--package--start--*/
		 $data['advertisementPackage'] = AdvertisementPackage::getAdvertisementPackage(array("id"=>''));
		 /*--get--Advertisement--package--End--*/
		 /*--update --status--for--purchase--Advertisement--package--start*/
		 $getCompleteAds = Purchaseadspackagerecord::getcompleteAdsPackage(session()->get('lastVendorID')); 
		 //$getCompleteAds = Purchaseadspackagerecord::getcompleteAdsPackage(session()->get('lastVendorID')); 
		 if($getCompleteAds != FALSE){
			 $updatepurchaseAdspackStatus = Purchaseadspackagerecord::updatecStatus($getCompleteAds);
			 if($updatepurchaseAdspackStatus != FALSE){
			       $totalAds = $data['vAdsRecord']->totalAds - $updatepurchaseAdspackStatus;;
				   $data['vAdsRecord'] = AdvertisementRecord::updateRecord(array("vendordetails_id"=>session()->get('lastVendorID')),array("totalAds"=>$totalAds));
			   } 
		   }
		 /*--update --status--for--purchase--Advertisement--package--End*/  
		 /*--Add monthly--free--package--start-*/
			$getCompleteAds = Purchaseadspackagerecord::getfreeMonthlyAdsPAckege(array("vendordetails_id"=>session()->get('lastVendorID'),"month"=>date("m"),"year"=>date("Y"),"cStatus"=>1)); 
			if($getCompleteAds == FALSE){
			     $advertisemntData = AdvertisementPackage::getAdvertisementPackage(array("id"=>1),1);
			     $resutl = Purchaseadspackagerecord::addVendorMonthlyPackageList(array("vendordetails_id"=>session()->get('lastVendorID')),$advertisemntData);
				 if($resutl != FALSE){
				   $resultUpdate = AdvertisementRecord::updateAdsResult(Purchaseadspackagerecord::where(array("id"=>$resutl))->first());
				   }
			  }
		  	//print_r(date("d/m/y H:i:sa",$data['vresultData']->crvDate));exit;
		   // print_r($advertisemntData);exit;
		 /*--Add monthly--free--package--End-*/
		 $data['vAdsPostList'] = Advertisement::getAdvertisement(array("vendordetails_id"=>session()->get('lastVendorID'),"status"=>"N"));
		 return view("vendor.vendorPostAds")->with($data);
   }
   
   public function EditAdsPost($adsPostID){
      $data['title'] = "Edit Post Ads";
	 	if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		 $lastID = session()->get('lastVendorID');
		if(!empty($adsPostID)){
		      $data['vresultData'] = VendorDetails::getSingleShopDetails(); 
			  $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
			  $data['vAdsPostList'] = Advertisement::getAdvertisement(array("vendordetails_id"=>session()->get('lastVendorID')));
		      $data['resultAdsData'] = Advertisement::getAdvertisement(array("id"=>base64_decode($adsPostID)),base64_decode($adsPostID));
			  if($data['resultAdsData']->applyFilteration=="yes"){
				   //echo base64_decode($adsPostID);
				   $data['filtarationAdsData'] = AdsProfession::getAdvertisementprofession(array("advertisement_id"=>base64_decode($adsPostID)));
				}
			  //echo "<pre>";
			  //print_r($data['filtarationAdsData']);exit;
			  return view("vendor.editAdsPost")->with($data);
		   }
		  else{ return redirect()->back(); } 
   }
   
   public function editkanpurizevendorAdsPost(Request $request){
	  $date = date('Y-m-d H:i:s',time());
	  $validator = Validator::make($request->all(),array(
        //'AdsImage' => 'required|dimensions:min_width=1600,max_width=2000|dimensions:min_height=500,max_height=620',
        'startDate' => 'required',
		'endDate'=>'required',
	  ));
	      if($validator->fails()){
              return json_encode(
		               array(
					     "error"=> $validator->errors()->getMessages(),
					     "vStatus"=>400
						  ));
             }
		 $formData = $request->all();
		 $vAdspostPath = public_path('uploadFiles/vendorAdspost');
		 $vthumbsAdspostPath = public_path('uploadFiles/vthumbsAdspost');
	   if(empty($request->file('adsImage'))){
		   $imageName = $formData['imageNameCopy'];
		 }
	   else{
		   $image = rand(1,9999).$request->file('adsImage')->getClientOriginalName();
		   $existsImage = $formData['imageNameCopy'];
		     $firstFile = $vAdspostPath."/".$existsImage;
			 $secondFile = $vthumbsAdspostPath."/".$existsImage;
			 if(file_exists($firstFile)){ unlink($firstFile); }
			 if(file_exists($secondFile)){ unlink($secondFile); }
		         $imageName = str_replace(" ","-",$image);
				 $adsRealSize = Image::make($request->file('adsImage')->getRealPath())->resize(2000, 600);
				 $thumbsAdsRealSize = Image::make($request->file('adsImage')->getRealPath())->resize(400, 200);
				 $thumbsAdsRealSize->save($vthumbsAdspostPath.'/'.$imageName,80);
				 $adsRealSize->save($vAdspostPath.'/'.$imageName,80);
			}
			
			if($formData['filtrationCopy']=="yes"){
			   $adsProfessionresult = AdsProfession::getprofession(array("advertisement_id"=>$formData['editID']));
			   if($adsProfessionresult != FALSE){
				   $deleteResult = AdsProfession::deleteProfession($adsProfessionresult);
				 }
			 }
			
			if(!empty($formData['filtration'])){ $filtration = "yes";  } 
		    else{ $filtration = "no"; } 
			$editDataArr = array("startDate"=>$formData['startDate'],"endDate"=>$formData['endDate'],"ageFrom"=>$formData['ageFrom'],"ageTo"=>$formData['ageTo'],"gender"=>$formData['gender'],"description"=>$formData['postDescription'],"image"=>$imageName,"postType"=>$formData['postType'],"status"=>"Y","adminStatus"=>"N","updated_at"=>$date,"applyFilteration"=>$filtration);
			$updateResult = Advertisement::editPostAds($editDataArr,$formData['editID']);
			if(!empty($formData['filtration'])){
			  if(!empty($request->profession)){	 
			     $insertProfessionData = AdsProfession::adsProfession($request->input('profession'),$formData['editID']);
			    }
			   }
			 if($updateResult != FALSE){
				  return json_encode(
						array(
						"success"=>"Your advertisement has been submitted . It will be posted in the market place after review... ",
						"vStatus"=>500
						));
				}
   }
   
   
   public function kanpurizeAdsPost(Request $request){
     $validator = Validator::make($request->all(),array(
        'adsImage' => 'required | mimes:jpeg,jpg,png',
        'startDate' => 'required',
		'endDate'=>'required',
	  ));
	if($validator->fails()){
        return json_encode(
		               array("error"=> $validator->errors()->getMessages(),
					          "vStatus"=>400));
       }
	     if(!empty($request->file('adsImage'))){
		      	   $fileName = rand(1,9999).$request->file('adsImage')->getClientOriginalName();
			       $imageName = str_replace(" ","-",$fileName);
			       $vAdspostPath = public_path('uploadFiles/vendorAdspost');
				   $vthumbsAdspostPath = public_path('uploadFiles/vthumbsAdspost');
				   $adsRealSize = Image::make($request->file('adsImage')->getRealPath())->resize(2000, 600);
				   $thumbsAdsRealSize = Image::make($request->file('adsImage')->getRealPath())->resize(400, 200);
				   $thumbsAdsRealSize->save($vthumbsAdspostPath.'/'.$imageName,80);
				   if($adsRealSize->save($vAdspostPath.'/'.$imageName,80)){
					    $insertData = VendorPostAds::vinsertPostAds($request,$imageName);
					     if($insertData != FALSE){
							  return json_encode(
						            array(
									"success"=>"Your advertisement has been submitted . It will be posted in the market place after review... ",
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
		 else{
		    echo"Please Select any one image , image Dimension Must be 1800*600 px. "; 
		  } 
   }
   
  public function approveAdsPost(){
       $data['title'] = "Vendor Ads Post";
		if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		 $data['vresultData'] = VendorDetails::getSingleShopDetails();
		 $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
		 $data['vAdsPostList'] = Advertisement::getAdvertisement(array("vendordetails_id"=>session()->get('lastVendorID'),"adminStatus"=>"Y"));
		 return view("vendor.approveAdsPost")->with($data);
   }
   
   public function viewApprovePostDetails($adsPostID){
     $data['title'] = "View Approove Post Ads";
	 	if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		 $lastID = session()->get('lastVendorID');
		if(!empty($adsPostID)){
		      $data['vresultData'] = VendorDetails::getSingleShopDetails(); 
			   $data['vAdsPostList'] = Advertisement::getAdvertisement(array("vendordetails_id"=>session()->get('lastVendorID'),"adminStatus"=>"Y"));
		      $data['resultAdsData'] = Advertisement::getAdvertisement(array("id"=>base64_decode($adsPostID)),base64_decode($adsPostID));
			  if($data['resultAdsData']->applyFilteration=="yes"){
				   //echo base64_decode($adsPostID);
				   $data['filtarationAdsData'] = AdsProfession::getAdvertisementprofession(array("advertisement_id"=>base64_decode($adsPostID)));
				   //echo"<pre>";
				  //print_r($data['filtarationAdsData']);exit;
				}
			  //echo "<pre>";
			  //print_r($data['filtarationAdsData']);exit;
			  return view("vendor.viewApprovePostDetails")->with($data);
		   }
		  else{ return redirect()->back(); } 
   }
   
}
