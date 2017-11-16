@extends('layouts.master')

@section('main-content')

  <div class="content-wrapper">
	    <div class="after-container">  
	        <div class="container-fluid">
	            <div class="row">
	              <div class="col-lg-12">
	                 @if(Session()->has('deleteNotification'))
		                  <div class="alert alert-success">
		                  	<span>{{ Session::get('deleteNotification') }}</span>
		                  </div>
	                @endif
	                  <div class="panel-group advertise-list">
	                    <div class="panel panel-primary">
	                      <div class="panel-heading"><b>List of notifications</b></div>
	                      <div class="panel-body">
	                         <table class="table">
	                            <thead>
	                              <tr>
	                                <th>#</th>
	                                <th>Sender Email</th>
	                                <th>Send At</th>
	                                <th>body</th>
	                                <th>options</th>
	                              </tr>
	                            </thead>
	                            <tbody>
	                                @if(count($notificationList->all()) > 0)
		                                @foreach($notificationList as $notification) 
			                                 <tr>
			                                    <td>{{ $loop->iteration }}</td>
			                                  	<td>{{ $notification->ReciverEmail }}</td>
			                                  	<td>{{ $notification->created_at->diffForHumans() }}</td>
			                                  	<td>Your Request {{ $notification->status }}</td>
			                                  	<td>
			                                  		<a href="{{ route('notification.delete',$notification->id) }}" class="btn btn-danger btn-sm">Delete</a>
			                                  	</td>
			                                  </tr>
			                            @endforeach
	                                @else
	                                   {{ "No Notifications" }}
	                                @endif
	                            </tbody>
	                          </table>
	                           <div class="col-lg-12 text-center">

	                               
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
