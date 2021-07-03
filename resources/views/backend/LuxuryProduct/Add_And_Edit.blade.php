@extends('backend.backendlayout.master')
@section('content')
    <form method="post" action="{{(@$editData)?route('LuxuryProduct.update',$editData->id):route('LuxuryProduct.store')}}" enctype="multipart/form-data">
        @csrf
        @include('backend.backendlayout._form_LuxuryProduct')
        <div class="col-12 mt-10"><button class="button button-primary button-outline">{{(@$editData)?"Update":"Submit"}}</button></div>
    </form>
@endsection