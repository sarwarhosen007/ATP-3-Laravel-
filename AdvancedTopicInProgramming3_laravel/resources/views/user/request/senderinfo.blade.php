@extends('layouts.master')

@section('main-content')

	@extends('layouts.master')

@section('main-content')

  <div class="content-wrapper">
	    <div class="after-container">  
	        <div class="container-fluid">
	            <div class="row">

					<div class="col-lg-4">
						@include('message.success')
					</div>
					<div class="col-md-4 ">
						<div class="sendername">
							 
							 <div class="form-group">
	                           <span>Name: </span><span>{{ $senderInfo->name }}</span><br><br>
	                           <span>Email: </span><span>{{ $senderInfo->email }}</span><br><br>
	                           <span>Profile Image:</span><br><br>

	                          @if($senderInfo->image != null)

	                            <img src="{{ Storage::disk('local')->url($senderInfo->image) }}" alt="" style=" height: 100px">
	                            @else

	                               <img src="{{ asset('images/profile/image-1.jpeg') }}" alt="">
	                          @endif
		 
		                    </div>
						</div>
					</div>
	              <div class="col-lg-12">
	                   
	                  <a href="{{ route('requestDetails',Session::get('AdvertiseId')) }}" class="btn btn-primary">Back To List</a>
	              </div>
	            </div>
	        </div>
	    </div>
    </div>

  
@endsection

@endsection