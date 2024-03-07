<?php

namespace App\Models;

use App\Traits\Searchable;
use App\Constants\ManageStatus;
use App\Traits\UniversalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Deposit extends Model
{
    use UniversalStatus, Searchable;

    protected $casts = [
        'details' => 'object',
    ];

    protected $hidden = ['details'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gateway()
    {
        return $this->belongsTo(Gateway::class, 'method_code', 'code');
    }

    /**
     * Get the campaign that owns the donation.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    // Scope
    public function scopeGatewayCurrency()
    {
        return GatewayCurrency::where('method_code', $this->method_code)->where('currency', $this->method_currency)->first();
    }

    public function scopeBaseCurrency()
    {
        return @$this->gateway->crypto == ManageStatus::ACTIVE ? 'USD' : $this->method_currency;
    }

    public function scopePending($query)
    {
        return $query->where('method_code', '>=', 1000)->where('status', ManageStatus::PAYMENT_PENDING);
    }

    public function scopeCancelled($query)
    {
        return $query->where('method_code', '>=', 1000)->where('status', ManageStatus::PAYMENT_CANCEL);
    }

    public function scopeDone($query)
    {
        return $query->where('status', ManageStatus::PAYMENT_SUCCESS);
    }

    public function scopeIndex($query)
    {
        return $query->where('status', '!=', ManageStatus::PAYMENT_INITIATE);
    }

    public function scopeInitiate($query)
    {
        return $query->where('status', ManageStatus::PAYMENT_INITIATE);
    }

    /**
     * Get the donor's full name.
     */
    public function donorName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->donor_type ? ($this->user_id ? $this->user->fullname : $this->full_name) : 'Anonymous User',
        );
    }

    /**
     * Get the donor's email.
     */
    public function donorEmail(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->donor_type ? ($this->user_id ? $this->user->email : $this->email) : '-',
        );
    }

    /**
     * Get the donor's phone.
     */
    public function donorPhone(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->donor_type ? ($this->user_id ? $this->user->mobile : $this->phone) : '-',
        );
    }

    /**
     * Get the donor's country.
     */
    public function donorCountry(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->donor_type ? ($this->user_id ? $this->user->country_name : $this->country) : '-',
        );
    }

    /**
     * Get the donor's type.
     */
    public function donorType(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->donor_type) {
                    $html = '<span class="badge bg-label-warning donor-badge">' . trans('Anonymous') . '</span>';
                } else {
                    $html = '<span class="badge bg-label-success donor-badge">' . trans('Known') . '</span>';
                }

                return $html;
            },
        );
    }
}
