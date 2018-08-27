<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Utils\FetchService;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token = FetchService::getToken();
        if (strlen($token) > 0) {
//            return redirect()->to('/campaigns');
            return view("home");
        } else {
            return redirect()->to(FetchService::getAuthUrl());
        }
    }
}
