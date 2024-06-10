<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        "instructor",
        "telefono",
        "email",
        "documento",
        "programa",
        "hora_entrada",
        "hora_salida",
        "dia",
        "ambiente",
        "fecha",
        "disponibilidad",
        "code"
    ];
}
