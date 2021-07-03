@extends('frontend.frontendlayout.master')
@section('content')
    @php
        $subscriptions = App\Subscription::first();
        $contact_us = App\ContactUs::first();
    @endphp
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class="col-sm-12 col-xs-12">
                    <div class="col-main">
                        <div class="my-account">
                                <div class="page-title">
                                    <h2>Services</h2>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-xs-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Service Name: </strong></label>
                                                    <p>{{$services->service_name}}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Service Type: </strong></label>
                                                    <p>{{$services->service_type}}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Product Type: </strong></label>
                                                    <p>{{$services->product_type}}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Transport Type: </strong></label>
                                                    <p>{{$services->transport_type}}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Delivery Method: </strong></label>
                                                    <p>{{$services->delivery_method}}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Payment Method: </strong></label>
                                                    <p>{{$services->payment_method}}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Bulk Supply: </strong></label>
                                                    <p>{{$services->bulk_supply}}</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection