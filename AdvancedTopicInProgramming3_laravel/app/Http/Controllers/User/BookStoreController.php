<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Advertise;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\RequestTrack;
use App\Notification;
use Session;
use DB;


class BookStoreController extends Controller
{
     public function index(){

        $advertises = DB::table('advertises')
            ->join('users', 'advertises.userEmail', '=', 'users.email')
            ->select('advertises.*', 'users.name')
            ->get();

     	//$advertises = Advertise::paginate(6);
      
     	return view('user.bookstore.index',compact('advertises'));
     }
     
     public function details($id){

     	$advertise = Advertise::where('id',$id)->first();

        $userInfo = User::where('email',$advertise->userEmail)->first();

     	$title = $advertise->bookTitle;

     	$relatedBooks = DB::table('advertises')
                ->where('bookTitle', 'like', $title.'%')
                ->orderBy('created_at','desc')
                ->get();

        $requested = DB::table('request_tracks')
                    ->where('SenderEmail',Auth::user()->email)
                    ->where('AdvertiseId',$id)
                    ->get();

     	return view('user.bookstore.details',compact('advertise','userInfo','relatedBooks','requested'));
     }


     public function SendRequest(Request $request)
     {
        $RecevierEmail =  $request->RecevierEmail;
        $SenderEmail   =  $request->SenderEmail;
        $AdvertiseId   =  $request->AdvertiseId;
        
        $requested = DB::table('request_tracks')
                    ->where('SenderEmail',Auth::user()->email)
                    ->where('AdvertiseId',$AdvertiseId)
                    ->get();

        if(count($requested) == 1){
            return redirect()->back();

            $request->session()->flash('WarningMessage', "Your Already Sent Request");
        }

        $requestTrack = new RequestTrack();
        $notification = new Notification();

        // For RequestTrack
        $requestTrack->RecevierEmail = $RecevierEmail;
        $requestTrack->SenderEmail   = $SenderEmail;
        $requestTrack->AdvertiseId   = $AdvertiseId;
        $requestTrack->Status        = "pending";

        // For Notificationa
        $notification->SenderEmail  = $SenderEmail;
        $notification->ReciverEmail = $RecevierEmail;
        $notification->body         = "send request";

        $requestTrack->save();
        $notification->save();

        $request->session()->flash('message', "Your Request Sent Successfully");

        return redirect()->back();


     }


}
