<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubCategory extends Model{
   protected  $table = "subcategory";
   public $timestamps = false;
   
   public static function addSubcat($request){
	   $dataArr = array("shopCatid"=>$request->shopCat , "catID"=>$request->catID , "subCatname"=>$request->scatname, "sCatpriority"=>$request->priority ,"subDesc"=>$request->subDesc ,"subcrDate"=>time() , "subcstatus"=>$request->status );
	   $result = DB::table('subcategory')->insertGetId($dataArr);
	   if($result){ return TRUE; } else{ return FALSE; } 
   }
   
   public static function subCategory($categoryID,$status=NULL){
	  if(!empty($status)){
		    $result = DB::table('subcategory as a')
	                     ->where(array("catID"=>$categoryID,"subcstatus"=>$status))->get();
	        $result = $result->toArray();	
	        if(count($result) > 0) return $result; else return FALSE;				
		 } 
	   $result = DB::table('subcategory as a')
	                       ->where(array("catID"=>$categoryID))->get();
	   $result = $result->toArray();	
	   if(count($result) > 0) return $result; else return FALSE;				
	 }
	
   
   public static function getsubCategory($id=NULL){
	   if(!empty($id)){
		   $result = DB::table('subcategory as a')
			            ->join('category as b', 'a.catID', '=', 'b.id')
					    ->join('knp_shopcategory as c', 'a.shopCatid', '=', 'c.cid')
					    ->select('a.*','b.csname','c.cname','c.bType')
					    ->where(array("sid"=>$id))
						->first();
	       if(count($result) >0) return $result; else return FALSE;	
		 }
	  $result = DB::table('subcategory as a')
			            ->join('category as b', 'a.catID', '=', 'b.id')
					    ->join('knp_shopcategory as c', 'a.shopCatid', '=', 'c.cid')
					    ->select('a.*','b.csname','c.cname','c.bType')
						->orderBy('id', 'ASC')
					    ->get();
	  if(count($result) >0) return $result; else return FALSE;					
	}	
	
	 public static function getValidShopsubCat($catgoryID,$shopID){
      $productsAddsubCat = DB::table('products')->distinct()
	                         ->where(array("vendordetails_id"=>$shopID,"category_id"=>$catgoryID))
							 ->get(array('subcategory_id'));
	   if($productsAddsubCat){
		   $i=0;
		   $subcarArr = array();
		   foreach($productsAddsubCat as $data){
		     $subcarArr[$i] = $data->subcategory_id;
		     $i++;
		    }	
	  	   $data=SubCategory::wherein('sid',$subcarArr)->get();
		   $data = $data->toArray();	
		   if($data) return $data; else return FALSE;
		 }
	    else{
		  return FALSE;
		}	 
   }
   
   
   public static function editSubCategory($formData){
	   $updateResult = DB::table('subcategory')
                             ->where(array("sid"=>$formData['editID']))
                             ->update(array("shopCatid"=>$formData['shopCat'],"catID"=>$formData['catID'],"subCatname"=>$formData['scatname'],"sCatpriority"=>$formData['priority'],"subDesc"=>$formData['subDesc'],"subcstatus"=>$formData['status'],"editDate"=>time()));
	    if($updateResult){ return TRUE; }
		else{ return FALSE; } 
	} 
    	
	public static function deleteRecord($id){
	   $deleteResult =  DB::table('subcategory')->where('sid',$id)->delete();
	  if($deleteResult) return TRUE; else return FALSE;
	}	
		
}
