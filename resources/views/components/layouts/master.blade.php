<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Medilix - Healthcare & Medical Bootstrap HTML5 Template</title>
    <meta name="description" content="Medilix - Healthcare & Medical Bootstrap HTML5 Template">
    <meta name="author" content="ahmmedsabbirbd">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/favicon.svg')}}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/fontawesome-pro.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/odometer-theme-default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    @stack('styles')
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body class="body-1">

<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- preloader start -->
<div id="preloader">
    <div class="preloader-close">x</div>
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!-- preloader end -->

<!-- preloader start -->
<div class="loading-form">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!-- preloader end -->

<!-- Backtotop start -->
<div id="scroll-percentage">
    <span id="scroll-percentage-value" data-default-color="var(--rr-color-900)"
          data-scroll-color="var(--rr-theme-primary)"></span>
</div>
<!-- Backtotop end -->

<!-- Offcanvas area start -->
<div class="fix">
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="index.html">
                            <img src="assets/imgs/logo/logo-white.svg" alt="logo not found">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button class="offcanvas-close-icon animation--flip">
                                <span class="offcanvas-m-lines">
                              <span class="offcanvas-m-line line--1"></span><span
                                        class="offcanvas-m-line line--2"></span><span
                                        class="offcanvas-m-line line--3"></span>
                                </span>
                        </button>
                    </div>
                </div>
                <div class="mobile-menu fix"></div>

            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>
<div class="offcanvas__overlay-white"></div>
<!-- Offcanvas area start -->

<!-- Header area start -->
<header>
    <div id="header-sticky" class="header__area header-1">
        <div class="demo_mode d-flex justify-content-center bg-danger mb-2">
            <div class="py-3">
                <p class="mb-0 text-white">{{__('საიტი მუშაობს სატესტო რეჟიმში')}}</p>
            </div>
        </div>
        <div class="container">
            <div class="mega__menu-wrapper p-relative">
                <div class="header__main">
                    <div class="header__logo">
                        <a href="{{ route('home') }}">
                            <div class="logo">
                                <img src="{{asset('assets/imgs/logo/logo.png')}}" alt="logo not found">
                            </div>
                        </a>
                    </div>

                    <div class="mean__menu-wrapper d-none d-lg-block">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li>
                                        <a href="{{ route('vacancies.index') }}">
                                            {{__('ვაკანსიები')}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('news.index') }}">
                                            {{__('სიახლეები')}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('companies.index') }}">
                                            {{__('კომპანიები')}}
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="header__right">
                        <div class="header__action d-flex align-items-center">
                            <div class="main-menu">
                                <ul>
                                    @auth

                                        <li class="has-dropdown">
                                            <a href="#">
                                                <i class="fa-solid fa-user me-2"></i>
                                                {{auth()->user()->email}}</a>
                                            <ul class="submenu">
                                                @if (auth()->user()->type == 'company')
                                                    <li><a href="/company/">{{__('პროფილი')}}</a></li>
                                                @else
                                                    <li><a href="/user/">{{__('პროფილი')}}</a></li>

                                                @endif
                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <button type="submit"
                                                                class="ms-5">
                                                            {{__('გასვლა')}}
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endauth

                                    @guest
                                        <li class="has-dropdown">
                                            <a href="#">{{__('სისტემაში შესვლა')}}</a>
                                            <ul class="submenu">
                                                <li><a href="/user/login">{{__('მომხმარებელი')}}</a></li>
                                                <li><a href="/company/login">{{__('კომპანია')}}</a></li>
                                            </ul>
                                        </li>
                                    @endguest

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header area end -->

<!-- Body main wrapper start -->
<main class="body-background"> <!--for use #F2F7FD..  you can remove it any time-->
    {{$slot}}

</main>
<!-- Body main wrapper end -->

<!-- Footer area start -->
<footer>
    <section class="footer__area-common white-bg overflow-hidden" data-background="assets/imgs/footer/background.png">
        <div class="container">
            <div class="row mb-minus-50">
                <div class="col-lg-3 col-6">
                    <div class="footer__widget footer__widget-item-1">
                        <div class="footer__logo mb-30 mb-xs-25">
                            <a href="index.html">
                                <img class="img-fluid" src="{{asset('assets/imgs/logo/logo.png')}}"
                                     alt="logo not found">
                            </a>
                        </div>

                        <div class="footer__content">
                            <p class="mb-0"></p>
                        </div>

                        <div class="footer__social mt-30 mt-xs-30">
                            <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.0596 6.77295L15.8879 -0.00195312H14.5068L9.44607 5.8806L5.40411 -0.00195312H0.742188L6.85442 8.89352L0.742188 15.998H2.12338L7.4676 9.78587L11.7362 15.998H16.3981L10.0593 6.77295H10.0596ZM8.16787 8.97189L7.54857 8.0861L2.62104 1.03779H4.74248L8.71905 6.726L9.33834 7.61179L14.5074 15.0056H12.386L8.16787 8.97223V8.97189Z"
                                        fill="#071C3C"/>
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-6 ms-auto">
                    <div class="footer__widget footer__widget-item-4">
                        <div class="footer__widget-title">
                            <h4>{{__('კონტაქტი')}}</h4>
                        </div>

                        <div class="footer__link footer__link-location">
                            <ul>
                                <li><a href="mailto:debra.holt@example.com"><i class="fa-solid fa-envelope"></i>
                                        career@tsmu.edu</a></li>
                                <li><a href="https://maps.app.goo.gl/4XYAPDmpesGnSbsC8"><i
                                            class="fa-solid fa-location-dot"></i> ვ.ფშაველას გამზირი</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer__bottom-wrapper">
            <div class="container">
                <div class="footer__bottom">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="footer__copyright text-lg-start text-center">
                                <p class="mb-0">© <a href="index.html">Medilix</a> 2024 | All Rights Reserved</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="footer__copyright-menu">
                                <ul>
                                    <li><a href="about-us.html">Trams & Condition</a></li>
                                    <li><a href="about-us.html">Privacy Policy</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<!-- Footer area end -->

<!-- JS here -->
<script src="{{asset('assets/js/vendor/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/meanmenu.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/odometer.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/swiper.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/wow.js')}}"></script>
<script src="{{asset('assets/js/vendor/magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/type.js')}}"></script>
<script src="{{asset('assets/js/plugins/nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.appear.js')}}"></script>
<script src="{{asset('assets/js/plugins/parallax.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/parallax-scroll.js')}}"></script>
<script src="{{asset('assets/js/plugins/gsap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/ScrollTrigger.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/SplitText.js')}}"></script>
<script src="{{asset('assets/js/plugins/tween-max.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/draggable.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/smoothscroll.js')}}"></script>
<script src="{{asset('assets/js/vendor/ajax-form.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
@stack('scripts')

</body>

</html>
