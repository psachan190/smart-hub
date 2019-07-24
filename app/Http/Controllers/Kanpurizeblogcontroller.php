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
use App\User;
use Session;
use Auth;
use Mail;
use App\Blog;

class Kanpurizeblogcontroller extends Controller{
   
      public function deleteBlog(){
		if(!empty($_GET['id'])){
		    $result = Blog::deleteBlog($_GET['id']);
			if($result != FALSE){
			    echo "<p style='color:green'><strong>Record Delete successfully .</strong></p>.";
			  }
			else{
			    echo "<p style='color:red'><strong>unexpected try again .</strong></p>.";
			  }  
		  }
		else{
		    echo "<p style='color:red'><strong>unexpected try again .</strong></p>.";
		  }  
	  }
   
   
     public function editBlog($editblogID){
		$data['title'] = "Edit Blog ";
		if(!empty($editblogID)){
		   $data['blogdata'] = Blog::getallblog($editblogID);
	       //echo "<pre>";
		   //print_r($data['blogdata']);	   
	 	   return view("management.editBlogList")->with($data);
		} 
	  }
	  
	  public function editblogPost(Request $request){
		$v = array('title'=>'required',"description"=>"required");
	    $this->validate($request,$v);
		$uploadImageResult = $this->BlogImageUpload($request->all());
		  if($uploadImageResult != 100){
			   $resultedit = Blog::editBlogPost($request->all(),$uploadImageResult);
			   if($resultedit != FALSE){
				 $msg = "<p style='color:green'><strong>Blog post Update successfully .</strong></p>.";
				 }
				else{
				 $msg = "<p style='color:green'><strong>unexpected try again .</strong></p>.";
				 
				 } 
			}
		  else{
			  $msg = "<p style='color:red'><strong>Invalid image format . image supported only jpeg, png, jpg</strong></p>.";
			}
		  
		  if(isset($msg)){
			   session()->flash('msg',"<p>$msg</style>");
			   return redirect()->back()->with('success', array('your message,here'));
			 }	
	  }
	  
	  
   
     public function blogIndex(){
        $data['title'] = "kanpurize Blog";
	$data['blogListArr'] = Blog::getallblog();
    	return view("blog.blogIndex")->with($data);
    }

   public function singleBlogpage($blog_ID,$blogtitle){
          if(!empty($blog_ID)){
		 $blogID = base64_decode($blog_ID);
		 $data['blogdata'] = Blog::getallblog($blogID);
                 $image = $data['blogdata']->image;
		 $data['title'] = $data['blogdata']->title;
                 $data['sharedUrl'] = "https://kanpurize.com/singleBlogpage/$blogID";
                 $data['imageUrl'] = "https://kanpurize.com/uploadFiles/blogImage/$image";
			 if(strlen($data['blogdata']->description) > 150){ 
				$data['description'] = substr($data['blogdata']->description,150);
			  }
			 else{
			    $data['description'] = $data['blogdata']->description; 
			  }
			  //echo strlen($data['description']);exit; 
			return view("blog.singleblog")->with($data);
		  }
		 else{
		    return redirect()->back();
		  } 
	  }
	
	
	
    public function addBlog(){
	  if(empty(session()->get('knpAdminID')) || session()->get('type') != 2){ return redirect('adminlogin');  }	
      $data['title'] = "Add kanpurize blog";
      return view("management.addBlog")->with($data);
    }

    public function addblogPost(Request $request){
      $v = array('title'=>'required',"description"=>"required");
	  $this->validate($request,$v);
	  $uploadImageResult = $this->BlogImageUpload($request->all());
	  if($uploadImageResult != 100){
		   $resultAdd = Blog::addblog($request->all(),$uploadImageResult);
		   $msg = "<p style='color:green'><strong>Blog post upload successfully .</strong></p>.";
		}
	  else{
		  $msg = "<p style='color:red'><strong>Invalid image format . image supported only jpeg, png, jpg</strong></p>.";
		}
	  
	  if(isset($msg)){
		   session()->flash('msg',"<p>$msg</style>");
		   return redirect()->back()->with('success', array('your message,here'));
		 }	
			
    } 

    public function bloglist(){
	 if(empty(session()->get('knpAdminID')) || session()->get('type') != 2){ return redirect('adminlogin');  }	
       $data['title']  = "kanpurize blog List";
       $data['blogListArr'] = Blog::getallblog();
       //echo "<pre>";
       //print_r($data['blogListArr']);exit;
       return view("management.blogList")->with($data);
    }

   
}
