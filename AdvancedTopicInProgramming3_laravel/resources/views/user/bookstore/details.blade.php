@extends('layouts.master')

@section('head-extra-css')

@endsection

  @section('main-content')
  <div class="content-wrapper">     
    <section class="container-fluid">
      <div class="row">
          <div class="col-md-6">
              <div class="details-imgae-part">
                <div class="advertiser-profile-image">
                  @if(Auth::user()->image != null)

                     <img src="{{ Storage::disk('local')->url($userInfo->image) }}" class="img-circle" alt="User Image">

                  @else
                     <img src="{{ asset('images/profile/mahi.jpg') }}" class="img-circle" alt="User Image">
                  @endif

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
 </div>
  @endsection

  @section('footer-extra-js')
  @endsection