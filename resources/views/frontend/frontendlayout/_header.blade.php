<header>
    <div class="header-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <div class="logo"><a title="ecommerce Template" href="{{route('HomePage.view')}}"><img alt="ecommerce Template" src="{{asset('public/frontend/images/logo.png')}}"></a></div>
                </div>
                <div class="col-lg-9 col-sm-9 col-xs-12 jtv-rhs-header">
                    <div class="jtv-header-box">
                        <div class="top_section hidden-xs">
                            <div class="toplinks">
                                <div class="site-dir hidden-xs">
                                    <a class="hidden-sm" href="{{url('AboutUs/view')}}"><strong>About Us </strong></a>
                                    <a class="hidden-sm" href="{{url('ContactUs/view')}}"><strong>Contact Us</strong></a>
                                    <a class="hidden-sm" href="{{url('Services/view')}}"><strong>Services</strong></a>
                                    @if(isset(Auth::user()->id))
                                        <a title="My Account" href="{{route('FrontendUser.edit')}}"><strong>My Account</strong></a>
                                    @else
                                        <a title="My Account" href="#"></a>
                                    @endif
                                    @if(isset(Auth::user()->id))
                                        <a title="My Query" href="{{route('FrontendCustomerQuery.view')}}"><strong>My Query</strong></a>
                                    @endif
                                </div>
                                @include('frontend.frontendlayout._messages')
                                <ul class="links">

                                   {{-- <li>
                                        @if(isset(Auth::user()->id))
                                            <a title="My Query" href="{{route('FrontendCustomerQuery.create')}}">Post Query</a>
                                        @endif
                                    </li>--}}


                                    {{--<li><a title="My Query" href="#">{{(@Auth::user()->id)?route('FrontendCustomerQuery.view'):""}}</a></li>--}}

                                    <li><img style="
                                          display: inline-block;
                                          overflow: hidden;
                                          border-radius: 50%;
                                          " src="{{(!empty(Auth::user()->image))?url('public/backend/images/user_images/'.Auth::user()->image):""}}" alt="" width="5%"></li>
                                    <li><a title="My Name" href="#">{{(@Auth::user()->name)?Auth::user()->name:""}}</a></li>
                                    <li>
                                        @if(isset(Auth::user()->id))
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="zmdi zmdi-lock-open"></i>
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        @else
                                            <a title="Log In" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
