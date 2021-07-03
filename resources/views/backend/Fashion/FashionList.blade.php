@extends('backend.backendlayout.master')
@section('content')
    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Fashion List</h3>
                </div>
                <div class="box-body">
                    <a href="{{route('Fashion.create')}}" class="btn btn-sm btn-primary">Add New</a>
                    <table class="table table-bordered data-table data-table-export">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Name</th>
                            <th>Creator</th>
                            <th>Updater</th>
                            <th>Status</th>
                            @if(Auth::user()->user_role != 'operator')
                            <th>Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fashions as $fashion)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{$fashion->name}}</td>
                                <td>{{$fashion->creator}}</td>
                                <td>{{$fashion->updater}}</td>
                                <td>
                                    @if($fashion->status == 'active')
                                        <span class="badge badge-success" title="user active">Active</span>
                                    @else
                                        <span class="badge badge-danger" title="user inactive">Inactive</span>
                                    @endif
                                </td>
                                    @if(Auth::user()->user_role != 'operator')
                                <td>
                                    <div class="row">
                                        @if($fashion->deleted_at == null)
                                            <div class="col-2 offset-1">
                                                <a title="Edit" class="edit button button-box button-xs button-info" href="{{ route('Fashion.edit',$fashion->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                            </div>
                                            <form  action="{{ route('Fashion.destroy',$fashion->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="col-2 offset-2">
                                                    <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this Fashion')"><i class="zmdi zmdi-delete"></i></button>
                                                </div>
                                            </form>
                                        @else
                                            <form  action="{{ route('Fashion.restore',$fashion->id) }}" method="post">
                                                @csrf
                                                <div class="col-2 offset-3">
                                                    <button title="Restore" class="edit button button-box button-xs button-info" onclick="return confirm('Are you confirm to restore this Fashion')"><i class="zmdi zmdi-time-restore"></i></button>
                                                </div>
                                            </form>
                                            <form  action="{{ route('Fashion.delete',$fashion->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="col-2 offset-4">
                                                    <button title="Permanent Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to permanently delete this Fashion')"><i class="zmdi zmdi-close-circle"></i></button>
                                                </div>
                                            </form>
                                    </div>
                                    @endif
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL#</th>
                            <th>Name</th>
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
