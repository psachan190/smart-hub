<?php

namespace App\Models;
use App\Library\sHelper;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
	use Notifiable;
	protected $table="users";
    protected $fillable = [
        'name', 'email', 'password','roll_id'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public static function adminLogin($request){
          if(is_numeric($request->username)){ $whereArr = array("mobile"=>$request->username);   }
	  else{ $whereArr = array("email"=>$request->username);   } 
	    $result = User::where($whereArr)->first();
	  if(count($result) > 0)return $result; else FALSE;
         }
	
	
	public static function signUp($formData){
	     if($formData['gender'] == "M"){ $gender = "male.png"; }
	     if($formData['gender'] == "F"){ $gender = "female.png"; }
		$date = time();
            	$username = str_replace(" ","",$formData['name']).time();
            	$userData = array(
             		"name"=>$formData['name'],
             		"lname"=>$formData['lname'],
             		"email"=>strtolower($formData['email']),
             		"password"=>bcrypt($formData['password']),
			"created_at"=>$date,
			"updated_at"=>$date,
             		"mobileNumber"=>$formData['mobile'],
             		"sex"=>$formData['gender'],
             		"phone"=>$formData['mobile'],
             		"roll_id"=>1,
             		"username"=>$username,
             		"profile_image"=>$gender ,
             		"pincode"=>$formData['pincode'],
             		"otp"=>rand(1000,9999),
			"otpTiming"=>time()
             	);
		$userDataID =  DB::table('users')->insertGetId($userData);
		if($userDataID){
                 	
                 	$userData = DB::table("users")->where(array("id"=>$userDataID))->first();
	             	if(count($userData) > 0){ return $userData; }
	             	else{ return FALSE; }	
                }
              	else{ return FALSE;  }     
         }


        public static function editUsersDetails($con , $dataArr){
	  $result = DB::table('users')->where($con)->update($dataArr);
	  if($result)return TRUE; else return FALSE;
	}
       
	
	public static function get_users_details($con , $action=NULL){
	   if($action == "find"){
	        $result = User::where($con)->first();
	        if(count($result) > 0)return $result; else FALSE; 
	     }
	   $result = DB::table("users")->where($con)->first();
	   if(count($result) > 0)return $result; else return FALSE;
	}
	
	 public static function verifyotpStatus($data,$condition){
		 $result =  DB::table('users')->where($condition)->update($data);
	     if($result){ return TRUE;   }
	     else{ return FALSE; }	
         }
	
	public static function checkUniqeValue($con){
	    $userData = DB::table("users")->where($con)->first();
	    if(count($userData) > 0){ return TRUE; }
	  else{ return FALSE; }	
	}
	
	
	public static function userList($con=NULL){
	  if(!empty($con)){
		  $result = DB::table("users")->where($con)->orderBy('created_at' , 'ASC')->get();
		  if($result) return $result; else return FALSE; 
		 }	
	  $userSignIN = DB::table("users")->get();
	  if(count($userSignIN) > 0){return $userSignIN; }
	  else{  return FALSE; }	
	}
	
	
	public static function getUsersByDate($startDate,$endDate){
	  $result = DB::table("users")
	             ->where('created_at','>=',$startDate)
				 ->where('created_at','<=',$endDate)
				->get();
	  if(count($result) > 0){return $result; }
	  else{  return FALSE; }	
	}
	
	public function products(){
		return $this->hasMany(Products::class);
	}
	 
	public function usersVendor(){
	   return $this->hasMany("App\VendorDetails","users_id");
	} 
	
	public function usersVendorBusiness(){
	  return $this->hasMany("App\vendorbusinesDetails","vendordetails_id");
	}

	protected $dates = [
        'birthday'
    ];

    public function location(){
        return $this->hasOne('App\Models\UserLocation', 'user_id', 'id');
    }

    public function has($Model){
        if (count($this->$Model) > 0) return true;
        return false;
    }

    public function getSex(){
        if ($this->sex == 'M') return "Male";
        return "Female";
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getAge(){
        if ($this->birthday) return date('Y') - $this->birthday->format('Y');
    }

    public function getLocation(){
        return "";
    }

    public function getAddress(){
        $location = $this->location()->first();
        if ($location){
            return $location->address;
        }
    }

    public function suggestedPeople($limit = 5, $city_id = null, $hobby_id = null, $all = null){
        $list = User::where('id', '!=', $this->id);

        if ($all == null) {
            $list = $list->whereNotIn('id', function ($q) {
                $q->select('following_user_id')->from('user_following')->where('follower_user_id', $this->id);
            });
        }

        if ($city_id != null && $hobby_id != null){
            $list = $list->whereExists(function ($query) use($city_id) {
                $query->select(DB::raw(1))
                    ->from('user_locations')
                    ->whereRaw('users.id = user_locations.user_id and user_locations.city_id = '.$city_id);
            })->whereExists(function ($query) use($hobby_id) {
                $query->select(DB::raw(1))
                    ->from('user_hobbies')
                    ->whereRaw('users.id = user_hobbies.user_id and user_hobbies.hobby_id = '.$hobby_id);
            });
        }

        $list = $list->limit($limit)->inRandomOrder()->get();
        return $list;
    }

    public function validateUsername($filter = "[^a-zA-Z0-9\-\_\.]"){
        return preg_match("~" . $filter . "~iU", $this->username) ? false : true;
    }

    public function isPrivate(){
        if ($this->private == 1) return true;
        return false;
    }

    public function canSeeProfile($user_id){
        if ($this->id == $user_id || !$this->isPrivate()) return true;
        $relation = $this->follower()->where('follower_user_id', $user_id)->where('allow', 1)->get()->first();
        if ($relation){
            return true;
        }
        return false;
    }

    public function distance($user){
        if ($this->id == $user->id) return "";
        if ($user){
            $user_location = $user->location()->get()->first();
            $my_location = $this->location()->get()->first();
            if ($user_location && $my_location){
                return sHelper::distance($my_location->latitud, $my_location->longitud, $user_location->latitud, $user_location->longitud);
            }
        }
        return "";
    }

    public function findNearby(){
        $location = $this->location()->get()->first();
        if (!$location) return false;
        $lat = $location->latitud;
        $long = $location->longitud;

        if (empty($lat) || empty($long)) return false;

        $raw = '111.045 * DEGREES(ACOS(COS(RADIANS('.$lat.')) * COS(RADIANS(latitud)) * COS(RADIANS(longitud) - RADIANS('.$long.')) + SIN(RADIANS('.$lat.')) * SIN(RADIANS(latitud))))';
        $users = UserLocation::select('user_id', 'latitud', 'longitud', 'address',
            DB::raw($raw.' AS distance'))->with('user')->where('user_id', '!=', $this->id)
            ->havingRaw('distance < 50')->orderBy('distance', 'ASC')->get();


        return $users;
    }

    public function messagePeopleList(){
        $list = $this->follower()->where('allow',1)->with('follower')->whereExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('user_following as f')
                ->whereRaw('f.following_user_id = user_following.follower_user_id')
                ->whereRaw('f.follower_user_id = '.$this->id)
                ->whereRaw('f.allow = 1');
        });

        return $list;
    }
	
    public static function verifyUsers($data,$condition){
         $result =  DB::table('users')->where($condition)->update($data);
	  if($result){  
	     $userSignIN = User::find($condition['id']);
	     if($userSignIN) return $userSignIN; else return FALSE;
	   }
	  else{ return FALSE; }	
     
     }

	public function messages()
	{
	  return $this->hasMany(Message::class);
	}
}
