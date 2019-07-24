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
use App\Shop_categoryModel;
use Session;
use App\VendorDetails;
use App\VservicesModel;
use Auth;
use Mail;
use App\OfferNewsModel;
use App\KnpShopImage;
use App\WishList;
use App\GalleryModel;
use Image; 


class GalleryController extends Controller{
  
  public function deleteImageGallery(){
	   if(!empty($_GET['id'])){
		 //echo"yes";exit;
		  $imageArr = GalleryModel::where(array("id"=>$_GET['id']))->first();
		  $filepath = public_path('uploadFiles/gallery');
		  $firstFile = $filepath."/".$imageArr->image;
		  if(file_exists($firstFile)){ unlink($firstFile); }
	    $result = GalleryModel::deleteRecord($_GET['id']);
		if($result != FALSE){ echo 1; }
		else{ echo 2; }
		 
	   }
   }
  
  
  public function imageGalleryList(){
		$data['title'] = "Gallery Image list";
		if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }	
	        $data['vresultData'] = VendorDetails::getSingleShopDetails();
		$data['imageListArr'] = GalleryModel::GalleryList(array("vendordetails_id"=>session()->get('lastVendorID')));
		//echo"<pre>";
		//print_r($data['imageListArr']);exit;
		return view("vendor.galleryImageList")->with($data);
   }
   
    
  public function uploadGallery(){
		$data['title'] = "Gallery";
		if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }	
	        $data['vresultData'] = VendorDetails::getSingleShopDetails();
		//echo"<pre>";
		//print_r($data['vresultData']);exit;
		return view("vendor.gallery")->with($data);
   }
   
   public function uploadGalleryImage(Request $request){
		if($request->hasFile($request->input('image'))){
		    $fileName = rand(1,9999).$request->file('image')->getClientOriginalName();
			$image = str_replace(" ","-",$fileName);
			$originalImgPath = public_path('uploadFiles/gallery');
			 if(!is_dir($originalImgPath)){
                            mkdir($originalImgPath, 0755, true);
                            }
			$galleryImage = Image::make($request->file('image')->getRealPath())->resize(365,350);
			$galleryImage->save($originalImgPath.'/'.$image,80);
			$result = GalleryModel::uploadGallery($request->all(),$image);
		    if($result != FALSE){ 
			  echo 1;
			 }else{ echo 2; }
		 }
		else{
		   echo"<strong>image must be required </strong>.";
		 } 
   }
   
   	
}
