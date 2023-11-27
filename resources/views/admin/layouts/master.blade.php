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
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="{{ asset('admin/images/fevicon.png') }}" type="image/png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" /> --}}
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('admin/style.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('admin/css/colors.css') }}" />
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

<body class="dashboard dashboard_1">
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
                            <div class="user_img">
                                @if (Auth::user()->image == null)
                                    <img class="img-responsive" src="{{ asset('image/default_user.webp') }}"
                                        alt="#" />
                                @else
                                    <img class="img-responsive" src="{{ asset('storage/' . Auth::user()->image) }}"
                                        alt="#" />
                                @endif
                            </div>
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
                                    class="fa fa-dashboard yellow_color"></i>
                                <span>Dashboard</span></a>
                            <ul class="collapse list-unstyled" id="dashboard">
                                <li>
                                    <a href="{{ route('dashboardOne') }}">> <span>Default Dashboard</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboardTwo') }}">> <span>Dashboard style
                                            2</span></a>
                                </li>
                            </ul>
                            <a href="{{ route('category#list') }}"><i class="fa fa-list yellow_color"></i>
                                <span>Category</span></a>
                            <a href="{{ route('product#list') }}"><i class="fa fa-leaf yellow_color"></i>
                                <span>Product</span></a>
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
                                <a href="index.html"><img class="img-responsive"
                                        src="{{ asset('admin/images/logo/logo_icon.png') }}" alt="#" /></a>
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
                                            <a class="dropdown-toggle" data-toggle="dropdown">
                                                @if (Auth::user()->image == null)
                                                    <img class="img-responsive"
                                                        src="{{ asset('image/default_user.webp') }}" alt="#" />
                                                @else
                                                    <img class="img-responsive"
                                                        src="{{ asset('storage/' . Auth::user()->image) }}"
                                                        alt="#" />
                                                @endif
                                                <span class="name_user">{{ Auth::user()->name }}</span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('admin#details') }}">My
                                                    Profile</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin#changePasswordPage') }}">Change Password</a>
                                                <a class="dropdown-item" href="settings.html">Settings</a>
                                                <a class="dropdown-item" href="help.html">Help</a>
                                                {{-- <a class="dropdown-item" href="{{ route('logout') }}"><span>Log
                                                        Out</span> <i class="fa fa-sign-out"></i></a> --}}
                                                <form action="{{ route('logout') }}" method="post"
                                                    class="d-flex justify-content-center">
                                                    @csrf
                                                    <button class="dropdown-item" type="submit">Logout<i
                                                            class="fa fa-sign-out"></i></button>
                                                </form>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- jQuery -->
    {{-- <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script> --}}
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
    <script src="{{ asset('admin/js/chart_custom_style1.js') }}"></script>
</body>

</html>
