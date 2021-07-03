<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $data['title']='stflbd';
        return view('backend.backendpages.dashboardpage.dashboard',$data);
    }
}
