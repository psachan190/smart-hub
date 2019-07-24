<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Ngo_model extends Model {
    protected $table = 'ngo_tbl';
    
    public static function create () {
     
    	DB::transaction(function () {
	    	$name = Input::get('name');
	    	$username = Input::get('username');
	    	$email = Input::get('email');
	    	$contact = Input::get('contact');
	    	$date = date('Y-m-d H:i:s');
		$user = session()->get('knpuser');
		$data = [
			'user'=> $user,			
			'ngo_name' => $name, 
			'user_name' => $username, 
			'about_us' => '', 
			'status' => 'N', 
			'created_at' => $date, 
			'updated_at' => $date,
			'email' => $email,
			'contact' => $contact,
			'image' => 'N1.jpg'
		];
		return DB::table('ngo_tbl')->insert($data);
	});
    }
    
    public static function gallery_images($ngo) {
    	return DB::table('ngo_tbl')->where('ngo_tbl.user_name' , $ngo)->join('ngo_gallery', 'ngo_gallery.ngo_id', '=', 'ngo_tbl.id')->join('common_images', 'ngo_gallery.image', '=', 'common_images.id')->paginate(8); 
    }
}