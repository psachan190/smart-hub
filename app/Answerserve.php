<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Answerserve extends Model
{
    protected  $table = "newquestionanswer";
    protected $fillable = array('id','newquestion_id','option1','option2','option3','option4','created_at','updated_at');
	  
	public static function addNewanswer($formData){
		//print_r($formData); exit;
	   $result =  DB::table('newquestionanswer')->insert(array("newquestion_id"=>$formData['question'],"option1"=>$formData['first'],"option2"=>$formData['second'],"option3"=>$formData['third'],"option4"=>$formData['fourth'],"correct_status"=>$formData['correctAnswer'],"updated_at"=>time(),"created_at"=>time())); 
	  if($result)return TRUE; else return FALSE; 
	  }
	  
	  
	  public static function getnewAnswer($id=NULL){
		if(!empty($id)){
			$result = Answerserve::find($id);
	        if($result)return $result; else return FALSE;
		}
	   $result = Answerserve::all();
	    if($result)return $result; else return FALSE;
	}
	
	
	
	
	 public static function editNewanswer($formData){
	     $result =  DB::table('newquestionanswer')
                       ->where(array("id"=>$formData['editid']))
                       ->update(array("newquestion_id" => $formData['newquestion_id'],"option1"=>$formData['option1'],"option2"=>$formData['option2'],"option3"=>$formData['option3'],"option4"=>$formData['option4'],"created_at"=>time()));
					   //print_r($result); exit;
	  if($result){ return TRUE;  }
	  else{ return FALSE; }	
   }
	
	
	
	
	 public static function deleteNewanswer($id){
	  $result = Answerserve::find($id);
	  if($result->delete()) return TRUE; else return FALSE;
	} 
	
	
	public function newquestion()
	{
		 return $this->belongsTo('App\Newquestion');
	}

	public function quizanalysis()
	{
		 return $this->hasMany('App\Quizanalysis','newquestionanswer_id');
	}
	

}
