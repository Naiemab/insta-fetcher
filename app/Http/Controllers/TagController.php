<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Campaign;
use App\Utils\FetchService;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;

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
        return view('tags.show', compact('images', 'tag'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // save tags in database if tag is repetitive show error message
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
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // Save images user selected
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveImages(Request $request)
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

        if ($storeArray) {
            foreach ($storeArray as $item) {
                $media = new Media();
                $media->media_path = $item['image'];
                $media->url = $item['link'];
                $media->user_id = Auth::user()->id;
                $media->tag_id = $request->get('tag_id');
                $media->save();
            }
            return redirect()->back()->with(["Message" => "Images successfully Saved"]);
        } else
            return redirect()->back()->with(["Message" => "Please Select at least 1 image"]);
    }

}
