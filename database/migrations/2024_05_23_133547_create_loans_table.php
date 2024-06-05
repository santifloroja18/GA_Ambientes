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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('instructor');
            $table->string('telefono');
            $table->string('email');
            $table->bigInteger('documento');
            $table->string('programa');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->string('dia');
            $table->integer('ambiente');
            $table->boolean('disponibilidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
