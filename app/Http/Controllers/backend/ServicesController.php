<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function view()
    {
        $data['title']='Services List';
        $data['services']=Services::orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.Services.ServicesList',$data);
    }
    public function create()
    {
        $data['title']='New Service';
        return view('backend.Services.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'service_name' => 'required',
            'status' => 'required',
        ]);

        $data = new Services();
        $data->creator = auth()->user()->name;
        $data->service_name    = $request->service_name;
        $data->service_type    = $request->service_type;
        $data->product_type    = $request->product_type;
        $data->transport_type    = $request->transport_type;
        $data->delivery_method    = $request->delivery_method;
        $data->payment_method    = $request->payment_method;
        $data->bulk_supply    = $request->bulk_supply;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Services Info has been Created successfully');
        return redirect()->route('Services.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Services Info';
        $data['editData'] = Services::findOrFail($id);
        return  view('backend.Services.Add_And_Edit',$data);
    }
    public function update(Request $request, $id)
    {

        $data = Services::find($id);
        $data->updater = auth()->user()->name;
        $data->service_name    = $request->service_name;
        $data->service_type    = $request->service_type;
        $data->product_type    = $request->product_type;
        $data->transport_type    = $request->transport_type;
        $data->delivery_method    = $request->delivery_method;
        $data->payment_method    = $request->payment_method;
        $data->bulk_supply    = $request->bulk_supply;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Services info has been updated successfully');
        return redirect()->route('Services.view');
    }
    public function destroy($id)
    {
        $service = Services::findOrFail($id);
        $service->delete();
        session()->flash('message','Services Info has been Deleted Successfully');
        return redirect()->route('Services.view');
    }
}
