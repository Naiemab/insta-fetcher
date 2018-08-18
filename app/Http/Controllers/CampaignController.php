<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Utils\FetchService;
use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Support\Facades\Input;
use Prophecy\Exception\Doubler\InterfaceNotFoundException;


class CampaignController extends Controller
{

    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaigns.index', compact('campaigns'));
    }

    public function show(Campaign $campaign)
    {
        return view('campaigns.show', compact('campaign'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $campaign = new Campaign();
        $campaign->name = $request->get('name');
        if ($campaign->where('name', '=', $campaign->name)->count() > 0) {
            return redirect()->back()->with(['Message' => "The Campaign is already available."]);

        } else {
            $campaign->save();
            return redirect()->back();
        }
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function search()
    {
        $request = new Request;
        $tag = input::get('tag');
        if ($tag) {
            $Fetch_data = FetchService::fetch($tag);
            return view("campaigns.search", ['image_url' => $Fetch_data]);
        } else {
            $this->validate($request, [
                'tag' => 'required|tag'
            ]);
        }


    }


    /**
     * @return mixed
     */

    public function token()
    {
        $token = FetchService::access_token(request()->get('code'));
        FetchService::updateToken($token);
        return redirect()->to('/');
    }

    public function test()
    {
//          $tag = Tag::where('tag_name','=','')->delete();
        return Campaign::with('tags')->get();
//        return Tag::with('campaigns')->get();
    }

}

