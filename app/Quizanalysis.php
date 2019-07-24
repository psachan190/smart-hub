<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizanalysis extends Model
{
   protected  $table = "quizanalysis";
   public $timestamps = false;
   protected $fillable = [
        'newquestion_id', 'newquestionanswer_id', 'user_id'
    ];

    public function answerserve()
	{
		 return $this->belongsTo('App\Answerserve','newquestionAnswer_id');
	}
}
