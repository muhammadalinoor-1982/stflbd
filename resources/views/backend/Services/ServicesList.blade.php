@extends('backend.backendlayout.master')
@section('content')
    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Services List</h3>
                </div>
                <div class="box-body">
                    <a href="{{route('Services.create')}}" class="btn btn-sm btn-primary">Add New</a>
                    <table class="table table-bordered data-table data-table-export">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Service Name</th>
                            <th>Service Type</th>
                            <th>Product Type</th>
                            <th>Transport Type</th>
                            <th>Delivery Method</th>
                            <th>Payment Method</th>
                            <th>Bulk Supply</th>
                            <th>Creator</th>
                            <th>Updater</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{$service->service_name}}</td>
                                <td>{{$service->service_type}}</td>
                                <td>{{$service->product_type}}</td>
                                <td>{{$service->transport_type}}</td>
                                <td>{{$service->delivery_method}}</td>
                                <td>{{$service->payment_method}}</td>
                                <td>{{$service->bulk_supply}}</td>
                                <td>{{$service->creator}}</td>
                                <td>{{$service->updater}}</td>
                                <td>
                                    @if($service->status == 'active')
                                        <span class="badge badge-success" title="user active">Active</span>
                                    @else
                                        <span class="badge badge-danger" title="user inactive">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-1 offset-1">
                                            <a title="Edit" class="edit button button-box button-xs button-info" href="{{ route('Services.edit',$service->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                        </div>
                                        <form  action="{{ route('Services.destroy',$service->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="col-1 offset-2">
                                                <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this Services')"><i class="zmdi zmdi-delete"></i></button>
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
                            <th>Service Name</th>
                            <th>Service Type</th>
                            <th>Product Type</th>
                            <th>Transport Type</th>
                            <th>Delivery Method</th>
                            <th>Payment Method</th>
                            <th>Bulk Supply</th>
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
