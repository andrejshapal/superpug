<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Plan extends Model
{
    /** @use HasFactory<\Database\Factories\PlanFactory> */
    use HasFactory;

    public function day(): HasMany
    {
        return $this->hasMany(Day::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function difficulty(): HasOne
    {
        return $this->hasOne(Difficulty::class);
    }
}
