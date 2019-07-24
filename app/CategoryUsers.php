<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryUsers extends Model
{
    //
	 protected  $table = "category_users";
	  public function categoryname(){
        return $this->belongsTo('App\CategoryModel','category_id');
    }
}
