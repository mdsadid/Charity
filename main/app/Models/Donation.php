<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public function deposit()
    {
        return $this->belongsTo(Deposit::class);
    }
}
