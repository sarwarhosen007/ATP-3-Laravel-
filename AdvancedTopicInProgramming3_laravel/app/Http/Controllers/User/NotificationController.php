<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use Session;
use Auth;

class NotificationController extends Controller
{
    public function list()
    {


      $notificationList = Notification::where('SenderEmail',Auth::user()->email)
      					  ->where('Status','=','reject')
                  ->orWhere('Status','=','accept')
      					  ->get();

      return view('user.notification.notificationList',compact('notificationList'));
       
    }

    public function delete(Request $request,$id)
    {
    	$notification = Notification::find($id);
    	$notification->status = "remove";
    	$notification->save();

    	$request->session()->flash('deleteNotification', "Notification Delete Successfully");
    	return redirect()->route('notification.list');


    }

}
