<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProfileCategory extends Model{
	
    protected  $table = "profiletypecategory";
    protected $fillable = array('id','profileType','profileTypeCat','status','price','durationInDays');
	
	public static function getprofileCategory($con,$categoryID=NULL){
	   if(!empty($categoryID)){
		    $result = DB::table("profiletypecategory")->where($categoryID)->first();	
	        if(count($result) > 0) return $result; else return FALSE;
		 }	
	  $result = DB::table("profiletypecategory")->where($con)->get();	
	  if(count($result) > 0) return $result; else return FALSE;
    }
	
}
