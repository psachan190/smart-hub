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
use App\LoginModal;
use App\DeliveyandPickupDayModel;
use App\DeliveryandPickupTimeModel;
use App\User;
use App\VendorDetails;
use App\Module;
use App\UsersModule;
use Session;
use Auth;
use App\KnpShopImage;

class DeliveryScheduleController extends Controller{
	
	public function __construct() {
       date_default_timezone_set('Asia/Calcutta');
	 }
	
	
  public function deleteTimeSchedule(Request $request){
 	 if(!empty($_GET['id'])){
		   $result = DeliveryandPickupTimeModel::deletedeliveryandpickTime($_GET['id']);
		   if($result != FALSE){
			   echo"Record Delete Successfully....";
			 }
		   else{
			   echo"Unexpected try again....";
			 }	 
		}
	  else{
		  echo"Unexpected try again...";  
		}	
   }	
  	
  public function deliverySchedule(){
      $data['title'] = "Delivery Schedule Setting";
      if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
      $data['vresultData'] = VendorDetails::getSingleShopDetails();
      $data['timeResult'] = DeliveryandPickupTimeModel::getTimeofDelivery(array("vendordetails_id"=>session()->get('lastVendorID')));
      //echo "<pre>";
      //print_r($data['timeResult']);exit;
      $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
      return view("vendor.deliverySchedule")->with($data);  
   }   
   
   public function deliveryAndPickupPost(Request $request){
	   //print_r($request->input("deleveryDay"));exit;
	  if($request->input("deleveryDay") != "hidden"){
	     if(!empty($request->input("deleveryTime"))){
			$duplicateEntry = DeliveryandPickupTimeModel::getsingleTimeofDelivery(array("vendordetails_id"=>$request->input("vendorID"),"dayOfweek"=>$request->input("deleveryDay")));
			if($duplicateEntry == FALSE){
			  $result = DeliveryandPickupTimeModel::addTimeofDelivery($request->all());
			    if($result != FALSE){ echo "success"; }
				else{ echo "failes"; } 
			  }
			else{
			    echo"This Delivery Date and time already exists";
			 }  
		 }
		 else{
		      echo"Please Select Delivery Time.";
		  } 
	  }else{
	     echo"Please Select Delivery Day.";
	   }
	}
	
	
	public function getTimingbasedonDay(Request $request){
	   $timeArr = array(1=>"08::00 AM - 10:00 AM",2=>"10::00 AM - 12:00 AM",3=>"12::00 AM - 02:00 PM",4=>"02::00 PM - 04:00 PM",5=>"04::00 PM - 06:00 PM",6=>"06::00 PM - 08:00 PM",7=>"08::00 PM - 10:00 PM");
	   if(!empty($request->input("selectedDate"))){
	     if(!empty($request->input("vendorID"))){
			$dayOfWeek = date('w', strtotime($request->input("selectedDate"))) + 1;
                        $timingResult = DeliveryandPickupTimeModel::getsingleTimeofDelivery(array("vendordetails_id"=>$request->input("vendorID"),"dayOfweek"=>$dayOfWeek));
		      //echo "<pre>";  
                      //print_r($request->input("selectedDate"));exit;
		      if(!empty($timingResult->timingOfday)){
                                 $resultTimeArr = explode("@",$timingResult->timingOfday);
                                   	  $k=1;
					  $currentDate = date('m/d/Y');
//echo $currentDate;exit; 
					  if($currentDate == $request->input("selectedDate")){
						 
						  $today = date("H:i:s");                         // 17:16:18
	                      if($today >="08:00" && $today <= "10:00"){
							   $lesstimeArr = array(1=>3,2=>4,3=>5,4=>6,5=>7); 
							}
						  else if($today > "10:00" && $today <="12:00" ){
							 $lesstimeArr = array(1=>4,2=>5,3=>6,4=>7); 
							}	
						   else if($today > "12:00" && $today <="14:00" ){
							   $lesstimeArr = array(3=>5,4=>6,6=>7); 
							} 
						   else if($today > "14:00" && $today <="16:00" ){
							   $lesstimeArr = array(4=>6,6=>7); 
							}
						   else if($today > "16:00" && $today <="18:00" ){
							   $lesstimeArr = array(6=>7); 
							}
						   else if($today > "18:00" && $today <="20:00" ){
							 	$lesstimeArr = array(); 
							}
						   else if($today > "20:00" && $today <="22:00" ){
							   $lesstimeArr = array(); 
							}					
						  $resultTimeDuration = array_intersect($resultTimeArr,$lesstimeArr);
							 if(count($resultTimeDuration) >0){
							     foreach($resultTimeDuration as $key=>$value){
								     ?>
								     <div class="col-sm-4 custom-radio" style="margin-top:10px;">
								  <input type="radio" name="deliveryTiming" id="timing<?php echo $value; ?>" value="<?php if(!empty($value))echo $timeArr[$value]; ?>" />
								 <label for="timing<?php echo $value; ?>"><span class="circle"></span>&nbsp;
								  <?php if(!empty($value))echo $timeArr[$value]; ?>
								 </label>
								</div>
								     <?php
								   }
							   }
							 else{
							     echo "Today all Services Timing are Closed. ";
							   }  
							  
						}
					  else{
							foreach($resultTimeArr as $key=>$value){
							 ?>
							 <div class="col-sm-4 custom-radio" style="margin-top:10px;">
							  <input type="radio" name="deliveryTiming" id="timing<?php echo $value; ?>" value="<?php if(!empty($value))echo $timeArr[$value]; ?>" />
							 <label for="timing<?php echo $value; ?>"><span class="circle"></span>&nbsp;
							  <?php if(!empty($value))echo $timeArr[$value]; ?>
							 </label>
							</div>
							 <?php
							 }
						 }
			   }
			  else{ 
			     echo" We are not Provide Services on this day";
		    	}
		   }
		 else{
		      echo" Unexpected try again .";
		  } 
	  }
	}
	
   
}
