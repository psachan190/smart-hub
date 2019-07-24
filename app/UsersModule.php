<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModule extends Model
{
    //
    protected $table = 'users_module'; 
    public $timestamps = true;
    protected $fillable = ['users_id','module_id','active','start_date','end_date'];
}
