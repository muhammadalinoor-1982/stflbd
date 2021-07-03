<?php

namespace App\Http\Controllers\frontend;

use App\Agro;
use App\AgroLink;
use App\AgroProduct;
use App\ContactUs;
use App\Fashion;
use App\FashionLink;
use App\FashionProduct;
use App\HomeCarousel;
use App\Http\Controllers\Controller;
use App\Luxury;
use App\LuxuryLink;
use App\LuxuryProduct;
use App\Subscription;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homepage()
    {
        $data['subscriptions'] = Subscription::first();
        $data['contact_us'] = ContactUs::first();
        $data['home_carousels'] = HomeCarousel::all();
        $data['agro'] = AgroLink::first();
        $data['fashion'] = FashionLink::first();
        $data['luxury'] = LuxuryLink::first();
        return view('frontend.frontendpages.homePage',$data);
    }
    public function view()
    {
        $data['subscriptions'] = Subscription::first();
        $data['contact_us'] = ContactUs::first();
        $data['home_carousels'] = HomeCarousel::all();
        $data['agro'] = AgroLink::first();
        $data['fashion'] = FashionLink::first();
        $data['luxury'] = LuxuryLink::first();
        return view('frontend.frontendpages.homePage',$data);
    }
    //Start Agro Product
    public function AgroProductsView()
    {
        $data['title'] = 'Agro Product';
        $data['agro_products'] = AgroProduct::all();
        return view('frontend.frontendpages.AgroProduct.AgroProducts',$data);
    }
    public function AgroProductsDetails($id)
    {
        $data['title'] = 'Agro Product Details';
        $data['agro'] = AgroProduct::findOrFail($id);
        $data['agros'] = Agro::all();
        $data['agro_products'] = AgroProduct::all();
        return view('frontend.frontendpages.AgroProduct.AgroProductDetails',$data);
    }
    //End Agro Product

    //Start Fashion Product
    public function FashionProductsView()
    {
        $data['title'] = 'Fashion Product';
        $data['fashion_products'] = FashionProduct::all();
        return view('frontend.frontendpages.FashionProduct.FashionProducts',$data);
    }
    public function FashionProductsDetails($id)
    {
        $data['title'] = 'Fashion Product Details';
        $data['fashion'] = FashionProduct::findOrFail($id);
        $data['fashions'] = Fashion::all();
        $data['fashion_products'] = FashionProduct::all();
        return view('frontend.frontendpages.FashionProduct.FashionProductDetails',$data);
    }
    //End Fashion Product

    //Start Luxury Product
    public function LuxuryProductsView()
    {
        $data['title'] = 'Luxury Product';
        $data['luxury_products'] = LuxuryProduct::all();
        return view('frontend.frontendpages.LuxuryProduct.LuxuryProducts',$data);
    }
    public function LuxuryProductsDetails($id)
    {
        $data['title'] = 'Luxury Product Details';
        $data['luxury'] = LuxuryProduct::findOrFail($id);
        $data['luxuries'] = Luxury::all();
        $data['luxury_products'] = LuxuryProduct::all();
        return view('frontend.frontendpages.LuxuryProduct.LuxuryProductDetails',$data);
    }
    //End Luxury Product
}
