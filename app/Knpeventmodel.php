<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Knpeventmodel extends Model{
  
    protected  $table = "knpevent_tbl";
	protected $fillable = array('id','admin_id','knp_profile_tbl_id','eventcategory_id','evntTitle','location','description','image','startdate','endDate', 'created_at','updated_at');  
	
	public static function addEvent($formData,$image){
	    $startDate = strtotime($formData['startDate']);
		$enddate = strtotime($formData['endDate']);
	  	$result = DB::table("knpevent_tbl")->insert(array("admin_id"=>1,"eventcategory_id"=>$formData['categoryName'],"evntTitle"=>$formData['title'],"location"=>$formData['eventLocation'],"description"=>$formData['editorForm'],"image"=>$image,"startdate"=>$startDate,"endDate"=>$enddate,"created_at"=>time(),"updated_at"=>time()));
	    if($result)return TRUE; else return FALSE; 
	}
	
	public static function editEvent($formData,$image){
		$startDate = strtotime($formData['startDate']);
		//return $formData['startDate'];
		$enddate = strtotime($formData['endDate']);
	  	$result = DB::table("knpevent_tbl")->where(array("id"=>$formData['editID']))->update(array("admin_id"=>1,"eventcategory_id"=>$formData['categoryName'],"evntTitle"=>$formData['title'],"location"=>$formData['eventLocation'],"description"=>$formData['editorForm'],"image"=>$image,"startdate"=>$startDate,"endDate"=>$enddate,"updated_at"=>time()));
	    if($result)return TRUE; else return FALSE; 
	}
	
	
	
	
	public static function geteventList($con=NULL){
	  if(!empty($con)){
		   $result = DB::table("knpevent_tbl")->where($con)->get();
	       if($result)return $result; else return FALSE; 
		}	
	  $result = DB::table("knpevent_tbl")->get();
	  if($result)return $result; else return FALSE; 
	}

    public static function getsingleeventList($con){
	  $result = DB::table("knpevent_tbl")->where($con)->first();
	  if($result)return $result; else return FALSE;
	}
	
	public static function geteventListbyDateTime($datetime){
	 	$fromDate = $datetime - (24*60*60);
		$toDate = $datetime + (24*60*60);
		//echo date("d-m-y",$datetime);exit;
	 $result = Knpeventmodel::whereBetween("startdate",array($fromDate,$toDate))->get();
	 if(count($result) > 0)return $result; else return FALSE;
	}
	
}
