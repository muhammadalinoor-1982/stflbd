@extends('backend.backendlayout.master')
@section('content')
    <div class="row">
        <!--Form Size Start-->
        <div class="login-register-form-wrap">
            <div class="content">
                <p>About Us</p>
            </div>
            <div class="login-register-form">
                <form method="post" action="{{(@$editData)?route('AboutUs.update',$editData->id):route('AboutUs.store')}}">
                    <div class="row">
                        @csrf
                        @include('backend.backendlayout._form_AboutUs')
                        <div class="col-12 mt-10"><button class="button button-primary button-outline">{{(@$editData)?"Update":"Submit"}}</button></div>
                    </div>
                </form>

            </div>
        </div>
        <!--Form Size End-->
    </div>
@endsection