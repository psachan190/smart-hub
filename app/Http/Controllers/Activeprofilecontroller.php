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
use App\User;
use App\QuizParticanModal;
use App\QuizanswerModal;
use App\VendorRegistration;
use App\VendorCategory;
use App\Knp_vendorbusinesstype;
use App\Shop_categoryModel;
use App\Otpverify;
use App\KnpPincodeModel;
use Session;
use App\VendorDetails;
use App\VendorPostAds;
use App\Products;
use App\VservicesModel;
use App\CategoryModel;
use App\SubCategory;
use App\KnpShopImage;
use App\ComplainSubject;
use App\ComplainModel;
use App\ComplainDetails;
use App\OfferNewsModel;
use App\EventCategory;
use Cart;
use Auth;
use Mail;
use Image; 
use App\ProfileCategory;
use App\KnpProfileModel;
use Tzsk\Payu\Facade\Payment; 
use App\Models\Post;
use App\Models\PostImage;

class Activeprofilecontroller extends Controller{
    public function __construct() {
       date_default_timezone_set('Asia/Calcutta');
	 }

   public function shareIndependence_day(){
     echo "yes";exit;
   }
   
   public function index($name=NULL){
      $data['title'] = " Wish you a happy independence day ";
      if(!empty($name)){
         $data['user_name'] = $name;
         $data['title'] = $name." Wish you a happy independence day ";
         if($name=="shareProfile"){
             if(isset($_GET['name'])){
               
             }
           }
       }
        // echo "yes";exit;
	 return view("independence_day.index")->with($data);
   }	 
   
   public function postAction(Request $request){
     echo "<pre>";
     print_r($request->all());exit;
   }
   	 
   public function getProfileList(){
	   $prodfileList = KnpProfileModel::getprofileData(array("users_id"=>session()->get('knpUser_id')));
	   //echo "<pre>";
	   //print_r($data['prodfileList']);exit;
	   if($prodfileList != FALSE){
          foreach($prodfileList as $pListArr){
            ?>
            <a href="<?php $refID = 415641545 + $pListArr->id;  echo url("kanpurizeProfile")."/".str_replace(" ","_",$pListArr->profileName)."?ref=$refID"; ?>" class="message recent">
             <div class="message__actions_avatar">
                    <div class="avatar">
                        <img src="{{ asset('images/notification_head4.png') }}" alt="">
                    </div>
                </div><!-- end /.actions -->
                <div class="message_data">
                    <div class="name_time">
                        <p><?php if(!empty($pListArr->profileName)){ echo $pListArr->profileName; } ?></p>
                    </div>
                </div><!-- end /.message_data -->
            </a>
            <?php
		  }
		}
	}
	
		 
	
   public function shareProfilePost($postID){
	  $result = Post::getProfilePostData('1',$postID);
	   print_r($result);exit;
       if($result != FALSE){
            $resultImage = KnpShopImage::getShopImage($shopID);
			$userData = User::find($result->users_id);
			if(!empty($userData->sex)){ $sr = "her"; }
			else{ $sr = "his"; }  
			$data['title'] = " $userData->name created $sr Web Shop "."' $result->vName '"." on Kanpurize Please visit in $sr shop .";
			$data['sharedUrl'] = urlencode("https://kanpurize.com/kanpurizeMarketplace");
		    $data['imageUrl'] = "https://kanpurize.com/uploadFiles/shopProfileImg/$resultImage->shoplogoImg"; 
		    $data['description'] = "My shop  is running Awesome in knapurize online marketing webshop , Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was po ";
            $data['shoprefID'] = base64_encode($result ->id); 
			$data['shopName'] = str_replace(" ","_",$result ->vName);
	        return view("kanpur.share")->with($data);
         }
	}		
	
   public function getProfilePost($profileID){
       // echo "yes";exit;
	  $data['title'] = "profile Get Data"; 
	  $data['postImageObj'] = new PostImage(); 
	  $data['fetchData'] = Post::getProfilePostData($profileID);
	  //echo "<pre>";
	  //print_r($data['fetchData']);
	  return view("kanpur.fetchData")->with($data);
	}	
	    
   public function profilePostupload(Request $request){
	 if(empty($request->htmlPostcon) && empty($request->file('profilepostImage'))){
	     echo "please upload context here .";
	   } 
	 else{
		 if($request->users_id == Auth::user()->id){
		  if(!empty($request->file("profilepostImage"))){ $hasImage = 1; }else{ $hasImage = 0; }
		  $result = Post::profileUploadPost($request->all(),$hasImage);
		  if(!empty($request->file("profilepostImage"))){
			  $file = $request->file('profilepostImage');
              $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
			   if ($file->storeAs('public/uploads/posts',$file_name)) {
                    $ImageResult = PostImage::uploadImageData($file_name,$result);
					if($ImageResult != FALSE){ echo "Post upload Successfully .";exit; }
					else{ echo "Unexpected try again .";exit;  }
					
                } else {
                    echo "Unexpected try again .";exit;  
                }
			}
		  else{
			  echo "Post upload Successfully .";exit;
			}	
		 }
	   }  
   }
  
  
  public function saveProfileImage(Request $request){
     if(!empty($request->file('imageProfile'))){
	   $fileName = time().$request->file('imageProfile')->getClientOriginalName();
	   $imageName = str_replace(" ","-",$fileName);
	   $imagePath = public_path('uploadFiles/createProfileShop');
	     if(!is_dir($imagePath)){  mkdir($imagePath, 0755, true); }
	   $bannerImage = Image::make($request->file('imageProfile')->getRealPath())->resize(240, 260);
	   if($bannerImage->save($imagePath.'/'.$imageName,80)){
		  $insertData = KnpProfileModel::editProfile(array("profileImage"=>$imageName),array("id"=>$request->editID));
			if($insertData != FALSE){
				  echo 1;
				}
			 else{
			      echo 2;
			   }   
		} 
          }
   }
  
  
   public function kanpurizeProfileDashborad($pageName){
	  if(!empty($pageName)){
		 if(isset($_GET['ref'])){
			  $getProfileDataid = $_GET['ref'] - 415641545;
			  $data['title'] = "Active_profile";
	                  $data['userProfileData'] = KnpProfileModel::getprofileData('a',$getProfileDataid);
		          //echo "<pre>";
			  //print_r($data['userProfileData']);exit;
			  $data['prodfileList'] = KnpProfileModel::getprofileData(array("users_id"=>session()->get('knpUser_id')));
		      $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
			  return view("kanpur.Profile_deshboard")->with($data);
		   }
		 else{
		      return redirect()->back(); 
		   }  
	   }
	   else{
	     return redirect()->back();
	   }  
   }
   
    public function standard_feature(){
	$data['title'] = "Active_profile";
	$data['prodfileList'] = KnpProfileModel::getprofileData(array("users_id"=>session()->get('knpUser_id')));
	$data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
	return view("kanpur.standard_feature")->with($data);
  }
 
  
   public function Profile_Type(){
	$data['title'] = "Active_profile";
	$data['prodfileList'] = KnpProfileModel::getprofileData(array("users_id"=>session()->get('knpUser_id')));
	$data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
	return view("kanpur.Profile_Type")->with($data);
  }
  
  
  public function Business_owner(){
	$data['title'] = "Business_owner";
	$data['prodfileList'] = KnpProfileModel::getprofileData(array("users_id"=>session()->get('knpUser_id')));
	$data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
	return view("kanpur.Business_owner")->with($data);
  }
  
   public function Business_Org(){
	$data['title'] = "Business_owner";
	$data['prodfileList'] = KnpProfileModel::getprofileData(array("users_id"=>session()->get('knpUser_id')));
	$data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
	return view("kanpur.Business_Org")->with($data);
  }
   
    public function Political_Profile(){
	$data['title'] = "Political_Profile";
	$data['prodfileList'] = KnpProfileModel::getprofileData(array("users_id"=>session()->get('knpUser_id')));
	$data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
	return view("kanpur.Political_Profile")->with($data);
  }
  public function Political_Org(){
	$data['title'] = "Political_Org";
	$data['prodfileList'] = KnpProfileModel::getprofileData(array("users_id"=>session()->get('knpUser_id')));
	$data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
	return view("kanpur.Political_Org")->with($data);
  }
   
   
   
   
   public function payforProfileStatus(Request $request){
     $payment = Payment::capture();
     if($payment->status=="Completed"){
	   $transactioIdArr = explode("/",$payment->txnid);
	   $dataArr = json_decode($payment->data);
	  if($dataArr->status=="success"){
		  $updateData = array("status"=>"Y","updated_at"=>time());
		  $condition = array("id"=>$transactioIdArr[1]);
		  $result = KnpProfileModel::editProfile($updateData,$condition);   
		  return redirect("kanpurizeCreateProfile?success");
		}
	}
   else if($payment->status=="Failed"){
	  return redirect("kanpurizeCreateProfile?failed");
	}
   }


   public function  payforCreateProfile(Request $request){
      if(!empty($request->profileLastID)){
	   //print_r($request->profileLastID);exit;
	      $result = KnpProfileModel::getprofileData('1',$request->profileLastID);
		//print_r($result);exit;
		  $userData = User::find($result->users_id);
		  $gstTax = ($result->packageAmount * 18)/100;
	      $totalAmount =$result->packageAmount + $gstTax;
		    $txnID = strtoupper(str_random(8))."/".$result->id;
		    $data = array('txnid'=>$txnID,'amount'=>$totalAmount,
 'productinfo' =>"Pay for Profile Creation ",'firstname'=>$userData->name,'email'=>$userData->email,
 'phone'=>$userData->mobileNumber,"profileID"=>$result->id);
            //$result = KnpProfileModel::editRecord(array("id"=>$result->id));
        return Payment::make($data,function($then) {
                $then->redirectTo("payment/payforProfileStatus"); # Your Status page endpoint.
              });
		} 
	   else{
		    return redirect()->back();
		}	
	}
   	
   public function insertProfileData(Request $request){
     if(!empty($request->termandcondition)){
	      $validator = Validator::make($request->all(),array(
          'profileName' =>'required',
		  'profileType'=>'required',
		  'profileCategory'=>'required',
		  'profilePrice'=>'required'
	    ));
	      if($validator->fails()){
              return json_encode(
		               array(
					     "error"=> $validator->errors()->getMessages(),
					     "vStatus"=>400
						  ));
             }
		  $result = KnpProfileModel::addProfileuser($request->all(),session()->get('knpUser_id'));
		  if($result != FALSE){
			   return json_encode(array("msg"=>"<span style='color:green;'><strong> your Profile create successfully . </strong></span>",
							            "lastProfileID"=>$result,
										"vStatus"=>700));  
			}
		  else{
			  return json_encode(array("msg"=>"<span style='color:red;'><strong>Information saved successfully.</strong></span>",
							        "vStatus"=>100));  
			}	
	   }
	 else{
		 return json_encode(array("msg"=>"<span style='color:red;'><strong>Please accept term and condition .</strong></span>",
							        "vStatus"=>100));  
	   }  
   }
   
   
   
   public function getProfileCat(Request $request){
      if(!empty($request->profileType)){
		 $result = ProfileCategory::getprofileCategory(array("profileType"=>$request->profileType));
		 if($result != FALSE){
		     ?>
			 <option value="0">Select Your Category</option>
			 <?php
			 foreach($result as $dataArr){
			      ?>
				  <option value="<?php if(!empty($dataArr->id))echo $dataArr->id; ?>"><?php if(!empty($dataArr->type))echo $dataArr->type; ?></option>
				  <?php
			   }
		   }
		}
	  else{
		 echo "Please Select any one Profile Type";
		} 	
   }
    
 public function getProfileCatPrice(Request $request){
	  if(!empty($request->profileCatType)){
		 $result = ProfileCategory::getprofileCategory('1',array("id"=>$request->profileCatType));
		 if($result != FALSE){
		     //$tax = ($result->price * 18)/100;
			 //$totalprice = $result->price + $tax;
			 $totalprice = $result->price;
			 ?>
			  <label for="country">Your Profile Package price<sup>*</sup></label>
               <input type="text" id="profilePrice" class="text_field" name="profilePrice" placeholder="Profile Price" readonly="readonly" value="<?php if(!empty($result->price))echo $totalprice." + 18% GST"; ?>">
			 <?php
		   }
		}
	  else{
		 echo "Please Select any one Profile Type";
		} 	
   }
   
   public function createProfile(){
	$data['title'] = "Active_profile";
	$data['prodfileList'] = KnpProfileModel::getprofileData(array("users_id"=>session()->get('knpUser_id')));
	//echo "<pre>";
	//print_r($data['prodfileList']);exit;
	$data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
	return view("kanpur.Active_profile")->with($data);
   } 
   

   public function getEditpostForm($editPostID){
	 $data['title'] = "Edit Profile Post ";	
	 if(!empty($editPostID)){
	     $data['result'] = Post::getProfilePostData("1",$editPostID);
		 //echo "<pre>";
		 //print_r($data['result']);exit;
		 if($data['result']->user_id == Auth::user()->id){
		      return view("kanpur.editProfilePost")->with($data);  
		   }
		 else{
		     echo "unexpected try again .";
		   }   
	   }
	}	

    
public function editprofilePostupload(Request $request){
	 if(empty($request->htmlPostcon) && empty($request->file('editprofilepostImage')) && empty($request->editprofilepostImageCopy)){
	     echo "please upload context here .";
	   } 
	 else{
		 if($request->users_id == Auth::user()->id){
		  if(empty($request->file("editprofilepostImage")) && empty($request->editprofilepostImageCopy)){ $hasImage = 0; }else{ $hasImage = 1; }
		  $editresult = Post::editprofileUploadPost($request->all(),$hasImage);
		  if(!empty($request->file("editprofilepostImage"))){
			  if(!empty($request->editprofilepostImageCopy)){
				   $existimagePath = url("storage/uploads/posts/$request->editprofilepostImageCopy");
				   if(file_exists($existimagePath)){  unlink($existimagePath); }
				}
			  $file = $request->file('editprofilepostImage');
              $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
			   if($file->storeAs('public/uploads/posts',$file_name)) {
				    //print_r($request->imagePathID);exit;
                   if(!empty($request->imagePathID)){
					   $ImageResult = PostImage::edituploadImageData($file_name,$request->imagePathID);
					   if($ImageResult != FALSE){ echo "Post upload Successfully .";exit; }
					   else{ echo "Unexpected try again .";exit;  }
					 } 
				   else{
					      $ImageResult = PostImage::uploadImageData($file_name,$request->profileEditPostID);
					      if($ImageResult != FALSE){ echo "Post upload Successfully .";exit; }
					   }	 
					
                } else {
                    echo "Unexpected try again .";exit;  
                }
			}
		  else{
			   $ImageResult = PostImage::edituploadImageData($request->editprofilepostImageCopy,$request->imagePathID);
			   if($ImageResult != FALSE){ echo "Post upload Successfully .";exit; }
			   else{ echo "Post upload Successfully .";exit;  }
			}	
		 }
	   }  
   }

 }

  
