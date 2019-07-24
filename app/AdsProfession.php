<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class AdsProfession extends Model{
   protected  $table = "professionads";
   protected $fillable = array('id','advertisement_id','profession','created_at','updated_at');
  
  
  public static function adsProfession($formData,$lastInsertedID){
	  foreach($formData as $key=>$value){
		    $insertDataArr = array("advertisement_id"=>$lastInsertedID,"profession"=>$value);         
	        $result= AdsProfession::create($insertDataArr);
		 }
	    if($result){ return TRUE; }
		else{ return FALSE; } 
   }
   
    public static function getAdvertisementprofession($condition){
	   if(!empty($adsPostID)){
		   $result = AdsProfession::where($condition)->first();
          	if(count($result) > 0){ return $result; }											   
	        else{ return FALSE; } 
		}
	   $result = AdsProfession::where($condition)->get();
	    if(count($result) > 0){ return $result; }											   
	    else{ return FALSE; } 
	}
	
	
	public static function getprofession($condition){
	   $result = DB::table('professionads')
						->where($condition)
						->get();
	   if(count($result) > 0){ return $result; }else return FALSE; 
	 }
	
	public static function deleteProfession($data){
	    foreach($data as $dataArr){
		   $deleteResult = DB::table('professionads')->where('id',$dataArr->id)->delete(); 
		 } 
		if($deleteResult)return TRUE; else return FALSE;	 
	 }

}
