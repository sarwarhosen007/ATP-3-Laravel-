<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Model\Message;

use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificationList = Notification::where('ReciverEmail',Auth::user()->email)
                          ->where('status','!=','delete')
                          ->get();
        if(count($notificationList) > 0 ){
            Session::put('notificationCount',count($notificationList));
        }

        return view('user.welcome');
    }
}
