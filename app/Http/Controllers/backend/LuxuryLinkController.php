<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\LuxuryLink;
use Illuminate\Http\Request;

class LuxuryLinkController extends Controller
{
    public function view()
    {
        $data['title']='Luxury Link List';
        $data['luxury_links']=LuxuryLink::orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.LuxuryLink.LuxuryLinkList',$data);
    }
    public function create()
    {
        $data['title']='New Luxury Link';
        return view('backend.LuxuryLink.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:luxury_links,name',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=>'required',
        ]);

        $data = new LuxuryLink();
        $data->creator          = auth()->user()->name;
        $data->name             = $request->name;
        $data->heading          = $request->heading;
        $data->description      = $request->description;
        $data->link             = $request->link;
        $data->event            = $request->event;
        $data->status           = $request->status;
        if ($request->file('image')) {
            $file = $request->file('image');
            $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'STFL_' . $file->getClientOriginalName();
            $file->move(public_path('backend/images/LuxuryLink_images/'), $file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message','Luxury Link Created successfully');
        return redirect()->route('LuxuryLink.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Luxury Link';
        $data['editData'] = LuxuryLink::findOrFail($id);
        return  view('backend.LuxuryLink.Add_And_Edit',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>"required|unique:luxury_links,name,$id",
            'image'=>"image|mimes:jpeg,png,jpg,gif,svg|max:2048,$id",
        ]);

        $data = LuxuryLink::find($id);
        $data->updater          = auth()->user()->name;
        $data->name             = $request->name;
        $data->heading          = $request->heading;
        $data->description      = $request->description;
        $data->link             = $request->link;
        $data->event            = $request->event;
        $data->status           = $request->status;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('backend/images/LuxuryLink_images/'.$data->image));
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'STFL_'.$file->getClientOriginalName();
            $file->move(public_path('backend/images/LuxuryLink_images/'),$file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message','Luxury Link has been updated successfully');
        return redirect()->route('LuxuryLink.view');
    }
    public function destroy($id)
    {
        $link = LuxuryLink::findOrFail($id);
        if(file_exists('public/backend/images/LuxuryLink_images/'.$link->image) AND !empty($link->image)){
            unlink('public/backend/images/LuxuryLink_images/'.$link->image);
        }
        $link->delete();
        session()->flash('message','Luxury Link Deleted successfully');
        return redirect()->route('LuxuryLink.view');
    }
}
