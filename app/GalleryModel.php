<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class GalleryModel extends Model{
	 protected  $table = "gallery";
	 protected $fillable = array('id','vendordetails_id','image','title','created_at','updated_at');   
  
   public static function uploadGallery($data,$image){
	   //return $data;
	    $result = GalleryModel::create(array("vendordetails_id"=>$data['vendordetails_id'],"image"=>$image,"title"=>$data['title']));
	    if($result)return TRUE; else return FALSE; 
	 }
  
  
     public static function GalleryList($data){
	    $result = GalleryModel::where($data)->get();
	    if(count($result) > 0){ return $result; }
	    else{ return FALSE; }	
	 }
	 
	 public static function deleteRecord($id){
	   $deleteResult =  DB::table('gallery')->where('id',$id)->delete();
	  if($deleteResult) return TRUE; else return FALSE;
	}	

  
}
