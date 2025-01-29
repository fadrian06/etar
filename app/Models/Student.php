<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    function representatives(): BelongsToMany
    {
        return $this->belongsToMany(Representative::class);
    }

    function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}
