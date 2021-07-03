<?php

namespace App\Http\Controllers\frontend;

use App\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function View()
    {
        $data['title']='Contact Us';
        $data['contact_us']=ContactUs::first();
        return view('frontend.frontendpages.About_Contact_Services.ContactUs',$data);
    }
}
