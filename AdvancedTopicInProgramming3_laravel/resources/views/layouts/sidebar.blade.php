<aside class="main-sidebar">
    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::user()->image != null)
            <img src="{{ Storage::disk('local')->url(Auth::user()->image) }}" class="img-circle" alt="User Image">
          @else
            <img src="{{ asset('images/profile/image-1.jpeg') }}" class="img-circle" alt="User Image">
          @endif
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
        </div>
      </div>
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="{{ Request::is('bookstore*') ? 'active' : ''}}"><a href="{{ route('bookstore.show') }}"><i class="fa fa-book"></i> <span>Book Store</span></a></li>

        <li class="{{ Request::is('user/advertise') ? 'active' : ''}}"><a href="{{ route('advertise.index') }}" ><i class="fa fa-plus"></i> <span>Advertise</span></a></li>

        <li class="{{ Request::is('user/message*') ? 'active' : ''}}"><a href="{{ route('message.index') }}" ><i class="fa fa-commenting-o"></i> <span>Chat Room</span></a></li>
        <li class="{{ Request::is('porfileSetting/view*') ? 'active' : ''}}"><a href="{{ route('porfileSetting.showSettingPage') }}" ><i class="fa fa-wrench"></i> <span>Settings</span></a></li>

        <li class="{{ Request::is('notificationList') ? 'active' : ''}}"><a href="{{ route('notification.list') }}" ><i class="fa fa-bell-o"></i> <span>Notifications</span></a></li>

      </ul>

    </section>
</aside>