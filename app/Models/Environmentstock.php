<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environmentstock extends Model
{
    use HasFactory;
    
    protected $fillable = 
    [
        "environment_id",
        "element_id",
        "cantidad"
    ];
}
