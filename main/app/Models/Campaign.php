<?php

namespace App\Models;

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
}
