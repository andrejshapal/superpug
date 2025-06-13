<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Difficulty extends Model
{
    /** @use HasFactory<\Database\Factories\DifficultyFactory> */
    use HasFactory;

    public function plan(): HasMany
    {
        return $this->hasMany(Plan::class);
    }

    public function item(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
