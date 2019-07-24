<?php
namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class ProductSaveOffer extends Model{
	
   protected  $table = "productsinoffer_tbl";
   protected $fillable = array('id','offersandnews_id','products_id','created_at','updated_at');   
	
	public static function addProductsinOffer($formData){
	  foreach($formData['checkedID'] as $dataArr){
	      $result = ProductSaveOffer::create(array("offersandnews_id"=>$formData['offerID'],"products_id"=>$dataArr));
	   }
	  if($result)return TRUE; else return FALSE;  
	}
	
	
	public static function getproductsInOffer($condition){
	  $productsDetails = DB::table("productsinoffer_tbl as a")
	                        ->leftJoin('products as b', 'a.products_id', '=', 'b.id')
	                        ->where($condition)
							->select('a.*','b.pName','b.productsAmount','b.salePrice','b.pImage','b.price','b.vendordetails_id')
							->get()->toArray();
	  if(count($productsDetails) > 0){ return $productsDetails; }
	  else{ return FALSE; }	 
	}
	
	public static function getproductsInOfferforFront($condition){
	  $productsDetails = DB::table("productsinoffer_tbl as a")
	                        ->leftJoin('products as b', 'a.products_id', '=', 'b.id')
	                        ->where($condition)
							->select('a.*','b.pName','b.productsAmount','b.salePrice','b.pImage','b.price','b.vendordetails_id','b.id as productsID')
							->paginate(30);
	  if(count($productsDetails) > 0){ return $productsDetails; }
	  else{ return FALSE; }	 
	}
	
	public static function removeRow($condition){
	  $deleteResult =  DB::table('productsinoffer_tbl')->where($condition)->delete();
	  if($deleteResult) return TRUE; else return FALSE;	 
	}
	
	
}
