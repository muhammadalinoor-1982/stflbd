<?php

namespace App\Http\Controllers\backend;

use App\FashionLink;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FashionLinkController extends Controller
{
    public function view()
    {
        $data['title']='Fashion Link List';
        $data['fashion_links']=FashionLink::orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.FashionLink.FashionLinkList',$data);
    }
    public function create()
    {
        $data['title']='New Fashion Link';
        return view('backend.FashionLink.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:fashion_links,name',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=>'required',
        ]);

        $data = new FashionLink();
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
            $file->move(public_path('backend/images/FashionLink_images/'), $file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message','Fashion Link Created successfully');
        return redirect()->route('FashionLink.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Fashion Link';
        $data['editData'] = FashionLink::findOrFail($id);
        return  view('backend.FashionLink.Add_And_Edit',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>"required|unique:fashion_links,name,$id",
            'image'=>"image|mimes:jpeg,png,jpg,gif,svg|max:2048,$id",
        ]);

        $data = FashionLink::find($id);
        $data->updater          = auth()->user()->name;
        $data->name             = $request->name;
        $data->heading          = $request->heading;
        $data->description      = $request->description;
        $data->link             = $request->link;
        $data->event            = $request->event;
        $data->status           = $request->status;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('backend/images/FashionLink_images/'.$data->image));
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'STFL_'.$file->getClientOriginalName();
            $file->move(public_path('backend/images/FashionLink_images/'),$file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message','Fashion Link has been updated successfully');
        return redirect()->route('FashionLink.view');
    }
    public function destroy($id)
    {
        $link = FashionLink::findOrFail($id);
        if(file_exists('public/backend/images/FashionLink_images/'.$link->image) AND !empty($link->image)){
            unlink('public/backend/images/FashionLink_images/'.$link->image);
        }
        $link->delete();
        session()->flash('message','Fashion Link Deleted successfully');
        return redirect()->route('FashionLink.view');
    }
}
