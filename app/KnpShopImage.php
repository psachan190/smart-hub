<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KnpShopImage extends Model{
   protected  $table = "knp_vendorshopimage";
   public $timestamps = false;
   
   public static function BlockorUnblock($data,$where){
	  $result =  DB::table('knp_vendorshopimage')
                       ->where($where)
                       ->update($data);
	  if($result){
		  return TRUE; 
		 }else{ return FALSE; }				   
	}
	
      public static function getShopImage($shopID){
         //return $shopID;exit;
	  $result = KnpShopImage::where(array("vendordetails_id"=>$shopID))->first();
	  if($result){ return $result; }else{ return FALSE; }				   
	} 
}
