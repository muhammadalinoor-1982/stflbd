<?php

namespace App\Http\Controllers\backend;


use App\Fashion;
use App\Http\Controllers\Controller;
use App\Http\Requests\FashionRequest;
use Illuminate\Http\Request;

class FashionController extends Controller
{
    public function view()
    {
        $data['title']='Fashion List';
        $data['fashions']=Fashion::withTrashed()->orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.Fashion.FashionList',$data);
    }
    public function create()
    {
        $data['title']='New Fashion';
        return view('backend.Fashion.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:fashions,name',
            'status'=>'required',
        ]);

        $data = new Fashion();
        $data->creator = auth()->user()->name;
        $data->name    = $request->name;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Fashion Item Created successfully');
        return redirect()->route('Fashion.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Fashion';
        $data['editData'] = Fashion::findOrFail($id);
        return  view('backend.Fashion.Add_And_Edit',$data);
    }
    public function update(FashionRequest $request, $id)
    {
        $data = Fashion::find($id);
        $data->updater = auth()->user()->name;
        $data->name    = $request->name;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Fashion has been updated successfully');
        return redirect()->route('Fashion.view');
    }
    public function destroy($id)
    {
        $fashion = Fashion::findOrFail($id);
        $fashion->delete();
        session()->flash('message','Fashion Deleted successfully');
        return redirect()->route('Fashion.view');
    }
    public function restore($id)
    {
        $fashion = Fashion::onlyTrashed()->findOrFail($id);
        $fashion->restore();
        session()->flash('message', 'Fashion restore successfully');
        return redirect()->route('Fashion.view');
    }
    public function delete($id)
    {
        $fashion = Fashion::onlyTrashed()->findOrFail($id);
        $fashion->forceDelete();
        session()->flash('message','Fashion has been deleted permanently');
        return redirect()->route('Fashion.view');
    }
}

