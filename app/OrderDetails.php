<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderDetails extends Model{
   protected  $table = "orderdetails";
   public $timestamps = false;
   protected $fillable = array(
        'id','order_id','products_id','vendordetails_id','salePrice','qty','subTotProductsAmt','paymentStatus','paymentDate','cStatus');
   
   public static function addOrderDetails($resultLastID,$cartDetails){
	    date_default_timezone_set('Asia/Calcutta');
		$date = date('Y/m/d H:i:s');
		foreach($cartDetails->toArray() as $cart){
			if($cart['options']['withGst']=="yes"){
			   $totalPercentage = 100 + $cart['options']['gst'];
			   $productsTax = ($cart['price']*$cart['options']['gst'])/$totalPercentage; 
			   $taxwithGst = round($productsTax);
			   $productsPrice = round($cart['price'] - $productsTax);
			   $totproductsPrice = $productsPrice * $cart['qty'];
			   $tax = round(($productsPrice*$cart['options']['gst'])/100); 
			 }
			else{
			  $productsPrice = $cart['options']['salePrice'];
			  $totproductsPrice = $productsPrice * $cart['qty'];
			  $tax = round(($productsPrice * $cart['options']['gst'])/100);
			 }	
		   //$tax = ($cart['subtotal'] * $cart['options']['gst'])/100;
		    $totalpAmount = (int) $cart['price'];
		   $insertData = array("order_id"=>$resultLastID,"products_id"=>$cart['id'],"vendordetails_id"=>$cart['options']['vendordetails_id'],"salePrice"=>$productsPrice,"qty"=>$cart['qty'],"gst"=>$cart['options']['gst'],"withGst"=>$cart['options']['withGst'],"tax"=>$tax,"subTotProductsAmt"=>$totalpAmount,"paymentStatus"=>"N","paymentDate"=>$date,"cStatus"=>"N",'offerID'=>$cart['options']['offerID'],'discountMode'=>$cart['options']['discountMode'],'discountRate'=>$cart['options']['discountRate']);
		   $result =  DB::table('orderdetails')->insert($insertData); 
		 }
		if($result)return TRUE; else return FALSE;   
	}
	
   public static function getOrderDetails($orderNumber){
	  $result = DB::table("orderdetails as od")
	                ->join('products as p', 'od.products_id', '=', 'p.id')
					->select('od.*','p.id','p.pName','p.price','p.pImage')
	                ->where(array("order_id"=>$orderNumber))->get();
		if(count($result)>0)return $result; else return FALSE;			
					
	  
	}	 			
}
