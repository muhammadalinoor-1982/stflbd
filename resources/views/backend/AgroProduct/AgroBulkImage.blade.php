@extends('backend.backendlayout.master')
@section('content')
    <form method="post" action="{{route('AgroProduct.multipleimage')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!--Form Size Start-->
            <div class="col-12 mb-30">
                <div class="box">
                    <div class="box-head">
                        <h3 class="title">Agro multiple image Upload</h3>
                        <a title="Back to Mail Menu" class="edit button button-box button-xs button-info" href="{{ route('AgroProduct.view')}}"><i class="zmdi zmdi-mail-reply-all"></i></a>
                    </div>
                    <div class="box-body">
                        <div class="row mbn-20">
                            <!--Small Field-2-->
                            <div class="col-lg-4 col-12 mb-20">
                                <div class="row mbn-15">
                                    <div class="col-12 mb-15"><input id="file-input" type="file" name="image[]" multiple class="form-control form-control-sm"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6" id="preview"></div>
                                </div>
                            </div>
                            <!--Small Field-->
                        </div>
                    </div>
                </div>
            </div>
            <!--Form Size End-->
        </div>
        <div class="col-12 mt-10"><button class="button button-primary button-outline">Upload multiple image</button></div>
    </form>
@endsection