<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class QuizModal extends Model
{
   protected  $table = "quiz";
   public $timestamps = false;
   //protected $guarded = array('_token','');
}
?>