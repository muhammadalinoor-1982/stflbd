<?php

namespace App\Http\Controllers;


use App\Subscription;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboardpage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*return view('home');*/
        return view('backend.backendpages.dashboardpage.dashboard');
    }
}
