<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'device_id', 'location', 'is_mobile', 'active', 'last_login',
    ];

    public function getLastLoginAttribute()
    {

    }

    public function isMobile(): bool
    {
        $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
        return is_numeric(strpos($ua, "mobile"));
    }
}
