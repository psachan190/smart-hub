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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\loginModal;
use App\QuizModal;
use App\QuestionModal;
use App\ResultQuizModal;
use App\QuizParticanModal;
use App\Shop_categoryModel;
use App\CategoryModel;
use App\SubCategory;
use App\User;
use App\VendorPostAds;
use App\VendorDetails;
use App\Module;
use App\Products;
use App\UsersModule;
use App\VendorCatAuthority;
use App\OfferNewsModel;
use App\ComplainSubject;
use App\Attribute;
use App\Newquestion;
use App\Answerserve;
use App\ComplainModel;
use App\ComplainDetails;
use Session;
use Image; 

class AdminController extends Controller{
  
  
   public function vVerifyOffersNews(Request $request){
	     $succes = OfferNewsModel::BlockorUnblock($request->all());
		 print_r($succes);exit;
		 if($succes != FALSE){ echo 1; }
		 else{ echo 2; }
	}
	
	
	public function shareWebshop(Request $request){
	      $data['title'] = "I am Create a Web shop on Kanpurize";
		  $data['sharedUrl'] = "https://kanpurize.com/kanpurizeMarketplace"; 
		  $data['description'] = "My shop shop is running Awesome in knapurize online marketing webshop";
	      return view("kanpur.share")->with($data);
	}
	
	
       public function viewOffersNewsDetails($id){
	   $data['title'] = "View Vendor Offers Details";
	   if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){ return redirect('adminlogin');  }
	   $data['offerNewsData'] = OfferNewsModel::allVendorOffersNews("1",base64_decode($id));
	   return view("Admin.viewOffersNewsDetails")->with($data);
	}
	
   
   public function viewcomplainDetails($complainID){
	   $data['title'] = "View Vendor Complain Details";
	   if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){ return redirect('adminlogin');  }
	
	   $data['complainData'] = ComplainModel::getComplain("1",$complainID);
	   $data['complainDetails'] = ComplainDetails::getComplainDetails("1",$complainID);
	   //print_r($data['complainDetails']);exit;
	   return view("Admin.vendorComplainDetails")->with($data);
	}
   
   public function vendorComplain(){
	  $data['title'] = "Vendor Complain List";
	  $data['vendorComplainList'] = ComplainModel::getVendorComplain(array("type"=>"adminComplain"));
	 //echo"<pre>";
	  //print_r($data['vendorComplainList']);exit;
	  return view("Admin.vendorComplainList")->with($data);
   }
  
  public function editsubcatAction(Request $request){
     	$succes = SubCategory::editSubCategory($request->all());
		 if($succes){ return redirect("subcategoryList?success"); }
		 else{ return redirect("subcategoryList?failed"); } 
   }
   
   public function editsubCategory($editID){
	  $data['title'] = "Edit Sub Category";
	  $data['listArr'] = DB::table("knp_shopcategory")->get();
	  $data['subCategoryDetails'] = SubCategory::getsubCategory($editID);
	 //print_r($data['subCategoryDetails']);exit; 
	  return view("Admin.editSubCategory")->with($data);
   }
   
  public function editscategoryAction(Request $request){
     	$succes = CategoryModel::editCategory($request->all());
		 if($succes){ return redirect("sCategorylist?success"); }
		 else{ return redirect("sCategorylist?failed"); } 
   }

  public function editsCategory($id){
     if(!empty($id)){
		 $data['title'] = "Edit Category Category";
		 $data['CategoryDetails'] = CategoryModel::Categorylist($id);
		 $data['listArr'] = Shop_categoryModel::all();
		 return view("Admin.editsCategory")->with($data);   
	   }
	  else{
	     return redirect()->back();
	   } 
   }
   
  public function editShopCategory($id){
     if(!empty($id)){
		 $data['title'] = "Edit Shop Category";
		 $data['shopCategoryDetails'] = Shop_categoryModel::getShopcat("1",$id);
		 //echo"<pre>";
		 //print_r($data['shopCategoryDetails']);exit;
		 return view("Admin.editShopCategory")->with($data);   
	   }
	  else{
	     return redirect()->back();
	   } 
   }
   
    public function editCategoryAction(Request $request){
   	     $data['title'] = "Edit Shop Category";
		 if(empty($request->file('categoryIcon'))){
	       	 $imageName = $request->categoryIconcopy; 
	     }
		 else{
			   $fileName = rand(1,9999).$request->file('categoryIcon')->getClientOriginalName();
			   $imageName = str_replace(" ","-",$fileName);
			   $shopCategoryIconPath = public_path('uploadFiles/shopCategoryIcon');
			   $iconImage = Image::make($request->file('categoryIcon')->getRealPath())->resize(50, 50);
			   $iconImage->save($shopCategoryIconPath.'/'.$imageName,80);
		  }
		//print_r($imageName);exit;	
		 $succes = Shop_categoryModel::editShopCat($request->all(),$imageName);
		 if($succes){ 
		     return redirect("categoryList?success");
		 }
		 else{
			 return redirect("categoryList?failed");
			} 
   }
   
  
      
  public function editAttributeAction(Request $request){
      $v = array('category_id'=>'required',
	               'subcategory'=>'required',
				   'attributeName'=>'required',
				   'attributeValue'=>'required',
				   'status'=>'required'
				  );
	  $this->validate($request,$v);
	  $result = Attribute::editAttribute($request->all());
	  if($result){ $msg = "record Edit successfully..."; }
	  else{ $msg = "Unexpected try again..."; }	  
          if(isset($msg)){
			session()->flash('msg',"<p class='alert alert-info'>$msg</style>");
		   return redirect()->back()->with('success', array('your message,here'));  
		  } 
   }
  public function editAttribute($attributeID){
	  if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){ return redirect('adminlogin');  }
	 $data['title'] = "Edit Products Attribute";
	 $data['categoryList'] = CategoryModel::all();
	 $data['attributeID'] = $attributeID;
	 if(!empty($attributeID)){
		 $data['attributeDetails'] = Attribute::getAttributeList($data['attributeID']);
		 //echo"<pre>";
		 //print_r($data['attributeDetails']);
		 //exit;
         	 return view("Admin.editAttribute")->with($data);   
	   }
	 else{
	     return redirect()->back();
	   }   
   }
  
  public function deleteAttribute(){
     if(!empty($_GET['id'])){
		   $result = Attribute::deleteAttribute($_GET['id']);
		   if($result != FALSE){
			   echo"<span style='color:red;'>Record Delete Successfully....</span>";
			 }
		   else{
			   echo"<span style='color:red;'>Unexpected try again....</span>";
			 }	 
		}
	  else{
		  echo"<span style='color:red;'>Unexpected try again...</span>";  
		}	
   }
  
  
  public function attributeAction(Request $request){
      $v = array('category_id'=>'required',
	               'subcategory'=>'required',
				   'attributeName'=>'required',
				   'status'=>'required'
				  );
	  $this->validate($request,$v);
	  $result = Attribute::addAttribute($request->all());
	  if($result){
		  $msg = "record inserted successfully...";  
	    }
	  else{
		   $msg = "Unexpected try again..."; 
		}	  
          if(isset($msg)){
			session()->flash('msg',"<p class='alert alert-info'>$msg</style>");
		   return redirect()->back()->with('success', array('your message,here'));  
		  } 
   }
  
  public function changeAllSubCategory(){
   $category_id = $_GET['category_id']; 
   $result = SubCategory::subCategory($category_id);
   if($result != FALSE){
	   foreach($result as $list){
		  ?>
		  <option value="<?php echo $list->sid; ?>"><?php echo $list->subCatname; ?></option>
		  <?php
		}
	 }
   else{
	   ?>
	   <option value="">--No--Category--Available--</option>
	   <?php
	}	 
  }
  
  public function productsAttribute(){
  
  //echo"yes";exit;
     if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){
	  return redirect('adminlogin');  
	 }
	 $data['title'] = "Products Attribute";
	 $data['categoryList'] = CategoryModel::all();
	 //echo"<pre>";
	 //print_r($data['categoryList']);
	 return view("Admin.productsAttribute")->with($data); 
   }
   
   public function attributeList(){
	  if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){
		   return redirect('adminlogin');  
	     }
	   $data['title'] = "Products Attribute";
	   $data['attributeList'] = Attribute::getAttributeList();
	   //echo"<pre>";
	   //print_r($data['attributeList']);exit;
	   return view("Admin.productsAttributeList")->with($data); 
	}  
  
  public function deleteSubject(Request $request){
	 $deleteResult = ComplainSubject::addComplainSubject($request->input("id"),"deleteSubjectList");
	 if($deleteResult != FALSE) echo "<span style='color:green;'>Record delete successfully..</span>";
	 else echo "<span style='color:green;'>Unexpected try again...</span>";
  }
  
  public function comlainSubjectList(){
     if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){
		   return redirect('adminlogin');  
	 }
	 $data['title'] = "View Complain Subject";
	 $data['subjectlistArr'] = ComplainSubject::addComplainSubject("fetchData");
	 return view("Admin.comlainSubjectList")->with($data); 
  }
  
  public function addComplianSubject(){
     if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){
		   return redirect('adminlogin');  
	 }
	 $data['title'] = "Add Complain Subject";
	 return view("Admin.addComplainSubject")->with($data); 
  }
  
  public function addComplianSubjectAction(Request $request){
	   $v = array('complainSubject'=>'required',
	               'priority'=>'required',
				   'status'=>'required',
				  );
	   $this->validate($request,$v);
	   $result = ComplainSubject::addComplainSubject($request->all());
	   if($result != FALSE){
		   $err = "<span class='color:green;'>Record Insert Successfully...</span>";   
		 }
	   else{
		   $err = "<span class='color:red;'>Unexpected try again...</span>";   
		 }	 
	    if(isset($err)){
		     session()->flash('msg',"<p class='alert alert-info'>$err</style>");
		     return redirect()->back()->with('success', array('your message,here')); 
		  }
	    
	}
   
 public function vendorOffersNews(){
       if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){ return redirect('adminlogin');  }
	    $data['allVendorOffersNew'] = OfferNewsModel::allVendorOffersNews(array("status"=>"Y"));
		//echo "<pre>";
		//print_r($data['allVendorOffersNew']);exit;
	    return view("Admin.vendorOffersNewsList")->with($data);
  } 
  public function vendorExtraSalesCat(){
       if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){
		   return redirect('adminlogin');   
	    }
	   $data['knp_shopCat'] = Shop_categoryModel::getShopcat(3);
	   $data['allVendor'] = VendorDetails::allValidVendor();
	   $data['allcatAuthority'] = VendorCatAuthority::getCatAuthority();
	   return view("Admin.listvExtraSalesCat")->with($data);
  }
 
 public function changeSubCategory(){
	  if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){
		   return redirect('adminlogin');   
	    }
	   $category_id = $_GET['category_id']; 
	   $result = SubCategory::subCategory($category_id,"N");
	   if($result != FALSE){
		   foreach($result as $list){
			  ?>
			  <option value="<?php echo $list->sid; ?>"><?php echo $list->subCatname; ?></option>
			  <?php
			}
		 }
	   else{
	       ?>
		   <option value="0">--No--Category--Available--</option>
		   <?php
	    }	 
  }
  
  public function addCategoryAuthority(Request $request){
     $validator = Validator::make($request->all(),array(
        'vendordetails_id' => 'required',
        'knp_shopcategory_id' => 'required',
		'category_id'=>'required',
		'subcategory_id'=>'required'
	  ));
	if($validator->fails()){
        return json_encode(
		               array("error"=> $validator->errors()->getMessages(),
					          "vStatus"=>400));
       }
	  
	  $duplicate = VendorCatAuthority::checkduplicateAuthority($request->all());
	  if($duplicate== FALSE){
		   $result = VendorCatAuthority::addAuthority($request->all());
	       if($result){
		      return json_encode(array("success"=>"record add successfully...",
		                "vStatus"=>700
					    )); 
		     }
		}
	  else{
		   return json_encode(array("duplicate"=>"Duplicate entry not allowed...",
		                "vStatus"=>100
					    ));
		}	
	  //print_r($duplicate);exit; 
  }


   public function Marketsurve(){
	     if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){
		   return redirect('adminlogin');   
	    }
		$data['title'] = "market Surve";
		 return view("Admin.Marketsurve")->with($data);
	   }
	
	public function newquestionList(){
	  if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){
		   return redirect('adminlogin');   
	    }
		$data['title'] = "market Surve";
		$data['listArr'] = Newquestion::getnewQuestion();
		return view("Admin.newquestionList")->with($data);
	 }
	 
	  public function deletequestion(){
	  if(!empty($_GET['id'])){
		   $result = Newquestion::deleteNewquestion($_GET['id']);
		   print_r($result); exit;
		   if($result != FALSE){
			   echo"<span style='color:red;'>Record Delete Successfully....</span>";
			 }
		   else{
			   echo"<span style='color:red;'>Unexpected try again....</span>";
			 }	 
		}
	  else{
		  echo"<span style='color:red;'>Unexpected try again...</span>";  
		}	
	}
	 
	 public function editquestion($id){
		if(!empty($id)){
	  if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){
		   return redirect('adminlogin');   
	    }
		$data['title'] = "market Surve";
		$data['listArr'] = Newquestion::getnewQuestion($id);
		//echo "<pre>";
		//print_r($data['listArr']); exit;
		return view("Admin.editquestion")->with($data);
	  }else{
		  return redirect()->back();
	  }
	 }
	   
	public function serveAction(Request $request){
		$v = array('questionType'=>'required',
	               'question'=>'required',
				  );
	   $this->validate($request,$v);
		$result = Newquestion::addNewquestion($request->all());
		if($result){
		    $msg = "Record Add successfully...";
		  }
		else{
		    $msg = "unexpected try again";
		 }  
		if(isset($msg)){
			session()->flash('msg',"<p class='alert alert-info'>$msg</style>");
		   return redirect()->back()->with('success', array('your message,here'));  
		  }
	}
  
  public function addAnswer(){
	   if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){ return redirect('adminlogin');    }
	  	$data['listArr'] = Newquestion::getnewQuestion();
		$data['title'] = "market Surve add answer";
		 return view("Admin.addmrkt_serve")->with($data);
	   }
	   
	   public function NewanswerAction(Request $request){
		$v = array('question'=>'required');
	   $this->validate($request,$v);
	   //print_r($request->all()); exit;
		$result = Answerserve::addNewanswer($request->all());
		if($result){
		    $msg = "Record Add successfully...";
		  }
		else{
		    $msg = "unexpected try again";
		 }  
		if(isset($msg)){
			session()->flash('msg',"<p class='alert alert-info'>$msg</style>");
		   return redirect()->back()->with('success', array('your message,here'));  
		  }
	}
	
	public function newAnswerlist(){
	  if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){
		   return redirect('adminlogin');   
	    }
		$data['title'] = "market Surve Answer";
		$data['listAns'] = Answerserve::getnewAnswer();
		$data['questionList'] = Newquestion::all();
		return view("Admin.newAnswerlist")->with($data);
	 }
	 
	  public function deleteanswer(Request $request){
	  if(!empty($request->id)){
		   $result = Answerserve::deleteNewanswer($request->id);
		   if($result != FALSE){
			   echo"<span style='color:red;'>Record Delete Successfully....</span>";
			 }
		   else{
			   echo"<span style='color:red;'>Unexpected try again....</span>";
			 }	 
		}
	  else{
		  echo"<span style='color:red;'>Unexpected try again...</span>";  
		}	
	}
	
	 public function editanswer($id){
		 //print_r($id); exit;
		if(!empty($id)){
	  if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){
		   return redirect('adminlogin');   
	    }
		$data['title'] = "market Surve Answer";
		$data['listAns'] = Answerserve::getnewAnswer($id);
		$data['question'] = Newquestion::all();
		//echo "<pre>";
		//print_r($data['listAns']); exit;
		return view("Admin.editanswer")->with($data);
	  }else{
		  return redirect()->back();
	  }
	 }
	 public function editanswerAction(Request $request){
	   //print_r($request->all()); exit;
		$result = Answerserve::editNewanswer($request->all());
		if($result){
		    $msg = "Record Add successfully...";
		  }
		else{
		    $msg = "unexpected try again";
		 }  
		if(isset($msg)){
			session()->flash('msg',"<p class='alert alert-info'>$msg</style>");
		   return redirect()->back()->with('success', array('your message,here'));  
		  }
		
		
	 }


	 public function editquestionAction(Request $request)
	 {
	 	//echo "<pre>"; print_r($request->all());
	 	$question = Newquestion::find($request->editid);
	 	$question->question_type =$request->questionType;
	 	$question->question =$request->question;
	 	$question->save();
	 	session()->flash('msg',"<p class='alert alert-info'>Question Updated.</style>");
	 	return redirect('admin_editquestion/'.$request->editid);

	 }
	 
	 public function newAnswerlistPost(Request $request)
	{
		//echo "<pre>"; print_r($request->all());
		foreach($request->nexquestion as $key=>$value)
		{
			$anwer = Answerserve::find($key);
			$anwer->nexquestion = $value;
			$anwer->save();
		}

		return redirect('newAnswerlist');
	}
	   
  
  
}
?>