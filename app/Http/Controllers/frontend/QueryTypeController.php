<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\QueryType;
use Illuminate\Http\Request;

class QueryTypeController extends Controller
{
    public function view()
    {
        $data['title']='QueryType List';
        $data['query_types']=QueryType::withTrashed()->orderBy('id','desc')->get();
        $data['serial']=1;
        return view('frontend.frontendpages.QueryType.QueryTypeList',$data);
    }
    public function create()
    {
        $data['title']='New Query Type';
        return view('frontend.frontendpages.QueryType.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:luxuries,name',
            'status'=>'required',
        ]);

        $data = new QueryType();
        $data->creator = auth()->user()->name;
        $data->name    = $request->name;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Query Type Item Created successfully');
        return redirect()->route('QueryType.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Query Type';
        $data['editData'] = QueryType::findOrFail($id);
        return  view('frontend.frontendpages.QueryType.Add_And_Edit',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>"required|unique:query_types,name,$id",
        ]);
        $data = QueryType::find($id);
        $data->updater = auth()->user()->name;
        $data->name    = $request->name;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Query Type has been updated successfully');
        return redirect()->route('QueryType.view');
    }
    public function destroy($id)
    {
        $query_type = QueryType::findOrFail($id);
        $query_type->delete();
        session()->flash('message','Query Type Deleted successfully');
        return redirect()->route('QueryType.view');
    }
    public function restore($id)
    {
        $query_type = QueryType::onlyTrashed()->findOrFail($id);
        $query_type->restore();
        session()->flash('message', 'Query Type restore successfully');
        return redirect()->route('QueryType.view');
    }
    public function delete($id)
    {
        $query_type = QueryType::onlyTrashed()->findOrFail($id);
        $query_type->forceDelete();
        session()->flash('message','Query Type has been deleted permanently');
        return redirect()->route('QueryType.view');
    }
}
