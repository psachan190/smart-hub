<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model{
   
  protected  $table = "blogs";
  protected $fillable = array(
        'id', 'image', 'title', 'url' , 'description', 'status', 'created_at', 'updated_at');  
   
   
   public static  function addblog($formData,$image){
	    $url = self::slug($formData['title']);
		$exist = TRUE; $i = 1;
		while($exist) {
		$res = DB::table('blogs')->where(['url' => $url])->first();
		if ($res) {
		$url .= $i;
		} else $exist = FALSE;
		$i++;
		}
   	  $result = Blog::create(array("image"=>$image,"title"=>$formData['title'], "url" =>$url ,"description"=>$formData['description'],"status"=>$formData['status']));
      if($result) return TRUE; else return FALSE;
   } 
        
        public static function getBlogbyID($blogID){
	  $result = DB::table("blogs")->where(array("id"=>$blogID))->first();
   	  if(count($result) >0) return $result; else return FALSE;
	}
        
        
   	public static function getallblog($url=NULL , $action=NULL){
   	        if(!empty($action) || $action == "getPaging"){
		  $result = DB::table('blogs')->orderBy('created_at','DESC')->simplePaginate(10);	 	    	 
   	          if(count($result) >0) return $result; else return FALSE;
		  }
		if(!empty($url)){
		    $result = DB::table("blogs")->where(array("url"=>$url))->first();
   	        if(count($result) >0) return $result; else return FALSE;
		  }
		  
           $result = DB::table('blogs')->orderBy('created_at','DESC')->get();	 	    	 
   	   if(count($result) >0) return $result; else return FALSE;
   	}
   	
   	
   	Public static function editBlogPost($formData,$image){
		$url = self::slug($formData['title']);
		$exist = TRUE; $i = 1;
		while($exist) {
		$res = DB::table('blogs')->where(['url' => $url])->first();
		  if ($res) {
		  $url .= $i;
		} else $exist = FALSE;
		  $i++;
		}
		$date = date("Y-m-d H:i:s");
		$updateResult = DB::table('blogs')
                             ->where(array("id"=>$formData['editblogID']))
                             ->update(array("image"=>$image,"title"=>$formData['title'],"url"=>$url,"description"=>$formData['description'],"status"=>$formData['status']));
        if($updateResult){ return TRUE; }
        else{ return FALSE; } 
    }
    
    public static function deleteBlog($id){
	   $result = DB::table("blogs")->where(array("id"=>$id))->delete();
	   if($result)return TRUE; else return FALSE;
	}
	
	
	public static function slug($text){
       $text = preg_replace('~[^\pL\d]+~u', '-', $text);
       $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		  $text = preg_replace('~[^-\w]+~', '', $text);
		  $text = trim($text, '-');
		  $text = preg_replace('~-+~', '-', $text);
		  $text = strtolower($text);
		if (empty($text)) {
			return 'n-a';
		  }
		return $text;
		}
		
		
	/*Talent Model code start */
	
	
	public static function getTalent($action = NULL , $talentID = NULL){
	  if(!empty($talentID)){
		  $result =  DB::table('talent')->where(array("id"=>$talentID))->first();
	      if(count($result) > 0){ return $result; }else return FALSE;
		} 	
	  if($action == "upcoming"){
		   $result =  DB::table('talent')->where('registerEntrydate' , '>=' , time())->orderBy('created_at', 'DESC')->get();
	       if($result->count() > 0){ return $result; }else return FALSE;
		}
	  if($action == "close"){
		   $result =  DB::table('talent')->where('registerExpirydate' , '<=' , time())->orderBy('created_at', 'DESC')->get();
	       if($result->count() > 0){ return $result; }else return FALSE;
		}
	  if($action == "recent"){
		  $result =  DB::table('talent')->where('registerEntrydate' , '<=' , time())->where('registerExpirydate' , '>=' , time())->orderBy('created_at', 'DESC')->get();
	      if($result->count() > 0){ return $result; }else return FALSE;
		}
		$result =  DB::table('talent')->orderBy('created_at', 'DESC')->get();
	    if($result->count() > 0){ return $result; }else return FALSE;			
	} 
	
	public static function deleteTalent($deleteID){
	   $result = DB::table('talent')->where(array("id"=>$deleteID))->delete();
	   if($result)return TRUE; else return FALSE;
	}
	
	public static function updateTalent($con , $dataArr){
	  $result = DB::table("talent")->where($con)->update($dataArr);
	  if($result)return TRUE; else return FALSE;  
	}
	
	
	public static function addNewTalent($request , $image){
	  $enctype = md5(time()."newtalent");
	  $image_path = url("uploadFiles/talent/original/$image");
	  $result = DB::table("talent")->insert(array("encrypt_id"=>$enctype ,"image"=>$image , "image_path"=>$image_path , "title"=>$request->title , "description"=>$request->description , "registerEntrydate"=>strtotime($request->entryDate) , "registerExpirydate"=>strtotime($request->expiryDate) , "created_at"=>time() , "update_at"=>time() , "c_status"=>$request->status));
      if($result)return TRUE; else return FALSE;
	}
	
	public static function editNewTalent($request , $image){
		//return $request->all();
	  $image_path = url("uploadFiles/talent/original/$image");	
	  $result = DB::table("talent")->where(array("id"=>$request->edit_id))->update(array("image"=>$image , "image_path"=>$image_path , "title"=>$request->title , "description"=>$request->description , "registerEntrydate"=>strtotime($request->entryDate) , "registerExpirydate"=>strtotime($request->expiryDate) , "update_at"=>time() , "c_status"=>$request->status));
	  if($result)return TRUE; else return FALSE; 
	}
	
	public static function getallTalent($status , $talentID = NULL){
		if(!empty($talentID)){
		    $result =  DB::table('talent')->where(array("c_status"=>$status , "encrypt_id"=>$talentID))->first();
	        if(count($result) > 0){ return $result; }else return FALSE;
		   }
	  $result =  DB::table('talent')->where(array("c_status"=>$status))->orderBy('created_at', 'DESC')->get();
	  if($result->count() > 0){ return $result; }else return FALSE;
	}
	
		
	public static function talentParticipate($request , $image){
	  $enctype = md5(time().uniqid());
	  $image_path = url("uploadFiles/talent/original/$image"); 
	  $result = DB::table("talent_participate")->insertGetId(array("encrypt_id"=>$enctype , "talent_id"=>$request->talent_id , "user_id"=>session()->get('knpuser') , "name"=>$request->name, "title"=>$request->title , "description"=>$request->description , "image"=>$image , "image_path"=>$image_path , "created_at"=>time() , "updated_at"=>time() , "admin_status"=>"Y"));
	  if($result)return $result; else return FALSE;
	} 
	
	public static function editParticipantData($request , $image){
	   $image_path = url("uploadFiles/talent/original/$image"); 	
	   $result = DB::table("talent_participate")->where(array("id"=>$request->participantID))->update(array("name"=>$request->name , "title"=>$request->title , "description"=>$request->description , "image"=>$image , "image_path"=>$image_path , "updated_at"=>time()));
	   if($result) return TRUE; else return FALSE;
	}
	
	public static function getParticipateDetails($con){
	     $result =  DB::table('talent_participate')->where($con)->first();
	     if(count($result) > 0){ return $result; }else return FALSE;
	}
	
	public static function get_participate($talentID , $status = NULL ){
	  if(!empty($status)){
		  $result = DB::table('talent_participate as a')->join('users as b', 'a.user_id', '=', 'b.id')
					      ->select('a.*','a.name as pName ','b.name' , 'b.email' , 'b.mobileNumber')
						  ->where(array("admin_status"=>$status , "talent_id"=>$talentID))
						  ->orderBy('created_at', 'DESC')
						  ->get();
		   if($result->count() > 0){ return $result; }else return FALSE;				  
		}	
	   $result = DB::table('talent_participate as a')->join('users as b', 'a.user_id', '=', 'b.id')
					      ->select('a.*','a.name as pName','b.name' , 'b.email' , 'b.mobileNumber')
						  ->where(array("talent_id"=>$talentID))
						  ->orderBy('created_at', 'DESC')
						  ->get();
	  if($result->count() > 0){ return $result; }else return FALSE;
	}
	
	
	
	public static function my_participant($con){
	   	if(!is_array($con)){
		     $result = DB::table("talent_participate")->where(array("encrypt_id"=>$con))->first(); 
	        if($result) return $result; else return FALSE;
		  }
	   $result = DB::table("talent_participate")->where($con)->get(); 
	   if(count($result) > 0) return $result; else return FALSE;
	}
	
	public static function edittalentPraticipate($data , $con){
	   $result = DB::table("talent_participate")->where($con)->update($data);
	   if($result)return TRUE; else FALSE;
	 
	} 
	
	public static function uploadTalentData($formData , $about_data ,$path , $imageName){
       $result = DB::table('talent_data')->insert(array("user_id"=>session()->get('knpuser') , "participant_id"=>$formData['uparticipant_id'] , "talent_id"=>$formData['talent_id'] , "imageName"=>$imageName ,  "participant_data"=>$path ,  "about_data"=>$about_data , "data_type"=>1 ,  "created_at"=>time() , "updated_at"=>time() , "c_status"=>"Y"));
	   if($result) return TRUE; else return FALSE;
	}
	
	
	public static function getParticipantData($con , $pdataID = NULL){
	  if(!empty($pdataID)){
		  $result = DB::table("talent_data")->where(array("id"=>$pdataID))->first();
	      if(count($result) > 0 )return $result; else return FALSE;
		}	
	  $result = DB::table("talent_data")->where($con)->orderBy('created_at', 'DESC')->get();
	  if($result->count() > 0 )return $result; else return FALSE;
	}
	
	
	public static function addYoutubeLink($request){
       $result = DB::table('talent_data')->insert(array("user_id"=>session()->get('knpuser') , "participant_id"=>$request->participant_id , "talent_id"=>$request->talent_id , "participant_data"=>$request->youtube_embeded_code ,  "about_data"=>$request->video_tag , "data_type"=>2 , "created_at"=>time() , "updated_at"=>time() , "c_status"=>"Y"));
	   if($result) return TRUE; else return FALSE;
	}
	/*Talent Model code End */
	
	/*Add voting start*/
	public static function addVoting($request){
	  $id = md5(time());	
	  $result = DB::table("talent_votes")->insert(array("id"=>$id,"talent_id"=>$request->talent_id , "participate_id"=>$request->id , "user_id"=>session()->get('knpuser') , "created_at"=>time()));
	  if($result)return TRUE; else return FALSE;
	}
		
        public static function getVoteDetails($talentID , $userID){
          $result= DB::table("talent_votes")->where(array("talent_id"=>$talentID , "user_id"=>session()->get('knpuser')))->get();	 
	  if(count($result) > 0)return TRUE; else return FALSE;
	}
		
		
		public function getParticipantImage($participantID , $talentID){
	  $result = DB::table("talent_data")->where(array("participant_id"=>$participantID , "talent_id"=>$talentID , "data_type"=>1))->simplePaginate(4);
	  if($result->count() > 0 )return $result; else return FALSE;
	}	
     
     
     public static function deleteParticipantdata($deleteID , $userID){
      $result = DB::table('talent_data')->where(array("id"=>$deleteID , "user_id"=>$userID))->delete();
	  if($result)return TRUE; else return FALSE;
	}
	
	public static function getWinner($talentID){
           $result = DB::table('talent_votes')
		                        ->join('talent_participate', 'talent_votes.participate_id', '=', 'talent_participate.id')
								->select(DB::raw('talent_participate.title as title , talent_participate.name , participate_id as Participant , count(*) as Votes'))
                                                    ->where('talent_votes.talent_id', '=', $talentID)
                                                    ->groupBy('participate_id')
                                                    ->orderBy('Votes', 'DESC')
                                                    ->get();
              if(count($result) > 0)return $result; else FALSE;                                      
         }
	 
}
