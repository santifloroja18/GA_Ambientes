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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('instructor');
<<<<<<< HEAD
            $table->string('programa');
            $table->string('hora_entrada');
            $table->string('hora_salida');
=======
            $table->string('telefono');
            $table->string('email');
            $table->bigInteger('documento');
            $table->string('programa');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->date('fecha');
            $table->string('dia');
            $table->integer('ambiente');
            $table->boolean('disponibilidad') -> nullable();
            $table->string('code')->nullable();
>>>>>>> d55da4ad765efae44a7e720b81fc69c0e2bf7077
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
