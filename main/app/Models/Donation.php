<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Donation extends Model
{
    const ANONYMOUS_DONATION = 'anonymous';
    const KNOWN_DONATION     = 'known';

    /**
     * Get the donor's full name.
     */
    public function donorName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->type == self::KNOWN_DONATION ? $this->full_name : 'Anonymous User',
        );
    }

    /**
     * Get the donor's email.
     */
    public function donorEmail(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->type == self::KNOWN_DONATION ? $this->email : '-',
        );
    }

    /**
     * Get the donor's phone.
     */
    public function donorPhone(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->type == self::KNOWN_DONATION ? $this->phone : '-',
        );
    }

    /**
     * Get the donor's country.
     */
    public function donorCountry(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->type == self::KNOWN_DONATION ? $this->country : '-',
        );
    }

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
