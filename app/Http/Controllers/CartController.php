<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;

//use validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\loginModal;
use App\Models\User;
use Session;
use App\VendorDetails;
use App\Products;
use App\VendorPostAds;
use App\Address;
use App\Order;
use App\OrderDetails;
use App\ShopSetting;
use Auth;
use Cart;
use App\OfferNewsModel;
use App\WishList;
use Softon\Indipay\Facades\Indipay;  
use payu\Tzsk\Payu\Facade;
use Tzsk\Payu\Facade\Payment;
use App\DeliveryandPickupTimeModel;
use App\DeliveyandPickupDayModel;
use App\KnpProfileModel;



class CartController extends Controller{
	
	/*
	public function addOffersproductsInCart(Request $request){
	  if(!empty($request->input("productsid"))){
		   if(!empty($request->input("shopID"))){
			   if(!empty($request->input("offersID"))){
				   $offerDetails = OfferNewsModel::getvoffersNews("1",$request->input("offersID"));
				 }
			    if(count(Cart::content())>0){
				    $cartvArr = array();
					$i=1;
				    foreach(Cart::content()->toArray() as $cart){
				       $cartvArr[$i] = $cart['options']['vendordetails_id'];
				      $i++;
					} 
				   if($cartvArr[1] != $request->input("shopID")){
					   echo "error"; exit;
					 }
				  }
				$productsDetails = Products::find($request->input("productsid"));
				if(!empty($offerDetails->discountMode)){
				   $productsRate = Products::calculateOfferAmount($offerDetails->discountMode,$offerDetails->discountRate,$productsDetails->productsAmount);
				   $offerID = $request->input("offersID");
				   $offerMode = $offerDetails->discountMode;
				   $discountRate = $offerDetails->discountRate;
				  }
				else{
				    $productsRate = $productsDetails->productsAmount;
					$offerID = 0;
					 $offerMode = 0;
				     $discountRate = 0;
				  }   
				$cartContent = Cart::add(array('id'=>$productsDetails->id,'name'=>$productsDetails->pName,'qty'=>1,'price'=>$productsRate,'options'=>array('image'=>$productsDetails->pImage,"vendordetails_id"=>$productsDetails->vendordetails_id,"gst"=>$productsDetails->gstRate,"salePrice"=>$productsDetails->salePrice,"withGst"=>$productsDetails->withGst,"offerID"=>$offerID,"discountMode"=>$offerMode,"discountRate"=>$discountRate)));
			    echo Cart::count();
			 }	
		   else{
			   echo" Unexpected try again ....";
			 }	  
			  
			}
		  else{
			  echo"unexpected try again...";
			}	
	}
	*/
	/*
	public function usersorderDetails(Request $request){
	   $data['title'] = "Users Order Details";
	   $data['cartCount'] = Cart::count();
	   if(!empty($request->orderID)){
		    $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
	        $data['orderDetails'] = OrderDetails::getOrderDetails($request->orderID);
	        //echo"<pre>";
	        //print_r($data['orderDetails']);exit;
	        return view("kanpur.usersorderDetails")->with($data);
		 }
	   else{
		   return redirect()->back();
		 }	 
	  
	  	
	}
	*/
	
	public function receiveOrderStatus(Request $request){
	   if(!empty($request->orderID)){
		     $msg = $request->input("msg");
		     $updateData = array("orderStatus"=>$request->orderStatus,"editDate"=>time());
		     $condition = array("id"=>$request->input("orderID"));
		     $result = Order::editOrder($updateData,$condition); 
			 if($result != FALSE){ echo "<p style='color:green;'><strong>$msg SuccessFully.</strong></style>"; }
			 else{ echo "<p style='color:green;'><strong>Unexpected , try again .</strong></style>"; }
		 }
	    else{
		   echo"<p style='color:green;'><strong>Unexpected , try again .</strong></style>";
		 }	 
	}
	
	public function completeUserOrder(){
	   $data['title'] = "Users Order";
	   $data['cartCount'] = Cart::count();
	   $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
	   $data['allOrderDetails'] = Order::getOrder(array("users_id"=>session()->get('knpUser_id'),"userOrderstatus"=>"R","orderStatus"=>"Y"));
	   return view("kanpur.completeUserOrder")->with($data);
	 }
	 
	
	
	public function selectPaymentType(Request $request){
	if (session()->has('knpuser')) { $data['user'] = User::where(['id' => session()->get('knpuser')])->first(); }		
	   if(!empty($request->input("lastOrederID"))){
		   $data['title'] = "Select Payment Type";
		   $data['lastOrderID'] = $request->input("lastOrederID"); 
	           $data['orderDetails'] = Order::find($data['lastOrderID']);
                   $vendorID = $data['orderDetails']['vendordetails_id'];
		   $data['transactionAuthority'] = ShopSetting::getAuthority(array("vendordetails_id"=>$vendorID));
		    //echo "<pre>";
		   //print_r($data['transactionAuthority']);exit;
		   $data['userData'] = User::find($data['orderDetails']['users_id']);
		   return view("kanpur.selectPaymentType")->with($data);
		 }
	   else{
		  return redirect()->back();
		 } 	 
	 }
	
	public function manageCartOrder(Request $request){
	   $validator = Validator::make($request->all(),array(
       'userID'=>'required','firstName'=>'required','lastName'=>'required','addressType'=>'required','address'=>'required','phone_number'=>'required|numeric'));
	   if($validator->fails()){
        return json_encode(
		               array("error"=> $validator->errors()->getMessages(),
					          "vStatus"=>400));
		}
		foreach(Cart::content()->toArray() as $cartDetails){
		   $vendorDetailsID = $cartDetails['options']['vendordetails_id'];
		   if(!empty($vendorDetailsID)){
			    break;
			 }
		    else{ continue; }	 
 		 }
		
		 $completeOrderAmount=0; $completeOrderSubTotal=0; $completeProductsqty=0; $completeOrderTax=0;
		 foreach(Cart::content()->toArray() as $cart){
			  $completeProductsqty += $cart['qty'];
			  if($cart['options']['withGst']=="yes"){
				   $totalPercentage = 100 + $cart['options']['gst'];
				   $productsTax = ($cart['price']*$cart['options']['gst'])/$totalPercentage; 
				   $taxwithGst = round($productsTax);
				   $nogstProductsPrice = round($cart['price'] - $productsTax);
				   $productsPrice = $nogstProductsPrice * $cart['qty'];
				   $gst = $cart['options']['gst'];
				   $tax = round(($productsPrice*$cart['options']['gst'])/100); 
				}
			   else{
				  $productsPrice = $cart['options']['salePrice']*$cart['qty'];
				  $tax = round(($productsPrice* $cart['options']['gst'])/100);
				}	
			  $completeOrderTax += $tax;
			  //$totalpAmount = (int) $cart['subtotal'] + (int)$tax;
			  $completeOrderSubTotal += $productsPrice; 
			  $completeOrderAmount = Cart::subtotal();
		   }
		 //print_r($completeOrderAmount);exit;  
		 $dataCartDetails = array("completeOrderSubtotal"=>$completeOrderSubTotal,"completeOrderAmount"=>$completeOrderAmount,"numberOFproducts"=>$completeProductsqty,"completeOrderTax"=>$completeOrderTax);
	  if($request->address != "hidden"){
		$resultLastID = Order::addOrder($vendorDetailsID,$request->all(),$dataCartDetails);
		if($resultLastID != FALSE){
		    $orderDetails = OrderDetails::addOrderDetails($resultLastID,Cart::content());
			if($orderDetails != FALSE){
			   return json_encode(
		               array("orderID"=>$resultLastID,
					          "vStatus"=>700,
							  "vendorDetailsId"=>$vendorDetailsID
							 ));
			 }
			else{ 
			   return json_encode(
		               array("failed"=>"<p style='color:red'>Unexpected try again...</p>",
					          "vStatus"=>500));
		        } 
		 }
	  }else{
	     return json_encode(
		               array("addressFailed"=>"<p style='color:red'>Please Select any one Address. Address is Required.</p>",
					          "vStatus"=>800));
	  }
		
		
	}
	
	public function userCartaddressForm(Request $request){
	    $validator = Validator::make($request->all(),array(
       'addressOne'=>'required','addressTwo'=>'required','city'=>'required','state'=>'required','pinCode'=>'required'));
	  if($validator->fails()){
        return json_encode(
		               array("error"=>$validator->errors()->getMessages(),
					          "vStatus"=>400));
       }
	    $result =  Address::addCartAddress($request->all());
	  if($result != FALSE){
		   echo json_encode(
		               array("success"=>"<p style='color:red'>New Address Add Successfully..</p>",
					          "vStatus"=>700));
		 }
	   else{
		     echo json_encode(
		               array("failed"=> "<p style='color:red'>Unexpected try again...</p>",
					          "vStatus"=>500));
		  }	
	}
	
	
	
	public function cartUpdate(Request $request){
	  $validator = Validator::make($request->all(),array('id'=>'required','qty'=>'required|numeric',));
	  if($validator->fails()){
        echo json_encode(
		               array("error"=> $validator->errors()->getMessages(),"vStatus"=>400));
       }
	   $cartRowID = $request->input("id");
	   $qty = trim($request->input("qty"));
	  // print_r($qty);exit;
	  //$rowId = Cart::search(array('rowId' => Request::get('id'))); 
	   $item = Cart::get($cartRowID);
	   $cartupdate = Cart::update($cartRowID, + $qty);
	   if($cartupdate){
		    echo json_encode(array("qty"=>Cart::count(),"status"=>"ok"));
		  }
	    else{
			echo json_encode(array("qty"=>Cart::count(),"status"=>"fail"));
		  }	  
	}
	
	
	
   public function addtoCart(Request $request){
    if(empty(session()->get('knpuser'))){ echo "loginfirst";exit;}	
		if(!empty($request->input("productsid"))){
		   if(!empty($request->input("shopID"))){
			  /*----get--Offers--Mode--and offers Discount---*/ 
			   if(!empty($request->input("offersID"))){
				   $offerDetails = OfferNewsModel::getvoffersNews("1",$request->input("offersID"));
				 }
			    	 
			  /*----get--Offers--Mode--and offers Discount---*/ 	 
			    if(count(Cart::content())>0){
				    $cartvArr = array();
					$i=1;
				    foreach(Cart::content()->toArray() as $cart){
				       $cartvArr[$i] = $cart['options']['vendordetails_id'];
				      $i++;
					} 
				   if($cartvArr[1] != $request->input("shopID")){
					   echo "error"; exit;
					 }
				  }
				//print_r($request->input("productsid"));exit;  
				$productsDetails = Products::find($request->input("productsid"));
				if(!empty($offerDetails->discountMode)){
				   $productsRate = Products::calculateOfferAmount($offerDetails->discountMode,$offerDetails->discountRate,$productsDetails->productsAmount);
				   $offerID = $request->input("offersID");
				   $offerMode = $offerDetails->discountMode;
				   $discountRate = $offerDetails->discountRate;
				  }
				else{
				    $productsRate = $productsDetails->productsAmount;
					$offerID = 0;
					 $offerMode = 0;
				     $discountRate = 0;
				  }   
				$cartContent = Cart::add(array('id'=>$productsDetails->id,'name'=>$productsDetails->pName,'qty'=>1,'price'=>$productsRate,'options'=>array('image'=>$productsDetails->pImage,"vendordetails_id"=>$productsDetails->vendordetails_id,"gst"=>$productsDetails->gstRate,"salePrice"=>$productsDetails->salePrice,"withGst"=>$productsDetails->withGst,"offerID"=>$offerID,"discountMode"=>$offerMode,"discountRate"=>$discountRate)));
			    echo Cart::count();
			  //$cartCollection $cartContent->toArray();
			  //print_r($productsDetails);
			  //$productsResult = $productsResult->toArray();
			  //echo json_encode($productsResult);
			 }	
		   else{
			   echo" Unexpected try again ....";
			 }	  
			  
			}
		  else{
			  echo"unexpected try again...";
			}	

		
		
		
		/*
		if(!empty($request->input("productsid"))){
		   if(!empty($request->input("shopID"))){
			    if(count(Cart::content())>0){
				    $cartvArr = array();
					$i=1;
				    foreach(Cart::content()->toArray() as $cart){
				       $cartvArr[$i] = $cart['options']['vendordetails_id'];
				      $i++;
					} 
				   if($cartvArr[1] != $request->input("shopID")){
					   echo "error"; exit;
					 }
				  }
				//print_r($request->input("productsid"));exit;  
				$productsDetails = Products::find($request->input("productsid"));
				$cartContent = Cart::add(array('id'=>$productsDetails->id,'name'=>$productsDetails->pName,'qty'=>1,'price'=>$productsDetails->productsAmount,'options'=>array('image'=>$productsDetails->pImage,"vendordetails_id"=>$productsDetails->vendordetails_id,"gst"=>$productsDetails->gstRate,"salePrice"=>$productsDetails->salePrice,"withGst"=>$productsDetails->withGst)));
			    echo Cart::count();
			  //$cartCollection $cartContent->toArray();
			  //print_r($productsDetails);
			  //$productsResult = $productsResult->toArray();
			  //echo json_encode($productsResult);
			 }	
		   else{
			   echo" Unexpected try again ....";
			 }	  
			  
			}
		  else{
			  echo"unexpected try again...";
			} */	
		}

	
	public function removeCart(Request $request){
		 $rowId =  $request->input("removeid");//exit;
	      Cart::remove($rowId);
		  echo Cart::count();
         //return Redirect::away('cart');
	  }
	 
	 public function deleteAddressmarketShop(Request $request){
		 if(!empty($request->input("id"))){
		        $result = Address::deleteAddrss($request->input("id"));
				 if($result != FALSE){
                   echo"<span style='color:green;'><strong>Record Delete Successfully.</strong></span>";
                   }
                 else{
                     echo"fail";
                   }   
		   }
		 else{
		      echo"error";
		   }  
	  } 
	  
	  
	  public function wishlisttocart(Request $request){
		  //echo $request->input("productsid");exit;
		if(!empty($request->input("productsid"))){
			  $productsDetails = Products::find($request->input("productsid"));
			    //echo"<pre>";
				//print_r($productsDetails);exit;
				if(count(Cart::content())>0){
				    $cartvArr = array();
					$i=1;
				    foreach(Cart::content()->toArray() as $cart){
				       $cartvArr[$i] = $cart['options']['vendordetails_id'];
				      $i++;
					} 
				   if($cartvArr[1] != $productsDetails->vendordetails_id){
					   echo "error"; exit;
					 }
				}
				//print_r($request->input("productsid"));exit;  
				$cartContent = Cart::add(array('id'=>$productsDetails->id,'name'=>$productsDetails->pName,'qty'=>1,'price'=>$productsDetails->productsAmount,'options'=>array('image'=>$productsDetails->pImage,"vendordetails_id"=>$productsDetails->vendordetails_id,"gst"=>$productsDetails->gstRate,"salePrice"=>$productsDetails->salePrice,"withGst"=>$productsDetails->withGst)));
			    $removeWishList = WishList::deleteRecord(array("id"=>$request->input("removieId")));
			    if($removeWishList != FALSE){
			        return json_encode(array("sucess"=>"<span style='color:green;'><strong>Products Added in Cart.</strong></span>",
										      "cartCount"=>Cart::count(),
											  "vStatus"=>100
										));
			      }  
			 }	
		   else{
			   echo" Unexpected try again ....";
			 }	  
	  }
	  	
	 
}
