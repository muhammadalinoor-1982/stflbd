<?php

namespace App\Http\Controllers\frontend;

use App\CommentReply;
use App\CustomerQuery;
use App\Http\Controllers\Controller;
use App\QueryType;
use Illuminate\Http\Request;

class CustomerQueryController extends Controller
{
    public function view()
    {
        $data['title']='Customer Query List';
        $data['customer_queries']=CustomerQuery::withTrashed()->orderBy('id','desc')->get();
        $data['serial']=1;
        return view('frontend.frontendpages.CustomerQuery.CustomerQueryList',$data);
    }
    public function create()
    {
        $data['title']='New Customer Query';
        $data['query_types'] = QueryType::all();
        return view('frontend.frontendpages.CustomerQuery.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'cust_query' => 'required',
            'query_type_id' => 'required|exists:query_types,id',
            'status' => 'required',
        ]);

        $data = new CustomerQuery();
        $data->creator              = auth()->user()->name;
        $data->query_type_id           = $request->query_type_id;
        $data->cust_query                 = $request->cust_query;
        $data->status               = $request->status;
        $data->save();
        session()->flash('message', 'Your Query has been submitted successfully');
        return redirect()->route('CustomerQuery.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Customer Query';
        $data['editData'] = CustomerQuery::findOrFail($id);
        $data['query_types'] = QueryType::all();
        return  view('frontend.frontendpages.CustomerQuery.Add_And_Edit',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cust_query' => 'required',
        ]);
        $data = CustomerQuery::find($id);
        $data->updater              = auth()->user()->name;
        $data->query_type_id           = $request->query_type_id;
        $data->cust_query                 = $request->cust_query;
        $data->status               = $request->status;
        $data->save();
        session()->flash('message','Your Query has been updated successfully');
        return redirect()->route('CustomerQuery.view');
    }
    public function destroy($id)
    {
        $customer_query = CustomerQuery::findOrFail($id);
        $customer_query->delete();
        session()->flash('message','Customer Query Deleted successfully');
        return redirect()->route('CustomerQuery.view');
    }
    public function restore($id)
    {
        $customer_query = CustomerQuery::onlyTrashed()->findOrFail($id);
        $customer_query->restore();
        session()->flash('message', 'Customer Query restore successfully');
        return redirect()->route('CustomerQuery.view');
    }
    public function delete($id)
    {
        $customer_query = CustomerQuery::onlyTrashed()->findOrFail($id);
        $replies = CommentReply::where('customer_query_id',$id)->delete();
        $customer_query->forceDelete();
        session()->flash('message','Customer Query has been deleted permanently');
        return redirect()->route('CustomerQuery.view');
    }
}
