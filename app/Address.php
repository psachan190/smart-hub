<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model{
    protected  $table = "address";
	   protected $fillable = array(
        'id', 'users_id', 'vendordetails_id', 'addressOne', 'addressTwo', 'neighbourhood', 'city', 'pincode', 'state', 'quantity', 'whenStart', 'end', 'image', 'type', 'created_at', 'updated_at', 'status','addressThree');   
	
	public static function addAddress($formData){
	  $result = Address::create(array("users_id"=>$formData['userID'],"vendordetails_id"=>$formData['vendorID'],"addressOne"=>$formData['address1'],"addressTwo"=>$formData['address2'],"addressThree"=>$formData['addressthree'],"neighbourhood"=>$formData['neighbourhood'],"city"=>$formData['city'],"pincode"=>$formData['pinCode'],"state"=>$formData['state'],"type"=>"vendorShop","status"=>"Y"));
	  if($result)return TRUE; else return FALSE; 
	}
	
	/*
	public static function addvendorAddress($formData){
	  $result = Address::create(array("users_id"=>$formData['userID'],"vendordetails_id"=>$formData['vendorID'],"addressOne"=>$formData['address1'],"addressTwo"=>$formData['address2'],"addressThree"=>$formData['address3'],"neighbourhood"=>$formData['neighbourhood'],"city"=>$formData['city'],"pincode"=>$formData['pinCode'],"state"=>$formData['state'],"type"=>"vendorShop","status"=>"Y"));
	  if($result)return TRUE; else return FALSE; 
	}
	*/
	
	//Working
	public static function addressManage($request){
	  $dataArr = array("users_id"=>$request->userID, "vendordetails_id"=>$request->vendorID , "addressOne"=>$request->address1,"addressTwo"=>$request->address2,"addressThree"=>$request->address3,"neighbourhood"=>$request->neighbourhood,"city"=>$request->city,"pincode"=>$request->pinCode , "state"=>$request->state , "type"=>4 , "status"=>"Y" , "created_at"=>time() , "updated_at"=>time());
	  if(!empty($request->addresedit_id)){
		   unset($dataArr['users_id']);  unset($dataArr['vendordetails_id']); unset($dataArr['created_at']);
		   $result = DB::table("address")->where(array("id" => $request->addresedit_id))->update($dataArr);
		   if($result){ 
		      return json_encode( array("status"=>1 , "msg"=>"edit"));
		   }else{
		      return FALSE;
		   }
			
		}
	  else{
		   $result = DB::table("address")->insert($dataArr);
		   if($result){ 
		      return json_encode( array("status"=>1 , "msg"=>"add"));
		   }else{
		      return FALSE;
		   }
		} 	
	}
	
	
	
	public static function getShopAddress($data,$editID=NULL){
		if(!empty($editID)){
		    $result = Address::where(array("id"=>$editID))->first();
	        if($result)return $result; else return FALSE;
		  }
	   $result = Address::where(array("type"=>$data['type'],"vendordetails_id"=>$data['shopID']))->get();
	   if($result)return $result; else return FALSE;
	}
	
	public static function getUsersCartAddrss($data,$addressid=NULL){
		if(!empty($addressid)){
		      $result = Address::where(array("type"=>"userCartAddress","id"=>$addressid))->first();
	          if($result)return $result; else return FALSE;
		  }
	   $result = Address::where(array("type"=>$data['type'],"users_id"=>$data['users_id']))->get();
	   if($result)return $result; else return FALSE;
	 }
	

	public static function deleteAddrss($id){
	  $deleteResult =  DB::table('address')->where('id', $id)->delete();
	  if($deleteResult) return TRUE; else return FALSE;
	  //$result = Address::find($id);
	  //if($result->delete()) return TRUE; else return FALSE;
	} 
    
    public static function EditAddress($formData){
	  $editResult =  Address::find($formData['editAddressID']);
        if($editResult->update(array("addressOne"=>$formData['add1'],"addressTwo"=>$formData['add2'],"neighbourhood"=>$formData['editneighbourhood'],"city"=>$formData['editcity'],"pincode"=>$formData['editpincode'],"state"=>$formData['editstate'])))
		 { return TRUE; }
		else{ return FALSE; }
	}
	
	public static function addCartAddress($formData){
		//return $formData;
	    $result = Address::create(array("users_id"=>$formData['user_id'],"addressOne"=>$formData['addressOne'],"addressTwo"=>$formData['addressTwo'],"neighbourhood"=>$formData['landMark'],"city"=>$formData['city'],"pincode"=>$formData['pinCode'],"state"=>$formData['state'],"type"=>"userCartAddress","status"=>"Y"));
	  if($result)return TRUE; else return FALSE;  
	}		
}
