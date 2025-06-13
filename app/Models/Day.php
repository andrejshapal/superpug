<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Day extends Model
{
    /** @use HasFactory<\Database\Factories\DayFactory> */
    use HasFactory;

    public function challenge(): HasMany
    {
        return $this->hasMany(Challenge::class);
    }

    public function plan(): HasOne
    {
        return $this->hasOne(Plan::class);
    }
}
