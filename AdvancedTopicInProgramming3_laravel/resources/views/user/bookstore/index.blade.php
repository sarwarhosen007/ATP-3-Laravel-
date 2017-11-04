@extends('layouts.master')

  @section('main-content')
       
       
    <div class="content-wrapper">

      <section class="container-fluid">
       <!-- Search Bar for book Serarch -->
            <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Enter Book Title here....">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
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
                      <img src="{{ asset('images/profile/mahi.jpg') }}" class="img-circle" alt="User Image">
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