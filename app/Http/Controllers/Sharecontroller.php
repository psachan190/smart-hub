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
use App\Shop_categoryModel;
use App\CategoryModel;
use App\SubCategory;
use App\VservicesModel;
use App\VendorShopImage;
use App\VendorbusinesDetails;
use App\KnpShopImage;
use App\VendorPostAds;
use App\Attribute;
use Session;
use Image; 
use App\VendorDetails;
use App\VendorCatAuthority;
use App\Advertisement;
use App\AdsProfession;
use App\KnpPincodeModel;
use App\Models\User;
use Intervention\Image\Exception\NotReadableException;


class Sharecontroller extends Controller{
        
        
     public function shareWebshop($shopID){
       $result = VendorDetails::vendorDetails($shopID,"allSinglevendorDetails");
       if($result != FALSE){
            $resultImage = KnpShopImage::getShopImage($shopID);
			$userData = User::find($result->users_id);
			if(!empty($userData->sex)){ $sr = "her"; }
			else{ $sr = "his"; }  
			$data['title'] = " $userData->name created $sr Web Shop "."' $result->vName '"." on Kanpurize Please visit $sr shop .";
			$data['sharedUrl'] = urlencode("https://kanpurize.com/kanpurizeMarketplace");
			//$data['sharedUrl'] = urlencode("https://www.kanpurize.com/account/$userData->username");
			
		        $data['imageUrl'] = "https://kanpurize.com/uploadFiles/shopProfileImg/$resultImage->shoplogoImg"; 
		    $data['description'] = "My shop  is running Awesome in knapurize online marketing webshop , Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was po ";
                      $data['shoprefID'] = base64_encode($result ->id); 
			$data['shopName'] = str_replace(" ","_",$result ->vName);
	        return view("kanpur.share")->with($data);
         }
      }
	
        
        
        
      public function shareProfileonSocial($username){ 
	     if(!empty($username)){
             $userData = DB::table('users')->where(array("username" => $username ))->first();
			// print_r($userData);exit;
             if($userData->sex != "M"){ $sr = "her"; }
	         else{ $sr = "his"; }  
             $data['title'] = "$userData->name created $sr Profile on Kanpurize Please visit $sr Profile.";
			 if(!empty($userData->profile_image)){
				 $image = url("storage/$userData->profile_image");
				}
		     else{
				 if($userData->sex != "M"){ 
				     $image = url("cdn/images/default-boy.png");
				     // $image = url("profile/profilefemale.jpg"); 
				   }
				 else  
				     $image = url("cdn/images/default-boy.png");
				    //$image = url("profile/profileMale.png");
				} 		
             $data['imageUrl'] = $image; 
             //echo $data['imageUrl'];exit;
              $data['redirectPage'] = $username;
             $data['sharedUrl'] = urlencode("https://www.kanpurize.com/account/$userData->username");
             //echo "<pre>";
			//print_r($data['sharedUrl']);exit;
             $data['description'] = "I am also create our profile and i have suggest to you also create his/her Website in Kanpurize . ";
             return view("kanpur.shareProfileSocial")->with($data);
           }
         else{
             return redirect()->back();
           }  
    } 
    
}


?>