<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Answerserve;
use App\Newquestion;
use App\Quizanalysis;



class QuizController extends Controller
{
     public function kanpurizequiz(Request $request){
	  $data['title'] =  "kanpurizequiz";
	  //echo $request->id;die();
	 if ($request->id != '') 
	 {
	 	$data['quizques'] = Newquestion::find($request->id);
	 }
	 else
	 {
	 	$data['quizques'] = Newquestion::orderBy('id','asc')->first();
	 }
	
     return view("kanpur.quizajax")->with($data); 
    //return view("kanpur.kanpurizequiz")->with($data); 
  }

  public function kanpurizequizanswer(Request $request)
  {
  	//	echo "<pre>";print_r($request->all());die();
  	$Quizanalysis = Quizanalysis::create($request->all());
  	$nextQuestion = Answerserve::find($request->newquestionanswer_id);;
  
  	if($nextQuestion->nexquestion != '')
  	{
      $data['quizques'] = Newquestion::find($nextQuestion->nexquestion);
      return view("kanpur.quizajax")->with($data); 
  		//return redirect('kanpurize_quiz/'.$nextQuestion->nexquestion);
  	}
  	else
  	{
  		// return redirect('kanpurize_quizthanku');
      return '<div class="quizhead" align="center">
              <span class="quizqus"> Thank You for Participation in survey.</span>
              </div><br><br>';
  	}
  }

  public function kanpurize_quizthanku(Request $request)
  {
  	return view('kanpurize_quizthanku');
  } 
}
