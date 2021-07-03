<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendUserController extends Controller
{
    public function edit()
    {
        if(Auth::user())
        {
            $user = User::findOrFail(Auth::user()->id);
            if($user)
            {
                return view('frontend.frontendpages.FrontendUser.FrontendEditUser')->withUser($user);
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
                ]);
            }else
            {
                $validate = $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                ]);
            }
            if($validate) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->user_phone = $request->user_phone;
                $user->user_address = $request->user_address;
                $user->business_type = $request->business_type;
                $user->gender = $request->gender;
                $user->about_you = $request->about_you;
                $user->nationality = $request->nationality;
                $user->country = $request->country;
                if ($request->file('image')) {
                    $file = $request->file('image');
                    @unlink(public_path('backend/images/user_images/' . $user->image));
                    $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'STFL_' . $file->getClientOriginalName();
                    $file->move(public_path('backend/images/user_images/'), $file_name);
                    $user['image'] = $file_name;
                }
                $user->save();
                $request->session()->flash('message','Account information has been updated successfully');
                /*return redirect()->back();*/
                return redirect()->route('Frontend.view');
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
