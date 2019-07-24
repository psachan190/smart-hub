<?php
namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class LoginModal extends Model{
   protected  $table = "knpadmin";
   public $timestamps = false;
   //protected $guarded = array('_token','');
   
   
   public static function adminLogin($request){
      if(is_numeric($request->username)){ $whereArr = array("mobile"=>$request->username);   }
	  else{ $whereArr = array("email"=>$request->username);   } 
	  $result = DB::table('knpadmin')->where($whereArr)->first();
	  if(count($result) > 0)return $result; else FALSE;
   }
}
?>