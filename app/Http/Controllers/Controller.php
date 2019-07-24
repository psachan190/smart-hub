<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Session;
use App\VendorDetails;
use App\KnpPincodeModel;
use App\Shop_categoryModel;
use App\CategoryModel;
use App\Products;
use App\User;
use App\ProductsImageModel;
use App\VservicesModel;
use App\VendorShopImage;
use App\vendorbusinesDetails;
use App\VendorPostAds;
use App\Order;
use App\OrderDetails;
use App\ShopSetting;
use App\ProductAttribueTable;
use App\Advertisement;
use App\Ngo_model;
use App\Matrimonial_model;
use Image; 
use App\AdvertisementRecord;
use App\VendorCatAuthority;
use Intervention\Image\Exception\NotReadableException;
use Auth;
use App\KnpShopImage;
use Mail;


class Controller extends BaseController{
	
    use AuthorizesRequests, ValidatesRequests;
	
	
	public $imageArr = array("jpeg" , "png" , "jpg" , "JPEG" , "PNG" ,"JPG" );
	
	public function talentBannerImage($formData){
	    $talent_imagePath = public_path('uploadFiles/talent');
		$talent_imageoriginPath = public_path('uploadFiles/talent/original');
	  if(!is_dir($talent_imagePath)){ mkdir($talent_imagePath, 0755, true); }
	  if(!is_dir($talent_imageoriginPath)){ mkdir($talent_imageoriginPath, 0755, true); }
	  if(!empty($formData['talent_profileImage'])){
		  if(!empty($formData['talent_profileImageCopy'])){
			 $filethumbPath = $talent_imagePath."/".$formData['talent_profileImageCopy'];
			 $fileoriginal = $talent_imageoriginPath."/".$formData['talent_profileImageCopy'];			 
			 if(file_exists($fileoriginal )){ unlink($fileoriginal ); }
			 if(file_exists($filethumbPath)){ unlink($filethumbPath); }
			}
		  $fileName = md5(time()).".".$formData['talent_profileImage']->getClientOriginalExtension();
		  if(in_array($formData['talent_profileImage']->getClientOriginalExtension() , $this->imageArr )){
		     $talentthumbImage = Image::make($formData['talent_profileImage']->getRealPath())->resize(361 , 220);
			 $talentthumbImage->save($talent_imagePath.'/'.$fileName,80);
			 $formData['talent_profileImage']->move($talent_imageoriginPath  , $fileName);
			 return $fileName;
			}
		   else{  return 100; }	
		}
	   else{
		  return $formData['talent_profileImageCopy'];
		}	
	}
	
	 public function matrimonial_image ($request){
		$mat_profile_imagePath = public_path('uploadFiles/matrimonial_image');
		$mat_profile_imageoriginPath = public_path('uploadFiles/matrimonial_image/original');
		if(!is_dir($mat_profile_imagePath)){ mkdir($mat_profile_imagePath, 0755, true);  } 
		if(!is_dir($mat_profile_imagePath)){ mkdir($mat_profile_imageoriginPath, 0755, true);  } 
		$filename = md5(microtime()).'.'.$request->file('mat_profileImage')->getClientOriginalExtension();
		if(in_array( $request->file('mat_profileImage')->getClientOriginalExtension() , $this->imageArr )){
		   	 $image = Image::make($request->file('mat_profileImage')->getRealPath())->resize(361,220);
			 if($image->save($mat_profile_imagePath.'/'.$filename , 80)){
			     $request->file('mat_profileImage')->move($mat_profile_imageoriginPath  , $filename);
				 return $filename;
			   }
		}
		else{ return 100; }
	 }
	
	
	public function send_notifiation($notification_text , $notification_url , $image_url , $receiver_id , $admin_receiver){
           $dataArr = array("id"=>md5(uniqid().time()) , "receiver_id"=>$receiver_id , "admin_receiver"=>$admin_receiver , "image_url"=>$image_url , "notification_text"=>$notification_text , "notification_url"=>$notification_url , "created_at"=>time());
	  return VendorDetails::send_notification($dataArr);
        }
	 
	 public function send_notification_email($dataemailArr , $html_page ){
		   Mail::send('emails.'.$html_page, $dataemailArr, function ($message){
			 $message->from('info@kanpurize.com', 'Kanpurize vendor Registeration');
			 $message->to('vivek.gupta@kanpurize.com')->subject('New Shop Registeration !');
		   }); 
		return TRUE;
	 }
	
	
	public function check_device(){
                $useragent = $_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge
		|maemo|midp|mmp|netfront|opera m(ob|in)i|palm(
		os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows
		(ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a
		wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r
		|s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1
		u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp(
		i|ip)|hs\-c|ht(c(\-|
		|_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac(
		|\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt(
		|\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg(
		g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-|
		|o|v)|zz)|mt(50|p1|v
		)|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v
		)|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-|
		)|webc|whit|wi(g
		|nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		 {
		    return "M";
		 }
		else{
	            return "D";
	         } 
                   // header('Location: http://detectmobilebrowser.com/mobile');
         }
         
         public function shopcategoryIcon($request){
	  if(!empty($request->file('categoryIcon'))){
		 $fileName = time().$request->file('categoryIcon')->getClientOriginalName();
		 $imageName = str_replace(" ","-",$fileName);
	     $shopCategoryIconPath = public_path('uploadFiles/shopCategoryIcon');
		 if(!is_dir($shopCategoryIconPath)){ mkdir($shopCategoryIconPath, 0755, true);  }
	     $iconImage = Image::make($request->file('categoryIcon')->getRealPath())->resize(50, 50);
		 $iconImage->save($shopCategoryIconPath.'/'.$imageName,80);
		 return $imageName;
	   }
	  else{
	   	 $imageName = $request->categoryIconcopy; 
	   } 
	}
	
	
	public function upload_gallery_image($request){
	    $fileName = time().$request->file('image')->getClientOriginalName();
		$image = str_replace(" ","-",$fileName);
		$originalImgPath = public_path('uploadFiles/gallery');
		if(!is_dir($originalImgPath)){ mkdir($originalImgPath, 0755, true);  }
		$galleryImage = Image::make($request->file('image')->getRealPath())->resize(365,350);
		$galleryImage->save($originalImgPath.'/'.$image,80);
		return $image;
	}
	
	
	
	public function uploadComplainImage($request){
	  if($request->hasFile($request->input('image'))){
			   $complainImgPath = public_path('uploadFiles/complainFiles');
			   if(!is_dir($complainImgPath)){ mkdir($complainImgPath, 0755, true); }
				$fileName = time().$request->file('image')->getClientOriginalName();
				$image = str_replace(" ","-",$fileName);
				$request->file('image')->move($complainImgPath,$image);
				return $image;
			 }
		   else{ return ""; }	
	}
	
	
	
	public function uploadproductsImage($request){
	   $originalImgPath = public_path('uploadFiles/productsImg');
	   $thumbImgpath = public_path('uploadFiles/thumbsImg');
	   $frontImgPath = public_path('uploadFiles/productsImg/FrontImg');
	    if(!is_dir($originalImgPath)){ mkdir($originalImgPath, 0755, true); }
		if(!is_dir($thumbImgpath)){ mkdir($thumbImgpath, 0755, true); }
		if(!is_dir($frontImgPath)){ mkdir($frontImgPath, 0755, true); }
		 if(!empty($request->file("pImage"))){
		      if(!empty($request->fileCopy)){
				  $firstFile = $originalImgPath."/".$request->fileCopy;
				  $secondFile = $thumbImgpath."/".$request->fileCopy;
				  $thirdFile = $frontImgPath."/".$request->fileCopy;
				   if(file_exists($firstFile)){ unlink($firstFile); }
				   if(file_exists($secondFile)){ unlink($secondFile); }
				   if(file_exists($thirdFile)){ unlink($thirdFile); }
				}
			   $prImage = time().$request->file("pImage")->getClientOriginalName();	
			   $pImage = str_replace(" ","-",$prImage);
			   $thumb_img = Image::make($request->file("pImage")->getRealPath())->resize(80, 68);
			   $thumb_img->save($thumbImgpath.'/'.$pImage,80);
			   //front Image
			   $frontImg = Image::make($request->file("pImage")->getRealPath())->resize(300, 250);
			   $frontImg->save($frontImgPath.'/'.$pImage,80);
			   //originalImage
			   $originalImg = Image::make($request->file("pImage")->getRealPath())->resize(1225, 1000);
			   $originalImg->save($originalImgPath.'/'.$pImage,80);
			  return $pImage;
		   }
		 else{
		     return $request->fileCopy;
		   }  
	 }
	
	public function uploadOffersnews($request){
	  $offersNewsPath = public_path('uploadFiles/offersNews'); 
	  if(!is_dir($offersNewsPath)){ mkdir($offersNewsPath, 0755, true); }
	   	 if(!empty($request->file('newsofferImage'))){
	       $fileName = time().$request->file('newsofferImage')->getClientOriginalName();
		   $imageName = str_replace(" ","-",$fileName);
		   $offersNewsImage = Image::make($request->file('newsofferImage')->getRealPath())->resize(400, 200);
		   $offersNewsImage->save($offersNewsPath.'/'.$imageName,80);
		    if(!empty($request->input("imageCopy"))){
			    $previousFile = $offersNewsPath."/".$request->input("imageCopy");
	            if(file_exists($previousFile)){ unlink($previousFile); }
			  } 
			 return $imageName; 
		 }
		else{ 
		  return  $request->input("imageCopy"); 
		 }
	 }
	
	
	public function shopBannerImage($formData){
	    if(!empty($formData['bannerImage']->getClientOriginalName())){
             $fileName = rand(1,9999).$formData['bannerImage']->getClientOriginalName();
			  $ext = $formData['bannerImage']->getClientOriginalExtension();
			   if($ext=="jpg" || $ext=="jpeg" || $ext=="png"){
			       $imageName = str_replace(" ","-",$fileName);
				   $bannerImagePath = public_path('uploadFiles/shopBannerImage');
				  if(!is_dir($bannerImagePath)){ mkdir($bannerImagePath, 0755, true); }
					 $bannerImage = Image::make($formData['bannerImage']->getRealPath())->resize(2000, 600);
					   if($bannerImage->save($bannerImagePath.'/'.$imageName,80)){
						  $upShopprofileImage = $this->editVendorData(array("bannerImage"=>$imageName) , array("id"=>$formData['shopID']));
							if($upShopprofileImage != FALSE){
								  return json_encode(
										array(
										"success"=>"<span style='color:green;'>Banner Image Add Successfully...</span>",
										"vStatus"=>700
										));
								}
							 else{
								return json_encode(
								   array(
										"error"=>"Unexpected Try again..",
										"vStatus"=>500
									  ));
							   }    
						}
			   }
			   else{
			      return json_encode(
								   array(
										"error"=>"Unexpected Try again..",
										"vStatus"=>500
									  ));
			   }
          }
    } 
	
	
	public function saveShopLogoImage($formData){
	   if(!empty($formData['imageName'])){
		     $ext = $formData['frontImage']->getClientOriginalExtension();
			  if($ext=="jpg" || $ext=="jpeg" || $ext=="png"){
				   $fileName = rand(1,9999).$formData['frontImage']->getClientOriginalName();
				   $shopImage = str_replace(" ","-",$fileName);
				   $shopLogopath = public_path('uploadFiles/shopProfileImg');
				    $thumbImgpath = public_path('uploadFiles/shopProfileImg/thumbImg');
					 if(!is_dir($shopLogopath)){ mkdir($shopLogopath, 0755, true); }
		             if(!is_dir($thumbImgpath)){ mkdir($thumbImgpath, 0755, true); }
					  $shopLogo = Image::make($formData['frontImage']->getRealPath())->resize(750, 500);
					  $thumbImage = Image::make($formData['frontImage']->getRealPath())->resize(80,80);
			        if($shopLogo->save($shopLogopath.'/'.$shopImage,80)){
					     if($thumbImage->save($thumbImgpath.'/'.$shopImage,80)){
							$upShopprofileImage = $this->editVendorData(array("imageLogo"=>$shopImage) , array("id"=>$formData['shopID']));
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
	
	
	public function saveBusinessDetails($formData){
	  if(KnpPincodeModel::matchPincode(array("pincode"=>$formData['pincode'])) != FALSE){
	   /*--gst file upload start--*/
		$gstFilepath = public_path('uploadFiles/businessDetails/gstFile');
		$signaturePath = public_path('uploadFiles/businessDetails/signature');
		if(!is_dir($gstFilepath)){ mkdir($gstFilepath, 0755, true); }
		if(!is_dir($signaturePath)){ mkdir($signaturePath, 0755, true); }
		
		/*--gst file upload Start--*/
		if(empty($formData['dontGst'])){
			  if(!empty($formData['gstFile'])){
				   $gstfileName = time().$formData['gstFile']->getClientOriginalName(); 
				   $newgstFilepath = $formData['gstFile']->move($gstFilepath,$gstfileName);  
				   $dontGst = 'Y'; 
			   }
			  else{
				  $gstfileName =  $formData['gstfileCopy'];
				  $dontGst = 'Y';
			   }   
		    }
		      else{
		         $gstfileName = $formData['gstfileCopy'];
		         $dontGst = $formData['dontGst']; 
		   }
		 /*--gst file upload End--*/
			$whereClause = array("id"=>$formData['business_id']);
			$insertData = array("shop_username"=>$formData['shop_username'],"ownerName"=>$formData['bownerName'],"aboutBusiness"=>$formData['aboutBusiness'],"dontgst"=>$dontGst,"gstNumber"=>$formData['gstNumber'],"gstFile"=>$gstfileName,"gstProvisionalID"=>$formData['gstProvisionalID'],"panCardNumber"=>$formData['panNumber'],"address1"=>$formData['address1'],"address2"=>$formData['address2'],"address3"=>$formData['address3'],"pinCode"=>$formData['pincode'],"city"=>$formData['city'],"state"=>$formData['state'],"editDate"=>time(),"cbusinesStatus"=>"Y"); 
			 $updateDataResult = vendorbusinesDetails::editBusinessDetails($insertData,$whereClause); 
			  if($updateDataResult != FALSE){
				  return json_encode(
							array(
							"success"=>"<small style=color:#00cc66;><strong>Records Save Successfully.</strong></small>",
							"vStatus"=>200
							));
				}
				else{  
				   return json_encode(
							array(
							"fail"=>"<small style=color:red;><strong>Unexpected try again....</strong></small>",
							"vStatus"=>300
							));
				}	  
		 }
	   else{
		   return json_encode(
							array(
							"msg"=>"<small style='color:red;'><strong>We don't provide service in this Area .</strong></small>",
							"vStatus"=>100
							));
	     }	  
   
   }
	
	
	public function eventImageUpload($formData){
	  $originalImgPath = public_path('uploadFiles/EventImage');
	  $eventThumbImage = public_path('uploadFiles/EventImage/eventhumbImage');
	  if(!empty($formData['image'])){
		  if(!empty($formData['imageCopy'])){
			 $filePath = $originalImgPath."/".$formData['imageCopy'];
			 $filethumbPath = $eventThumbImage."/".$formData['imageCopy'];
			 if(file_exists($filePath)){ unlink($filePath); }
			 if(file_exists($filethumbPath)){ unlink($filethumbPath); }
			}
		  $fileName = time().$formData['image']->getClientOriginalName();
		  $image = str_replace(" ","-",$fileName);
		  $extension = $formData['image']->getClientOriginalExtension();
		   //print_r($extension);exit;
		   if($extension =="jpeg" || $extension=="png" || $extension=="jpg"){ 	
		     $eventthumbImage = Image::make($formData['image']->getRealPath())->resize(361,220);
			 $eventthumbImage->save($eventThumbImage.'/'.$image,80);
			 $fullImage = Image::make($formData['image']->getRealPath())->resize(1024,512);
			 if($fullImage->save($originalImgPath.'/'.$image,80)){
			    return $image;
			  }
			}
		   else{ return 100;
			}	
		}
	   else{
		  return $formData['imageCopy'];
		}	
	}
	
	public function postAdvertisementPhoto($formData){
	   $vAdspostPath = public_path('uploadFiles/vendorAdspost');
	   $vthumbsAdspostPath = public_path('uploadFiles/vthumbsAdspost');
		if(!is_dir($vAdspostPath)){ mkdir($vAdspostPath, 0755, true); }
		if(!is_dir($vthumbsAdspostPath)){ mkdir($vthumbsAdspostPath, 0755, true); }
	   if(!empty($formData['postImage'])){
		   if(!empty($formData['imageNameCopy'])){
		     $filePath = $vAdspostPath."/".$formData['imageNameCopy'];
			 $filethumbPath = $vthumbsAdspostPath."/".$formData['imageNameCopy'];
			 if(file_exists($filePath)){ unlink($filePath); }
			 if(file_exists($filethumbPath)){ unlink($filethumbPath); }
		    }
		   $fileName = rand(1,9999).$formData['postImage']->getClientOriginalName();
	       $imageName = str_replace(" ","-",$fileName);
	       $adsRealSize = Image::make($formData['postImage']->getRealPath())->resize(2000, 600);
	       $thumbsAdsRealSize = Image::make($formData['postImage']->getRealPath())->resize(400, 200);
	       $thumbsAdsRealSize->save($vthumbsAdspostPath.'/'.$imageName,80);
		   if($adsRealSize->save($vAdspostPath.'/'.$imageName,80)){
			  return $imageName;
		   }	
		 }
	   else{
		   return $formData['imageNameCopy']; 
		 }	 
	}
	
	public function BlogImageUpload($formData){
	  //$originalImgPath = public_path('uploadFiles/blogImage');
	  $eventThumbImage = public_path('uploadFiles/blogImage/blogImagethumb');
	  $original_image_path = public_path('uploadFiles/blogImage/original_image');
	  //if(!is_dir($originalImgPath)){ mkdir($originalImgPath, 0755, true); }
	  if(!is_dir($eventThumbImage)){ mkdir($eventThumbImage, 0755, true); }
	  if(!is_dir($original_image_path)){ mkdir($original_image_path, 0755, true); }
	  
	  if(!empty($formData['image'])){
		  if(!empty($formData['imageCopy'])){
			 //$filePath = $originalImgPath."/".$formData['imageCopy'];
			 $filethumbPath = $eventThumbImage."/".$formData['imageCopy'];
			 $fileoriginal = $original_image_path."/".$formData['imageCopy'];			 
			 //if(file_exists($filePath)){ unlink($filePath); }
			 if(file_exists($fileoriginal )){ unlink($fileoriginal ); }
			 if(file_exists($filethumbPath)){ unlink($filethumbPath); }
			}
		  $fileName = time().$formData['image']->getClientOriginalName();
		  $image = str_replace(" ","-",$fileName);
		  $extension = $formData['image']->getClientOriginalExtension();
		   //print_r($extension);exit;
		   if($extension =="jpeg" || $extension=="png" || $extension=="jpg"){ 	
		     $eventthumbImage = Image::make($formData['image']->getRealPath())->resize(361 , 220);
			 $eventthumbImage->save($eventThumbImage.'/'.$image,80);
			 //$fullImage = Image::make($formData['image']->getRealPath())->resize(350,200);
			 $formData['image']->move($original_image_path  , $image);
			 return $image;
			}
		   else{
			  return 100;
			}	
		}
	   else{
		  return $formData['imageCopy'];
		}	
	}	
	
	
	public function encrypt($string, $key=5) {
		$result = '';
		for($i=0, $k= strlen($string); $i<$k; $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)+ord($keychar));
			$result .= $char;
		}
	    return base64_encode($result);
     }
     
	public function decrypt($string, $key=5) {
	   $result = '';
	   $string = base64_decode($string);
		for($i=0,$k=strlen($string); $i< $k ; $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		return $result;
      }
      
      
      public function share_webshop_url($businessCategory , $username){
	      $username_share  = base64_encode($username);
		 switch($businessCategory){
		    case 1:
			return url("goods_Shop/$username_share");
			break;
			
			case 2:
			return url("services_shop/$username_share");
			break;
			
			case 3;
			return url("goods_services/$username_share");
			break;
			
			default:
			return FALSE;
		  }
	  }
    
	

}
