<!--Form Size Start-->
<div class="col-xlg-12 col-lg-12 col-12 mb-30">
{{--<div class="col-12 mb-30">--}}
    <div class="box">
        <div class="box-head">
            <h3 class="title">
                @if(@$editData)
                    Update Services
                @else
                    Add New Services
                @endif
            </h3>
        </div>
        <div class="box-body">
            <div class="row mbn-20">
                <div class="col-lg-12 col-12 mb-20">
                    <h6 class="mb-15">Services</h6>
                    <div class="row mbn-15">

                        <div class="col-lg-12 col-12 mb-20">
                            <div class="row mbn-15">
                                <div class="col-12 mb-15">
                                    <span>Insert Service Name</span>
                                   <textarea
                                           value="{{@$editData->service_name}}"
                                           cols="100"
                                           rows="3"
                                           class="form-control form-control-sm @error('service_name') is-invalid @enderror"
                                           type="text"
                                           name="service_name">
                                            {{@$editData->service_name}}
                                   </textarea>
                                    @error('service_name')
                                    <div class=" text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12 mb-20">
                            <div class="row mbn-15">
                                <div class="col-12 mb-15">
                                    <span>Insert Service Type</span>
                                    <textarea
                                            value="{{@$editData->service_type}}"
                                            cols="100"
                                            rows="3"
                                            class="form-control form-control-sm @error('service_type') is-invalid @enderror"
                                            type="text"
                                            name="service_type">
                                            {{@$editData->service_type}}
                                   </textarea>
                                    @error('service_type')
                                    <div class=" text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12 mb-20">
                            <div class="row mbn-15">
                                <div class="col-12 mb-15">
                                    <span>Insert Product Type</span>
                                    <textarea
                                            value="{{@$editData->product_type}}"
                                            cols="100"
                                            rows="3"
                                            class="form-control form-control-sm @error('product_type') is-invalid @enderror"
                                            type="text"
                                            name="product_type">
                                            {{@$editData->product_type}}
                                   </textarea>
                                    @error('product_type')
                                    <div class=" text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12 mb-20">
                            <div class="row mbn-15">
                                <div class="col-12 mb-15">
                                    <span>Insert Transport Type</span>
                                    <textarea
                                            value="{{@$editData->transport_type}}"
                                            cols="100"
                                            rows="3"
                                            class="form-control form-control-sm @error('transport_type') is-invalid @enderror"
                                            type="text"
                                            name="transport_type">
                                            {{@$editData->transport_type}}
                                   </textarea>
                                    @error('transport_type')
                                    <div class=" text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12 mb-20">
                            <div class="row mbn-15">
                                <div class="col-12 mb-15">
                                    <span>Insert Delivery Method</span>
                                    <textarea
                                            value="{{@$editData->delivery_method}}"
                                            cols="100"
                                            rows="3"
                                            class="form-control form-control-sm @error('delivery_method') is-invalid @enderror"
                                            type="text"
                                            name="delivery_method">
                                            {{@$editData->delivery_method}}
                                   </textarea>
                                    @error('delivery_method')
                                    <div class=" text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12 mb-20">
                            <div class="row mbn-15">
                                <div class="col-12 mb-15">
                                    <span>Insert Payment Method</span>
                                    <textarea
                                            value="{{@$editData->payment_method}}"
                                            cols="100"
                                            rows="3"
                                            class="form-control form-control-sm @error('payment_method') is-invalid @enderror"
                                            type="text"
                                            name="payment_method">
                                            {{@$editData->payment_method}}
                                   </textarea>
                                    @error('payment_method')
                                    <div class=" text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12 mb-20">
                            <div class="row mbn-15">
                                <div class="col-12 mb-15">
                                    <span>Insert BulkS upply</span>
                                    <textarea
                                            value="{{@$editData->bulk_supply}}"
                                            cols="100"
                                            rows="3"
                                            class="form-control form-control-sm @error('bulk_supply') is-invalid @enderror"
                                            type="text"
                                            name="bulk_supply">
                                            {{@$editData->bulk_supply}}
                                   </textarea>
                                    @error('bulk_supply')
                                    <div class=" text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

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
            </div>
        </div>
    </div>
</div>
<!--Form Size End-->
