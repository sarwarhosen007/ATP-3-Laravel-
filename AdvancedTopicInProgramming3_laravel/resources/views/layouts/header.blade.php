
  <header class="main-header">
    <a href="index2.html" class="logo">
      <span class="logo-lg"><b>OldBookStore</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">{{ count(Session::get('messageList')) }}</span>
            </a>
            <ul class="dropdown-menu">
                       <li class="header">You have 4 messages</li>
                       <li>
                         <ul class="menu">
                           <li>
                             <a href="#">
                               <div class="pull-left">
                     
                                 <img src="{{ asset('images/profile/mahi.jpg') }}" class="img-circle" alt="User Image">
                               </div>
                               <h4>
                                 Mahi
                                 <small><i class="fa fa-clock-o"></i> 5 mins</small>
                               </h4>
                               <p>I Want to Buy Your Book</p>
                             </a>
                           </li>
                           </ul>
                       </li>
                       <li class="footer"><a href="#">See All Messages</a></li>
                     </ul>
              </li>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>

              <span class="label label-warning">{{ Session::get('notificationCount') }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{ Session::get('notificationCount') }} notifications</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> {{ Session::get('notificationCount') }} new Request 
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="{{ route('notification.list') }}">View all</a></li>
            </ul>
          </li>
         
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(Auth::user()->image != null)
                <img src="{{ Storage::disk('local')->url(Auth::user()->image) }}" class="user-image" alt="User Image">
              @else
                <img src="{{ asset('images/profile/image-1.jpeg') }}" class="user-image" alt="User Image">
              @endif
              <span class="hidden-xs">{{ Auth::user()->name }} </span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">

                @if(Auth::user()->image != null)
                  <img src="{{ Storage::disk('local')->url(Auth::user()->image) }}" class="img-circle" alt="User Image">
                @else
                  <img src="{{ asset('images/profile/image-1.jpeg') }}" class="img-circle" alt="User Image">
                @endif

                <p>
                  {{ Auth::user()->name }}
                  <small>Member since {{ date('M. Y',strtotime(Auth::user()->created_at)) }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('porfileSetting.showProfile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>