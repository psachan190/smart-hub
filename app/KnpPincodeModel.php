<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KnpPincodeModel extends Model
{
   protected  $table = "knppincode";
   public $timestamps = false;
   
   public static function matchPincode($formData){
	   $userPincode = KnpPincodeModel::where(array("pincode"=>$formData['pincode']))->first();
	  if(count($userPincode) > 0){ return TRUE; }
	  else{ return FALSE; }	
	}
}
