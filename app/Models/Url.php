<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
        'real_url',
        'short_url'
    ];

    protected static function boot()
    {
        parent::boot();

        // Generate a 10 digit random string for short url before creating
        static::creating(function ($url) {
            $url->short_url = str()->random(10);
        });
    }

    // Override the default resource route key name
    public function getRouteKeyName()
    {
        return "short_url";
    }
}
