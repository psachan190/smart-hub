<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ComplainModel extends Model{
   	
    protected  $table = "complain";
    protected $fillable = array('id' , 'users_id' , 'vendordetails_id','complainsubject_id' , 'receiverID' , 'complain_title' ,'description', 'section_id', 'created_at', 'updated_at', 'status');
	
	public static function addComplain($formData){
		 $resultLastID =  DB::table('complain')->insertGetId(array("users_id"=>$formData['sender_id'] , "vendordetails_id"=>$formData['receiver_id'] , "complainsubject_id"=>$formData['complainSubject'] , "senderID"=>$formData['sender_id'] , "receiverID"=>$formData['receiver_id'], "complain_title"=>$formData['complain_title'], "section_id"=>4 , "created_at"=>time() , "updated_at" => time() ,"status"=>"N")); 
		if($resultLastID){  return $resultLastID; } 
		else{ return FALSE; }
	}
	
	public static function addvendorComplain($formData,$image){
		 $resultLastID =  DB::table('complain')->insertGetId(array("vendordetails_id"=>$formData['sendorID'],
					 "complainsubject_id"=>$formData['complainSubject'],"receiverID"=>$formData['receiverID'],
					 "description"=>$formData['description'],"type"=>"adminComplain","created_at"=>time(),"status"=>"N","image"=>$image));		         if($resultLastID){ return $resultLastID; } 
		 else{ return FALSE; }
	}
	
	//working
	public static function getComplain_by_vendor($condition){
		//return $condition;
	  $result = DB::table('complain as a')
					 ->join('complainsubject as b', 'a.complainsubject_id', '=', 'b.id')
					 ->select('a.*','b.subject')
					 ->where(array("receiverID"=>$condition['receiverID'] , "vendordetails_id"=>$condition['receiverID']))
					 ->orderBy('updated_at','DESC')
					 ->simplePaginate(10);
		  if(count($result) > 0){ return $result; } else{ return FALSE ; } 
	}
	
	//working
	public static function getComplain($condition,$complainID=NULL){
		if(!empty($complainID)){
			 $result = DB::table('complain as a')
			            ->join('complainsubject as b', 'a.complainsubject_id', '=', 'b.id')
					   ->where(array("a.id"=>base64_decode($complainID)))
					    ->select('a.*','b.subject')
					   ->first();
			 if(count($result) > 0){ return $result; } else{ return FALSE ; } 
		   }
		 $result = DB::table('complain as a')
					 ->join('complainsubject as b', 'a.complainsubject_id', '=', 'b.id')
					 ->select('a.*','b.subject')
					 ->where(array("senderID"=>$condition['sendorID'] , "receiverID"=>$condition['receiverID']))
			         ->orderBy('updated_at','DESC')
					 ->simplePaginate(10);
		  if(count($result) > 0){ return $result; } else{ return FALSE ; } 
	}
	
	//working
	public static function receiveComplain($receverID){
		 $result = DB::table('complain as a')
					 ->join('complainsubject as b', 'a.complainsubject_id', '=', 'b.id')
					 ->select('a.*','b.subject')
					 ->where(array("a.receiverID"=>$receverID))
			         ->orderBy('updated_at','DESC')
					->simplePaginate(5);
		  if(count($result) > 0){ return $result; }
		  else{ return FALSE ; } 
	   //$result = ComplainModel::where(array("users_id"=>$userID))->orderBy('created_at','DESC')->simplePaginate(5);
	   //if($result) return $result; else return FALSE;
	}
	
	//working
	 public static function editComplain($complain_id){
      $result =  DB::table('complain')
                       ->where(array("id"=>$complain_id))
                       ->update(array("updated_at"=>time()));
	  if($result){ return TRUE;  }
	  else{ return FALSE; }	
    }
	
	
	public static function getVendorComplain($condition){
		 $result = DB::table('complain as a')
					 ->join('complainsubject as b', 'a.complainsubject_id', '=', 'b.id')
					 ->join('vendordetails as v', 'a.vendordetails_id', '=', 'v.id')
					 ->select('a.*','b.subject','v.vName','v.id as vendorID')
					 ->where($condition)
			         ->orderBy('updated_at','DESC')
					  ->orderBy('updated_at','DESC')
					->simplePaginate(5);
		  if(count($result) > 0){ return $result; }
		  else{ return FALSE ; } 
	   //$result = ComplainModel::where(array("users_id"=>$userID))->orderBy('created_at','DESC')->simplePaginate(5);
	   //if($result) return $result; else return FALSE;
	}
 }

?>
