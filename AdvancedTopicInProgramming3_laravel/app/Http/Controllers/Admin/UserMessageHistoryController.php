<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Message;

class UserMessageHistoryController extends Controller
{
    public function index(){
    	$usersLists = User::where('type','=',null)->paginate(1);

        for($i = 1; $i<=12; $i++){

          $userMessageStaticTisMontyly[$i] = count(Message::whereYear('created_at','=',date('Y'))
                        ->whereMonth( 'created_at',date($i))->get());
         }


    	return view('admin.usermessages.usermessage',compact('usersLists','userMessageStaticTisMontyly'));
    }
}
