<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable;

class Day extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /** @use HasFactory<\Database\Factories\DayFactory> */
    use HasFactory;
    protected $fillable = [
        'number',
        'plan_id',
    ];
    public function challenge(): HasMany
    {
        return $this->hasMany(Challenge::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
}
