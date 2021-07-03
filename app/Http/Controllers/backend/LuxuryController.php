<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LuxuryRequest;
use App\Luxury;
use Illuminate\Http\Request;

class LuxuryController extends Controller
{
    public function view()
    {
        $data['title']='Luxury List';
        $data['luxuries']=Luxury::withTrashed()->orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.Luxury.LuxuryList',$data);
    }
    public function create()
    {
        $data['title']='New Luxury';
        return view('backend.Luxury.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:luxuries,name',
            'status'=>'required',
        ]);

        $data = new Luxury();
        $data->creator = auth()->user()->name;
        $data->name    = $request->name;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Luxury Item Created successfully');
        return redirect()->route('Luxury.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Luxury';
        $data['editData'] = Luxury::findOrFail($id);
        return  view('backend.Luxury.Add_And_Edit',$data);
    }
    public function update(LuxuryRequest $request, $id)
    {
        $data = Luxury::find($id);
        $data->updater = auth()->user()->name;
        $data->name    = $request->name;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Luxury has been updated successfully');
        return redirect()->route('Luxury.view');
    }
    public function destroy($id)
    {
        $luxury = Luxury::findOrFail($id);
        $luxury->delete();
        session()->flash('message','Luxury Deleted successfully');
        return redirect()->route('Luxury.view');
    }
    public function restore($id)
    {
        $luxury = Luxury::onlyTrashed()->findOrFail($id);
        $luxury->restore();
        session()->flash('message', 'Luxury restore successfully');
        return redirect()->route('Luxury.view');
    }
    public function delete($id)
    {
        $luxury = Luxury::onlyTrashed()->findOrFail($id);
        $luxury->forceDelete();
        session()->flash('message','Luxury has been deleted permanently');
        return redirect()->route('Luxury.view');
    }
}
