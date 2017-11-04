<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Advertise;
use Session;
use Auth;
use DB;
use App\RequestTrack;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        $userEmail = Auth::user()->email;
        $advertiseList = Advertise::where('userEmail',$userEmail)->get();
       
        $i  = 0;
        foreach ($advertiseList as $advertise) {
            $advertiseId = $advertise->id;
            $count[$i++] = RequestTrack::where('AdvertiseId',$advertiseId)
                           ->where('Status','pending')
                           ->count();
        }
        
        return view('user.user-own-advertiseList',compact('advertiseList','count'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('user.add-new-advertise');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[

              'bookTitle'    => 'bail|required|min:5',
              'bookWriter'   => 'bail|required',
              'purchaseDate' => 'required',
              'bookEdition'  => 'required',
              'bookPrice'    => 'bail|required|numeric|min:50|max:500',
              'bookImage'    => 'required',

            ]);

         $advertise = new Advertise();
         $advertise->bookTitle    = $request->bookTitle;
         $advertise->bookWriter   = $request->bookWriter;
         $advertise->department   = $request->department;
         $advertise->purchaseDate = $request->purchaseDate;
         $advertise->bookEdition  = $request->bookEdition;
         $advertise->bookPrice    = $request->bookPrice;

         if($request->hasFile('bookImage')){
           $imageName = $request->bookImage->store('public/upload/BookImage');
         }
         $advertise->bookImage = $imageName;
         $advertise->userEmail = Auth::user()->email;
         
         $advertise->save();

         return redirect()->route('advertise.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advertise = Advertise::where('id',$id)->first();
        $count     = RequestTrack::where('AdvertiseId',$id)->count();
        
        return view('user.advertise-details',compact('advertise','count'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertise = Advertise::where('id',$id)->first();

        return view('user.advertise-edit',compact('advertise'));
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

              'bookTitle'    => 'bail|required|min:5',
              'bookWriter'   => 'bail|required',
              'purchaseDate' => 'required',
              'bookEdition'  => 'required',
              'bookPrice'    => 'bail|required|numeric|min:50|max:500',
              'bookImage'    => 'required',

            ]);

         $advertise = Advertise::find($id);
         $advertise->bookTitle    = $request->bookTitle;
         $advertise->bookWriter   = $request->bookWriter;
         $advertise->department   = $request->department;
         $advertise->purchaseDate = $request->purchaseDate;
         $advertise->bookEdition  = $request->bookEdition;
         $advertise->bookPrice    = $request->bookPrice;
         if($request->hasFile('bookImage')){
           $imageName = $request->bookImage->store('public/upload/BookImage');
         }
         $advertise->bookImage = $imageName;
         $advertise->save();
         Session::flash('message', 'Successfully Update'); 

         return redirect()->route('advertise.index');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertise = Advertise::where('id',$id);
        $advertise->delete();
        return back();
    }
}
