<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Model\UserConversionTrack;
use App\Model\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userInfo = User::where('email','!=',Auth::user()->email)->get();

         return view('user.message.message',compact('userInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find paticipant Email From User Table

        $individualUser = User::find($id);

        // find convertions id from convertion_track table

        $convertionId = UserConversionTrack::all();

        $conId = 0;
        foreach ($convertionId as $userIdin) {
               if(($userIdin->SerderEmail == $individualUser->email) && ($userIdin->ReciverEmail ==Auth::user()->email)){
                   $conId = $userIdin->userIdentification;
                   break;

               }else if(($userIdin->ReciverEmail == $individualUser->email) && ($userIdin->SerderEmail ==Auth::user()->email)){

                   $conId = $userIdin->userIdentification;
                   break;
               }
        }
        
        $PartnerconvertionLevel = $conId."-".$individualUser->email;
        $convertionLevelAuthUser = $conId."-".Auth::user()->email;
        
        $AuthUserMessageList = Message::where('conversitionLevel',$convertionLevelAuthUser)
                                        ->orWhere('conversitionLevel',$PartnerconvertionLevel)
                                        ->get();
       //$partnerMessageList = Message::where('conversitionLevel',$PartnerconvertionLevel)->get();

    

        $userInfo = User::where('email','!=',Auth::user()->email)->get();

        return view('user.message.individualChat')
                    ->with('userInfo',$userInfo)
                    ->with('id',$id)
                    ->with('AuthUserMessageList',$AuthUserMessageList);
                    //->with('partnerMessageList',$partnerMessageList);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
             'message' => 'required',
            ]);

        $individualUser = User::find($id);
        $userConversionTrack = UserConversionTrack::all();
        $userIdentification = "";
        


        foreach ($userConversionTrack as $userIdin) {
               if(($userIdin->SerderEmail == $individualUser->email) && ($userIdin->ReciverEmail ==Auth::user()->email)){
                   $userIdentification = $userIdin->userIdentification;

               }else if(($userIdin->ReciverEmail == $individualUser->email) && ($userIdin->SerderEmail ==Auth::user()->email)){

                   $userIdentification = $userIdin->userIdentification;
               }
        }
         
        if($userIdentification != null){
            $newConversition = new Message();

            $newConversition->messageBody = $request->message;
            $newConversition->conversitionLevel  = $userIdentification."-".Auth::user()->email;

            $newConversition->save();
        }else{
            $userConversionTrack = new UserConversionTrack();
            $newConversition = new Message();

            $userConversionTrack->SerderEmail = Auth::user()->email;
            $userConversionTrack->ReciverEmail = $individualUser->email;
            $userConversionTrack->userIdentification = count(Message::all())+1;

            $newConversition->messageBody = $request->message;
            $count = count(Message::all())+1;
            $newConversition->conversitionLevel  = $count."-".Auth::user()->email;

            $userConversionTrack->save();
            $newConversition->save();

        }
            return redirect()->back();
 
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
