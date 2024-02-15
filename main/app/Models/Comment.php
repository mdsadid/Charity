<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Comment extends Model
{
    /**
     * Get the campaign that owns the comment.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user's type.
     */
    protected function userTypeBadge(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->user_id) {
                    $html = '<span class="badge bg-label-success">' . trans('Registered') . '</span>';
                } else {
                    $html = '<span class="badge bg-label-warning">' . trans('Not Registered') . '</span>';
                }

                return $html;
            },
        );
    }
}
