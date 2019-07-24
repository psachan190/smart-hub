<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ComplainDetails extends Model{
   protected  $table = "complaindetails";
   protected $fillable = array('id' ,'complain_id','sendorID','recieverID','message', 'image' , 'image_text' ,'created_at','updated_at','status');
	
	/*
	public static function addComment($formData , $image){
	    $result = DB::table('complain')->insert (array("id"=> "complain_id"=>$formData['complain_id'],"sendorID"=>$formData['sendorID'],"recieverID"=>$formData['recieverID'],"message"=>$formData['message'],"created_at"=>time(),"updated_at"=>time(),"status"=>"Y")); 
	 	if($result)return TRUE; else return FALSE;
	} */
	
	
	public static function addComplainDetails($formData , $complain_id, $image){
	    $id = uniqid().time().$formData['sender_id'].$formData['receiver_id'];
		 $result = DB::table("complaindetails")->insert(array("id"=>$id , "complain_id"=>$complain_id, "sendorID"=>$formData['sender_id'],  "recieverID"=>$formData['receiver_id'],"message"=>$formData['description'] ,"image" => $image , "image_text"=>$image , "created_at"=>time(),"updated_at"=>time() , "status"=>"Y"));
		if($result)return TRUE; else return FALSE;
	}
	
	public static function addvendorComplainDetails($formData,$lastID){
		$complainResult = ComplainDetails::create(array("complain_id"=>$lastID,"sendorID"=>$formData['sendorID'],"recieverID"=>$formData['receiverID'],"message"=>$formData['description'],"status"=>"Y"));
		if($complainResult)return TRUE; else return FALSE;
	}
	
	public static function getComplainDetails($complainID){
		$result = DB::table('complaindetails as a')
					 ->where(array("a.complain_id"=>base64_decode($complainID)))
			         ->orderBy('created_at','DESC')
					 ->get();
		  if(count($result) > 0){ return $result; } else{ return FALSE; }  
	} 
}
