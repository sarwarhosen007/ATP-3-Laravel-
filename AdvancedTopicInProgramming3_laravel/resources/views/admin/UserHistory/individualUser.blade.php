@extends('admin.layouts.master')

@section('title')
	Individual User
@endsection

@section('main-content')

    <div class="content-wrapper">
      <div class="after-container">  
          <div class="container-fluid">
               <div class="single-wrapper">
                 <div class="row">
                  <div class="col-md-4">
                    <div class="advertise-image">
                     @if($user->image != null)
                       <img src="{{ Storage::disk('local')->url($advertise->bookImage) }}" alt="">
                      @else
                        <img src="{{ asset('images/profile/image-1.jpeg') }}" alt="">
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                       <span>Name: <b>{{ $user->name }}</b></span>
                    </div>
                    <div class="form-group">
                       <span>Email: <b>{{ $user->email }}</b></span>
                    </div>
                    <div class="form-group">
                       <span>Registration Date: <b>{{ $user->created_at->diffForHumans() }}</b></span>
                    </div>
                     
                    <div class="form-group">
                      <a href="{{ route('userhistory.index') }}" class="btn btn-info btn-sm">Back To List</a>
                      <a href="{{ route('individualUser.userPrompt',$user->id) }}" class="btn btn-success btn-sm">Prompt To Admin</a>
                    </div>
                  </div>
                   
                 </div>
             </div>
          </div>
      </div>
    </div>


@endsection