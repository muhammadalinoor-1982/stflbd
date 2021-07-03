<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-sm-9 col-xs-12">
                <div class="col-main">
                    <div class="my-account">
                        <form action="{{route('FrontendUser.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="page-title">
                            <h2>Edit Account Information</h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{(@$user->name)?$user->name:""}}" placeholder="Enter Your Name">
                                            @error('name')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{(@$user->email)?$user->email:""}}" placeholder="Enter Your Email">
                                            @error('email')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="Phone">Phone</label>
                                            <input type="text" name="user_phone" id="user_phone" class="form-control @error('user_phone') is-invalid @enderror" value="{{(@$user->user_phone)?$user->user_phone:""}}" placeholder="Enter Your Phone Number">
                                            @error('user_phone')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        @php
                                            if(old("business_type")){
                                                $business_type = old('business_type');
                                            }elseif (isset($user)){
                                                $business_type = $user->business_type;
                                            }else{
                                                $business_type = null;
                                            }
                                        @endphp
                                        <div class="form-group @error('business_type') is-invalid @enderror">
                                            <label for="Business Type">Business Type</label><br><br>
                                            <label for="individual"><input class="radio poll_vote"  type="radio" @if($business_type=='individual') checked @endif name="business_type" value="individual" id="individual"> Individual</label>
                                            <label for="company"><input class="radio poll_vote"  type="radio" @if($business_type=='company') checked @endif name="business_type" value="company" id="company"> Company</label>
                                            <label for="trading"><input class="radio poll_vote"  type="radio" @if($business_type=='trading') checked @endif name="business_type" value="trading" id="trading"> Trading</label>
                                            @error('business_type')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        @php
                                            if(old("gender")){
                                                $gender = old('gender');
                                            }elseif (isset($user)){
                                                $gender = $user->gender;
                                            }else{
                                                $gender = null;
                                            }
                                        @endphp
                                        <div class="form-group @error('gender') is-invalid @enderror">
                                            <label for="gender">Gender</label><br><br>
                                            <label for="male"><input class="radio poll_vote"  type="radio" @if($gender=='male') checked @endif name="gender" value="male" id="male"> Male</label>
                                            <label for="female"><input class="radio poll_vote"  type="radio" @if($gender=='female') checked @endif name="gender" value="female" id="female"> Female</label>
                                            <label for="others"><input class="radio poll_vote"  type="radio" @if($gender=='others') checked @endif name="gender" value="others" id="others"> Others</label>
                                            @error('gender')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="Image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{(@$user->image)?$user->image:""}}" placeholder="Upload Image">
                                            @error('image')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <p style="color: #828282">Preferable image dimension should be 700pix X 700pix.</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="form-group">
                                            <label for="Address">Address</label>
                                            <input type="text" name="user_address" id="user_address" class="form-control @error('user_address') is-invalid @enderror" value="{{(@$user->user_address)?$user->user_address:""}}" placeholder="Enter Your Address">
                                            @error('user_address')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="About you">About you</label>
                                            <input type="text" name="about_you" id="about_you" class="form-control @error('about_you') is-invalid @enderror" value="{{(@$user->about_you)?$user->about_you:""}}" placeholder="About you">
                                            @error('about_you')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="Nationality">Nationality</label>
                                            <input type="text" name="nationality" id="nationality" class="form-control @error('nationality') is-invalid @enderror" value="{{(@$user->nationality)?$user->nationality:""}}" placeholder="Nationality">
                                            @error('nationality')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="Country">Country</label>
                                            <input type="country" name="country" id="country" class="form-control @error('country') is-invalid @enderror" value="{{(@$user->country)?$user->country:""}}" placeholder="Country">
                                            @error('country')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <img id="showImage" src="{{(!empty($user->image))?url('public/backend/images/user_images/'.$user->image):url('public/backend/images/user_images/noimage.jpg')}}" width="100%">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="buttons-set">
                            <button id="send2" name="send" type="submit" class="button login"><span>Save</span></button>
                        </div>
                        </form>
                    </div>
                </div>
            </section>
            <aside class="col-right sidebar col-sm-3 col-xs-12">
                <div class="block block-account">
                    <div class="block-title">My Account</div>
                    <div class="block-content">
                        <ul>
                            <li class="current"><a href="{{ route('password.request') }}"><i class="fa fa-angle-right"></i> Change Password</a></li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>