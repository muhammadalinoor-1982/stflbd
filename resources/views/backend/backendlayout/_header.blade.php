<div class="header-section">
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center">

            <!-- Header Logo (Header Left) Start -->
            <div class="header-logo col-auto">
                <a href="{{route('dashboard.index')}}">
                    <img src="{{asset('public/backend/assets/images/logo/logo.png')}}" alt="">
                    <img src="{{asset('public/backend/assets/images/logo-light.png')}}" class="logo-light" alt="">
                </a>
            </div><!-- Header Logo (Header Left) End -->

            <!-- Header Right Start -->
            <div class="header-right flex-grow-1 col-auto">
                <div class="row justify-content-between align-items-center">

                    <!-- Side Header Toggle & Search Start -->
                    <div class="col-auto">
                        <div class="row align-items-center">

                            <!--Side Header Toggle-->
                            <div class="col-auto"><button class="side-header-toggle"><i class="zmdi zmdi-menu"></i></button></div>

                            <!--Header Search-->
                            {{--<div class="col-auto">

                                <div class="header-search">

                                    <button class="header-search-open d-block d-xl-none"><i class="zmdi zmdi-search"></i></button>

                                    <div class="header-search-form">
                                        <form action="#">
                                            <input type="text" placeholder="Search Here">
                                            <button><i class="zmdi zmdi-search"></i></button>
                                        </form>
                                        <button class="header-search-close d-block d-xl-none"><i class="zmdi zmdi-close"></i></button>
                                    </div>

                                </div>
                            </div>--}}

                        </div>
                    </div>
                    <!-- Side Header Toggle & Search End -->

                    <!-- Header Notifications Area Start -->
                    <div class="col-auto">

                        <ul class="header-notification-area">
                            <!--User-->
                            <li class="adomx-dropdown col-auto">
                                <a class="toggle" href="#">
                                            <span class="user">
                                        <span class="avatar">
                                            <img src="{{(!empty(Auth::user()->image))?url('public/backend/images/user_images/'.Auth::user()->image):url('public/backend/images/user_images/noimage.jpg')}}" alt="">
                                            {{--<img src="{{ asset('public/backend/images/user_images/'.Auth::user()->image) }}" alt="">--}}
                                            <span class="status"></span>
                                            </span>
                                            <span class="name">{{ Auth::user()->name }}</span>
                                            </span>
                                </a>

                                <!-- Dropdown -->
                                <div class="adomx-dropdown-menu dropdown-menu-user">
                                    <div class="head">
                                        <h5 class="name"><a href="#">{{ Auth::user()->name }}</a></h5>
                                        <a class="mail" href="#">{{ Auth::user()->email }}</a>
                                    </div>
                                    <div class="body">
                                        <ul>
                                            <li><a href="{{ route('user.profile', Auth::user()->id) }}"><i class="zmdi zmdi-account"></i>
                                                    {{ __('Profile') }}
                                                </a></li>
                                            {{--<li><a href="{{route('user.profile', Auth::user()->id)}}"><i class="zmdi zmdi-account"></i>Profile</a></li>--}}
                                        </ul>
                                        <ul>
                                            <li><a href="{{ route('user.edit') }}"><i class="zmdi zmdi-settings"></i>Profile Setting</a></li>
                                            <li>
                                                    <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="zmdi zmdi-lock-open"></i>
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                            </li>
                                            {{--<li><a href="#"><i class="zmdi zmdi-lock-open"></i>Sing out</a></li>--}}
                                        </ul>
                                        <ul>
                                            <li><a href="{{ route('password.request') }}"><i class="zmdi zmdi-paypal"></i>Change Password</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </li>

                        </ul>

                    </div><!-- Header Notifications Area End -->

                </div>
            </div><!-- Header Right End -->

        </div>
    </div>
</div><!-- Header Section End -->
