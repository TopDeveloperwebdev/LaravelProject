<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Dashboard - {{ ucfirst(Request::segment(1)) }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Fontfaces CSS-->
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="/vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/css/theme.css" rel="stylesheet" media="all">
    <link href="/css/main.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    @yield('top-script')

</head>

<body class="">
    <div class="page-wrapper" id="app">
       <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="/">
                   <img src="/images/faraday-logo-white.png" alt="IXCRM" />
                </a>
            </div>
            <div class="menu-sidebar2__content">
                <div class="account2">
                    <h4 class="name mb-2">{{ auth()->user()->name }}</h4>
                    <span class="badge badge-warning ">{{ auth()->user()->type }}</span>
                </div>
                <nav class="navbar-sidebar2">

                @if(auth()->user()->is_admin && auth()->user()->admin_view )
                    <ul class="list-unstyled navbar__list font-weight-light">
                        <li>
                            <a href="/pending">
                              Pending Orders</a>
                        </li>
                        <li>
                            <a href="/processing">
                            Order Processing</a>
                        </li>
                        <li>
                            <a href="/history">
                            Order History</a>
                        </li>
                        <!-- <li>
                            <a href="/categories">
                              My Orders</a>
                        </li> -->
                        <li>
                            <a href="/reports">
                              Reports</a>
                        </li>
                        <li>
                            <a href="/department-accounts">
                              Accounting</a>
                        </li>
                        <li>
                            <a href="/partner/{{$partnerID}}">
                              Project Partners</a>
                        </li>
                        <li>
                            <a href="/accounts">
                              User Accounts</a>
                        </li>
                        <li>
                            <a href="/departments">
                              Departments</a>
                        </li>
                        {{-- <li>
                            <a href="/categories">
                              Assign Budgets</a>
                        </li> --}}
                        <li>
                            <a href="/notifications">
                              Notifications</a>
                        </li>

                    </ul>

                   @else
                   @if(!auth()->user()->partner && !auth()->user()->supplier)
                   <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="/pending">
                                Pending Orders</a>
                        </li>
                        <li>
                            <a href="/processing">
                                Order Processing</a>
                        </li>
                        <li>
                            <a href="/history">
                              Order History</a>
                        </li>
                        <li>
                            <a href="/catalogue">
                              Catalogue</a>
                        </li>
                        <li>
                            <a href="/none-catalogue">
                              Non Catalogue</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                Key Travel
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/key-travel/train">
                                        Train</a>
                                </li>
                                <li>
                                    <a href="/key-travel/hotel">
                                        Hotel</a>
                                </li>
                                <li>
                                    <a href="/key-travel/flight">
                                        Flight</a>
                                </li>
                                <li>
                                    <a href="/key-travel/eurostar">
                                        Eurostar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/car-hire">
                              Car Hire</a>
                        </li>
                        <li>
                            <a href="/catering">
                              Catering</a>
                        </li>
                        <li>
                            <a href="/stores">
                              Stores</a>
                        </li>
                        <li>
                            <a href="/training">
                              Training</a>
                        </li>
                        <li>
                            <a href="/expenses">
                              Expenses</a>
                        </li>
                        <?php /* <li>
<a href="/#">
Notifications</a>
</li>  */?>

                    </ul>
                   @endif
                @endif

                </nav>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <small class="text-muted pl-5 pr-4 pb-4">&copy; IX-CRM {{ date('Y') }}</small>
                </div>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->


        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->

            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    Ixcrm
                                </a>
                            </div>

                                <?php /*
<div class="header-button-item has-noti js-item-menu">
<i class="zmdi zmdi-notifications"></i>
<div class="notifi-dropdown js-dropdown">
<div class="notifi__title">
<p>You have 3 Notifications</p>
</div>
<div class="notifi__item">
<div class="bg-c1 img-cir img-40">
<i class="zmdi zmdi-email-open"></i>
</div>
<div class="content">
<p>You got a email notification</p>
<span class="date">April 12, 2018 06:50</span>
</div>
</div>
<div class="notifi__item">
<div class="bg-c2 img-cir img-40">
<i class="zmdi zmdi-account-box"></i>
</div>
<div class="content">
<p>Your account has been blocked</p>
<span class="date">April 12, 2018 06:50</span>
</div>
</div>
<div class="notifi__item">
<div class="bg-c3 img-cir img-40">
<i class="zmdi zmdi-file-text"></i>
</div>
<div class="content">
<p>You got a new file</p>
<span class="date">April 12, 2018 06:50</span>
</div>
</div>
<div class="notifi__footer">
<a href="#">All notifications</a>
</div>
</div>
</div> */?>
                            <div class="header-button2" onclick="event.preventDefault()
                                                     $('#logout-form').submit();">
                                <div class="header-button-item mr-3">
                                    <i class="zmdi zmdi-power"></i>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <div class="header-button2">

                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="/my-account">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        @if(auth()->user()->is_admin)
                                        <div class="account-dropdown__item">
                                            <a href="/security">
                                                <i class="zmdi zmdi-settings"></i>Security</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="{{ url('email-templates') }}">
                                                <i class="zmdi zmdi-email"></i>Email Templates</a>
                                        </div>
                                            @if(auth()->user()->admin_view)
                                            <div class="account-dropdown__item">
                                                <a href="/requisitioner">
                                                    <i class="zmdi zmdi-swap"></i>Switch to Requisitioner</a>
                                            </div>
                                            @else
                                            <div class="account-dropdown__item">
                                                <a href="/administrator">
                                                    <i class="zmdi zmdi-swap"></i>Switch to Admin</a>
                                            </div>
                                            @endif
                                        @endif
                                        <?php /*
<div class="account-dropdown__item">
<a href="#">
<i class="zmdi zmdi-notifications"></i>Notifications</a>
</div>*/?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <!-- <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Dashboard</li>
                                        </ul>
                                    </div>
                                    <button class="au-btn au-btn-icon au-btn--green">
                                        <i class="zmdi zmdi-plus"></i>add item</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- END BREADCRUMB-->
        <section class="m-t-75">
        @yield('content')
        </section>


            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/vendor/slick/slick.min.js">
    </script>
    <script src="/vendor/wow/wow.min.js"></script>
    <script src="/vendor/animsition/animsition.min.js"></script>
    <script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/vendor/select2/select2.min.js">
    </script>
    <script src="/vendor/vector-map/jquery.vmap.js"></script>
    <script src="/vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="/vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="/vendor/vector-map/jquery.vmap.world.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/en-gb.js" integrity="sha256-VWXSrU6D6hQJ7MEZ9062PvZDwmeRuZ8eE/ToQ2N3QjA=" crossorigin="anonymous"></script>

    <!-- Main JS-->
    <script src="/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.3.2/bootbox.min.js" integrity="sha256-s87nschhfp/x1/4+QUtIa99el2ot5IMQLrumROuHZbc=" crossorigin="anonymous"></script>
    @yield('js')

</body>

</html>
<!-- end document-->
