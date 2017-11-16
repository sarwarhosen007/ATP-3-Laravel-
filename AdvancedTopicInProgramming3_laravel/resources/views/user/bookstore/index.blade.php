@extends('layouts.master')

  @section('main-content')
       
       
    <div class="content-wrapper">

      <section class="container-fluid">
       <!-- Search Bar for book Serarch -->
            <form action="{{ route('bookSearch') }}" method="post" class="sidebar-form">

              {{ csrf_field() }}

              <div class="col-md-2">
                  <select class="form-control" name="department">
                    <option value="CSSE">CSSE</option>
                    <option value="BBA">BBA</option>
                    <option value="CSE">CSE</option>
                    <option value="EEE">EEE</option>
                  </select>
              </div>
              <div class="col-md-9">
                <div class="input-group">
                  <input type="text" name="BookTitle" {{ old('BookTitle') }} class="form-control" placeholder="Enter Book Title here...." required="">
                  <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                      </button>
                    </span>
                </div>
              </div>
           </form>

          <!-- /.End Book Search Bar -->
      </section>
    
    <!-- All User post Here -->

    <section class="container-fluid">
      <div class="row">
        @if(count($advertises) > 0)
          @foreach($advertises->all() as $advertise)

             <div class="col-md-4 individual-book" >
                <div class="user-post">
                  <div class="user-panel">
                    <div class="pull-left image">

                      @if($advertise->image != null)
                        <img src="{{ Storage::disk('local')->url($advertise->image) }}" class="user-image" alt="User Image">
                      @else
                        <img src="{{ asset('images/profile/image-1.jpeg') }}" class="user-image" alt="User Image">
                      @endif
                    </div>
                    <div class="pull-left info">
                      <p class="user-full-name">{{ $advertise->name }}</p> 
                      <span class="post-time">{{ \Carbon\Carbon::parse($advertise->created_at)->diffForHumans() }}</span>            
                    </div>
                    <div class="book-info">
                        <div class="book-title text-center">
                      <a href="{{ route('bookstore.details',$advertise->id) }}">{{ $advertise->bookTitle }}</a>
                      </div>
                      <div class="post-image">
                        <a href="#"><img src="{{ Storage::disk('local')->url($advertise->bookImage) }}" alt="User Image"></a>
                      </div>
                      <div class="book-title">
                         <ul>
                           <li><b>Price: </b><span>{{ $advertise->bookPrice }} tk</span></li>
                           <li><a href="{{ route('bookstore.details',$advertise->id) }}" class="btn btn-info btn-sm">See Details</a></li>
                         </ul>
                      </div>
                    </div>   
                  </div>
                </div> 
             </div>

            @endforeach

        @endif
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
             
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
    
  @endsection