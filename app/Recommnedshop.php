<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommnedshop extends Model
{
   protected  $table = "recommendshops";
   protected $fillable = ['shopname', 'shopcategory_id', 'location'];

   public function category(){
		return $this->belongsTo(Shop_categoryModel::class,'shopcategory_id','cid');
	}
}
