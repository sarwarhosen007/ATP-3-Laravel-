<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;

class ProfileSettingController extends Controller
{


    public function showSettingPage(){

       return view('user.settings.index');

    }

    public function showPasswordPage(){
    	return view('user.settings.password');
    }

    public function showImagePage(){
    	return view('user.settings.image');
    }


    public function profile(){

    	$userInfo = User::where('email',Auth::user()->email)->get();

    	return view('user.settings.profile')->with('userInfo',$userInfo);
    }



    public function updateEmail(Request $request,$id){
      
      $this->validate($request,[
      	 'newEmail' => 'required|email|unique:users,email'
      	]);

      $user = User::find($id);
      $user->email =  $request->newEmail;

      $user->save();

      $request->session()->flash('message',"Email Update Successfully");

      return redirect()->route('porfileSetting.showProfile');

    }


    public function updatePassword(Request $request, $id){

    	$this->validate($request,[
    		 'password' =>'bail | required | min:6',
    		 'confirmPassword' =>'bail | required | min:6 | same:password'
    		]);

    	$user = User::find($id);
    	$user->password = Hash::make($request->password);
    	$user->save();
    	$request->session()->flash('message',"Password Updated Successfully");

    	return redirect()->route('porfileSetting.showProfile');
    }


    public function updateProfileImage(Request $request, $id){
        $this->validate($request,[
        	  'profileImage' =>'required'
        	]);

        if($request->hasFile('profileImage')){
           $imageName = $request->profileImage->store('public/upload/ProfileImage');
         }

        $user = User::find($id);
        $user->image = $imageName;

        $user->save();
        $request->session()->flash('message', 'Profile Image Updated Successfully');

        return redirect()->route('porfileSetting.showProfile');
    }


}
