<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="/shift/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/shift/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/shift/css/shift.css">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="sidebar-header">
                Landing Page
            </div>

            <div class="nav-header">
                Manage Site
            </div>
            <nav>
                <a href="#">
                    <span class="item-icon ti ti-stats-up"></span>
                    Stats
                </a>
                <a href="#">
                    <span class="item-icon ti ti-list"></span>
                    Sign Ups
                </a>
                <a href="#">
                    <span class="item-icon ti ti-location-arrow"></span>
                    Trackable Links
                </a>
            </nav>
        </div>
        <div class="content-area">
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
