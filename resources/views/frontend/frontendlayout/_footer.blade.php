<footer>
    <div class="footer-inner">
        <div class="news-letter">
            <div class="container">
                <div class="heading text-center">
                    @if($subscriptions->status == 'active')
                    <h2>{{(@$subscriptions->heading)?$subscriptions->heading:""}}</h2>
                    <span>{{(@$subscriptions->dialogue)?$subscriptions->dialogue:""}}</span>
                    @endif
                    <span class="@error('email') is-invalid @enderror"></span>
                </div>
                        <form method="post" action="{{route('Subscribe.store')}}">
                            @csrf
                            <input style="color: #000;" name="email" type="email" placeholder="Enter your email address" required>
                            @error('email')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit">Send me</button>
                        </form>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <h4>Contact Us</h4>
                    @if($contact_us->status == 'active')
                    <div class="contacts-info">
                        <div class="phone-footer"><i class="fa fa-user-circle"></i>{{$contact_us->name}}</div>
                        <div class="phone-footer"><i class="fa fa-snowflake-o"></i>{{$contact_us->designation}}</div>
                        <div class="phone-footer"><i class="fa fa-phone"></i>{{$contact_us->phone}}</div>
                        <div class="email-footer"><i class="fa fa-envelope"></i> <a href="mailto:{{$contact_us->email}}">{{$contact_us->email}}</a> </div>
                        <address>
                            <i class="fa fa-location-arrow"></i> <span>{{$contact_us->address}}
                        </address>
                    </div>
                </div>
                @endif
                <div class="col-lg-3 col-md-2 col-sm-6 col-xs-12">
                    <h4>All Products</h4>
                    <ul class="links">
                        <li><a href="{{route('AgroProducts.view')}}">Agro</a></li>
                        <li><a href="{{route('FashionProducts.view')}}">Fashion</a></li>
                        <li><a href="{{route('LuxuryProducts.view')}}">Luxury</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-6 col-xs-12">
                    <h4>Our Info</h4>
                    <ul class="links">
                        <li><a href="{{url('AboutUs/view')}}">About Us</a></li>
                        <li><a href="{{url('ContactUs/view')}}">Contact Us</a></li>
                        <li><a href="{{url('Services/view')}}">Services</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6">
                    <div class="social">
                        <h4>Follow Us</h4>
                        <ul>
                            <li><a href="{{$contact_us->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$contact_us->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$contact_us->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{$contact_us->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="{{$contact_us->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{$contact_us->pinterest}}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="{{$contact_us->google_plus}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="{{$contact_us->skype}}" target="_blank"><i class="fa fa-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 coppyright text-center">© 2018 Fabulous, All rights reserved.</div>
            </div>
        </div>
    </div>
</footer>