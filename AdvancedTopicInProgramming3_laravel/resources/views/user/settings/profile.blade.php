@extends('layouts.master')

  @section('main-content')

      <div class="content-wrapper">

  <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">

            <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Profile</h3>
                </div>
                <div class="box-body no-padding">
                  <ul id="main-menu-list" class="nav nav-pills nav-stacked">

                    <li class="active"><a href="{{ route('porfileSetting.showProfile') }}">Profile</a></li>

                  </ul>
                </div>
                <!-- /.box-body -->
              </div>

              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Setting List</h3>
                </div>
                <div class="box-body no-padding">
                  <ul id="main-menu-list" class="nav nav-pills nav-stacked">
           					<li><a href="{{ route('porfileSetting.showSettingPage') }}">Email</a></li>
           					<li><a href="{{ route('porfileSetting.showPasswordpage') }}">Password</a></li>
           					<li><a href="{{ route('porfileSetting.showImagePage') }}">Image</a></li>
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
               
               @include('error.success')

              <div class="box box-primary">
                <div class="box-header with-border">
                   <div class="form-group">
                        @foreach($userInfo as $user)
                           <span>Name: </span><span>{{ $user->name }}</span><br><br>
                           <span>Email: </span><span>{{ $user->email }}</span><br><br>
                           <span>Profile Image:</span><br><br>
                           @if($user->image != null)

                            <img src="{{ Storage::disk('local')->url($user->image) }}" alt="" style=" height: 100px">
                            @else

                               <img src="{{ asset('images/profile/image-1.jpeg') }}" alt="">

                            @endif
                        @endforeach
                    </div>
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