<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ShopSetting extends Model{
   
  protected  $table = "shopSetting";
  public $timestamps = false;
   
   public function __construct(){
	}  

   public static function addShopSetting($data){
	  $result =  DB::table('shopSetting')->insert($data);
	  if($result){return TRUE;  }else{ return FALSE; }		
	}
	
   	
   public static function addPaymentMode($formData,$vID){
	   if(empty($formData['paymentMode1'])){ $first = "no"; } else{ $first = $formData['paymentMode1']; }
	   if(empty($formData['paymentMode2'])){ $second = "no"; } else{ $second = $formData['paymentMode2']; }
	   if(empty($formData['paymentMode3'])){ $third = "no"; } else{ $third = $formData['paymentMode3']; }
	   if(empty($formData['paymentMode4'])){ $fourth = "no"; } else{ $fourth = $formData['paymentMode4']; }
	    $result =  DB::table('shopSetting')
                  ->where(array("vendordetails_id"=>$vID))
                  ->update(array("advanceforDelivery"=>$first,"advancedforPickup"=>$second,"payatDelivery"=>$third,"payatPickup"=>$fourth,"updated_at"=>time()));
	   if($result){ return TRUE;  }else{ return FALSE; }		
	}
	
	public static function getAuthority($con){
		 $transactionAuthoruty = DB::table("shopSetting")->where($con)->first();
		 if($transactionAuthoruty){ return $transactionAuthoruty; }
		 else{ return FALSE; }
	}	
	
	public static function getduplicateShopSetting($con){
	  if(is_array($con)){
		   $result = DB::table("shopSetting")->where($con)->first();
		   if(count($result) > 0) return TRUE; else return FALSE;
		}
	}
	
	public static function updateShopSet($updatearr , $con){
		 $result =  DB::table('shopSetting')
					  ->where($con)
					  ->update($updatearr);
		   if($result){return TRUE;  }else{ return FALSE; }	
	}
	
	
}
