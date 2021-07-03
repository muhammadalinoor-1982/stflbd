@extends('backend.backendlayout.master')
@section('content')
    <form method="post" action="{{route('LuxuryProduct.bulkproduct')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!--Form Size Start-->
            <div class="col-12 mb-30">
                <div class="box">
                    <div class="box-head">
                        <h3 class="title">Luxury Bulk Product Upload</h3>
                        <a title="Back to Mail Menu" class="edit button button-box button-xs button-info" href="{{ route('LuxuryProduct.view')}}"><i class="zmdi zmdi-mail-reply-all"></i></a>
                    </div>
                    <div class="col-12 mt-10"><button class="button button-primary button-outline"><a href="{{url('public/backend/BulkExampleFile/LuxuryBulk/LuxuryProduct.xlsx')}}">Download Sample file</a></button></div>
                    <div class="box-body">
                        <div class="row mbn-20">
                            <!--Small Field-2-->
                            <div class="col-lg-4 col-12 mb-20">
                                <div class="row mbn-15">
                                    <div class="col-12 mb-15"><input type="file" name="file" class="form-control form-control-sm"></div>
                                </div>
                            </div>
                            <!--Small Field-->
                        </div>
                    </div>
                </div>
            </div>
            <!--Form Size End-->
        </div>
        <div class="col-12 mt-10"><button class="button button-primary button-outline">Upload</button></div>
    </form>
@endsection