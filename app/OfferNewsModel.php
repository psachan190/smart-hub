<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OfferNewsModel extends Model{
    protected  $table = "offersandnews";
    protected $fillable = array('id','vendordetails_id','startDate','endDate','newsTitle','newsDescription','image','section_id','status'); 
	
	public static function vinsertofferNews($request,$imageName){
	   $insertDataArr = array("vendordetails_id"=>$request['vendordetails_id'],"startDate"=>strtotime($request['startDate']),"endDate"=>strtotime($request['endDate']),"newsTitle"=>$request['newsTitle'],"newsDescription"=>$request['newsDesc'],"image"=>$imageName,"section_id"=>4,"created_at"=>time(),"updated_at"=>time(),"status"=>"Y","adminStatus"=>"N" , "discountMode"=>$request['discountMode'] , "discountRate"=>$request['discountAmount']);         
	   $vPostAds =  DB::table('offersandnews')->insert($insertDataArr); 
	   if($vPostAds) return TRUE; else return FALSE;  
   }
   
    public static function getvoffersNews($con,$editID=NULL){
	   if(!empty($editID)){
		   $newsDetails = OfferNewsModel::where(array("id"=>$editID))->first();
          	if(count($newsDetails) > 0){ return $newsDetails; }											   
	        else{ return FALSE; } 
		}
	   $offersNewsList = OfferNewsModel::where($con)->orderBy('id', 'DESC')->simplePaginate(5);
	    if(count($offersNewsList) > 0){ return $offersNewsList; }											   
	    else{ return FALSE; } 
	
	}
	
	public static function getVendoroffersNews($condition){
	   $allOffersNews = DB::table("offersandnews as of")
	                        ->join('vendordetails as v', 'of.vendordetails_id', '=', 'v.id')
							->orderBy('created_at', 'DESC')
							->select('of.*','v.vName','v.username','v.businesscategoryType')
							->where($condition)
							->get();
	   
	   //$offersNewsList = OfferNewsModel::where($condition)->orderBy('id', 'DESC')->get();
	    if(count($allOffersNews) > 0){ return $allOffersNews; }											   
	    else{ return FALSE; } 
	}
	
	public static function allVendorOffersNews($con,$id=NULL){
		if(!empty($id)){
		  $allOffersNews = DB::table("offersandnews as of")
	                        ->join('vendordetails as v', 'of.vendordetails_id', '=', 'v.id')
							->orderBy('id', 'DESC')
							->select('of.*','v.vName')
							->where(array("of.id"=>$id))
							->first();
	     if(count($allOffersNews) > 0){ return $allOffersNews; }
	     else{ return FALSE; }	  
		 }
	    $allOffersNews = DB::table("offersandnews as of")
	                        ->join('vendordetails as v', 'of.vendordetails_id', '=', 'v.id')
							->orderBy('id', 'DESC')
							->select('of.*','v.vName')
							->where($con)
							->get();
	  if(count($allOffersNews) > 0){ return $allOffersNews; }
	  else{ return FALSE; }	 
	}
	
	
	public static function vEditofferNews($request,$imageName){
	   $editDataArr = array("vendordetails_id"=>$request['vendordetails_id'],"startDate"=>strtotime($request['startDate']),"endDate"=>strtotime($request['endDate']),"newsTitle"=>$request['newsTitle'],"newsDescription"=>$request['newsDesc'],"image"=>$imageName,"section_id"=>4,"updated_at"=>time(),"status"=>"Y","adminStatus"=>"N","discountMode"=>$request['discountMode'],"discountRate"=>$request['discountAmount']);       
	    $updateProducts = DB::table('offersandnews')
                              ->where(array("id"=>$request['editID']))
					          ->update($editDataArr); 
	    if($updateProducts) return TRUE; else return FALSE;  
   }
   
     
   public static function BlockorUnblock($data){
	  $result =  DB::table('offersandnews')->where(array("id"=>$data['id']))->update(array("adminStatus"=>$data['permission']));
	  if($result){ return TRUE;  }else{ return FALSE; }				   
	} 
   
	
}
