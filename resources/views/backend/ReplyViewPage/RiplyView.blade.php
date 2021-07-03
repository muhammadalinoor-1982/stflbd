@extends('backend.backendlayout.master')
@section('content')
    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Reply List</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered data-table data-table-export">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Reply</th>
                            <th>Comment</th>
                            <th>User</th>
                            <th>Reply Submitted</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comment_replies as $reply)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{$reply->comment}}</td>
                                <td>{{$reply->customerquery->cust_query}}</td>
                                <td>{{$reply->user->name}}</td>
                                <td>{{$reply->created_at->diffForHumans()}}</td>
                                {{--<td>
                                    @if($luxury->status == 'active')
                                        <span class="badge badge-success" title="user active">Active</span>
                                    @else
                                        <span class="badge badge-danger" title="user inactive">Inactive</span>
                                    @endif
                                </td>--}}
                                <td>
                                    <div class="row">
                                            <form  action="{{ route('ReplyView.destroy',$reply->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="col-1 offset-1">
                                                    <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this Reply')"><i class="zmdi zmdi-delete"></i></button>
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
                            <th>Reply</th>
                            <th>Comment</th>
                            <th>User</th>
                            <th>Reply Submitted</th>
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
