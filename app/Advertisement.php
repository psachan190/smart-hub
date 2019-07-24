<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Advertisement extends Model{

   protected  $table = "advertisement";
   protected $fillable = array('id','users_id','vendordetails_id','startDate','endDate','ageFrom','ageTo','gender','student','business', 'salaried' , 'housewife' , 'looking_opportunity' ,'description','image','section_id','created_at','updated_at','status','adminStatus','applyFilteration',"year","month","paidStatus");
  
  
  public static function userPostAdshome($request,$imageName){
	    if(!empty($request->filtration)) $filtration = 1; else $filtration = 0; 
 	    if(!empty($request->student)) $student = 1; else $student = 0; 
		if(!empty($request->business)) $business = 1; else $business = 0;
		if(!empty($request->salaried)) $salaried = 1; else $salaried = 0;
		if(!empty($request->housewife)) $housewife = 1; else $housewife = 0;
		if(!empty($request->looking_opp)) $looking_opp = 1; else $looking_opp = 0;
		$insertDataArr = array("users_id"=>$request['userID'],"vendordetails_id"=>$request['vendordetails_id'],"startDate"=>strtotime($request['startDate']),"endDate"=>strtotime($request['endDate']) , "ageFrom"=>$request['ageFrom'],"ageTo"=>$request['ageTo'],'gender'=>$request['gender'], "student"=>$student , "business"=>$business, "salaried"=>$salaried , "housewife"=>$housewife , "looking_opportunity"=>$looking_opp , "description"=>$request['postDescription'],"image"=>$imageName,"postType"=>$request['postType'], "status"=>"N", "adminStatus"=>"N","applyFilteration"=>$filtration,"month"=>date("m"),"year"=>date("Y"),"paidStatus"=>$request->input("paidStatus"));   
		$vPostAds= Advertisement::create($insertDataArr);
	    if($vPostAds){ return $vPostAds->id; }
		else{ return FALSE; } 
   }
   
   
	public static function editPostAds($request , $imageName){
	    if(!empty($request->filtration)) $filtration = 1; else $filtration = 0; 
 	    if(!empty($request->student)) $student = 1; else $student = 0; 
		if(!empty($request->business)) $business = 1; else $business = 0;
		if(!empty($request->salaried)) $salaried = 1; else $salaried = 0;
		if(!empty($request->housewife)) $housewife = 1; else $housewife = 0;
		if(!empty($request->looking_opp)) $looking_opp = 1; else $looking_opp = 0;
	    
		$editDataArr = array("startDate"=>strtotime($request['startDate']),"endDate"=>strtotime($request['endDate']) , "ageFrom"=>$request['ageFrom'],"ageTo"=>$request['ageTo'],'gender'=>$request['gender'], "student"=>$student , "business"=>$business, "salaried"=>$salaried , "housewife"=>$housewife , "looking_opportunity"=>$looking_opp , "description"=>$request['postDescription'],"image"=>$imageName,"postType"=>$request['postType'], "status"=>"N", "adminStatus"=>"N","applyFilteration"=>$filtration, "updated_at"=>date("Y-m-d H:i:s") , "paidStatus"=>$request->input("paidStatus"));   
	    $updateResult = DB::table('advertisement')
                      ->where(array("id"=>$request->editID))
                       ->update($editDataArr);
	    if($updateResult){ return TRUE; }
		else{ return FALSE; } 
	}
   
    public static function getAdvertisement($condition,$adsPostID=NULL){
	   if(!empty($adsPostID)){
		   $vAdsPostList = Advertisement::where($condition)->first();
          	if(count($vAdsPostList) > 0){ return $vAdsPostList; }											   
	        else{ return FALSE; } 
		}
		 
	   $vAdsPostList = Advertisement::where($condition)->orderBy('created_at', 'DESC')->simplePaginate(5);
	    if(count($vAdsPostList) > 0){ return $vAdsPostList; }											   
	    else{ return FALSE; } 
	}
	
	public static function getuserAdvertisement($condition){
	   $vAdsPostList = Advertisement::where($condition)->orderBy('id', 'DESC')->paginate(10);  ;
	    if(count($vAdsPostList) > 0){ return $vAdsPostList; }											   
	    else{ return FALSE; } 
	}
	
	 public static function getallAdsPotsValid($condition){
	         $result = Advertisement::where($condition)->orderBy('id', 'DESC')->get();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }
	 
     }
	
	public static function getAllAdvertisement($condition){
		 $result = DB::table('advertisement as a')
			         	->join('vendordetails as b', 'b.id', '=', 'a.vendordetails_id')
					    ->select('a.*','b.vName','b.vEmail','b.id as vid')
						->where($condition)
						->orderBy('created_at', 'DESC')
						->get();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }
	}
	
	public static function getAlluserAdvertisement($condition,$adsID=NULL){
		 $result = DB::table('advertisement as a')
			         	->join('users as b', 'b.id', '=', 'a.users_id')
					    ->select('a.*','b.name','b.email')
						->where($condition)
						->orderBy('id', 'DESC')
						->get();
	          if(count($result) > 0){ return $result; }
			  else{ return FALSE; }
	}
	
   
   
    public static function BlockorUnblock($data,$where){
	  $result =  DB::table('advertisement')
                       ->where($where)
                       ->update($data);
      //$result =  VendorPostAds::where($where)->update($data);
	  if($result){
		  return TRUE; 
		 }else{ return FALSE; }				   
	} 
   
    public static function getMonthlyAdvertisement($formData){
	   $month = date("m");
	   $year = date("Y");
	   $result = DB::table("advertisement")
	                 ->where(array("vendordetails_id"=>$formData['vendordetails_id'],"month"=>$month,"year"=>$year))
	                 ->count();
       if($result)return $result; else return FALSE;					 
					
	} 
}
