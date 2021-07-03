@extends('backend.backendlayout.master')
@section('content')
    @php
    $agro_products = App\AgroProduct::all();
    $fashion_products = App\FashionProduct::all();
    $luxury_products = App\LuxuryProduct::all();
    $home_carousels = App\HomeCarousel::all();
    $customer_queries = App\CustomerQuery::all();
    $comment_replies = App\CommentReply::all();
    $subscriptions = App\Subscription::all();
    $users = App\User::all();
    @endphp
        <!-- Top Report Wrap Start -->
        <div class="row">
            <!-- Top Report Start -->
            <div class="col-xlg-3 col-md-6 col-12 mb-30">
                <div style="background-image: linear-gradient(to right, #000000 , #0f3e68);" class="top-report">

                    <!-- Head -->
                    <div class="head">
                        <h4>Agro Products</h4>
                        <a title="All Agro Products" href="{{route('AgroProduct.view')}}" class="view"><i style="color: white;" class="zmdi zmdi-eye"></i></a>
                    </div>

                    <!-- Content -->
                    <div class="content">
                        <h5>Total Products</h5>
                        <h2>{{$agro_products->count()}}</h2>
                    </div>

                </div>
            </div>
            <!-- Top Report End -->

            <!-- Top Report Start -->
            <div class="col-xlg-3 col-md-6 col-12 mb-30">
                <div style="background-image: linear-gradient(to right, #000000 , #941a07);" class="top-report">

                    <!-- Head -->
                    <div class="head">
                        <h4>Fashion Products</h4>
                        <a title="All Fashion Products" href="{{route('FashionProduct.view')}}" class="view"><i style="color: white;" class="zmdi zmdi-eye"></i></a>
                    </div>

                    <!-- Content -->
                    <div class="content">
                        <h5>Total Products</h5>
                        <h2>{{$fashion_products->count()}}</h2>
                    </div>

                </div>
            </div>
            <!-- Top Report End -->
        </div>
        <div class="row">
            <!-- Top Report Start -->
            <div class="col-xlg-3 col-md-6 col-12 mb-30">
                <div style="background-image: linear-gradient(to right, #000000 , #148f1a);" class="top-report">

                    <!-- Head -->
                    <div class="head">
                        <h4>Luxury Products</h4>
                        <a title="All Luxury Products" href="{{route('LuxuryProduct.view')}}" class="view"><i style="color: white;" class="zmdi zmdi-eye"></i></a>
                    </div>

                    <!-- Content -->
                    <div class="content">
                        <h5>Total Products</h5>
                        <h2>{{$luxury_products->count()}}</h2>
                    </div>

                </div>
            </div>
            <!-- Top Report End -->

            <!-- Top Report Start -->
            <div class="col-xlg-3 col-md-6 col-12 mb-30">
                <div style="background-image: linear-gradient(to right, #000000 , #8c0759);" class="top-report">

                    <!-- Head -->
                    <div class="head">
                        <h4>Home Carousel</h4>
                        <a title="All Home Carousel" href="{{route('HomeCarousel.view')}}" class="view"><i style="color: white" class="zmdi zmdi-eye"></i></a>
                    </div>

                    <!-- Content -->
                    <div class="content">
                        <h5>Total Home Carousel</h5>
                        <h2>{{$home_carousels->count()}}</h2>
                    </div>

                </div>
            </div>
            <!-- Top Report End -->
        </div>
    <div class="row">
        <!-- Top Report Start -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div style="background-image: linear-gradient(to right, #000000 , #a0ab0a);" class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Customer Query</h4>
                    <a title="All Customer Query" href="{{route('BackEndCommentReply.view')}}" class="view"><i style="color: white;" class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <h5>Total Query</h5>
                    <h2>{{$customer_queries->count()}}</h2>
                </div>

            </div>
        </div>
        <!-- Top Report End -->

        <!-- Top Report Start -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div style="background-image: linear-gradient(to right, #000000 , #a10e1a);" class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Reply on customer query</h4>
                    <a title="All Reply" href="{{route('ReplyView.view')}}" class="view"><i style="color: white" class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <h5>Total Reply</h5>
                    <h2>{{$comment_replies->count()}}</h2>
                </div>

            </div>
        </div>
        <!-- Top Report End -->
    </div>
    <div class="row">
        <!-- Top Report Start -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div style="background-image: linear-gradient(to right, #000000 , #680573);" class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Customer Subscriptions</h4>
                    <a title="All Subscriptions" href="{{route('Subscription.view')}}" class="view"><i style="color: white;" class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <h5>Total Subscriptions</h5>
                    <h2>{{$subscriptions->count()}}</h2>
                </div>

            </div>
        </div>
        <!-- Top Report End -->

        <!-- Top Report Start -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div style="background-image: linear-gradient(to right, #000000 , #0e0e8c);" class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Users</h4>
                    <a title="All Users" href="{{route('user.userList')}}" class="view"><i style="color: white;" class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <h5>Total User</h5>
                    <h2>{{$users->count()}}</h2>
                </div>

            </div>
        </div>
        <!-- Top Report End -->
    </div>
        <!-- Top Report Wrap End -->

        {{--<div class="row mbn-30">
            <!-- Top Selling Country Start -->
            <div class="col-xlg-7 col-12 mb-30">
                <div class="box">
                    <div class="box-head">
                        <h4 class="title">Top Selling Country</h4>
                    </div>
                    <div class="box-body">
                        <div id="vmap-world-2" class="vmap vmap-world-2"></div>
                    </div>
                </div>
            </div>
            <!-- Top Selling Country End -->
        </div>--}}
@endsection
