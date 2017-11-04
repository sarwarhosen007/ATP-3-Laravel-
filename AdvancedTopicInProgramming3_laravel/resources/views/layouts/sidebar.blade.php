<aside class="main-sidebar">
    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="{{ Request::is('bookstore') ? 'active' : ''}}"><a href="{{ route('bookstore.show') }}"><i class="fa fa-book"></i> <span>Book Store</span></a></li>

        <li class="{{ Request::is('user/advertise') ? 'active' : ''}}"><a href="{{ route('advertise.index') }}" ><i class="fa fa-plus"></i> <span>Advertise</span></a></li>

        <li class="{{ Request::is('user/message') ? 'active' : ''}}"><a href="{{ route('message.index') }}" ><i class="fa fa-commenting-o"></i> <span>Chat Room</span></a></li>
      </ul>

    </section>
</aside>