<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use OwenIt\Auditing\Contracts\Auditable;

class Challenge extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /** @use HasFactory<\Database\Factories\ChallengeFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'day_id',
        'activities_id',
        'status',
        'experience'
    ];
    public function day(): HasOne
    {
        return $this->hasOne(Day::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'activities_id');
    }

    public function item(): HasOne
    {
        return $this->hasOne(Item::class, 'activity_id', 'activity_id');
    }
}
