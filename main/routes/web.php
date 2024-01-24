<?php

use Illuminate\Support\Facades\Route;

Route::controller('WebsiteController')->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('about-us', 'aboutUs')->name('about.us');
    Route::get('faq', 'faq')->name('faq');
    Route::get('campaign', 'campaigns')->name('campaign');

    Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');

    // Contact
    Route::get('contact', 'contact')->name('contact');
    Route::post('contact', 'contactStore');

    // Cookie
    Route::get('cookie/accept', 'cookieAccept')->name('cookie.accept');
    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');

    // Language
    Route::get('change/{lang?}', 'changeLanguage')->name('lang');

    // Policy Details
    Route::get('policy/{slug}/{id}', 'policyPages')->name('policy.pages');
});
