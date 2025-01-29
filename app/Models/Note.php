<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;

    function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    function moment(): BelongsTo
    {
        return $this->belongsTo(Moment::class);
    }
}
