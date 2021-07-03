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
                                                    <textarea class="@error('cust_query') is-invalid @enderror" type="text" name="cust_query" cols="130" rows="2"></textarea>
                                                    @error('cust_query')
                                                    <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="Priority">Priority <span class="required">*</span></label>
                                                    <select class="selectpicker @error('query_type_id') is-invalid @enderror" name="query_type_id" data-width="fit" required>
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



    <section class="main-container col1-layout">
        <div class="container">
            <div class="row">
                <h5>{{$customer_queries->count()}} Queries</h5>
                @foreach($customer_queries as $customer_query)
                {{--start customer query section(Main Comment)--}}
                <div style="background-color: lightblue;" class="product-collateral col-lg-12 col-sm-12 col-xs-12">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs" >
                                <li><img  style="
                                          display: inline-block;
                                          background-color: #00f7ff;
                                          border-width: 2px;
                                          border-style: groove;
                                          border-color: #00f7ff;
                                          overflow: hidden;
                                          border-radius: 50%;
                                          "
                                            src="{{asset(@$customer_query->user->image)?url('public/backend/images/user_images/'.$customer_query->user->image):url('public/backend/images/user_images/noimage.jpg')}}" width="10%" alt=""></li>
                                <li style="position: relative; right: 660px;"><p class="availability in-stock"><span>{{$customer_query['QueryType']['name']}}</span></p></li>
                                <li style="position: relative; right: 650px; text-transform: uppercase; color: #a8021b;"><strong> {{$customer_query->creator}}</strong></li>
                                <li style="position: relative; right: 640px; text-transform: uppercase; color: #039114;"><strong>{{$customer_query->created_at}}</strong></li>
                                <li style="position: relative; top: -43px; right: -440px; text-transform: uppercase; color: #bf009f;" ><strong>{{$customer_query->created_at->diffForHumans()}}</strong></li>
                            </ul>
                            <div style="background-color: #ded7fa;" id="productTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="product_tabs_description">
                                    <div class="std">
                                        <p>{{$customer_query->cust_query}}</p>
                                        <button class="button login" id="reply-btn" onclick="showReplyForm('{{$customer_query->id}}','{{$customer_query->user->name}}')"><span>Comment On This Post</span></button>
                                    </div>
                                </div>
                            </div>
                </div>
                {{--End customer query section(Main Comment)--}}

                {{--Start show replied comment--}}
                @if($customer_query->CommentReply->count() > 0 && $customer_query->user_id == Auth::user()->id)
                    {{--if want to see all reply then have to use below code instade of above if statement
                    @if($customer_query->CommentReply->count() > 0) --}}
                    @foreach($customer_query->CommentReply as $reply)
                        <div style="background-color: #e880ff;" class="product-collateral col-lg-12 col-sm-12 col-xs-12">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                <li><img  style="
                                          display: inline-block;
                                          background-color: #00f7ff;
                                          border-width: 2px;
                                          border-style: groove;
                                          border-color: #00f7ff;
                                          overflow: hidden;
                                          border-radius: 50%;
                                          "
                                            src="{{asset(@$reply->user->image)?url('public/backend/images/user_images/'.$reply->user->image):url('public/backend/images/user_images/noimage.jpg')}}" width="10%" alt="{{$reply->user->image}}"></li>
                                <li style="text-transform: uppercase; color: #a8021b;"><strong>{{$reply->user->name}}</strong></li>
                                <li style="text-transform: uppercase; color: #039114;"><strong>{{$reply->created_at}}</strong></li>
                                <li style="text-transform: uppercase; color: #bf009f;"><strong>{{$reply->created_at->diffForHumans()}}</strong></li>
                            </ul>
                            <div style="background-color: #dc9ffc;" id="productTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="product_tabs_description">
                                    <div class="std">
                                        <p>{{$reply->comment}}</p>
                                        <button class="button login" id="reply-btn" onclick="showReplyForm('{{$customer_query->id}}','{{$reply->user->name}}')"><span>Comment On This Post</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                @endif
                {{--Start show replied comment--}}

                {{--Start comment on customer query section(Reply store part)--}}
                <div style="background-color: #faa957;" class="product-collateral col-lg-12 col-sm-12 col-xs-12" id="reply-form-{{$customer_query->id}}" style="display: none">
                    <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                        <li>
                            <img style="
                                          display: inline-block;
                                          background-color: #00f7ff;
                                          border-width: 2px;
                                          border-style: groove;
                                          border-color: #00f7ff;
                                          overflow: hidden;
                                          border-radius: 50%;
                                       "

                                 src="{{asset(@Auth::user()->image)?url('public/backend/images/user_images/'.Auth::user()->image):url('public/backend/images/user_images/noimage.jpg')}}" width="10%" alt="{{Auth::user()->image}}">
                        </li>
                        <li style="position: relative; right: 650px; text-transform: uppercase; color: #a8021b;"><strong>{{Auth::user()->name}}</strong></li>
                    </ul>
                    <div style="background-color: #ffc259;" id="productTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="product_tabs_description">
                            <div class="std">
                                <form action="{{route('CommentReply.store',$customer_query->id)}}" method="POST">
                                 @csrf
                                    <textarea
                                            id="reply-form-{{$customer_query->id}}-text"
                                            cols="60"
                                            rows="2"
                                            class="form-control mb-10"
                                            name="comment"
                                            placeholder="message"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'message'"
                                            required="">
                                    </textarea>
                                    <button type="submit" class="button login">Reply</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{--End comment on customer query section(Reply store part)--}}
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('footer')
<script type="text/javascript">
    function showReplyForm(commentId,user) {
        var x = document.getElementById(`reply-form-${commentId}`);
        var input = document.getElementById(`reply-form-${commentId}-text`);

        if (x.style.display === "none") {
            x.style.display = "block";
            input.innerText=`@${user} `;

        } else {
            x.style.display = "none";
        }
    }
</script>