<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  //  protected $redirectTo = '/kanpurizeMarketplace';
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


     public function loginNameOrEmail(Request $request){
		 //echo "<pre>";
		 //print_r($request->all());exit;
		 if(is_numeric($request->email)){
		      $crediantial = array("mobileNumber"=>$request->email,"password"=>$request->password,"status"=>1);
			}
		  else{
			  $crediantial = array("email"=>$request->email,"password"=>$request->password,"status"=>1);
			}	
         if(Auth::attempt($crediantial)){
            //echo "<pre>"; print_r(Auth::user()); die();
			session(array('knpUser_id'=>Auth::user()->id,'knpUser_name'=>Auth::user()->name,'knpUser_email'=>Auth::user()->email,'knpUser_roll_id'=>Auth::user()->roll_id,'gender'=>Auth::user()->sex));
			session(array('knploggedin'=> 'Y', 'knpuser'=>Auth::user()->id));
            return redirect('kanpurizeMarketplace');
            //return redirect('/home');
        }
        else {
            return redirect('login')->withErrors(['email'=>'These credentials do not match our records.Please Try again'])->withInput($request->input());
        }
    }

    // public function username() {
    //     return $this->username;
    // }
}
