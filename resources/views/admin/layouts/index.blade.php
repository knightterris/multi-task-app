<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    @if (url()->current() == route('admin.homepage'))
        <title>{{ trans('globalText.admin.home_page') }}</title>
    @else
        <title>@yield('title')</title>
    @endif
    <!-- ================= Favicon ================== -->
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="{{ asset('home/admin/css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/admin/css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/admin/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/admin/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('home/admin/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/admin/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/admin/css/lib/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/admin/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('home/admin/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/admin/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('home/admin/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>

    @yield('styles')
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo">
                        <a href="">
                            <span>19 Stuff</span>
                        </a>
                    </div>
                    <li class="label">Main</li>
                    <li><a href="{{ route('admin.homepage') }}"><i class="ti-home"></i> Dashboard </a></li>

                    <li class="label">Apps</li>
                    <li>
                        <a href="{{ route('admin.profilePage') }}">
                            <i class="ti-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>

                    <li><a href="{{ route('admin.changePasswordPage') }}"><i class="ti-key"></i> Password </a></li>
                    <li><a href="{{ route('admin.myWall.index') }}"><i class="ti-user"></i> My Wall </a></li>
                    <li>
                        <a class="sidebar-sub-toggle"><i class="ti-user"></i> User Management <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{ route('admin.users.list') }}">Users</a></li>
                        </ul>
                    </li>

                    </li>
                    <li class="label">Features</li>
                    <li><a href="{{ route('admin.category.page') }}"><i class="ti-server"></i> Category</a></li>
                    <li><a href="{{ route('admin.product.productListPage') }}"><i class="ti-package"></i> Product</a>
                    <li><a href="{{ route('admin.wishlist.wishlistPage') }}"><i class="ti-heart"></i>Wishlist</a></li>

                    {{--     <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> UI Elements <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="">Typography</a></li>
                            <li><a href="">Alerts</a></li>

                            <li><a href="">Button</a></li>
                            <li><a href="">Dropdown</a></li>

                            <li><a href="">List Group</a></li>

                            <li><a href="">Progressbar</a></li>
                            <li><a href="">Tab</a></li>

                        </ul>
                    </li>
                       <li><a class="sidebar-sub-toggle"><i class="ti-panel"></i> Components <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="uc-calendar.html">Calendar</a></li>
                            <li><a href="uc-carousel.html">Carousel</a></li>
                            <li><a href="uc-weather.html">Weather</a></li>
                            <li><a href="uc-datamap.html">Datamap</a></li>
                            <li><a href="uc-todo-list.html">To do</a></li>
                            <li><a href="uc-scrollable.html">Scrollable</a></li>
                            <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="uc-toastr.html">Toastr</a></li>
                            <li><a href="uc-range-slider-basic.html">Basic Range Slider</a></li>
                            <li><a href="uc-range-slider-advance.html">Advance Range Slider</a></li>
                            <li><a href="uc-nestable.html">Nestable</a></li>

                            <li><a href="uc-rating-bar-rating.html">Bar Rating</a></li>
                            <li><a href="uc-rating-jRate.html">jRate</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Table <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="table-basic.html">Basic</a></li>

                            <li><a href="table-export.html">Datatable Export</a></li>
                            <li><a href="table-row-select.html">Datatable Row Select</a></li>
                            <li><a href="table-jsgrid.html">Editable </a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-heart"></i> Icons <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="font-themify.html">Themify</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-map"></i> Maps <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="gmaps.html">Basic</a></li>
                            <li><a href="vector-map.html">Vector Map</a></li>
                        </ul>
                    </li>
                    <li class="label">Form</li>
                    <li><a href="form-basic.html"><i class="ti-view-list-alt"></i> Basic Form </a></li>
                    <li class="label">Extra</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-files"></i> Invoice <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="invoice.html">Basic</a></li>
                            <li><a href="invoice-editable.html">Editable</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-target"></i> Pages <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="page-login.html">Login</a></li>
                            <li><a href="page-register.html">Register</a></li>
                            <li><a href="page-reset-password.html">Forgot password</a></li>
                        </ul>
                    </li>
                    <li><a href="../documentation/index.html"><i class="ti-file"></i> Documentation</a></li> --}}
                    {{-- <li><a><i class="ti-close"></i> Logout</a></li> --}}

                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        {{-- <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Recent Notifications</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">5 members joined today </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mariam</div>
                                                        <div class="notification-text">likes a photo of you</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Tasnim</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-email"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">2 New Messages</span>
                                        <a href="email.html">
                                            <i class="ti-pencil-alt pull-right"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/1.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="dropdown dib">
                            <div class="header-icon d-flex" data-toggle="dropdown">
                                <span class="user-avatar mt-2">{{ Auth::user()->name }}
                                </span>
                                {{-- <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt=""
                                    srcset="" class="rounded-circle"> --}}
                                <span class="ml-3">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="btn btn-secondary" type="submit" title="Logout"><i
                                                class="ti-key"></i></button>
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <!-- /# row -->
                <section id="main-content">
                    @yield('content')

                </section>
            </div>
        </div>
    </div>


    @yield('scripts')
    {{-- logout --}}
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <!-- jquery vendor -->
    <script src="{{ asset('home/admin/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('home/admin/js/lib/jquery.nanoscroller.min.js') }}"></script>
    <!-- nano scroller -->
    <script src="{{ asset('home/admin/js/lib/menubar/sidebar.js') }}"></script>
    <script src="{{ asset('home/admin/js/lib/preloader/pace.min.js') }}"></script>
    <!-- sidebar -->

    <script src="{{ asset('home/admin/js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ asset('home/admin/js/scripts.js') }}"></script>
    <!-- bootstrap -->

    <script src="{{ asset('home/admin/js/lib/calendar-2/moment.latest.min.js') }}"></script>
    <script src="{{ asset('home/admin/js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
    <script src="{{ asset('home/admin/js/lib/calendar-2/pignose.init.js') }}"></script>


    <script src="{{ asset('home/admin/js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('home/admin/js/lib/weather/weather-init.js') }}"></script>
    <script src="{{ asset('home/admin/js/lib/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('home/admin/js/lib/circle-progress/circle-progress-init.js') }}"></script>
    <script src="{{ asset('home/admin/js/lib/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('home/admin/js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('home/admin/js/lib/sparklinechart/sparkline.init.js') }}"></script>
    <script src="{{ asset('home/admin/js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('home/admin/js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
    <!-- scripit init-->
    <script src="{{ asset('home/admin/js/dashboard2.js') }}"></script>
</body>

</html>
