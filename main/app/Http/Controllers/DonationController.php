<?php

namespace App\Http\Controllers;

use App\Models\Campaign;

class DonationController extends Controller
{
    function index($slug) {
        $countryData = (array) json_decode(file_get_contents(resource_path('views/partials/country.json')));
        $countries   = implode(',', array_column($countryData, 'country'));

        $this->validate(request(), [
            'amount'    => 'required|numeric|gt:0',
            'full_name' => 'sometimes|required|string|max:255',
            'email'     => 'sometimes|required|email|max:40',
            'phone'     => 'sometimes|required|regex:/^\+[0-9]*$/|max:40',
            'country'   => 'sometimes|required|max:40|in:' . $countries,
        ]);

        $campaign = Campaign::where('slug', $slug)->campaignCheck()->approve()->firstOrFail();

        if (!$campaign) {
            $toast[] = ['error', 'Campaign not found'];

            return back()->withToasts($toast);
        }

        if (auth()->check() && auth()->id() == $campaign->user_id) {
            $toast[] = ['error', 'You can\'t donate on your own campaign'];

            return back()->withToasts($toast);
        }

        // Put data into session
        session([
            'full_name' => request('full_name'),
            'email'     => request('email'),
            'phone'     => request('phone'),
            'country'   => request('country'),
        ]);

        $amount = request('amount');
    }
}
