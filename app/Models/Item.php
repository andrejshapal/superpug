<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;

    public function activity(): HasOne
    {
        return $this->hasOne(Activity::class);
    }

    public function difficulty(): HasOne
    {
        return $this->hasOne(Difficulty::class);
    }
}
