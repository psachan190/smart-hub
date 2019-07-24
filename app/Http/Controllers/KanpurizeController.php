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
use App\Models\User;
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
use App\Advertisement;
use App\AdsProfession;
use App\Ngo_model;
use App\Matrimonial_model;
use Cart;
use Auth;
use Hash;
use App\WishList;
use Mail;
use App\Blog;
use App\KnpProfileModel;
use App\GalleryModel;
use App\Address;
use App\DeliveryandPickupTimeModel;
use App\ProductsImageModel;
use App\Order;
use App\OrderDetails;
use App\Knp_common;
use App\Notifications\VerifyAccount;
use Notification;


use App\Chatmsg;
use App\Events\TaskEvent;



class KanpurizeController extends Controller{
	
	 public function __construct() {
         date_default_timezone_set('Asia/Calcutta');
	}
	
	
	public function testNotification(){
			$message = new Chatmsg;
		        $message->setAttribute('from', 322);
		        $message->setAttribute('to', 322);
		        $message->setAttribute('message', 'Demo message from user 1 to user 2');
		        $message->save();
		        // want to broadcast NewMessageNotification event
		        event(new TaskEvent($message));
	}
	
	public function kanpurize_home(){
           return redirect("/");
        }
	
	public function page ($p1 = 'home' , $p2 = NULL , $p3 = NULL) {
		Knp_common::ip();
	       $data['title'] = ucfirst($p1);
	       $data['title'] = ucfirst('Marketplace in kanpur || Online shopping in kanpur || Webshop in kanpur || Online market in kanpur ');
		  	   $data['mate_description'] = "Kanpurize is online platform for Everyone in kanpur it offers comfort of online shopping from local market and has its own Social Web, online shopping in kanpur, marketplace in kanpur, online shop in kanpur, Online market in kanpur";  
	        $data['device_type'] = $this->check_device();
		if ($p1 == 'logout') return $this->logout();
		if (session()->has('knpuser')) { $data['user'] = User::where(['id' => session()->get('knpuser')])->first(); }
		$data['share_user_id'] = session()->get('knpuser');
		if ($p1 == 'recomended' && !session()->has('knpuser')) { return redirect('login'); }
		else { $data['shopcategory'] = Shop_categoryModel::all();}
		//echo session()->get('knpuser');exit;
		if($p1 == "account"){
			if ($p2 == 'notifications') {
	           		$data['notifications'] = DB::table('users_notification')->leftjoin('users','users.id' ,'users_notification.user')->where(['users_notification.user' => $data['user']->id])->orderBy('users_notification.id','desc')->simplePaginate(10);
	           		return view('kanpur.component.notifications')->with($data); exit;
	           	}
	           	if ($p2 == 'coupons') {
	           		$data['coupons'] = DB::table('coupons')->join('coupon_details', 'coupon_details.coupon', 'coupons.id');
	           		$data['coupons'] = DB::table('vendordetails')->join('coupons','vendordetails.id','coupons.vendor')->join('coupon_details', 'coupon_details.coupon', 'coupons.id')->where(['coupon_details.alloted_user' =>  session()->get('knpuser')])->orderBy('coupons.id', 'DESC')->simplePaginate(12);
	           		return view('kanpur.component.coupons')->with($data); exit;
	           	}
	           	if (!is_null($p2))
	           		$data['user'] = User::where(['username' => $p2])->first();	
	           	
	         }
	        if($p1 == "userverify"){
		   $data['users_details'] = User::get_users_details(array("username"=>$p2));
		   
		}
		if ($p1 == 'event' && is_null($p2)) { $p1 = 'events';
			$data['events'] = DB::table('knp_events')->where('status', 'Y')->orderBy('from_date', 'desc')->paginate(15);
			$data['title'] = ucfirst('Live event in kanpur || online event in kanpur || latest event in kanpur || Social event in kanpur');
		  	$data['mate_description'] = "Live Event in kanpur, online event in kanpur, social event in kanpur, upcoming event and collage event in kanpur";
		}
		if ($p1 == 'event' && $p2 != NULL) {
			$p1 = 'eventpost';
			$data['event'] = DB::table('knp_events')->where(['url' => $p2])->first();
			if (!$data['event']) $p1 = 404;
		}
		if($p1=="blog"){
		   $data['blogListArr'] = Blog::getallblog();
		  }
		if($p1=="blog" && !is_null($p2)){
		    $p1="single_blog";
		     if(!empty($p2)){
		             $data['blogListArr'] = Blog::getallblog(1,"getPaging");
			         $data['blogdata'] = Blog::getallblog($p2);
			         if(is_null($data['blogdata'])) $p1="404";
				 $image = $data['blogdata']->image;
				 $blogID =  $data['blogdata']->id;
				  $url = $data['blogdata']->url;
		         
		         $data['title'] = $data['sharetitle'] = $data['blogdata']->title;
                         $data['sharedUrl'] = "https://kanpurize.com/single_blog/$url";
                         $data['shareimageUrl'] = "https://kanpurize.com/uploadFiles/blogImage/original_image/$image";
				 if(strlen($data['blogdata']->description) > 150){ 
					$data['sharedescription'] = strip_tags(substr($data['blogdata']->description, 0, 300));
				  }
				 else{
					$data['sharedescription'] = strip_tags($data['blogdata']->description); 
				  }
			 // echo "<pre>";
			 // print_r($data['sharedescription']);exit;	  
			  }
		  }  
		  if($p1=="view_webshop"){
			$data['allShopListData'] = VendorDetails::getAllvendorShop();
			$data['title'] = ucfirst('All webshop || Online shopping website in kanpur || New webshop in kanpur || shop list in kanpur || Service shop in kanpur ');
			   $data['mate_description'] = "Online shopping website in kanpur, shop list in kanpur, New webshop in kanpur, shop list in kanpur, Service shop in kanpur, online market in kanpur"; 
			//echo "<pre>";
			//print_r($data['allShopListData']);exit;
		  }  
		  if($p1=="offer_news"){
		  	   $data['offerdetails'] = OfferNewsModel::getvoffersNews('1' , $p2);
			//  echo "<pre>";
			  //print_r($data['offerNewsList']); exit;
		  }
		   if($p1=="web-development-in-kanpur"){
		  	   $data['title'] = ucfirst('Web development company in kanpur || Web development in kanpur || Web design in kanpur || Advertisement in kanpur || Business promotion in kanpur || digital market in kanpur ');
			   $data['mate_description'] = "Business promotion in kanpur, Web development company in kanpur, Advertisement in kanpur, Web development in kanpur, digital market in kanpur, local market and online market in kanpur"; 
			
		  }
		   if($p1=="about"){
		  	   $data['title'] = ucfirst('Online platform || Online market in kanpur || Webshop in kanpur || Social web and online shopping in kanpur ');
			   $data['mate_description'] = "online shopping in kanpur, online platform in kanpur, online shop in kanpur, local market and online market in kanpur"; 
			
		  }
		  
		  if($p1=="event"){
		  	   $data['title'] = ucfirst('Live event in kanpur || online event in kanpur || lestest event in kanpur || upcoming event in kanpur');
		  	   $data['mate_description'] = "Live Event in kanpur, online event in kanpur, social event in kanpur, upcoming event and collage event in kanpur"; 
			
		  }
		 
		  if($p1=="view_offers"){
		  	  $data['title'] = ucfirst('Offers || Best offers in kanpur, online shopping in kanpur ');
			  $data['mate_description'] = "Offers in kanpur, Best offers in kanpur, online shopping in kanpur, online offer in kanpur, All offers in kanpur"; 
			  $data['offerNewsList'] = OfferNewsModel::getVendoroffersNews(array("adminStatus"=>"Y"));
			  //echo "<pre>";
			  //print_r($data['allofferdetails']); exit;
		  }
		   if($p1=="advertisement"){
		  	   $data['title'] = ucfirst('advertisement in kanpur || Online advertising agency in kanpur || Business promotion in kanpur || digital market in kanpur ');
			   $data['mate_description'] = "
Kanpur is the best online advertising company that can be shown throughout Kanpur with the help of this online platform, your advertisement 24 Hours, boost your business by promoting your specialty, Book today."; 
		  }
		  
		  if($p1=="complain"){
		    if(!empty($p2)){
			   $data['shop_details'] = VendorDetails::get_my_shoplist(' ' ,$p2);	
			   $data['subjectList'] = ComplainSubject::addComplainSubject("fetchData");
			   $data['complainList'] = ComplainModel::getComplain(array("sendorID"=>session()->get('knpuser'),"receiverID"=>$data['shop_details']->id));
			  }
			else{ return redirect()->back(); }  
		  }
		   
		if($p1 == "read_complain"){
		     $data['complainData'] = ComplainModel::getComplain(" ",$p2);
	             $data['complainDetail'] = ComplainDetails::getComplainDetails($p2);
		  }  
		
		/*--Single Advertisement Url--*/  
		if($p1 == "postAds"){
		    if (!session()->has('knpuser')){ return redirect("/login?loginfirst"); } 
		   $data['allAdsPostData'] = Advertisement::getallAdsPotsValid(array("adminStatus"=>"Y"));
	           $data['getUserAds'] = Advertisement::getuserAdvertisement(array("users_id"=>session()->get('knpuser')));
		  }  
		 if($p1 == "EditAdvertisement"){
		    $data['resultAdsData'] = Advertisement::getAdvertisement(array("id"=>base64_decode($p2) , "users_id"=>session()->get('knpuser') ) , base64_decode($p2));
			//echo time();exit;
			if($data['resultAdsData']->endDate <= time() ){ exit; }
			if($data['resultAdsData']->users_id != session()->get('knpuser')){ return redirect()->back(); }
		    //echo "<pre>";
			//print_r($data['resultAdsData']);exit;
		  }      
		   
		  if($p1 == "wishList"){
		     $data['wishListProducts'] = WishList::getWishListProducts(array("users_id"=>session()->get('knpuser')));
		   } 
		   
		    
  		if ($p1 == 'kanpurizeMarketplace'){
  				$data['title'] = ucfirst('Best marketplace in kanpur, Online shopping in kanpur, webshop in kanpur and online platform in kanpur');
				$data['mate_description'] = "Kanpurize is online platform for Everyone in kanpur it offers comfort of online shopping from local market and has its own Social Web, online shopping in kanpur, marketplace in kanpur, online shop in kanpur, best software development company in kanpur";  

				$data['offerNewsList'] = OfferNewsModel::getVendoroffersNews(array("adminStatus"=>"Y"));
				$data['prodfileList'] = KnpProfileModel::getprofileData(array("users_id"=>session()->get('knpUser_id')));
				$data['allShopListData'] = VendorDetails::getAllvendorShop();
				$data['cartContent'] = Cart::content();
				$data['allAdsPostData'] = Advertisement::getallAdsPotsValid(array("adminStatus"=>"Y"));
				$data['coupons'] = DB::table('vendordetails')->join('coupons','vendordetails.id','coupons.vendor')->where(['current_status' => 'Y'])->orderBy('coupons.id', 'DESC')->limit(20)->get();
				$p1 = 'marketPlace';
		  }
		
		
		if($p1 == "market_shop"){
			if(!empty($p1)){
				$data['vendorData'] = VendorDetails::getShopDetails(base64_decode($p2));
			   //$shopName = str_replace(" ","_",$data['vendorData']->vName);
			   if($data['vendorData']->businesscategoryType==1){
			       return redirect("goods_Shop/$p2");
 			      }
		       else if($data['vendorData']->businesscategoryType==2){
			       return redirect("services_shop/$p2");
			      }
		       else{
			      return redirect("goods_services/$p2");
			      }
			 }else{ return redirect('')->back(); }
		  }
		  
		 if($p1 == "goods_Shop"){
		    if(!empty($p2)){
		        $data['title'] = ucfirst('Best marketshop || latest product & online shop in kanpur');
				$data['mate_description'] = "Kanpurize is online platform for Everyone in kanpur it offers comfort of online shopping from local market and has its own Social Web, Best marketshop in kanpur, latest product in kanpur, online shop in kanpur, market in kanpur";  
		    	  $shopDetails = VendorDetails::getShopDetails(base64_decode($p2));
		    	  $data['share_webshopurl'] = url($p1)."/".$p2;
		    	   //echo $data['share_webshopurl'];exit;	
		    		/*--Share data- start-*/
			   $userData = User::find($shopDetails->users_id);
			   $u = str_replace(" ","_",$shopDetails->vName);
			   $data['sharedUrl'] = urlencode("https://www.kanpurize.com/services_shop/$p2");
			   if($userData->sex == "M"){ $sr = "his"; }else if($userData->sex == "F"){ $sr = "her"; }  
			   $data['sharetitle'] = " $userData->name created $sr Web Shop "."' $shopDetails->vName '"." on Kanpurize Please visit $sr shop .";
			   //$data['sharedUrl'] = urlencode("https://www.kanpurize.com/account/$userData->username");
		       if(!empty($shopDetails->imageLogo)){
			     $data['shareimageUrl'] = "https://kanpurize.com/uploadFiles/shopProfileImg/$shopDetails->imageLogo"; 
			   }else{
			     $data['shareimageUrl'] = "https://www.kanpurize.com/uploadFiles/shopProfileImg/marketPlace.jpg"; 
			   }
			   $data['sharedescription'] = "Kanpurize is online platform for Everyone in kanpur it offers comfort of online shopping from local market and has its own Social Web, Best marketshop in kanpur, latest product in kanpur, online shop in kanpur, market in kanpur ";
			  /*--Share data--end--*/
		    		
			    $data['shopDetails'] = VendorDetails::vendor_profile($shopDetails->id);
				$shoptblObj = new Shop_categoryModel;
		        $data['catObj'] = new CategoryModel;
		        $data['subCatObj'] = new SubCategory;
				$data['goodsshopcategoryList'] = Shop_categoryModel::getgoodShoplist($data['shopDetails']->categoryType);
				if(!empty($p3)){
					$data['productsList'] = Products::getCatProducts(array("shopID"=>$data['shopDetails']->id) , $p3);
				 }
				else{
					$data['productsList'] = Products::getCatProducts(array("shopID"=>$data['shopDetails']->id , "catID"=>$data['goodsshopcategoryList']));
				 } 
				$data['offerNewsList'] = OfferNewsModel::getVendoroffersNews(array("vendordetails_id"=>$data['shopDetails']->id ,"adminStatus"=>"Y"));
				$data['wishListProducts'] = WishList::getWishListProducts(array("users_id"=>session()->get('knpuser')));
				$data['rating_result'] = VendorDetails::get_rating($shopDetails->id);
				//echo "<pre>";
				//print_r($data['rating_result']);exit;
				 }
			else{ return redirect()->back(); } 
		    $p1= "marketShop";
		  }
		  
		  if ($p1 == 'cause') {
		  	if (!is_null($p2)) {
		  		$data['cause'] = DB::table('ngo_causes')->join('ngo_tbl', 'ngo_tbl.id','ngo_causes.ngo_tbl_id')->where('ngo_causes.url', $p2)->first();
		  		if (is_null($data['cause'])) $p1 = 404;
		  	} else $p1 = 404;
		  }
		  
		  
		  if($p1 == "goods_services"){
		   $data['title'] = ucfirst('Best marketshop || online services, latest product & online shop in kanpur');
		   $data['mate_description'] = "Kanpurize is online platform for Everyone in kanpur it offers comfort of online shopping from local market and has its own Social Web, Best marketshop in kanpur, online services in kanpur, online shop in kanpur, market in kanpur";
		  	  $shopDetails = VendorDetails::getShopDetails(base64_decode($p2));
		  	  
		  	  $data['share_webshopurl'] = url($p1)."/".$p2;
		  	  /*--Share data- start-*/
			   $userData = User::find($shopDetails->users_id);
			   $u = str_replace(" ","_",$shopDetails->vName);
			   $data['sharedUrl'] = urlencode("https://www.kanpurize.com/services_shop/$p2");
			   if($userData->sex == "M"){ $sr = "his"; }else if($userData->sex == "F"){ $sr = "her"; }  
			   $data['sharetitle'] = " $userData->name created $sr Web Shop "."' $shopDetails->vName '"." on Kanpurize Please visit $sr shop .";
			   //$data['sharedUrl'] = urlencode("https://www.kanpurize.com/account/$userData->username");
		       if(!empty($shopDetails->imageLogo)){
			     $data['shareimageUrl'] = "https://kanpurize.com/uploadFiles/shopProfileImg/$shopDetails->imageLogo"; 
			   }else{
			     $data['shareimageUrl'] = "https://www.kanpurize.com/uploadFiles/shopProfileImg/marketPlace.jpg"; 
			   }
			   $data['sharedescription'] = "My shop  is running Awesome in knapurize online marketing webshop , Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was po ";
			  /*--Share data--end--*/
		  	  
		  	   $data['shopDetails'] = VendorDetails::vendor_profile($shopDetails->id);
		  	   //echo "<pre>";
		  	  //print_r($data['shopDetails']);exit;
			  $shoptblObj = new Shop_categoryModel;
		      $data['catObj'] = new CategoryModel;
		      $data['subCatObj'] = new SubCategory;
	             $data['goodsshopcategoryList'] = Shop_categoryModel::getgoodShoplist($data['shopDetails']->categoryType);
			  $data['serviceShoplist'] = Shop_categoryModel::getserviceShoplist($data['shopDetails']->categoryType);
			  if(!empty($p3)){
			    $data['productsList'] = Products::getCatProducts(array("shopID"=>$shopDetails->id ),$p3);
			   }
			  else{
			    $data['productsList'] = Products::getCatProducts(array("shopID"=>$shopDetails->id,"catID"=>$data['goodsshopcategoryList']));
			    } 
			 $data['wishListProducts'] = WishList::getWishListProducts(array("users_id"=>session()->get('knpuser')));
			  $data['offerNewsList'] = OfferNewsModel::getVendoroffersNews(array("vendordetails_id"=>$shopDetails->id ,"adminStatus"=>"Y"));
			  $data['rating_result'] = VendorDetails::get_rating($shopDetails->id);
			  $p1 = "goodandServices";
			}  
			
			
		if($p1 == "services_shop"){
			  if(!empty($p2)){
			  	$data['title'] = ucfirst('Best services in kanpur');
				$shopDetails = VendorDetails::getShopDetails(base64_decode($p2));
				 $data['share_webshopurl'] = url($p1)."/".$p2;
				/*--Share data- start-*/
			   $userData = User::find($shopDetails->users_id);
			   $u = str_replace(" ","_",$shopDetails->vName);
			   $data['sharedUrl'] = urlencode("https://www.kanpurize.com/services_shop/$p2");
			   if($userData->sex == "M"){ $sr = "his"; }else if($userData->sex == "F"){ $sr = "her"; }  
			   $data['sharetitle'] = " $userData->name created $sr Web Shop "."' $shopDetails->vName '"." on Kanpurize Please visit $sr shop .";
			   //$data['sharedUrl'] = urlencode("https://www.kanpurize.com/account/$userData->username");
		       if(!empty($shopDetails->imageLogo)){
			     $data['shareimageUrl'] = "https://kanpurize.com/uploadFiles/shopProfileImg/$shopDetails->imageLogo"; 
			   }else{
			     $data['shareimageUrl'] = "https://www.kanpurize.com/uploadFiles/shopProfileImg/marketPlace.jpg"; 
			   }
			   $data['sharedescription'] = "My shop  is running Awesome in knapurize online marketing webshop , Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was po ";
			  /*--Share data--end--*/
				
			     $data['shopDetails'] = VendorDetails::vendor_profile($shopDetails->id);
				  $data['imageListArr'] = GalleryModel::GalleryList(array("vendordetails_id"=>$data['shopDetails']->id));
				  $data['serviceShoplist'] = Shop_categoryModel::getserviceShoplist($data['shopDetails']->categoryType);
				  if(!empty($p3)){ $catID = base64_decode($p3);  }
			      else{ $catID = $data['serviceShoplist'][0]->cid; }
				  $data['servicesDetailsList'] = VservicesModel::getServicesbyCategory($data['shopDetails']->id , $catID);
		          $data['offerNewsList'] = OfferNewsModel::getVendoroffersNews(array("vendordetails_id"=>$data['shopDetails']->id,"adminStatus"=>"Y"));
		           $data['rating_result'] = VendorDetails::get_rating($shopDetails->id);
				}
			  else{ return redirect()->back(); }
			  $p1 = "marketserviceShop"; 	
			}	
			
		     if($p1 == "orderDetails"){			
			$data['cartCount'] = Cart::count();
			if(empty($data['cartCount']) || is_null($data['cartCount']))return redirect("kanpurizeMarketplace");
		        $data['allMarketShopAddrs'] = Address::getUsersCartAddrss(array("type"=>"userCartAddress","users_id"=>session()->get('knpuser')));
		      
		      }	

                   if($p1 == "products"){
		   if(!empty($p2)){ $data['productsResult'] = Products::getSearchProducts($p2); 
		    $data['wishListProducts'] = WishList::getWishListProducts(array("users_id"=>session()->get('knpuser')));
		     //echo "<pre>";
			 //print_r($data['productsResult']);exit;
			}
		   else{ return redirect()->back();  }
			$p1 = "searchProducts";		 	 
		   }  
		   
		   if($p1 == "productsDetails"){
			  $value = 4455454; 
	                  $pID = base64_decode($p2) - $value; 
			  $data['productsName'] = $p3;
			  $data['productsDetails']= Products::getProducts("default",$pID);
			  $data['getproductsImage'] = ProductsImageModel::getImage($pID);
			  $data['relatedProducts'] = Products::getRelatedProducts(array("vendordetails_id"=>$data['productsDetails']->vendordetails_id,"subcategory_id"=>$data['productsDetails']->subcategory_id));
			  $data['getBottomProducts'] = Products::getRelatedProducts(array("vendordetails_id"=>$data['productsDetails']->vendordetails_id,"subcategory_id"=>$data['productsDetails']->category_id));
			  $data['wishListProducts'] = WishList::getWishListProducts(array("users_id"=>session()->get('knpuser')));
			}
			
                   if($p1 == "usersOrder"){
		    $data['cartCount'] = Cart::count();
	            $data['allOrderDetails'] = Order::getOrder(array("users_id"=>session()->get('knpuser'),"userOrderstatus"=>"Y"));
		  } 
		  
		   if($p1 == "usersorderDetails"){
		       //echo $p2; exit;
		        $data['cartCount'] = Cart::count();
	                $data['orderDetails'] = OrderDetails::getOrderDetails(decrypt($p2));		       
	              }
 
		if ($p1 == 'action' && $p2 == 'redeam-coupon' && !is_null($p3)) {
			if (!session()->has('knpuser')) return;
			$res = DB::table('coupons')->where('id', $p3)->first();
			if ($res) {
				$res1 = DB::table('coupon_details')->where(['coupon'=> $p3, 'alloted_user' => session()->get('knpuser')])->first();
				if (!$res1) {
					$coupon = rand(10000000, 99999999);
					$data = ['coupon' => $p3, 'coupon_no' => $coupon, 'alloted_user' => session()->get('knpuser'),
						'alloted_date' => date("Y-m-d H:i:s"), 'current_status' => 'N'
						];
					DB::table('coupon_details')->insert($data);
					$query = DB::table('coupons')->where('id', $p3);
					$query->increment('issued');
					$query->decrement('quantity');
					return 'Redeamed'; 
				} else return 'Redeamed';
			} return 'Error';
			exit;	
		}
		
		if ($p1 == 'coupons') {
			$data['coupons'] = DB::table('vendordetails')->join('coupons','vendordetails.id','coupons.vendor')->where(['current_status' => 'Y'])->orderBy('coupons.id', 'DESC')->paginate(20);
		}

		/*--Single Advertisement Url--*/  
		  
		if(!view()->exists("kanpur.$p1")) $p1 = 404;
		return view('kanpur.'.$p1)->with($data);
	}
	
	public function action(Request $req, $page){
	   	if ($page == 'contact-us') return $this->contact_form($req);
	   	if ($page == 'profile') { return $this->profile($req); }
	   	if ($page == 'complainAction'){
		     $v = array("complainSubject"=>"required" ,"sender_id"=>"required" ,"receiver_id" => "required" ,  "complain_title"=>"required" , "description"=>"required",); 
	         $this->validate($req , $v);
			 $result = $this->complainAction($req);
		     return redirect()->back()->with([ 'msg' => $result]);
		   }
		if ($page == 'login') { 
		     return $this->login($req);
		    }
				
		exit;
	}
	
	
	
	//working
	public function actionAjaxGet(Request $request  , $action){
	   if($action == "resendOTP"){
		  if(!empty($request->otpmob) || !empty($request->otpid)){
			$otp = rand(1000 , 9999);  
			$message = $otp."  is your otp Varification";
		        $otpResult = VendorDetails::sendMobileSms($message,$request->otpmob );
			$otpresult = User::verifyotpStatus(array("otp"=>$otp , "otpTiming"=>time()) , array("id"=>$request->otpid));
			if($otpresult != FALSE) echo "Resend OTP successfully .";
			else{ echo " Try to Again  ."; }
			}
		  else{ echo "Unexpected try again !!!."; }	 
		}
	  if($action == "otpmatch"){
		  if(!empty($request->otpid)){
			 if($request->otpcopy == $request->otp){
				 $users_details = User::find($request->otpid); 
				 if($users_details->otp == $request->otp){
			        $otpresult = User::verifyotpStatus(array("status"=>1 , "updated_at"=>time()) , array("id"=>$request->otpid)); 
					if($otpresult != FALSE){
					        Auth::login($users_details);
						session(array('knploggedin'=> 'Y', 'knpuser'=>$users_details->id));
					  	echo 1; 
					  }
					else{ echo 2; }  
				  }
			   }
			 else{   echo "<div class='notice notice-success'><strong>Oops , </strong> did not match . </div>";exit; }  
			}
		  else{ echo "<div class='notice notice-danger'><strong>Opps , </strong> Unexpected Try again . </div>";exit; }	
		}
		
		if($action == "getsubCatWiseProducts"){
		 if(!empty($request->subCatid) || !empty($request->shopID)){
			$data['productsList'] = Products::getCategoryBaseProducts(array("shopID"=>$_GET['shopID'],"subcatID"=>$_GET['subCatid']));
			$data['wishListProducts'] = WishList::getWishListProducts(array("users_id"=>session()->get('knpuser')));
			return view("kanpur.getProducts")->with($data); 
		  }
		}
		
	  if(empty(session()->get('knpuser')) && session()->get('knpuser') == ""){ echo "loginfirst";exit; }
	  if($action == "getCountWishList"){
		   $wishListProducts = WishList::getWishListProducts(array("users_id"=>session()->get('knpuser')));
		   if($wishListProducts->count() > 0){
			    print_r($wishListProducts->count());
			 }
		    else{ echo 0; exit; }	 	
		 }
	  
	  if($action == "rating"){
	        $get_duplicate = VendorDetails::get_duplicate($request);			       
		  if($get_duplicate == FALSE){
		       $result = VendorDetails::add_rating($request);
			  if($result != FALSE){
				  echo 1;exit;
				}
			  else{
				  echo"<small style='color:red;'><strong>Unexpected , try again !!!.</strong></small>";exit;
				} 
			}
		  else{
			echo 1;exit;
			} 	
		}
	  	
	  		
	
	  if($action == "gettiming_basedonday"){
			  $timeArr = array(1=>"08::00 AM - 10:00 AM",2=>"10::00 AM - 12:00 AM",3=>"12::00 AM - 02:00 PM",4=>"02::00 PM - 04:00 PM",5=>"04::00 PM - 06:00 PM",6=>"06::00 PM - 08:00 PM",7=>"08::00 PM - 10:00 PM");
		   if(!empty($request->input("selectedDate"))){
			 if(!empty($request->input("vendorID"))){
				$dayOfWeek = date('w', strtotime($request->input("selectedDate"))) + 1;
				$timingResult = DeliveryandPickupTimeModel::getsingleTimeofDelivery(array("vendordetails_id"=>$request->input("vendorID"),"dayOfweek"=>$dayOfWeek));
				//echo "<pre>";  
				//print_r($timingResult);exit;
				  if(!empty($timingResult->timingOfday)){
							$resultTimeArr = explode("@",$timingResult->timingOfday);
							$k=1;
						  $currentDate = date('m/d/Y');
						  if($currentDate == $request->input("selectedDate")){
							  $today = date("H:i:s");                         // 17:16:18
							  if($today >="08:00" && $today <= "10:00"){
								   $lesstimeArr = array(1=>3,2=>4,3=>5,4=>6,5=>7); 
								}
							  else if($today > "10:00" && $today <="12:00" ){
								 $lesstimeArr = array(1=>4,2=>5,3=>6,4=>7); 
								}	
							   else if($today > "12:00" && $today <="14:00" ){
								   $lesstimeArr = array(3=>5,4=>6,6=>7); 
								} 
							   else if($today > "14:00" && $today <="16:00" ){
								   $lesstimeArr = array(4=>6,6=>7); 
								}
							   else if($today > "16:00" && $today <="18:00" ){
								   $lesstimeArr = array(6=>7); 
								}
							   else if($today > "18:00" && $today <="20:00" ){
									$lesstimeArr = array(); 
								}
							   else if($today > "20:00" && $today <="22:00" ){
								   $lesstimeArr = array(); 
								}					
							  $resultTimeDuration = array_intersect($resultTimeArr,$lesstimeArr);
								 if(count($resultTimeDuration) >0){
									 foreach($resultTimeDuration as $key=>$value){
										 ?>
										 <div class="col-sm-4 custom-radio" style="margin-top:10px;">
									  <input type="radio" name="deliveryTiming" id="timing<?php echo $value; ?>" value="<?php if(!empty($value))echo $timeArr[$value]; ?>" />
									 <label for="timing<?php echo $value; ?>"><span class="circle"></span>&nbsp;
									  <?php if(!empty($value))echo $timeArr[$value]; ?>
									 </label>
									</div>
										 <?php
									   }
								   }
								 else{ echo "<small style='color:red;'><strong>Today all Services Timing are Closed. </strong></small>"; }							}
						  else{
								foreach($resultTimeArr as $key=>$value){
								 ?>
								 <div class="col-sm-4 custom-radio" style="margin-top:10px;">
								  <input type="radio" name="deliveryTiming" id="timing<?php echo $value; ?>" value="<?php if(!empty($value))echo $timeArr[$value]; ?>" />
								 <label for="timing<?php echo $value; ?>"><span class="circle"></span>&nbsp;
								  <?php if(!empty($value))echo $timeArr[$value]; ?>
								 </label>
								</div>
								 <?php
								 }
							 }
				   }
				  else{ echo"<small style='color:red;'><strong>We are not Provide Services on this day. </strong></small>";exit; }
			   }
			 else{  echo"<small style='color:red;'><strong>Unexpected try again .</strong></small>";exit;  } 
		  }
		}		 		
	   	
	  if($action == "addtoWishList"){
		if(!empty($request->productId)){
			 $duplicate = WishList::getWishList(array("users_id"=>session()->get('knpuser') , "products_id"=>$request->productId));
			 if($duplicate == FALSE){
			       $result =  WishList::addtowishList(array("users_id"=>session()->get('knpuser') ,"products_id"=>$request->productId,"status"=>"Y"));
			      echo"Products Added in WishList";
			   }
			 else{ echo" This Products already Added in Wish List";  }  
		}
		else{ echo"unexpected , try again.."; }
	   }
	}
	
	
	
	
	//working
	public function actionAjaxPost(Request $request  , $acion){
	
	  if($acion == "editkanpurizeUserAdsPost"){
		   $validator = Validator::make($request->all() , array(
             "editID"=>"required", 'startDate' => 'required','endDate'=>'required',
	    ));
	      if($validator->fails()){
              return json_encode( array("error"=> $validator->errors()->getMessages(),
					                      "vStatus"=>400 ));
             }
		    $resultAdsData = Advertisement::getAdvertisement(array("id"=>$request->editID , "users_id"=>session()->get('knpuser')) , $request->request );
			if($resultAdsData->endDate <= time() ){ exit; }
			if($resultAdsData->users_id != session()->get('knpuser')){ exit; }	 
		    $imageName = $this->postAdvertisementPhoto($request->all());
		  	if(!empty($imageName)){
			    $updateResult = Advertisement::editPostAds($request , $imageName);
			    if($updateResult != FALSE){
					  echo json_encode( array( "msg"=>"<span style='color:green;'>&nbsp;<strong>Your advertisement has updated been submitted . It will be posted in the market place after review</strong> . </span>",
							          "vStatus"=>100
							      ));
					} 
				else{
				    echo json_encode(array("msg"=>"<span style='color:red;'>&nbsp;<strong>Unexpected try Again .</strong></span>",
							 "vStatus"=>100));
				  }	
			  }
		}
	  
	  
	  if($acion == "adsPosthome"){
		   $validator = Validator::make($request->all(),array(
		   'userID'=>'required', 
		   'startDate'=>'required',
		   'endDate'=>'required',
	       ));
		  if($validator->fails()){
			return json_encode(
						   array("msg"=> $validator->errors()->getMessages(),
								  "vStatus"=>400));
		   }
		   if(!empty($request->input("termandcondition"))){
			   if(!empty($request->file('postImage'))){
				   $imageName = $this->postAdvertisementPhoto($request->all());
				   $insertData = Advertisement::userPostAdshome($request,$imageName);
				   if($insertData != FALSE){
							  echo json_encode(
						            array("success"=>"<p style='color:green;'><strong>&nbsp;Your advertisement has been submitted . It will be posted in the market place after review... </strong></p>",
									"vStatus"=>500, "lastID"=>$insertData
									));
							   }
						    else{
					           echo json_encode(
							      array("msg"=>"<p style='color:green;'><strong>Unexpected Try again..</strong></p>",
									"vStatus"=>100
								     ));
						       }
				 }
			   else{
				  echo json_encode( array("msg"=>"<p style='color:red;'><strong>Please Select any one image , image Dimension Must be 1800*600 px.</strong></p>",
								"vStatus"=>100 ));
				 } 	 
			 }
		   else{
			    echo json_encode( array("msg"=>"<p style='color:red;'><strong>Please accept all term and condition.</strong></p>",
									"vStatus"=>100 ));
			  }	 
		}
		
	  
	 
	  if($acion =="complainReply"){	
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
			  else{ echo"unexpected try again..."; } 	 
			}
		  	else{  echo "Please Enter some content in message box"; }	 
		  }	
		exit;
	  }
	
	
	public function profile ($request) {
		$user = session()->get('knpuser');
		if ($request->all()['gender'] != '') {
			$status = DB::table('users')->where(['id' => $user])->update(['sex' => $request->all()['gender']]); 
			if($status) echo 'Gender Updated.'."\n";
		}
		if ($request->all()['username'] != '') {
			if (!DB::table('users')->where(['username' => $request->all()['username']])->first()) {
				$v = array("username"=>"required|alpha_dash"); 
				$validation = Validator::make($request->all(), $v);
				if ($validation->fails()) {
			            echo 'You can use only alphabet and numeric charector. Dash(-) and underscore(_) are also can be used.';
			            exit;
			        }
				$status =  DB::table('users')->where(['id' => $user])->update(['username' => $request->all()['username']]); 
				if($status) echo 'Username has been changed'."\n";
			}
			else {
				$res = DB::table('users')->where(['id' => $user])->first();
				if ($res->username != $request->all()['username']) {
					echo 'This username is not available.'."\n";
				}
			}
		} 
		if ($request->all()['about'] != '') {
			$status =  DB::table('users')->where(['id' => $user])->update(['about' => $request->all()['about']]); 
			if($status) echo 'Infomartion has been updated'."\n";
		} 
		if ($request->all()['dob'] != '') {
			$date = date_format(date_create($request->all()['dob']),"Y-m-d");
			$status =  DB::table('users')->where(['id' => $user])->update(['birthday' => $date]); 
			if($status) echo 'Birthdate has been updated'."\n";
		} 
		
	} 
	
	public function contact_form($request){
	   $v = array("name"=>"required","email"=>"required","mobile"=>"required","type"=>"required","comment"=>"required"); 
	   $this->validate($request,$v);
	     $data = array("name"=>$request->name,"email"=>$request->email,"mobile"=>$request->mobile,"enquiry"=>$request->type,"comment"=>$request->comment);
	     Mail::send('emails.userContact', $data, function ($message){
					$message->from('info@kanpurize.com', 'Kanpurize User Enquiry');
					$message->to("info@kanpurize.com")->subject('User Enquiry!');
					});
		 if(Mail::failures()) {
             		return redirect()->back()->with(['status' => 'error', 'msg' => 'Something went wrong. Try again later ...']);
          }
		 else{
		     return redirect()->back()->with(['status' => 'success', 'msg' => 'Information has been submitted successfully.  We`ll get back to  you soon.']);
		  } 			
					
	}
	
	public function logout(){
	   	Session::flush();
	   	Auth::logout();
       		return Redirect::to('/');
       		exit;
	}
 
 
  
 
  //working
  public function complainAction($request){
	  if($request->complainSubject == 0){  return "<strong>Please Select any one message !!!</strong>";  }
	  else{	 
		    $image = $this->uploadComplainImage($request);
		    $resultLastID = ComplainModel::addComplain($request->all());
			 $complainResult = ComplainDetails::addComplainDetails($request->all() , $resultLastID , $image);
			 if($complainResult != FALSE){
				return "<p style='color:green;'><strong>Your message has been submitted successfully . The seller will respond to it shortly</strong></p>";
			  }
			 else{
				 return "<p style='color:red;'><strong>Unexpected try again...</strong></p>";
			  } 
		  }
   }
   
   public function complainView($complainID,$shopID){
	 $data['title'] = "complain_view";
	 $shopID = base64_decode($shopID);
	 if(empty($complainID) || empty($shopID)){
		  return redirect()->back();
		}
	 $data['shopDetails'] = VendorDetails::vendorDetails($shopID);
	 $shop_id = base64_encode($data['shopDetails']->id);
	 $shop_name = $data['shopDetails']->vName;
	 //echo "<pre>";
	 //print_r($data['shopDetails']);exit;
	 $data['backurl'] = "kanpurize_Complain/$shop_id/$shop_name"; 	
	 $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpuser'));
	 $data['complainData'] = ComplainModel::getComplain("1",$complainID);
	 //print_r($data['complainData']);exit;
	 $data['complainDetail'] = ComplainDetails::getComplainDetails("1",$complainID);
	 return view("kanpur.complain_view")->with($data);
	 
	
  }
  
  
 
   public function RegisteredShop(){
	  $data['title'] = "Registered Shop";
	 $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'),"shopList");
	 return view("kanpur.RegisteredShop")->with($data);
   }
   
   /*
   
   public function Kanpurize_login(){
	$data['title'] =  "kanpurize_login";
		$first = rand(100,999999);
		$knpUser_name = str_replace(" ","-",session()->get('knpUser_name'));
	   	return redirect("kanpurizeMarketplace?userRef=$first$knpUser_name"); 
  }
  */
  
  /*
  
  	  public function loginAction(Request $request=NULL){
      $v = array("email"=>"required","password"=>"required",); 
	  $this->validate($request,$v);
	    $userdata = array(
        'email'     => $request->email,
        'password'  => $request->password
      );
	
		if (Auth::attempt($userdata)) {
	  		   $formData = $request->all();
	   		   $result = User::signIN($formData);
			   $knpUser_id = $result->id;
			   $knpUser_nameDemo = $result->name;
			   $knpUser_email = $result->email;
			   $knpUser_roll_id = $result->roll_id;
			   session(array('knpUser_id'=>$knpUser_id,'knpUser_name'=>$knpUser_nameDemo,'knpUser_email'=>$knpUser_email,'knpUser_roll_id'=>$knpUser_roll_id));
			   $first = rand(100,999999);
			   $knpUser_name = str_replace(" ","-",$knpUser_nameDemo);
			return redirect("kanpurizeMarketplace?userRef=$first$knpUser_name"); 	  
		 } 
		 else{
		 	 $err = "Invalid Email/password ";  
		 	 session()->flash('msg',"<p class='alert alert-info'>$err</style>");
		     return redirect()->back(); 
		 }
  }
   */
   
    public function completeOtpVerify(Request $request){
	 if(!empty($request->userID)){
	     if($request->otpcopy != $request->otp){
		     echo "<p style='color:red;'><strong>Otp Does Not match.</strong> </p>";
		   }
		 else{
		    $result = User::find(decrypt($request->userID));
		    if($result->otp != $request->otp){
			   echo "<p style='color:red;'><strong>Unexpected try again .</strong> </p>";
			}
			else{
			  $resultVerify = User::verifyotpStatus(array("status"=>1,"updated_at"=>time()),array("id"=>decrypt($request->userID)));
			 if($resultVerify != FALSE){
				 echo 1;
				  //$loginresult = Auth::login($result);
				  //if($loginresult != FALSE){
					//   $first = rand(100,999999);
					  // return redirect("kanpurizeMarketplace?userRef=$first");
					//}
				   //else{
					 //  echo "no Login";exit;
					//}	
				  //echo "<pre>";
				  //print_r($result);exit;
				  /*
				  if(Auth::attempt(['mobileNumber'=>$result->mobileNumber,'password'=>$result->password])){
			        session(array('knpUser_id'=>Auth::user()->id,'knpUser_name'=>Auth::user()->name,'knpUser_email'=>Auth::user()->email,'knpUser_roll_id'=>Auth::user()->roll_id,'gender'=>Auth::user()->sex));
                  return redirect('kanpurizeMarketplace');
                }
				else {
				 	 echo "<p style='color:red;'><strong>Unexpected try again .</strong> </p>";
				 }  
				 */
				} 
			  else{
				  echo "<p style='color:red;'><strong>Unexpected try again .</strong> </p>";
				}	
			}
		   }  
	   }
	 else{
	     return redirect()->back();
	   }  
   }
   
   
   public function userotpVerify(Request $request){
     $data['title'] = "User Verify Otp";
	 if(!empty($request->usersLastID)){
	      $data['result'] = User::find(decrypt($request->usersLastID));
		  $data['userID'] = encrypt($data['result']->id);
		  //echo "<pre>";
		  //print_r($data['result']);
		  return view("kanpur.otpVerify")->with($data);
	   }
	 else{
	     return redirect()->back();
	   }  
   }
   
   	public function signupAction(Request $request){  
   	      if(empty($request->terms)){
		     return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Note , </strong> Please accept term and condition . </div>',
							       "vStatus"=>1 )); exit; 
		  }
   	      if($request->password != $request->confirmPassword){
		    return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Wrong , </strong> Password does not match  . </div>',
							       "vStatus"=>1 )); exit; 
		  }    
		$validator = Validator::make($request->all(),array(
					'email' => 'required|email|max:255',
	       				'password' => 'required|min:6',
		   			'name' => 'required',
		   			'pincode' => 'required|numeric',
		   			'mobile'=>'required|min:10|max:10'
	    			));
	  	if($validator->fails()){
        		return json_encode(array("error"=> $validator->errors()->getMessages(),"vStatus"=>400));
       		}
	   	$duplicateEmail = User::checkUniqeValue(array("email"=>strtolower($request->input("email"))));
	   	if($duplicateEmail != TRUE){
		  	$duplicateMobile = User::checkUniqeValue(array("mobileNumber"=>$request->input("mobile")));
		  	if($duplicateMobile != TRUE){
	         	$pinResult = KnpPincodeModel::matchPincode($request->all());
			  	if($pinResult != FALSE){
				  	$result = User::signUp($request->all());
					if(count($result) >0){
					   	$useremail = "";
			           		$uerID = base64_encode($result->id);
			           		$encemailID = base64_encode($result->email);
			           		$useremail = trim($result->email);
			           		$url = "https://kanpurize.com/userVerify/$uerID/$encemailID"; 
			           		$data = array("name"=>$result->name,"url"=>$url);
			           		$message = $result->otp." is your 4 digit OTP to activate your account on Kanpurize. Please don't share this OTP with anyone";
			                        $otpResult = VendorDetails::sendMobileSms($message,$result->mobileNumber);	
							/*
							Mail::send('emails.usersVerifymails', $data, function ($message) use ($result) {
							$message->from('info@kanpurize.com', 'Kanpurize');
							$message->to($result->email)->bcc('vivek.gupta@kanpurize.com')->subject('Account Verification!');
						  }); */
					  return json_encode(
					      array("msg"=>'<div class="notice notice-success"><strong> Success , </strong>  Registration Successful. </div>',
							    "username"=>$result->username,
							    "vStatus"=>11));
					  }
			 	}
			   else{
				  return json_encode(
					    array("msg"=>'<div class="notice notice-danger"><strong> Oops , </strong>  This Service is currently not available Out of Kanpur. </div>',
						"vStatus"=>1));   
				}	
			}
		  else{
			  return json_encode(
				array("msg"=>'<div class="notice notice-danger"><strong> Wrong , </strong>  This Mobile Number is All ready Taken</div>',
					"vStatus"=>1));     
			} 	
		}
	   else{
		   return json_encode(
				 array("msg"=>'<div class="notice notice-danger"><strong> Wrong , </strong> This Email id is All ready Taken .</div>',
							"vStatus"=>1));     
	   }
  }

   
  
  public function kanpurize_signup(){
	$data['title'] =  "kanpurize_signup";
	if(!empty(session()->get("knpuser")) || !empty(session()->get("knpuser"))){
	    return redirect("kanpurizeMarketplace");
	  }
    return view("kanpur.kanpurizeSignup")->with($data); 
  }  
  
  
  
   public function userVerify($user){    
        $data = array("status"=>1);
        $con = array("id"=>$user);
        $result = User::editUsersDetails( $con , $data);        
        if($result != FALSE){
             return redirect('/login')->with(['msg' => '<div class="notice notice-success"><strong> Success , </strong> Account Activate successful , please login countinue  . </div> .']);  
         }
        else{
              return redirect('/login')->with(['msg' => '<div class="notice notice-danger"><strong> Oops , </strong> Something Error . </div> .']);
         }
          
    }
    
    
	
	function login ($req) {
		if(is_numeric($req->user))
		    $con = array("mobileNumber"=>$req->user);
		else
	        $con = array("email"=>strtolower($req->user));
		$userDetails = User::get_users_details($con , "find");
		if(count($userDetails) > 0){
		   if (Hash::check($req->password , $userDetails->password)) {
			  if($userDetails->status == 1){
					session(array('knploggedin'=> 'Y', 'knpuser'=>$userDetails->id));
					Auth::login($userDetails);
					if (str_replace(url('/'), '', url()->previous()) == '/login')
					return redirect('');
				}
			  else{
			           //echo "<pre>";
			           //print_r($userDetails);exit;
			           
			           if(is_numeric($req->user)){
			               $enctype = md5(time().$req->user); 
			               $sendUrl = url("account_verify")."/".$userDetails->id;
			               $message = "Click here for Verify your account ".$sendUrl;
			               $sendResult = VendorDetails::sendMobileSms($message , $req->user);
			               return redirect()->back()->with(['msg' => '<div class="notice notice-danger"><strong> Oops , </strong> Your profile is not activate , please active your account . </div> .']);
			             }
			            
			           else{			               
			               $sendUrl = url("account_verify")."/".$userDetails->id;
			               $mailData = array("linkurl"=>$sendUrl);
			               Notification::send($userDetails  , new VerifyAccount($mailData));
			               return redirect()->back()->with(['msg' => '<div class="notice notice-danger"><strong> Oops , </strong> Your profile is not activate , please active your account . </div> .']);
			             }  
			             
			            
				} 	
			}
		   else
		   	 return redirect()->back()->with(['msg' => '<div class="notice notice-danger"><strong> Wrong , </strong> Password does not match . </div>']);
		 }
		else
		 return redirect()->back()->with(['msg' => '<div class="notice notice-danger"><strong> Wrong , </strong> User does not exist with this credentials. </div>']);
	}
  
}
   
   