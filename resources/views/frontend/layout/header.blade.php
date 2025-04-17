<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRM | @yield('title')</title>

        <!-- Add these lines in your head section -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Favicon and touch icons -->
    {{--
    <link rel="shortcut icon" href="{{ url('frontend/crmLogo.png') }}" type="image/x-icon"> --}}

    <link rel="shortcut icon" href="frontend/images/crmLogo.png" type="image/x-icon">
    <!-- Start Global Mandatory Style-->
    <!-- jquery-ui css -->
    <link href="frontend/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap -->
    <link href="frontend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap rtl -->
    <!--<link href="frontend/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
    <!-- Lobipanel css -->
    <link href="frontend/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css" />
    <!-- Pace css -->
    <link href="frontend/plugins/pace/flash.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="frontend/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Pe-icon -->
    <link href="frontend/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css" />
    <!-- Themify icons -->
    <link href="frontend/themify-icons/themify-icons.css" rel="stylesheet" type="text/css" />
    <!-- End Global Mandatory Style
         =====================================================================-->
    <!-- Start page Label Plugins
         =====================================================================-->
    <!-- Emojionearea -->
    <link href="frontend/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css" />
    <!-- Monthly css -->
    <link href="/frontend/plugins/monthly/monthly.css" rel="stylesheet" type="text/css" />
    <!-- End page Label Plugins
         =====================================================================-->
    <!-- Start Theme Layout Style
         =====================================================================-->
    <!-- Theme style -->
    <link href="/frontend/css/stylecrm.css" rel="stylesheet" type="text/css" />
    <!-- Theme style rtl -->
    <!--<link href="/frontend/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
    <!-- End Theme Layout Style
         =====================================================================-->


    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    <!--preloader-->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <a href="/user" class="logo">
                <!-- Logo -->
                <span class="logo-mini">
                    <img src="/frontend/img/mini-logo.png" alt="">
                </span>

                <h1 class="text-white" >USER</h1>

            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <!-- Sidebar toggle button-->
                    <span class="sr-only">Toggle navigation</span>
                    <span class="pe-7s-angle-left-circle"></span>
                </a>
                <!-- searchbar-->
                <a href="#search"><span class="pe-7s-search"></span></a>
                <div id="search">
                    <button type="button" class="close">×</button>
                    <form>
                        <input type="search" value="" placeholder="Search.." />
                        <button type="submit" class="btn btn-add">Search...</button>
                    </form>
                </div>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown dropdown-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/frontend/img/avatar5.png" class="img-circle" width="45" height="45"
                                    alt="user"></a>
                                    <ul class="dropdown-menu">

                                        <li>
                                            <a>
                                                <i class="fa fa-user"></i>
                                                <span class="bg-info">
                                                    @if(Auth::check() && Auth::user()->name)
                                                        <span class="bg-white">{{ Auth::user()->name }}</span> <!-- Display the user name inline -->
                                                    @else
                                                        <span class="bg-white">Guest!</span> <!-- Fallback message if userName is not set -->
                                                    @endif
                                                </span>
                                            </a>
                                        </li>

                                        {{-- <li><a href="#"><i class="fa fa-inbox"></i> Inbox</a></li> --}}
                                        <li><a href="{{ route('user.logout') }}">
                                                <i class="fa fa-sign-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
                <!-- sidebar menu -->
                <ul class="sidebar-menu">
                    <li class="active">
                        <a href="/user"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>




                    <li class="treeview">
                        <a href="/taskList">
                            <i class="fa fa-book"></i><span>Task</span>

                        </a>

                    </li>

                    {{-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text"></i><span>Report</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="preport">Task Report</a></li>


                        </ul>
                    </li> --}}
                    <li class="treeview">
                        <a href="/send-message">
                            <i class="fa fa-book"></i><span>Whatsapp</span>

                        </a>

                    </li>





                    {{-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bitbucket"></i><span>UI Elements</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="buttons">Buttons</a></li>
                            <li><a href="tabs">Tabs</a></li>
                            <li><a href="notification">Notification</a></li>
                            <li><a href="tree-view">Tree View</a></li>
                            <li><a href="progressbars">Progressber</a></li>
                            <li><a href="list">List View</a></li>
                            <li><a href="typography">Typography</a></li>
                            <li><a href="panels">Panels</a></li>
                            <li><a href="modals">Modals</a></li>
                            <li><a href="icheck_toggle_pagination">iCheck, Toggle, Pagination</a></li>
                            <li><a href="labels-badges-alerts">Labels, Badges, Alerts</a></li>
                        </ul>
                    </li> --}}




                    {{-- <li>
                        <a href="/User">
                            <i class="fa fa-user-circle"></i><span>User</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li> --}}




{{--
                    <li>
                        <a href="notice">
                            <i class="fa fa-file-text"></i> <span>Notice Board</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="/Message">
                            <i class="fa fa-envelope-o"></i> <span>Message</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li> --}}

                </ul>
            </div>
            <!-- /.sidebar -->
        </aside>
