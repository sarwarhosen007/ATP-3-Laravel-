@extends('layouts.master')

@section('title')
  Individual Message
@endsection
  @section('main-content')

      <div class="content-wrapper">

  <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Community Member</h3>
                </div>
                <div class="box-body no-padding">
                  <ul id="main-menu-list" class="nav nav-pills nav-stacked">

                    @if(count($userInfo) > 0)
                      @foreach($userInfo as $user)
                        @php
                          $url = 'user/message/'. $user->id  .'/edit';
                        @endphp
                        <li class="{{ Request::is($url) ? 'active' : $url }}" ><a href="{{ route('message.edit',$user->id) }}"></i> 
                            {{ $user->name }}
                          </a></li>
                      @endforeach
                    @endif

                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Inbox</h3>
                     <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                @if(count($AuthUserMessageList->all()) > 0)
                  @foreach($AuthUserMessageList as $Message)

                     @php

                       $email = explode("-", $Message->conversitionLevel);

                     @endphp
          
                    @if(Auth::user()->email != $email[1])

                      <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix">
                          <span class="direct-chat-name pull-left">{{ $individualUser }}</span>
                        </div>

                         @if(Session::get('image') != null)
                            <img src="{{ Storage::disk('local')->url(Session::get('image')) }}" class="direct-chat-img img-circle" alt="User Image">
                          @else
                            <img src="{{ asset('images/profile/image-1.jpeg') }}" class="img-circle direct-chat-img" alt="User Image">
                          @endif

                        <div class="direct-chat-text">
                          {{ $Message->messageBody }}
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->
                    @else

                      <div class="direct-chat-msg right">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-right">Me</span>                     
                          </div>

                          @if(Auth::user()->image != null)
                            <img src="{{ Storage::disk('local')->url(Auth::user()->image) }}" class="direct-chat-img img-circle" alt="User Image">
                          @else
                            <img src="{{ asset('images/profile/image-1.jpeg') }}" class="img-circle direct-chat-img" alt="User Image">
                          @endif

                          <div class="direct-chat-text" style="margin-right: 8px;">
                            {{ $Message->messageBody }}
                          </div>
                        </div>

                    @endif

                  @endforeach
                  @else
                    {{ "Message Not found" }}
               @endif

                
              </div>
              <!--/.direct-chat-messages-->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form action="{{ route('message.update',$id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="input-group">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
                      </span>
                </div>
              </form>
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
            <ul>
               @if(count($errors->all()) > 0)
                   @foreach($errors as $error)
                      <li>{{ $error }}</li>
                   @endforeach
               @endif
            </ul>
                </div>
              </div>
              <!-- /. box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>

     </div>
  @endsection

  @section('footer-extra-js')
    <script>
      $(document).ready(function(){
         //$('.content-wrapper .direct-chat-text').scrollTop(100000);
        var messageBody = document.querySelector('.direct-chat-messages');
        messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
      });
    </script>
  @endsection