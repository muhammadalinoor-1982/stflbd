<div class="row">

    <!--Form Size Start-->
    <div class="col-12 mb-30">
        <div class="box">
            <div class="box-head">
                <h3 class="title">
                    @if(@$editData)
                        Update Luxury Product
                    @else
                        Add New Luxury Product
                    @endif
                </h3>
            </div>
            <div class="box-body">
                <div class="row mbn-20">

                    <!--Small Field-1-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15">
                                <select class="form-control form-control-sm" name="luxury_id">
                                    <option>Select Luxury Item</option>
                                    @foreach($luxuries as $luxury)
                                        <option value="{{$luxury->id}}" {{(@$editData->luxury_id == $luxury->id)?"selected":""}}>{{$luxury->name}}</option>
                                    @endforeach
                                </select>
                                @error('luxury_id')
                                <div class=" text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-15"><input type="text" name="size" value="{{@$editData->size}}" class="form-control form-control-sm @error('size') is-invalid @enderror" placeholder="Insert Product size"></div>
                            @error('size')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->

                    <!--Small Field-2-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Luxury Product Name"></div>
                            @error('name')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-12 mb-15"><input type="text" name="quantity" value="{{@$editData->quantity}}" class="form-control form-control-sm @error('quantity') is-invalid @enderror" placeholder="Insert Product quantity"></div>
                            @error('quantity')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->

                    <!--Small Field-3-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="color" value="{{@$editData->color}}" class="form-control form-control-sm @error('color') is-invalid @enderror" placeholder="Insert Product color"></div>
                            @error('color')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-12 mb-15"><input type="text" name="regular_prise" value="{{@$editData->regular_prise}}" class="form-control form-control-sm @error('regular_prise') is-invalid @enderror" placeholder="Regular prise"></div>
                            @error('regular_prise')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->

                    <!--Small Field-4-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="special_prise" value="{{@$editData->special_prise}}" class="form-control form-control-sm @error('special_prise') is-invalid @enderror" placeholder="Special prise"></div>
                            @error('special_prise')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-12 mb-15"><input type="text" name="delivery_lead_time" value="{{@$editData->delivery_lead_time}}" class="form-control form-control-sm @error('delivery_lead_time') is-invalid @enderror" placeholder="Delivery Lead Time"></div>
                            @error('Delivery Lead Time')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->

                    <!--Small Field-5-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="discount_prise" value="{{@$editData->discount_prise}}" class="form-control form-control-sm @error('discount_prise') is-invalid @enderror" placeholder="Discount prise"></div>
                            @error('discount_prise')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-12 mb-15"><input type="text" name="production_lead_time" value="{{@$editData->production_lead_time}}" class="form-control form-control-sm @error('production_lead_time') is-invalid @enderror" placeholder="Production Lead Time"></div>
                            @error('production_lead_time')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->

                    <!--Small Field-6-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="bulk_prise" value="{{@$editData->bulk_prise}}" class="form-control form-control-sm @error('bulk_prise') is-invalid @enderror" placeholder="Bulk prise"></div>
                            @error('bulk_prise')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror

                            @php
                                if(old("status")){
                                    $status = old('status');
                                }elseif (isset($editData)){
                                    $status = $editData->status;
                                }else{
                                    $status = null;
                                }
                            @endphp
                            <div class="form-control form-control-sm @error('status') is-invalid @enderror">
                                <label class="adomx-radio"><input type="radio" @if($status=='active') checked @endif name="status" value="active" id="active"> <i class="icon"></i> Active</label><br>
                                <label class="adomx-radio"><input type="radio" @if($status=='inactive') checked @endif name="status" value="inactive" id="inactive"> <i class="icon"></i> Inactive</label>
                            </div>
                            @error('status')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->

                    <!--Text Area-->
                    <div class="col-lg-12 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15">
                                <h3 class="title">Product Description</h3>
                                <textarea name="description" class="form-control form-control-sm @error('description') is-invalid @enderror" cols="100" rows="3">{{@$editData->description}}</textarea>
                            </div>
                            @error('description')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Text Area-->

                    <!--Image Upload-->
                    <div class="col-lg-12 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15">
                                <img src="{{(@$editData->image)?url('public/backend/images/Luxury_images/'.@$editData->image):url('public/backend/images/Luxury_images/noimage.jpg')}}"  alt="" class="product-image rounded-circle">
                                <h6 class="mb-15">Image Upload</h6>
                                <input class="dropify @error('image') is-invalid @enderror" name="image" type="file">
                            </div>
                            @error('image')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <p style="color: #828282">Preferable image dimension should be 500pix X 500pix.</p>
                    </div>
                    <!--Small Field-->

                </div>
            </div>
        </div>
    </div>
    <!--Form Size End-->
</div>


