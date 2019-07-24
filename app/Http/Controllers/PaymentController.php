<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Tzsk\Payu\Facade\Payment;
use App\Order;
use App\OrderDetails;
use App\VendorDetails;
use Cart;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PaymentController extends Controller{
	
public function payment(Request $request){
	$deliveryDate = strtotime($request->input("deliverDate"));
	if(!empty($request->input("paymentType"))){
	      if(!empty($request->input("deliverDate"))){
		   if(!empty($request->input("deliveryTiming"))){
			     $v = array("paymentType"=>"required"); 
				 $this->validate($request,$v);
				 $orderID = $request->input("orderID");
				 $txnID = strtoupper(str_random(8))."/".$orderID;
				 $data = array('txnid'=>$txnID,'amount'=>$request->input("totalAmount"),
				 'productinfo' =>$request->input("productInformation"),'firstname'=>$request->input("buyerName"),'email'=>$request->input("emailID"),
				 'phone'=>$request->input("mobileNumber"));
				  $result = Order::editOrder(array("paymentType"=>$request->input("paymentType"),"transactionID"=>$txnID,"editDate"=>time(),"deliverDate"=>$deliveryDate,"deliverTime"=>$request->input("deliveryTiming")),array("id"=>$request->input("orderID")));
				  if($request->input("paymentType")==3 || $request->input("paymentType")==4){
						  $enctxnID = encrypt($txnID);
						  //echo $enctxnID;exit;
						  return redirect("cashOnDelivery/$enctxnID");
						}
					else{
						  return Payment::make($data,function($then) {
							   $then->redirectTo("payment/status"); # Your Status page endpoint.
							  });
						}
			 }  
		   else{  echo "Please Select Delivery Time , Delivery Timing is required ."; exit; }		
		  }
	   else{ echo "Please Select Delivery Date , Delivery Date is required .";exit;  }
	  }
	 else{ echo "Please Select any one Delivery mehtod for order .";exit; }  
}


public function payforWebshop(Request $request){
  $v = array("payshopnameID"=>"required","payshopname"=>"required","payshopEmail"=>"required","payshopMobile"=>"required|numeric");
  $this->validate($request,$v); 
  $txnID = strtoupper(str_random(8))."/".$request->input("payshopnameID");
  $result = VendorDetails::socialLinks(array("paymentStatus"=>"T","editDate"=>time()),array("id"=>$request->input("payshopnameID")));
  $data = array('txnid'=>$txnID,'amount'=>5000,
 'productinfo' =>"Pay for Web shop",'firstname'=>$request->input("payshopname"),'email'=>$request->input("payshopEmail"),
 'phone'=>$request->input("payshopMobile"),"shopID"=>$request->input("payshopnameID"));
  return Payment::make($data,function($then) {
               $then->redirectTo("payment/payforWebshopStatus"); # Your Status page endpoint.
              });
}


function payforWebshopStatus(){
  $payment = Payment::capture();
  //echo"<pre>";
  //print_r($payment);
  if($payment->status=="Completed"){
	  $transactioIdArr = explode("/",$payment->txnid);
	  //print_r($transactioIdArr);exit;
	  $dataArr = json_decode($payment->data);
	  //print_r($dataArr);exit;
	  if($dataArr->status=="success"){
		  $updateData = array("paymentStatus"=>"Y");
		  $condition = array("id"=>$transactioIdArr[1]);
		  $result = VendorDetails::socialLinks(array("paymentStatus"=>"Y","editDate"=>time()),array("id"=>$transactioIdArr[1]));
		  //$data['paysuccess'] = "<p style='color:green'>Payment for Web Shop Complete</p>";
	      session()->flash('paysuccess',"<p style='color:green'><strong>Payment for Web Shop Complete</strong></style>");
		  return redirect("kanpurize_Vendor_dashboard?paysuccess")->with('paysuccess', array('your message,here'));  		
		 }
	}
  else{
     return redirect("kanpurize_Vendor_dashboard?failed");
	} 
 
  		
}


function status(){
  $payment = Payment::capture();
  //echo"<pre>";
  //print_r($payment);
  if($payment->status=="Completed"){
	  $transactioIdArr = explode("/",$payment->txnid);
	  //print_r($transactioIdArr);exit;
	  $dataArr = json_decode($payment->data);
	  //print_r($dataArr);exit;
	  if($dataArr->status=="success"){
		  $updateData = array("paymentStatus"=>"Y","userOrderstatus"=>"Y");
		  $condition = array("id"=>$transactioIdArr[1],"transactionID"=>$payment->txnid);
		  $result = Order::editOrder($updateData,$condition);   
		  Cart::destroy();
		   return redirect("kanpurizeMarketplace?success");
		}
	}
   else{
	  return redirect("kanpurizeMarketplace?failed");
	}	
}


 public function cashOnDelivery($transactionID){
	   if(!empty($transactionID)){
		    $transactionARR  = explode("/",decrypt($transactionID));
			$data['orderDetails'] = Order::getOrderDescription($transactionARR[1]);
			 $data['title'] = "Cart SuccessFully";
			 $updateData = array("paymentStatus"=>"N","userOrderstatus"=>"Y","editDate"=>time());
		     $condition = array("transactionID"=>decrypt($transactionID));
		     $result = Order::editOrder($updateData,$condition); 
			 if($result != FALSE){
			     Cart::destroy();
	             return view("kanpur.cartComplete")->with($data);
			  }
		 }
		else{ return redirect()->back(); } 
      }
}