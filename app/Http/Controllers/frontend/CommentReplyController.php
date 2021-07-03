<?php

namespace App\Http\Controllers\frontend;

use App\CommentReply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentReplyController extends Controller
{
    public function store(Request $request, $customer_query)
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
