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
   

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .error{
        color: red !important;    
    }
    </style>

</head>

<body>

    <div class="page-wrapper">
        <header class="main-header header-style-one">
            <div class="header-top">
                <div class="auto-container">
                    <div class="clearfix">
                        <!--Top Left-->
                        <div class="top-left clearfix">
                            <div class="text">Welcome to Bhavsagar Residential Society</div>
                        </div>

                        <!--Top Right-->
                        <div class="top-right pull-right">
                            <a href="{{ url('/member-login') }}" class="request-btn theme-btn">Member Login</a>

                            <!-- Social Nav -->
                            <ul class="social-nav">
                                <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                                <li class="facebook"><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                                <li class="google"><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                <li class="pinterest"><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!--Header-Upper-->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="clearfix">

                        <div class="pull-left logo-box">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ url('web/images/bsrs.png') }}" class="logo-n">
                                    <span class="title">
                                        भवसागर रेजिडेंशियल सोसाइटी
                                        <i>Bhavsagar Residential Society</i>
                                        <p class="txt-l">A Group of Residensial Society Rohini Sec 21 Rohini
                                            Delhi</p>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="pull-right upper-right clearfix">
                             <div class="upper-column card-box info-box">
                         </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--End Header Upper-->

            <!--Header Lower-->
            <div class="header-lower">

                <div class="auto-container">
                    <div class="nav-outer clearfix">
                        <!-- Mobile Navigation Toggler -->
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span></div>
                        <!-- Main Menu -->
                        <nav class="main-menu show navbar-expand-md">
                            <div class="navbar-header">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="current"><a href="{{ url('/') }}">Home</a>

                                    </li>
                                    <li class="dropdown"><a href="#">About us</a>
                                        <ul>
                                            <li><a href="{{ url('about/') }}">About BSRS</a></li>
                                            <li><a href="{{ url('chairman-message/') }}">Chairman Message</a></li>
                                            <li><a href="{{ url('vision-mission/') }}">Vision & Mission</a></li>
                                            <li><a href="{{ url('our-team/') }}">Our Team</a></li>


                                        </ul>

                                    </li>
                                    <li class="dropdown"><a href="#">Members</a>
                                        <ul>
                                            <li><a href="{{ url('/member-login') }}">Member Login</a></li>
                                            <li><a href="{{ url('/member-registration') }}">Join Members</a></li>
                                            <li><a href="{{ url('/default-member') }}">Defaulter Members</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="{{ url('news/') }}">News and Updates </a>
                                    </li>
                                    <li><a href="{{ url('events/') }}">Events</a></li>
                                    <!--<li><a href="{{ url('pay-online/') }}">Pay Online</a></li>-->
                                    <!--<li><a href="{{ url('complaint/') }}">Complaint</a></li>-->
                                    <li><a href="{{ url('contact/') }}">Contact us</a></li>
                                    <li><a href="{{ url('donate/') }}">Donate</a></li>
                                    

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
                                <span class="title">
                                    भवसागर रेजिडेंशियल सोसाइटी
                                    <i>Bhavsagar Residential Society</i>
                                    <p class="txt-l">A Group of Residensial Society Rohini Sec 21 Rohini Delhi
                                    </p>
                                </span>
                            </a>
                    </div>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
                </nav>
            </div><!-- End Mobile Menu -->

        </header>
        <!-- End Main Header -->
