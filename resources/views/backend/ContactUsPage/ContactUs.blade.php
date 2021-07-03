@extends('backend.backendlayout.master')
@section('content')
    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Contact Us List</h3>
                </div>
                <div class="box-body">
                    <a href="{{route('ContactUs.create')}}" class="btn btn-sm btn-primary">Add New</a>
                    <table class="table table-bordered data-table data-table-export">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th>Twitter</th>
                            <th>Linkedin</th>
                            <th>Youtube</th>
                            <th>Skype</th>
                            <th>Pinterest</th>
                            <th>google_plus</th>
                            <th>Creator</th>
                            <th>Updater</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contact_us as $contact)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->designation}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->address}}</td>
                                <td>{{$contact->facebook}}</td>
                                <td>{{$contact->instagram}}</td>
                                <td>{{$contact->twitter}}</td>
                                <td>{{$contact->linkedin}}</td>
                                <td>{{$contact->youtube}}</td>
                                <td>{{$contact->skype}}</td>
                                <td>{{$contact->pinterest}}</td>
                                <td>{{$contact->google_plus}}</td>
                                <td>{{$contact->creator}}</td>
                                <td>{{$contact->updater}}</td>
                                <td>
                                    @if($contact->status == 'active')
                                        <span class="badge badge-success" title="user active">Active</span>
                                    @else
                                        <span class="badge badge-danger" title="user inactive">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                            <div class="col-1 offset-1">
                                                <a title="Edit" class="edit button button-box button-xs button-info" href="{{ route('ContactUs.edit',$contact->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                            </div>
                                            <form  action="{{ route('ContactUs.destroy',$contact->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="col-1 offset-2">
                                                    <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this Contact')"><i class="zmdi zmdi-delete"></i></button>
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
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th>Twitter</th>
                            <th>Linkedin</th>
                            <th>Youtube</th>
                            <th>Skype</th>
                            <th>Pinterest</th>
                            <th>google_plus</th>
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
