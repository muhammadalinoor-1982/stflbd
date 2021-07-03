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
                                    <h2>About Us</h2>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-xs-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Company Name: </strong></label>
                                                    <span>{{$about_us->Company_name}}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Owner Speech: </strong></label>
                                                    <p>{{$about_us->owner_speech}}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>History: </strong></label>
                                                    <p>{{$about_us->History}}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Why Us: </strong></label>
                                                    <span>{{$about_us->why_us}}</span>
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