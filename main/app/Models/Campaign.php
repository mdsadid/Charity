<?php

namespace App\Models;

use App\Traits\Searchable;
use App\Constants\ManageStatus;
use App\Traits\UniversalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
        'start_date' => 'datetime:Y-m-d',
        'end_date'   => 'datetime:Y-m-d',
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

    /**
     * Get the campaign's status.
     */
    protected function campaignStatusBadge(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->status == ManageStatus::CAMPAIGN_PENDING) {
                    $html = '<span class="badge bg-label-warning">' . trans('Pending') . '</span>';
                } else if ($this->status == ManageStatus::CAMPAIGN_APPROVED) {
                    $html = '<span class="badge bg-label-success">' . trans('Approved') . '</span>';
                } else {
                    $html = '<span class="badge bg-label-danger">' . trans('Rejected') . '</span>';
                }

                return $html;
            },
        );
    }
}
