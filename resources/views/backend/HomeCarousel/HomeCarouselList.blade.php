@extends('backend.backendlayout.master')
@section('content')
    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Home Carousel List</h3>
                </div>
                <div class="box-body">
                    <a href="{{route('HomeCarousel.create')}}" class="btn btn-sm btn-primary">Add New</a>
                    <table class="table table-bordered data-table data-table-export">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Tag</th>
                            <th>Heading</th>
                            <th>Description</th>
                            <th>link</th>
                            <th>Event</th>
                            <th>Status</th>
                            <th>Creator</th>
                            <th>Updater</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($home_carousels as $carousel)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>
                                    <img src="{{(!empty($carousel->image))?url('public/backend/images/HomeCarousel_images/'.$carousel->image):url('public/backend/images/HomeCarousel_images/noimage.jpg')}}" width="30%" alt="" class="table-product-image rounded-circle">
                                </td>
                                <td>{{$carousel->name}}</td>
                                <td>{{$carousel->tag}}</td>
                                <td>{{$carousel->heading}}</td>
                                <td>{{$carousel->description}}</td>
                                <td>{{$carousel->link}}</td>
                                <td>{{$carousel->event}}</td>
                                <td>{{$carousel->creator}}</td>
                                <td>{{$carousel->updater}}</td>
                                <td>
                                    @if($carousel->status == 'active')
                                        <span class="badge badge-success" title="user active">Active</span>
                                    @else
                                        <span class="badge badge-danger" title="user inactive">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                            <div class="col-2 offset-1">
                                                <a title="Edit" class="edit button button-box button-xs button-info" href="{{ route('HomeCarousel.edit',$carousel->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                            </div>
                                            <form  action="{{ route('HomeCarousel.destroy',$carousel->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="col-2 offset-2">
                                                    <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this Carousel')"><i class="zmdi zmdi-delete"></i></button>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Tag</th>
                            <th>Heading</th>
                            <th>Description</th>
                            <th>link</th>
                            <th>Event</th>
                            <th>Status</th>
                            <th>Creator</th>
                            <th>Updater</th>
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
