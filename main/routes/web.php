<?php

use Illuminate\Support\Facades\Route;

Route::controller('WebsiteController')->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('about-us', 'aboutUs')->name('about.us');
    Route::get('faq', 'faq')->name('faq');
    Route::get('campaigns', 'campaigns')->name('campaign');
    Route::prefix('campaign/{slug}')->name('campaign.')->group(function () {
        Route::get('', 'campaignShow')->name('show');
        Route::post('comment', 'storeCampaignComment')->name('comment');
        Route::get('fetch-comment', 'fetchCampaignComment')->name('comment.fetch');
    });
    Route::get('upcoming-campaigns', 'upcomingCampaigns')->name('upcoming');
    Route::get('upcoming-campaign/{slug}', 'upcomingCampaignShow')->name('upcoming.show');
    Route::get('success-stories', 'stories')->name('stories');
    Route::get('contact', 'contact')->name('contact');
    Route::post('contact', 'contactStore');

    // Cookie
    Route::get('cookie/accept', 'cookieAccept')->name('cookie.accept');
    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');

    // Language
    Route::get('change/{lang?}', 'changeLanguage')->name('lang');

    // Policy Details
    Route::get('policy/{slug}/{id}', 'policyPages')->name('policy.pages');

    Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');
});
