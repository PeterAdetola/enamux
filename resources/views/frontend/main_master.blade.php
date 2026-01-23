<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>E N A M U X</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <style>
        .logo-svg {
            width: 160px;
            height: auto;
            color: #BE996B;
            display: block;
        }
        .logo-link:hover .logo-svg {
            color: #ffffff;
        }

    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <!-- Preloader -->
    <div class="preloader-bg"></div><div id="preloader"><div id="preloader-status"><div class="preloader-position loader"><span></span></div></div></div>

    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- Sidebar Here -->
        @include('frontend.component.menu')

    <!-- Main -->
    <div id="bauen-main">
        <!-- Header -->
        <header class="bauen-header">
            <!-- Logo -->
{{--            <div class="bauen-logo-wrap">--}}
{{--                <div class="bauen-logo">--}}
{{--                    <a href="index.html">--}}
{{--                        <img src="img/logo.png" class="logo-img" alt="">--}}
{{--                        <h2>BAUEN<span>INNOVATE DESIGN</span></h2>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="bauen-logo-wrap">
                <div class="bauen-logo">
                    <a href="{{ url('/') }}" class="logo-link">
                        <svg
                            class="logo-svg"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 341.7 92.5"
                            role="img"
                            aria-label="Enamux logo"
                        >
                            <g fill="currentColor">
                                <polygon points="12.7,48.6 31.1,48.6 31.1,39.6 12.7,39.6 12.7,9.5 35.3,9.5 35.3,0 0,0 0,91.2 35.6,91.2 35.6,82 12.7,82"/>
                                <polygon points="206.9,0 190.6,73.9 174.6,0 162.1,0 160.5,85.3 132.6,5.7 132.1,4.6 139.2,0.8 111.8,0.8 119.6,4.5 119.1,5.6 90.9,85.9 90.9,0 80.4,0 80.4,60.5 54.5,0 45.8,0 45.8,91.2 56.6,91.2 56.6,28.9 82.1,89.5 72.8,92.5 106.8,92.5 99.8,88.8 100.2,87.7 121.3,23.6 121.3,92.5 130.3,92.5 130.3,23.6 151.4,87.6 151.8,88.7 144.8,92.5 178.8,92.5 170.7,89.9 171.7,25 187,91.2 194.2,91.2 209.7,25 210.7,91.2 220.9,91.2 219.2,0"/>
                                <path d="M270.6,61c0,3.9-0.3,7.5-0.8,10.7-0.5,3.2-1.7,5.8-3.4,7.7-1.7,1.9-4.4,2.8-8,2.8-3.5,0-6.2-0.9-7.9-2.8-1.8-1.9-2.9-4.4-3.4-7.7-0.5-3.2-0.8-6.8-0.8-10.7V0h-12.2v60.4c0,6.4,0.6,11.9,1.9,16.7 1.3,4.8,3.7,8.5,7.2,11.1 3.5,2.6,8.6,3.9,15.2,3.9 6.6,0,11.6-1.3,15.1-3.9 3.5-2.6,5.9-6.3,7.1-11.1 1.3-4.8,1.9-10.3,1.9-16.7V0h-12V61z"/>
                                <polygon points="321.6,44.5 340.8,0 329,0 316.4,32.2 302.5,0 290.7,0 309.4,43.4 290.4,91.2 302.2,91.2 315,56.8 329.9,91.2 341.7,91.2"/>
                            </g>
                        </svg>
                        <span style="font-size: 0.33em">CONSULTING ENGINEERS</span>
                    </a>
                </div>
            </div>

            <!-- Menu Burger -->
            <div class="text-right bauen-wrap-burger-wrap">
                <a href="#" class="bauen-nav-toggle bauen-js-bauen-nav-toggle"><i></i></a>
            </div>
        </header>
@if(request()->routeIs('home'))
    @include('frontend.component.slider')
@endif

        <!-- Content -->
        <div class="content-wrapper">

            <!-- Lines -->
            <section class="content-lines-wrapper">
                <div class="content-lines-inner">
                    <div class="content-lines"></div>
                </div>
            </section>
            <!-- --------------------------------------------- -->

@if(!request()->routeIs('home'))
                <!-- Header Banner -->
                <section class="banner-header banner-img valign bg-img bg-fixed" data-overlay-darkgray="6" data-background="{{ asset('frontend/assets/img/banner.jpg') }}">
                    <div class="left-panel"></div>
                </section>
@endif

            @yield('main')

            <!-- --------------------------------------------- -->
        @include('frontend.component.footer')
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('frontend/assets/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.isotope.v3.0.2.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scrollIt.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/YouTubePopUp.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/before-after.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
</body>
</html>
