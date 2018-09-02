<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Campaign;
use App\Utils\FetchService;

class TagController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $tag = Tag::where('id', '=', $id)->first();
        $images = FetchService::fetch($tag->tag_name);
        return view('tags.show', compact('images'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTagRequest $request)
    {
        $tag = new Tag();
        $tag->tag_name = $request->get('tag');
        $similar_tag = Tag::where('tag_name', '=', "$tag->tag_name")->first();
        if ($similar_tag) {
            return redirect()->back()->with(['Message' => "The Tag is available"]);
        }
        $tag->save();
        $tag->campaigns()->attach($request->get('campaign_id'));
        return redirect()->back();
//        } else if (strlen($tag->tag_name) < 1) {
//            return redirect()->back()->with(['Message' => "The Tag must be at least 1 Character"]);
//        } else {
//            $tag->save();
//            $tag->campaigns()->attach($request->get('campaign_id'));
//            return redirect()->back();
//        }
//    }
    }

    public function save(Request $request)
    {
        $storeArray = [];
        foreach ($request->all() as $key => $value) {
            if (strpos($key, "save") !== false) {
                $parts = explode("-", $key);
                $id = $parts[1];

                $image_url = $request["image-{$id}"];
                $image_link = $request["link-{$id}"];
                $storeArray [] = ['image' => $image_url, 'link' => $image_link];
            }
        }
//        foreach ($storeArray as $key => $value)
//            echo "<img src=" . $value['image'] . ">"."\t";
        if ($storeArray)
            return redirect()->back()->with(["Message" => "Images successfully Saved"]);
        else
            return redirect()->back()->with(["Message" => "Please Select at least 1 image"]);
    }

}
