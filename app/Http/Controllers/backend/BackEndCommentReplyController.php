<?php

namespace App\Http\Controllers\backend;

use App\CommentReply;
use App\CustomerQuery;
use App\Http\Controllers\Controller;
use App\QueryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackEndCommentReplyController extends Controller
{
    public function view()
    {
        $data['title']='My Query';
        $data['customer_queries'] = CustomerQuery::withTrashed()->orderBy('id', 'desc')->get();
        $data['comment_replies'] = CommentReply::orderBy('id', 'desc')->get();
        $data['query_types'] = QueryType::all();
        $data['serial']=1;
        return view('backend.BackEndCommentReplyPage.BackEndCommentReply',$data);
    }
    public function create()
    {
        $data['title']='My Query';
        $data['customer_queries'] = CustomerQuery::withTrashed()->orderBy('id', 'desc')->get();
        $data['comment_replies'] = CommentReply::orderBy('id', 'desc')->get();
        $data['query_types'] = QueryType::all();

        return view('backend.BackEndCommentReplyPage.BackEndCommentReply',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cust_query' => 'required',
            'query_type_id' => 'required|exists:query_types,id',
        ]);

        $data = new CustomerQuery();
        $data->creator              = Auth()->user()->name;
        $data->user_id              = Auth::id();
        $data->query_type_id        = $request->query_type_id;
        $data->cust_query           = $request->cust_query;
        $data->save();
        session()->flash('message', 'Your Query has been submitted successfully');
        return redirect()->route('BackEndCommentReply.view');
    }
    public function reply(Request $request, $customer_query)
    {
        $this->validate($request, ['comment'=>'required']);
        $CommentReply                       = new CommentReply();
        $CommentReply->customer_query_id    = $customer_query;
        $CommentReply->user_id              = Auth::id();
        $CommentReply->comment              =$request->comment;
        $CommentReply->creator              = auth()->user()->name;
        $CommentReply->save();
        session()->flash('message','The Comment Reply successfully');
        return redirect()->back();
    }
}
