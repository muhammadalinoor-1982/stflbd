@extends('backend.backendlayout.master')
@section('content')
    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">About Us List</h3>
                </div>
                <div class="box-body">
                    <a href="{{route('AboutUs.create')}}" class="btn btn-sm btn-primary">Add New</a>
                    <table class="table table-bordered data-table data-table-export">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Company Name</th>
                            <th>Owner Speech</th>
                            <th>History</th>
                            <th>Why Us</th>
                            <th>Creator</th>
                            <th>Updater</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($about_us as $about)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{$about->Company_name}}</td>
                                <td>{{$about->owner_speech}}</td>
                                <td>{{$about->History}}</td>
                                <td>{{$about->why_us}}</td>
                                <td>{{$about->creator}}</td>
                                <td>{{$about->updater}}</td>
                                <td>
                                    @if($about->status == 'active')
                                        <span class="badge badge-success" title="user active">Active</span>
                                    @else
                                        <span class="badge badge-danger" title="user inactive">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-1 offset-1">
                                            <a title="Edit" class="edit button button-box button-xs button-info" href="{{ route('AboutUs.edit',$about->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                        </div>
                                        <form  action="{{ route('AboutUs.destroy',$about->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="col-1 offset-2">
                                                <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this About')"><i class="zmdi zmdi-delete"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL#</th>
                            <th>Company Name</th>
                            <th>Owner Speech</th>
                            <th>History</th>
                            <th>Why Us</th>
                            <th>Creator</th>
                            <th>Updater</th>
                            <th>Status</th>
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
