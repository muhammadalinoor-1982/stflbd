@extends('backend.backendlayout.master')
@section('content')
    <div class="row mbn-30">

        <!--Order Details Head Start-->
        <div class="col-12 mb-30">
            <a title="Back to Mail Menu" class="edit button button-box button-xs button-info" href="{{ route('user.userList')}}"><i class="zmdi zmdi-mail-reply-all"></i></a>
            <div class="row mbn-15">
                <div class="col-12 col-md-4 mb-15">
                    <h4 class="text-primary fw-600 m-0">{{ $user->custom_id }}</h4>
                </div>
                <div class="col-12 col-md-4 mb-15">
                    <h4 class="text-primary fw-600 m-0">{{ $user->name}}</h4>
                </div>
                @if($user->is_verified == 'active')
                    <div class="text-left text-md-center col-12 col-md-4 mb-15"><span>Status: <span class="badge badge-round badge-success">Active</span></span></div>
                @else
                    <div class="text-left text-md-center col-12 col-md-4 mb-15"><span>Status: <span class="badge badge-round badge-danger">Inactive</span></span></div>
                @endif
            </div>
        </div>
        <!--Order Details Head End-->

        <!--Order Details Customer Information Start-->
        <div class="col-12 mb-30">
            <div class="order-details-customer-info row mbn-20">

                <!--Billing Info Start-->
                <div class="col-lg-4 col-md-6 col-12 mb-20">
                    <h4 class="mb-25">{{ $user->name }}</h4>
                    <ul>
                        <li> <span>Image</span> <span><img src="{{(@$user->image)?url('public/backend/images/user_images/'.$user->image):url('public/backend/images/user_images/noimage.jpg')}}"  alt="" class="product-image rounded-circle" width="50%"></span> </li>
                        <li> <span>Email</span> <span>{{ $user->email }}</span> </li>
                        <li> <span>Phone</span> <span>{{ $user->user_phone }}</span> </li>
                        <li> <span>NID</span> <span>{{ $user->user_nid }}</span> </li>
                        <li> <span>Address</span> <span>{{ $user->user_address }}</span> </li>
                        <li> <span>About You</span> <span>{{ $user->about_you }}</span> </li>
                        <li> <span>Nationality</span> <span>{{ $user->nationality }}</span> </li>
                        <li> <span>Country</span> <span>{{ $user->country }}</span> </li>
                        <li> <span>Business Type</span> <span>{{ $user->business_type }}</span> </li>
                        <li> <span>Gender</span> <span>{{ $user->gender }}</span> </li>
                        <li> <span>User Role</span> <span>{{ $user->user_role }}</span> </li>
                        <li> <span>Creator</span> <span>{{(@$user->creator)?$user->creator:"" }}</span> </li>
                        <li> <span>Updater</span> <span>{{(@$user->updater)?$user->updater:"" }}</span> </li>
                    </ul>
                </div>
                <!--Billing Info End-->
            </div>
        </div>
    </div>
@endsection