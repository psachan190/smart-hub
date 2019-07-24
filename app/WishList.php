<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class WishList extends Model{
    protected  $table = "wishlist";
	protected $fillable = array('users_id', 'products_id', 'created_at', 'updated_at',"status");   
	
	public static function addtowishList($dataArr){
	  $result = WishList::create($dataArr);
	  if($result)return TRUE; else return FALSE; 
	}
	
	public static function getWishList($dataArr){
	  $result = WishList::where($dataArr)->first();
	  if($result)return $result; else return FALSE; 
	}
	
	public static function getWishListProducts($dataArr){
	  $result = DB::table("wishlist as a")
	                ->join("products as b",'a.products_id','=','b.id')
					->orderBy('id', 'DESC')
					->select('a.*','b.pName','b.productsAmount','b.pImage','b.id as pID')
					->where(array("a.users_id"=>$dataArr['users_id']))
					->get();    
	  if($result)return $result; else return FALSE; 
	}
	
	public static function deleteRecord($dataArr){
	  $deleteResult =  DB::table('wishlist')->where($dataArr)->delete();
	  if($deleteResult) return TRUE; else return FALSE; 
	}
   
}
