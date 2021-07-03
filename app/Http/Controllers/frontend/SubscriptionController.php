<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:subscriptions'
        ]);

        $data = new Subscription();
        $data->email    = $request->email;
        $data->save();
        session()->flash('message','Subscription has been Created successfully');
        return redirect()->back();
    }
}
