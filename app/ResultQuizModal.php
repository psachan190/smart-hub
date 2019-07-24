<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ResultQuizModal extends Model {
   protected  $table = "quizresult";
   public $timestamps = false;
   //protected $guarded = array('_token','');
}
?>