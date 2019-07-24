<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shop_categoryModel extends Model{
    protected  $table = "knp_shopcategory";
    public $timestamps = false;
   //protected $guarded = array('_token','');
   
   
     public static function addShopcategory($request , $imageName){
	 //return $request->all();
	   $dataArr = array("cname"=>$request->cname , "priority"=>$request->priority , "cDesc"=>$request->cDescription,"crDate"=>time(),"cSataus"=>"Y" ,"bType"=>$request->businessType , "icon"=>$imageName);
	   $result = DB::table('knp_shopcategory')->insertGetId($dataArr);
	   if($result){ return TRUE; } else{ return FALSE; } 
	} 
   
   
   
  public static function editShopCat($formData,$imageName){
	   $updateResult = DB::table('knp_shopcategory')
                             ->where(array("cid"=>$formData['editID']))
                             ->update(array("cname"=>$formData['cname'],"priority"=>$formData['priority'],"cDesc"=>$formData['cDescription'],"crDate"=>time(),"cSataus"=>"Y","bType"=>$formData['businessType'],"icon"=>$imageName));
	    if($updateResult){ return TRUE; }
		else{ return FALSE; } 
	} 
	
   public static function getShopcat($btype,$category=NULL){
	   if(!empty($category)){
		   $result = Shop_categoryModel::where(array("cid"=>$category))->first();
		    if($result) return $result; else return FALSE;
		 } 
	   if($btype==3){
		   $result = Shop_categoryModel::all();
	       if(count($result)> 0) return $result; else return FALSE;
		 }
	   else{
			$result = Shop_categoryModel::where(array("bType"=>$btype))->get();
	        return $result;
		 }	
		   
	} 
	
   public static function getShoplist($category_type){
	  $categoryID = explode("@",$category_type);
	  $catidArr = implode("','",$categoryID);
	   //return $catidArr;
	    $inArr = array($catidArr);
		//echo "<pre>"; print_r($categoryID);die();
		//$data = DB::select(DB::raw("select * from knp_shopcategory where cid IN('".$catidArr."')"));
		$data=Shop_categoryModel::wherein('cid',$categoryID)->get();
		if(count($data) > 0){
		   return $data;
		 }
		else{
			return FALSE;
		} 
		
	}
	
	public static function getserviceShoplist($category_type){
	 $categoryID = explode("@",$category_type);
	 $data=Shop_categoryModel::where('bType',2)
	                            ->wherein('cid',$categoryID)
								->get();
		if(count($data) > 0){ return $data;  }
		else{ return FALSE; } 
	}
	
	public static function getgoodShoplist($category_type){
	 $categoryID = explode("@",$category_type);
	   $data=Shop_categoryModel::where('bType',1)
	                            ->wherein('cid',$categoryID)
								->get();
		if(count($data) > 0){ return $data;  }
		else{ return FALSE; } 
	}
	
	public static function getShopcatlist($category=NULL){
	   if(!empty($category)){
		    $result = DB::table('knp_shopcategory as a')
	              ->join('category as b', 'a.cid', '=', 'b.shopCatid')
                  ->where(array("a.cid"=>$category,"b.cstatus"=>"Y"))
				  ->get(); 
		    $result = $result->toArray();			  
		    if(count($result) >0 ) return $result; else return FALSE;	
		 }
	}	
	
	public static function unregisteredShop($catArr){
	  $categoryIdArr = explode("@",$catArr);
	  $data=Shop_categoryModel::whereNotin('cid',$categoryIdArr)->get();
		if(count($data) > 0){return $data; }
		else{ return FALSE; } 
	}
	
	public static function deleteRecord($id){
	   $deleteResult =  DB::table('knp_shopcategory')->where('cid',$id)->delete();
	  if($deleteResult) return TRUE; else return FALSE;
	}	

	public function recommend(){
		return $this->hasMany(Recommnedshop::class,'shopcategory_id','cid');
	}
	
	
}
