<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;

class DonationController extends Controller
{
    function index() {
        $pageTitle = 'Campaign Donations';
        $deposits  = Deposit::has('donation')->with(['gateway', 'donation.campaign'])->latest()->paginate(getPaginate());

        return view('admin.page.donations', compact('pageTitle', 'deposits'));
    }
}
