@extends('template-home')


@section('content')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
        <div
            class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
            <i class="bi bi-phone d-flex align-items-center"><span>+48 202-303-404</span></i>
            <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Pon-Czw: 12:00 - 22:00  |  Pt-Nd: 12:00 - 00:00 </span></i>
        </div>
    </section>


    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <div class="logo me-auto">
                <h1><a href="/">Delicious</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">O nas</a></li>
                    <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
                    {{--                    <li><a class="nav-link scrollto" href="#specials">Popularne</a></li>--}}
                    {{--                    <li><a class="nav-link scrollto" href="#events">Wydarzenia</a></li>--}}
                    {{--                    <li><a class="nav-link scrollto" href="#chefs">Kucharze</a></li>--}}
                    <li><a class="nav-link scrollto" href="#gallery">Zdjęcia</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('profile.index') }}">{{ __('Konto') }}</a></li>
                    {{--                    <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>--}}
                    {{--                        <ul>--}}
                    {{--                            <li><a href="#">Drop Down 1</a></li>--}}
                    {{--                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i--}}
                    {{--                                        class="bi bi-chevron-right"></i></a>--}}
                    {{--                                <ul>--}}
                    {{--                                    <li><a href="#">Deep Drop Down 1</a></li>--}}
                    {{--                                    <li><a href="#">Deep Drop Down 2</a></li>--}}
                    {{--                                    <li><a href="#">Deep Drop Down 3</a></li>--}}
                    {{--                                    <li><a href="#">Deep Drop Down 4</a></li>--}}
                    {{--                                    <li><a href="#">Deep Drop Down 5</a></li>--}}
                    {{--                                </ul>--}}
                    {{--                            </li>--}}
                    {{--                            <li><a href="#">Drop Down 2</a></li>--}}
                    {{--                            <li><a href="#">Drop Down 3</a></li>--}}
                    {{--                            <li><a href="#">Drop Down 4</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    <li><a class="nav-link scrollto" href="#contact">Kontakt</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="#book-a-table" class="book-a-table-btn scrollto">Koszyk <i class="fas fa-shopping-cart"></i></a>

        </div>
    </header><!-- End Header -->


    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown"><span>Zaloguj sie</span></h2>
                                <form method="POST" action="{{ route('login') }}" role="form" class="php-email-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="adres email"
                                                   data-rule="email" data-msg="Please enter a valid email">
                                            <div class="validate"></div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="haslo"
                                                   data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                    <p></p>
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                    <p></p>
                                    <button type="submit" class="btn btn-menu animate__animated animate__fadeInUp scrollto">
                                        Zaloguj sie</button>
                                    <a href="/register"
                                       class="btn-book animate__animated animate__fadeInUp scrollto">Zarejestruj się</a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui
                                    aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem
                                    mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti
                                    vel. Minus et tempore modi architecto.</p>
                                <div>
                                    <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our
                                        Menu</a>
                                    <a href="#book-a-table"
                                       class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui
                                    aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem
                                    mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti
                                    vel. Minus et tempore modi architecto.</p>
                                <div>
                                    <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our
                                        Menu</a>
                                    <a href="#book-a-table"
                                       class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </div>
    </section><!-- End Hero -->

{{--    <main id="main">--}}

{{--        <!-- ======= Contact Section ======= -->--}}
{{--        <section id="contact" class="contact">--}}
{{--            <div class="container">--}}

{{--                <div class="section-title">--}}
{{--                    <h2><span>Contact</span> Us</h2>--}}
{{--                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas--}}
{{--                        atque vitae autem.</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="map">--}}
{{--                <iframe style="border:0; width: 100%; height: 350px;"--}}
{{--                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"--}}
{{--                        frameborder="0" allowfullscreen></iframe>--}}
{{--            </div>--}}

{{--            <div class="container mt-5">--}}

{{--                <div class="info-wrap">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-3 col-md-6 info">--}}
{{--                            <i class="bi bi-geo-alt"></i>--}}
{{--                            <h4>Location:</h4>--}}
{{--                            <p>A108 Adam Street<br>New York, NY 535022</p>--}}
{{--                        </div>--}}

{{--                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">--}}
{{--                            <i class="bi bi-clock"></i>--}}
{{--                            <h4>Open Hours:</h4>--}}
{{--                            <p>Monday-Saturday:<br>11:00 AM - 2300 PM</p>--}}
{{--                        </div>--}}

{{--                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">--}}
{{--                            <i class="bi bi-envelope"></i>--}}
{{--                            <h4>Email:</h4>--}}
{{--                            <p>info@example.com<br>contact@example.com</p>--}}
{{--                        </div>--}}

{{--                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">--}}
{{--                            <i class="bi bi-phone"></i>--}}
{{--                            <h4>Call:</h4>--}}
{{--                            <p>+1 5589 55488 51<br>+1 5589 22475 14</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <form action="forms/contact.php" method="post" role="form" class="php-email-form">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6 form-group">--}}
{{--                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"--}}
{{--                                   required>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 form-group mt-3 mt-md-0">--}}
{{--                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"--}}
{{--                                   required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group mt-3">--}}
{{--                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"--}}
{{--                               required>--}}
{{--                    </div>--}}
{{--                    <div class="form-group mt-3">--}}
{{--                            <textarea class="form-control" name="message" rows="5" placeholder="Message"--}}
{{--                                      required></textarea>--}}
{{--                    </div>--}}
{{--                    <div class="my-3">--}}
{{--                        <div class="loading">Loading</div>--}}
{{--                        <div class="error-message"></div>--}}
{{--                        <div class="sent-message">Your message has been sent. Thank you!</div>--}}
{{--                    </div>--}}
{{--                    <div class="text-center">--}}
{{--                        <button type="submit">Send Message</button>--}}
{{--                    </div>--}}
{{--                </form>--}}

{{--            </div>--}}
{{--        </section><!-- End Contact Section -->--}}

{{--    </main>--}}

@endsection
