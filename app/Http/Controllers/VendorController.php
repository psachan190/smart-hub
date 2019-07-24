<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
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


class VendorController extends Controller{
   
 	 public function __construct(){
        //$this->middleware('auth');
        //$this->middleware('log', ['only' => ['fooAction', 'barAction']]);
        //$this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
     }
  
   public function dispatchedUserOrder(){
	  $data['title'] = "Dispatched User Order List";
	  if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }	
	   $data['vresultData'] = VendorDetails::getSingleShopDetails();
	    $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
	   $data['orderList'] = Order::getOrder(array("vendordetails_id"=>session()->get('lastVendorID'),"orderStatus"=>"D","userOrderstatus"=>"Y"));
	   return view("vendor.dispatchedUserOrder")->with($data);
	}
	
  public function cancelUserOrder(){
	  $data['title'] = "User Order List";
	  if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }	
	   $data['vresultData'] = VendorDetails::getSingleShopDetails();
	    $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
	   $data['orderList'] = Order::getOrder(array("vendordetails_id"=>session()->get('lastVendorID'),"orderStatus"=>"C","userOrderstatus"=>"Y"));
	   return view("vendor.cancelUserOrderList")->with($data);
	}
	
	public function confirmUserOrder(){
	  $data['title'] = "User Order List";
	  if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }	
	   $data['vresultData'] = VendorDetails::getSingleShopDetails();
	    $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
	   $data['orderList'] = Order::getOrder(array("vendordetails_id"=>session()->get('lastVendorID'),"orderStatus"=>"D","userOrderstatus"=>"Y"));
	   return view("vendor.confirmUserOrder")->with($data);
	}
  
  public function orderList(){
	  $data['title'] = "User Order List";
	  if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }	
	   $data['vresultData'] = VendorDetails::getSingleShopDetails();
	    $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
	   $data['orderList'] = Order::getOrder(array("vendordetails_id"=>session()->get('lastVendorID'),"orderStatus"=>"N","userOrderstatus"=>"Y"));
	   return view("vendor.orderList")->with($data);
	  
	}
  public function completeOrder(){
	   $data['title'] = "User Order List";
	  if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }	
	   $data['vresultData'] = VendorDetails::getSingleShopDetails();
	   $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
	   $data['orderList'] = Order::getOrder(array("vendordetails_id"=>session()->get('lastVendorID'),"orderStatus"=>"R","userOrderstatus"=>"Y"));
	   return view("vendor.completeOrder")->with($data);
	}
  
  public function editService($serviceID){
      $data['title'] = "Edit Services | Seller Hub";
	  if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
	  if(!empty($serviceID)){
		   $sID = base64_decode($serviceID);
		   $data['vresultData'] = VendorDetails::getSingleShopDetails();
		   $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
		   $vdata = array("vendorShopID"=>session()->get('lastVendorID'),
					      "user_id"=>session()->get('knpUser_id'));
		   $data['editServiceList'] = VservicesModel::getServicesDetails($vdata);
		   $data['serviceDetails'] = VservicesModel::getServicesDetails($vdata,$sID);
		   return view("vendor.editServiceDetails")->with($data);  
		}
	  else{  return redirect()->back(); }	
   }
  
  public function vendorServicelist(){
        $data['title'] = "Services List";
	    if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		 $data['vresultData'] = VendorDetails::getSingleShopDetails();
		 $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
		 $data['serviceShop'] = Shop_categoryModel::getserviceShoplist($data['vresultData']->categoryType);
		 $vdata = array("vendorShopID"=>session()->get('lastVendorID'),
					  "user_id"=>session()->get('knpUser_id'));
	     $data['serviceList'] = VservicesModel::getServicesDetails($vdata);
		 return view("vendor.serviceList")->with($data);	
   }
  
  
   public function vendorAddServices($shopName,$shopID){
     $data['title'] = "Add Services";
	 if(!empty($shopName) || !empty($shopID)){
		     $category = base64_decode($shopID);
	         $shopObj = new Shop_categoryModel;
			 $data['shopDetails'] = $shopObj->getShopcat("default",$category);
			 if($data['shopDetails']->bType ==2){
			 $data['vresultData'] = VendorDetails::vendorShopList();
					 $category_type = $data['vresultData']->categoryType;
					 $shopObj = new Shop_categoryModel;
					 $data['serviceShop'] = $shopObj->getserviceShoplist($category_type);
					 return view("vendor.addServices")->with($data);
			  }
	   }
	  else{
		 return redirect()->back();	
		} 
   }

  public function addServices(Request $request){
	   if(!empty($request->input("myTextarea"))){
		   if(!empty($request->input("myTextarea1"))){
			   if(!empty($request->input("myTextarea3"))){
			       if(!empty($request->input("infoMobile"))){
			            if(!empty($request->input("timing"))){
			                if(!empty($request->input("wealyOFF"))){
			                    $duplicateData = VservicesModel::getServices($request->all());
								 if($duplicateData == FALSE){
									  $result = VservicesModel::addServices($request->all());
									   if($result != FALSE){
										   echo"yes"; 
										  } 
									   else{
										 echo"error"; 
										  }
									}
								 else{
									   echo"duplicate";
									}	
			                 }
		                    else{
			                  echo 6;
			                 }
			              }
		                else{
			             echo 5;
			              }
			          }
		           else{
			           echo 4;
			         }
			     }
		       else{
			    echo 3;
			    }
			 }
		    else{
			    echo 2;
			}	 
		 } 
	   else{
		   echo 1;
		 }	   
	}
  
  public function uploadImageAction(Request $request){
	   $data['title'] = "Upload Image Action";
		if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }	
		   $v = array("shopID"=>"required","productsID"=>"required","knpUser_id"=>"required",
				 "proImage" =>"required",); 
	   $this->validate($request,$v);
	   $formData = $request->all("proImage");
	   $pImageobj = new ProductsImageModel;
	    $originalImgPath = public_path('uploadFiles/productsImg');
		$thumbImgpath = public_path('uploadFiles/thumbsImg');
		$frontImgPath = public_path('uploadFiles/productsImg/FrontImg');
	   foreach($formData['proImage'] as $pro){
		     $fileName = rand().time().$pro->getClientOriginalName();
		     $pImage = str_replace(" ","-",$fileName);
			 //thumbs image
			 $thumb_img = Image::make($pro->getRealPath())->resize(80, 68);
			 $thumb_img->save($thumbImgpath.'/'.$pImage,80);
			 //front Image
			 $frontImg = Image::make($pro->getRealPath())->resize(300, 250);
			 $frontImg->save($frontImgPath.'/'.$pImage,80);
			 //originalImage
			 $originalImg = Image::make($pro->getRealPath())->resize(1225, 1000);
			 $originalImg->save($originalImgPath.'/'.$pImage,80);
		     $result = ProductsImageModel::addpImage($pImage,$originalImgPath,$thumbImgpath,$formData);
		  }
	     if($result != FALSE){
			 $err = "Image Add Successfully...";
		      session()->flash('msg',"<p class='alert alert-info'>$err</style>");
		     return redirect()->back()->with('success', array('your message,here'));  
		   }
		 else{
		   }  	  
	}
  
   
  public function uploadMoreimage(){
       $data['title'] = "Products  Image Upload";
	   if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
	   if(isset($_GET['productsid'])){
		   if(isset($_GET['kanpurizeShop'])){
			    $shopID = base64_decode($_GET['kanpurizeShop']);
				$data['productsID'] = base64_decode($_GET['productsid']);
				if($shopID == session()->get('lastVendorID')){
					$data['vresultData'] = VendorDetails::getSingleShopDetails();
					$data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
					$data['productsImage'] = ProductsImageModel::getImage($data['productsID']);
					return view("vendor.uploadproductsImage")->with($data);
				  }
				else{ $err = "Unexpected Try again...."; }   
			  }
		   else{ $err="Unexpected try again..."; }	  
		 }
	    else{ $err="Unexpected try again..."; }
	   if(isset($err)){
		   session()->flash('msg',"<p class='alert alert-info'>$err</style>");
		   return redirect()->back()->with('success', array('your message,here')); 
		  }	  	   
   }
  
  
  public function productsDetails(){
        $data['title'] = "Vendor Ads Post";
		if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
	   if(isset($_GET['productsid'])){
		   if(isset($_GET['kanpurizeShop'])){
			   $productsID = base64_decode($_GET['productsid']); 
			   $kanpurizeShop = base64_decode($_GET['kanpurizeShop']); 
			   if(empty($productsID) || empty($kanpurizeShop) || session()->get('lastVendorID')==$kanpurizeShop){
				    $data['vresultData'] = VendorDetails::getSingleShopDetails();
					$data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
				      //$productsObj = new Products;
		              $data['productsDetails'] = Products::getProducts(session()->get('lastVendorID'),$productsID);
					  $data['productsImage'] = ProductsImageModel::getImage($productsID);
					  return view("vendor.productsDetails")->with($data);
				  }
			    else{
				   return redirect()->back();	
				 }	  
			}
			else{
			    return redirect()->back();	
			}
		 }
	   else{
		  return redirect()->back();
		 }	 
   }
  
  public function editProductAction(Request $request){
	 if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
	   $lastID = session()->get('lastVendorID');
	   $v = array("shopID"=>"required","user_id"=>"required","category"=>"required","productName"=>"required",
				 "listprice"=>"required","salePrice"=>"required","quantity"=>"required","stockWarning"=>"required",
				 "pStatus"=>"required", "myTextarea"=>"required");
        $this->validate($request,$v);
			if(empty($request->file("pImage"))){
			    $pImage =  $request->input("fileCopy");   
			 }
			else{
			    $prImage = $request->file("pImage")->getClientOriginalName();
				   $prImagecopy =  $request->input("fileCopy");
				     
			    $originalImgPath = public_path('uploadFiles/productsImg');
		        $thumbImgpath = public_path('uploadFiles/thumbsImg');
		        $frontImgPath = public_path('uploadFiles/productsImg/FrontImg');
				  $firstFile = $originalImgPath."/".$prImagecopy;
			      $secondFile = $thumbImgpath."/".$prImagecopy;
				  $thirdFile = $frontImgPath."/".$prImagecopy;
			       if(file_exists($firstFile)){ unlink($firstFile); }
			       if(file_exists($secondFile)){ unlink($secondFile); }
				   if(file_exists($thirdFile)){ unlink($thirdFile); }
				 $pImage = str_replace(" ","-",$prImage);
				 $thumb_img = Image::make($request->file("pImage")->getRealPath())->resize(80, 68);
			       $thumb_img->save($thumbImgpath.'/'.$pImage,80);
			       //front Image
			       $frontImg = Image::make($request->file("pImage")->getRealPath())->resize(300, 250);
			       $frontImg->save($frontImgPath.'/'.$pImage,80);
			       //originalImage
			       $originalImg = Image::make($request->file("pImage")->getRealPath())->resize(1225, 1000);
			       $originalImg->save($originalImgPath.'/'.$pImage,80);
		  	}
		  
		   $editResult = Products::editProducts($request,$pImage);
			$editAtrributeResult=1;
			if($editResult != FALSE){
			   if(!empty($request->input("productattribute"))){
			   $editAtrributeResult = ProductAttribueTable::editAttribute($request->all(),$editResult);
			   }
			   //echo"<pre>";
			   //print_r($editAtrributeResult);exit;
			 }
			if($editAtrributeResult != FALSE){ $msg = "<span style='color:green;'><strong>Products Edit Successfully...</strong></span>"; }
			else{  $msg = "<span style='color:red;'><strong>Unexpected Try again....</strong></span>"; }  
	    if(isset($msg)){
			session()->flash('msg',"$msg");
		    return redirect()->back()->with('success', array('your message,here')); 
		  } 
   }
  
  public function editProducts(){
        $data['title'] = "Edit Products";
		if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		if(isset($_GET['productsid'])){
	    if(isset($_GET['kanpurizeShop'])){
			$productsID = base64_decode($_GET['productsid']);
		     $shopID = base64_decode($_GET['kanpurizeShop']);
		     if($shopID==session()->get('lastVendorID')){
				 $data['vresultData'] = VendorDetails::getSingleShopDetails();
				  $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
				 $productsObj = new Products;
		         $data['productsData'] = $productsObj->getProducts(session()->get('lastVendorID'),$productsID);
				 $data['productsAttribute'] = ProductAttribueTable::getProductsAttribute($productsID);
				   //echo"<pre>";
				   //print_r($data['productsData']);exit;
				  $shopObj = new Shop_categoryModel;
				  $data['goodsshopcategoryList'] = $shopObj->getgoodShoplist($data['vresultData']->categoryType);
				  $data['shopcatData'] = $shopObj->getShopcatlist($data['productsData']->knp_shopcategory_id);
				   if(count($data['productsData']) >0){
					  return view("vendor.editProducts")->with($data);
					  }
				    else{ return redirect()->back(); }	 
			   }
			 else{ return redirect()->back(); }  
		  } 
	  }
   }
  
    public function productsList(){
	    $data['title'] = "Vendor Dashboard";
		 if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		 if(isset($_GET['shopID'])){
			 if(session()->get('lastVendorID')==$_GET['shopID']){
                if(isset($_GET['category'])) $catID = $_GET["category"]; 
				 $data['vresultData'] = VendorDetails::getSingleShopDetails();
				 $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
				 $productsObj = new Products;
				 $data['productList'] = Products::getProducts(array("shopID"=>session()->get('lastVendorID'),"catID"=>$catID));
				 $data['goodsshopcategoryList'] = Shop_categoryModel::getgoodShoplist($data['vresultData']->categoryType);
				 return view("vendor.productList")->with($data);
			   }
			 else{
			    return redirect()->back();	
			  }   
		  }
		 else{
		   return redirect()->back();
		  } 
   }
   
 
  public function addProductAction(Request $request){
        $data['title'] = "Add Products";
 		if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		$v = array(
	             "vendordetails_id"=>"required",
				 "category"=>"required",
				 "subCategory"=>"required",
				 "users_id"=>"required",
				 "knp_shopcategory_id"=>"required",
				 "category"=>"required",
				 "productName"=>"required",
				 "salePrice"=>"required",
				 "quantity"=>"required",
				 "stockWarning"=>"required",
				 "pStatus"=>"required",
				 "myTextarea"=>"required",
				 "pImage" =>"required|mimes:jpeg,jpg,png",
			   ); 
	    $this->validate($request,$v);
	   if(!empty($request->category)){
		 if(!empty($request->subCategory)){   
			$shopID = $request->input("vendordetails_id");
			$shopCatID = $request->input("knp_shopcategory_id");
			$shopName = $request->input("shopName");
			 if($shopID == session()->get('lastVendorID')){
			   if($request->hasFile($request->input('pImage'))){
				   $ext = $request->file('pImage')->getClientOriginalExtension(); 
					    $fileName = rand(1,9999).$request->file('pImage')->getClientOriginalName();
						$pImage = str_replace(" ","-",$fileName);
						  //$newPath = public_path('uploadFiles/productsImg');
						  //$thumbImgpath = public_path('uploadFiles/thumbsImg');
			              $originalImgPath = public_path('uploadFiles/productsImg');
		                  $thumbImgpath = public_path('uploadFiles/thumbsImg');
		                  $frontImgPath = public_path('uploadFiles/productsImg/FrontImg');
						  
						  //thumbImage upload
						  $thumb_img = Image::make($request->file('pImage')->getRealPath())->resize(80, 68);
			              $thumb_img->save($thumbImgpath.'/'.$pImage,80);
						  //FrontImage upload
						  $frontImg = Image::make($request->file('pImage')->getRealPath())->resize(300, 250);
			              $frontImg->save($frontImgPath.'/'.$pImage,80);
						  //original products image
						  $originalImg = Image::make($request->file('pImage')->getRealPath())->resize(1225, 1000);
			              $originalImg->save($originalImgPath.'/'.$pImage,80);
						  
			            //$newFilePath = $request->file('pImage')->move($newPath,$pImage);
						$result = Products::addProducts($request->all(),$pImage);
						$product_id = $result;
						if(count($request->productattribute) >0){
						foreach($request->productattribute as $key=>$val){
							if($request->value[$val] != ''){
								$product_attribue = new ProductAttribueTable;
								$product_attribue->products_id = $product_id;
								$product_attribue->productsattribute_id = $val;
								$product_attribue->value = $request->value[$val];
								$product_attribue->save();
							}
						}
					  }
						if($result != FALSE){
						   $err="One Products Add Successfully,....";
						  }
						else{
							$err="Unexpected !!! Try again....";
						  }  
				} else{ $err = "Image must be required...."; }	
		     }  else{ $err="Unexpected !!! Try again...."; }
		 }else{ $err="Sub category is required"; }
	   }
	   else{
		     $err = "Category is required....";
		   }
		
		if(isset($err)){
			session()->flash('msg',"<p class='alert alert-info'>$err</style>");
		   return redirect()->back()->with('success', array('your message,here'));  
		  }   
    }
  
 
   public function addProducts(){
	    $data['title'] = "Add Products";
	   if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		 if(isset($_GET['shop'])){
			  $shoplastID = $_GET['shop'];
			   if(session()->get('lastVendorID') == $shoplastID){
				   if(isset($_GET['category'])){
					  $category = $_GET['category'];
					  $shopObj = new Shop_categoryModel;
					  $data['shopDetails'] = Shop_categoryModel::getShopcat("default",$category);
					  $data['vresultData'] = VendorDetails::getSingleShopDetails();
					  $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
					   if($data['shopDetails']->bType==2){
						    $data['serviceShop'] = $shopObj->getserviceShoplist($data['vresultData']->categoryType);
							 return view("vendor.addServices")->with($data);
						  }
					   else{
							$categoryList = Shop_categoryModel::getShopcatlist($category);
							$authCategory = VendorCatAuthority::authCatList(session()->get('lastVendorID'),$category);
							 if($authCategory != FALSE){
							     $data['shopcatData'] = array_merge_recursive($categoryList,$authCategory);
							   }
							  else{
							     $data['shopcatData'] = $categoryList;
							   } 
							$data['goodsshopcategoryList'] = $shopObj->getgoodShoplist($data['vresultData']->categoryType);
                            return view("vendor.addProducts")->with($data);
						  }	  
					 }
					 else{
					   return redirect()->back();
					  }	 
				  }
				else{
				   return redirect()->back();
				}  
			}
		 else{
			  return redirect()->back();
			}	
  }	
  
  
  
  
   public function byCategory(){
	    $data['title'] = "Kanpurize Seller Hub";
	    if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		if(isset($_GET['shops'])){
		    $shops = $_GET['shops'];
			$lastID = session()->get('lastVendorID');
			if($shops != $lastID){
			    return redirect()->back(); 
			  }
			else{ 
			  $data['vresultData'] = VendorDetails::getSingleShopDetails();
			  $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
			   $shoptblObj = new Shop_categoryModel;
			   if($data['vresultData']->businesscategoryType==2){
				    $data['resultData'] = $shoptblObj->getserviceShoplist($data['vresultData']->categoryType);
				 }
			   else{
				    $data['resultData'] = $shoptblObj->getgoodShoplist($data['vresultData']->categoryType);
				 }	 
			    return view("vendor.vendorSelect_category")->with($data);
			 }  
		  } 
		 else{
			  return redirect()->back(); 
		 } 
  }
  
  public function ServicesShopList(){
	    $data['title'] = "Kanpurize Seller Hub";
		if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		if(isset($_GET['shops'])){
		    $shops = $_GET['shops'];
			if($shops != session()->get('lastVendorID')){
			    return redirect()->back(); 
			  }
			else{ 
			  $data['vresultData'] = VendorDetails::getSingleShopDetails();
			  $data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
			  $category_type = $data['vresultData']->categoryType;
			   $shoptblObj = new Shop_categoryModel;
			   $data['resultData'] = $shoptblObj->getserviceShoplist($category_type);
			   return view("vendor.vendorServicesCategory")->with($data);
			 }  
		  } 
		 else{
			  return redirect()->back(); 
		 } 
  }
  
  
  public function vendorDashboard(){
	 $data['title'] = "Vendor Dashboards";
	 if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
		if(isset($_GET['vendorRefID'])){
		   $lastvendorID = $_GET['vendorRefID'];
			if($lastvendorID != session()->get('lastVendorID')){ return redirect()->back();  }
		  }
		$data['vresultData'] = VendorDetails::vendorShopList();
		$data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
		$data['selectedPaymentMode'] = ShopSetting::getAuthority(session()->get('lastVendorID'));
		$data['shareID'] = base64_decode($data['vresultData']->id);
		$data['shareName'] = str_replace(" ","_",$data['vresultData']->vName);
		return view("vendor.vendorDashboard")->with($data);
  }
  
  public function selectCategory($bType,$lastShopID){
        $data['title'] = "Select Category";
		  if(!empty($bType)){
	           if(session()->get('busineestType')==$bType){
				   if(session()->get('lastVendorID') == base64_decode($lastShopID)){
					$data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
				        $data['resultData'] = Shop_categoryModel::getShopcat($bType);
					   //echo"<pre>";
					   //print_r($data['resultData']);exit;
				   }
				   else{ return redirect()->back();  }	 
				 }
			   else{
				  return redirect()->back(); 
				 }	 
            }
		   else{ return redirect()->back();  } 	
	  return view("kanpur.selectCategory")->with($data);
   }
   
   
   public function selecthopcatAction(Request $request){
	   $data['title'] = "Select Category";
       if(!empty($request->input('shopCat'))){
		    $shopCatarr = $request->input('shopCat');
		    $shopcat = implode('@',$shopCatarr);
			 $data = array("categoryType"=>$shopcat);
			 $editData = VendorDetails::editShopcat($data,$request->input("id"));
			 if($editData){
                             $vresult = VendorDetails::where(array("id"=>$request->input("id")))->first();
				 $randNo = time();
				    $dataVendor = array("users_id"=>$vresult->users_id,"vendordetails_id"=>$request->input("id"));
				   if(!empty(count($dataVendor))){
					         $shopImageResult = VendorShopImage::addshopProfileImage($dataVendor);
						 $vBusinessResult = vendorbusinesDetails::addBusinessDetails($dataVendor);
						 $vShopSetting = ShopSetting::addShopSetting($dataVendor);
						 $advertisement = AdvertisementRecord::insert(array("vendordetails_id"=>$request->input("id"),"totalAds"=>0));
						 if($vBusinessResult){
						   $data = array("shopID"=>$vresult->id,"shopName"=>$vresult->vName,"mobile"=>$vresult->vMobile,"email"=>$vresult->vEmail);
						   Mail::send('emails.vendorShopCreate', $data, function ($message){
							 $message->from('info@kanpurize.com', 'Kanpurize vendor Registeration');
							 $message->to('vivek.gupta@kanpurize.com')->subject('New Vendor Shop Registeration !');
						   });
							$knpUser_name = session()->get('knpUser_name');
							$lastID = $request->input("id");
						    return redirect("kanpurize_Vendor_dashboard?username=$randNo$knpUser_name&vendorRefID=$lastID");
						   }
				      }
					else{ return redirect()->back(); }  
			   }
		     else{
		        $err = "Unexpected Erorr. Try again...";
		       } 				
		}
	  else{
		   $err = "Please Select Maximum One more category...";
		}
	   if(isset($err)){
		   session()->flash('msg',"<p class='alert alert-info'>$err</style>");
		   return redirect()->back()->with('success', array('your message,here'));
		  }	   
	    		
   } 
  
   public function selectBusinesstype(Request $request){
	 // print_r($request->all());exit;
	   $data['title'] = "Registered Shop";
       if(!empty($request->shopID)){
	   $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'),"shopList");
	  	 $data['lastVendorID'] = $request->shopID;
		
		 return view("kanpur.SelectBusinessType")->with($data);
		  }
	   else{
		  return redirect()->back();
		  }	   		
   }
   
   public function businessTypeaction(Request $request){
	   $data['title'] = "Select Business Type";
		$v = array("id"=>"required","users_id"=>"required","vendorEmail"=>"required",); 
	    $this->validate($request,$v);
	    if(!empty($request->input('radio1'))){
		    $editbussTyperesult = VendorDetails::editBusinesstype($request);
			if($editbussTyperesult != FALSE){
				session(array('busineestType'=>$request->input('radio1')));
				$lastID = base64_encode($request->input('id'));
				$bType = $request->input('radio1');
				return redirect("Kanpurize_marketPlace_selectCategory/$bType/$lastID");
				}
			else{
				$err = "Unexpected Try again..";	
			 }
		}
		else{
		   $err="please Select any one business Type...";
		}
	   if(isset($err)){
		   session()->flash('msg',"<p class='alert alert-info'>$err</style>");
		   return redirect()->back()->with('success', array('your message,here'));
		}	
	}
   
   
  
   public function kanpurizeShopVerify($shopName,$shopID){
	      $decShopID = decrypt($shopID);
		  $data['title'] = "Kanpur Shop Otp Verify";
	          $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'),"shopList");
		  $data['my_ngo'] = Ngo_model::where(['user'=>session()->get('knpuser'),'status' => 'Y'])->get();
	      $data['my_matrimonialProfile'] = Matrimonial_model::get_matrimonial_profile(['user_id'=>session()->get('knpuser')]);
    	  $lastShopid = session()->get('lastVendorID');
		  $name = str_replace(" ","_",$shopName);
		  $data['vendorData'] = VendorDetails::find($decShopID);
		  return view("kanpur.shopVerifyOtp")->with($data);		  
   }
  
  public function registrationShopAction(Request $request){
	  if(!empty($request->termAndCondition)){
                   $v = array("users_id"=>"required", "vName"=>"required","vEmail"=>"required","vMobile"=>"required|numeric",);
		   $this->validate($request,$v);
		   $otp = rand(100000,999999);
		   $message = $otp."  is your otp Varification";
		   $otpResult = VendorDetails::sendMobileSms($message,$request->input("vMobile"));
		   //echo "<pre>";
		   //print_r($otpResult);exit;
		   $resultlastId = VendorDetails::vendorRecord($request,$otp);
		  if($resultlastId != FALSE){
			  session(array('lastVendorID'=>$resultlastId,'email'=>session()->get('knpUser_email'),'name'=>$request->input('name'),"userID"=>$request->input('users_id')));
			  $name = str_replace(" ","_",$request->input('vName'));
			  $encshopID = encrypt($resultlastId);
			  return redirect("kanpurizeShopVerify/$name/$encshopID");
			  //return redirect("selectBusinesstype/$resultlastId/$name");
			}
	  }
	 else{
	      return redirect("kanpurize_RegisteredShop?notOk");
	  } 
   }
  
   public function firstDashboard(){
	  $knpUser_id =  session()->get('knpUser_id');
	  $knpUser_name =  str_replace(" ","_",session()->get('knpUser_name'));
	  $knpUser_email =  session()->get('knpUser_email');
	  if(empty($knpUser_email) && empty($knpUser_name) || empty($knpUser_id)){
	    if($knpUser_email==" " && $knpUser_id==" " && $knpUser_name==" "){
		  return redirect("Kanpurize_login");
		}
	   }
	  if(isset($_GET['vendorRefID'])){
		  $vendorShopID = $_GET['vendorRefID'];
		  session(array('lastVendorID'=>$vendorShopID,'email'=>$knpUser_email,'name'=>$knpUser_name,"userID"=>$knpUser_id));
		   $first = rand(1,9999);
		   return redirect("kanpurize_Vendor_dashboard?username=$first$knpUser_name&vendorRefID=$vendorShopID");
		 } 
	  else{
		   session()->flash('msg',"<p class='alert alert-info'>$err</style>");
		   return redirect()->back()->with('success', array('your message,here'));  
		 }	 
	}
   
   public function kanpurize_vendor_logout(){
	   session()->forget('lastVendorID');
	   session()->forget('email');
	   session()->forget('userID');
	   return redirect("kanpurizeMarketplace"); 
	}
   
   public function deleteAction(){
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
}
