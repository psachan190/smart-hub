<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Html\FormFacade;
use validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;



class Vendor extends Controller {
	
	public function Vendor ($shop= false) {
		$data['title'] = "NGOs in Kanpur";
		$data['ngos'] = Ngo_model::where(['status' => 'Y'])->paginate(8);
		$data['page_content'] = 'ngo';
		$data['page'] = 'multi_ngo';
		return view('main.layout',$data);
	}
	
	public function vendorDashboard(){
		 $data['title'] = "Vendor Dashboards";
		 if(empty(session()->get('lastVendorID'))){return redirect("kanpurizeMarketplace"); }
			if(isset($_GET['vendorRefID'])){
			   $lastvendorID = $_GET['vendorRefID'];
				if($lastvendorID != session()->get('lastVendorID')){ return redirect()->back();  }
			  }
			$data['vresultData'] = VendorDetails::vendorShopList();
			$data['profileImageData'] = KnpShopImage::getShopImage(session()->get('lastVendorID'));
			$data['selectedPaymentMode'] = ShopSetting::getAuthority(session()->get('lastVendorID'));
			$data['shareID'] = base64_decode($data['vresultData']->id);
			$data['shareName'] = str_replace(" ","_",$data['vresultData']->vName);
			return view("vendor.vendorDashboard")->with($data);
	}
}