<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Challenge extends Model
{
    /** @use HasFactory<\Database\Factories\ChallengeFactory> */
    use HasFactory;

    public function day(): HasOne
    {
        return $this->hasOne(Day::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
