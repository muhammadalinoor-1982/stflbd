@extends('frontend.frontendlayout.master')
@section('content')
    @php
        $subscriptions = App\Subscription::first();
        $contact_us = App\ContactUs::first();
    @endphp

    <div class="container jtv-home-revslider">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12 jtv-main-home-slider">
                <div id='rev_slider_1_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
                    <div id='rev_slider_1' class='rev_slider fullwidthabanner'>
                        <ul>
                            @foreach($agro_products as $agro)
                            @if($agro->status == 'active' && $agro->deleted_at == null)
                            <li data-transition='slotzoom-horizontal' data-slotamount='7' data-masterspeed='1000' data-thumb='images/slider/slide-img1.jpg'><img src='{{asset('public/backend/images/Agro_images/'.$agro->image)}}' alt="slider image1" data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat'  />
                                <div class="info">
                                    <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='0'  data-y='165'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2;white-space:nowrap;'><span>{{$agro->description}}</span></div>
                                    <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='0'  data-y='220'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;white-space:nowrap;'>{{$agro->name}}</div>
                                    <div class='tp-caption sfb  tp-resizeme ' data-x='0'  data-y='350'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'><a href='{{route('AgroProducts.details',$agro->id)}}' class="buy-btn">Go for Details</a></div>
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

    <section class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <!-- Latest Blog -->
                    <div class="jtv-latest-blog">
                        <div class="jtv-new-title">
                            <h2>Agro Product</h2>
                        </div>
                        <div class="row">
                            <div class="blog-outer-container">
                                <div class="blog-inner">
                                    @foreach($agro_products as $agro)
                                        @if($agro->status == 'active' && $agro->deleted_at == null)
                                    <div class="col-xs-12 col-sm-4 blog-preview_item">
                                        <div class="entry-thumb jtv-blog-img-hover"> <a href="{{route('AgroProducts.details',$agro->id)}}"> <img alt="Blog" src="{{(@$agro->image)?asset('public/backend/images/Agro_images/'.$agro->image):asset('public/backend/images/Agro_images/noimage.jpg')}}"> </a> </div>
                                        <h4 class="blog-preview_title"><a href="{{route('AgroProducts.details',$agro->id)}}">{{$agro->name}}</a></h4>
                                        <div class="blog-preview_info">
                                            <ul class="post-meta">
                                                <li><a href="{{route('AgroProducts.details',$agro->id)}}">{{$agro['agro']['name']}}</a></li>
                                                <li><i class="fa fa-clock-o"></i><span>{{(@$agro->updated_at)?$agro->updated_at:$agro->created_at}}</span></li>
                                            </ul>
                                            <div class="blog-preview_desc">{{$agro->description}}<a class="read_btn" href="{{route('AgroProducts.details',$agro->id)}}"><strong> View Details</strong></a></div>
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