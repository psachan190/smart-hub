<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class DeliveyandPickupDayModel extends Model{
    protected  $table = "deliverydayschedule";
	protected $fillable = array('id','vendordetails_id','dayofweek','created_at','updated_at'); 
	
	 public static function addDayofDelivery($formData){
	    foreach($formData['deleveryDay'] as $data){
		   $result = DeliveyandPickupDayModel::create(array("vendordetails_id"=>$formData['vendorID'],"dayofweek"=>$data));
		 }
		if($result){ return TRUE; }else return FALSE;  
	   //return $formData['deleveryDay'];
	    //$result = GalleryModel::create(array("vendordetails_id"=>$formData['vendordetails_id'],"image"=>$formData,"title"=>$formData['title']));
	    //if($result)return TRUE; else return FALSE; 
	 }
	 
	 public static function getDayofDelivery($condition,$secondCondition=NULL){
		if(!empty($secondCondition)){
		    $secondresult = DeliveyandPickupDayModel::distinct()->select('dayofweek','id')->where($secondCondition)->get();
	        if(count($secondresult) > 0){ return $secondresult; }else { return FALSE; }
		 } 
       //$picks = DB::table('deliverydayschedule')->distinct()->select('dayofweek')->where('weeknum', '=', 1)->groupBy('user_id')->get();
	   $result = DeliveyandPickupDayModel::distinct()->select('dayofweek','id')->where($condition)->get();
	   if(count($result) > 0){ return $result; }else { return FALSE; }
	 }
	 
	 
	 public static function deletedeliveryandpickDay($id){
	  $deleteResult = DB::table('deliverydayschedule')->where('id',$id)->delete();
	  if($deleteResult)return TRUE; else return FALSE;	
	}
	 

}
