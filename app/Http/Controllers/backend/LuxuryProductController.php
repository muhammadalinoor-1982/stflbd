<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LuxuryProductRequest;
use App\Imports\LuxuryProductImport;
use App\Luxury;
use App\LuxuryProduct;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LuxuryProductController extends Controller
{
    public function view()
    {
        $data['title']='Luxury Product List';
        $data['luxury_products']=LuxuryProduct::withTrashed()->orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.LuxuryProduct.LuxuryProductList',$data);
    }
    public function create()
    {
        $data['title']='New Luxury Product';
        $data['luxuries'] = Luxury::all();
        return view('backend.LuxuryProduct.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:luxury_products,name',
            'luxury_id' => 'required|exists:luxuries,id',
            'status' => 'required',
        ]);

        $data = new LuxuryProduct();
        $data->creator              = auth()->user()->name;
        $data->luxury_id           = $request->luxury_id;
        $data->name                 = $request->name;
        $data->description          = $request->description;
        $data->color                = $request->color;
        $data->size                 = $request->size;
        $data->quantity             = $request->quantity;
        $data->regular_prise        = $request->regular_prise;
        $data->special_prise        = $request->special_prise;
        $data->discount_prise       = $request->discount_prise;
        $data->bulk_prise           = $request->bulk_prise;
        $data->production_lead_time     = $request->production_lead_time;
        $data->delivery_lead_time      = $request->delivery_lead_time;
        $data->status               = $request->status;
        if ($request->file('image')) {
            $file = $request->file('image');
            $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'STFL_' . $file->getClientOriginalName();
            $file->move(public_path('backend/images/Luxury_images/'), $file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message', 'Luxury Product Created successfully');
        return redirect()->route('LuxuryProduct.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Luxury Product';
        $data['editData'] = LuxuryProduct::findOrFail($id);
        $data['luxuries'] = Luxury::all();
        return  view('backend.LuxuryProduct.Add_And_Edit',$data);
    }
    public function update(LuxuryProductRequest $request, $id)
    {
        $data = LuxuryProduct::find($id);
        $data->updater              = auth()->user()->name;
        $data->luxury_id           = $request->luxury_id;
        $data->name                 = $request->name;
        $data->description          = $request->description;
        $data->color                = $request->color;
        $data->size                 = $request->size;
        $data->quantity             = $request->quantity;
        $data->regular_prise        = $request->regular_prise;
        $data->special_prise        = $request->special_prise;
        $data->discount_prise       = $request->discount_prise;
        $data->bulk_prise           = $request->bulk_prise;
        $data->production_lead_time     = $request->production_lead_time;
        $data->delivery_lead_time      = $request->delivery_lead_time;
        $data->status               = $request->status;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('backend/images/Luxury_images/'.$data->image));
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'STFL_'.$file->getClientOriginalName();
            $file->move(public_path('backend/images/Luxury_images/'),$file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message','Luxury Product has been updated successfully');
        return redirect()->route('LuxuryProduct.view');
    }
    public function details($id)
    {
        $data['title'] = 'Product Details';
        $data['editData'] = LuxuryProduct::findOrFail($id);
        $data['luxuries'] = Luxury::all();
        return view('backend.LuxuryProduct.LuxuryProductDetails',$data);
    }
    public function bulkupload()
    {
        $data['title'] = 'Bulk Upload';
        return  view('backend.LuxuryProduct.LuxuryBulk',$data);
    }
    public function bulkproduct(Request $request)
    {
        $data = $request->file;
        Excel::import(new LuxuryProductImport, $data);
        return redirect()->route('LuxuryProduct.view');
    }

    public function bulkimage()
    {
        $data['title'] = 'Luxury Bulk image';
        return  view('backend.LuxuryProduct.LuxuryBulkImage',$data);
    }
    public function multipleimage(Request $request)
    {
        $data = $request->file('image');
        foreach($data as $file){
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('backend/images/Luxury_images/'),$file_name);
        }
        return redirect()->route('LuxuryProduct.view');
    }

    public function destroy($id)
    {
        $luxury_product = LuxuryProduct::findOrFail($id);
        $luxury_product->delete();
        session()->flash('message','Luxury Product Deleted successfully');
        return redirect()->route('LuxuryProduct.view');
    }
    public function restore($id)
    {
        $luxury_product = LuxuryProduct::onlyTrashed()->findOrFail($id);
        $luxury_product->restore();
        session()->flash('message', 'Luxury Product restore successfully');
        return redirect()->route('LuxuryProduct.view');
    }
    public function delete($id)
    {
        $luxury_product = LuxuryProduct::onlyTrashed()->findOrFail($id);
        if(file_exists('public/backend/images/Luxury_images/'.$luxury_product->image) AND !empty($luxury_product->image)){
            unlink('public/backend/images/Luxury_images/'.$luxury_product->image);
        }
        $luxury_product->forceDelete();
        session()->flash('message','Luxury Product has been deleted permanently');
        return redirect()->route('LuxuryProduct.view');
    }
}
