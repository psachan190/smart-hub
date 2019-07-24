<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AdvertisementRecord extends Model{
	
   protected  $table = "advertisementrecord";
   protected $fillable = array('id','users_id','vendordetails_id','totalAds','spentAds','remainingAds','Adsdate','Adsmonth','AdsYear');
  
  public static function insert($data){
	    $result= DB::table("advertisementrecord")->insert($data);
	    if($result){ return TRUE; }
		else{ return FALSE; } 
   }
   
  
  public static function adsProfession($formData,$lastInsertedID){
	  foreach($formData as $key=>$value){
		    $insertDataArr = array("advertisement_id"=>$lastInsertedID,"profession"=>$value);         
	        $result= AdsProfession::create($insertDataArr);
		 }
	    if($result){ return TRUE; }
		else{ return FALSE; } 
   }
   
    public static function getAdvertisementRecord($condition){
	   $result = AdvertisementRecord::where($condition)->first();
	    if(count($result) > 0){ return $result; }											   
	    else{ return FALSE; } 
	}
	
	public static function updateAdvertisementRecord($formData){
	   $advertisementRecord = AdvertisementRecord::where(array("vendordetails_id"=>$formData['vendordetails_id']))->first();
	   $spentAds = $advertisementRecord->spentAds +1;
	   $totalAds = $advertisementRecord->totalAds - 1;
	   $result =  DB::table('advertisementrecord')
                          ->where(array("vendordetails_id"=>$formData['vendordetails_id']))
                          ->update(array("spentAds"=>$spentAds,"totalAds"=>$totalAds));
	   if($result){return TRUE; }else{ return FALSE; }				   
	}
	
	public static function updateAdsResult($formData){
		    $advertisementRecord = AdvertisementRecord::where(array("vendordetails_id"=>$formData['vendordetails_id']))->first();
			 if(count($advertisementRecord) >0){
			     $totalAds = $advertisementRecord->totalAds + $formData->numberOfAds;
				  $result =  DB::table('advertisementrecord')
                          ->where(array("vendordetails_id"=>$formData['vendordetails_id']))
                          ->update(array("totalAds"=>$totalAds));
	              if($result){return TRUE; }else{ return FALSE; }
		      }
	}
	
	public static function updateRecord($con,$data){
	  $result =  DB::table('advertisementrecord')
			  ->where($con)
			  ->update($data);
	  if($result){return TRUE; }else{ return FALSE; }
	}
	
	public static function getduplicateAdvertisement($con){
	  if(is_array($con)){
		   $result = DB::table("advertisementrecord")->where($con)->first();
		   if(count($result) > 0) return TRUE; else return FALSE;
		}
	}
	
		
}
