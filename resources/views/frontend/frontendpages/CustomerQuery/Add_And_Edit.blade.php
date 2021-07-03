@extends('backend.backendlayout.master')
@section('content')
    @php
        $subscriptions = App\Subscription::first();
        $contact_us = App\ContactUs::first();
        $home_carousels = App\HomeCarousel::all();
    @endphp
    <form method="post" action="{{(@$editData)?route('CustomerQuery.update',$editData->id):route('CustomerQuery.store')}}" enctype="multipart/form-data">
        @csrf
        @include('frontend.frontendlayout._form_CustomerQuery')
        <div class="col-12 mt-10"><button class="button button-primary button-outline">{{(@$editData)?"Update":"Submit"}}</button></div>
    </form>
@endsection