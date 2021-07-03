<!--Form Size Start-->
<div class="col-12 mb-30">
    <div class="box">
        <div class="box-head">
            <h3 class="title">
                @if(@$editData)
                    Update About Us Info
                @else
                    Add New About Us Info
                @endif
            </h3>
        </div>
        <div class="box-body">
            <div class="row mbn-20">
                <div class="col-lg-12 col-12 mb-20">
                    <h6 class="mb-15">About Us</h6>
                    <div class="row mbn-15">
                        <div class="col-12 mb-15"><input type="text" name="Company_name" value="{{@$editData->Company_name}}" class="form-control form-control-sm @error('Company_name') is-invalid @enderror" placeholder="Insert Company Name"></div>
                        @error('Company_name')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                    <!--Text Area-->
                        <div class="col-lg-12 col-12 mb-20">
                            <div class="row mbn-15">
                                <div class="col-12 mb-15">
                                    <h3 class="title">Owner Speech</h3>
                                    <textarea name="owner_speech" class="form-control form-control-sm @error('owner_speech') is-invalid @enderror" cols="100" rows="3">{{@$editData->owner_speech}}</textarea>
                                </div>
                                @error('owner_speech')
                                <div class=" text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--Text Area-->

                        <!--Text Area-->
                        <div class="col-lg-12 col-12 mb-20">
                            <div class="row mbn-15">
                                <div class="col-12 mb-15">
                                    <h3 class="title">History</h3>
                                    <textarea name="History" class="form-control form-control-sm @error('History') is-invalid @enderror" cols="100" rows="3">{{@$editData->History}}</textarea>
                                </div>
                                @error('History')
                                <div class=" text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--Text Area-->

                        <!--Text Area-->
                        <div class="col-lg-12 col-12 mb-20">
                            <div class="row mbn-15">
                                <div class="col-12 mb-15">
                                    <h3 class="title">Why Us</h3>
                                    <textarea name="why_us" class="form-control form-control-sm @error('why_us') is-invalid @enderror" cols="100" rows="3">{{@$editData->why_us}}</textarea>
                                </div>
                                @error('why_us')
                                <div class=" text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--Text Area-->

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
