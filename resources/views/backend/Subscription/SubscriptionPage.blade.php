@extends('backend.backendlayout.master')
@section('content')
    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Subscription List</h3>
                </div>
                <div class="box-body">
                    <a href="{{route('Subscription.create')}}" class="btn btn-sm btn-primary">Add New</a>
                    <table class="table table-bordered data-table data-table-export">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Email</th>
                            <th>Heading</th>
                            <th>Dialogue</th>
                            <th>Creator</th>
                            <th>Updater</th>
                            <th>Status</th>
                            @if(Auth::user()->user_role != 'operator')
                            <th>Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscriptions as $subscription)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{$subscription->email}}</td>
                                <td>{{$subscription->heading}}</td>
                                <td>{{$subscription->dialogue}}</td>
                                <td>{{$subscription->creator}}</td>
                                <td>{{$subscription->updater}}</td>
                                <td>
                                    @if($subscription->status == 'active')
                                        <span class="badge badge-success" title="user active">Active</span>
                                    @else
                                        <span class="badge badge-danger" title="user inactive">Inactive</span>
                                    @endif
                                </td>
                                @if(Auth::user()->user_role != 'operator')
                                <td>
                                    <div class="row">
                                            <div class="col-1 offset-1">
                                                <a title="Edit" class="edit button button-box button-xs button-info" href="{{ route('Subscription.edit',$subscription->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                            </div>
                                            <form  action="{{ route('Subscription.destroy',$subscription->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="col-1 offset-2">
                                                    <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this Subscription')"><i class="zmdi zmdi-delete"></i></button>
                                                </div>
                                            </form>
                                    </div>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL#</th>
                            <th>Email</th>
                            <th>Heading</th>
                            <th>Dialogue</th>
                            <th>Creator</th>
                            <th>Updater</th>
                            <th>Status</th>
                            @if(Auth::user()->user_role != 'operator')
                                <th>Action</th>
                            @endif
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!--Export Data Table End-->
    </div>
@endsection
