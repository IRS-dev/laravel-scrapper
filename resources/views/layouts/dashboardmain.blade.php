<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Scraper</title>
    <!-- Custom CSS -->
    <link href="../../../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="../../../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../../dist/css/style.min.css" rel="stylesheet">
    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="../../../css/trix.css">
    <script type="text/javascript" src="../../../js/trix.js"></script>

<style>
     trix-toolbar [data-trix-button-group="file-tools"]{
         display:none;
     }
</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="/"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="/">
                        <!-- Logo icon -->
                       
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <b class="logo-text ">
                            Scraper
                            
                        </b>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">..</a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                               
                                
                               
                                
                                <div class="dropdown-divider"></div>

                                
                                <form action="/logout" method="POST">
                                    @csrf
                                   <div >
                                     <button class="dropdown-item" type="submit"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</button>
                                    </div>
                                    </form>
                                
                                
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }} "> <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item {{ Request::is('dashboard/movies*') ? 'active' : '' }}"> <a class=" {{ Request::is('dashboard/movies*') ? 'active' : '' }} sidebar-link waves-effect waves-dark sidebar-link" href="/dashboard/movies" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Movies</span></a></li>
                        <li class="sidebar-item {{ Request::is('dashboard/websites*') ? 'active' : '' }}"> <a class=" {{ Request::is('dashboard/websites*') ? 'active' : '' }} sidebar-link waves-effect waves-dark sidebar-link" href="/dashboard/websites" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Website</span></a></li>
                        <li class="sidebar-item {{ Request::is('dashboard/categories*') ? 'active' : '' }}"> <a class=" {{ Request::is('dashboard/categories*') ? 'active' : '' }} sidebar-link waves-effect waves-dark sidebar-link" href="/dashboard/categories" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Categories</span></a></li>
                        <li class="sidebar-item {{ Request::is('dashboard/links*') ? 'active' : '' }}"> <a class=" {{ Request::is('dashboard/links*') ? 'active' : '' }} sidebar-link waves-effect waves-dark sidebar-link" href="/dashboard/links" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Link</span></a></li>
                        <li class="sidebar-item {{ Request::is('dashboard/item-schema*') ? 'active' : '' }}"> <a class=" {{ Request::is('dashboard/item-schema*') ? 'active' : '' }} sidebar-link waves-effect waves-dark sidebar-link" href="/dashboard/item-schema" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Item Schema</span></a></li>
                        <li class="sidebar-item {{ Request::is('dashboard/users*') ? 'active' : '' }}"> <a class=" {{ Request::is('dashboard/users*') ? 'active' : '' }} sidebar-link waves-effect waves-dark sidebar-link" href="/dashboard/users" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">User Management</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

@yield('containerfluid')

      
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
             Scraper
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="../../../assets/libs/flot/excanvas.js"></script>
    <script src="../../../assets/libs/flot/jquery.flot.js"></script>
    <script src="../../../assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../../../assets/libs/flot/jquery.flot.time.js"></script>
    <script src="../../../assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="../../../assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../../../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../../../dist/js/pages/chart/chart-page-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>