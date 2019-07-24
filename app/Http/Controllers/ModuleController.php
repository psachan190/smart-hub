<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\User;

class ModuleController extends Controller
{
    //
    public function __construct(){

    }

    public function moduleView(Request $request){
    	$moduleList=Module::all()->where('status','1');
    	 return view(
            'admin.Module.moduleView', [
            'moduleList' => $moduleList
            ]
        );
    }

    public function moduleAdd(Request $request){
    	//echo $request->id; die();
    	$moduleDetail = array();
    	if($request->id){
    		$moduleDetail=Module::find($request->id);
    	}


    	 return view(
            'admin.Module.moduleAdd', [
            'moduleDetail' => $moduleDetail
            ]
        );
    }

    public function modulePost(Request $request){
    	 $this->validate(
            $request, [
            'module' => 'required'
            ]
        );
    	if($request->id){
    		$module=Module::find($request->id);
    		$status = "Module Updated";
    	}
    	else{
    		$module=new Module;
    		$status = "Module Added";
    	}
    	$module->module=$request->module;
    	$module->module_url=$request->module_url;
    	$module->save();
    	return redirect('module')->with('status', $status);
    }

    public function moduleDelete(Request $request){
    	$module=Module::find($request->id);
    	$module->status='0';
    	$module->save();
    	$status = "Module Deleted.";
    	return redirect('module')->with('status', $status);
    }








     public function uservipView(Request $request){
        $moduleList=User::all()->where('roll_id','3');
         return view(
            'Admin.User.userView', [
            'moduleList' => $moduleList
            ]
        );
    }

    public function uservipAdd(Request $request){
        //echo $request->id; die();
        $moduleDetail = array();
        if($request->id){
            $moduleDetail=User::find($request->id);
        }


         return view(
            'Admin.User.userAdd', [
            'moduleDetail' => $moduleDetail
            ]
        );
    }

    public function uservipPost(Request $request){
         $this->validate(
            $request, [
            'name' => 'required'
            ]
        );
        if($request->id){
            $module=User::find($request->id);
            $status = "User Updated";
        }
        else{
            $module=new User;
            $status = "User Added";
            $module->password=bcrypt($request->password);
        }
        $module->name=$request->name;
        $module->email=$request->email;
        $module->sex=$request->sex;
        $module->mobileNumber=$request->mobileNumber;
        $module->status=$request->status;
        $module->roll_id=$request->roll_id;
        $module->username=str_replace(" ","",$request->name).rand(1,99999);;
        
        $module->save();
        return redirect('uservip')->with('status', $status);
    }

    public function uservipDelete(Request $request){
        $module=User::find($request->id);
        $module->status='0';
        $module->save();
        $status = "Module Deleted.";
        return redirect('module')->with('status', $status);
    }
}
