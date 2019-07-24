<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class categoryModel extends Model{
    
   protected  $table = "category";
   public $timestamps = false;
   
   public static function addCategory($request){
       $dataArr = array("shopCatid"=>$request->shopCat , "csname"=>$request->cname , "cpriority"=>$request->priority, "cDesc"=>$request->cDesc ,"ccrDate"=>time() ,"cstatus"=>$request->status );
	   $result = DB::table('category')->insertGetId($dataArr);
	   if($result){ return TRUE; } else{ return FALSE; } 
   }
   
   
   public static function category($shopCatID,$status=NULL){
	   if(!empty($status)){
		    $result = categoryModel::where(array("shopCatid"=>$shopCatID,"cstatus"=>$status))->get();
	        if(count($result) > 0) return $result; else return FALSE;
		  }
	  $result = categoryModel::where(array("shopCatid"=>$shopCatID))->get();
	  if(count($result) > 0) return $result; else return FALSE;	  
	} 
	
   public static function Categorylist($id=NULL){
	  if(!empty($id)){
		   $result = DB::table('knp_shopcategory as a')
			           ->join('category as b', 'a.cid', '=', 'b.shopCatid')
					   ->select('*')
					   ->where(array("id"=>$id))
					   ->first();	
	       if(count($result) >0 )return $result; else return FALSE;
		}
      $result = DB::table('knp_shopcategory as a')
			           ->join('category as b', 'a.cid', '=', 'b.shopCatid')
					   ->select('*')
					   ->get();	
	  if(count($result) >0 )return $result; else return FALSE;				   
   }
   
   
   public static function getValidShopCat($shopCatgoryID,$shopID){
      $productsAddCat = DB::table('products')->distinct()
	                         ->where(array("vendordetails_id"=>$shopID,"knp_shopcategory_id"=>$shopCatgoryID))
							 ->get(array('category_id'));
	   if($productsAddCat){
		   $i=0;
		   $carArr = array();
		   foreach($productsAddCat as $data){
		     $carArr[$i] = $data->category_id;
		     $i++;
		    }	
	  	   $data=categoryModel::wherein('id',$carArr)->get();
		   $data = $data->toArray();	
		   if($data) return $data; else return FALSE;
		 }
	    else{
		  return FALSE;
		}	 
   }
   
    public static function editCategory($formData){
	   $updateResult = DB::table('category')
                             ->where(array("id"=>$formData['editID']))
                             ->update(array("shopCatid"=>$formData['shopCat'],"csname"=>$formData['cname'],"cpriority"=>$formData['priority'],"cDesc"=>$formData['cDesc'],"ccrDate"=>time(),"cstatus"=>$formData['status']));
	    if($updateResult){ return TRUE; }
		else{ return FALSE; } 
	} 
   
    public static function deleteRecord($id){
	   $deleteResult =  DB::table('category')->where('id',$id)->delete();
	  if($deleteResult) return TRUE; else return FALSE;
	}	

	public function recommend(){
		return $this->hasMany(Recommnedshop::class);
	}	
 }
