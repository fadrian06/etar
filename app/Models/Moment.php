<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Moment extends Model
{
    use HasFactory;

    function period(): BelongsTo
    {
        return $this->belongsTo(Period::class);
    }

    function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}
