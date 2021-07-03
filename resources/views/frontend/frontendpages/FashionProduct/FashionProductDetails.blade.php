@extends('frontend.frontendlayout.master')
@section('content')
    @php
        $subscriptions = App\Subscription::first();
        $contact_us = App\ContactUs::first();
    $home_carousels = App\HomeCarousel::all();
    @endphp

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

    <section class="main-container col1-layout">
        <div class="container">
            <div class="row">
                <div class="product-view">
                    <div class="product-essential">
                        @if($fashion->status == 'active' && $fashion->deleted_at == null)
                        <form action="#" method="post" id="product_addtocart_form">
                            <div class="product-img-box col-lg-4 col-sm-5 col-xs-12">
                                <div class="product-image">
                                    <div class="product-full">
                                        <img id="product-zoom" src="{{(@$fashion->image)?asset('public/backend/images/Fashion_images/'.$fashion->image):asset('public/backend/images/Fashion_images/noimage.jpg')}}" data-zoom-image="{{(@$fashion->image)?asset('public/backend/images/Fashion_images/'.$fashion->image):asset('public/backend/images/Fashion_images/noimage.jpg')}}" alt="{{asset('public/backend/images/Fashion_images/'.$fashion->image)}}"/> </div>
                                </div>
                                <!-- end: more-images -->
                            </div>
                            <div class="product-shop col-lg-8 col-sm-7 col-xs-12">
                                <div class="product-name">
                                    <h1>Name: {{$fashion->name}}</h1>
                                </div>
                                <div class="rating"><span>Type: {{$fashion['fashion']['name']}}</span></div>
                                <div class="price-block">
                                    <div class="price-box">
                                        <p class="special-price"> <span class="price-label">Special Price</span><span class="price">Special Price: {{(@$fashion->special_prise)?$fashion->special_prise:""}}</span></p>
                                        <p class="old-price"> <span class="price-label">Regular Price:</span><span class="price">Regular Price: {{(@$fashion->regular_prise)?$fashion->regular_prise:""}}</span></p>
                                        <div class="rating"><span>Discount Prise: {{(@$fashion->discount_prise)?$fashion->discount_prise:""}}</span></div>
                                        <br>
                                        <div class="rating"><span>Bulk Prise: {{(@$fashion->bulk_prise)?$fashion->bulk_prise:""}}</span></div>
                                        <br>
                                        <p class="availability in-stock">
                                            @if($fashion->quantity != 0)
                                            <span>In Stock</span>
                                            @else
                                                <span style="background-color: red">out of Stock</span>
                                            @endif
                                        </p>
                                        <div class="rating"><span>Size: {{(@$fashion->size)?$fashion->size:""}}</span></div>
                                        <div class="rating"><span>Color: {{(@$fashion->color)?$fashion->color:""}}</span></div>
                                        <div class="rating"><span>Production Lead Time: {{(@$fashion->production_lead_time)?$fashion->production_lead_time:""}}</span></div>
                                        <div class="rating"><span>Delivery Lead Time: {{(@$fashion->delivery_lead_time)?$fashion->delivery_lead_time:""}}</span></div>
                                    </div>
                                </div>
                                <div class="short-description">
                                    <h2>Product Description</h2>
                                    <p>{{$fashion->description}}</p>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <!-- Latest Blog -->
                    <div class="jtv-latest-blog">
                        <div class="jtv-new-title">
                            <h2>Fashion Product</h2>
                        </div>
                        <div class="row">
                            <div class="blog-outer-container">
                                <div class="blog-inner">
                                    @foreach($fashion_products as $fashion)
                                        @if($fashion->status == 'active' && $fashion->deleted_at == null)
                                        <div class="col-xs-12 col-sm-4 blog-preview_item">
                                            <div class="entry-thumb jtv-blog-img-hover"> <a href="{{route('FashionProducts.view')}}"> <img alt="Blog" src="{{(@$fashion->image)?asset('public/backend/images/Fashion_images/'.$fashion->image):asset('public/backend/images/Fashion_images/noimage.jpg')}}"> </a> </div>
                                            <h4 class="blog-preview_title"><a href="{{route('FashionProducts.view')}}">{{$fashion->name}}</a></h4>
                                            <div class="blog-preview_info">
                                                <ul class="post-meta">
                                                    <li><a href="{{route('FashionProducts.view')}}">{{$fashion['fashion']['name']}}</a></li>
                                                    <li><i class="fa fa-clock-o"></i><span>{{(@$fashion->updated_at)?$fashion->updated_at:$fashion->created_at}}</span></li>
                                                </ul>
                                                <div class="blog-preview_desc">{{$fashion->description}}<a class="read_btn" href="{{route('FashionProducts.details',$fashion->id)}}"><strong> View Details</strong></a></div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Latest Blog -->
                </div>
            </div>
        </div>
    </section>
@endsection