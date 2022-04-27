<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description"
        content="edutim,coaching, distant learning, education html, health coaching, kids education, language school, learning online html, live training, online courses, online training, remote training, school html theme, training, university html, virtual training  ">

    <meta name="author" content="themeturn.com">

    <title>{{ DB::table('settings')->latest()->first()->name_app }}</title>

    <!-- Mobile Specific Meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/bootstrap.css') }}">
    <!-- Iconfont Css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bicon/css/bicon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/themify/themify-icons.css') }}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate-css/animate.css') }}">
    <!-- WooCOmmerce CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/woocommerce/woocommerce-layouts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/woocommerce/woocommerce-small-screen.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/woocommerce/woocommerce.css') }}">
    <!-- Owl Carousel  CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl/assets/owl.theme.default.min.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    @yield('css')

</head>

<body id="top-header">

    <header>
        <!-- Main Menu Start -->
        <div class="site-navigation main_menu menu-2" id="mainmenu-area">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid container-padding">
                    <a class="navbar-brand" href="/">
                        <img src="https://sman48-jkt.sch.id/wp-content/uploads/2021/07/cropped-cropped-cropped-cropped-EXpbXvsS_400x400-removebg-preview-2-1.png" width="45" height="45" alt="Edutim" class="img-fluid">
                        &nbsp;&nbsp;&nbsp;<span style="font-weight: bold; color: black;">SMAN 48 JAKARTA</span>
                    </a>

                    <!-- Toggler -->

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
                        aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>

                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="navbarMenu">

                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a href="/" class="nav-link js-scroll-trigger {{ Route::is('welcome') ? 'active' : '' }}">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('list.events') }}" class="nav-link js-scroll-trigger {{ Route::is('list.events') ? 'active' : '' }}">
                                    Events
                                </a>
                            </li>
                            @guest
                                <li class="nav-item ">
                                    <a href="{{ route('contact') }}" class="nav-link js-scroll-trigger {{ Route::is('contact') ? 'active' : '' }}">
                                        Contact
                                    </a>
                                </li>
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger {{ Route::is('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger {{ Route::is('register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register')
                                            }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item ">
                                    <a href="{{ route('list.alumni') }}" class="nav-link js-scroll-trigger {{ Route::is('list.alumni') ? 'active' : '' }}">
                                        Alumni
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{ route('forum.index') }}" class="nav-link js-scroll-trigger {{ Route::is('forum.index') ? 'active' : '' }}">
                                        Forums
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="about.html" class="nav-link js-scroll-trigger">
                                        Contact
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}<i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbar3">
                                        @if (auth()->user()->isAdmin == 1)
                                        <a class="dropdown-item " href="{{ route('admin.dashboard') }}">
                                            Dashboard
                                        </a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        {{-- <a class="dropdown-item " href="course-grid.html">
                                            Course Style 1
                                        </a> --}}
                                    </div>
                                </li>
                            @endguest

                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" id="navbar3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Home<i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbar3">
                                    <a class="dropdown-item " href="index.html">
                                        Home 1
                                    </a>
                                    <a class="dropdown-item " href="index-2.html">
                                        Home 2
                                    </a>
                                    <a class="dropdown-item " href="index-3.html">
                                        Home 3
                                    </a>
                                    <a class="dropdown-item " href="index-4.html">
                                        Home 4
                                    </a>
                                    <a class="dropdown-item " href="index-5.html">
                                        Home 5
                                    </a>
                                    <a class="dropdown-item " href="index-6.html">
                                        Home 6
                                    </a>
                                    <a class="dropdown-item " href="index-7.html">
                                        Home 7
                                    </a>
                                    <a class="dropdown-item " href="index-8.html">
                                        Home 8 <span>New</span>
                                    </a>

                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Courses<i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbar3">
                                    <a class="dropdown-item " href="course-grid.html">
                                        Course Style 1
                                    </a>
                                    <a class="dropdown-item " href="course-grid-2.html">
                                        Course Style 2
                                    </a>

                                    <a class="dropdown-item " href="course-grid-3.html">
                                        Course Style 3
                                    </a>
                                    <a class="dropdown-item " href="course-grid-4.html">
                                        Course Style 4
                                    </a>
                                    <a class="dropdown-item " href="course-grid-5.html">
                                        Course Filter
                                    </a>
                                    <a class="dropdown-item " href="course-grid-6.html">
                                        Course List
                                    </a>
                                    <a class="dropdown-item " href="course-single.html">
                                        Course Details Style 1
                                    </a>
                                    <a class="dropdown-item " href="course-single2.html">
                                        Course Details Style Tab
                                    </a>
                                    <a class="dropdown-item " href="course-single3.html">
                                        Course Details Style Tab2
                                    </a>
                                    <a class="dropdown-item " href="course-single4.html">
                                        Course Details Classic
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Shop<i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbar3">
                                    <a class="dropdown-item " href="shop.html">
                                        Shop
                                    </a>
                                    <a class="dropdown-item " href="product-list-filter.html">
                                        Shop List Filter
                                    </a>
                                    <a class="dropdown-item " href="product-single.html">
                                        Shop Single
                                    </a>
                                    <a class="dropdown-item " href="cart.html">
                                        Cart
                                    </a>
                                    <a class="dropdown-item " href="checkout.html">
                                        Checkout
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pages<i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbar3">
                                    <a class="dropdown-item " href="instructors.html">
                                        Instructor
                                    </a>
                                    <a class="dropdown-item " href="login-registration.html">
                                        Login
                                    </a>
                                    <a class="dropdown-item " href="404.html">
                                        404
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Blog<i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbar3">
                                    <a class="dropdown-item " href="blog.html">
                                        Blog
                                    </a>
                                    <a class="dropdown-item " href="blog-single.html">
                                        Blog Single
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a href="contact.html" class="nav-link">
                                    Contact
                                </a>
                            </li> --}}
                        </ul>

                    </div> <!-- / .navbar-collapse -->
                </div> <!-- / .container -->
            </nav>
        </div>
    </header>

    @yield('content')

    <section class="footer">
        <div class="footer-btm">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12">
                        <div class="copyright text-lg-center">
                            <p>@ Copyright Reserved By {{ DB::table('settings')->latest()->first()->name_app }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="fixed-btm-top">
        <a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
    </div>



    <!-- 
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="{{ asset('assets/vendors/jquery/jquery.js') }}"></script>
    <!-- Bootstrap 4.5 -->
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ asset('assets/vendors/counterup/waypoint.js') }}"></script>
    <script src="{{ asset('assets/vendors/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.isotope.js') }}"></script>
    <script src="{{ asset('assets/vendors/imagesloaded.js') }}"></script>
    <!--  Owlk Carousel-->
    <script src="{{ asset('assets/vendors/owl/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    @yield('js')

</body>

</html>