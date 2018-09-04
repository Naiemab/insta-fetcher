<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function index()
    {
        $media = Auth::user()->media;
//        $tag = ;
//        foreach ($media as $key => $value)
//            echo "<img src=" . $value['media_path'] . ">" . "\t";
        return view('images.index', compact('media'));
    }
}
