<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Session;
use App\KnpShopImage;
use App\ComplainSubject;
use App\ComplainModel;
use Auth;
use EmailChecker\EmailChecker;
use Mail;


class SubscribeController extends Controller{
   
   public function subscribers(Request $request){
	  //$checker = new EmailChecker();
      //$result  = $checker->isValid($request->email);     // true
      //$result = $checker->isValid($request->email); // false
	   $validator = Validator::make($request->all(),array(
          'email' => 'required|email_checker',
        ));
          if($validator->fails()){
              return json_encode(
                       array(
                         "error"=> $validator->errors()->getMessages(),
                         "vStatus"=>400
                          ));
             }
	
	  //print_r($result);
	  //$result = EmailChecker::isValid($request->email);
	   //$checker = app()->make('email.checker');
      //$result =  $checker->isValid($request->email);
	  //print_r($result);
	}
   
   
	public function usersContactForm(Request $request){
	   $v = array("name"=>"required","email"=>"required","mobile"=>"required","type"=>"required","comment"=>"required"); 
	   $this->validate($request,$v);
	     $data = array("name"=>$request->name,"email"=>$request->email,"mobile"=>$request->mobile,"enquiry"=>$request->type,"comment"=>$request->comment);
	     Mail::send('emails.userContact', $data, function ($message){
					$message->from('info@kanpurize.com', 'Kanpurize User Enquiry');
					$message->to("info@kanpurize.com")->subject('User Enquiry!');
					});
		 if(Mail::failures()) {
             return redirect("Kanpurize_index?fails");
          }
		 else{
		     return redirect("Kanpurize_index?success");
		  } 			
					
	}
   
   
}
