<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function View()
    {
        $data['title']='Services';
        $data['services']=Services::first();
        return view('frontend.frontendpages.About_Contact_Services.Services',$data);
    }
}
