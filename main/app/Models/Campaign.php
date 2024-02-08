<?php

namespace App\Models;

use App\Constants\ManageStatus;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use Searchable;

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
     * Get the category that owns the campaign.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope a query to only include approved campaigns.
     */
    public function scopeApprove($query)
    {
        $query->where('status', ManageStatus::CAMPAIGN_APPROVED);
    }
}
