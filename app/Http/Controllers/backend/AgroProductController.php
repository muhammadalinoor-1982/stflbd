<?php

namespace App\Http\Controllers\backend;

use App\Agro;
use App\AgroCategory;
use App\AgroProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgroProductRequest;
use App\Imports\AgroProductImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AgroProductController extends Controller
{
    public function view()
    {
        $data['title']='Agro List';
        $data['agro_products']=AgroProduct::withTrashed()->orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.AgroProduct.AgroProductList',$data);
    }
    public function create()
    {
        $data['title']='New AgroProduct';
        $data['agros'] = Agro::all();
        return view('backend.AgroProduct.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:agro_products,name',
            'agro_id' => 'required|exists:agros,id',
            'status' => 'required',

        ]);

        $data = new AgroProduct();
        $data->creator              = auth()->user()->name;
        $data->agro_id              = $request->agro_id;
        $data->name                 = $request->name;
        $data->description          = $request->description;
        $data->color                = $request->color;
        $data->size                 = $request->size;
        $data->quantity             = $request->quantity;
        $data->regular_prise        = $request->regular_prise;
        $data->special_prise        = $request->special_prise;
        $data->discount_prise       = $request->discount_prise;
        $data->bulk_prise           = $request->bulk_prise;
        $data->cultivation_time     = $request->cultivation_time;
        $data->harvesting_time      = $request->harvesting_time;
        $data->status               = $request->status;
        if ($request->file('image')) {
            $file = $request->file('image');
            $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'STFL_' . $file->getClientOriginalName();
            $file->move(public_path('backend/images/Agro_images/'), $file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message', 'AgroProduct Created successfully');
        return redirect()->route('AgroProduct.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit AgroProduct';
        $data['editData'] = AgroProduct::findOrFail($id);
        $data['agros'] = Agro::all();
        return  view('backend.AgroProduct.Add_And_Edit',$data);
    }
    public function update(AgroProductRequest $request, $id)
    {
        $data = AgroProduct::find($id);
        $data->updater              = auth()->user()->name;
        $data->agro_id              = $request->agro_id;
        $data->name                 = $request->name;
        $data->description          = $request->description;
        $data->color                = $request->color;
        $data->size                 = $request->size;
        $data->quantity             = $request->quantity;
        $data->regular_prise        = $request->regular_prise;
        $data->special_prise        = $request->special_prise;
        $data->discount_prise       = $request->discount_prise;
        $data->bulk_prise           = $request->bulk_prise;
        $data->cultivation_time     = $request->cultivation_time;
        $data->harvesting_time      = $request->harvesting_time;
        $data->status               = $request->status;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('backend/images/Agro_images/'.$data->image));
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'STFL_'.$file->getClientOriginalName();
            $file->move(public_path('backend/images/Agro_images/'),$file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message','AgroProduct has been updated successfully');
        return redirect()->route('AgroProduct.view');
    }
    public function details($id)
    {
        $data['title'] = 'AgroProduct Details';
        $data['editData'] = AgroProduct::findOrFail($id);
        $data['agros'] = Agro::all();
        return view('backend.AgroProduct.AgroProductDetails',$data);
    }
    public function bulkupload()
    {
        $data['title'] = 'Bulk Upload';
        return  view('backend.AgroProduct.AgroBulk',$data);
    }
    public function bulkproduct(Request $request)
    {
        $data = $request->file;
        Excel::import(new AgroProductImport, $data);
        return redirect()->route('AgroProduct.view');
    }
    public function bulkimage()
    {
        $data['title'] = 'Agro Bulk image';
        return  view('backend.AgroProduct.AgroBulkImage',$data);
    }
    public function multipleimage(Request $request)
    {
        $data = $request->file('image');
        foreach($data as $file){
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('backend/images/Agro_images/'),$file_name);
        }
        return redirect()->route('AgroProduct.view');
    }
    public function destroy($id)
    {
        $agro_product = AgroProduct::findOrFail($id);
        $agro_product->delete();
        session()->flash('message','AgroProduct Deleted successfully');
        return redirect()->route('AgroProduct.view');
    }
    public function restore($id)
    {
        $agro_product = AgroProduct::onlyTrashed()->findOrFail($id);
        $agro_product->restore();
        session()->flash('message', 'AgroProduct restore successfully');
        return redirect()->route('AgroProduct.view');
    }
    public function delete($id)
    {
        $agro_product = AgroProduct::onlyTrashed()->findOrFail($id);
        if(file_exists('public/backend/images/Agro_images/'.$agro_product->image) AND !empty($agro_product->image)){
            unlink('public/backend/images/Agro_images/'.$agro_product->image);
        }
        $agro_product->forceDelete();
        session()->flash('message','AgroProduct has been deleted permanently');
        return redirect()->route('AgroProduct.view');
    }
}
