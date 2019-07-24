<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Knp_common extends Model {
    protected $table = 'ngo_tbl';
    
    
    
    
    public static function image($val) {
    	$data = [
		'user' => $val['user'],
		'section' => $val['section'],
		'section_id' => $val['section_id'],
		'image' => $val['image'],
		'type' => $val['type'],
		'status' => 'Y',
		'title' => $val['title'],
		'created_at' => date('Y-m-d h:i:s'),
		'updated_at' => date('Y-m-d h:i:s')
		];
	return DB::table('knp_image')->insertGetId($data);
    }
    
    public static function get_events($data) {
	return DB::table('knp_events')->select('knp_events.*','knp_image.image as value')->join('knp_image','knp_image.id','=','knp_events.image')->where($data['where'])->orderBy('knp_events.id', 'desc')->paginate($data['limit']);
    }
    
    public static function get_causes($data) {
	return DB::table('ngo_causes')->select('ngo_tbl.*','ngo_causes.*','knp_image.image as value')->join('ngo_tbl','ngo_tbl.id','=','ngo_causes.ngo_tbl_id')->join('knp_image','knp_image.id','=','ngo_causes.image')->where($data['where'])->orderBy('ngo_causes.id', 'desc')->paginate($data['limit']);
    }
    
    public static function category($data) {
	return DB::table('product_category')->where($data['where'])->get();
    }
    
    	public static function ip () {
    		$url = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    		$url  = str_replace ("www.",'',$url);
	    	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
	              	$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	              	$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	    	}
	    	$client  = @$_SERVER['HTTP_CLIENT_IP'];
	    	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	    	$remote  = $_SERVER['REMOTE_ADDR'];
	    	if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
	    	elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
	    	else $ip = $remote;
	    	DB::table('knp_ips')->insert(['ip' => $ip, 'url' => $url, 'created_at' => date("Y-m-d h:i:s")]);
	    	$res = DB::table('knp_iphits')->where(['ip' => $ip, 'url' => $url])->first();
	    	if ($res) {
	    		DB::table('knp_iphits')->where(['ip' => $ip, 'url' => $url])->increment('hits');
	    	} else {
	    		DB::table('knp_iphits')->insert(['ip' => $ip, 'url' => $url, 'hits' => 1]);
	    	}
	    	return;
	}
}