<?php

namespace App\Models;

use App\Traits\Searchable;
use App\Traits\UniversalStatus;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use UniversalStatus, Searchable;

    /**
     * Get the campaigns for the category.
     */
    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
