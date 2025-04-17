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
    <link rel="shortcut icon" href="{{ url('backend/crmLogo.png') }}" type="image/x-icon"> --}}

    <link rel="shortcut icon" href="backend/images/crmLogo.png" type="image/x-icon">
    <!-- Start Global Mandatory Style-->
    <!-- jquery-ui css -->
    <link href="backend/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap -->
    <link href="backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap rtl -->
    <!--<link href="backend/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
    <!-- Lobipanel css -->
    <link href="backend/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css" />
    <!-- Pace css -->
    <link href="backend/plugins/pace/flash.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="backend/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Pe-icon -->
    <link href="backend/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css" />
    <!-- Themify icons -->
    <link href="backend/themify-icons/themify-icons.css" rel="stylesheet" type="text/css" />
    <!-- End Global Mandatory Style
         =====================================================================-->
    <!-- Start page Label Plugins
         =====================================================================-->
    <!-- Emojionearea -->
    <link href="backend/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css" />
    <!-- Monthly css -->
    <link href="/backend/plugins/monthly/monthly.css" rel="stylesheet" type="text/css" />
    <!-- End page Label Plugins
         =====================================================================-->
    <!-- Start Theme Layout Style
         =====================================================================-->
    <!-- Theme style -->
    <link href="/backend/css/stylecrm.css" rel="stylesheet" type="text/css" />
    <!-- Theme style rtl -->
    <!--<link href="/backend/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
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
            <a href="/admin" class="logo">
                <!-- Logo -->
                <span class="logo-mini">
                    <img src="/backend/img/mini-logo.png" alt="">
                </span>
                <span class="">
                    {{-- <img src="/backend/img/logo.png" alt=""> --}}
                    <h2 class="text-white bg-emerald-300">CRM</h2>
                </span>
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
                        <!-- Orders -->
                        <li class="dropdown messages-menu">
                            {{-- <a href="#" class="dropdown-toggle admin-notification" data-toggle="dropdown">
                                <i class="pe-7s-cart"></i>
                                <span class="label label-primary">5</span>
                            </a> --}}
                            {{-- <ul class="dropdown-menu">
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <!-- start Orders -->
                                            <a href="#" class="border-gray">
                                                <div class="pull-left">
                                                    <img src="/backend/img/basketball-jersey.png" class="img-thumbnail"
                                                        alt="User Image">
                                                </div>
                                                <h4>polo shirt</h4>
                                                <p><strong>total item:</strong> 21
                                                </p>
                                            </a>
                                        </li>
                                        <!--<li>-->
                                        <!--    <a href="#" class="border-gray">-->
                                        <!--        <div class="pull-left">-->
                                        <!--            <img src="/backend/img/shirt.png" class="img-thumbnail"-->
                                        <!--                alt="User Image">-->
                                        <!--        </div>-->
                                        <!--        <h4>Kits</h4>-->
                                        <!--        <p><strong>total item:</strong> 11-->
                                        <!--        </p>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li>-->
                                        <!--    <a href="#" class="border-gray">-->
                                        <!--        <div class="pull-left">-->
                                        <!--            <img src="/backend/img/football.png" class="img-thumbnail"-->
                                        <!--                alt="User Image">-->
                                        <!--        </div>-->
                                        <!--        <h4>Football</h4>-->
                                        <!--        <p><strong>total item:</strong> 16-->
                                        <!--        </p>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <li class="nav-list">
                                            <a href="#" class="border-gray">
                                                <div class="pull-left">
                                                    <img src="/backend/img/shoe.png" class="img-thumbnail"
                                                        alt="User Image">
                                                </div>
                                                <h4>Sports sheos</h4>
                                                <p><strong>total item:</strong> 10
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul> --}}
                        </li>
                        <!-- Messages -->
                        <!--<li class="dropdown messages-menu">-->
                        <!--    <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
                        <!--        <i class="pe-7s-mail"></i>-->
                        <!--        <span class="label label-success">4</span>-->
                        <!--    </a>-->
                        <!--    <ul class="dropdown-menu">-->
                        <!--        <li>-->
                        <!--            <ul class="menu">-->
                        <!--                <li>-->
                                            <!-- start message -->
                        <!--                    <a href="#" class="border-gray">-->
                        <!--                        <div class="pull-left">-->
                        <!--                            <img src="/backend/img/avatar.png" class="img-circle"-->
                        <!--                                alt="User Image">-->
                        <!--                        </div>-->
                        <!--                        <h4>Ronaldo</h4>-->
                        <!--                        <p>Please oreder 10 pices of kits..</p>-->
                        <!--                        <span class="badge badge-success badge-massege"><small>15 hours-->
                        <!--                                ago</small>-->
                        <!--                        </span>-->
                        <!--                    </a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                    <a href="#" class="border-gray">-->
                        <!--                        <div class="pull-left">-->
                        <!--                            <img src="/backend/img/avatar2.png" class="img-circle"-->
                        <!--                                alt="User Image">-->
                        <!--                        </div>-->
                        <!--                        <h4>Leo messi</h4>-->
                        <!--                        <p>Please oreder 10 pices of Sheos..</p>-->
                        <!--                        <span class="badge badge-info badge-massege"><small>6 days ago</small>-->
                        <!--                        </span>-->
                        <!--                    </a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                    <a href="#" class="border-gray">-->
                        <!--                        <div class="pull-left">-->
                        <!--                            <img src="/backend/img/avatar3.png" class="img-circle"-->
                        <!--                                alt="User Image">-->
                        <!--                        </div>-->
                        <!--                        <h4>Modric</h4>-->
                        <!--                        <p>Please oreder 6 pices of bats..</p>-->
                        <!--                        <span class="badge badge-info badge-massege"><small>1 hour ago</small>-->
                        <!--                        </span>-->
                        <!--                    </a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                    <a href="#" class="border-gray">-->
                        <!--                        <div class="pull-left">-->
                        <!--                            <img src="/backend/img/avatar4.png" class="img-circle"-->
                        <!--                                alt="User Image">-->
                        <!--                        </div>-->
                        <!--                        <h4>Salman</h4>-->
                        <!--                        <p>Hello i want 4 uefa footballs</p>-->
                        <!--                        <span class="badge badge-danger badge-massege">-->
                        <!--                            <small>6 days ago</small>-->
                        <!--                        </span>-->
                        <!--                    </a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                    <a href="#" class="border-gray">-->
                        <!--                        <div class="pull-left">-->
                        <!--                            <img src="/backend/img/avatar5.png" class="img-circle"-->
                        <!--                                alt="User Image">-->
                        <!--                        </div>-->
                        <!--                        <h4>Sergio Ramos</h4>-->
                        <!--                        <p>Hello i want 9 uefa footballs</p>-->
                        <!--                        <span class="badge badge-info badge-massege"><small>5 hours ago</small>-->
                        <!--                        </span>-->
                        <!--                    </a>-->
                        <!--                </li>-->
                        <!--            </ul>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                        <!-- Notifications -->
                        <!--<li class="dropdown notifications-menu">-->
                        <!--    <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
                        <!--        <i class="pe-7s-bell"></i>-->
                        <!--        <span class="label label-warning">7</span>-->
                        <!--    </a>-->
                        <!--    <ul class="dropdown-menu">-->
                        <!--        <li>-->
                        <!--            <ul class="menu">-->
                        <!--                <li>-->
                        <!--                    <a href="#" class="border-gray">-->
                        <!--                        <i class="fa fa-dot-circle-o color-green"></i>Change Your font style</a>-->
                        <!--                </li>-->
                        <!--                <li><a href="#" class="border-gray">-->
                        <!--                        <i class="fa fa-dot-circle-o color-red"></i>-->
                        <!--                        check the system ststus..</a>-->
                        <!--                </li>-->
                        <!--                <li><a href="#" class="border-gray">-->
                        <!--                        <i class="fa fa-dot-circle-o color-yellow"></i>-->
                        <!--                        Add more admin...</a>-->
                        <!--                </li>-->
                        <!--                <li><a href="#" class="border-gray">-->
                        <!--                        <i class="fa fa-dot-circle-o color-violet"></i> Add more clients and-->
                        <!--                        order</a>-->
                        <!--                </li>-->
                        <!--                <li><a href="#" class="border-gray">-->
                        <!--                        <i class="fa fa-dot-circle-o color-yellow"></i>-->
                        <!--                        Add more admin...</a>-->
                        <!--                </li>-->
                        <!--                <li><a href="#" class="border-gray">-->
                        <!--                        <i class="fa fa-dot-circle-o color-violet"></i> Add more clients and-->
                        <!--                        order</a>-->
                        <!--                </li>-->
                        <!--            </ul>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                        <!-- Tasks -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="pe-7s-note2"></i>
                                <span class="label label-danger">6</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <!-- Task item -->
                                            <a href="#" class="border-gray">
                                                <span class="label label-success pull-right">50%</span>
                                                <h3><i class="fa fa-check-circle"></i> Theme color should be change</h3>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li>
                                            <!-- Task item -->
                                            <a href="#" class="border-gray">
                                                <span class="label label-warning pull-right">90%</span>
                                                <h3><i class="fa fa-check-circle"></i> Fix Error and bugs</h3>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li>
                                            <!-- Task item -->
                                            <a href="#" class="border-gray">
                                                <span class="label label-danger pull-right">80%</span>
                                                <h3><i class="fa fa-check-circle"></i> Sidebar color change</h3>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li>
                                            <!-- Task item -->
                                            <a href="#" class="border-gray">
                                                <span class="label label-info pull-right">30%</span>
                                                <h3><i class="fa fa-check-circle"></i> font-family should be change</h3>
                                            </a>
                                        </li>
                                        <li>
                                            <!-- Task item -->
                                            <a href="#" class="border-gray">
                                                <span class="label label-success pull-right">60%</span>
                                                <h3><i class="fa fa-check-circle"></i> Fix the database Error</h3>
                                            </a>
                                        </li>
                                        <li>
                                            <!-- Task item -->
                                            <a href="#" class="border-gray">
                                                <span class="label label-info pull-right">20%</span>
                                                <h3><i class="fa fa-check-circle"></i> data table data missing</h3>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- Help -->
                        <!--<li class="dropdown dropdown-help hidden-xs">-->
                        <!--    <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
                        <!--        <i class="pe-7s-settings"></i></a>-->
                        <!--    <ul class="dropdown-menu">-->
                        <!--        <li>-->
                        <!--            <a href="profile">-->
                        <!--                <i class="fa fa-line-chart"></i> Networking</a>-->
                        <!--        </li>-->
                        <!--        <li><a href="#"><i class="fa fa fa-bullhorn"></i> Lan settings</a></li>-->
                        <!--        <li><a href="#"><i class="fa fa-bar-chart"></i> Settings</a></li>-->
                        <!--        <li><a href="login">-->
                        <!--                <i class="fa fa-wifi"></i> wifi</a>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                        <!-- user -->
                        <li class="dropdown dropdown-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/backend/img/avatar5.png" class="img-circle" width="45" height="45"
                                    alt="user"></a>
                            <ul class="dropdown-menu">
                                <ul>

                                     <li>
                                        <a href="">
                                            <i class="fa fa-user"></i> Admin
                                        </a>
                                    </li>
                                </ul>

                             <!--<li><a href="#"><i class="fa fa-inbox"></i> </a></li>-->
                                <li><a href="{{ route('admin.logout') }}">


                                        <i class="fa fa-sign-out"></i> Logout</a>
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
                        <a href="/admin"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i><span>Teams</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/register/user">Add Team</a></li>
                            <li><a href="/TeamList">Team List</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-shopping-basket"></i><span>Leads</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/AddLeads">New Leads</a></li>
                            {{-- <li><a href="expense">New Expense</a></li>
                            <li><a href="transfer">Transfer</a></li> --}}
                            <li><a href="/LeadList">View Leades</a></li>
                            {{-- <li><a href="balance">Balance Sheet</a></li>
                            <li><a href="treport">Transfer Report</a></li> --}}
                        </ul>
                    </li>

                    {{-- <li class="/send-email-form">
                        <a href="/send-email-form">
                            <i class="fa fa-book"></i><span>Email Send</span>

                        </a>
                    </li> --}}





                    {{-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list"></i> <span>Other page</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/admin/login">Login</a></li>
                            <li><a href="/adminRegister">Register</a></li>
                            <li><a href="/Profile">Profile</a></li>

                        </ul>
                    </li> --}}
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
                    {{-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-gear"></i>
                            <span>settings</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="gsetting">Genaral settings</a></li>
                            <li><a href="stfsetting">Staff settings</a></li>
                            <li><a href="emailsetting">Email settings</a></li>

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
