<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
           @if(Session::has('image'))

              <img src="{{ Storage::disk('local')->url(Session::get('image')) }}" alt="" class="user-image">
              @else

                 <img src="{{ asset('images/profile/image-1.jpeg') }}" alt="" class="user-image">

            @endif 
        </div>
        <div class="pull-left info">
          <p>Admin</p>
        </div>
      </div>
 
      <!-- /.search form -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class=" {{ Request::is('admin/home') ? 'active' : '' }}"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li class="{{ Request::is('admin/advertiseList') ? 'active' : '' }}"><a href="{{ route('advertiseList.index') }}"><i class="fa fa-plus"></i> <span>Advertise List</span></a></li>
        <li class="{{ Request::is('admin/UserHistory') ? 'active' : '' }}"><a href="{{ route('userhistory.index') }}"><i class="fa fa fa-user"></i> <span>User List</span></a></li>
        <li class="{{ Request::is('admin/usermessagehistory') ? 'active' : '' }}"><a href="{{ route('usermessagehistory.index') }}"><i class="fa fa-commenting-o"></i> <span>Message History</span></a></li>

        <li class="{{ Request::is('admin/profile') ? 'active' : '' }}"><a href="{{ route('profile') }}"><i class="fa fa-wrench"></i> <span>Settings</span></a></li>

      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>