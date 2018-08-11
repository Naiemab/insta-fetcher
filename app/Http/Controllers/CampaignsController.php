<?php

namespace App\Http\Controllers;

use App\Utils\FetchService\FetchService;
use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Support\Facades\Input;
use Prophecy\Exception\Doubler\InterfaceNotFoundException;


class CampaignsController extends Controller
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

    public function store(Request $request)
    {
        $campaign = new Campaign();
        $campaign->name = $request->get('name');
        $campaign->save();
        return redirect()->back();
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function search()
    {
        $tag = Input::get('tag');
        $Fetch_data = FetchService::fetch($tag);
        return view('campaigns.search', array('results' => json_decode($Fetch_data)));
    }


    /**
     * @return mixed
     */

    public function token()
    {
        return FetchService::token();
    }

}

