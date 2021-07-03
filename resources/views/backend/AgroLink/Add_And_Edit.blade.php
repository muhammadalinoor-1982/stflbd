@extends('backend.backendlayout.master')
@section('content')
    <div class="row">
        <!--Form Size Start-->
        <div class="login-register-form-wrap">
            <div class="content">
                <p>Agro Link</p>
            </div>
            <div class="login-register-form">
                <form method="post" action="{{(@$editData)?route('AgroLink.update',$editData->id):route('AgroLink.store')}}" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        @include('backend.backendlayout._form_AgroLink')
                        <div class="col-12 mt-10"><button class="button button-primary button-outline">{{(@$editData)?"Update":"Submit"}}</button></div>
                    </div>
                </form>

            </div>
        </div>
        <!--Form Size End-->
    </div>
@endsection