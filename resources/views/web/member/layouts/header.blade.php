<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <title>::. Bhavsagar Residential Society .::</title>

    <!-- Stylesheets -->
    <link href="{{ url('web/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('web/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('web/css/responsive.css') }}" rel="stylesheet">

    <!-- Color Switcher Mockup -->
    <link href="{{ url('web/css/color-switcher-design.css') }}" rel="stylesheet">

    <!-- Color Themes -->
    <link id="theme-color-file" href="{{ url('web/css/color-themes/default-theme.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="{{ url('web/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('web/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/assets/css/dataTables.css') }}">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .error{
        color: red !important;    
    }
    .team-detail-section {
        position: relative;
        padding: 37px 0px 40px !important;
    }

    .grey-bg {  
         background-color: #F5F7FA;
    }

    .card-content{
        color: #F5F7FA;
    }

    .cart_p{
        margin-bottom: 5px;
    }

    </style>

</head>

<body>
    
    <div class="page-wrapper">
         @if(!empty(Session::get('memberData')['name']))
        <header class="main-header header-style-one">
            <div class="header-top">
                <div class="auto-container"> 
                    <div class="clearfix">
                        <!--Top Left-->
                        <div class="top-left clearfix">
                            <div class="text">Welcome to {{ Session::get('memberData')['name'] }}</div>
                        </div>
                        <!--Top Right-->
                        <div class="top-right pull-right">
                            <a href="{{ url('/member-logout') }}" class="request-btn theme-btn">Logout</a>
                        </div>
                    </div>
                     
                </div>
            </div>
           
            <!--Header Lower-->
            <div class="header-lower mt-3">
                <div class="auto-container">
                    <div class="nav-outer clearfix">
                        <!-- Mobile Navigation Toggler -->
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span></div>
                        <!-- Main Menu -->
                        <nav class="main-menu show navbar-expand-md">
                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li>
                                        <div class="nav-logo">
                                            <a href="{{ url('member-dashboard') }}">
                                                <img src="{{ url('web/images/bsrs.png') }}" class="logo-n" width="83px">
                                            </a>
                                        </div>
                                    </li>

                                    <li class="current"><a href="{{ url('member-dashboard/') }}">Dashboard</a>

                                    </li>
                                    <li><a href="{{ url('edit-member/') }}">Edit Profile</a></li> 
                                    <li><a href="{{ url('payment-history/') }}">Payment History</a>
                                    </li>
                                    <!--<li><a href="{{ url('notice/') }}">Notices</a>-->
                                    <!--</li>-->
                                    <li><a href="#">Notices</a>
                                    </li>
                                     <li><a href="{{ url('update-password/') }}">Change Password</a></li>
                                   
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->

                        <!-- Options Box -->


                    </div>
                </div>
            </div>
            <!-- End Header Lower -->

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

                <nav class="menu-box">
                    <div class="nav-logo">
                        <a class="logo" href="#">
                            <a href="#">
                                <img src="{{ url('web/images/bsrs.png') }}" class="logo-n">
                            </a>
                    </div>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
                </nav>
            </div><!-- End Mobile Menu -->

        </header>
        @endif
        <!-- End Main Header -->
