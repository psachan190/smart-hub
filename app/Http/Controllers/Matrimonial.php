<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Illuminate\Html\FormFacade;
use validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Check;
use App\Account_model;
use App\Models\Ngo_model;
use App\Matrimonial_model;
use App\Knp_common;
use App\VendorDetails;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Image;


class Matrimonial extends Controller {
	
	public $annual_income = array(1=>"No Income" , 2=>"Rs. 0 - 1 Lakh " , 3=>"Rs. 1 - 3 Lakh " , 4=>"Rs. 3 - 5 Lakh " , 5=>"Rs. 5 - 7 Lakh" , 6=>"Rs. 7 Lakh  to above " , 7=>"" , 8=>"");
	
	public function index($page = "matrimonial"){
	  $data['title'] = "Matrimonial Profile in Kanpur";
	  if (session()->has('knpuser')) { $data['user'] = User::where(['id' => session()->get('knpuser')])->first(); }
	  Knp_common::ip();
	  $data['all_matrimonialProfile'] = Matrimonial_model::get_all_matprofile();
	  if(view()->exists('matrimonial.'.$page))
		  return view("matrimonial.".$page)->with($data);
	   else
		  return view('404')->with($data);
	}
	
	public function page($page = "matrimonial" , $first = NULL , $second = NULL ){
		$data['title'] = "Matrimonial Profile in Kanpur";
		if (session()->has('knpuser')) { $data['user'] = User::where(['id' => session()->get('knpuser')])->first(); }
		Knp_common::ip();
		$data['mat_profile_details'] = Matrimonial_model::get_matrimonial_profile('1' , array("enctype_id"=>$first));
		$data['page'] = $page;
		if($page == "profile"){
			$data['annual_income'] = $this->annual_income;	
					//echo "<pre>";
			//print_r($data['mat_profile_details']);exit;
		   $data['country'] = Matrimonial_model::get_country();
		   $page = "matrimonialprofile";
		  }	
		if($page == "photos"){
		    
		  }  
		  
		if(view()->exists('matrimonial.'.$page))
		  return view("matrimonial.".$page)->with($data);
	    else
		  return view('404')->with($data);  	
	}
	
	public function get_matrimonial(){
	  $data['title'] = "Matrimonial Profile in Kanpur";
	  $data['my_matrimonialProfile'] = Matrimonial_model::get_matrimonial_profile(['user_id'=>session()->get('knpuser')]);
	  return view("matrimonial.get_matrimonial")->with($data);
	}
	
	public function postaction(Request $request , $action){
	  if(empty(Auth::user()->id) || empty(session()->has('knpuser'))){
		 return view('auth.login')->with(array('msg'=>'<div class="notice notice-danger"><strong>Wrong , </strong> Login First. </div> '));
		}
	  if($action=="create_matrimonial_profile"){
	      $message= ['required' => 'The :attribute can not be blank.'];
	      $v = array('profileName'=>'required','gender' =>'required','DateofBirth'=>'required','aboutProfile'=>'required');
	      $this->validate($request,$v, $message);
          $today = date("Y-m-d");
          $diff = date_diff(date_create($request->DateofBirth), date_create($today));
          if($request->gender == "M"){
			 if( $diff->format('%y') < 21){
			      return redirect()->back()->with(['msg'=>'<div class="notice notice-danger"><strong>Wrong , </strong> Not Eligible ,Because Minimum Age Restriction . </div>']);  
			   }  
			}
		  if($request->gender == "F"){
			  if( $diff->format('%y') < 18){
			     return redirect()->back()->with(['msg'=>'<div class="notice notice-danger"><strong>Wrong , </strong> Not Eligible ,Because Minimum Age Restriction . </div>']);  
			   }
			}	
		 if($request->termandcondition == 1){
	          $result = Matrimonial_model::create_motrimonial_profile($request->all());
			 if($result != FALSE){ 
	             return redirect()->back()->with(['msg'=>'<div class="notice notice-success"><strong>Success , </strong> Registration Successfully .. </div>']);  
	           } 
	         else{
	            return redirect()->back()->with(['msg'=>'<div class="notice notice-danger"><strong>Wrong , </strong> Unexpected try again ... </div> ']);  
	          }   
	      }
	     else{
	        return redirect()->back()->with(['msg' => '<div class="notice notice-danger"><strong>Wrong , </strong> Please accept all term and condition !!!. </div>']);  
	      } 
	   }
	   
	  if($action=="mat_personal_profile"){
		   if(!empty($request->country)){
			  $countryArr = explode("/",$request->country);
			  $country_id = $countryArr[0]; $country_name = $countryArr[1]; }
		   else{ $country_id = 0; $country_name = 0; }
		   if(!empty($request->state)){ $stateArr = explode("/",$request->state); $state_id = $stateArr[0]; $state_name = $stateArr[1]; }
		   else{ $state_id=0; $state_name = 0;  }
		   if(!empty($request->city)){ $cityArr = explode("/",$request->city); $city_id = $cityArr[0]; $city_name = $cityArr[1]; }
		   else{ $city_id=0; $city_name = 0;  }
		   $result = $this->mat_profile(array("religion"=>$request->religion,"caste_id"=>$request->caste,"sirname"=>$request->subname,"manglik"=>$request->manglik,"horoscope_match"=>$request->horoscope_match,"height"=>$request->height,"country_id"=>$country_id,"country"=>$country_name,"state_id"=>$state_id,"state"=>$state_name,"city_id"=>$city_id,"city"=>$city_name,"pincode"=>$request->pincode,"marital_status"=>$request->manglik),array("id"=>$request->mat_id));
		  //print_r($result);exit;
		   if($result != FALSE){
			     echo '<div class="notice notice-success"><strong>Success , </strong> Your personal Details Save successful . </div>';exit;
			 }
			else{
			   echo '<div class="notice notice-warning"><strong>Wrong , </strong> Some thing Not Save . </div>';exit;
			 } 
		} 
	   if($action=="family_details"){
		   $result = $this->mat_profile(array("family_type"=>$request->family_type,"fathers_occupation"=>$request->fathers_occupation,"mothers_occupation"=>$request->mothers_occupation,"brothers"=>$request->brotehrs,"brother_married"=>$request->brotehrs_married,"sister"=>$request->sister,"siste_married"=>$request->sister_married,"family_living"=>$request->family_living,"native_city"=>$request->native_city,"contact_address"=>$request->contact_address,"about_family"=>$request->about_family),array("id"=>$request->mat_id));
		if($result != FALSE){
			  echo '<div class="notice notice-success"><strong>Success , </strong> Family Details Save successful . </div>';exit;
			 }
			else{
			   echo '<div class="notice notice-warning"><strong>Wrong , </strong>Some thing Not Save . </div>';exit;
			 } 
		 }
		 	
	   	if($action=="educationDetails"){
			  $result = $this->mat_profile(array("qualification"=>$request->highest_degree,"collage_name"=>$request->college_name,"occupation"=>$request->occupation,"annual_income"=>$request->annual_income,"express_yourself"=>$request->express_yourself),array("id"=>$request->mat_id));
			if($result != FALSE){
				echo '<div class="notice notice-success"><strong>Success , </strong> Education Details Save successful . </div>';exit;
				 }
				else{
				    echo '<div class="notice notice-warning"><strong>Wrong , </strong>Some thing Not Save . </div>';exit;
				 } 
		  }
		  
	    
		  
		 if($action=="desired_partner"){
			 $result = $this->mat_profile(array("desired_religion"=>$request->desired_religion,"desired_caste"=>$request->desired_caste,"desired_subname"=>$request->desired_subname,"desired_manglik"=>$request->desired_manglik,"desired_maritalStatus"=>$request->desired_married_status,"desired_height"=>$request->desired_height,"desired_age"=>$request->desired_age,"desired_education"=>$request->desired_education,"desired_income"=>$request->desired_income,"desired_occupation"=>$request->desired_occupation),array("id"=>$request->mat_id));
			if($result != FALSE){
					 echo "<p style='color:#3e5946;'><strong><i class='fa fa-check'></i>&nbsp; Record Save successfully .</strong></p>";
				 }
				else{
				   echo "<p style='color:#3e5946;'><strong><i class='fa fa-check'></i>&nbsp; Unexpected try again  .</strong></p>";
				 } 
		   } 
		  
	}
	
	public function ajaxPostAction(request $request  , $action){	  
	  if($action == "upload_profile"){	    
		   if(!empty($request->file('mat_profileImage'))){	
			 $imageName =  $this->matrimonial_image($request);
			 if($imageName != 100){
				 $original_url = url("uploadFiles/matrimonial_image/original/$imageName");
			     if(Matrimonial_model::upload_mat_image($request , $imageName  , $original_url) != FALSE){
				     $get_photos = Matrimonial_model::getProfileImage($request->mat_id);
					 return json_encode(array('status'=>1 , 'getPhoto'=>$get_photos) );
					 //echo '<div class="notice notice-success"><strong>Yes , </strong> Image Upload Successful.</div>';exit; 
				   }
				 else{
				     return json_encode( array('msg'=>'<div class="notice notice-danger"><strong>Oops , </strong> Unexpected , try again .</div>',
					                    'status'=>2 ));
				   }  
			   }
			 else{
				 return json_encode( array('msg'=>'<div class="notice notice-danger"><strong>Wrong , </strong> Image must be required format , jpeg , png , jpg . </div>',
					                    'status'=>2 ));
			   }  
		   }
		   else{
			    return json_encode( array('msg'=>'<div class="notice notice-danger"><strong>Wrong , </strong> Image Must be required. </div>',
					                    'status'=>2 ));
		   } 
		}
	}
	
	public function getAction(Request $request , $action){
	  if($action == "getCast"){
		 $religionArr =  explode("/" , $request->religion);
		 $result =  Matrimonial_model::getCastbyReligion($religionArr[0]); 
		 if($result != FALSE){
		     return json_encode(array("status"=>100 , "cast"=>$result));
		   }
		 else{
		     return json_encode(array("status"=>200 , "cast"=>"blank"));
		   }  
		}	
		
	  if($action == "getUserDetails"){
		  if(!empty($request->createFor)){
			$userDetails = User::get_users_details(array("id"=>session()->get('knpuser')));
		    if($userDetails != FALSE)return json_encode($userDetails);
			}
		}	
	  if($action == "getPhotos"){
		 if(!empty($request->profile_id)){
		    //$get_social_prodile = DB::table("social_images")->where(array("user"=>))->get();
			$get_photos = Matrimonial_model::getProfileImage($request->profile_id);
			return json_encode($get_photos);
			//echo "<pre>";
			//print_r($get_photos);exit;
		   }
		}	
	  if($action=="about_mat_profile"){
	        if(!empty($request->mat_id)){
			  $result = Matrimonial_model::edit_mat_profile(array("about_profile"=>$request->aboutProfle),array("id"=>$request->mat_id));
			  if($result != FALSE){
			    echo '<div class="notice notice-success"><strong>Yes , </strong> About details add successful .</div>';exit;
			  }
			  else{
			     echo '<div class="notice notice-warning"><strong>Opps , </strong> Somethings not update . </div>';exit;
			  } 
			}
		  else{   echo '<div class="notice notice-danger"><strong>Wrong , </strong> Unexpected try again . </div>';exit; }	
		}
		
	  if($action=="getState"){
		  if(!empty($request->country)){
			  $countryArr = explode("/",$request->country);
			  $result = Matrimonial_model::get_state( (int) $countryArr[0]); 
			  return json_encode($result);  
			}
		  else{  echo "Unexpected try again ."; }
		}	
	  if($action=="getCity"){
		  if(!empty($request->state)){
			  $stateArr = explode("/",$request->state);
			  $result = Matrimonial_model::get_city( (int) $stateArr[0]); 
			  if($result != FALSE) return json_encode($result); else 101;
			  
			}
		  else{  echo "Unexpected try again ."; }
		}	
	}
	
	public function mat_profile($formData,$con){
	   return Matrimonial_model::edit_mat_profile($formData,$con);
	  
	}
        
}