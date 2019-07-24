<?php
namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Matrimonial_model extends Model{
      
       public static function create_motrimonial_profile($formData){
		 $timestamp = strtotime($formData['DateofBirth']); 
		 $enctype_id = md5(time().session()->get('knpuser'));
        
		$arr = array("user_id"=>session()->get('knpuser'),"enctype_id"=>$enctype_id , "name"=>$formData['profileName'],"create_profile_for"=>$formData['createForprofile'],"gender"=>$formData['gender'],"dob"=>$timestamp  , "interestedIn"=>$formData['interestedGender'] ,"about_profile"=>$formData['aboutProfile'] , "created_at"=>time() , "updated_at"=>time());
		
              $result = DB::table("matrimonial_kanpurizes")->insertGetId($arr);
          if($result) return $result; else return FALSE; 
       }
	   
	   public static function edit_mat_profile($formData,$con){
	      $result = DB::table("matrimonial_kanpurizes")->where($con)->update($formData);
		  if($result) return TRUE; else return FALSE;
	   }
       
       
	   public static function get_all_matprofile(){
		   $result = DB::table('matrimonial_kanpurizes')->get();
		  if(count($result) > 0)return $result; else FALSE;
		}
	   
       public static function get_matrimonial_profile($arr , $con =NULL){
		  if(!empty($con)){		  
			   $result = DB::table('matrimonial_kanpurizes')->where($con)->first();
			   // $result = DB::table("matrimonial_kanpurizes")->where(array("id"=>$matID))->first();
		       if(count($result) > 0)return $result; else FALSE;
			 } 
	      $result = DB::table("matrimonial_kanpurizes")->where($arr)->get();
	      if(count($result) > 0)return $result; else FALSE;
	   }     
      
      
	public static function get_country(){
	  $result = DB::table("knp_countries")->get();
	  if(count($result) >0){ return $result; }else { return FALSE; }
	}
	
	public static function get_state($countryId=NULL){
	  if(!empty($countryId)){
		  $result = DB::table("knp_states")->where(array("country_id"=>$countryId))->get();
	      if(count($result) >0){ return $result; }else { return FALSE; }
		}	
      $result = DB::table("knp_states")->get();
	  if(count($result) >0){ return $result; }else { return FALSE; }
	}
	
	public static function get_city($stateID=NULL){
	  if(!empty($stateID)){
		  $result = DB::table("knp_cities")->where(array("state_id"=>$stateID))->get();
	      if(count($result) >0){ return $result; }else { return FALSE; }
		}	
      $result = DB::table("knp_cities")->get();
	  if(count($result) >0){ return $result; }else { return FALSE; }
	}
	
	
	/*matrimonial profile iMage*/
	 public static function upload_mat_image($request , $image , $image_url) {
	  $id = md5(uniqid().time());
	  $result = DB::table('matrimonial_image')->insert(array("id"=>$id , "mat_profile_id"=>$request->mat_id , "user_id"=>$request->user_id , "image"=>$image , "image_url"=>$image_url , "c_status"=>"Y" , "created_at"=>time() ));
	  if($result)return TRUE; else return FALSE;
     }
	 
	 public static function getProfileImage($profileID){
	   $result = DB::table("matrimonial_image")->where("mat_profile_id" , $profileID)->orderBy('created_at', 'DESC')->get();
	   if($result->count() > 0){ return $result; } else { return FALSE; }
	 }
	 
	  /*religion start*/
	 public static function addReligion($request){
	   $result = DB::table("matrimonial_combine")->insert(array("religion"=>$request->religion ,"section_type"=>1 ,  "c_status"=>$request->status,  "created_at"=>time() , "updated_at"=>time()));
	   if($result)return TRUE; else  return FALSE;
	 }
	 
	 public static function getReligion(){
	   $result = DB::table('matrimonial_combine')->where(array("section_type"=>1))->get();
	   if($result->count() > 0) return $result; else return FALSE; 
	 }
	 
	 
	 public static function editReligion($updateArr , $con){
	   $result = DB::table('matrimonial_combine')->where($con)->update($updateArr);
	   if($result)return TRUE; else return FALSE;
	 }
	 
	 /*add cast*/
	 
	 public static function addCast($request){
	   $result = DB::table("matrimonial_combine")->insert(array("religion"=>$request->religion, "cast"=>$request->castName ,"section_type"=>2 ,  "c_status"=>$request->status,  "created_at"=>time() , "updated_at"=>time()));
	   if($result)return TRUE; else  return FALSE;
	 }
	 
	 public static function getCast ($castID = NULL){
		if($castID){
		   $result = DB::table('matrimonial_combine as a')
                  ->leftJoin('matrimonial_combine as b', 'a.religion', '=', 'b.id')
				  ->select('a.id','b.religion','a.religion as rid','a.cast','a.c_status')
				  ->where(array("a.section_type"=>2 ,"a.id"=>$castID))
                  ->first();
		   if(count($result) > 0)return $result; else return FALSE;
		 } 
	    $result = DB::table('matrimonial_combine as a')
                  ->leftJoin('matrimonial_combine as b', 'a.religion', '=', 'b.id')
				  ->select('a.id','b.religion','a.cast','a.c_status')
				  ->where(array("a.section_type"=>2))
                  ->get();
	    if($result->count() > 0)return $result; else return FALSE;
	 }
	 
	
}
