<?php

namespace App\Http\Controllers\frontend;

use App\AboutUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function View()
    {
        $data['title']='About Us';
        $data['about_us']=AboutUs::first();
        return view('frontend.frontendpages.About_Contact_Services.AboutUs',$data);
    }
}
