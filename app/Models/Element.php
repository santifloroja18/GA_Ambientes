<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Element extends Model
{
    use HasFactory;
    protected $fillable = [
        "element_name",
    ];

    public function environments(): BelongsToMany
    {
        return $this->belongsToMany(Element::class, 'environmentStock', 'environment_id', 'element_id');
    }
}
