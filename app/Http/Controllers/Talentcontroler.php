<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
//use validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\loginModal;
use App\Models\User;
use App\VendorRegistration;
use App\VendorCategory;
use App\Knp_vendorbusinesstype;
use App\KnpPincodeModel;
use Session;
use App\VendorDetails;
use App\VendorPostAds;
use App\Products;
use App\KnpShopImage;
use App\ComplainSubject;
use App\ComplainModel;
use App\ComplainDetails;
use App\OfferNewsModel;
use App\Advertisement;
use App\AdsProfession;
use App\Ngo_model;
use App\Matrimonial_model;
use App\Blog;
use Cart;
use Auth;
use Hash;
use App\WishList;
use Mail;
use Image; 
use App\Notifications\Talentvote;
use App\Notifications\TalentParticipant;
use App\Notifications\TalentPublish;
use Illuminate\Notifications\Notifiable;
use Notification;


use App\Events\TaskEvent;


class Talentcontroler extends Controller{
	//public $meta_keywrd;
	//public $meta_description;
	//public $page;
	public $imageArr = array("jpeg" , "png" , "jpg" , "JPEG" , "PNG" ,"JPG" );
	public function __construct(){
	 // $this->meta_keywrd = "meta key word for jitu";
	}
	
	public function event(){
            event(new TaskEvent("Welcome"));
            //echo "function is work";exit;
         }
	
	
	public static function registerTalent(){
           $users = User::where(array("roll_id"=>8))->get();
           //TalentPublish();
           
           //$users->notify(new TalentParticipant);
           //$this->dispatch(new TalentParticipant ());
           $id=1;
           $link_url = url("https://www.kanpurize.com/admin/participantTimeline/$id");   
           $mailData = array("heading"=>"JItendra sahu is registered his Talent in Kanpurize Talent page ." , "talent_title"=>"demo" , "link_url"=>$link_url);
           $result = Notification::send($users , new TalentParticipant ($mailData));
           echo "<pre>";
           print_r($result );exit;
           echo "function is work";
        }
	
	
    public function page($page = "talent" , $para=NULL){
      $data['title'] = ucfirst($page);  
      $data['device_type'] = $this->check_device();	
	  if(session()->has('knpuser')) { $data['user'] = User::where(['id' => session()->get('knpuser')])->first(); }
	   $data['my_participantList'] = Blog::my_participant(array("user_id"=>session()->get('knpuser')));		
	  
	  
	   if($page == "talent"){
		 $data['talentListArr'] = Blog::getTalent();
		 $data['upcoming_talent'] = Blog::getTalent("upcoming");
		 $data['closed_talent'] = Blog::getTalent("close");
		 $data['recent_talent'] = Blog::getTalent("recent");
		
		  if(!empty($para) || !is_null($para)){
			 $data['talentDetails'] = Blog::getallTalent("Y" , $para);
			  /*sharing script start*/
			 $data['sharedUrl'] = url("talent/talent/$para");
			 $data['sharetitle'] = "Vote for ".$data['talentDetails']->title;
			 $data['sharedescription'] = strip_tags($data['talentDetails']->description);
			 $data['shareimageUrl'] = url('uploadFiles/talent')."/".$data['talentDetails']->image;
			 //print_r($data['shareimageUrl']);exit;
			 /*sharing script End*/
			 $page = "single_talent";
			  $data['talent_enc_id'] = $para;
			}
		} 
		
	  if($page=="participants"){
	     //if(empty(session()->has('knpuser')))return view("auth.login");  
		 if(empty($para))return redirect()->back();
		  $data['talentDetails'] = Blog::getallTalent("Y", $para);
		  $data['upcoming_talent'] = FALSE;
		  $data['closed_talent'] = FALSE;
		  $data['recent_talent'] = FALSE;
		  if($data['talentDetails']->registerEntrydate >= time() ){
			  $data['upcoming_talent'] = TRUE;
			}
		  if($data['talentDetails']->registerExpirydate <= time() ){
			  $data['closed_talent'] = TRUE;
		    }
	       if($data['talentDetails']->registerEntrydate <= time() && $data['talentDetails']->registerExpirydate >= time()){
			  $data['recent_talent'] = TRUE;
			}		
		  $data['all_participate'] = Blog::get_participate($data['talentDetails']->id , "Y");
		  $data['voteDetails'] = Blog::getVoteDetails($data['talentDetails']->id , session()->get('knpuser'));	  
		  $data['talent_enc_id'] = $para;
		  $data['obj'] = new Blog;
		}
		
		
	  if($page == "register"){
	        if(empty(session()->has('knpuser')))return view("auth.login");
		  $data['talentDetails'] = Blog::getallTalent("Y" , $para);
		}
	
          if($page == "upload_talent_work"){
		  if(!empty($para)){
		  
		   if(empty(session()->has('knpuser')))return view("auth.login"); 
			 $data['participantDetails'] = Blog::getParticipateDetails(array("encrypt_id"=>$para));
			
			  $data['allParticipantData'] = Blog::getParticipantData(array("participant_id"=>$data['participantDetails']->id));
			  //echo "<pre>";
			  //print_r($data['allParticipantData']);exit;
			 $data['participant_id'] = $data['participantDetails']->id; 
			}
		  else{ return redirect()->back(); }			
		}	
		
			
	if($page == "participant_work"){
	 	 //if(empty(session()->has('knpuser')))return view("auth.login");  
		 //$data['participateData'] = Blog::get_participate($talentDetails->id , "Y"); 
		 $data['my_participantDetails'] = Blog::my_participant($para);
		 $data['talentDetails'] = Blog::getTalent("Y", $data['my_participantDetails']->talent_id);
			  $data['upcoming_talent'] = FALSE;
			  $data['closed_talent'] = FALSE;
			  $data['recent_talent'] = FALSE;
			  if($data['talentDetails']->registerEntrydate >= time() ){
				  $data['upcoming_talent'] = TRUE;
				}
			  if($data['talentDetails']->registerExpirydate <= time() ){
				  $data['closed_talent'] = TRUE;
				}
			   if($data['talentDetails']->registerEntrydate <= time() && $data['talentDetails']->registerExpirydate >= time()){
				  $data['recent_talent'] = TRUE;
				}
		 $data['allParticipantData'] = Blog::getParticipantData(array("participant_id"=>$data['my_participantDetails']->id , "data_type"=>1));
		 $data['allParticipantDatavideo'] = Blog::getParticipantData(array("participant_id"=>$data['my_participantDetails']->id , "data_type"=>2)); 
		 
		  $data['voteDetails'] = Blog::getVoteDetails($data['my_participantDetails']->talent_id , session()->get('knpuser'));
		  /*sharing script start*/
			 $data['sharedUrl'] = url("talent/participant_work/$para");
			 $data['sharetitle'] = "Vote for ".$data['my_participantDetails']->title;
			 $data['sharedescription'] = strip_tags($data['my_participantDetails']->description);
			 $data['shareimageUrl'] = url('uploadFiles/talent')."/".$data['my_participantDetails']->image;
		 /*sharing script End*/
		}
								
	  if(view()->exists('talent.'.$page)) {
		   return view("talent.".$page)->with($data);
		}	
	   else{
		  return view('404')->with($data);
		}
	  //return view("talent.".$page)->with($data);
     }
	
	public function get_keyword($page){
	  //return $page;
	} 
	 
	public function action(Request $request , $action){
	  if(!session()->has('knpuser') ||  session()->get('knpuser') == ""){ return view('auth.login'); }	
	  
	  if($action == "youtubeVideoLink"){
		 if(!empty($request->youtube_embeded_code)){
			 $result = Blog::addYoutubeLink($request);
			 if($result != FALSE){
			   return json_encode(array("msg"=>'<div class="notice notice-success"><strong> Yes , </strong> Record Save successful . </div>',  "vStatus"=>200 , "success"=>1));exit;
			   }
			 else{
			   return json_encode(array("msg"=>'<div class="notice notice-success"><strong> Wrong , </strong> Unexpected try again . </div>',  "vStatus"=>200));exit;
			   }  
		   }
		   else{
		      return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Wrong , </strong> Link field is required . </div>',  "vStatus"=>200));
		   }
		   
		}
			
	  if($action == "upload_photo"){
		 if(count($request->work_image) > 0){
		     $talent_imageoriginPath = public_path('uploadFiles/talent/original');
			 $thumbimagePath = public_path('uploadFiles/talent');
			 if(!is_dir($thumbimagePath)){ mkdir($thumbimagePath, 0755, true); }
			 if(!is_dir($talent_imageoriginPath)){ mkdir($talent_imageoriginPath, 0755, true); }
			 $result = FALSE;
			 for($i = 0; $i < count($request->work_image); $i++){
				$filename = md5(microtime()).'.'.$request->file('work_image')[$i]->getClientOriginalExtension();
			    if(in_array($request->file('work_image')[$i]->getClientOriginalExtension() , $this->imageArr )){
					 $talentthumbImage = Image::make($request->file('work_image')[$i]->getRealPath())->resize(70 , 70);
			         $talentthumbImage->save($thumbimagePath.'/'.$filename , 80);
					 $request->file('work_image')[$i]->move($talent_imageoriginPath  , $filename);
					 $data_path = url("uploadFiles/talent/original/$filename"); 
					 $result = Blog::uploadTalentData($request->all() , $request->about_photo[$i] , $data_path , $filename);
				   }
			  }
		     if($result != FALSE){
			   return json_encode(array("msg"=>'<div class="notice notice-success"><strong> Success , </strong> Record Save successful .</div>',  "vStatus"=>100 , "success"=>1));exit;
			   }
			 else{
			   return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Wrong , </strong> Unexpected try again . </div>',  "vStatus"=>100));exit;
			   }  
		   }
		 else{
			 return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Wrong , </strong> Image must be required . </div>',  "vStatus"=>100));exit;  
		  }  
		}
		
		
		if($action == "editRegister_talent"){
		  $validator = Validator::make($request->all(),array('name'=>'required' , 'title'=>'required',"description"=>"required" , "participantID"=>"required"));
		  if($validator->fails()){
              return json_encode(array("error"=> $validator->errors()->getMessages(),  "vStatus"=>400));
              }
		  if(!empty($request->file('talent_profileImage'))){
			  $image = $this->talentBannerImage($request->all());
			   if($image == 100){
				   return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Oops , </strong> Image must be support , jpg , jpeg , png . </div>',  "vStatus"=>100));exit;
				 }
			}
		  else{ $image = $request->talent_profileImageCopy; }		 
		    $result = Blog::editParticipantData($request , $image);
			 if($result != FALSE){
				 return json_encode(array("msg"=>'<div class="notice notice-success"><strong> Yes , </strong> Record Update successful . </div>',  "vStatus"=>100 , "success"=>1)); 
				   }
				 else{
				    return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Oops , </strong> Unexpected try again . </div>',  "vStatus"=>100)); 
				   }
			
		}
		
		
             if($action == "register_talent"){
                 $validator = Validator::make($request->all(),array('title'=>'required',"description"=>"required" , "talent_id"=>"required|numeric"));
		  if($validator->fails()){
                  return json_encode(array("error"=> $validator->errors()->getMessages(),  "vStatus"=>400));
                }
		  if(!empty($request->file('talent_profileImage'))){
			  $uploadImageResult = $this->talentBannerImage($request->all());
			  if($uploadImageResult != 100){
				 $result = Blog::talentParticipate($request , $uploadImageResult);
				 if($result != FALSE){
				     //$users = User::where(array('roll_id'=>8))->get();
				     //echo "<pre>";
				     //print_r($user);exit;
				     //$users->notify(new TalentParticipant);

				     $talentDetails = Blog::getParticipateDetails(array("id"=>$result));
				     return json_encode(array("msg"=>'<div class="notice notice-success"><strong> Yes , </strong> Record Save successful . </div>',  "vStatus"=>100 , "success"=>1 , "inserted_id"=>$talentDetails->encrypt_id)); 
				   }
				 else{
				    return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Oops , </strong> Unexpected try again . </div>',  "vStatus"=>100)); 
				   }  
				}
			  else{
				 return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Oops , </strong> Image must be support , jpg , jpeg , png . </div>',  "vStatus"=>100)); 
				}	
			}
		  else{
			 return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Oops , </strong> Image must be required  . </div>',  "vStatus"=>100));
			}	
		} 
	}  
	
	
	
	public function actionGetAjax(Request $request , $action){
	  if(!session()->has('knpuser') ||  session()->get('knpuser') == ""){ return view('auth.login');exit; }		
       if($action == "voteForParticipant"){
                
		  if(!empty($request->participantID)){
			 $talentDetails = Blog::getParticipateDetails(array("id"=>$request->participantID));
			 //$users = User::find(session()->get('knpuser'));
			 //$users = User::find($talentDetails->user_id);
			 //$mailData = array("heading"=>"Voted to you ." , "talent_title"=>$talentDetails->title);
			 //$users->notify(new Talentvote($mailData));
			 //echo "<pre>";
			 //print_r($users );exit;
			 if($talentDetails != FALSE){
			     $duplicateVote = Blog::getVoteDetails($talentDetails->talent_id , session()->get('knpuser'));
				 if($duplicateVote == FALSE){
				     $result = Blog::addVoting($talentDetails);   
					 if($result != FALSE){
						 return json_encode(array("msg"=>'<div class="notice notice-success"><strong> Thanx , </strong> Voting Successful . </div> ', "status"=>100));
					   }
					 else{
						return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Wrong , </strong> Unexpected try again  . </div>', "status"=>100));
					   }   
				   }
				  return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Wrong , </strong> You have been to already voted ,  . </div>', "status"=>100)); 
			   }
			}
		 }
		 
		  
           if($action == "deleteParticipantdata"){
		  if(!empty($request->deleteID)){
			   $pData = Blog::getParticipantData(1,$request->deleteID);
			   if(!empty($pData->imageName)){
				   $talent_imageoriginPath = public_path('uploadFiles/talent/original');
				   $thumbimagePath = public_path('uploadFiles/talent');
				   $p1 = $talent_imageoriginPath."/".$pData->imageName;
				   $p2 = $thumbimagePath."/".$pData->imageName;
				   if(file_exists($p1)){  unlink($p1); }
			           if(file_exists($p2)){ unlink($p2); }
				}
			  
			  $result = Blog::deleteParticipantdata($request->deleteID , session()->get('knpuser'));
			  if($result != FALSE){
				return json_encode(array("msg"=>'<div class="notice notice-success"><strong> Success , </strong> Data Remove Successful. </div>', "status"=>100 , "success"=>1));
				}
			  else{
			   return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Wrong , </strong> Unexpected try again . </div>', "status"=>100));
			    }
			}
		  else{
			 return json_encode(array("msg"=>'<div class="notice notice-danger"><strong> Wrong , </strong> Unexpected try again . </div>', "status"=>100)); 
			}	
		}	
					 
	}
	
	
}
