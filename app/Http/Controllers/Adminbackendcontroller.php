<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Auth;
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
use App\Models\User;
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
use App\KnpShopImage;


class Adminbackendcontroller extends Controller{
    
	 public function __construct() {
        date_default_timezone_set('Asia/Calcutta');
	 } 
	 
	 
	  public function fetchUserbyDate(Request $request){
	   if(!empty($request->firstdate)){
		  if(!empty($request->lastDate)){
			  $result = User::getUsersByDate(strtotime($request->firstdate),strtotime($request->lastDate));
			  if($result != FALSE){
				  ?>
				  <table id="example2" class="userTbl table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID #</th>
                        <th>Name </th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Pin Code</th>
                        <th>Mobile </th>
                        <th>Join Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
					  if($result != FALSE){
                        $i=1; 
                        foreach($result as $listArr){
                          ?>
						  <tr>
                          <td><?php if(!empty($i)) echo $i;  ?></th>
                          <td><?php if(!empty($listArr->name)) echo $listArr->name; ?></td>
                          <td><?php if(!empty($listArr->email)) echo $listArr->email; ?></td>
                          <td>
                          <?php if($listArr->status==1){?><span class="label label-success">verify</span><?php }
                                else{ ?><strong><span class="label label-warning">pending</span></strong><?php } ?>
                         </td>
                          <td><?php if(!empty($listArr->pincode))echo  $listArr->pincode; ?></td>
                          <td><?php if(!empty($listArr->mobileNumber)) echo  $listArr->mobileNumber; ?> </td>
                          <td><?php if(!empty($listArr->created_at)) echo  date("d-M-Y h:ia",$listArr->created_at); ?></th>
                          <td><a href="#" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a></td>
                         </tr>
						  <?php
                          $i++; 
						}
			           }
					  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID #</th>
                        <th>Name</th>
                        <th>Email</th>
                          <th>Status</th>
                        <th>Pin Code</th>
                        <th>Mobile</th>
                        <th>Join Date</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
				  <?php
				}
			}
		  else{
			  echo "select Second Date ."; 
			}	
		}
	   else{
		 echo "select First Date .";
		}	 
     }
	 
     
	 
       public function shareProfileonSocial($id){ 
         if(!empty($id)){
           $userid = $id;
             $userData = User::find($userid);
             if(!empty($userData->sex)){ $sr = "her"; }
	     else{ $sr = "his"; }  
             $data['title'] = "$userData->name created his Profile on Kanpurize Please visit $sr Profile.";
             $data['imageUrl'] = "https://kanpurize.com/images/defaultUser.png"; 
             $data['sharedUrl'] = "https://kanpurize.com/kanpurizeMarketplace";
             $data['description'] = "My shop  is running Awesome in knapurize online marketing webshop , Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was po ";
             return view("kanpur.shareProfileSocial")->with($data);
           }
         else{
             return redirect()->back();
           }  
      
   } 

	 
	 
	 
	 public function productsAttribute(){
	  if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){ return redirect('adminlogin');  }
	 $data['title'] = "Products Attribute";
	 $data['knp_shopCat'] = Shop_categoryModel::getShopcat(3);
	 return view("Admin.productsAttribute")->with($data); 
   } 
   
    
   



	 
}
