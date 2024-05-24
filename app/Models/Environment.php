<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Environment extends Model
{
    use HasFactory;

    protected $fillable = [

        "environment",
        "floor_id"
    ];

    public function floor(): BelongsTo
    {
        return $this->belongsTo(Floor::class);
    }
}
