@extends('layouts.master')

  @section('main-content')
	
    <div class="content-wrapper">
	    <div class="after-container">  
	        <div class="container-fluid">
	            <div class="row">
	              <div class="col-lg-12 text-center">
	                 <a href="{{ route('advertise.create') }}" class="btn btn-success btn-lg">Add New Advertise</a>
	              </div>

					<div class="col-lg-4">
						@include('message.success')
					</div>
					 

	              <div class="col-lg-12">
	                  <div class="panel-group advertise-list">
	                    <div class="panel panel-primary">
	                      <div class="panel-heading"><b>List of your advertise</b></div>
	                      <div class="panel-body">
	                         <table class="table">
	                            <thead>
	                              <tr>
	                                <th>#</th>
	                                <th>Title</th>
	                                <th>Created At</th>
	                                <th>Options</th>
	                              </tr>
	                            </thead>
	                            <tbody>
	                            @if(count($advertiseList) > 0)

									@foreach($advertiseList->all() as $advertise)
											
		                              <tr>
		                                <td>{{ $loop->iteration }}</td>
		                                <td>{{ $advertise->bookTitle }}</td>
		                                <td>{{ $advertise->created_at->diffForHumans() }}</td>
		                                <td>
		                                  <a href="{{ route('advertise.edit',$advertise->id) }}" class="btn btn-info btn-sm">Edit</a>
										 <form id="dele-form-{{ $advertise->id }}" action="{{ route('advertise.destroy',$advertise->id) }}" style="display: none;" method="post">
										 	{{ csrf_field() }}
										 	{{ method_field('DELETE') }}
										 </form>

		                                  <a href="#" class="btn btn-danger btn-sm" onclick="
		                                  	if(confirm('Are You sure Want to Delete?')){
		                                  		event.preventDefault();
		                                  		document.getElementById('dele-form-{{ $advertise->id }}').submit();
		                                  	}else{
		                                  		event.preventDefault();
		                                  	}
		                                  ">Delete</a>


		                                  <a  href="{{ route('requestDetails',$advertise->id) }}" class="btn btn-primary btn-sm">
		                                   <span class="badge"> {{ $count[$loop->index] }}</span> Requests</a>
		                                  <a  href="{{ route('advertise.show',$advertise->id )}}" class="btn btn-success btn-sm">Details</a>
		                                </td>
		                              </tr>

									@endforeach
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