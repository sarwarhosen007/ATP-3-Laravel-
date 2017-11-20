<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Hash;

class AdminSettingsController extends Controller
{
     public function profile()
     {
     	$userInfo = User::where('email',Session::get('email'))->first();

     	return view('admin.settings.profile',compact('userInfo'));
     }

     public function emailPageShow()
     {
     	return view('admin.settings.updateEmail');
     } 

     public function UpdateEmail(Request $request)
     {
	     $this->validate($request,[
	      	 'newEmail' => 'bail | required|email|unique:users,email'
	      	]);

	      $user = User::where('email',Session::get('email'))->first();
	      $user->email =  $request->newEmail;

	      $user->save();

	     $request->session()->flash('message',"Email Update Successfully");
	     Session::flush();
     	 return redirect()->route('admin.loginView');
     }

     public function passwordPageShow()
     {

     	return view('admin.settings.password');
     
     }

     public function updatePassword(Request $request)
     {

     	$this->validate($request,[
    		 'password' =>'bail | required | min:6',
    		 'confirmPassword' =>'bail | required | min:6 | same:password'
    		]);

    	$user = User::where('email',Session::get('email'))->first();
    	$user->password = Hash::make($request->password);
    	$user->save();
    	$request->session()->flash('message',"Password Updated Successfully");

    	return redirect()->back();

     }

     public function iamgePageShow()
     {
     	return view('admin.settings.image');
     }


     public function updateProfileImage(Request $request){
        $this->validate($request,[
        	  'profileImage' =>'required'
        	]);

        if($request->hasFile('profileImage')){
           $imageName = $request->profileImage->store('public/upload/ProfileImage');
         }else{
         	$request->session()->flash('message', 'Please Select Valid Image');
         	return redirect()->back();
         }
         

        $user = User::where("email",Session::get('email'))->first();
        $user->image = $imageName;

        $user->save();
        $request->session()->flash('message', 'Profile Image Updated Successfully');

        return redirect()->route('profile');

    }
 


}
