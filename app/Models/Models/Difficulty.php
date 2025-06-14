<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * @property int $days
 */
class Difficulty extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /** @use HasFactory<\Database\Factories\DifficultyFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'days',
    ];
    public function plan(): HasMany
    {
        return $this->hasMany(Plan::class);
    }

    public function item(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
