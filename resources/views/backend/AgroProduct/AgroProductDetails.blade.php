@extends('backend.backendlayout.master')
@section('content')
    <div class="row mbn-30">

        <!--Order Details Head Start-->
        <div class="col-12 mb-30">
            <a title="Back to Mail Menu" class="edit button button-box button-xs button-info" href="{{ route('AgroProduct.view')}}"><i class="zmdi zmdi-mail-reply-all"></i></a>
            <div class="row mbn-15">
                <div class="col-12 col-md-4 mb-15">
                    <h4 class="text-primary fw-600 m-0">{{ $editData->name }}</h4>
                </div>
                <div class="col-12 col-md-4 mb-15">
                    <h4 class="text-primary fw-600 m-0">{{ $editData->Agro->name}}</h4>
                </div>
                @if($editData->status == 'active')
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
                    <h4 class="mb-25">{{ $editData->name }}</h4>
                    <ul>
                        <li> <span>Image</span> <span><img src="{{(@$editData->image)?url('public/backend/images/Agro_images/'.$editData->image):url('public/backend/images/Agro_images/no_image.png')}}"  alt="" class="product-image rounded-circle" width="50%"></span> </li>
                        <li> <span>Details</span> <span>{{ $editData->description }}</span> </li>
                        <li> <span>Size</span> <span>{{ $editData->size }}</span> </li>
                        <li> <span>Color</span> <span>{{ $editData->color }}</span> </li>
                        <li> <span>Cultivation Time</span> <span>{{ $editData->cultivation_time }}</span> </li>
                        <li> <span>Harvesting Time</span> <span>{{ $editData->harvesting_time }}</span> </li>
                        <li> <span>Creator</span> <span>{{ $editData->creator }}</span> </li>
                        <li> <span>Updater</span> <span>{{(@$editData->updater)?$editData->updater:"" }}</span> </li>
                    </ul>
                </div>
                <!--Billing Info End-->

            </div>
        </div>
        <!--Order Details Customer Information Start-->

        <!--Order Details List Start-->
        <div class="col-12 mb-30">
            <div class="table-responsive">
                <table class="table table-bordered table-vertical-middle">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Regular Prise</th>
                        <th>Special Prise</th>
                        <th>Discount Prise</th>
                        <th>Bulk Prise</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $editData->id }}</td>
                        <td>{{ $editData->quantity }}</td>
                        <td>{{ $editData->regular_prise }}</td>
                        <td>{{ $editData->special_prise }}</td>
                        <td>{{ $editData->discount_prise }}</td>
                        <td>{{ $editData->bulk_prise }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--Order Details List End-->

    </div>
@endsection