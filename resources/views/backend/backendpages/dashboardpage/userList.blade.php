@extends('backend.backendlayout.master')
@section('content')
        <div class="row">

            <!--Export Data Table Start-->
            <div class="col-12 mb-30">
                <div class="box">
                    <div class="box-head">
                        <h3 class="title">Exportable User Table</h3>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered data-table data-table-export">
                            <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Image</th>
                                <th>STFL ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $serial++ }}</td>
                                    <td width="20%"><img src="{{(!empty($user->image))?url('public/backend/images/user_images/'.$user->image):url('public/backend/images/user_images/no_image.png')}}"  alt="" class="product-image rounded-circle" width="20%"></td>
                                    <td>{{$user->custom_id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->user_phone}}</td>
                                    <td>
                                @if($user->is_verified == 'active')
                                        <span class="badge badge-success" title="user active">Active</span>
                                @else
                                        <span class="badge badge-danger" title="user inactive">Inactive</span>
                                    @endif
                                    </td>
                                    <td>{{$user->user_role}}</td>
                                    <td>

                                        {{--@if($user->is_verified == 'active')
                                        <div class="col-2 offset-1">
                                        <a title="Active" class="view button button-box button-xs button-primary" href="{{ route('user.active',$user->id) }}"><i class="zmdi zmdi-more"></i></a>
                                        </div>
                                        @else
                                        <div class="col-2 offset-2">
                                        <a title="Inactive" class="view button button-box button-xs button-primary" href="{{ route('user.inactive',$user->id) }}"><i class="zmdi zmdi-more"></i></a>
                                        </div>
                                        @endif--}}
                                        <div class="row">
                                            <div class="col-1 offset-1">
                                                <a title="Details" class="view button button-box button-xs button-primary" href="{{ route('user.listDetails',$user->id) }}"><i class="zmdi zmdi-more"></i></a>
                                            </div>
                                        @if($user->deleted_at == null)
                                                <div class="col-1 offset-2">
                                                <a title="Edit" class="edit button button-box button-xs button-info" href="{{ route('user.listEdit',$user->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                                </div>
                                            <form  action="{{ route('user.destroy',$user->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="col-1 offset-3">
                                                <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this user')"><i class="zmdi zmdi-delete"></i></button>
                                                </div>
                                            </form>
                                        @else
                                            <form  action="{{ route('user.restore',$user->id) }}" method="post">
                                                @csrf
                                                <div class="col-1 offset-4">
                                                <button title="Restore" class="edit button button-box button-xs button-info" onclick="return confirm('Are you confirm to restore this user')"><i class="zmdi zmdi-time-restore"></i></button>
                                                </div>
                                            </form>
                                            <form  action="{{ route('user.force_delete',$user->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="col-1 offset-5">
                                                <button title="Permanent Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to permanently delete this user')"><i class="zmdi zmdi-close-circle"></i></button>
                                                </div>
                                            </form>
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>SL#</th>
                                <th>Image</th>
                                <th>STFL ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!--Export Data Table End-->
        </div>
@endsection

