<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Campaign;
use App\Http\Requests;
use App\Utils\FetchService;

class TagController extends Controller
{

    public function show($id)
    {
        $tag = Tag::where('id', '=', $id)->first();
        $images = FetchService::fetch($tag->tag_name);

        return view('tags.show', compact('images'));
    }

    public static function store(Request $request)
    {
        $tag = new Tag();
        $tag->tag_name = $request->get('tag');
        $similar_tag = Tag::where('tag_name', '=', "$tag->tag_name")->first();
        if ($similar_tag) {
            return redirect()->back()->with(['Message' => "The Tag is available"]);
        } else if (strlen($tag->tag_name) < 1) {
            return redirect()->back()->with(['Message' => "The Tag must be at least 1 Character"]);
        } else {
            $tag->save();
            $tag->campaigns()->attach($request->get('campaign_id'));
            return redirect()->back();
        }
    }
}
