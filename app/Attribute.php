<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Attribute extends Model{
    protected  $table = "productsattribute";
	protected $fillable = array(
        'id','name','category_id','subcategory_id','value','created_at','status'); 
		
	 public static function addAttribute($formData){
	    $result =  DB::table('productsattribute')->insert(array("name"=>$formData['attributeName'],"category_id"=>$formData['category_id'],"subcategory_id"=>$formData['subcategory'],"status"=>$formData['status'],"created_at"=>time(),"updated_at"=>time())); 
		 if($result){ return TRUE; }else return FALSE;
	 }
	 
	public static function getAttributeList($id=NULL){
		if(!empty($id)){
		     $result = DB::table('productsattribute as a')
			         	->join('subcategory as b', 'b.sid', '=', 'a.subcategory_id')
					    ->join('category as c', 'a.category_id', '=', 'c.id')
						->select('a.*','b.subCatname','c.csname')
						->where(array("a.id"=>$id))
						->first();
	          if(count($result) > 0){ return $result; }else return FALSE;   
		  }
	   $result = DB::table('productsattribute as a')
			         	->join('subcategory as b', 'b.sid', '=', 'a.subcategory_id')
					    ->select('a.*','b.subCatname')
						->get();
	          if(count($result) > 0){ return $result; }else return FALSE;
	 }
	 
	 public static function deleteAttribute($id){
	  $result = Attribute::find($id);
	  if($result->delete()) return TRUE; else return FALSE;
	} 
	
	public static function editAttribute($formData){
	     $editResult =  Attribute::find($formData['editID']);
        if($editResult->update(array("name"=>$formData['attributeName'],"category_id"=>$formData['category_id'],"subcategory_id"=>$formData['subcategory'],"value"=>$formData['attributeValue'],"status"=>$formData['status'],"updated_at"=>time())))
		 { return TRUE; }
		else{ return FALSE; } 
	 }
    
		    
}
