<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VendorCatAuthority extends Model{
   protected  $table = "vsalesautority";
   protected $fillable = array(
        'id', 'vendordetails_id','knp_shopcategory_id','category_id','subcategory_id','created_at','updated_at','status'); 
		
   public static function addAuthority($formData){
	    $result = VendorCatAuthority::create($formData);
		if($result) return TRUE; return FALSE;  
		 
	}
	
   public static function checkduplicateAuthority($formData){
	    $result = VendorCatAuthority::where(array("vendordetails_id"=>$formData['vendordetails_id'],"knp_shopcategory_id"=>$formData['knp_shopcategory_id'],"category_id"=>$formData['category_id'],"subcategory_id"=>$formData['subcategory_id']))->first(); 
	   if($result)return TRUE; else return FALSE;
	}		
   
   public static function getCatAuthority(){
	 $result = DB::table('vsalesautority as a')
            ->crossJoin('vendordetails as v', 'a.vendordetails_id', '=', 'v.id')
			->crossJoin('knp_shopcategory as knp', 'a.knp_shopcategory_id', '=', 'knp.cid')
			->crossJoin('category as c','a.category_id', '=', 'c.id')
			->crossJoin('subcategory as sbc','a.subcategory_id', '=', 'sbc.sid')
            ->select('a.*','v.vName','knp.cname','c.csname','sbc.subCatname')
			->get();
	 if(count($result) > 0)return $result; else FALSE; 			
	 
	/* 
	 $result = DB::table('vsalesautority as a')
			       ->join('vendordetails as v', 'a.vendordetails_id', '=', 'v.id')
				   ->join('knp_shopcategory as knp','a.knp_shopcategory_id', '=', 'knp.cid')
			       ->join('category as c','a.category_id', '=', 'c.id')
			       ->join('subcategory as sbc','a.subcategory_id', '=', 'sbc.sid')
			       ->select('a.*','v.vName','knp.cname','c.csname','sbc.subCatname')
				   ->get();
		if(count($result) > 0){ return $result; }
		else{ return redirect()->back(); }	 */	
	}
	
   public static function authCatList($shopID,$categoryID){
	  $result = DB::table('vsalesautority as a')
					 ->join('category as c', 'a.category_id', '=', 'c.id')
					 ->select('c.csname','c.id')
					 ->where(array("vendordetails_id"=>$shopID,"a.knp_shopcategory_id"=>$categoryID))
					 ->get();
	   $result = $result->toArray();				 
	  if(count($result)>0)return $result; else return FALSE; 
    }	
   
   public static function vendorAuthSubCategory($shopID,$categoryID,$status){
	  $result = DB::table('vsalesautority as a')
					 ->join('subcategory as s', 'a.subcategory_id', '=', 's.sid')
					 ->select('s.subCatname','s.sid')
					 ->where(array("a.vendordetails_id"=>$shopID,"a.category_id"=>$categoryID,"a.status"=>$status))
					 ->get();
	  $result = $result->toArray();			 
	  if(count($result)>0)return $result; else return FALSE; 
    }			
}
