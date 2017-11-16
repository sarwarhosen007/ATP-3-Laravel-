<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User\Advertise;
use App\User;
use App\RequestTrack;
use DB;

class AdvertiseListController extends Controller
{
    public function index()
    {
    	$advertiseList = Advertise::paginate(1);

      for($i = 1; $i<=12; $i++){

          $advertIseMonth[$i] = count(Advertise::whereYear('created_at','=',date('Y'))
                        ->whereMonth( 'created_at',date($i))->get());
      }
      //return dd($advertIseMonth);
    	return view('admin.advertiseList',compact('advertiseList','advertIseMonth'));

    }

    public function ajaxRequest()
    {
      return response()->json(['success'=>'Got Simple Ajax Request.']);

    }

    public function individualAdvertise($id)
    {
    	$advertise = Advertise::find($id);
    	$user = User::where('email',$advertise->userEmail)->first();

      $request_history = RequestTrack::where('AdvertiseId',$id)->get();

      $i = 0;
      foreach ($request_history as $Email) {
         $userInfo[$i] = User::where('email',$Email->SenderEmail)->value('id');
         $i++;    
      }
      
       

    	return view('admin.individualAdvertise',compact('advertise','user','request_history',
        'userInfo'));

    }

   public function deleteAdvertise($id)
   {
   	  Advertise::find($id)->delete();

   	  Session()->flash('message', "Delete Successfully");

   	  return redirect()->back();


   }



}
