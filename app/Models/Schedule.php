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
<<<<<<< HEAD
        "programa",
        "hora_entrada",
        "hora_salida"
=======
        "telefono",
        "email",
        "documento",
        "programa",
        "hora_entrada",
        "hora_salida",
        "fecha",
        "dia",
        "ambiente",
        "code",
        "disponibilidad"
>>>>>>> d55da4ad765efae44a7e720b81fc69c0e2bf7077
    ];
}
