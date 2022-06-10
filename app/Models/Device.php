<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'location', 'active', 'last_login',
    ];

    public function getLastLoginAttribute()
    {
        return Carbon::
    }
}
