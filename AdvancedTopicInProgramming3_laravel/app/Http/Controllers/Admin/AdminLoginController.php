<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\User;
use Hash;
use Session;

class AdminLoginController extends Controller
{
     
    public function loginView(){

    	return view('admin.login');

    }

    public function check(Request $request){

    	$this->validate($request,[
    		'email' =>'required',
    		'password' =>'required'
    	]);
    	
    	$email = $request->email;
    	

    	$user = User::where('email',$email)->first();

        if($user != null){

        	if((Hash::check($request->password, $user->password)) && ($user->type == 'Admin')){

                Session::put('email',$request->email);
                Session::put('name',$user->name);
                Session::put('image',$user->image);
        		Session::put('created_at',$user->created_at->diffForHumans());

        		return redirect()->route('admin.home')->with('user',$user);


        	}else{

        		$request->session()->flash('WarningMessage', "Password Not Matched");
        		return back();
        	}
        }else{
            $request->session()->flash('WarningMessage', "Email Not Matched");
            return back();
        }


    }
 

}
