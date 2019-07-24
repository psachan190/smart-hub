<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model{
   protected  $table = "order";
   protected $fillable = array(
        'id','orderID','firstName','lastName','orderDate','paymentType','paymentStatus','users_id','address_id','AddressType','phoneNumber','subTotal','discount','totalAmount','shippingCharge','orderStatus','vendordetails_id');   
	
	
   public static function addOrder($vendorDetails,$formData,$dataCartDetails){
	    date_default_timezone_set('Asia/Calcutta');
		$date = date('Y/m/d H:i:s');
		$insertData = array("transactionID"=>"1","firstName"=>$formData['firstName'],"lastName"=>$formData['lastName'],"orderDate"=>$date,"users_id"=>$formData['userID'],"address_id"=>$formData['address'],"AddressType"=>$formData['addressType'],"phoneNumber"=>$formData['phone_number'],"subTotal"=>$dataCartDetails['completeOrderSubtotal'],"discount"=>"Y","totalAmount"=>$dataCartDetails['completeOrderAmount'],"totalProducts"=>$dataCartDetails['numberOFproducts'],"totalTax"=>$dataCartDetails['completeOrderTax'],"shippingCharge"=>"N","orderStatus"=>"N","vendordetails_id"=>$vendorDetails,"userOrderstatus"=>"N");
		 $result =  DB::table('order')->insertGetId($insertData); 
	    if($result)return $result; else return FALSE; 
	} 
	
  public static function getOrder($condition){
	   if(!empty($condition)){
	     $productsDetails = DB::table("order")
	                        ->where($condition)
							->orderBy('id','DESC')
							->get();
	  if(count($productsDetails) > 0){ return $productsDetails; }
	  else{ return FALSE; }	  
      }		
   }
    public static function getOrderDescription($orderNumber){
	     $ordersDetails = DB::table("order as a")
	                        ->join('address as b', 'a.address_id', '=', 'b.id')
							->where(array("a.id"=>$orderNumber))
							->select('a.*','b.addressOne','b.addressTwo','b.neighbourhood','b.city','b.pincode','b.state')
							->first();
	    if(count($ordersDetails) > 0){ return $ordersDetails; }
	    else{ return FALSE; }	  
   }
   
   public static function editOrder($data,$condition){
	 if(is_array($data)){
	    if(is_array($condition)){
		    $updateProducts = DB::table('order')
                              ->where($condition)
					          ->update($data); 
            if($updateProducts){ return TRUE; }
			else{ return FALSE; }  	
		  }
	   }	 
		 		  
   }
	  
}
