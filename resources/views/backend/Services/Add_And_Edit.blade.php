@extends('backend.backendlayout.master')
@section('content')
    <div class="row mbn-50">
        <div class="col-xlg-4 col-12 mb-50">
            <div class="row mbn-30">
                <form method="post" action="{{(@$editData)?route('Services.update',$editData->id):route('Services.store')}}">
                    <div class="row">
                        @csrf
                        @include('backend.backendlayout._form_Services')
                        <div class="col-12 mt-10"><button class="button button-primary button-outline">{{(@$editData)?"Update":"Submit"}}</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>












{{--    <div class="row">
        <!--Form Size Start-->
        <div class="login-register-form-wrap">
            <div class="content">
                <p>Services</p>
            </div>
            <div class="login-register-form">
                <form method="post" action="{{(@$editData)?route('Services.update',$editData->id):route('Services.store')}}">
                    <div class="row">
                        @csrf
                        @include('backend.backendlayout._form_Services')
                        <div class="col-12 mt-10"><button class="button button-primary button-outline">{{(@$editData)?"Update":"Submit"}}</button></div>
                    </div>
                </form>

            </div>
        </div>
        <!--Form Size End-->
    </div>--}}
@endsection
