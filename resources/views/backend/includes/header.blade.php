<header class="top-header">
  <a href="/" class="top-header-logo" target="_blank">
    <span class="text-primary">Club</span> S
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
