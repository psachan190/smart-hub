<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $table = 'module'; 
    public $timestamps = true;
    protected $fillable = ['module','module_url'];
}
