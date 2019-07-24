<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubcategoryUsers extends Model
{
    //
	 protected  $table = "subcategory_users";
	 
	 public function subcategoryname(){
        return $this->belongsTo('App\SubCategory','subcategory_id','sid');
    }
}
