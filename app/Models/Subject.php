<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    function subjectCategory(): BelongsTo
    {
        return $this->belongsTo(SubjectCategory::class);
    }
}
