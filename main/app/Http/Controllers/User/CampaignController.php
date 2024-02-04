<?php

namespace App\Http\Controllers\User;

use App\Models\CampaignCategory;
use App\Http\Controllers\Controller;

class CampaignController extends Controller
{
    function create() {
        $pageTitle  = 'Create New Campaign';
        $categories = CampaignCategory::active()->get();

        return view($this->activeTheme . 'user.campaign.create', compact('pageTitle', 'categories'));
    }
}
