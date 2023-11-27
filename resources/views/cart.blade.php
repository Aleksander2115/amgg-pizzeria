@extends('template')


@section('content')

    <body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if(Session::has('message'))
        <script>
            Swal.fire({
                title: "Sukcess",
                text: "{{ Session::get('message') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 3500,
            })
        </script>
    @endif

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
                    <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
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
                    <h2>Koszyk</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Koszyk</li>
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

            .yellow{
                color: #ffa41c;
            }



        </style>



        {{--<div class="d-flex" id="wrapper">
            <!-- Page content wrapper-->
            <div id="page-content-wrapper " class="textField">
                <div class="col-lg-6 menu-item filter-pizza">
                    <p>Pizzunie</p>
                    @foreach($items as $item)
                        <p>
                            {{ $item->pizza->name }} - {{ $item->size->name }} - {{ $item->price }} zl
                        </p>
                        <p><a href="/deletepizza/{{ $item->id }}">Usuń</a></p>
                    @endforeach

                    <p>Dodatki</p>

                    @foreach($toppings as $topp)
                        <p>
                            {{ $topp->topping->name }} - 5 zl
                        </p>
                        <p><a href="/deletetopp/{{ $topp->id }}">Usuń</a></p>
                    @endforeach

                    Cena całkowita: {{ $order->total_cost }} zl
                    <p>
                </div>

                <a href="/cart/finalize">Zaplac</a>

--}}{{--                <a href="/clearOrder">WYCZYSC ZAMOWIENIE</a>--}}{{--

                <div class="col-lg-6 menu-item filter-miza">

                </div>
            </div>
        </div>--}}




        <section class="pt-5 pb-5">
            <div class="container">
                <div class="row w-100">
                    <div class="col-lg-12 col-md-12 col-12">
                        <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
                        <p class="mb-5 text-center">
                            <i class="text-info font-weight-bold"><span class="yellow">
                                    3
                                </span>
                                    </i> items in your cart</p>
                        <table id="shoppingCart" class="table table-condensed table-responsive align-middle">
                            <thead>
                            <tr>
                                <th style="width:60%">Product</th>
                                <th style="width:12%">Price</th>
                                <th style="width:10%">Quantity</th>
                                <th style="width:16%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($items as $item)

                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-md-3 text-left">
                                            <img src="{{ asset('images/' . $item->pizza->id . '.png') }}" alt="Image" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                        </div>
                                        <div class="col-md-9 text-left mt-sm-2">
                                            <h4>{{$item->pizza->name}}</h4>
                                            <p class="font-weight-light"><span class="yellow">Rozmiar:</span> {{$item->size->name}}
                                                <p class="yellow">Dodatki:</p>
                                                @forelse($toppings as $topp)
                                                    <p>{{ $topp->topping->name }} - 5 zł
                                                    <a href="/deletetopp/{{ $topp->id }}">
                                                        <button class="btn btn-white border-secondary bg-white btn-sm mb-2" title="Usuń dodatki">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        </a>
                                                    </p>
                                            @empty
                                                <p>Brak dodatków.</p>
                                                @endforelse

                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td data-th="Price">{{(!str_contains($item->price, '.')) ? $item->price.'.00' : (str_ends_with($item->price,'0') ? $item->price : $item->price.'0')}} zł</td>
                                <td data-th="Quantity">
                                    <input type="number" class="form-control form-control-lg text-center" value="1">
                                </td>
                                <td class="actions" data-th="">
                                    <div class="text-right">
                                        <a href="/deletepizza/{{ $item->id }}">
                                        <button class="btn btn-white border-secondary bg-white btn-md mb-2" title="Usuń produkt">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="float-right text-right">
                            <h4>Suma całkowita:</h4>

                            <h1>{{(!str_contains($order->total_cost, '.')) ? $order->total_cost.'.00' : (str_ends_with($order->total_cost,'0') ? $order->total_cost : $order->total_cost.'0')}} zł</h1>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 d-flex align-items-center">
                    <div class="col-sm-6 order-md-2 text-right">
                        <a href="/cart/finalize" class="book-a-table-btn scrollto">Zapłać</a>
                    </div>
                    <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                        <a href="/">
                            <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
                    </div>
                </div>
            </div>
        </section>



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
