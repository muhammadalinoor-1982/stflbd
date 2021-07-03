<!--Form Size Start-->
<div class="col-12 mb-30">
    <div class="box">
        <div class="box-head">
            <h3 class="title">
                @if(@$editData)
                    Update Contact
                @else
                    Add New Contact
                @endif
            </h3>
        </div>
        <div class="box-body">
            <div class="row mbn-20">
                <div class="col-lg-8 col-12 mb-20">
                    <h6 class="mb-15">Contact Us Page</h6>
                    <div class="row mbn-15">

                        <div class="col-12 mb-15"><input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Insert Nmae"></div>
                        @error('name')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="designation" value="{{@$editData->designation}}" class="form-control form-control-sm @error('designation') is-invalid @enderror" placeholder="Insert Designation"></div>
                        @error('designation')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="email" name="email" value="{{@$editData->email}}" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Insert Email"></div>
                        @error('email')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="phone" value="{{@$editData->phone}}" class="form-control form-control-sm @error('phone') is-invalid @enderror" placeholder="Insert phone"></div>
                        @error('phone')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="address" value="{{@$editData->address}}" class="form-control form-control-sm @error('address') is-invalid @enderror" placeholder="Insert Address"></div>
                        @error('address')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror


                        <div class="col-12 mb-15"><input type="text" name="facebook" value="{{@$editData->facebook}}" class="form-control form-control-sm @error('facebook') is-invalid @enderror" placeholder="Insert Facebook Link"></div>
                        @error('facebook')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="instagram" value="{{@$editData->instagram}}" class="form-control form-control-sm @error('instagram') is-invalid @enderror" placeholder="Insert Instagram Link"></div>
                        @error('instagram')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="twitter" value="{{@$editData->twitter}}" class="form-control form-control-sm @error('twitter') is-invalid @enderror" placeholder="Insert Twitter Link"></div>
                        @error('twitter')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="linkedin" value="{{@$editData->linkedin}}" class="form-control form-control-sm @error('linkedin') is-invalid @enderror" placeholder="Insert Linkedin Link"></div>
                        @error('linkedin')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="youtube" value="{{@$editData->youtube}}" class="form-control form-control-sm @error('youtube') is-invalid @enderror" placeholder="Insert Youtube Link"></div>
                        @error('youtube')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="skype" value="{{@$editData->skype}}" class="form-control form-control-sm @error('skype') is-invalid @enderror" placeholder="Insert Skype Link"></div>
                        @error('skype')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="pinterest" value="{{@$editData->pinterest}}" class="form-control form-control-sm @error('pinterest') is-invalid @enderror" placeholder="Insert Pinterest Link"></div>
                        @error('pinterest')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="google_plus" value="{{@$editData->google_plus}}" class="form-control form-control-sm @error('google_plus') is-invalid @enderror" placeholder="Insert Google_plus Link"></div>
                        @error('google_plus')
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
