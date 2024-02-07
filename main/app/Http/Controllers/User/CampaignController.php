<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\Campaign;
use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Category;
use App\Models\Gallery;
use Carbon\Carbon;
use HTMLPurifier;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
{
    function index()
    {
        $pageTitle = 'All Campaigns';
        $campaigns = Campaign::where('user_id', auth()->id())->searchable(['name'])->latest()->paginate(getPaginate());

        return view($this->activeTheme . 'user.campaign.index', compact('pageTitle', 'campaigns'));
    }

    function new()
    {
        // Delete previous gallery images if exist
        $images = Gallery::where('user_id', auth()->id())->get();

        if ($images) {
            foreach ($images as $image) {
                fileManager()->removeFile(getFilePath('campaign') . '/' . $image->image);
                $image->delete();
            }
        }

        $pageTitle  = 'Create New Campaign';
        $categories = Category::active()->get();

        return view($this->activeTheme . 'user.campaign.new', compact('pageTitle', 'categories'));
    }

    function upload()
    {
        $validator = Validator::make(request()->all(), [
            'file' => ['required', File::types(['png', 'jpg', 'jpeg'])],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }

        $gallery          = new Gallery();
        $gallery->user_id = auth()->id();
        $gallery->image   = fileUploader(request('file'), getFilePath('campaign'), getFileSize('campaign'));
        $gallery->save();

        return response()->json([
            'message' => 'File successfully uploaded',
            'image'   => $gallery->image,
        ]);
    }

    /**
     * Remove image while using dropzone
     */
    function remove()
    {
        $image = request('file');

        fileManager()->removeFile(getFilePath('campaign') . '/' . $image);
        Gallery::where('image', $image)->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'File successfully removed',
        ]);
    }

    function store()
    {
        $this->validate(request(), [
            'category_id' => 'required|integer|exists:categories,id',
            'image'       => ['required', File::types(['png', 'jpg', 'jpeg'])],
            'name'        => 'required|string|max:190',
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

        $category = Category::where('id', request('category_id'))->active()->first();

        if (!$category) {
            $toast[] = ['error', 'Selected category not found or inactive'];

            return back()->withToasts($toast);
        }

        $images = Gallery::where('user_id', auth()->id())->get();

        if (!$images) {
            $toast[] = ['error', 'Minimum one gallery image is required'];

            return back()->withToasts($toast);
        }

        // Gallery images
        $gallery = [];

        foreach ($images as $image) array_push($gallery, $image->image);

        // Store campaign data
        $campaign              = new Campaign();
        $campaign->user_id     = auth()->id();
        $campaign->category_id = request('category_id');

        // Upload main image
        try {
            $campaign->image = fileUploader(request('image'), getFilePath('campaign'), getFileSize('campaign'), null, getThumbSize('campaign'));
        } catch (Exception) {
            $toast[] = ['error', 'Image uploading process has failed'];

            return back()->withToasts($toast);
        }

        $campaign->gallery     = $gallery;
        $campaign->name        = request('name');
        $campaign->slug        = slug(request('name'));
        $purifier              = new HTMLPurifier();
        $campaign->description = $purifier->purify(request('description'));

        // Upload document
        if (request()->has('document')) {
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
        foreach ($images as $image) $image->delete();

        // Create admin notification
        $adminNotification            = new AdminNotification();
        $adminNotification->user_id   = auth()->id();
        $adminNotification->title     = 'New campaign created by ' . auth()->user()->fullname;
        $adminNotification->click_url = urlPath('admin.campaigns.index');
        $adminNotification->save();

        $toast[] = ['success', 'Campaign successfully created'];

        return to_route('user.campaign.index')->withToasts($toast);
    }

    function edit($slug)
    {
        $pageTitle  = 'Edit Campaign';
        $categories = Category::get();
        $campaign   = Campaign::where('slug', $slug)->where('user_id', auth()->id())->select('id', 'image', 'gallery')->firstOrFail();

        return view($this->activeTheme . 'user.campaign.edit', compact('pageTitle', 'categories', 'campaign'));
    }

    /**
     * Remove image while editing a campaign
     */
    function removeImage($id)
    {
        $campaign = Campaign::where('id', $id)->where('user_id', auth()->id())->first();

        if (!$campaign) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Campaign not found',
            ]);
        }

        $image   = json_decode(request('image'));
        $gallery = $campaign->gallery;

        if (count($gallery) == 1) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Minimum one gallery image is required',
            ]);
        }

        $index = array_search($image, $gallery);

        if (!$index) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Image not found',
            ]);
        }

        // Remove image from storage
        fileManager()->removeFile(getFilePath('campaign') . '/' . $image);

        // Delete image from database
        unset($gallery[$index]);
        $updatedGallery = array_values($gallery);

        $campaign->gallery = $updatedGallery;
        $campaign->save();

        return response()->json([
            'status'  => 'success',
            'message' => 'Image successfully removed',
        ]);
    }
}
