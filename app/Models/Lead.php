<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Lead extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'message', 'apartment_id', 'read'];

    public function apartment():BelongsTo
    {
        return $this->belongsTo(Apartment::class);
    }
}
