<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;
use App\VendorDetails;
use App\KnpPincodeModel;
use App\Shop_categoryModel;
use App\CategoryModel;
use App\Products;
use App\Models\User;
use App\ProductsImageModel;
use App\VservicesModel;
use App\VendorShopImage;
use App\vendorbusinesDetails;
use App\VendorPostAds;
use App\Order;
use App\OrderDetails;
use App\ShopSetting;
use App\ProductAttribueTable;
use App\Advertisement;
use App\Ngo_model;
use App\Matrimonial_model;
use Image; 
use App\AdvertisementRecord;
use App\VendorCatAuthority;
use Intervention\Image\Exception\NotReadableException;
use Auth;
use App\KnpShopImage;
use App\AdvertisementPackage;
use App\Purchaseadspackagerecord;
use App\AdsProfession;
use App\OfferNewsModel;
use App\ProductSaveOffer;
use App\ComplainModel;
use App\ComplainDetails;
use App\DeliveryandPickupTimeModel;
use App\Address;
use App\GalleryModel;
use Mail;


class Shop extends Controller{
  
  public function share_ind(Request $request , $action ){
     echo "yes";exit;
    
  }
  
  
public function shareInd($name=NULL , $action=NULL){
	  $data['check_device'] = $this->check_device();
	  //echo "<pre>";
	  //print_r($data['check_device']);exit;
	  $data['title'] = "$name sent you a special message ."; 
	  if(!empty($name)){
		$data['user_name'] = str_replace("_"," ",$name); 
			$data['share_name'] = $name;
	    $titletext = $name."  sent you a special festive greeting .";
	    $data['sharetext'] = $titletext;
	    //$data['title'] = $name." sent you a special message."; 
	    //echo "<pre>";
	    //print_r($data['sharetext']);exit;
	     if(!empty($action)){
			 $data['share_action'] = $action;
			}
	   } 
     return view('rakhi.index')->with($data);
  }
  
  
  public function sharerakshabandhan(Request $request){
        $data['name'] = str_replace(" ","_",$request['name']);
        $ip= \Request::ip();
      	$ip_data= \Location::get($ip);
      	$ip_details = $this->get_ipDetails($ip_data , $data['name'] , $ip);
      	// $dataArr = $data->countryCode.",".$data->regionName.",".$data->cityName.",".$data->zipCode.",".$data->latitude.",".$data->longitude." Arecode = ,".$data->areaCode;
      	// print_r($ip_details);exit;
      	 $result = DB::table('independence_record')->insert($ip_details);
      return redirect("xyz/".$data['name']."/share")->with($data);
   }
   
     public function get_ipDetails($para,$name , $ip){
     return array("name"=>$name ,"ip_address"=>$ip , "zip_code"=>$para->zipCode, "country_code"=>$para->countryCode , "state"=>$para->regionName ,"city"=>$para->cityName , "latitude"=>$para->latitude, "langitute"=>$para->longitude, "area_code"=>$para->areaCode , "type"=>"rakshabandhan" , "crDate"=>time());
   }
  
  
  public function getAllvendorBackup(){
     $getAll_shopImage = VendorShopImage::all();
	 if(count($getAll_shopImage) > 0){
	      foreach($getAll_shopImage as $imageLogo){
			  $shop_id = $imageLogo->vendordetails_id;
			  $username =  md5('rowny'.$shop_id);
			  $logo_image = $imageLogo->shoplogoImg;
			  $logo_image_BannerImage = $imageLogo->bannerImage;
			  DB::table('vendordetails')
                             ->where(array("id"=>$shop_id))
                             ->update(array("imageLogo"=>$logo_image , "bannerImage"=>$logo_image_BannerImage , "username" =>$username));  
			}   
	   }
  }
  
  
  public function vendorBackup($para , $page){
    if($page=="firstDashborad"){
		//echo $para;exit;
	     $username =  md5('rowny'.$para);
		 $result = $this->editVendorData(array("username" => $username),  array("id"=>$para));
		 $updateData = array("shop_username"=>$username);
		 $con = array("vendordetails_id"=>$para);
		 $addDataArr = array("users_id"=>session()->get('knpuser'),"vendordetails_id"=>$para,"shop_username"=>$username);   
		 if(VendorbusinesDetails::getduplicate(array("vendordetails_id"=>$para)) != 1){
			 $vBusinessResult = vendorbusinesDetails::addBusinessDetails($addDataArr);
		   }
		 else{
		     $resultUpdate = vendorbusinesDetails::editBusinessDetails($updateData , $con);
		   }  
		 
		 if(ShopSetting::getduplicateShopSetting(array("vendordetails_id"=>$para)) != 1){
			 $updateShopSetArr = array("vendordetails_id"=>$addDataArr['vendordetails_id'],"shop_username"=>$username,"created_at"=>time());
			 $vShopSetting = ShopSetting::addShopSetting($updateShopSetArr);   
		   }
		 else{
		      $vShopSetting = ShopSetting::updateShopSet($updateData , $con);   
		   }  
		   
		  if(AdvertisementRecord::getduplicateAdvertisement(array("vendordetails_id"=>$para)) != 1){
			  $addAdvertisement = AdvertisementRecord::insert($addDataArr);
			} 	
		   else{
			  $addAdvertisement = AdvertisementRecord::updateRecord($con , $updateData); 
			}	 
	 	 return redirect("vendor/$username/vendorDashboard");
	  }
  }
  
  public function page($page){
	$data['title'] = $page; 
	if (session()->has('knpuser')) { $data['user'] = User::where(['id' => session()->get('knpuser')])->first(); }
	if($page=="getmyShoplist"){
	    $data['my_shopList'] = VendorDetails::get_my_shoplist(session()->get('knpuser'));
	    //echo "<pre>";
	    //print_r($data['my_shopList']);exit;
	  }
	  $data['my_matrimonialProfile'] = Matrimonial_model::get_matrimonial_profile(['user_id'=>session()->get('knpuser')]);
	  return view("vendor.".$page)->with($data);  
  }
  
  
  
  public function getaction($first , $page , $second=NULL){
	if(!session()->get('knpuser')) return redirect('login?login');  
	if (session()->has('knpuser')) { $data['user'] = User::where(['id' => session()->get('knpuser')])->first(); }
        $data['title'] = $page;
	$data['vendorData'] = VendorDetails::getShopDetails($first);
	//echo "<pre>";
	//print_r($data['vendorData']);exit;
	if($data['vendorData']->users_id != session()->get('knpuser')) return redirect()->back();
	if($page == "galleryImageList"){
	   $data['imageListArr'] = GalleryModel::GalleryList(array("vendordetails_id"=>$data['vendorData']->id));
	  }
	if($page=="select_category"){
	    $data['shop_category_list'] = Shop_categoryModel::getShopcat($data['vendorData']->businesscategoryType);
	  } 
	if($page=="vendorDashboard"){
	      $data['device_type'] = $this->check_device();
	     $data['selectedPaymentMode'] = ShopSetting::getAuthority(array("shop_username"=>$first));
	     $data['businessDetails'] = VendorbusinesDetails::getBusinessDetails(array("vendordetails_id"=>$data['vendorData']->id));
	     $data['share_webshopurl'] = $this->share_webshop_url($data['vendorData']->businesscategoryType , $data['vendorData']->username); 
	   
	  } 
	if($page=="category_list"){
		   $shoptblObj = new Shop_categoryModel;
		  $data['good_shop_category_list'] = Shop_categoryModel::getgoodShoplist($data['vendorData']->categoryType);
		  $data['services_shop_category_list'] = Shop_categoryModel::getserviceShoplist($data['vendorData']->categoryType);
	     // $data['resultData'] = $shoptblObj->getShoplist($data['vendorData']->categoryType);
	  } 
	 if($page=="add_products"){
	     $shopObj = new Shop_categoryModel;
		 $data['shopDetails'] = Shop_categoryModel::getShopcat("default",$second);
		   
		   if($data['vendorData']->businesscategoryType==2){
				$data['serviceShop'] = $shopObj->getserviceShoplist($data['vendorData']->categoryType);
				 return view("vendor.addServices")->with($data);
			  }
		   else{
				$categoryList = Shop_categoryModel::getShopcatlist($second);
				$authCategory = VendorCatAuthority::authCatList($data['vendorData']->id,$second);
				 if($authCategory != FALSE){
					 $data['shopcatData'] = array_merge_recursive($categoryList,$authCategory);
				   }
				  else{
					 $data['shopcatData'] = $categoryList;
				   } 
				$data['goodsshopcategoryList'] = $shopObj->getgoodShoplist($data['vendorData']->categoryType);
			  }	  
	   }
	  if($page=="product_list"){
	      $productsObj = new Products;
		  $data['productList'] = Products::getProducts(array("shopID"=>$data['vendorData']->id,"catID"=>$second));
		  $data['goodsshopcategoryList'] = Shop_categoryModel::getgoodShoplist($data['vendorData']->categoryType);
	   }
	  if($page=="add_services_list"){
		 $data['shopDetails'] = Shop_categoryModel::getShopcat("default",$second);
		 $data['serviceShop'] = Shop_categoryModel::getserviceShoplist($data['vendorData']->categoryType);
	   }  
	  if($page=="services_list"){
	      //echo "<pre>";
	      //print_r($data['vendorData']);exit;
		 $data['serviceShop'] = Shop_categoryModel::getserviceShoplist($data['vendorData']->categoryType);
		 $vdata = array("vendorShopID"=>$data['vendorData']->id);
	     $data['serviceList'] = VservicesModel::getServicesDetails($vdata);
		 
	   }
	   if($page=="edit_service_list"){
	       $vdata = array("vendorShopID"=>$data['vendorData']->id);
		   $data['editServiceList'] = VservicesModel::getServicesDetails($vdata);
		   $data['serviceDetails'] = VservicesModel::getServicesDetails($vdata, $second);
	   }  
	   if($page=="post_Ads"){
		   $data['vAdsRecord'] = AdvertisementRecord::getAdvertisementRecord(array("vendordetails_id"=>$data['vendorData']->id));
		   	 /*--get--Advertisement--package--start--*/
			 $data['advertisementPackage'] = AdvertisementPackage::getAdvertisementPackage(array("id"=>''));
			 /*--get--Advertisement--package--End--*/
			 /*--update --status--for--purchase--Advertisement--package--start*/
			 $getCompleteAds = Purchaseadspackagerecord::getcompleteAdsPackage($data['vendorData']->id); 
			 if($getCompleteAds != FALSE){
				 $updatepurchaseAdspackStatus = Purchaseadspackagerecord::updatecStatus($getCompleteAds);
				 if($updatepurchaseAdspackStatus != FALSE){
					   $totalAds = $data['vAdsRecord']->totalAds - $updatepurchaseAdspackStatus;;
					   $data['vAdsRecord'] = AdvertisementRecord::updateRecord(array("vendordetails_id"=>$data['vendorData']->id),array("totalAds"=>$totalAds));
				   } 
			   }
			 /*--update --status--for--purchase--Advertisement--package--End*/  
			 /*--Add monthly--free--package--start-*/
				$getCompleteAds = Purchaseadspackagerecord::getfreeMonthlyAdsPAckege(array("vendordetails_id"=>$data['vendorData']->id,"month"=>date("m"),"year"=>date("Y"),"cStatus"=>1)); 
				if($getCompleteAds == FALSE){
					 $advertisemntData = AdvertisementPackage::getAdvertisementPackage(array("id"=>1),1);
					 $resutl = Purchaseadspackagerecord::addVendorMonthlyPackageList(array("vendordetails_id"=>$data['vendorData']->id),$advertisemntData);
					 if($resutl != FALSE){
					  $resultUpdate = AdvertisementRecord::updateAdsResult(Purchaseadspackagerecord::where(array("id"=>$resutl))->first());
					 }
				  }
				//print_r(date("d/m/y H:i:sa",$data['vresultData']->crvDate));exit;
			   // print_r($advertisemntData);exit;
			 /*--Add monthly--free--package--End-*/
			 $data['vAdsPostList'] = Advertisement::getAdvertisement(array("vendordetails_id"=>$data['vendorData']->id,"status"=>"N"));
		 } 
	   if($page=="editPost_Ads"){
		   $data['vAdsPostList'] = Advertisement::getAdvertisement(array("vendordetails_id"=>$data['vendorData']->id));
		   $data['resultAdsData'] = Advertisement::getAdvertisement(array("id"=>$second , "vendordetails_id"=>$data['vendorData']->id) , $second);
		   if($data['resultAdsData'] != FALSE){
			   if($data['resultAdsData']->vendordetails_id != $data['vendorData']->id){ return redirect()->back(); }
			 }
		   else{ return redirect()->back();  }
		   // echo "<pre>";
	       // print_r($data['resultAdsData']);exit; 	 
		 }
		 
		if($page=="approveAdsPost"){
		    $data['vAdsPostList'] = Advertisement::getAdvertisement(array("vendordetails_id"=>$data['vendorData']->id,"adminStatus"=>"Y"));
			$data['resultAdsData'] = array();
			if(empty($second)){
			   if($data['vAdsPostList'] != FALSE){
				   $data['resultAdsData'] = Advertisement::getAdvertisement(array("id"=>$data['vAdsPostList'][0]->id , "vendordetails_id"=>$data['vendorData']->id) , $data['vAdsPostList'][0]->id);
				 }	
			  }
			else{
			    //echo  base64_decode($second);exit;
				 $data['resultAdsData'] = Advertisement::getAdvertisement(array("id"=>base64_decode($second) , "vendordetails_id"=>$data['vendorData']->id) , base64_decode($second));
			     if($data['resultAdsData']->vendordetails_id != $data['vendorData']->id){ return redirect()->back(); }
			  }  
			//echo "<pre>";
	        //print_r($data['vendorData']->id);exit;
		  }
		  	
		if($page=="offersNews"){
		  $data['offerNewsList'] = OfferNewsModel::getvoffersNews(array("vendordetails_id"=>$data['vendorData']->id,"adminStatus"=>"N"));
		 } 
		 
		if($page=="EditofferNews"){
		   $data['offerNewsList'] = OfferNewsModel::getvoffersNews(array("vendordetails_id"=>$data['vendorData']->id,"adminStatus"=>"N"));
		   $data['offerNewsDetails'] = OfferNewsModel::getvoffersNews("con",$second);
		   //echo "<pre>";
		   //print_r($data['offerNewsDetails']);exit;
		   if($data['offerNewsDetails']->vendordetails_id != $data['vendorData']->id){ return redirect()->back(); }
		  }
		if($page=="approveOfferNews"){
		    $data['productsList'] = FALSE;
			if(!empty($second)){
			  $data['productsList'] = ProductSaveOffer::getproductsInOffer(array("offersandnews_id"=>base64_decode($second),"trash"=>"N")); 			  $data['offerTitle'] = $page;
			}
		    $data['offerNewsList'] = OfferNewsModel::getvoffersNews(array("vendordetails_id"=>$data['vendorData']->id,"adminStatus"=>"Y"));
		  }  
		if($page=="addProductsinOffer"){
		    $username = $data['vendorData']->username;
			$data['offerNewsDetails'] = OfferNewsModel::getvoffersNews("con",base64_decode($second));
		    if(!empty($data['offerNewsDetails']->discountMode)){
			     if($data['offerNewsDetails']->vendordetails_id == $data['vendorData']->id ){
				     $data['productList'] = Products::getSimpleProducts(array("vendordetails_id"=>$data['vendorData']->id));
		             $data['offerNewsList'] = OfferNewsModel::getvoffersNews(array("vendordetails_id"=>$data['vendorData']->id ,"adminStatus"=>"Y"));
				   }
				 else{ return redirect("vendor/$username/approveOfferNews"); }   
			   }
			else{ return redirect("vendor/$username/approveOfferNews"); }   
		  }
		if($page=="productsDetails"){
	        if(!empty($second)){
			    $data['productsDetails'] = Products::getProducts($data['vendorData']->id, base64_decode($second));
				
				$data['productsImage'] = ProductsImageModel::getImage(base64_decode($second));
			 }
	      }
		if($page=="editProducts"){
			$productsObj = new Products;
		    $data['productsData'] = $productsObj->getProducts($data['vendorData']->id ,base64_decode($second));
		    if($data['productsData']->vendordetails_id != $data['vendorData']->id){ return redirect()->back(); } 
			$data['productsAttribute'] = ProductAttribueTable::getProductsAttribute(base64_decode($second));
		    $shopObj = new Shop_categoryModel;
		    $data['goodsshopcategoryList'] = $shopObj->getgoodShoplist($data['vendorData']->categoryType);
		    $data['shopcatData'] = $shopObj->getShopcatlist($data['productsData']->knp_shopcategory_id);
	      }   
		if($page=="uploadProductsImage"){
			$productsObj = new Products;
		    $data['productsData'] = $productsObj->getProducts($data['vendorData']->id ,base64_decode($second));
			$data['productsImage'] = ProductsImageModel::getImage(base64_decode($second));
		    if($data['productsData']->vendordetails_id != $data['vendorData']->id){ return redirect()->back(); } 
		 }  
		if($page=="trashproductList"){
		     $productsObj = new Products;
			 $data['productList'] = Products::gettrashProducts(array("shopID"=>$data['vendorData']->id));
			 $data['goodsshopcategoryList'] = Shop_categoryModel::getgoodShoplist($data['vendorData']->categoryType);
		  } 
		  
		if($page=="uesrsComplain"){
		     $data['complainList'] = ComplainModel::getComplain_by_vendor(array("receiverID"=>$data['vendorData']->id));
			 $data['show'] = FALSE;
			 if(!empty($second)){
				 $data['show'] = $second;
			     $data['complainData'] = ComplainModel::getComplain(" ", $second);
			     $data['complainDetail'] = ComplainDetails::getComplainDetails($second);
				}
		 }    
		 
		/*Order pages start*/
		   if($page=="orderList"){
		     $data['orderList'] = Order::getOrder(array("vendordetails_id"=>$data['vendorData']->id,"orderStatus"=>"N","userOrderstatus"=>"Y"));
		   }
		   if($page=="confirmUserOrder"){
		       $data['orderList'] = Order::getOrder(array("vendordetails_id"=>$data['vendorData']->id,"orderStatus"=>"D","userOrderstatus"=>"Y"));
			}
		   if($page=="dispatchedUserOrder"){
		       $data['orderList'] = Order::getOrder(array("vendordetails_id"=>$data['vendorData']->id,"orderStatus"=>"D","userOrderstatus"=>"Y"));
			} 
		   if($page=="completeOrder"){
			   $data['orderList'] = Order::getOrder(array("vendordetails_id"=>session()->get('lastVendorID'),"orderStatus"=>"R","userOrderstatus"=>"Y"));
			}	
			if($page=="cancelUserOrder"){
			   $data['orderList'] = Order::getOrder(array("vendordetails_id"=>session()->get('lastVendorID'),"orderStatus"=>"C","userOrderstatus"=>"Y"));
			}
		   	
		   	
		 /*Order pages End*/
		 /*Vendor Profile start */
		    if($page=="vendorProfile"){
			   if(!empty($first)){
				   $data['vendor_profile'] = VendorbusinesDetails::getBusinessDetails(array("vendordetails_id"=>$data['vendorData']->id ));
				 }
			   else{  return redirect()->back(); }	 
			 }
			if($page =="vendorAddres"){
			   $data['addressList'] = Address::getShopAddress(array("type"=>4,"shopID"=>$data['vendorData']->id));
			 }
			
			if($page=="deliverySchedule"){
			   $data['timeResult'] = DeliveryandPickupTimeModel::getTimeofDelivery(array("vendordetails_id"=>$data['vendorData']->id));
                          }    
		       if($page == "request_liveshop"){
			    $page = "goLiveforwebShop";
			 } 
		if($page == "coupons"){
			$vendor = DB::table('vendordetails')->where('username', $first)->first();
			if (isset($_GET['c']) && !is_null($vendor)) {
				DB::table('coupons')->where(['id' => $_GET['c'], 'vendor' => $vendor->id])->update(['current_status' => 'N']);
			}
			$data['coupons'] = DB::table('coupons')->select('coupons.*')->join('vendordetails','vendordetails.id', 'coupons.vendor')->where('vendordetails.username', $first)->orderBy('id', 'DESC')->get();
		}
		if($page == "coupon-list"){ 
			$vendor = DB::table('vendordetails')->where('username', $first)->first();
			if (isset($_GET['q']) && !empty($_GET['q'])) {
				$coupon = $_GET['q'];
				$data['coupon'] = DB::table('coupons')->where(['vendor' => $vendor->id, 'id' =>  $coupon])->first();
				if ($data['coupon']) {
					if (isset($_GET['r'])) {
						DB::table('coupon_details')->where(['coupon' => $coupon, 'id' => $_GET['r']])->update(['current_status' => 'Y', 'used_date' => date("Y-m-d H:i:s")]);
					}
					$data['coupons'] = DB::table('users')->join('coupon_details','users.id','coupon_details.alloted_user')->where('coupon', $coupon)->get();
				} else $data['coupons'] = array();
			} else {
				$page = 404;
			}
		}   
		  
	$data['my_matrimonialProfile'] = Matrimonial_model::get_matrimonial_profile(['user_id'=>session()->get('knpuser')]);
	return view("vendor.".$page)->with($data);  
  }
  
  
  
  
  	public function postAction(Request $request , $action ){
    		if(!session()->get('knpuser')) return redirect('login?loginfirst');
    		if ($action == 'coupon-create') {
    			$v = [ 'name' => 'required', 'quantity' => 'required', 'available-date' => 'required', 'closedon' => 'required',
    				'afrom' => 'required', 'expdate' => 'required', 'description' => 'required'];
    			if (!is_null($request->file('image'))) {
	    			$filename = md5(microtime()).'.'.$request->file('image')->getClientOriginalExtension();
				$path = public_path('storage/'.$filename);
				Image::make($request->file('image')->getRealPath())->resize(300,250)->save($path);
			}  else {
				$filename = 'coupon.jpg';
			}
	        	$this->validate($request,$v);
    			$data = [
    					'vendor' => $request->get('vendor'),
    					'coupon_name' => $request->get('name'),
    					'description' => $request->get('description'),
    					'available_from' => date_format(date_create($request->get('available-date')), "Y-m-d H:i:s"),
    					'available_upto' => date_format(date_create($request->get('closedon')), "Y-m-d H:i:s"),
    					'started_from' => date_format(date_create($request->get('afrom')), "Y-m-d H:i:s"),
    					'expiry_date' => date_format(date_create($request->get('expdate')), "Y-m-d H:i:s"),
    					'created_at' => date("Y-m-d H:i:s"),
    					'quantity' => $request->get('quantity'),
    					'allowed_coupons' => $request->get('allowed'),
    					'current_status' => 'Y',
    					'image' => $filename
    				];
    			$res = DB::table('coupons')->insert($data);
    			if ($res) return redirect()->back()->with(['success' => 'Coupon has been created successfully.']);
    			else return redirect()->back()->with(['errors' => 'Something went wrong. Try again later ...']);
    		}
         	if($action=="shareIndependence_day"){
           		echo "<pre>";
           		print_r($request->all());exit;
         	}
		if($action=="registrationShopAction"){
			if(!empty($request->termAndCondition)){
			   	$v = array("users_id"=>"required", "vName"=>"required","vEmail"=>"required","vMobile"=>"required|numeric",);
			   	$this->validate($request,$v);
			   	$otp = rand(100000,999999);
			   	$message = $otp."  is your otp Varification";
			   	$otpResult = VendorDetails::sendMobileSms($message,$request->input("vMobile"));
			   	$resultlastId = VendorDetails::vendorRecord($request,$otp);
			   	if($resultlastId != FALSE){
				  	return redirect("vendor/$resultlastId/shopVerifyOtp");
				}
		    	}
		  	else{
			  	return redirect("vendor/RegisteredShop?notOk");
		   	} 
 	    	}
		if($action=="selectBusinesstype"){
		   	$data['title']  = $action;
		   	if(!empty($request->shop_username)){
			   	$shop_username = $request->shop_username;
			   	return redirect("vendor/$shop_username/SelectBusinessType/");
		     	}
	       		else{ return redirect()->back(); }	
		 }
		 if($action=="business_category"){
			$v = array("shop_username"=>"required"); 
	        	$this->validate($request,$v);
			if(!empty($request->input('radio1'))){
				$result = $this->editVendorData(array("businesscategoryType"=>$request->radio1 , "editDate"=>time() ) , array("username"=>$request->shop_username));
				if($result != FALSE){
					$userName = $request->shop_username; 
				    return redirect("vendor/$userName/select_category/");
					}
				else{
					$err = "Unexpected Try again..";	
				 }
			}
			else{
			   $err="please Select any one business Type...";
			}
		  }
		  
		  
		  
		 if($action=="selecthopcatAction"){
			 $v = array("shop_username"=>"required"); 
	         $this->validate($request,$v);
		     if(!empty($request->input('shopCat'))){
		        $shopcat = implode('@',$request->input('shopCat'));
				$result = $this->editVendorData(array("categoryType"=>$shopcat , "editDate"=>time() ) , array("username"=>$request->shop_username ));
			 if($result != FALSE){
				 $vendorData = VendorDetails::getShopDetails($request->shop_username);
				 $user_data = User::find($vendorData->users_id);
				  $addDataArr = array("users_id"=>$vendorData->users_id,"vendordetails_id"=>$vendorData->id,"shop_username"=>$vendorData->username);   
				   if(VendorbusinesDetails::getduplicate(array("vendordetails_id"=>$vendorData->id)) != 1){
					   $vBusinessResult = vendorbusinesDetails::addBusinessDetails($addDataArr);
					 }
				   if(ShopSetting::getduplicateShopSetting(array("vendordetails_id"=>$vendorData->id)) != 1){
					   $vShopSetting = ShopSetting::addShopSetting($addDataArr);   
				     }	
				   
				   if(AdvertisementRecord::getduplicateAdvertisement(array("vendordetails_id"=>$vendorData->id)) != 1){
					  $addAdvertisement = AdvertisementRecord::insert(array("vendordetails_id"=>$vendorData->id , "shop_username"=>$vendorData->username ,  "totalAds"=>0));
					 } 
				  	 
				  $notification_text = "<strong>".$user_data->name." ".$user_data->lname."</strong> Has Registered a Web Shop , <strong>'". $vendorData->vName ."'</strong>, on kanpurize ";
				  $id = base64_encode($vendorData->id);
				  $image_url = ""; 
				  $send_notification = $this->send_notifiation($notification_text , url("admin/vendorsProfile/$id") , $image_url , 0 , 1);				                  if($send_notification != FALSE){
					 $send_email_rsult = $this->send_notification_email(array("shopID"=>$vendorData->id,"shopName"=>$vendorData->vName,"mobile"=>$vendorData->vMobile , "goto_url"=> url("admin/vendorsProfile/$id")) , "vendorShopCreate" );
					   $shopname = str_replace(" ","_" , $vendorData->vName);
					   return redirect("vendor/$request->shop_username/vendorDashboard?$shopname");
					}  
			   }
		     else{ $err = "Unexpected Erorr. Try again..."; } 				
		}
	    else{ $err = "Please Select Maximum One more category..."; }
	 }
	 
	 if($action == "editProductAction"){
		 if(empty($request->productsID)){
		     return redirect()->back();
			// echo $request->productsID;exit; 
		   }
		 $v = array("vendorID"=>"required","user_id"=>"required","category"=>"required","productName"=>"required",
				 "listprice"=>"required","salePrice"=>"required","quantity"=>"required","stockWarning"=>"required",
				 "pStatus"=>"required", "myTextarea"=>"required");
		  $this->validate($request,$v);
		  $imageName = $this->uploadproductsImage($request);
		    $editResult = Products::editProducts($request,$imageName);
			$editAtrributeResult=1;
			if($editResult != FALSE){
			   if(!empty($request->input("productattribute"))){
			   $editAtrributeResult = ProductAttribueTable::editAttribute($request->all(),$editResult);
			   }
			 }
			if($editAtrributeResult != FALSE){ $err = "<span style='color:green;'><strong>Products Edit Successfully...</strong></span>"; }
			else{  $err = "<span style='color:red;'><strong>Unexpected Try again....</strong></span>"; }  
		} 
		
	  if($action == "addProductAction"){
		 $v = array(
	             "vendordetails_id"=>"required",
				 "category"=>"required",
				 "subCategory"=>"required",
				 "users_id"=>"required",
				 "knp_shopcategory_id"=>"required",
				 "category"=>"required",
				 "productName"=>"required",
				 "salePrice"=>"required",
				 "quantity"=>"required",
				 "stockWarning"=>"required",
				 "pStatus"=>"required",
				 "myTextarea"=>"required",
				 "pImage" =>"required|mimes:jpeg,jpg,png",
			   ); 
		    $this->validate($request,$v);
		   if(!empty($request->category)){
		 if(!empty($request->subCategory)){   
			   if($request->hasFile($request->input('pImage'))){
				  $pImage = $this->uploadproductsImage($request);
					$result = Products::addProducts($request->all(),$pImage);
						$product_id = $result;
						if(count($request->productattribute) >0){
						foreach($request->productattribute as $key=>$val){
							if($request->value[$val] != ''){
								$product_attribue = new ProductAttribueTable;
								$product_attribue->products_id = $product_id;
								$product_attribue->productsattribute_id = $val;
								$product_attribue->value = $request->value[$val];
								$product_attribue->save();
							}
						}
				  }
				if($result != FALSE){ $err="<span style='color:green;'><strong> One Products Add Successfully,....</strong></span>"; }
				else{ $err="<span style='color:green;'><strong>Unexpected !!! Try again.....</strong></span>"; }  
			  }
			else{ $err = "<span style='color:green;'><strong> &nbsp; Image must be required....</strong></span>"; }	
		     } else{ $err="<span style='color:green;'><strong> &nbsp;Unexpected !!! Try again...</strong></span>."; }
		 }else{ $err="<span style='color:green;'><strong>&nbsp;Sub category is required .</strong></span>"; }
		}
	  	
		if($action=="uploadproductsImage"){
		    $v = array("shopID"=>"required","productsID"=>"required","knpUser_id"=>"required",
				 "proImage" =>"required");
			$this->validate($request,$v);
			if($request->knpUser_id != session()->get('knpuser')){ return redirect()->back(); }
		    if(!empty($request->productsID)){
			    $productsDetails = Products::getProducts($request->shopID, $request->productsID);
			    if($productsDetails->vendordetails_id != $request->shopID){
				     exit;
				   }
				else{
				   $formData = $request->all("proImage");
				   $pImageobj = new ProductsImageModel;
					$originalImgPath = public_path('uploadFiles/productsImg');
					$thumbImgpath = public_path('uploadFiles/thumbsImg');
					$frontImgPath = public_path('uploadFiles/productsImg/FrontImg');
				   foreach($formData['proImage'] as $pro){
						 $fileName = rand().time().$pro->getClientOriginalName();
						 $pImage = str_replace(" ","-",$fileName);
						 //thumbs image
						 $thumb_img = Image::make($pro->getRealPath())->resize(80, 68);
						 $thumb_img->save($thumbImgpath.'/'.$pImage,80);
						 //front Image
						 $frontImg = Image::make($pro->getRealPath())->resize(300, 250);
						 $frontImg->save($frontImgPath.'/'.$pImage,80);
						 //originalImage
						 $originalImg = Image::make($pro->getRealPath())->resize(1225, 1000);
						 $originalImg->save($originalImgPath.'/'.$pImage,80);
						 $result = ProductsImageModel::addpImage($pImage,$originalImgPath,$thumbImgpath,$formData);
					 }
					 if($result != FALSE){ $err = "Image Add Successfully..."; } 
				  } 
			   }
		 }
			
		if(isset($err)){
		   session()->flash('msg',"<p class='alert alert-info'>$err</style>");
		   return redirect()->back()->with('success', array('your message,here'));
		}  
  }
  
  
  public function ajaxpostAction(Request $request , $action){
     if($action == "uploadGalleryImage"){
		if($request->hasFile($request->input('image'))){
		    $image_name = $this->upload_gallery_image($request);
			$result = GalleryModel::uploadGallery($request->all() , $image_name);
		    if($result != FALSE){ 
			  echo 1;
			 }else{ echo 2; }
		 }
		else{
		   echo"<strong>image must be required </strong>.";
		 } 
	 }
     
     if($action == "deliveryAndPickupPost"){
	     if($request->input("deleveryDay") != "hidden"){
	     if(!empty($request->input("deleveryTime"))){
			$duplicateEntry = DeliveryandPickupTimeModel::getsingleTimeofDelivery(array("vendordetails_id"=>$request->input("vendorID"),"dayOfweek"=>$request->input("deleveryDay")));
			if($duplicateEntry == FALSE){
			    if( DeliveryandPickupTimeModel::addTimeofDelivery($request->all()) != FALSE){ echo "success"; }
				else{ echo "failes"; } 
			  } else{ echo"This Delivery Date and time already exists";  }  
		 } else{ echo"Please Select Delivery Time."; } 
	   }else{ echo"Please Select Delivery Day.";  }
	   
	 }
	 
	 if($action =="vendorAddAddress"){
		  $validator = Validator::make($request->all(),array( 'address1'=>'required', 'userID'=>'required',        
            'address2' => 'required',  'pinCode'=>'required|numeric', 'city'=>'required', 'state'=>'required',
          ));
          if($validator->fails()){
              return json_encode(
                       array(
                         "error"=> $validator->errors()->getMessages(),
                         "status"=>400
                          ));
             }
		  $result = Address::addressManage($request);
		  if($result != FALSE){ 
		      print_r($result);exit;
			}
		   else{   
		      return json_encode( array("status"=>2 , "msg"=>"<span style='color:red;'><strong>Unexpected try again .</strong></span>"));
	         }			 
	 }
	 
     if($action=="vBusinessDetails"){
		$validator = Validator::make($request->all(),array(
         'bownerName' => 'required','aboutBusiness'=>'required',"bName"=>"required","panNumber"=>"required","gstFile"=>"mimes:jpeg,jpg,png,pdf","vSignature"=>"mimes:jpeg,jpg,png"));
	      if($validator->fails()){
              return json_encode(
		               array(
					     "error"=> $validator->errors()->getMessages(),
					     "vStatus"=>400
						  ));
             }
		return $this->saveBusinessDetails($request->all());
	  }
	 if($action=="shoplogoImage"){
	     $result = $this->saveShopLogoImage($request->all());
		 print_r($result);exit;
	   } 
	 if($action=="shopBannerImage"){
		 $result = $this->shopBannerImage($request->all());
	     print_r($result);exit;
	   } 
	 if($action=="editServicesaction"){
		 $result = VservicesModel::editServiceDetails($request->all());
	     if($result != FALSE){
		    echo"<span style='color:red;'><strong>Record update successfully...</strong></span>";
		  }
		else{
		  echo"<span style='color:red;'><strong>Unexpected  try again....</strong></span>";
		}  
	   }  
	   
	 if($action=="setPaymentMode"){
		 if(!empty($request->input("vendordetails_id"))){
			   $result = ShopSetting::addPaymentMode($request->all(),$request->input("vendordetails_id"));
			    if($result != FALSE){  echo"<span style='color:green;'>Save Successfully....</span>"; }
                  else{ echo"<span style='color:red;'>Unexpected try again....</span>"; }    	
			 }
		   else{
			  echo"Unexpected try again...";
			 }	
	   } 
	  
	  if($action=="vendorPost_ads"){
		  $validator = Validator::make($request->all(),array(
		                'startDate'=>'required',
		                'endDate'=>'required',
	      ));
	         if($validator->fails()){
               return json_encode(
		             array("error"=>$validator->errors()->getMessages(),
					    "vStatus"=>400));
              }
			   if(!empty($request->file('postImage'))){
				   $imageName = $this->postAdvertisementPhoto($request->all()); 
		      	    if($imageName != FALSE){
					    $insertData = Advertisement::userPostAdshome($request,$imageName);
						$getLastEndPackage = Purchaseadspackagerecord::getlastEndAdsPackage($request->vendordetails_id); 
					    $updatePackagetotalPackageAds = Purchaseadspackagerecord::updateTotalAdsPackage($getLastEndPackage);
							if($updatePackagetotalPackageAds != FALSE){
							   $updateAdsRecord = AdvertisementRecord::updateAdvertisementRecord($request->all());    
							  }
						if($insertData != FALSE){
						     return json_encode(
								 array("msg"=>"<p style='color:green;'><strong> Your advertisement has been submitted . It will be posted in the market place after review... </strong></p>",
									"vStatus"=>500));
						   }
						else{ 
						     return json_encode(
								 array("msg"=>"<p style='color:red;'><strong>Unexpected Try again..</strong></p>",
									"vStatus"=>300)); 
						   }
					   }
					 else{   return json_encode(
								 array("msg"=>"<p style='color:red;'><strong> Unexpected Try again..</strong></p>",
									"vStatus"=>300)); 
					       
					     }  
				  }
		       else{  return json_encode(
								 array("msg"=>"<p style='color:red;'><strong>Please Select any one image , image Dimension Must be 1800*600 px.</strong></p>",
									"vStatus"=>300));  
			       } 			  
		} 
	 
	  if($action=="edit_Adspost"){
		  if(!empty($request->editID)){
			   $resultAdsData = Advertisement::getAdvertisement(array("id"=>$request->editID , "vendordetails_id"=>$request->vendorID) , $request->editID);
			   if($resultAdsData != FALSE){
				   if($resultAdsData->vendordetails_id != $request->vendorID){ 
				      echo json_encode(
							array(
							"msg"=>"<span style='color:red;'>&nbsp;Unexpected try Again .</span>",
							"vStatus"=>500
							));exit;
				    }
				 }
			 } 
		  $date = date('Y-m-d H:i:s',time());
		  $validator = Validator::make($request->all(),array(
			'startDate' => 'required',
			'endDate'=>'required',
		   ));
	       if($validator->fails()){
              return json_encode( array(
					                 "error"=> $validator->errors()->getMessages(),
					                 "vStatus"=>400
						        ));
             }
		    $imageName = $this->postAdvertisementPhoto($request->all()); 
			if(!empty($imageName)){
			    $updateResult = Advertisement::editPostAds($request , $imageName);
			    if($updateResult != FALSE){
					  echo json_encode(
							array(
							"msg"=>"<span style='color:green;'>&nbsp;Your advertisement has been submitted . It will be posted in the market place after review... </span>",
							"vStatus"=>500
							));
					} 
				else{
				    echo json_encode(
							array(
							"msg"=>"<span style='color:red;'>&nbsp;Unexpected try Again .</span>",
							"vStatus"=>500
							));
				  }	
			  }
		}
		
	 	
	  	
	 if($action=="addServicesaction"){
	    if(!empty($request->input("myTextarea"))){
		    if(!empty($request->input("myTextarea1"))){
			    if(!empty($request->input("myTextarea3"))){
				    if(!empty($request->input("infoMobile"))){
					    if(!empty($request->input("timing"))){
						    $duplicateData = VservicesModel::getServices($request->all());
								 if($duplicateData == FALSE){
									  $result = VservicesModel::addServices($request->all());
									   if($result != FALSE){ echo"yes";  } 
									   else{ echo"<p style='color:red;'>Unexpected try again ...</p>";  }
									}
								 else{ echo"<p style='color:red;'><strong>Service Already Registered.</strong></p>"; }
						 }
						else{  echo "<p style='color:red;'><strong>Timing is Required</strong>.</p>"; } 
					  }
					else{ echo "<p style='color:red;'><strong>Mobile Number is Required.</strong></p>"; }  
				  }
				else{ echo "<p style='color:red;'><strong>Contact Address is Required .</strong>"; }  
			  }
			else{ echo "<p style='color:red;'><strong>Prime Service Description is Required</strong>. </p>"; }  
		  }
		else{ echo "<p style='color:red;'><strong>Service Description is Required. </strong></p>"; }  
	  }
      
	 
		if($action=="kanpurizeSaveNews"){
			   $validator = Validator::make($request->all(),array(
				'startDate' => 'required',
				'endDate' => 'required',
				'newsTitle'=>'required',
			  ));
			if($validator->fails()){
				return json_encode(
					   array("error"=> $validator->errors()->getMessages(),
							  "vStatus"=>400));
			   }
		  if(!empty($request->users_id) && $request->users_id == session()->get('knpuser')){
			  if(!empty($request->vendordetails_id)){
			     if(!empty($request->file('newsofferImage'))){
				   $imageName = $this->uploadOffersnews($request);
				   if(!empty($imageName)){
				   $insertData = OfferNewsModel::vinsertofferNews($request->all(),$imageName);
					 if($insertData != FALSE){
						  return json_encode(
								array(
								"success"=>"<span style='color:green;'><strong>Your advertisement has been submitted . It will be posted in the market place after review .</strong></span>",
								"vStatus"=>500
								));
						}
					 else{
						return json_encode(
						   array("error"=>"Unexpected Try again..",
								 "vStatus"=>100
							    ));
					   }
					  }
				   }
				else{ 
				  return json_encode(
						   array("error"=>"Image Must be required .",
								 "vStatus"=>100
							    ));
				} 
			  }
			}
	     }
		if($action=="editNewsoffer"){
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
			 if(!empty($request->editID)){
			     $offerNewsDetails = OfferNewsModel::getvoffersNews("con",$request->editID);				                  if($offerNewsDetails->vendordetails_id != $request->vendordetails_id){
					  exit;
					}
				$imageName = $this->uploadOffersnews($request);
				 if(!empty($imageName)){
					 $editData = OfferNewsModel::vEditofferNews($request->all(),$imageName);
					 if($editData != FALSE){
						  return json_encode(
								array(
								"success"=>"<span style='color:green;'><strong>Your News has been submitted . It will be posted in the market place after review. </span>",
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
		 } 
	 if($action=="productsInoffer"){
		 if(!empty($request->offerID)){
		   if(!empty($request->input("checkedID"))){
			   $result = ProductSaveOffer::addProductsinOffer($request->all());
			   if($result != FALSE){
				  echo "<span style='color:green;'><strong>Products Successfully Add in Offers .</strong></span>";
				 }
			    else{
				  echo "<span style='color:green;'><strong>Please select any one products .</strong></span>";
				 }	 
			 }
		   else{
			   echo "<span style='color:red;'><strong> Please select any one products .</strong></span>";
			 }	 
		 }
	   else{ echo"<span style='color:red;'><strong> unexpected try again ..</strong></span>"; }
	   }	 
	   
	   
	   if($action == "addCommentVendor"){
	     if(!empty($request->description) || !empty($request->hasFile($request->input('image')))){
		  if(!empty($request->sender_id) || !empty($request->receiver_id) || !empty($request->complain_id)){
			  if(!empty($request->hasFile($request->input('image')))){
				  $image = $this->uploadComplainImage($request);
				}
			  else{ $image= 0; }
			  if(ComplainModel::editComplain($request->complain_id) != FALSE){
				 $commentResult = ComplainDetails::addComplainDetails($request->all() , $request->complain_id , $image);
		         if($commentResult){  echo 1; }
		         else{  echo"unexpected try again..."; }
				}
			 }
		  else{
			    echo"<span style='color:red;'><strong>unexpected try again. </strong></span>";
			 } 	 
		}
	   else{ echo "</strong></span> Please Enter some content in message box .</strong></span>"; }	
	   }  	
	   
	   
   }
  
  
  
  public function ajaxgetAction(Request $request , $action){
         if($action == "goForLive"){
	     if(!empty($request->vendorID)){
			if(!empty($request->vendor_name)){
			  if(!empty($request->status)){
				   //remind for shop live
				     $data = array("name"=>$request->vendor_name);
				     Mail::send('emails.goLiveinMarketplace', $data, function ($message) use ($request) {
						 $message->from('info@kanpurize.com', 'Kanpurize');
						 $message->to("vivek.gupta@kanpurize.com")->subject("$request->vendor_name Shop Live Request  .");
					  });
				   echo "<small style='color:green;'><strong>Remind has been sent successfully.</strong></small>";
				}
			   else{
				  $data = array("name"=>$request->vendor_name);
				  $result = VendorDetails::updateVendorData(array("goLiveRequest"=>1),array("id"=>$request->vendorID)); 
				   if($result != FALSE){
					  Mail::send('emails.goLiveinMarketplace',$data, function ($message) use ($request) {
						 $message->from('info@kanpurize.com', 'Kanpurize');
						 $message->to("vivek.gupta@kanpurize.com")->subject("$request->vendor_name Shop Live Request  .");
					  });
					  echo "<small style='color:green;'><strong>Request has been sent successfully.</strong></small>";
					 }
				   else{ 
					   echo "<small style='color:red;'><strong>Request already  send .</strong></small>";
					 }
				}		
			  }
			 else{  echo "<small style='color:red;'><strong>Shop name required .</strong></small>";  }  
		  }
	     else{ echo "<small style='color:red;'><strong>Unexpected try again .</strong></small>"; }
	   } 
       
	 if($action == "deleteTimeSchedule"){
		$result = DeliveryandPickupTimeModel::getsingleTimeofDelivery(array("id"=>$request->id));
		if($result != FALSE){
		    if($result->vendordetails_id == $request->vendor_id){
			     $result = DeliveryandPickupTimeModel::deletedeliveryandpickTime($_GET['id']);
				  if($result != FALSE){ echo"Record Delete Successfully....";  }
				   else{  echo"Unexpected try again...."; }	 
			  }
			else{ echo "unexpected try again !!! ."; }    
		  } 
	   }
	   
	   if($action == "fetchAddress"){
	     if(!empty($request->editid)){
             $addressDetails = Address::getShopAddress(" 1 ", $request->editid);
             if($addressDetails != FALSE){
                return json_encode($addressDetails);
             }
           else{  echo"<span style='color:red;'>Unexpected try again....</span>"; }   
	        }
	      else{  echo"<span style='color:red;'>Unexpected try again...</span>";   } 
	  } 
	  
	  if($action == "socialLinkDetails"){
		 if(!empty($request->edit_id)){
		   $updateArr = array("instagramLinks"=>$request->input('instagramLink') , "linkedInLinks"=>$request->input('linbkedLink') , "googlePlusLinks"=>$request->input('googlePlusLink') , "twitterLinks"=>$request->input('twitterink') , "facebookLink"=>$request->input('fbLink') , "editDate"=>time());
		   $where = array("username" => $request->input('edit_id'));
		   $vendor_details = VendorDetails::getShopDetails($request->input('edit_id'));
		   if($vendor_details->users_id != session()->get('knpuser')){ exit; }
		    if(VendorDetails::updateVendorData($updateArr,$where) != FALSE){ 
			    echo "<span style='color:green;'><strong>&nbsp; Record Save ...</strong></span>";
			  }
			 else{ echo "<span style='color:red;'><strong>Unexpected try again .</strong></span>"; }
	     }
	   }
	  
	 
	 if($action=="resendOTP"){
	   if(!empty($request->input("shopID")));{
		  $otp = rand(111111,999999);
		  $data = VendorDetails::socialLinks(array("otp"=>$otp,"otpTiming"=>time()),array("username"=>$request->input("shopID")));
		  if($data != FALSE){
			  $message = $otp."  is your otp Varification"; 
		      $otpResult = VendorDetails::sendMobileSms($message,$request->input("mobileNumber"));
		   }
		}
	  } 
	 if($action=="removeProductsinOffer"){
	     if(!empty($request->rowID)){
		    $result = ProductSaveOffer::removeRow(array("id"=>$request->rowID));
			if($result != FALSE){
			    echo "products Remove successfully";
			  }
			 else{ echo "Unexpected try again ."; }  
		 }
	   } 
	  
	  if($action=="addDetails"){
	     if(!empty($request->input("edit_id")) && !empty($request->input('ownername')) && !empty($request->input('aboutb')) && !empty($request->input('panno')) ){
			 $updateArr = array("ownerName"=>$request->input('ownername') , "aboutBusiness"=>$request->input('aboutb') , "panCardNumber"=>$request->input('panno') , "editDate"=>time());
			 $where = array("id" => $request->input('edit_id'));
		     $updateResult = VendorbusinesDetails::editBusinessDetails($updateArr,$where);
			 if($updateResult != FALSE){ 
			    echo "<span style='color:green;'><strong>&nbsp; Record Save ...</strong></span>";
			  }
			 else{ echo "<span style='color:red;'><strong>Unexpected try again .</strong></span>"; }
		  }
		 else{
		    echo "<span style='color:red;'><strong>&nbsp; Unexpected try again .</strong></span>";
		  } 
	   } 
	  
   }
   
   public function editVendorData($updateArr , $con){
       return VendorDetails::updateVendorData($updateArr , $con);
   }
  
}
