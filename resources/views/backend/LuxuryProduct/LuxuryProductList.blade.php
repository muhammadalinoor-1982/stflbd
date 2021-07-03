@extends('backend.backendlayout.master')
@section('content')
    <div class="row">

        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Luxury Products List</h3>
                </div>
                <div class="box-body">
                    <a href="{{route('LuxuryProduct.create')}}" class="btn btn-sm btn-primary">Add New</a>
                    @if(Auth::user()->user_role != 'operator')
                    <a href="{{route('LuxuryProduct.bulkupload')}}" class="btn btn-sm btn-primary">Bulk Product Upload</a>
                    <a href="{{route('LuxuryProduct.bulkimage')}}" class="btn btn-sm btn-primary">Bulk Image Upload</a>
                    @endif
                    <table class="table table-bordered data-table data-table-export">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($luxury_products as $luxury_product)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td width="20%"><img src="{{(!empty($luxury_product->image))?url('public/backend/images/Luxury_images/'.$luxury_product->image):url('public/backend/images/Luxury_images/noimage.jpg')}}"  alt="" class="product-image rounded-circle" width="20%"></td>
                                <td>{{$luxury_product->name}}</td>
                                <td>{{$luxury_product['Luxury']['name']}}</td>
                                <td>
                                    @if($luxury_product->status == 'active')
                                        <span class="badge badge-success" title="user active">Active</span>
                                    @else
                                        <span class="badge badge-danger" title="user inactive">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        @if($luxury_product->deleted_at == null)
                                            <div class="col-1 offset-1">
                                                <a title="Details" class="view button button-box button-xs button-primary" href="{{ route('LuxuryProduct.details',$luxury_product->id) }}"><i class="zmdi zmdi-more"></i></a>
                                            </div>
                                            @if(Auth::user()->user_role != 'operator')
                                            <div class="col-1 offset-2">
                                                <a title="Edit" class="edit button button-box button-xs button-info" href="{{ route('LuxuryProduct.edit',$luxury_product->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                            </div>
                                            <form  action="{{ route('LuxuryProduct.destroy',$luxury_product->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="col-1 offset-3">
                                                    <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this Product')"><i class="zmdi zmdi-delete"></i></button>
                                                </div>
                                            </form>
                                            @endif
                                        @else
                                            @if(Auth::user()->user_role != 'operator')
                                            <form  action="{{ route('LuxuryProduct.restore',$luxury_product->id) }}" method="post">
                                                @csrf
                                                <div class="col-1 offset-4">
                                                    <button title="Restore" class="edit button button-box button-xs button-success" onclick="return confirm('Are you confirm to restore this Product')"><i class="zmdi zmdi-time-restore"></i></button>
                                                </div>
                                            </form>
                                            <form  action="{{ route('LuxuryProduct.delete',$luxury_product->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="col-1 offset-5">
                                                    <button title="Permanent Delete" class="delete button button-box button-xs button-warning" onclick="return confirm('Are you confirm to permanently delete this Product')"><i class="zmdi zmdi-close-circle"></i></button>
                                                </div>
                                            </form>
                                            @endif
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
                            <th>Product</th>
                            <th>Category</th>
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


