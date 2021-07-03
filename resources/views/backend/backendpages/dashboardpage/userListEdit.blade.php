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
                                    <form action="{{route('user.listUpdate', $user->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
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
                                            <div class="col-lg-12 col-12 mb-20">
                                                <div class="row mbn-15">
                                                    <div class="col-12 mb-15">
                                                        <textarea name="about_you" class="form-control form-control-sm @error('about_you') is-invalid @enderror" cols="100" rows="3" placeholder="Insert About You">{{$user->about_you}}</textarea>
                                                    </div>
                                                    @error('description')
                                                    <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20"><input type="text" class="form-control form-control-sm @error('nationality') is-invalid @enderror" name="nationality" value="{{$user->nationality}}" placeholder="Insert Nationality"></div>
                                            @error('nationality')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="col-12 mb-20"><input type="text" class="form-control form-control-sm @error('country') is-invalid @enderror" name="country" value="{{$user->country}}" placeholder="Insert Country"></div>
                                            @error('country')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                            @php
                                                if(old("gender")){
                                                    $gender = old('gender');
                                                }elseif (isset($user)){
                                                    $gender = $user->gender;
                                                }else{
                                                    $gender = null;
                                                }
                                            @endphp
                                            <div class="form-control form-control-sm @error('gender') is-invalid @enderror">
                                                <label class="adomx-radio"><input type="radio" @if($gender=='male') checked @endif name="gender" value="male" id="male"> <i class="icon"></i> Male</label><br>
                                                <label class="adomx-radio"><input type="radio" @if($gender=='female') checked @endif name="gender" value="female" id="female"> <i class="icon"></i> Female</label><br>
                                                <label class="adomx-radio"><input type="radio" @if($gender=='others') checked @endif name="gender" value="others" id="others"> <i class="icon"></i> Others</label>
                                            </div>
                                            @error('gender')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                            <br>
                                            @php
                                                if(old("business_type")){
                                                    $business_type = old('business_type');
                                                }elseif (isset($user)){
                                                    $business_type = $user->business_type;
                                                }else{
                                                    $business_type = null;
                                                }
                                            @endphp
                                            <div class="form-control form-control-sm @error('business_type') is-invalid @enderror">
                                                <label class="adomx-radio"><input type="radio" @if($business_type=='individual') checked @endif name="business_type" value="individual" id="individual"> <i class="icon"></i> Individual</label><br>
                                                <label class="adomx-radio"><input type="radio" @if($business_type=='company') checked @endif name="business_type" value="company" id="company"> <i class="icon"></i> Company</label><br>
                                                <label class="adomx-radio"><input type="radio" @if($business_type=='trading') checked @endif name="business_type" value="trading" id="trading"> <i class="icon"></i> Trading</label>
                                            </div>
                                            @error('business_type')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                            <br>
                                            @php
                                                if(old("is_verified")){
                                                    $is_verified = old('is_verified');
                                                }elseif (isset($user)){
                                                    $is_verified = $user->is_verified;
                                                }else{
                                                    $is_verified = null;
                                                }
                                            @endphp
                                            <div class="form-control form-control-sm @error('is_verified') is-invalid @enderror">
                                                <label class="adomx-radio"><input type="radio" @if($is_verified=='active') checked @endif name="is_verified" value="active" id="active"> <i class="icon"></i> Active</label><br>
                                                <label class="adomx-radio"><input type="radio" @if($is_verified=='inactive') checked @endif name="is_verified" value="inactive" id="inactive"> <i class="icon"></i> Inactive</label>
                                            </div>
                                            @error('is_verified')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                            <br>
                                            @php
                                                if(old("user_role")){
                                                    $user_role = old('user_role');
                                                }elseif (isset($user)){
                                                    $user_role = $user->user_role;
                                                }else{
                                                    $user_role = null;
                                                }
                                            @endphp
                                            <div class="form-control form-control-sm @error('user_role') is-invalid @enderror">
                                                <label class="adomx-radio"><input type="radio" @if($user_role=='admin') checked @endif name="user_role" value="admin" id="admin"> <i class="icon"></i> Admin</label><br>
                                                <label class="adomx-radio"><input type="radio" @if($user_role=='supervisor') checked @endif name="user_role" value="supervisor" id="supervisor"> <i class="icon"></i> Supervisor</label><br>
                                                <label class="adomx-radio"><input type="radio" @if($user_role=='operator') checked @endif name="user_role" value="operator" id="operator"> <i class="icon"></i> Operator</label><br>
                                                <label class="adomx-radio"><input type="radio" @if($user_role=='customer') checked @endif name="user_role" value="customer" id="customer"> <i class="icon"></i> Customer</label><br>
                                            </div>
                                            @error('user_role')
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
                                                {{--<div class="col-12 mt-10"><button class="button button-primary button-outline">Update</button></div>--}}
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
@endsection
