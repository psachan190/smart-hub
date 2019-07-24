<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ComplainSubject extends Model{
	
    protected  $table = "complainsubject";
    protected $fillable = array('id','subject','priority','status','created_at', 'updated_at');
	
	public static function addComplainSubject($formData,$action=NULL){
		if(!empty($action) && $action=="deleteSubjectList"){
		      $result = ComplainSubject::find($formData);
	          if($result->delete()) return TRUE; else return FALSE;
		   }
		if($formData=="fetchData"){
		    $result = ComplainSubject::all();
			if($result) return $result; else return FALSE;
		  }
	    $productsData = ComplainSubject::create(array("subject"=>$formData['complainSubject'],"priority"=>$formData['priority'],"status"=>$formData['status']));
		if($productsData)return TRUE; else return FALSE;
	}
 
}
