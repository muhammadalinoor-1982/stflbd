@extends('backend.backendlayout.master')
@section('content')
    <div class="row">
        <!--Form Size Start-->
        <div class="login-register-form-wrap">
            <div class="content">
                <p>Query Type Name</p>
            </div>
            <div class="login-register-form">
                <form method="post" action="{{(@$editData)?route('QueryType.update',$editData->id):route('QueryType.store')}}">
                    <div class="row">
                        @csrf
                        @include('frontend.frontendlayout._form_QueryType')
                        <div class="col-12 mt-10"><button class="button button-primary button-outline">{{(@$editData)?"Update":"Submit"}}</button></div>
                    </div>
                </form>

            </div>
        </div>
        <!--Form Size End-->
    </div>
@endsection