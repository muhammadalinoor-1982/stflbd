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
                                    <h2>Contact Us</h2>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-xs-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Name: </strong></label>
                                                    <span>{{$contact_us->name}}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Designation: </strong></label>
                                                    <span>{{$contact_us->designation}}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Email: </strong></label>
                                                    <span>{{$contact_us->email}}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Phone: </strong></label>
                                                    <span>{{$contact_us->phone}}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Address: </strong></label>
                                                    <span>{{$contact_us->address}}</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-xs-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Facebook: </strong></label>
                                                    <a href="{{$contact_us->facebook}}" target="_blank">{{$contact_us->facebook}}</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Instagram: </strong></label>
                                                    <a href="{{$contact_us->instagram}}" target="_blank">{{$contact_us->instagram}}</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Twitter: </strong></label>
                                                    <a href="{{$contact_us->twitter}}" target="_blank">{{$contact_us->twitter}}</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Linkedin: </strong></label>
                                                    <a href="{{$contact_us->linkedin}}" target="_blank">{{$contact_us->linkedin}}</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Youtube: </strong></label>
                                                    <a href="{{$contact_us->youtube}}" target="_blank">{{$contact_us->youtube}}</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Skype: </strong></label>
                                                    <a href="{{$contact_us->skype}}" target="_blank">{{$contact_us->skype}}</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Pinterest: </strong></label>
                                                    <a href="{{$contact_us->pinterest}}" target="_blank">{{$contact_us->pinterest}}</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="name"><strong>Google_plus: </strong></label>
                                                    <a href="{{$contact_us->google_plus}}" target="_blank">{{$contact_us->google_plus}}</a>
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