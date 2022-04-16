<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Page Title -->
    @yield('title')

    <!-- Meta Data -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.png" />

    <!-- Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@500;600;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- ======= FontAwesome ======= -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/all.min.css')}}" />

    <!-- ======= Bootstrap ======= -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}" />

    <!-- ======= Swiper Bundle ======= -->
    <link rel="stylesheet" href="{{asset('frontend/assets/plugins/swiper/swiper-bundle.min.css')}}" />

    <!-- ======= Magnific Popup ======= -->
    <link rel="stylesheet" href="{{asset('frontend/assets/plugins/magnific-popup/magnific-popup.css')}}" />

    <!-- ======= Main Stylesheet ======= -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}" />

    <!-- ======= Custom Stylesheet ======= -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/custom.css')}}" />
</head>

<body data-bg-img="{{asset('frontend/assets/img/bg/page-bg.png')}}">

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <img src="{{asset('frontend/assets/img/icons/text.svg')}}" alt="" class="svg preloader-svg">
        </div>
    </div>
    <!-- End Preloader -->
    <!-- header -->
    @include('partials.header')
    <!--end header -->
    <!-- content -->
    @yield('content')
    <!-- end content -->

    <!-- footer -->
    @include('partials.footer')
    <!-- end footer -->
    <!-- Back to Top Button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-long-arrow-alt-up"></i>
    </a>
    <!-- End Back to Top Button -->


    <!-- ======= jQuery Library ======= -->
    <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>

    <!-- ======= Bootstrap Bundle JS ======= -->
    <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- ======= Particles JS ======= -->
    <script src="{{asset('frontend/assets/plugins/particles/particles.min.js')}}"></script>

    <!-- ======= Menu JS ======= -->
    <script src=" {{asset('frontend/assets/js/menu.min.js')}}"></script>

    <!-- ======= Swiper JS ======= -->
    <script src="{{asset('frontend/assets/plugins/swiper/swiper-bundle.min.js')}}"></script>

    <!-- ======= Magnific Popup JS ======= -->
    <script src="{{asset('frontend/assets/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- ======= Countdown JS ======= -->
    <script src="{{asset('frontend/assets/plugins/countdown/countdown.min.js')}}"></script>

    <!-- ======= Nice select JS ======= -->
    <script src="{{asset('frontend/assets/plugins/nice-select/jquery.nice-select.min.js')}}"></script>

    <!-- ======= Isotope JS ======= -->
    <script src="{{asset('frontend/assets/plugins/Isotope/isotope.pkgd.js')}}"></script>

    <!-- ======= Wayoints JS ======= -->
    <script src="{{asset('frontend/assets/plugins/counterup/waypoints.min.js')}}"></script>

    <!-- ======= CounterUp JS ======= -->
    <script src="{{asset('frontend/assets/plugins/counterup/jquery.counterup.min.js')}}"></script>

    <!-- ======= Main JS ======= -->
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>

    <!-- ======= Custom JS ======= -->
    <script src="{{asset('frontend/assets/js/custom.js')}}"></script>
</body>

</html>