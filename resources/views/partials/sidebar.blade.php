<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a class="logo" href="{{ url('/') }}">
            <img src="/img/humbl-black.png"
                class="Incentavize-Logo-Design-PNG">
        </a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="/storage/avatars/{{ $user->avatar }}" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown" aria-expanded="false"><strong>{{ ($user->profile)?$user->profile->name:'User' }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-59px, 42px, 0px);">
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="/logout"><i class="icon-power"></i>Logout</a></li>
                </ul>
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
                <li><a href="/home"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
                <li><a href="/activity"><i class="icon-equalizer"></i><span>Activity</span></a></li>
                <li><a href="/employees"><i class="icon-users"></i><span>Manage Staff</span></a></li>
                <li><a href="/profile"><i class="icon-user"></i><span>Business Profile</span></a></li>
            </ul>
        </nav>
    </div>
</div>
