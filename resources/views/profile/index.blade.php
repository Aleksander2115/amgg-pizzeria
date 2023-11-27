@extends('template')


@section('content')

<body>



<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <div class="logo me-auto">
            <h1><a href="/">Delicious</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto " href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
                <li><a class="nav-link scrollto" href="#specials">Specials</a></li>
                <li><a class="nav-link scrollto" href="#events">Events</a></li>
                <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>
                <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
                <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="#book-a-table" class="book-a-table-btn scrollto">Book a table</a>

    </div>
</header><!-- End Header -->

<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Konto</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Konto</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->


    <body>

    <style>
        .sidebar {
            margin-left: 10%;
            margin-top: 3%;
            width: 15%;
        }

        .textField{
            min-width: 40%;
            min-height: 100%;
            margin-left: 5%;
            margin-top: 3%;
            background-color: #f6f6f8;
            border-radius: 1%;
        }

    </style>



    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="bord bg-white sidebar" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light"></div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">User</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Zamówienia</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Overview</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Events</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" data-filter=".filter-pizza">Status</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" data-filter=".filter-pizza">Status1</a>



            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper " class="textField">



            <div class="col-lg-6 menu-item filter-pizza">

                Witaj: {{\Illuminate\Support\Facades\Auth::user()->name}}

                <br><br>
                <p>Dane konta:</p>
                <p>imie:</p>
                {{\Illuminate\Support\Facades\Auth::user()->name}}
                <br>
                <p>nazwisko:</p>
                {{\Illuminate\Support\Facades\Auth::user()->surname}}

            </div>

            <div class="col-lg-6 menu-item filter-miza">

                hejo
            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            ppp
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            pp

        </div>
    </div>

    </body>


    @yield('content')

</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
@endsection
