<?php

namespace App\Http\Controllers\backend;

use App\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function view()
    {
        $data['title']='Contact Us List';
        $data['contact_us']=ContactUs::orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.ContactUsPage.ContactUs',$data);
    }
    public function create()
    {
        $data['title']='New Contact';
        return view('backend.ContactUsPage.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required|email|unique:contact_us',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        $data = new ContactUs();
        $data->creator = auth()->user()->name;
        $data->name    = $request->name;
        $data->designation    = $request->designation;
        $data->email    = $request->email;
        $data->phone    = $request->phone;
        $data->address    = $request->address;
        $data->facebook    = $request->facebook;
        $data->instagram    = $request->instagram;
        $data->twitter    = $request->twitter;
        $data->linkedin    = $request->linkedin;
        $data->youtube    = $request->youtube;
        $data->skype    = $request->skype;
        $data->pinterest    = $request->pinterest;
        $data->google_plus    = $request->google_plus;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Contact Info has been Created successfully');
        return redirect()->route('ContactUs.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Contact Info';
        $data['editData'] = ContactUs::findOrFail($id);
        return  view('backend.ContactUsPage.Add_And_Edit',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'email'=>"required|email|unique:contact_us,email,$id",
        ]);

        $data = ContactUs::find($id);
        $data->updater = auth()->user()->name;
        $data->name    = $request->name;
        $data->designation    = $request->designation;
        $data->email    = $request->email;
        $data->phone    = $request->phone;
        $data->address    = $request->address;
        $data->facebook    = $request->facebook;
        $data->instagram    = $request->instagram;
        $data->twitter    = $request->twitter;
        $data->linkedin    = $request->linkedin;
        $data->youtube    = $request->youtube;
        $data->skype    = $request->skype;
        $data->pinterest    = $request->pinterest;
        $data->google_plus    = $request->google_plus;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Contact info has been updated successfully');
        return redirect()->route('ContactUs.view');
    }
    public function destroy($id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact->delete();
        session()->flash('message','Contact Info has been Deleted Successfully');
        return redirect()->route('ContactUs.view');
    }
}
