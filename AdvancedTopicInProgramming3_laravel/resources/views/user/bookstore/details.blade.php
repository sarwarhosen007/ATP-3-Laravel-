@extends('layouts.master')

@section('head-extra-css')

  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">

@endsection

  @section('main-content')
  <div class="content-wrapper">     
    <section class="container-fluid">
      <div class="row">
          <div class="col-md-6">
              <div class="details-imgae-part">
                <div class="advertiser-profile-image">
                  <img src="{{ asset('images/profile/mahi.jpg') }}" class="img-circle" alt="User Image">
                </div>
                  <div class="advertiser-info">
                    <p class="user-full-name">{{ $userInfo->name }}</p> 
                    <span class="post-time">{{ $advertise->created_at->diffForHumans() }}</span>            
                </div>
                <div class="post-image-details">
                      <a href="#"><img src="{{ Storage::disk('local')->url($advertise->bookImage) }}" alt="User Image"></a>
                </div>
              </div>
          </div>
          <div class="col-md-6">
            <div class="panel-wrapper">
              <div class="panel-group">
                <div class="panel panel-primary">
                  <div class="panel-heading"> All Information About this book</div>
                  <div class="panel-body">
                     <div class="book-title">
                        <b>Title -></b><span>{{ $advertise->bookTitle }}</span>
                     </div>
                     <div class="book-price">
                       <b>Price -></b><span> {{ $advertise->bookPrice }}tk</span>
                     </div>
                     <div class="book-purchase-time">
                       <b>Purchase Date -></b><span>{{ date('d-m-y',strtotime($advertise->created_at)) }}</span>
                     </div> 
                     <div class="book-edition">
                       <b>Edition -></b><span> {{ $advertise->bookEdition }} th Edition</span>
                     </div>
                     @if(Auth::User()->email == $advertise->userEmail)
                          {{ '' }}
                      @else

                          <div class="row">
                           <div class="col-md-6 request-info">
                             <form id="sendrequest" action="{{ route('sendrequest') }}" method="post" style="display: none;">

                               {{ csrf_field() }}

                               <input type="email" name="RecevierEmail" value="{{ $advertise->userEmail }}">
                               <input type="email" name="SenderEmail" value="{{ Auth::User()->email }}">
                               <input type="text" name="AdvertiseId" value="{{  $advertise->id }}">
                                
                             </form>
                             <a href="#" class="btn btn-success @if(count($requested) == 1)   {{ "disabled" }} @endif " onclick="
                              if(confirm('Are You Sure Want To Send Request?')){
                                event.preventDefault();
                                document.getElementById('sendrequest').submit();
                              } 
                             " > @if(count($requested) == 1)  
                                    <i class="fa fa-check-circle" aria-hidden="true"></i> Requested 
                                 @else {{ "Send Request" }} @endif</a>
                           </div>
                           @if(count($requested) != 1)
                             <div class="col-md-offset-6 request-info-message">
                                <div class="alert alert-info">
                                  <strong>Info!</strong> <span>If you Send Request Then System Automaticaly Send Email to the Adviser</span>
                                </div>
                             </div>
                           @endif
                         </div>

                      @endif
                  </div>
                </div>
              </div>
            </div>
            <a href="{{ route('bookstore.show') }}" class="btn btn-primary">Back To Store</a>

              @include('message.success') 
              @include('message.warning') 

          </div>
      </div>
    </section>
    <section class="container-fluid">

       <div class="row text-center">
         <div class="col-lg-12">
           <div class="related-books">
             <h4>Related Books</h4>
           </div>
          
             <div class="owl-carousel owl-theme">
                 @if(count($relatedBooks) > 0)
                  @foreach($relatedBooks->all() as $relatedBook)

                    <div class="item">                 
                      <div class="related-book">
                              <div class="book-title text-center">
                            <a href="{{ route('bookstore.details',$relatedBook->id) }}">{{ $relatedBook->bookTitle }}</a>
                            </div>
                            <div class="post-image">
                              <a href="#"><img src="{{ Storage::disk('local')->url($relatedBook->bookImage) }}" alt="User Image"></a>
                            </div>
                            <div class="book-title">
                               <ul>
                                 <li><b>Price: </b><span>{{ $relatedBook->bookPrice }}tk</span></li>
                                 <li><a href="{{ route('bookstore.details',$relatedBook->id) }}" class="btn btn-info btn-sm">See Details</a></li>
                               </ul>
                            </div>
                       </div>
                    </div>

                  @endforeach
                @endif
            </div>
         </div>
       </div>
    </section>
 </div>
  @endsection

  @section('footer-extra-js')
    <script src="{{ asset("js/owl.carousel.min.js") }}" type="text/javascript"></script>
    <script>
       $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
      });
    </script>
  @endsection