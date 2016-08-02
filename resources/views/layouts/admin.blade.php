<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="/shift/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/shift/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/shift/css/shift.css">
</head>
<body id="dashboard">
    <input type="hidden" name="csrf-token" id="csrf-token" value="{{ csrf_token() }}">
    <div class="dashboard">
        <div class="sidebar">
            <div class="sidebar-header">
                Landing Page
            </div>

            <div class="nav-header">
                Manage Site
            </div>
            <nav>
                <a v-link="'/stats'">
                    <span class="item-icon ti ti-stats-up"></span>
                    Stats
                </a>
                <a v-link="'/sign-ups'">
                    <span class="item-icon ti ti-list"></span>
                    Sign Ups
                </a>
                <a v-link="'/trackable-links'">
                    <span class="item-icon ti ti-location-arrow"></span>
                    Trackable Links
                </a>
            </nav>

            <div class="nav-header">Users</div>
            <nav>
                <a v-link="'/users'">
                    <span class="item-icon ti ti-list"></span> List Users
                </a>
                <a v-link="'/users/create'">
                    <span class="item-icon ti ti-plus"></span> Add User
                </a>
                <a v-link="'/roles'">
                    <span class="item-icon ti ti-link"></span> Roles
                </a>
                <a v-link="'/permissions'">
                    <span class="item-icon ti ti-lock"></span> Permissions
                </a>
            </nav>
        </div>
        <div class="content-area">
            <div class="topbar">
                <div class="nav-left">
                    <div class="links pull-right visible-xs">
                        <a href=".dashboard" data-toggle-class="openSidebar"><i class="ti ti-menu"></i></a>
                    </div>
                </div>
                <div class="nav-right">
                    <div class="accout-info">
                        <a href="#0" class="user">
                            <img src="{{ get_gravatar(auth()->user()->email) }}">
                            <div>{{ auth()->user()->name }}</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/toastr.min.js"></script>
    <script src="/shift/js/bootstrap.min.js"></script>
    <script src="/shift/js/app.js"></script>
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>
