@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<!-- Side Header Start -->
<div class="side-header show">
    <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
    <!-- Side Header Inner Start -->
    <div class="side-header-inner custom-scroll">

        <nav class="side-header-menu" id="side-header-menu">
            <ul>
                @if(Auth::user()->user_role != 'operator')
                <li class="{{($prefix == '/user')?'has-sub-menu':''}}"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large " aria-hidden="true"></i> <span>Dashboard</span></a>
                    <ul class="{{($route == 'user.userList')?'side-header-sub-menu':''}}">
                        <li style="list-style: none"><a data-clipboard-text="fa fa-square" href="{{route('user.userList')}}"><i class="fa fa-square" aria-hidden="true"></i><span> All Users</span></a></li>
                    </ul>
                </li>
                @endif
                <li class="{{($prefix == '/agro')?'has-sub-menu':''}}"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large " aria-hidden="true"></i> <span> Agro</span></a>
                    <ul class="{{($route == ['agro.view','AgroProduct.view'])?'side-header-sub-menu':''}}">
                        @if(Auth::user()->user_role != 'operator')
                        <li style="list-style: none"><a data-clipboard-text="fa fa-square" href="{{route('agro.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span> Agro List</span></a></li>
                        @endif
                        <li style="list-style: none"><a data-clipboard-text="fa fa-square" href="{{route('AgroProduct.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span> Agro Products List</span></a></li>
                    </ul>
                </li>
                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Fashion</span></a>
                    <ul class="side-header-sub-menu">
                        @if(Auth::user()->user_role != 'operator')
                        <li><a data-clipboard-text="fa fa-square" href="{{route('Fashion.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Fashion List</span></a></li>
                        @endif
                        <li><a data-clipboard-text="fa fa-square" href="{{route('FashionProduct.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Agro Products List</span></a></li>
                    </ul>
                </li>
                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Luxury</span></a>
                    <ul class="side-header-sub-menu">
                        @if(Auth::user()->user_role != 'operator')
                        <li><a data-clipboard-text="fa fa-square" href="{{route('Luxury.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Fashion List</span></a></li>
                        @endif
                        <li><a data-clipboard-text="fa fa-square" href="{{route('LuxuryProduct.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Luxury Products List</span></a></li>
                    </ul>
                </li>
                 @if(Auth::user()->user_role != 'operator')
                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Queries</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('QueryType.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Query Type List</span></a></li>
                        <li><a data-clipboard-text="fa fa-square" href="{{route('CustomerQuery.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Customer Query List</span></a></li>
                    </ul>
                </li>

                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Reply View</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('ReplyView.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Reply View List</span></a></li>
                    </ul>
                </li>
                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Comment Reply</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('BackEndCommentReply.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Comment Reply Page</span></a></li>
                    </ul>
                </li>
                @endif
                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Subscription</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('Subscription.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Subscription Page</span></a></li>
                    </ul>
                </li>
                @if(Auth::user()->user_role != 'operator')
                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Contact Us</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('ContactUs.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Contact Us List</span></a></li>
                    </ul>
                </li>
                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>About Us</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('AboutUs.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>About Us List</span></a></li>
                    </ul>
                </li>
                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Services</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('Services.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Services List</span></a></li>
                    </ul>
                </li>
                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Home Carousel</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('HomeCarousel.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Home Carousel List</span></a></li>
                    </ul>
                </li>
                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Agro Link</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('AgroLink.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Agro Link List</span></a></li>
                    </ul>
                </li>
                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Fashion Link</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('FashionLink.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Fashion Link List</span></a></li>
                    </ul>
                </li>
                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Luxury Link</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('LuxuryLink.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Luxury Link List</span></a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>

    </div><!-- Side Header Inner End -->
</div>
<!-- Side Header End -->
