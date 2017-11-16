<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\User\Advertise;
class UserHistoryController extends Controller
{
    public function index()
    {

    	$usersLists = User::where('type','=',null)->paginate(2);

        for($i = 1; $i<=12; $i++){

          $userStaticTisMontyly[$i] = count(User::where('type','=',null)
                        ->whereYear('created_at','=',date('Y'))
                        ->whereMonth( 'created_at',date($i))->get());
         }

    	return view('admin.UserHistory.index',compact('usersLists','userStaticTisMontyly'));

    }

    public function individualUser($id)
    {
    	$user = User::find($id);

    	return view('admin.UserHistory.individualUser',compact('user'));
    }

    public function userPrompt($id)
    {
    	$user = User::find($id);
    	$user->type = "Admin";

    	$user->save();

    	Session()->flash('message', "User Frompt Successfully");

    	return redirect()->route('userhistory.index');
    }


}
