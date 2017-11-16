<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RequestTrack;
use App\Notification;
use App\Model\UserConversionTrack;
use Session;
use Auth;
use App\User;

class RequestTrackController extends Controller
{
    public function Details($id)
    {
    	$requestDetails = RequestTrack::where('AdvertiseId',$id)
    								  ->where('Status','pending')
    								  ->get();
  		Session()->put('AdvertiseId', $id);
    	return view('user.request.requestDetails',compact('requestDetails',$requestDetails));
    }

    public function requestConfirmation($id){
      
       $requetStatus = RequestTrack::find($id);
       $notification = Notification::find($id);

       $requetStatus->Status = "accept";
       $notification->status = "accept";

      //  create New convertion Id
        $individualUser = $notification->SenderEmail;

        $userConversionTrack = UserConversionTrack::all();
        $userIdentification = "";
        
        foreach ($userConversionTrack as $userIdin) {
               if(($userIdin->SerderEmail == $individualUser) && ($userIdin->ReciverEmail ==Auth::user()->email)){
                   $userIdentification = $userIdin->userIdentification;

               }else if(($userIdin->ReciverEmail == $individualUser) && ($userIdin->SerderEmail ==Auth::user()->email)){

                   $userIdentification = $userIdin->userIdentification;
               }
        }

        if($userIdentification == null){

          $userConversionTrack = new UserConversionTrack();
          $userConversionTrack->SerderEmail = Auth::user()->email;
          $userConversionTrack->ReciverEmail = $individualUser;
          $userConversionTrack->userIdentification = count(UserConversionTrack::all())+1;
          $userConversionTrack->save();
        }

       $requetStatus->save();
       $notification->save();

       Session()->flash('success', "Request Update Successfully");
       return redirect()->route('advertise.index');

    }

    public function senderDetails($id){

    	//for retrive senderEmail 
        $senderEmail = RequestTrack::where('id',$id)->first();

        // retrive sender info
        $senderInfo = User::where('email',$senderEmail->SenderEmail)->first();

        return view('user.request.senderinfo')->with('senderInfo',$senderInfo);

    }

    public function requestRejcet($id){

       $rejectUser = RequestTrack::find($id);
    	 $notification = Notification::find($id);

       $rejectUser->Status = "reject";
    	 $notification->status = "reject";

       $rejectUser->save();
    	 $notification->save();

    	 return redirect()->back();
    }

}
