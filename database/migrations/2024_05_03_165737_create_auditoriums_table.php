<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auditoriums', function (Blueprint $table) {
            $table->id();
            $table ->date('start');
            $table ->string('title');
            $table ->text('descripcion');
            $table -> string('telefono');
            $table->time('hora_ini');
            $table->time('hora_fin');
            $table -> string('dependencia');
            $table -> string('email');
            $table->timestamps();
            // campos ocultos en el frontend
            $table -> integer('belongs_auditorium');
            $table ->date('end');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditoria');
    }
};
