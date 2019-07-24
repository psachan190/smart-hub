<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Products extends Model{
   protected  $table = "products";
   public $timestamps = false;
    protected $fillable = array(
        'id', 'knp_shopcategory_id', 'category_id', 'subcategory_id', 'vendordetails_id', 'users_id', 'pName', 'price', 'salePrice','withGst','gstRate', 'quantity', 'stockQuantity', 'pImage', 'pDesription','plongDesription', 'pdetailDescription', 'pMetakeyWords', 'pMetaDetails', 'pStatus', 'crpDate', 'trash','productsAmount' 
    );   
   
   public static function addProducts($request,$imageName){
	    $gstRate = (int) $request['gstRate'];
		$productsAmount = (int) $request['totalPrice'];
	     //echo $productsAmount;exit;
		 $insertArr = array("knp_shopcategory_id"=>$request["knp_shopcategory_id"],"category_id"=>$request['category'],"subcategory_id"=>$request['subCategory'],"vendordetails_id"=>$request['vendordetails_id'],"users_id"=>$request['users_id'],"pName"=>$request['productName'],"price"=>$request['listprice'],"salePrice"=>$request['salePrice'],"withGst"=>$request['withGst'],"gstRate"=>$gstRate,"productsAmount"=>$productsAmount,"quantity"=>$request['quantity'],"stockQuantity"=>$request['stockWarning'],"pImage"=>$imageName,"pDesription"=>$request['myTextarea'],"plongDesription"=>$request['myTextarea1'],"pdetailDescription"=>$request['myTextarea2'],"pMetakeyWords"=>$request['metaKeywords'],"pMetaDetails"=>$request['metaDetails'],"pStatus"=>"Y","crpDate"=>time(),"soldOut"=>"NOT","updated_date"=>time(),"trash"=>"N");
	   $productsData = Products::create($insertArr);
	  /* $productsData =  DB::table('products')->insert(
					 array(
						  "knp_shopcategory_id"=>$formData['shopCategory_id'],
						  "category_id"=>$formData['category'],
						  "subcategory_id"=>$formData['subCategory'],
						  "vendordetails_id"=>$formData['shopID'],
						  "user_Id"=>$formData['user_id'],
						  "user_email"=>$formData['user_email'],
						  "pName"=>$formData['productName'],
						  "price"=>$formData['price'],
						  "salePrice"=>$formData['salePrice'],
						  "quantity"=>$formData['quantity'],
						  "stockQuantity"=>$formData['stockWarning'],
						  "pImage"=>$imageName,
						  "pDesription"=>$formData['myTextarea'],
						  "plongDesription"=>$formData['myTextarea1'],
						  "pdetailDescription"=>$formData['myTextarea2'],
						  "pMetakeyWords"=>$formData['metaKeywords'],
						  "pMetaDetails"=>$formData['metaDetails'],
						  "pStatus"=>$formData['pStatus'],
						  "crpDate"=>time(),
						  "trash"=>"N"
						  )
                   ); */
	   // $product=new products;
	   // $request->merge(['crpDate' => time()]);
	   // $product->create($request->all());
	   if($productsData){ return $productsData->id; } else{ return FALSE; } 
	}
   
   
   public static function getSimpleProducts($con){
	   if(!empty($con)){
		    $productsDetails = DB::table("products as p")
	                          ->where($con)
							  ->paginate(25);
			 if(count($productsDetails) > 0){ return $productsDetails; }				  
		     else return FALSE;
		 } 
	}
   
   public static function getProducts($data,$pID = NULL){
	   if(!empty($pID)){
		    $productsDetails = DB::table("products as p")
	                          ->join('knp_shopcategory as ks', 'p.knp_shopcategory_id', '=', 'ks.cid')
							  ->join('category as c', 'p.category_id', '=', 'c.id')
							  ->join('subcategory as d', 'p.subcategory_id', '=', 'd.sid')
	                          ->where(array('p.id'=>$pID,"trash"=>"N"))
							  ->select('p.*','ks.cname','c.csname','d.subCatname')
							  ->first();
			 if(count($productsDetails) > 0){ return $productsDetails; }				  
		     else return FALSE;
		 } 
	   
	  $productsDetails = DB::table("products as p")
	                        ->join('knp_shopcategory as ks', 'p.knp_shopcategory_id', '=', 'ks.cid')
							->join('category as c', 'p.category_id', '=', 'c.id')
	                        ->where(array("p.vendordetails_id"=>$data['shopID'],"p.knp_shopcategory_id"=>$data['catID'],"trash"=>"N"))
							->select('p.*','ks.cname','c.csname')
							  ->get();
	  if(count($productsDetails) > 0){ return $productsDetails; }
	  else{ return FALSE; }	 
	}
	
	
	 public static function gettrashProducts($data,$pID = NULL){
	   if(!empty($pID)){
		    $productsDetails = DB::table("products as p")
	                          ->join('knp_shopcategory as ks', 'p.knp_shopcategory_id', '=', 'ks.cid')
							  ->join('category as c', 'p.category_id', '=', 'c.id')
							  ->join('subcategory as d', 'p.subcategory_id', '=', 'd.sid')
	                          ->where(array('p.id'=>$pID,"trash"=>"Y"))
							  ->select('p.*','ks.cname','c.csname','d.subCatname')
							  ->first();
			 if(count($productsDetails) > 0){ return $productsDetails; }				  
		     else return FALSE;
		 } 
	   
	  $productsDetails = DB::table("products as p")
	                        ->join('knp_shopcategory as ks', 'p.knp_shopcategory_id', '=', 'ks.cid')
							->join('category as c', 'p.category_id', '=', 'c.id')
	                        ->where(array("p.vendordetails_id"=>$data['shopID'],"trash"=>"Y"))
							->select('p.*','ks.cname','c.csname')
							  ->get();
	  if(count($productsDetails) > 0){ return $productsDetails; }
	  else{ return FALSE; }	 
	}
	
	
	public static function getCatProducts($data,$catID=NULL){
		 if(!empty($catID)){
			  //return base64_decode($catID);
		      $productsList = DB::table("products")
	                          ->where(array("knp_shopcategory_id"=>base64_decode($catID),"vendordetails_id"=>$data['shopID'],"trash"=>"N"))->paginate(5);
			  if(count($productsList) > 0){
			   return $productsList; 
		      } else return FALSE;				   
		   
		   }
		$i=0;
		foreach($data['catID'] as $shopCatID){
		    $productsList = DB::table("products")
	                        ->where(array("knp_shopcategory_id"=>$shopCatID->cid,"vendordetails_id"=>$data['shopID'],"trash"=>"N"))->paginate(5);  
		     if(count($productsList) >0 ){ break; }
			 else{ continue;  }	
			$i++;
		  }
		  
		 if(count($productsList) > 0){
			 //$productsList = $productsList->toArray(); 
			  return $productsList; 
		  
		  } else return FALSE;
		 
	     /*
		  $productsDetails = DB::table("products as p")
	                        ->join('knp_shopcategory as ks', 'p.knp_shopcategory_id', '=', 'ks.cid')
							->join('category as c', 'p.category_id', '=', 'c.id')
	                        ->where(array("p.vendordetails_id"=>$data['shopID'],"p.knp_shopcategory_id"=>$data['catID'],"trash"=>"N"))
							->select('p.*','ks.cname','c.csname')
							  ->get();
	  if(count($productsDetails) > 0){ return $productsDetails; }
	  else{ return FALSE; }	 */
	  }
	
	public static function getCategoryBaseProducts($data){
	   $productsDetails = DB::table("products as p")
	                        ->join('knp_shopcategory as ks', 'p.knp_shopcategory_id', '=', 'ks.cid')
							->join('category as c', 'p.category_id', '=', 'c.id')
	                        ->where(array("p.vendordetails_id"=>$data['shopID'],"p.subcategory_id"=>$data['subcatID'],"trash"=>"N"))
							->select('p.*','ks.cname','c.csname')
							  ->get();
	  if(count($productsDetails) > 0){ return $productsDetails; }
	  else{ return FALSE; }	 
	 } 
   
   public static function editProducts($request,$image){
	    $data = array(
		                 "category_id"=>$request['category'],
						 "subcategory_id"=>$request['subCategory'],
						 "pName"=>$request['productName'],
						 "price"=>$request['listprice'],
						 "withGst"=>$request['withGst'],
						 "gstRate"=>$request['gstRate'],
						 "salePrice"=>$request['salePrice'],
						 "quantity"=>$request['quantity'],
						 "stockQuantity"=>$request['stockWarning'],
						 "pImage"=>$image,
						 "pDesription"=>$request['myTextarea'],
						 "plongDesription"=>$request['myTextarea1'],
						 "pdetailDescription"=>$request['myTextarea2'],
						 "pMetakeyWords"=>$request['metaKeywords'],
						 "pMetaDetails"=>$request['metaDetails'],
						 "pStatus"=>$request['pStatus'],
						 "updated_date"=>time(),
						 "productsAmount"=>$request['totalPrice']
						 );
		   $updateProducts = DB::table('products')
                              ->where(array("id"=>$request->input('productsID')))
					          ->update($data); 
           if($updateProducts){ 
		        $productsAttrID =  DB::table("products_attribute_tb")
						 ->select("id")
						 ->where(array("products_id"=>$request['productsID']))->get();
		         if($productsAttrID)return $productsAttrID; else return FALSE;
			  }
			else{ return FALSE; }  					  
	}
   
   public function deleteProducts($data,$condition){
	  $updateProducts = DB::table('products')
                        ->where($condition)
					    ->update($data);
			 if($updateProducts){ return TRUE; }
			 else{ return FALSE; }  
	}
   
   
   public function deleteProductsTrash($formData,$lastID){
	 $result =  DB::table('products')->where(array("id"=>$formData['productsID'],"vendordetails_id"=>$formData['vendorID']))->delete();
	 if($result){ return TRUE; }
	 else{ return FALSE; }  
	    
	}
	
	public static function getRelatedProducts($condition){
	   $products = DB::table("products as p")->where($condition)->get();
	  if(count($products) > 0){ return $products; } else{ return FALSE; }	 
	 } 

	public function productsImage(){
	   return  $this->hasMany("App\ProductsImageModel",'products_id');
	}
	
	public static function realdelete($deleteID){
	  $deleteResult =  DB::table('products')->where('id',$deleteID)->delete();
	  if($deleteResult) return TRUE; else return FALSE;
	}
	
	
	public static function getSearchProducts($searchProductsString){
	  $result = DB::table("products as a")
	                      ->leftJoin('vendordetails as b', 'a.vendordetails_id', '=', 'b.id')
				            ->select('a.id','a.pName','a.price','a.salePrice','a.productsAmount','b.vName','a.pImage','a.vendordetails_id')
						  ->Where('a.pName', 'like', '%' . $searchProductsString . '%')
						  ->where('trash', '=', 'N')
						  ->paginate(50);  
	  if(count($result) > 0){ return $result; }
	  else{ return FALSE; }	 
	}
	
	/*-----products rate Define based on---*/
   public static function calculateOfferAmount($discountMode,$percentageAmount,$pAmount){
	  if($discountMode==1){
		 $discountAmount =  ($pAmount * $percentageAmount)/100;
		 $productsAmount = $pAmount-$discountAmount;
		 return $productsAmount; 
		}
	   else if($discountMode==2){
		 $productsAmount = $pAmount-$discountAmount;
		  return $productsAmount;
		}	
    }
}
