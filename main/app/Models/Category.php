<?php

namespace App\Models;

use App\Traits\Searchable;
use App\Traits\UniversalStatus;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use UniversalStatus, Searchable;
}
