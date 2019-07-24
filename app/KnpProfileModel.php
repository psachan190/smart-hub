<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KnpProfileModel extends Model{
    protected  $table = "knp_profile_tbl";
    protected $fillable = array('id','users_id','profileName','profileType','profiletypecategory_id','packageAmount','profileImage','term' ,'created_at','updated_at','status');
	
	public static function addProfileuser($formData,$userID){
       $result = DB::table("knp_profile_tbl")->insertGetID(array("users_id"=>$userID,"profileName"=>$formData['profileName'],"profileType"=>$formData['profileType'],"profiletypecategory_id"=>$formData['profileCategory'],"packageAmount"=>$formData['profilePrice'],"term"=>$formData['termandcondition'],"created_at"=>time(),"updated_at"=>time(),"status"=>'N'));
	   if($result) return $result; else return FALSE;
	}
	
	public static function getprofileData($con,$id=NULL){
	  if(!empty($id)){
		  $result = DB::table("knp_profile_tbl")->where(array("id"=>$id))->first();
		  if(count($result) >0) return $result; else return FALSE;
		}
	   $result = DB::table("knp_profile_tbl")->where($con)->get();
	   if(count($result) >0) return $result; else return FALSE;	
	}
     
	Public static function editProfile($dataArr,$con){
	   $updateData = DB::table("knp_profile_tbl")->where($con)->update($dataArr);
	   if($updateData) return TRUE; return FALSE;
	} 
}
