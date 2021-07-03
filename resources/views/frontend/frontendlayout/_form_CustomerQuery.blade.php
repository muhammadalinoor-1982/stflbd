<div class="row">

    <!--Form Size Start-->
    <div class="col-12 mb-30">
        <div class="box">
            <div class="box-head">
                <h3 class="title">
                    @if(@$editData)
                        Update Customer Query
                    @else
                        Add New Customer Query
                    @endif
                </h3>
            </div>
            <div class="box-body">
                <div class="row mbn-20">

                    <!--Small Field-1-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15">
                                <select class="form-control form-control-sm" name="query_type_id" required>
                                    <option>Select Query Type</option>
                                    @foreach($query_types as $query_type)
                                        <option value="{{$query_type->id}}" {{(@$editData->query_type_id == $query_type->id)?"selected":""}}>{{$query_type->name}}</option>
                                    @endforeach
                                </select>
                                @error('query_type_id')
                                <div class=" text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-15"><input type="text" name="cust_query" value="{{@$editData->cust_query}}" class="form-control form-control-sm @error('cust_query') is-invalid @enderror" placeholder="Insert your query"></div>
                            @error('cust_query')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->

                    <!--Small Field-6-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
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
                    {{--<div class="col-lg-12 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15">
                                <h3 class="title">Query Details</h3>
                                <textarea name="query" class="form-control form-control-sm @error('query') is-invalid @enderror" cols="100" rows="3" placeholder="Describe your query">{{@$editData->query}}</textarea>
                            </div>
                            @error('query')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>--}}
                    <!--Text Area-->

                </div>
            </div>
        </div>
    </div>
    <!--Form Size End-->
</div>


