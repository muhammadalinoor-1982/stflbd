@extends('backend.backendlayout.master')
@section('content')
        <div class="row mbn-50">

            <!--Author Top Start-->
            <div class="col-12 mb-50">
                <div class="author-top">
                    <div class="inner">
                        <div class="author-profile">
                            <div class="image">
                                <img src="{{(!empty($user->image))?url('public/backend/images/user_images/'.$user->image):url('public/backend/images/user_images/no_image.png')}}" >
                                {{--<img src="{{ asset('public/backend/images/user_images/'.$user['image'])}}" class="d-none" alt="">--}}
                                {{--<h2>MH</h2>
                                <button class="edit"><i class="zmdi zmdi-cloud-upload"></i>Change Image</button>--}}
                            </div>
                            <div class="info">
                                <h5>{{$user['email']}}</h5>
                                <span>{{$user['user_role']}}</span>
                                {{--<a href="#" class="edit"><i class="zmdi zmdi-edit"></i></a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Author Top End-->

            <!-- Recent Transaction Start -->
            <div class="col-12 mb-30">
                <div class="box">
                    <div class="box-head">
                        <h4 class="title">{{$user['name']}}'s Profile</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-vertical-middle table-selectable">

                                <!-- Table Head Start -->
                                <thead>
                                <tr>
                                    <th><span>Image</span></th>
                                    <th><span>Name</span></th>
                                    <th><span>Email</span></th>
                                    <th><span>Phone</span></th>
                                    <th><span>NID</span></th>
                                    <th><span>Address</span></th>
                                    <th><span>Status</span></th>
                                    <th><span>Action</span></th>
                                    <th></th>
                                </tr>
                                </thead><!-- Table Head End -->

                                <!-- Table Body Start -->
                                <tbody>
                                <tr>
                                    <td><img src="{{(!empty($user->image))?url('public/backend/images/user_images/'.$user->image):url('public/backend/images/user_images/no_image.png')}}" alt="" class="table-product-image rounded-circle"></td>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{$user['user_phone']}}</td>
                                    <td>{{$user['user_nid']}}</td>
                                    <td>{{$user['user_address']}}</td>
                                    <td><span class="badge badge-success">{{$user['is_verified']}}</span></td>
                                    <td>
                                        <div class="table-action-buttons">
                                            <a title="Edit" class="edit button button-box button-xs button-info" href="{{ route('user.edit') }}"><i class="zmdi zmdi-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                </tbody><!-- Table Body End -->

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript">
        document.title = '{{$user['name']}}s Profile';
    </script>
@endsection


