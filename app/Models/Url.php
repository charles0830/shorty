<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'real_url',
        'short_url'
    ];

    protected static function boot()
    {
        parent::boot();

        // Generate a 10 digit random string for short url before creating
        static::creating(function ($url) {
            $url->short_url = str()->random(6);
        });
    }

    // Override the default resource route key name
    public function getRouteKeyName()
    {
        return "short_url";
    }

    /**
     * 'created_at' date human-friendly accessor
     *
     * @return Attribute
     **/
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->diffForHumans()
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * pass the shorten url with app url
     *
     * This method works but conflicts while DELETing the model. So it's off now.
     * @return Attribute
     **/
    // protected function shortUrl(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => url(route("shortened", $value))
    //     );
    // }

    /* This one too... gotta handle it from front end */
    // protected function visits(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => number_format($value)
    //     );
    // }
}
