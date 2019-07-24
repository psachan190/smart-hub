<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Newquestion extends Model{
    protected  $table = "newquestion";
    protected $fillable = array('id','question','question_type','created_at'); 
	  
	public static function addNewquestion($formData){
	   $result =  DB::table('newquestion')->insertGetId(array("question"=>$formData['question'],"question_type"=>$formData['questionType'],'Orderno' => $formData['Orderno'],"created_at"=>time())); 
	   
	   if($formData['questionType'] == '1')
	   {
		  $answer = new Answerserve;
		  $answer->newquestion_id=$result;
		  $answer->option1='Yes';
		  $answer->save();
		  $answer = new Answerserve;
		  $answer->newquestion_id=$result;
		  $answer->option1='No';
		  $answer->save();
		  
	   }
	  if($result)return TRUE; else return FALSE; 
	}
	
	public static function getnewQuestion($id=NULL){
		if(!empty($id)){
			$result = Newquestion::find($id);
	        if($result)return $result; else return FALSE;
		}
	   $result = Newquestion::all();
	    if($result)return $result; else return FALSE;
	}

   public static function editNewquestion($formData){
	     $result =  DB::table('newquestion')
                       ->where(array("id"=>$formData['editid']))
                       ->update(array("question"=>$formData['question'],"question_type"=>$formData['questionType'],"created_at"=>time()));
	  if($result){ return TRUE;  }
	  else{ return FALSE; }	
   }
   
    public static function deleteNewquestion($id){
	  $result = Newquestion::find($id);
	  if($result->delete()) return TRUE; else return FALSE;
	}
	
	public function answerserve()
	{
		 return $this->hasMany('App\Answerserve');
	}
	
    
}
