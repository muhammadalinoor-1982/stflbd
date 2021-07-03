@extends('backend.backendlayout.master')
@section('content')
    <form method="post" action="{{(@$editData)?route('FashionProduct.update',$editData->id):route('FashionProduct.store')}}" enctype="multipart/form-data">
        @csrf
        @include('backend.backendlayout._form_FashionProduct')
        <div class="col-12 mt-10"><button class="button button-primary button-outline">{{(@$editData)?"Update":"Submit"}}</button></div>
    </form>
@endsection