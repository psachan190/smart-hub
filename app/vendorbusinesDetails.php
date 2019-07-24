<?php
namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class VendorbusinesDetails extends Model{
    protected  $table = "knp_vbusinessdetail";
	 public $timestamps = false;
	protected $fillable = array('id','users_id','vendordetails_id','cbusinesStatus','adminStatus','address1','address2','address3','pinCode','city','state','editDate');
	
	public static function addBusinessDetails($formdata){
	    $formdata['adminStatus'] = "N";
		$formdata['cbusinesStatus'] = "N";
		 $insertData =  VendorbusinesDetails::create($formdata);
		  if($insertData){ return TRUE; }
		  else{ return FALSE; }
	}
	
	public static function editBusinessDetails($updateData,$whereClause){
	   $updateResult = DB::table('knp_vbusinessdetail')->where($whereClause)
                             ->update($updateData);
	    if($updateResult){ return TRUE; }
		else{ return FALSE; } 
	}  	
   
   public static function getBusinessDetails($con){
	 $result = DB::table("knp_vbusinessdetail")->where($con)->first();
	 if(count($result) > 0) return $result; else return FALSE;
	}
   
   
   public static function BlockorUnblock($data,$where){
	  $result =  DB::table('knp_vbusinessdetail')
                       ->where($where)
                       ->update($data);
	  if($result){
		  return TRUE; 
		 }else{ return FALSE; }				   
	}
	
	public static function editShopAddress($request){
		$vendorID = $request['vendorID'];
		$userID  = $request['userID'];
		unset($request['userID'],$request['vendorID'],$request['_token']);
		$request['editDate'] = time();
	    $result =  DB::table('knp_vbusinessdetail')
                       ->where(array('users_id'=>$userID,"vendordetails_id"=>$vendorID))
                       ->update($request);
	    if($result){ return TRUE; 
	    }else{ return FALSE; }	
	}
	
	public static function getduplicate($con){
	  if(is_array($con)){
		   $result = DB::table("knp_vbusinessdetail")->where($con)->first();
		   if(count($result) > 0) return TRUE; else return FALSE;
		}
	}
}
?>