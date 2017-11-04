@extends('layouts.master')

@section('main-content')

  <div class="content-wrapper">
	    <div class="after-container">  
	        <div class="container-fluid">
	            <div class="row">

					<div class="col-lg-4">
						@include('message.success')
					</div>
					 
	              <div class="col-lg-12">
	                  <div class="panel-group advertise-list">
	                    <div class="panel panel-primary">
	                      <div class="panel-heading"><b>List of Requests for this book</b></div>
	                      <div class="panel-body">
	                         <table class="table">
	                            <thead>
	                              <tr>
	                                <th>#</th>
	                                <th>Sender Email</th>
	                                <th>Created At</th>
	                                <th>Options</th>
	                              </tr>
	                            </thead>
	                            <tbody>	
	                                 @if(count($requestDetails->all()) > 0)	
	                                   @foreach($requestDetails->all() as $requestDetail)
			                              <tr>
			                                <td>{{ $loop->iteration }}</td>
			                                <td>{{ $requestDetail->SenderEmail }}</td>
			                                <td>{{ $requestDetail->created_at->diffForHumans() }}</td>
			                                <td>
			                                	<a href="{{ route('requestConfirmation',$requestDetail->id) }}" class="btn btn-success" @if($requestDetail->Status == 'accept') {{ "disabled" }} @endif >{{ ($requestDetail->Status == 'accept') ? 'Accepted':'Accept' }}</a>
			                                	<a href="{{ route('senderDetails',$requestDetail->id) }}" class="btn btn-info">Sender Profile</a>
			                                	<a href="{{ route('requestRejcet',$requestDetail->id) }}" class="btn btn-danger">Reject</a>
			                                </td>
			                              </tr>
			                            @endforeach

		                              @else
		                                 <span>No Request found</span>
		                            @endif

	                            </tbody>
	                          </table>
	                           <div class="col-lg-12 text-center">

	                               
	                           </div>
	                      </div>
	                    </div>
	                  </div>
	                  <a href="{{ route('advertise.index') }}" class="btn btn-primary">Back To List</a>
	              </div>
	            </div>
	        </div>
	    </div>
    </div>

  
@endsection