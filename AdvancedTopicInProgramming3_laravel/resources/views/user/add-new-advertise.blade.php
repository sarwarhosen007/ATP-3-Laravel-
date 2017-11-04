@extends('layouts.master')

@section('main-content')

   <div class="content-wrapper content-wrapper-height-create">
        <div class="contaier-fluid">
            <div class="col-md-8 col-md-offset-2">

 			     @include('error.errors')

              <div class="addvertise-from"> 
	               <form method="post" action="{{ route('advertise.store') }}" enctype="multipart/form-data">
	                 {{ csrf_field() }}
	                  <div class="form-group">
	                    <label for="book-title">Book Title:</label>
	                    <input type="text" name="bookTitle" class="form-control" id="book-title" placeholder="Enter Book Title...." value="{{ old('bookTitle') }}">
	                  </div>
	                  <div class="form-group">
	                    <label for="book-writer">Book Writer:</label>
	                    <input type="text" name="bookWriter" class="form-control" id="book-writer" placeholder="Enter Book Writer Name...." value="{{ old('bookWriter') }}" >
	                  </div>
	                  <div class="form-group">
	                      <label for="sel1">Select Department:</label>
	                      <select class="form-control" id="sel1" name="department">
	                        <option value="CSSE">CSSE</option>
	                        <option value="BBA">BBA</option>
	                        <option value="ENGLISH">ENGLISH</option>
	                        <option value="CSE">CSE</option>
	                      </select>
	                  </div>
	                   <div class="form-group">
	                    <label for="purchase-date">Purchase Date:</label>
	                    <input type="text" name="purchaseDate" class="form-control" id="datepicker" placeholder="Select Date..." value="{{ old('purchaseDate') }}" >
	                  </div>
	                  <div class="form-group">
	                    <label for="edition">Edition:</label>
	                    <input type="number" name="bookEdition" class="form-control" id="edition" placeholder="Enter Book Edition..." value="{{ old('bookEdition') }}">
	                  </div>
	                  <div class="form-group">
	                    <label for="price">Price:</label>
	                    <input type="number" name="bookPrice" class="form-control" id="price" placeholder="Enter Book Price..." value="{{ old('bookPrice') }}" >
	                  </div>
	                  <div class="form-group">
	                    <label for="image">Image:</label>
	                    <input type="file" name="bookImage" class="form-control" id="image" placeholder="Enter Book Price..." name="bookImage" value="{{ old('bookImage') }}" >
	                  </div>
	                  <button type="submit" class="btn btn-success">Submit</button>
	                  <a href="{{ route('advertise.index') }}" class="btn btn-info space">Cancel</a>
	                </form>
                </div>
            </div>
        </div>
    </div>

@endsection