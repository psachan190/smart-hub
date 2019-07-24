<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VendorPostAds extends Model{
   protected  $table = "knp_vpostads";
   public $timestamps = false;
   protected $fillable = array('id','users_id','vendordetails_id','postImg','startDate','endDate','adminStaus','editDate');
  
   
   
   public static function vinsertPostAds($request,$imageName){
	   $insertDataArr = array("users_id"=>$request['users_id'],"vendordetails_id"=>$request['vendordetails_id'],"postImg"=>$imageName,"startDate"=>$request['startDate'],"endDate"=>$request['endDate'],"postDescription"=>$request['myTextarea1'],"crDate"=>time(),"editDate"=>time(),"adminStaus"=>"N");         
	    //$formData = $request->all();
		//$formData['postImg'] = $imageName;
		//$formData['crDate'] = time();
		//$formData['adminStaus'] = "N"; 
		//$request->merge(array('postImg'=>$imageName,'crDate'=>time(),'adminStaus'=>'N'));
		//return $formData;
	    //$vPostAds= VendorPostAds::create($formData);
	    $vPostAds =  DB::table('knp_vpostads')->insert($insertDataArr); 
	    if($vPostAds){ return TRUE; }
		else{ return FALSE; } 
   }
   
   /*  
   public static function veditPostAds($dataArr,$editid){
	  $updateResult = DB::table('knp_vpostads')
                      ->where(array("id"=>$editid))
                       ->update($dataArr);
	    if($updateResult){ return TRUE; }
		else{ return FALSE; } 
   } */
   
   public static function getAdsData($id=NULL){
	   if(!empty($id)){
		     $result = DB::table('knp_vpostads as a')
			         	->join('vendordetails as b', 'b.id', '=', 'a.vendordetails_id')
					    ->select('a.*','b.vName','b.vEmail')
						->where(array('a.id'=>$id))
						->orderBy('crDate', 'ASC')
						->first();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }
		 }
      $result = DB::table('knp_vpostads as a')
			         	->join('vendordetails as b', 'b.id', '=', 'a.vendordetails_id')
					    ->select('a.*','b.vName','b.vEmail')
						->orderBy('crDate', 'ASC')
						->get();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }
   }
   
   public static function getAdsPotsValid(){
	 $result = DB::table('knp_vpostads as a')
			         	->join('vendordetails as b', 'b.id', '=', 'a.vendordetails_id')
					    ->select('a.*','b.vName','b.vEmail')
						->orderBy('crDate', 'ASC')
						->where(array("a.adminStaus"=>"Y"))
						->get();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }
	 
   }
   
   public static function getvAdsPost($adsPostID=NULL){
	   if(!empty($adsPostID)){
		   $vAdsPostList = VendorPostAds::where(array("id"=>$adsPostID))->first();
          	if(count($vAdsPostList) > 0){ return $vAdsPostList; }											   
	        else{ return FALSE; } 
		}
		 
	   $vAdsPostList = VendorPostAds::where(array("vendordetails_id"=>session()->get('lastVendorID'),"users_id"=>session()->get('knpUser_id')))->orderBy('id', 'DESC')->simplePaginate(5);
	    if(count($vAdsPostList) > 0){ return $vAdsPostList; }											   
	    else{ return FALSE; } 
	
	}
   
   
    /*
	
   public static function BlockorUnblock($data,$where){
	  $result =  DB::table('knp_vpostads')
                       ->where($where)
                       ->update($data);
      //$result =  VendorPostAds::where($where)->update($data);
	  if($result){
		  return TRUE; 
		 }else{ return FALSE; }				   
	} 
    */
   
}
