<?php
namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class VendorShopImage extends Model{
    protected  $table = "knp_vendorshopimage";
	public $timestamps = false;
	protected $fillable = array('id','users_id','vendordetails_id','cImageStatus','adminStatus','bannerImage','bannerImagePath','bannerImageeditdate');
	
	public static function addshopProfileImage($data){
		$data['adminStatus'] = "N";
		$data['cImageStatus'] = "N"; 
		 $insertData =  VendorShopImage::create($data);
		  if($insertData){ return TRUE; }
		  else{ return FALSE; }
	}
	
	public static function getShopImage($shopID){
	   $shopimageData = VendorShopImage::where(array("vendordetails_id"=>$shopID))->first();
	   if(!empty($shopimageData)){ return $shopimageData; } else FALSE;
	 }  
	
	public static function editprofileImage($data){
		$updateData = array("thumbsnailPath"=>$data['thumbImagePath'],"thumbnailsImg"=>$data['thumbImage'],"shoplogoPath"=>$data['shopLogoPath'],"shoplogoImg"=>$data['shopprofileLogo'],"editDate"=>time(),"cImageStatus"=>"Y");
        $updateResult = DB::table('knp_vendorshopimage')
                             ->where(array("vendordetails_id"=>$data['shopID']))
                             ->update($updateData);
	    if($updateData){ return TRUE; }
		else{ return FALSE; }						 
	 }
	 
	 public static function ShopBannerImage($request,$imageName,$bannerImagePath){
		 $updateProducts = DB::table('knp_vendorshopimage')
                           ->where(array("vendordetails_id"=>$request['shopID']))
					       ->update(array("bannerImage"=>$imageName,"bannerImagePath"=>$bannerImagePath,"bannerImageeditdate"=>time())); 
		 if($updateProducts){ return TRUE; }
		 else{  return FALSE; }
	  } 
}
?>