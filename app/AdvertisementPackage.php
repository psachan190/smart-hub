<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdvertisementPackage extends Model{
     protected  $table = "advertisementpackage";
     protected $fillable = array('id','numberOfAds','packageAmount','title','duration','description','priority','status','created_at','updated_at');
	 
	public static function addAdvertisementPackage($request){
		$insertDataArr = array("numberOfAds"=>$request['numberofAds'] , "numberOfPics"=>$request['pics'] ,"packageAmount"=>$request['amount'],"title"=>$request['title'],"duration"=>$request['duration'],"description"=>$request['description'] , "forPackageTye"=>$request['packageType'] , "status"=>$request['status']);   
		$vPostAds= AdvertisementPackage::create($insertDataArr);
	    if($vPostAds){ return $vPostAds->id; }
		else{ return FALSE; } 
	}
	 
	 public static function getAdvertisementPackage($condition,$adsPostID=NULL){
	   if(!empty($adsPostID)){
		   $vAdsPostList = AdvertisementPackage::where($condition)->first();
          	if(count($vAdsPostList) > 0){ return $vAdsPostList; }											   
	        else{ return FALSE; } 
		}
		 
	   $vAdsPostList = AdvertisementPackage::get();
	    if(count($vAdsPostList) > 0){ return $vAdsPostList; }											   
	    else{ return FALSE; } 
	}
	
	
	public static function editAdvertisementPackage($editDataArr,$editid){
	  $updateResult = DB::table('advertisementpackage')
                      ->where(array("id"=>$editid))
                       ->update($editDataArr);
	    if($updateResult){ return TRUE; }
		else{ return FALSE; } 
	}
   
	
	
	public static function delPackageList($id){
	  $deleteResult =  DB::table('advertisementpackage')->where('id', $id)->delete();
	  if($deleteResult) return TRUE; else return FALSE;
	} 
}
