@extends('layouts.master')

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
                  <ul class="nav nav-pills nav-stacked">

                    @if(count($userInfo) > 0)
                      @foreach($userInfo as $user)
                        <li><a href="{{ route('message.show',$user->id) }}"></i> 
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
            <div class="box-header with-border">
              <h3 class="box-title">Direct Chat</h3>

              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fa fa-comments"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
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
                          <span class="direct-chat-name pull-left">Mahi</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="{{ asset('images/profile/mahi.jpg') }}" alt="Message User Image"><!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          {{ $Message->messageBody }}
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->
                    @else

                      <div class="direct-chat-msg right">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-right">Sarwar Hosen</span>                     
                          </div>
                          <img class="direct-chat-img" src="{{ asset('images/profile/mahi.jpg') }}" alt="Message User Image">
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