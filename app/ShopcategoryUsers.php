<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopcategoryUsers extends Model
{
    //
	 protected  $table = "shopcategory_users";
	 
	 public function shopcategoryname(){
        return $this->belongsTo('App\Shop_categoryModel','knp_shopcategory_id','cid');
    }
	
	public function categoryname(){
              return $this->belongsTo('App\CategoryModel','category_id');
    }
}
