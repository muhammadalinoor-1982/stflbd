<!--Form Size Start-->
<div class="col-12 mb-30">
    <div class="box">
        <div class="box-head">
            <h3 class="title">
                @if(@$editData)
                    Update Luxury Item
                @else
                    Add New Luxury Item
                @endif
            </h3>
        </div>
        <div class="box-body">
            <div class="row mbn-20">
                <div class="col-lg-8 col-12 mb-20">
                    <h6 class="mb-15">Luxury Name</h6>
                    <div class="row mbn-15">
                        <div class="col-12 mb-15"><input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Insert Your Luxury Name"></div>
                        @error('name')
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
