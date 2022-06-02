<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'type', 'name'
    ];

    public function getCreatedAtAttribute($date): string
    {
        return Carbon::createFromFormat('H:i:s d-m-Y', $date)->format('H:i:s d-m-Y');
    }

    public function getUpdatedAtAttribute($date): string
    {
        return Carbon::createFromFormat('H:i:s d-m-Y', $date)->format('H:i:s d-m-Y');
    }
}
