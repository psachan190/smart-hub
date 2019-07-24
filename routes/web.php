<?php
//Push notification message 
Route::get("eventTest","Talentcontroler@event");

//Prashant Sachan
Route::get('view_offers',"KanpurizeController@page");

/* sonal code */
Route::get('chati', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
/*Independent url start*/
Route::get("xyz/{name}/{action?}","Shop@shareInd");
Route::get("rakshabandhan_get/share_rakshabandhan","Shop@sharerakshabandhan");

Route::get("ipAddress",function(){
	    $ip= \Request::ip();
      	    $data = \Location::get($ip);
      	      print_r($data);exit;
        //dd($data);
	});
/*Independent url End*/

/*jitendra*/
Route::get("registerTalent","Talentcontroler@registerTalent");

Route::get('kanpurize_home',"KanpurizeController@kanpurize_home");
Route::get("check_device" , "KanpurizeController@check_device");


/*Talent url start*/
Route::get('talent/{page?}/{para?}',"Talentcontroler@page");
Route::post("talent/{action}","Talentcontroler@action");
Route::get("talentGetAgax/{action}","Talentcontroler@actionGetAjax");
/*Talent url start*/

/*-- Social Url Script Start--*/
Route::get("social/action/{a1?}/{a2?}/{a3?}","Social@get_action");
Route::get("social/{p1?}/{p2?}/{p3?}","Social@page");
Route::post("social/action/{a1?}/{a2?}/{a3?}","Social@action");
//Route::post("social_message","Social@message");
/*-- Social Url Script End--*/

/*-- Matrimonial Url Script Start--*/
/*-- Matrimonial Url Script Start--*/
Route::get("matrimonial/get_matrimonial","Matrimonial@get_matrimonial");
Route::get("matrimonial/{pages?}","Matrimonial@index");
Route::get("matrimonial/{pages?}/{first?}/{second?}","Matrimonial@page");
Route::post("matrimonial/{action}","Matrimonial@postaction");
Route::get("matrimonialAjax/{action}","Matrimonial@getAction");
Route::post("matAgaxPost/{action}" , "Matrimonial@ajaxPostAction");

/*-- Matrimonial Url Script End--*/

/* Kanpurize Vendor Section url start */
Route::get("vendor/{page}","Shop@page");
Route::get("vendor/{getaction}/{first}/{second?}","Shop@getaction");
Route::post("vendor/{action}","Shop@postAction");

Route::get("vendorBackup/{para}/{page}","Shop@vendorBackup");
Route::get("getAllvendorBackup","Shop@getAllvendorBackup");

//Route::get("vendor/{getaction}/{first}/{second}","Shop@");
Route::post("vendorAgax/{action}","Shop@ajaxpostAction");
Route::get("vendorAgax/{action}","Shop@ajaxgetAction");

/* Kanpurize Vendor Section url End */


/* Kanpurize Vendor Section url End */



/*-- NGO --*/
Route::get("ngo/create","Ngo@create");
Route::post("ngo/new_create","Ngo@save");
Route::get("ngos","Ngo@ngos");
Route::get("ngo/{ngo}","Ngo@ngo");
Route::get("ngo/{ngo}/{page}","Ngo@ngo");
Route::any("ngo/{ngo}/action/{action}","Ngo@action");
Route::get("my_ngo/get_myngo","Ngo@my_ngo"); 
/*-- End NGO --*/


/*----Kanpurize Blog Controller End */
Route::get("management/{page?}/{para1?}","Managementcontroller@index");
Route::post("management/{action}","Managementcontroller@postAction");
Route::get("managementAjax/{action}","Managementcontroller@getAction");
/*--Managment Dashborad Manage Url start --*/



Route::get("reset/password","Admin@passwordReset");
Route::get("reset/getUserDetails","Admin@getUserDetails");
Route::get("users/password_reset/{token}" , "Admin@password_reset");
Route::post('users/reset_Password' ,"Admin@resetPassword");
Route::get("account_verify/{user}","KanpurizeController@userVerify");

Route::get("admin/layout","Admin@layout");
Route::get("admin/adminlogin","Admin@adminlogin");
Route::post("admin/loginCon","Admin@loginCon");
//Route::get("/admin/login","Admin@adminIndex");
Route::get("admin/signout","Admin@signout");
Route::get("admin/{page}/{para?}","Admin@page");
Route::post("admin/{action}","Admin@action");
Route::get("adminAgaxget/{action}","Admin@ajaxGetaction");
Route::post("adminAgaxpost/{action}","Admin@ajaxPostaction");



/*Talent url start*/
Route::get('talent/{page?}/{para?}',"Talentcontroler@page");
Route::post("talent/{action}","Talentcontroler@action");
/*Talent url start*/

Auth::routes();




/*--- Common Validation ---*/
Route::get("validate_emails","Validate_controller@validate_emails");
Route::get("validate_contact","Validate_controller@validate_contact");
Route::get("validate_username","Validate_controller@validate_username");
/*--- End Validation ---*/



/*--- Shop Management ---*/
Route::get("vendor/create","Ngo@create");
Route::post("vendor/new_create","Ngo@save");
Route::get("vendor/{shop}","Ngo@ngo");
Route::get("vendor/{shop}/{page}","Ngo@ngo");
Route::get("vendor/{shop}/action/{action}","Ngo@action");
/*--- End Shop Management ---*/




/*Share controller code start */
Route::get("shareWebshop/{shopID}","Sharecontroller@shareWebshop");
Route::get("shareProfile/{username}","Sharecontroller@shareProfileonSocial");
/*Share controller code End*/










Route::get("Kanpur_event","Eventcontroller@Kanpur_event");
Route::get("Kanpur_eventpost","Eventcontroller@Kanpur_eventpost");

Route::any('page', 'KanpurizeController@page');
Route::post('login', 'Auth\LoginController@loginNameOrEmail');  
Route::group(['middleware' => 'guest'], function () { 
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset'); 
});
	Route::get("kanpurize_home","KanpurizeController@kanpurize_home");
	Route::get("newsletter","RecommnedshopController@newsletter");
/*----web middle ware start--------*/
Route::get("kanpurize_quiz/{id?}","QuizController@kanpurizequiz");
Route::post("kanpurize_quiz/{id?}","QuizController@kanpurizequizanswer");
Route::get("kanpurize_quizthanku","QuizController@kanpurize_quizthanku");
Route::group(array('middleware'=>'web'), function () {
	
    	Route::get('payment/status', ['as' => 'payment.status', 'uses' => 'PaymentController@status']);
    	Route::get("payforWebshop","PaymentController@payforWebshop");
    	Route::get("payment/payforWebshopStatus",['as' => 'payment.status', 'uses' => 'PaymentController@payforWebshopStatus']);
    	Route::get("payment/payforAdsStatus",['as' => 'payment.status', 'uses' => 'AdsPostController@payforAdsStatus']);
    	Route::get("payment/payforsingleAdsStatus",['as' => 'payment.status', 'uses' => 'AdsPostController@payforsingleAdsStatus']);
	
//Route::get("userVerify/{userID}/{userEmail}","KanpurizeController@userVerify"); 
//Route::get("userVerify/{userID}/{emailID}","KanpurizeController@userVerify");

   Route::post("userotpVerify","KanpurizeController@userotpVerify");
	Route::post("completeOtpVerify","KanpurizeController@completeOtpVerify");
   Route::get("Marketplace-in-kanpur","KanpurizeController@kanpurizehome");
   Route::get("kanpurize_signup","KanpurizeController@kanpurize_signup");
   Route::post("editImageProductsAction","ProductsController@editProductsImage");
   /*dashborad controller start*/
   // Route::get("dashboard","DashboardController@index");
	Route::get('adminDashboard',"DashboardController@adminDashboard");
	Route::any("quizlist","DashboardController@quizlist");
	Route::get("addQuiz","DashboardController@addQuiz");
	Route::any("addQuizaction","DashboardController@addQuizaction");
	Route::any("questionView","DashboardController@questionView");
	Route::get("addQuestion","DashboardController@addQuestion");
	Route::post("addQuestionaction","DashboardController@addQuestionaction");
	//Route::any("questionList{ quizID }", function );
	Route::get("questionList/{quizID}","DashboardController@questionList");
	Route::get("quizParticipate","DashboardController@quizParticipate");
	Route::get("getRanking","DashboardController@getRanking");
	Route::get("Result","DashboardController@Result");
	Route::get("viewDetails/{number}","DashboardController@viewDetails");
	Route::post("fillConatctform","DashboardController@fillConatctform");
	
	
	
	
	
	Route::post("scategoryAction","DashboardController@scategoryAction");	
	

	Route::get("viewuserAdsPostDetails/{adsID}","DashboardController@viewuserAdsPostDetails");
	
	/*----Event Controller start--------*/
	 Route::get("addEventCategory","Eventcontroller@addEventCategory");
	 Route::post("eventcategoryAction","Eventcontroller@eventcategoryAction");
	
         Route::get("kanpuradmineventList","Eventcontroller@kanpuradmineventList");
	 Route::get("EventCategoryList","Eventcontroller@EventCategoryList");
	 Route::get("EventCategoryList","Eventcontroller@EventCategoryList");
	 Route::get("checkpinCodeValidation","Eventcontroller@checkpinCodeValidation");	
         Route::get("goForLive","Eventcontroller@goForLive");
         Route::get("deleteEventCategry","Eventcontroller@deleteEventCategry");
	 Route::get("editEventCategory/{editID}","Eventcontroller@editEventCategory");
	 Route::post("editEventcategoryAction","Eventcontroller@editEventcategoryAction");
         Route::post("addEventData","Eventcontroller@addEventData");
          Route::get("editEventDetails/{eventeditID}","Eventcontroller@editEventDetails");
	 Route::post("editEventData","Eventcontroller@editEventData"); 


	// Route::get("goForLive","Eventcontroller@goForLive");
	/*----Event Controller End--------*/
	
	/*----Active Profile Controller start--------*/
	/*----Active Profile Controller end--------*/	
	 
	 
	/*Admin--controller--url satart--*/
	
	/*Adminbackendcontroller--controller--url satart--*/
	
	
	/*Adminbackendcontroller--controller--url satart--*/
	

	
	
	
	Route::post("editVendorAddress","ProfileController@editVendorAddress");
	
	
	
	
	Route::get("productsAttribute","Adminbackendcontroller@productsAttribute");
	Route::get("attributeList","Admincontroller@attributeList");
	Route::get("changeAllSubCategory","Admincontroller@changeAllSubCategory");
	Route::post("attributeAction","Admincontroller@attributeAction");
	Route::get("deleteAttribute","Admincontroller@deleteAttribute");
	Route::get("editAttribute/{attrbuteID}","Admincontroller@editAttribute");
	Route::post("editAttributeAction","Admincontroller@editAttributeAction");		
	Route::get("vendorComplain","Admincontroller@vendorComplain");
	Route::get("viewcomplainDetailsDetails/{complainId}","Admincontroller@viewcomplainDetails");
	
	
	
	/*------Backend Controller start----*/
	Route::get("extraSaleShopcat","BackendController@extraSaleShopcat");
	
	

	/*Admin--controller--url stop--*/
	Route::post("signupAction","KanpurizeController@signupAction");
	Route::post("kanpurizeLoginaction","KanpurizeController@loginAction");
	
		/*----Ajax Controller for Admin start*/
	Route::get("vDetailsBlockorUnblock","AjaxController@vDetailsBlockorUnblock");
	
	Route::get("changeSubcategory","AjaxController@changeSubcategory"); 
	Route::get("getAttribue","AjaxController@getAttribue"); 
	

	
	Route::get("vVerifyAds","AjaxController@vVerifyAds");
	//Route::post("editkanpurizeAdsPost","AjaxController@editkanpurizeAdsPost");
    	
    	
	
	
	
	
   	/*---Ajax Controller for admin End-*/
  	//Route::get("kanpurize_signup","KanpurizeController@kanpurize_signup");
});
	
	/*----web middle ware End--------*/
	
	/*-------Auth---middleware Start---*/	

	Route::post("profilePostupload","Activeprofilecontroller@profilePostupload");	
        Route::get("kanpurizeCreateProfile","Activeprofilecontroller@createProfile");		
	Route::get("getProfileCat","Activeprofilecontroller@getProfileCat");	
	Route::get("getProfileCatPrice","Activeprofilecontroller@getProfileCatPrice");
	Route::post("insertProfileData","Activeprofilecontroller@insertProfileData");
	Route::get("payforCreateProfile","Activeprofilecontroller@payforCreateProfile");
	Route::post("saveProfileImage","Activeprofilecontroller@saveProfileImage");
	Route::get("getProfilePost/{profileID}","Activeprofilecontroller@getProfilePost");
	Route::get("payment/payforProfileStatus",['as' =>'payment.status','uses'=>'Activeprofilecontroller@payforProfileStatus']);
	Route::get("shareProfilePost/{postID}","Activeprofilecontroller@shareProfilePost");
	Route::get("getEditpostForm/{editPostID}","Activeprofilecontroller@getEditpostForm");
	Route::post("editprofilePostupload","Activeprofilecontroller@editprofilePostupload");
	Route::get("getProfileList","Activeprofilecontroller@getProfileList");
	//Route::any('startQuiz','kanpurizeController@startQuiz');
	//Route::any('ResultDeclare',"KanpurizeController@ResultDeclare");
	Route::get("kanpurizeProfile/{pageName}","Activeprofilecontroller@kanpurizeProfileDashborad");
	Route::get("Profile_Type","Activeprofilecontroller@Profile_Type");
	Route::get("Profile_Type","Activeprofilecontroller@Profile_Type");
	Route::get("standard_feature","Activeprofilecontroller@standard_feature");
	
    	Route::get("sendEmail","ServicesController@sendEmailAgain");		
	//Route::any('ResultDeclare',"kanpurizeController@ResultDeclare");
	Route::get("winnerPrize","kanpurizeController@ResultDeclare");
	//Route::any('startQuiz','kanpurizeController@startQuiz');
	//Route::any('ResultDeclare',"KanpurizeController@ResultDeclare");
	Route::get("Active_profile","Activeprofilecontroller@Active_profile");
	Route::get("Profile_deshboard","Activeprofilecontroller@Profile_deshboard");Route::get("Profile_Type","Activeprofilecontroller@Profile_Type");
    Route::any('startQuiz/{number}','KanpurizeController@startQuiz');
    Route::any('quizAnswer/{number}','KanpurizeController@quizAnswer');
    Route::any("completeQuiz","KanpurizeController@completeQuiz");
	Route::any("quizDetails","KanpurizeController@quizDetails");
	Route::get("insertRefcode","KanpurizeController@insertRefcode");
	Route::get("KanpurizeSocialWeb","KanpurizeController@KanpurizeSocialWeb");
	Route::get("winners","KanpurizeController@winners");
	//Route::any("quizQuestion/{quesstion}","KanpurizeController@quizQuestion");
    /*---------*/
     
	/*---------*/
    

	
	Route::get("kanpurize_market_shop_about","KanpurizeController@MarketShopabout");
	Route::get("kanpurize_Marketplace_servicesShop","KanpurizeController@marketserviceShop");
	Route::get("kanpurize_marketPlace_Goodsand_Services","KanpurizeController@both");
	Route::post("sellerLoginAction","KanpurizeController@sellerLoginAction");
	Route::get("kanpurize_Shop_Revivew","KanpurizeController@reviewandRating");
	
	Route::get("kanpurize_complain_view/{complainID}/{shopID}","KanpurizeController@complainView");
	
	Route::get("kanpurize_Activity","KanpurizeController@Activity");

    /*--Search controller Route start--*/
	Route::get("searchShopAndProducts","SearchController@searchShopAndProducts");
	
	Route::get("shareOnSocialPlateform/{shareID}","SearchController@share");
	Route::get('searchajax',array('as'=>'searchajax','uses'=>'SearchController@autoComplete'));

	
	/*---Cartcontroller--start---*/
	  Route::get("addCart","CartController@addCart");
	  Route::get("removeCart","CartController@removeCart");
	
	  Route::get("cartUpdate","CartController@cartUpdate");
	
	  Route::post("userCartaddressForm","CartController@userCartaddressForm");
	  Route::post("manageCartOrder","CartController@manageCartOrder");	
	  Route::post("confirmPlaceOrder","CartController@confirmPlaceOrder");
	
	 
	  Route::get("deleteAddressmarketShop","CartController@deleteAddressmarketShop");
	  Route::get("wishlisttocart","CartController@wishlisttocart");
	  Route::get("completeUserOrder","CartController@completeUserOrder");
	  Route::get("receiveOrderStatus","CartController@receiveOrderStatus");
	  Route::get("addCartInOffers","CartController@addOffersproductsInCart");
	  
	/*--CartController--End---*/
	
	/*---services controller Route start ---*/
	 //Route::get("getServicesCatwise","ServicesController@getServicesCatwise");     	
	 Route::get("removetoWishList","ServicesController@removetoWishList");  
	/*---services controller Route End ---*/
	
	/*----Gallery--controller--start--*/
	  Route::get("deleteImageGallery","GalleryController@deleteImageGallery");
	/*----Gallery--controller--End--*/	
	/*--vendor--route--start--*/
	
	  
	   Route::get("kanpurizeShopVerify/{shopID}/{shopName}","VendorController@kanpurizeShopVerify");
	 
	   Route::get("kanpurize_vendor_logout","VendorController@kanpurize_vendor_logout");
		
	   Route::get("kanpurize_deleteProducts","VendorController@deleteAction");
		Route::post("uploadproductsImage","VendorController@uploadImageAction");
		
	
		Route::get("kanpurize_addServicesDetails/{shopName}/{shopID}","VendorController@vendorAddServices");
	
		
			
		/*
		Route::post("addServicesaction",function(){
		   if(Request::ajax()){
			    return var_dump(Response::json(Request::all()));
			 }
		});
		*/
	/*--vendor--route--start--*/
	/*--products Image controller Start--*/
	   Route::get("deleteImageAction","ProductsController@deleteProductsImage");
	
	   Route::get("kanpurize_addProductsAttribute","ProductsController@productsAttribute");
	 
	   Route::get("changeOrderStatus","OfferNewsController@changeOrderStatus");

	   Route::get("restoreTrashProducts","ProductsController@restoreTrashProducts");
	   Route::get("permanentDeleteProducts","ProductsController@permanentDeleteProducts");
	  // Route::post("editProductsImage","ProductsController@editProductsImage");
	 
	/*--products Image Controller End--*/
	
	
	
	/*--AdsPostController----start--*/

	 
	  Route::post("kanpurizeAdsPost","AdsPostController@kanpurizeAdsPost");
	  Route::get("kanpurize_Help_WriteUS","AdsPostController@vendorHelpAndQuotes");
	  Route::post("vendorWriteusAction","AdsPostController@vendorWriteusAction");
	  Route::get("kanpurizeVendorComplain/{complainID}","AdsPostController@vendorComplainDetails");
	   Route::post("addVendorComplainComment","AdsPostController@addVendorComplainComment");
	 

	   Route::post("vpurchaseAdsPack","AdsPostController@vpurchaseAdsPack");
	   Route::post("paymentFormsingleadvertisement","AdsPostController@paymentFormsingleadvertisement");
	
	   
	   
	   
	
	/*--AdsPostController End---*/  
	
	
	
	
	 /*working Are  tomaroow*/
	  Route::get("kanpurize_Shop_offer/{shopID}","OfferNewsController@offersShop");
	  Route::get("vendor_orderDetails/{orderNumber}","OfferNewsController@vOrderDetails");


	 	//offers and news Controller route End
	
	/*--profile controller Route start--*/
	    Route::get("vendorProfile/{shopName}","ProfileController@vendorProfile");
		
		Route::get("vendorAddress/{shopName?}","ProfileController@vendorAddress");
		Route::get("shopNamefunc","ProfileController@shopNamefunc");
	
		
		Route::get("mobilelinksFunc","ProfileController@mobilelinksFunc");
		
		Route::post("vendorAddressAction","ProfileController@vendorAddressAction");
		Route::get("vendor_banner_image/{shopName}","ProfileController@bannerImage");
		
	     
		Route::get("deleteAddress","ProfileController@deleteAddress");
		
		Route::get("shopSetting/{shopName}","ProfileController@shopSetting");
	

  	Route::get("sendemail","ServicesController@sendEmailAgain");
  	Route::post("subscribers","SubscribeController@subscribers");


/*-------Auth---middleware End---*/	
Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});
Route::get("pusher",function(){
  return view('demo');
}); 
/*-- main -- */
/*jitendra route new*/

Route::get("kanpurize_offers_products/{offerID}/{offerTitle?}","ProductsController@productsInOffers");
Route::get("cashOnDelivery/{transactionID}","PaymentController@cashOnDelivery");
Route::get('payment', ['as' => 'payment', 'uses' => 'PaymentController@payment']);
Route::post("selectPaymentType","CartController@selectPaymentType");
Route::get("addtoCart","CartController@addtoCart");
Route::get("actionAjaxGet/{action}","KanpurizeController@actionAjaxGet");

Route::any('/',"KanpurizeController@page");
Route::any('/{p1?}',"KanpurizeController@page");
Route::get('/{p1?}/{p2?}/{p3?}',"KanpurizeController@page");
Route::post("/action/{page}","KanpurizeController@action");
Route::post("actionAjaxPost/{action}","KanpurizeController@actionAjaxPost");
/*-- End Main --*/


?>
