<!--Form Size Start-->
<div class="col-12 mb-30">
    <div class="box">
        <div class="box-head">
            <h3 class="title">
                @if(@$editData)
                    Update Subscription
                @else
                    Add New Subscription
                @endif
            </h3>
        </div>
        <div class="box-body">
            <div class="row mbn-20">
                <div class="col-lg-8 col-12 mb-20">
                    <h6 class="mb-15">Subscription Page</h6>
                    <div class="row mbn-15">
                        <div class="col-12 mb-15"><input type="email" name="email" value="{{@$editData->email}}" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Insert Subscription Email"></div>
                        @error('email')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="heading" value="{{@$editData->heading}}" class="form-control form-control-sm @error('heading') is-invalid @enderror" placeholder="Insert Subscription Heading"></div>
                        @error('heading')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="dialogue" value="{{@$editData->dialogue}}" class="form-control form-control-sm @error('dialogue') is-invalid @enderror" placeholder="Insert Subscription Dialogue"></div>
                        @error('dialogue')
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
            </div>
        </div>
    </div>
</div>
<!--Form Size End-->
