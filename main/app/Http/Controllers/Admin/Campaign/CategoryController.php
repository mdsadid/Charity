<?php

namespace App\Http\Controllers\Admin\Campaign;

use App\Http\Controllers\Controller;
use App\Models\CampaignCategory;
use Exception;
use Illuminate\Validation\Rules\File;

class CategoryController extends Controller
{
    function index() {
        $pageTitle  = 'Campaign Categories';
        $categories = CampaignCategory::searchable(['name'])->latest()->paginate(getPaginate());

        return view('admin.page.campaignCategory', compact('pageTitle', 'categories'));
    }

    function store() {
        $imageValidation = request('id') ? 'nullable' : 'required';

        $this->validate(request(), [
            'image' => [$imageValidation, File::types(['png', 'jpg', 'jpeg'])],
            'name'  => 'required|string|max:40|unique:campaign_categories,name,' . request('id'),
        ]);

        if (request('id')) {
            $campaignCategory = CampaignCategory::findOrFail(request('id'));
            $message          = 'Category has updated';
        } else {
            $campaignCategory = new CampaignCategory();
            $message          = 'New category has stored';
        }

        if (request()->hasFile('image')) {
            try {
                $old                     = $campaignCategory->image;
                $campaignCategory->image = fileUploader(request('image'), getFilePath('campaignCategory'), getFileSize('campaignCategory'), @$old);
            } catch (Exception) {
                $toast[] = ['error', 'Image uploading process has failed'];

                return back()->withToasts($toast);
            }
        }

        $campaignCategory->name = request('name');
        $campaignCategory->slug = slug(request('name'));
        $campaignCategory->save();

        $toast[] = ['success', $message];

        return back()->withToasts($toast);
    }
}
