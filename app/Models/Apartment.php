<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Apartment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // uno a uno
    // public function mediabook(): BelongsTo
    // {
    //     return $this->belongsTo(Mediabook::class);
    // }

    public function service(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'apartment_service', 'apartment_id', 'service_id');
    }

    public function sponsor(): BelongsToMany
    {
        return $this->belongsToMany(Sponsor::class, 'apartment_sponsor', 'apartment_id', 'sponsor_id');
    }


    ////////////////////////////////////////////////

    public function stat(): HasMany
    {
        return $this->hasMany(Stat::class);
    }
}