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
use App\User;
use Intervention\Image\Exception\NotReadableException;


class AjaxController extends Controller{
  
  
   public function shareWebshop($shopID){
       $result = VendorDetails::vendorDetails($shopID,"allSinglevendorDetails");
       if($result != FALSE){
            $resultImage = KnpShopImage::getShopImage($shopID);
			$userData = User::find($result->users_id);
			if(!empty($userData->sex)){ $sr = "her"; }
			else{ $sr = "his"; }  
			$data['title'] = " $userData->name created $sr Web Shop "."' $result->vName '"." on Kanpurize Please visit $sr shop .";
			$data['sharedUrl'] = urlencode("https://kanpurize.com/kanpurizeMarketplace");
		        $data['imageUrl'] = "https://kanpurize.com/uploadFiles/shopProfileImg/$resultImage->shoplogoImg"; 
		    $data['description'] = "My shop  is running Awesome in knapurize online marketing webshop , Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was po ";
                      $data['shoprefID'] = base64_encode($result ->id); 
			$data['shopName'] = str_replace(" ","_",$result ->vName);
	        return view("kanpur.share")->with($data);
         }
      }

       public function shareProfileonSocial($id){ 
        if(!empty($id)){
           $userid = $id;
             $userData = User::find($userid);
             if(!empty($userData->sex)){ $sr = "her"; }
	     else{ $sr = "his"; }  
             $data['title'] = " jitendra sahu created his Profile on Kanpurize Please visit yes Profile.";
             $data['imageUrl'] = "https://kanpurize.com/uploadFiles/offersNews/6021timthumb.jpg"; 
             //print_r($data['imageUrl']);exit;
             $data['sharedUrl'] = "https://kanpurize.com/kanpurizeMarketplace";
             $data['description'] = "My shop  is running Awesome in knapurize online marketing webshop , Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was po ";
             return view("kanpur.shareProfileSocial")->with($data);
             
           }
         else{
             return redirect()->back();
           }  
      
   } 
  
  
  public function facebookLinks(){
      $fbLinks = $_GET['facebookLink'];
	  $vID = $_GET['vendorsID'];
	  $users_id = $_GET['userID'];
	  if(!empty($fbLinks)){
          $updatedata = array("facebookLink"=>$fbLinks,"editSocialDate"=>time());
		  $where = array("id"=>$vID,"users_id"=>$users_id);
          $updateResult = VendorDetails::socialLinks($updatedata,$where);
          if($updateResult != FALSE){
            echo "<p style='color:green;'>Link save ....</p>";
          }
          else{
            echo "<p style='color:red;'>Unexpected Try again .....</p>";
          }
      }
      else{
          echo "<p style='color:red;'>Please enter the correct facebook link...</p>";
      }
   }
    
   public function twitterLinks(){
      $twitteriLink = $_GET['twitterink'];
	  $vID = $_GET['vendorsID'];
	  $users_id = $_GET['userID'];
	  if(!empty($twitteriLink)){
          $updatedata = array("twitterLinks"=>$twitteriLink,"editSocialDate"=>time());
		  $where = array("id"=>$vID,"users_id"=>$users_id);
          $updateResult = VendorDetails::socialLinks($updatedata,$where);
          if($updateResult != FALSE){
            echo "<p style='color:green;'>Link save ....</p>";
          }
          else{
            echo "<p style='color:red;'>Unexpected Try again ....</p>";
          }
      }
      else{
          echo "<p style='color:red;'>Please enter the correct Twitter link...</p>";
      }
   } 
 
   public function googlePlusLinkfnc(){
      $googlePlusLink = $_GET['googlePlusLink'];
	  $vID = $_GET['vendorsID'];
	  $users_id = $_GET['userID'];
	  if(!empty($googlePlusLink)){
          $updatedata = array("googlePlusLinks"=>$googlePlusLink,"editSocialDate"=>time());
		  $where = array("id"=>$vID,"users_id"=>$users_id);
          $updateResult = VendorDetails::socialLinks($updatedata,$where);
          if($updateResult != FALSE){
            echo "<p style='color:green;'>Link save ....</p>";
          }
          else{
            echo "<p style='color:red;'>Unexpected Try again ....</p>";
          }
      }
      else{
          echo "<p style='color:red;'><strong>Please enter the correct Google Plus link...</strong></p>";
      }
   }  
   
   public function linkedinLinksfnc(){
      $linkedInLinks = $_GET['linkedinLinks'];
	  $vID = $_GET['vendorsID'];
	  $users_id = $_GET['userID'];
	  if(!empty($linkedInLinks)){
          $updatedata = array("linkedInLinks"=>$linkedInLinks,"editSocialDate"=>time());
		  $where = array("id"=>$vID,"users_id"=>$users_id);
          $updateResult = VendorDetails::socialLinks($updatedata,$where);
          if($updateResult != FALSE){
            echo "<p style='color:green;'><strong>Link save ....</strong></p>";
          }
          else{
            echo "<p style='color:red;'><strong>Unexpected Try again ....</strong></p>";
          }
      }
      else{
          echo "<p style='color:red;'><strong>Please enter the correct Linkedin Profile link...</strong></p>";
      }
   }  
   
   public function instagramLinkfnc(){
      $instagramLink = $_GET['instagramLink'];
	  $vID = $_GET['vendorsID'];
	  $users_id = $_GET['userID'];
	  if(!empty($instagramLink)){
          $updatedata = array("instagramLinks"=>$instagramLink,"editSocialDate"=>time());
		  $where = array("id"=>$vID,"users_id"=>$users_id);
          $updateResult = VendorDetails::socialLinks($updatedata,$where);
          if($updateResult != FALSE){
            echo "<p style='color:green;'><strong>Link save ....</strong></p>";
          }
          else{
            echo "<p style='color:red;'><strong>Unexpected Try again ....</strong></p>";
          }
      }
      else{
          echo "<p style='color:red;'><strong>Please enter the correct Instagram Profile link...</strong></p>";
      }
   }
   
   public function contactinfoEmailfnc(){
      $fEmail = $_GET['fEmail'];
	  $secondEmail = $_GET['secondEmail'];
	  $vID = $_GET['vendorsID'];
	  $users_id = $_GET['userID'];
	  if(!empty($fEmail)){
          $updatedata = array("infoEmail"=>$fEmail,"secondinfoEmail"=>$secondEmail,"editSocialDate"=>time());
		  $where = array("id"=>$vID,"users_id"=>$users_id);
          $updateResult = VendorDetails::socialLinks($updatedata,$where);
          if($updateResult != FALSE){
            echo "<p style='color:green;'><strong>Save Email ....</strong></p>";
          }
          else{
            echo "<p style='color:red;'><strong>Unexpected Try again ....</strong></p>";
          }
      }
      else{
          echo "<p style='color:red;'><strong>Please enter the correct Email link...</strong></p>";
      }
   }  
     
   
     
     
  /*
  public function editkanpurizeAdsPost(Request $request){
	     $validator = Validator::make($request->all(),array(
        //'AdsImage' => 'required|dimensions:min_width=1600,max_width=2000|dimensions:min_height=500,max_height=620',
        'startDate' => 'required',
		'endDate'=>'required',
	  ));
	      if($validator->fails()){
              return json_encode(
		               array(
					     "error"=> $validator->errors()->getMessages(),
					     "vStatus"=>400
						  ));
             }
		 $formData = $request->all();
	     $vAdspostPath = public_path('uploadFiles/vendorAdspost');
		 $vthumbsAdspostPath = public_path('uploadFiles/vthumbsAdspost');
	   if(empty($request->file('adsImage'))){
		   $imageName = $formData['imageNameCopy'];
		 }
	   else{
		   $image = rand(1,9999).$request->file('adsImage')->getClientOriginalName();
		   $existsImage = $formData['imageNameCopy'];
		     $firstFile = $vAdspostPath."/".$existsImage;
			 $secondFile = $vthumbsAdspostPath."/".$existsImage;
			 if(file_exists($firstFile)){ unlink($firstFile); }
			 if(file_exists($secondFile)){ unlink($secondFile); }
		         $imageName = str_replace(" ","-",$image);
				 $adsRealSize = Image::make($request->file('adsImage')->getRealPath())->resize(2000, 600);
				 $thumbsAdsRealSize = Image::make($request->file('adsImage')->getRealPath())->resize(400, 200);
				 $thumbsAdsRealSize->save($vthumbsAdspostPath.'/'.$imageName,80);
				 $adsRealSize->save($vAdspostPath.'/'.$imageName,80);
			}
			$editDataArr = array("postImg"=>$imageName,"startDate"=>$formData['startDate'],"endDate"=>$formData['endDate'],"postDescription"=>$formData['myTextarea1'],"crDate"=>time(),"editDate"=>time(),"adminStaus"=>"N");
			$updateResult = VendorPostAds::veditPostAds($editDataArr,$formData['editID']);
			 if($updateResult != FALSE){
				  return json_encode(
						array(
						"success"=>"Your advertisement has been submitted . It will be posted in the market place after review... ",
						"vStatus"=>500
						));
				}
   }
   */
  
  public function addBusinessDetails(Request $request){
	   $validator = Validator::make($request->all(),array(
        'bownerName' => 'required','aboutBusiness'=>'required',"bName"=>"required","panNumber"=>"required","gstFile"=>"mimes:jpeg,jpg,png,pdf","vSignature"=>"mimes:jpeg,jpg,png"));
	      if($validator->fails()){
              return json_encode(
		               array(
					     "error"=> $validator->errors()->getMessages(),
					     "vStatus"=>400
						  ));
             }
	  		 
	  $result = KnpPincodeModel::matchPincode(array("pincode"=>$request->input("pincode"))); 
	   
          if($result != FALSE){
		     $formData = $request->all();
		   /*--gst file upload start--*/
			$gstFilepath = public_path('uploadFiles/businessDetails/gstFile');
			$signaturePath = public_path('uploadFiles/businessDetails/signature');
			if(empty($formData['dontGst'])){
				  $gstfileName = $request->file('gstFile');
				  if(empty($gstfileName)){
						  $gstfileName = $formData["gstfileCopy"];
					 }
					else{
					   $gstfileName = rand(1,9999).$request->file('gstFile')->getClientOriginalName(); 
					   $dontGst = "N"; 
					   $newgstFilepath = $request->file('gstFile')->move($gstFilepath,$gstfileName);   
					 } 
			  }
			 else{
				$dontGst = $formData['dontGst'];
				$gstfileName=" ";
			  }
			 /*--gst file upload End--*/
			/*--signature file upload start--*/ 
			if(empty($request->file('vSignature'))){
				  $signatureFile = $formData['vSignatureNameCopy'];
			  } 
			 else{ 
				   $signatureFile = rand(1,9999).$request->file('vSignature')->getClientOriginalName();
				   $signExt = $request->file('vSignature')->getClientOriginalExtension();
				   $newsignPath = $request->file('vSignature')->move($signaturePath,$signatureFile);   
			  }
			 /*--signature file upload End--*/ 
			 $dontGst = "N";
			 $knpUser_id =  session()->get('knpUser_id');
			 $shopID = session()->get('lastVendorID');
			 $whereClause = array("userID"=>$knpUser_id,"shopID"=>$shopID);
			$insertData = array("ownerName"=>$formData['bownerName'],"aboutBusiness"=>$formData['aboutBusiness'],"dontgst"=>$dontGst,"gstNumber"=>$formData['gstNumber'],"gstFile"=>$gstfileName,"gstFilepath"=>$gstFilepath,"gstProvisionalID"=>$formData['gstProvisionalID'],"panCardNumber"=>$formData['panNumber'],"signature"=>$signatureFile,"signaturePath"=>$signaturePath,"address1"=>$formData['address1'],"address2"=>$formData['address2'],"pinCode"=>$formData['pincode'],"city"=>$formData['city'],"state"=>$formData['state'],"editDate"=>time(),"cbusinesStatus"=>"Y"); 
			
			 $updateDataResult = vendorbusinesDetails::editBusinessDetails($insertData,$whereClause); 
			  //print_r($updateDataResult);exit;
			  if($updateDataResult != FALSE){
				  return json_encode(
							array(
							"success"=>"<p style=color:#00cc66;><strong>Records Save Successfully.</strong></p>",
							"vStatus"=>200
							));
				}
				else{  
				   return json_encode(
							array(
							"fail"=>"<p style=color:red;><strong>Unexpected try again....</strong></p>",
							"vStatus"=>300
							));
				}	  
		 }
	   else{
		   echo json_encode(
							array(
							"msg"=>"<span style='color:red;'><strong>We don't provide service in this Area .</strong></span>",
							"vStatus"=>100
							));
	     }	  
	   
	}
   
   
   
  public function savefrontImage(Request $request){
       $formData = $request->all();
       if(!empty($formData['imageName'])){
		     //echo $request->file("frontImage");exit;
		     $ext = $request->file('frontImage')->getClientOriginalExtension();
			  if($ext=="jpg" || $ext=="jpeg" || $ext=="png"){
				   $fileName = rand(1,9999).$request->file('frontImage')->getClientOriginalName();
				   $shopImage = str_replace(" ","-",$fileName);
				   $shopLogopath = public_path('uploadFiles/shopProfileImg');
				    $thumbImgpath = public_path('uploadFiles/shopProfileImg/thumbImg');
				    $shopLogo = Image::make($request->file('frontImage')->getRealPath())->resize(750, 500);
					 $thumbImage = Image::make($request->file('frontImage')->getRealPath())->resize(80,80);
			        if($shopLogo->save($shopLogopath.'/'.$shopImage,80)){
					     if($thumbImage->save($thumbImgpath.'/'.$shopImage,80)){
							   $knpUser_id =  session()->get('knpUser_id');
							   $shopID = session()->get('lastVendorID');
							   $data = array("userID"=>$knpUser_id,"shopID"=>$shopID,"thumbImagePath"=>$thumbImgpath,"thumbImage"=>$shopImage,"shopLogoPath"=>$shopLogopath,"shopprofileLogo"=>$shopImage);    
							   $upShopprofileImage = VendorShopImage::editprofileImage($data);
							   if($upShopprofileImage != FALSE){
								   echo"<span style='color:#00cc66;'><strong>image Upload ....</strong></span>";
								 }
								else{
								echo"<span style='color:red;'><strong>Unexpected Try again....</strong></span>";	
								} 
							}
						 else{
							   echo"<span style='color:red;'><strong>unexpected try again....</strong></span>";
							}	
					  }
					else{
					   echo"<span style='color:red;'><strong>unexpected try again....</strong></span>";
					  }  
					
				}
			  else{
				  echo"<span style='color:red;'>invalid file , file type allowed only  jpg,jpeg,PNG</span>";
				}	
		  }
	   else{
		   echo"<span style='color:red;'>please Select your shop Profile Image...</span>";
		  }	   
   }
   
   public function editServicesaction(Request $request){
	   $result = VservicesModel::editServiceDetails($request);
	    if(!empty($result) || $result != FALSE){
		    echo"<span style='color:red;'>Record update successfully...</span>";
		  }
		else{
		  echo"<span style='color:red;'>Unexpected  try again....</span>";
		}  
	    
	}
	
   public function changeSubcategory(){
	 $shopID =$_GET['shopID'];
	 $categoryID = $_GET['categoryId'];
	  if(empty($categoryID) || $categoryID==0){
		  echo"plase Select any Valid Category...";
		} 
	  else{
		   $subCatResult = SubCategory::subCategory($categoryID,"Y");
		   if($subCatResult != FALSE){
			     $authsubCat = VendorCatAuthority::vendorAuthSubCategory($shopID,$categoryID,"Y");
		          if($authsubCat != FALSE){
				      $dataResult = array_merge($subCatResult,$authsubCat);
		             }
			      else{
			        $dataResult = $subCatResult;
		             }     
			  }
		   else{
			   $authsubCat = VendorCatAuthority::vendorAuthSubCategory($shopID,$categoryID,"Y");
			   if($authsubCat != FALSE){
				      $dataResult = $authsubCat;
		             }
			      else{
			          $dataResult = FALSE;
		            } 
			  }	  
			if($dataResult != FALSE){
			   foreach($dataResult as $subCat){
				     ?>
					 <option value="<?php echo $subCat->sid; ?>"><?php echo $subCat->subCatname; ?></option>
					 <?php
				  }
			 }
		   else{
			   ?>
			   <option value="blank">Sub category Not Found..</option>
			   <?php
			 }	 
		}	
	}

	 public function getAttribue(Request $request){
	
	  $categoryID = $request->categoryId;

	  if(empty($categoryID) || $categoryID==0){
		  echo"plase Select any Valid Category...";
		} 
	  else
	  {
		  $dataResult =Attribute::where('category_id',$categoryID)->get();
			   foreach($dataResult as $subCat)
			   {
			   echo '<div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Attribute : '.$subCat->name.' </label>
                    <select name="productattribute['.$subCat->id.']" id="attribute['.$subCat->id.']" class="form-control">';
                      echo '<option value="'.$subCat->id.'">'.$subCat->name.'</option>';
                       
                    echo '</select>
                   </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                <label>Attribute Value : '.$subCat->name.'</label>
              	<input type="text" name="value['.$subCat->id.']" id="value['.$subCat->id.']" >
              	</div>
                </div>
              </div>';   
					
				}
	  }	 
			
	}
   	
   	
   public function changeCategory(){
	   $shopCatID = $_GET['shopCatID'];
	   if(!empty($shopCatID)){
		  $resultshopcat = CategoryModel::category($shopCatID);
		   if(!empty($resultshopcat)){
				 ?>
				 <select name="catID" id="catID" class="form-control">
                    <option value="undefined">--Select--category--</option>
				   <?php
                     foreach($resultshopcat as $listCat){
					   ?>
					   <option value="<?php if(!empty($listCat->id )) echo $listCat->id; ?>"><?php if(!empty($listCat->csname )) echo $listCat->csname; ?></option>
					   <?php      
					}
				   ?>           
				 </select>
				 <?php
				}
		     else{
			     echo"<strong>No Record Found...</strong>";	
				}		
		  }
	    else{
			 echo"Please Select valid Shop Category...";
			}	  
	  //$resultshopcat = DB::table("knp_shopcategory")->get();
	  //return view("Admin/addsubCategory")->with(array("listArr"=>$resultshopcat));
   }
   
   
	
	
	
	public function vDetailsBlockorUnblock(){
	   $permission = $_GET['permission'];
	   $id = $_GET['id'];   // echo $id;exit;
	   if($permission=="block"){ $adminStatus = "N"; }
	   if($permission=="Unblock"){ $adminStatus="Y"; }
	    $data = array("crvStatus"=>$adminStatus,"editDate"=>time());
		$where = array("id"=>$id);
		$result = VendorDetails::BlockorUnblock($data,$where);
		if($result != FALSE){ echo"Update"; }
		else{ echo"false"; }
	}
	
	public function vVerifyAds(){
	   $date = date('Y-m-d H:i:s',time());	
	   $permission = $_GET['permission'];
	   $id = $_GET['id'];   
	   if($permission=="block"){ $adminStatus = "N"; }
	   if($permission=="Unblock"){ $adminStatus="Y"; }
	    $data = array("adminStatus"=>$adminStatus,"updated_at"=>$date);
		$where = array("id"=>$id);
		$result = Advertisement::BlockorUnblock($data,$where);
		if($result != FALSE){ echo"Update"; }
		else{ echo"false"; }
	}
	
	
   
}
