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
    // check access_token :  if token is available show welcome page , else go to instagram page to authorize
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
