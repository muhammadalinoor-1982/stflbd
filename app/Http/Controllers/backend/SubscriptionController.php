<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function view()
    {
        $data['title']='Subscription List';
        $data['subscriptions']=Subscription::orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.Subscription.SubscriptionPage',$data);
    }
    public function create()
    {
        $data['title']='New Subscription';
        return view('backend.Subscription.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:subscriptions'
        ]);

        $data = new Subscription();
        $data->creator = auth()->user()->name;
        $data->email    = $request->email;
        $data->heading    = $request->heading;
        $data->dialogue    = $request->dialogue;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Subscription has been Created successfully');
        return redirect()->route('Subscription.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Subscription';
        $data['editData'] = Subscription::findOrFail($id);
        return  view('backend.Subscription.Add_And_Edit',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'email'=>"required|email|unique:subscriptions,email,$id",
        ]);

        $data = Subscription::find($id);
        $data->updater = auth()->user()->name;
        $data->email    = $request->email;
        $data->heading    = $request->heading;
        $data->dialogue    = $request->dialogue;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','Subscription has been updated successfully');
        return redirect()->route('Subscription.view');
    }
    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        session()->flash('message','Subscription Deleted successfully');
        return redirect()->route('Subscription.view');
    }

}
