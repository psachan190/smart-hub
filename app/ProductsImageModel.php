<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductsImageModel extends Model{
   protected  $table = "productsimage";
   public $timestamps = false; 
   protected $fillable = array('id','users_id','vendordetails_id','products_id','imagePath','image','thumbImgpath','thumbImg','crDate','editDate','cStatus');
    
	public static function addpImage($imgArr,$newFilePath,$thumbImgpath,$formData){
		$userID = session()->get('knpUser_id');
		$data = array("users_id"=>$userID,"vendordetails_id"=>$formData['shopID'],
					"products_id"=>$formData['productsID'],"imagePath"=>$newFilePath,
					"image"=>$imgArr,"thumbImgpath"=>$thumbImgpath,
					"thumbImg"=>$imgArr,"crDate"=>time(),
					"editDate"=>time(), "cStatus"=>"Y",); 
	 	  
		  $productsData =  ProductsImageModel::create($data);
	      if($productsData){ return TRUE; }
		  else{ return FALSE; } 
  }
  
  public static function getImage($pId){
	 $productsImage = ProductsImageModel::where(array("products_id"=>$pId))->get();
	  if(count($productsImage)){
		   return $productsImage;
		}
	  else{ return FALSE; }	
   }
   
   public static function deleteProductsImage($deleteID){
	  $deleteResult =  DB::table('productsimage')->where('id', $deleteID)->delete();
	  if($deleteResult) return TRUE; else return FALSE;
	}

   public static function editProductsImage($request,$image){
		$editResult =  ProductsImageModel::find($request->input('editID'));
        if($editResult->update(array("image"=>$image,"thumbImg"=>$image,'editDate'=>time())))
		 { return TRUE; }
		 else{ return FALSE; } 
	 }	
}