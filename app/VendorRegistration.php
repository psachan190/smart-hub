<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class vendorRegistration extends Model{
   protected  $table = "vendorregistration";
   public $timestamps = false;
   
   public function getData($formData){
	  // $vendorData = DB::table("vendorregistration")
	  //                   ->where(array("vEmail"=>$formData['email']))
			// 			->get();
	$vendorData	= vendorRegistration::->where(array("vEmail"=>$formData['email']))->get();
	  if(count($vendorData) > 0){
		  return $vendorData; 
		 }
	  else{
		   return "invalidEmail";
		 }	 
	}
}
