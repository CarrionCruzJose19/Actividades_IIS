<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Notice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFechaAttribute($value)
    {
        return Carbon::parse($value);
    }
}
