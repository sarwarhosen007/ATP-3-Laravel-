@extends('layouts.master')

  @section('main-content')

      <div class="content-wrapper">

  <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Your Community Member</h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">

                    @if(count($userInfo) > 0)
                      @foreach($userInfo as $user)
                        <li><a href="{{ route('message.edit',$user->id) }}"></i> 
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
                  <h3 class="box-title">List Of New Member</h3>
                     <!-- DIRECT CHAT PRIMARY -->
                      <div class="row">
                        <div class="col-md-4">
                          <img src="{{ asset('images/profile/mahi.jpg') }}" alt="" class="img-responsive">
                          <div class="user-info  text-center"> 
                            <span>Sarwar</span>
                            <a href="#" class="btn btn-primary btn-sm">Add Request</a>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <img src="{{ asset('images/profile/mahi.jpg') }}" alt="" class="img-responsive">
                          <div class="user-info  text-center"> 
                            <span>Tuhin</span>
                            <a href="#" class="btn btn-primary btn-sm">Add Request</a>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <img src="{{ asset('images/profile/mahi.jpg') }}" alt="" class="img-responsive">
                          <div class="user-info text-center"> 
                            <span>Nabil</span>
                            <a href="#" class="btn btn-primary btn-sm">Add Request</a>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <img src="{{ asset('images/profile/mahi.jpg') }}" alt="" class="img-responsive">
                          <div class="user-info  text-center"> 
                            <span>Sarwar</span>
                            <a href="#" class="btn btn-primary btn-sm">Add Request</a>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <img src="{{ asset('images/profile/mahi.jpg') }}" alt="" class="img-responsive">
                          <div class="user-info  text-center"> 
                            <span>Tuhin</span>
                            <a href="#" class="btn btn-primary btn-sm">Add Request</a>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <img src="{{ asset('images/profile/mahi.jpg') }}" alt="" class="img-responsive">
                          <div class="user-info text-center"> 
                            <span>Nabil</span>
                            <a href="#" class="btn btn-primary btn-sm">Add Request</a>
                          </div>
                        </div>
                      </div>
          <!--/.direct-chat -->
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