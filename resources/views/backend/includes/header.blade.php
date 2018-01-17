<header class="top-header">
  <a href="/" class="top-header-logo" target="_blank">
    <span class="text-primary">Club</span> A
  </a>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-sidebar-toggle" data-toggle-sidebar>
                <span class="typcn typcn-arrow-left visible-sidebar-sm-open"></span>
                <span class="typcn typcn-arrow-right visible-sidebar-sm-closed"></span>
                <span class="typcn typcn-arrow-left visible-sidebar-md-open"></span>
                <span class="typcn typcn-arrow-right visible-sidebar-md-closed"></span>
            </button>
        </div>
        <ul class="nav navbar-nav navbar-right" data-dropdown-in="flipInX" data-dropdown-out="zoomOut">
            <li class="item-feed dropdown">
                <a href="#" class="item-feed-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-fw fa-bell"></span> <span class="badge badge-danger item-feed-badge">5</span></a>
                <ul class="dropdown-menu dropdown-menu-notifications">
                    <li>
                      <a class="dropdown-menu-notifications-item" href="#">
                          <span class="fa fa-female">I'm working.</span>
                          <span class="dropdown-menu-notifications-item-ago">5:10 pm</span>
                      </a>
                    </li>
                </ul>
            </li>
            @if (Auth::check())
            <li>
              <a href="{{ route('backend.account.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <span class="fa fa-fw fa-power-off"></span> <span class="hidden-sm hidden-xs">ログアウト</span></a>
              <form id="logout-form" action="{{ route('backend.account.logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
            @endif
          </ul>
      </div>
  </nav>
</header>
