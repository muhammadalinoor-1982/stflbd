@extends('backend.backendlayout.master')
@section('content')
    <div class="row">
        <!--Form Size Start-->
        <div class="login-register-form-wrap">
            <div class="content">
                <p>Luxury Items</p>
            </div>
            <div class="login-register-form">
                <form method="post" action="{{(@$editData)?route('Luxury.update',$editData->id):route('Luxury.store')}}">
                    <div class="row">
                        @csrf
                        @include('backend.backendlayout._form_Luxury')
                        <div class="col-12 mt-10"><button class="button button-primary button-outline">{{(@$editData)?"Update":"Submit"}}</button></div>
                    </div>
                </form>

            </div>
        </div>
        <!--Form Size End-->
    </div>
@endsection