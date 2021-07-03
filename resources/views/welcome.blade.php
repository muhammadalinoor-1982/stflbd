@extends('frontend.frontendlayout.master')
@section('content')
    @php
        $subscriptions = App\Subscription::first();
        $contact_us = App\ContactUs::first();
        $home_carousels = App\HomeCarousel::all();
        $agro = App\AgroLink::first();
        $fashion = App\FashionLink::first();
        $luxury = App\LuxuryLink::first();
    @endphp
    <!-- Revslider -->
    <div class="container jtv-home-revslider">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12 jtv-main-home-slider">
                <div id='rev_slider_1_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
                    <div id='rev_slider_1' class='rev_slider fullwidthabanner'>
                        <ul>
                            @foreach($home_carousels as $carousel)
                                @if($carousel->status == 'active')
                                <li data-transition='slotzoom-horizontal' data-slotamount='7' data-masterspeed='1000' data-thumb='images/slider/slide-img1.jpg'><img src="{{asset('public/backend/images/HomeCarousel_images/'.$carousel->image)}}" alt="slider image1" data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat'  />
                                    <div class="info">
                                        <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='0'  data-y='165'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2;white-space:nowrap;'><span>{{$carousel->description}}</span></div>
                                        <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='0'  data-y='220'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;white-space:nowrap;'>{{$carousel->heading}}</div>
                                        <div class='tp-caption sfb  tp-resizeme ' data-x='0'  data-y='350'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'><a href='{{$carousel->link}}' class="buy-btn">Go for All</a></div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Container -->
    <section class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <!-- Latest Blog -->
                    <div class="jtv-latest-blog">
                        <div class="jtv-new-title">
                            <h2>All Products</h2>
                        </div>
                        <div class="row">
                            <div class="blog-outer-container">
                                <div class="blog-inner">
                                    @if($agro->status == 'active')
                                    <div class="col-xs-12 col-sm-4 blog-preview_item">
                                        <div class="entry-thumb jtv-blog-img-hover"> <a href="{{$agro->link}}"> <img alt="Blog" src="{{asset('public/backend/images/AgroLink_images/'.$agro->image)}}"> </a> </div>
                                        <h4 class="blog-preview_title"><a href="{{$agro->link}}"><strong>{{$agro->heading}}</strong></a></h4>
                                        <div class="blog-preview_info">
                                            <div class="blog-preview_desc">{{$agro->description}} <a class="read_btn" href="{{$agro->link}}"><strong> Go to All Products</strong></a></div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($fashion->status == 'active')
                                    <div class="col-xs-12 col-sm-4 blog-preview_item">
                                        <div class="entry-thumb jtv-blog-img-hover"> <a href="{{$fashion->link}}"> <img alt="Blog" src="{{asset('public/backend/images/FashionLink_images/'.$fashion->image)}}"> </a> </div>
                                        <h4 class="blog-preview_title"><a href="{{$fashion->link}}"><strong>{{$fashion->heading}}</strong></a></h4>
                                        <div class="blog-preview_info">
                                            <div class="blog-preview_desc">{{$fashion->description}} <a class="read_btn" href="{{$fashion->link}}"><strong> Go to All Products</strong></a></div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($luxury->status == 'active')
                                    <div class="col-xs-12 col-sm-4 blog-preview_item">
                                        <div class="entry-thumb jtv-blog-img-hover"> <a href="{{$luxury->link}}"> <img alt="Blog" src="{{asset('public/backend/images/LuxuryLink_images/'.$luxury->image)}}"> </a> </div>
                                        <h4 class="blog-preview_title"><a href="{{$luxury->link}}"><strong>{{$luxury->heading}}</strong></a></h4>
                                        <div class="blog-preview_info">
                                            <div class="blog-preview_desc">{{$luxury->description}} <a class="read_btn" href="{{$luxury->link}}"><strong> Go to All Products</strong></a></div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Latest Blog -->
                </div>
            </div>
        </div>
    </section>
    <!-- Collection Banner -->
@endsection

{{--@extends('backend.backendlayout.loginlayout.master')
@section('content')
            <div class="login-register-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="row justify-content-between">

                                @if (Route::has('login'))
                                    <div class="top-right links">
                                        @auth
                                            <a href="{{ url('/home') }}">Home</a>
                                        @else
                                            <div class="col-auto mb-15">Already have account? <a href="{{ route('login') }}">Login Now</a></div>

                                            @if (Route::has('register'))
                                                <div class="col-12 mt-10"><a href="{{ route('register') }}">sign up</a></div>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>

@endsection--}}

{{--<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>

        <div class="links">
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </div>
</div>
</body>
</html>--}}
