<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\Campaign;
use App\Models\CampaignImage;
use App\Models\CampaignCategory;
use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use Carbon\Carbon;
use HTMLPurifier;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
{
    function index() {
        $pageTitle = 'All Campaigns';

        return view($this->activeTheme . 'user.campaign.index', compact('pageTitle'));
    }

    function new() {
        $pageTitle  = 'Create New Campaign';
        $categories = CampaignCategory::active()->get();

        return view($this->activeTheme . 'user.campaign.create', compact('pageTitle', 'categories'));
    }

    function upload() {
        $validator = Validator::make(request()->all(), [
            'file' => ['required', File::types(['png', 'jpg', 'jpeg'])],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }

        $campaignImage          = new CampaignImage();
        $campaignImage->user_id = auth()->user()->id;
        $campaignImage->image   = fileUploader(request('file'), getFilePath('campaign'), getFileSize('campaign'));
        $campaignImage->save();

        return response()->json([
            'message' => 'File successfully uploaded',
            'image'   => $campaignImage->image,
        ]);
    }

    function remove() {
        $image = request('file');

        fileManager()->removeFile(getFilePath('campaign') . '/' . $image);
        CampaignImage::where('image', $image)->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'File successfully removed',
        ]);
    }

    function store() {
        $this->validate(request(), [
            'category_id' => 'required|integer|exists:campaign_categories,id',
            'image'       => ['required', File::types(['png', 'jpg', 'jpeg'])],
            'name'        => 'required|string|max:255',
            'description' => 'required|min:30',
            'document'    => ['nullable', File::types('pdf')],
            'goal_amount' => 'required|numeric|gt:0',
            'start_date'  => 'required|date_format:d-m-Y',
            'end_date'    => 'required|date_format:d-m-Y|after:start_date',
        ], [
            'category_id.required' => 'The category field is required.',
            'category_id.integer'  => 'The category must be an integer.',
            'category_id.exists'   => 'The selected category is invalid.',
        ]);

        $campaignImages = CampaignImage::where('user_id', auth()->id())->get();

        if (count($campaignImages) < 1) {
            $toast[] = ['error', 'Minimum one gallery image is required'];

            return back()->withToasts($toast);
        }

        // Gallery images
        $gallery = [];

        foreach ($campaignImages as $image) array_push($gallery, $image->image);

        // Store campaign data
        $campaign                       = new Campaign();
        $campaign->user_id              = auth()->id();
        $campaign->campaign_category_id = request('category_id');

        // Upload main image
        try {
            $campaign->image = fileUploader(request('image'), getFilePath('campaign'), getFileSize('campaign'), null, getThumbSize('campaign'));
        } catch (Exception) {
            $toast[] = ['error', 'Image uploading process has failed'];

            return back()->withToasts($toast);
        }

        $campaign->gallery     = json_encode($gallery);
        $campaign->name        = request('name');
        $purifier              = new HTMLPurifier();
        $campaign->description = $purifier->purify(request('description'));

        if (request()->has('document')) {
            // Upload document
            try {
                $campaign->document = fileUploader(request('document'), getFilePath('document'));
            } catch (Exception) {
                $toast[] = ['error', 'Document uploading process has failed'];

                return back()->withToasts($toast);
            }
        }

        $campaign->goal_amount = request('goal_amount');
        $campaign->start_date  = Carbon::parse(request('start_date'));
        $campaign->end_date    = Carbon::parse(request('end_date'));
        $campaign->save();

        // Delete gallery images
        foreach ($campaignImages as $image) $image->delete();

        // Create admin notification
        $adminNotification            = new AdminNotification();
        $adminNotification->user_id   = auth()->id();
        $adminNotification->title     = 'New campaign created by ' . auth()->user()->fullname;
        $adminNotification->click_url = urlPath('admin.campaigns.index');
        $adminNotification->save();

        $toast[] = ['success', 'Campaign successfully created'];

        return to_route('user.campaign.index')->withToasts($toast);
    }
}
