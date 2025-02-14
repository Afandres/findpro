<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sector;

class Category extends Model
{
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
