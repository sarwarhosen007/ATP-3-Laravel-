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

                    <li><a href="{{ route('profile') }}">Profile</a></li>

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
                    <li class="active"><a href="{{ route('emailPageShow') }}">Email</a></li>
                    <li><a href="{{ route('passwordPageShow') }}">Password</a></li>
                    <li><a href="#">Image</a></li>
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
            </div>

             <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">

                  @include('error.errors')

                  <form action="{{ route('UpdateEmail') }}" method="post">

                      {{ csrf_field() }}

                      <div class="form-group">
                        <label for="email">Current Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" value="{{ Session::get('email') }}" name="current-email" disabled="">
                      </div>
                      <div class="form-group">
                        <label for="newEmail">New Email:</label>
                        <input type="email" class="form-control" id="newEmail" placeholder="Enter Your New Email" name="newEmail">
                      </div>
                      <button type="submit" class="btn btn-success">Update</button>
                  </form>
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