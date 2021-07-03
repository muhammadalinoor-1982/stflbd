<?php

namespace App\Http\Controllers\backend;

use App\Fashion;
use App\FashionProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\FashionProductRequest;
use App\Imports\FashionProductImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FashionProductController extends Controller
{
    public function view()
    {
        $data['title']='Fashion Product List';
        $data['fashion_products']=FashionProduct::withTrashed()->orderBy('id','desc')->get();
        $data['serial']=1;
        return view('backend.FashionProduct.FashionProductList',$data);
    }
    public function create()
    {
        $data['title']='New Fashion Product';
        $data['fashions'] = Fashion::all();
        return view('backend.FashionProduct.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:fashion_products,name',
            'fashion_id' => 'required|exists:fashions,id',
            'status' => 'required',
        ]);

        $data = new FashionProduct();
        $data->creator              = auth()->user()->name;
        $data->fashion_id           = $request->fashion_id;
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
            $file->move(public_path('backend/images/Fashion_images/'), $file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message', 'Fashion Product Created successfully');
        return redirect()->route('FashionProduct.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Fashion Product';
        $data['editData'] = FashionProduct::findOrFail($id);
        $data['fashions'] = Fashion::all();
        return  view('backend.FashionProduct.Add_And_Edit',$data);
    }
    public function update(FashionProductRequest $request, $id)
    {
        $data = FashionProduct::find($id);
        $data->updater              = auth()->user()->name;
        $data->fashion_id           = $request->fashion_id;
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
            @unlink(public_path('backend/images/Fashion_images/'.$data->image));
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'STFL_'.$file->getClientOriginalName();
            $file->move(public_path('backend/images/Fashion_images/'),$file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message','Fashion Product has been updated successfully');
        return redirect()->route('FashionProduct.view');
    }
    public function details($id)
    {
        $data['title'] = 'Fashion Product Details';
        $data['editData'] = FashionProduct::findOrFail($id);
        $data['fashions'] = Fashion::all();
        return view('backend.FashionProduct.FashionProductDetails',$data);
    }
    public function bulkupload()
    {
        $data['title'] = 'Bulk Upload';
        return  view('backend.FashionProduct.FashionBulk',$data);
    }
    public function bulkproduct(Request $request)
    {
        $data = $request->file;
        Excel::import(new FashionProductImport, $data);
        return redirect()->route('FashionProduct.view');
    }
    public function bulkimage()
    {
        $data['title'] = 'Fashion Bulk image';
        return  view('backend.FashionProduct.FashionBulkImage',$data);
    }
    public function multipleimage(Request $request)
    {
        $data = $request->file('image');
        foreach($data as $file){
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('backend/images/Fashion_images/'),$file_name);
        }
        return redirect()->route('FashionProduct.view');
    }
    public function destroy($id)
    {
        $fashion_product = FashionProduct::findOrFail($id);
        $fashion_product->delete();
        session()->flash('message','Fashion Product Deleted successfully');
        return redirect()->route('FashionProduct.view');
    }
    public function restore($id)
    {
        $fashion_product = FashionProduct::onlyTrashed()->findOrFail($id);
        $fashion_product->restore();
        session()->flash('message', 'Fashion Product restore successfully');
        return redirect()->route('FashionProduct.view');
    }
    public function delete($id)
    {
        $fashion_product = FashionProduct::onlyTrashed()->findOrFail($id);
        if(file_exists('public/backend/images/Fashion_images/'.$fashion_product->image) AND !empty($fashion_product->image)){
            unlink('public/backend/images/Fashion_images/'.$fashion_product->image);
        }
        $fashion_product->forceDelete();
        session()->flash('message','Fashion Product has been deleted permanently');
        return redirect()->route('FashionProduct.view');
    }
}
