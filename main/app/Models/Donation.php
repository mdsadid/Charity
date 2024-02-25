<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    const ANONYMOUS_DONATION = 'anonymous';
    const KNOWN_DONATION     = 'known';

    /**
     * Get the deposit that owns the donation.
     */
    public function deposit()
    {
        return $this->belongsTo(Deposit::class);
    }

    /**
     * Get the campaign that owns the donation.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
