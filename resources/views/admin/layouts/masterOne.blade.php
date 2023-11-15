<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="{{ asset('admin/images/fevicon.png') }}" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('admin/style.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('admin/css/color_2.css') }}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-select.css') }}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('admin/css/perfect-scrollbar.css') }}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="dashboard dashboard_2">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <div class="logo_section">
                            <a href="{{ asset('admin/index.html') }}"><img class="logo_icon img-responsive"
                                    src="{{ asset('admin/images/logo/logo_icon.png') }}" alt="#" /></a>
                        </div>
                    </div>
                    <div class="sidebar_user_info">
                        <div class="icon_setting"></div>
                        <div class="user_profle_side">
                            <div class="user_img"><img class="img-responsive"
                                    src="{{ asset('admin/images/layout_img/user_img.jpg') }}" alt="#" /></div>
                            <div class="user_info">
                                <h6>{{ Auth::user()->name }}</h6>
                                <p><span class="online_animation"></span> Online</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar_blog_2">
                    <h4>General</h4>
                    <ul class="list-unstyled components">
                        <li class="active">
                            <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                                    class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                            <ul class="collapse list-unstyled" id="dashboard">
                                <li>
                                    <a href="{{ route('dashboardOne') }}">> <span>Default Dashboard</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboardTwo') }}">> <span>Dashboard style 2</span></a>
                                </li>
                            </ul>
                            <a href="{{ route('category#list') }}"><i class="fa fa-list yellow_color"></i>
                                <span>Category</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <div class="topbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i
                                    class="fa fa-bars"></i></button>
                            <div class="logo_section">
                                <a href="{{ asset('admin/index.html') }}"><img class="img-responsive"
                                        src="{{ asset('admin/images/logo/logo_black.png') }}" alt="#" /></a>
                            </div>
                            <div class="right_topbar">
                                <div class="icon_info">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-bell-o"></i><span
                                                    class="badge">2</span></a></li>
                                        <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i><span
                                                    class="badge">3</span></a></li>
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            <a class="dropdown-toggle" data-toggle="dropdown"><img
                                                    class="img-responsive rounded-circle"
                                                    src="{{ asset('admin/images/layout_img/user_img.jpg') }}"
                                                    alt="#" /><span
                                                    class="name_user">{{ Auth::user()->name }}</span></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="profile.html">My Profile</a>
                                                <a class="dropdown-item" href="settings.html">Settings</a>
                                                <a class="dropdown-item" href="help.html">Help</a>
                                                <a class="dropdown-item" href="#"><span>Log Out</span> <i
                                                        class="fa fa-sign-out"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- end topbar -->

                @yield('content')

            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ asset('admin/js/animate.js') }}"></script>
    <!-- select country -->
    <script src="{{ asset('admin/js/bootstrap-select.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('admin/js/owl.carousel.js') }}"></script>
    <!-- chart js -->
    <script src="{{ asset('admin/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/utils.js') }}"></script>
    <script src="{{ asset('admin/js/analyser.js') }}"></script>
    <!-- nice scrollbar -->
    <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <script src="{{ asset('admin/js/chart_custom_style2.js') }}"></script>
</body>

</html>
