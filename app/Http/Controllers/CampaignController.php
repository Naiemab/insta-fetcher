<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utils\FetchService;
use App\Http\Requests\StoreCampaignRequest;
use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use Prophecy\Exception\Doubler\InterfaceNotFoundException;


class CampaignController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $campaigns = $user->campaigns()->get();
        return view('campaigns.index', compact('campaigns'));
    }

    /**
     * @param Campaign $campaign
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Campaign $campaign)
    {
        return view('campaigns.show', compact('campaign'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCampaignRequest $request)
    {
        $campaign = new Campaign();
        $campaign->name = $request->get('name');
        $campaign->user_id = Auth::user()->id;
        $campaign->save();
        return redirect()->back();

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

