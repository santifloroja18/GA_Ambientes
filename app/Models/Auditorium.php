<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditorium extends Model
{
    use HasFactory;

    protected $table = "auditoriums";

    protected $fillable = [
        "start",
        	"title",
            	"descripcion",
                	"telefono",
                    	"hora_ini",
                        	"hora_fin",
                            	"dependencia", 
                                	"email",
                                    "belongs_auditorium",
                                    	"end"

    ];
}
