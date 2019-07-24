<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
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
use Image; 
use App\ProductAttribueTable;
use Intervention\Image\Exception\NotReadableException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\KnpShopImage;
use App\ProductSaveOffer;
use App\OfferNewsModel;


class ProductsController extends Controller{
    
	public function productsInOffers($offerID,$title){
	   $data['title'] = "Products Details";
	   if(!empty($offerID)){
		   $offersID = base64_decode($offerID);
		   $data['productsResult'] = ProductSaveOffer::getproductsInOfferforFront(array("offersandnews_id"=>$offersID));
		   $data['offerDetails'] = OfferNewsModel::getvoffersNews("1",base64_decode($offerID));
		   //echo "<pre>";
		   //print_r($data['offerDetails']);exit;
		   return view("kanpur.productsInofeers")->with($data);
		 }
	    else{
		   return redirect("kanpurizeMarketplace");
		 }	 
	 } 
	
	
	public function permanentDeleteProducts(){
	    if(!empty($_GET['productsID'])){
		     $productsObj = new Products;
			 $productsData = Products::where(array("id"=>$_GET['productsID']))->first();
			 $image = $productsData->pImage;
			  $originalImgPath = public_path('uploadFiles/productsImg');
		      $thumbImgpath = public_path('uploadFiles/thumbsImg');
		      $frontImgPath = public_path('uploadFiles/productsImg/FrontImg');
				  $firstFile = $originalImgPath."/".$image;
			      $secondFile = $thumbImgpath."/".$image;
				  $thirdFile = $frontImgPath."/".$image;
			       if(file_exists($firstFile)){ unlink($firstFile); }
			       if(file_exists($secondFile)){ unlink($secondFile); }
				   if(file_exists($thirdFile)){ unlink($thirdFile); }
			 $ProductsAttribute = ProductAttribueTable::pAttribute(array("products_id"=>$_GET['productsID']));
			 if($ProductsAttribute != FALSE){
			     $deleteResult = ProductAttribueTable::deleteProductsAttr($ProductsAttribute);
			   }
			 $productsMoreimage = ProductsImageModel::getImage($_GET['productsID']);
			 if($productsMoreimage != FALSE){
				 foreach($productsMoreimage as $imageArr){
				       $firstMoreimg = $originalImgPath."/".$imageArr->image;
			           $secondMoreimg = $thumbImgpath."/".$imageArr->image;
				       $thirdMoreimg = $frontImgPath."/".$imageArr->image;
					   if(file_exists($firstFile)){ unlink($firstMoreimg); }
					   if(file_exists($secondFile)){ unlink($secondMoreimg); }
					   if(file_exists($thirdFile)){ unlink($thirdMoreimg); }
					   ProductsImageModel::deleteProductsImage($imageArr->id);
				   }
			   }
			 //echo"<pre>";
			 //print_r($delProductsAttribute);exit;
             $deleteRecord = $productsObj->realdelete($_GET['productsID']);
			 if($deleteRecord != FALSE){ echo 1;  }
			 else{ echo 2; } 
		 } 
		 else{
		    echo"Unexpected try again....";
		  }
	}
	
	public function restoreTrashProducts(){
	   $lastVendorID = session()->get('lastVendorID');
	   $productsID = $_GET['productsID'];
	    if(!empty($productsID)){
		     $productsObj = new Products;
			  $data = array("trash"=>$_GET["trashstatus"]);
			 $conDition = array("id"=>$productsID);
             $deleteRecord = $productsObj->deleteProducts($data,$conDition);
			if($deleteRecord != FALSE){
				 echo 1;
			   }
			  else{
				echo 2;
			  } 
		 } 
		 else{
		    echo"Unexpected try again....";
		  }
	}
	
	public function trashProductsFolder(){
	    $data['title'] = "Trash foder for products";
		 if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
			 $data['vresultData'] = VendorDetails::getSingleShopDetails();
			 $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
			 $productsObj = new Products;
			 $data['productList'] = Products::gettrashProducts(array("shopID"=>session()->get('lastVendorID')));
			 $data['goodsshopcategoryList'] = Shop_categoryModel::getgoodShoplist($data['vresultData']->categoryType);
			 return view("vendor.trashproductList")->with($data);
	 }
	
	
	
	
	
	
	public function editProductsImage(Request $request){
 	   if(!empty($request->input('imgnameCopy')) || !empty($request->input('editID'))){
		  //print_r($request->input('imgnameCopy'));
		     if($request->hasFile($request->input('imgInp1'))){
				       $fileName = rand(1,9999).$request->file('imgInp1')->getClientOriginalName();
					     $pImage = str_replace(" ","-",$fileName);
						  $originalImgPath = public_path('uploadFiles/productsImg');
		                  $thumbImgpath = public_path('uploadFiles/thumbsImg');
		                  $frontImgPath = public_path('uploadFiles/productsImg/FrontImg');
						  //thumbImage upload
						  $thumb_img = Image::make($request->file('imgInp1')->getRealPath())->resize(80, 68);
			              $thumb_img->save($thumbImgpath.'/'.$pImage,80);
						  //FrontImage upload
						  $frontImg = Image::make($request->file('imgInp1')->getRealPath())->resize(300, 250);
			              $frontImg->save($frontImgPath.'/'.$pImage,80);
						  //original products image
						  $originalImg = Image::make($request->file('imgInp1')->getRealPath())->resize(1225, 1000);
			              $originalImg->save($originalImgPath.'/'.$pImage,80);
			            //$newFilePath = $request->file('pImage')->move($newPath,$pImage);
						$result = ProductsImageModel::editProductsImage($request,$pImage);
						if($result != FALSE){ 
						   $firstFile = $originalImgPath."/".$request->input('imgnameCopy');
			               $secondFile = $thumbImgpath."/".$request->input('imgnameCopy');
				           $thirdFile = $frontImgPath."/".$request->input('imgnameCopy');
			                if(file_exists($firstFile)){ unlink($firstFile); }
			                if(file_exists($secondFile)){ unlink($secondFile); }
				            if(file_exists($thirdFile)){ unlink($thirdFile); }
							echo 1;
						 }
						else{ echo 2; }  
				}
			  else{ echo "<p style='color:red;'>Image must be required....</span>"; }	
		 } 
	}
	
	public function deleteProductsImage(Request $request){
	  if(!empty($request->input('deleteID')) || !empty($request->input('imageCopyName'))){
		  $result = ProductsImageModel::deleteProductsImage($request->input('deleteID'));
		  if($result != FALSE){
		        $originalImgPath = public_path('uploadFiles/productsImg');
		        $thumbImgpath = public_path('uploadFiles/thumbsImg');
		        $frontImgPath = public_path('uploadFiles/productsImg/FrontImg');
				  $firstFile = $originalImgPath."/".$request->input('imageCopyName');
			      $secondFile = $thumbImgpath."/".$request->input('imageCopyName');
				  $thirdFile = $frontImgPath."/".$request->input('imageCopyName');
			       if(file_exists($firstFile)){ unlink($firstFile); }
			       if(file_exists($secondFile)){ unlink($secondFile); }
				   if(file_exists($thirdFile)){ unlink($thirdFile); }
				    echo 1;
		   } 
		  else{  echo 2; }
	   }
	   else{ echo 2; }	
    }
	
	
}
