@extends('backend.backendlayout.master')
@section('content')
    @php
        $subscriptions = App\Subscription::first();
        $contact_us = App\ContactUs::first();
        $home_carousels = App\HomeCarousel::all();
    @endphp
    <div class="row">

        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Customer Query List</h3>
                </div>
                <div class="box-body">
                    <a href="{{route('CustomerQuery.create')}}" class="btn btn-sm btn-primary">Add New</a>
                    <table class="table table-bordered data-table data-table-export">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Query Tag</th>
                            <th>Query</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customer_queries as $customer_query)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{$customer_query['QueryType']['name']}}</td>
                                <td>{{$customer_query->cust_query}}</td>
                                <td>
                                    @if($customer_query->status == 'active')
                                        <span class="badge badge-success" title="user active">Active</span>
                                    @else
                                        <span class="badge badge-danger" title="user inactive">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        @if($customer_query->deleted_at == null)
                                            <div class="col-1 offset-1">
                                                <a title="Edit" class="edit button button-box button-xs button-info" href="{{ route('CustomerQuery.edit',$customer_query->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                            </div>
                                            <form  action="{{ route('CustomerQuery.destroy',$customer_query->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="col-1 offset-2">
                                                    <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this Query')"><i class="zmdi zmdi-delete"></i></button>
                                                </div>
                                            </form>
                                        @else
                                            <form  action="{{ route('CustomerQuery.restore',$customer_query->id) }}" method="post">
                                                @csrf
                                                <div class="col-1 offset-3">
                                                    <button title="Restore" class="edit button button-box button-xs button-success" onclick="return confirm('Are you confirm to restore this Query')"><i class="zmdi zmdi-time-restore"></i></button>
                                                </div>
                                            </form>
                                            <form  action="{{ route('CustomerQuery.delete',$customer_query->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="col-1 offset-4">
                                                    <button title="Permanent Delete" class="delete button button-box button-xs button-warning" onclick="return confirm('Are you confirm to permanently delete this Query')"><i class="zmdi zmdi-close-circle"></i></button>
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
                            <th>Query Tag</th>
                            <th>Query</th>
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


