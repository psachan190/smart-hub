<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class DeliveryandPickupTimeModel extends Model{
    protected  $table = "deliveryTimingschedule";
	protected $fillable = array('id','vendordetails_id','dayofweek','timingOfday','created_at','updated_at'); 
	
	 public static function addTimeofDelivery($formData){
	    $i=1;
		foreach($formData['deleveryTime'] as $data){
		   $result[$i] = $data;
		   $i++;
		 }
		 $implodeArr = implode("@",$result);
		 $result[$i] = DeliveryandPickupTimeModel::create(array("vendordetails_id"=>$formData['vendorID'],"dayofweek"=>$formData['deleveryDay'],"timingOfday"=>$implodeArr)); 
		if($result){ return TRUE; }else return FALSE; 
	 }
	 
	  public static function getTimeofDelivery($condition,$secondCondition=NULL){
		if(!empty($secondCondition)){
		    $secondresult = DeliveryandPickupTimeModel::distinct()->select('timingOfday','id')->where($secondCondition)->get();
	        if(count($secondresult) > 0){ return $secondresult; }else { return FALSE; }
		 }   
		$result = DeliveryandPickupTimeModel::where($condition)->get(); 
       //$result = DeliveryandPickupTimeModel::where($condition)->get();
	   if(count($result) > 0){ return $result; }else { return FALSE; }
	 }
	 
	  public static function getsingleTimeofDelivery($condition){
		$result = DeliveryandPickupTimeModel::where($condition)->first(); 
       //$result = DeliveryandPickupTimeModel::where($condition)->get();
	   if(count($result) > 0){ return $result; }else { return FALSE; }
	 }
	 
	
	 public static function deletedeliveryandpickTime($id){
	  $deleteResult = DB::table('deliveryTimingschedule')->where('id',$id)->delete();
	  if($deleteResult)return TRUE; else return FALSE;	
	}
	 
}
