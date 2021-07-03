<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            return view('backend.backendpages.dashboardpage.userProfile')->withUser($user);
        } else {
            return redirect()->back();
        }
    }
    public function edit()
    {
        if(Auth::user())
            {
                $user = User::findOrFail(Auth::user()->id);
                if($user)
                {
                    return view('backend.backendpages.dashboardpage.userProfileEdit')->withUser($user);
                }else
                {
                    return redirect()->back();
                }
            }else
        {
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if($user){
            $validate = null;
            if(Auth::user()->email === $request->email)
            {
                $validate = $request->validate([
                    'name' => 'required',
                    'email' => 'required|email',
                    'user_phone' => 'required',
                    /*'user_nid' => 'required',
                    'user_address' => 'required',*/
                ]);
            }else
            {
                $validate = $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'user_phone' => 'required',
                    /*'user_nid' => 'required',
                    'user_address' => 'required',*/
                ]);
            }
            if($validate) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->user_phone = $request->user_phone;
                $user->user_nid = $request->user_nid;
                $user->user_address = $request->user_address;
                if ($request->file('image')) {
                    $file = $request->file('image');
                    @unlink(public_path('backend/images/user_images/' . $user->image));
                    $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'STFL_' . $file->getClientOriginalName();
                    $file->move(public_path('backend/images/user_images/'), $file_name);
                    $user['image'] = $file_name;
                }
                $user->save();
                $request->session()->flash('message','User has been updated successfully');
                /*return redirect()->back();*/
                return redirect()->route('dashboard.index');
            }else
            {
                return redirect()->back();
            }

        }else
            {
                return redirect()->back();
            }

    }

}

