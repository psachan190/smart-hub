<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Purchaseadspackagerecord extends Model
{
    protected  $table = "purchaseadspackagerecord";
    protected $fillable = array('id','users_id','vendordetails_id','advertisementpackage_id','startDate','endDate','totalAds','numberOfAds','cStatus','payStatus','created_at','updated_at','transactionID','amount','spentAds','packageType','day','month','year');
	
	public static function addAdsPackageList($formData,$data){
		$startDate = time();
		$durationDate = $data->duration;
		$endDate = $startDate + $durationDate*(24*60*60); 
		//return date("d/m/y H:i:s",$endDate);
		//return $data;
		$data = array("vendordetails_id"=>$formData['vendorDetailsID'],"advertisementpackage_id"=>$formData['adsPackage'],
		              "startDate"=>$startDate,"endDate"=>$endDate,'totalAds'=>$data['numberOfAds'],'numberOfAds'=>$data['numberOfAds'],
					  "payStatus"=>"N","transactionID"=>"N","amount"=>$data['packageAmount'],'packageType'=>1); 
		  $result =  Purchaseadspackagerecord::create($data);
	      if($result){ return $result->id; }
		  else{ return FALSE; } 
  }
  
  
  public static function addVendorMonthlyPackageList($formData,$data){
	    //return $data->packageAmount;
		$startDate = time();
		$durationDate = $data->duration;
		$endDate = $startDate + $durationDate*(24*60*60); 
		$data = array("vendordetails_id"=>$formData['vendordetails_id'],"advertisementpackage_id"=>$data->id,
		"amount"=>$data->packageAmount,
		              "startDate"=>$startDate,"endDate"=>$endDate,'totalAds'=>$data->numberOfAds,'numberOfAds'=>$data->numberOfAds,
					  'cStatus'=>1,"payStatus"=>"Y",'packageType'=>2,'day'=>date("d"),"month"=>date("m"),"year"=>date("Y")); 
		  $result =  Purchaseadspackagerecord::create($data);
	      if($result){ return $result->id; }
		  else{ return FALSE; } 
  }
  
  
  public static function getValidAdsPackage($condition){
		 $result = DB::table('purchaseadspackagerecord')->where($condition)
						->orderBy('id', 'DESC')
						->get();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }
	}
	
   public static function getcompleteAdsPackage($vendorID){
	 	 $result = DB::table('purchaseadspackagerecord')
		                ->where(array("vendordetails_id"=>$vendorID,"cStatus"=>1,"payStatus"=>"Y"))
						->where('endDate', '<=',time())
						->orderBy('id', 'DESC')
						->get();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }
	}	
  
   public static function getlastEndAdsPackage($vendorID){
	 	 $result = DB::table('purchaseadspackagerecord')
		                ->where(array("vendordetails_id"=>$vendorID,"cStatus"=>1,"payStatus"=>"Y"))
						->where('endDate', '>',time())
						->first();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }
	}
  
   public static function updateRecord($data,$condition){
      $result =  DB::table('purchaseadspackagerecord')
                       ->where($condition)
                       ->update($data);
	  if($result){ return TRUE;  }
	  else{ return FALSE; }	
    }
	
	 public static function updatecStatus($data){
	   $numberOfAds = 0;
	   foreach($data as $dataArr){
		 $numberOfAds += $dataArr->totalAds;  
		 $result =  DB::table('purchaseadspackagerecord')->where(array("id"=>$dataArr->id))->update(array("cStatus"=>0,"closeStatus"=>1));
		}
	  if($numberOfAds >0){ return $numberOfAds;  }
	  else{ return FALSE; }	
    }
	
	 public static function updateTotalAdsPackage($data){
	   $result =  DB::table('purchaseadspackagerecord')
	                  ->where(array("id"=>$data->id))
					  ->update(array("totalAds"=>$data->totalAds -1,"spentAds"=>$data->spentAds - 1));
	  if($result){ return TRUE;  }
	  else{ return FALSE; }	
    }
	
	public static function getfreeMonthlyAdsPAckege($condition){
	//	return $condition;
	  $result = DB::table('purchaseadspackagerecord')
		                ->where($condition)
						->get();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }
    }
	
	
}
