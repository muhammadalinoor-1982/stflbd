@extends('frontend.frontendlayout.master')
@section('content')
    @php
        $subscriptions = App\Subscription::first();
        $contact_us = App\ContactUs::first();
        $home_carousels = App\HomeCarousel::all();
    @endphp
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class="product-collateral col-lg-12 col-sm-12 col-xs-12">
                    <div class="col-main">
                        <div class="my-account">
                            <form method="post" action="{{route('FrontendCustomerQuery.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="page-title">
                                    <h2>My Query</h2>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-xs-12">
                                        <div class="title-box">
                                            <h3>Insert Query</h3>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li>
                                                <div class="form-group">
                                                    <label for="Query">Query <span class="required">*</span></label>
                                                    <textarea class="@error('cust_query') is-invalid @enderror" type="text" name="cust_query" cols="130" rows="10"></textarea>
                                                    @error('cust_query')
                                                    <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="Priority">Priority <span class="required">*</span></label>
                                                    <select class="selectpicker @error('query_type_id') is-invalid @enderror" name="query_type_id" data-width="fit">
                                                        <option>Select Your Priority</option>
                                                        @foreach($query_types as $query_type)
                                                            <option value="{{$query_type->id}}" {{(@$query_type->query_type_id == $query_type->id)?"selected":""}}>{{$query_type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('query_type_id')
                                                    <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="buttons-set">
                                    <button id="send2" name="send" type="submit" class="button login"><span>Post</span></button>
                                    <span class="required pull-right"><b>*</b> Required Field</span> </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
