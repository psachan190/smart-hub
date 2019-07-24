<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model{
	
	 protected  $table = "eventcategory";
	 protected $fillable = array('id','categoryName','categoryDescription','priority','created_at','updated_at');   
	
      public static function addEventCategory($data){
		$result = EventCategory::create(array("categoryName"=>$data['categoryName'],"categoryDescription"=>$data['eventDescription'],"priority"=>$data['priority']));
	    if($result)return TRUE; else return FALSE; 
	 }
	 
	 
	 public static function editEventCategory($formData){
		$result = DB::table("eventcategory")->where(array("id"=>$formData['categoryID']))->update(array("categoryName"=>$formData['categoryName'],"categoryDescription"=>$formData['eventDescription'],"updated_at"=>date("Y-m-d H:i:s",time())));
		if($result)return TRUE;return FALSE;
	 }
	 
	 public static function eventcategoryList($categoryID=NULL){
		if(!empty($categoryID)){
		    $result = EventCategory::where(array("id"=>$categoryID))->first();
			if(count($result) > 0){ return $result; }
	        else{ return FALSE; }
		  } 
		$result = EventCategory::get();
	    if(count($result) > 0){ return $result; }
	    else{ return FALSE; }
	 }
	 
	 
	 public static function delEventCat($id){
		$result = DB::table("eventcategory")->where(array("id"=>$id))->delete();
	    if($result){ return TRUE; }
	    else{ return FALSE; }
	 }
	 
	 
	 
  
}
