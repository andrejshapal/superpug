<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use OwenIt\Auditing\Contracts\Auditable;

class Item extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;

    protected $fillable = [
        'activities_id',
        'difficulty_id',
        'from',
        'to'
    ];

    public function activity(): HasOne
    {
        return $this->hasOne(Activity::class);
    }

    public function difficulty(): HasOne
    {
        return $this->hasOne(Difficulty::class);
    }
}
