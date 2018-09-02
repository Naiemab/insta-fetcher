<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Utils\FetchService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token = FetchService::getToken();
        if (strlen($token) > 0) {
            return view("welcome");
        } else {
            return redirect()->to(FetchService::getAuthUrl());
        }
    }
}
