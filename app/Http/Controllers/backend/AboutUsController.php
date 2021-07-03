<?php

namespace App\Http\Controllers\backend;

use App\AboutUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function view()
    {
        $data['title']='About Us List';
        $data['about_us']=AboutUs::orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.AboutUS.AboutUsList',$data);
    }
    public function create()
    {
        $data['title']='New About';
        return view('backend.AboutUS.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'Company_name' => 'required',
            'owner_speech' => 'required',
            'History' => 'required',
            'why_us' => 'required',
            'status' => 'required',
        ]);

        $data = new AboutUs();
        $data->creator = auth()->user()->name;
        $data->Company_name    = $request->Company_name;
        $data->owner_speech    = $request->owner_speech;
        $data->History    = $request->History;
        $data->why_us    = $request->why_us;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','About Info has been Created successfully');
        return redirect()->route('AboutUs.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit About Info';
        $data['editData'] = AboutUs::findOrFail($id);
        return  view('backend.AboutUS.Add_And_Edit',$data);
    }
    public function update(Request $request, $id)
    {

        $data = AboutUs::find($id);
        $data->updater = auth()->user()->name;
        $data->Company_name    = $request->Company_name;
        $data->owner_speech    = $request->owner_speech;
        $data->History    = $request->History;
        $data->why_us    = $request->why_us;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','About info has been updated successfully');
        return redirect()->route('AboutUs.view');
    }
    public function destroy($id)
    {
        $contact = AboutUs::findOrFail($id);
        $contact->delete();
        session()->flash('message','About Info has been Deleted Successfully');
        return redirect()->route('AboutUs.view');
    }
}
