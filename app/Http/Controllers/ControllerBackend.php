<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Image; 

class ControllerBackend extends BaseController{
	
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	
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
		   else{
			  return 100;
			}	
		}
	   else{
		  return $formData['imageCopy'];
		}	
	}
	
	public function BlogImageUpload($formData){
	  $originalImgPath = public_path('uploadFiles/blogImage');
	  $eventThumbImage = public_path('uploadFiles/blogImage/blogImagethumb');
	  if(!is_dir($originalImgPath)){ mkdir($originalImgPath, 0755, true); }
	  if(!is_dir($eventThumbImage)){ mkdir($eventThumbImage, 0755, true); }
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
			 $fullImage = Image::make($formData['image']->getRealPath())->resize(760,750);
			 if($fullImage->save($originalImgPath.'/'.$image,80)){
			    return $image;
			  }
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
    
	

}
