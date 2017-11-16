@extends('admin.layouts.master')

@section('title')
	Admin | Profile
@endsection

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

                    <li class="active"><a href="{{ route('profile') }}">Profile</a></li>

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
                    <li><a href="{{ route('emailPageShow') }}">Email</a></li>
                    <li><a href="{{ route('passwordPageShow') }}">Password</a></li>
                    <li><a href="{{ route('imagePageShow') }}">Image</a></li>
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
                         
                           <span>Name: </span><span>{{ $userInfo->name }}</span><br><br>
                           <span>Email: </span><span>{{ $userInfo->email }}</span><br><br>
                           <span>Profile Image:</span><br><br>

                          @if($userInfo->image != null)

                            <img src="{{ Storage::disk('local')->url($userInfo->image) }}" alt="" style=" height: 100px">
                            @else

                               <img src="{{ asset('images/profile/image-1.jpeg') }}" alt="">

                          @endif
 
                    </div>
                </div>
              </div>
              <!-- /. box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
    <!-- /.content -->
  </div>


@endsection

@section('footer-js')
 
  

@endsection