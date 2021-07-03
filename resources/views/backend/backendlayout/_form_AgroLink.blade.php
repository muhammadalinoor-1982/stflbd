<!--Form Size Start-->
<div class="col-12 mb-30">
    <div class="box">
        <div class="box-head">
            <h3 class="title">
                @if(@$editData)
                    Update Agro Link
                @else
                    Add New Agro Link
                @endif
            </h3>
        </div>
        <div class="box-body">
            <div class="row mbn-20">
                <div class="col-lg-8 col-12 mb-20">
                    <h6 class="mb-15">Agro Link</h6>
                    <div class="row mbn-15">
                        <div class="col-12 mb-15"><input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Insert Name"></div>
                        @error('name')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="heading" value="{{@$editData->heading}}" class="form-control form-control-sm @error('heading') is-invalid @enderror" placeholder="Insert Heading"></div>
                        @error('heading')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="description" value="{{@$editData->description}}" class="form-control form-control-sm @error('description') is-invalid @enderror" placeholder="Insert Description"></div>
                        @error('description')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <div class="col-12 mb-15"><input type="text" name="link" value="{{@$editData->link}}" class="form-control form-control-sm @error('link') is-invalid @enderror" placeholder="Insert Link"></div>
                        @error('link')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        @php
                            if(old("event")){
                                $event = old('event');
                            }elseif (isset($editData)){
                                $event = $editData->event;
                            }else{
                                $event = null;
                            }
                        @endphp
                        <div class="form-control form-control-sm @error('event') is-invalid @enderror">
                            <label class="adomx-radio"><input type="radio" @if($event=='special') checked @endif name="event" value="special" id="special"> <i class="icon"></i> Special</label><br>
                            <label class="adomx-radio"><input type="radio" @if($event=='social') checked @endif name="event" value="social" id="social"> <i class="icon"></i> Social</label><br>
                            <label class="adomx-radio"><input type="radio" @if($event=='cultural') checked @endif name="event" value="cultural" id="cultural"> <i class="icon"></i> Cultural</label><br>
                            <label class="adomx-radio"><input type="radio" @if($event=='occasional') checked @endif name="event" value="occasional" id="occasional"> <i class="icon"></i> Occasional</label><br>
                            <label class="adomx-radio"><input type="radio" @if($event=='festival') checked @endif name="event" value="festival" id="festival"> <i class="icon"></i> Festival</label>
                        </div>
                        @error('event')
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

                        <div class="form-group">
                            <div class="col-md-6">
                                <img id="showImage" src="{{(!empty($editData->image))?url('public/backend/images/AgroLink_images/'.$editData->image):url('public/backend/images/AgroLink_images/noimage.jpg')}}" width="30%">
                            </div>
                        </div>
                        <div class="col-12 mb-15"><input name="image" class="form-control form-control-sm @error('image') is-invalid @enderror" type="file" placeholder="Insert Image">
                        <p style="color: #828282">Preferable image dimension should be 500pix X 500pix.</p>
                        </div>
                        @error('image')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Form Size End-->
