<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Campaign;
use App\Constants\ManageStatus;
use App\Http\Controllers\Controller;

class CampaignController extends Controller
{
    function index() {
        $pageTitle = 'All Campaigns';
        $campaigns = $this->campaignData();

        return view('admin.campaign.index', compact('pageTitle', 'campaigns'));
    }

    function pending() {
        $pageTitle = 'Pending Campaigns';
        $campaigns = $this->campaignData('pending');

        return view('admin.campaign.index', compact('pageTitle', 'campaigns'));
    }

    function approved() {
        $pageTitle = 'Approved Campaigns';
        $campaigns = $this->campaignData('approve');

        return view('admin.campaign.index', compact('pageTitle', 'campaigns'));
    }

    function rejected() {
        $pageTitle = 'Rejected Campaigns';
        $campaigns = $this->campaignData('reject');

        return view('admin.campaign.index', compact('pageTitle', 'campaigns'));
    }

    protected function campaignData($scope = null) {
        if ($scope) {
            $campaigns = Campaign::$scope()->whereDate('end_date', '>', now()->toDateString());
        } else {
            $campaigns = Campaign::query();
        }

        return $campaigns->with(['user', 'category'])->searchable(['name', 'category:name', 'user:username'])->latest()->paginate(getPaginate());
    }

    function details($id) {
        $pageTitle     = 'Campaign Details';
        $backRoute     = route('admin.campaigns.index');
        $campaign      = Campaign::with(['user', 'category'])->where('id', $id)->first();
        $donationCount = $campaign->deposits()->done()->count();
        $comments      = Comment::with('user')
            ->where('campaign_id', $campaign->id)
            ->approve()
            ->latest()
            ->paginate(getPaginate());

        return view('admin.campaign.details', compact('pageTitle', 'backRoute', 'campaign', 'donationCount', 'comments'));
    }

    function updateStatus($id, $type) {
        $campaign         = Campaign::findOrFail($id);
        $campaign->status = ($type == 'approve') ? ManageStatus::CAMPAIGN_APPROVED : ManageStatus::CAMPAIGN_REJECTED;
        $campaign->save();

        $template = ($type == 'approve') ? 'CAMPAIGN_APPROVE' : 'CAMPAIGN_REJECT';

        notify($campaign->user, $template, [
            'campaign_name' => $campaign->name,
        ]);

        $toastMsg = ($type == 'approve') ? 'Campaign approval success' : 'Campaign rejection success';

        $toast[] = ['success', $toastMsg];

        return back()->withToasts($toast);
    }

    function updateFeatured($id) {
        return Campaign::changeStatus($id, 'featured');
    }
}
