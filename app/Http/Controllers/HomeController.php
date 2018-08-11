<?php
/**
 * Created by PhpStorm.
 * User: naiem
 * Date: 8/11/18
 * Time: 5:16 PM
 */

namespace App\Http\Controllers;


use App\Utils\FetchService;

class HomeController extends Controller
{
    public function index(){
        $token = FetchService::getToken();
        if(strlen($token) > 0){
            return redirect()->to('/campaigns');
        }else{
            return redirect()->to(FetchService::getAuthUrl());
        }
    }
}