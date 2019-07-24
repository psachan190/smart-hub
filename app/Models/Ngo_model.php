<?php

namespace App\Models;
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
	    	$date = date('Y-m-d h:i:s');
		$user = session()->get('knpuser');
		$ngo = DB::table('ngo_tbl')->insertGetId(['user' => $user,'ngo_name' => $name, 'user_name' => $username, 'about_us' => '', 'status' => 'N', 'created_at' => $date, 'updated_at' => $date]);		
	});
    		return TRUE;
    }
    
    public static function gallery_images($data) {
    	return DB::table('ngo_tbl')->join('ngo_gallery', 'ngo_gallery.ngo_id', '=', 'ngo_tbl.id')->where($data['where'])->orderBy('ngo_gallery.id','DESC')->paginate(8); 
    }
}