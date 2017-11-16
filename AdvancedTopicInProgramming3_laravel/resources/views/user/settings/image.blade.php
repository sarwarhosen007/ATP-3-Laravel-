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

                    <li><a href="{{ route('porfileSetting.showProfile') }}">Profile</a></li>

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
                    <li class="active"><a href="{{ route('porfileSetting.showImagePage') }}">Image</a></li>
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">

                  @include('error.errors')

                  <form action="{{ route('updateProfileImage',Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
        					    <div class="form-group">
                        <label for="pwd">Image:</label>
                        <input type="file" name="profileImage" id="pwd">
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

     </div>
  @endsection