<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VendorDetails extends Model{
   protected  $table = "vendordetails";
   public $timestamps = false;
   protected $fillable = array('id','users_id','username','vName','vEmail','vMobile','sMobileNum','businesscategoryType','categoryType','instagramLinks','linkedInLinks','secondinfoEmail','infoEmail','googlePlusLinks','twitterLinks','facebookLink','crvDate','crvStatus','editDate','editSocialDate',"otp","otpTiming","termAndCondition");
   
   public static function vendorRecord($request,$otp){
	   $request->merge(array('crvStatus'=>"N",'crvDate'=>time(),"otp"=>$otp,"otpTiming"=>time(),"termAndCondition"=>$request->termAndCondition));
	   $vendorRecordID = VendorDetails::create($request->all())->id; 
	   if($vendorRecordID){ 
	      $username =  md5('rowny'.$vendorRecordID);
	      if(DB::table('vendordetails')->where(['id' => $vendorRecordID])->update(['username' => $username])){
			  return $username;
			}
		  else{
			  return FALSE;
			}	
	   }
	   else{ return FALSE; }
   }
   
   //working
	public static function vendor_profile($shopId){
	   $result = DB::table('vendordetails as a')
			          ->join('knp_vbusinessdetail as c', 'a.id', '=', 'c.vendordetails_id')
					  ->select('a.*','c.ownerName','c.aboutBusiness','c.gstNumber','c.gstFile','c.signature','c.address1','c.address2','c.address3','c.pinCode','c.city','c.state','c.panCardNumber')
					  ->where(array("a.id"=>$shopId))	
					  ->first();
	          if(count($result) > 0){ return $result; } else{ return FALSE; }	 
	}
	
   
   public static function getShopDetails($con){
      if(!is_array($con)){
		  $result = DB::table("vendordetails")->where(array("username"=>$con))->first();
		  if(count($result) > 0) return $result ; else return FALSE;  
		}
	  $result = DB::table("vendordetails")->where($con)->first();
	  if(count($result) > 0) return $result ; else return FALSE;  	
   }
    
	
   public static function updateVendorData($data,$condition){
      $result =  DB::table('vendordetails')
                       ->where($condition)
                       ->update($data);
	  if($result){ return TRUE;  }
	  else{ return FALSE; }	
    }
	
   	
   public static function allValidVendor(){
	   $result = VendorDetails::where(array("crvStatus"=>'Y'))->get(); 
	   if(count($result) >0){
		   return $result;
		 }
	   else
	    { return FALSE; }
	   
	 }
   
   public function knpVendorBusiness(){
	     return $this->hasMany('App\Knp_vendorbusinesstype','vendordetails_id');
	 }
   public function products(){
        return $this->hasMany('App\products','vendordetails_id');
    }

     public function shopCateory(){
       //return $this->hasMany('','knp_shopcategory_id');
    }
     public function productImage(){
       
        //return $this->hasMany('App\products','vendordetails_id');
    }
	public function shopcategory(){
        return $this->hasMany('App\ShopcategoryUsers','vendordetails_id');
    }
	
	public function category(){
        return $this->hasMany('App\CategoryUsers','vendordetails_id');
    }
	
	public function subcategory(){
        return $this->hasMany('App\SubcategoryUsers','vendordetails_id');
    }
	
   
   
   public static function editShopcat($data,$lastID){
	    $editShopCat =  VendorDetails::find($lastID);
        if($editShopCat->update($data)){  return TRUE; }
		 else{ return FALSE; } 
    } 	
	   	
	
	public static function getSingleShopDetails(){
	    $result = DB::table('vendordetails as a')
					 ->join('users as u', 'a.users_id', '=', 'u.id')
					 ->select('a.*','u.name','u.email')
					 ->where(array("users_id"=>session()->get('knpUser_id'),"a.id"=>session()->get('lastVendorID')))
					 ->first();
		  if(count($result) > 0){ return $result; }
		  else{ return redirect()->back(); }	
	}
	
	public static function get_my_shoplist($user_id , $shop_username=NULL){
		if(!empty($shop_username)){
		    $result = DB::table('vendordetails')
			        	->where(array("username"=>$shop_username))	
					    ->first();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }	
		  }
	   $result = DB::table('vendordetails')->where(array("users_id"=>$user_id))->orWhere('admin_Status', '!=', 1)->get();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }	
	}
	
	public static function vendorShopList($vData=NULL,$uData=NULL,$type=NULL){
		if(!empty($uData) && $type="shopList"){
			   $result = DB::table('vendordetails as a')
			            ->join('knp_vendorshopimage as b', 'a.id', '=', 'b.vendordetails_id')
						->select('a.*','b.thumbnailsImg','b.shoplogoImg','b.editDate','b.shoplogoImg','b.adminStatus')
						->where(array("a.users_id"=>$uData))	
					    ->get();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }	 
		 }
		 
	   $result = DB::table('vendordetails as a')
			        ->join('knp_vendorshopimage as b', 'a.id', '=', 'b.vendordetails_id')
					->join('knp_vbusinessdetail as c', 'a.id', '=', 'c.vendordetails_id')
					     ->select('a.*','b.users_id','b.vendordetails_id','b.thumbsnailPath','b.shoplogoImg','b.shoplogoPath','c.ownerName','c.aboutBusiness','c.gstNumber','c.gstFile','c.signature','c.address1','c.address2','c.pinCode','c.city','c.state','c.panCardNumber','c.gstProvisionalID','c.cbusinesStatus','c.adminStatus','b.cImageStatus','b.adminStatus as imageStatus','b.bannerImage')
					->where(array("a.id"=>session()->get('lastVendorID'),"a.users_id"=>session()->get('knpUser_id')))	
					->first();
	   if($result)return $result; else return FALSE;
	}
	
	
	//working
	public static function getAllvendorShop(){
	   $result = DB::table('vendordetails as a')
			          ->join('knp_vbusinessdetail as c', 'a.id', '=', 'c.vendordetails_id')
					    ->select('a.*','c.ownerName','c.aboutBusiness','c.address1','c.address2','c.pinCode','c.city','c.state')
						->where(array("a.crvStatus"=>"Y","c.adminStatus"=>"Y"))	
						->get();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }	 
	}
	
	
	
	public static function getAuthorityVendor($shopID){
		      $result = DB::table('vendordetails as a')
			       		->join('knp_vbusinessdetail as b', 'a.id', '=', 'b.vendordetails_id')
						->join('users as u', 'a.users_id', '=', 'u.id')
					   ->select('a.*','b.id as businessDetailID','b.adminStatus as bussadminStatus','b.ownerName','b.aboutBusiness','b.gstNumber','b.gstFile','b.signature','b.address1','b.address2','b.pinCode','b.city','b.state','u.name','u.email','b.panCardNumber')
						 ->where(array("a.id"=>$shopID))	
						 ->first();
			 if($result){ return $result; }
			  else{ return FALSE; }	  			 
	}
	
	public static function adminGetallVendor(){
	  $result = DB::table('vendordetails as a')
					 ->join('users as u', 'a.users_id', '=', 'u.id')
					 ->orderBy('crvDate' , 'DESC')
					 ->select('a.*','u.name','u.email')
					 ->get();
		  if(count($result) > 0){ return $result; }
		  else{ return FALSE; }	  
	} 
	
	public static function vendorDetails($shopId=NULL,$completeResult=NULL){
	       if($completeResult=="allSinglevendorDetails" && !empty($shopId)){
			  $result=VendorDetails::find($shopId);
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }	  
			}
		   if(!empty($shopId)){
			    $result = DB::table('vendordetails as a')
			           ->join('knp_vbusinessdetail as c', 'a.id', '=', 'c.vendordetails_id')
					    ->select('a.*','c.ownerName','c.aboutBusiness','c.gstNumber','c.gstFile','c.signature','c.address1','c.address2','c.pinCode','c.city','c.state','c.panCardNumber')
						->where(array("a.id"=>$shopId))	
						->first();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }	 
			   }
		  
		  $result = DB::table('vendordetails as a')
					 ->join('users as u', 'a.users_id', '=', 'u.id')
					 ->select('a.*','u.name','u.email')
					 ->get();
		  if(count($result) > 0){ return $result; }
		  else{ return FALSE; }	  			    
	}
	
	
	
	public static function BlockorUnblock($data,$where){
	  $result =  DB::table('vendordetails')
                       ->where($where)
                       ->update($data);
	  if($result){ return TRUE;  }
	  else{ return FALSE; }				   
	}
    
    /*
    public static function socialLinks($data,$condition){
      $result =  DB::table('vendordetails')
                       ->where($condition)
                       ->update($data);
	  if($result){ return TRUE;  }
	  else{ return FALSE; }	
    } */
	
	
    public static function vendorProfilesedit($data,$condition){
      $result =  DB::table('knp_vbusinessdetail')
                       ->where($condition)
                       ->update($data);
	  if($result){ return TRUE;  }
	  else{ return FALSE; }	
	}
	
	
	public static function getSearchShop($searchString){
      $result = DB::table('vendordetails as a')
                   ->leftJoin('knp_vbusinessdetail as b', 'a.id', '=', 'b.vendordetails_id')
				   ->leftJoin('knp_vendorshopimage as c', 'a.id', '=', 'c.vendordetails_id')
				   ->select('a.id','a.vName','a.vMobile','a.businesscategoryType','b.aboutBusiness','c.shoplogoImg','b.ownerName','b.address1','b.address2','b.pinCode','b.city','a.googlePlusLinks','a.twitterLinks','a.facebookLink','a.linkedInLinks','a.instagramLinks')
				   ->Where('a.vName', 'like', '%' . $searchString . '%')
				  ->where(array("a.crvStatus"=>"Y","b.adminStatus"=>"Y","c.adminStatus"=>"Y"))
                   ->get();
	  if(count($result) > 0){ return $result;  }
	  else{ return FALSE; }	
	}
	
	public static function sendMobileSms($message,$mobile){
	  $mobile = trim($mobile);
	  if(!empty($mobile)){
	  $action ="http://msg.rpsms.in/api/sendhttp.php?authkey=210094AxJWvuhojsD5ad45f8b&mobiles=$mobile&message=$message&sender=KNPRZE&route=4&country=91";
			$ret = file($action);
			$sess = explode(":",$ret[0]);
			if ($sess[0] != "OK"){    
				$result = $ret[0];
				return $result;
			}
			else{
				echo "Authentication failure: ". $ret[0];
			}
	}
   }
   
   public static function add_rating($request){
	  $id = md5(uniqid().$request->shopID.session()->get('knpuser')); 
      $result = DB::table("knp_rating")->insert(array("id"=>$id , "users_id"=>session()->get('knpuser') , "shop_id"=>$request->shopID , "rating"=>$request->rating , "rating_comment"=>$request->comment , "crDate"=>time() , "editDate"=>time()));
      if($result)return TRUE; else return FALSE;  
   }
   
   public static function get_rating($con){
     $result = DB::table('knp_rating as a')
                   ->join('users as u', 'a.users_id', '=', 'u.id')
				   ->select('a.*','u.name','u.lname')
				   ->where(array("a.shop_id"=>$con))
				    ->orderBy('crDate','DESC')
                   ->get();
	  if(count($result) > 0){ return $result;  }
	  else{ return FALSE; }	
   }
   
   public static function get_duplicate($request){
     $result = DB::table("knp_rating")->where(array("users_id"=>session()->get('knpuser') , "shop_id"=>$request->shopID))->count();
	 if($result > 0){ 
	     $edit_result = self::edit_rating(array("rating"=>$request->rating , "rating_comment"=>$request->comment) , array("users_id"=>$request->session()->get('knpuser') , "shop_id"=>$request->shopID));
		 return $edit_result;
	  }
	 else{ return FALSE; }
   }
   
   public static function edit_rating($updateArr , $con){
      $result =  DB::table('knp_rating')->where($con)->update($updateArr);
	  if($result){ return TRUE;  }else{ return FALSE; }	
   }
   
   
   
   
    /*Notification send to admin*/
   
   
   /*Notification send to admin*/
   
   public static function send_notification($dataArr){
      $result =  DB::table('knp_notification')->insert($dataArr);
	  if($result){ return TRUE;  }else{ return FALSE; }	
   }
   
   public static function get_notification($action = NULL){
	 if($action == "un_read"){
	     $result = DB::table("knp_notification")->where(array("admin_receiver"=>1 , "read_status"=>NULL))->orderBy('created_at', 'DESC')->simplePaginate(5);
	     if($result) return $result; else return FALSE;
	   } 
	 if($action == "all_notifi"){
	    $result = DB::table("knp_notification")->where(array("admin_receiver"=>1))->orderBy('created_at', 'DESC')->get();
	    if($result) return $result; else return FALSE;
	   }  
	
     $result = DB::table("knp_notification")->where(array("admin_receiver"=>1))->orderBy('created_at', 'DESC')->simplePaginate(5);
	 if($result) return $result; else return FALSE;
   }
   
   public static function read_update_status($con , $dataArr){
      $result =  DB::table('knp_notification')->where($con)->update($dataArr);
	  if($result){ return TRUE;  }else{ return FALSE; }
   }
   
}
