<?php

namespace App\Http\Controllers\backend;

use App\AgroLink;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgroLinkController extends Controller
{
    public function view()
    {
        $data['title']='Agro Link List';
        $data['agro_links']=AgroLink::orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.AgroLink.AgroLinkList',$data);
    }
    public function create()
    {
        $data['title']='New Agro Link';
        return view('backend.AgroLink.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:agro_links,name',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=>'required',
        ]);

        $data = new AgroLink();
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
            $file->move(public_path('backend/images/AgroLink_images/'), $file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message','Agro Link Created successfully');
        return redirect()->route('AgroLink.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Agro Link';
        $data['editData'] = AgroLink::findOrFail($id);
        return  view('backend.AgroLink.Add_And_Edit',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>"required|unique:agro_links,name,$id",
            'image'=>"image|mimes:jpeg,png,jpg,gif,svg|max:2048,$id",
        ]);

        $data = AgroLink::find($id);
        $data->updater          = auth()->user()->name;
        $data->name             = $request->name;
        $data->heading          = $request->heading;
        $data->description      = $request->description;
        $data->link             = $request->link;
        $data->event            = $request->event;
        $data->status           = $request->status;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('backend/images/AgroLink_images/'.$data->image));
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'STFL_'.$file->getClientOriginalName();
            $file->move(public_path('backend/images/AgroLink_images/'),$file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message','Agro Link has been updated successfully');
        return redirect()->route('AgroLink.view');
    }
    public function destroy($id)
    {
        $link = AgroLink::findOrFail($id);
        if(file_exists('public/backend/images/AgroLink_images/'.$link->image) AND !empty($link->image)){
            unlink('public/backend/images/AgroLink_images/'.$link->image);
        }
        $link->delete();
        session()->flash('message','Agro Link Deleted successfully');
        return redirect()->route('AgroLink.view');
    }
}
