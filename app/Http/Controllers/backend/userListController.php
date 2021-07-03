<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userListController extends Controller
{
    public function userList()
    {
        $user['title']='Admin User List';
        $user['users']=user::withTrashed()->orderBy('id','desc')->get();
        $user['serial']=1;
        return view('backend.backendpages.dashboardpage.userList',$user);
    }
    public function listEdit($id)
    {
        $user['title'] = 'Edit User';
        $user['user'] = user::findOrFail($id);
        return  view('backend.backendpages.dashboardpage.userListEdit',$user);
    }

    public function listUpdate(Request $request, user $user, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>"required|email|unique:users,email,$id",
        ]);
        $user = user::findOrFail($id);
        $user->updater = auth()->user()->name;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->user_phone   = $request->user_phone;
        $user->user_nid     = $request->user_nid;
        $user->user_address = $request->user_address;
        $user->about_you    = $request->about_you;
        $user->nationality  = $request->nationality;
        $user->country      = $request->country;
        $user->gender      = $request->gender;
        $user->business_type      = $request->business_type;
        $user->is_verified  = $request->is_verified;
        $user->user_role    = $request->user_role;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('backend/images/user_images/'.$user->image));
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'STFL_'.$file->getClientOriginalName();
            $file->move(public_path('backend/images/user_images/'),$file_name);
            $user['image'] = $file_name;
        }
        $user->save();
        session()->flash('message','User has been updated successfully');
        return redirect()->route('user.userList');
    }
    public function details($id)
    {
        $data['title'] = 'User Details';
        $data['user'] = user::findOrFail($id);
        return view('backend.backendpages.dashboardpage.userListDetails',$data);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('message','User Deleted successfully');
        return redirect()->route('user.userList');
    }
    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
        session()->flash('message', 'User restore successfully');
        return redirect()->route('user.userList');
    }
    public function force_delete($id)
    {
        $user = user::onlyTrashed()->findOrFail($id);
        if(file_exists('public/backend/images/user_images/'.$user->image) AND !empty($user->image)){
            unlink('public/backend/images/user_images/'.$user->image);
        }
        $user->forceDelete();
        session()->flash('message','User has been deleted permanently');
        return redirect()->route('user.userList');
    }
    public function active(Request $request, $id)
    {
        $user = user::findOrFail($id);
        $user->is_verified  = $request->is_verified;
        $user->save();
        session()->flash('message', 'User Activate successfully');
        return redirect()->route('user.userList');
    }
    public function inactive($id)
    {
        DB::table('users')->where('id',$id)->update(['is_verified'=>'inactive']);
        session()->flash('message', 'User Inactivate successfully');
        return redirect()->route('user.userList');
    }
}
