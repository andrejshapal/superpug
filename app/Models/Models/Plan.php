<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use OwenIt\Auditing\Contracts\Auditable;

class Plan extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /** @use HasFactory<\Database\Factories\PlanFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'difficulty_id',
        'available_activities',
        'main_activities'
    ];
    public function day(): HasMany
    {
        return $this->hasMany(Day::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
    public function difficulty(): BelongsTo
    {
        return $this->belongsTo(Difficulty::class);
    }
}
