<?php

namespace App\Http\Controllers\backend;

use App\Agro;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AgroRequest;

class AgroController extends Controller
{
    public function view()
    {
        $data['title']='Agro List';
        $data['agros']=Agro::withTrashed()->orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.agro.agroList',$data);
    }
    public function create()
    {
        $data['title']='New Agro';
        return view('backend.agro.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:agros,name',
            'status'=>'required',
        ]);

        $data = new agro();
        $data->creator_name = auth()->user()->name;
        $data->name    = $request->name;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Agro Item Created successfully');
        return redirect()->route('agro.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Agro';
        $data['editData'] = Agro::findOrFail($id);
        return  view('backend.agro.Add_And_Edit',$data);
    }
    public function update(AgroRequest $request, $id)
    {
        $this->validate($request,[
            'name'=>"required|unique:agros,name,$id",
        ]);
        $data = Agro::find($id);
        $data->updater_name = auth()->user()->name;
        $data->name    = $request->name;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Agro has been updated successfully');
        return redirect()->route('agro.view');
    }
    public function destroy($id)
    {
        $agro = Agro::findOrFail($id);
        $agro->delete();
        session()->flash('message','Agro Deleted successfully');
        return redirect()->route('agro.view');
    }
    public function restore($id)
    {
        $agro = Agro::onlyTrashed()->findOrFail($id);
        $agro->restore();
        session()->flash('message', 'Agro restore successfully');
        return redirect()->route('agro.view');
    }
    public function delete($id)
    {
        $agro = Agro::onlyTrashed()->findOrFail($id);
        $agro->forceDelete();
        session()->flash('message','Agro has been deleted permanently');
        return redirect()->route('agro.view');
    }
}
