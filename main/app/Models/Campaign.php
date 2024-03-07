<?php

namespace App\Models;

use Carbon\Carbon;
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
        'gallery'           => 'array',
        'preferred_amounts' => 'array',
        'start_date'        => 'datetime:Y-m-d',
        'end_date'          => 'datetime:Y-m-d',
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
     * Get the comments for the campaign.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->where('status', ManageStatus::CAMPAIGN_COMMENT_APPROVED)->orderByDesc('id');
    }

    /**
     * Get the deposits for the campaign.
     */
    public function deposits()
    {
        return $this->hasMany(Deposit::class);
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
     * Scope a query to only include featured campaigns.
     */
    public function scopeFeatured($query)
    {
        $query->where('featured', ManageStatus::YES);
    }

    /**
     * Scope a query to only include campaigns that meet certain criteria.
     */
    public function scopeCampaignCheck($query)
    {
        $query->whereHas('category', function ($innerQuery) {
            $innerQuery->active();
        })
            ->whereHas('user', function ($innerQuery) {
                $innerQuery->active();
            })
                ->whereDate('start_date', '<', now()->toDateString())
                ->whereDate('end_date', '>', now()->toDateString());
    }

    /**
     * Get the approval's status.
     */
    protected function approvalStatusBadge(): Attribute
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

    /**
     * Get the campaign's status.
     */
    protected function campaignStatusBadge(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->status == ManageStatus::CAMPAIGN_PENDING || $this->status == ManageStatus::CAMPAIGN_REJECTED) {
                    $html = '<span>N/A</span>';
                } else if ($this->isRunning()) {
                    $html = '<span class="badge bg-label-success">' . trans('Running') . '</span>';
                } else if ($this->isExpired()) {
                    $html = '<span class="badge bg-label-secondary">' . trans('Expired') . '</span>';
                } else {
                    $html = '<span class="badge bg-label-info">' . trans('Upcoming') . '</span>';
                }

                return $html;
            },
        );
    }

    /**
     * Get the campaign's featured status.
     */
    protected function featuredStatusBadge(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->featured) {
                    $html = '<span class="badge bg-label-success">' . trans('Yes') . '</span>';
                } else {
                    $html = '<span class="badge bg-label-danger">' . trans('No') . '</span>';
                }

                return $html;
            },
        );
    }

    /**
     * Check if the campaign is expired. (custom method)
     *
     * @return bool
     */
    public function isExpired(): bool
    {
        return $this->end_date->isPast();
    }

    /**
     * Check if the campaign is running. (custom method)
     *
     * @return bool
     */
    public function isRunning(): bool
    {
        return Carbon::today()->betweenIncluded($this->start_date, $this->end_date);
    }
}
