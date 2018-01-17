<aside class="left-sidebar">
    <section class="sidebar-user-panel">
        <div id="user-panel-slide-toggleable">
            <span class="user-panel-logged-in-text"><span class="fa fa-circle-o text-success user-panel-status-icon"></span>{{ Auth::user()->name }}</span>
        </div>
    </section>
    <ul class="sidebar-nav">
        <li class="sidebar-nav-link ">
            <a href="{{ route('backend.dashboard') }}">
                <span class="fa fa-fw fa-dashboard"></span>ダッシュボード
            </a>
        </li>
        <li class="sidebar-nav-link sidebar-nav-link-group">
            <a data-subnav-toggle>
                <span class="fa fa-fw fa-female"></span>スタッフの女の子
                <span class="fa fa-chevron-right subnav-toggle-icon subnav-toggle-icon-closed"></span>
                <span class="fa fa-chevron-down subnav-toggle-icon subnav-toggle-icon-opened"></span>
            </a>
            <ul class="sidebar-nav">
                <li class="sidebar-nav-link">
                  <a href="{{ route('backend.girl.index') }}">リストのスタッフ</a>
                </li>
                <li class="sidebar-nav-link">
                  <a href="{{ route('backend.girl.create') }}">スタッフを追加</a>
                </li>
                <li class="sidebar-nav-link">
                  <a href="{{ route('backend.album.create') }}">アルバムガール</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-nav-link ">
            <a href="{{ route('backend.account.create') }}">
                <span class="fa fa-fw fa-user"></span> アカウント管理者
            </a>
        </li>
        <li class="sidebar-nav-link ">
            <a href="/">
                <span class="fa fa-fw fa-cog"></span>セッティング
            </a>
        </li>
    </ul><!--/sidebar-nav-->
</aside>
