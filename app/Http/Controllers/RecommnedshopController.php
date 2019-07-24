<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recommnedshop;
use App\Subscription;
use App\VendorDetails;
use App\Shop_categoryModel;
use App\VendorPostAds;
class RecommnedshopController extends Controller
{
     public function __construct() {
       date_default_timezone_set('Asia/Calcutta');  
     }

     public function recommedShopView(Request $request)
     {
     	 $data['title'] = "Recommned Shops List";
	   if(empty(session()->get('name')) || empty(session()->get('email')) || empty(session()->get('type')) || session()->get('type') != "admin"){ return redirect('adminlogin');  }
	
	   $data['recommendshop'] = Recommnedshop::all();
	   return view("Admin.Recommend.View")->with($data);
     }

     public function newsletter(Request $request)
     {

        $subscription = new Subscription;
        $subscription->email = $request->email;
        $subscription->save();
        return '1';

     }

  public function Recomended(){
       $data['title'] = "cart";
    if(empty(session()->get('knpUser_id')) || empty(session()->get('knpUser_name')) || empty(session()->get('knpUser_email'))){
        return redirect("Kanpurize_login");
    }
    $data['shopList'] = VendorDetails::vendorShopList("1",session()->get('knpUser_id'));
    $data['allShopListData'] = VendorDetails::getAllvendorShop();
    $data['allAdsPostData'] = VendorPostAds::getAdsPotsValid();
    $data['shopcategory'] = Shop_categoryModel::all();
    return view("kanpur.recomended")->with($data);
  }

  public function RecomendedPost(Request $request)
  {
            $data = Recommnedshop::create($request->all());
            $request->session()->flash('status', 'Thank You for Recommendation.');
            return redirect("kanpurize_Recomended");
  }
}
