<?php

namespace App\Models;

use App\Constants\ManageStatus;
use App\Traits\Searchable;
use App\Traits\UniversalStatus;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use Searchable, UniversalStatus;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'gallery'    => 'array',
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    /**
     * Get the user that owns the campaign.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the campaign.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope a query to only include pending campaigns.
     */
    public function scopePending($query)
    {
        $query->where('status', ManageStatus::CAMPAIGN_PENDING);
    }

    /**
     * Scope a query to only include approved campaigns.
     */
    public function scopeApprove($query)
    {
        $query->where('status', ManageStatus::CAMPAIGN_APPROVED);
    }

    /**
     * Scope a query to only include rejected campaigns.
     */
    public function scopeReject($query)
    {
        $query->where('status', ManageStatus::CAMPAIGN_REJECTED);
    }
}
