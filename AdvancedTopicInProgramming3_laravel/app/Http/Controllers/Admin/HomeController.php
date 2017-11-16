<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\User\Advertise;
use App\RequestTrack;
use App\User;
use App\Model\Message;

class HomeController extends Controller
{
    public function index()
    {
    	$TotalAdvertise = Advertise::all();
    	$info[0] = count($TotalAdvertise);

    	$TotalSendRequestForBuyingBook = RequestTrack::all();

    	$info[1] = count($TotalSendRequestForBuyingBook);

    	$TotalRegisteredUser = User::where('email','!=',Session::get('email'))
                                    ->where('type','=',null)
                                    ->get();

    	$info[2] = count($TotalRegisteredUser);

        $info[3] = Message::whereDay('created_at','=',date('m'))->count();

    	return view('admin.home')->with('info',$info);
    }

    public function logout()
    {
    	Session::flush();

    	return redirect()->route('admin.loginView');
    }






}
