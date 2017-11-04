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
      $notificationList = Notification::where('ReciverEmail',Auth::user()->email)
      					  ->where('status','!=','delete')
      					  ->get();

      return view('user.notification.notificationList',compact('notificationList'));
       
    }

    public function delete(Request $request,$id)
    {
    	$notification = Notification::find($id);
    	$notification->status = "delete";
    	$notification->save();

    	$request->session()->flash('deleteNotification', "Notification Delete Successfully");
    	return redirect()->route('notification.list');


    }

}
