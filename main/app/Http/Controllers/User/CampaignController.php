<?php

namespace App\Http\Controllers\User;

use App\Constants\ManageStatus;
use App\Models\CampaignCategory;
use App\Http\Controllers\Controller;
use App\Models\CampaignImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class CampaignController extends Controller
{
    function create() {
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
        $campaignImage->type    = ManageStatus::CAMPAIGN_IMAGE_TYPE_NEW;
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
}
