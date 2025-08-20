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
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->foreignId('semillero_id')->constrained()->cascadeOnDelete();
        $table->foreignId('director_id')->constrained('users')->cascadeOnDelete();
        $table->string('nombre');
        $table->text('descripcion')->nullable();
        $table->enum('fase_actual', ['propuesta','analisis','diseño','desarrollo','prueba','implantacion'])->default('propuesta');
        $table->date('fecha_inicio')->nullable();
        $table->date('fecha_fin')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
