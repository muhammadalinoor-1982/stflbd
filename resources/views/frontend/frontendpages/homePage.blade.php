@extends('frontend.frontendlayout.master')
@section('content')
    @php
        $subscriptions = App\Subscription::first();
        $home_carousels = App\HomeCarousel::all();
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
