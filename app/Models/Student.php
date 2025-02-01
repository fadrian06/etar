<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'second_name',
        'first_last_name',
        'second_last_name',
        'nationality',
        'id_card',
        'birthplace_state_id',
        'birthplace_city_id',
        'birthdate',
        'user_id'
    ];

    function birthdateCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'birthplace_city_id');
    }

    function getAddressAttribute(): string
    {
        return "{$this->birthdateCity} - {$this->birthdateCity->state}";
    }

    function getBirthdateAttribute(): DateTimeInterface
    {
        return $this->asDateTime($this->attributes['birthdate']);
    }

    function getFullIdCardAttribute(): string
    {
        return strtoupper("$this->nationality-$this->id_card");
    }

    function representatives(): BelongsToMany
    {
        return $this->belongsToMany(Representative::class);
    }

    function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    function __toString(): string
    {
        return str_replace(
            '  ',
            ' ',
            "$this->first_name $this->second_name $this->first_last_name $this->second_last_name"
        );
    }
}
