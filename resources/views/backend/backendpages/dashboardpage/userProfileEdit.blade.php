@extends('backend.backendlayout.master')
@section('content')
        <div class="row mbn-50">

            <!--Right Sidebar Start-->
            <div class="col-xlg-4 col-12 mb-50">
                <div class="row mbn-30">

                    <!--Author Information Start-->
                    <div class="col-xlg-12 col-lg-12 col-12 mb-30">
                        <div class="box">
                            <div class="box-head">
                                <h3 class="title">{{$user['name']}}'s profile update</h3>
                            </div>
                            <div class="box-body">
                                <div class="form">
                                    <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row row-10 mbn-20">
                                            <div class="col-12 mb-20"><input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" placeholder="Insert Name"></div>
                                            @error('name')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="col-12 mb-20"><input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" placeholder="Insert Email"></div>
                                            @error('email')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="col-12 mb-20"><input type="text" class="form-control form-control-sm @error('user_phone') is-invalid @enderror" name="user_phone" value="{{$user->user_phone}}" placeholder="Insert Phone Number"></div>
                                            @error('user_phone')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="col-12 mb-20"><input type="text" class="form-control form-control-sm @error('user_nid') is-invalid @enderror" name="user_nid" value="{{$user->user_nid}}" placeholder="Insert NID"></div>
                                            @error('user_nid')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="col-12 mb-20"><input type="text" class="form-control form-control-sm @error('user_address') is-invalid @enderror" name="user_address" value="{{$user->user_address}}" placeholder="Insert Address"></div>
                                            @error('user_address')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <img id="showImage" src="{{(!empty($user->image))?url('public/backend/images/user_images/'.$user->image):url('public/backend/images/user_images/noimage.jpg')}}" width="30%">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-15"><input name="image" class="form-control form-control-sm @error('image') is-invalid @enderror" type="file" placeholder="Insert Your Image">
                                            <p style="color: #828282">Preferable image dimension should be 700pix X 700pix.</p>
                                            </div>
                                            @error('image')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="col-12 mt-10 mb-20">
                                                <input type="submit" class="button button-primary button-outline" value="Save Changes">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Author Information End-->
                </div>
            </div>
            <!--Right Sidebar End-->
        </div>
    <script type="text/javascript">
        document.title = '{{$user['name']}}s Profile update';
    </script>
@endsection



