<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class QuizParticanModal extends Model {
   protected  $table = "quizparticipate";
   public $timestamps = false;
   //protected $guarded = array('_token','');
}
?>