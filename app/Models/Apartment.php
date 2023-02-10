<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Lead;
class Apartment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }

    public function sponsors(): BelongsToMany
    {
        return $this->belongsToMany(Sponsor::class);
    }

    public function stats(): HasMany
    {
        return $this->hasMany(Stat::class);
    }
    public function mediabooks(): HasMany
    {
        return $this->hasMany(Mediabook::class);
    }

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }
}
