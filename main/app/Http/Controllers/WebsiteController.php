<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Language;
use App\Models\SiteData;
use App\Constants\ManageStatus;
use App\Models\AdminNotification;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
    function home() {
        $pageTitle               = 'Home';
        $bannerElements          = getSiteData('banner.element', false, null, true);
        $aboutUsContent          = getSiteData('about.content', true);
        $featuredCampaignContent = getSiteData('featured_campaign.content', true);
        $featuredCampaigns       = Campaign::campaignCheck()->approve()->featured()->latest()->get();
        $campaignCategoryContent = getSiteData('campaign_category.content', true);
        $campaignCategories      = Category::active()->get();
        $recentCampaignContent   = getSiteData('recent_campaign.content', true);
        $recentCampaigns         = Campaign::campaignCheck()->approve()->latest()->limit(10)->get();
        $volunteerContent        = getSiteData('volunteer.content', true);
        $volunteerElements       = getSiteData('volunteer.element', false, null, true);
        $counterElements         = getSiteData('counter.element', false, null, true);

        return view($this->activeTheme . 'page.home', compact('pageTitle', 'bannerElements', 'aboutUsContent', 'featuredCampaignContent', 'volunteerContent', 'volunteerElements', 'counterElements', 'campaignCategoryContent', 'campaignCategories', 'recentCampaignContent', 'recentCampaigns', 'featuredCampaigns'));
    }

    function aboutUs() {
        $pageTitle      = 'About Us';
        $aboutUsContent = getSiteData('about.content', true);
        $clientContent  = getSiteData('client_review.content', true);
        $clientElements = getSiteData('client_review.element', false, null, true);

        return view($this->activeTheme . 'page.aboutUs', compact('pageTitle', 'aboutUsContent', 'clientContent', 'clientElements'));
    }

    function faq() {
        $pageTitle   = 'FAQ';
        $faqContent  = getSiteData('faq.content', true);
        $faqElements = getSiteData('faq.element', false, null, true);

        return view($this->activeTheme . 'page.faq', compact('pageTitle', 'faqContent', 'faqElements'));
    }

    function campaigns() {
        $pageTitle = 'Campaigns';
        $campaigns = Campaign::campaignCheck()->approve()->latest()->paginate(getPaginate(10));

        return view($this->activeTheme . 'page.campaign', compact('pageTitle', 'campaigns'));
    }

    function campaignShow($slug) {
        $pageTitle        = 'Campaign Details';
        $campaign         = Campaign::where('slug', $slug)->campaignCheck()->approve()->firstOrFail();
        $comments         = Comment::with('user')
            ->where('campaign_id', $campaign->id)
            ->approve()
            ->latest()
            ->limit(6)
            ->get();
        $commentCount     = Comment::where('campaign_id', $campaign->id)->approve()->count();
        $authUser         = auth()->user();
        $relatedCampaigns = Campaign::where('category_id', $campaign->category_id)
            ->whereNot('slug', $campaign->slug)
            ->approve()
            ->latest()
            ->limit(4)
            ->get();

        $seoContents['keywords']           = $campaign->meta_keywords ?? [];
        $seoContents['social_title']       = $campaign->name;
        $seoContents['description']        = strLimit($campaign->description, 150);
        $seoContents['social_description'] = strLimit($campaign->description, 150);
        $imageSize                         = getFileSize('campaign');
        $seoContents['image']              = getImage(getFilePath('campaign') . '/' . $campaign->image, $imageSize);
        $seoContents['image_size']         = $imageSize;

        return view($this->activeTheme . 'page.campaignShow', compact('pageTitle', 'campaign', 'relatedCampaigns', 'seoContents', 'authUser', 'comments', 'commentCount'));
    }

    function storeCampaignComment($slug) {
        $this->validate(request(), [
            'name'    => 'required|string|max:40',
            'email'   => 'required|string|max:40',
            'comment' => 'required|string',
        ]);

        // Check whether user active or not
        if (auth()->check() && !auth()->user()->status) {
            $toast[] = ['error', 'The user is banned'];

            return back()->withToasts($toast);
        }

        $campaign = Campaign::where('slug', $slug)->first();

        // Check whether campaign found or not
        if (!$campaign) {
            $toast[] = ['error', 'Campaign not found'];

            return back()->withToasts($toast);
        }

        // Check whether campaign category active or not
        if (!$campaign->category->status) {
            $toast[] = ['error', 'Campaign category is not active'];

            return back()->withToasts($toast);
        }

        // Check for approved & running campaign
        if ($campaign->status == ManageStatus::CAMPAIGN_PENDING ||
            $campaign->status == ManageStatus::CAMPAIGN_REJECTED ||
            !$campaign->isRunning() || 
            $campaign->isExpired()
        ) {
            $toast[] = ['error', 'Campaign is not approved or running'];

            return back()->withToasts($toast);
        }

        // Check whether user commenting on his/her own campaign
        if (auth()->check() && $campaign->user_id == auth()->id()) {
            $toast[] = ['error', 'You can\'t comment on your own campaign'];

            return back()->withToasts($toast);
        }

        $comment = new Comment();

        if (auth()->check()) {
            $comment->user_id = auth()->id();
            $comment->name    = auth()->user()->fullname;
            $comment->email   = auth()->user()->email;
        } else {
            $comment->user_id = null;
            $comment->name    = request('name');
            $comment->email   = request('email');
        }

        $comment->campaign_id = $campaign->id;
        $comment->comment     = request('comment');
        $comment->save();

        // Create admin notification
        $adminNotification = new AdminNotification();

        if (auth()->check()) {
            $adminNotification->user_id = auth()->id();
            $adminNotification->title   = auth()->user()->fullname . ' has commented on a campaign.';
        } else {
            $adminNotification->user_id = 0;
            $adminNotification->title   = request('name') . ' has commented on a campaign.';
        }

        $adminNotification->click_url = urlPath('admin.comments.index');
        $adminNotification->save();

        $toast[] = ['success', 'Your comment has submitted. Please wait for admin approval'];

        return back()->withToasts($toast);
    }

    function fetchCampaignComment($slug) {
        $validator = Validator::make(request()->all(), [
            'skip' => 'required|integer|gt:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }

        $campaign = Campaign::where('slug', $slug)->first();

        if (!$campaign) {
            return response()->json([
                'message' => 'Campaign not found'
            ], 404);
        }

        $comments = Comment::with('user')
            ->where('campaign_id', $campaign->id)
            ->skip(request('skip'))
            ->approve()
            ->latest()
            ->limit(5)
            ->get();

        if (count($comments)) {
            $view = view($this->activeTheme . 'partials.basicComment', compact('comments'))->render();

            return response()->json([
                'html' => $view
            ]);
        } else {
            return response()->json([
                'message' => 'No more comments found'
            ], 404);
        }
    }

    function events() {
        $pageTitle = 'Events';

        return view($this->activeTheme . 'page.event', compact('pageTitle'));
    }

    function contact() {
        $pageTitle       = 'Contact';
        $user            = auth()->user();
        $contactContent  = getSiteData('contact_us.content', true);
        $contactElements = getSiteData('contact_us.element', false, null, true);

        return view($this->activeTheme . 'page.contact', compact('pageTitle', 'user', 'contactContent', 'contactElements'));
    }

    function contactStore() {
        $this->validate(request(), [
            'name'    => 'required|string|max:40',
            'email'   => 'required|string|max:40',
            'subject' => 'required|string|max:255',
            'message' => 'required',
        ]);

        $user         = auth()->user();
        $email        = $user ? $user->email : request('email');
        $contactCheck = Contact::where('email', $email)->where('status', ManageStatus::NO)->first();

        if ($contactCheck) {
            $toast[] = ['warning', 'There is an existing contact on record, kindly await the admin\'s response'];
            return back()->withToasts($toast);
        }

        $contact          = new Contact();
        $contact->name    = $user ? $user->fullname : request('name');
        $contact->email   = $email;
        $contact->subject = request('subject');
        $contact->message = request('message');
        $contact->save();

        $toast[] = ['success', 'We have received your message, kindly wait for the admin\'s response'];
        return back()->withToasts($toast);
    }

    function changeLanguage($lang = null) {
        $language = Language::where('code', $lang)->first();

        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return back();
    }

    function cookieAccept() {
        Cookie::queue('gdpr_cookie', bs('site_name'), 43200);
    }

    function cookiePolicy() {
        $pageTitle = 'Cookie Policy';
        $cookie    = SiteData::where('data_key', 'cookie.data')->first();

        return view($this->activeTheme . 'page.cookie',compact('pageTitle', 'cookie'));
    }

    function maintenance() {
        if(bs('site_maintenance') == ManageStatus::INACTIVE) {
            return to_route('home');
        }

        $maintenance = SiteData::where('data_key', 'maintenance.data')->first();
        $pageTitle   = $maintenance->data_info->heading;

        return view($this->activeTheme . 'page.maintenance', compact('pageTitle', 'maintenance'));
    }

    function policyPages($slug,$id) {
        $policy    = SiteData::where('id', $id)->where('data_key', 'policy_pages.element')->firstOrFail();
        $pageTitle = $policy->data_info->title;

        return view($this->activeTheme . 'page.policy', compact('policy', 'pageTitle'));
    }

    function placeholderImage($size = null) {
        $imgWidth  = explode('x',$size)[0];
        $imgHeight = explode('x',$size)[1];
        $text      = $imgWidth . '×' . $imgHeight;
        $fontFile  = realpath('assets/font/RobotoMono-Regular.ttf');
        $fontSize  = round(($imgWidth - 50) / 8);

        if ($fontSize <= 9) {
            $fontSize = 9;
        }

        if ($imgHeight < 100 && $fontSize > 30) {
            $fontSize = 30;
        }

        $image     = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 100, 100, 100);
        $bgFill    = imagecolorallocate($image, 175, 175, 175);
        imagefill($image, 0, 0, $bgFill);
        $textBox    = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth  = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX      = ($imgWidth - $textWidth) / 2;
        $textY      = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }
}
