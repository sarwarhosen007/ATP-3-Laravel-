@extends('layouts.master')

	@section('main-content')

	  <div class="content-wrapper">
	    <div class="after-container">  
	        <div class="container-fluid">
	             <div class="single-wrapper">
		             <div class="row">
		             	<div class="col-md-4">
		             		<div class="advertise-image">
		             			<img src="{{ Storage::disk('local')->url($advertise->bookImage) }}" alt="" style="width: 100px;height: 200px;">
		             		</div>
		             	</div>
		             	<div class="col-md-6">
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
						    	<a  href="{{ route('requestDetails',$advertise->id) }}" class="btn btn-primary btn-sm">Requests <span class="badge">{{ $count }}</span></a>
						    	<a href="{{ route('advertise.edit',$advertise->id) }}" class="btn btn-success btn-sm">Edit</a>
						    	<a href="{{ route('advertise.index') }}" class="btn btn-info btn-sm">Back To List</a>
						    </div>
		             	</div>
		             </div>
		         </div>
	        </div>
	    </div>
    </div>


	@endsection