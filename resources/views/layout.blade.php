<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Pan Era Group Example Maps">
    <meta name="author" content="IT Team Pan Era Group">

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/dashforge/img/favicon.png"> -->

    <title>Pan Era Group Map</title>

    <!-- vendor css -->
    <link href="assets/dashforge/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/dashforge/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="assets/dashforge/css/dashforge.css">
    <link rel="stylesheet" href="assets/dashforge/css/dashforge.dashboard.css">

    {{-- Leaflet JS --}}
    <link rel="stylesheet" href="assets/leaflet/leaflet.css">
</head>

<body class="page-profile">

    <header class="navbar navbar-header navbar-header-fixed">
        <a href="" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
        <div class="navbar-brand">
            <a href="../../index.html" class="df-logo"><span>PAN ERA Group</span></a>
        </div><!-- navbar-brand -->
        <div id="navbarMenu" class="navbar-menu-wrapper">
            <div class="navbar-menu-header">
                <a href="../../index.html" class="df-logo"><span>PAN ERA Group</span></a>
                <a id="mainMenuClose" href=""><i data-feather="x"></i></a>
            </div><!-- navbar-menu-header -->
            <ul class="nav navbar-menu">
                <li class="nav-item"><a href="../../components/" class="nav-link"><i data-feather="box"></i> Beranda</a>
                </li>
                <li class="nav-item"><a href="../../components/" class="nav-link"><i data-feather="box"></i> Menu 1</a>
                </li>
                <li class="nav-item"><a href="../../components/" class="nav-link"><i data-feather="box"></i> Menu 2</a>
                </li>
            </ul>
        </div><!-- navbar-menu-wrapper -->
        <div class="navbar-right">
            <div class="dropdown dropdown-profile">
                <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
                    <div class="avatar avatar-sm"><img src="assets/custom/img/user.svg" class="rounded-circle" alt="">
                    </div>
                </a><!-- dropdown-link -->
                <div class="dropdown-menu dropdown-menu-right tx-13">
                    <div class="avatar avatar-lg mg-b-15"><img src="assets/custom/img/user.svg" class="rounded-circle"
                            alt=""></div>
                    <h6 class="tx-semibold mg-b-5">Muhamad Adi Mulyana</h6>
                    <p class="mg-b-25 tx-12 tx-color-03">Administrator</p>
                    <a href="page-signin.html" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </div><!-- navbar-right -->
    </header><!-- navbar -->

    <div class="content content-fixed">
        <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-10 mg-xl-b-10">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li> --}}
                            <li class="breadcrumb-item active" aria-current="page">/ Beranda</li>
                        </ol>
                    </nav>
                    <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
                </div>
                {{-- <div class="d-none d-md-block">
            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
            <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
          </div> --}}
            </div>

            <div class="row row-xs">
                <div class="col-lg-12 col-xl-12 mg-t-5">
                    <div class="card">
                        <div class="card-header pd-y-20 d-md-flex align-items-center justify-content-between">
                            <h6 class="mg-b-0">Data Peta PAN ERA Group</h6>
                            <ul class="list-inline d-flex mg-t-20 mg-sm-t-10 mg-md-t-0 mg-b-0">
                                <li class="list-inline-item d-flex align-items-center">
                                    <span class="d-block wd-10 ht-10 bg-df-1 rounded mg-r-5"></span>
                                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Category 1</span>
                                </li>
                                <li class="list-inline-item d-flex align-items-center mg-l-5">
                                    <span class="d-block wd-10 ht-10 bg-df-2 rounded mg-r-5"></span>
                                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Category 2</span>
                                </li>
                                <li class="list-inline-item d-flex align-items-center mg-l-5">
                                    <span class="d-block wd-10 ht-10 bg-df-3 rounded mg-r-5"></span>
                                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Category 3</span>
                                </li>
                            </ul>
                        </div><!-- card-header -->
                        <div class="card-body pos-relative pd-0">
                            <div id="mapid" style="height: 400px;"></div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- content -->

    <footer class="footer">
        <div>
            <span>&copy; 2019 PAN ERA GROUP</span>
            <span>Created by <a href="#">IT Team</a></span>
        </div>
        <div>
            <nav class="nav">
                <a href="#" class="nav-link">Open Sreet Map</a>
            </nav>
        </div>
    </footer>

    <script src="assets/dashforge/lib/jquery/jquery.min.js"></script>
    <script src="assets/dashforge/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/dashforge/lib/feather-icons/feather.min.js"></script>
    <script src="assets/dashforge/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="assets/dashforge/js/dashforge.js"></script>

    {{-- Leaflet --}}
    <script src="assets/leaflet/leaflet.js"></script>
    <script>
        var mymap = L.map('mapid').setView([-6.3214913860731, 107.14830258897996], 17);


        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            subdomains: ['a', 'b', 'c']
        }).addTo(mymap);

        var marker = L.marker([-6.3214913860731, 107.14830258897996]).addTo(mymap);
        marker.bindPopup("<b>Hello</b><br>I work in here.").openPopup();

    </script>
</body>

</html>