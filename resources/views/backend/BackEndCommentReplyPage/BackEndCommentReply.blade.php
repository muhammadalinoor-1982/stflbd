@extends('backend.backendlayout.master')
@section('content')
    <div class="row mbn-50">

        <!--Right Sidebar Start-->
        <div class="col-xlg-4 col-12 mb-50">
            <div class="row mbn-30">

                <!--Author Information Start-->
                <div class="col-xlg-12 col-lg-12 col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h3 class="title">Customer Query and Reply Page</h3>
                        </div>
                            <div class="box-body">
                                <div class="form">
                                            <div class="row row-10 mbn-20">
                                                    {{--Start New Query--}}
                                                    <form method="post" action="{{route('BackEndCommentReply.store')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <!--Text Area-->
                                                        <div class="col-lg-12 col-12 mb-20">
                                                            <div class="row mbn-15">
                                                                <div class="col-12 mb-15">
                                                                    <h3 class="title">Customer Query</h3>
                                                                    <textarea type="text" name="cust_query" class="form-control form-control-sm @error('cust_query') is-invalid @enderror" cols="100" rows="3"></textarea>
                                                                </div>
                                                                @error('cust_query')
                                                                <div class=" text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!--Text Area-->

                                                        <div class="col-12 mb-15">
                                                            <h3 class="title">Priority</h3>
                                                            <select class="form-control form-control-sm @error('Priority') is-invalid @enderror" name="query_type_id">
                                                                <option >Select Your Priority</option>
                                                                @foreach($query_types as $query_type)
                                                                    <option value="{{$query_type->id}}" {{(@$query_type->query_type_id == $query_type->id)?"selected":""}}>{{$query_type->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('query_type_id')
                                                            <div class=" text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 mt-10"><button class="button button-primary button-outline">Save</button></div>
                                                    </form>
                                                    {{--Evd New Query--}}

                                                    {{--Start Query and Reply--}}
                                                    <div class="col-lg-12 col-12 mb-30">
                                                        <div class="box">
                                                            <div class="box-head">
                                                                <h4 class="title">Total {{$customer_queries->count()}} Queries and {{$comment_replies->count()}} Replies</h4>
                                                            </div>
                                                                <div class="box-body">
                                                                @foreach($customer_queries as $customer_query)
                                                                    <div class="media">
                                                                        <div class="avatar avatar-xxl mr-10 mb-10">
                                                                            <img src="{{asset(@$customer_query->user->image)?url('public/backend/images/user_images/'.$customer_query->user->image):url('public/backend/images/user_images/noimage.jpg')}}" alt="">
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h6 class="mt-0">Query</h6>
                                                                            <div class="alert alert-outline-primary" role="alert">
                                                                                <span class="badge badge-success">{{$customer_query['QueryType']['name']}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <a class="alert-link" href="#">{{$customer_query->creator}}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <a class="alert-link" href="#">{{$customer_query->created_at}}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <a class="alert-link" href="#">{{$customer_query->created_at->diffForHumans()}}</a>
                                                                            </div>
                                                                            <p>{{$customer_query->cust_query}}</p>
                                                                            <div class="col-12 mt-10"><button class="button button-primary button-outline" id="reply-btn" onclick="showReplyForm('{{$customer_query->id}}','{{$customer_query->user->name}}')">Comment On This Post</button></div>
                                                                            @if($customer_query->CommentReply->count() > 0)
                                                                            @foreach($customer_query->CommentReply as $reply)
                                                                            <div class="media">
                                                                                <div class="avatar avatar-xxl mr-10 mb-10">
                                                                                    <img src="{{asset(@$reply->user->image)?url('public/backend/images/user_images/'.$reply->user->image):url('public/backend/images/user_images/noimage.jpg')}}" alt="">
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h6 class="mt-0">Replied</h6>
                                                                                    <div class="alert alert-outline-success" role="alert">
                                                                                        <a class="alert-link" href="#">{{$reply->user->name}}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                        <a class="alert-link" href="#">{{$reply->created_at}}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                        <a class="alert-link" href="#">{{$reply->created_at->diffForHumans()}}</a>
                                                                                    </div>
                                                                                    <p>{{$reply->comment}}</p>
                                                                                    <div class="col-12 mt-10"><button class="button button-primary button-outline" id="reply-btn" onclick="showReplyForm('{{$customer_query->id}}','{{$reply->user->name}}')">Comment On This Post</button></div>
                                                                                </div>
                                                                            </div>
                                                                             @endforeach
                                                                             @endif
                                                                            <div class="media" id="reply-form-{{$customer_query->id}}" style="display: none">
                                                                                <div class="avatar avatar-xxl mr-10 mb-10">
                                                                                    <img src="{{asset(@Auth::user()->image)?url('public/backend/images/user_images/'.Auth::user()->image):url('public/backend/images/user_images/noimage.jpg')}}" alt="">
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h6 class="mt-0">Reply Now</h6>
                                                                                    <div class="alert alert-outline-warning" role="alert">
                                                                                        <a class="alert-link" href="#">{{Auth::user()->name}}</a>
                                                                                    </div>
                                                                                    <form action="{{route('BackEndCommentReply.reply',$customer_query->id)}}" method="POST">
                                                                                    @csrf
                                                                                    <!--Text Area-->
                                                                                        <div class="col-lg-12 col-12 mb-20">
                                                                                            <div class="row mbn-15">
                                                                                                <div class="col-12 mb-15">
                                                                                                    <textarea
                                                                                                              id="reply-form-{{$customer_query->id}}-text"
                                                                                                              cols="100"
                                                                                                              rows="3"
                                                                                                              class="form-control form-control-sm"
                                                                                                              name="comment"
                                                                                                              placeholder="message"
                                                                                                              onfocus="this.placeholder = ''"
                                                                                                              onblur="this.placeholder = 'message'"
                                                                                                              required="">
                                                                                                    </textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--Text Area-->
                                                                                    <div class="col-12 mt-10"><button class="button button-primary button-outline" type="submit">Reply</button></div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div><br><br>
                                                                 @endforeach
                                                                </div>
                                                        </div>
                                                    </div>
                                                    {{--End Query and Reply--}}
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

