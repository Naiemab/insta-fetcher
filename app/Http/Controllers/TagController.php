<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Campaign;
use App\Http\Requests;

class TagController extends Controller
{

    public function show($id)
    {
        $tag = Tag::where('id', '=' , $id)->first();
        return view('campaigns.show', compact('tag'));
    }

    public static function store(Request $request)
    {
        $tag = Tag::where('tag_name', '=', $request->get('tag'))->first();
        if (!$tag) {
            $tag = new Tag();
            $tag->tag_name = $request->get('tag');
            $tag->save();
        }

        $tag->campaigns()->attach($request->get('campaign_id'));

        return redirect()->back();
    }
}
