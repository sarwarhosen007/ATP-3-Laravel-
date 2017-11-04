<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RequestTrack;
use Session;
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
       $requetStatus->Status = "accept";
       $requetStatus->save();
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

    	 $rejectUser->Status = "reject";

    	 $rejectUser->save();

    	 return redirect()->back();
    }

}
