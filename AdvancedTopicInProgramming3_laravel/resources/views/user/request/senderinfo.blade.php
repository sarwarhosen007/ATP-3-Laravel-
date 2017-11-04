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
					<div class="col-md-4  col-md-offset-2">
						<div class="sendername">
							<b>Name: </b><span>{{ $senderInfo->name }}</span>
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