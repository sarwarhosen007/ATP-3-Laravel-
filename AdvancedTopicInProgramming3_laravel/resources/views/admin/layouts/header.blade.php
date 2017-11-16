<!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin Panel</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              @if(Session::has('image'))

                  <img src="{{ Storage::disk('local')->url(Session::get('image')) }}" alt="" class="user-image">
                  @else

                     <img src="{{ asset('images/profile/image-1.jpeg') }}" alt="" class="user-image">

                @endif 
              <span class="hidden-xs">{{ Session::get('name') }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                 
                @if(Session::has('image'))

                  <img src="{{ Storage::disk('local')->url(Session::get('image')) }}" alt="" style=" height: 100px">
                  @else

                     <img src="{{ asset('images/profile/image-1.jpeg') }}" alt="">

                @endif 

                <p>
                  {{ Session::get('name') }}
                  <small>Member since {{ Session::get('created_at') }} </small>
                </p>
              </li>
               
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>