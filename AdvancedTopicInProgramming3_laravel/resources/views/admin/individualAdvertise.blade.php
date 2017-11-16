@extends('admin.layouts.master')

@section('title')
	Single Advertise
@endsection

@section('main-content')

    <div class="content-wrapper">
      <div class="after-container">  
          <div class="container-fluid">
               <div class="single-wrapper">
                 <div class="row">
                  <div class="col-md-4">
                    <div class="advertise-image">
                      <img src="{{ Storage::disk('local')->url($advertise->bookImage) }}" alt="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                       <span>Title: <b>{{ $advertise->bookTitle }}</b></span>
                    </div>
                    <div class="form-group">
                       <span>Writer: <b>{{ $advertise->bookWriter }}</b></span>
                    </div>
                    <div class="form-group">
                       <span>Department: <b>{{ $advertise->department }}</b></span>
                    </div>
                    <div class="form-group">
                       <span>Purchase Date: <b>{{ date('d-m-Y', strtotime($advertise->created_at))}}</b></span>
                    </div>
                    <div class="form-group">
                       <span>Edition: <b>{{ $advertise->bookEdition }} th</b></span>
                    </div>
                    <div class="form-group">
                       <span>Price: <b>{{ $advertise->bookPrice }} tk</b></span>
                    </div>
                    <div class="form-group">
                      <a href="{{ route('advertiseList.index') }}" class="btn btn-info btn-sm">Back To List</a>
                    </div>
                  </div>
                  <div class="col-md-4">
                      <h4><strong>Advertiser Info</strong></h4>
                     
                       <div class="form-group">
                         <span>Name: <b>{{ $user->name }}</b></span>
                      </div>
                      <div class="form-group">
                         <span>Email: <b>{{ $user->email }}</b></span>
                      </div>
            
                  </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12">
                     <div class="panel-group advertise-list">
                        <div class="panel panel-primary">
                          <div class="panel-heading"><b>List of User Request History</b></div>
                          <div class="panel-body">
                             <table class="table">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Sender Email</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                   @if(count($request_history) > 0)
                                      @foreach($request_history as $user)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>                                    
                                        <td>{{ $user->SenderEmail }} <a href="{{ route('userhistory.individualUser',$userInfo[$loop->index]) }}" class="btn btn-xs btn-success">Profile</a></td>                                    
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        
                                          @if($user->Status == 'reject')
                                             <td><span class="label label-warning">{{ $user->Status }}</span> </td>
                                          @endif
                                          @if($user->Status == 'accept')
                                             <td><span class="label label-success">{{ $user->Status }}</span> </td>
                                          @endif
                                          @if($user->Status == 'pending')
                                             <td><span class="label label-info">{{ $user->Status }}</span> </td>
                                          @endif
                                           
                                       </tr>
                                      @endforeach
                                   @endif
                                 
                                   
                                </tbody>
                              </table>
                               
                          </div>
                        </div>
                      </div>
                   </div>
                 </div>
             </div>
          </div>
      </div>
    </div>


@endsection