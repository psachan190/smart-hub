<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Session;
use App\Models\Ngo_model;
use Illuminate\Support\Facades\DB;
use Illuminate\Html\FormFacade;
use validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Validation_model;


class Validate_controller extends Controller{
   
  
   public function validate_emails(){
		if(!empty($_GET['ngoemail'])){
		   $result = Validation_model::email($_GET['ngoemail']);
		   if($result != FALSE){ 
		     echo 1; }
		   else{ 
		     echo 2;
		   }
		}
	}
	
	
	public function validate_contact(Request $request){
		if(!empty($request->ngocontact)){
		   $result = Validation_model::contact($request->ngocontact);
		   if($result != FALSE){  echo 1; }
		   else{  echo 2; }
		}
	}
	
	public function validate_username(Request $request){
    	if(!empty($request->username)){
		   $exist = DB::table('ngo_tbl')->where('user_name',$request->username)->first(); 
		   if(count($exist) > 0 ){ echo 1; }
		   else{ echo 2; }
		}
	}
	
   
}
