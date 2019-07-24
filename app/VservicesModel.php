<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VservicesModel extends Model{
     protected  $table = "knp_vendorservices";
	 public $timestamps = false;
	 
	 protected $fillable = array('id','user_id','knp_shopcategory_id','vendordetails_id','serviceDescription', 'primeServices','ourServices','infoMobile','infoEmail','address','timming','weaklyOff','metaKeywords','crDate',' editDate','cSatus');
    
   public static function addServices($formData){
	  $data = array(
			      "user_id"=>$formData['userID'],
				  "knp_shopcategory_id"=>$formData['shopID'],
				  "vendordetails_id"=>$formData['vendorID'],
				  "serviceDescription"=>$formData['myTextarea'],
				  "primeServices"=>$formData['myTextarea1'],
				  "ourServices"=>$formData['myTextarea2'],
				  "infoMobile"=>$formData['infoMobile'],
				  "infoEmail"=>$formData['infoEmail'],
				  "address"=>$formData['myTextarea3'],
				  "timming"=>$formData['timing'],
				  "weaklyOff"=>$formData['wealyOFF'],
				  "metaKeywords"=>$formData['myTextarea4'],
				  "crDate"=>time(),
				  "editDate"=>time(),
				  "cSatus"=>"Y"
				);
		$serviceData= VservicesModel::create($data);
		 if($serviceData){ return TRUE; }
		 else{  return FALSE; } 
	}
	
	public static function getServices($formData=NULL){
	  if(!empty($formData)){
		   $userID = $formData['userID'];
		    $vendorID = $formData['vendorID'];
		    $shopID = $formData['shopID'];
		    $result = VservicesModel::where(array("user_id"=>$formData['userID'],"vendordetails_id"=>$formData['vendorID'],"knp_shopcategory_id"=>$formData['shopID']))->first();
			  if(count($result) > 0){ return count($result); }
			  else{ return FALSE; }	
		 } 
	   $result = DB::table("knp_vendorservices")
	               ->where(array("user_id"=>$knpUser_id,"vendordetails_id"=>$lastID))
				   ->get();
		 if(count($result) > 0){ return $result; }
		 else{ return FALSE; }	
	}
	
	public static function getServicesDetails($data,$serviceID=NULL){
		if(!empty($serviceID)){
		   $vendorResultsingle = DB::table('knp_vendorservices as a')
	              ->join('knp_shopcategory as b', 'a.knp_shopcategory_id', '=', 'b.cid')
				  ->join('vendordetails as v', 'a.vendordetails_id', '=', 'v.id')
				  ->select('a.*','b.cname','b.bType','v.users_id','v.vName','v.vMobile','v.businesscategoryType','v.categoryType')
                  ->where(array("a.vendordetails_id"=>$data['vendorShopID'],"a.id"=>$serviceID))
				 ->first(); 
			  if(count($vendorResultsingle) > 0){
			   return $vendorResultsingle;
			   }else{ FALSE ; } 
		  }
	    $vendorResult = DB::table('knp_vendorservices as a')
	                   ->join('knp_shopcategory as b', 'a.knp_shopcategory_id', '=', 'b.cid')
				       ->select('a.*','b.cname')
                       ->where(array("a.vendordetails_id"=>$data['vendorShopID']))
				       ->get(); 
		if(count($vendorResult) > 0){ return $vendorResult; }
		else{ FALSE ; } 
	}
	
	public static function getServicesbyCategory($shopID,$categoryID){
	    $vendorResultsingle = DB::table('knp_vendorservices as a')
	              ->join('knp_shopcategory as b', 'a.knp_shopcategory_id', '=', 'b.cid')
				  ->select('a.*','b.cname','b.bType')
                  ->where(array("a.vendordetails_id"=>$shopID,"a.knp_shopcategory_id"=>$categoryID))
				 ->first(); 
			  if(count($vendorResultsingle) > 0){
			   return $vendorResultsingle;
			   }else{ FALSE ; } 
	}
	
	public static function editServiceDetails($formData){
	   $data = array(
	                "serviceDescription"=>$formData['myTextarea'],
					"primeServices"=>$formData['myTextarea1'],
					"ourServices"=>$formData['myTextarea2'],
					"infoMobile"=>$formData['infoMobile'],
					"infoEmail"=>$formData['infoEmail'],
					"address"=>$formData['myTextarea3'],
					"timming"=>$formData['timing'],
					"weaklyOff"=>$formData['wealyOFF'],
					"metaKeywords"=>$formData['myTextarea4'],
					"editDate"=>time()
					);
		   $vservice = VservicesModel::find($formData['editId']); 
		   if($vservice->update($data)){ return TRUE; }
		   else{ return FALSE; }				
	}
}
