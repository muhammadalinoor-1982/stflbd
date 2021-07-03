<?php

namespace App\Http\Controllers\frontend;

use App\CommentReply;
use App\CustomerQuery;
use App\Http\Controllers\Controller;
use App\QueryType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendCustomerQueryController extends Controller
{
    public function view()
    {
        $data['title']='My Query';
        /*$data['customer_queries'] = CustomerQuery::withTrashed()->orderBy('id', 'desc')->get();*/
        $data['customer_queries'] = CustomerQuery::withTrashed()->where('user_id',auth()->user()->id)->orderBy('id', 'desc')->get();
        $data['comment_replies'] = CommentReply::orderBy('id', 'desc')->get();
        $data['query_types'] = QueryType::all();
        $data['serial']=1;
        return view('frontend.frontendpages.CustomerQuery.FrontendCustomerQuery.FrontendCustomerQueryList',$data);
    }
    public function create()
    {
        $data['title']='My Query';
        /*$data['customer_queries'] = CustomerQuery::withTrashed()->orderBy('id', 'desc')->get();*/
        $data['customer_queries'] = CustomerQuery::withTrashed()->where('user_id',auth()->user()->id)->orderBy('id', 'desc')->get();
        $data['comment_replies'] = CommentReply::orderBy('id', 'desc')->get();
        $data['query_types'] = QueryType::all();

        return view('frontend.frontendpages.CustomerQuery.FrontendCustomerQuery.FrontendCustomerQueryList',$data);
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
        return redirect()->route('FrontendCustomerQuery.view');
    }
}
