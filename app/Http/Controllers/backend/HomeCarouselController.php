<?php

namespace App\Http\Controllers\backend;

use App\HomeCarousel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeCarouselController extends Controller
{
    public function view()
    {
        $data['title']='Home Carousel List';
        $data['home_carousels']=HomeCarousel::orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.HomeCarousel.HomeCarouselList',$data);
    }
    public function create()
    {
        $data['title']='New Home Carousel';
        return view('backend.HomeCarousel.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:home_carousels,name',
            'tag'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=>'required',
        ]);

        $data = new HomeCarousel();
        $data->creator          = auth()->user()->name;
        $data->name             = $request->name;
        $data->tag              = $request->tag;
        $data->heading          = $request->heading;
        $data->description      = $request->description;
        $data->link             = $request->link;
        $data->event            = $request->event;
        $data->status           = $request->status;
        if ($request->file('image')) {
            $file = $request->file('image');
            $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'STFL_' . $file->getClientOriginalName();
            $file->move(public_path('backend/images/HomeCarousel_images/'), $file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message','Carousel Created successfully');
        return redirect()->route('HomeCarousel.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Home Carousel';
        $data['editData'] = HomeCarousel::findOrFail($id);
        return  view('backend.HomeCarousel.Add_And_Edit',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>"required|unique:home_carousels,name,$id",
            'image'=>"image|mimes:jpeg,png,jpg,gif,svg|max:2048,$id",
        ]);

        $data = HomeCarousel::find($id);
        $data->updater          = auth()->user()->name;
        $data->name             = $request->name;
        $data->tag              = $request->tag;
        $data->heading          = $request->heading;
        $data->description      = $request->description;
        $data->link             = $request->link;
        $data->event            = $request->event;
        $data->status    = $request->status;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('backend/images/HomeCarousel_images/'.$data->image));
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'STFL_'.$file->getClientOriginalName();
            $file->move(public_path('backend/images/HomeCarousel_images/'),$file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message','Carousel has been updated successfully');
        return redirect()->route('HomeCarousel.view');
    }
    public function destroy($id)
    {
        $carousel = HomeCarousel::findOrFail($id);
        if(file_exists('public/backend/images/HomeCarousel_images/'.$carousel->image) AND !empty($carousel->image)){
            unlink('public/backend/images/HomeCarousel_images/'.$carousel->image);
        }
        $carousel->delete();
        session()->flash('message','Carousel Deleted successfully');
        return redirect()->route('HomeCarousel.view');
    }
}
