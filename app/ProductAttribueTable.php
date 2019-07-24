<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductAttribueTable extends Model{
	protected  $table = "products_attribute_tb";
	
	public static function getProductsAttribute($productsID){
	    $result = DB::table("products_attribute_tb as a")
		                 ->join('productsattribute as b', 'b.id', '=', 'a.productsattribute_id')
						 ->select('a.*','b.name')
						 ->where(array("a.products_id"=>$productsID))->get();
		if(count($result)>0)return $result; else return FALSE;
	}
	
	public static function pAttribute($condition){
	    $result = DB::table("products_attribute_tb")
		                 ->where($condition)->get();
		if(count($result)>0)return $result; else return FALSE;
	}
	
	
	
	public static function editAttribute($formData,$deleteID){
	  foreach($deleteID as $delete){
		   $deleteResult = DB::table('products_attribute_tb')->where('id',$delete->id)->delete();
		}
	     foreach($formData['productattribute'] as $key=>$value){
			  if(!empty($formData['value'][$key])){
				 $dataArr = array("products_id"=>$formData['productsID'],"productsattribute_id"=>$value,"value"=>$formData['value'][$key]);
				 $result =  DB::table('products_attribute_tb')->insert($dataArr); 
				} 
			}
		   if($result)return TRUE; return FALSE;	 	
	}
	
	public static function deleteProductsAttr($ProductsAttribute){
	    $deleteResult = "";
		foreach($ProductsAttribute as $list){
		   $deleteResult = DB::table('products_attribute_tb')->where('id',$list->id)->delete();
		}
	  if($deleteResult)return TRUE; else return FALSE;	
	}
    
}
