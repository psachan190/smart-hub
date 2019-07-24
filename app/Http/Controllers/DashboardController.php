<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
//use validator;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\LoginModal;
use App\QuizModal;
use App\QuestionModal;
use App\ResultQuizModal;
use App\QuizParticanModal;
use App\Shop_categoryModel;
use App\CategoryModel;
use App\SubCategory;
use App\Models\User;
use App\VendorPostAds;
use App\VendorDetails;
use App\Module;
use App\products;
use App\UsersModule;
use App\Advertisement;
use App\AdsProfession;
use Session;
use Image; 

class DashboardController extends Controller{
     
	 public function __construct() {
       date_default_timezone_set('Asia/Calcutta');
	 }
	
	
    public function viewuserAdsPostDetails($adsID){
      $data['name'] = session()->get('name');
	  $data['email'] = session()->get('email');
	  $data['type'] = session()->get('type');
	  if(empty($data['name']) || empty($data['email']) || empty($data['type']) || $data['type'] != "admin"){
		   return redirect('adminlogin');   
	    }
     if(!empty($adsID)){
		 $data['vPostAdsDetails'] = Advertisement::getAdvertisement(array("id"=>base64_decode($adsID)),base64_decode($adsID));
		  if($data['vPostAdsDetails']->applyFilteration=="yes"){
			 $data['filtarationAdsData'] = AdsProfession::getAdvertisementprofession(array("advertisement_id"=>base64_decode($adsID)));
				}
		 return view("Admin.viewuserAdsPostDetails")->with($data);	
	   }
	 else{ return redirect()->back(); }   		 
   } 
   
   
 
  public function viewVendorDetails($id){
     if(!empty($id)){
        $vID = base64_decode($id);		
        $vendorDetails = vendorDetails::getAuthorityVendor($vID);
         //echo "<pre>";
	 //print_r($vendorDetails);exit;
		  $obj = new Shop_categoryModel;
	       return view("Admin.viewVendorDetails")->with(array("vendorDetails"=>$vendorDetails,"obj"=>$obj)); 
		}
	  else{ return redirect()->back(); }	
   }

   public function moduleSave(Request $request)
   {
   	   	$users_id=$request->users_id;
   		UsersModule::where('users_id',$users_id)->delete();
   		foreach($request->module_id as $module_id)
   		{
   			$moduleUser= new UsersModule;
   			$moduleUser->users_id=$users_id;
   			$moduleUser->module_id=$module_id;
   			$moduleUser->active='1';
   			$moduleUser->save();
   		}
   		 return redirect('viewVendorDetails/'.$users_id);
   }

  
  public function addsubCategory(){
	  $resultshopcat = DB::table("knp_shopcategory")->get();
	  return view("Admin/addsubCategory")->with(array("listArr"=>$resultshopcat));
   }
   
   public function subcatAction(Request $request){
	   $v = array('shopCat'=>'required',
	              'scatname'=>'required',
				  'priority'=>'required',
				  'subDesc'=>'required',
				  'status'=>'required',
				);
	   $this->validate($request,$v);
	   $formData = $request->all();
	   $obj = new subCategory;
	   $obj->shopCatid = $formData['shopCat'];
	    $obj->catID = $formData['catID'];
	   $obj->subCatname = $formData['scatname'];
	   $obj->sCatpriority = $formData['priority'];
	   $obj->subDesc = $formData['subDesc'];
	   $obj->subcrDate = time();
	   $obj->subcstatus = $formData['status'];
	     if($obj->save()){
			   return redirect("addsubCategory?success");
			}
   }
   
   
 
  
  public function addCategory(){
    return view("Admin/addCategory");
  }
  
  public function categoryAction(Request $request){
     $v = array('cname'=>'required|unique:knp_shopcategory,cname',
	             'cDescription'=>'required',
			    );
	 $this->validate($request,$v);
	 $obj = new shop_categoryModel;
	 $formData = $request->all();
	 //echo"<pre>";
	 //print_r($formData);exit;
	 if(!empty($request->file('categoryIcon'))){
	       $fileName = rand(1,9999).$request->file('categoryIcon')->getClientOriginalName();
		   $imageName = str_replace(" ","-",$fileName);
		   $shopCategoryIconPath = public_path('uploadFiles/shopCategoryIcon');
		   $iconImage = Image::make($request->file('categoryIcon')->getRealPath())->resize(50, 50);
		   $iconImage->save($shopCategoryIconPath.'/'.$imageName,80);
	     }
	   $obj->cname = $formData['cname'];
	   $obj->priority = $formData['priority'];
	   $obj->cDesc = $formData['cDescription'];
	   $obj->crDate = time();
	   $obj->cSataus ="Y";
	   $obj->bType = $formData['businessType'];
	   $obj->icon = $imageName;
	     if($obj->save()){
			   return redirect("addCategory?success");
			}
  }
  
  public function contactForm(){
     return view("contactForm");
   }
   
  public function fillConatctform(Request $request){
     $questionData = $request->all();
	 $v = array('name'  => 'required',
			      'email'=>'required',
			    );
	   $this->validate($request,$v);
	 //print_r($questionData);
   } 
  
  public function viewDetails($number){
	  $list = DB::table('quizparticipate as a')
			           ->join('quizanswer as b', 'a.email', '=', 'b.sessionID')
					   ->Where("b.sessionID",$number)
					   ->select('*')
					   ->get();
		//echo"<pre>";			   
	  	//print_r($list);exit;			   
     return view("Admin/viewDetails")->with(array('list'=>$list));
  }
  
  public function Result($number=NULL){
	  $users = DB::table('quizresult as a')
	              ->join('quizparticipate as b', 'a.participateID', '=', 'b.id')
                  ->orderBy('numberOfref','DESC')
				  //->orderBy('noofTrue', 'desc')
                  ->get();
		//echo"<pre>";			   
	  	//print_r($users);exit;			   
    return view("Admin/result")->with(array('users'=>$users));
  }
  
  public function getRanking(){
	  $table="quizparticipate";
      $result = DB::table($table)
                         ->get();
	  //echo"<pre>";	
	  //print_r($result);exit;					   
	  $number = count($result);		   
	  if($number > 0){
		  foreach($result as $data){
			 $id = $data->id;
			 $prefCode = $data->prefCode;//echo $prefCode;exit;
			 $sessionID = $data->email;
			  if($prefCode != "blank"){ 
			     $users = DB::table($table)->Where("refCode",$prefCode)
			                               ->get();
			     $numberofrefCode = count($users); }
			   else{
				     $numberofrefCode=0; 
				  }	 
			  $usersAnswer = DB::table('quizanswer as a')
			           ->join('question as b', 'a.questionID', '=', 'b.id')
					   ->Where("a.sessionID",$sessionID)
					   ->select('a.sessionID','a.questionID','a.correctAnswer','b.*')
					   ->get();
				$trueArr = array();
				$falseArr = array();
				$i=1; $k=1;	   
			   foreach($usersAnswer as $data){
				     if($data->correctAnswer == $data->qcorrectAnswer){
						  $trueArr[$i] = "true";
						  $i++;
						}
					 else{
					     $falseArr[$k] = "FALSE";
						    $k++;
						  }
				}
				$trueNo = count($trueArr);
				$falseNo = count($falseArr);
				//print_r($numberofrefCode);exit;
				$obj = new ResultQuizModal;
				   $obj->participateID = $id;
				   $obj->numberOfref = $numberofrefCode;
				   $obj->noofTrue = $trueNo;
				   $obj->noofFalse = $falseNo;
				   $obj->crDate = time();
				   $obj->save();
			}
		   return view("Admin/getRanking");	
		}
	   else{
		  echo"no records Founds ....";exit;
		}	
   //return view("Admin/quizParticipate")->with(array("quizerList"=>$result));
	
  }
  
  
  public function quizParticipate(){
    /*$result = DB::table('quizparticipate')
	                   ->paginate(10)
                       ->get(); */
    $result = QuizParticanModal::all();					   
	//echo"<pre>";				   
	//print_r($result);exit();				   
   return view("Admin/quizParticipate")->with(array("quizerList"=>$result));
	
  }
  
  public function adminDashboard(Request $request=NULL){
     $name = session()->get('name');
	 $email = session()->get('email');
	 $type = session()->get('type');
	  if(empty($name) || empty($email) || empty($type)){
		  return redirect('adminlogin');   
	    }
	 return view("Admin/adminDashboard");
  }
  
  
   public function questionList($quizID){
       $name = session()->get('name');
	   $email = session()->get('email');
	   $type = session()->get('type');
	   if(empty($name) || empty($email) || empty($type)){
		  return redirect('adminlogin');   
	    }
	   $result = DB::table('quiz as q')
                     ->join('question as qa', 'q.id', '=', 'qa.quizID')
                     ->select('*')
                     ->get();
	  //echo"<pre>";				 	
	  //print_r($result);exit;
	  return view("Admin/questionList")->with(array("questionList"=>$result));
  }
  
  
  public function addQuestionaction(Request $request=NULL){
       $v = array("quizid"=>'required',
	              'quizTitle'  => 'required',
			      'question'=>'required',
			      'first' => 'required',
				  'second'=>'required',
				  'third'=>'required',
				  'fourth'=>'required',
				  'correctAnswer'=>'required',
				  );
	   $this->validate($request,$v);
	   $obj = new QuestionModal;
	   $questionData = $request->all();
	   //print_r($questionData);exit;
	   $quizID = $questionData['quizid'];
	   //echo $quizID;exit;
	   $obj->quizID = $questionData['quizid'];
	   $obj->quetion = $questionData['question'];
	   $obj->firstAnswer = $questionData['first'];
	   $obj->secondAnswer = $questionData['second'];
	   $obj->thirdnswer = $questionData['third'];
	   $obj->fourthAnswer = $questionData['fourth'];
	   $obj->correctAnswer = $questionData['correctAnswer'];
	   $obj->crDate = time();
	   $obj->cStatus = "Y";
	     if($obj->save()){
			   return redirect("addQuestion?quizCode=$quizID&success");
			}
  }
  
  public function addQuestion(){
     if(isset($_GET['quizCode'])){
	     $quizCode = $_GET['quizCode']; 
		 //echo $quizCode; 
		 $quizData = DB::table('quiz')->where('id',$quizCode)->first();
		 return view("Admin/addQuestion")->with(array("quizData"=>$quizData));
	  }
  }
  
  public function questionView(){
	  $table="quiz";
	  $quizList = DB::table($table) ->select('*')
					                ->get();
     return view("Admin/questionView")->with(array("quizList"=>$quizList));
   }
  
  public function quizlist(){
	  $table="quiz";
	  $quizList = DB::table($table) ->select('*')
					                ->get();
      //print_r($selectData);exit;						  
	  return view('Admin.quizlist')->with(array("quizList"=>$quizList));
	}
  
  public function addQuiz(){
	  return view('Admin.addQuiz');
	}
  
  public function addQuizaction(Request $request=NULL){
	   $v = array('quizTitle'  => 'required',
			      'duration'=>'required',
			      'perqmarks' => 'required',
				  'totalMarks'=>'required'
				  );
	   $this->validate($request,$v);
	   $obj = new QuizModal;
	   $quizData = $request->all();
	   $obj->quizTitle = $quizData['quizTitle'];
	   $obj->duration = $quizData['duration'];
	   $obj->eachMarks = $quizData['perqmarks'];
	   $obj->totalMars = $quizData['totalMarks'];
	   $obj->cStatus = "Y";
	   $obj->crDate = time();
	   if($obj->save()){
		  return redirect('addQuiz?success'); 
			}
	   else{
			$msg="Unexpected Try agagin <strong>!!!</strong>";	
			}
	   if(isset($msg)){
		   return redirect('addQuiz')->with('someerr',$msg); 	
		  }		
	  
	}
  
  
  
  
   
   
   
   public function logout(){
	   Session::flush();
	   return redirect(""); 
	}
 /*------Delete---Coding---start----*/
    
	
	public function delCat(){
	    if(!empty($_GET['id'])){
		   $result = CategoryModel::deleteRecord($_GET['id']);
		   if($result != FALSE){ echo "<p class='alert alert-success'>Record Delete successfully....</p>"; }
		   else{ echo "<p class='alert alert-danger'>Unexpected try again....</p>"; }
		}
	   else{
		echo"Unexpected try again...";
		}		
	}
	
	
	
  /*------Delete---coding--End-----*/ 
}
?>