<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;

class CampaignController extends Controller
{
    function index() {
        $pageTitle = 'All Campaigns';
        $campaigns = $this->campaignData();

        return view('admin.campaign.index', compact('pageTitle', 'campaigns'));
    }

    protected function campaignData($scope = null) {
        if ($scope) {
            $campaigns = Campaign::$scope();
        } else {
            $campaigns = Campaign::query();
        }

        return $campaigns->with(['user', 'category'])->searchable(['name'])->dateFilter()->latest()->paginate(getPaginate());
    }

    function details($id) {
        $pageTitle = 'Campaign Details';
        $campaign  = Campaign::with(['user', 'category'])->where('id', $id)->first();

        return view('admin.campaign.details', compact('pageTitle', 'campaign'));
    }
}
